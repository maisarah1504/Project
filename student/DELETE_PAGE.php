<?php
include('../navigation/sidebarStudent.php');
require('../webconnect.php');

if (isset($_GET['bookingID'])) {
    $bookingID = $_GET['bookingID'];

    // Fetch the spaceID before deleting the booking
    $fetch_sql = "SELECT spaceID FROM booking WHERE bookingID = ?";
    $stmt = $conn->prepare($fetch_sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('i', $bookingID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die('Error: No booking found with the specified bookingID.');
    }

    $row = $result->fetch_assoc();
    $spaceID = $row['spaceID'];

    $stmt->close();

    // Delete the booking
    $delete_sql = "DELETE FROM booking WHERE bookingID = ?";
    $stmt = $conn->prepare($delete_sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('i', $bookingID);

    if ($stmt->execute()) {
        // Update the parking space status to 'available'
        $update_sql = "UPDATE parking_space SET status = 'available' WHERE spaceID = ?";
        $stmt = $conn->prepare($update_sql);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param('i', $spaceID);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Booking deleted and parking space updated successfully!');
                    window.location.href = 'BOOKING_LIST.php';
                  </script>";
            exit;
        } else {
            echo "Error updating parking space: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    } else {
        echo "Error deleting booking: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
} 
else {
    echo "Error: bookingID parameter is missing.";
}
?>
