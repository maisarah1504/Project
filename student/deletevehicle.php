<?php
session_start(); // Start the session

// Include the database connection file
include '../webconnect.php'; // Adjust the path to the correct location

// Check if userID is set in the session
if (!isset($_SESSION['userID'])) {
    die("User not logged in");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if vehicle_ids are set
    if (isset($_POST['vehicle_ids']) && !empty($_POST['vehicle_ids'])) {
        // Sanitize input
        $vehicle_ids = array_map('intval', $_POST['vehicle_ids']);
        $vehicle_ids_str = implode(',', $vehicle_ids);

        // Create delete query
        $sql = "DELETE FROM vehicle WHERE vehicleID IN ($vehicle_ids_str) AND userID = '" . $_SESSION['userID'] . "'";

        // Execute delete query
        if (mysqli_query($conn, $sql)) {
            $message = "Selected vehicles have been deleted successfully.";
        } else {
            $message = "Error deleting vehicles: " . mysqli_error($conn);
        }
    } else {
        $message = "No vehicles selected for deletion.";
    }
    
    // Redirect back to student profile with message
    $_SESSION['message'] = $message;
    header("Location: studentprofile.php");
    exit();
} else {
    die("Invalid request method");
}

// Close the database connection
mysqli_close($conn);
?>
