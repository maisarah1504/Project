<?php 
    //require '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="main.css">
</head>
<body onload="showMessage('<?php echo $message; ?>')">
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <a href="studentdashboard.php"><span class="material-symbols-outlined">dashboard</span>Student Dashboard</a>
            </li>
            <li>
                <a href="studentprofile.php"><span class="material-symbols-outlined">person</span>Student Profile</a>
            </li>
            <li>
                <a href="vehicleregistration.php"><span class="material-symbols-outlined">directions_car</span>Vehicle Registration</a>
            </li>
            <li class="dropdown-link">
                <a href="#"><span class="material-symbols-outlined">book</span>Bookings</a>
                <ul class="dropdown">
                    <li><a href="#">New Booking</a></li>
                    <li><a href="#">Booking History</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="material-symbols-outlined">local_parking</span>My Summon</a>
            </li>
            <hr>
            <li class="logout-link">
                <a href="weblogout.php"><span class="material-symbols-outlined">logout</span>Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <!-- Main content goes here -->
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
