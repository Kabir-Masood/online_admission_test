-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 11:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_admission_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_tbl_id` int(50) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_tbl_id`, `admin_id`, `password`, `is_active`) VALUES
(1, '01557', '123', 1),
(2, '01558', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `applicant_tbl_id` int(50) NOT NULL,
  `applicant_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `program_tbl_id` int(50) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `payment` int(1) NOT NULL,
  `is_exam_given` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`applicant_tbl_id`, `applicant_id`, `password`, `program_tbl_id`, `year`, `semester`, `payment`, `is_exam_given`) VALUES
(1, 'UG02-43-16-016', '123', 1, 2019, 'Summer', 1, 1),
(6, 'UG02-43-16-002', '123', 1, 2019, 'Summer', 1, 0),
(7, 'UG02-43-16-003', '123', 1, 2019, 'Summer', 1, 0),
(8, 'UG02-43-16-004', '123', 1, 2019, 'Summer', 1, 0),
(9, 'UG02-43-16-005', '123', 1, 2019, 'Summer', 1, 0),
(10, 'UG02-43-16-006', '123', 1, 2019, 'Summer', 1, 0),
(11, 'UG02-43-16-007', '123', 1, 2019, 'Summer', 1, 0),
(12, 'UG02-43-16-008', '123', 1, 2019, 'Summer', 1, 0),
(13, 'UG02-43-16-009', '123', 1, 2019, 'Summer', 1, 0),
(14, 'UG02-43-16-010', '123', 1, 2019, 'Summer', 0, 0),
(15, 'UG02-43-16-011', '123', 1, 2019, 'Summer', 0, 0),
(16, 'UG02-43-16-012', '123', 1, 2019, 'Summer', 1, 0),
(17, 'UG02-43-16-013', '123', 1, 2019, 'Summer', 1, 0),
(18, 'UG02-43-16-014', '123', 1, 2019, 'Summer', 0, 0),
(19, 'UG02-43-16-015', '123', 1, 2019, 'Summer', 0, 0),
(21, 'UG02-43-16-017', '123', 1, 2019, 'Summer', 0, 0),
(38, 'UG02-43-16-018', '123', 1, 2019, 'Summer', 0, 0),
(39, 'UG02-43-16-019', '123', 1, 2019, 'Summer', 0, 0),
(40, 'UG02-43-16-020', '123', 1, 2019, 'Summer', 0, 0),
(41, 'UG02-43-16-021', '123', 1, 2019, 'Summer', 0, 0),
(42, 'UG02-43-16-022', '123', 1, 2019, 'Summer', 0, 0),
(46, 'UG02-50-18-001', '123', 5, 2019, 'Summer', 0, 0),
(47, 'UG02-50-18-002', '123', 5, 2019, 'Summer', 1, 0),
(48, 'UG02-50-18-003', '123', 5, 2020, 'Summer', 0, 1),
(70, 'UG02-43-16-023', '123', 1, 2019, 'Summer', 1, 0),
(71, 'UG02-43-16-024', '123', 1, 2019, 'Summer', 1, 0),
(72, 'UG02-43-16-025', '123', 1, 2019, 'Summer', 0, 0),
(73, 'UG02-44-17-001', '123', 1, 2019, 'Fall', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_info`
--

CREATE TABLE `tbl_exam_info` (
  `exam_tbl_id` int(50) NOT NULL,
  `program_tbl_id` int(50) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `exam_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam_info`
--

INSERT INTO `tbl_exam_info` (`exam_tbl_id`, `program_tbl_id`, `year`, `semester`, `exam_status`) VALUES
(1, 1, 2019, 'Summer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_info`
--

CREATE TABLE `tbl_program_info` (
  `program_tbl_id` int(50) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `dept_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program_info`
--

INSERT INTO `tbl_program_info` (`program_tbl_id`, `program_name`, `dept_code`) VALUES
(1, 'BSc', 'CSE'),
(5, 'LLB', 'LAW'),
(7, 'Bachelor', 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_tbl_id` int(50) NOT NULL,
  `exam_tbl_id` int(50) NOT NULL,
  `q_desc` varchar(500) NOT NULL,
  `op1` varchar(300) NOT NULL,
  `op2` varchar(300) NOT NULL,
  `op3` varchar(300) NOT NULL,
  `op4` varchar(300) NOT NULL,
  `correct_ans` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_tbl_id`, `exam_tbl_id`, `q_desc`, `op1`, `op2`, `op3`, `op4`, `correct_ans`) VALUES
(1, 1, 'jjfhsadjfhasdjklhjksadjkasdhf', 'jsdjhasdjf', 'ewewew', 'werqwe', 'werqwe', 'ewewew');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `result_tbl_id` int(50) NOT NULL,
  `applicant_tbl_id` int(50) NOT NULL,
  `marks` int(100) NOT NULL,
  `remarks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submission`
--

CREATE TABLE `tbl_submission` (
  `submission_tbl_id` int(50) NOT NULL,
  `applicant_tbl_id` int(50) NOT NULL,
  `exam_tbl_id` int(50) NOT NULL,
  `question_tbl_id` int(50) NOT NULL,
  `given_ans` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_submission`
--

INSERT INTO `tbl_submission` (`submission_tbl_id`, `applicant_tbl_id`, `exam_tbl_id`, `question_tbl_id`, `given_ans`) VALUES
(1, 6, 1, 1, 'ewewew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_tbl_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`applicant_tbl_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`),
  ADD KEY `program_tbl_id` (`program_tbl_id`);

--
-- Indexes for table `tbl_exam_info`
--
ALTER TABLE `tbl_exam_info`
  ADD PRIMARY KEY (`exam_tbl_id`),
  ADD KEY `program_tbl_id` (`program_tbl_id`);

--
-- Indexes for table `tbl_program_info`
--
ALTER TABLE `tbl_program_info`
  ADD PRIMARY KEY (`program_tbl_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_tbl_id`),
  ADD KEY `exam_tbl_id` (`exam_tbl_id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`result_tbl_id`),
  ADD KEY `applicant_tbl_id` (`applicant_tbl_id`);

--
-- Indexes for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  ADD PRIMARY KEY (`submission_tbl_id`),
  ADD KEY `applicant_tbl_id` (`applicant_tbl_id`),
  ADD KEY `exam_tbl_id` (`exam_tbl_id`),
  ADD KEY `question_tbl_id` (`question_tbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `applicant_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_exam_info`
--
ALTER TABLE `tbl_exam_info`
  MODIFY `exam_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_program_info`
--
ALTER TABLE `tbl_program_info`
  MODIFY `program_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `result_tbl_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  MODIFY `submission_tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD CONSTRAINT `tbl_applicant_ibfk_1` FOREIGN KEY (`program_tbl_id`) REFERENCES `tbl_program_info` (`program_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_exam_info`
--
ALTER TABLE `tbl_exam_info`
  ADD CONSTRAINT `tbl_exam_info_ibfk_1` FOREIGN KEY (`program_tbl_id`) REFERENCES `tbl_program_info` (`program_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD CONSTRAINT `tbl_question_ibfk_1` FOREIGN KEY (`exam_tbl_id`) REFERENCES `tbl_exam_info` (`exam_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD CONSTRAINT `tbl_result_ibfk_1` FOREIGN KEY (`applicant_tbl_id`) REFERENCES `tbl_applicant` (`applicant_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  ADD CONSTRAINT `tbl_submission_ibfk_1` FOREIGN KEY (`applicant_tbl_id`) REFERENCES `tbl_applicant` (`applicant_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_submission_ibfk_2` FOREIGN KEY (`exam_tbl_id`) REFERENCES `tbl_exam_info` (`exam_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_submission_ibfk_3` FOREIGN KEY (`question_tbl_id`) REFERENCES `tbl_question` (`question_tbl_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
