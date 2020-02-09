-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 02:40 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_approval9`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `nama_aturan` varchar(100) NOT NULL,
  `batas_bawah` varchar(100) NOT NULL,
  `batas_atas` varchar(100) NOT NULL,
  `status` tinyint(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `nama_aturan`, `batas_bawah`, `batas_atas`, `status`) VALUES
(1, 'harga_barang', '0', '5000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `id_jenis_request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `id_jenis_request`) VALUES
(1, 'Acer CS', '7000', 1),
(2, 'Lenovo', '5000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_detail`
--

CREATE TABLE `barang_detail` (
  `id_barang_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `spesifikasi` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajuan`
--

CREATE TABLE `detail_pengajuan` (
  `id_detail` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tharga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengajuan`
--

INSERT INTO `detail_pengajuan` (`id_detail`, `id_pengajuan`, `qty`, `harga`, `tharga`, `keterangan`, `nama_barang`) VALUES
(1, 1, '1', '45000', '45000', 'hijau', 'Celana Ihrom Wajik'),
(2, 2, '1', '45000', '45000', 'hijau', 'Barang dibawah 5 juta'),
(3, 3, '1', '45000', '45000', 'hijau', 'Lenovo Ideapad 900'),
(4, 4, '2', '54000', '108000', 'HIJAU', 'Barang barang aja'),
(5, 5, '1', '3500000', '3500000', 'hitam', 'Bawah 5 jt'),
(6, 6, '1', '4500000', '4500000', 'hijau', 'BrANG DIATAS 2 JUTA'),
(7, 7, '1', '2500000', '2500000', 'hijau', 'Asusu max pro'),
(8, 8, '1', '2500000', '2500000', 'hijau', 'Asusu max pro'),
(9, 9, '1', '3500000', '3500000', 'hijau', 'Keyboard Hardisk'),
(10, 10, '1', '3500000', '3500000', 'hijau', 'SElimut brang'),
(11, 11, '1', '150000', '150000', 'HIJAU', 'Sajadah SKV Signature Gold'),
(12, 12, '2', '10000000', '20000000', 'hijau', 'laptop di atas 10 juta'),
(13, 13, '5', '5000000', '25000000', 'hijau', 'Diatas 10 juta'),
(14, 14, '2', '20000000', '40000000', 'hijau', 'laptop 20.000.000'),
(15, 15, '3', '5000000', '15000000', 'hijau', 'Diatas 5 juta2');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Marketing'),
(2, 'IT'),
(3, 'Finance'),
(4, 'Purchasing'),
(5, 'General Manager'),
(6, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `id_pengajuan` int(11) DEFAULT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `email_penerima` varchar(50) DEFAULT NULL,
  `isi_email` text NOT NULL,
  `tanggal` date NOT NULL,
  `subjek` text,
  `lampiran` varchar(70) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `status_pesan` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id_email`, `id_pengajuan`, `id_pengirim`, `id_penerima`, `email_penerima`, `isi_email`, `tanggal`, `subjek`, `lampiran`, `status`, `status_pesan`) VALUES
(1, 1, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-06', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(2, 2, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-06', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(3, 3, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(4, 4, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(5, 5, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(6, 6, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(7, 7, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(8, 8, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(9, 9, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(10, 10, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(11, 11, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(12, 12, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(13, 13, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(14, 14, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0),
(15, 15, 26, 27, NULL, 'telah mengirimkan permintaan persetujuan kepada anda pada tanggal01 January 1970', '2019-03-07', 'Menunggu Persetujuan Permintaan', NULL, 0, 0);

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
(1, 'admin', 'Administratordd'),
(2, 'members', 'General User'),
(14, 'general manager', 'General Member'),
(15, 'manager', 'Manager'),
(16, 'purchasing', 'Purchasing'),
(17, 'finance', 'Finance'),
(18, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `history_pengajuan`
--

CREATE TABLE `history_pengajuan` (
  `id_history` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `catatan` text,
  `id_user_approval` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_pengajuan`
--

INSERT INTO `history_pengajuan` (`id_history`, `id_pengajuan`, `status`, `catatan`, `id_user_approval`, `tanggal`, `ket`) VALUES
(1, 1, 0, '', 0, '2019-03-06', 'Manajer'),
(2, 1, 1, NULL, 27, '2019-03-06', 'Manajer'),
(3, 1, 1, NULL, 28, '2019-03-06', 'Finance'),
(4, 1, 1, NULL, 32, '2019-03-06', 'Purchasing'),
(5, 2, 0, '', 0, '2019-03-06', 'Manajer'),
(6, 2, 1, NULL, 27, '2019-03-06', 'Manajer'),
(7, 2, 1, NULL, 28, '2019-03-06', 'Finance'),
(8, 2, 1, NULL, 32, '2019-03-06', 'Purchasing'),
(9, 3, 0, '', 0, '2019-03-07', 'Manajer'),
(10, 3, 1, NULL, 27, '2019-03-07', 'Manajer'),
(11, 3, 1, NULL, 28, '2019-03-07', 'Finance'),
(12, 3, 1, NULL, 32, '2019-03-07', 'Purchasing'),
(13, 4, 0, '', 0, '2019-03-07', 'Manajer'),
(14, 5, 0, '', 0, '2019-03-07', 'Manajer'),
(15, 6, 0, '', 0, '2019-03-07', 'Manajer'),
(16, 7, 0, '', 0, '2019-03-07', 'Manajer'),
(17, 8, 0, '', 0, '2019-03-07', 'Manajer'),
(18, 9, 0, '', 0, '2019-03-07', 'Manajer'),
(19, 10, 0, '', 0, '2019-03-07', 'Manajer'),
(20, 11, 0, '', 0, '2019-03-07', 'Manajer'),
(21, 11, 1, NULL, 27, '2019-03-07', 'Manajer'),
(22, 11, 1, NULL, 28, '2019-03-07', 'Finance'),
(23, 11, 1, NULL, 32, '2019-03-07', 'Purchasing'),
(24, 12, 0, '', 0, '2019-03-07', 'Manajer'),
(25, 12, 1, NULL, 27, '2019-03-07', 'Manajer'),
(26, 13, 0, '', 0, '2019-03-07', 'Manajer'),
(27, 13, 1, NULL, 27, '2019-03-07', 'Manajer'),
(28, 14, 0, '', 0, '2019-03-07', 'Manajer'),
(29, 14, 1, NULL, 27, '2019-03-07', 'Manajer'),
(30, 15, 0, '', 0, '2019-03-07', 'Manajer'),
(31, 15, 1, NULL, 27, '2019-03-07', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Supervisor'),
(2, 'Manager'),
(3, 'Bubuk Renginang'),
(4, 'Staff IT');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_request`
--

CREATE TABLE `jenis_request` (
  `id_jenis_request` int(11) NOT NULL,
  `jenis_request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_request`
--

INSERT INTO `jenis_request` (`id_jenis_request`, `jenis_request`) VALUES
(1, 'Barang'),
(2, 'Jasa');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_required` date NOT NULL,
  `id_jenis_request` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `last_status` tinyint(2) DEFAULT NULL,
  `no_pengajuan` varchar(100) NOT NULL,
  `id_user_approval` int(11) NOT NULL DEFAULT '0',
  `status_user` tinyint(2) NOT NULL DEFAULT '0',
  `ket` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `tanggal_pengajuan`, `tanggal_required`, `id_jenis_request`, `keterangan`, `last_status`, `no_pengajuan`, `id_user_approval`, `status_user`, `ket`) VALUES
(1, 26, '2019-03-06', '2019-03-06', 1, 'Barang dan jasa', 1, 'PR-0001', 32, 4, 'Purchasing'),
(2, 26, '2019-03-06', '2019-03-14', 1, 'Barang dan Jasa', 1, 'PR-0002', 32, 4, 'Purchasing'),
(3, 26, '2019-03-07', '2019-04-02', 1, 'Barang dan Jasa', 1, 'PR-0003', 32, 4, 'Purchasing'),
(4, 26, '2019-03-07', '2019-02-28', 2, 'barang dan jasa', 0, 'PR-0004', 0, 0, 'Manajer'),
(5, 26, '2019-03-07', '2019-03-27', 1, 'biru dan kuning', 0, 'PR-0005', 0, 0, 'Manajer'),
(6, 26, '2019-03-07', '2019-03-27', 1, 'Barang dan Jasa', 0, 'PR-0006', 0, 0, 'Manajer'),
(7, 26, '2019-03-07', '2019-03-13', 2, 'Barang dan jasa', 0, 'PR-0007', 0, 0, 'Manajer'),
(8, 26, '2019-03-07', '2019-03-27', 1, 'Barang dan Jasa', 0, 'PR-0008', 0, 0, 'Manajer'),
(9, 26, '2019-03-07', '2019-03-27', 1, 'Barang dan jasa', 0, 'PR-0009', 0, 0, 'Manajer'),
(10, 26, '2019-03-07', '2019-03-28', 1, 'Barang dan biru', 0, 'PR-0010', 0, 0, 'Manajer'),
(11, 26, '2019-03-07', '2019-03-21', 1, 'bIRU', 1, 'PR-0011', 32, 4, 'Purchasing'),
(12, 26, '2019-03-07', '2019-03-14', 1, 'barang dan jasa', 1, 'PR-0012', 27, 3, 'Manajer'),
(13, 26, '2019-03-07', '2019-03-28', 1, 'barang', 1, 'PR-0013', 27, 3, 'Manajer'),
(14, 26, '2019-03-07', '2019-03-27', 1, 'laptop warna kuning', 1, 'PR-0014', 27, 3, 'Manajer'),
(15, 26, '2019-03-07', '2019-03-14', 1, 'Barang dan jasa', 1, 'PR-0015', 27, 3, 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
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
  `phone` varchar(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_line_manajer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `foto`, `id_divisi`, `id_jabatan`, `id_line_manajer`) VALUES
(26, '192.168.2.1', 'staff', '$2y$08$hFYHUujxhERHna1NqtZSP.PumDr2MsB2YXJqiJPxFt9.B9IT9Zw5C', NULL, 'rani.aartijaya@gmail.com', NULL, 'QM6kSuLdppmxNEZnCpiYq.a2c651fa98840e6b2b', 1545792141, NULL, 1507273365, 1551920367, 1, 'Rani ', 'Pebrianti', 'Bursa Sajadah', '0895350164351', NULL, 2, 4, 27),
(27, '::1', 'manager', '$2y$08$hFYHUujxhERHna1NqtZSP.PumDr2MsB2YXJqiJPxFt9.B9IT9Zw5C', NULL, 'ranipebrianti84@gmail.com', NULL, NULL, NULL, NULL, 1548665201, 1551689493, 1, 'Sinta', 'Manager', NULL, '081322141666', NULL, 2, 0, NULL),
(28, '::1', 'finance', '$2y$08$hFYHUujxhERHna1NqtZSP.PumDr2MsB2YXJqiJPxFt9.B9IT9Zw5C', NULL, 'ranipandawarman@gmail.com', NULL, NULL, NULL, NULL, 1548665397, 1550719610, 1, 'Finance', 'Finance', NULL, '081322141666', NULL, 3, 0, NULL),
(29, '::1', 'purchasing', '$2y$08$hFYHUujxhERHna1NqtZSP.PumDr2MsB2YXJqiJPxFt9.B9IT9Zw5C', NULL, 'admin@aartijaya.com', NULL, NULL, NULL, NULL, 1548665471, 1550719647, 1, 'Purchasing', 'adidaya', NULL, '081322141666', NULL, 4, 0, NULL),
(30, '::1', 'general manager', '$2y$08$hFYHUujxhERHna1NqtZSP.PumDr2MsB2YXJqiJPxFt9.B9IT9Zw5C', NULL, 'info@aartijaya.com', NULL, NULL, NULL, NULL, 1548665781, 1550719576, 1, 'sutrianingsih', 'sutiana', NULL, '081322141666', NULL, 0, 1, NULL),
(32, '::1', 'admin', '$2y$08$FFkViH78ev.WZPzMDH/A5uiAtC3SbrDC8YJ5w0lVBv/xq7NlWbIlK', NULL, 'admin@aartijaya.com', NULL, NULL, NULL, NULL, 1548901456, 1549608770, 1, 'Admin', 'Admin', NULL, '0895350164351', NULL, 6, 1, NULL);

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
(1, 26, 2),
(9, 26, 18),
(5, 27, 15),
(2, 28, 17),
(3, 29, 16),
(4, 30, 14),
(8, 32, 1),
(7, 32, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_type` (`id_jenis_request`);

--
-- Indexes for table `barang_detail`
--
ALTER TABLE `barang_detail`
  ADD PRIMARY KEY (`id_barang_detail`);

--
-- Indexes for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`,`id_pengirim`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_penerima` (`id_penerima`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_pengajuan`
--
ALTER TABLE `history_pengajuan`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_user_approval` (`id_user_approval`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_request`
--
ALTER TABLE `jenis_request`
  ADD PRIMARY KEY (`id_jenis_request`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD UNIQUE KEY `no_pengajuan` (`no_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_type` (`id_jenis_request`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_jabatan` (`id_jabatan`);

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
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_detail`
--
ALTER TABLE `barang_detail`
  MODIFY `id_barang_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pengajuan`
--
ALTER TABLE `detail_pengajuan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `history_pengajuan`
--
ALTER TABLE `history_pengajuan`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_request`
--
ALTER TABLE `jenis_request`
  MODIFY `id_jenis_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
