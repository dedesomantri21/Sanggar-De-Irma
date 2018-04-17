-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2018 pada 22.51
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deirma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebaya`
--

CREATE TABLE `kebaya` (
  `kode_kebaya` varchar(6) NOT NULL,
  `jenis_kebaya` varchar(25) NOT NULL,
  `ukuran` enum('S','M','L','XL') NOT NULL,
  `warna` varchar(15) NOT NULL,
  `stok` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kebaya`
--

INSERT INTO `kebaya` (`kode_kebaya`, `jenis_kebaya`, `ukuran`, `warna`, `stok`) VALUES
('KBY001', 'Pengantin', 'S', 'Ungu', 5),
('KBY002', 'Wisuda', 'XL', 'Putih', 4),
('KBY003', 'Pengantin', 'XL', 'Putih', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(6) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL,
  `ktp_pelanggan` varchar(16) NOT NULL,
  `no_telp_pelanggan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `ktp_pelanggan`, `no_telp_pelanggan`) VALUES
('PLG001', 'aje', 'kopo', '1234567890123456', '081234567890'),
('PLG002', 'dede', 'cileunyi', '2345678901234567', '081234567890'),
('PLG003', 'eka', 'majalengka', '3456789012345678', '081234567890'),
('PLG004', 'sd', 'kopo2', '2345678901234567', '087766888999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `kode_pengguna` varchar(6) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `nama_pengguna`, `username`, `password`) VALUES
('pgn001', 'admin', 'admin', 'admin12321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `kode_sewa` varchar(6) NOT NULL,
  `kode_kebaya` varchar(6) NOT NULL,
  `kode_pelanggan` varchar(6) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kode_pengguna` varchar(6) NOT NULL,
  `status` enum('dipinjam','selesai') NOT NULL,
  `total_bayar` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`kode_sewa`, `kode_kebaya`, `kode_pelanggan`, `tanggal_sewa`, `tanggal_kembali`, `kode_pengguna`, `status`, `total_bayar`) VALUES
('SWK001', 'KBY001', 'PLG001', '2017-11-16', '2017-11-23', 'pgn001', 'selesai', '546625'),
('SWK002', 'KBY003', 'PLG002', '2017-11-08', '2017-11-16', 'pgn001', 'selesai', '150000'),
('SWK003', 'KBY002', 'PLG003', '2017-11-08', '2017-11-18', 'pgn001', 'selesai', '150000'),
('SWK004', 'KBY003', 'PLG002', '2017-11-09', '2017-11-15', 'pgn001', 'selesai', '150000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kebaya`
--
ALTER TABLE `kebaya`
  ADD PRIMARY KEY (`kode_kebaya`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode_pengguna`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`kode_sewa`),
  ADD KEY `kode_kebaya` (`kode_kebaya`),
  ADD KEY `kode_pengguna` (`kode_pengguna`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `kode_kebaya` FOREIGN KEY (`kode_kebaya`) REFERENCES `kebaya` (`kode_kebaya`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kode_pelanggan` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kode_pengguna` FOREIGN KEY (`kode_pengguna`) REFERENCES `pengguna` (`kode_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
