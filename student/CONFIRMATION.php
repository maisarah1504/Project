<?php
include('../navigation/sidebarStudent.php');
require_once('../webconnect.php'); 

$ftime = isset($_POST['filterTime']) ? htmlspecialchars($_POST['filterTime']) : '';
$fdate = isset($_POST['filterDate']) ? htmlspecialchars($_POST['filterDate']) : '';
$spaceID = isset($_POST['spaceID']) ? htmlspecialchars($_POST['spaceID']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="confirmation.css">
</head>
<body>
    <div class="container">
        <div class="card-header">
            <h2 class="display">Booking Form</h2>
        </div>
        <div class="body">
            <?php echo isset($message) ? $message : ''; ?>
            <form method="POST" action="CONFIRMED.php" autocomplete="off">
                <table class="table-bordered">
                    <tr>
                        <td>
                            <label id="fname">Full Name: </label>
                            <input type="text" name="fname" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="fvehicle">Vehicle Plate Number: </label>
                            <input type="text" name="fvehicle" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Start time: <?php echo $ftime; ?>
                            <input type="hidden" name="ftime" value="<?php echo $ftime; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Start date: <?php echo $fdate; ?>
                            <input type="hidden" name="fdate" value="<?php echo $fdate; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="spaceID" value="<?php echo $spaceID; ?>">
                        </td>
                    </tr>
                </table>
                <button class="submit" type="submit" name="submit">SUBMIT</button>
                <button><a href="NEW_BOOKING.php" class="back">BACK</a></button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>    
</html>
