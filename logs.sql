-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2019 at 07:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojabaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CardNumber` double DEFAULT NULL,
  `Name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `SerialNumber` double NOT NULL,
  `DateLog` date DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `UserStat` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `CardNumber`, `Name`, `SerialNumber`, `DateLog`, `TimeIn`, `TimeOut`, `UserStat`) VALUES
(306, 415619385, 'Zaposlenik4', 4, '2019-10-14', '06:55:43', '15:00:04', 'Rani dolazak  i odlazak na vrijeme'),
(300, 41299972, 'Zaposlenik2', 2, '2019-10-14', '07:00:03', '15:00:08', 'Kasni dolazak i odlazak na vrijeme'),
(276, 162336028, 'Zaposlenik1', 1, '2019-10-09', '11:51:53', '15:00:02', 'Kasni dolazak i odlazak na vrijeme'),
(317, 16279428, 'Zaposlenik5', 5, '2019-11-04', '07:02:00', '14:00:53', 'Kasni dolazak i rani odlazak'),
(301, 2101691114, 'Zaposlenik3', 3, '2019-10-14', '07:01:18', '15:02:08', 'Kasni dolazak i kasni odlazak'),
(299, 162336028, 'Zaposlenik1', 1, '2019-10-14', '06:51:18', '14:18:14', 'Rani dolazak  i rani odlazak'),
(245, 162336028, 'Zaposlenik1', 1, '2019-10-01', '06:59:23', '15:00:03', 'Rani dolazak i odlazak na vrijeme'),
(285, 41299972, 'Zaposlenik2', 2, '2019-10-01', '06:51:20', '15:00:18', 'Rani dolazak i odlazak na vrijeme'),
(286, 2101691114, 'Zaposlenik3', 3, '2019-10-01', '07:00:00', '15:00:04', 'Dolazak i odlazak na vrijeme'),
(296, 415619385, 'Zaposlenik4', 4, '2019-10-01', '07:00:00', '15:00:00', 'Dolazak i odlazak na vrijeme'),
(307, 16279428, 'Zaposlenik5', 5, '2018-10-01', '07:12:00', '14:50:53', 'Kasni dolazak i rani odlazak'),
(318, 1461886728, 'Zaposlenik6', 6, '2019-11-05', '16:31:15', '16:31:59', 'Kasni dolazak i odlazak na vrijeme'),
(319, 41299972, 'Zaposlenik2', 2, '2019-11-05', '19:39:23', '19:40:35', 'Kasni dolazak i odlazak na vrijeme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
