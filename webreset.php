<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="webreset.css">
</head>
<body>

<div class="login-box">
  <form action="action_page.php" method="post">
    <div class="imgcontainer">
      <img src="./images/reset.png" alt="Avatar" class="avatar">
      <div class="login-text">RESET PASSWORD</div>
    </div>

    <div class="container">
      <label for="newpassword"><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" name="newpassword" required>

      <label for="confirmpassword"><b>Confirm New Password</b></label>
      <input type="password" placeholder="Re-enter New Password" name="confirmpassword" required>

      <button type="submit">RESET PASSWORD</button>
	  
	  <span class="back-to-login"><a href="weblogin.php"><i>Back to login</i></a></span>
    </div>
  </form>
</div>

</body>
</html>
