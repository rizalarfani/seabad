-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2019 at 11:43 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sialbert`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `nama_pengadu` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('pendding','acc','','') NOT NULL,
  `feedback` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nik`, `nama_pengadu`, `alamat`, `desc`, `kategori`, `foto`, `status`, `feedback`, `date_created`) VALUES
(1, '125678901234', 'Rizal', 'Balamoa', 'Di jalan raya balamoa banyak jalan yang berlubang dan sangat menggamgu perjalan kita', 'jalan', '1570604152326.jpg', 'acc', 'asdasfddaf', '2019-10-10 14:42:54'),
(2, '864345635431', 'Aisatul Muthoharoh', 'Tegal', 'Untuk kirta semua', 'jalan', '1570726382692.JPG', 'acc', 'Terimahkash udah saran nya', '2019-10-11 23:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(2, 'Penyewa', 'asdasd'),
(3, 'pemimpin', 'asdaf'),
(4, 'admin', 'Ini untuk Login Admin'),
(5, 'Users', 'Ini users biasa');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` smallint(6) NOT NULL,
  `nm_kendaraan` varchar(100) NOT NULL,
  `jns_kendaraan` varchar(50) NOT NULL,
  `biaya_sewa` int(11) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nm_kendaraan`, `jns_kendaraan`, `biaya_sewa`, `operator`, `gambar`) VALUES
(13, 'Buldoser', 'BACKHODE_LOADER', 100000, 'anan', '1570070266353.jpg'),
(14, 'Truk', 'DUMP TRUCK', 1000000, 'Rizal', '1570070293597.png'),
(15, 'Buldoser 2', 'BACKHODE LOADER', 1000000, 'ais', '1570070310880.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `id_kendaraan` smallint(6) NOT NULL,
  `tglawalm` date NOT NULL,
  `tglakhirm` date NOT NULL,
  `bengkel` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenisrusak` text NOT NULL,
  `nilai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengadu` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_pengadu` varchar(100) NOT NULL,
  `alamat_jln` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('acc','pending') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengadu`, `nik`, `nama_pengadu`, `alamat_jln`, `desc`, `kategori`, `foto`, `status`, `date_created`) VALUES
(2, '125678901234567', 'Rizal', 'Balamoa', 'Di jalan raya balamoa banyak jalan yang berlubang dan sangat menggamgu perjalan kita', 'jalan', '1570604152326.jpg', 'acc', '2019-10-09 15:50:46'),
(3, '8643456354316875', 'Aisatul Muthoharoh', 'Tegal', 'Untuk kirta semua', 'jalan', '1570726382692.JPG', 'acc', '2019-10-10 16:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `nik` varchar(20) NOT NULL,
  `nm_penyewa` varchar(100) NOT NULL,
  `alamat_ktp` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(250) NOT NULL,
  `nm_jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`nik`, `nm_penyewa`, `alamat_ktp`, `id_user`, `nm_perusahaan`, `alamat_perusahaan`, `nm_jabatan`, `no_hp`) VALUES
('12345673951634567', 'sadas', 'fgtgf', 0, 'asdfg', 'sdfgh', 'sdfdg', '345678'),
('32345673951634562', 'Arfani', 'Adiwerna', 0, 'moza', 'Banjaran', 'Boss', '085642675210'),
('8643456353316835', 'Rizal', 'Banjaran', 0, 'Moza', 'Tegal kota', 'Direktur', '34567890'),
('8643456354316875', 'Ais', 'Tembok Banjara', 0, 'percobaan', 'Tegal', 'Percobaan', '34567890'),
('8643456354376375', 'Chanel Rizal', 'Tembok Banjara', 0, 'Moza', 'Tegal', 'Percobaan', '34567890'),
('8643456354376835', 'Rizal', 'Banjaran', 0, 'Moza', 'Tembok banjaran', 'Percobaan', '085642675210'),
('8643456354376875', 'Chanel Rizal', 'Tembok Banjara', 0, 'percobaan', 'Tegal', 'drfghj', '34567890');

-- --------------------------------------------------------

--
-- Table structure for table `requestsewa`
--

