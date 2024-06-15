<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="weblogout.css">
</head>
<body>

<div class="login-box">
  <form action="weblogin.php" method="get">
    <div class="imgcontainer">
      <img src="./images/logout.png" alt="Avatar" class="avatar">
      <div class="login-text">LOGGED OUT</div>
    </div>

    <div class="container">
      <p class="forgot-text">Thank you for using FKPark. See you later</p>

      <button type="submit">BACK TO LOGIN</button>
    </div>
  </form>
</div>

</body>
</html>

