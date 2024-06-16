<?php

// Include the database connection file
include 'webconnect.php';

$message = "";

// Function to handle login
function handle_login($conn) {
    global $message;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = strtolower($_POST['role']); // Convert role to lowercase for comparison

        // Debug: Check collected form data
        error_log("Username: $username, Role: $role");

        // Check the credentials in the database
        $sql = "SELECT * FROM user WHERE username = ? AND role = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $role);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            // Debug: Check if user is found
            if ($row) {
                error_log("User found: " . print_r($row, true));
            } else {
                error_log("User not found.");
            }

            if ($row && password_verify($password, $row['password'])) {
                // Credentials are correct, start session and store user data
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role == "student") {
                    header("Location: studentdashboard.php");
                } elseif ($role == "staff") {
                    header("Location: dashboard.php");
                } elseif ($role == "administrator") {
                    header("Location: admindashboard.php");
                }
                exit();
            } else {
                // Credentials are incorrect, show error message
                $message = "Username, Password, or Role is incorrect.";
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            $message = "Failed to prepare the SQL statement.";
        }

        // Set session expiration time
        $_SESSION['expire_time'] = time() + 3600;
    }
}

// Call the login handler function
handle_login($conn);

// Close the database connection
mysqli_close($conn);
?>
