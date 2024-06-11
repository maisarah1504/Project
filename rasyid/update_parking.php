<?php
include('db_connect.php');

$spaceID = isset($_GET['spaceID']) ? $_GET['spaceID'] : '';

if (!empty($spaceID)) {
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM parking_space WHERE spaceID = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $spaceID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found for the selected space.";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid spaceID.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Parking Space</title>
</head>
<body>
    <h1>Update Parking Space</h1>
    <form action="process_update_parking.php" method="post">
        <input type="hidden" id="spaceID" name="spaceID" value="<?php echo htmlspecialchars($row['spaceID']); ?>">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($row['status']); ?>" required><br>

        <label for="qrCode">QR Code:</label>
        <input type="text" id="qrCode" name="qrCode" value="<?php echo htmlspecialchars($row['qrCode']); ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <p><a href="parkingArea.php">Return to Dashboard</a></p>
</body>
</html>
