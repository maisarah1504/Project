<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark - List of Parking</title>
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
        .sidebar {
            width: 120px;
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
            margin-left: 140px;
            padding: 20px;
            flex: 1;
            overflow-y: auto; /* Enable vertical scroll if needed */
        }
        h1 {
            text-align: center;
            margin-top: 20px;
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
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 100%;
            margin-bottom: auto; /* Adjust margin to push footer to the bottom */
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            max-width: 800px; /* Adjust the maximum width as needed */
            margin-bottom: 50px; /* Add some margin at the bottom */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
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
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination button {
            padding: 5px 10px;
            border: none;
            background-color: #184A92;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .pagination button:hover {
            background-color: #002b6e;
        }
        .image-container {
            display: flex;
            align-items: center;
            justify-content: center; /* Center horizontally */
            width: 100%;
            max-width: 800px; /* Adjust the maximum width as needed */
            margin-bottom: 20px; /* Add some margin at the bottom */
        }
        .image-container img {
            width: 50%; /* Set the image width to 50% of its container */
            height: auto; /* Maintain the aspect ratio */
            border: 2px solid #184A92;
            border-radius: 10px;
            margin-right: 20px; /* Add some space between the image and the table */
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
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="../images/logo.jpeg" alt="logo">
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="admindashboard.php">Admin Dashboard</a>
            </li>
            <li>
                <span class="material-symbols-outlined">book</span>
                <a href="#">Booking Page</a>
            </li>
            <li>
                <span class="material-symbols-outlined">directions_car</span>
                <a href="parkingArea.php">Admin Parking Space</a>
            </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="userprofile.php">User Management</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="listparking.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="../MODULE_1/weblogout.php">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <h1>List of Parking</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search Space ID">
        </div>
        <div class="image-container">
            <img src="../images/1.png" alt="Parking Image">
        </div>
        <div class="content-wrapper">
            <div class="table-container">
                <table class="parking-table">
                    <thead>
                        <tr>
                            <th>Space ID</th>
                            <th>Area</th>
                            <th>QR Code</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="parkingTableBody">
                        <!-- Data will be inserted here by JavaScript -->
                    </tbody>
                </table>
                <div class="pagination">
                    <button onclick="prevPage()">Previous</button>
                    <button onclick="nextPage()">Next</button>
                </div>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
    <script>
        const rowsPerPage = 8;
        let currentPage = 1;
        let parkingData = [];
        let filteredData = [];

        // Fetch data from the database
        async function fetchData() {
            try {
                const response = await fetch('get_parking_data.php');
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                const data = await response.json();
                parkingData = data;
                filteredData = data;
                renderTable();
            } catch (error) {
                console.error('Error fetching data:', error.message);
            }
        }

        // Render table with pagination
        function renderTable() {
            const tableBody = document.getElementById('parkingTableBody');
            tableBody.innerHTML = '';

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const pageData = filteredData.slice(start, end);

            for (const row of pageData) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.spaceID}</td>
                    <td>${row.location}</td>
                    <td>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=${encodeURIComponent(JSON.stringify(row))}" alt="QR Code View">
                    </td>
                    <td>${row.status}</td>
                `;
                tableBody.appendChild(tr);
            }
        }

        // Go to the previous page
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        }

        // Go to the next page
        function nextPage() {
            if ((currentPage * rowsPerPage) < filteredData.length) {
                currentPage++;
                renderTable();
            }
        }

        // Filter data based on search input
        function filterData() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            filteredData = parkingData.filter(row => row.spaceID.toLowerCase().includes(searchInput));
            currentPage = 1; // Reset to the first page
            renderTable();
        }

        // Add event listener to search input
        document.getElementById('searchInput').addEventListener('input', filterData);

        // Initialize the table on page load
        window.onload = fetchData;
    </script>
</body>
</html>
