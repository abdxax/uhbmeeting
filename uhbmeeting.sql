-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21 يناير 2020 الساعة 19:19
-- إصدار الخادم: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uhbmeeting`
--

-- --------------------------------------------------------

--
-- بنية الجدول `info`
--

CREATE TABLE `info` (
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unviersity` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `airport` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timeariv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateariv` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `datecheck` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `info`
--

INSERT INTO `info` (`name`, `email`, `phone`, `unviersity`, `airport`, `hotel`, `timeariv`, `dateariv`, `datecheck`) VALUES
('oo', '01/21/2020', '01/06/2020', 'abdxax@gmail.com', '99', 'جامعة حائل', 'yes', '0000-00-00 00:00:00', '0000-00-00'),
('test', 'e@e.e', '9999999899', 'جامعة حائل', 'yes', 'yes', '9 - مساء', '01/14/2020', '01/16/2020'),
('sta@uhb.edu.sa', 'sta@uhb.edu.sa', '', '', '', '', '', '', ''),
('ttt٢', 'test@t.r', '777', 'جامعة حائل', 'yes', 'yes', '5 - صباح', '01/14/2020', '01/29/2020'),
('pp', 'test@t.t', '', 'test@t.t', '999', 'جامعة حائل', 'yes', '0000-00-00 00:00:00', '0000-00-00'),
('iiii', 'y@y.y', '99999', 'جامعة حائل', 'yes', 'yes', '9 - صباح', '01/21/2020', '01/22/2020');

-- --------------------------------------------------------

--
-- بنية الجدول `subject`
--

CREATE TABLE `subject` (
  `id_s` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subject`
--

INSERT INTO `subject` (`id_s`, `email`, `title`, `descr`) VALUES
(1, 'test@t.t', 'ii', 'ii'),
(2, 'test@t.t', 'ii', 'ii'),
(3, 'test@t.t', 'ii', 'ii'),
(4, 'test@t.t', 'ii', 'ii'),
(5, 'test@t.r', 'o', 'f'),
(6, 'e@e.e', 'uuu', 'wwww'),
(7, 'y@y.y', 'oo', 'rr');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`email`, `password`, `role`) VALUES
('abdxax@gmail.com', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 1),
('test@t.t', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 1),
('test@t.r', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 1),
('sta@uhb.edu.sa', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 2),
('e@e.e', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 1),
('y@y.y', '491b7bd08c7ef5d3d375c64030ce351632e72e48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_s`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
