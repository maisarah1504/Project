<?php 
session_start(); // Start the session

// Include the sidebar and database connection file
include "../navigation/sidebarStudent.php";
include '../webconnect.php';

// Check if userID is set in the session
if (!isset($_SESSION['userID'])) {
    die("User not logged in");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $vehicleType = $_POST['vehicle-type'];
    $vehicleModel = $_POST['vehicle-model'];
    $plateNumber = $_POST['plate-number'];
    $userID = $_SESSION['userID']; // Assuming you have a session variable storing the userID

    // Directory where the documents will be stored
    $uploadDir = '../admin/docs/';

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handle file uploads and move them to the docs directory
    foreach ($_FILES as $key => $file) {
        $fileName = basename($file['name']); // Ensure only the file name is used
        $filePath = $uploadDir . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            $message = "Error uploading file: " . $fileName;
            break;
        }
    }

    // If files uploaded successfully, proceed to insert data into the database
    if (empty($message)) {
        // Insert the data into the database with the path to the documents directory
        $sql = "INSERT INTO vehicle (vehicleType, licensePlate, vehicleModel, documentsDirectory, userID) VALUES ('$vehicleType', '$plateNumber', '$vehicleModel', '$uploadDir', '$userID')";

        if (mysqli_query($conn, $sql)) {
            $message = "New vehicle record created successfully";
        } else {
            $message = "Error: " . $sql . "\n" . mysqli_error($conn);
        }
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

        <?php if ($message): ?>
        window.onload = function() {
            alert('<?php echo addslashes($message); ?>');
            window.location.href = "vehicleregistration.php";
        }
        <?php endif; ?>
    </script>
</head>
<body>
    <div class="container">
        <h1 class="title">Vehicle Registration</h1>
        <form method="POST" action="vehicleregistration.php" enctype="multipart/form-data">
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
            
            <div class="form-group">
                <label for="driving-license">Driving License<span class="required">*</span></label>
                <input type="file" id="driving-license" name="driving-license" required>
                <p class="file-note">Please name the file as:dl_username</p>
            </div>

            <div class="form-group">
                <label for="vehicle-grant">Vehicle Grant<span class="required">*</span></label>
                <input type="file" id="vehicle-grant" name="vehicle-grant" required>
                <p class="file-note">Please name the file as:vg_username</p>
            </div>

            <div class="form-group">
                <label for="insurance-document">Insurance Document<span class="required">*</span></label>
                <input type="file" id="insurance-document" name="insurance-document" required>
                <p class="file-note">Please name the file as:id_username</p>
            </div>

            <div class="form-group-button">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</body>
</html>
