<?php 
    include('MAIN.php');
    require('connection.php');

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="script.js"></script>
    <style>
        .filter-history {
            display: flex;
            padding-top: 20px;
            padding-left: 150px; /* Adjust the left padding to leave space for the sidebar */
        }

    </style>
</head>
    <body>
        <div class="filter-history">
            <form action="MY_BOOKING.php" method="post">
                <h2>MY BOOKING</h2>
                <label for="filter-history">Type</label>
                <select name="filter-history" id="filter-history">
                    <option value="current">New</option>
                </select>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </body>
</html>