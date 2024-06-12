<?php
include 'sidebar.php';
require 'connection.php';

// Get bookingID from query string
if (!isset($_GET['bookingID'])) {
    die('Error: bookingID parameter is missing.');
}

$bookingID = $_GET['bookingID'];

// Delete the booking using a prepared statement
$delete_sql = "DELETE FROM booking WHERE bookingID = ?";
$stmt = $conn->prepare($delete_sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param('i', $bookingID);

if ($stmt->execute()) {
    echo "<script>
            alert('Booking deleted successfully!');
            window.location.href = 'booking_list.php';
          </script>";
    exit;
} else {
    echo "Error deleting booking: " . htmlspecialchars($stmt->error);
}

$stmt->close();
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
