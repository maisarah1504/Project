<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="MAIN.css">
    <link rel="stylesheet" href="user_booking.css">
    <link rel="stylesheet" href="new_booking.css">
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

                <label for="filter_date">Date</label>
                <input type="date" id="filterDate" method="get" />

                <label for="filter_time">Time</label>
                <input type="time" id="filterTime" method="get" />
                
                <label for="filter_park_space">Location</label>
                <input type="text" id="filterSpace" method="get" />

                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="container_parking">

            <?php 
                $sql = "SELECT * from parking_space";

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);


                do
                {
            ?>
            <table>
                <form action="CONFIRMATION.php" method="post">
                <tr>
                    <td>
                        <?php echo $row['location']?>
                    </td>
                    <td>
                        <?php 
                            if($row['status'] == "BOOKED")
                            {
                                echo "<button class='status-booked' id = 'booked' style = 'background-color:red'>BOOKED</button> ";

                            }
                            else 
                            {
                                echo "<button class='status-available' id = 'available' style = 'background-color: green'> AVAILABLE </button>"; 

                            }
                        ?>
                    </td>
                </tr>   
                </form>
            </table>
            <?php 
                }while($row = mysqli_fetch_assoc($result));
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
