<?php
// Include the database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$violationID = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM traffic_violation WHERE violationID = $violationID";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found.";
    exit;
}

// Function to determine status based on demerit points
function determineStatus($points) {
    if ($points < 20) {
        return "Warning given";
    } elseif ($points < 50) {
        return "Revoke of in campus vehicle permission for 1 semester";
    } elseif ($points < 80) {
        return "Revoke of in campus vehicle permission for 2 semesters";
    } else {
        return "Revoke of in campus vehicle permission for the entire study duration";
    }
}

// Determine the status for the fetched record
$status = determineStatus($row['demeritPoint']);

// Update the status in the database
$update_sql = "UPDATE traffic_violation SET status = ? WHERE violationID = ?";
$stmt = $conn->prepare($update_sql);
$stmt->bind_param("si", $status, $violationID);
$stmt->execute();
$stmt->close();

$conn->close();

$uploadEvidence = $row['uploadEvidence'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FKPark</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="trafficViolationRecord.css">
</head>
<body>
    <aside style="background: #184A92;" class="sidebar">
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
        <h2>Violation Details</h2>
        <table>
            <tr><th>ID</th><td><?php echo htmlspecialchars($row['violationID']); ?></td></tr>
            <tr><th>Type</th><td><?php echo htmlspecialchars($row['violationType']); ?></td></tr>
            <tr><th>Location</th><td><?php echo htmlspecialchars($row['violationLocation']); ?></td></tr>
            <tr><th>Date</th><td><?php echo htmlspecialchars($row['violationDate']); ?></td></tr>
            <tr><th>Status</th><td><?php echo htmlspecialchars($status); ?></td></tr>
            <tr><th>Description</th><td><?php echo htmlspecialchars($row['description']); ?></td></tr>
            <tr><th>Evidence</th><td><a href="<?php echo $uploadEvidence; ?>" target="_blank"><?php echo basename($uploadEvidence); ?></a></td></tr>
            <tr><th>Plate Number</th><td><?php echo htmlspecialchars($row['plateNum']); ?></td></tr>
            <tr><th>Vehicle Type</th><td><?php echo htmlspecialchars($row['vehicleType']); ?></td></tr>
            <tr><th>Demerit Points</th><td><?php echo htmlspecialchars($row['demeritPoint']); ?></td></tr>
            <tr><th>Staff ID</th><td><?php echo htmlspecialchars($row['UKStaffID']); ?></td></tr>
            <tr><th>Staff Name</th><td><?php echo htmlspecialchars($row['UKStaffName']); ?></td></tr>
            <tr><th>Time</th><td><?php echo htmlspecialchars($row['violationTime']); ?></td></tr>
        </table>

        <br>

        <form action="editViolation.php?id=<?php echo $violationID; ?>" method="post">
            <button type="submit">Edit</button>
        </form>

        <form action="trafficViolationRecord.php">
            <button type="submit">Back to Records</button>
        </form>
        
    </main>
    <footer style="color: white; background: #184A92;">&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

    <script>
        document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const userConfirmed = confirm('Are you sure you want to logout?'); // Show the confirmation dialog
            if (userConfirmed) {
                window.location.href = '../weblogout.php'; // Redirect if the user confirms
            }
        });
    </script>
</body>
</html>
