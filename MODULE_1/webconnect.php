<?php
    $dbname = "fkpark";
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }
?>
