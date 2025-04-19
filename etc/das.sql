-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `das`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@das.com', '...admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `bg` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fname`, `email`, `password`, `phone`, `image_name`, `image_path`, `sid`, `created_at`) VALUES
(50, 'DR. Yadab Dhakal', 'yadab11@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '9805879212', '', 'uploads/', 21, '2024-06-18 04:03:10'),
(51, 'DR. Shelly Shrestha', 'shelly11@gmail.com', '11b03e5b5b37441417e8065ec3bb6cc44ad798b3', '9805879212', 'doctor4.jpg', 'uploads/doctor4.jpg', 18, '2024-06-18 04:05:08'),
(52, 'DR. Suresh Lamichhane', 'suresh11@gmail.com', '7054f8848d94a0d18b989fcb60d8dcd9cc934cdd', '9805879212', 'doctor5.jpg', 'uploads/doctor5.jpg', 20, '2024-06-18 04:06:16'),
(53, 'DR. Dina Shrestha', 'dina11@gmail.com', '9b998cc104cbc9fdb0d304f1a66498b4b4b90b54', '9805879212', 'doctor9.jpg', 'uploads/doctor9.jpg', 17, '2024-06-18 04:07:49'),
(54, 'PROF. DR. Narayan Thapa', 'narayan11@gmail.com', '7df17c3199154dadc1289633ecf1bc3bd1fef970', '9805879212', 'doctor10.jpg', 'uploads/doctor10.jpg', 16, '2024-06-18 04:08:54'),
(57, 'Dr. Niranjan Acharya', 'niranjan11@gmail.com', 'c69f023f20a48ed3efd9eb1997ec5213980bfc13', '9814142536', 'niranjan.png', 'uploads/niranjan.png', 23, '2024-06-19 04:12:09'),
(64, 'Dr. Manu Basnet', 'manu11@gmial.com', '19c44c62d4489e099eaf5adc0420377d521cb26e', '9836251478', 'manu.png', 'uploads/manu.png', 26, '2024-06-19 06:26:57'),
(65, 'Dr. Neyaz Kausar', 'neyaz11@gmail.com', 'e8be5538dae2ac2c5dab13bc7b5dc45f4bbdb38e', '9805879212', 'doctor11.jpg', 'uploads/doctor11.jpg', 31, '2024-06-25 14:38:24'),
(68, 'Dr. Banira Karki', 'banira11@gmail.com', 'e1bb38e9370720f80e32538a12c1397a95cd68b7', '9825142536', '', 'uploads/', 34, '2024-06-27 06:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `sid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `tel`, `password`) VALUES
(9, 'Binit Gurung', 'binit111@gmail.com', '9840176421', 'eff4098c52ab9e185ebbf351e5434e69d93cb04b'),
(14, 'Sushil Bohora', 'bohorasushil28@gmail.com', '9825151685', '66e8bda09044047ad04b9ea45bf36ad36fda786f');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `time` time NOT NULL,
  `did` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `sid`, `time`, `did`, `date`) VALUES
(41, 18, '12:08:00', 51, '2024-06-23'),
(42, 17, '13:02:00', 53, '2024-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(60) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `title`, `description`, `image_name`, `image_path`, `created_at`) VALUES
(15, 'Dermatologist', 'Treatment for any skin diseases.\r\n', 'dermatology.png', 'uploads/dermatology.png', '2024-05-21 13:29:52'),
(16, 'Urology', 'Treatment for any diseases affecting the urinary system.', 'Urology.png', 'uploads/Urology.png', '2024-06-18 03:20:47'),
(17, 'Endocrinology', 'Diagnose, treat and manage several different conditions that affect your endocrine system.', 'endocrinology.png', 'uploads/endocrinology.png', '2024-06-18 03:21:23'),
(18, 'Physiotherapist', 'Manage pain, balance, mobility, and motor function.', 'physiotherapist.png', 'uploads/physiotherapist.png', '2024-06-18 03:22:03'),
(19, 'Nutritionist/Dietitian', 'Provide medical nutrition therapy and counseling.', 'nutritionist.png', 'uploads/nutritionist.png', '2024-06-18 03:22:38'),
(20, 'Anaesthesiologist', 'Provides anaesthesia to patients for operations and procedures', 'anesthesia.png', 'uploads/anesthesia.png', '2024-06-18 03:23:08'),
(21, 'Pediatrician', 'Medical care for children who are acutely or chronically ill.', 'pediatrician.png', 'uploads/pediatrician.png', '2024-06-18 03:23:33'),
(23, 'Neurology', 'Managing diverse nervous system conditions.', 'neurology.png', 'uploads/neurology.png', '2024-06-18 03:58:42'),
(24, 'Cardiology', 'Conducting tests to assess heart structure and function.', 'cardiology.png', 'uploads/cardiology.png', '2024-06-18 03:59:02'),
(26, 'Gastroenterology', 'Diseases of the esophagus, stomach, small intestine, colon and rectum, pancreas, gallbladder, bile ducts and liver.', 'gastroenterology.jpg', 'uploads/gastroenterology.jpg', '2024-06-19 05:30:02'),
(31, 'Opthalmologist', 'Make you vision good.', 'eye.png', 'uploads/eye.png', '2024-06-19 06:27:35'),
(32, 'ORTHOPEDIC & TRAUMATOLOGY', 'Failure of a fractured bone to heal normally', 'orthopedic.png', 'uploads/orthopedic.png', '2024-06-19 07:06:18'),
(34, 'Breast Oncosurgeon', 'About breast cancer.', 'cancer.jpg', 'uploads/cancer.jpg', '2024-06-27 06:33:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `did` (`did`),
  ADD KEY `appointment_ibfk_1` (`sid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_sid` (`sid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `did` (`did`),
  ADD KEY `pindex` (`aid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `specialities` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `specialities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`aid`) REFERENCES `appointment` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `specialities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
