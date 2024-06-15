<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="editViolation.css">

    <script>
        document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const userConfirmed = confirm('Are you sure you want to logout?'); // Show the confirmation dialog
            if (userConfirmed) {
                window.location.href = '../weblogin.php'; // Redirect if the user confirms
            }
        });

        function handleResponse(response) {
            if (response.success) {
                // If update successful, show alert and return to previous page
                alert('Record updated successfully');
                window.location.href = 'trafficViolationRecord.php';
            } else {
                // If update failed, show error message
                alert(response.message);
            }
        }

        function updateViolation(event) {
            event.preventDefault(); // Prevent default form submission behavior
            console.log('Form submitted');
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateViolation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    handleResponse(response);
                }
            };

            // Serialize form data
            var formData = new FormData(document.getElementById('updateForm'));
            var serializedFormData = '';
            for (var pair of formData.entries()) {
                serializedFormData += encodeURIComponent(pair[0]) + '=' + encodeURIComponent(pair[1]) + '&';
            }
            serializedFormData = serializedFormData.slice(0, -1); // Remove the last '&'

            // Send serialized form data
            xhr.send(serializedFormData);
        }
</script>
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
            <li>
                <span class="material-symbols-outlined">flag</span>
                <a href="newSummon.php">Issue Traffic Summon</a>
            </li>
            <li>
                <span class="material-symbols-outlined">monitoring</span>
                <a href="trafficViolationRecord.php">Traffic Violation Record</a>
            </li>
            <li><span class="material-symbols-outlined">check</span><a href="vehicleApproval.php">Vehicle Approval</a></li>
            <hr>
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a id="logoutLink" href="#">Logout</a></li>
        </ul>
    </aside>
    <main margin-left: 110px;>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fkpark";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $violationID = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        $sql = "SELECT * FROM traffic_violation WHERE violationID = $violationID";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            //echo "No record found.";
            exit;
        }

        $conn->close();
        ?>

        
<form id="updateForm" method="post" action="updateViolation.php" enctype="multipart/form-data">


    <input type="hidden" name="violationID" value="<?php echo $violationID; ?>"> 
            <h2>Edit Violation</h2>
            <div class="formContent">
                <input type="hidden" name="violationID" value="<?php echo $row['violationID']; ?>">

                <label for="violationType">Violation Type:</label>
                <select name="violationType">
                    <option value="Parking Violation" <?php if($row['violationType'] == "Parking Violation") echo "selected"; ?>>Parking Violation</option>
                    <option value="Not Comply in Campus Traffic" <?php if($row['violationType'] == "Not Comply in Campus Traffic") echo "selected"; ?>>Not Comply in Campus Traffic</option>
                    <option value="Accident caused" <?php if($row['violationType'] == "Accident Caused") echo "selected"; ?>>Accident Caused</option>
                </select>

                <br>

                <label for="plateNum">Plate Number:</label>
                <input type="text" name="plateNum" value="<?php echo htmlspecialchars($row['plateNum']); ?>">

                <br>

                <label for="vehicleType">Vehicle Type:</label><br>
                <input type="radio" name="vehicleType" id="motor" value="Motorcycle" <?php if($row['vehicleType'] == "Motorcycle") echo "checked"; ?>>
                <label for="motor">Motorcycle</label><br>
                <input type="radio" name="vehicleType" id="car" value="Car" <?php if($row['vehicleType'] == "Car") echo "checked"; ?>>
                <label for="car">Car</label><br>

                <br>

                <label for="violationLocation">Location:</label>
                <input type="text" name="violationLocation" value="<?php echo htmlspecialchars($row['violationLocation']); ?>">

                <br>

                <label for="violationDate">Date:</label>
                <input type="date" name="violationDate" value="<?php echo htmlspecialchars($row['violationDate']); ?>">

                <br>

                <label for="violationTime">Time:</label>
                <input type="time" name="violationTime" value="<?php echo htmlspecialchars($row['violationTime']); ?>">

                <br>

                <label for="description">Description:</label>
                <textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>

                <br>

                <label for="demeritPoint">Demerit Points:</label>
                <input type="number" name="demeritPoint" value="<?php echo htmlspecialchars($row['demeritPoint']); ?>">

                <br>

                <label for="UKStaffID">Staff ID:</label>
                <input type="text" name="UKStaffID" value="<?php echo htmlspecialchars($row['UKStaffID']); ?>">

                <br>

                <label for="UKStaffName">Staff Name:</label>
                <input type="text" name="UKStaffName" value="<?php echo htmlspecialchars($row['UKStaffName']); ?>">

                <br>
                
                <label for="uploadEvidence">Evidence:</label>
                <input type="file" name="uploadEvidence" value="<?php echo htmlspecialchars($row['uploadEvidence']); ?>">
            
                <br>
                
                <input type="submit" value="Save" onclick="updateViolation(event)">

                <button type="button" class="cancel-button" onclick="window.location.href='trafficViolationRecord.php'">Cancel</button>
            </div>
        </form>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>
</body>
</html>


