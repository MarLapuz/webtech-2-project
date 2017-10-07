-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 09:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u668189280_heart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `User_ID` int(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `AccountDescription` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`User_ID`, `Username`, `Password`, `AccountDescription`) VALUES
(1, 'Arlan', 'Cabuso', 'Admin'),
(2, 'Mar', 'Lapuz', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `tblguardian`
--

CREATE TABLE `tblguardian` (
  `Guardian_ID` int(100) NOT NULL,
  `GuardianName` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `GuardianOf` varchar(20) NOT NULL,
  `RelationToPatient` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `Patient_ID` int(11) NOT NULL,
  `Account_ID` int(100) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(100) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Symptom` varchar(50) NOT NULL,
  `DateSubmitted` varchar(20) NOT NULL,
  `TimeSubmitted` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `Schedule_ID` int(11) NOT NULL,
  `Account_ID` int(100) NOT NULL,
  `PatientFirstName` varchar(50) NOT NULL,
  `PatientLastName` varchar(50) NOT NULL,
  `PatientNumber` varchar(12) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `Doctor` varchar(50) NOT NULL,
  `MessageOfDoctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `tblguardian`
--
ALTER TABLE `tblguardian`
  ADD PRIMARY KEY (`Guardian_ID`),
  ADD KEY `Guardian_ID` (`Guardian_ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`Patient_ID`,`Account_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`Schedule_ID`,`Account_ID`),
  ADD KEY `Schedule_ID` (`Account_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `User_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblguardian`
--
ALTER TABLE `tblguardian`
  MODIFY `Guardian_ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
