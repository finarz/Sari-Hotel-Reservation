-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 08:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarihotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `username`, `password`, `fullname`, `email`, `created_at`) VALUES
(1, 'finarz', '$2y$10$XKDnNHvL5HO/1Cfp..0/8ethAw38AbiaTZ1S.59iy.oQCruIJu7PC', 'NUR SORFINA BINTI RAZALI', 'finasorfina02@gmail.com', '2025-02-04 04:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `roomType` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `cusAddress` varchar(255) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `customerName`, `phoneNo`, `email`, `gender`, `roomType`, `destination`, `cusAddress`, `checkIn`, `checkOut`, `confirmed`, `created_at`) VALUES
(1, 'NUR ATIQAH HALIM', '0132746583', 'tiqah03@gmail.com', 'female', 'Executive Suite', 'Sabah', 'No1 , Jalan Kuning', '2025-02-05', '2025-02-06', 1, '2025-02-04 14:24:41'),
(2, 'ANIS SURAYA', '0127647838', 'anis99@gmail.com', 'female', 'Superior Twin', 'Langkawi', 'Lot 34, Jalan Hijau', '2025-02-07', '2025-02-10', 1, '2025-02-04 14:25:42'),
(3, 'WAFIQ BIN SHAHRIMAN', '0351911125', 'waffiqshah90@gmail.com', 'male', 'Superior King', 'Pahang', 'No 23, Kebun Baru', '2025-02-13', '2025-02-14', 0, '2025-02-04 14:26:29'),
(4, 'ASYRAF BIN SALIP', '0198374637', 'acapsalip73@gmail.com', 'male', 'Executive Suite', 'Pulau Pinang', 'No 10, Batu Feringgi', '2025-02-21', '2025-02-22', 1, '2025-02-04 14:27:35'),
(5, 'AIN BINTI FADZIR', '0126383648', 'ainfad02@gmail.com', 'female', 'Deluxe King', 'Terengganu', 'No 21, Chendering', '2025-02-06', '2025-02-28', 1, '2025-02-04 14:28:22'),
(6, 'AFI ASJAD', '0351911125', 'afi66@gmail.com', 'male', 'Deluxe Twin', 'Kuala Lumpur', 'No 9, Jalan Batu Kawan', '2025-02-14', '2025-02-15', 1, '2025-02-04 14:29:08'),
(7, 'NUR DINI HUSNINA', '0166384637', 'dini.husnina98@gmail.com', 'female', 'Executive Suite', 'Sabah', 'No 40, Jalan Kinabalu', '2025-02-13', '2025-02-14', 1, '2025-02-04 14:30:06'),
(8, 'CIK ZAWIAH CHE OMAR', '0132658556', 'zawiahcheomar73@gmail.com', 'female', 'Superior King', 'Pahang', 'No 1, Lipis', '2025-02-20', '2025-02-24', 0, '2025-02-04 14:31:43'),
(9, 'HALIM BIN ABU BAKAR', '0187463327', 'halim28@gmail.com', 'male', 'Superior King', 'Pahang', 'No 21, Jalan Biru', '2025-02-27', '2025-02-28', 1, '2025-02-04 14:33:16'),
(10, 'NUR FATIHAH HANIM ', '0146856383', 'fatihahanim01@gmail.com', 'female', 'Deluxe Twin', 'Pulau Pinang', 'Lot 54, Kg Baru Kedah', '2025-02-13', '2025-02-20', 1, '2025-02-04 14:34:49'),
(11, 'RIZUAN BIN ABD ALI', '0168374638', 'rizuanali80@yahoo.com', 'Male', 'President Suite', 'Sabah', 'No 19, Klebang', '2025-03-06', '2025-02-08', 1, '2025-02-04 14:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noTel` int(50) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `massage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`fullName`, `email`, `noTel`, `destination`, `purpose`, `massage`) VALUES
('NUR INSYIRAH ZALIKHA', 'insyirah05@gmail.com', 351911125, 'Terengganu', 'Booking', 'Cancel Booking.'),
('Nur Mazarina', 'nmazarinar@gmail.com', 351911125, 'Terengganu', 'Booking', 'Service Good!'),
('NUR SORFINA', 'finasorfina02@gmail.com', 351911125, 'Pahang', 'Booking', 'Service Wifi Bad!'),
('NURUL FATIHAH HANIM', 'nmazarinar@gmail.com', 1114453604, 'KUALA LUMPUR', 'Booking', 'customer services from this hotel really bad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `custId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`custId`, `username`, `password`, `fullname`, `email`, `created_at`) VALUES
(1, 'finarz', '$2y$10$ARAhqKKpRznoSlZJN4YACukCjFq982j5rgOorE9epbIDGJxcVOP5C', 'NUR SORFINA BINTI RAZALI', 'finasorfina02@gmail.com', '2025-02-04 04:39:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD UNIQUE KEY `customerName` (`customerName`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD UNIQUE KEY `fullName` (`fullName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`custId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
