<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="MAIN.css">
    <link rel="stylesheet" href="USER_BOOKING.css">
    <?php
        include('connection.php')
    ?>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="images/Logo FKPark.png" alt="logo">
            <h2>FKPark</h2>
        </div>  
        <ul class="links">
            <li>                
            <div class="menu-item">
                <span class="material-symbols-outlined">browse</span>
                <span class="dropdown-title">Booking<span class="material-symbols-outlined">expand_more</span></span>
            </div>
            <div class="dropdown-container">
                <a href="">New Booking</a>
                <a href="#">Booking History</a>
            </div>
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
        </ul>
    </aside>
    <main>
        <div class="form">
            <form action="New_Booking.php" method="get" > 
                <h3>Parking List</h3>
                <label for="filter_date">Filter</label>
                <input type="date" id="filterDate" method="get" />
                <label for="filter_time">Filter</label>
                <input type="time" id="filterTime" method="get" />
                <label for="filter_park_space">Filter</label>
                <input type="text" id="filterSpace" method="get" />
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="container_parking">
            <?php 
                $filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : '';
                $filter_time = isset($_GET['filter_time']) ? $_GET['filter_time'] : '';
                $filter_space = isset($_GET['filter_space']) ? $_GET['filter_space'] : '';
                
                $sql = "SELECT * from parking_space WHERE 1=1";

                if (!empty($filter_date)) {
                    $sql .= " AND date = '$filter_date'";
                }
                if (!empty($filter_time)) {
                    $sql .= " AND date = '$filter_time'";
                }
                if (!empty($filter_space)) {
                    $sql .= " AND date = '$filter_space'";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class = 'parking-item'>";
                        echo "<h4>Parking Space: " . $row['space'] . "</h4>";
                        echo "<p>Date: " . $row['date'] . "</p>";
                        echo "<p>Time: " . $row['time'] . "</p>";
                        echo "</div>";
                    }
                }
                else {
                    echo "<br>No result found";
                }

                $conn->close();
            ?>
        </div>

    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

    <!-- JavaScript to handle dropdown -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownBtns = document.querySelectorAll(".dropdown-btn");
            dropdownBtns.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    var dropdownContainer = this.nextElementSibling;
                    dropdownContainer.style.display = dropdownContainer.style.display === "block" ? "none" : "block";
                });
            });
        });
    </script>
</body>
</html>
