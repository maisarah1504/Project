<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if(isset($_FILES['uploadEvidence']) && $_FILES['uploadEvidence']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/'; // Directory where uploaded files will be saved
    $uploadFile = $uploadDir . basename($_FILES['uploadEvidence']['name']);
    if (move_uploaded_file($_FILES['uploadEvidence']['tmp_name'], $uploadFile)) {
        // File uploaded successfully
        $uploadEvidence = $conn->real_escape_string($uploadFile);
    } else {
        // Error moving uploaded file
        $uploadEvidence = null;
    }
} else {
    // No file uploaded or an error occurred during upload
    $uploadEvidence = null;
}

// Check if the form is submitted
if(isset($_POST['violationID'])) {
    // Escape user inputs for security
    $violationID = $conn->real_escape_string($_POST['violationID']);
    $violationType = $conn->real_escape_string($_POST['violationType']);
    $violationLocation = $conn->real_escape_string($_POST['violationLocation']);
    $violationDate = $conn->real_escape_string($_POST['violationDate']);
    $description = $conn->real_escape_string($_POST['description']);
    $uploadEvidence = $conn->real_escape_string($_POST['uploadEvidence']);
    $plateNum = $conn->real_escape_string($_POST['plateNum']);
    $vehicleType = $conn->real_escape_string($_POST['vehicleType']);
    $demeritPoint = $conn->real_escape_string($_POST['demeritPoint']);
    $UKStaffID = $conn->real_escape_string($_POST['UKStaffID']);
    $UKStaffName = $conn->real_escape_string($_POST['UKStaffName']);
    $violationTime = $conn->real_escape_string($_POST['violationTime']);

    // Prepare SQL statement
    $sql = "UPDATE traffic_violation 
            SET violationType='$violationType',
                violationLocation='$violationLocation',
                violationDate='$violationDate',
                description='$description',
                uploadEvidence='$uploadEvidence',
                plateNum='$plateNum',
                vehicleType='$vehicleType',
                demeritPoint='$demeritPoint',
                UKStaffID='$UKStaffID',
                UKStaffName='$UKStaffName',
                violationTime='$violationTime'
            WHERE violationID=$violationID";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Send JSON response indicating success
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        // Send JSON response with error message
        $response = array('success' => false, 'message' => 'Error updating record: ' . $conn->error);
        echo json_encode($response);
    }
} else {
    // If form data is not received, send an error response
    $response = array('success' => false, 'message' => 'Form data not received');
    echo json_encode($response);
}

// Close connection
$conn->close();
?>
