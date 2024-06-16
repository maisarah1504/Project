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
$qrFile = '';

if (isset($_POST['submit'])) {
    // Fetch user inputs
    $fname = $_POST['fname'];
    $fvehicle = $_POST['fvehicle'];
    $fdate = $_POST['fdate'];
    $ftime = $_POST['ftime'];
    $spaceID = $_POST['spaceID'];
    $duration = $_POST['duration'];

    // Insert booking into the database
    $sql = "INSERT INTO booking (spaceID, userID, startDate, startTime, duration) VALUES ('$spaceID', '$userID', '$fdate', '$ftime', '$duration)";

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
    $qrContent = "Parking Space ID: $spaceID\nFull Name: $fname\nVehicle Plate Number: $fvehicle\nStart Date: $fdate\nStart Time: $ftime\nDuration: $duration";
    $pngTempDir = '../qr_codes/';
    if (!file_exists($pngTempDir)) {
        mkdir($pngTempDir, 0777, true);
    }
    $filename = $pngTempDir . 'booking_' . $userID . '_' . time() . '.png';

    QRcode::png($qrContent, $filename);
    $qrFile = $filename;
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
            <?php if ($qrFile != ''): ?>
                <p><img src="<?php echo htmlspecialchars($qrFile); ?>" alt="QR Code"></p>
            <?php endif; ?>
            <p>Parking Space ID: <?php echo htmlspecialchars($spaceID); ?></p>
            <p>Full Name: <?php echo htmlspecialchars($fname); ?></p>
            <p>Vehicle Plate Number: <?php echo htmlspecialchars($fvehicle); ?></p>
            <p>Start Date: <?php echo htmlspecialchars($fdate); ?></p>
            <p>Start Time: <?php echo htmlspecialchars($ftime); ?></p>
            <p>Duration: <?php echo htmlspecialchars($duration); ?></p>
        </div>
    </div>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
