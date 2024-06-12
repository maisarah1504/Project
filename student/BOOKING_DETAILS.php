<?php 
    require('connection.php');

    if(isset($_GET['submit']))
    {
        // Retrieve booking ID from the URL
        $bookingID = $_GET['submit'];

        // Fetch booking details from the database based on the booking ID
        $queryy = "SELECT * FROM booking 
                  INNER JOIN parking_space ON booking.spaceID = parking_space.spaceID 
                  INNER JOIN user ON booking.userID = user.userID 
                  INNER JOIN vehicle ON user.userID = vehicle.userID 
                  WHERE booking.bookingID = '$bookingID'";
        $result = mysqli_query($conn, $queryy);

        // Check if query was successful and if there is any data
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Display booking details
            echo "<p>Booking ID: " . htmlspecialchars($row['bookingID']) . "</p>";
            echo "<p>Parking ID: " . htmlspecialchars($row['spaceID']) . "</p>";
            echo "<p>Parking Location: " . htmlspecialchars($row['location']) . "</p>";
            echo "<p>Student ID: " . htmlspecialchars($row['studentID']) . "</p>";
            echo "<p>Student Name: " . htmlspecialchars($row['studentName']) . "</p>";
            echo "<p>Vehicle ID: " . htmlspecialchars($row['vehicleID']) . "</p>";
            echo "<p>Vehicle Plate Number: " . htmlspecialchars($row['plateNumber']) . "</p>";
            echo "<p>Date: " . htmlspecialchars($row['date']) . "</p>";
            echo "<p>Start Time: " . htmlspecialchars($row['startTime']) . "</p>";
        } else {
            echo "No booking details found.";
        }
    }
?>
