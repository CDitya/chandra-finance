-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 06:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chandra-finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `debitur`
--

CREATE TABLE `debitur` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `karakterId` int(11) NOT NULL,
  `pendidikanId` int(11) NOT NULL,
  `pekerjaanId` int(11) NOT NULL,
  `tanggunganId` int(11) NOT NULL,
  `rumahId` int(11) NOT NULL,
  `pendapatanId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `debiturId` int(11) NOT NULL,
  `auditorId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `id` int(11) NOT NULL,
  `karakter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`id`, `karakter`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'PNS/BUMN'),
(2, 'Wiraswasta'),
(3, 'Karyawan'),
(4, 'Profesi'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `pendapatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `pendapatan`) VALUES
(1, 'Kurang dari 1.000.000'),
(2, '1.000.000 - 1.500.000'),
(3, '1.500.000 - 2.500.000'),
(4, '2.500.000 - 3.500.000'),
(5, 'Lebih dari 3.500.000');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SD/MI'),
(2, 'SLTP/SMP'),
(3, 'SLTA/SMA'),
(4, 'Diploma 3'),
(5, 'S1 ke atas');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id` int(11) NOT NULL,
  `rumah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id`, `rumah`) VALUES
(1, 'Milik Sendiri'),
(2, 'Milik Keluarga'),
(3, 'Milik Instansi'),
(4, 'Kost/Kontrak'),
(5, 'KPR');

-- --------------------------------------------------------

--
-- Table structure for table `tanggungan`
--

CREATE TABLE `tanggungan` (
  `id` int(11) NOT NULL,
  `tanggungan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggungan`
--

INSERT INTO `tanggungan` (`id`, `tanggungan`) VALUES
(1, '0 orang'),
(2, '1-2 orang'),
(3, '3-4 orang'),
(4, '5 orang'),
(5, 'Lebih dari 6 orang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `tgl_dibuat`) VALUES
(1, '0000000000000000', 'Admin', 'admin@chandrafinance.com', 'default.jpg', '$2y$10$thCs53Brz5GmO5JrQyeJ4.GU96gvzvrgNdpyNV.5pktzD/Jfdr.PO', 1, 1, 1592187041);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_dropdown_menu`
--

CREATE TABLE `user_akses_dropdown_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses_dropdown_menu`
--

INSERT INTO `user_akses_dropdown_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_dropdown_sub_menu`
--

CREATE TABLE `user_dropdown_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `aktivasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_dropdown_sub_menu`
--

INSERT INTO `user_dropdown_sub_menu` (`id`, `menu_id`, `judul`, `url`, `logo`, `aktivasi`) VALUES
(1, 1, 'Ubah Kata Sandi', 'password', 'fas fa-key fa-sm fa-fw mr-2 text-gray-400', 1),
(2, 2, 'Profil', 'auditor/profil', 'fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400 	', 1),
(3, 1, 'Keluar', 'beranda/keluar', 'fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `aktivasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `logo`, `aktivasi`) VALUES
(1, 1, 'Daftar Debitur', 'admin', 'fas fa-fw fa-users', 1),
(2, 1, 'Daftar Auditor', 'admin/daftar_auditor', 'fas fa-fw fa-file-signature', 1),
(3, 2, 'Daftar Debitur', 'auditor', 'fas fa-fw fa-users', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debitur`
--
ALTER TABLE `debitur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaanId` (`pekerjaanId`),
  ADD KEY `karakterId` (`karakterId`),
  ADD KEY `pendapatanId` (`pendapatanId`),
  ADD KEY `pendidikanId` (`pendidikanId`),
  ADD KEY `rumahId` (`rumahId`),
  ADD KEY `tanggunganId` (`tanggunganId`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditor_id` (`auditorId`),
  ADD KEY `nasabah_id` (`debiturId`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_akses_dropdown_menu`
--
ALTER TABLE `user_akses_dropdown_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `user_akses_dropdown_menu_ibfk_2` (`role_id`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_dropdown_sub_menu`
--
ALTER TABLE `user_dropdown_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debitur`
--
ALTER TABLE `debitur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tanggungan`
--
ALTER TABLE `tanggungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_akses_dropdown_menu`
--
ALTER TABLE `user_akses_dropdown_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_dropdown_sub_menu`
--
ALTER TABLE `user_dropdown_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `debitur`
--
ALTER TABLE `debitur`
  ADD CONSTRAINT `debitur_ibfk_1` FOREIGN KEY (`pekerjaanId`) REFERENCES `pekerjaan` (`id`),
  ADD CONSTRAINT `debitur_ibfk_2` FOREIGN KEY (`karakterId`) REFERENCES `karakter` (`id`),
  ADD CONSTRAINT `debitur_ibfk_3` FOREIGN KEY (`pendapatanId`) REFERENCES `pendapatan` (`id`),
  ADD CONSTRAINT `debitur_ibfk_4` FOREIGN KEY (`pendidikanId`) REFERENCES `pendidikan` (`id`),
  ADD CONSTRAINT `debitur_ibfk_5` FOREIGN KEY (`rumahId`) REFERENCES `rumah` (`id`),
  ADD CONSTRAINT `debitur_ibfk_6` FOREIGN KEY (`tanggunganId`) REFERENCES `tanggungan` (`id`);

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`auditorId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`debiturId`) REFERENCES `debitur` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_akses_dropdown_menu`
--
ALTER TABLE `user_akses_dropdown_menu`
  ADD CONSTRAINT `user_akses_dropdown_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `user_akses_dropdown_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_akses_dropdown_menu_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_akses_dropdown_menu_ibfk_4` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD CONSTRAINT `user_akses_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_akses_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_dropdown_sub_menu`
--
ALTER TABLE `user_dropdown_sub_menu`
  ADD CONSTRAINT `user_dropdown_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
