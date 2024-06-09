<?php
// Include the database connection script
include 'db_connect.php';

$spaceID = $_GET['spaceID'];

// Fetch current data for the selected spaceID
$sql = "SELECT * FROM parking_space WHERE spaceID = '$spaceID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display form with current data to update
    echo "<form method='post' action='process_update_parking.php'>";
    echo "<label for='spaceID'>Space ID:</label>";
    echo "<input type='text' id='spaceID' name='spaceID' value='" . $row["spaceID"] . "' readonly><br>";
    echo "<label for='location'>Location:</label>";
    echo "<input type='text' id='location' name='location' value='" . $row["location"] . "'><br>";
    echo "<label for='qrCode'>QR Code:</label>";
    echo "<input type='text' id='qrCode' name='qrCode' value='" . $row["qrCode"] . "'><br>";
    echo "<label for='status'>Status:</label>";
    echo "<input type='text' id='status' name='status' value='" . $row["status"] . "'><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
} else {
    echo "No data found for the selected space.";
}

// Close the database connection
$conn->close();
?>
