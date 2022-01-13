-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 01:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_basdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(20) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `bahan_bakar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `plat`, `merk`, `type`, `jenis`, `warna`, `bahan_bakar`) VALUES
('MHKM1BAEJEJ041521', 'AB 2031 N', 'CHEVROLET', 'FUZ 52 S', 'Mobil Penumpang', 'Hitam Metalik', 'Solar'),
('MHKM1BAEJEJ042011', 'B 1245 KZH', 'TOYOTA', 'NEW AVANZA 1.3G ', 'Mobil Penumpang', 'Silver Metalik', 'Bensin'),
('MHMK1AGEJEJ042011', 'AB 7401 AI', 'TOYOTA', 'NEW AVANZA 1.3G ', 'Mobil Penumpang', 'Hitam Metalik', 'Bensin'),
('MHRRU1850FJ404447', 'B 1036 PQY', 'HONDA', 'HRV RU1 1.5E CVT', 'Mobil Penumpang', 'Merah', 'Bensin'),
('MHRRU1850FJ406354', 'AB 1330 N', 'HONDA', 'HRV RU1 1.5E CVT', 'Mobil Penumpang', 'Putih Mutiara', 'Bensin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jobdesk` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jobdesk`, `no_telp`) VALUES
('20000112233', 'Danuar Ahmad', 'Driver', '082134098056'),
('20000112243', 'Muh Sena ', 'Driver', '082134548056'),
('20000113322', 'Tera Bagus', 'Cleaning Servis', '0821765456732'),
('20000123222', 'Dera Aisyah', 'Seles', '082134011056'),
('20000213121', 'Andianto', 'Driver', '082187650067');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`nik`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('3321060902150109', 'Mahmud Santoso', 'Laki-Laki', 'Jl. Sriwijaya komp. Pinus baru No.14 h, RT.02/RW.01, Mentaos, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714', '087817023465'),
('3321110902070002', 'Aslijan Hardiansyah', 'Laki-Laki', 'Jl. MI, Tegalrejo, Purwantoro, Kabupaten Wonogiri, Jawa Tengah 57695', '081306827430'),
('3321116502910000', 'Kartika Anggraini', 'Perempuan', 'Jl. Ki Ageng Pemanahan 17, Kragilan, Tamanan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55191', '082837876418');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `no_sewa` varchar(20) NOT NULL,
  `id_mobil` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` int(10) NOT NULL,
  `denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`no_sewa`, `id_mobil`, `nik`, `id_pegawai`, `tgl_pinjam`, `tgl_kembali`, `harga`, `denda`) VALUES
('004', 'MHRRU1850FJ406354', '3321116502910000', '20000213121', '2021-10-14', '2021-10-19', 1500000, 750000),
('009', 'MHMK1AGEJEJ042011', '3321060902150109', '', '2021-10-19', '2021-10-29', 1400000, 750000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`no_sewa`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `peminjam` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
