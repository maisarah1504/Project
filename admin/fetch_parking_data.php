<?php
include 'db_connect.php';

$statusCounts = [
    'Faculty event' => 0,
    'building maintenance' => 0,
    'mowing the lawns' => 0,
    'windows cleaning' => 0,
    'available' => 0
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
        } else {
            $statusCounts[$status] = 1;
        }

        if (isset($locationCounts[$location])) {
            $locationCounts[$location]++;
        } else {
            $locationCounts[$location] = 1;
        }
    }
} else {
    echo json_encode([
        'statusLabels' => [],
        'statusCounts' => [],
        'locationLabels' => [],
        'locationCounts' => []
    ]);
    exit();
}

$conn->close();

echo json_encode([
    'statusLabels' => array_keys($statusCounts),
    'statusCounts' => array_values($statusCounts),
    'locationLabels' => array_keys($locationCounts),
    'locationCounts' => array_values($locationCounts)
]);
?>
