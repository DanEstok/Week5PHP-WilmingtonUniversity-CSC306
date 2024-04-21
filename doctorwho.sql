-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 03:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorwho`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `BillingID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `AmountBilled` decimal(10,2) DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL,
  `PaidDate` date DEFAULT NULL,
  `InsuranceInfo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `MedicationID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `MedicationName` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `DispensedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `MaritalStatus` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientID`, `FirstName`, `LastName`, `Age`, `Gender`, `MaritalStatus`, `Address`) VALUES
(1, 'Dan', 'Estok', 33, 'Male', 'Maried', '68255 Meadow Ave. St. Clairsville, OH 43950'),
(2, 'John', 'Doe', 35, 'Male', 'Single', '123 Main St'),
(3, 'Jane', 'Smith', 28, 'Female', 'Married', '456 Elm St'),
(4, 'Michael', 'Johnston', 42, 'Male', 'Married', '59 Oaktown Rd'),
(5, 'Emily', 'Williams', 30, 'Female', 'Single', '101 Pine St'),
(6, 'Dave', 'Bow', 50, 'Male', 'Divorced', '2 Maple Ave'),
(7, 'Dan', 'Estok', 33, 'Male', 'Maried', '68255 Meadow Ave. St. Clairsville, OH 43950'),
(8, 'Tom', 'Davis', 84, 'Male', 'Single', '8423 Town St'),
(9, 'Dawn', 'Davis', 68, 'Female', 'Single', '8423 Sundew Rd'),
(10, 'Leah', 'Kaye', 42, 'Female', 'Single', '5432 Southgate Parkway'),
(11, 'Eli', 'Boyd', 14, 'Male', 'Single', '83 N 10th St'),
(12, 'Bill', 'Johnson', 35, 'Male', 'Married', '143 Candy St'),
(13, 'Bill', 'Johnston', 35, 'Male', 'Married', '153 Candy St'),
(14, 'Billy', 'Johnston', 35, 'Male', 'Married', '163 Candy St'),
(15, 'Billy', 'Joe', 24, 'Male', 'Single', '163 St Route 22'),
(16, 'Daniel', 'Suttle', 17, 'Male', 'Single', '85 Davey St.'),
(17, 'Daniel', 'Suttle', 17, 'Male', 'Single', '85 Davey St.'),
(18, 'Daniel', 'Suttle', 17, 'Male', 'Single', '85 Davey St.'),
(19, 'Daniel', 'Suttlton', 19, 'Male', 'Single', '854 Davey St.'),
(20, 'Daniel', 'Suttlton Jr', 24, 'Male', 'Single', '854 Davey St.'),
(21, 'Tom', 'Tee', 33, 'Male', 'N/A', 'N/A'),
(22, 'Tom', 'Tee', 33, 'Male', 'N/A', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`BillingID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`MedicationID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `BillingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `MedicationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `medication_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
