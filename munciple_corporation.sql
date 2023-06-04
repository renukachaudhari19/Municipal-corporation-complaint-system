-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2023 at 10:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `munciple_corporation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `username` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `application_type` varchar(999) NOT NULL,
  `uploaded_by` varchar(111) NOT NULL,
  `Full_name` varchar(999) NOT NULL,
  `email_id` varchar(999) NOT NULL,
  `dob` varchar(999) NOT NULL,
  `address` varchar(999) NOT NULL,
  `pincode` varchar(999) NOT NULL,
  `city` varchar(999) NOT NULL,
  `phone` varchar(999) NOT NULL,
  `application_file` varchar(999) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ID`, `application_type`, `uploaded_by`, `Full_name`, `email_id`, `dob`, `address`, `pincode`, `city`, `phone`, `application_file`, `status`, `dt`) VALUES
(12, 'Water Supply Services', 'tissa@gmail.com', 'Kushal Dhole', 'kushaldhole@hotmail.com', '2002-02-04', 'Farshi Stop Amravati', '444606', 'Amravati', '9890546711', '11272022101440-Desert.jpg', 'Completed', '2023-02-27 21:28:57'),
(13, 'Gas Services', 'tissa@gmail.com', 'Kushal Dhole', 'kushaldhole@hotmail.com', '2023-02-21', 'Farshi Stop Amravati\r\nrrtyty', '444606', 'Amravati', '09890546711', '02272023162003-autosave.jpg', '', '2023-02-22 20:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `application_response`
--

CREATE TABLE IF NOT EXISTS `application_response` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(111) NOT NULL,
  `response` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `application_response`
--

INSERT INTO `application_response` (`ID`, `app_id`, `response`, `dt`) VALUES
(1, '8', 'asd', '2022-06-23 13:58:20'),
(2, '8', 'asd', '2022-06-23 13:59:33'),
(3, '8', 'asd', '2022-06-23 14:00:05'),
(4, '8', 'asd', '2022-06-23 14:00:37'),
(5, '8', 'asd', '2022-06-23 14:00:51'),
(6, '8', 'asd', '2022-06-23 14:01:21'),
(7, '8', 'asd', '2022-06-23 14:01:28'),
(8, '12', 'as dasd fasdfa  eaasdf', '2023-02-27 20:51:12'),
(9, '12', 'aserwe', '2023-02-27 21:05:59'),
(10, '12', 'sdf', '2023-02-27 21:06:10'),
(11, '12', 'dfgdfg', '2023-02-27 21:06:20'),
(12, '12', 'rtdfg', '2023-02-27 21:06:26'),
(13, '12', 'sdf', '2023-02-27 21:28:13'),
(14, '12', 'sdf', '2023-02-27 21:28:37'),
(15, '12', 'sdfsf', '2023-02-27 21:28:57'),
(16, '12', 'sdfsf', '2023-02-27 21:31:22'),
(17, '12', 'sdfsf', '2023-02-27 21:31:40'),
(18, '12', 'sdfsf', '2023-02-27 21:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE IF NOT EXISTS `register_users` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `name` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  `Income` varchar(999) NOT NULL,
  `dob` varchar(999) NOT NULL,
  `gender` varchar(999) NOT NULL,
  `Mobile` varchar(999) NOT NULL,
  `Address` varchar(999) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`ID`, `name`, `Email`, `password`, `Income`, `dob`, `gender`, `Mobile`, `Address`, `dt`) VALUES
(6, 'Tissa', 'tissa@gmail.com', 'tissa123', '500000', 'Amravati', 'male', '9898989898', 'Irwin, Amravati', '2022-11-27 14:41:43');
