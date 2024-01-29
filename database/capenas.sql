-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2024 pada 09.29
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capenas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `tahun` text NOT NULL,
  `nip` varchar(256) DEFAULT NULL,
  `jenis_tugas` text NOT NULL,
  `tujuan` text NOT NULL,
  `tgl_pergi` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `stok` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `tahun`, `nip`, `jenis_tugas`, `tujuan`, `tgl_pergi`, `tgl_pulang`, `stok`, `uraian`, `gambar`, `createDate`) VALUES
(79, '', '129', 'Dalam-Kota', 'Pangkalpinang', '2024-01-29', '2024-01-29', 1, 'Cek N ricek', 'gbr-2024-01-29-eaa7570014.png', '2024-01-29 08:37:05'),
(80, '', '123', 'Luar-Kota', 'kab-bangka', '2024-01-29', '2024-01-31', 3, 'Mantau', 'gbr-2024-01-29-ae04134ac8.jpg', '2024-01-29 11:08:02'),
(81, '', '3123', 'Luar-Kota', 'kab-bangka', '2024-01-29', '2024-01-31', 3, 'jalan jalan', 'gbr-2024-01-29-9d6e098302.jpg', '2024-01-29 11:54:24'),
(82, '', '129', 'Luar-Kota', 'kab-basel', '2024-02-01', '2024-02-04', 4, 'ningok tante', 'gbr-2024-01-29-e12454e1d8.png', '2024-01-29 11:56:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(256) CHARACTER SET latin1 NOT NULL,
  `nama_pg` text NOT NULL,
  `jab_pg` text NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama_pg`, `jab_pg`, `createDate`) VALUES
('123', 'Ageng y', 'rektor', '2024-01-26 08:46:51'),
('129', 'Lina', 'Pengelola Keuangan', '2024-01-26 10:14:59'),
('3123', 'Rezly', 'wakil rektor', '2024-01-26 08:47:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id` int(11) NOT NULL,
  `kode` varchar(256) NOT NULL,
  `jenis` varchar(16) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `untuk` varchar(100) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(16) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `createDate`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2020-12-02 19:14:02'),
(2, 'Rara Amiati, S.Kom', 'raraamiati', '2ba70b63ff5898516f37f7a90fd6354b', 'User', '2020-12-02 19:14:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
