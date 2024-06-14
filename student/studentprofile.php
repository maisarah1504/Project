
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="studentprofile.css">
</head>
<body>
    <main>
        <div class="profile-container">
            <h1 class="title">Student Profile</h1>
            <?php
            // Include the database connection file
            include 'webconnect.php';

            // Fetch user information
            $userID = $_SESSION['userID']; // Assuming userID is stored in session after login
            $user_query = "SELECT fullname, username FROM user WHERE userID = '$userID'";
            $user_result = mysqli_query($conn, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);

            // Fetch vehicle information
            $vehicle_query = "SELECT vehicleID, type, model, plateNumber, approvalStatus FROM vehicle WHERE userID = '$userID'";
            $vehicle_result = mysqli_query($conn, $vehicle_query);
            ?>

            <div class="info-section">
                <div class="info-header">
                    <h2>Student Information</h2>
                    <button class="edit-button">Edit</button>
                </div>
                <div class="info-box">
                    <p><strong>Full Name:</strong> <?php echo $user_row['fullname']; ?></p>
                    <p><strong>Student/Staff ID:</strong> <?php echo $user_row['username']; ?></p>
                </div>
            </div>

            <?php
            // Display vehicle information
            if (mysqli_num_rows($vehicle_result) > 0) {
                while ($vehicle_row = mysqli_fetch_assoc($vehicle_result)) {
                    ?>
                    <div class="info-section">
                        <div class="info-header">
                            <h2>Vehicle Information</h2>
                            <div class="vehicle-buttons">
                                <form action="deletevehicle.php" method="POST" onsubmit="return confirmDelete();">
                                    <input type="checkbox" name="vehicle_ids[]" value="<?php echo $vehicle_row['vehicleID']; ?>">
                                    <button class="delete-button" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="info-box">
                            <p><strong>Type:</strong> <?php echo $vehicle_row['type']; ?></p>
                            <p><strong>Model:</strong> <?php echo $vehicle_row['model']; ?></p>
                            <p><strong>Plate Number:</strong> <?php echo $vehicle_row['plateNumber']; ?></p>
                            <p><strong>Approval Status:</strong> <?php echo $vehicle_row['approvalStatus']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No vehicle information found.</p>";
            }
            ?>

            <div class="vehicle-buttons">
                <button class="add-button" onclick="location.href='vehicleregistration.php';">Add</button>
            </div>
        </div>
    </main>

    <script>
        // JavaScript function to confirm deletion
        function confirmDelete() {
            return confirm("Are you sure you want to delete the selected vehicle(s)?");
        }
    </script>
</body>
</html>
