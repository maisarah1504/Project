<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceID = $_POST['spaceID'];
    $location = $_POST['location'];
    $status = $_POST['status'];

    // Generate QR code URL
    $data = json_encode(['spaceID' => $spaceID, 'location' => $location, 'status' => $status]);
    $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($data);

    // Prepare INSERT statement
    $stmt = $conn->prepare("INSERT INTO parking_space (spaceID, location, status, qrCode) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("isss", $spaceID, $location, $status, $qrCodeUrl);

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
