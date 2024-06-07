<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
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
                <a href="parkingArea.php">Admin Parking Area</a>
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
        <h1>Admin Parking Area</h1>
        <div class="content-wrapper" style="width: 70%;">
            <form id="parkingForm" method="post">
                <table class="parking-table">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>spaceID</th>
                            <th>Location</th>
                            <th>QR Code</th>
                            <th>Status Space</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include the database connection script
                        include 'db_connect.php';

                        // Number of records per page
                        $records_per_page = 5;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($page - 1) * $records_per_page;

                        // SQL query to fetch data from the database with pagination
                        $sql = "SELECT spaceID, location, qrCode, status FROM parking_space LIMIT $offset, $records_per_page";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='selectedSpaces[]' value='" . $row["spaceID"] . "'></td>";
                                echo "<td>" . $row["spaceID"] . "</td>";
                                echo "<td>" . $row["location"] . "</td>";
                                echo "<td><img src='" . $row["qrCode"] . "' alt='QR Code' style='width: 64px;'></td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No parking spaces found.</td></tr>";
                        }

                        // Get the total number of records
                        $sql_total = "SELECT COUNT(*) AS total FROM parking_space";
                        $result_total = $conn->query($sql_total);
                        $row_total = $result_total->fetch_assoc();
                        $total_records = $row_total['total'];
                        $total_pages = ceil($total_records / $records_per_page);

                        // Close the database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <div class="button-group">
                    <button type="button" onclick="location.href='new_parking.php'">New</button>
                    <button type="button" onclick="if (confirmDeletion()) submitForm('delete_parking.php')">Delete</button>
                    <button type="button" onclick="submitForm('update_parking.php')">Update</button>
                </div>
            </form>
            <div class="pagination">
                <?php
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active = ($i == $page) ? "class='active'" : "";
                    echo "<a href='PAGE7.php?page=$i' $active>$i</a>";
                }
                ?>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
