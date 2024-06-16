<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #184A92;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        .chart-box {
            flex: 1;
            padding: 20px;
            max-width: 40%;
        }
        .controls {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <a href="dashboard.php">
                <img src="../images/Logo FKPark.png" alt="logo">
            </a>
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li><span class="material-symbols-outlined">flag</span><a href="newSummon.php">Issue Traffic Summon</a></li>
            <li><span class="material-symbols-outlined">monitoring</span><a href="trafficViolationRecord.php">Traffic Violation Record</a></li>
            <hr>
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a id="logoutLink" href="../weblogout.php">Logout</a></li>
        </ul>
    </aside>
</body>
</html>
