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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`ID` int(20) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `PhoneNo` int(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `DOB`, `PhoneNo`, `Email`, `Password`) VALUES
(6, 'WAFA DAYINI', '2004-03-19', 2147483647, 'wafa@gmail.com', 'wafa19'),
(8, 'WAFA DAYINI', '2004-03-19', 194622096, 'wafa19@gmail.com', 'wafa'),
(9, 'KARMILA', '2000-12-16', 145213542, 'karmila@gmail.com', 'mila'),
(10, 'KHADIJA', '2004-01-01', 154210321, 'dija@gmail.com', '123'),
(11, 'AIDEN KIM', '2002-02-12', 121236527, 'aiden@gmail.com', '000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
