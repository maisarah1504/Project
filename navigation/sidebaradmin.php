<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-image: url("../images/ground.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(2.5px);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
        }

        .sidebar {
            width: 110px;
            background-color: #184A92;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }

        .links {
            list-style-type: none;
            padding: 0;
        }

        .links li {
            margin: 20px 0;
        }

        .links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .links a:hover {
            text-decoration: none;
        }

        .links .material-symbols-outlined {
            margin-right: 10px;
        }

        .logout-link {
            margin-top: auto;
        }

        main {
            margin-left: 150px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            height: calc(100vh - 40px);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .calendar-wrapper {
    width: 90%;
    margin: 0 auto;
}

.calendar-container {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%; /* Set width to 100% */
    max-width: 600px; /* Set a maximum width to maintain readability */
    margin: 0 auto; /* Center the calendar container */
}
        hr {
            border: 2px solid #184A92;
            margin: 20px 0;
        }

        .charts-container {
            width: 90%; /* Adjusted width */
            margin: 20px auto 0 auto; /* Removed bottom margin */
        }

        .chart {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        th {
            background: #184A92;
            color: white;
            font-weight: bold;
        }

        .today {
            background: #FFD500;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #184A92;
            color: white;
            position: fixed;
            width: 140%;
            bottom: 0;
            margin-left: 514px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="admindashboard.php">Admin Dashboard</a>
            </li>
            <li>
                <span class="material-symbols-outlined">book</span>
                <a href="admin_booking.php">Booking Page</a>
            </li>
            <li>
                <span class="material-symbols-outlined">directions_car</span>
                <a href="parkingArea.php">Admin Parking Space</a>
            </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="webregister.php">User Registration</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="listparking.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="../student/weblogout.php">Logout</a>
            </ul>
    </aside>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
    </body>
    </HTML>
