-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2014 at 12:29 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tastdb`
--
CREATE DATABASE IF NOT EXISTS `tastdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tastdb`;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `date` datetime NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`date`, `user_name`, `message`, `title`) VALUES
('2014-04-13 12:05:31', 'Pencho', 'Ни мъ кефи нещо', 'Бира сутрин'),
('2014-04-13 12:06:41', 'Pencho', 'Трябва да измия чиниите...', 'Мама'),
('2014-04-13 12:08:40', 'Nikolaicho', 'alabal dsad rarrrfl df', 'dsdsd'),
('2014-04-13 12:14:44', 'Nikolaicho', 'sssasas', 'ssss'),
('2014-04-13 12:19:18', 'Stochkov', 'sss', 'ffff'),
('2014-04-13 12:20:44', 'Petar', 'aaaa', 'dddd'),
('2014-04-13 12:23:14', 'Nikoliacho', 'Kak!&lt;script&gt;hack-ni-ma-ako-moish&lt;script&gt;# &quot;&quot; drop database', 'zdrasti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(1, 'Nikolaicho', 'niki'),
(2, 'Kolito', 'kolito'),
(3, 'Pencho', '111'),
(4, 'Pencho2', '444'),
(5, 'Ivancho', '111'),
(6, 'Mariika', '333'),
(7, 'Stochkov', 'kaput'),
(8, 'Johny', 'cash'),
(9, 'Petar', '55'),
(10, 'Nikoliacho', 'niki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
