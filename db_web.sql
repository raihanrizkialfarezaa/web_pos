-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2021 pada 14.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `harga_beli`, `stok`, `harga_jual`, `keuntungan`) VALUES
('085155228237006', 'POCO X3 NFC 8/128 GB', 'UNIT', 3100000, 2, 3250000, 125000),
('085730650497001', 'Samsung A32 6/128 GB', 'UNIT', 3000000, 13, 3300000, 300000),
('183183613', 'ROG Phone 5 8/128', 'LUSIN', 10000000, 0, 13000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'Rizki', 'Jalan Gedongan Bayi', '085155228237', 'araihanrizki@gmail.com'),
(3, 'Reza', 'Gedongan', '085155228237', 'araihanrizki@gmail.com'),
(5, 'Aduh', 'Gedongan', '08785069877', 'reza.raihanrizki@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `nama`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'raihan', 'admin', 'admin', '11.jpg'),
(2, 'kasir sementara', 'rifat', 'admin', 'admin', 'thumbs-up.png'),
(3, 'mama', 'mama', 'kasir', 'kasir', '5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `kode_barcode`, `jumlah`, `total`, `tgl_penjualan`, `id_pelanggan`) VALUES
(1, 'PJ-0585226159', '085730650497001', 1, 3300000, '2021-04-11', 0),
(2, 'PJ-8238961659', '085730650497001', 1, 3300000, '2021-04-11', 0),
(3, 'PJ-5915473624', '085730650497001', 1, 3300000, '2021-04-11', 0),
(4, 'PJ-5915473624', '085730650497001', 1, 3300000, '2021-04-11', 0),
(5, 'PJ-5915473624', '085730650497001', 1, 3300000, '2021-04-11', 0),
(6, 'PJ-5915473624', '085730650497001', 1, 3300000, '2021-04-11', 0),
(7, 'PJ-5647323914', '085155228237006', 1, 3250000, '2021-04-11', 0),
(8, 'PJ-5647323914', '085155228237006', 1, 3250000, '2021-04-11', 0),
(9, 'PJ-3810315884', '085155228237006', 1, 3250000, '2021-04-11', 0),
(10, 'PJ-8093451158', '085155228237006', 1, 3250000, '2021-04-11', 0),
(11, 'PJ-8093451158', '085155228237006', 1, 3250000, '2021-04-11', 0),
(12, 'PJ-6400799131', '085155228237006', 1, 3250000, '2021-04-11', 0),
(13, 'PJ-3496967251', '085155228237006', 1, 3250000, '2021-04-12', 0),
(14, 'PJ-6815904190', '085155228237006', 1, 3250000, '2021-04-12', 0),
(15, 'PJ-7811274075', '085155228237006', 1, 3250000, '2021-04-12', 0),
(16, 'PJ-0271527380', '085155228237006', 1, 3250000, '2021-04-12', 0),
(17, 'PJ-7403006652', '085155228237006', 1, 3250000, '2021-04-12', 1),
(18, 'PJ-4163208025', '085155228237006', 1, 3250000, '2021-04-12', 1),
(19, 'PJ-1693198153', '085155228237006', 1, 3250000, '2021-04-12', 1),
(20, 'PJ-5653594095', '085155228237006', 1, 3250000, '2021-04-12', 1),
(21, 'PJ-7551114654', '085155228237006', 1, 3250000, '2021-04-12', 1),
(22, 'PJ-8017623819', '085155228237006', 1, 3250000, '2021-04-12', 1),
(23, 'PJ-6271121757', '085155228237006', 1, 3250000, '2021-04-12', 1),
(24, 'PJ-4039503000', '085730650497001', 1, 3300000, '2021-04-12', 1),
(25, 'PJ-6947594459', '085155228237006', 1, 3250000, '2021-04-12', 1),
(26, 'PJ-6947594459', '085730650497001', 1, 3300000, '2021-04-12', 0),
(27, 'PJ-1085249976', '085730650497001', 1, 3300000, '2021-04-12', 1),
(28, 'PJ-2709345090', '085730650497001', 1, 3300000, '2021-04-12', 1),
(29, 'PJ-4143240444', '085730650497001', 1, 3300000, '2021-04-12', 1),
(30, 'PJ-5581315084', '085730650497001', 1, 3300000, '2021-04-12', 1),
(31, 'PJ-8099841571', '085730650497001', 1, 3300000, '2021-04-12', 1),
(32, 'PJ-2337374914', '085730650497001', 1, 3300000, '2021-04-12', 1),
(33, 'PJ-9673397634', '085730650497001', 1, 3300000, '2021-04-12', 1),
(34, 'PJ-9894860944', '085730650497001', 1, 3300000, '2021-04-12', 1),
(35, 'PJ-6580860496', '085730650497001', 1, 3300000, '2021-04-13', 1),
(36, 'PJ-6470571691', '085730650497001', 1, 3300000, '2021-04-13', 1),
(37, 'PJ-4048354043', '085730650497001', 1, 3300000, '2021-04-13', 1),
(38, 'PJ-9110150854', '085730650497001', 1, 3300000, '2021-04-13', 1),
(39, 'PJ-1325154186', '085730650497001', 1, 3300000, '2021-04-13', 1),
(40, 'PJ-0680014663', '085730650497001', 1, 3300000, '2021-04-13', 0),
(41, 'PJ-9369196107', '085730650497001', 1, 3300000, '2021-04-13', 0),
(42, 'PJ-5314030832', '085730650497001', 1, 3300000, '2021-04-13', 0),
(43, 'PJ-4097688192', '085730650497001', 1, 3300000, '2021-04-13', 1);

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang
SET stok = stok - NEW.jumlah
WHERE
kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`id`, `kode_penjualan`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`) VALUES
(1, 'PJ-7403006652', 2700000, 100000, 20, 650000, 0),
(2, 'PJ-4163208025', 2700000, 100000, 20, 650000, 0),
(3, 'PJ-1693198153', 2700000, 100000, 20, 650000, 0),
(4, 'PJ-1693198153', 0, 0, 0, 0, 0),
(5, 'PJ-5653594095', 2700000, 67500, 19, 617500, 0),
(6, 'PJ-7551114654', 2800000, 37500, 15, 487500, 0),
(7, 'PJ-8017623819', 2700000, 197500, 23, 747500, 0),
(8, 'PJ-6271121757', 2700000, 100000, 20, 650000, 0),
(9, 'PJ-6271121757', 0, 0, 0, 0, 0),
(10, 'PJ-6271121757', 0, 0, 0, 0, 0),
(11, 'PJ-4039503000', 2700000, 93000, 21, 693000, 0),
(12, 'PJ-6947594459', 2800000, 200000, 20, 650000, 0),
(13, 'PJ-1085249976', 2700000, 93000, 21, 693000, 0),
(14, 'PJ-2709345090', 2500000, 190000, 30, 990000, 0),
(15, 'PJ-4143240444', 2700000, 60000, 20, 660000, 0),
(16, 'PJ-4143240444', 0, 0, 0, 0, 0),
(17, 'PJ-4143240444', 0, 0, 0, 0, 0),
(18, 'PJ-4143240444', 0, 0, 0, 0, 0),
(19, 'PJ-5581315084', 2700000, 93000, 21, 693000, 0),
(20, 'PJ-9673397634', 0, 0, 0, 0, 0),
(21, 'PJ-6470571691', 0, 0, 0, 0, 0),
(22, 'PJ-4048354043', 2700000, 60000, 20, 660000, 0),
(23, 'PJ-9110150854', 2699999, 60000, 20, 660000, 0),
(24, 'PJ-1325154186', 2700000, 60000, 20, 660000, 2640000),
(25, 'PJ-4097688192', 2700000, 60000, 20, 660000, 2640000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kode_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
