<?php
include 'db_connect.php';

// Debugging: Check if spaceID is set
if (isset($_GET['spaceID'])) {
    echo "spaceID is set: " . $_GET['spaceID'];
} else {
    echo "spaceID is not set";
}

// Get spaceID from URL parameter
$id = isset($_GET['spaceID']) ? $_GET['spaceID'] : '';

if (!empty($id)) {
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM parking_space WHERE spaceID = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display form with current data to update
        echo "<form method='post' action='process_update_parking.php'>";
        echo "<label for='spaceID'>Space ID:</label>";
        echo "<input type='text' id='spaceID' name='spaceID' value='" . htmlspecialchars($row["spaceID"]) . "' readonly><br>";
        echo "<label for='location'>Location:</label>";
        echo "<input type='text' id='location' name='location' value='" . htmlspecialchars($row["location"]) . "'><br>";
        echo "<label for='qrCode'>QR Code:</label>";
        echo "<input type='text' id='qrCode' name='qrCode' value='" . htmlspecialchars($row["qrCode"]) . "'><br>";
        echo "<label for='status'>Status:</label>";
        echo "<input type='text' id='status' name='status' value='" . htmlspecialchars($row["status"]) . "'><br>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "No data found for the selected space.";
    }
    $stmt->close();
} else {
    echo "Invalid spaceID.";
}

$conn->close();
?>
