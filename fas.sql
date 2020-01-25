-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2020 at 04:36 PM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fash`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE IF NOT EXISTS `like_unlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `userid`, `postid`, `type`, `timestamp`) VALUES
(5, 17, 22, 1, '2020-01-24 20:54:43'),
(6, 17, 23, 0, '2020-01-24 20:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE IF NOT EXISTS `tblaccount` (
  `accnt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`accnt_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accnt_Id`, `username`, `password`, `user_Id`, `email`) VALUES
(12, 'DevP', 'fe946ce5c0f3f9e19dc0cd49a824f5fb', 17, 'Oladeleprecious013@gmail.com'),
(13, 'DevPrr', '9f3e6c00c9df3f297030ec522cfb4e0f', 18, 'Oladelep77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE IF NOT EXISTS `tblpost` (
  `post_Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL,
  PRIMARY KEY (`post_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_Id`, `title`, `image`, `datetime`, `user_Id`) VALUES
(22, 'Best shoeðŸ’žðŸ’ž', 'FB_IMG_15798778323319664.jpg', '2020-01-25 02:06:49', 17),
(23, 'New shoe ðŸ˜ŽðŸ˜Ž', 'FB_IMG_15798918919063498.jpg', '2020-01-25 02:07:13', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tblprof`
--

CREATE TABLE IF NOT EXISTS `tblprof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `image_p` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblprof`
--

INSERT INTO `tblprof` (`id`, `user`, `image_p`) VALUES
(2, '17', 'IMG_20200121_113844.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_Id`, `fname`, `lname`, `gender`) VALUES
(17, 'Precious', 'Oladele', '1'),
(18, 'Oladele', 'Dev', 'Female');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
