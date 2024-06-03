<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
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
        <h3>Booking Form</h3>
        <?php
            include_once('connection.php'); // Ensure this file sets up the $conn variable correctly

            // Setting a variable
            $a = 1;

            try {
                // Prepare and execute the statement
                $stmt = $conn->prepare("SELECT * FROM booking");
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Loop through each user and get the booking ID
                foreach ($bookingID as $id) {
                    // Check if bookingID exists in the user array
                    if (isset($user['bookingID'])) {
                        $id = $user['bookingID']; // This should be correct
                        // Perform your actions with $id here
                        echo "Booking ID: " . $id . "<br>";
                    } else {
                        echo "Booking ID not found for user.<br>";
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            {
        ?>

            <div class="box">
                <table> 
                    <tr> 
                        <td> 
                            <div class="bookingID">
                                <p>Booking ID: <?php echo $booking['id']; ?></p>

                            </div>
            </table>
        <?php 
            }?>
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
