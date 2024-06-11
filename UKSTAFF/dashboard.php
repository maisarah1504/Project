<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        .chart-box {
            flex: 1;
            padding: 20px;
            max-width: 40%;
        }
        .controls {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <a href="dashboard.php">
                <img src="../images/Logo FKPark.png" alt="logo">
            </a>
            <h2>FKPark</h2>
        </div>
        <ul class="links">
            <li><span class="material-symbols-outlined">flag</span><a href="newSummon.php">Issue Traffic Summon</a></li>
            <li><span class="material-symbols-outlined">monitoring</span><a href="trafficViolationRecord.php">Traffic Violation Record</a></li>
            <hr>
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a href="#">Logout</a></li>
        </ul>
    </aside>
    <main style="background-color: white; margin-left: 110px;">
        <h1 style="text-align: center;">Welcome to Unit Keselamatan Staff Dashboard</h1>
        
        <div class="chart-container">

            <div class="chart-box">
                <h2 style="text-align: center">Total Violations Has Been Issued</h2>
                <canvas id="violationCountChart"></canvas>
            </div>
            <div class="chart-box">
            <div class="controls">
                
            <h2>Total Violations By Month</h2>
            <label for="monthSelect">Select Month:</label>
            <select id="monthSelect">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            </div>
                <canvas id="violationTypeChart"></canvas>
            </div>
        </div>
    </main>
    <footer style="color: black;">&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
    <script>
        document.getElementById('monthSelect').addEventListener('change', updateViolationTypeChart);

        function updateViolationTypeChart() {
            const month = document.getElementById('monthSelect').value;
            fetch(`getViolationData.php?month=${month}`)
                .then(response => response.json())
                .then(data => {
                    const ctx1 = document.getElementById('violationTypeChart').getContext('2d');

                    const labels = data.map(row => row.violationType);
                    const counts = data.map(row => row.count);

                    if (window.violationTypeChart) {
                        window.violationTypeChart.destroy();
                    }

                    window.violationTypeChart = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Violations',
                                data: counts,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
        }

        function loadInitialCharts() {
            fetch('getViolationData.php')
                .then(response => response.json())
                .then(data => {
                    const ctx1 = document.getElementById('violationTypeChart').getContext('2d');
                    const ctx2 = document.getElementById('violationCountChart').getContext('2d');

                    const labels = data.map(row => row.violationType);
                    const counts = data.map(row => row.count);

                    window.violationTypeChart = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Violations',
                                data: counts,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    new Chart(ctx2, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Violation Distribution',
                                data: counts,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                });
        }

        loadInitialCharts();
    </script>
</body>
</html>
