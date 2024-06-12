<?php
// delete_user.php

// Allow only DELETE requests
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Parse URL to get userID
    parse_str(file_get_contents("php://input"), $requestData);
    if (isset($requestData['userID'])) {
        $userID = intval($requestData['userID']);

        // Database connection details
        
    $dbname = "fkpark";
    $servername = "localhost";
    $username = "root";
    $password = "";

        // Create connection
        $conn = new mysqli($host, $user, $pass, $db);

        // Check connection
        if ($conn->connect_error) {
            http_response_code(500);
            echo json_encode(['message' => 'Connection failed']);
            exit;
        }

        // Delete user
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userID);
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(['message' => 'User deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete user']);
        }

        $stmt->close();
        $conn->close();
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid request']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>
