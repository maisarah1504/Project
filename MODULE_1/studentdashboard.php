<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="webregister.css">
    <style>
        body {
            display: flex;
            background-image: url("fkom.jpg"); /* Adjusted background image path */
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
            width: 200px; /* Keep original width */
            background-color: #184A92;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 40px;
            margin-right: 10px;
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

    .links a:hover:not(span.material-symbols-outlined) {
    text-decoration: underline;
}

        .links .material-symbols-outlined {
            margin-right: 10px;
        }

        .logout-link {
            margin-top: auto;
        }

        main {
            margin-left: 220px;
            padding: 20px;
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%; /* Adjust width */
            max-width: 800px; /* Limit maximum width */
        }

        .dashboard {
            display: flex;
            justify-content: space-between; /* Ensure the boxes are spread apart */
            margin-top: 20px; /* Add some space between the title and boxes */
			height: 250px; /* Adjust the height as needed */
        }

        .box {
            width: 30%; /* Adjust width */
            background-color: #f0f0f0; /* Example background color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box h2 {
            margin-bottom: 10px; /* Add some space between the title and content */
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #184A92;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
    <script type="text/javascript">
        function showMessage(message) {
            if (message !== "") {
                alert(message);
                window.location.href = "webregister.php";
            }
        }
    </script>
</head>
<body onload="showMessage('<?php echo $message; ?>')">
    <aside class="sidebar">
        <div class="logo">
            <img src="logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <a href="studentdashboard.php"><span class="material-symbols-outlined">dashboard</span>Student Dashboard</a>
            </li>
            <li>
                <a href="#"><span class="material-symbols-outlined">person</span>Student Profile</a>
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
        <div class="container">
            <h1 class="title">Student Dashboard</h1>
            <div class="dashboard">
                <div class="box">
                    <h3>My Vehicle</h3>
                    <!-- Add content for My Vehicle here -->
                </div>
                <div class="box">
                    <h3>My Booking</h3>
                    <!-- Add content for My Booking here -->
                </div>
                <div class="box">
                    <h3>Available Parking Spaces</h3>
                    <!-- Add content for Available Parking Spaces here -->
                </div>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>

