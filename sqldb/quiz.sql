-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 05:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `marks` int(10) DEFAULT NULL,
  `total` int(20) NOT NULL,
  `enroll` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `php_unit3`
--

CREATE TABLE `php_unit3` (
  `qno` int(6) UNSIGNED NOT NULL,
  `question` varchar(150) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `currect` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `php_unit3`
--

INSERT INTO `php_unit3` (`qno`, `question`, `option1`, `option2`, `option3`, `option4`, `currect`) VALUES
(1, 'Who is known as the father of PHP', '', 'Rasmus Lerdorf', 'Drek Kolkevi', 'List Barely', 'Rasmus Lerdorf'),
(2, 'Which of the following is not true', 'PHP can be used to develop web applications', 'PHP applications can not be compile', 'PHP makes a website dynamic', 'PHP can not be embedded into html', 'PHP can not be embedded into html');

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
  `testupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `testclass` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `runningtest`
--

INSERT INTO `runningtest` (`testcount`, `subjectname`, `teachername`, `testname`, `totalmarks`, `testtime`, `testexpiry`, `testupdate`, `testclass`) VALUES
(45, 'Php', 'Yogesh', 'Php_unit3', '50', '15', '2021-02-04', '2021-02-03 15:39:45', 8);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `facno` int(6) UNSIGNED NOT NULL,
  `facrsid` varchar(150) NOT NULL,
  `facname` varchar(150) NOT NULL,
  `facfname` varchar(150) NOT NULL,
  `facemail` varchar(150) NOT NULL,
  `facmob` varchar(150) NOT NULL,
  `facdob` varchar(150) NOT NULL,
  `facaddn` varchar(150) NOT NULL,
  `facsub` varchar(150) NOT NULL,
  `facpass` varchar(150) NOT NULL,
  `facadate` varchar(150) NOT NULL,
  `facimg` varchar(100) NOT NULL,
  `facgender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`facno`, `facrsid`, `facname`, `facfname`, `facemail`, `facmob`, `facdob`, `facaddn`, `facsub`, `facpass`, `facadate`, `facimg`, `facgender`) VALUES
(4, 'HDPS21F0001', 'Sunil', 'Xyz', 'sk@gmail.com', '7788678677', '2001-05-07', '345678904567', 'PHP', 'mrhacker', '21-02-02', 'Sunil-1612285249.jpg', 'm'),
(6, 'HDPS21F0002', 'Sunil', 'Xyz', 'sk@gmail.com', '6888766555', '2021-02-13', '456789065678', 'php', 'mrhacker', '21-02-02', 'Sunil-1612285357.jpg', 'm');

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
  `stdclass` varchar(10) DEFAULT NULL,
  `txtorderid` varchar(150) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `respmsg` varchar(100) NOT NULL,
  `txndate` varchar(100) NOT NULL,
  `rsid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`enrollment`, `stdname`, `stdfname`, `stdmob`, `stdemail`, `stddob`, `stdgeder`, `stdimg`, `password`, `stdclass`, `txtorderid`, `amount`, `respmsg`, `txndate`, `rsid`) VALUES
('E18166535500008', 'Amit', 'Xyz', '8384855717', 'h@gmail.com', '2021-02-13', 'm', 'Amit-1612341149.jpg', 'mrhacker', '8', 'ORDS73230630', '500.00', 'Txn Success', '2021-02-03 14:02:37.0', 'HDPS2180002'),
('E18166535500059', 'Yogesh', 'Yagya dev', '8384855717', 'kirat9062@gmail.com', '2021-03-04', 'm', 'Yogesh-1612287472.jpg', 'mrhacker', '8', 'ORDS97519186', '500.00', 'Txn Success', '2021-02-02 23:07:59.0', 'HDPS2180001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`attendno`);

--
-- Indexes for table `php_unit3`
--
ALTER TABLE `php_unit3`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `runningtest`
--
ALTER TABLE `runningtest`
  ADD PRIMARY KEY (`testcount`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`facno`);

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
  MODIFY `attendno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `php_unit3`
--
ALTER TABLE `php_unit3`
  MODIFY `qno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `runningtest`
--
ALTER TABLE `runningtest`
  MODIFY `testcount` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `facno` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
