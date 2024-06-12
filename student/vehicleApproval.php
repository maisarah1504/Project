// Include the database connection file
include 'webconnect.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the Approve button is clicked
    if (isset($_POST["approve"])) {
        // Update approval status to Successful
        $vehicleID = $_POST["vehicle_id"];
        $sql = "UPDATE vehicle SET approvalStatus = 'Successful' WHERE vehicleID = '$vehicleID'";
        if (mysqli_query($conn, $sql)) {
            echo "Vehicle approval successful!";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } elseif (isset($_POST["reject"])) {
        // Update approval status to Rejected
        $vehicleID = $_POST["vehicle_id"];
        $sql = "UPDATE vehicle SET approvalStatus = 'Rejected' WHERE vehicleID = '$vehicleID'";
        if (mysqli_query($conn, $sql)) {
            echo "Vehicle rejection successful!";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

// Query to fetch vehicle details
$sql = "SELECT vehicleID, userID, vehicleType, licensePlate, vehicleModel, documentsDirectory FROM vehicle WHERE approvalStatus = 'Pending'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Approval</title>
    <link rel="stylesheet" href="vehicleapproval.css">
</head>
<body>
    <div class="container">
        <h1>Vehicle Approval</h1>
        <?php
        // Check if there are pending vehicle registrations
        if (mysqli_num_rows($result) > 0) {
            // Output vehicle details in a table
            echo "<table>";
            echo "<tr><th>Full Name</th><th>Vehicle Type</th><th>License Plate</th><th>Vehicle Model</th><th>Documents</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                // Fetch full name from the user table based on userID
                $userID = $row['userID'];
                $user_sql = "SELECT fullname FROM user WHERE userID = '$userID'";
                $user_result = mysqli_query($conn, $user_sql);
                $user_row = mysqli_fetch_assoc($user_result);
                $fullname = $user_row['fullname'];

                echo "<tr>";
                echo "<td>" . $fullname . "</td>";
                echo "<td>" . $row['vehicleType'] . "</td>";
                echo "<td>" . $row['licensePlate'] . "</td>";
                echo "<td>" . $row['vehicleModel'] . "</td>";
                echo "<td><a href='" . $row['documentsDirectory'] . "' target='_blank'>View Documents</a></td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='vehicle_id' value='" . $row['vehicleID'] . "'>";
                echo "<button type='submit' name='approve'>Approve</button>";
                echo "<button type='submit' name='reject'>Reject</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No pending vehicle registrations found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>