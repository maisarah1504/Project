<?php
    include 'MAIN.php';
    require('connection.php');

    // Start session to get userID
    //session_start();

    // Get bookingID from query string
    // Check if bookingID is set in the query string
    if (!isset($_GET['bookingID'])) {
        die('Error: bookingID parameter is missing.');

    }    
    
    $bookingID = $_GET['bookingID'];

    // Fetch the booking details
    $sql = "SELECT b.bookingID, ps.location, b.startDate, b.startTime, b.status, v.vehicleID, v.licencePlate
            FROM booking AS b
            JOIN parking_space AS ps ON b.spaceID = ps.spaceID
            JOIN vehicle AS v ON v.vehicleID = b.vehicleID
            WHERE b.bookingID = '$bookingID'";

    $result = mysqli_query($conn, $sql);
    $booking = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $startDate = $_POST['startDate'];
        $startTime = $_POST['startTime'];
        $status = $_POST['status'];

        // Update the booking details
        $update_sql = "UPDATE booking
                       SET startDate = '$startDate', startTime = '$startTime', status = '$status'
                       WHERE bookingID = '$bookingID'";
        if (mysqli_query($conn, $update_sql)) {
            echo "Booking updated successfully!";
        } else {
            echo "Error updating booking: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
</head>
<body>
    <h2>Edit Booking</h2>
    <form action="edit_booking.php?bookingID=<?php echo $bookingID; ?>" method="post">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $booking['location']; ?>" disabled><br><br>
        
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo $booking['startDate']; ?>"><br><br>
        
        <label for="startTime">Start Time:</label>
        <input type="time" id="startTime" name="startTime" value="<?php echo $booking['startTime']; ?>"><br><br>
        
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo $booking['status']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
