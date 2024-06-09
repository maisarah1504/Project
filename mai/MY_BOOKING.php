<?php 
    include('MAIN.php');
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
        .table-list {
            border: solid 1px black;
            columns:auto;
            padding: 10px;
            margin-top: 10px;
        }
        .book-list {
            display: flex;
            flex-direction: column; /* Display the book list items vertically */
            flex: 1; /* Allow the book list to expand to fill available space */
            padding-left: 150px; /* Adjust the left padding to leave space for the sidebar */
        }
        
        .btn-edit {
            background-color: blue;
            color: white;
            display: block;
            text-decoration: none;
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
                <tr>
                    <?php 
                        while($row = mysqli_fetch_assoc($result))
                        {

                    ?>
                    <td><?php echo $row['bookingID'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo $row['startDate'];?></td>
                    <td><?php echo $row['startTime'];?></td>
                    <td><?php echo $row['vehicleID'];?></td>
                    <td><?php echo $row['licencePlate'];?></td>
                    <td><a href="#" class="btn-edit">Edit</a></td>
                    <td><a href="#" class="btn-delete">Delete</a></td>
                </tr>
                <?php 
                        }
                ?>
            </table>
        </div>
    </div>
</body>
</html>