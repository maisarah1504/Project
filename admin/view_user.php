<?php
// view_user.php

// Check if userID is set in the query string
if (isset($_GET['userID'])) {
    $userID = intval($_GET['userID']);
    
    // Database connection details
    
    $dbname = "fkpark";
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user details
    $sql = "SELECT id, name, email, role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>View User Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
        </tr>
    </table>
    <button onclick="location.href='userprofile.php'">Back to User Management</button>
</body>
</html>
