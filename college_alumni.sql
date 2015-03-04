-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 10:32 AM
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
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` year(4) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batch_course`
--

CREATE TABLE IF NOT EXISTS `batch_course` (
  `batch_courseid` int(11) NOT NULL AUTO_INCREMENT,
  `batchid` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`batch_courseid`),
  KEY `indxbatch` (`batchid`),
  KEY `indxcourse` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(100) NOT NULL,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(30) NOT NULL,
  `department_id` int(10) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `indxdep` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo`
--

CREATE TABLE IF NOT EXISTS `cover_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `cover_photo_url` varchar(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `indxst` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `security_qtn` varchar(50) DEFAULT NULL,
  `security_ans` varchar(50) DEFAULT NULL,
  `email_validation_token` varchar(200) DEFAULT NULL,
  `password_reset_token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `indxst` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `student_id`, `username`, `password`, `email`, `security_qtn`, `security_ans`, `email_validation_token`, `password_reset_token`) VALUES
(1, NULL, 'merinjeev88', '1a1dc91c907325c69271ddf0c944bc72', 'merinjeev@gmail.com', NULL, NULL, '7yGDPyZAGdjTOLvuMVTTHUm19rcneJ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_student_id` int(20) NOT NULL,
  `to_student_id` int(20) NOT NULL,
  `message` varchar(600) NOT NULL,
  `datetime_sent` datetime NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `indxfrom` (`from_student_id`),
  KEY `indxto` (`to_student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE IF NOT EXISTS `profile_pic` (
  `profile_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(20) NOT NULL,
  `prof_pic_url` varchar(200) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`profile_pic_id`),
  KEY `indxst` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_status_message`
--

CREATE TABLE IF NOT EXISTS `profile_status_message` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `indxst` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(10) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `course_id` int(10) NOT NULL,
  `batch_id` int(10) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `indxstu` (`college_id`),
  KEY `indxcourse` (`course_id`),
  KEY `indxbatch` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch_course`
--
ALTER TABLE `batch_course`
  ADD CONSTRAINT `batch_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `batch_course_ibfk_1` FOREIGN KEY (`batchid`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD CONSTRAINT `cover_photo_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD CONSTRAINT `profile_pic_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `profile_status_message`
--
ALTER TABLE `profile_status_message`
  ADD CONSTRAINT `profile_status_message_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
