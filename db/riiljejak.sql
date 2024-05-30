-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 06:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riiljejak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int NOT NULL,
  `id_kategori_master` int NOT NULL,
  `id_user` int NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_berita` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `youtube` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `headline` enum('N','Y','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aktif` enum('N','Y','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isi_berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_gambar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dibaca` int NOT NULL,
  `tag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Internasional'),
(2, 'Nasional'),
(3, 'Daerah'),
(4, 'Budaya'),
(5, 'Seni'),
(6, 'Keanekaragaman Hayati'),
(7, 'Pariwisata'),
(8, 'Komoditas'),
(9, 'Kuliner'),
(10, 'Infografis'),
(11, 'Lingkungan'),
(12, 'Kesehatan'),
(13, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_1`
--

CREATE TABLE `tb_kategori_1` (
  `id_kategori_1` int NOT NULL,
  `nama_kat_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_1`
--

INSERT INTO `tb_kategori_1` (`id_kategori_1`, `nama_kat_1`) VALUES
(1, 'Sulawesi Utara'),
(2, 'Gorontalo'),
(3, 'Hukum'),
(4, 'Politik'),
(5, 'Pemerintahan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_2`
--

CREATE TABLE `tb_kategori_2` (
  `id_kategori_2` int NOT NULL,
  `nama_kat_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_2`
--

INSERT INTO `tb_kategori_2` (`id_kategori_2`, `nama_kat_2`) VALUES
(1, 'Bolaang Mongondow Utara'),
(2, 'Bolaang Mongondow Selatan'),
(3, 'Bolaang Mongondow Timur'),
(4, 'Kota Gorontalo'),
(5, 'Kabupaten Gorontalo'),
(6, 'Gorontalo Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_master`
--

CREATE TABLE `tb_kategori_master` (
  `id_kat_master` int NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `id_kategori_1` int DEFAULT NULL,
  `id_kategori_2` int DEFAULT NULL,
  `nm_kategori_master` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori_master`
--

INSERT INTO `tb_kategori_master` (`id_kat_master`, `id_kategori`, `id_kategori_1`, `id_kategori_2`, `nm_kategori_master`, `active`) VALUES
(1, 1, NULL, NULL, 'Internasional', 1),
(2, 2, 3, NULL, 'Hukum', 1),
(3, 2, 4, NULL, 'Politik', 1),
(4, 2, 5, NULL, 'Pemerintahan', 1),
(5, 3, 1, 1, 'Bolaang Mongondow Utara', 1),
(6, 3, 1, 2, 'Bolaang Mongondow Selatan', 1),
(7, 3, 1, 3, 'Bolaang Mongondow Timur', 1),
(8, 3, 2, 4, 'Kota Gorontalo', 1),
(9, 3, 2, 5, 'Kabupaten Gorontalo', 1),
(10, 3, 2, 6, 'Gorontalo Utara', 1),
(11, 4, NULL, NULL, 'Budaya', 1),
(12, 5, NULL, NULL, 'Seni', 1),
(13, 6, NULL, NULL, 'Kenekaragaman Hayati', 1),
(14, 7, NULL, NULL, 'Pariwisata', 1),
(15, 8, NULL, NULL, 'Komoditas', 1),
(16, 9, NULL, NULL, 'Kuliner', 1),
(17, 10, NULL, NULL, 'Infografis', 1),
(18, 11, NULL, NULL, 'Lingkungan', 1),
(19, 12, NULL, NULL, 'Kesehatan', 1),
(20, 13, NULL, NULL, 'Olahraga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int NOT NULL,
  `nama_menu` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Berita'),
(2, 'Ragam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_subbagian` int NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `id_subbagian`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `token`) VALUES
(3, 'Faisal Djukiro', 1, 'faisaldjukiro98@gmail.com', 'default.jpg', '$2y$10$DnQAM0orfRs4vJdJIy3xSOzlGjSSGcLCxBhmjLxsKDM75DYT4DZz6', 1, 1, 1698543559, ''),
(17, 'Rusdiyanto K Jukiro', 0, 'rusdiyantojukiro@gmail.com', 'default.jpg', '$2y$10$P0ObD4I0O0fMCuxY2Q58.e93egXeKGjkWan0Xrcj3AjoUoetjX30m', 1, 1, 1716056589, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(2, 1, 2),
(3, 1, 7),
(5, 1, 6),
(7, 1, 8),
(10, 1, 10),
(11, 1, 11),
(12, 4, 1),
(13, 4, 11),
(14, 4, 6),
(15, 4, 7),
(16, 2, 1),
(17, 2, 10),
(18, 2, 6),
(19, 3, 1),
(20, 3, 6),
(21, 3, 10),
(22, 4, 2),
(23, 4, 10),
(24, 5, 1),
(27, 5, 6),
(28, 5, 11),
(29, 2, 2),
(30, 3, 2),
(31, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urutan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `urutan`) VALUES
(1, 'Beranda', 1),
(8, 'Settings', 7),
(10, 'Berita', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int NOT NULL,
  `role` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Jurnalis');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub2_menu`
--

CREATE TABLE `user_sub2_menu` (
  `id_sub2_menu` int NOT NULL,
  `sub_title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_url` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_icon` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub2_menu`
--

INSERT INTO `user_sub2_menu` (`id_sub2_menu`, `sub_title`, `sub_url`, `sub_icon`, `sub_is_active`) VALUES
(1, 'Beranda', 'beranda', 'bi bi-grid', 1),
(2, 'Menu Management', 'settings', 'bi bi-folder-fill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `id_sub2_menu` int DEFAULT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL,
  `urutan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `id_sub2_menu`, `title`, `url`, `icon`, `is_active`, `urutan`) VALUES
(1, 1, NULL, 'Beranda', 'rj/beranda', 'bi bi-grid', 1, 0),
(2, 8, NULL, 'Menu Management', 'rj/settings', 'bi bi-folder-fill', 1, 3),
(3, 8, NULL, 'Submenu Management', 'rj/settings/submenu', 'bi bi-folder2-open', 1, 4),
(12, 8, NULL, 'User Management', 'rj/settings/user', 'bi bi-person-lines-fill', 1, 2),
(13, 8, NULL, 'Role', 'rj/settings/role', 'bi bi-person-check-fill', 1, 1),
(18, 10, NULL, 'Berita', 'rj/berita', 'bi bi-newspaper', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `email` varchar(182) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(182) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori_master`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kategori_1`
--
ALTER TABLE `tb_kategori_1`
  ADD PRIMARY KEY (`id_kategori_1`);

--
-- Indexes for table `tb_kategori_2`
--
ALTER TABLE `tb_kategori_2`
  ADD PRIMARY KEY (`id_kategori_2`);

--
-- Indexes for table `tb_kategori_master`
--
ALTER TABLE `tb_kategori_master`
  ADD PRIMARY KEY (`id_kat_master`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub2_menu`
--
ALTER TABLE `user_sub2_menu`
  ADD PRIMARY KEY (`id_sub2_menu`) USING BTREE;

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori_1`
--
ALTER TABLE `tb_kategori_1`
  MODIFY `id_kategori_1` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kategori_2`
--
ALTER TABLE `tb_kategori_2`
  MODIFY `id_kategori_2` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kategori_master`
--
ALTER TABLE `tb_kategori_master`
  MODIFY `id_kat_master` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub2_menu`
--
ALTER TABLE `user_sub2_menu`
  MODIFY `id_sub2_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
