<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="studentprofile.css">
    <script type="text/javascript">
        // JavaScript function to confirm deletion
        function confirmDelete() {
            return confirm("Are you sure you want to delete the selected vehicle(s)?");
        }

        function showMessage() {
            var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; unset($_SESSION['message']); ?>";
            if (message) {
                alert(message);
            }
        }
    </script>
</head>
<body onload="showMessage()">
    <main>
        <h1 class="title">Student Profile</h1>

        <form id="deleteForm" action="deletevehicle.php" method="POST" onsubmit="return confirmDelete();">
            <?php
            session_start(); // Start the session

            // Include the sidebar and database connection file
            include "../navigation/sidebarStudent.php";
            include '../webconnect.php'; // Adjust the path to the correct location

            // Check if userID is set in the session
            if (!isset($_SESSION['userID'])) {
                die("User not logged in");
            }

            // Fetch user information
            $userID = $_SESSION['userID']; // Assuming userID is stored in session after login
            $user_query = "SELECT fullname, username FROM user WHERE userID = '$userID'";
            $user_result = mysqli_query($conn, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);
            ?>

            <div class="info-section">
                <div class="info-header">
                    <h2>Student Information</h2>
                    <button class="edit-button" onclick="location.href='editstudent.php';">Edit</button>
                </div>
                <div class="info-box">
                    <p><strong>Full Name:</strong> <?php echo $user_row['fullname']; ?></p>
                    <p><strong>Student/Staff ID:</strong> <?php echo $user_row['username']; ?></p>
                </div>
            </div>

            <?php
            // Fetch vehicle information
            $vehicle_query = "SELECT vehicleID, vehicleType, vehicleModel, licensePlate, approvalStatus FROM vehicle WHERE userID = '$userID'";
            $vehicle_result = mysqli_query($conn, $vehicle_query);

            // Display vehicle information
            if (mysqli_num_rows($vehicle_result) > 0) {
                while ($vehicle_row = mysqli_fetch_assoc($vehicle_result)) {
                    ?>
                    <div class="info-section">
                        <div class="info-header">
                            <h2>Vehicle Information</h2>
                            <div class="vehicle-buttons">
                                <input type="checkbox" name="vehicle_ids[]" value="<?php echo $vehicle_row['vehicleID']; ?>">
                                <button class="add-button" type="button" onclick="location.href='vehicleregistration.php';">Add</button>
                                <button class="edit-button" type="button" onclick="location.href='editvehicle.php?id=<?php echo $vehicle_row['vehicleID']; ?>';">Edit</button>
                                <button class="delete-button" type="submit">Delete</button>
                            </div>
                        </div>
                        <div class="info-box">
                            <p><strong>Type:</strong> <?php echo $vehicle_row['vehicleType']; ?></p>
                            <p><strong>Model:</strong> <?php echo $vehicle_row['vehicleModel']; ?></p>
                            <p><strong>Plate Number:</strong> <?php echo $vehicle_row['licensePlate']; ?></p>
                            <p><strong>Approval Status:</strong> <?php echo $vehicle_row['approvalStatus']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No vehicle information found.</p>";
            }
            ?>
        </form>

    </main>
</body>
</html>
