-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 at 01:47 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books`
--
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `books`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Pencho Penchev'),
(2, 'Ivan Ivanov'),
(3, 'Stamat Stavrev'),
(4, 'Svetlin Nakov'),
(5, 'Douglas Crockford'),
(6, 'John Resig'),
(14, 'Mariq Kiflata'),
(13, 'NIki Tupoto'),
(15, 'Цветанка Ризова'),
(21, 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(250) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`) VALUES
(1, 'CS Fundamentals'),
(2, 'JavaScript-The Good Parts'),
(3, 'Secrets of The JS Ninja'),
(4, 'Аз обичам цветята'),
(44, 'aaaaaa'),
(43, 'Праскови в полето'),
(42, 'Под игото'),
(41, 'Моят малък трактор');

-- --------------------------------------------------------

--
-- Table structure for table `books_authors`
--

CREATE TABLE IF NOT EXISTS `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(3, 6),
(4, 1),
(4, 2),
(0, 0),
(4, 4),
(0, 14),
(0, 3),
(0, 4),
(41, 14),
(41, 13),
(42, 3),
(42, 4),
(42, 14),
(42, 15),
(43, 5),
(43, 6),
(43, 15),
(44, 21);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL,
  `book_title` varchar(100) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_name`, `comment`, `datetime`, `book_title`) VALUES
(30, 'Niki', 'Ц# е моята любима книга, Наков президент!', '2014-04-21 13:42:01', 'CS Fundamentals'),
(29, 'Niki', 'Petre, mou si prost', '2014-04-21 13:39:34', 'CS Fundamentals'),
(28, 'Petar', 'Ebasi tupata knigaaa, Ebasi tupata knigaaa\r\nEbasi tupata knigaaa\r\nEbasi tupata knigaaa', '2014-04-21 13:38:48', 'CS Fundamentals'),
(27, 'Niki', 'Mnou qka', '2014-04-21 12:59:50', 'Secrets of The JS Ninja'),
(26, 'Niki', 'ssss', '2014-04-21 12:57:48', 'Secrets of The JS Ninja'),
(31, 'Niki', 'Иван Вазов я е писал тая. Май.', '2014-04-21 13:44:23', 'Под игото'),
(32, 'Niki', 'аааааа', '2014-04-21 13:45:04', 'aaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(2, 'Niki', '587c8d2a43ec581df67365aac7ed819f'),
(3, 'Ivan', '2c42e5cf1cdbafea04ed267018ef1511'),
(4, 'Petar', '6c43c0a88fbf0f44ba944d00524e45c3'),
(5, 'Kolio', '4ac37ffd8e0694befc66b3847d76dba7'),
(6, 'Stavri', 'd178c34758fdda8e18c91e14b11117b8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
