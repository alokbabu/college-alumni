-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2015 at 10:20 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college_alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` year(4) NOT NULL,
  `to` year(4) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `from`, `to`) VALUES
(1, 2008, 2012);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(1, 'MAC');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course`, `department_id`) VALUES
(1, 'MCA', 1),
(2, 'BCA', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(1, 'Computer science'),
(2, 'Electronics');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `student_id`, `username`, `password`, `email`, `security_qtn`, `security_ans`, `email_validation_token`, `password_reset_token`) VALUES
(1, NULL, 'tt', 'accc9105df5383111407', 'tintuchacko2012@gmail.com', NULL, NULL, '0cSSpMZkzJsB4ND90bnWZC0r6knEW0', NULL),
(3, NULL, '', 'd41d8cd98f00b204e980', 'feeba@gmail.com', NULL, NULL, '1AL9Vlv0qBnXuX7nAwW5GRxse5ajeM', NULL),
(7, NULL, 'mmmmmmmmmmm', 'b3cd915d758008bd19d0', 'm@gmail.com', NULL, NULL, 'eXNdk03p9azlF43mkNKj6Vnwuy7Rqi', NULL),
(10, NULL, 'anu12345', '89a4b5bd7d02ad1e342c960e6a98365c', 'anu@gmail.com', NULL, NULL, '2xCdyIlmq9XmBqbzxEeQfqPvaObpgq', NULL),
(11, NULL, 'feba', '632c7ff0cb6a7c73813d26c45ffa1bcf', 'feba@gmail.com', NULL, NULL, 'kfzBMXCqz4JHwyu80T1YR2UUpsdbw7', NULL);

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
  `gender` tinyint(1) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `course_id` int(10) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `about` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `indxstu` (`college_id`),
  KEY `indxcourse` (`course_id`),
  KEY `indxbatch` (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `college_id`, `firstname`, `lastname`, `gender`, `address`, `phone`, `email`, `course_id`, `batch_id`, `company`, `position`, `about`) VALUES
(4, 1, 'tintu', 'chacko', 1, 'tintu_address', '9400777853', 'tintuchacko2012@gmai', 1, 1, 'nextuz', 'software trainee', 'tttttttttttt');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch_course`
--
ALTER TABLE `batch_course`
  ADD CONSTRAINT `batch_course_ibfk_1` FOREIGN KEY (`batchid`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `batch_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

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
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_student_id`) REFERENCES `student` (`student_id`);

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
