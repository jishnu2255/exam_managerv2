-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 12:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `christ`
--

-- --------------------------------------------------------

--
-- Table structure for table `chair_conf`
--

CREATE TABLE `chair_conf` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `dt` date NOT NULL,
  `tim` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chair_conf`
--

INSERT INTO `chair_conf` (`id`, `eid`, `dt`, `tim`) VALUES
(5, 2, '2020-11-11', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_data`
--

CREATE TABLE `chapter_data` (
  `id` int(11) NOT NULL,
  `subid` varchar(150) NOT NULL,
  `chap_nme` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter_data`
--

INSERT INTO `chapter_data` (`id`, `subid`, `chap_nme`) VALUES
(1, '0', 'Chapter-1'),
(2, '2', 'Chapter-2'),
(3, 'CS101', 'ch1'),
(4, 'CS101', 'ch2'),
(5, 'CS101', 'ch3'),
(6, 'CS103', 'One'),
(7, 'CS103', 'Two'),
(8, 'CS104', 'ch1');

-- --------------------------------------------------------

--
-- Table structure for table `crs_info`
--

CREATE TABLE `crs_info` (
  `crsid` int(11) NOT NULL,
  `crs_nme` varchar(75) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `crs_info`
--

INSERT INTO `crs_info` (`crsid`, `crs_nme`, `st`) VALUES
(1, 'BSc', 1),
(2, 'BCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cxam_ansrkey`
--

CREATE TABLE `cxam_ansrkey` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `opt` text NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cxam_ansrkey`
--

INSERT INTO `cxam_ansrkey` (`id`, `qid`, `opt`, `ans`) VALUES
(68, 4, '', 0),
(69, 1, 'Electronic device', 1),
(70, 1, 'tv', 0),
(71, 1, 'radio', 0),
(72, 1, 'mixi', 0),
(73, 2, 'Multiple users schedule their time to use Web2.0 applications one by one', 1),
(74, 2, 'Multiple users schedule their time to use Web2.0 applications one by one', 0),
(75, 2, 'Web2.0 applications provide users with content rather than facilitating users to create it', 0),
(76, 2, 'Web2.0 applications use only static pages', 0),
(77, 3, 'Microsoft', 1),
(78, 3, 'Intel', 0),
(79, 3, 'Google', 0),
(80, 3, 'Apple', 0),
(81, 4, 'Servers, clients', 1),
(82, 4, 'Clients, servers', 0),
(83, 4, 'Applications, complex soft-wares', 0),
(84, 4, 'System software, application software', 0),
(85, 5, 'Frequently Asked Questions', 1),
(86, 5, 'Favourite Asked Questions', 0),
(87, 5, 'Favourite and Answered Questions', 0),
(88, 5, 'Frequently Answered Questions', 0),
(89, 6, 'a', 1),
(90, 6, 'b', 0),
(91, 6, 'c', 0),
(92, 6, 'd', 0),
(93, 7, 'a1', 1),
(94, 7, 'A2', 0),
(95, 7, 'A3', 0),
(96, 7, 'A4', 0),
(97, 8, 'B1', 1),
(98, 8, 'B2', 0),
(99, 8, 'B3', 0),
(100, 8, 'B4', 0),
(101, 9, 'Electronic Device', 1),
(102, 9, 'Toy', 0),
(103, 9, 'Sound Recorder', 0),
(104, 9, 'Music Player', 0),
(105, 10, 'Rasmus Lerdord', 1),
(106, 10, 'Bill Gates', 0),
(107, 10, 'Dennis Ritchi', 0),
(108, 10, 'Bill Clinton', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cxam_qnbank`
--

CREATE TABLE `cxam_qnbank` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `subid` varchar(50) NOT NULL,
  `qn` text NOT NULL,
  `qn_by` varchar(100) NOT NULL,
  `sem` int(11) NOT NULL,
  `chap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cxam_qnbank`
--

INSERT INTO `cxam_qnbank` (`id`, `cid`, `did`, `subid`, `qn`, `qn_by`, `sem`, `chap`) VALUES
(1, 6, 9, 'mc101', '<p>What is computer?</p>\r\n', 'j101', 1, 0),
(2, 6, 9, 'mc101', '<p>Which of the following is a characteristic of Web2.0 applications?</p>\r\n', 'j101', 1, 0),
(3, 6, 9, 'mc101', '<p>Computer tools such as Word, Excel and Power Point are products owned by which of these companies?</p>\r\n', 'j101', 1, 0),
(4, 6, 9, 'mc101', '<p>Computers which offer information are called .......... and those which seek information are called...........</p>\r\n', 'j101', 1, 0),
(5, 6, 9, 'mc101', '<p>FAQ stands for -</p>\r\n', 'j101', 1, 4),
(6, 1, 1, 'CS101', '<p>test</p>\r\n', 'vin101', 1, 4),
(7, 1, 2, 'CS101', '<p>test qn1</p>\r\n', 'vin101', 4, 4),
(8, 1, 2, 'CS101', '<p>QN2</p>\r\n', 'vin101', 4, 3),
(9, 1, 1, 'CS101', '<p>Whai is a Computer?</p>\r\n', 'vin101', 1, 3),
(10, 1, 1, 'CS101', '<p>Who is the father of PHP</p>\r\n', 'vin101', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dbt_ans`
--

CREATE TABLE `dbt_ans` (
  `id` int(11) NOT NULL,
  `dbtid` int(11) NOT NULL,
  `ans` text NOT NULL,
  `dt` date NOT NULL,
  `ansby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dep_info`
--

CREATE TABLE `dep_info` (
  `depid` int(11) NOT NULL,
  `crsid` int(11) NOT NULL,
  `dep_nme` varchar(150) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dep_info`
--

INSERT INTO `dep_info` (`depid`, `crsid`, `dep_nme`, `st`) VALUES
(1, 1, 'Computer Science', 1),
(2, 2, 'Computer Application', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_assign`
--

CREATE TABLE `exam_assign` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `crsid` int(11) NOT NULL,
  `depid` int(11) NOT NULL,
  `acyr` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subjid` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `tim` varchar(50) NOT NULL,
  `seat_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_assign`
--

INSERT INTO `exam_assign` (`id`, `eid`, `crsid`, `depid`, `acyr`, `sem`, `subjid`, `dt`, `tim`, `seat_status`) VALUES
(1, 2, 1, 1, 0, 4, 'cs102', '2020-11-11', '09:00', 0),
(2, 2, 1, 1, 0, 4, 'cs103', '2020-11-12', '09:00', 0),
(3, 2, 1, 1, 0, 4, 'cs104', '2020-11-13', '09:00', 0),
(4, 2, 2, 2, 0, 4, 'ca101', '2020-11-11', '09:00', 0),
(5, 2, 2, 2, 0, 4, 'ca102', '2020-11-12', '09:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_cmplnt`
--

CREATE TABLE `exam_cmplnt` (
  `id` int(11) NOT NULL,
  `dt` date NOT NULL,
  `tim` varchar(50) NOT NULL,
  `eid` int(11) NOT NULL,
  `rmnum` int(11) NOT NULL,
  `admnum` varchar(100) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `descr` text NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_data`
--

CREATE TABLE `exam_data` (
  `id` int(11) NOT NULL,
  `exm_titl` varchar(250) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_data`
--

INSERT INTO `exam_data` (`id`, `exm_titl`, `st`) VALUES
(1, 'Demo examination 2020', 0),
(2, 'New test exam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_stud`
--

CREATE TABLE `exam_stud` (
  `id` int(11) NOT NULL,
  `eassign_id` int(11) NOT NULL,
  `studid` varchar(20) NOT NULL,
  `xamtyp` int(11) NOT NULL COMMENT '1=normal,2=supply'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_stud`
--

INSERT INTO `exam_stud` (`id`, `eassign_id`, `studid`, `xamtyp`) VALUES
(1, 1, '5000101', 1),
(2, 1, '5000102', 1),
(3, 1, '5000103', 1),
(4, 1, '5000104', 1),
(5, 1, '5000105', 1),
(6, 1, '5000106', 1),
(7, 1, '5000107', 1),
(8, 1, '5000108', 1),
(9, 1, '5000109', 1),
(10, 1, '5000110', 1),
(11, 1, '5000111', 1),
(12, 1, '5000112', 1),
(13, 1, '5000113', 1),
(14, 1, '5000114', 1),
(15, 1, '5000115', 1),
(16, 1, '4000101', 2),
(17, 1, '4000102', 2),
(18, 1, '4000103', 2),
(19, 1, '4000104', 2),
(20, 1, '4000105', 2),
(21, 2, '5000101', 1),
(22, 2, '5000102', 1),
(23, 2, '5000103', 1),
(24, 2, '5000104', 1),
(25, 2, '5000105', 1),
(26, 2, '5000106', 1),
(27, 2, '5000107', 1),
(28, 2, '5000108', 1),
(29, 2, '5000109', 1),
(30, 2, '5000110', 1),
(31, 2, '5000111', 1),
(32, 2, '5000112', 1),
(33, 2, '5000113', 1),
(34, 2, '5000114', 1),
(35, 2, '5000115', 1),
(36, 2, '4000101', 2),
(37, 2, '4000102', 2),
(38, 2, '4000103', 2),
(39, 2, '4000104', 2),
(40, 2, '4000105', 2),
(41, 3, '5000101', 1),
(42, 3, '5000102', 1),
(43, 3, '5000103', 1),
(44, 3, '5000104', 1),
(45, 3, '5000105', 1),
(46, 3, '5000106', 1),
(47, 3, '5000107', 1),
(48, 3, '5000108', 1),
(49, 3, '5000109', 1),
(50, 3, '5000110', 1),
(51, 3, '5000111', 1),
(52, 3, '5000112', 1),
(53, 3, '5000113', 1),
(54, 3, '5000114', 1),
(55, 3, '5000115', 1),
(56, 3, '4000101', 2),
(57, 3, '4000102', 2),
(58, 3, '4000103', 2),
(59, 3, '4000104', 2),
(60, 3, '4000105', 2),
(61, 4, '112002', 1),
(62, 4, '112003', 1),
(63, 4, '112004', 1),
(64, 4, '112005', 1),
(65, 4, '112006', 1),
(66, 4, '112007', 1),
(67, 4, '112008', 1),
(68, 4, '112009', 1),
(69, 4, '112010', 1),
(70, 4, '112011', 1),
(71, 4, '112012', 1),
(72, 4, '112013', 1),
(73, 4, '112014', 1),
(74, 4, '112015', 1),
(75, 4, '112016', 1),
(76, 4, '212001', 2),
(77, 4, '212006', 2),
(78, 4, '212009', 2),
(79, 5, '112002', 1),
(80, 5, '112003', 1),
(81, 5, '112004', 1),
(82, 5, '112005', 1),
(83, 5, '112006', 1),
(84, 5, '112007', 1),
(85, 5, '112008', 1),
(86, 5, '112009', 1),
(87, 5, '112010', 1),
(88, 5, '112011', 1),
(89, 5, '112012', 1),
(90, 5, '112013', 1),
(91, 5, '112014', 1),
(92, 5, '112015', 1),
(93, 5, '112016', 1),
(94, 5, '212001', 2),
(95, 5, '212006', 2),
(96, 5, '212009', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notice_data`
--

CREATE TABLE `notice_data` (
  `nid` int(11) NOT NULL,
  `tit` varchar(250) NOT NULL,
  `pdt` date NOT NULL,
  `edt` date NOT NULL,
  `msg` text NOT NULL,
  `pby` varchar(150) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_assign`
--

CREATE TABLE `room_assign` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `blknme` varchar(25) NOT NULL,
  `rumid` varchar(25) NOT NULL,
  `bnch` int(11) NOT NULL,
  `bnch_num` int(11) NOT NULL,
  `rolnum` varchar(50) NOT NULL,
  `dt` date NOT NULL,
  `tim` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_assign`
--

INSERT INTO `room_assign` (`id`, `eid`, `blknme`, `rumid`, `bnch`, `bnch_num`, `rolnum`, `dt`, `tim`) VALUES
(39, 2, 'Block1', '103', 1, 1, '5000109', '2020-11-11', '09:00'),
(40, 2, 'Block1', '103', 1, 3, '212009', '2020-11-11', '09:00'),
(41, 2, 'Block1', '103', 2, 2, '5000113', '2020-11-11', '09:00'),
(42, 2, 'Block1', '103', 2, 4, '112015', '2020-11-11', '09:00'),
(43, 2, 'Block1', '103', 3, 5, '5000103', '2020-11-11', '09:00'),
(44, 2, 'Block1', '103', 3, 7, '212001', '2020-11-11', '09:00'),
(45, 2, 'Block1', '103', 4, 6, '5000104', '2020-11-11', '09:00'),
(46, 2, 'Block1', '103', 4, 8, '112008', '2020-11-11', '09:00'),
(47, 2, 'Block1', '103', 5, 7, '5000115', '2020-11-11', '09:00'),
(48, 2, 'Block1', '103', 5, 9, '112006', '2020-11-11', '09:00'),
(49, 2, 'Block1', '103', 6, 8, '5000108', '2020-11-11', '09:00'),
(50, 2, 'Block1', '103', 6, 10, '112004', '2020-11-11', '09:00'),
(51, 2, 'Block1', '103', 7, 9, '4000102', '2020-11-11', '09:00'),
(52, 2, 'Block1', '103', 7, 11, '112010', '2020-11-11', '09:00'),
(53, 2, 'Block1', '103', 8, 10, '5000110', '2020-11-11', '09:00'),
(54, 2, 'Block1', '103', 8, 12, '112014', '2020-11-11', '09:00'),
(55, 2, 'Block1', '103', 9, 11, '5000101', '2020-11-11', '09:00'),
(56, 2, 'Block1', '103', 9, 13, '112013', '2020-11-11', '09:00'),
(57, 2, 'Block1', '103', 10, 12, '5000102', '2020-11-11', '09:00'),
(58, 2, 'Block1', '103', 10, 14, '112016', '2020-11-11', '09:00'),
(59, 2, 'Block1', '103', 11, 13, '5000107', '2020-11-11', '09:00'),
(60, 2, 'Block1', '103', 11, 15, '212006', '2020-11-11', '09:00'),
(61, 2, 'Block1', '103', 12, 14, '4000104', '2020-11-11', '09:00'),
(62, 2, 'Block1', '103', 12, 16, '112007', '2020-11-11', '09:00'),
(63, 2, 'Block 1', '101', 1, 1, '5000105', '2020-11-11', '09:00'),
(64, 2, 'Block 1', '101', 1, 3, '112009', '2020-11-11', '09:00'),
(65, 2, 'Block 1', '101', 2, 2, '5000106', '2020-11-11', '09:00'),
(66, 2, 'Block 1', '101', 2, 4, '112005', '2020-11-11', '09:00'),
(67, 2, 'Block 1', '101', 3, 5, '5000114', '2020-11-11', '09:00'),
(68, 2, 'Block 1', '101', 3, 7, '112003', '2020-11-11', '09:00'),
(69, 2, 'Block 1', '101', 4, 6, '4000103', '2020-11-11', '09:00'),
(70, 2, 'Block 1', '101', 4, 8, '112012', '2020-11-11', '09:00'),
(71, 2, 'Block 1', '101', 5, 7, '5000111', '2020-11-11', '09:00'),
(72, 2, 'Block 1', '101', 5, 9, '112011', '2020-11-11', '09:00'),
(73, 2, 'Block 1', '101', 6, 8, '5000112', '2020-11-11', '09:00'),
(74, 2, 'Block 1', '101', 6, 10, '112002', '2020-11-11', '09:00'),
(75, 2, 'Block 1', '101', 7, 9, '4000105', '2020-11-11', '09:00'),
(76, 2, 'Block 1', '101', 8, 10, '4000101', '2020-11-11', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `room_data`
--

CREATE TABLE `room_data` (
  `id` int(11) NOT NULL,
  `blk_nme` varchar(50) NOT NULL,
  `rm_nbr` varchar(50) NOT NULL,
  `bnch` int(11) NOT NULL,
  `nros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_data`
--

INSERT INTO `room_data` (`id`, `blk_nme`, `rm_nbr`, `bnch`, `nros`) VALUES
(1, 'Block 1', '101', 12, 6),
(2, 'Block1', '102', 12, 6),
(3, 'Block1', '103', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sem_gpa_total`
--

CREATE TABLE `sem_gpa_total` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `tgpa` varchar(50) NOT NULL,
  `tbpap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_gpa_total`
--

INSERT INTO `sem_gpa_total` (`id`, `stud_id`, `tgpa`, `tbpap`) VALUES
(1, '2014423', '2.2416666666667', 1),
(3, '12112112', '4.165', 0),
(4, '100101', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_allocation`
--

CREATE TABLE `staff_allocation` (
  `id` int(11) NOT NULL,
  `stid` varchar(50) NOT NULL,
  `eid` int(11) NOT NULL,
  `dt` date NOT NULL,
  `tim` varchar(50) NOT NULL,
  `blk` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_allocation`
--

INSERT INTO `staff_allocation` (`id`, `stid`, `eid`, `dt`, `tim`, `blk`, `room`) VALUES
(1, 'r101,', 2, '2020-11-11', '09:00', 'Block1', '102'),
(2, '', 2, '2020-11-11', '09:00', 'Block 1', '101'),
(3, 'r101,', 2, '2020-11-11', '09:00', 'Block1', '103'),
(4, '', 2, '2020-11-11', '09:00', 'Block 1', '101');

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE `staff_data` (
  `stid` int(11) NOT NULL,
  `nme` varchar(150) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `con` varchar(15) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staf_data`
--

CREATE TABLE `staf_data` (
  `stfid` int(11) NOT NULL,
  `nme` varchar(100) NOT NULL,
  `stfif` varchar(25) NOT NULL,
  `crs` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `desig` varchar(50) NOT NULL COMMENT '1=hod,2=advsr,3=tchr',
  `adr` text NOT NULL,
  `con` varchar(15) NOT NULL,
  `em` varchar(150) NOT NULL,
  `qual` varchar(50) NOT NULL,
  `pic` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `st` int(11) NOT NULL,
  `ealo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staf_data`
--

INSERT INTO `staf_data` (`stfid`, `nme`, `stfif`, `crs`, `dep`, `desig`, `adr`, `con`, `em`, `qual`, `pic`, `dob`, `st`, `ealo`) VALUES
(1, 'Arun', 'a101', 0, 0, '4', 'Arun Bhavan\r\nKilimanoor', '9446569885', 'arun@gmail.com', 'Btech', 'a101.jpg', '1996-01-17', 1, 0),
(2, 'Rajesh', 'r101', 1, 1, '3', 'R R Bhavan', '9446565632', 'r@gmail.com', 'MTech', 'r101.jpg', '2008-01-17', 1, 1),
(3, 'Gopal', 'g101', 1, 1, '3', 'test address', '9999525254', 'g@gmail.com', 'MSC', 'g101.jpg', '2013-02-12', 1, 0),
(4, 'Raji', 'r1011', 1, 1, '3', 'test', '9995656563', 'raji@gmail.com', 'MCA', 'r1011.jpg', '2016-06-13', 1, 0),
(5, 'appu', 'a010', 0, 0, '4', 'testing', '9596321456', 'appu@gail.co', 'degree', 'a010.jpg', '2020-11-25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stf_alo_chk`
--

CREATE TABLE `stf_alo_chk` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `crs` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `active_st` int(11) NOT NULL COMMENT '1=incolege,2=passout,3=removed',
  `nme` varchar(100) NOT NULL,
  `admnum` varchar(25) NOT NULL,
  `regnum` varchar(50) NOT NULL,
  `addr` text NOT NULL,
  `dob` date NOT NULL,
  `con` varchar(15) NOT NULL,
  `fatrnme` varchar(100) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `bldgrp` varchar(5) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `st` int(11) NOT NULL COMMENT '0=not updated, 1=updated, 2=approved',
  `gndr` varchar(10) NOT NULL,
  `sslcmrk` float NOT NULL,
  `plstomrk` float NOT NULL,
  `sem1` float NOT NULL,
  `sem2` float NOT NULL,
  `sem3` float NOT NULL,
  `sem4` float NOT NULL,
  `sem5` float NOT NULL,
  `sem6` float NOT NULL,
  `sem7` float NOT NULL,
  `sem8` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `crs`, `dep`, `sem`, `ay`, `active_st`, `nme`, `admnum`, `regnum`, `addr`, `dob`, `con`, `fatrnme`, `mob`, `bldgrp`, `pic`, `st`, `gndr`, `sslcmrk`, `plstomrk`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `sem8`) VALUES
(1, 1, 1, 4, 2018, 1, 'Amal', '112002', '', 'Amal Bhavan, Trivandrum', '0000-00-00', '9447856987', 'Ananathan Thampi', '8447856987', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 1, 4, 2018, 1, 'Rajeev', '112003', '', 'R R bhavan, Nagaroor', '0000-00-00', '9447856988', 'Bahuleyan', '8447856988', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 1, 4, 2018, 1, 'Achu', '112004', '', 'Arunodayam, Vembayam', '0000-00-00', '9447856989', 'Chandran', '8447856989', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 1, 4, 2018, 1, 'Arya', '112005', '', 'Arya Bhavan, TVM', '0000-00-00', '9447856990', 'Rajendran', '8447856990', 'AB+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 1, 1, 4, 2018, 1, 'Hari', '112006', '', 'Harisailam, TVM', '0000-00-00', '9447856991', 'Rajagopal', '8447856991', 'A-ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 4, 2018, 1, 'Gopal', '112007', '', 'G P Bhavan, Puliood', '0000-00-00', '9447856992', 'Ambili', '8447856992', 'A+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 1, 4, 2018, 1, 'Nandu', '112008', '', 'Nandagoplam, Kilimanoor', '0000-00-00', '9447856993', 'Ponappan', '8447856993', 'A+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 1, 4, 2018, 1, 'Jeeva', '112009', '', 'J J Bhavan, TVM', '0000-00-00', '9447856994', 'Rajappan', '8447856994', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 1, 4, 2018, 1, 'Amritha', '112010', '', 'A M Manzil, KTAM', '0000-00-00', '9447856995', 'Madhu', '8447856995', 'AB+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 1, 4, 2018, 1, 'Ancu', '112011', '', 'Ancy Nilayam, TVM', '0000-00-00', '9447856996', 'Gopalan', '8447856996', 'A-ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 1, 1, 4, 2018, 1, 'Remya', '112012', '', 'R R bhavan, Nagaroor', '0000-00-00', '9447856997', 'Rajendran', '8447856997', 'B+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 1, 1, 4, 2018, 1, 'Neethu', '112013', '', 'N N Bhavan, Kilimanoor', '0000-00-00', '9447856998', 'Subash', '8447856998', 'B+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 1, 1, 4, 2018, 1, 'Jeevan', '112014', '', 'J J Bhavan, TVM', '0000-00-00', '9447856999', 'Sunil', '8447856999', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 1, 1, 4, 2018, 1, 'Gopalan', '112015', '', 'G G Bhavan, TVM', '0000-00-00', '9447857000', 'Sumesh', '8447857000', 'AB+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 1, 1, 4, 2018, 1, 'Ananthu', '112016', '', 'A A bhavan , KTM', '0000-00-00', '9447857001', 'Anesh', '8447857001', 'B+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 1, 1, 4, 2018, 1, 'Swerha', '112017', '', 'S S Bhavan', '0000-00-00', '9995858574', 'Suresh', '9445124578', 'O+ve', 'nopic.jpg', 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 2, 2, 4, 2018, 1, 'Raju', '5000101', '', 'R R bhavan', '0000-00-00', '8281789654', 'Rayappan', '9281789654', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 2, 2, 4, 2018, 1, 'Appu', '5000102', '', 'A A Bhavan', '0000-00-00', '8281789655', 'Appappan', '9281789655', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 2, 2, 4, 2018, 1, 'Ammu', '5000103', '', 'AM Bhavan', '0000-00-00', '8281789656', 'Ammappan', '9281789656', 'O+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 2, 2, 4, 2018, 1, 'Dipu', '5000104', '', 'D D Bhavan', '0000-00-00', '8281789657', 'Dippappan', '9281789657', 'AB+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 2, 2, 4, 2018, 1, 'Minnu', '5000105', '', 'M M bhavan', '0000-00-00', '8281789658', 'Minnappan', '9281789658', 'A-ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 2, 2, 4, 2018, 1, 'Annu', '5000106', '', 'A A Bhavan', '0000-00-00', '8281789659', 'Annappan', '9281789659', 'A+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 2, 2, 4, 2018, 1, 'Littu', '5000107', '', 'L L Bhaan', '0000-00-00', '8281789660', 'Littappan', '9281789660', 'A+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 2, 2, 4, 2018, 1, 'Kuttu', '5000108', '', 'K K Bhaan', '0000-00-00', '8281789661', 'Kittappan', '9281789661', 'O+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 2, 2, 4, 2018, 1, 'Hippy', '5000109', '', 'H H Bhavan', '0000-00-00', '8281789662', 'Hippappan', '9281789662', 'AB+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 2, 2, 4, 2018, 1, 'Karu', '5000110', '', 'K K Bhaan', '0000-00-00', '8281789663', 'Karappan', '9281789663', 'A-ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 2, 2, 4, 2018, 1, 'Laru', '5000111', '', 'L L Bhaan', '0000-00-00', '8281789664', 'Larappan', '9281789664', 'B+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 2, 2, 4, 2018, 1, 'itty', '5000112', '', 'I I Bhavan', '0000-00-00', '8281789665', 'Ittyappan', '9281789665', 'B+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 2, 2, 4, 2018, 1, 'Mitty', '5000113', '', 'M M Bhavan', '0000-00-00', '8281789666', 'Mittiappan', '9281789666', 'O+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 2, 2, 4, 2018, 1, 'Nimmy', '5000114', '', 'N N bhavan', '0000-00-00', '8281789667', 'Nimmyappan', '9281789667', 'AB+ve', 'nopic.jpg', 1, 'F', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 2, 2, 4, 2018, 1, 'Roy', '5000115', '', 'R R bhavan', '0000-00-00', '8281789668', 'Royappan', '9281789668', 'B+ve', 'nopic.jpg', 1, 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud_doubt`
--

CREATE TABLE `stud_doubt` (
  `id` int(11) NOT NULL,
  `stud` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `dt` date NOT NULL,
  `dbt` text NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjct_assign`
--

CREATE TABLE `subjct_assign` (
  `assignid` int(11) NOT NULL,
  `stf_id` varchar(50) NOT NULL,
  `crs` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subnme` varchar(20) NOT NULL,
  `subid` varchar(125) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjct_assign`
--

INSERT INTO `subjct_assign` (`assignid`, `stf_id`, `crs`, `dep`, `sem`, `subnme`, `subid`, `st`) VALUES
(2, 'g101', 1, 1, 1, 'ca101', '14', 0),
(3, 'g101', 1, 1, 1, 'ca102', '13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_data`
--

CREATE TABLE `syllabus_data` (
  `sylid` int(11) NOT NULL,
  `crsid` int(11) NOT NULL,
  `depid` int(11) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `sub_nme` varchar(200) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `syl_file` varchar(50) NOT NULL,
  `sub_mrk` varchar(10) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus_data`
--

INSERT INTO `syllabus_data` (`sylid`, `crsid`, `depid`, `sem`, `sub_nme`, `sub_id`, `syl_file`, `sub_mrk`, `st`) VALUES
(2, 1, 1, '4', 'C program', 'cs102', 'nodata', '0', 1),
(3, 1, 1, '4', 'Operating System', 'cs103', 'nodata', '0', 1),
(6, 1, 1, '4', 'Computer Fundamentals', 'cs104', 'nodata', '0', 1),
(7, 2, 2, '4', 'Graphics', 'ca101', 'nodata', '0', 1),
(8, 2, 2, '4', 'java', 'ca102', 'nodata', '0', 1),
(9, 1, 1, '1', 'Computer Fundamentals', 'CS101', 'nodata', '0', 1),
(10, 1, 1, '1', 'Computer Fundamentals', 'CS101', 'nodata', '0', 1),
(11, 1, 1, '1', 'Networks', 'CS102', 'nodata', '0', 1),
(12, 1, 1, '1', 'Networks', 'CS102', 'nodata', '0', 1),
(13, 1, 1, '1', 'SAD', 'CS103', 'nodata', '0', 1),
(14, 1, 1, '1', 'Test', 'CS104', 'nodata', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_material`
--

CREATE TABLE `s_material` (
  `id` int(11) NOT NULL,
  `crs` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subid` varchar(50) NOT NULL,
  `titl` varchar(250) NOT NULL,
  `descr` text NOT NULL,
  `fil` varchar(150) NOT NULL,
  `up_by` varchar(50) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_ttable`
--

CREATE TABLE `upload_ttable` (
  `id` int(11) NOT NULL,
  `etit` varchar(250) NOT NULL,
  `etyp` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `dt` date NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_ttable`
--

INSERT INTO `upload_ttable` (`id`, `etit`, `etyp`, `file`, `dt`, `st`) VALUES
(1, 'Summer Examination: Computer Fundamentals', 1, '2021-04-04-06-26-32.pdf', '2021-04-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `typ` varchar(15) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `uid`, `pwd`, `typ`, `st`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'a101', 'asd', 'STAF', 1),
(3, 'r101', 'asd', 'TSTAF', 1),
(4, '112002', 'asd', 'stud', 1),
(5, '112003', 'student', 'stud', 1),
(6, '112004', 'student', 'stud', 1),
(7, '112005', 'student', 'stud', 1),
(8, '112006', 'student', 'stud', 1),
(9, '112007', 'student', 'stud', 1),
(10, '112008', 'student', 'stud', 1),
(11, '112009', 'student', 'stud', 1),
(12, '112010', 'student', 'stud', 1),
(13, '112011', 'student', 'stud', 1),
(14, '112012', 'student', 'stud', 1),
(15, '112013', 'student', 'stud', 1),
(16, '112014', 'student', 'stud', 1),
(17, '112015', 'student', 'stud', 1),
(18, '112016', 'student', 'stud', 1),
(19, '112017', 'stud', 'stud', 1),
(20, '5000101', 'student', 'stud', 1),
(21, '5000102', 'student', 'stud', 1),
(22, '5000103', 'student', 'stud', 1),
(23, '5000104', 'student', 'stud', 1),
(24, '5000105', 'student', 'stud', 1),
(25, '5000106', 'student', 'stud', 1),
(26, '5000107', 'student', 'stud', 1),
(27, '5000108', 'student', 'stud', 1),
(28, '5000109', 'student', 'stud', 1),
(29, '5000110', 'student', 'stud', 1),
(30, '5000111', 'student', 'stud', 1),
(31, '5000112', 'student', 'stud', 1),
(32, '5000113', 'student', 'stud', 1),
(33, '5000114', 'student', 'stud', 1),
(34, '5000115', 'asd', 'stud', 1),
(35, 'g101', 'christ', 'TSTAF', 1),
(36, 'r1011', 'christ', 'TSTAF', 1),
(37, 'a010', 'christ', 'STAF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wall_post`
--

CREATE TABLE `wall_post` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(25) NOT NULL,
  `dt` date NOT NULL,
  `crs` varchar(10) NOT NULL,
  `dep` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `msg` text NOT NULL,
  `tim` varchar(50) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xam_ans`
--

CREATE TABLE `xam_ans` (
  `id` int(11) NOT NULL,
  `xamid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xam_data`
--

CREATE TABLE `xam_data` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `subid` varchar(150) NOT NULL,
  `xam_tit` varchar(250) NOT NULL,
  `xam_dt` date NOT NULL,
  `tot_qn` int(11) NOT NULL,
  `ad_by` varchar(150) NOT NULL,
  `ad_dt` int(11) NOT NULL,
  `st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xam_data`
--

INSERT INTO `xam_data` (`id`, `cid`, `did`, `semid`, `subid`, `xam_tit`, `xam_dt`, `tot_qn`, `ad_by`, `ad_dt`, `st`) VALUES
(1, 1, 1, 1, 'CS101', 'test', '2021-04-16', 4, 'a101', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xam_qn`
--

CREATE TABLE `xam_qn` (
  `id` int(11) NOT NULL,
  `xamid` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xam_qn`
--

INSERT INTO `xam_qn` (`id`, `xamid`, `qid`) VALUES
(1, 1, 8),
(2, 1, 9),
(3, 1, 10),
(4, 1, 6),
(5, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chair_conf`
--
ALTER TABLE `chair_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter_data`
--
ALTER TABLE `chapter_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crs_info`
--
ALTER TABLE `crs_info`
  ADD PRIMARY KEY (`crsid`);

--
-- Indexes for table `cxam_ansrkey`
--
ALTER TABLE `cxam_ansrkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cxam_qnbank`
--
ALTER TABLE `cxam_qnbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbt_ans`
--
ALTER TABLE `dbt_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dep_info`
--
ALTER TABLE `dep_info`
  ADD PRIMARY KEY (`depid`);

--
-- Indexes for table `exam_assign`
--
ALTER TABLE `exam_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_cmplnt`
--
ALTER TABLE `exam_cmplnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_data`
--
ALTER TABLE `exam_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_stud`
--
ALTER TABLE `exam_stud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_data`
--
ALTER TABLE `notice_data`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `room_assign`
--
ALTER TABLE `room_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_data`
--
ALTER TABLE `room_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem_gpa_total`
--
ALTER TABLE `sem_gpa_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_allocation`
--
ALTER TABLE `staff_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_data`
--
ALTER TABLE `staff_data`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `staf_data`
--
ALTER TABLE `staf_data`
  ADD PRIMARY KEY (`stfid`);

--
-- Indexes for table `stf_alo_chk`
--
ALTER TABLE `stf_alo_chk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_doubt`
--
ALTER TABLE `stud_doubt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjct_assign`
--
ALTER TABLE `subjct_assign`
  ADD PRIMARY KEY (`assignid`);

--
-- Indexes for table `syllabus_data`
--
ALTER TABLE `syllabus_data`
  ADD PRIMARY KEY (`sylid`);

--
-- Indexes for table `s_material`
--
ALTER TABLE `s_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_ttable`
--
ALTER TABLE `upload_ttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wall_post`
--
ALTER TABLE `wall_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xam_ans`
--
ALTER TABLE `xam_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xam_data`
--
ALTER TABLE `xam_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xam_qn`
--
ALTER TABLE `xam_qn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chair_conf`
--
ALTER TABLE `chair_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chapter_data`
--
ALTER TABLE `chapter_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crs_info`
--
ALTER TABLE `crs_info`
  MODIFY `crsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cxam_ansrkey`
--
ALTER TABLE `cxam_ansrkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `cxam_qnbank`
--
ALTER TABLE `cxam_qnbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dbt_ans`
--
ALTER TABLE `dbt_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dep_info`
--
ALTER TABLE `dep_info`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_assign`
--
ALTER TABLE `exam_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_cmplnt`
--
ALTER TABLE `exam_cmplnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_data`
--
ALTER TABLE `exam_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_stud`
--
ALTER TABLE `exam_stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `notice_data`
--
ALTER TABLE `notice_data`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_assign`
--
ALTER TABLE `room_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `room_data`
--
ALTER TABLE `room_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sem_gpa_total`
--
ALTER TABLE `sem_gpa_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_allocation`
--
ALTER TABLE `staff_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_data`
--
ALTER TABLE `staff_data`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staf_data`
--
ALTER TABLE `staf_data`
  MODIFY `stfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stf_alo_chk`
--
ALTER TABLE `stf_alo_chk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stud_doubt`
--
ALTER TABLE `stud_doubt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjct_assign`
--
ALTER TABLE `subjct_assign`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `syllabus_data`
--
ALTER TABLE `syllabus_data`
  MODIFY `sylid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `s_material`
--
ALTER TABLE `s_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_ttable`
--
ALTER TABLE `upload_ttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `wall_post`
--
ALTER TABLE `wall_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xam_ans`
--
ALTER TABLE `xam_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xam_data`
--
ALTER TABLE `xam_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `xam_qn`
--
ALTER TABLE `xam_qn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
