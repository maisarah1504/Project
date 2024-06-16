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

// Fetch distinct violation types for the dropdown
$violationTypes = [];
$typeQuery = "SELECT DISTINCT violationType FROM traffic_violation";
$typeResult = $conn->query($typeQuery);

if ($typeResult->num_rows > 0) {
    while ($row = $typeResult->fetch_assoc()) {
        $violationTypes[] = $row['violationType'];
    }
}

// Delete functionality
$deleteSuccess = false;
if (isset($_POST['delete'])) {
    $idToDelete = $_POST['violationID'];
    $deleteQuery = "DELETE FROM traffic_violation WHERE violationID = $idToDelete";
    if ($conn->query($deleteQuery) === TRUE) {
        $deleteSuccess = true;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Initialize variables
$searchQuery = "";

// Check if a search query is set
if (isset($_POST['search'])) {
    $searchQuery = $_POST['searchQuery'];
}

// Fetch traffic violation records from the database with search filter if applicable
$sql = "SELECT violationID, violationType, plateNum, violationDate, demeritPoint FROM traffic_violation";
if (!empty($searchQuery)) {
    $sql .= " WHERE violationType = '" . $conn->real_escape_string($searchQuery) . "'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic Violation Record</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="trafficViolationRecord.css">
    <script>
        function handleView(id) {
            window.location.href = 'viewViolation.php?id=' + id;
        }

        function handleDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                document.getElementById('deleteForm-' + id).submit();
            }
        }
    </script>
    <?php if ($deleteSuccess): ?>
    <script>
        alert('Record deleted successfully');
    </script>
    <?php endif; ?>
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
            <li class="logout-link"><span class="material-symbols-outlined">logout</span><a id="logoutLink" href="../weblogout.php">Logout</a></li>
        </ul>
    </aside>
    <main margin-left: 110px;>
        <h1 style="text-align: center;">Traffic Violation Record</h1>
        <br><br>
        <form method="post" action="">
            <select name="searchQuery">
                <option value="">Select Violation Type</option>
                <?php
                foreach ($violationTypes as $type) {
                    echo "<option value='" . htmlspecialchars($type) . "'" . ($searchQuery == $type ? " selected" : "") . ">" . htmlspecialchars($type) . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="search">Search</button>
        </form>
        <br>
        <table id="violationRecordTable">
            <thead>
                <tr>
                    <th>Plate Number</th>
                    <th>Violation Type</th>
                    <th>Violation Date</th>
                    <th>Demerit Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['plateNum']) . "</td>
                                <td>" . htmlspecialchars($row['violationType']) . "</td>
                                <td>" . htmlspecialchars($row['violationDate']) . "</td>
                                <td>" . htmlspecialchars($row['demeritPoint']) . "</td>
                                <td>
                                    <button onclick='handleView(" . $row['violationID'] . ")'>View</button>
                                    <form id='deleteForm-" . $row['violationID'] . "' method='post' style='display:inline;'>
                                        <input type='hidden' name='violationID' value='" . $row['violationID'] . "'>
                                        <input type='hidden' name='delete' value='1'>
                                        <button type='button' onclick='handleDelete(" . $row['violationID'] . ")'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
<footer>&copy; Universiti Malaysia Pahang Al-Sultan Abdullah</footer>

<script>
    document.getElementById('logoutLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const userConfirmed = confirm('Are you sure you want to logout?'); // Show the confirmation dialog
            if (userConfirmed) {
                window.location.href = '../weblogin.php'; // Redirect if the user confirms
            }
        });
</script>
</html>

<?php
$conn->close();
?>
