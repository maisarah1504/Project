<?php 
    session_start();

    include "../navigation/sidebaradmin.php";
    require "../session.php";
    include "../student/webconnect.php";

    // Fetch booking data
    $sql = "SELECT bookingID, userID, spaceID FROM booking";
    $result = mysqli_query($conn, $sql);

    // Fetch data for the graph
    $graph_sql = "SELECT COUNT(*) as count, startDate FROM booking GROUP BY startDate";
    $graph_result = mysqli_query($conn, $graph_sql);

    // Prepare data for Chart.js
    $dates = [];
    $counts = [];

    while ($row = mysqli_fetch_assoc($graph_result)) {
        $dates[] = $row['startDate'];
        $counts[] = $row['count'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .chart-container {
            width: 80%;
            margin: 0 auto;
        }
        .table-list {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table-list th, .table-list td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table-list th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Parking Bookings Overview</h2>

        <!-- Graph Container -->
        <div class="chart-container">
            <canvas id="bookingChart"></canvas>
        </div>

        <!-- Booking List Table -->
        <h3>Booking List</h3>
        <table class="table-list">
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Space ID</th>
            </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['bookingID']; ?></td>
                <td><?php echo $row['userID']; ?></td>
                <td><?php echo $row['spaceID']; ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>

    <script>
        // Data for Chart.js
        const labels = <?php echo json_encode($dates); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Number of Bookings',
                data: <?php echo json_encode($counts); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Config for Chart.js
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render Chart
        const bookingChart = new Chart(
            document.getElementById('bookingChart'),
            config
        );
    </script>
</body>
</html>
