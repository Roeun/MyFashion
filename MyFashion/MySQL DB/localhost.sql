-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2012 at 11:24 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myfashion`
--
CREATE DATABASE `myfashion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myfashion`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cmt` varchar(1000) NOT NULL,
  `cmtdate` datetime NOT NULL,
  `isenable` varchar(1) NOT NULL DEFAULT '1',
  `isdelete` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `extensionallows`
--

CREATE TABLE `extensionallows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exname` varchar(20) NOT NULL,
  `exdes` varchar(500) NOT NULL,
  `isenable` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ldes` varchar(500) NOT NULL,
  `likedate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(500) NOT NULL,
  `pdes` varchar(1000) NOT NULL,
  `postdate` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `pdata` longblob NOT NULL,
  `isenable` varchar(1) NOT NULL DEFAULT '1',
  `isdelete` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `rdate` date NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `isenable` varchar(1) NOT NULL DEFAULT '1',
  `isdelete` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pwd`, `email`, `gender`, `rdate`, `dob`, `phone`, `picture`, `isenable`, `isdelete`) VALUES
(1, 'Bunchheang', '12345', 'moonbunchheang@gmail.com', 'Male', '0000-00-00', '2012-10-15', '077841374', '', '1', '0'),
(2, 'Chanthou', '123456', 'chanthou@gmail.com', '2', '2012-10-15', '1992-10-15', '', '', '1', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
