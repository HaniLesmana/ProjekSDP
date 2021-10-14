-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 01:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbabowe`
--
CREATE DATABASE IF NOT EXISTS `dbbabowe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbbabowe`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(12) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_telepon` varchar(15) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_nama`, `admin_telepon`, `admin_password`, `admin_status`) VALUES
('A00000000001', 'admin@a.com', 'admin', '123123123', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` varchar(255) NOT NULL,
  `barang_kategori` varchar(12) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_harga` int(15) NOT NULL,
  `barang_stok` int(10) NOT NULL,
  `barang_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` varchar(255) NOT NULL,
  `pegawai_id` varchar(200) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `chat_isi` varchar(1000) NOT NULL,
  `chat_tanggal` date NOT NULL,
  `chat_sender` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dtransbarang`
--

CREATE TABLE `dtransbarang` (
  `hBarang_id` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `barang_jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dtransbayar`
--

CREATE TABLE `dtransbayar` (
  `hSewa_id` varchar(12) NOT NULL,
  `hBayar_id` varchar(12) NOT NULL,
  `dBayar_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dtranssewa`
--

CREATE TABLE `dtranssewa` (
  `hSewa_id` varchar(12) NOT NULL,
  `pegawai_id` varchar(200) NOT NULL,
  `dSewa_durasi` int(10) NOT NULL,
  `dSewa_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dtranstpwd`
--

CREATE TABLE `dtranstpwd` (
  `htranstpwd_id` varchar(12) NOT NULL,
  `dtranstpwd_nominal` bigint(12) NOT NULL,
  `dtranstpwd_jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dtransvoucher`
--

CREATE TABLE `dtransvoucher` (
  `hVoucher_id` varchar(10) NOT NULL,
  `voucher_id` varchar(8) NOT NULL,
  `voucher_jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htransbarang`
--

CREATE TABLE `htransbarang` (
  `hBarang_id` varchar(12) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `pegawai_id` varchar(200) NOT NULL,
  `hBarang_tanggal` date NOT NULL,
  `hBarang_total` int(10) NOT NULL,
  `hBarang_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htransbayar`
--

CREATE TABLE `htransbayar` (
  `hBayar_id` varchar(12) NOT NULL,
  `hBayar_tanggal` date NOT NULL,
  `hBayar_total` int(15) NOT NULL,
  `hBayar_status` int(1) NOT NULL,
  `pegawai_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htranssaldo`
--

CREATE TABLE `htranssaldo` (
  `saldo_id` varchar(12) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `saldo_jenis` varchar(1) NOT NULL,
  `saldo_jumlah` int(15) NOT NULL,
  `saldo_tanggal` date NOT NULL,
  `saldo_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htranssewa`
--

CREATE TABLE `htranssewa` (
  `hSewa_id` varchar(12) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `hBarang_id` varchar(12) NOT NULL,
  `hSewa_tanggal` date NOT NULL,
  `hSewa_total` int(15) NOT NULL,
  `hSewa_status` int(1) NOT NULL,
  `voucher_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `htranstpwd`
--

CREATE TABLE `htranstpwd` (
  `htranstpwd_id` varchar(12) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `htranstpwd_tanggal` date NOT NULL,
  `htranstpwd_total` bigint(12) NOT NULL,
  `htranstpwd_tipe` varchar(10) NOT NULL,
  `htranstpwd_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `htransvoucher`
--

CREATE TABLE `htransvoucher` (
  `hVoucher_id` varchar(10) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `hVoucher_tanggal` int(10) NOT NULL,
  `hVoucher_total` int(10) NOT NULL,
  `Useruser_username` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` varchar(12) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` varchar(255) NOT NULL,
  `pegawai_nik` varchar(16) NOT NULL,
  `pegawai_email` varchar(255) NOT NULL,
  `pegawai_nama` varchar(255) NOT NULL,
  `pegawai_telepon` varchar(15) NOT NULL,
  `pegawai_alamat` varchar(255) NOT NULL,
  `pegawai_password` varchar(255) NOT NULL,
  `pegawai_jasa` varchar(50) NOT NULL,
  `pegawai_saldo` int(15) NOT NULL,
  `pegawai_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nik`, `pegawai_email`, `pegawai_nama`, `pegawai_telepon`, `pegawai_alamat`, `pegawai_password`, `pegawai_jasa`, `pegawai_saldo`, `pegawai_status`) VALUES
('P00000000000', '2222222222221111', 'asd@a.com', 'asd', '123123123123', 'Ploso Timur 222', 'asd', 'art', 0, 1),
('P00000000001', '2222222222221122', 'dsa@a.c', 'dsa', '123123123123', 'dsa', 'dsa', 'tukang', 0, 0),
('P00000000002', '2222222222221133', 'aaa@a.a', 'aaa', '123123123123', 'aaa', 'aaa', 'art', 0, 0),
('P00000000003', '2222222222221144', 'bbb@b.c', 'bbb', '234234234234', 'bbb', 'bbb', 'tukang', 0, 0),
('P00000000004', '2222222222221155', 'ccc@c.c', 'ccc', '123123123123', 'ccc', 'ccc', 'art', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` varchar(12) NOT NULL,
  `user_username` varchar(12) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `report_isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` varchar(12) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `pegawai_id` varchar(200) NOT NULL,
  `review_isi` int(10) NOT NULL,
  `review_rating` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(12) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_telepon` varchar(15) NOT NULL,
  `user_alamat` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_saldo` int(15) NOT NULL,
  `user_poin` int(10) NOT NULL DEFAULT 0,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` varchar(8) NOT NULL,
  `voucher_nama` varchar(100) NOT NULL,
  `voucher_harga` int(10) NOT NULL,
  `voucher_potongan` int(12) NOT NULL,
  `voucher_masaberlaku` int(5) NOT NULL,
  `voucher_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `htransbarang`
--
ALTER TABLE `htransbarang`
  ADD PRIMARY KEY (`hBarang_id`);

--
-- Indexes for table `htransbayar`
--
ALTER TABLE `htransbayar`
  ADD PRIMARY KEY (`hBayar_id`);

--
-- Indexes for table `htranssaldo`
--
ALTER TABLE `htranssaldo`
  ADD PRIMARY KEY (`saldo_id`);

--
-- Indexes for table `htranssewa`
--
ALTER TABLE `htranssewa`
  ADD PRIMARY KEY (`hSewa_id`);

--
-- Indexes for table `htransvoucher`
--
ALTER TABLE `htransvoucher`
  ADD PRIMARY KEY (`hVoucher_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD UNIQUE KEY `pegawai_email` (`pegawai_email`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FKReview30117` (`pegawai_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FKReview30117` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`pegawai_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
