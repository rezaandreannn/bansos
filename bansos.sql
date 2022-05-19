-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2021 at 01:08 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kec`
--

CREATE TABLE `tb_kec` (
  `id` int(11) NOT NULL,
  `kec` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kec`
--

INSERT INTO `tb_kec` (`id`, `kec`) VALUES
(1, 'Metro Pusat'),
(2, 'Metro Timur'),
(3, 'Metro Barat'),
(4, 'Metro Utara'),
(5, 'Metro Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kpm`
--

CREATE TABLE `tb_kpm` (
  `id_kpm` int(11) NOT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `nama_kpm` varchar(30) DEFAULT NULL,
  `tgl_lahir` varchar(30) DEFAULT NULL,
  `alamat` varchar(111) DEFAULT NULL,
  `kec_id` int(25) NOT NULL,
  `status` int(4) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `tgl_buat` datetime DEFAULT NULL,
  `tgl_edit` datetime DEFAULT NULL,
  `warong_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kpm`
--

INSERT INTO `tb_kpm` (`id_kpm`, `ktp`, `nama_kpm`, `tgl_lahir`, `alamat`, `kec_id`, `status`, `Keterangan`, `tgl_buat`, `tgl_edit`, `warong_id`) VALUES
(4, '187202200100191', 'adisa', '2014-02-04', 'metro pusat', 1, 1, 'a', '2021-08-03 14:23:17', '2021-08-03 14:46:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyaluran`
--

CREATE TABLE `tb_penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
  `warong_id` int(11) NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kpm_id` int(11) DEFAULT NULL,
  `jumlah_kuota` int(11) NOT NULL,
  `jumlah_transaksi` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyaluran`
--

INSERT INTO `tb_penyaluran` (`id_penyaluran`, `warong_id`, `kec_id`, `kpm_id`, `jumlah_kuota`, `jumlah_transaksi`, `tgl`) VALUES
(1, 1, 1, 1, 14, 12, '2021-08-05 16:22:53'),
(3, 5, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(122) NOT NULL,
  `password` varchar(111) NOT NULL,
  `role_id` int(11) NOT NULL,
  `kec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `role_id`, `kec_id`) VALUES
(2, 'superadmin', '$2y$10$oToLWNyxzAT16B2EtJ4kW.NnuprmohwsZOyAuC2rFX3S4wLyJd9oW', 1, NULL),
(3, 'andre', '$2y$10$QVzsLaT3DVYU6iJy38ylz.kaxj60wTXoNtyG.NvQ7v6l.WsNFdXlW', 2, 1),
(4, 'mahfud', '$2y$10$hxlIux76PhOmdlcXkQiJH.6Q5x4uzDX3WG7oPiGnCpkgoyW2OXfy2', 2, 2),
(5, 'dghg', '$2y$10$FLcJO/GsM/tkBH04PkVGz.UeN1GNYAFlEogRa88/wnAFyyc5sfAei', 2, 3),
(6, 'bebas', '$2y$10$YOwHE4lhs0YAg/08gk7gVuyS.SOvlwjWF6FwFLmn/DYiNtZ2iTYf6', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_warong`
--

CREATE TABLE `tb_warong` (
  `id_warong` int(11) NOT NULL,
  `nama_warong` varchar(122) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `nama_ketua` varchar(30) NOT NULL,
  `thn_berdiri` varchar(20) NOT NULL,
  `total_transaksi` int(20) NOT NULL,
  `kec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_warong`
--

INSERT INTO `tb_warong` (`id_warong`, `nama_warong`, `alamat`, `nama_ketua`, `thn_berdiri`, `total_transaksi`, `kec_id`) VALUES
(1, 'Mandiri jaya', 'jl. kakak tua rt 42 rw 10', 'suwarzilah', '2017', 30, 1),
(2, 'asruk', 'jl. kenanga', 'mahmud', '2016', 0, 3),
(5, 'bejo', 'dsa', 'dfsdf', '2015', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kec`
--
ALTER TABLE `tb_kec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kpm`
--
ALTER TABLE `tb_kpm`
  ADD PRIMARY KEY (`id_kpm`),
  ADD KEY `warong` (`warong_id`);

--
-- Indexes for table `tb_penyaluran`
--
ALTER TABLE `tb_penyaluran`
  ADD PRIMARY KEY (`id_penyaluran`),
  ADD KEY `tb_warong` (`warong_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_warong`
--
ALTER TABLE `tb_warong`
  ADD PRIMARY KEY (`id_warong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kec`
--
ALTER TABLE `tb_kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kpm`
--
ALTER TABLE `tb_kpm`
  MODIFY `id_kpm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penyaluran`
--
ALTER TABLE `tb_penyaluran`
  MODIFY `id_penyaluran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_warong`
--
ALTER TABLE `tb_warong`
  MODIFY `id_warong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penyaluran`
--
ALTER TABLE `tb_penyaluran`
  ADD CONSTRAINT `tb_warong` FOREIGN KEY (`warong_id`) REFERENCES `tb_warong` (`id_warong`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
