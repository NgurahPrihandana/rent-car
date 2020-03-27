-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2020 pada 05.23
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectsewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `nama_pekerja` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `nama_pekerja`, `username`, `password`, `level`) VALUES
(9, 'wahyu', 'wahyu', '$2y$10$kU3GAsl3L1mjqQLya75o0eNL/wZiPU.0fl41Qia87GrdhHDy3SsZO', 2),
(11, 'admin', 'admin', '$2y$10$.EB6zEdzRnlBulHYC5NI/uv8Yp/eSh0PIC2FltDHP1XNtfyCv3aIy', 1),
(21, 'Prihandana', 'Prihandana', '$2y$10$dKkt/dl6ftP/2ze4llIFJ.lvH8vTcuAiTICS6RJbrg0kLpBZoezoa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_mobil`
--

CREATE TABLE `jenis_mobil` (
  `id_jenis_mobil` int(11) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`id_jenis_mobil`, `jenis_mobil`) VALUES
(2, 'Convertible'),
(3, 'Coupe'),
(4, 'Hatchback'),
(5, 'Minivan'),
(6, 'Sedan'),
(7, 'Sport Car'),
(8, 'SUV'),
(9, 'Station Wagon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_ktp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `nomor_ktp`, `alamat`, `tanggal_lahir`) VALUES
(28, 'Ni Made Nulia Pratiwi', '12345678353133', 'Dimana Markas BJG CREW', '2020-01-09'),
(50, 'Shaun The Sheep Movie', '1234567891234567', 'Betul banget anda', '2020-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `biaya_peminjaman` double NOT NULL,
  `id_auth` int(11) NOT NULL COMMENT 'nama_pekerja',
  `status` tinyint(4) NOT NULL COMMENT '0 = masih disewa, 1 = sudah kembali'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_mobil`, `id_member`, `tanggal_peminjaman`, `waktu_pinjam`, `biaya_peminjaman`, `id_auth`, `status`) VALUES
(69, 76, 28, '2020-03-19', '2020-03-20', 10000, 11, 1),
(70, 77, 28, '2020-03-10', '2020-03-09', 15000, 11, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = samsat, 2 = service',
  `nominal` double NOT NULL,
  `tanggal_pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_mobil`, `type`, `nominal`, `tanggal_pengeluaran`) VALUES
(130, 76, 2, 1000000, '2020-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_pengembalian`) VALUES
(43, 69, '2020-03-06 04:40:07'),
(44, 70, '2020-03-06 05:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_done_pengeluaran`
--

CREATE TABLE `tb_done_pengeluaran` (
  `id_done_pengeluaran` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = samsat, 2 = service',
  `nominal` double NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `selesai_pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_done_pengeluaran`
--

INSERT INTO `tb_done_pengeluaran` (`id_done_pengeluaran`, `id_mobil`, `type`, `nominal`, `tanggal_pengeluaran`, `selesai_pengeluaran`) VALUES
(14, 73, 2, 1000000, '2020-03-05', '2020-03-04'),
(20, 76, 2, 50000, '2020-03-04', '2020-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_jenis_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1= ada 0=disewakan 2=sedang diservice'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `id_jenis_mobil`, `nama_mobil`, `plat`, `status`) VALUES
(72, 3, 'Fortunner', 'DK 8833 AS', 1),
(76, 3, 'Xenia', 'DK 8833 ASS', 2),
(77, 5, 'Jazz', 'DK 6823 AL', 1),
(78, 5, 'Jazz', 'DK 9293', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  ADD PRIMARY KEY (`id_jenis_mobil`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_auth` (`id_auth`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD UNIQUE KEY `uk_pengeluaran` (`id_mobil`,`type`) USING BTREE,
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tb_done_pengeluaran`
--
ALTER TABLE `tb_done_pengeluaran`
  ADD PRIMARY KEY (`id_done_pengeluaran`);

--
-- Indeks untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  MODIFY `id_jenis_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_done_pengeluaran`
--
ALTER TABLE `tb_done_pengeluaran`
  MODIFY `id_done_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
