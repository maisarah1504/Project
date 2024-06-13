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
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url("../images/ground.jpg");
            background-position: center;
            background-size: cover;
            backdrop-filter: blur(2.5px);
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #184A92;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        button {
            padding: 10px;
            border: none;
            background-color: #184A92;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #002b6e;
        }
        .sidebar {
            width: 120px;
            background-color: #184A92;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
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
        footer {
            text-align: center;
            padding: 10px;
            background-color: #184A92;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create New Parking Space</h1>
        <form action="process_new_parking.php" method="post">
            <label for="spaceID">Space ID:</label>
            <input type="text" id="spaceID" name="spaceID" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>

            <label for="qrCode">QR Code:</label>
            <input type="text" id="qrCode" name="qrCode" required>

            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
