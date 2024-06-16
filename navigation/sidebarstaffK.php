<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
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
    background-image: url("../images/img-bg.jpg");
    background-position: center;
    background-size: cover;
    backdrop-filter: blur(2.5px);
    overflow-x: hidden;
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
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(17px);
    -webkit-backdrop-filter: blur(17px);
    border-right: 1px solid rgba(255, 255, 255, 0.7);
    transition: width 0.3s ease;
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
    border: 1px solid #4c4c4c;
}

.sidebar:hover .links hr {
    border-color: transparent;
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

.links .logout-link {
    margin-top: 20px;
}

main {
    flex: 1;
    margin-left: 110px; /* Space for the sidebar */
    padding: 20px;
}

footer {
    text-align: center;
    color: white;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    margin-left: 110px; /* Space for the sidebar */
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(17px);
}
    </style>
</head>
<body>
    <aside style="background: #184A92;" class="sidebar">
        <div class="logo">
            <a href="dashboard.php">
                <img src="../images/Logo FKPark.png" alt="logo">
            </a>
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li><span class="material-symbols-outlined">flag</span><a href="newSummon.php">Issue Traffic Summon</a></li>
            <li><span class="material-symbols-outlined">monitoring</span><a href="trafficViolationRecord.php">Traffic Violation Record</a></li>
            <li><span class="material-symbols-outlined">check</span><a href="vehicleApproval.php">Vehicle Approval</a></li>
            <hr>
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a id="logoutLink" href="../weblogout.php">Logout</a></li>
        </ul>
    </aside>
</body>
</html>
