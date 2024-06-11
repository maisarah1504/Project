<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$month = isset($_GET['month']) ? $_GET['month'] : '';

if ($month) {
    $sql = "SELECT violationType, COUNT(*) as count 
            FROM traffic_violation 
            WHERE MONTH(violationDate) = ? 
            GROUP BY violationType";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $month);
} else {
    $sql = "SELECT violationType, COUNT(*) as count 
            FROM traffic_violation 
            GROUP BY violationType";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
