<?php
include 'db_connect.php';

$statusCounts = [
    'Faculty event' => 30,
    'building maintenance' => 10,
    'mowing the lawns' => 20,
    'cleaning windows' => 20,
    'available' => 30
];
$locationCounts = [];

$sql = "SELECT location, status FROM parking_space";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $status = $row['status'];
        $location = $row['location'];
        
        if (isset($statusCounts[$status])) {
            $statusCounts[$status]++;
        }

        if (isset($locationCounts[$location])) {
            $locationCounts[$location]++;
        } else {
            $locationCounts[$location] = 1;
        }
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode([
    'statusLabels' => array_keys($statusCounts),
    'statusCounts' => array_values($statusCounts),
    'locationLabels' => array_keys($locationCounts),
    'locationCounts' => array_values($locationCounts)
]);
?>
