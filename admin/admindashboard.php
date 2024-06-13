<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
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
            height: 100vh;
        }

        .sidebar {
            width: 110px;
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
            color: white;
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
            margin-left: 150px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            height: calc(100vh - 40px);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .calendar-wrapper {
    width: 90%;
    margin: 0 auto;
}

.calendar-container {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%; /* Set width to 100% */
    max-width: 600px; /* Set a maximum width to maintain readability */
    margin: 0 auto; /* Center the calendar container */
}
        hr {
            border: 2px solid #184A92;
            margin: 20px 0;
        }

        .charts-container {
            width: 90%; /* Adjusted width */
            margin: 20px auto 0 auto; /* Removed bottom margin */
        }

        .chart {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        th {
            background: #184A92;
            color: white;
            font-weight: bold;
        }

        .today {
            background: #FFD500;
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="admin_booking.php">Booking Page</a>
            </li>
            <li>
                <span class="material-symbols-outlined">directions_car</span>
                <a href="parkingArea.php">Admin Parking Space</a>
            </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="userprofile.php">user management</a>
            </li>
            <li>
                <span class="material-symbols-outlined">local_parking</span>
                <a href="listparking.php">List of Parking</a>
            </li>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="../student/weblogout.php">Logout</a>
            </ul>
    </aside>
    <main>
        <h1>ADMIN DASHBOARD</h1>
        <div class="calendar-wrapper">
            <div class="calendar-container">
                <?php
                function draw_calendar($month, $year) {
                    $calendar = '<table>';
                    $headings = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    $calendar .= '<tr><th>' . implode('</th><th>', $headings) . '</th></tr>';
                    $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
                    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
                    $days_in_week = 1;
                    $day_counter = 0;
                    $dates_array = [];
                    $calendar .= '<tr>';
                    for ($x = 0; $running_day > $x; $x++) {
                        $calendar .= '<td> </td>';
                        $days_in_week++;
                    }
                    for ($day = 1; $day <= $days_in_month; $day++) {
                        $today = ($day == date('j') && $month == date('n') && $year == date('Y')) ? 'today' : '';
                        $calendar .= "<td class='$today'>$day</td>";
                        if ($running_day == 6) {
                            $calendar .= '</tr>';
                            if (($day_counter + 1) != $days_in_month) {
                                $calendar .= '<tr>';
                            }
                            $running_day = -1;
                            $days_in_week = 0;
                        }
                        $days_in_week++;
                        $running_day++;
                        $day_counter++;
                    }
                    if ($days_in_week < 8) {
                        for ($x = 1; (8 - $days_in_week) >= $x; $x++) {
                            $calendar .= '<td> </td>';
                        }
                    }
                    $calendar .= '</tr>';
                    $calendar .= '</table>';
                    return $calendar;
                }
                $month = date('n');
                $year = date('Y');
                echo draw_calendar($month, $year);
                ?>
            </div>
        </div>
        <hr>
        <h2 style="text-align: center; border-bottom: 2px solid #184A92; padding-bottom: 10px;">AVERAGE PARKING AVAILABILITY</h2>
        <div class="charts-container">
            <div class="chart">
                <canvas id="parkingStatusChart"></canvas>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const parkingStatusCtx = document.getElementById('parkingStatusChart').getContext('2d');

            // Fetch the data from the server
            fetch('fetch_parking_data.php')
                .then(response => response.json())
                .then(data => {
                    const statusData = {
    labels: data.statusLabels,
    datasets: [{
        label: 'Parking Status',
        data: data.statusCounts,
        backgroundColor: [
            'rgba(255, 99, 132, 0.5)', // Red
            'rgba(255, 159, 64, 0.5)', // Orange
            'rgba(255, 205, 86, 0.5)', // Yellow
            'rgba(75, 192, 192, 0.5)', // Teal
            'rgba(54, 162, 235, 0.5)', // Blue
            'rgba(153, 102, 255, 0.5)', // Purple
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
        ],
        borderWidth: 1
    }]
};

                    new Chart(parkingStatusCtx, {
    type: 'pie',
    data: statusData,
    options: {
        responsive: true,
        aspectRatio: 1.7, // Adjust this value to make the chart smaller
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Parking Status Distribution'
            }
        }
    }
                    });
                })
                .catch(error => console.error('Error fetching parking data:', error));
        });
    </script>
</body>
</html>