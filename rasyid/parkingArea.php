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
            font-family: Arial, sans-serif;
        }
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white; /* Set table background to white */
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
            width: 100%;
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
            <table class="parking-table">
                <thead>
                    <tr>
                        <th>Parking ID</th>
                        <th>Location</th>
                        <th>qrCode</th>
                        <th>Status Space</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Parking Area A1</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Parking Area A2</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Parking Area A3</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
					<tr>
                        <td>Parking Area A4</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
					<tr>
                        <td>Parking Area B1</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
					<tr>
                        <td>Parking Area B2</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
					<tr>
                        <td>Parking Area B3</td>
                        <td>
                            <select>
                                <option value="">Parking</option>
                            </select>
                        </td>
                        <td>
                            <select id="linkSelect">
                        <option value="">qrCode</option>
                        <option value="1" data-img="path/to/qr.svg">Option 1</option>
                        <option value="2" data-img="path/to/qr.svg">Option 2</option>
						<option value="2" data-img="path/to/qr.svg">Option 3</option>
                    </select>
                        </td>
                        <td>
                            <select>
                                <option value="">Status Space</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="button-group">
                <button onclick="location.href='new_parking.php'">New</button>
                <button onclick="location.href='delete_parking.php'">Delete</button>
                <button onclick="location.href='update_parking.php'">Update</button>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
