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
    <link rel="stylesheet" href="webregister.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            height: 100vh;
            background-color: #f0f0f0; /* Background color instead of image */
        }

        main {
            width: 80%;
            max-width: 1000px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dashboard {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
            height: 250px;
        }

        .box {
            width: 30%;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box h3 {
            margin-bottom: 10px;
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
    <main>
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
    </main>
</body>
</html>
