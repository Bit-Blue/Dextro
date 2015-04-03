-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2015 at 06:31 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sch`
--

CREATE TABLE IF NOT EXISTS `admin_sch` (
  `uname` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `p_num` int(20) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sch`
--

INSERT INTO `admin_sch` (`uname`, `pwd`, `type`, `Name`, `p_num`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin', 123456789),
('jimeet', '827ccb0eea8a706c4c34a16891f84e7b', 'School', 'jimeet', 2147483647),
('ravi', '81dc9bdb52d04dc20036dbd8313ed055', 'School', 'Ravindra', 2147483647),
('user', '827ccb0eea8a706c4c34a16891f84e7b', 'School', 'suresh', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `adm_sch_tran`
--

CREATE TABLE IF NOT EXISTS `adm_sch_tran` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bal_amt`
--

CREATE TABLE IF NOT EXISTS `bal_amt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Gr_num` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `bal` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Gr_num` (`Gr_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bonafide`
--

CREATE TABLE IF NOT EXISTS `bonafide` (
  `sr_no` int(50) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `FatherName` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `std` varchar(50) NOT NULL,
  `religion` varchar(56) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clg_class`
--

CREATE TABLE IF NOT EXISTS `clg_class` (
  `Medium` varchar(100) NOT NULL DEFAULT '',
  `Course` varchar(100) NOT NULL DEFAULT '',
  `Std` varchar(40) NOT NULL DEFAULT '',
  `no_of_div` varchar(50) DEFAULT NULL,
  `timestamp` time DEFAULT NULL,
  PRIMARY KEY (`Medium`,`Course`,`Std`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clg_cls_fee`
--

CREATE TABLE IF NOT EXISTS `clg_cls_fee` (
  `Medium` varchar(100) NOT NULL DEFAULT '',
  `Course` varchar(100) NOT NULL DEFAULT '',
  `Std` varchar(40) NOT NULL DEFAULT '',
  `fee_type` varchar(50) NOT NULL DEFAULT '',
  `fee` int(10) DEFAULT NULL,
  `lfee` int(10) DEFAULT NULL,
  `one_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Medium`,`Course`,`Std`,`fee_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clg_details`
--

CREATE TABLE IF NOT EXISTS `clg_details` (
  `Enroll` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `cont_num` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `docs` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `sub_caste` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `last_school` varchar(200) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `test` varchar(100) NOT NULL,
  `classf_Adm` varchar(100) NOT NULL,
  `classleft` varchar(100) NOT NULL,
  `date_f_adm` varchar(100) NOT NULL,
  `date_f_left` varchar(100) NOT NULL,
  `resaon` varchar(100) NOT NULL,
  `adhar_num` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Enroll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clg_tran`
--

CREATE TABLE IF NOT EXISTS `clg_tran` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Reciept`,`Gr_num`,`Month`,`fee_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disc_given`
--

CREATE TABLE IF NOT EXISTS `disc_given` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `sr_no` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `std` varchar(100) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `cont_num` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `off Address` varchar(500) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `docs` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `last_school` varchar(200) NOT NULL,
  `adhar_num` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` date NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `receipt_no` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `Key_p` varchar(100) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Logo` varchar(300) NOT NULL,
  PRIMARY KEY (`Key_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_attendance`
--

CREATE TABLE IF NOT EXISTS `sch_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grNum` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `presentDays` int(11) NOT NULL DEFAULT '0',
  `absentDays` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='used to store student attendance' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sch_class`
--

CREATE TABLE IF NOT EXISTS `sch_class` (
  `Medium` varchar(50) NOT NULL DEFAULT '',
  `Std` varchar(50) NOT NULL DEFAULT '',
  `no_of_div` int(11) DEFAULT NULL,
  `timestamp` time DEFAULT NULL,
  PRIMARY KEY (`Medium`,`Std`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_cls_fee`
--

CREATE TABLE IF NOT EXISTS `sch_cls_fee` (
  `Medium` varchar(50) NOT NULL DEFAULT '',
  `Std` varchar(50) NOT NULL DEFAULT '',
  `fee_type` varchar(50) NOT NULL DEFAULT '',
  `fee` int(11) DEFAULT NULL,
  `lfee` int(11) DEFAULT NULL,
  `one_time` varchar(10) NOT NULL,
  PRIMARY KEY (`Medium`,`Std`,`fee_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_details`
--

CREATE TABLE IF NOT EXISTS `sch_details` (
  `Gr_num` int(100) NOT NULL AUTO_INCREMENT,
  `Enroll` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `cont_num` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `off address` varchar(500) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `docs` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `last_school` varchar(200) NOT NULL,
  `adhar_num` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Gr_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sch_reciept`
--

CREATE TABLE IF NOT EXISTS `sch_reciept` (
  `id` int(11) NOT NULL DEFAULT '1',
  `Reciept` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Table structure for table `sch_tran`
--

CREATE TABLE IF NOT EXISTS `sch_tran` (
  `Reciept` varchar(100) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `bal` varchar(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `fee_type` varchar(30) NOT NULL,
  `pay_mode` varchar(20) NOT NULL,
  `cheque_num` int(20) NOT NULL,
  `lflag` varchar(10) NOT NULL,
  `late_fee` int(20) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Reciept`,`Gr_num`,`Month`,`fee_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_clg`
--

CREATE TABLE IF NOT EXISTS `user_clg` (
  `Enroll` varchar(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Medium` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `Std` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Gr_num` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Enroll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_sch`
--

CREATE TABLE IF NOT EXISTS `user_sch` (
  `Gr_num` int(100) NOT NULL AUTO_INCREMENT,
  `Enroll` varchar(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Medium` varchar(50) NOT NULL,
  `Std` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Gr_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
