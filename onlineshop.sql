-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 08:36 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `username`, `email`, `password`, `aktif`, `last_login`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$05$GnYBjVbNZvpUhnLoWcDWF.bjiEvvm0PehcZiP1lVYqUQ4/u/.Tu..', 0, '2019-05-15 18:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carousel_id` int(4) NOT NULL,
  `carousel_judul` varchar(255) NOT NULL,
  `carousel_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carousel_id`, `carousel_judul`, `carousel_gambar`) VALUES
(1, 'Blabla', '1_1558417299_20190521124139_n.png'),
(2, '-', '1_1558417312_20190521124152_n.jpg'),
(3, 'Belanja Online Nasional', '1_1560304696_20190612085816_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten_kota` varchar(40) NOT NULL,
  `provinsi` varchar(40) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
  `no_hp` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '0',
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nama`, `username`, `email`, `password`, `alamat`, `kecamatan`, `kabupaten_kota`, `provinsi`, `kode_pos`, `gender`, `no_hp`, `gambar`, `aktif`, `tgl_daftar`, `hash`) VALUES
(3, 'Customer', 'customer', 'customer@gmail.com', '$2y$05$fu5goToE/AJkGlT404U8FOJTQyIlsi.HA4eWz5u8IlS2nHmSb6nOq', 'Medan', 'Medan', 'asd', 'asda', '32834', 1, '08566298835', '', 1, '2019-06-12 18:37:20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(4) NOT NULL,
  `kategori_nama` varchar(40) NOT NULL,
  `kategori_slug` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_slug`) VALUES
(29, 'Pakaian Pria', 'pakaian-pria-621984'),
(30, 'Celana Pria', 'celana-pria-816059');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(4) NOT NULL,
  `keranjang_customer_id` int(4) NOT NULL,
  `keranjang_produk_id` int(4) NOT NULL,
  `keranjang_kuantitas` int(4) NOT NULL,
  `keranjang_harga` int(10) NOT NULL,
  `keranjang_tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `keranjang_kode` varchar(6) NOT NULL,
  `keranjang_status` int(1) NOT NULL DEFAULT '0',
  `keranjang_selesai` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`keranjang_id`, `keranjang_customer_id`, `keranjang_produk_id`, `keranjang_kuantitas`, `keranjang_harga`, `keranjang_tanggal`, `keranjang_kode`, `keranjang_status`, `keranjang_selesai`) VALUES
(85, 3, 21, 1, 60000, '2019-06-12 20:01:28', 'jhCKIQ', 1, 0),
(86, 3, 22, 1, 1231, '2019-06-12 20:01:32', 'jhCKIQ', 1, 0),
(87, 3, 21, 1, 60000, '2019-06-12 20:05:04', 'kI59uz', 1, 0),
(88, 3, 22, 1, 1231, '2019-06-12 20:05:45', 'G6YyUD', 1, 0),
(89, 3, 22, 1, 1231, '2019-06-12 20:08:41', 'RU0Awl', 1, 0),
(90, 3, 22, 1, 1231, '2019-06-12 22:35:06', '31ZXzQ', 1, 0),
(91, 3, 21, 1, 60000, '2019-06-12 22:40:20', 'YigeAE', 1, 0),
(92, 3, 21, 1, 60000, '2019-06-13 06:26:21', '7EKqNg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(4) NOT NULL,
  `konfirmasi_transaksi_kode` varchar(10) NOT NULL,
  `konfirmasi_tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `konfirmasi_gambar` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `rekening_asal` varchar(20) NOT NULL,
  `rekening_tujuan` varchar(20) NOT NULL,
  `jumlah_transfer` int(15) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `konfirmasi_status` int(1) NOT NULL DEFAULT '0',
  `admin_id` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`konfirmasi_id`, `konfirmasi_transaksi_kode`, `konfirmasi_tanggal`, `konfirmasi_gambar`, `bank`, `atas_nama`, `rekening_asal`, `rekening_tujuan`, `jumlah_transfer`, `catatan`, `konfirmasi_status`, `admin_id`) VALUES
