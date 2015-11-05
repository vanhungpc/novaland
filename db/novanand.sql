-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2015 at 02:24 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novanand`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `_id_admin` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`_id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `_id_category` int(11) NOT NULL,
  `name_category_eng` text COLLATE utf8_unicode_ci,
  `name_category_vi` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `_id_county` int(11) NOT NULL,
  `name_county` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`_id_county`, `name_county`) VALUES
(1, 'Apartment for rent in District 1'),
(2, 'Apartment for rent in District 2'),
(3, 'Apartment for rent in District 3'),
(4, 'Apartment for rent in District 4'),
(5, 'Apartment for rent in District 5'),
(6, 'Apartment for rent in District 6'),
(7, 'Apartment for rent in District 7'),
(8, 'Apartment for rent in District 8'),
(10, 'Apartment for rent in District 9');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `_id_news` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`_id_news`, `title`, `content`, `date_create`) VALUES
(1, 'THE SUN AVENUE: TẶNG TIỀN THUÊ NHÀ ĐẾN KHI NHẬN CĂN HỘ', 'THE SUN AVENUE: TẶNG TIỀN THUÊ NHÀ ĐẾN KHI NHẬN CĂN HỘ', NULL),
(2, 'abc', 'abc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `_id_project` int(11) NOT NULL,
  `name_project` text COLLATE utf8_unicode_ci,
  `_id_category` int(11) DEFAULT NULL,
  `_id_county` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `slider` int(11) DEFAULT NULL,
  `desc_slider` text COLLATE utf8_unicode_ci,
  `img_slider` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`_id_project`, `name_project`, `_id_category`, `_id_county`, `address`, `price`, `lat`, `lng`, `description`, `slider`, `desc_slider`, `img_slider`) VALUES
(8, 'Dự án nhà thầu', 1, 1, '2 nguyễn văn cừ', 8000, 10.7594044, 106.68399449999993, '<p>nhà kiểu mới</p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://localhost/novaland/uploads/images/ho-boi-464x251px.jpg" style="height:251px; width:464px" /></p>\r\n', 2, 'abc', 'img_slider/119984_banner_giathuong.jpg'),
(9, 'Dự án nhà thầu', 1, 1, '2 nguyễn văn cừ', 8000, 10.7594044, 106.68399449999993, '<p>nhà kiểu mới</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://localhost/novaland/uploads/images/ho-boi-464x251px.jpg" style="height:251px; width:464px" /></p>\r\n', 2, 'aaa', 'img_slider/119984_banner_giathuong.jpg'),
(10, 'Dự án nhà thầu 1 ', 1, 1, '2 nguyễn văn cừ', 8000, 10.7594044, 106.68399449999993, '<p>nhà kiểu mới</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://localhost/novaland/uploads/images/ho-boi-464x251px.jpg" style="height:251px; width:464px" /></p>\r\n', 2, 'bcd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`_id_admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`_id_category`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`_id_county`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`_id_news`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`_id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `_id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `_id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `_id_county` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `_id_news` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `_id_project` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
