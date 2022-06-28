-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 06:20 PM
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
-- Database: `marstech`
--

-- --------------------------------------------------------

--
-- Table structure for table `calibrations`
--

CREATE TABLE `calibrations` (
  `id` int(11) NOT NULL,
  `present_date` varchar(50) NOT NULL,
  `machine_type` varchar(10) NOT NULL,
  `srno` varchar(20) NOT NULL,
  `centername` varchar(500) NOT NULL,
  `centeraddress1` varchar(500) NOT NULL,
  `centeraddress2` varchar(500) NOT NULL,
  `gas_valid_date` varchar(50) NOT NULL,
  `calibration_validity_date` varchar(50) NOT NULL,
  `calibration_serial` varchar(100) NOT NULL,
  `qr_img` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `cal_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calibrations`
--

INSERT INTO `calibrations` (`id`, `present_date`, `machine_type`, `srno`, `centername`, `centeraddress1`, `centeraddress2`, `gas_valid_date`, `calibration_validity_date`, `calibration_serial`, `qr_img`, `mobile`, `cal_year`) VALUES
(24, 'June 21 2022', 'diesel', '1', 'Hanumanthu Pollution Center', 'Nagole road ', 'Hyderabad,Telangana-500070', '21-06-2023', '19-10-2022', 'MARS-CAL-21062022043009', 'MARS-CAL-21062022043009.png', '9959393184', '2022-2023'),
(25, 'June 21 2022', 'diesel', '1', 'Hanumanthu Pollution Center', 'Nagole road ', 'Hyderabad,Telangana-500070', '21-06-2023', '19-10-2022', 'MARS-CAL-21062022100219', 'MARS-CAL-21062022100219.png', '9959393185', '2022-2023'),
(26, 'June 21 2022', 'diesel', '1', 'Hanumanthu Pollution Center', 'Nagole road ', 'Hyderabad,Telangana-500070', '21-06-2023', '19-10-2022', 'MARS-CAL-21062022100407', 'MARS-CAL-21062022100407.png', '9959393186', '2022-2023'),
(27, 'June 22 2022', 'petrol', '324', '3242323432', 'test', 'test', '22-06-2023', '20-10-2022', 'MARS-CAL-21062022100732', 'MARS-CAL-21062022100732.png', '3242342343', '2022-2023'),
(28, 'June 21 2022', 'diesel', '4', '5', 'test', 'test', '21-06-2023', '19-10-2022', 'MARS-CAL-21062022101500', 'MARS-CAL-21062022101500.png', '35353552', '2022-2023'),
(29, 'June 21 2022', 'petrol', '3', 'test', 'test', 'test', '21-06-2023', '19-10-2022', 'MARS-CAL-21062022101827', 'MARS-CAL-21062022101827.png', '343322343', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `yourQuery` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `address`, `email`, `mobile`, `country`, `state`, `yourQuery`, `date`) VALUES
(10, 'test', 'tert', 'test@gmail.com', '34432423', 'india', 'ts', 'tedt', '20-06-2022'),
(11, 'test', 'test', 'test@gmail.com', '9959393184', 'india', 'ts', 'test', '20-06-2022');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `machine_name` varchar(100) NOT NULL,
  `machine_price` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `cover_images` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `machine_name`, `machine_price`, `mobile`, `cover_images`) VALUES
(12, 'test', '32423', '9959393184', 'Marsfinalcurve.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibrations`
--
ALTER TABLE `calibrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calibrations`
--
ALTER TABLE `calibrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
