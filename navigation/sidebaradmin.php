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

        .dropdown-link {
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            background-color: #262626;
            padding-left: 20px;
        }

        .dropdown-content a {
            font-size: 16px;
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .dropdown-content a:hover {
            background-color: #333;
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
            <li class="dropdown-link">
                <span class="material-symbols-outlined">person</span>
                <a href="#">User Management</a>
                <div class="dropdown-content">
                    <a href="userlist.php">User List</a>
                    <a href="webregister.php">User Registration</a>
                </div>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="listparking.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="../weblogout.php">Logout</a>
            </li>
        </ul>
    </aside>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
    
    <script>
        document.querySelector(".dropdown-link").addEventListener("click", function() {
            var dropdownContent = this.querySelector(".dropdown-content");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    </script>
</body>
</html>
