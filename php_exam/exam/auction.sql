-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 09:22 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auction`
--
CREATE DATABASE IF NOT EXISTS `auction` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auction`;

-- --------------------------------------------------------

--
-- Table structure for table `auction_prices`
--

CREATE TABLE IF NOT EXISTS `auction_prices` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` int(11) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `auction_prices`
--

INSERT INTO `auction_prices` (`price_id`, `auction_id`, `user_id`, `price`, `date_added`) VALUES
(1, 1, 2, 44, 0),
(2, 2, 2, 44, 0),
(3, 1, 2, 555, 0),
(4, 2, 1, 12, 0),
(5, 5, 1, 33, 0),
(6, 22, 2, 33, 1398259189),
(7, 9, 2, 2, 1398259371),
(8, 10, 2, 1, 1398265773),
(17, 5, 2, 11, 1398273212),
(16, 5, 2, 11, 1398273173),
(15, 5, 2, 11, 1398273168),
(14, 5, 2, 12, 1398273123),
(13, 10, 2, 110, 1398272833),
(18, 5, 2, 444, 1398273217),
(19, 5, 2, 666, 1398273921),
(20, 2, 2, 56, 1398274156),
(21, 2, 2, 56, 1398274160),
(22, 2, 2, 77, 1398274309),
(23, 9, 2, 5, 1398274357),
(24, 9, 2, 8, 1398274383),
(25, 9, 2, 9, 1398274431),
(26, 9, 2, 11, 1398274449),
(27, 5, 2, 888, 1398274461),
(28, 11, 2, 12, 1398274555),
(29, 11, 2, 33, 1398274572),
(30, 9, 2, 12, 1398274582);

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE IF NOT EXISTS `auctions` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `minimum_price` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `action_title` varchar(250) NOT NULL,
  `auction_desc` text NOT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`auction_id`, `user_id`, `date_created`, `minimum_price`, `date_end`, `action_title`, `auction_desc`) VALUES
(1, 2, 1398244039, 22, 1418342400, 'Вестник', '...за жената'),
(2, 2, 1398244126, 3, 1418342400, 'Топче', 'за тенис на маса'),
(4, 2, 1398245903, 11, 1398816000, 'Швепс', 'лемон и киви'),
(5, 1, 1398245903, 2, 1399255903, 'Хвърчило', 'Лети в небето'),
(6, 2, 1398258778, 122, 1398470400, 'Колело', 'Голямо колело'),
(7, 2, 1398258963, 1, 1398384000, 'Чорапи', 'вълнени....'),
(8, 2, 1398259189, 33, 1398470400, 'сдфсдфсдф', 'сдфсдфсдфсдфсдфсдф'),
(9, 2, 1398259371, 2, 1398384000, 'Салам', 'Шпеков с черен пипер'),
(10, 2, 1398265773, 1, 1398297600, 'Царевица', 'алал аа сасба'),
(11, 2, 1398274555, 12, 1398729600, 'Гардероб', 'Трикуиуен');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_registered` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `date_registered`) VALUES
(1, 'test@test.com', '4de4d95fc854e7883bec112a191c867c0678ca42', 1386144335),
(2, 'ndvalkov@abv.bg', '7ae13833b36b8300af5464d5e907810ec2080b4d', 1398237047);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
