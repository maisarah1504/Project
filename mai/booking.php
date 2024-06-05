<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $space = $_POST['space'];

    // Find available slots
    $sql = "SELECT *
            FROM parking_space ps 
            LEFT JOIN booking b 
            ON ps.spaceID = b.spaceID
            AND b.startDate = '$booking_date' 
            AND b.startTime = '$booking_time' 
            WHERE b.bookingID IS NULL";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Available Slots</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Space: " . $row['location'] . "<br>";
            echo "<a href='confirm_booking.php?space_id=" . $row['spaceID'] . "&startDate=$booking_date&startTime=$booking_time'>Book Now</a><br><br>";
        }
    } else {
        echo "No available slots for the selected time.";
    }
}

$conn->close();
?>
