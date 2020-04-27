-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datapitch`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `S_name` varchar(50) NOT NULL,
  `S_class` varchar(8) NOT NULL,
  `id` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`S_name`, `S_class`, `id`, `password`) VALUES
('Nguyễn Xuân Đức', '43K14', '171121514101', '123456'),
('Trần Thị Anh Hoa', '43K14', '171121514104', '123456'),
('Lê Thị Loan Hương', '43K14', '171121514105', '123456'),
('Lê Thừa Lộc', '43K14', '171121514106', '123456'),
('Phạm Hùng Mạnh', '43K14', '171121514107', '123456'),
('Nguyễn Thị Phương Nhi', '43K14', '171121514108', '123456'),
('Nguyễn An Phú', '43K14', '171121514111', '123456'),
('Phan Văn Phúc', '43K14', '171121514112', '123456'),
('Dương Ngọc Thanh', '43K14', '171121514115', '123456'),
('Đỗ Hoàng Thắng', '43K14', '171121514116', '123456'),
('Nguyễn Quốc Việt', '43K14', '171121514118', '123456'),
('Võ Thị Vui', '43K14', '171121514119', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `book1`
--

CREATE TABLE `book1` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(12) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `phone2` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `registdate` datetime NOT NULL DEFAULT current_timestamp(),
  `purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book2`
--

CREATE TABLE `book2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(12) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `phone2` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `registdate` datetime NOT NULL DEFAULT current_timestamp(),
  `purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book1`
--
ALTER TABLE `book1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book2`
--
ALTER TABLE `book2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book1`
--
ALTER TABLE `book1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book2`
--
ALTER TABLE `book2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
