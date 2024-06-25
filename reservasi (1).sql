-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2024 pada 05.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aztranz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL DEFAULT '112',
  `gross_amount` varchar(10) NOT NULL,
  `nama_mobil` varchar(45) DEFAULT NULL,
  `nama_pemesan` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `noktp` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `tanggalpesan_start` date DEFAULT NULL,
  `tanggalpesan_end` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `mobil_id`, `order_id`, `gross_amount`, `nama_mobil`, `nama_pemesan`, `alamat`, `harga`, `noktp`, `telepon`, `tanggalpesan_start`, `tanggalpesan_end`, `created_at`, `updated_at`) VALUES
(1, 6, '112', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:26:39', '2024-05-15 05:26:39'),
(2, 6, '112', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:28:22', '2024-05-15 05:28:22'),
(3, 6, '112', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:28:52', '2024-05-15 05:28:52'),
(4, 6, '112', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:29:34', '2024-05-15 05:29:34'),
(5, 6, '5', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:34:53', '2024-05-15 05:34:53'),
(6, 6, '112', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:35:37', '2024-05-15 05:35:37'),
(7, 6, '112', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-15 05:36:38', '2024-05-15 05:36:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
