<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="newSummon.css">
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <a href="dashboard.php">
            <img src="images/Logo FKPark.png" alt="logo">
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
            <hr>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
        </ul>
    </aside>
    <main margin-left: 110px;>
        <form id="summonForm" action="submit.php" method="POST" enctype="multipart/form-data">
            
                <h2 style="text-align:center;">New Summon</h2>
            
                <label for="violationType">Violation Type * </label>
                <select name="violationType" id="violationType" required>
                    <option value="Parking Violation">Parking Violation</option>
                    <option value="Campus Traffic">Not comply in campus traffic</option>
                    <option value="Accident">Accident Caused</option>
                </select>

                <br><br>

                <label for="plateNum">Plate Number * </label>
                <input type="text" name="plateNum" id="plateNum" placeholder="Enter the vehicle plate number" required>

                <br><br>

                <label for="vehicleType">Vehicle Type *</label>
                <br>
                <input type="radio" name="vehicleType" id="motor" value="Motorcycle">
                <label for="motor">Motorcycle</label>
                <input type="radio" name="vehicleType" id="car" value="Car">
                <label for="car">Car</label>
        
                <br><br>

                <label for="violationLocation">Violation Location *</label>
                <input type="text" name="violationLocation" id="violationLocation" placeholder="Enter the location of the violation" required>
            
                <br><br>

                <label for="violationDate">Violation Date *</label>
                <input type="date" name="violationDate" id="violationDate" required>

                <br><br>

                <label for="violationTime">Violation Time *</label>
                <input type="time" name="violationTime" id="violationTime" required>

                <br><br>

                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Enter the description of the violation">

                <br><br>

                <label for="demeritPoint">Demerit Point</label>
                <input style="text-align: center;" type="number" name="demeritPoint" id="demeritPoint" readonly>

                <br><br>

                <label for="UKStaffID">Unit Keselamatan Staff ID *</label>
                <input type="text" name="UKStaffID" id="UKStaffID"  placeholder="Enter Staff ID" required>

                <br><br>

                <label for="UKStaffName">Unit Keselamatan Staff Name *</label>
                <input type="text" name="UKStaffName" id="UKStaffName" placeholder="Enter Staff name" required>

                <br><br>

                <label for="uploadEvidence">Upload Evidence *</label>
                <input type="file" name="uploadEvidence" id="uploadEvidence">

                <br><br><br>

                <button id="submit" type="submit">Submit</button>
                <br>
                <button id="cancel" type="reset">Cancel</button>
        
        </form>
        <div id="confirmationMessage" style="display:none;">
            <h2>New Summon Issued</h2>
            <div class="qrCodeContainer">
            <img id="qrCode" src="images/qrcode.png" alt="QR Code" style="max-width: 151px; max-height: 126px; width: 238px; height: 208px; top:5%; left: 5%;">
            </div>

            <table id="submittedDataTable"></table>
        </div>
    </main>
    <footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

    <script>
        function updateDemeritPoint() {
            const violationType = document.getElementById('violationType').value;
            const demeritPointInput = document.getElementById('demeritPoint');

            let demeritPoints = 0;
            switch (violationType) {
                case 'Parking Violation':
                    demeritPoints = 10;
                    break;
                case 'Not Comply in Campus Traffic':
                    demeritPoints = 15;
                    break;
                case 'Accident Caused':
                    demeritPoints = 20;
                    break;
            }

            demeritPointInput.value = demeritPoints;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('violationType').addEventListener('change', updateDemeritPoint);
            updateDemeritPoint(); // Set initial value on page load

            document.getElementById('summonForm').addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to submit the summon?')) {
                    const formData = new FormData(this);

                    fetch('submit.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('summonForm').style.display = 'none';
                            document.getElementById('confirmationMessage').style.display = 'block';


                            // Display the QR code image
                            const qrCodeImage = document.getElementById('qrCode');
                            qrCodeImage.src = 'images/qrcode.png';
                            qrCodeImage.alt = "Qr Code";

                            // Display the submitted data in the table
                            const table = document.getElementById('submittedDataTable');
                            table.innerHTML = `
                                <tr><th>Violation Type</th><td>${data.violationType}</td></tr>
                                <tr><th>Plate Number</th><td>${data.plateNum}</td></tr>
                                <tr><th>Vehicle Type</th><td>${data.vehicleType}</td></tr>
                                <tr><th>Violation Location</th><td>${data.violationLocation}</td></tr>
                                <tr><th>Violation Date</th><td>${data.violationDate}</td></tr>
                                <tr><th>Violation Time</th><td>${data.violationTime}</td></tr>
                                <tr><th>Description</th><td>${data.description}</td></tr>
                                <tr><th>Demerit Point</th><td>${data.demeritPoint}</td></tr>
                                <tr><th>Unit Keselamatan Staff ID</th><td>${data.UKStaffID}</td></tr>
                                <tr><th>Unit Keselamatan Staff Name</th><td>${data.UKStaffName}</td></tr>
                                <tr><th>Evidence</th><td><a href="${data.uploadEvidence}">View Evidence</a></td></tr>
                            `;
                        } else {
                            alert('Failed to issue new summon: ' + data.message);
                        }
                    })
                    .catch(error => {
                        alert('An error occurred: ' + error.message);
                    });
                }
            });
        });
    </script>
</body>
</html>
