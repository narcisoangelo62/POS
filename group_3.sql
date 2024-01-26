-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 03:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `Student_ID` varchar(12) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `Student_ID`, `First_Name`, `Last_Name`, `Phone`, `Address`) VALUES
(1, '121', 'aaaaaaaa', 'AAAAAAAAAAAA', 12121, 'Secret');

-- --------------------------------------------------------

--
-- Table structure for table `occupants`
--

CREATE TABLE `occupants` (
  `ID` int(11) NOT NULL,
  `Student_ID` varchar(12) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Room_Number` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `Year_Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupants`
--

INSERT INTO `occupants` (`ID`, `Student_ID`, `First_Name`, `Last_Name`, `Room_Number`, `Age`, `Address`, `Phone`, `Course`, `Year_Level`) VALUES
(1, '121', 'asdga', 'AAAAAAAAAAA', 121, 21, 'asgasga', 12121, 'dsagsgas', 3),
(6, '123', 'xxxxx', 'XXXXX', 122, 21, 'asdgasga', 12121, 'BS-InfoTech', 3),
(9, '127', 'dsags', 'asdgasd', 121, 21, 'sadgadsg', 12121, 'BS-InfoTech', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Amount_Paid` int(11) NOT NULL,
  `Date_Paid` date NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`ID`, `Student_ID`, `Amount_Paid`, `Date_Paid`, `Balance`) VALUES
(10, 123, 300, '2022-12-12', 0),
(11, 121, 300, '2022-12-15', 0),
(12, 127, 300, '2022-12-09', 0),
(13, 121, 300, '2023-01-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_Number` int(11) NOT NULL,
  `Slots` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `ValPerBed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_Number`, `Slots`, `Available`, `ValPerBed`) VALUES
(121, 8, 0, 300),
(122, 6, 0, 300),
(127, 8, 0, 300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Name`, `Type`) VALUES
(1, 'admin', '1234', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `violators`
--

CREATE TABLE `violators` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Number_Violations` int(11) NOT NULL,
  `Level_Violations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `occupants`
--
ALTER TABLE `occupants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occupants`
--
ALTER TABLE `occupants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
