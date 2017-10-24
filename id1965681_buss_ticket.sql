-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2017 at 06:20 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1965681_buss_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `buss_seat`
--

CREATE TABLE `buss_seat` (
  `id` int(10) UNSIGNED NOT NULL,
  `set_leter` varchar(10) DEFAULT NULL,
  `set_number` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT '1',
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buss_seat`
--

INSERT INTO `buss_seat` (`id`, `set_leter`, `set_number`, `status`, `category_id`) VALUES
(1, 'A', 1, 1, 3),
(2, 'A', 2, 1, 3),
(3, 'A', 3, 1, 3),
(4, 'B', 1, 1, 3),
(5, 'B', 2, 1, 3),
(6, 'B', 3, 1, 3),
(7, 'C', 1, 1, 3),
(8, 'C', 2, 1, 3),
(9, 'C', 3, 1, 3),
(10, 'D', 1, 1, 3),
(11, 'D', 2, 1, 3),
(12, 'D', 3, 1, 3),
(13, 'E', 1, 1, 3),
(14, 'E', 2, 1, 3),
(15, 'E', 3, 1, 3),
(16, 'F', 1, 1, 3),
(17, 'F', 2, 1, 3),
(18, 'F', 3, 1, 3),
(19, 'G', 1, 1, 3),
(20, 'G', 2, 1, 3),
(21, 'G', 3, 1, 3),
(22, 'H', 1, 1, 3),
(23, 'H', 2, 1, 3),
(24, 'H', 3, 1, 3),
(25, 'A', 1, 1, 4),
(26, 'A', 2, 1, 4),
(27, 'A', 3, 1, 4),
(28, 'A', 4, 1, 4),
(29, 'B', 1, 1, 4),
(30, 'B', 2, 1, 4),
(31, 'B', 3, 1, 4),
(32, 'B', 4, 1, 4),
(33, 'C', 1, 1, 4),
(34, 'C', 2, 1, 4),
(35, 'C', 3, 1, 4),
(36, 'C', 4, 1, 4),
(37, 'D', 1, 1, 4),
(38, 'D', 2, 1, 4),
(39, 'D', 3, 1, 4),
(40, 'D', 4, 1, 4),
(41, 'E', 1, 1, 4),
(42, 'E', 2, 1, 4),
(43, 'E', 3, 1, 4),
(44, 'E', 4, 1, 4),
(45, 'F', 1, 1, 4),
(46, 'F', 2, 1, 4),
(47, 'F', 3, 1, 4),
(48, 'F', 4, 1, 4),
(49, 'G', 1, 1, 4),
(50, 'G', 2, 1, 4),
(51, 'G', 3, 1, 4),
(52, 'G', 4, 1, 4),
(53, 'H', 1, 1, 4),
(54, 'H', 2, 1, 4),
(55, 'H', 3, 1, 4),
(56, 'H', 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email_address` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`) VALUES
(1, 'Md Arriful Islam', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_ticket_info`
--

CREATE TABLE `tbl_admin_ticket_info` (
  `ticket_id` int(8) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `available_seats` int(5) NOT NULL,
  `start_time` time NOT NULL,
  `journey_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `ticket_info_description` text NOT NULL,
  `from_place` tinyint(3) NOT NULL,
  `to_place` tinyint(3) NOT NULL,
  `publication_status` tinyint(3) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_ticket_info`
--

INSERT INTO `tbl_admin_ticket_info` (`ticket_id`, `bus_name`, `available_seats`, `start_time`, `journey_date`, `return_date`, `ticket_info_description`, `from_place`, `to_place`, `publication_status`, `category_id`) VALUES
(2, 'S.R', 31, '09:04:00', '2017-05-11', '0000-00-00', '                                                                Checkout.                            ', 1, 3, 1, 4),
(3, 'TR', 12, '20:56:00', '2017-05-11', '0000-00-00', '                                                                Check out                            ', 1, 3, 1, 4),
(4, 'Shamoli', 23, '09:30:00', '2017-05-11', '0000-00-00', '                                                                Check out                            ', 1, 3, 1, 4),
(5, 'Kabil', 3, '12:00:00', '2017-05-11', '0000-00-00', '                                                                Check Out                            ', 1, 3, 1, 4),
(6, 'Ena', 23, '00:00:00', '2017-05-11', '0000-00-00', '                                                                check out                            ', 1, 3, 1, 4),
(7, 'Hanif Volvo', 12, '15:00:00', '2017-05-11', '0000-00-00', 'Check Out.', 1, 3, 1, 3),
(8, 'Anis', 23, '13:00:00', '2017-05-11', '0000-00-00', 'Check Out', 1, 3, 1, 4),
(9, 'Shamoli', 32, '13:00:00', '2017-05-11', '0000-00-00', '                                Check Out                            ', 1, 3, 1, 4),
(10, 'Desh', 40, '02:01:00', '2017-06-15', NULL, 'test', 0, 3, 1, 4),
(11, 'jaman', 0, '00:00:00', '2017-07-17', NULL, '', 0, 2, 0, 3),
(12, 'jaman', 0, '00:58:00', '2017-07-17', NULL, '', 0, 2, 1, 3),
(13, 'S.R', 31, '17:00:00', '2017-07-07', NULL, 'Seats are well and comfortable.Ticket Price 500 tk. ', 0, 1, 1, 3),
(14, 'Hanif volvo', 12, '12:00:00', '2017-07-07', NULL, 'Well and comfortable.', 1, 0, 1, 4),
(15, 'Shamoli', 34, '18:15:00', '2017-07-07', NULL, 'Well and comfortable.', 3, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Mini Ac Bus', 'well and comfortable.', 1),
(2, 'Mini Non-ac Bus', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(249, 249, 249);\">well and comfortable.</span>', 1),
(3, 'Long way ac', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(249, 249, 249);\">well and comfortable.</span>', 1),
(4, 'Long way non-acc', '                                 <span style=\"color: rgb(51, 51, 51); font-family: \"Open Sans\", sans-serif; font-size: 14px; background-color: rgb(249, 249, 249);\">well and comfortable.</span>                            ', 1),
(6, 'Hanif Volvo', '                                 good.perfect journey.', 1),
(7, 'Anis', 'bad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(4) NOT NULL,
  `your_name` varchar(100) NOT NULL,
  `your_email_address` varchar(100) NOT NULL,
  `your_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `your_name`, `your_email_address`, `your_message`) VALUES
(1, 'dfghjkl', 'dfghj@gmail.com', 'fghjk dsfghjkl dsfghjkl'),
(2, 'rtyui', 'dfghj@gmail.com', 'ertyuio dfghjk dfvghjk'),
(3, 'dfghjkl', 'dfghj@gmail.com', 'wertfyhu drtfyghuj rfty'),
(4, 'dfghjkl', 'dfghj@gmail.com', 'dfgvhbjn gvhjbn fghj dfgh'),
(5, 'fgfdg', 'sdn@gmail.com', 'ffgfgdf'),
(6, 'anis', 'aaaaaan@gmail.com', 'ghl;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_info`
--

CREATE TABLE `tbl_customer_info` (
  `custumer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone_no` int(10) NOT NULL,
  `price` int(9) DEFAULT '0',
  `status` int(10) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer_info`
--

INSERT INTO `tbl_customer_info` (`custumer_id`, `customer_name`, `customer_phone_no`, `price`, `status`) VALUES
(20, 'arif', 234567890, 500, 1),
(21, 'salman', 12345, 1500, 1),
(22, 'fahad', 545515151, 2500, 1),
(23, 'khairul', 123456, 2500, 1),
(24, 'hatem tai', 1675230, 1000, 1),
(25, 'Farabi', 1675230123, 3500, 1),
(26, 'Rahmatullah', 159632487, 1500, 1),
(27, 'F1', 34567, 1500, 1),
(28, 'cgftygy', 34567, 1500, 1),
(29, 'akash', 123, 1500, 1),
(30, 'Sagar', 2147483647, 2000, 1),
(31, 'rfgthyjk', 2345678, 1000, 1),
(32, 'ahhh', 1333255, 1000, 1),
(33, 'HU', 4126126, 1500, 1),
(34, 'dddddddddddd', 1222221, 1000, 1),
(35, 'dfg', 54865, 1500, 1),
(36, 'nmr', 0, 1000, 1),
(37, 'rfghjk', 23456, 1500, 1),
(38, 'yuhol', 5467890, 1000, 1),
(39, 'dbdgvd', 1465986, 1000, 1),
(40, 'edrftgyhuj', 234567, 1000, 1),
(41, 'werftgyhu', 1234567, 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `ticket_info_id` int(5) NOT NULL,
  `ticket_from` tinyint(3) NOT NULL,
  `ticket_to` varchar(100) NOT NULL,
  `ticket_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`ticket_info_id`, `ticket_from`, `ticket_to`, `ticket_date`, `return_date`) VALUES
(1, 0, 'Rangpur', '0000-00-00', '0000-00-00'),
(2, 0, 'Rangpur', '0000-00-00', '0000-00-00'),
(4, 0, 'Rangpur', '2017-12-31', '2016-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tbl`
--

CREATE TABLE `ticket_tbl` (
  `id` int(10) NOT NULL,
  `custumer_id` int(10) DEFAULT NULL,
  `seat_no` varchar(10) DEFAULT NULL,
  `status` int(10) DEFAULT '1',
  `ticket_buss_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_tbl`
--

INSERT INTO `ticket_tbl` (`id`, `custumer_id`, `seat_no`, `status`, `ticket_buss_id`) VALUES
(10, 20, 'A1', 1, 1),
(11, 21, 'A2', 1, 1),
(12, 21, 'B3', 1, 1),
(13, 21, 'C2', 1, 1),
(14, 22, 'H4', 1, 1),
(15, 22, 'G3', 1, 1),
(16, 22, 'F2', 1, 1),
(17, 22, 'E3', 1, 1),
(18, 22, 'D4', 1, 1),
(19, 23, 'A3', 1, 1),
(20, 23, 'A4', 1, 1),
(21, 23, 'B1', 1, 1),
(22, 23, 'B2', 1, 1),
(23, 23, 'B4', 1, 1),
(24, 24, 'C3', 1, 1),
(25, 24, 'C4', 1, 1),
(26, 25, 'B1', 1, 2),
(27, 25, 'C2', 1, 2),
(28, 25, 'D3', 1, 2),
(29, 25, 'E4', 1, 2),
(30, 25, 'F3', 1, 2),
(31, 25, 'G2', 1, 2),
(32, 25, 'H1', 1, 2),
(33, 26, 'E1', 1, 3),
(34, 26, 'F2', 1, 3),
(35, 26, 'D2', 1, 3),
(36, 27, 'D3', 1, 1),
(37, 27, 'E4', 1, 1),
(38, 27, 'F4', 1, 1),
(39, 28, 'D2', 1, 1),
(40, 28, 'D1', 1, 1),
(41, 28, 'E1', 1, 1),
(42, 29, 'A3', 1, 2),
(43, 29, 'F1', 1, 2),
(44, 29, 'B4', 1, 2),
(45, 30, 'C4', 1, 10),
(46, 30, 'C1', 1, 10),
(47, 30, 'C2', 1, 10),
(48, 30, 'C3', 1, 10),
(49, 31, 'C1', 1, 1),
(50, 31, 'E2', 1, 1),
(51, 32, 'H3', 1, 1),
(52, 32, 'H2', 1, 1),
(53, 33, 'F1', 1, 1),
(54, 33, 'F3', 1, 1),
(55, 33, 'G1', 1, 1),
(56, 34, 'G2', 1, 1),
(57, 34, 'G4', 1, 1),
(58, 35, 'A1', 1, 2),
(59, 35, 'A1', 1, 2),
(60, 35, 'A2', 1, 2),
(61, 36, 'G3', 1, 2),
(62, 36, 'G4', 1, 2),
(63, 37, 'A4', 1, 2),
(64, 37, 'B2', 1, 2),
(65, 37, 'B3', 1, 2),
(66, 38, 'C3', 1, 2),
(67, 38, 'C4', 1, 2),
(68, 39, 'C1', 1, 2),
(69, 39, 'E2', 1, 2),
(70, 40, 'D1', 1, 2),
(71, 40, 'D2', 1, 2),
(72, 41, 'A1', 1, 4),
(73, 41, 'A2', 1, 4),
(74, 41, 'A3', 1, 4),
(75, 41, 'A4', 1, 4),
(76, 41, 'B3', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buss_seat`
--
ALTER TABLE `buss_seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_admin_ticket_info`
--
ALTER TABLE `tbl_admin_ticket_info`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_customer_info`
--
ALTER TABLE `tbl_customer_info`
  ADD PRIMARY KEY (`custumer_id`);

--
-- Indexes for table `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD PRIMARY KEY (`ticket_info_id`);

--
-- Indexes for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buss_seat`
--
ALTER TABLE `buss_seat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin_ticket_info`
--
ALTER TABLE `tbl_admin_ticket_info`
  MODIFY `ticket_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_customer_info`
--
ALTER TABLE `tbl_customer_info`
  MODIFY `custumer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `ticket_info`
--
ALTER TABLE `ticket_info`
  MODIFY `ticket_info_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
