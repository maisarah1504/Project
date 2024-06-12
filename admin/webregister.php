<?php
// Include the database connection file
include 'webconnect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $fullName = $_POST['full-name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);


// Check if the user already exists
    $checkSql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $checkSql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User already exists
        $message = "Duplicate detected. This user already exists.";
    } else {
    // Insert the data into the database
    $sql = "INSERT INTO user (fullname, username, role, password) VALUES ('$fullName', '$username', '$role', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "\\n" . mysqli_error($conn);
    }
	}

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="webregister.css">
    <script type="text/javascript">
        function showMessage(message) {
            if (message !== "") {
                alert(message);
                window.location.href = "webregister.php";
            }
        }
    </script>
</head>

<body onload="showMessage('<?php echo $message; ?>')">
    <div class="container">
        <h1 class="title">User Registration</h1>
        <form method="POST" action="webregister.php">
            <div class="form-group">
                <label for="full-name">Full Name<span class="required">*</span></label>
                <input type="text" id="full-name" name="full-name" required>
            </div>

            <div class="form-group">
                <label for="username">Student/Staff ID<span class="required">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="role">Role<span class="required">*</span></label>
                <select id="role" name="role" required>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                    <option value="administrator">Administrator</option>
                </select>
            </div>
			
			<div class="form-group">
                <label for="password">Password<span class="required">*</span></label>
                <input type="text" id="password" name="password" required>
            </div>

            <div class="form-group-button">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</body>

</html>