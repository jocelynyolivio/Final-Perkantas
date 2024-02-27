-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 11:37 PM
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
('admin3@gmail.com', '$2y$10$vaVTnDLS/6SwY4b5NLrfZ.TfWVJDpk.0Hs.T4sByqcbG/rV1k/Z96', 'Admin 3', 'ACTIVE', 3),
('admin4@gmail.com', '$2y$10$lbYNIbBBI7zEI6zGpUeBjOO9WX7clvrqfp7vKsLlpcPG0E4/H6XC.', 'Admin 4', 'ACTIVE', 4),
('admin5@gmail.com', '$2y$10$l1XLUxmSvcR0Vor9qzqwR.IOIoIiQBuJqc8sgOv22V9QzmkWrp5Ty', 'Admin 5', 'NOT ACTIVE', 5),
('admin@gmail.com', '$2y$10$vSqMVOQbT6hR.g9pnBu2OOeiYTYn28tFmLb1NYTU2dNQLCM8ByOta', 'Admin Utama', 'ACTIVE', 1),
('adminbaru@gmail.com', '$2y$10$WXIK.uzU9Juw3TVYdu.WIe4znSlY93MuWUA7nNtm4VRADikqVnuOC', 'admin baru', 'NOT ACTIVE', 10),
('jocelynyolivio.jy@gmail.com', '$2y$10$scJyGWw/di.OwU8Qk0H7MOWHZi5a.X3dojo5IcEX/2FNeUwNcrIj2', 'jocelyn', 'NOT ACTIVE', 11);

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
('2023-10-23 20:43:08', 'Admin Utama', 'admin5@gmail.com didaftarkan sebagai admin.'),
('2023-10-24 16:05:49', 'Admin Utama', 'konselor4@gmail.com didaftarkan sebagai konselor.'),
('2023-10-24 16:12:24', 'Admin 2', 'konselor5@gmail.com didaftarkan sebagai konselor.'),
('2023-10-24 16:24:07', 'Admin Utama', 'admin6@gmail.com didaftarkan sebagai admin.'),
('2023-10-25 15:40:37', 'Admin Utama', 'konselor1@gmail.com set status tidak aktif.'),
('2023-10-25 15:40:47', 'Admin Utama', 'admin2@gmail.com set status aktif.'),
('2023-10-28 02:56:05', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-10-28 03:08:01', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-10-28 03:08:30', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-10-28 03:09:38', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-10-28 03:09:58', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-10-28 03:11:20', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-10-28 03:11:26', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-10-28 03:16:10', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-10-28 03:18:30', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-10-28 03:20:24', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-10-28 03:23:18', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-10-28 03:23:47', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-07 04:02:18', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-07 04:02:21', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-07 04:05:51', 'Admin Utama', 'admin4@gmail.com aktif.'),
('2023-11-07 04:13:09', 'Admin Utama', 'admin7@gmail.com didaftarkan sebagai admin.'),
('2023-11-09 03:21:32', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-09 03:21:38', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-09 03:32:57', 'Admin Utama', ' didaftarkan sebagai konselor.'),
('2023-11-09 03:33:09', 'Admin Utama', ' didaftarkan sebagai admin.'),
('2023-11-09 03:50:32', 'Admin Utama', 'admin8@gmail.com didaftarkan sebagai admin.'),
('2023-11-10 01:24:41', 'Admin Utama', 'admin6@gmail.com aktif.'),
('2023-11-10 01:24:46', 'Admin Utama', 'admin6@gmail.com tidak aktif.'),
('2023-11-12 16:32:34', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-12 16:32:37', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-12 16:34:11', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-12 16:34:13', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-12 16:34:16', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-12 16:34:21', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-12 16:36:10', 'Admin Utama', 'admin8@gmail.com dihapus.'),
('2023-11-12 16:37:34', 'Admin Utama', 'admin5@gmail.com aktif.'),
('2023-11-12 16:37:38', 'Admin Utama', 'admin5@gmail.com tidak aktif.'),
('2023-11-12 16:39:37', 'Admin Utama', 'admin7@gmail.com dihapus.'),
('2023-11-12 16:41:11', 'Admin Utama', 'admin6@gmail.com dihapus.'),
('2023-11-12 16:54:37', 'Admin Utama', 'konselor5@gmail.com dihapus.'),
('2023-11-16 06:36:08', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-16 06:36:11', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-19 15:27:29', 'Admin Utama', 'admin2@gmail.com tidak aktif.'),
('2023-11-19 15:27:31', 'Admin Utama', 'admin2@gmail.com aktif.'),
('2023-11-19 15:27:44', 'Admin Utama', 'konselor4@gmail.com dihapus.'),
('2023-11-19 15:30:48', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 15:31:05', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-19 15:31:11', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-11-19 15:31:15', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 15:36:18', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-19 15:47:30', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 15:52:39', 'Admin Utama', 'konselor1@gmail.com tidak aktif.'),
('2023-11-19 15:52:48', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 15:52:52', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-19 15:55:31', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 15:56:20', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-19 16:00:46', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-11-19 16:02:15', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-11-19 16:02:21', 'Admin Utama', 'konselor1@gmail.com aktif.'),
('2023-12-07 05:16:07', 'Admin Utama', 'konselor3@gmail.com tidak aktif.'),
('2023-12-07 05:16:11', 'Admin Utama', 'konselor3@gmail.com aktif.'),
('2023-12-07 05:16:13', 'Admin Utama', 'konselor3@gmail.com pending.'),
('2023-12-07 05:16:16', 'Admin Utama', 'konselor2@gmail.com tidak aktif.'),
('2023-12-07 05:17:24', 'Admin Utama', 'konselor2@gmail.com aktif.'),
('2023-12-07 05:19:14', 'Admin Utama', 'konselor2@gmail.com tidak aktif.'),
('2023-12-07 05:19:26', 'Admin Utama', 'konselor2@gmail.com pending.'),
('2023-12-07 05:19:35', 'Admin Utama', 'konselor2@gmail.com tidak aktif.'),
('2023-12-07 05:19:45', 'Admin Utama', 'konselor2@gmail.com pending.'),
('2023-12-07 05:20:01', 'Admin Utama', 'konselor2@gmail.com tidak aktif.'),
('2023-12-07 05:20:12', 'Admin Utama', 'konselor2@gmail.com pending.'),
('2023-12-11 17:39:49', 'Admin Utama', 'konselor2@gmail.com tidak aktif.'),
('2023-12-11 17:40:04', 'Admin Utama', 'konselor2@gmail.com pending.'),
('2023-12-11 20:47:34', 'Admin Utama', 'konselor1@gmail.com pending.'),
('2023-12-18 20:32:17', 'Admin Utama', 'konselor6@gmail.com didaftarkan sebagai konselor.'),
('2023-12-18 20:33:17', 'Admin Utama', 'adminbaru@gmail.com didaftarkan sebagai admin.'),
('2023-12-18 21:46:18', 'Admin Utama', 'c14210229@john.petra.ac.id didaftarkan sebagai konselor.'),
('2023-12-18 21:53:35', 'Admin Utama', 'jocelynyolivio.jy@gmail.com didaftarkan sebagai admin.'),
('2023-12-18 22:18:46', 'Admin Utama', 'c14210229@john.petra.ac.id aktif.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_konseling`
--

CREATE TABLE `jadwal_konseling` (
  `jadwal_konseling_id` int(11) NOT NULL,
  `konselor_email` varchar(255) NOT NULL,
  `tanggal_konseling` date NOT NULL,
  `mulai_konseling` time NOT NULL,
  `akhir_konseling` time NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT 0,
  `user_email` varchar(255) DEFAULT NULL,
  `catetan_konseling` text DEFAULT NULL,
  `tipe_service` int(10) NOT NULL,
  `keluhan` text DEFAULT NULL,
  `metode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_konseling`
--

INSERT INTO `jadwal_konseling` (`jadwal_konseling_id`, `konselor_email`, `tanggal_konseling`, `mulai_konseling`, `akhir_konseling`, `is_show`, `user_email`, `catetan_konseling`, `tipe_service`, `keluhan`, `metode`) VALUES
(15, 'konselor1@gmail.com', '2023-11-24', '08:00:00', '09:00:00', 2, 'user2@gmail.com', 'a', 1, '\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Minima, molestiae accusamus quisquam eveniet saepe consectetur minus ex mollitia quas neque eos, iusto totam, asperiores fugiat ad quod dolores fuga dolor.', 'Offline'),
(16, 'konselor1@gmail.com', '2023-12-22', '12:00:00', '13:00:00', 2, 'audrey@gmail.com', 'bca', 1, NULL, 'Offline'),
(17, 'konselor1@gmail.com', '2023-12-22', '10:00:00', '11:00:00', 2, 'jodem@gmail.com', NULL, 2, NULL, 'Online'),
(18, 'konselor1@gmail.com', '2023-12-22', '14:00:00', '15:00:00', 0, NULL, NULL, 1, NULL, NULL),
(19, 'konselor1@gmail.com', '2023-12-23', '14:00:00', '15:00:00', 0, NULL, NULL, 2, NULL, NULL),
(20, 'konselor1@gmail.com', '2023-12-25', '08:00:00', '09:00:00', 0, NULL, NULL, 1, NULL, NULL),
(21, 'c14210229@john.petra.ac.id', '2023-12-21', '08:00:00', '09:00:00', 1, 'dewasa@gmail.com', NULL, 1, 'Ngantuk', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `konselor_info`
--

CREATE TABLE `konselor_info` (
  `konselor_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_konselor` varchar(255) NOT NULL,
  `konselor_ttl` varchar(100) DEFAULT NULL,
  `konselor_profil` varchar(255) DEFAULT NULL,
  `konselor_surat` varchar(255) DEFAULT NULL,
  `konselor_status` varchar(100) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konselor_info`
--

INSERT INTO `konselor_info` (`konselor_email`, `password`, `nama_konselor`, `konselor_ttl`, `konselor_profil`, `konselor_surat`, `konselor_status`) VALUES
('c14210229@john.petra.ac.id', '$2y$10$UdLh6NAIU4OmloqkUuse6ekyxn.XZRVtNZwykl9BC/VugqzkZbuT6', 'yoli', NULL, NULL, NULL, 'ACTIVE'),
('konselor1@gmail.com', '$2y$10$t0UgZ5ukGrTjjACDV5Whuu0Y.J35AfwDTnnlBai/OtyhMXSLFklDe', 'Konselor1', 'Surabaya, 2023-12-13', NULL, '../image-data/surat/konselor1_surat_CV_JonathanDemario.pdf', 'ACTIVE'),
('konselor2@gmail.com', '$2y$10$M8lpPpowRTQ5geksNogBie0Aqc3o7buJpr.Nqu2YwapmibSdd1C02', 'Konselor2', NULL, NULL, NULL, 'PENDING'),
('konselor3@gmail.com', '$2y$10$M8lpPpowRTQ5geksNogBie0Aqc3o7buJpr.Nqu2YwapmibSdd1C02', 'Konselor3', 'Surabaya, 2023-12-13', '../image-data/profil/konselor3_profil_jsn.png', '../image-data/surat/konselor3_surat_Transkrip_Jonathan Demario.pdf', 'ACTIVE'),
('konselor6@gmail.com', '$2y$10$CELaod9X/iXwK6j1dt.Xn.9U.pDpu6w9d0mUB9oRpSwr5dcCZvHsW', 'Konselor6', NULL, NULL, NULL, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `konselor_log`
--

CREATE TABLE `konselor_log` (
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `konselor_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konselor_log`
--

INSERT INTO `konselor_log` (`time`, `konselor_name`, `activity`) VALUES
('2023-11-23 01:57:48', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 08:00:00-09:00:00.'),
('2023-11-23 01:57:53', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 10:00:00-11:00:00.'),
('2023-11-23 01:57:53', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 14:00:00-15:00:00.'),
('2023-11-23 01:57:54', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 12:00:00-13:00:00.'),
('2023-11-23 01:58:31', 'Konselor1', 'Jadwal 2023-11-24 08:00:00-09:00:00 dihapus.'),
('2023-11-23 01:58:35', 'Konselor1', 'Jadwal 2023-11-24 12:00:00-13:00:00 dihapus.'),
('2023-11-23 01:58:38', 'Konselor1', 'Jadwal 2023-11-24 10:00:00-11:00:00 dihapus.'),
('2023-11-23 01:58:42', 'Konselor1', 'Jadwal 2023-11-24 14:00:00-15:00:00 dihapus.'),
('2023-11-23 01:58:51', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 10:00:00-11:00:00.'),
('2023-11-23 01:58:58', 'Konselor1', 'Jadwal 2023-11-24 10:00:00-11:00:00 dihapus.'),
('2023-11-23 01:59:06', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 08:00:00-09:00:00.'),
('2023-11-23 01:59:06', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 10:00:00-11:00:00.'),
('2023-11-23 01:59:06', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 12:00:00-13:00:00.'),
('2023-11-23 01:59:06', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 14:00:00-15:00:00.'),
('2023-11-23 01:59:21', 'Konselor1', 'Jadwal 2023-11-24 08:00:00-09:00:00 dihapus.'),
('2023-11-23 01:59:35', 'Konselor1', 'Jadwal 2023-11-24 14:00:00-15:00:00 dihapus.'),
('2023-11-23 01:59:38', 'Konselor1', 'Jadwal 2023-11-24 10:00:00-11:00:00 dihapus.'),
('2023-11-23 01:59:44', 'Konselor1', 'Jadwal 2023-11-24 12:00:00-13:00:00 dihapus.'),
('2023-11-23 01:59:51', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 08:00:00-09:00:00.'),
('2023-11-23 01:59:51', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 10:00:00-11:00:00.'),
('2023-11-23 01:59:51', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 14:00:00-15:00:00.'),
('2023-11-23 01:59:51', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 12:00:00-13:00:00.'),
('2023-11-23 01:59:55', 'Konselor1', 'Jadwal 2023-11-24 08:00:00-09:00:00 dihapus.'),
('2023-11-23 02:00:01', 'Konselor1', 'Jadwal 2023-11-24 10:00:00-11:00:00 dihapus.'),
('2023-11-23 02:00:06', 'Konselor1', 'Jadwal 2023-11-21 08:00:00-09:00:00 dihapus.'),
('2023-11-23 02:00:09', 'Konselor1', 'Jadwal 2023-11-24 14:00:00-15:00:00 dihapus.'),
('2023-11-23 02:00:10', 'Konselor1', 'Jadwal 2023-11-24 12:00:00-13:00:00 dihapus.'),
('2023-11-23 02:02:15', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-11-24 pk. 08:00:00-09:00:00.'),
('2023-12-18 19:30:42', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-12-22 pk. 12:00:00-13:00:00.'),
('2023-12-18 19:30:42', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-12-22 pk. 10:00:00-11:00:00.'),
('2023-12-18 19:30:42', 'Konselor1', 'Menambahkan sesi pada Friday, 2023-12-22 pk. 14:00:00-15:00:00.'),
('2023-12-18 20:02:29', 'Konselor1', 'Menambahkan sesi pada Saturday, 2023-12-23 pk. 14:00:00-15:00:00.'),
('2023-12-18 22:17:01', 'Konselor1', 'Menambahkan sesi pada Monday, 2023-12-25 pk. 08:00:00-09:00:00.'),
('2023-12-18 22:19:15', 'yoli', 'Menambahkan sesi pada Thursday, 2023-12-21 pk. 08:00:00-09:00:00.');

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

--
-- Dumping data for table `reset_verification`
--

INSERT INTO `reset_verification` (`reset_verification_id`, `user_email`, `reset_code`, `reset_status`) VALUES
(1, 'jdemario31@gmail.com', '0', 0),
(2, 'konselor6@gmail.com', '0', 0),
(3, 'adminbaru@gmail.com', '0', 0),
(4, 'c14210229@john.petra.ac.id', '0', 0),
(5, 'jocelynyolivio.jy@gmail.com', '0', 0);

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
  `nama_sekolah` varchar(255) NOT NULL,
  `jenis_anggota_keluarga` varchar(255) NOT NULL,
  `nama_anggota_keluarga` varchar(255) NOT NULL,
  `tanggal_lahir_anggota_keluarga` varchar(255) NOT NULL,
  `agama_anggota_keluarga` varchar(255) NOT NULL,
  `pekerjaan_anggota_keluarga` varchar(255) NOT NULL,
  `pendidikan_anggota_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_anak_info`
--

INSERT INTO `user_anak_info` (`user_email`, `password`, `nama`, `kelamin`, `alamat`, `telepon`, `tempat_tanggal_lahir`, `anak_ke`, `warganegara`, `suku_agama`, `kelas`, `nama_sekolah`, `jenis_anggota_keluarga`, `nama_anggota_keluarga`, `tanggal_lahir_anggota_keluarga`, `agama_anggota_keluarga`, `pekerjaan_anggota_keluarga`, `pendidikan_anggota_keluarga`) VALUES
('yoli@gmail.com', '$2y$10$Urr1ADK/Z0grl.E3hKdCmuXUBk34tnBst8MI7oJrPsar1TMLV32bC', 'yoli', 0, 'siwalan', '+62', '2305-12-12', '2 dari 8 saudara', 'indonesia', 'kristen', '10', 'sma petra 2', '', 'babi', '18', 'kristen', 'kerja', 'kuliah');

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

--
-- Dumping data for table `user_dewasa_info`
--

INSERT INTO `user_dewasa_info` (`user_email`, `password`, `nama`, `kelamin`, `pekerjaan`, `alamat`, `telepon`, `pendidikan`, `tempat_tanggal_lahir`, `anak_ke`, `warganegara`, `suku_agama`, `status`) VALUES
('audrey@gmail.com', '$2y$10$/CIzIZDz36bDPByaEmpZH.TkBgD5BJbRhLsBfWy4w7CucV9NpC5cy', 'audrey', 1, 'mahasiswa', 'taman tiara', '+6283', 'kuliah', '2030-12-18', '1 dari 2 saudara', 'indonesia', 'kristen', 'belum_menikah (Usia menikah  tahun)'),
('dewasa@gmail.com', '$2y$10$3P3T9412Tp8Nn70S0hjuau53DgmMbq5bA.CsCHugDsqkqIs/FYoOa', 'dewasa', 1, 'mahasiswa', 'taman tiara', '+628261191629', 'SD', '11/12/2006', '1 dari 3 saudara', 'indonesia', 'Katolik', 'belum_menikah (Usia menikah  tahun)'),
('jdemario31@gmail.com', '$2y$10$Ri.VVwGlIK1bo8xE2kuyyeez62pvI026y1zRVjMfGSDvxkPs06HjC', 'J', 0, 'Mahasiswa', 'Hayo', '+62812345678', 'S1', '15/12/2006', '1 dari 1 saudara', 'Indonesia', 'Kristen', 'belum_menikah (Usia menikah  tahun)'),
('jodem@gmail.com', '$2y$10$lj85bMDzTdK.i7hF0eYHpufFN4eIojom7zMIhFXoL8eIDpIBAcyIq', 'jodem', 0, 'mahasiswa', 'siwalankerto', '+628123456789', 'kuliah', '2030-10-10', '1 dari 3 saudara', 'indonesia', 'kristen', 'sudah_menikah (Usia menikah 5 tahun)'),
('lilian@petra.ac.id', '$2y$10$VDYzBOoG9UdjzY8KI3IUdeokG01UVurHZzruWc.4Z/1sqL0PtZnl6', 'liliana', 1, 'dosen', 'siwalankerto', '+6283', 'kuliah', '2002-01-01', '1 dari 3 saudara', 'indonesia', 'kristen', 'sudah_menikah (Usia menikah 5 tahun)'),
('user1@gmail.com', '$2y$10$.awsZGyvCFlRdOUeSG51oe.LinO51iI2nRWJ9G3UEWA9KZ3FSBbKK', 'odre', 0, 'x', 'x', '123', 'kuliah', '18 des', '1', 'indo', 'suku', 'single');

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
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`time`, `user_name`, `activity`) VALUES
('2023-12-18 14:28:25', 'J', 'jdemario31@gmail.com terdaftar sebagai member.');

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
  ADD KEY `jadwal_konseling_pair` (`konselor_email`),
  ADD KEY `jadwal_konseling_pick_dewasa` (`user_email`);

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_konseling`
--
ALTER TABLE `jadwal_konseling`
  MODIFY `jadwal_konseling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reset_verification`
--
ALTER TABLE `reset_verification`
  MODIFY `reset_verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_konseling`
--
ALTER TABLE `jadwal_konseling`
  ADD CONSTRAINT `jadwal_konseling_pair` FOREIGN KEY (`konselor_email`) REFERENCES `konselor_info` (`konselor_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
