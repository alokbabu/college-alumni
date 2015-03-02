-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 12:23 PM
-- Server version: 5.1.57-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `batch` year(4) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batch_course`
--

CREATE TABLE IF NOT EXISTS `batch_course` (
  `batch_courseid` int(11) NOT NULL AUTO_INCREMENT,
  `batchid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  PRIMARY KEY (`batch_courseid`),
  KEY `indxbatch` (`batchid`),
  KEY `indxcourse` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(30) NOT NULL,
  `did` int(10) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `indxdep` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coverphoto`
--

CREATE TABLE IF NOT EXISTS `coverphoto` (
  `photoid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`photoid`),
  KEY `indxst` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `securityqtn` varchar(50) NOT NULL,
  `securityans` varchar(50) NOT NULL,
  PRIMARY KEY (`loginid`),
  UNIQUE KEY `indxuser` (`username`),
  KEY `indxst` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `fromid` int(20) NOT NULL,
  `toid` int(20) NOT NULL,
  `messages` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `indxfrom` (`fromid`),
  KEY `indxto` (`toid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `propic`
--

CREATE TABLE IF NOT EXISTS `propic` (
  `picid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`picid`),
  KEY `indxst` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE IF NOT EXISTS `studentdetails` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(30) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `indxstu` (`studentid`),
  KEY `indxcourse` (`cid`),
  KEY `indxbatch` (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentstatus`
--

CREATE TABLE IF NOT EXISTS `studentstatus` (
  `statusid` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(20) NOT NULL,
  `sid` int(10) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`statusid`),
  KEY `indxst` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch_course`
--
ALTER TABLE `batch_course`
  ADD CONSTRAINT `batch_course_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `courses` (`cid`),
  ADD CONSTRAINT `batch_course_ibfk_1` FOREIGN KEY (`batchid`) REFERENCES `batch` (`bid`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`did`) REFERENCES `departments` (`did`);

--
-- Constraints for table `coverphoto`
--
ALTER TABLE `coverphoto`
  ADD CONSTRAINT `coverphoto_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `studentdetails` (`sid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `studentdetails` (`sid`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toid`) REFERENCES `studentdetails` (`sid`),
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fromid`) REFERENCES `studentdetails` (`sid`);

--
-- Constraints for table `propic`
--
ALTER TABLE `propic`
  ADD CONSTRAINT `propic_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `studentdetails` (`sid`);

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `batch` (`bid`),
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- Constraints for table `studentstatus`
--
ALTER TABLE `studentstatus`
  ADD CONSTRAINT `studentstatus_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `studentdetails` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