(14, 'AWOTR4UL-3', '2019-06-12 20:14:13', '3_20190613031413_n.jpg', 'Mandiri', 'Customer', '1239183', 'Mandiri - Rima Arhya', 61231, '', 1, 1),
(15, 'PYE7A3PW-3', '2019-06-12 20:14:37', '3_20190613031437_n.jpg', 'BRI', 'Customer', '42342', 'Mandiri - Rima Arhya', 1231, '', 1, 1),
(16, 'WSBJKZIR-3', '2019-06-12 20:14:51', '0.jpg', 'BNI', 'Customer', '3424234', 'Mandiri - Rima Arhya', 1231, '', 1, 1),
(17, 'CHXJCDGK-3', '2019-06-12 21:47:56', '0.jpg', 'asdasd', 'Customer', '234342342', 'Mandiri - Rima Arhya', 60000, '', 1, 1),
(18, 'CHXJCDGK-3', '2019-06-12 21:48:46', '0.jpg', 'BNI', 'Customer', '34242', 'Mandiri - Rima Arhya', 60000, '', 1, 1),
(19, 'DWJGBWYQ-3', '2019-06-12 22:35:42', '0.jpg', 'BI', 'Customer', '8723423', 'Mandiri - Rima Arhya', 1231, '', 1, 1),
(20, 'DV9SVTJF-3', '2019-06-12 23:22:01', '0.jpg', 'Mandiri', 'Customer', '39823472364', 'Mandiri - Rima Arhya', 60000, '', 1, 1),
(21, 'QO3MECSA-3', '2019-06-13 06:26:49', '0.jpg', 'Mandiri', 'Customer', '2346237424', 'Mandiri - Rima Arhya', 60000, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `kontak_id` int(4) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `dilihat` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `pemberitahuan_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dilihat` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(4) NOT NULL,
  `pengiriman_transaksi_id` int(4) NOT NULL,
  `pengiriman_transaksi_kode` varchar(15) NOT NULL,
  `pengiriman_nama` varchar(40) NOT NULL,
  `pengiriman_kode` varchar(30) NOT NULL,
  `pengiriman_tanggal` date NOT NULL,
  `pengiriman_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `pengiriman_transaksi_id`, `pengiriman_transaksi_kode`, `pengiriman_nama`, `pengiriman_kode`, `pengiriman_tanggal`, `pengiriman_status`) VALUES
(2, 38, 'DV9SVTJF-3', 'JNE', '32242342', '2019-06-13', 0),
(3, 39, 'QO3MECSA-3', 'JNE', '242423424', '2019-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(4) NOT NULL,
  `produk_nama` varchar(150) NOT NULL,
  `produk_slug` varchar(150) NOT NULL,
  `produk_harga` int(10) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_kategori_id` int(4) NOT NULL,
  `produk_gambar` varchar(100) NOT NULL,
  `produk_stok` int(4) NOT NULL,
  `produk_diskon` int(3) NOT NULL,
  `produk_harga_diskon` int(11) NOT NULL,
  `produk_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `produk_terjual` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_slug`, `produk_harga`, `produk_deskripsi`, `produk_kategori_id`, `produk_gambar`, `produk_stok`, `produk_diskon`, `produk_harga_diskon`, `produk_tanggal`, `produk_terjual`) VALUES
