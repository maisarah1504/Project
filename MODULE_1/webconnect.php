<?php
    $dbname = "fkpark";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $port = 3306; // Specify the port number

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if(!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }
?>

