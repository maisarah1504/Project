<?php
include('db_connect.php');

$spaceID = isset($_GET['spaceID']) ? $_GET['spaceID'] : '';

if (!empty($spaceID)) {
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM parking_space WHERE spaceID = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $spaceID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found for the selected space.";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid spaceID.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Parking Space</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url("../images/ground.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(2.5px);
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #184A92;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        button {
            padding: 10px;
            border: none;
            background-color: #184A92;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #002b6e;
        }
        a {
            color: #184A92;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update Parking Space</h1>
        <form action="process_update_parking.php" method="post">
            <input type="hidden" id="spaceID" name="spaceID" value="<?php echo htmlspecialchars($row['spaceID']); ?>">
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($row['status']); ?>" required>

            <label for="qrCode">QR Code:</label>
            <input type="text" id="qrCode" name="qrCode" value="<?php echo htmlspecialchars($row['qrCode']); ?>" required>

            <button type="submit">Update</button>
        </form>
        <p><a href="parkingArea.php">Return to Dashboard</a></p>
    </div>
</body>
</html>
