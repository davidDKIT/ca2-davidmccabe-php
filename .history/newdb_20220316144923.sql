-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 20, 2022 at 06:31 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukraine_signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
DROP DATABASE IF EXISTS ukraine_signup;
CREATE DATABASE IF NOT EXISTS ukraine_signup;
USE ukraine_signup;

DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `recruits`;

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Infantry'),
(2, 'Airforce'),
(3, 'Tank Crew'),
(4, 'Bombers'),
(5, 'Sniper Team');

-- --------------------------------------------------------

--
-- Table structure for table `recruits`
--

CREATE TABLE `recruits` (
  `recruitID` int(11) NOT NULL,
  `recruitName` varchar(255),
  `categoryID` int(11) NOT NULL,
  `job` varchar(255),
  `militaryExp` varchar(50) NOT NULL,
  `image` varchar(255),
  `bloodType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruits`
--

INSERT INTO `recruits` (`recruitID`, `recruitName`,`categoryID`, `job`, `militaryExp`, `image`, `bloodType`) VALUES
(1,'Olexiy Havrylyuk', 1, 'Field Artillery Officer', 'YES', '4733.jpg', "A"),
(2, 'Oleksandr Sobol', 3, 'Combat Engineer', 'YES', '11537.jpg', "B"),
(3, 'Sofron Sokolov', 3, 'Combat Engineer', 'YES', '28893.jpg', "O Positive"),
(4, 'Valery Zelenko', 2,'Soldeir', 'NO', '119273.jpg', "O"),
(5, 'Nil Borisov', 1, 'Field Artillery Officer', 'NO', '233012.jpg', "O"),
(6, 'Nazar Zyma', 3, 'Combat Engineer', 'NO', '266531.jpg', "O"),
(7, 'Erast Vasylyk', 3,'Combat Engineer', 'NO', '329484.jpg', "O Positive"),
(8, 'Pavlo Bondarenko', 1, 'Field Artillery Officer', 'YES', '361782.jpg', "O Positive"),
(9, 'Martyn Sokolov', 4, 'Wheeled Vehicle Mechanic', 'NO', '373465.jpg', "O Positive"),
(10, 'Valeriy Kovalchuk', 4, 'Wheeled Vehicle Mechanic', 'NO', '373989.jpg', "O"),
(11, 'Yevhen Chayka', 5, 'Marksman Sniper', 'YES', '374104.jpg', "O"),
(12, 'Tymofiy Baran', 2, 'Soldeir', 'YES', '644055.jpg', "A"),
(13, 'Stanislav Kravchenko', 2, 'Soldeir', 'YES', '644471.jpg', "O Positive"),
(14, 'Markiyan Holub', 5, 'Marksman Sniper', 'YES', '834551.jpg', "O Positive"),
(15, 'Heorhiy Shevchuk', 5, 'Marksman Sniper', 'NO', '835545.jpg', "O");

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `recruits`
--
ALTER TABLE `recruits`
  ADD PRIMARY KEY (`recruitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recruits`
--
ALTER TABLE `recruits`
  MODIFY `recruitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;