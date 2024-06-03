<?php
    require_once('connection.php'); 

    $query = "select * from booking";
    $result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="confirmation.css">

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
                <span class="dropdown-title">booking<span class="material-symbols-outlined">expand_more</span></span>
            </div>
            <div class="dropdown-container">
                <a href="NEW_BOOKING.php">New Booking</a>
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
        <div class="container">
            <div class = "row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">Booking Form</h2>
                        </div>
                    <div class="body">
                        <table class="table-bordered">
                            <tr>
                                <td>Booking ID</td>
                                
                            </tr>
                            <tr>
                                <td>Parking ID</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Parking Location</td>
                            </tr>
                            <tr>
                                <td>Student ID</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                            </tr>
                            <tr>
                                <td>Vehicle</td>
                            </tr>
                            <tr>
                                <td>Start time</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </main>

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
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

</body>    

</html>
