<?php
    include('MAIN.php');
    require_once('connection.php'); 

    $query_booking = "select * from booking";
    $query_parking = "select * from parking_space";
    $query_user = "select * from user";

    $result_booking = mysqli_query($conn, $query_booking);
    $result_parking = mysqli_query($conn, $query_parking);
    $result_user = mysqli_query($conn, $query_user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="confirmation.css">

    <?php 
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $fvehicle = $_POST['fvehicle'];
        $fdate = $_POST['fdate'];
        $ftime = $_POST['ftime'];

        $conn = new mysqli('localhost', 'root', '', 'fkpark');
        $userID = "select userID from user where username = '$fname'";
        $sql = "INSERT INTO booking(spaceID, userID, startDate, startTime) VALUES ('$spaceID', '$userID', '$fdate', '$ftime') ";

        if ($conn ->query($sql))
        {
            $message = "<div class='alert-success'>Booking Successful</div>";

        }else 
        {
            $message = "<div class='alert-fail'>Booking Failed</div>";
        }
    }
    ?>

</head>
<body>
<main>
        <div class="container">
            <div class="card-header">
                <h2 class="display">Booking Form</h2>
            </div>
            <div class="body">
                <?php echo isset($message) ? $message : ''; ?>
                <form method="POST" action="" autocomplete="off">
                    <table class="table-bordered">
                        <tr>
                            <td>
                                <label id="fname">Full Name: </label>
                                    <input type="text" name="fname">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label id="fvehicle">Vehicle Plate Number: </label>
                                <input type="text" name="fvehicle">
                            </td>
                        </tr>
                        <tr>
                            <td>Start time
                                <input type="time" name="ftime">
                            </td>
                            <td>
                                Start date
                                <input type="date" name="fdate">
                            </td>
                        </tr>
                    </table>
                    <button class="submit" type="submit" name="submit"><a href="CONFIRMED.php" <?php 
                        urlencode('fname') . urlencode('fvehicle') . urlencode('ftime') . urlencode('fdate'); 
                    ?>>SUBMIT</a></button>
                    <button> <a href="NEW_BOOKING.php" class="btn btn-success"> BACK </a></button>
                </form>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

</body>    

</html>
