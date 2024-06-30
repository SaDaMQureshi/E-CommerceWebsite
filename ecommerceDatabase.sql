-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 07:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(12) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `Province` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Area` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `Username`, `Email`, `password`, `Image`, `MobileNo`, `Birthday`, `Gender`, `FullName`, `PhoneNo`, `Province`, `City`, `Area`, `Address`) VALUES
(4, 'Sadam Qureshi', 'pirsadam05@gmail.com', 'hellosadam', 'uwp3659764.webp', '5609341', '2001-11-24', 'Men', 'Pir Sadam Qureshi', '456789', 'Sindh', 'Jamshoro', 'Alan Faqeer Chok', 'Jamshoro'),
(5, 'Waqar Soomro', 'waqar09@gmail.com', 'hello', 'uwp3659764.webp', NULL, NULL, NULL, 'Waqar Soomro', '345678', 'Sindh', 'Nawbashsha', 'dolatColoney', 'Nawabshah');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `productSize` int(11) DEFAULT NULL,
  `productQuanitity` int(11) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `paymentMethod` varchar(20) DEFAULT NULL,
  `productPrize` int(11) DEFAULT NULL,
  `TotalProductAmount` int(11) DEFAULT NULL,
  `shippingFee` int(11) DEFAULT NULL,
  `subTotal` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `UserId`, `ProductId`, `productSize`, `productQuanitity`, `FullName`, `Email`, `PhoneNo`, `Address`, `City`, `State`, `paymentMethod`, `productPrize`, `TotalProductAmount`, `shippingFee`, `subTotal`, `OrderDate`) VALUES
(1, 4, 6, 41, 1, 'Pir Sadam Qureshi', 'pirsadam05@gmail.com', '456789', 'Jamshoro', 'Jamshoro', 'Sindh', 'COD', 0, 0, 10, 0, '2023-06-24'),
(2, 4, 5, 42, 2, 'Pir Sadam Qureshi', 'pirsadam05@gmail.com', '456789', 'Jamshoro', 'Jamshoro', 'Sindh', 'COD', 0, 0, 10, 0, '2023-06-24'),
(3, 4, 6, 44, 3, 'Pir Sadam Qureshi', 'pirsadam05@gmail.com', '456789', 'Jamshoro', 'Jamshoro', 'Sindh', 'COD', 0, 0, 10, 0, '2023-06-24'),
(4, 4, 6, 42, 3, 'Pir Sadam Qureshi', 'pirsadam05@gmail.com', '456789', 'Jamshoro', 'Jamshoro', 'Sindh', 'COD', 135, 405, 10, 415, '2023-06-24'),
(5, 4, 6, 42, 3, 'Pir Sadam Qureshi', 'pirsadam05@gmail.com', '456789', 'Jamshoro', 'Jamshoro', 'Sindh', 'COD', 135, 405, 10, 415, '2023-06-24'),
(6, 5, 6, 42, 1, 'Waqar Soomro', 'waqar09@gmail.com', '345678', 'Nawabshah', 'Nawbashsha', 'Sindh', 'COD', 135, 135, 10, 145, '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name`, `Price`, `Description`, `Image`) VALUES
(5, 'Adidas Sport Sneaker', 145, 'Adidas Sport sneaker For Men Size 42', 'file.png'),
(6, 'Adidas Regular Sneakers', 135, 'Adidas Blue And Red Sneakers For Men Size 43', 'color-sport-sneaker.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
