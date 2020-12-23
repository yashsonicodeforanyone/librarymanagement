-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 12:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `libraryidnum` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(100) NOT NULL,
  `libraryname` text NOT NULL,
  `address` varchar(155) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `token`, `libraryidnum`, `status`, `name`, `email`, `mobile`, `libraryname`, `address`, `gender`, `password`, `cpassword`, `datetime`) VALUES
(29, '4654fefc5f6c394d9a3bf5fb0121f9', '87a1d79f', 'active', 'yash soni', 'none', 586577, 'none', 'none', 'male', '$2y$10$yaYcP6/I7ufaBaDxeOoHpeJnlS8ZhTmmJkUgH.QUhx.i/Q0LRTFkm', '$2y$10$yaYcP6/I7ufaBaDxeOoHpeJnlS8ZhTmmJkUgH.QUhx.i/Q0LRTFkm', '2020-07-04 05:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `bookname` varchar(150) NOT NULL,
  `booksubject` varchar(50) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `libraryidnum` varchar(145) NOT NULL,
  `referncenum` varchar(50) NOT NULL,
  `phonenum` int(50) NOT NULL,
  `profname` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `token`, `bookname`, `booksubject`, `authorname`, `libraryidnum`, `referncenum`, `phonenum`, `profname`, `status`, `date`) VALUES
(75, 'a68f92531f54cc6f261614857b1fa0', 'rrb ntpc', 'jk;lj', 'jklj', 'jkj', 'jkl', 0, 'jk', 'Return', '2020-06-25 12:34:44'),
(76, '599ffda815849be57eefabea7a9966', 'rrb ntpc', 'fg', '23', '12', '121', 12, '12', 'Return', '2020-06-26 02:35:49'),
(77, '599ffda815849be57eefabea7a9966', '2', '41241', '45', '54', '454', 545, '445', 'Return', '2020-06-26 02:36:04'),
(78, '599ffda815849be57eefabea7a9966', 'hello', 'hello', 'hello', 'hhj', 'h', 0, 'jkjk', 'Return', '2020-06-26 06:38:39'),
(79, '599ffda815849be57eefabea7a9966', '1234', '123244', '45', '45', '45', 45, '45', 'Return', '2020-06-26 06:42:51'),
(80, '599ffda815849be57eefabea7a9966', '4545', '454', '545', '45', '45', 45, '445', 'ADD', '2020-06-26 06:48:38'),
(81, 'ae88b3f11b9b1865f0658eb3f7814e', '1234', '121545', '1524545', '12454', '1524545', 4152454, '541545', 'Return', '2020-06-30 01:08:52'),
(82, 'ae88b3f11b9b1865f0658eb3f7814e', 'njkjk', 'gjkghjkh', 'jkhjkh', 'jkhjk', 'jkhjkh', 0, 'jk', 'Return', '2020-06-30 01:58:28'),
(83, 'ae88b3f11b9b1865f0658eb3f7814e', 'jlkjq', 'qkkjkjkl', 'jk', 'jklj', 'kjk', 0, 'jk', 'ADD', '2020-06-30 02:07:07'),
(84, 'ae88b3f11b9b1865f0658eb3f7814e', 'jdlfkm;l', 'jklsdfjkj', 'jkldfjkl', 'kljlkjk', 'jkljflkjgklj', 0, 'jklfjkl', 'ADD', '2020-06-30 02:07:24'),
(85, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'rrb ntpc', 'hjk', 'ggjhgjhgh', 'ghg', 'ghjgh', 0, 'hghg', 'ADD', '2020-07-04 04:55:22'),
(86, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'jlk', 'jhjkl', 'jk', 'kj', 'jklj', 0, 'kj', 'ADD', '2020-07-05 23:03:23'),
(87, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'hjkhkj', 'hjhjk', 'hj', 'hjk', 'hjk', 0, 'jh', 'ADD', '2020-07-05 23:03:35'),
(88, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'bkjjk', 'hjkh', 'jkh', 'jk', 'kjh', 0, 'jjhj', 'ADD', '2020-07-05 23:31:49'),
(89, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'LKHKL', 'HKJH', 'JKH', 'JH', 'JKH', 0, 'JH', 'ADD', '2020-07-05 23:56:17'),
(90, '5fdc9c37638fb3f36ae1c0a2ee9cee', 'kjh', 'jkhkjh', 'jkh', 'jkhkj', 'jkh', 0, 'jh', 'Return', '2020-07-06 01:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rollnumber` varchar(155) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `branch` text NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `rollnumber`, `email`, `img_file`, `password`, `cpassword`, `branch`, `gender`, `phone`, `token`, `status`) VALUES
(48, 'yash soni', '0722cs171060', 'ysoni9919@gmail.com', 'signature.jpg', '$2y$10$GIuoZVDykf/1oaCJ3IH9z.oitecZenhaUuEr2b0wusPKNf7uBzFaC', '$2y$10$GIuoZVDykf/1oaCJ3IH9z.oitecZenhaUuEr2b0wusPKNf7uBzFaC', 'cs', 'male', '12345678', '379d6c3c49238c497fc5ec8109cb8f', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
