<?php
session_start();
if ($_SESSION['Role'] != 'Administrator') {
    header("Location: ../Layout/errorPage.php");
    exit();
}

require_once '../../Database/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $qrCode = $_POST['qrCode'];

    $conn = connectDatabase();
    $stmt = $conn->prepare("UPDATE parking_space SET location = ?, status = ?, qrCode = ? WHERE spaceID = ?");
    $stmt->bind_param("sssi", $location, $status, $qrCode, $spaceID);

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

<p><a href="admindasnboard.php">Return to Dashboard</a></p>
