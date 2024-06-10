<?php
// Start the session
session_start();

// Include the database connection file
include 'webconnect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $userID = $_POST['user-id'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check the credentials in the database
    $sql = "SELECT * FROM user WHERE userID = ? AND password = ? AND role = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $userID, $password, $role);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Credentials are correct, start session and store user data
        $_SESSION['userID'] = $userID;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role == "student") {
            header("Location: studentdashboard.php");
        } elseif ($role == "staff") {
            header("Location: staffdashboard.php");
        } elseif ($role == "administrator") {
            header("Location: admindashboard.php");
        }
        exit();
    } else {
        // Credentials are incorrect, show error message
        $message = "User ID, Password, or Role is incorrect.";
    }

    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
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
            <img src="img_310910.png" alt="Avatar" class="avatar">
        </div>
        <h1 class="login-text">LOGIN</h1>
        <form method="POST" action="weblogin.php">
            <div class="form-group">
                <label for="user-id"><strong>User ID</strong><span class="required">*</span></label>
                <input type="text" id="user-id" name="user-id" required>
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
