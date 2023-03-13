-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 10:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duit_konas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_hutang`
--

CREATE TABLE `akun_hutang` (
  `kode_akun` char(38) NOT NULL,
  `nama_akun` char(255) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `debit` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_akun`
--

CREATE TABLE `daftar_akun` (
  `kode_akun` char(38) NOT NULL,
  `nama_akun` char(255) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `debit` bigint(20) NOT NULL,
  `saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_logs`
--

CREATE TABLE `daftar_logs` (
  `timestamp` bigint(20) NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `akun_sumber` char(38) NOT NULL,
  `akun_tujuan` char(38) NOT NULL,
  `akun_hutang` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_logs`
--
ALTER TABLE `daftar_logs`
  ADD PRIMARY KEY (`timestamp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
