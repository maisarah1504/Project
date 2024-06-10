<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark - new parking form</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-image: url("../images/ground.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(2.5px);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        table {
            width: 1000px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white; /* Set table background to white */
        }
        .sidebar {
            width: 120px;
            background-color: #184A92;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
        }
        th {
            height: 50px;
            background-color: #184A92;
            color: white;
            font-weight: bold;
        }
        td {
            height: 50px;
            text-align: center;
            vertical-align: top;
            border: 1px solid #ddd;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center; /* Center the buttons */
        }
        .button-group button {
            padding: 5px 10px;
            border: none;
            background-color: #184A92;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .button-group button:hover {
            background-color: #002b6e;
        }
        .links {
            list-style-type: none;
            padding: 0;
        }
        .links li {
            margin: 20px 0;
        }
        .links a {
            color: white !important;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .links .material-symbols-outlined {
            margin-right: 10px;
        }
        .logout-link {
            margin-top: auto;
        }
        main {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #184A92;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            color: #184A92;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }
        .pagination a.active {
            background-color: #184A92;
            color: white;
            border: 1px solid #184A92;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
    <script>
        function submitForm(action) {
            var form = document.getElementById('parkingForm');
            form.action = action;
            form.submit();
        }

        function confirmDeletion() {
            return confirm('Are you sure you want to delete the selected parking spaces?');
        }
    </script>
<body>
    <h1>Create New Parking Space</h1>
    <form action="process_new_parking.php" method="post">
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
