<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $qrCode = $_POST['qrCode'];

    // Prepare INSERT statement
    $stmt = $conn->prepare("INSERT INTO parking_space (spaceID, location, status, qrCode) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("isss", $spaceID, $location, $status, $qrCode);

    if ($stmt->execute()) {
        echo "New parking space created successfully.";
    } else {
        echo "Error creating parking space: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<p><a href="parkingArea.php">Return to Dashboard</a></p>