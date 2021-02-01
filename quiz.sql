-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 04:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `attendno` int(6) UNSIGNED NOT NULL,
  `testname` varchar(150) NOT NULL,
  `stdname` varchar(150) NOT NULL,
  `udate` varchar(50) DEFAULT NULL,
  `marks` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`attendno`, `testname`, `stdname`, `udate`, `marks`) VALUES
(2, 'Php_unit_1', 'Yogesh Kumar', '21-01-29', 30),
(3, 'Php_unit_1', 'Shyam', '21-01-29', 15),
(4, 'CAHM_unit_1', 'Shyam', '21-01-29', 20);

-- --------------------------------------------------------

--
-- Table structure for table `attend_cahm_unit_1_cahm_shyam`
--

CREATE TABLE `attend_cahm_unit_1_cahm_shyam` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `choice` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend_cahm_unit_1_cahm_shyam`
--

INSERT INTO `attend_cahm_unit_1_cahm_shyam` (`qno`, `question`, `choice`, `currect`) VALUES
(1, 'What is Bios', 'software', 'Currect'),
(2, 'Which of the is not a bios function', 'none of these', 'Currect');

-- --------------------------------------------------------

--
-- Table structure for table `attend_php_unit_1_php_shyam`
--

CREATE TABLE `attend_php_unit_1_php_shyam` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `choice` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend_php_unit_1_php_shyam`
--

INSERT INTO `attend_php_unit_1_php_shyam` (`qno`, `question`, `choice`, `currect`) VALUES
(1, 'Php stand for ', 'Hypertext Preprocessor', 'Currect'),
(2, 'How to Declare Variable in php', 'by ^', 'Incurrect');

-- --------------------------------------------------------

--
-- Table structure for table `attend_php_unit_1_php_yogesh_kumar`
--

CREATE TABLE `attend_php_unit_1_php_yogesh_kumar` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `choice` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend_php_unit_1_php_yogesh_kumar`
--

INSERT INTO `attend_php_unit_1_php_yogesh_kumar` (`qno`, `question`, `choice`, `currect`) VALUES
(1, 'Php stand for ', 'Hypertext Preprocessor', 'Currect'),
(2, 'How to Declare Variable in php', 'by $', 'Currect');

-- --------------------------------------------------------

--
-- Table structure for table `cahm_unit_1`
--

CREATE TABLE `cahm_unit_1` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cahm_unit_1`
--

INSERT INTO `cahm_unit_1` (`qno`, `question`, `option1`, `option2`, `option3`, `option4`, `currect`) VALUES
(1, 'What is Bios', 'hardware', 'software', 'load function', 'none of these', 'software'),
(2, 'Which of the is not a bios function', 'post', 'bootloader', 'chip configure', 'none of these', 'none of these');

-- --------------------------------------------------------

--
-- Table structure for table `php_unit_1`
--

CREATE TABLE `php_unit_1` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php_unit_1`
--

INSERT INTO `php_unit_1` (`qno`, `question`, `option1`, `option2`, `option3`, `option4`, `currect`) VALUES
(1, 'Php stand for ', 'Hypertext Personal Page', 'Preprocessor Hypertext', 'personal home page', 'Hypertext Preprocessor', 'Hypertext Preprocessor'),
(2, 'How to Declare Variable in php', 'by %', 'by ^', 'by $', 'none of these', 'by $');

-- --------------------------------------------------------

--
-- Table structure for table `runningtest`
--

CREATE TABLE `runningtest` (
  `testcount` int(6) UNSIGNED NOT NULL,
  `subjectname` varchar(150) NOT NULL,
  `teachername` varchar(150) NOT NULL,
  `testname` varchar(150) NOT NULL,
  `totalmarks` varchar(150) NOT NULL,
  `testtime` varchar(150) NOT NULL,
  `testexpiry` date DEFAULT NULL,
  `testupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `testclass` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `runningtest`
--

INSERT INTO `runningtest` (`testcount`, `subjectname`, `teachername`, `testname`, `totalmarks`, `testtime`, `testexpiry`, `testupdate`, `testclass`) VALUES
(41, 'Php', 'Yogesh kumar', 'Php_unit_1', '30', '15', '2021-01-30', '2021-01-29 11:22:59', 8),
(43, 'CAHM', 'Yogesh kumar', 'CAHM_unit_1', '20', '15', '2021-01-30', '2021-01-29 15:31:29', 8);

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `admname` varchar(150) NOT NULL,
  `admmob` varchar(50) NOT NULL,
  `admemail` varchar(150) NOT NULL,
  `admdate` date NOT NULL,
  `admpassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`admname`, `admmob`, `admemail`, `admdate`, `admpassword`) VALUES
('Yogesh', '8384855717', 'yk9927129320@gmail.com', '0000-00-00', 'mrhacker');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `enrollment` varchar(100) NOT NULL,
  `stdname` varchar(150) NOT NULL,
  `stdfname` varchar(150) NOT NULL,
  `stdmob` varchar(150) NOT NULL,
  `stdemail` varchar(150) NOT NULL,
  `stddob` date NOT NULL,
  `stdgeder` char(1) NOT NULL,
  `stdimg` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `stdclass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`enrollment`, `stdname`, `stdfname`, `stdmob`, `stdemail`, `stddob`, `stdgeder`, `stdimg`, `password`, `stdclass`) VALUES
('E18166535500047', 'Shyam', 'Yogesh', '7078939001', 'sv469370@gmail.com', '2003-07-15', 'm', 'IMG_20190926_132737.jpg', 'shyam', '8'),
('E18166535500059', 'Yogesh Kumar', 'Yagya Dev', '8384855717', 'yk9927129320@gmail.com', '2002-05-28', 'm', 'crop.jpg', 'mrhacker', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`attendno`);

--
-- Indexes for table `attend_cahm_unit_1_cahm_shyam`
--
ALTER TABLE `attend_cahm_unit_1_cahm_shyam`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `attend_php_unit_1_php_shyam`
--
ALTER TABLE `attend_php_unit_1_php_shyam`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `attend_php_unit_1_php_yogesh_kumar`
--
ALTER TABLE `attend_php_unit_1_php_yogesh_kumar`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `cahm_unit_1`
--
ALTER TABLE `cahm_unit_1`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `php_unit_1`
--
ALTER TABLE `php_unit_1`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `runningtest`
--
ALTER TABLE `runningtest`
  ADD PRIMARY KEY (`testcount`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`admemail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`enrollment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend`
--
ALTER TABLE `attend`
  MODIFY `attendno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attend_cahm_unit_1_cahm_shyam`
--
ALTER TABLE `attend_cahm_unit_1_cahm_shyam`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attend_php_unit_1_php_shyam`
--
ALTER TABLE `attend_php_unit_1_php_shyam`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attend_php_unit_1_php_yogesh_kumar`
--
ALTER TABLE `attend_php_unit_1_php_yogesh_kumar`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cahm_unit_1`
--
ALTER TABLE `cahm_unit_1`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `php_unit_1`
--
ALTER TABLE `php_unit_1`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `runningtest`
--
ALTER TABLE `runningtest`
  MODIFY `testcount` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
