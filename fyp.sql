-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 11:55 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(12) NOT NULL,
  `userid` int(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `january` int(4) NOT NULL,
  `february` int(4) NOT NULL,
  `march` int(4) NOT NULL,
  `april` int(4) NOT NULL,
  `may` int(4) NOT NULL,
  `june` int(4) NOT NULL,
  `july` int(4) NOT NULL,
  `august` int(4) NOT NULL,
  `september` int(4) NOT NULL,
  `october` int(4) NOT NULL,
  `november` int(4) NOT NULL,
  `december` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `emel` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `icpp` varchar(50) NOT NULL,
  `maybankaccount` varchar(50) NOT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `emel`, `password`, `fname`, `address`, `hp`, `icpp`, `maybankaccount`, `dateregistered`) VALUES
(1, 'erbas@gmail.com', '123456', 'erbas ', 'erbas hq', 'erbas hp', 'erbas123', '123456', '2017-10-25 06:28:08'),
(43, 'mayangsari@gmail.com', '123456', 'Mayangsari ERBA', 'Kilang Mayangsari', '012345678910', '9120304010213', '158118137169', '2017-10-26 08:46:50'),
(45, 'ngsari@gmail.com', '123456', 'ngsari ERBAS', 'LEVEL 21-3, MENARA WORLDWIDE,\r\nNO. 198, JALAN BUKI', '012345678910', '123145', '123458999', '2017-10-25 08:08:59'),
(47, 'rashdanrazak91@gmail.com', 'dan910321', 'dadadadax', 'dadadx hq', '0192471111', '12314151121', '158118137109', '2017-10-25 08:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
