<?php
session_start();
if ($_SESSION['Role'] != 'Administrator') {
    header("Location: ../Layout/errorPage.php");
    exit();
}

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $qrCode = $_POST['qrCode'];
    $status = $_POST['status'];

    $conn = connectDatabase();
    $stmt = $conn->prepare("UPDATE parking_space SET location = ?, qrCode = ?, status = ? WHERE spaceID = ?");
    $stmt->bind_param("sssi", $location, $qrCode, $status, $spaceID);

    if ($stmt->execute()) {
        echo "Parking space updated successfully.";
    } else {
        echo "Error updating parking space.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
<p><a href="parkingArea.php">Return to Dashboard</a></p>
