<?php
session_start();

// Include the session handling file
require "./session.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="weblogin.css">
    <script type="text/javascript">
        function showMessage(message) {
            if (message !== "") {
                alert(message);
                window.location.href = "weblogin.php";
            }
        }
    </script>
</head>
<body onload="showMessage('<?php echo $message; ?>')">
    <div class="login-box">
        <div class="imgcontainer">
            <img src="./images/img_310910.png" alt="Avatar" class="avatar">
        </div>
        <h1 class="login-text">LOGIN</h1>
        <form method="POST" action="weblogin.php">
            <div class="form-group">
                <label for="username"><strong>Username</strong><span class="required">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><strong>Password</strong><span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role"><strong>Role</strong><span class="required">*</span></label>
                <select id="role" name="role" required>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                    <option value="administrator">Administrator</option>
                </select>
            </div>
            <div class="form-group-button">
                <button type="submit">LOGIN</button>
            </div>
        </form>
        <div class="forgot-psw">
            <a href="webforgot.php" class="psw">Forgot password?</a>
        </div>
    </div>
</body>
</html>
