-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay_child_immunization_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `verification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `verification`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tumabienemarchie034@gmail.com', '$2y$10$YN7LYDqPdfXGYYXR.lEnlOX5Q7C1OToNgf5d.oixE46zDARKAle2e', '66a8a5bff20d8', '2024-06-30 20:26:56', '2024-07-30 08:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `barangay` text NOT NULL,
  `child_no` varchar(100) DEFAULT NULL,
  `c_fname` text NOT NULL,
  `c_mname` text DEFAULT NULL,
  `c_lname` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date_seen` date NOT NULL,
  `date_birth` date NOT NULL,
  `birth_weight` float NOT NULL,
  `place_delivery` text NOT NULL,
  `birth_registered` date DEFAULT NULL,
  `address` text NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `date_appoint` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appoint_parents`
--

CREATE TABLE `appoint_parents` (
  `id` int(11) NOT NULL,
  `appoint_id` int(11) DEFAULT NULL,
  `m_fname` text DEFAULT NULL,
  `m_mname` text DEFAULT NULL,
  `m_lname` text DEFAULT NULL,
  `m_education` text DEFAULT NULL,
  `m_occupation` text DEFAULT NULL,
  `f_fname` text DEFAULT NULL,
  `f_mname` text DEFAULT NULL,
  `f_lname` text DEFAULT NULL,
  `f_education` text DEFAULT NULL,
  `f_occupation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immunization`
--

CREATE TABLE `immunization` (
  `id` int(11) NOT NULL,
  `appoint_id` int(11) DEFAULT NULL,
  `newborn_screening` varchar(100) DEFAULT NULL,
  `BCG` varchar(100) DEFAULT NULL,
  `DRT` varchar(100) DEFAULT NULL,
  `CRV` varchar(100) DEFAULT NULL,
  `HEPATITIS_B` varchar(100) DEFAULT NULL,
  `MEASLES` varchar(100) DEFAULT NULL,
  `VITAMIN_A` varchar(100) DEFAULT NULL,
  `VITAMIN_K` varchar(100) DEFAULT NULL,
  `DEWORMING` varchar(100) DEFAULT NULL,
  `DENTAL_CHECK_UP` varchar(100) DEFAULT NULL,
  `stat_1` int(11) NOT NULL DEFAULT 1,
  `stat_2` int(11) NOT NULL DEFAULT 1,
  `stat_3` int(11) NOT NULL DEFAULT 1,
  `stat_4` int(11) NOT NULL DEFAULT 1,
  `stat_5` int(11) NOT NULL DEFAULT 1,
  `stat_6` int(11) NOT NULL DEFAULT 1,
  `stat_7` int(11) NOT NULL DEFAULT 1,
  `stat_8` int(11) NOT NULL DEFAULT 1,
  `stat_9` int(11) NOT NULL DEFAULT 1,
  `stat_10` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoint_parents`
--
ALTER TABLE `appoint_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunization`
--
ALTER TABLE `immunization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appoint_parents`
--
ALTER TABLE `appoint_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immunization`
--
ALTER TABLE `immunization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
