<?php
require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $qrCode = $_POST['qrCode'];

    $stmt = $conn->prepare("INSERT INTO parking_space (spaceID, location, status, qrCode) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $spaceID, $location, $status, $qrCode);

    if ($stmt->execute()) {
        echo "New parking space created successfully.";
    } else {
        echo "Error creating new parking space: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<p><a href="parkingArea.php">Return to Dashboard</a></p>