(21, 'Celana Jeans Hitam Kepler', 'celana-hitam-108435', 60000, '-', 30, '1_1558417399_20190521124319_n.jpg', 12, 0, 60000, '2019-06-12 02:01:11', 0),
(22, 'Keranjang Polkadot Multifungsi', 'asda-064859', 1231, 'sad', 30, '1_1560280077_20190612020757_n.jpg', 12, 0, 1231, '2019-06-12 02:01:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(4) NOT NULL,
  `produk_id` int(4) NOT NULL,
  `customer_id` int(4) NOT NULL,
  `rating` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `rekening_id` int(4) NOT NULL,
  `rekening_nama` varchar(30) NOT NULL,
  `rekening_bank` varchar(25) NOT NULL,
  `rekening_nomor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`rekening_id`, `rekening_nama`, `rekening_bank`, `rekening_nomor`) VALUES
(1, 'Rima Arhyan R1', 'Mandiri', '12731273136'),
(2, 'Rima Arhyan R2', 'BNI', '273424762433');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `retur_id` int(4) NOT NULL,
  `retur_produk_id` int(4) NOT NULL,
  `retur_customer_id` int(4) NOT NULL,
  `retur_kode_transaksi` varchar(6) NOT NULL,
  `retur_alasan` text NOT NULL,
  `retur_gambar` varchar(100) NOT NULL,
  `retur_retur_status` int(1) NOT NULL DEFAULT '0',
  `retur_ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `testimoni_id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(4) NOT NULL,
  `transaksi_keranjang_customer_id` int(1) NOT NULL,
  `transaksi_keranjang_kode` varchar(6) NOT NULL,
  `transaksi_total` int(10) NOT NULL,
  `transaksi_kode` varchar(15) NOT NULL,
  `transaksi_tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `transaksi_status` int(1) NOT NULL DEFAULT '0',
  `transaksi_selesai` int(1) NOT NULL DEFAULT '0',
  `transaksi_nama` varchar(30) NOT NULL,
  `transaksi_email` varchar(30) NOT NULL,
  `transaksi_alamat` varchar(40) NOT NULL,
  `transaksi_kecamatan` varchar(30) NOT NULL,
  `transaksi_kabupaten_kota` varchar(30) NOT NULL,
  `transaksi_provinsi` varchar(30) NOT NULL,
  `transaksi_kode_pos` varchar(5) NOT NULL,
  `transaksi_no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_keranjang_customer_id`, `transaksi_keranjang_kode`, `transaksi_total`, `transaksi_kode`, `transaksi_tanggal`, `transaksi_status`, `transaksi_selesai`, `transaksi_nama`, `transaksi_email`, `transaksi_alamat`, `transaksi_kecamatan`, `transaksi_kabupaten_kota`, `transaksi_provinsi`, `transaksi_kode_pos`, `transaksi_no_hp`) VALUES
(33, 3, 'jhCKIQ', 61231, 'AWOTR4UL-3', '2019-06-12 20:01:34', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan', 'asd', 'asda', '32834', '08566298835'),
(34, 3, 'kI59uz', 60000, 'CHXJCDGK-3', '2019-06-12 20:05:06', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan', 'asd', 'asda', '32834', '08566298835'),
(35, 3, 'G6YyUD', 1231, 'PYE7A3PW-3', '2019-06-12 20:05:47', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan', 'asd', 'asda', '32834', '08566298835'),
(36, 3, 'RU0Awl', 1231, 'WSBJKZIR-3', '2019-06-12 20:08:43', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan', 'asd', 'asda', '32834', '08566298835'),
(37, 3, '31ZXzQ', 1231, 'DWJGBWYQ-3', '2019-06-12 22:35:08', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan Kota', 'Kota Medan', 'SUMUT', '20212', '08566298835'),
(38, 3, 'YigeAE', 60000, 'DV9SVTJF-3', '2019-06-12 23:20:08', 1, 1, 'Customer', 'customer@gmail.com', 'Jalan Laksana No. 3C', 'Medan Kota', 'Kota Medan', 'Sumatera Utara', '21181', '08566298835'),
(39, 3, '7EKqNg', 60000, 'QO3MECSA-3', '2019-06-13 06:26:24', 1, 1, 'Customer', 'customer@gmail.com', 'Medan', 'Medan', 'asd', 'asda', '32834', '08566298835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carousel_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`pemberitahuan_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`rekening_id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carousel_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `kontak_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `pemberitahuan_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `rekening_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `retur_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `testimoni_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
