<?php
session_start();
include '../webconnect.php'; // Adjust the path to the correct location

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $userID = $_SESSION['userID'];

    $update_query = "UPDATE user SET fullname='$fullname', username='$username' WHERE userID='$userID'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: studentprofile.php");
    } else {
        $_SESSION['message'] = "Error updating profile: " . mysqli_error($conn);
    }
}

$userID = $_SESSION['userID'];
$user_query = "SELECT fullname, username FROM user WHERE userID = '$userID'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Information</title>
    <link rel="stylesheet" href="studentprofile.css">
</head>
<body>
    <main>
        <h1 class="title">Edit Student Information</h1>
        <form action="editstudent.php" method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $user_row['fullname']; ?>" required>
            <br>
            <label for="username">Student/Staff ID:</label>
            <input type="text" id="username" name="username" value="<?php echo $user_row['username']; ?>" required>
            <br>
            <button type="submit">Save</button>
        </form>
    </main>
</body>
</html>
