<?php
session_start();
if ($_SESSION['Role'] != 'Administrator') {
    header("Location: ../Layout/errorPage.php");
    exit();
}

require_once '../../Database/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parkingID = $_POST['ParkingID'];
    $parkingNumber = $_POST['parking_number'];
    $parkingType = $_POST['parking_type'];
    $parkingArea = $_POST['parking_area'];
    $parkingStatus = $_POST['parking_status'];
    $parkingLink = $_POST['parking_link'];

    $conn = connectDatabase();
    $stmt = $conn->prepare("UPDATE ManageParkingSpace SET ParkingID = ?, ParkingType = ?, ParkingArea = ?, ParkingStatus = ?, ParkingLink = ? WHERE ParkingID = ?");
    $stmt->bind_param("issssi", $parkingNumber, $parkingType, $parkingArea, $parkingStatus, $parkingLink, $parkingID);

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

<p><a href="base.php">Return to Dashboard</a></p>
