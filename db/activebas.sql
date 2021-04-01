-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 11:07 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activebas`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(191) NOT NULL,
  `employee_mail` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_mail`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com'),
(2, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com'),
(3, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com'),
(4, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`) VALUES
(1, 'PHP 7 crash course', '2019-09-04 08:00:00'),
(2, 'International PHP Conference', '2019-10-21 10:00:00'),
(3, 'code.talks', '2019-10-24 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `participators`
--

CREATE TABLE `participators` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `participation_fee` float NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participators`
--

INSERT INTO `participators` (`id`, `event_id`, `employee_id`, `participation_fee`, `version`) VALUES
(0, 1, 1, 0, '1.0.17+42'),
(0, 2, 1, 1485.99, '1.0.17+59'),
(0, 2, 2, 657.5, '1.0.15+83'),
(0, 1, 3, 0, '1.0.17+65'),
(0, 1, 4, 0, '1.0.17+65'),
(0, 2, 4, 657.5, '1.1.3'),
(0, 3, 1, 474.81, '1.0.17+59'),
(0, 3, 3, 534.31, '1.1.3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
