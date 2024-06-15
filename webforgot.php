<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="webforgot.css">
</head>
<body>

<div class="login-box">
  <form action="forgot_password_action.php" method="post">
    <div class="imgcontainer">
      <img src="./images/forgot.png" alt="Avatar" class="avatar">
      <div class="login-text">FORGOT PASSWORD</div>
    </div>

    <div class="container">
      <p class="forgot-text">Enter your email address and we'll send you a link to reset your password</p>

      <label for="email"><b>Email Address</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <button type="submit">REQUEST LINK</button>

      <span class="back-to-login"><a href="weblogin.php"><i>Back to login</i></a></span>
    </div>
  </form>
</div>

</body>
</html>
