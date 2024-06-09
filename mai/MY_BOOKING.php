<?php 
    include('BOOKING_HISTORY.php');
    require('connection.php');

    //$s_userID = $_SESSION['userID'];
    //$ftype = $_POST['filter-history'];
    $sql ="SELECT b.bookingID, ps.location, b.startDate, b.startTime, v.vehicleID, v.licencePlate
    FROM booking AS b
    JOIN parking_space AS ps ON b.spaceID = ps.spaceID
    join vehicle as v on v.userID = b.userID
    WHERE b.userID = 1009";

    $result = mysqli_query($conn, $sql);

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
        body {
            display: flex;
        }
        .table-list {
            border: solid 1px black;
            padding: 10px;
            margin-top: 0; /* Remove any top margin */
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
            margin-top: 0; /* Ensure there is no top margin */
            padding: 20px 20px 20px 120px; /* Adjust padding to avoid overlap with the sidebar */
            overflow: hidden; /* Ensure no overflow */
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
<div class="book-list">
        <div class="details-book">
            <table class="table-list">
                <tr>
                    <th>Booking ID</th>
                    <th>Parking Space</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Vehicle ID</th>
                    <th>Plate Number</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['bookingID']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['startDate']; ?></td>
                    <td><?php echo $row['startTime']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['vehicleID']; ?></td>
                    <td><?php echo $row['licencePlate']; ?></td>
                    <td><a href="edit_booking.php?bookingID=<?php echo $row['bookingID']; ?>" class="btn-edit">Edit</a></td>
                    <td><a href="delete_booking.php?bookingID=<?php echo $row['bookingID']; ?>" class="btn-delete">Delete</a></td>
                </tr>
                <?php 
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>