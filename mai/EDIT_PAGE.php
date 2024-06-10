<?php
include 'MAIN.php';
require 'connection.php';

// Start session to get userID
// session_start();

// Get bookingID from query string
if (!isset($_GET['bookingID'])) {
    die('Error: bookingID parameter is missing.');
}    
    
$bookingID = $_GET['bookingID'];

// Check if the form has been submitted
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
        echo "<script>
                alert('Booking updated successfully!');
                window.location.href = 'BOOKING_HISTORY.php';
              </script>";
        exit;
    } else {
        echo "Error updating booking: " . mysqli_error($conn);
    }
}

// Fetch the booking details
$sql = "SELECT b.bookingID, ps.location, b.startDate, b.startTime, b.status, v.vehicleID, v.licencePlate
        FROM booking AS b
        JOIN parking_space AS ps ON b.spaceID = ps.spaceID
        JOIN vehicle AS v ON v.userID = b.userID
        WHERE b.bookingID = 1009";

$result = mysqli_query($conn, $sql);
$booking = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: green;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: greenyellow;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .cancel-link {
            background-color: red;
            color: #fff;
            text-decoration: none;
            padding: 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .cancel-link:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Booking</h2>
        <form action="edit_booking.php?bookingID=<?php echo $bookingID; ?>" method="post">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $booking['location']; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" value="<?php echo $booking['startDate']; ?>">
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="time" id="startTime" name="startTime" value="<?php echo $booking['startTime']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo $booking['status']; ?>">
            </div>
            <input type="submit" value="Update">
            <a href="MY_BOOKING.php" class="cancel-link">Cancel</a>
        </form>
    </div>
</body>
</html>
