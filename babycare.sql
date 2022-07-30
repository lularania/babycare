-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 01:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `tanggal_login`) VALUES
(1, 'lularania', 'lubelliara20', 'Lula Rania', '2020-05-23'),
(6, 'pensjoss', 'pens', 'PENS JOSS', '2020-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `id_penyedia_jasa` int(100) NOT NULL,
  `id_lokasi` int(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `asuransi` int(100) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_pembelian` int(100) NOT NULL,
  `status_booking` varchar(100) NOT NULL DEFAULT 'pending',
  `tempat_konsultasi` varchar(100) NOT NULL,
  `penyedia_jasa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_pelanggan`, `id_penyedia_jasa`, `id_lokasi`, `tanggal_booking`, `lokasi`, `asuransi`, `alamat_lengkap`, `jumlah`, `total_pembelian`, `status_booking`, `tempat_konsultasi`, `penyedia_jasa`) VALUES
(1, 2, 2, 0, '2020-05-06', 'Sidoarjo', 10000, '', 0, 410000, 'sudah kirim pembayaran', '', ''),
(2, 2, 2, 0, '2020-05-06', 'Sidoarjo', 10000, '', 0, 10000, 'pending', '', ''),
(3, 2, 1, 0, '2020-05-06', 'Surabaya', 10000, 'pare', 0, 410000, 'proses booking', 'Rumah Sakit Mitra Keluarga ', ''),
(5, 6, 1, 0, '2020-05-07', 'Surabaya', 10000, 'bangil', 0, 410000, 'pending', '', ''),
(6, 7, 1, 0, '2020-05-08', 'Surabaya', 10000, 'gebang', 0, 410000, 'sudah kirim pembayaran', '', ''),
(7, 8, 5, 0, '2020-05-17', 'Surabaya', 10000, 'Surabaya Timur', 0, 2510000, 'pending', '', ''),
(8, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'sby', 0, 2510000, 'pending', '', ''),
(9, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'Surabaya', 0, 2510000, 'pending', '', ''),
(10, 8, 0, 1, '2020-05-17', 'Surabaya', 10000, 'Surabaya', 0, 2510000, 'pending', '', ''),
(11, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'Surabaya\r\n', 0, 2510000, 'pending', '', ''),
(12, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'sby', 0, 160000, 'pending', '', ''),
(13, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'sby', 0, 160000, 'pending', '', ''),
(14, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'sby', 0, 410000, 'pending', '', ''),
(15, 8, 1, 0, '2020-05-17', 'Surabaya', 10000, 'surabaya', 0, 410000, 'pending', '', ''),
(16, 2, 5, 0, '2020-05-18', 'Sidoarjo', 10000, 'sda', 0, 2510000, 'pending', '', ''),
(17, 2, 1, 0, '2020-05-18', 'Surabaya', 10000, 'SUrabaya', 0, 160000, 'pending', '', ''),
(18, 2, 5, 0, '2020-05-18', 'Surabaya', 10000, 'sby', 0, 2510000, 'pending', '', ''),
(19, 2, 1, 0, '2020-05-18', 'Surabaya', 10000, 'sby\r\n', 0, 2510000, 'pending', '', ''),
(20, 2, 1, 0, '2020-05-18', 'Surabaya', 10000, 'sby\r\n', 0, 160000, 'pending', '', ''),
(21, 2, 1, 0, '2020-05-18', 'Surabaya', 10000, 'sby', 0, 2910000, 'sudah kirim pembayaran', '', ''),
(22, 2, 1, 0, '2020-05-18', 'Surabaya', 10000, 'sby', 0, 2510000, 'pending', '', ''),
(23, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'sby', 0, 110000, 'pending', '', ''),
(24, 2, 0, 0, '2020-05-19', '', 0, '', 0, 200000, 'pending', '', ''),
(25, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'sby', 0, 160000, 'pending', '', ''),
(26, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'sby', 0, 2510000, 'pending', '', ''),
(27, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'bege', 0, 210000, 'pending', '', ''),
(28, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'b', 0, 2510000, 'pending', '', ''),
(29, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'bella', 0, 2510000, 'proses booking', 'TAMAN KANAK KANAK TADIKA MESRA', 'id : 5'),
(30, 2, 1, 0, '2020-05-19', 'Surabaya', 10000, 'sby', 0, 160000, 'proses booking', '', 'id : 6');

-- --------------------------------------------------------

--
-- Table structure for table `booking_success`
--

CREATE TABLE `booking_success` (
  `id_booking_success` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_jenis_jasa_produk` int(11) NOT NULL,
  `jumlah_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `id_penyedia_jasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_success`
--

INSERT INTO `booking_success` (`id_booking_success`, `id_booking`, `id_jenis_jasa_produk`, `jumlah_booking`, `nama`, `harga`, `subharga`, `id_penyedia_jasa`) VALUES
(1, 1, 1, 0, '', 0, 0, 0),
(2, 2, 2, 0, '', 0, 0, 0),
(3, 0, 0, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(4, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(5, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(6, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(7, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(8, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(9, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(10, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(11, 1, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(12, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(13, 0, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(14, 3, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(15, 4, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(16, 5, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 0),
(17, 6, 1, 1, 'Paket Kontrol Kandungan Seminggu', 400000, 400000, 5),
(18, 26, 15, 2500000, '1', 0, 2500000, 0),
(19, 28, 15, 2500000, '1', 0, 2500000, 0),
(20, 29, 15, 0, 'Kids School 4-6 Tahun Surabaya Timur', 2500000, 2500000, 0),
(21, 30, 16, 0, 'Parenting Online via Zoom ', 150000, 150000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jasa_produk`
--

CREATE TABLE `jenis_jasa_produk` (
  `id_jenis_jasa_produk` int(11) NOT NULL,
  `id_penyedia_jasa` int(11) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `nama_jenis_jasa_produk` varchar(50) NOT NULL,
  `foto_jenis_jasa_produk` varchar(50) NOT NULL,
  `deskripsi_jenis_jasa_produk` text NOT NULL,
  `harga_jenis_jasa_produk` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_jasa_produk`
--

INSERT INTO `jenis_jasa_produk` (`id_jenis_jasa_produk`, `id_penyedia_jasa`, `id_kategori`, `nama_jenis_jasa_produk`, `foto_jenis_jasa_produk`, `deskripsi_jenis_jasa_produk`, `harga_jenis_jasa_produk`, `jumlah`) VALUES
(1, 1, 1, 'Paket Kontrol Kandungan Seminggu', 'kandungan1.jpg', '      Bisa Online dan Offline    ', '400000', 2),
(15, 5, 4, 'Kids School 4-6 Tahun Surabaya Timur', 'kids_school.jpg', 'Sekolah berbasis Taman Kanak dengan pembayaran biaya SPP per 6 bulan senilai 2.500.000. Fasilitas Taman Bermain, Ruang Kelas berbasis Internasional, AC, LCD, pengajar bersertifikat, CCTV, satpam. ', '2500000', 0),
(16, 6, 3, 'Parenting Online via Zoom ', 'parenting1.jpg', '                  Ngobrol Parenting bersama Anak via Online intensif melalui media Zoom selama seminggu. Dengan psikolog profesional, dan kompeten. Nb : Sehari bisa berkomunikasi dengan durasi 2 jam.            ', '150000', 0),
(17, 5, 4, 'Kelas Mewarnai dengan Dampingan Ibunda via Google ', 'mewarnai.jpg', 'Dengan bekerjasama dengan Taman Kanak Kanak Tadika Mesra kini Ibu bisa menemani si kecil agar aktif melakukan hobi yang ia sukai. Take action dan dukung oerkembangan bakat si kecil.', '100000', 0),
(18, 7, 3, 'Play Date', 'playdate.jpg', 'Dengan bantuan komunitas baby sitter indonesia, kini kita bisa bertemu bersama dengan ibu dan anak lainnya . Untuk mengenalkan si kecil pentingnya bersosialisasi dan juga belajar bersama', '200000', 0),
(19, 8, 2, 'Pijat Bayi ', 'pijat bayi.jpg', 'Kini ibu bisa menggunakan jasa Bidan Anak Indonesia untuk melakukan pemijatan bayi dan anak dengan memperhatikan medis dan professional', '300000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pregnancy'),
(2, 'Baby\'s Health'),
(3, 'Parenting'),
(4, 'Kids School'),
(7, 'Baju Anak Laki Laki'),
(11, 'Baju Anak Perempuan'),
(12, 'Perlengkapan Bayi');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `asuransi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`, `asuransi`) VALUES
(1, 'Surabaya', 10000),
(2, 'Sidoarjo', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 15000),
(2, 'Bandung', 15000),
(3, 'Surabaya', 10000),
(4, 'Sidoarjo', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `username`) VALUES
(1, 'putridarmawan@gmail.com', 'Putridarmawan1', 'Nurul Qurinin P D', '0895675657453', '', 'putridarmawan'),
(2, 'lularania@gmail.com', 'lubelliara20', 'Lula Rania', '0895366053139', '', 'lularania'),
(3, 'nabilahm@gmail.com', 'nabila', 'Nabilah', '0855366053139', '', 'nabilahm'),
(6, 'fay1503@gmail.com', '123', 'fara', '081235456', '', 'fay1503'),
(7, 'char@gmail.com', '123', 'char', '08999999999999', '', 'char'),
(8, 'regitacfp@gmail.com', '123', 'regita', '08999999999999', '', 'regitacfp');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `harga_booking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `id_booking`, `nama`, `bank`, `total`, `tanggal`, `bukti`, `harga_booking`) VALUES
(2, 18, 0, 'fara', 'bca', 40000, '2020-05-07', 'namafiks', 0),
(3, 0, 6, 'Charissa', 'Mandiri', 0, '2020-05-08', 'namafiks', 0),
(4, 0, 6, 'Charissa', 'Mandiri', 0, '2020-05-08', 'namafiks', 0),
(5, 0, 6, 'Charissa', 'Mandiri', 0, '2020-05-08', 'namafiks', 0),
(6, 20, 0, 'Regita CFP', 'Mandiri', 45000, '2020-05-12', '202005121518376-7.PNG', 0),
(7, 0, 1, 'Lula Rania Salsabilla', 'Mandiri', 0, '2020-05-13', '202005130816516-1.PNG', 410000),
(8, 12, 0, 'Lula Rania Salsabilla', 'Mandiri', 1, '2020-05-13', '202005130818266-1.PNG', 0),
(9, 21, 0, 'Lula Rania Salsabilla', 'Mandiri', 65000, '2020-05-13', '202005131531436-1.PNG', 0),
(10, 0, 3, 'Lula Rania Salsabilla', 'Mandiri', 0, '2020-05-13', '20200513161348df -k percob 3.PNG', 410000),
(11, 0, 21, 'Lula Rania Salsabilla', 'Mandiri', 0, '2020-05-18', '20200518185734Menjelaskan Upaya Pelestarian Sumber Daya Alam Tertentu.jpg', 2910000),
(12, 0, 29, 'Lula Rania Salsabilla', 'Mandiri', 0, '2020-05-19', '20200519053917reboi.jpg', 2510000),
(13, 0, 30, 'Lula Rania Salsabilla', 'Mandiri', 0, '2020-05-19', '20200519055439polusi-udara-jakarta-doc-republika.jpg', 160000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(12, 2, 3, '2020-05-05', 60000, 'Surabaya', 10000, 'jl. tegal mulyorejo baru 33 mulyosari', 'sudah kirim pembayaran', ''),
(16, 3, 1, '2020-05-06', 105000, 'Jakarta', 15000, 'bangil', 'pending', ''),
(18, 6, 3, '2020-05-07', 40000, 'Surabaya', 10000, 'bangil', 'sudah kirim pembayaran', ''),
(19, 7, 1, '2020-05-08', 75000, 'Jakarta', 15000, 'gebang', 'pending', ''),
(20, 8, 1, '2020-05-12', 45000, 'Jakarta', 15000, 'bangil', 'barang dikirim', 'abc123'),
(21, 2, 3, '2020-05-13', 65000, 'Surabaya', 10000, 'mulyos', 'barang dikirim', 'abc124'),
(22, 8, 3, '2020-05-17', 260000, 'Surabaya', 10000, 'Perumahan Kancil Mas A9 Bangil', 'pending', ''),
(23, 2, 2, '2020-05-19', 532000, 'Bandung', 15000, 'Mulawarman', 'pending', ''),
(24, 0, 0, '0000-00-00', 0, '', 0, '', 'pending', ''),
(26, 2, 1, '2020-05-22', 140000, 'Jakarta', 15000, 'jakarta selatan', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 0, 1, 4, '', 0, 0),
(2, 8, 1, 4, '', 0, 0),
(3, 9, 1, 1, 'Body Butter\r\n', 40000, 40000),
(4, 10, 2, 1, 'Test Pack', 25000, 25000),
(5, 10, 1, 1, 'Body Butter\r\n', 40000, 40000),
(6, 11, 1, 1, 'Body Butter\r\n', 30000, 30000),
(7, 11, 2, 1, 'Test Pack', 25000, 25000),
(8, 12, 1, 1, 'Body Butter\r\n', 30000, 30000),
(9, 12, 2, 1, 'Test Pack', 25000, 25000),
(10, 13, 1, 2, 'Body Butter\r\n', 30000, 60000),
(11, 14, 1, 2, 'Body Butter\r\n', 30000, 60000),
(12, 15, 1, 2, 'Body Butter\r\n', 30000, 60000),
(13, 16, 1, 3, 'Body Butter\r\n', 30000, 90000),
(14, 17, 2, 1, 'Test Pack', 25000, 25000),
(15, 18, 1, 1, 'Body Butter\r\n', 30000, 30000),
(16, 19, 1, 2, 'Body Butter\r\n', 30000, 60000),
(17, 20, 1, 1, 'Body Butter\r\n', 30000, 30000),
(18, 21, 2, 1, 'Test Pack', 25000, 25000),
(19, 21, 1, 1, 'Body Butter\r\n', 30000, 30000),
(20, 22, 6, 1, 'Minyak Ikan untuk Anak', 250000, 250000),
(21, 23, 5, 1, 'Buku Stimulasi Anak', 67000, 67000),
(22, 23, 6, 1, 'Minyak Ikan untuk Anak', 250000, 250000),
(23, 23, 4, 1, 'Gendongan Bayi', 200000, 200000),
(24, 26, 7, 1, 'Mahika Kids Kellen', 125000, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `penyedia_jasa`
--

CREATE TABLE `penyedia_jasa` (
  `id_penyedia_jasa` int(11) NOT NULL,
  `id_jenis_jasa_produk` int(11) NOT NULL,
  `email_penyedia_jasa` varchar(50) NOT NULL,
  `password_penyedia_jasa` varchar(50) NOT NULL,
  `nama_penyedia_jasa` varchar(50) NOT NULL,
  `telepon_penyedia_jasa` varchar(25) NOT NULL,
  `Profile_penyedia_jasa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyedia_jasa`
--

INSERT INTO `penyedia_jasa` (`id_penyedia_jasa`, `id_jenis_jasa_produk`, `email_penyedia_jasa`, `password_penyedia_jasa`, `nama_penyedia_jasa`, `telepon_penyedia_jasa`, `Profile_penyedia_jasa`) VALUES
(1, 1, 'drerika@gmail.com', 'drerika12', 'dr. Erika', '087654321167', 'Dokter Kandungan'),
(2, 2, 'drwayan@gmail.com', 'wayan12', 'dr. wayan', '089765432123', 'Dokter Anak'),
(5, 15, 'tadikamesra@gmail.com', 'tadika123', 'tadika mesra', '087654321', 'Taman Kanak Kanak'),
(6, 16, 'psikologsby@gmail.com', 'psikologsby', 'Himpunan Psikologi Anak Surabaya', '0879645321', 'Psikologi Anak'),
(7, 0, 'babysitter@gmail.com', '', 'Babysitter Indonesia', '087653241', 'Pengasuh Bayi'),
(8, 19, 'perkumbidanindo@gmail.com', '', 'Himpunan Bidan Anak Indonesia', '0876542145', 'Bidan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` varchar(30) NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `foto_produk`, `deskripsi_produk`, `harga_produk`, `stok_produk`) VALUES
(1, 1, 'Body Butter\r\n', 'bbutter.jpg', 'Untuk mengatasi strechmark pada trimester kehamilan pertama.', '30000', 6),
(2, 1, 'Test Pack', 'testpack.jpg', '      Menggunakan testpack yang berkualitas dan akurat    ', '35000', 8),
(4, 12, 'Gendongan Bayi', 'gendongbayi.jpg', 'Gendongan nyaman, untuk orangtua si kecil cocok digunakan untuk travelling.', '200000', 9),
(6, 2, 'Minyak Ikan untuk Anak', 'minyak_ikan_anak.jpg', 'Minyak Ikan ini teruji secara klinis, untuk membantu tumbuh kembang buah hati anda', '250000', 8),
(8, 11, 'Baju Anak Size 6-12 Month', 'baju1.jpg', 'Baju Polkadot dengan warna biru dengan bahan katun yang lembut dan berkualitas tinggi.', '120000', 10),
(9, 11, 'Baju Anak Size 6-12 Month', 'baju2.jpg', 'Baju anak berenda dengan warna biru langit dengan bahan katun yang lembut dan berkualitas tinggi.', '100000', 10),
(10, 11, 'Baju Anak Size 6-12 Month', 'baju3.jpg', '      Baju anak lucu dengan warna abu abu putih dengan bahan katun yang lembut dan berkualitas tinggi.    ', '89000', 10),
(11, 11, 'Baju Anak Size 1-2 Years', 'baju4.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '200000', 10),
(12, 11, 'Baju Anak Size 3-4 Years', 'baju5.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '200000', 10),
(13, 11, 'Baju Anak Size 0-6 Month', 'baju10.jpg', '      Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.    ', '98000', 10),
(14, 11, 'Baju Anak Size 1-2 Years', 'baju8.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '128000', 20),
(15, 11, 'Baju Anak Size 0-6 Month', 'baju7.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '130000', 10),
(16, 11, 'Baju Anak Size 6-12 Month', 'baju12.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '180000', 10),
(17, 11, 'Baju Anak Size 1-2 Years', 'baju13.png', '      Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.    ', '150000', 10),
(18, 11, 'Baju Anak Size 0-6 Month', 'baju14.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '200000', 10),
(19, 11, 'Baju Anak Size 0-6 Month', 'baju15.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '120000', 10),
(20, 11, 'Baju Anak Size 0-6 Month', 'baju16.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '180000', 10),
(21, 11, 'Baju Anak Size 0-6 Month', 'baju20.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '150000', 10),
(22, 11, 'Baju Anak Size 0-6 Month', 'baju17.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '170000', 10),
(23, 11, 'Baju Anak Size 0-6 Month', 'baju18.jpg', 'Baju anak lucu dengan bahan katun yang lembut dan berkualitas tinggi.', '170000', 10),
(24, 7, 'Baju Anak Size 6-12 Month', 'b1.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '100000', 10),
(25, 7, 'Baju Anak Size 6-12 Month', 'b2.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '150000', 10),
(26, 7, 'Baju Anak Size 1-2 Years', 'b3.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '150000', 10),
(27, 7, 'Baju Anak Size 0-6 Month', 'b4.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '140000', 20),
(28, 7, 'Baju Anak Size 0-6 Month', 'b5.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '145000', 10),
(29, 7, 'Baju Anak Size 0-6 Month', 'b6.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '145000', 10),
(30, 7, 'Baju Anak Size 1-2 Years', 'b7.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '180000', 10),
(31, 7, 'Baju Anak Size 0-6 Month', 'b8.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '134500', 10),
(32, 7, 'Baju Anak Size 0-6 Month', 'b9.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '150000', 10),
(33, 7, 'Baju Anak Size 1-2 Years', 'b10.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '198000', 10),
(34, 7, 'Baju Anak Size 1-2 Years', 'b11.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '145000', 20),
(35, 7, 'Baju Anak Size 1-2 Years', 'b12.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '135000', 10),
(36, 7, 'Baju Anak Size 1-2 Years', 'b13.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '150000', 10),
(37, 7, 'Baju Anak Size 1-2 Years', 'b14.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '180000', 10),
(38, 7, 'Baju Anak Size 0-6 Month', 'b15.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '98000', 10),
(39, 7, 'Baju Anak Size 1-2 Years', 'b16.jpg', 'Baju anak lucu dengan bahan yang lembut dan berkualitas tinggi.', '260000', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `booking_success`
--
ALTER TABLE `booking_success`
  ADD PRIMARY KEY (`id_booking_success`);

--
-- Indexes for table `jenis_jasa_produk`
--
ALTER TABLE `jenis_jasa_produk`
  ADD PRIMARY KEY (`id_jenis_jasa_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  ADD PRIMARY KEY (`id_penyedia_jasa`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `booking_success`
--
ALTER TABLE `booking_success`
  MODIFY `id_booking_success` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jenis_jasa_produk`
--
ALTER TABLE `jenis_jasa_produk`
  MODIFY `id_jenis_jasa_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  MODIFY `id_penyedia_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
