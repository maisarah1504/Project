-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2024 at 06:33 PM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca22076`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `spaceID` int(10) NOT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `duration` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parking_space`
--

CREATE TABLE `parking_space` (
  `spaceID` int(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `qrCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_space`
--

INSERT INTO `parking_space` (`spaceID`, `location`, `capacity`, `status`, `qrCode`) VALUES
(6, '3B', '', ' available', 'https://files.fm/u/9qbegv7dxv'),
(7, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(8, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(9, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(11, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(12, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(13, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(14, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(15, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(16, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(17, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(18, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(19, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(20, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(21, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(22, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(23, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(24, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(25, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(26, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(27, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(28, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(29, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(30, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(31, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(32, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(33, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(34, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(35, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(36, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(37, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(38, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(39, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(40, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(41, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(42, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(43, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(44, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(45, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(46, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(48, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(49, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(50, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(51, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(52, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(53, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(54, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(56, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(57, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(58, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(59, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(60, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(61, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(62, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(63, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(64, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(65, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(66, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(67, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(68, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(69, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(70, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(71, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(72, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(73, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(74, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(75, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(76, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(77, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(78, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(79, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(80, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(81, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(82, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(83, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(84, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(85, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(86, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(87, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(88, '1B', '', 'building maintenance', 'https://files.fm/u/9qbegv7dxv'),
(89, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(90, '3B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(91, '1B', '', 'r faculty events', 'https://files.fm/u/9qbegv7dxv'),
(92, '2B', '', 'mowing the lawns', 'https://files.fm/u/9qbegv7dxv'),
(93, '3B', '', 'windows cleaning', 'https://files.fm/u/9qbegv7dxv'),
(100, '2B', '', 'available', 'https://files.fm/u/9qbegv7dxv'),
(101, '1B', '', 'available', 'https://api.qrserver.com/v1/create-qr-code/?size=1');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_violation`
--

CREATE TABLE `traffic_violation` (
  `violationID` int(10) NOT NULL,
  `violationType` varchar(50) NOT NULL,
  `violationLocation` varchar(50) NOT NULL,
  `violationDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `uploadEvidence` varchar(100) NOT NULL,
  `plateNum` varchar(255) NOT NULL,
  `vehicleType` varchar(255) NOT NULL,
  `demeritPoint` int(11) NOT NULL,
  `UKStaffID` varchar(255) NOT NULL,
  `UKStaffName` varchar(255) NOT NULL,
  `violationTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `traffic_violation`
--

INSERT INTO `traffic_violation` (`violationID`, `violationType`, `violationLocation`, `violationDate`, `status`, `description`, `uploadEvidence`, `plateNum`, `vehicleType`, `demeritPoint`, `UKStaffID`, `UKStaffName`, `violationTime`) VALUES
(85, 'Parking Violation', 'Staff Parking', '2024-06-11', 'Warning given', 'No Staff Sticker', 'uploads/WhatsApp Image 2024-06-03 at 21.43.17_20d2e860.pdf', 'CEV2194', 'Car', 10, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '19:25:00'),
(86, 'Accident Caused', 'Lobby FKOM', '2024-07-11', 'Revoke of in campus vehicle permission for 1 semes', 'Collision with university bus', 'uploads/UAT_FYP2.pdf', 'RAS7203', 'Car', 20, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '12:00:00'),
(87, 'Parking Violation', 'OKU\'s Parking', '2024-06-12', 'Warning given', 'The car was parked in a space designated for handicapped ', 'uploads/PSM 1_RUBRIC for SV Student DBIS.pdf', 'TCT1166', 'Car', 15, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '13:34:00'),
(88, 'Not comply in campus traffic', 'FKOM', '2024-07-04', 'Warning given', 'Speeding', 'uploads/WhatsApp Image 2024-06-03 at 21.43.17_20d2e860.pdf', 'BRM4293', 'Motorcycle', 15, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '09:42:00'),
(89, 'Not comply in campus traffic', 'Dekan\'s Parking', '2024-06-11', 'Warning given', 'Parking at Dekan\'s Parking Spot', 'uploads/PSM 1_RUBRIC for SV Student DBIS.pdf', 'VGG3171', 'Car', 15, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '10:44:00'),
(91, 'Not comply in campus traffic', 'Around Faculty', '2024-08-01', '', 'Speeding', 'uploads/UAT_FYP2.pdf', 'BQH5295', 'Car', 15, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '14:50:00'),
(92, 'Parking Violation', 'Staff\'s Car Parking', '2024-08-03', '', 'Park at Staff\'s Parking without Staff Vehicle Sticker', 'uploads/WhatsApp Image 2024-06-03 at 21.43.17_4e061a42.jpg', 'KEY1', 'Car', 10, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '14:54:00'),
(93, 'Accident Caused', 'Fkom Entrance', '2024-08-10', '', 'Speeding and caused an accident', 'uploads/WhatsApp Image 2024-06-03 at 21.43.17_20d2e860.pdf', 'WSL3785', 'Motorcycle', 20, 'UKS22031', 'Ahmad Abdul Ali Bin Abu', '17:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `username` varchar(7) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `role`, `fullname`) VALUES
(9, 'admin12', '$2y$10$5GqrItIfoSwrBW4rAjX64.ukncNJxZMmth.ASkP.Uhm1qR7NsF/Ei', 'administrator', 'ali bin abu'),
(14, 'sya123', '$2y$10$inELAa92cnIx5KR8sDD7uOaJuNrm/Qg71nD1RdPUYQUggPJhpTK26', 'student', 'syaysa'),
(15, 'diya123', '$2y$10$uVEM9XXqQnycYhUlRUGyIex4MVCjShKK0KeYOfMAeiD07ECgquRpy', 'staff', 'diya');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `licensePlate` varchar(50) NOT NULL,
  `vehicleModel` varchar(50) NOT NULL,
  `documentsDirectory` varchar(100) NOT NULL,
  `approvalStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `traffic_violation`
--
ALTER TABLE `traffic_violation`
  ADD PRIMARY KEY (`violationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `traffic_violation`
--
ALTER TABLE `traffic_violation`
  MODIFY `violationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
