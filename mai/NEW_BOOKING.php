<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="MAIN.css">
    <link rel="stylesheet" href="user_booking.css">
    <link rel="stylesheet" href="new_booking.css">
    <script src="script.js"></script>
<?php
        include('connection.php')
    ?>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="images/Logo FKPark.png" alt="logo">
            <h2>FKPark</h2>
        </div>  
        <ul class="links">
            <li>                
            <div class="menu-item">
                <span class="material-symbols-outlined">browse</span>
                <span class="dropdown-title">Booking<span class="material-symbols-outlined">expand_more</span></span>
            </div>
            <div class="dropdown-container">
                <a href="">New Booking</a>
                <a href="#">Booking History</a>
            </div>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <div class="form">
            <form action="PARKING_LIST.php" method="get" > 
                <h3>Parking List</h3>

                <label for="filter_date">Date</label>
                <input type="date" id="filterDate" method="get" />

                <label for="filter_time">Time</label>
                <input type="time" id="filterTime" method="get" />
                
                <label for="filter_park_space">Location</label>
                <input type="text" id="filterSpace" method="get" />

                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="container_parking">

            <?php 
                include('PARKING_LIST.php');

            ?>
            
        </div>

    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
