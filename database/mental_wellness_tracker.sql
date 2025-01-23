-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2025 pada 04.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental_wellness_tracker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `ID_Artikel` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Konten` text NOT NULL,
  `Tanggal_Terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`ID_Artikel`, `Judul`, `Konten`, `Tanggal_Terbit`) VALUES
(1, 'kenapa kamu galau', 'karena ditinggal oleh si dia makanya galau', '2024-10-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_suasana_hati`
--

CREATE TABLE `catatan_suasana_hati` (
  `ID_Catatan` int(11) NOT NULL,
  `ID_Pengguna` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Suasana_Hati` enum('Bahagia','Sedih','Cemas','Stres','Tenang') NOT NULL,
  `Catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catatan_suasana_hati`
--

INSERT INTO `catatan_suasana_hati` (`ID_Catatan`, `ID_Pengguna`, `Tanggal`, `Suasana_Hati`, `Catatan`) VALUES
(1, 1, '2024-10-24', 'Stres', 'ditinggal pergi sama dia'),
(2, 2, '2024-10-24', 'Bahagia', 'hari ini aku sangat bahagia karena dapat belajar bersama dengan teman-temanku, walaupun sulit tapi tetap mengantuk hihi'),
(3, 2, '2024-11-20', 'Sedih', 'galau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `Nama`, `Email`, `Password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa'),
(2, 'user', 'user@gmail.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `ID_Saran` int(11) NOT NULL,
  `ID_Pengguna` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`ID_Saran`, `ID_Pengguna`, `Tanggal`, `Deskripsi`) VALUES
(1, 1, '2024-10-24', 'jika kamu sedih kamu dapat berdoa dan melakukan banyak hal positif dalam hidup kamu'),
(2, 2, '2024-10-24', 'harusnya aku yang disana mendapingimu dan bukan dia, harusnya aku tak kecewa dan bukan dia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID_Artikel`);

--
-- Indeks untuk tabel `catatan_suasana_hati`
--
ALTER TABLE `catatan_suasana_hati`
  ADD PRIMARY KEY (`ID_Catatan`),
  ADD KEY `ID_Pengguna` (`ID_Pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`ID_Saran`),
  ADD KEY `ID_Pengguna` (`ID_Pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID_Artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `catatan_suasana_hati`
--
ALTER TABLE `catatan_suasana_hati`
  MODIFY `ID_Catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `ID_Saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `catatan_suasana_hati`
--
ALTER TABLE `catatan_suasana_hati`
  ADD CONSTRAINT `catatan_suasana_hati_ibfk_1` FOREIGN KEY (`ID_Pengguna`) REFERENCES `pengguna` (`ID_Pengguna`);

--
-- Ketidakleluasaan untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`ID_Pengguna`) REFERENCES `pengguna` (`ID_Pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
