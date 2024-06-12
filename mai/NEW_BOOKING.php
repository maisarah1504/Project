<?php 
include('sidebar.php');
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="user_booking.css">
    <link rel="stylesheet" href="new_booking.css">
    <script src="script.js"></script>
</head>
<body>
    <main>
        <div class="form">
            <form action="PARKING_LIST.php" method="post"> 
                <h3>Parking List</h3>

                <label for="filter_date">Date</label>
                <input type="date" id="filterDate" name="filterDate" >

                <label for="filter_time">Time</label>
                <input type="time" id="filterTime" name="filterTime" >
                
                <label for="filter_park_space">Location</label>
                <input type="text" id="filterSpace" name="filterSpace"  >

                <button type="submit">Submit</button>
            </form>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
