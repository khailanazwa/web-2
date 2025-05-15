-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 09:54 AM
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
-- Database: `dbkegiatan_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_ilmu`
--

CREATE TABLE `bidang_ilmu` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `gelar_belakang` varchar(30) DEFAULT NULL,
  `gelar_depan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_kegiatan`
--

CREATE TABLE `dosen_kegiatan` (
  `dosen_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tempat` varchar(45) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis_kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `penelitian_id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `tahun_ajaran` varchar(5) DEFAULT NULL,
  `bidang_ilmu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `ketua` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tim_penelitian`
--

CREATE TABLE `tim_penelitian` (
  `dosen_id` int(11) NOT NULL,
  `penelitian_id` int(11) NOT NULL,
  `peran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_ilmu`
--
ALTER TABLE `bidang_ilmu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dosen_prodi1_idx` (`prodi_id`);

--
-- Indexes for table `dosen_kegiatan`
--
ALTER TABLE `dosen_kegiatan`
  ADD PRIMARY KEY (`dosen_id`,`kegiatan_id`),
  ADD KEY `fk_dosen_kegiatan_dosen1_idx` (`dosen_id`),
  ADD KEY `fk_dosen_kegiatan_kegiatan1_idx` (`kegiatan_id`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_jenis_kegiatan1_idx` (`jenis_kegiatan_id`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`penelitian_id`),
  ADD KEY `fk_penelitian_bidang_ilmu1_idx` (`bidang_ilmu_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim_penelitian`
--
ALTER TABLE `tim_penelitian`
  ADD PRIMARY KEY (`dosen_id`,`penelitian_id`),
  ADD KEY `fk_tim_penelitian_penelitian1_idx` (`penelitian_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_dosen_prodi1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dosen_kegiatan`
--
ALTER TABLE `dosen_kegiatan`
  ADD CONSTRAINT `fk_dosen_kegiatan_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dosen_kegiatan_kegiatan1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_jenis_kegiatan_id` FOREIGN KEY (`jenis_kegiatan_id`) REFERENCES `jenis_kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD CONSTRAINT `fk_penelitian_bidang_ilmu1` FOREIGN KEY (`bidang_ilmu_id`) REFERENCES `bidang_ilmu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tim_penelitian`
--
ALTER TABLE `tim_penelitian`
  ADD CONSTRAINT `fk_timpenelitian_dosen` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_timpenelitian_penelitian` FOREIGN KEY (`penelitian_id`) REFERENCES `penelitian` (`penelitian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
