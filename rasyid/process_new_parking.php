<?php
require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $qrCode = $_POST['qrCode'];

    $conn = connectDatabase();
    $stmt = $conn->prepare("INSERT INTO parking_space (location, capacity, status, qrCode) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $location, $capacity, $status, $qrCode);

    if ($stmt->execute()) {
        echo "New parking space created successfully.";
    } else {
        echo "Error creating new parking space.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

<p><a href="parkingArea.php">Return to Dashboard</a></p>
