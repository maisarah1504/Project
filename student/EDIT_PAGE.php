<?php
session_start();
include('../navigation/sidebarStudent.php');
require '../webconnect.php';

// Check if bookingID is set in the query string
if (!isset($_GET['bookingID'])) {
    die('Error: bookingID parameter is missing.');
}

$bookingID = $_GET['bookingID'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $duration = $_POST['duration'];

    // Validate form data
    if (empty($startDate) || empty($startTime)) {
        echo "Error: All fields are required.";
    } else {
        // Update the booking details in the database
        $update_sql = "UPDATE booking SET startDate = ?, startTime = ?, duration = ? WHERE bookingID = ?";
        $stmt = $conn->prepare($update_sql);
        
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param('ssi', $startDate, $startTime, $bookingID);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Booking updated successfully!');
                    window.location.href = 'BOOKING_LIST.php';
                  </script>";
            exit;
        } else {
            echo "Error updating booking: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    }
}

// Fetch the booking details
$sql = "SELECT b.bookingID, ps.location, b.startDate, b.startTime, v.vehicleID, v.licencePlate, b.duration
        FROM booking AS b
        JOIN parking_space AS ps ON b.spaceID = ps.spaceID
        JOIN vehicle AS v ON v.userID = b.userID
        WHERE b.bookingID = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param('i', $bookingID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('Error: No booking found with the specified bookingID.');
}

$booking = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .submit-button {
            background-color: green;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #1D8348;
        }
        .cancel-link {
            background-color: red;
            color: #fff;
            text-decoration: none;
            padding: 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .cancel-link:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Booking</h2>
        <form action="EDIT_PAGE.php?bookingID=<?php echo $bookingID; ?>" method="post">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($booking['location']); ?>" disabled>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($booking['startDate']); ?>">
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="time" id="startTime" name="startTime" value="<?php echo htmlspecialchars($booking['startTime']); ?>">
            </div>
            <button type="submit" class="submit-button">Submit</button>
            <a href="BOOKING_LIST.php" class="cancel-link">Cancel</a>
        </form>
    </div>
</body>
</html>
