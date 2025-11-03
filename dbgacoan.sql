-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2025 pada 18.51
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
-- Database: `dbgacoan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblaporan`
--

CREATE TABLE `tblaporan` (
  `id` int(5) NOT NULL,
  `resi` varchar(30) NOT NULL,
  `meja` int(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `laporan` text NOT NULL,
  `status` enum('unseen','seen','progress','done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblaporan`
--

INSERT INTO `tblaporan` (`id`, `resi`, `meja`, `nama`, `laporan`, `status`) VALUES
(1, '12345556', 12, 'Faita Alnando ', 'mienya basi', 'done'),
(2, '12345678', 1, 'ica admirani', 'mienya basi udang kejunya dingin', 'done'),
(3, '071205', 3, 'ica admirani', 'mienya basi udang kejunya dingin tehnya hambar', 'done'),
(4, '01', 21, 'ica admirani', 'mie basi', 'done');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblaporan`
--
ALTER TABLE `tblaporan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblaporan`
--
ALTER TABLE `tblaporan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
