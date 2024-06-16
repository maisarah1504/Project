<?php
    $serverhost = "10.26.30.17";
    $username = "ca22076";
    $password = "ca22076";
    $database = "ca22076";

    // Create connection
    $conn = mysqli_connect($serverhost, $username, $password, $database);

    if(mysqli_connect_errno()) {
        echo "Connection Error: " . mysqli_connect_error();
        exit();
    }
?>

