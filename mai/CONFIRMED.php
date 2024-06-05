<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="confirmed.css">
</head>
<body>
    <?php include('MAIN.php'); ?>

    <div class="container-details">
        <div class="text">
            <h3>BOOKING DETAILS</h3>
        </div>
        <img>
        <?php
            // Include PHP code to display booking details
            include('BOOKING_DETAILS.php');
        ?>
    </div>

    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
