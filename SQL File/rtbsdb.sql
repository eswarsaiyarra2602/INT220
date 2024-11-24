-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 03:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtbsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-05-21 18:30:00', 1),
(3, 'Anuj kumar', 'akr305', 1234567891, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-05-21 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `id` int(11) NOT NULL,
  `bookingNo` bigint(12) DEFAULT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `phoneNumber` bigint(12) DEFAULT NULL,
  `bookingDate` date DEFAULT NULL,
  `bookingTime` varchar(100) DEFAULT NULL,
  `noAdults` bigint(20) DEFAULT NULL,
  `noChildrens` bigint(20) DEFAULT NULL,
  `tableId` int(11) DEFAULT NULL,
  `adminremark` varchar(255) DEFAULT NULL,
  `boookingStatus` varchar(15) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`id`, `bookingNo`, `fullName`, `emailId`, `phoneNumber`, `bookingDate`, `bookingTime`, `noAdults`, `noChildrens`, `tableId`, `adminremark`, `boookingStatus`, `postingDate`, `updationDate`) VALUES
(1, 7081250186, 'Anuj Kumar', 'ak@gmail.com', 1425362514, '2023-06-10', '14:00:00', 2, 1, 1, 'Booking accepted', 'Accepted', '2023-05-27 04:34:18', '2023-06-04 03:20:29'),
(2, 323168839, 'Shivani', 'shivani@gmail.com', 4563214520, '2023-06-10', '14:10:00', 4, 1, 3, 'Table booked.', 'Accepted', '2023-05-27 04:35:04', '2023-06-04 17:08:10'),
(3, 4813244763, 'John Doe', 'johndeo@test.com', 7896541230, '2023-06-15', '20:00:00', 3, 1, 0, 'Table not available ', 'Rejected', '2023-05-27 04:35:33', '2023-06-04 17:16:35'),
(4, 2163886205, 'Garima Singh', 'gariam@test.com', 45632145632, '2023-06-24', '15:00:00', 2, 1, 5, 'Table Reserved', 'Accepted', '2023-06-05 00:44:57', '2023-06-05 13:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestables`
--

CREATE TABLE `tblrestables` (
  `id` int(11) NOT NULL,
  `tableNumber` varchar(100) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `AddedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrestables`
--

INSERT INTO `tblrestables` (`id`, `tableNumber`, `creationDate`, `AddedBy`) VALUES
(1, '1', '2023-05-27 03:50:35', 2),
(2, '2', '2023-05-27 03:50:55', 2),
(3, '1A', '2023-05-27 03:51:01', 2),
(4, '3', '2023-05-27 03:51:07', 2),
(5, '3A', '2023-05-27 03:51:11', 2),
(6, '3B', '2023-05-27 03:51:15', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookings`
--
ALTER TABLE `tblbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrestables`
--
ALTER TABLE `tblrestables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblrestables`
--
ALTER TABLE `tblrestables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
