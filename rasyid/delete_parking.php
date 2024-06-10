<?php
// Include the database connection script
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedSpaces'])) {
        $selectedSpaces = $_POST['selectedSpaces'];
        $spaceIDs = implode(",", $selectedSpaces);

        // SQL query to delete selected records
        $sql = "DELETE FROM parking_space WHERE spaceID IN ($spaceIDs)";

        if ($conn->query($sql) === TRUE) {
            echo "Selected parking spaces deleted successfully.";
        } else {
            echo "Error deleting records: " . $conn->error;
        }
    } else {
        echo "No parking spaces selected.";
    }
}

// Close the database connection
$conn->close();

// Redirect back to the admin parking area page
header("Location: parkingArea.php");
exit();
?>
