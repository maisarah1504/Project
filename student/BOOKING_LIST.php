<?php 
    include('../navigation/sidebarStudent.php');
    require('connection.php');

// Uncomment and set $s_userID to test with actual session user ID
//$s_userID = $_SESSION['userID'];
//$ftype = $_POST['filter-history'];

// Debug: Print the user ID
// echo "User ID: " . $s_userID;

// Adjust the query to match the structure of your database
$sql = "SELECT b.bookingID, ps.location, b.startDate, b.startTime, v.vehicleID, v.licencePlate
        FROM booking AS b
        JOIN parking_space AS ps ON b.spaceID = ps.spaceID
        JOIN vehicle AS v ON v.userID = b.userID
        WHERE b.bookingID = 1017"; // Adjust userID for testing

$result = mysqli_query($conn, $sql);

// Debug: Check for SQL errors
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

// Debug: Check the number of rows returned
if (mysqli_num_rows($result) == 0) {
    echo "No bookings found.";
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="script.js"></script>
    <style>
        .filter-history {
            display: flex;
            padding-top: 20px;
            padding-left: 150px; /* Adjust the left padding to leave space for the sidebar */
        }
    </style>
    <style>
        body {
            display: flex;
        }
        .table-list {
            border: solid 1px black;
            padding: 10px;
            margin-top: 0;
            width: 100%;
            border-collapse: collapse;
        }
        .table-list th, .table-list td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table-list th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .book-list {
            display: flex;
            flex-direction: column;
            flex: 1;
            margin-top: 0;
            padding: 20px 20px 20px 120px;
            overflow: hidden;
        }
        .btn-edit, .btn-delete {
            background-color: blue;
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 3px;
            margin-right: 5px;
        }
        .btn-delete {
            background-color: red;
        }
    </style>
</head>
    <body>
        <div class="filter-history">
            <h2>MY BOOKING</h2>
        </div>
        <div class="book-list">
            <div class="details-book">
            <table class="table-list">
                <tr>
                    <th>Booking ID</th>
                    <th>Parking Space</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Vehicle ID</th>
                    <th>Plate Number</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['bookingID']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['startDate']; ?></td>
                    <td><?php echo $row['startTime']; ?></td>
                    <td><?php echo $row['vehicleID']; ?></td>
                    <td><?php echo $row['licencePlate']; ?></td>
                    <td><a href="EDIT_PAGE.php?bookingID=<?php echo $row['bookingID']; ?>" class="btn-edit">Edit</a></td>
                    <td><a href="DELETE_PAGE.php" class="btn-delete" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a></td>
                </tr>
                <?php 
                }
                ?>
            </table>
            </div>
        </div>
    </body>
</html>
