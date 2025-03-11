-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 07:05 AM
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
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
`ID` int(5) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `PhoneNo` int(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `Name`, `PhoneNo`, `Email`, `Password`) VALUES
(1, 'Dr Ainil', 172354647, 'ainilsofiyyah@gmail.com', 'ainil'),
(3, 'Dr Nel', 172354647, 'ainilsofiyyah@gmail.com', 'nel'),
(4, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', 'nel'),
(5, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', ''),
(6, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', ''),
(7, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', ''),
(8, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', ''),
(9, 'Dr Wafa', 172354647, 'ainilsofiyyah@gmail.com', ''),
(10, 'aina', 123456789, 'aina@gmail.com', 'aina123'),
(12, 'Zamri', 109987654, 'zam@yahoo.com', 'fani14'),
(13, 'AINA BADRISHA BINTI ZAMRI', 137046225, 'abadrisha@gmail.com', 'aaaaa'),
(14, 'Dr Tasha Man', 134456790, 'tasha@yahoo.com', 'tasha123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
