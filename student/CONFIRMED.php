<?php
session_start();
include('../navigation/sidebarStudent.php');
require('../webconnect.php'); 
require_once('../phpqrcode/qrlib.php'); // Include the QR code library

if (!isset($_SESSION['userID'])) {
    die("User not logged in");
}

$userID = $_SESSION['userID'];
$message = "";

if (isset($_POST['submit'])) {
    // Fetch user inputs
    $fname = $_POST['fname'];
    $fvehicle = $_POST['fvehicle'];
    $fdate = $_POST['fdate'];
    $ftime = $_POST['ftime'];
    $spaceID = $_POST['spaceID'];

    // Insert booking into the database
    $sql = "INSERT INTO booking (spaceID, userID, startDate, startTime) VALUES ('$spaceID', '$userID', '$fdate', '$ftime')";

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

    // Generate QR code
    $qrContent = "Parking Space ID: $spaceID\nFull Name: $fname\nVehicle Plate Number: $fvehicle\nStart Date: $fdate\nStart Time: $ftime";
    $qrFile = '../qr_codes/booking_' . $userID . '_' . time() . '.png'; // Ensure the path is correct and the directory is writable
    QRcode::png($qrContent, $qrFile);
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
            <p><img src="<?php echo $qrFile; ?>" alt="QR Code"></p>
            <p>Parking Space ID: <?php echo htmlspecialchars($spaceID); ?></p>
            <p>Full Name: <?php echo htmlspecialchars($fname); ?></p>
            <p>Vehicle Plate Number: <?php echo htmlspecialchars($fvehicle); ?></p>
            <p>Start Date: <?php echo htmlspecialchars($fdate); ?></p>
            <p>Start Time: <?php echo htmlspecialchars($ftime); ?></p>
        </div>
    </div>
    <?php 
        include "phpqrcode/qrlib.php";
        $png_temp_dir = 'temp/';
        if(!file_exists($png_temp_dir))
            mkdir($png_temp_dir);
        $filename = $png_temp_dir . 'test.png';
        
        if(isset($_POST['submit'])) {
            $codeString = $_POST['spaceID'] . "\n";
            $codeString = $_POST['fname'] . "\n";
            $codeString = $_POST['fvehicle'] . "\n";
            $codeString = $_POST['fdate'] . "\n";
            $codeString = $_POST['ftime'] . "\n";
            $codeString = $_POST['duration'] . "\n";

            $filename = $png_temp_dir . 'test' . md5($codeString) . 'png';

            QRcode::png($codeString, $filename);

            echo '<img src="' . $png_temp_dir . basename($filename) . '" /><hr/>';
        }

    ?>

    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
