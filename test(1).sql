-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 08:32 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota_fk` int(11) DEFAULT NULL,
  `nama_kecamatan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota_fk`, `nama_kecamatan`) VALUES
(1, 1, 'Asemrowo'),
(2, 1, 'Kenjeran'),
(3, 1, 'Rungkut'),
(4, 1, 'Wonokromo'),
(5, 2, 'Arjosari'),
(6, 2, 'Donomulyo'),
(7, 2, 'Tulungrejo'),
(8, 2, 'Kasembon'),
(9, 3, 'Banyumanik'),
(10, 3, 'Genuk'),
(11, 3, 'Tembalang'),
(12, 3, 'Tugu'),
(13, 4, 'Ngadirejo'),
(14, 4, 'Selogiri'),
(15, 4, 'Manyaran'),
(16, 4, 'Bulukerto'),
(17, 5, 'Buahbatu'),
(18, 5, 'Gedebage'),
(19, 5, 'Ujungberung'),
(20, 5, 'Sukasari'),
(21, 6, 'Plered'),
(22, 6, 'Jatiluhur'),
(23, 6, 'Wanayasa'),
(24, 6, 'Cibatu'),
(25, 21, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi_fk` int(11) DEFAULT NULL,
  `nama_kota` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi_fk`, `nama_kota`) VALUES
(1, 1, 'Surabaya'),
(2, 1, 'Malang'),
(3, 2, 'Semarang'),
(4, 2, 'Wonogiri'),
(5, 3, 'Bandung'),
(6, 3, 'Purwakarta');

-- --------------------------------------------------------

--
-- Table structure for table `mp3`
--

CREATE TABLE `mp3` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `a_number` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp3`
--

INSERT INTO `mp3` (`id`, `file`, `name`, `a_number`, `create_at`) VALUES
(1, '01', 'audio 1', '0812345', '2018-02-01 17:14:13'),
(2, '02', 'audio 2', '0888888', '2018-02-01 17:15:43'),
(3, '03', 'audio 3', '0121212', '2018-02-01 17:15:43'),
(4, '09', 'audio 9', '0812345', '2018-02-07 09:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`ID`, `LastName`, `FirstName`, `Age`) VALUES
(2, 'aaaa', 'bbbb', 30),
(323, 'asdsad', 'sadasd', 213);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Tengah'),
(3, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID`, `LastName`, `FirstName`, `Age`) VALUES
(2, 'WI', 'JOKO', 32),
(6, 'WI', 'JOKO', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_libur`
--

CREATE TABLE `tanggal_libur` (
  `id` int(11) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `tanggal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal_libur`
--

INSERT INTO `tanggal_libur` (`id`, `tahun`, `tanggal`) VALUES
(1, '2018', '13-06-2018,14-06-2018,15-06-2018,16-06-2018,17-06-2018,18-06-2018,19-06-2018'),
(2, '12213', '12-12-2017'),
(3, '19999', '01-01-2018,02-01-2018,03-01-2018,06-01-2018,04-01-2018,05-01-2018'),
(4, '2018', '01-01-2018,02-01-2018,03-01-2018,04-01-2018,19-01-2018,20-01-2018,10-01-2018,18-01-2018,25-01-2018,24-01-2018,23-01-2018,15-01-2018,14-01-2018,22-01-2018,31-01-2018,29-01-2018,07-02-2018,21-02-2018,22-02-2018,16-02-2018,23-03-2018,22-03-2018,21-03-2018,21-04-2018,19-04-2018,17-04-2018,09-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_file` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`, `jenis_file`, `keterangan`) VALUES
(18, '31577.png', 'akte', 'aaaaaaaaaaaa'),
(17, 'bg_login1.jpg', 'dokumen', 'xxxxxxxxxx'),
(19, '31577_v2.png', 'dokumen', 'kkkkk'),
(20, 'flpp.jpg', 'akte', 'kigkulk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'Christopher', 'Thompson', '919-902-9049', 'christoperthompson@gmail.com'),
(2, 'Lynn', 'Madrid', '989-685-6300', 'lymmmadrid@gmail.com'),
(3, 'Donald', 'Wheeler', '252-315-7813', 'donaldwheeler@gmail.com'),
(4, 'Margaret', 'Washington', '936-854-0533', 'margaretwashington@gmail.com'),
(5, 'William', 'Olivarez', '856-855-0612', 'williamolivaraz@gmail.com'),
(6, 'Larry', 'Henson', '515-314-7896', 'larryhenson@gmail.com'),
(7, 'Ladonna', 'Hughes', '601-637-7771', 'ladonnahugjes@gmail.com'),
(8, 'Joshua', 'Tinker', '757-413-7159', 'joshuatinker@gmail.com'),
(9, 'Damian', 'Salley', '330-302-5687', 'damiansalley@gmail.com'),
(10, 'Joyce', 'Hollins', '412-374-0949', 'joycehollins@gmail.com'),
(11, 'Jan', 'Schuman', '775-243-7818', 'janschuman@gmail.com'),
(12, 'Millie', 'Richards', '802-694-4273', 'millierichards@gmail.com'),
(13, 'Mary', 'Navarrete', '601-986-1079', 'marynavarrete@gmail.com'),
(14, 'Maggie', 'Noble', '432-332-0287', 'maggienoble@gmail.com'),
(15, 'Doris', 'Evans', '803-744-0440', 'dorisevans@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `mp3`
--
ALTER TABLE `mp3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tanggal_libur`
--
ALTER TABLE `tanggal_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `mp3`
--
ALTER TABLE `mp3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tanggal_libur`
--
ALTER TABLE `tanggal_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
