-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 05:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `givi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `pass`, `fname`, `lname`, `user_img`, `email`, `phone`, `address`, `state`) VALUES
('', '123', '123', '123', '123', '123', 123, '123', 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2', '', 'admin@a', 3, 'Pass: admin', 1),
('baloc12', 'af5ff437adb951a7633bd0f142469f6f', '1', '1', '', '1@a2', 1, '1', 0),
('phucuong', '5b5ff07b580b4c4c6c7df120ffc66ac2', '1', '1', '', '1@1', 1, '1', 0),
('quynhnhu', '267d04e991a8406b981231ead2b85cec', 'quynh', 'nhu', '', 'nhu@g.com', 123356789, 'Logi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_ID` varchar(40) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_des` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `category_name`, `category_des`) VALUES
('a', 'Accessories', 'Accessory products'),
('c', 'Cases', 'Case products'),
('h', 'Helmets', 'Helmet products'),
('s', 'Softbags', 'Sotfbag products'),
('wg', 'Waterproof Garment', 'Waterproof products');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(40) NOT NULL,
  `account_ID` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `feedback_info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_ID`, `account_ID`, `email`, `feedback_info`) VALUES
(2, 'phucuong', '1@1', 'web dep lam\r\n'),
(3, 'phucuong', '1@1', 'web dep lam\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_ID` int(11) NOT NULL,
  `account_ID` varchar(40) NOT NULL,
  `order_detail` mediumtext NOT NULL,
  `order_day` datetime NOT NULL DEFAULT current_timestamp(),
  `pay` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_ID`, `account_ID`, `order_detail`, `order_day`, `pay`) VALUES
(5, 'phucuong', 'B32N|85|3||', '2023-04-15 13:16:33', 255),
(6, 'baloc12', 'XS315|35|3||CBP02|120|4||CTB01|90|3||', '2023-04-15 13:37:24', 855),
(7, 'baloc12', 'B32N|85|2||', '2023-04-15 13:38:30', 170),
(8, 'baloc12', 'B360NT|80|2||ARROW|100|3||', '2023-04-15 13:39:37', 460),
(9, 'baloc12', 'XS315|35|1||', '2023-04-15 13:40:19', 35),
(10, 'baloc12', 'B32N|85|1||', '2023-04-15 13:42:05', 85),
(11, 'quynhnhu', 'XS315|35|2||', '2023-04-19 11:02:01', 70);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_ID` varchar(40) NOT NULL,
  `pro_name` varchar(40) NOT NULL,
  `category_ID` varchar(40) NOT NULL,
  `pro_img` varchar(100) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `pro_des` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_ID`, `pro_name`, `category_ID`, `pro_img`, `price`, `pro_des`, `quantity`) VALUES
('pd1h', 'ARROW', 'h', 'ARROW.jpg', 100, '3/4 helmet', 1000),
('pd1s', 'CBP02', 's', 'CBP02.jpg', 120, 'Comfort Backpack 17lt', 1000),
('pd1wg', 'CRS01', 'wg', 'CRS01.jpg', 45, 'Givi Raincoat', 1000),
('pd2h', 'DOT', 'h', 'DOT.jpg', 100, '3/4 helmet', 1000),
('pd2s', 'CTB01', 's', 'CTB01.jpg', 90, 'Waterproof bag', 1000),
('pd2wg', 'CRS02EXY', 'wg', 'CRS02EXY.jpg', 55, 'Givi Raincoat', 1000),
('pd3c', 'B32N', 'c', 'B32N.jpg', 85, 'Volume: 32lt', 1000),
('pd3h', 'DUHO-BLACK', 'h', 'DUHO-BLACK.jpg', 90, '3/4 helmet', 1000),
('pd3s', 'EA100B', 's', 'EA100B.jpg', 115, 'Waterproof bag', 1000),
('pd3wg', 'CSV01', 'wg', 'CSV01.jpg', 60, 'Givi Raincoat', 1000),
('pd4h', 'ROMA', 'h', 'ROMA.jpg', 105, '3/4 helmet', 1000),
('pd4s', 'EA104B', 's', 'EA104B.jpg', 70, 'Waterproof bag', 1000),
('pd4wg', 'GRA01', 'wg', 'GRA01.jpg', 55, 'Givi Raincoat', 1000),
('pd5c', 'B32NB', 'c', 'B32NB.jpg', 80, 'Volume: 32lt', 1000),
('pd5h', 'ROMA-2', 'h', 'ROMA-2.jpg', 100, '3/4 helmet', 1000),
('pd5s', 'EA106B', 's', 'EA106B.jpg', 80, 'Waterproof bag', 1000),
('pd5wg', 'PRS04N', 'wg', 'PRS04N.jpg', 60, 'Givi Raincoat', 1000),
('pd6h', 'ROMA-BLACK', 'h', 'ROMA-BLACK.jpg', 110, '3/4 helmet', 1000),
('pd6s', 'EA124', 's', 'EA124.jpg', 50, 'Waterproof bag', 1000),
('pd7a', 'XS315', 'a', 'XS315.jpg', 35, 'Tool case pockets specifically designed for BMW R1200GS', 1000),
('pd7h', 'STRADA-1', 'h', 'STRADA-1.jpg', 110, '3/4 helmet', 1000),
('pd7s', 'RBP01', 's', 'RBP01.jpg', 60, 'Waterproof bag', 1000),
('pd8c', 'B360NT', 'c', 'B360NT.jpg', 80, 'Volume: 32lt', 1000),
('pd8h', 'STRADA-2', 'h', 'STRADA-3.jpg', 110, '3/4 helmet', 1000),
('pd8s', 'RBP02', 's', 'RBP02.jpg', 85, 'Waterproof bag', 1000),
('pd9c', 'E22N', 'c', 'E22N.jpg', 110, 'Volume: 32lt', 1000),
('pd9h', 'STRADA-3', 'h', 'STRADA-4.jpg', 110, '3/4 helmet', 1000),
('pd9s', 'RBP03', 's', 'RBP03.jpg', 75, 'Waterproof bag', 1000),
('wtg12', 'WTG', 'wg', 'CRS02EXY.jpg', 230, 'new coming product', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_ID`),
  ADD KEY `accound_ID` (`account_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
