
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parking Slot Booking</title>
</head>
<body>
    <h1>Welcome to the Parking Slot Booking System</h1>
    <form action="booking.php" method="POST">
        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date"><br>

        <label for="booking_time">Booking Time:</label>
        <input type="time" id="booking_time" name="booking_time"><br>

        <label for="space">Space:</label>
        <select id="space" name="space">
            <?php
            $conn = new mysqli("localhost", "root", "", "fkpark");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM parking_space";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['spaceID'] . "'>" . $row['location'] . "</option>";
                }
            } else {
                echo "<option value=''>No spaces available</option>";
            }

            $conn->close();
            ?>
        </select><br>

        <input type="submit" value="Check Availability">
    </form>

    <h2>Student Options</h2>
    <a href="view_bookings.php">View My Bookings</a><br>
</body>
</html>
