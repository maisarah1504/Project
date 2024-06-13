<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark - User Profile Management</title>
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
            flex-direction: column;
            align-items: center;
        }

        .content {
            width: 100%;
            margin: 0 auto;
        }

        .user-profile-management {
            margin-top: 20px;
            width: 100%;
            position: relative;
        }

        .new-button {
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #184A92;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            align-self: flex-end; /* Align button to the right */
        }

        .new-button:hover {
            background-color: #002b6e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: white;
        }

        th {
            background: #184A92;
            color: white;
            font-weight: bold;
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
        <h1>User Profile Management</h1>
        <div class="content-wrapper">
            <div class="content">
                <div class="user-profile-management">
                    <button class="new-button" onclick="location.href='new_user.php'">New</button>
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>userID</th>
                                <th>userName</th>
                                <th>password</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- Data will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                    <div class="pagination">
                        <button onclick="prevPage()">Previous</button>
                        <button onclick="nextPage()">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
    <script>
        const rowsPerPage = 10;
        let currentPage = 1;
        let userData = [];

        // Fetch data from the database
        async function fetchUserData() {
            const response = await fetch('db_connect.php');
            if (response.ok) {
                const data = await response.json();
                userData = data;
                renderUserProfileTable();
            } else {
                console.error('Failed to fetch data from the database');
            }
        }

        // Render table with pagination
        function renderUserProfileTable() {
            const tableBody = document.getElementById('userTableBody');
            tableBody.innerHTML = '';

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const pageData = userData.slice(start, end);

            for (const row of pageData) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.userid}</td>
                    <td>${row.username}</td>
                    <td>${row.password}</td>
                    <td>${row.role}</td>
                    <td>
                        <button onclick="viewUser(${row.id})">View</button>
                        <button onclick="deleteUser(${row.id})">Delete</button>
                    </td>
                `;
                tableBody.appendChild(tr);
            }
        }

        // View user details
        function viewUser(userID) {
            // Redirect to the view user page with the userID
            window.location.href = `view_user.php?userID=${userID}`;
        }

        // Delete user
        async function deleteUser(userID) {
            if (confirm('Are you sure you want to delete this user?')) {
                const response = await fetch(`delete_user.php?userID=${userID}`, {
                    method: 'DELETE'
                });
                if (response.ok) {
                    // Refresh the data
                    fetchUserData();
                } else {
                    alert('Failed to delete user');
                }
            }
        }

        // Go to the previous page
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderUserProfileTable();
            }
        }

        // Go to the next page
        function nextPage() {
            if ((currentPage * rowsPerPage) < userData.length) {
                currentPage++;
                renderUserProfileTable();
            }
        }

        // Initialize the table on page load
        window.onload = fetchUserData;
    </script>
</body>
</html>
