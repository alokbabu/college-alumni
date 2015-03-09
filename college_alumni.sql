-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 08:59 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `college-alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
`batch_id` int(11) NOT NULL,
  `batch_year` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_year`) VALUES
(1, '2000-2002');

-- --------------------------------------------------------

--
-- Table structure for table `batch_course`
--

CREATE TABLE `batch_course` (
`batch_courseid` int(11) NOT NULL,
  `batchid` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_course`
--

INSERT INTO `batch_course` (`batch_courseid`, `batchid`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
`college_id` int(11) NOT NULL,
  `college_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(1, 'MAC');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
`course_id` int(11) NOT NULL,
  `course` varchar(30) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

CREATE TABLE `cover_photo` (
`photo_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `cover_photo_url` varchar(100) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
`department_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

CREATE TABLE `login` (
`login_id` int(11) NOT NULL,
  `student_id` int(10) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `security_qtn` varchar(50) DEFAULT NULL,
  `security_ans` varchar(50) DEFAULT NULL,
  `email_validation_token` varchar(200) DEFAULT NULL,
  `password_reset_token` varchar(200) DEFAULT NULL,
  `has_email_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `student_id`, `username`, `password`, `email`, `security_qtn`, `security_ans`, `email_validation_token`, `password_reset_token`, `has_email_verified`) VALUES
(15, NULL, 'alokbabu', '1842513d47562e58acb599096b718acb', 'alokbabu@nextuz.com', NULL, NULL, '253YMi4Y7Y75mxM7F1fIIALrqF8wrq', NULL, 0),
(16, NULL, 'john', '09e1fcd206fb25420df958d24b610d29', 'tom@nextuz.com', NULL, NULL, 'CNuOhYNPd4GC3BkjjliKDPc4nH0miX', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
`message_id` int(11) NOT NULL,
  `from_student_id` int(20) NOT NULL,
  `to_student_id` int(20) NOT NULL,
  `message` varchar(600) NOT NULL,
  `datetime_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
`profile_pic_id` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `prof_pic_url` varchar(200) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_message`
--

CREATE TABLE `status_message` (
`status_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(2000) NOT NULL,
  `datetime_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_message`
--

INSERT INTO `status_message` (`status_id`, `username`, `status`, `datetime_updated`) VALUES
(19, 'alokbabu', 'Hello world this is my status message.', '2015-03-09 20:37:40'),
(23, 'john', 'Hey first time here. ! Feeling good. !', '2015-03-09 20:55:12'),
(24, 'john', 'Here is another update from me. !', '2015-03-09 20:56:01'),
(25, 'john', 'The sun is shining. !', '2015-03-09 20:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
`student_id` int(11) NOT NULL,
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
  `about` varchar(800) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `college_id`, `firstname`, `lastname`, `gender`, `address`, `phone`, `email`, `course_id`, `batch_id`, `company`, `position`, `about`) VALUES
(16, 1, 'Alok', 'Babu', 0, 'vellemcheril', '8281246907', 'alokbabu@nextuz.com', 1, 1, 'Nextuz', 'CEO', 'This is about me'),
(17, 1, 'John', 'Xavier', 0, 'JohnHOme', '8281246907', 'tom@nextuz.com', 1, 1, 'Dell', 'Marketer', 'Hello, I am John');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
 ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batch_course`
--
ALTER TABLE `batch_course`
 ADD PRIMARY KEY (`batch_courseid`), ADD KEY `indxbatch` (`batchid`), ADD KEY `indxcourse` (`course_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
 ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`), ADD KEY `indxdep` (`department_id`);

--
-- Indexes for table `cover_photo`
--
ALTER TABLE `cover_photo`
 ADD PRIMARY KEY (`photo_id`), ADD KEY `indxst` (`student_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`login_id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `indxst` (`student_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`message_id`), ADD KEY `indxfrom` (`from_student_id`), ADD KEY `indxto` (`to_student_id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
 ADD PRIMARY KEY (`profile_pic_id`), ADD KEY `indxst` (`student_id`);

--
-- Indexes for table `status_message`
--
ALTER TABLE `status_message`
 ADD PRIMARY KEY (`status_id`), ADD KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD KEY `indxcourse` (`course_id`), ADD KEY `indxbatch` (`batch_id`), ADD KEY `indxstu` (`college_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `batch_course`
--
ALTER TABLE `batch_course`
MODIFY `batch_courseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cover_photo`
--
ALTER TABLE `cover_photo`
MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
MODIFY `profile_pic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_message`
--
ALTER TABLE `status_message`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
-- Constraints for table `status_message`
--
ALTER TABLE `status_message`
ADD CONSTRAINT `status_message_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`);
