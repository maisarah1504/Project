<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="base.css">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .sidebar {
            width: 250px;
            background-color: #184A92;
            padding: 20px;
            color: white;
            height: 100vh;
            position: fixed;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
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

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .content-wrapper {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .content {
            width: 100%; /* Adjusted to full width */
            margin: 0 auto;
        }

        .parking-availability {
            margin-top: 20px;
        }

        table {
    width: 100%;
    border-collapse: collapse;
    background-color: white; /* Set table background to white */
}

th, td {
    height: 50px;
    text-align: center;
    vertical-align: middle;
    border: 1px solid #ddd;
    padding: 10px; /* Added padding for better appearance */
    background-color: white; /* Ensure table cells have a white background */
}

th {
    background: #184A92;
    color: white;
    font-weight: bold;
}

        .button-group {
            display: flex;
            justify-content: center;
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
            position: fixed;
            width: calc(100% - 250px);
            left: 250px;
            bottom: 0;
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
                <a href="PparkingArea.php">Admin Parking Area</a>
            </li>
            <li>
                <span class="material-symbols-outlined">event_available</span>
                <a href="availability.php">Parking Availability</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="PAGE6.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <h1>Parking Availability</h1>
        <div class="content-wrapper">
            <div class="content">
               
                <div class="parking-availability">
                    <table class="parking-table">
                        <thead>
                            <tr>
                                <th>Space ID</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include the database connection script
                            include 'db_connect.php';

                            // SQL query to fetch data from the database
                            $sql = "SELECT spaceID, status FROM parking_space;";

                            // Execute the query
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["spaceID"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "<td><button>change</button></td>"; // Example action button
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
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
