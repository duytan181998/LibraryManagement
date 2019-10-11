-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 07:53 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webthuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctmuontra`
--

CREATE TABLE `ctmuontra` (
  `id` int(10) NOT NULL,
  `masach` int(10) NOT NULL,
  `ngaytra` date NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mamuontra` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctmuontra`
--

INSERT INTO `ctmuontra` (`id`, `masach`, `ngaytra`, `ghichu`, `mamuontra`) VALUES
(12, 2, '2019-05-02', '3', 16),
(13, 3, '2019-04-05', 'ds', 17),
(14, 2, '2019-12-09', NULL, 18),
(15, 3, '2019-08-09', NULL, 19),
(16, 3, '2019-02-08', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `id` int(10) NOT NULL,
  `tendocgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sothe` int(10) DEFAULT NULL,
  `ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`id`, `tendocgia`, `diachi`, `sodienthoai`, `sothe`, `ngaytao`) VALUES
(11, 'Nguyễn Duy Tân', 'Bien hoa, Bien hoa', '0981471512', 37, '2019-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `muontra`
--

CREATE TABLE `muontra` (
  `id` int(10) NOT NULL,
  `sothe` int(10) NOT NULL,
  `ngaymuon` date NOT NULL,
  `trangthai` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `muontra`
--

INSERT INTO `muontra` (`id`, `sothe`, `ngaymuon`, `trangthai`) VALUES
(16, 35, '2019-08-27', 1),
(17, 36, '2019-08-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `id` int(10) NOT NULL,
  `tennxb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoidaidien` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `id` int(10) NOT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhbia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namxb` int(11) NOT NULL,
  `matacgia` int(10) NOT NULL,
  `matheloai` int(10) NOT NULL,
  `manxb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id`, `tensach`, `anhbia`, `namxb`, `matacgia`, `matheloai`, `manxb`) VALUES
(2, 'hay4', 'model.png', 2019, 3, 6, 3),
(3, 'hayg', '', 2219, 4, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `id` int(10) NOT NULL,
  `tentacgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`id`, `tentacgia`, `website`, `ghichu`) VALUES
(3, 'Nguyễn Văn A', 'https://123.com', '4'),
(4, 'Văn Tèo', '123', '321');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) NOT NULL,
  `tentheloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`) VALUES
(6, 'Thiếu Nhi'),
(7, 'Trinh Thám'),
(9, 'Tiểu Thuyết');

-- --------------------------------------------------------

--
-- Table structure for table `thethuvien`
--

CREATE TABLE `thethuvien` (
  `id` int(10) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayhethan` date NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thethuvien`
--

INSERT INTO `thethuvien` (`id`, `ngaybatdau`, `ngayhethan`, `ghichu`) VALUES
(37, '2019-09-16', '2019-12-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `image`, `name`, `address`, `job`) VALUES
(1, 'admin', '$2y$12$w5lstcSPJTw3FHO99WQQceeSxGnX.1/DIf0Tx.UXmF/dlg20A8YFK', 1, 'img.jpg', 'Nguyễn Duy Tân', 'Nhân Khang, Lý Nhân, Hà Nam', 'Sinh Viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctmuontra`
--
ALTER TABLE `ctmuontra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muontra`
--
ALTER TABLE `muontra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thethuvien`
--
ALTER TABLE `thethuvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ctmuontra`
--
ALTER TABLE `ctmuontra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `muontra`
--
ALTER TABLE `muontra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thethuvien`
--
ALTER TABLE `thethuvien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
