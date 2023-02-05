-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 08:02 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sist_rm`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `kapasitas` int(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` int(255) NOT NULL,
  `stok` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `merk`, `lokasi`, `kapasitas`, `warna`, `gambar`, `harga`, `stok`) VALUES
(1, 'New Avanza', 'Bogor', 8, 'Putih', 'avanza10.png', 450000, 2),
(2, 'New Xenia', 'Bogor', 8, 'Putih', 'xenia1.png', 450000, 1),
(3, 'Innova Reborn', 'Bogor', 8, 'Silver', 'innova-reborn-1.png', 700000, 1),
(4, 'Toyota Fortuner', 'Bogor', 8, 'Putih', 'fortuner-1.png', 1700000, 0),
(5, 'Alphard/Vellvire', 'Bogor', 8, 'Hitam', 'alphard-1.png', 4500000, 1),
(6, 'Double Cabin 4 x 4', 'Bogor', 4, 'Putih', 'double-cabin-1.png', 1400000, 2),
(7, 'Toyota Hiace', 'Bogor', 13, 'Silver', 'isuzu-hiace-1.png', 1300000, 2),
(8, 'Bus Pariwisata', 'Bogor', 31, 'Silver', 'bus-1.png', 1400000, 2),
(9, 'Luxio', 'Bogor', 8, 'Putih', 'luxio.png', 450000, 1),
(10, 'Calya', 'Bogor', 8, 'Putih', 'calya.png', 450000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `nama` text NOT NULL,
  `No_telpon` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`nama`, `No_telpon`, `tanggal_lahir`, `alamat`) VALUES
('wendy', '08174806168', '2002-07-10', 'Banyumas'),
('irene', '08174806168', '2022-05-29', 'bogor raya');

-- --------------------------------------------------------

--
-- Table structure for table `pihak_rental`
--

CREATE TABLE `pihak_rental` (
  `id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `no_telpon` int(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pihak_rental`
--

INSERT INTO `pihak_rental` (`id`, `id_user`, `nama_admin`, `no_telpon`, `alamat`, `is_active`) VALUES
(2, 2, 'seulgi', 2147483647, 'Banyumas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sewamobil`
--

CREATE TABLE `sewamobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `merkMobil` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewamobil`
--

INSERT INTO `sewamobil` (`id`, `nama`, `id_mobil`, `merkMobil`, `tgl_pinjam`, `tgl_kembali`, `biaya`, `pembayaran`, `status`) VALUES
(1, 'wendy', 4, 'Toyota Fortuner', '2022-05-29', '2022-05-30', 1700000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(999) NOT NULL,
  `No_telpon` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `No_telpon`, `tanggal_lahir`, `alamat`, `level`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'wendy', '$2y$10$7j0eD5yAp5SbPQFWi3MCYuCh.IPQbYUscjm2HGxOaBZS0adxCz5lK', 2147483647, '2002-07-10', 'Banyumas', 'Peminjam', 2, 1, 1653230367),
(2, 'seulgi', '$2y$10$c1NCEqTLucUdg7AzOypNleVvgtwMQlxurs8SrMHCQuEG4Bm7EJBQO', 2147483647, '2001-02-01', 'Banyumas', 'Admin', 1, 1, 1653230478),
(3, 'irene', '$2y$10$r/kCTqYBHw.AtQQJOrcCEe.5N8EAc7m4cqpbZxKm4zPHXqgIfhkoS', 2147483647, '2022-05-29', 'bogor raya', 'Admin', 1, 1, 1653753785);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'penyewa');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Home', 'user', 'fas fa-fw fa-table', 1),
(3, 2, 'form peminjaman', 'user/pinjam', 'fas fa-fw fa-table', 1),
(4, 1, 'Input Katalog', 'admin/inputKatalog', 'fas fa-fw fa-table', 1),
(5, 1, 'Data Pemesanan', 'admin/dataPesan', 'fas fa-fw fa-table', 1),
(6, 1, 'Data Katalog', 'admin/dataKatalog', 'fas fa-fw fa-table', 1),
(7, 2, 'Katalog', 'user/katalog', 'fas fa-fw fa-bars', 1),
(24, 1, 'Profile', 'admin/profile', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merk` (`merk`);

--
-- Indexes for table `pihak_rental`
--
ALTER TABLE `pihak_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewamobil`
--
ALTER TABLE `sewamobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pihak_rental`
--
ALTER TABLE `pihak_rental`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sewamobil`
--
ALTER TABLE `sewamobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
