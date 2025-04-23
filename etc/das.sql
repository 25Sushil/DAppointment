-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 11:15 AM
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
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fname`, `latitude`, `longitude`, `email`, `password`, `phone`, `address`, `image_name`, `image_path`, `sid`, `created_at`) VALUES
(52, 'DR. Suresh Lamichhane', 27.68995, 85.31897, 'suresh11@gmail.com', '7054f8848d94a0d18b989fcb60d8dcd9cc934cdd', '9805879212', 'Norvic Hospital', 'doctor5.jpg', 'uploads/doctor5.jpg', 20, '2024-06-18 04:06:16'),
(64, 'Dr. Manu Basnet', 27.68995, 85.31897, 'manu11@gmial.com', '19c44c62d4489e099eaf5adc0420377d521cb26e', '9836251478', 'Norvic Hospital', 'manu.png', 'uploads/manu.png', 26, '2024-06-19 06:26:57'),
(69, 'Dr. Kamal Lamsal', 274118.6, 851958.44, 'kamal11@gmail.com', '59b8ed7862e8255a370de15e6924afdd3fc584e0', '9895265262', '', 'image.jpg', 'uploads/image.jpg', 24, '2025-04-22 08:24:47'),
(71, 'Dr. Banira Karki', 27.68995, 85.31897, 'banira11@gmail.com', '8cc1502ba48f5ac4cbc33078e7b2b4046c49c4f6', '9825151685', 'Norvic Hospital	', 'banira.jpg', 'uploads/banira.jpg', 34, '2025-04-22 09:27:08'),
(97, 'Dr. Sudip Parajuli', 274118.6, 851958.44, 'sudip11@gmail.com', '64934d24ba72a391868f5c5eda33ee65fe53073f', '9814745214', '', 'sudip.jpg', 'uploads/sudip.jpg', 15, '2025-04-22 11:01:35');

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
(46, 15, '14:27:00', 97, '2025-04-23');

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
  ADD KEY `doctor_ibfk_1` (`sid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `specialities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
