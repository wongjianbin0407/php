-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2025 at 10:21 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `firstname`, `lastname`, `gender`, `dob`, `registration_date`, `account_status`) VALUES
('wong1234', 'verysafetypassword', 'Ng', 'Simon', 'male', '2002-07-04', '2024-12-18 09:42:17', 0),
('MCGeneral', 'w1234', 'Wong', 'Joshua', 'male', '1998-06-25', '2025-01-08 13:18:17', 1),
('admin', '11223344', 'Lim', 'Howard', 'male', '1992-02-06', '2025-02-12 14:20:50', 1),
('lotus', '11223344', 'Ong', 'Sam', 'female', '2000-12-01', '2025-02-12 14:21:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` int NOT NULL,
  `price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `manufacture_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `price`, `promotion_price`, `manufacture_date`, `expired_date`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, 49.99, 50, '2026-01-01', '2025-02-14', '2015-08-02 12:04:03', '2025-02-12 06:49:26'),
(3, 'Gatorade', 'This is a very good drink for athletes.', 1, 1.99, 0, '2024-12-25', '0000-00-00', '2015-08-02 12:14:29', '2025-01-05 15:05:32'),
(4, 'Eye Glasses', 'It will make you read better.', 6, 6, 0, '2024-10-20', '0000-00-00', '2015-08-02 12:15:04', '2025-01-05 15:05:43'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 6, 3.95, 0, '2024-06-07', '0000-00-00', '2015-08-02 12:16:08', '2025-01-05 15:05:57'),
(6, 'Mouse', 'Very useful if you love your computer.', 5, 11.35, 0, '2024-10-12', '0000-00-00', '2015-08-02 12:17:58', '2025-01-05 15:06:15'),
(7, 'Earphone', 'You need this one if you love music.', 4, 7, 0, '2024-11-10', '0000-00-00', '2015-08-02 12:18:21', '2025-01-05 15:06:26'),
(8, 'Pillow', 'Sleeping well is important.', 6, 8.99, 0, '2024-09-27', '2025-02-20', '2015-08-02 12:18:56', '2025-01-15 07:17:46'),
(10, 'earphone (IEM)', 'in-ear monitor', 9, 99.9, 10, '2024-09-04', '2025-02-26', '2024-12-13 02:35:36', '2025-01-15 06:40:36'),
(12, 'Headset', 'for gamer use', 0, 99.9, 0, '2025-02-13', '2025-02-14', '2025-02-12 06:47:11', '2025-02-12 06:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL,
  `product_cat_name` varchar(128) NOT NULL,
  `product_cat_description` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'Sport', ''),
(2, 'Mobile', ''),
(3, 'Laptop', ''),
(4, 'Headphone', ''),
(5, 'Accessories', ''),
(6, 'General', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
