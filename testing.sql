-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2024 pada 05.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sherly`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen`
--

CREATE TABLE `agen` (
  `idagen` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agen`
--

INSERT INTO `agen` (`idagen`, `kota`, `alamat`) VALUES
(1, 'Padang', 'Jln. Ulak Karang Padang'),
(2, 'Painan', 'Corocok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `idanggota` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `nama` varchar(255) NOT NULL DEFAULT '0',
  `jk` varchar(15) NOT NULL DEFAULT '0',
  `tgllahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(12) NOT NULL DEFAULT '',
  `tgldaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`idanggota`, `email`, `password`, `nama`, `jk`, `tgllahir`, `alamat`, `nohp`, `tgldaftar`) VALUES
(2, 'rocky@gmail.com', 'rocky', 'Rocky Rahmad', 'L', '2023-09-01', 'Padang', '0812918271', '2023-09-08 21:27:45'),
(4, 'alazizagnes56@gmail.com', 'qwerty', 'Jhon', 'L', '2023-11-30', 'Padang', '08127192817', '2023-11-30 20:30:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berangkatan`
--

CREATE TABLE `berangkatan` (
  `idberangkatan` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `idmobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berangkatan`
--

INSERT INTO `berangkatan` (`idberangkatan`, `hari`, `jam`, `tujuan`, `harga`, `idmobil`) VALUES
(2, 'Setiap Hari', '02:00', 'Padang - Painan', 35000, 4),
(3, 'Setiap Hari', '02:00', 'Padang - Pariaman', 40000, 2),
(4, 'Setiap Hari', '13:00 WIN', 'Padang - Painan', 30000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `idcart` int(11) NOT NULL,
  `huruf` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`idcart`, `huruf`) VALUES
(1, 'A'),
(1, 'B'),
(1, 'C'),
(1, 'D'),
(3, 'D'),
(3, 'E'),
(4, 'A'),
(4, 'B'),
(5, 'A'),
(5, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `idgalery` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `galery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`idgalery`, `nama`, `galery`) VALUES
(4, 'Gambar 1', 'Gambar 1-Pastel Yellow Illustrative Travel Plans Presentation.png'),
(5, 'Gambar 2', 'Gambar 2-Colorful Illustration Travel Plan Presentation.png'),
(6, 'Gambar 3', 'Gambar 3-Blue Colorful Illustrative Travel Animated Presentation.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ketkat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkat`, `nama`, `ketkat`) VALUES
(2, 'Mobil', 'Mobil'),
(3, 'Mini Bus', 'Mini Bus'),
(4, 'Bus ', 'Bus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(11) NOT NULL,
  `idkat` int(11) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `bangku` int(11) NOT NULL,
  `noplat` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sopir` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`idmobil`, `idkat`, `nama_mobil`, `bangku`, `noplat`, `type`, `sopir`, `nohp`, `foto`) VALUES
(2, 3, 'Mini Bus Merah', 24, 'BA 1921 QE', 'Eksekutif', 'Udin', '081218192817', 'Mini Bus Merah-images.jpg'),
(3, 3, 'Mini Bus Hijau', 24, 'BA 1231 AW', 'Eksekutif', 'Buyuang', '081228172812', 'Mini Bus Hijau-download.jpg'),
(4, 3, 'Mini Bus Orange', 24, 'BA 129 EQ', 'Ekonomi', 'ppppppp', '9090909090090', 'Mini Bus Orange-download (1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idcart` int(11) NOT NULL,
  `idberangkatan` int(11) NOT NULL DEFAULT 0,
  `idanggota` int(11) NOT NULL DEFAULT 0,
  `idagen` int(11) NOT NULL,
  `banyak` int(11) NOT NULL DEFAULT 0,
  `tgl` date DEFAULT NULL,
  `tglorder` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idcart`, `idberangkatan`, `idanggota`, `idagen`, `banyak`, `tgl`, `tglorder`) VALUES
(1, 3, 2, 1, 4, '2023-12-15', '2023-12-14 22:05:41'),
(3, 4, 2, 2, 2, '2023-12-18', '2023-12-17 13:54:30'),
(4, 3, 4, 1, 2, '2024-01-05', '2024-01-04 21:11:59'),
(5, 3, 2, 2, 2, '2024-01-06', '2024-01-05 11:54:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `namalengkap`, `username`, `password`, `level`, `status`) VALUES
(1, 'Administrator', 'admin', 'admin', 'Admin', 'Aktif'),
(30, 'Pimpinan', 'atasan', 'atasan', 'Pimpinan', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`idagen`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indeks untuk tabel `berangkatan`
--
ALTER TABLE `berangkatan`
  ADD PRIMARY KEY (`idberangkatan`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`idgalery`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idcart`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agen`
--
ALTER TABLE `agen`
  MODIFY `idagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `idanggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berangkatan`
--
ALTER TABLE `berangkatan`
  MODIFY `idberangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `idgalery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `idmobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
