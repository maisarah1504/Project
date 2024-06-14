<?php
include "../navigation/sidebaradmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark - Admin Parking Space</title>
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
            border-radius: 5px; /* Add border radius to buttons */
        }
        .pagination a.active {
            background-color: #184A92;
            color: white;
            border: 1px solid #184A92;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .search-container input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        function updateSpace() {
            var checkboxes = document.querySelectorAll('input[name="selectedSpaces[]"]:checked');
            if (checkboxes.length !== 1) {
                alert('Please select exactly one space to update.');
                return;
            }
            var spaceID = checkboxes[0].value;
            window.location.href = 'update_parking.php?spaceID=' + spaceID;
        }
    </script>
</head>
<body>
    <main>
        <h1>Admin Parking Space</h1>
        <div class="search-container">
            <form method="get" action="">
                <input type="text" name="search" id="searchInput" placeholder="Search Space ID" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="content-wrapper" style="width: 70%;">
            <form id="parkingForm" method="post">
                <table class="parking-table">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Space ID</th>
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

                        // Check if a search query is set
                        $search_query = isset($_GET['search']) ? $_GET['search'] : '';

                        // Modify the SQL query to include search functionality
                        $sql = "SELECT spaceID, location, qrCode, status FROM parking_space";
                        if ($search_query != '') {
                            $sql .= " WHERE spaceID LIKE '%" . $conn->real_escape_string($search_query) . "%'";
                        }
                        $sql .= " LIMIT $offset, $records_per_page";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $qrData = json_encode($row);
                                $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . urlencode($qrData);
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='selectedSpaces[]' value='" . $row["spaceID"] . "'></td>";
                                echo "<td>" . $row["spaceID"] . "</td>";
                                echo "<td>" . $row["location"] . "</td>";
                                echo "<td><a href='" . $qrCodeUrl . "' target='_blank'><img src='" . $qrCodeUrl . "' alt='QR Code View' style='width: 64px;'></a></td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No parking spaces found.</td></tr>";
                        }

                        // Get the total number of records
                        $sql_total = "SELECT COUNT(*) AS total FROM parking_space";
                        if ($search_query != '') {
                            $sql_total .= " WHERE spaceID LIKE '%" . $conn->real_escape_string($search_query) . "%'";
                        }
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
                    <button type="button" onclick="updateSpace()">Update</button>
                </div>
            </form>
            <div class="pagination" style="background: white; width: 1000px; margin: 0 auto;">
                <?php
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='?page=$i&search=" . urlencode($search_query) . "'";
                    if ($i == $page) {
                        echo " class='active'";
                    }
                    echo ">$i</a>";
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>
