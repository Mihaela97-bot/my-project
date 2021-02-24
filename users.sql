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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `SerialNumber` double NOT NULL,
  `gender` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CardID` double NOT NULL,
  `CardID_select` tinyint(1) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `birth_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Mobile_phone` int(100) NOT NULL,
  `role` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `SerialNumber`, `gender`, `CardID`, `CardID_select`, `name`, `lastname`, `password`, `birth_date`, `address`, `city`, `country`, `Mobile_phone`, `role`) VALUES
(112, 'Zaposlenik1', 1, 'M', 162336028, 0, 'Osoba1', 'Osoba1', '1111', '1991-01-01', 'Ul.Matije Gupca 12', 'Zabok', 'Hrvatska', 98767936, 'zaposlenik'),
(113, 'Zaposlenik2', 2, 'Å½', 41299972, 0, 'Osoba2', 'Osoba2', '2222', '1994-08-18', 'Ul.Ante KovaÄiÄ‡a 21', 'Zabok', 'Hrvatska', 913683548, 'zaposlenik'),
(0, 'Admin', 0, '', 0, 0, '', '', 'admin', '', '', '', '', 0, 'admin'),
(117, 'Zaposlenik3', 3, 'M', 2101691114, 0, 'Osoba3', 'Osoba3', '3333', '1994-02-27', 'Ul.Ivana RendiÄ‡a 45', 'Krapina', 'Hrvatska', 919947723, 'zaposlenik'),
(118, 'Zaposlenik4', 4, 'Å½', 415619385, 0, 'Osoba4', 'Osoba4', '4444', '1992-05-15', 'Ul. Ksavera Å andora Gjalskog', 'Zabok', 'Hrvatska', 981237123, 'zaposlenik'),
(119, 'Zaposlenik5', 5, 'Å½', 16279428, 0, 'Osoba5', 'Osoba5', '5555', '1990-01-01', 'Ul. Josipa Juraja Strossmayera', 'Zabok', 'Hrvatska', 997686613, 'zaposlenik'),
(127, 'Zaposlenik6', 6, 'M', 1461886728, 0, 'Osoba6', 'Osoba6', '6666', '1992-01-29', 'Ul.Antuna MIhanoviÄ‡a 13', 'BedekovÄina', 'Hrvatska', 981182538, 'zaposlenik');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
