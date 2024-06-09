<?php
// Include the database connection file
include 'webconnect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $vehicleType = $_POST['vehicle-type'];
    $vehicleModel = $_POST['vehicle-model'];
    $plateNumber = $_POST['plate-number'];

    // Insert the data into the database
    $sql = "INSERT INTO vehicle (vehicleType, licensePlate, vehicleModel) VALUES ('$vehicleType', '$plateNumber', '$vehicleModel')";

    if (mysqli_query($conn, $sql)) {
        $message = "New vehicle record created successfully";
    } else {
        $message = "Error: " . $sql . "\\n" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vehicle Registration</title>
    <link rel="stylesheet" href="vehicleregistration.css">
    <script type="text/javascript">
        function showMessage(message) {
            if (message !== "") {
                alert(message);
                window.location.href = "vehicleregistration.php";
            }
        }
    </script>
</head>

<body onload="showMessage('<?php echo $message; ?>')">
    <div class="container">
        <h1 class="title">Vehicle Registration</h1>
        <form method="POST" action="vehicleregistration.php">
            <div class="form-group">
                <label for="vehicle-type">Vehicle Type<span class="required">*</span></label>
                <select id="vehicle-type" name="vehicle-type" required>
                    <option value="car">Car</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </div>

            <div class="form-group">
                <label for="vehicle-model">Vehicle Model<span class="required">*</span></label>
                <input type="text" id="vehicle-model" name="vehicle-model" required>
            </div>

            <div class="form-group">
                <label for="plate-number">Plate Number<span class="required">*</span></label>
                <input type="text" id="plate-number" name="plate-number" required>
            </div>

            <div class="form-group-button">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</body>

</html>
