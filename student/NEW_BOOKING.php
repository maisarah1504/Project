<?php 
include "../navigation/sidebarStudent.php";
require('connection.php');
//require "../MODULE_1/weblogin.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="script.js"></script>
    <style>
        #filterTime {
            font-size: 16px;
        }

        h3 {
            padding-top: 20px;
            padding-left: 200px;
            margin: 10px;
        }

        main {
            padding-top: 10px;
            padding-left: 150px;
        }

        .filter-form {
            margin: 20px;
            padding-left: 250px;
            display: block;
            background-color: white;
            width: 80%;
            height: 500%;
            position: inherit;
        }
        label {
            margin: 10px;
        }

    </style>
</head>
<body>
    <main>
        <div class="filter-form">
            <form action="PARKING_LIST.php" method="post"> 
                <h3>Parking List</h3>

                <label for="filter_date">Date</label>
                <input type="date" id="filterDate" name="filterDate" required>

                <label for="filter_time">Time</label>
                <input type="time" id="filterTime" name="filterTime" required>
                
                <label for="filter_park_space">Location</label>
                <input type="text" id="filterSpace" name="filterSpace" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
