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
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `to_date` varchar(50) NOT NULL,
  `Note` mediumtext,
  `NoteDate` varchar(100) DEFAULT NULL,
  `approval` int(1) NOT NULL,
  `user_name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `type`, `description`, `status`, `date`, `leave_type`, `from_date`, `to_date`, `Note`, `NoteDate`, `approval`, `user_name`) VALUES
(80, 'message', 'Sed ut perspiciatis unde omnis iste natus error ', 'read', '2019-10-22 12:33:34', 'GodiÅ¡nji odmor', '2019-11-11', '2019-11-21', 'odobreno', '24-10-2019, 14:50', 1, 112),
(81, 'message', 'totam rem aperiam, eaque ipsa quae ab illo ', 'read', '2019-10-22 12:34:04', 'Slobodni dani', '2019-10-23', '2019-10-28', 'magni dolores eos qui ratione volup', '25-10-2019,12:19', 2, 113),
(82, 'message', 'sit voluptatem accusantium doloremque laudantium', 'read', '2019-10-22 12:34:31', 'Slobodni dani', '2019-11-03', '2019-11-05', 'ghjklÄÄ‡', '29-10-2019, 18:38', 1, 117),
(83, 'message', 'Nemo enim ipsam voluptatem quia voluptas sit', 'read', '2019-10-23 12:26:20', 'GodiÅ¡nji odmor', '2019-11-01', '2019-12-01', NULL, NULL, 0, 119),
(84, 'message', 'aspernatur aut odit aut fugit, sed quia consequuntur', 'read', '2019-10-24 11:31:24', 'Slobodni dani', '2019-10-25', '2019-10-28', 'ne', '24-10-2019, 11:32', 2, 118),
(85, 'message', 'Sed ut perspiciatis unde omnis iste natus error', 'read', '2019-10-25 12:59:10', 'GodiÅ¡nji odmor', '2019-10-27', '2019-11-13', NULL, NULL, 0, 113),
(86, 'message', 'At vero eos et accusamus et iusto', 'read', '2019-10-26 19:44:22', 'Slobodni dani', '2019-10-27', '2019-10-30', 'similique sunt in culp', '26-10-2019, 19:46', 2, 119),
(87, 'message', 'um fuga. Et harum quidem rerum', 'read', '2019-11-05 19:20:31', 'GodiÅ¡nji odmor', '2019-11-07', '2019-11-11', ' Nam libero tempore, cum soluta nobis ', '05-11-2019, 19:21', 1, 127);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
