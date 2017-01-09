-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 04:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `aid` smallint(4) UNSIGNED ZEROFILL NOT NULL,
  `aname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`aid`, `aname`, `pic`) VALUES
(0004, 'กิจกรรมทำเค้ก', '4.gif'),
(0005, 'สอนทำเค้ก', '5.gif'),
(0006, 'ทำเค้ก', '6.gif'),
(0007, 'eee', '7.gif'),
(0008, 'ss', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` smallint(4) UNSIGNED ZEROFILL NOT NULL,
  `n_date` date NOT NULL,
  `n_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_detaill` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_image` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `n_date`, `n_title`, `n_detaill`, `n_image`) VALUES
(0007, '2017-01-15', ' ซื้อเค้กวันนี้ แถมฟรีคัพเค้ก 5 ชิ้น หมดเขตสิ้นเดือนนี้', 'ลูกค้าท่านใดสนใจสั่งซื้อเค้กวันนี้ ทางร้านมีโปรโมรชั่นดีๆวันนี้ให้แก่ลูกค้าทุกท่าน โดยซื้อเค้กทางร้านเรามีคัพเค้กแถมฟรี 5 ชิ้น ภายในสิ้นเดือนนี้', 'N7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `pname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `pic` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`, `pic`) VALUES
(00001, 'เค้กบานาน่าช็อต', 120, '1.jpg'),
(00002, 'เค้กสเตอเบอรี่นมสด', 230, '2.jpg'),
(00003, 'เค้กนางฟ้า', 250, '3.jpg'),
(00004, 'เค้กนางrrrrr', 120, '4.jpg'),
(00005, 'ttt', 230, '5.gif'),
(00006, 'ttt', 250, '6.jpg'),
(00007, 'กด', 120, '7.jpg'),
(00008, 'เค้กสเตอเบอรี่นมสด', 120, '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_word` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_name`, `pass_word`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