CREATE TABLE `requestsewa` (
  `id` int(11) NOT NULL,
  `id_penyewa` varchar(20) NOT NULL,
  `id_kendaraan` smallint(6) NOT NULL,
  `tgl_awal_sewa` date NOT NULL,
  `tgl_akhir_sewa` date NOT NULL,
  `renc_pemakaian` varchar(250) NOT NULL,
  `jns_pekerjaan` varchar(250) NOT NULL,
  `pendanaan` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestsewa`
--

INSERT INTO `requestsewa` (`id`, `id_penyewa`, `id_kendaraan`, `tgl_awal_sewa`, `tgl_akhir_sewa`, `renc_pemakaian`, `jns_pekerjaan`, `pendanaan`, `status`) VALUES
(14, '8643456354316875', 15, '2019-10-08', '1970-01-01', 'Perbaikan jalan', 'Adiwerna', 'Swasta', 1),
(15, '8643456354316875', 14, '2019-10-08', '1970-01-01', 'Perbaikan jalan', 'Tegal kota', 'APBN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id` int(11) NOT NULL,
  `id_penyewa` varchar(20) NOT NULL,
  `id_kendaraan` smallint(6) NOT NULL,
  `tgl_awal_sewa` date NOT NULL,
  `tgl_akhir_sewa` date NOT NULL,
  `renc_pemakaian` varchar(250) NOT NULL,
  `jns_pekerjaan` varchar(250) NOT NULL,
  `pendanaan` varchar(11) NOT NULL,
  `documentasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id`, `id_penyewa`, `id_kendaraan`, `tgl_awal_sewa`, `tgl_akhir_sewa`, `renc_pemakaian`, `jns_pekerjaan`, `pendanaan`, `documentasi`) VALUES
(11, '8643456354316875', 15, '2019-10-08', '1970-01-01', 'Perbaikan jalan', 'Adiwerna', 'Swasta', '1570586194905.png'),
(12, '8643456354316875', 14, '2019-10-08', '1970-01-01', 'Perbaikan jalan', 'Tegal kota', 'APBN', '1570586475260.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` tinyint(4) NOT NULL,
  `status_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_kendaraan`) VALUES
(1, 'Available'),
(2, 'Pemeliharaan'),
(3, 'Swakelola'),
(4, 'Rusak'),
(5, 'sewa');

-- --------------------------------------------------------

--
-- Table structure for table `status_kendaraan`
--

CREATE TABLE `status_kendaraan` (
  `id_kendaraan` smallint(6) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `tgl_update` date NOT NULL,
  `lama` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_kendaraan`
--

INSERT INTO `status_kendaraan` (`id_kendaraan`, `id_status`, `tgl_update`, `lama`) VALUES
(13, 2, '2019-09-17', 9),
(15, 5, '2019-10-08', 8),
(14, 5, '2019-10-08', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `nik`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(122, '127.0.0.1', 'admin', '$2y$08$NRnQLyKuOOf.0spRd/ylOOI1YnokZqDrlY04hgPlCTZqEcH/Nkh5i', NULL, 'admin@gmail.com', '0', NULL, NULL, NULL, NULL, 1566355656, 1570726410, 1, 'admin', NULL, NULL, NULL),
(129, '127.0.0.1', 'ais', '$2y$08$Mn2YuLWgOcYf3ZV9NbRJzujl5U7H5XQK/f4lAZhbqSYX8xNAe3fYi', NULL, 'ais@gmail.com', '8643456354316875', NULL, NULL, NULL, NULL, 1568256113, 1570721548, 1, 'Aisatul', 'Muthoharoh', 'Aisatul', '095339855271'),
(131, '127.0.0.1', 'demo123', '$2y$08$8L296J38TkSpfKS8TBge7u.wcXmlovSK9srCiTAZWyiyaaIAyg5m.', NULL, 'demo123@gmail.com', '8643456353316835', NULL, NULL, NULL, NULL, 1568442987, 1568443007, 1, 'Rizal', NULL, NULL, NULL),
(132, '127.0.0.1', 'smit123', '$2y$08$yWHvH3zMsxyml4e2/d2T9.xDMOZD9evsmJmFgYcWkXV8lTzOEWTjy', NULL, 'smit123@gmail.com', '0', NULL, NULL, NULL, NULL, 1570234772, 1570234783, 1, 'rizal arfani', NULL, NULL, NULL),
(138, '127.0.0.1', 'rizal', '$2y$08$Jv1jNgGodTYMeZzjKYfmre0zM9vPMRt.CPH8BSTCWX7OY6l8yeake', NULL, 'rizal@gmail.com', '8643456353336815', NULL, NULL, NULL, NULL, 1570355688, 1570601838, 1, 'Rijal', 'Arfani', NULL, '085642675210'),
(139, '127.0.0.1', 'arfani', '$2y$08$jXVdEgtiaNhECcn4f0pSZemMJQj1249atDdwO0vhueaN6FiRE3oSu', NULL, 'arfani@gmail.com', '32345673951634562', NULL, NULL, NULL, NULL, 1570498670, 1570498686, 1, 'Arfani', 'rizal', 'Moza', '085642675210');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(126, 122, 4),
(130, 129, 2),
(132, 131, 2),
(136, 138, 5),
(137, 139, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengadu`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `requestsewa`
--
ALTER TABLE `requestsewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyewa` (`id_penyewa`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kendaraan`
--
ALTER TABLE `status_kendaraan`
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengadu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requestsewa`
--
ALTER TABLE `requestsewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
