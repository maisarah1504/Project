<?php
include("connectdatabse.php");

// Establish database connection
$conn = connectDatabase();

// Define SQL dump data
$sqlDump = "
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 20, 2024 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `spaceID` int(10) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `demerit_point` (
  `demeritID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `point` int(10) NOT NULL,
  `demeritTimestamp` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `parking_space` (
  `spaceID` int(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `qrCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `traffic_violation` (
  `violationID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `violationType` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `violationTimestamp` datetime NOT NULL,
  `violationQrCode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vehicle` (
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `licencePlate` varchar(50) NOT NULL,
  `vehicleColor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

ALTER TABLE `demerit_point`
  ADD PRIMARY KEY (`demeritID`);

ALTER TABLE `parking_space`
  ADD PRIMARY KEY (`spaceID`);

ALTER TABLE `traffic_violation`
  ADD PRIMARY KEY (`violationID`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleID`);

ALTER TABLE `booking`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `demerit_point`
  MODIFY `demeritID` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `parking_space`
  MODIFY `spaceID` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `traffic_violation`
  MODIFY `violationID` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `vehicle`
  MODIFY `vehicleID` int(10) NOT NULL AUTO_INCREMENT;

COMMIT;
";

// Execute SQL dump
if ($conn->multi_query($sqlDump) === TRUE) {
    echo "Tables created successfully<br>";
} else {
    echo "Error creating tables: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
