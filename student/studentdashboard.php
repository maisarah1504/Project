<?php 
session_start(); // Start the session

// Include the database connection file and sidebar
include "../navigation/sidebarStudent.php";
include '../webconnect.php'; // Adjust the path to the correct location

// Check if userID is set in the session
if (!isset($_SESSION['userID'])) {
    die("User not logged in");
}

// Fetch vehicle information
$userID = $_SESSION['userID']; // Assuming userID is stored in session after login
$vehicle_query = "SELECT vehicleType, licensePlate, vehicleModel, approvalStatus FROM vehicle WHERE userID = '$userID'";
$vehicle_result = mysqli_query($conn, $vehicle_query);

// Fetch booking information
$booking_query = "SELECT spaceID, startTime, endTime, status FROM booking WHERE userID = '$userID'";
$booking_result = mysqli_query($conn, $booking_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="studentdashboard.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            height: 100vh;
            background-color: #f0f0f0; /* Background color instead of image */
        }

        main {
            width: 80%;
            max-width: 1000px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dashboard {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
            justify-content: space-between;
            gap: 20px; /* Adjusted to add space between boxes */
            margin-top: 20px;
        }

        .box {
            width: calc(30% - 20px); /* Adjusted width to allow space between boxes */
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box h3 {
            margin-bottom: 10px;
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
<body onload="showMessage('<?php echo isset($message) ? $message : ''; ?>')">
    <main>
        <h1 class="title">Student Dashboard</h1>
        <div class="dashboard">
            <?php
            // Display vehicle information if available
            if (mysqli_num_rows($vehicle_result) > 0) {
                while ($vehicle_row = mysqli_fetch_assoc($vehicle_result)) {
                    ?>
                    <div class="box">
                        <h3>My Vehicle</h3>
                        <p><strong>Type:</strong> <?php echo $vehicle_row['vehicleType']; ?></p>
                        <p><strong>Plate Number:</strong> <?php echo $vehicle_row['licensePlate']; ?></p>
                        <p><strong>Model:</strong> <?php echo $vehicle_row['vehicleModel']; ?></p>
                        <p><strong>Approval Status:</strong> <?php echo $vehicle_row['approvalStatus']; ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='box'><h3>My Vehicle</h3><p>No vehicle information found.</p></div>";
            }

            // Display booking information if available
            if (mysqli_num_rows($booking_result) > 0) {
                while ($booking_row = mysqli_fetch_assoc($booking_result)) {
                    ?>
                    <div class="box">
                        <h3>My Booking</h3>
                        <p><strong>Space ID:</strong> <?php echo $booking_row['spaceID']; ?></p>
                        <p><strong>Start Time:</strong> <?php echo $booking_row['startTime']; ?></p>
                        <p><strong>End Time:</strong> <?php echo $booking_row['endTime']; ?></p>
                        <p><strong>Status:</strong> <?php echo $booking_row['status']; ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='box'><h3>My Booking</h3><p>No booking information found.</p></div>";
            }
            ?>
            
            <div class="box">
                <h3>Available Parking Spaces</h3>
                <!-- Add content for Available Parking Spaces here -->
            </div>
        </div>
    </main>
</body>
</html>
