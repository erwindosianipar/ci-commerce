-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 06:03 AM
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
(1, 'Erwindo Sianipar', 'erwindoq', 'erwindoq@gmail.com', '$2y$05$e.iFYpAUB6nz3YaOdspQx.FOXDNaGU2cWFy7Ab0lTOSbfX4oPo25u', '', '', '', '', '', 0, '', '', 1, '2019-05-19 02:15:35', '1'),
(2, 'Lamhot Pardamean', 'lamhot', 'lamhot@gmail.com', '$2y$05$r9/cq3EEPhCvyq6nfJ5xZemr2/pWyXDBHPfYdXlEg7h/ETYremtmW', '', '', '', '', '', 0, '', '', 1, '2019-05-19 04:47:34', '1');

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
(29, 'Pakaian Pria', 'pakaian-pria-621984');

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
(70, 1, 20, 1, 9000, '2019-05-20 15:20:12', 'efHEn7', 1, 0),
(71, 1, 18, 1, 10000, '2019-05-20 15:20:16', 'efHEn7', 1, 0),
(72, 1, 20, 1, 9000, '2019-05-20 15:31:39', 'ecpf0K', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(4) NOT NULL,
  `konfirmasi_transaksi_kode` varchar(10) NOT NULL,
  `konfirmasi_tanggal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `konfirmasi_gambar` varchar(100) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `rekening_asal` varchar(20) NOT NULL,
  `rekening_tujuan` varchar(20) NOT NULL,
  `jumlah_transfer` int(15) NOT NULL,
  `konfirmasi_status` int(1) NOT NULL DEFAULT '0',
  `admin_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pengiriman_nama` varchar(40) NOT NULL,
  `pengiriman_kode` varchar(30) NOT NULL,
  `pengiriman_tanggal` date NOT NULL,
  `pengiriman_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'Laptop Asus ROG A3 GZ-12312 Super Fast Rendered Gaming AMD 7 Serion Rager', 'laptop-asus-rog-a3-gz-12312-super-fast-rendered-gaming-amd-7-serion-rager-408351', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 29, '1_1558240679_20190519113759_n.png', 12, 0, 10000, '2019-05-19 04:38:00', 0),
(19, 'Laptop Lenovo Thin Pad AMD Radeon Graphics Inter Core i-3 Inside', 'laptop-lenovo-thin-pad-amd-radeon-graphics-inter-core-i-3-inside-517063', 1000000, '-', 29, '1_1558240829_20190519114029_n.png', 12, 0, 1000000, '2019-05-19 04:40:30', 0),
(20, 'Produk Dari Admin Dijamin Mulus', 'produk-dari-admin-dijamin-mulus-978065', 10000, '-', 29, '1_1558292892_20190520020812_n.jpg', 12, 10, 9000, '2019-05-19 19:08:12', 0);

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
(22, 1, 'efHEn7', 19000, 'P8EJQDAP-1', '2019-05-20 15:20:20', 1, 0, 'Erwindo Sianipar', 'erwindoq@gmail.com', 'Jalan Laksana No.3C, Kota Matsum I', 'Medan Kota', 'Kota Medan', 'Sumatera Utara', '20215', '08566298835'),
(23, 1, 'ecpf0K', 9000, 'K4MRVIPH-1', '2019-05-20 15:34:10', 1, 0, 'Erwindo Sianipar', 'erwindoq@gmail.com', 'HUTA AFD III, Andarasi', 'Parbalogan', 'Simalungun', 'Sumatera Utara', '21181', '082184226413');

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
  MODIFY `carousel_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(4) NOT NULL AUTO_INCREMENT;

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
  MODIFY `pengiriman_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `transaksi_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
