<?php
session_start();
include '../webconnect.php'; // Adjust the path to the correct location

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleID = $_POST['vehicleID'];
    $vehicleType = $_POST['vehicleType'];
    $vehicleModel = $_POST['vehicleModel'];
    $licensePlate = $_POST['licensePlate'];
    $approvalStatus = $_POST['approvalStatus'];

    $update_query = "UPDATE vehicle SET vehicleType='$vehicleType', vehicleModel='$vehicleModel', licensePlate='$licensePlate', approvalStatus='$approvalStatus' WHERE vehicleID='$vehicleID'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['message'] = "Vehicle information updated successfully!";
        header("Location: studentprofile.php");
    } else {
        $_SESSION['message'] = "Error updating vehicle information: " . mysqli_error($conn);
    }
}

$vehicleID = $_GET['id'];
$vehicle_query = "SELECT vehicleType, vehicleModel, licensePlate, approvalStatus FROM vehicle WHERE vehicleID = '$vehicleID'";
$vehicle_result = mysqli_query($conn, $vehicle_query);
$vehicle_row = mysqli_fetch_assoc($vehicle_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle Information</title>
    <link rel="stylesheet" href="studentprofile.css">
</head>
<body>
    <main>
        <h1 class="title">Edit Vehicle Information</h1>
        <form action="editvehicle.php" method="POST">
            <input type="hidden" name="vehicleID" value="<?php echo $vehicleID; ?>">
            <label for="vehicleType">Vehicle Type:</label>
            <input type="text" id="vehicleType" name="vehicleType" value="<?php echo $vehicle_row['vehicleType']; ?>" required>
            <br>
            <label for="vehicleModel">Vehicle Model:</label>
            <input type="text" id="vehicleModel" name="vehicleModel" value="<?php echo $vehicle_row['vehicleModel']; ?>" required>
            <br>
            <label for="licensePlate">License Plate:</label>
            <input type="text" id="licensePlate" name="licensePlate" value="<?php echo $vehicle_row['licensePlate']; ?>" required>
            <br>
            <label for="approvalStatus">Approval Status:</label>
            <input type="text" id="approvalStatus" name="approvalStatus" value="<?php echo $vehicle_row['approvalStatus']; ?>" required>
            <br>
            <button type="submit">Save</button>
        </form>
    </main>
</body>
</html>
