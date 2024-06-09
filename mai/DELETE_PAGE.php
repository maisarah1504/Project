<?php
include "MAIN.php";
require('connection.php');
//session_start();

// Check if bookingID is set in the query string
if (!isset($_GET['bookingID'])) {
    die('Error: bookingID parameter is missing.');
}

// Get bookingID from query string
$bookingID = $_GET['bookingID'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Delete the booking
    $sql = "DELETE FROM booking WHERE bookingID = '$bookingID'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Booking deleted successfully!";
        // Redirect to the booking list page after deletion
        header("Location: my-booking.php");
        exit;
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Booking</title>
</head>
<body>
    <h2>Delete Booking</h2>
    <p>Are you sure you want to delete this booking?</p>
    <form action="delete_booking.php?bookingID=<?php echo $bookingID; ?>" method="post">
        <input type="submit" value="Yes, delete it">
        <a href="MY_BOOKING.php">Cancel</a>
    </form>
</body>
</html>
