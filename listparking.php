<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark - List of Parking</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="base.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Remove default body margin */
        }
        .content-wrapper {
            padding: 20px;
            display: flex;
            justify-content: center; /* Center the content horizontally */
        }
        table {
            width: 100%; /* Set table width to 100% */
            max-width: 800px; /* Set maximum width for the table */
            border-collapse: collapse;
            background-color: white;
            margin: 0 auto; /* Center the table within its container */
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
            vertical-align: middle;
            border: 1px solid #ddd;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
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
        footer {
            text-align: center;
            padding: 10px;
            background-color: #184A92;
            color: white;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
		h1{
			text-align: center;
            padding: 10px;
		}
			
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="images/Logo FKPark.png" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="admindasnboard.php">Admin Dashboard</a>
            </li>
            <li>
                <span class="material-symbols-outlined">book</span>
                <a href="#">Booking Page</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="PAGE7.php">Admin Parking Area</a>
            </li>
            <li>
                <span class="material-symbols-outlined">event_available</span>
                <a href="availability.php">Parking Availability</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="listparking.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <h1>List of Parking</h1>
        <div class="content-wrapper" style="width: 70%;">
            <table class="parking-table">
                <thead>
                    <tr>
                        <th>Parking ID</th>
                        <th>Location</th>
                        <th>QR Code</th>
						<th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the database connection script
                    include 'db_connect.php';

                    // SQL query to fetch data from the database
                   $sql = "SELECT * FROM `parking_space`;";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["spaceID"] . "</td>";
                            echo "<td>" . $row["location"] . "</td>";
                            echo "<td><img src='" . $row["qrCode"] . "' alt='QR Code' style='width: 64px;'></td>";
							 echo "<td>" . $row["status"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No parking spaces found.</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
