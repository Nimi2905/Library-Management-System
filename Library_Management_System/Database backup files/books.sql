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
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `edition` int(11) NOT NULL,
  `publ` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `issued` tinyint(1) NOT NULL DEFAULT '0',
  `sid` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `title`, `author`, `edition`, `publ`, `issued`, `sid`) VALUES
('A123', 'Computer Networking', 'Tanenbaum', 5, 'Pearson', 0, NULL),
('A124', 'SQL Cookbook', 'Anthony Molinaro', 2, 'OReilly', 0, NULL),
('A125', 'SQL The Complete Reference', 'James Groff', 3, 'McGraw Hill Education', 0, NULL),
('B123', 'Accountancy', 'RK Mittal', 5, 'VK Global Publications', 0, NULL),
('B126', 'Business Studies', 'Poonam Gandhi', 4, 'VK Global Publications', 0, NULL),
('C123', 'Mathematics for Class 10 by R ', ' R.D. Sharma', 4, 'Dhanpat Rai Publication', 0, NULL),
('C234', 'Introduction to Quantum Mechan', 'Griffiths', 3, 'Cambridge University Press ', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
