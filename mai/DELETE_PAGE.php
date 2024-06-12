<?php
include "sidebar.php";
require('connection.php');

// Check if bookingID is set in the query string
//if (!isset($_GET['bookingID'])) {
    //die('Error: bookingID parameter is missing.');
//}

// Get bookingID from query string
//$bookingID = $_GET['bookingID'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Delete the booking
    $sql = "DELETE FROM booking WHERE bookingID = 1009";
    
    if (mysqli_query($conn, $sql)) {
        echo "Booking deleted successfully!";
        // Redirect to the booking list page after deletion
        header("Location: MY_BOOKING.php");
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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
            margin: 0;
        }

        .delete-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            margin-left: 150px; /* Adjust margin to avoid overlap with the sidebar */
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        p {
            margin-bottom: 20px;
            color: #666;
        }

        form {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        input[type="submit"], a {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        input[type="submit"] {
            background-color: #ff0000;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }

        a {
            background-color: #777;
            line-height: 32px;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <h2>Delete Booking</h2>
        <p>Are you sure you want to delete this booking?</p>
        <form action="DELETE_PAGE.php?bookingID=<?php echo $bookingID; ?>" method="post">
            <input type="submit" value="Yes, delete it">
            <a href="BOOKING_LIST.php">Cancel</a>
        </form>
    </div>
</body>
</html>
