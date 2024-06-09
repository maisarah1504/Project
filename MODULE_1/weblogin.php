<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="weblogin.css">
</head>
<body>

<div class="login-box">
  <form action="action_page.php" method="post">
    <div class="imgcontainer">
      <img src="img_310910.png" alt="Avatar" class="avatar">
      <div class="login-text">LOGIN</div>
    </div>

    <div class="container">
      <label for="uid"><b>User ID</b></label>
      <input type="text" placeholder="Enter User ID" name="uid" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <span class="psw"><a href="webforgot.php"><i>Forgot Password?</i></a></span>

      <label for="role"><b>Role</b></label>
      <select name="role" required>
        <option value="student">Student</option>
        <option value="staff">Staff</option>
        <option value="admin">Administrator</option>
      </select>

      <button type="submit">LOGIN</button>
    </div>
  </form>
</div>

</body>
</html>
