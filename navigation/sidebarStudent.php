<?php 
    require '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="../script.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-image: url("../images/fkom.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(2.5px);
            overflow-x: hidden;
            position: relative;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 110px; /* Initial width of the sidebar */
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #184A92;
            color: black; /* Text color */
            backdrop-filter: blur(17px);
            -webkit-backdrop-filter: blur(17px);
            border-right: 1px solid rgba(255, 255, 255, 0.7);
            transition: width 0.3s ease;
            overflow: hidden; /* Ensure no overflow */
        }

        .sidebar:hover {
            width: 260px; /* Expanded width on hover */
        }

        .sidebar .logo {
            display: flex;
            align-items: center;
            padding: 25px 10px 15px;
        }

        .logo img {
            width: 43px;
            border-radius: 50%;
        }

        .logo h2 {
            font-size: 1.15rem;
            font-weight: 600;
            margin-left: 15px;
            display: none; /* Initially hidden */
        }

        .sidebar:hover .logo h2 {
            display: block; /* Display on hover */
        }

        .sidebar .links {
            list-style: none;
            margin-top: 20px;
            overflow-y: auto;
            scrollbar-width: none;
            height: calc(100% - 140px); /* Adjust height */
        }

        .sidebar .links::-webkit-scrollbar {
            display: none; /* Hide scrollbar */
        }

        .links li {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            position: relative; /* For dropdown positioning */
        }

        .links li:hover {
            cursor: pointer;
            background: #fff; /* Background color on hover */
        }

        .links li a {
            display: flex; /* Flex to align items */
            align-items: center;
            color: black; /* Text color */
            padding: 10px;
            font-weight: 500;
            text-decoration: none;
            width: 100%; /* Ensure full width clickable */
        }

        .links li a span {
            margin-right: 10px; /* Space between icon and text */
        }

        .links .link-text {
            display: none; /* Initially hidden */
        }

        .sidebar:hover .links .link-text {
            display: block; /* Display on hover */
        }

        .links .dropdown-content {
            display: none; /* Initially hidden */
            position: absolute;
            left: 0;
            top: 100%; /* Position directly below the parent li */
            background-color: #184A92; /* Background color */
            min-width: 100%;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1; /* Ensure dropdown is above other elements */
        }

        .links .dropdown-content a {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #fff; /* Text color */
            transition: background-color 0.3s ease;
        }

        .links .dropdown-content a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Background color on hover */
        }

        .links .dropdown-link:hover .dropdown-content {
            display: block; /* Display on hover */
        }

        footer {
            text-align: center;
            color: #fff;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #184A92;
            backdrop-filter: blur(17px);
        }

        main {
            margin-left: 110px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            height: calc(100vh - 40px);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body onload="showMessage('<?php echo $message; ?>')">
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <a href="studentdashboard.php"><span class="material-symbols-outlined">dashboard</span><span class="link-text">Student Dashboard</span></a>
            </li>
            <li>
                <a href="studentprofile.php"><span class="material-symbols-outlined">person</span><span class="link-text">Student Profile</span></a>
            </li>
            <li>
                <a href="vehicleregistration.php"><span class="material-symbols-outlined">directions_car</span><span class="link-text">Vehicle Registration</span></a>
            </li>
            <li class="dropdown-link">
                <a href="#"><span class="material-symbols-outlined">book</span><span class="link-text">Bookings</span></a>
                <ul class="dropdown-content">
                    <li><a href="../student/NEW_BOOKING.php">New Booking</a></li>
                    <li><a href="../student/BOOKING_LIST.php">Booking History</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="material-symbols-outlined">local_parking</span><span class="link-text">My Summon</span></a>
            </li>
            <hr>
            <li class="logout-link">
                <a href="../weblogout.php"><span class="material-symbols-outlined">logout</span><span class="link-text">Logout</span></a>
            </li>
        </ul>
    </aside>
    <main>
        <!-- Main content goes here -->
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
