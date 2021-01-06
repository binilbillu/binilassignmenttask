-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 04:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileexplorer`
--

-- --------------------------------------------------------

--
-- Table structure for table `filedata`
--

CREATE TABLE `filedata` (
  `fileid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `file_status` int(2) NOT NULL COMMENT '0=>uploaded,1=>updated=>1=>deleted',
  `filerealname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filedata`
--

INSERT INTO `filedata` (`fileid`, `filename`, `filepath`, `created_at`, `updated_at`, `file_status`, `filerealname`) VALUES
(1, '210106023518_LclXN.jpg', 'uploads', '2021-01-06 14:35:18', '2021-01-06 15:12:17', 1, ''),
(2, '210106023659_8dGLx.jpg', 'uploads', '2021-01-06 14:36:59', '2021-01-06 14:36:59', 0, ''),
(3, '210106025613_p1K2C.jpg', 'uploads', '2021-01-06 14:56:13', '2021-01-06 14:56:13', 0, '44514323_568243083651210_2380604804855496704_n.jpg'),
(4, '210106034134_JCIum.jpeg', 'uploads', '2021-01-06 15:41:35', '2021-01-06 15:41:35', 0, 'WhatsApp Image 2019-02-11 at 8.02.41 AM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filedata`
--
ALTER TABLE `filedata`
  ADD PRIMARY KEY (`fileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filedata`
--
ALTER TABLE `filedata`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
