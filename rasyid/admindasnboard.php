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
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
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
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .calendar-wrapper {
            width: 40%;
            margin: 0 auto;
        }

        .calendar-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                <a href="parkingArea.php">Admin Parking Space</a>
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
        <h1>ADMIN DASHBOARD</h1>
        <div class="calendar-wrapper">
            <div class="calendar-container">
                <?php
                function draw_calendar($month, $year) {
                    // Draw table for calendar
                    $calendar = '<table>';
                    
                    // Table headings
                    $headings = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    $calendar .= '<tr><th>' . implode('</th><th>', $headings) . '</th></tr>';
                    
                    // Days and weeks vars now ...
                    $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
                    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
                    $days_in_week = 1;
                    $day_counter = 0;
                    $dates_array = [];
                    
                    // Row for week one
                    $calendar .= '<tr>';
                    
                    // Print "blank" days until the first of the current week
                    for ($x = 0; $x < $running_day; $x++) {
                        $calendar .= '<td> </td>';
                        $days_in_week++;
                    }
                    
                    // Keep going with days...
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
                    
                    // Finish the rest of the days in the week
                    if ($days_in_week < 8) {
                        for ($x = 1; $x <= (8 - $days_in_week); $x++) {
                            $calendar .= '<td> </td>';
                        }
                    }
                    
                    $calendar .= '</tr>';
                    $calendar .= '</table>';
                    
                    return $calendar;
                }
                
                // Get current month and year
                $month = date('n');
                $year = date('Y');
                
                // Draw calendar
                echo draw_calendar($month, $year);
                ?>
            </div>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>
