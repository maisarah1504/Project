<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $qrCode = $_POST['qrCode'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE parking_space SET location = ?, status = ?, qrCode = ? WHERE spaceID = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("isss", $spaceID, $location, $status, $qrCode);

    if ($stmt->execute()) {
        echo "Parking space updated successfully.";
    } else {
        echo "Error updating parking space: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<p><a href="parkingArea.php">Return to Dashboard</a></p>
