<?php 
    //require '../session.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="main.css">
    <script src="script.js" defer></script>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>  
        <ul class="links">
            <li class="dropdown">               
                <span class="material-symbols-outlined">book</span>
                <a href="#" class="dropdown-btn">Bookings</a>                    
                <span class="material-symbols-outlined">expand_more</span>
                <div class="dropdown-content">
                    <a href="NEW_BOOKING.php">New Booking</a>
                    <a href="BOOKING_HISTORY.php">Booking History</a>
                </div>
            </li>
            <hr style="color: black;">
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="../MODULE_1/weblogout.php">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
