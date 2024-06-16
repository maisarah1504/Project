<?php 
    include('../navigation/sidebarStudent.php');
    include_once('NEW_BOOKING.php');
    require ('../webconnect.php');

// Initialize variables with default values
$filterDate = '';
$filterTime = '';
$filterSpace = '';

if (isset($_POST['filterDate'], $_POST['filterTime'], $_POST['filterSpace'])){
    $filterDate = $_POST['filterDate'];
    $filterTime = $_POST['filterTime'];
    $filterSpace = $_POST['filterSpace'];
}

$sql = "SELECT spaceID FROM parking_space WHERE location = '$filterSpace' AND status = 'AVAILABLE'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <style>

        .parking-list {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        p {
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            width: 60%;
            padding: 10px;
            background-color: #fff;
        }
        .parking-item {
            margin-top: 0;
            display: flex;
            justify-content: space-between;
            width: 60%;
            padding: 10px;
            background-color: #fff;
        }

        .book-button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="parking-list">
        <?php 
        echo "<p>Parking Location: " . htmlspecialchars($filterSpace) . "</p>";
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {  
                $spaceID = htmlspecialchars($row['spaceID']);
                echo '<div class="parking-item">';
                echo '<p>Parking Space ID: ' . $spaceID . '</p>';
                echo '<form method="post" action="CONFIRMATION.php">';
                echo '<input type="hidden" name="spaceID" value="' . $spaceID . '">';
                echo '<input type="hidden" name="filterDate" value="' . htmlspecialchars($filterDate) . '">';
                echo '<input type="hidden" name="filterTime" value="' . htmlspecialchars($filterTime) . '">';
                echo '<input type="submit" value="Book Now" class="book-button">';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p><b>No available parking spaces.</b></p>';
        }
        ?>
    </div>
</body>
</html>
