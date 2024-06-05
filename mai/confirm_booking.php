<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['spaceID']) && isset($_GET['booking_date']) && isset($_GET['booking_time'])) {
    $space_id = $_GET['spaceID'];
    $booking_date = $_GET['booking_date'];
    $booking_time = $_GET['booking_time'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
        // Insert booking into the database
        $sql = "INSERT INTO booking (spaceID, startDate, startTime) VALUES ('$spaceID', '$booking_date', '$booking_time')";

        if ($conn->query($sql) === TRUE) {
            $booking_id = $conn->insert_id;

            echo "Booking successful!<br>";
            echo "Your QR code:<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<h2>Confirm Booking</h2>";
        echo "Space ID: $spaceID<br>";
        echo "Booking Date: $booking_date<br>";
        echo "Booking Time: $booking_time<br>";
        echo "<form method='POST'><input type='submit' name='confirm' value='Confirm'></form>";
    }
}

$conn->close();
?>
