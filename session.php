<?php
// Start the session
if (session_status() == PHP_SESSION_NONE){
    session_start();
}


//check session variables
if (!isset($_SESSION['userID']) || !isset($_SESSION['expire_time'])) {
    echo "Session variable not set.";
    header("Location: ");
    exit();
}

//check time 
if (time() > $_SESSION['expire_time']){
    echo "Session expired";

    session_unset();
    session_destroy();
    header("Location: ");
    exit();
}

$_SESSION['expire_time'] = time() + 3600; 
?>