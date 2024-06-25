-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2024 at 04:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aztrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(45) DEFAULT NULL,
  `merek` varchar(45) DEFAULT NULL,
  `no_polisi` varchar(11) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `tahun` varchar(45) DEFAULT NULL,
  `bahan_bakar` varchar(45) DEFAULT NULL,
  `foto_mobil` varchar(255) DEFAULT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(545) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `merek`, `no_polisi`, `harga`, `tahun`, `bahan_bakar`, `foto_mobil`, `foto_url`, `deskripsi`, `created_at`, `updated_at`, `status`) VALUES
(20, 'INOVA REBORN', 'TOYOTA', 'AE 1129 BV', '500000', '2018', 'PERTAMAX', '1718550972_innova_reborn.jpeg', 'http://127.0.0.1:8000/storage/images/1718550972_innova_reborn.jpeg', 'Muatan maksimal 7 orang', '2024-06-12 23:52:23', '2024-06-17 07:03:57', 'Tersedia'),
(21, 'BRIO SATYA', 'HONDA', 'AE 1242 MA', '300000', '2018', 'PERTAMAX', '1718550980_brio_satya.jpeg', 'http://127.0.0.1:8000/storage/images/1718550980_brio_satya.jpeg', 'Muatan maksimal  5 orang', '2024-06-12 23:53:46', '2024-06-16 23:41:19', 'Tersedia'),
(22, 'HIACE COMMUTER', 'TOYOTA', 'AE 7093 MC', '800000', '2020', 'SOLAR', '1718550988_hiace_commuter.jpeg', 'http://127.0.0.1:8000/storage/images/1718550988_hiace_commuter.jpeg', 'Muatan maksimal  16 orang', '2024-06-13 00:12:17', '2024-06-16 08:16:28', 'Tersedia'),
(23, 'HIACE PREMIO', 'TOYOTA', 'AE 1177 BA', '700000', '2021', 'SOLAR', '1718550996_hiace_premio.jpeg', 'http://127.0.0.1:8000/storage/images/1718550996_hiace_premio.jpeg', 'Muatan maksimal  14 orang', '2024-06-13 00:15:05', '2024-06-16 08:16:36', 'Tersedia'),
(24, 'ELF GIGA', 'ISUZU', 'AE 7710 US', '1000000', '2020', 'SOLAR', '1718551004_isuzu-elf.jpg', 'http://127.0.0.1:8000/storage/images/1718551004_isuzu-elf.jpg', 'Muatan maksimal 21 orang', '2024-06-13 00:21:07', '2024-06-17 00:26:57', 'Tidak Tersedia'),
(25, 'INOVA REBORN', 'TOYOTA', 'AE 1305 YR', '600000', '2021', 'SOLAR', '1718551012_innova_reborn_solar.jpeg', 'http://127.0.0.1:8000/storage/images/1718551012_innova_reborn_solar.jpeg', 'Muatan maksimal 7 orang', '2024-06-13 00:24:21', '2024-06-16 08:16:52', 'Tersedia'),
(26, 'AVANZA', 'TOYOTA', 'AE 1138 BA', '400000', '2021', 'PERTAMAX', '1718595127_avanza.jpeg', 'http://127.0.0.1:8000/storage/images/1718595127_avanza.jpeg', 'Muatan maksimal 7 orang', '2024-06-13 00:32:09', '2024-06-16 20:32:07', 'Tersedia'),
(33, 'CHIHIRO', 'Billie Eilish', 'DO 9812 NT', '999666', '1999', 'Netherrock', '1718595524_794fb9ff8fb9747d1c6d6cdc9d59f73d.jpg', 'http://127.0.0.1:8000/storage/images/1718595524_794fb9ff8fb9747d1c6d6cdc9d59f73d.jpg', 'HIT ME HARD AND SOFT', '2024-06-16 20:38:44', '2024-06-16 22:28:42', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL DEFAULT '112',
  `gross_amount` int(11) DEFAULT NULL,
  `nama_mobil` varchar(45) DEFAULT NULL,
  `nama_pemesan` varchar(45) DEFAULT NULL,
  `alamat` varchar(245) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `no_ktp` varchar(100) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `tanggalpesan_start` date DEFAULT NULL,
  `tanggalpesan_end` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto_url` varchar(300) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Belum Bayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `mobil_id`, `order_id`, `gross_amount`, `nama_mobil`, `nama_pemesan`, `alamat`, `harga`, `no_ktp`, `telepon`, `tanggalpesan_start`, `tanggalpesan_end`, `created_at`, `updated_at`, `foto_url`, `status`) VALUES
(400, 20, '112', 1, 'INOVA REBORN', 'HasikGanzz', 'Ngawi Geneng', '500000', '35278102032', '098878778', '2024-06-17', '2024-06-17', '2024-06-17 07:26:06', '2024-06-17 07:26:24', 'http://127.0.0.1:8000/storage/images/1718550972_innova_reborn.jpeg', 'Sudah Bayar'),
(401, 24, '112', 1, 'ELF GIGA', 'HasikGanzz', 'Ngawi Geneng', '3000000', '35278102032', '098878778', '2024-06-18', '2024-06-20', '2024-06-17 07:26:38', '2024-06-17 07:26:57', 'http://127.0.0.1:8000/storage/images/1718551004_isuzu-elf.jpg', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(555) DEFAULT NULL,
  `uid` varchar(555) DEFAULT NULL,
  `nama_lengkap` varchar(555) DEFAULT NULL,
  `email` varchar(555) DEFAULT NULL,
  `alamat` varchar(555) DEFAULT NULL,
  `no_ktp` varchar(555) DEFAULT NULL,
  `no_telp` varchar(555) DEFAULT NULL,
  `foto_url` varchar(555) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `uid`, `nama_lengkap`, `email`, `alamat`, `no_ktp`, `no_telp`, `foto_url`, `created_at`, `updated_at`) VALUES
(24, '6B_Rizky Syahrul', 'iEUgB5NkazW2RwVQWKmB8HfatI92', 'ikyy', '2ndrzkshrl@gmail.com', 'Ngawi', '1293913', '120321838', 'https://lh3.googleusercontent.com/a/ACg8ocJ4GpZqqfvho8B81J26mzSEyeGMK9ftWhYNDz7LPkk4pIsfvBo', '2024-06-06', '2024-06-17'),
(26, 'ikyy', 'idkihngawurges', 'ikyydsa', '2rzkshrl@gmail.com', 'CHINATOWN', '92738162187', '123746512', 'http://127.0.0.1:8000/storage/images/1718599917_Photo on 08-06-24 at 13.05.jpg', '2024-06-12', '2024-06-17'),
(30, 'hasikGan', 'MDfHwZQ5IvYjuxu4DdGbuX50AOr1', 'HasikGanzz', 'rizkysahrul0@gmail.com', 'Ngawi Geneng', '35278102032', '098878778', NULL, '2024-06-16', '2024-06-17'),
(32, 'kkw', '8XXr6H4yOhTq9Kkflck8AwuXAzY2', 'LAL01', 'ribkacta29@gmail.com', 'KARAS', '1982312313', '00991923', NULL, '2024-06-17', '2024-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `⁠ transaction ⁠`
--

CREATE TABLE `⁠ transaction ⁠` (
  `⁠ order_id ⁠` int(11) NOT NULL,
  `⁠ transaction_status ⁠` varchar(255) NOT NULL,
  `⁠ payment_type ⁠` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD UNIQUE KEY `id_mobil_UNIQUE` (`id_mobil`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `⁠ transaction ⁠`
--
ALTER TABLE `⁠ transaction ⁠`
  ADD PRIMARY KEY (`⁠ order_id ⁠`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `⁠ transaction ⁠`
--
ALTER TABLE `⁠ transaction ⁠`
  MODIFY `⁠ order_id ⁠` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
