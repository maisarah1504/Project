<?php
function connectDatabase() {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "fkPark";


    // Create connection
    $conn = new mysqli($servername, $username, $password);

    //Create database if not exist
    createDatabase($conn, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully<br>";

    if ($dbname) {
        // Select the database
        if (!$conn->select_db($dbname)) {
            die("Database selection failed: " . $conn->error);
        }
    }

    return $conn;
}

function createDatabase($conn, $dbname) {
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

function dropDatabase($conn, $dbname) {
    $sql = "DROP DATABASE IF EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        //echo "Database $dbname dropped successfully<br>";
    } else {
        echo "Error dropping database: " . $conn->error;
    }
}