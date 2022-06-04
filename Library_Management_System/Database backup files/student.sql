-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 03:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gen` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `lid` (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `address`, `gen`, `semail`, `mobile`, `lid`) VALUES
('ABBCA12345', 'Krati', 'Gupta', 'Aishbagh,Lucknow', 'female', 'krati200@gmail.com', '9876543945', '101'),
('ABBCA12367', 'Rashmi', 'Tiwari', 'House No5 Rainagar, jaisalmer', 'female', 'rashmi@gmail.com', '9876543928', '102'),
('ABBCA13245', 'Gauri', 'Sharma', 'House No. 5 Nagargarh , jaipur', 'female', 'gauri@yahoo.in', '9876567897', '102'),
('ABBSM18796', 'Gargi', 'Garg', 'Gandhinagar,Gujarat', 'female', 'gargi@yahoo.in', '8789675488', '102'),
('ABBSM19345', 'Nisha', 'Kapoor', '3/1 House No.3 JaiNagar, jaipu', 'female', 'Nisha123@gmail.com', '8989765679', '101'),
('ABBSM78906', 'Harshita', 'Sharma', 'Hisar , Haryana', 'female', 'harshita@123', '8798900897', '103'),
('BTBTI13456', 'Sanskriti', 'Jaiswal', 'Malviya Nagar,Delhi', 'female', 'sans@gmail.com', '9876985443', '101'),
('BTBTI45367', 'Reshma', 'Garg', '4/2 vikasnagar, Lucknow', 'female', 'reshma@gmail.com', '8908907651', '103');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`lid`) REFERENCES `user` (`lid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
