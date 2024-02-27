-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 05:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perkantas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `admin_status` varchar(100) NOT NULL DEFAULT 'NOT ACTIVE',
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_email`, `password`, `nama_admin`, `admin_status`, `counter`) VALUES
('admin2@gmail.com', '$2y$10$LnfL9/EhaYjgF2V0a.wbV.l9RqkxZgUdoA6F.CDVY6MLSXgtuv.7S', 'Admin 2', 'ACTIVE', 2),
('admin3@gmail.com', '$2y$10$vaVTnDLS/6SwY4b5NLrfZ.TfWVJDpk.0Hs.T4sByqcbG/rV1k/Z96', 'Admin 3', 'NOT ACTIVE', 3),
('admin4@gmail.com', '$2y$10$lbYNIbBBI7zEI6zGpUeBjOO9WX7clvrqfp7vKsLlpcPG0E4/H6XC.', 'Admin 4', 'NOT ACTIVE', 4),
('admin5@gmail.com', '$2y$10$l1XLUxmSvcR0Vor9qzqwR.IOIoIiQBuJqc8sgOv22V9QzmkWrp5Ty', 'Admin 5', 'NOT ACTIVE', 5),
('admin@gmail.com', '$2y$10$vSqMVOQbT6hR.g9pnBu2OOeiYTYn28tFmLb1NYTU2dNQLCM8ByOta', 'Admin Utama', 'ACTIVE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`time`, `admin_name`, `activity`) VALUES
('2023-09-19 19:04:54', 'admin1', 'cek1'),
('2023-09-20 04:22:49', 'admin2', 'cek2'),
('2023-09-20 04:24:36', 'admin3', 'cek3'),
('2023-09-20 07:41:18', 'Admin 1', 'admin2@gmail.com terdaftar sebagai admin.'),
('2023-09-20 07:42:53', 'Admin 1', 'admin3@gmail.com terdaftar sebagai admin.'),
('2023-09-20 07:46:14', 'Admin 1', 'admin2@gmail.com terdaftar sebagai admin.'),
('2023-09-20 07:48:36', 'Admin 1', 'Gas Coba'),
('2023-09-21 02:20:56', 'Admin 1', 'admin3@gmail.com terdaftar sebagai admin.'),
('2023-09-21 02:27:23', 'Admin 1', 'admin4@gmail.com terdaftar sebagai admin.'),
('2023-10-22 08:57:39', 'Admin 1', 'konselor1@gmail.com didaftarkan sebagai konselor.'),
('2023-10-22 08:58:53', 'Admin 1', 'konselor2@gmail.com didaftarkan sebagai konselor.'),
('2023-10-23 20:43:08', 'Admin Utama', 'admin5@gmail.com didaftarkan sebagai admin.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_konseling`
--

CREATE TABLE `jadwal_konseling` (
  `jadwal_konseling_id` int(11) NOT NULL,
  `konselor_email` varchar(255) NOT NULL,
  `waktu_konseling` datetime NOT NULL,
  `is_picked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konselor_info`
--

CREATE TABLE `konselor_info` (
  `konselor_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_konselor` varchar(255) NOT NULL,
  `konselor_status` varchar(100) NOT NULL DEFAULT 'NOT ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konselor_info`
--

INSERT INTO `konselor_info` (`konselor_email`, `password`, `nama_konselor`, `konselor_status`) VALUES
('konselor1@gmail.com', '$2y$10$t0UgZ5ukGrTjjACDV5Whuu0Y.J35AfwDTnnlBai/OtyhMXSLFklDe', 'Konselor1', 'ACTIVE'),
('konselor2@gmail.com', '$2y$10$M8lpPpowRTQ5geksNogBie0Aqc3o7buJpr.Nqu2YwapmibSdd1C02', 'Konselor2', 'NOT ACTIVE'),
('konselor3@gmail.com', '$2y$10$M8lpPpowRTQ5geksNogBie0Aqc3o7buJpr.Nqu2YwapmibSdd1C02', 'Konselor3', 'NOT ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `konselor_log`
--

CREATE TABLE `konselor_log` (
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `konselor_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset_verification`
--

CREATE TABLE `reset_verification` (
  `reset_verification_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `reset_code` varchar(255) NOT NULL DEFAULT '0',
  `reset_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_anak_info`
--

CREATE TABLE `user_anak_info` (
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelamin` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `tempat_tanggal_lahir` varchar(255) NOT NULL,
  `anak_ke` varchar(255) NOT NULL,
  `warganegara` varchar(255) NOT NULL,
  `suku_agama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_dewasa_info`
--

CREATE TABLE `user_dewasa_info` (
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelamin` int(11) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `tempat_tanggal_lahir` varchar(255) NOT NULL,
  `anak_ke` varchar(255) NOT NULL,
  `warganegara` varchar(255) NOT NULL,
  `suku_agama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_email`),
  ADD KEY `counter` (`counter`);

--
-- Indexes for table `jadwal_konseling`
--
ALTER TABLE `jadwal_konseling`
  ADD PRIMARY KEY (`jadwal_konseling_id`),
  ADD KEY `jadwal_konseling_pair` (`konselor_email`);

--
-- Indexes for table `konselor_info`
--
ALTER TABLE `konselor_info`
  ADD PRIMARY KEY (`konselor_email`);

--
-- Indexes for table `reset_verification`
--
ALTER TABLE `reset_verification`
  ADD PRIMARY KEY (`reset_verification_id`),
  ADD KEY `reset_verify_anak` (`user_email`);

--
-- Indexes for table `user_anak_info`
--
ALTER TABLE `user_anak_info`
  ADD PRIMARY KEY (`user_email`);

--
-- Indexes for table `user_dewasa_info`
--
ALTER TABLE `user_dewasa_info`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_konseling`
--
ALTER TABLE `jadwal_konseling`
  MODIFY `jadwal_konseling_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_verification`
--
ALTER TABLE `reset_verification`
  MODIFY `reset_verification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_konseling`
--
ALTER TABLE `jadwal_konseling`
  ADD CONSTRAINT `jadwal_konseling_pair` FOREIGN KEY (`konselor_email`) REFERENCES `konselor_info` (`konselor_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset_verification`
--
ALTER TABLE `reset_verification`
  ADD CONSTRAINT `reset_verify_anak` FOREIGN KEY (`user_email`) REFERENCES `user_anak_info` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reset_verify_dewasa` FOREIGN KEY (`user_email`) REFERENCES `user_dewasa_info` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
