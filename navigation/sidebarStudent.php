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
    width: 110px;
    height: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    background: #184A92;
    border-right: 1px solid rgba(255, 255, 255, 0.7);
    transition: width 0.3s ease;
    overflow: auto;
}

.sidebar:hover {
    width: 260px;
}

.sidebar .logo {
    color: #000;
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
    display: none;
}

.sidebar:hover .logo h2 {
    display: block;
}

.sidebar .links {
    list-style: none;
    margin-top: 20px;
    overflow-y: auto;
    scrollbar-width: none;
    height: calc(100% - 140px);
}

.sidebar .links::-webkit-scrollbar {
    display: none;
}

.links li {
    display: flex;
    border-radius: 4px;
    align-items: center;
}

.links li:hover {
    cursor: pointer;
    background: #fff;
}

.links h4 {
    color: #222;
    font-weight: 500;
    display: none;
    margin-bottom: 10px;
}

.sidebar:hover .links h4 {
    display: block;
}

.links hr {
    margin: 10px 8px;
    border: 1px solid black;
}

.sidebar:hover .links hr {
    border-color: black;
}

.links li span {
    padding: 12px 10px;
}

.links li a {
    padding: 10px;
    color: #000;
    display: none;
    font-weight: 500;
    white-space: nowrap;
    text-decoration: none;
}

.sidebar:hover .links li a {
    display: block;
}

.links .dropdown {
    position: relative; /* Ensure dropdown content is positioned relative to this element */
    cursor: pointer; /* Change cursor to pointer on hover */
}


.links .dropdown-content {
    display: none; /* Initially hide the dropdown content */
    flex-direction: column;
    background-color: #fff;
    min-width: 160px;
    overflow:hidden;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    left: 110px; /* Adjust the position of the dropdown content */
    top: 0; /* Position the dropdown content below the dropdown */
}

.links .dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: #333;
    transition: background-color 0.3s ease;
}

.links .dropdown-content a:hover {
    background-color: rgba(0, 0, 0, 0.1);
}

.links .dropdown:hover .dropdown-content {
    display: flex; /* Show dropdown content when dropdown is hovered */
}


.container-details {
    display: block;
    position: relative;
    margin: 20px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container-details h3 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
}

.container-details p {
    color: #666;
    font-size: 16px;
    margin-bottom: 5px;
}

.container-details img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

footer {
    text-align: center;
    color: black;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #184A92;
    backdrop-filter: blur(17px);
    transition: margin-left 0.3s ease;
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
