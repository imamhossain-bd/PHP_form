-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 06:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `brandAdd` (IN `n` VARCHAR(100), IN `addr` VARCHAR(150), IN `con` VARCHAR(255))   BEGIN
INSERT INTO addbrand SET id = null, name = n, address = addr, contact = con;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productInsert` (IN `name` VARCHAR(100), IN `price` DECIMAL(10,2), IN `manufacturer_id` INT)   BEGIN
INSERT INTO insertproduct (id, name, price,	manufacturer_id)VALUES(null,name, price, manufacturer_id);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addbrand`
--

CREATE TABLE `addbrand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addbrand`
--

INSERT INTO `addbrand` (`id`, `name`, `address`, `contact`) VALUES
(1, 'Redmi', 'Dhaka', '0187165456'),
(3, 'Apple', 'Mirpur,Dhaka', '0187165456'),
(5, 'coky', 'Mirpur,Dhaka', '546456'),
(6, 'coky', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `details`
-- (See below for the actual view)
--
CREATE TABLE `details` (
`name` varchar(255)
,`contact` varchar(50)
,`i_name` varchar(255)
,`price` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `insertproduct`
--

CREATE TABLE `insertproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insertproduct`
--

INSERT INTO `insertproduct` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(1, 'phone', 25000.00, 1);

-- --------------------------------------------------------

--
-- Structure for view `details`
--
DROP TABLE IF EXISTS `details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `details`  AS SELECT `addbrand`.`name` AS `name`, `addbrand`.`contact` AS `contact`, `insertproduct`.`name` AS `i_name`, `insertproduct`.`price` AS `price` FROM (`addbrand` join `insertproduct`) WHERE `addbrand`.`id` = `insertproduct`.`manufacturer_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbrand`
--
ALTER TABLE `addbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertproduct`
--
ALTER TABLE `insertproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbrand`
--
ALTER TABLE `addbrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insertproduct`
--
ALTER TABLE `insertproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
