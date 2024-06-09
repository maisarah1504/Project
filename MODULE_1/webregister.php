<?php
// Include the database connection file
include 'webconnect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $fullName = $_POST['full-name'];
    $idCardNo = $_POST['id-card-no'];
    $role = $_POST['role'];

    // Insert the data into the database
    $sql = "INSERT INTO user (userID, username, role) VALUES ('$idCardNo', '$fullName', '$role')";

    if (mysqli_query($conn, $sql)) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "\\n" . mysqli_error($conn);
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
                <label for="id-card-no">Student/Staff ID<span class="required">*</span></label>
                <input type="text" id="id-card-no" name="id-card-no" required>
            </div>

            <div class="form-group">
                <label for="role">Role<span class="required">*</span></label>
                <select id="role" name="role" required>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                    <option value="administrator">Administrator</option>
                </select>
            </div>

            <div class="form-group-button">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</body>

</html>
