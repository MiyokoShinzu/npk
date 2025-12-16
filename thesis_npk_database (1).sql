-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 05:42 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_npk_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$wt/fN5Ywm7x8dDCmeX32WOTzV.7QgjrL1Dfg/HL1vrVA3SQCNTP0.'),
(2, 'farmer1', '$2y$10$OKSNkcjptoR6Uib9iNdcHOjq8yfih4IDlfDbd.DtbpgPmQLbUv8Hq'),
(3, 'farmer2', '$2y$10$MOQzGTJusNUzMPRcOHJzZeDoSafg8Df3e9.4mHqUU/nkPknhiIHMy');

-- --------------------------------------------------------

--
-- Table structure for table `npk_table`
--

CREATE TABLE `npk_table` (
  `id` bigint NOT NULL,
  `plot_id` bigint NOT NULL,
  `nitrogen` char(10) NOT NULL,
  `phosphorus` char(10) NOT NULL,
  `potassium` char(10) NOT NULL,
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `npk_table`
--

INSERT INTO `npk_table` (`id`, `plot_id`, `nitrogen`, `phosphorus`, `potassium`, `is_deleted`, `time_added`) VALUES
(1, 1, '49', '62', '83', 0, '1985-10-22 00:00:00'),
(2, 1, '83', '98', '60', 0, '2023-10-05 00:00:00'),
(3, 1, '62', '31', '29', 0, '1997-12-12 00:00:00'),
(4, 1, '60', '59', '89', 0, '2006-06-01 00:00:00'),
(5, 2, '24', '22', '66', 0, '1984-03-20 00:00:00'),
(6, 2, '34', '47', '77', 0, '1988-05-13 00:00:00'),
(7, 2, '24', '76', '26', 0, '1986-10-18 00:00:00'),
(8, 2, '69', '86', '46', 1, '2021-06-15 00:00:00'),
(9, 3, '36', '78', '54', 1, '2018-06-05 00:00:00'),
(10, 3, '89', '60', '31', 0, '2016-11-18 00:00:00'),
(11, 3, '33', '44', '55', 0, '2025-02-19 00:00:00'),
(20, 3, '33', '44', '55', 0, '2025-02-19 20:56:00'),
(21, 3, '45', '34', '65', 0, '2020-01-01 18:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` bigint NOT NULL,
  `owner_id` bigint NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `owner_id`, `location`, `description`, `is_deleted`, `time_added`, `time_modified`) VALUES
(1, 2, 'TestLoc, Cagayanqwerqwer', 'Test Description', 0, '2025-04-07 00:39:15', '2025-04-18 02:19:09'),
(2, 2, 'TestLoc, Cagayan', 'Test Description', 0, '2025-04-07 00:39:35', '2025-04-18 02:52:25'),
(30, 3, 'TestLoc, Cagayanedsqdasd', 'Test description 3', 0, '2025-04-18 03:11:38', '2025-04-18 15:45:28'),
(31, 3, 'fasfa', 'adfhahjsfhjsjgjwewerfgwerfgwersgwgswd', 1, '2025-04-18 15:45:34', '2025-04-22 03:34:33'),
(32, 3, 'TestLoc, Cagayan', 'Test Descriptionsss', 0, '2025-04-22 03:35:00', '2025-05-07 07:30:06'),
(33, 1, 'erfewfewf', '234234324', 0, '2025-05-07 13:53:06', '2025-05-07 13:53:06'),
(34, 2, 'grgrgrg', 'AAAAAA', 0, '2025-05-07 13:53:33', '2025-05-07 13:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npk_table`
--
ALTER TABLE `npk_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `npk_table`
--
ALTER TABLE `npk_table`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
