<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Retrieve form data
$violationType = $_POST['violationType'];
$plateNum = $_POST['plateNum'];
$vehicleType = $_POST['vehicleType'];
$violationLocation = $_POST['violationLocation'];
$violationDate = $_POST['violationDate'];
$violationTime = $_POST['violationTime'];
$description = $_POST['description'];
$demeritPoint = $_POST['demeritPoint'];
$UKStaffID = $_POST['UKStaffID'];
$UKStaffName = $_POST['UKStaffName'];
$uploadEvidence = $_FILES['uploadEvidence'];

// Save the uploaded file
$uploadDir = 'uploads/';
$targetFile = $uploadDir . basename($uploadEvidence["name"]);

if (move_uploaded_file($uploadEvidence["tmp_name"], $targetFile)) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO traffic_violation (violationType, plateNum, vehicleType, violationLocation, violationDate, violationTime, description, demeritPoint, UKStaffID, UKStaffName, uploadEvidence) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $violationType, $plateNum, $vehicleType, $violationLocation, $violationDate, $violationTime, $description, $demeritPoint, $UKStaffID, $UKStaffName, $targetFile);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'violationType' => $violationType,
            'plateNum' => $plateNum,
            'vehicleType' => $vehicleType,
            'violationLocation' => $violationLocation,
            'violationDate' => $violationDate,
            'violationTime' => $violationTime,
            'description' => $description,
            'demeritPoint' => $demeritPoint,
            'UKStaffID' => $UKStaffID,
            'UKStaffName' => $UKStaffName,
            'uploadEvidence' => $targetFile,
            'qrCode' => 'images/qrcode.png' // Path to the QR code image
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to issue new summon: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to upload evidence.']);
}

$conn->close();
?>
