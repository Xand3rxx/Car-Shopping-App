-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 12:48 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `vadmin`
--

CREATE TABLE `vadmin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_created_at` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vadmin`
--

INSERT INTO `vadmin` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_created_at`) VALUES
(1, 'Anthony Joboy', 'demilo@gmail.com', '$2y$10$TNvDkQllQ/dIVaQ4qLzBcOLYozuj1hOMQUIwAFn060gRoPD63zVSK', '2018-08-02 02:35:49pm');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vname` varchar(100) NOT NULL,
  `vbrand` varchar(50) NOT NULL,
  `vmodel` varchar(50) NOT NULL,
  `vyear` int(4) NOT NULL,
  `vprice` int(10) NOT NULL,
  `vdesc` text NOT NULL,
  `vpic` varchar(100) NOT NULL,
  `date_reg` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vname`, `vbrand`, `vmodel`, `vyear`, `vprice`, `vdesc`, `vpic`, `date_reg`) VALUES
(1, 'Mercedes Benz slr', 'Mercedes', 'SLR', 2004, 1500000, 'Fast sports car from Mercedes. Turbo charger', '10982-2004-mercedes-benz-slr-.jpg', '2018-07-31 08:37:18pm'),
(2, 'Ford Mustang GT shelby 500', 'Ford', 'GT SHELBY 500', 2014, 2000000, 'Fast sports car from Ford. Turbo charger and V8 engine', '16181-ford-mustang-shelby-gt500.jpeg', '2018-07-31 09:31:26pm'),
(3, 'Ford Explorer', 'Ford', 'XLT', 2014, 2500000, 'Fast SUV car from Ford. Turbo charger and V8 engine. 4 wheel drive', '95973-2014-ford-explorer-xlt-black.jpg', '2018-08-22 07:38:12pm'),
(4, 'Chevrolet Camaro', 'Chevrolet', 'Camaro', 2014, 1500000, 'Fast sports car from Chevrolet. Turbo charger', '71525-chevrolet-camaro-07.jpg', '2018-08-01 03:26:28pm'),
(5, 'Dodge Charger', 'Dodge', 'Charger', 2014, 2000000, 'Fast sports car from Dodge. Turbo charger', '66924-dodge-charger.jpeg', '2018-08-01 03:29:05pm'),
(6, 'Lamborghini Embolado', 'Lamborghini ', 'Embolado', 2016, 4500000, 'Fast sports car from Lamborghini. Turbo charger', '70096-lamborghini-cars-pictures.jpg', '2018-08-14 07:36:26pm'),
(7, 'Bugatti Veyron', 'Bugatti', 'VEYRON', 2016, 4500000, 'Fast sports car from Bugatti. Turbo charger', '55083-bugatti-veyron-super-sports-$2,400,000..jpg', '2018-08-14 07:45:45pm'),
(8, 'Chevrolet Camaro', 'Chevrolet', 'Camaro', 2014, 2000000, 'Vintage Fast sports car from Chevrolet. Turbo charger', '43315-$50,000-vintage-chevrolet-camaro-ss-convertible.jpg', '2018-08-22 02:06:39pm');

-- --------------------------------------------------------

--
-- Table structure for table `vorder`
--

CREATE TABLE `vorder` (
  `id` int(11) NOT NULL,
  `vuser_id` int(10) NOT NULL,
  `vcreation_date` varchar(50) NOT NULL,
  `vorder_status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vorder`
--

INSERT INTO `vorder` (`id`, `vuser_id`, `vcreation_date`, `vorder_status`) VALUES
(1, 2, '2018-08-22 10:19:44pm', 'Pending'),
(2, 2, '2018-08-22 10:20:49pm', 'Delivered'),
(3, 1, '2018-08-22 10:22:25pm', 'Pending'),
(4, 1, '2018-08-22 10:22:39pm', 'Delivered'),
(5, 3, '2018-08-22 10:23:55pm', 'Pending'),
(6, 1, '2018-08-29 10:28:44pm', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `vorder_details`
--

CREATE TABLE `vorder_details` (
  `id` int(11) NOT NULL,
  `vorder_id` int(10) NOT NULL,
  `vname` varchar(100) NOT NULL,
  `vprice` varchar(50) NOT NULL,
  `vquan` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vorder_details`
--

INSERT INTO `vorder_details` (`id`, `vorder_id`, `vname`, `vprice`, `vquan`) VALUES
(1, 1, 'Dodge Charger', '2000000', 1),
(2, 1, 'Mercedes Benz slr', '1500000', 1),
(3, 2, 'Dodge Charger', '2000000', 1),
(4, 2, 'Chevrolet Camaro', '2000000', 1),
(5, 3, 'Ford Explorer', '2500000', 1),
(6, 4, 'Bugatti Veyron', '4500000', 1),
(7, 5, 'Chevrolet Camaro', '1500000', 1),
(8, 5, 'Lamborghini Embolado', '4500000', 1),
(9, 6, 'Lamborghini Embolado', '4500000', 1),
(10, 7, 'Bugatti Veyron', '4500000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vuser`
--

CREATE TABLE `vuser` (
  `id` int(11) NOT NULL,
  `vfirstname` varchar(100) NOT NULL,
  `vlastname` varchar(100) NOT NULL,
  `vemail` varchar(50) NOT NULL,
  `vpass` varchar(60) NOT NULL,
  `v_created_at` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vuser`
--

INSERT INTO `vuser` (`id`, `vfirstname`, `vlastname`, `vemail`, `vpass`, `v_created_at`) VALUES
(1, 'Stanley ', 'Jameson', 'stanj@yahoo.com', '$2y$10$wuLC3jjJGfZ.Q2qCyb3Hde0EzEumP5R6AxYiPXc1G6/OBIzcUCn7i', '2018-08-01 10:19:38pm'),
(2, 'John ', 'Mark', 'Apex0091@hotmail.com', '$2y$10$MSykijhJsRJu3CzyG/jIoOCEptDC7f5Y3Ye1hW4ejsID0t3yL1utG', '2018-08-01 10:39:04pm'),
(3, 'Squad', 'Leader', 'fake@yahoo.com', '$2y$10$/FG.5UI.gcFF8kAgZ8.w1OM7ZxMRQStS.35mOHNp7qtsJSTl2MiBy', '2018-08-02 11:28:11am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vadmin`
--
ALTER TABLE `vadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vorder`
--
ALTER TABLE `vorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vorder_details`
--
ALTER TABLE `vorder_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vuser`
--
ALTER TABLE `vuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vadmin`
--
ALTER TABLE `vadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `vorder`
--
ALTER TABLE `vorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vorder_details`
--
ALTER TABLE `vorder_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vuser`
--
ALTER TABLE `vuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
