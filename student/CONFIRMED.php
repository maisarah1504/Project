<?php
include('MAIN.php');
require_once('connection.php'); 

if (isset($_POST['submit'])) {
    // Fetch user inputs
    $fname = $_POST['fname'];
    $fvehicle = $_POST['fvehicle'];
    $fdate = $_POST['fdate'];
    $ftime = $_POST['ftime'];
    $spaceID = $_POST['spaceID'];

    // Assume connection already established in 'connection.php'
    $conn = new mysqli('localhost', 'root', '', 'fkpark');

    // Fetch userID based on username
    $userIDQuery = "SELECT userID FROM user WHERE username = '$fname'";
    $userIDResult = mysqli_query($conn, $userIDQuery);
    if ($userIDResult && mysqli_num_rows($userIDResult) > 0) {
        $userIDRow = mysqli_fetch_assoc($userIDResult);
        $userID = $userIDRow['userID'];

        // Insert booking into the database
        $sql = "INSERT INTO booking (spaceID, userID, startDate, startTime) VALUES ('$spaceID', '$userID', '$fdate', '$ftime')";
        $insert = "insert into vehicle (vehicleID, userID) values ('$fvehicle', '$userID')";
        if ($conn->query($sql) === TRUE) {
            // Update parking space status to 'BOOKED'
            $updateSpaceStatusSql = "UPDATE parking_space SET status = 'BOOKED' WHERE spaceID = '$spaceID'";
            if ($conn->query($updateSpaceStatusSql) === TRUE) {
                $message = "<div class='alert-success'><b>Booking Successful</b></div>";
            } else {
                $message = "<div class='alert-fail'>Booking Successful but Parking Space Update Failed: " . $conn->error . "</div>";
            }
        } else {
            $message = "<div class='alert-fail'>Booking Failed: " . $conn->error . "</div>";
        }
    } else {
        echo "<script>
                alert('Booking Failed: User not found');
                window.location.href = 'MAIN.php';
              </script>";
        exit();
    }
}
?>

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
    <div class="container-details-confirmed">
        <div class="text">
            <h2>BOOKING DETAILS</h2>
        </div>
        <?php echo isset($message) ? $message : ''; ?>
        <div class="details">
            <p>Parking Space ID: <?php echo htmlspecialchars($spaceID); ?></p>
            <p>Full Name: <?php echo htmlspecialchars($fname); ?></p>
            <p>Vehicle Plate Number: <?php echo htmlspecialchars($fvehicle); ?></p>
            <p>Start Date: <?php echo htmlspecialchars($fdate); ?></p>
            <p>Start Time: <?php echo htmlspecialchars($ftime); ?></p>
        </div>
    </div>

    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
