-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 10:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `huasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentNo` varchar(4) NOT NULL DEFAULT '',
  `ID` int(20) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `PhoneNo` int(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Symptom` varchar(20) DEFAULT NULL,
  `Message` mediumtext,
  `Status` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `DocName` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentNo`, `ID`, `Name`, `PhoneNo`, `Email`, `AppointmentDate`, `AppointmentTime`, `Symptom`, `Message`, `Status`, `Remark`, `DocName`) VALUES
('0001', 22, 'wafa', 194622096, 'wafa@gmail.com', '2024-05-18', '14:30:00', 'fever', '', 'pending', NULL, 'pending'),
('0002', 23, 'malia', 194652310, 'malia51@gmail.com', '2024-05-20', '15:30:00', 'vomiting', '', 'pending', NULL, 'pending'),
('0004', 25, 'NUR MAISARA', 134598741, 'maisaraa@gmail.com', '2024-05-24', '10:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0005', 26, 'NUR MAISARA', 134598741, 'maisaraa@gmail.com', '2024-05-24', '10:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0006', 27, 'NUR MAISARA', 134598741, 'maisaraa@gmail.com', '2024-05-30', '12:00:00', 'fever', '', 'pending', NULL, 'pending'),
('0007', 28, 'AINA BADRISHA', 162413201, 'aina12@gmail.com', '2024-05-22', '10:15:00', 'fever', '', 'pending', NULL, 'pending'),
('0008', 29, 'AINIL SOFIYYAH', 2147483647, 'ainil@gmail.com', '2024-05-20', '09:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0009', 30, 'AINIL SOFIYYAH', 17235464, 'ainil@gmail.com', '2024-05-22', '12:00:00', 'itchiness', '', 'pending', NULL, 'pending'),
('0010', 31, 'AINIL SOFIYYAH', 172354647, 'ainil@gmail.com', '2024-05-22', '10:50:00', 'fever', 'with severe headache', 'pending', NULL, 'pending'),
('0011', 32, 'AINIL SOFIYYAH', 172354647, 'ainil@gmail.com', '2024-05-22', '10:50:00', 'fever', 'with severe headache', 'pending', NULL, 'pending'),
('0015', 36, 'WAFA DAYINI', 194622096, 'wafa19@gmail.com', '2024-07-24', '14:30:00', 'fever', '', 'pending', NULL, 'pending'),
('0016', 37, 'WAFA DAYINI', 194622096, 'wafa19@gmail.com', '2024-05-22', '16:35:00', 'itchiness', '', 'pending', NULL, 'pending'),
('0017', 38, 'KARMILA', 145213542, 'karmila@gmail.com', '2024-05-23', '16:00:00', 'fever', '', 'pending', NULL, 'pending'),
('0018', 0, 'KHADIJA', 154210321, 'dija@gmail.com', '2024-06-15', '09:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0019', 0, 'AIDEN KIM', 121236527, 'aiden@gmail.com', '2024-05-26', '09:00:00', 'vomiting', '', 'pending', NULL, 'pending'),
('0020', 11, 'AIDEN KIM', 121236527, 'aiden@gmail.com', '2024-05-24', '10:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0021', 11, 'AIDEN KIM', 121236527, 'aiden@gmail.com', '2024-05-30', '10:00:00', 'cough', '', 'pending', NULL, 'pending'),
('0022', 11, 'AIDEN KIM', 121236527, 'aiden@gmail.com', '2024-06-05', '10:30:00', 'itchiness', '', 'pending', NULL, 'pending'),
('0023', 11, 'AIDEN KIM', 121236527, 'aiden@gmail.com', '2024-05-23', '14:00:00', 'fever', '', 'pending', NULL, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
 ADD PRIMARY KEY (`AppointmentNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
