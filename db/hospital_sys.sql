-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 05:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `emp_id` int(11) NOT NULL,
  `ward_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`emp_id`, `ward_no`, `name`, `password`) VALUES
(0, 1, 'das', '123'),
(1, 2, 'asd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `emp_id` int(11) NOT NULL,
  `mbbs_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`emp_id`, `mbbs_no`, `name`, `password`) VALUES
(1, 'D1', 'asd', ''),
(3, 'D3', 'ert', ''),
(4, 'D4', 'dsfsdf', ''),
(5, '123', 'ABCD', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(100) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `physician` varchar(100) NOT NULL,
  `consultant` int(11) NOT NULL,
  `description` text NOT NULL,
  `ward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `nic`, `name`, `contact`, `address`, `age`, `gender`, `physician`, `consultant`, `description`, `ward`) VALUES
(1, '22222', 'zzzzzzzz', '23243', 'ascdcsd', 'fsdf', 'male', 'asdfd', 0, 'dsfsdfs', 0),
(3, '1684651v', 'Sunil', '07148652', '5ssdfsdf', '89', 'male', 'acdd', 0, 'asdasda', 0),
(4, '1684651vsdf', 'Sunilsdaf', '07148652sdf', '5ssdfsdf', '89', 'male', 'acdd', 0, 'asdasda', 0),
(5, '213143', 'sunil 2', 'fdf', 'sdf', '1233', 'male', 'acsd', 0, 'dcsdcdsf', 0),
(6, '213143', 'sunil 2', 'fdf', 'sdf', '1233', 'male', 'acsd', 0, 'dcsdcdsf', 0),
(7, '213143', 'sunil 2', 'fdf', 'sdf', '1233', 'male', 'acsd', 0, 'dcsdcdsf', 0),
(9, '', '', '', '', '', 'male', '', 0, '', 0),
(10, '', '', '', '', '', 'male', '', 0, '', 0),
(11, '', '', '', '', '', 'male', '', 0, '', 0),
(13, 'df', 'abcd', 'asd', 'adx', '', 'male', '', 0, '', 0),
(14, '4234', 'jkdskfhs', '234', 'as', 'sds', 'male', '', 0, '', 0),
(15, '', '', '', '', '', 'male', '', 0, '', 0),
(17, '', 'ffygfy', '', '', '', 'male', '', 0, '', 0),
(18, 'eert', 'qwewerwet', '', '', '', 'male', '', 0, '', 1),
(19, '', 'patient 1', '', '', '', 'male', '', 0, '', 0),
(20, '', 'Patient 2', '', '', '', 'male', '', 0, '', 0),
(21, '', '', '', '', '', 'male', '', 0, '', 0),
(22, '', 'patient 3', '', '', '', 'male', '', 0, '', 0),
(23, '', 'w', '', '', '', 'male', '', 0, '', 0),
(24, '34341', 'sfa', '123', '23dd', '12', 'male', 'def', 0, 'qwer', 2),
(30, '123123', 'z1', '23123', '12dwede', '1', 'male', 'dscr', 0, 'qwe3e3', 2),
(31, '123123', 'z2', '21312', 'dasd', '12', 'male', 'sdaf', 0, 'frgfbcvdd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `doc_incharge` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `doc_incharge`) VALUES
(3, 'sdaf', 'sdf'),
(4, 'asfaf', 'dfsdf'),
(5, 'fdbgdb', 'sd'),
(6, ' fff', 'gtgsd'),
(7, 'dhyy', 'e4t'),
(8, 'dhyfdy', 'edf4t'),
(9, 'asf', 'vvc'),
(10, 'asfdf', 'vvfdfc'),
(11, 'dsgdfg', 'cxv'),
(12, 'dsgdffffg', 'fcxv'),
(13, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `test_on_patients`
--

CREATE TABLE `test_on_patients` (
  `t_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `duedate` date NOT NULL,
  `consultant` varchar(100) NOT NULL,
  `examiner` varchar(100) NOT NULL,
  `result` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_on_patients`
--

INSERT INTO `test_on_patients` (`t_id`, `p_id`, `duedate`, `consultant`, `examiner`, `result`) VALUES
(3, 14, '2013-03-03', 'cfdsf', 'asd', 'Upcoming'),
(4, 22, '2013-03-06', 'sdasd', 'asdad', 'Upcoming'),
(10, 13, '2013-03-06', 'abc', 'qwe', 'Upcoming');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top`
-- (See below for the actual view)
--
CREATE TABLE `top` (
`t_id` int(11)
,`p_id` int(11)
,`result` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `max_patients` int(11) NOT NULL,
  `max_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_no`, `name`, `max_patients`, `max_staff`) VALUES
(0, '', 0, 0),
(1, 'aaaa', 12, 4),
(2, 'www', 44, 5);

-- --------------------------------------------------------

--
-- Structure for view `top`
--
DROP TABLE IF EXISTS `top`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top`  AS  select `test_on_patients`.`t_id` AS `t_id`,`test_on_patients`.`p_id` AS `p_id`,`test_on_patients`.`result` AS `result` from `test_on_patients` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `ward_no` (`ward_no`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `ward` (`ward`),
  ADD KEY `consultant` (`consultant`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_on_patients`
--
ALTER TABLE `test_on_patients`
  ADD PRIMARY KEY (`t_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultants`
--
ALTER TABLE `consultants`
  ADD CONSTRAINT `consultants_ibfk_1` FOREIGN KEY (`ward_no`) REFERENCES `ward` (`ward_no`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`ward`) REFERENCES `ward` (`ward_no`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`consultant`) REFERENCES `consultants` (`emp_id`);

--
-- Constraints for table `test_on_patients`
--
ALTER TABLE `test_on_patients`
  ADD CONSTRAINT `test_on_patients_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_on_patients_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
