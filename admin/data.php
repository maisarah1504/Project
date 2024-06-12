<?php

include("dconnectdatabase.php");
$conn = connectDatabase();

// Sample data for User table
$userData = [
    ['CB22068', 'Muhammad Iqmal bin Razelan', 'Qma78', 'Admin'],
    ['CD20001', 'Nur Ain binti Latif', 'Ann55', 'User'],
    ['FT23068', 'Fauzana Izzati binti Said', 'FauzNana', 'User'],
    ['AD21080', 'Ikhwan Badzli bin Ali', 'Na34', 'User'],
    ['AD20011', 'Radhdi bin Muzammil', 'Rima33', 'User'],
    ['AD22009', 'Ainnur binti Razzaq', 'Zza789', 'User'],
    ['ST23055', 'Anas bin mustofa', 'Anas88', 'User'],
    ['ST21068', 'Nur Izhar bin Zaid', 'Nurzhar99', 'User'],
    ['ST22069', 'Fuziah binti Salleh', 'Fusasseh78', 'User']
];

// Sample data for Booking table
$bookingData = [
    [1, 1, 7001, '2024-05-16 08:00:00', '2024-05-16 10:00:00', 'Active'],
    [2, 2, 7002, '2024-05-13 10:45:00', '2024-05-13 12:15:00', 'Active'],
    [3, 3, 7003, '2024-05-11 11:30:00', '2024-05-11 15:30:00', 'Active']
];

// Sample data for ParkingSpace table
$parkingSpaceData = [
    [7001, 'A1', 'Student', 'Occupied', 'FKpark/Park/sdasd6jhkHd8jd'],
    [7002, 'B2', 'Student', 'Occupied', 'FKpark/Park/syug98hJKgshda'],
    [7003, 'C3', 'Student', 'Under Maintenance', 'FKpark/Park/jsgd7dksdJH8']
];

// Sample data for TrafficViolation table
$trafficViolationData = [
    [1, 2, 2, 'Parking Violation', 'Area B', '2024-05-12 09:30:00', 'FKPark/SummonPay/skja7djAwgd9uf', 'Active', 'Park without booking'],
    [2, 3, 1, 'Accident', 'Area A', '2024-05-14 14:15:00', 'FKPark/SummonPay/jh3yuWf8jdwjjk', 'Active', 'Hit stop signboard']
];

// Execute SQL INSERT statements
foreach ($userData as $data) {
    $sql = "INSERT INTO user (userID, username, password, role) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
    $conn->query($sql);
}

foreach ($bookingData as $data) {
    $sql = "INSERT INTO booking (bookingID, userID, spaceID, startTime, endTime, status) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')";
    $conn->query($sql);
}

foreach ($parkingSpaceData as $data) {
    $sql = "INSERT INTO parking_space (spaceID, location, capacity, status, qrCode) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
    $conn->query($sql);
}

foreach ($trafficViolationData as $data) {
    $sql = "INSERT INTO traffic_violation (violationID, userID, vehicleID, violationType, location, violationTimestamp, violationQrCode, status, description) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]')";
    $conn->query($sql);
}

$conn->close();
