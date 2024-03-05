-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 09:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpaint_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_paint_jobs`
--

CREATE TABLE `car_paint_jobs` (
  `id` int(11) NOT NULL,
  `plate_number` varchar(50) NOT NULL,
  `current_color` varchar(50) NOT NULL,
  `target_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_paint_jobs`
--

INSERT INTO `car_paint_jobs` (`id`, `plate_number`, `current_color`, `target_color`) VALUES
(1, 'sfjasifjasf', '', ''),
(2, 'sdfasdf', 'green', 'green'),
(3, '', 'purple', 'green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_paint_jobs`
--
ALTER TABLE `car_paint_jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_paint_jobs`
--
ALTER TABLE `car_paint_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
