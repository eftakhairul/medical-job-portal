-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2012 at 11:57 AM
-- Server version: 5.1.56
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ishuvo12_medical`
--

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `types`, `title`, `description`, `create_date`, `upated_date`) VALUES
(3, 7, 'nurse', 'test1', 'test1', '2012-01-02', '0000-00-00 00:00:00'),
(4, 7, 'nurse', 'test4', 'test4', '2012-01-02', '0000-00-00 00:00:00'),
(5, 7, 'nurse', 'test5', 'test5', '2012-01-02', '0000-00-00 00:00:00'),
(6, 7, 'nurse', 'test6', 'test6', '2012-01-02', '0000-00-00 00:00:00'),
(7, 7, 'nurse', 'test7', 'test7', '2012-01-02', '0000-00-00 00:00:00'),
(8, 7, 'nurse', 'test8', 'test8', '2012-01-02', '0000-00-00 00:00:00'),
(9, 7, 'nurse', 'test9', 'test9', '2012-01-02', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
