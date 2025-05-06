-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2025 at 09:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_schedule_from` time NOT NULL,
  `doctor_schedule_to` time NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_number` varchar(20) DEFAULT NULL,
  `doctor_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_schedule_from`, `doctor_schedule_to`, `doctor_email`, `doctor_number`, `doctor_photo`, `created_at`) VALUES
(1, 'Dr. Andi Wijaya', '08:00:00', '12:00:00', 'andi.wijaya@example.com', '081234567890', 'andi.jpg', '2025-05-04 05:04:08'),
(2, 'Dr. Siti Rahma', '09:00:00', '13:00:00', 'siti.rahma@example.com', '081298765432', 'siti.jpg', '2025-05-04 05:04:08'),
(3, 'Dr. Budi Hartono', '10:00:00', '14:00:00', 'budi.hartono@example.com', '081212345678', 'budi.jpg', '2025-05-04 05:04:08'),
(4, 'Dr. Lina Marlina', '08:30:00', '12:30:00', 'lina.marlina@example.com', '081333444555', 'lina.jpg', '2025-05-04 05:04:08'),
(5, 'Dr. Rizal Pratama', '09:30:00', '13:30:00', 'rizal.pratama@example.com', '081344455566', 'rizal.jpg', '2025-05-04 05:04:08'),
(6, 'Dr. Rina Ayu', '07:00:00', '11:00:00', 'rina.ayu@example.com', '081355566677', 'rina.jpg', '2025-05-04 05:04:08'),
(7, 'Dr. Wahyu Setiawan', '13:00:00', '17:00:00', 'wahyu.setiawan@example.com', '081366677788', 'wahyu.jpg', '2025-05-04 05:04:08'),
(8, 'Dr. Dini Lestari', '14:00:00', '18:00:00', 'dini.lestari@example.com', '081377788899', 'dini.jpg', '2025-05-04 05:04:08'),
(13, 'cob', '10:57:00', '01:01:00', 'coba@gmail.com', '012831212', NULL, '2025-05-05 01:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('scheduled','on going','completed','canceled') DEFAULT 'scheduled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `patient_name`, `doctor_name`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(3, 'Rizky Pratama', 'Dr. Budi Hartono', '2025-05-07 11:00:00', '2025-05-07 11:30:00', 'completed', '2025-05-04 05:04:25'),
(4, 'Nina Salma', 'Dr. Lina Marlina', '2025-05-08 08:30:00', '2025-05-08 09:00:00', 'on going', '2025-05-04 05:04:25'),
(5, 'Yusuf Maulana', 'Dr. Rizal Pratama', '2025-05-09 09:30:00', '2025-05-09 10:00:00', 'scheduled', '2025-05-04 05:04:25'),
(6, 'Citra Dewi', 'Dr. Rina Ayu', '2025-05-10 13:00:00', '2025-05-10 13:30:00', 'on going', '2025-05-04 05:04:25'),
(7, 'Bima Aditya', 'Dr. Wahyu Setiawan', '2025-05-11 14:00:00', '2025-05-11 14:30:00', 'on going', '2025-05-04 05:04:25'),
(8, 'Putri Anindya', 'Dr. Dini Lestari', '2025-05-12 10:15:00', '2025-05-12 10:45:00', 'completed', '2025-05-04 05:04:25'),
(9, 'Raka Nugraha', 'Dr. Galih Saputra', '2025-05-13 11:45:00', '2025-05-13 12:15:00', 'on going', '2025-05-04 05:04:25'),
(10, 'Laras Ayu', 'Dr. Fajar Hidayat', '2025-05-14 08:00:00', '2025-05-14 08:30:00', 'completed', '2025-05-04 05:04:25'),
(11, 'Zaki Rahman', 'Dr. Andi Wijaya', '2025-05-15 09:15:00', '2025-05-15 09:45:00', 'completed', '2025-05-04 05:04:25'),
(12, 'Indah Sari', 'Dr. Siti Rahma', '2025-05-16 10:30:00', '2025-05-16 11:00:00', 'completed', '2025-05-04 05:04:25'),
(13, 'Dani Saputra', 'Dr. Budi Hartono', '2025-05-17 13:00:00', '2025-05-17 13:30:00', 'on going', '2025-05-04 05:04:25'),
(14, 'Salsa Amelia', 'Dr. Lina Marlina', '2025-05-18 14:30:00', '2025-05-18 15:00:00', 'on going', '2025-05-04 05:04:25'),
(15, 'Arif Hidayat', 'Dr. Rizal Pratama', '2025-05-19 09:00:00', '2025-05-19 09:30:00', 'completed', '2025-05-04 05:04:25'),
(16, 'Maya Oktaviani', 'Dr. Rina Ayu', '2025-05-20 10:00:00', '2025-05-20 10:30:00', 'scheduled', '2025-05-04 05:04:25'),
(17, 'Reza Ramadhan', 'Dr. Wahyu Setiawan', '2025-05-21 11:30:00', '2025-05-21 12:00:00', 'scheduled', '2025-05-04 05:04:25'),
(18, 'Tari Wulandari', 'Dr. Dini Lestari', '2025-05-22 13:30:00', '2025-05-22 14:00:00', 'on going', '2025-05-04 05:04:25'),
(19, 'Galang Perdana', 'Dr. Galih Saputra', '2025-05-23 14:00:00', '2025-05-23 14:30:00', 'completed', '2025-05-04 05:04:25'),
(21, 'jordy', 'dr. chan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'scheduled', '2025-05-04 07:25:34'),
(22, 'jordy waturandang', 'Dr. liem', '2025-05-05 09:26:00', '2025-05-05 00:29:00', 'completed', '2025-05-05 01:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','patient') DEFAULT 'patient',
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `name`, `email`, `phone`) VALUES
(1, 'chan', 'chan123', 'admin', 'Chan', 'chanwaturandang@gmail.com', '08123445568'),
(3, 'chanwaturandang', 'chan123', 'admin', 'Chan', 'chanwaturandang@gmail.com', '08123445568'),
(4, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '08121346387'),
(7, 'jordyw', 'jordy123', 'admin', 'Jordy Waturandang', 'jordy@gmail.com', '08234434453');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctor_email` (`doctor_email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
