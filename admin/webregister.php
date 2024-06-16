<?php 
session_start(); // Start the session

// Include the sidebar and database connection file
include "../navigation/sidebaradmin.php";
include '../webconnect.php'; // Adjust the path to the correct location

// Check if userID is set in the session
if (!isset($_SESSION['userID'])) {
    die("User not logged in");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        // Handle delete operation
        if (isset($_POST['selected_users'])) {
            $selected_users = $_POST['selected_users'];
            foreach ($selected_users as $user_id) {
                $deleteSql = "DELETE FROM user WHERE id = ?";
                $stmt = mysqli_prepare($conn, $deleteSql);
                mysqli_stmt_bind_param($stmt, "i", $user_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            $message = "Selected users deleted successfully.";
        } else {
            $message = "No users selected for deletion.";
        }
    } else {
        // Handle user registration
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
            $sql = "INSERT INTO user (fullname, username, role, password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $fullName, $username, $role, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $message = "New record created successfully.";
            } else {
                $message = "Error: " . $sql . "\n" . mysqli_error($conn);
            }
        }

        // Close the database connection
        mysqli_stmt_close($stmt);
    }
}

// Fetch all users from the database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="webregister.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            flex: 1;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            overflow-x: auto;
        }
        .form-section, .table-section {
            margin-bottom: 20px;
        }
        .content {
            flex: 1;
            overflow-y: auto;
            background: white;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
            table-layout: fixed;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        th {
            background-color: #184A92;
            color: white;
        }
        footer {
            background-color: #184A92;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
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
        <div class="form-section">
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
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group-button">
                    <button type="submit">REGISTER</button>
                </div>
            </form>
        </div>
        <div class="table-section">
            <h2>Registered Users</h2>
            <form method="POST" action="webregister.php">
                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox' name='selected_users[]' value='" . $row['userID'] . "'></td>";
                                    echo "<td>" . htmlspecialchars($row["fullname"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["role"]) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No registered users found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group-button">
                    <button type="submit" name="delete">DELETE SELECTED</button>
                </div>
            </form>
        </div>
    </div>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
