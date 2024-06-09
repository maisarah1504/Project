<?php
session_start();
if ($_SESSION['Role'] != 'Administrator') {
    header("Location: ../Layout/errorPage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Parking Space</title>
</head>
<body>
    <h1>Create New Parking Space</h1>
    <form action="../../Controller/process_new_parking.php" method="post">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br>

        <label for="qrCode">QR Code:</label>
        <input type="text" id="qrCode" name="qrCode" required><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
