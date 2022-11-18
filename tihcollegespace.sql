-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.epizy.com
-- Generation Time: Feb 27, 2022 at 05:14 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30798259_tihcollegespace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `midname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `unique_id`, `firstname`, `midname`, `lastname`, `gender`, `phone`, `email`, `password`, `photo`) VALUES
(1, '15201219000', 'Admin', '', 'Ronit', 'male', '7003622801', 'mail.to.ronit.official@gmail.com', '12', 'images/15201219000_Admin.webp');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'teacher', 'teacher', 'teacher'),
(3, 'student', 'student', 'student'),
(29, 'manishyadav01445@gmail.com', 'M1A2n3i4&', 'student'),
(31, 'parweena224@gmail.com', 'mood#99', 'student'),
(32, 'gaurav.jha.1703@gmail.com', '12345', 'student'),
(33, 'nandanipuja234@gmail.com', 'nandani2001', 'student'),
(36, 'sayandipart598@gmail.com', 'sayandip', 'student'),
(37, 'rajendra250601@gmail.com', 'Rahul', 'teacher'),
(38, 'ronitsingh7003@gmail.com', 'ronit', 'teacher'),
(41, 'debojyotidas9293@gmail.com', 'rivu2012', 'student'),
(42, 'ronitsingh7003@gmail.com', 'ronit', 'teacher'),
(44, 'ronitsinghpersonal@gmail.com', 'ronit', 'student'),
(46, 'mail.to.ronit.official@gmail.com', '12', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `Name`, `email`, `message`, `status`) VALUES
(1, 'DEBOJYOTI DAS', 'debojyotidas9294@gmail.com', 'hello', 1),
(4, 'Rajendra Kumar Shaw', 'rajendra250601@gmail.com', 'Hello, This is Rajendra', 1),
(5, 'Debojyoti Das', 'debojyotidas9294@gmail.com', 'Hello ', 1),
(7, 'Cyberchan', 'mailforrahul01@gmail.com', 'I wanna join you', 1),
(8, 'Shinchan', 'mailforrahul01@gmail.com', 'Hello', 0),
(9, 'Ronit', 'ronitsingh7003@gmail.com', 'Help\r\n', 0),
(10, 'Sandip kumar shar', 'Sandipshaw442000@gmail.com', 'I wanna join you', 1),
(11, 'DEBOJYOTI DAS', 'debojyotidas9294@gmail.com', 'hi\r\n', 0),
(12, 'Ronit Singh', 'ronitsingh7003@gmail.com', 'abcdgs', 0),
(13, 'Ronit Singh', 'ronitsingh7003@gmail.com', 'abcdgs', 0),
(14, 'Ektaa Shaw', 'Ektaashaw.es99@gmail.com', 'Hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `q_paper`
--

CREATE TABLE `q_paper` (
  `id` int(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `question_paper` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `q_paper`
--

INSERT INTO `q_paper` (`id`, `teacher_id`, `stream`, `semester`, `subject`, `year`, `question_paper`, `date`) VALUES
(26, '', '1', '3', '15', '2019', 'b.jpeg', '2021-12-25 04:20:10'),
(27, '', '4', '18', '113', '2019', '15201219063_Output.PNG', '2021-12-25 15:55:23'),
(28, '', '1', '4', '24', '2016', 'b.jpeg', '2021-12-28 15:52:13'),
(36, '', '4', '17', '106', '2012', '../../QuestionPaper/MSC/SEM1/MICS-101 Discrete Mathematics/2012_MICS-101 Discrete Mathematics.pdf', '2021-12-31 10:16:03'),
(38, '', '4', '17', '107', '2014', '../../QuestionPaper/MSC/SEM1/MICS-102 Linear Algebra/2014_MICS-102 Linear Algebra.pdf', '2021-12-31 10:44:23'),
(39, '', '4', '17', '108', '2015', '../../QuestionPaper/MSC/SEM1/MICS-103 Computer Networks/2015_MICS-103 Computer Networks.jpeg', '2021-12-31 15:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_class`
--

CREATE TABLE `schedule_class` (
  `id` int(250) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `classlink` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `streams_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `sem`, `streams_id`) VALUES
(1, 'SEM1', 1),
(2, 'SEM2', 1),
(3, 'SEM3', 1),
(4, 'SEM4', 1),
(5, 'SEM5', 1),
(6, 'SEM6', 1),
(7, 'SEM1', 2),
(8, 'SEM2', 2),
(9, 'SEM3', 2),
(10, 'SEM4', 2),
(11, 'SEM5', 2),
(12, 'SEM6', 2),
(13, 'SEM1', 3),
(14, 'SEM2', 3),
(15, 'SEM3', 3),
(16, 'SEM4', 3),
(17, 'SEM1', 4),
(18, 'SEM2', 4),
(19, 'SEM3', 4),
(20, 'SEM4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `stream` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream`) VALUES
(1, 'BCA'),
(2, 'BBA'),
(3, 'MCA'),
(4, 'MSC');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `midname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `stream` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `unique_id`, `firstname`, `midname`, `lastname`, `dob`, `gender`, `stream`, `section`, `semester`, `phone`, `email`, `password`, `photo`) VALUES
(1, '15201219115', 'kkk', 'lll', 'mmm', '2019-11-10', 'male', 'BCA', 'beta', 'semester4', '0000000000', 'mailforhacking2345@gmail.com', 'mmmmm', 'images/15201219115_20210307_105301.jpg'),
(2, '15201219054', 'MANISH', 'KUMAR', 'YADAV', '2000-06-07', 'male', 'BCA', 'Alpha', 'SEM1', '6290803640', 'manishyadav01445@gmail.com', 'M1A2n3i4&', 'images/15201219054_mani.jpg'),
(3, '15201219063', 'GULAFSHAN ', '', ' PARWEEN', '2001-03-20', 'female', 'BCA', 'Alpha', 'SEM5', '6290744900', 'parweena224@gmail.com', 'mood#99', 'images/15201219063_d.jpg'),
(4, '15201219086', 'GAURAV', '', 'JHA', '2001-03-17', 'male', 'BCA', 'Beta', 'SEM5', '7370857827', 'gaurav.jha.1703@gmail.com', '12345', 'images/15201219086_Gaurav.jpg'),
(5, '15201220115', 'Nandani ', '', 'Singh', '2001-09-22', 'female', 'BCA', 'Beta', 'SEM3', '7439576723', 'nandanipuja234@gmail.com', 'nandani2001', 'images/15201220115_Nandani jpg'),
(6, '15201219115', 'Sayandip', '', 'Naskar', '1999-02-01', 'male', 'BCA', 'Beta', 'SEM5', '9875472566', 'sayandipart598@gmail.com', 'sayandip', 'images/15201219115_IMG20211222124458.jpg'),
(9, '15201219048', 'DEBOJYOTI', '', 'DAS', '1999-10-15', 'male', 'BCA', 'Alpha', 'SEM3', '8902959702', 'debojyotidas9293@gmail.com', 'rivu2012', 'images/15201219048_DEBOJYOTI.webp'),
(11, '15201219027', 'RONIT', '', 'SINGH', '2001-08-03', 'male', 'BCA', 'Alpha', 'SEM5', '7003622801', 'ronitsinghpersonal@gmail.com', 'ronit', 'images/15201219027_RONIT.webp');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `semesters_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `semesters_id`) VALUES
(2, 'BCAN-102 Environment Studies', 1),
(3, 'BCAN-103 C Programming', 1),
(4, 'BMN-101 Basic Mathematical Computation', 1),
(5, 'BCAN-193 Programming Lab with C', 1),
(6, 'BCAN-181 PC Software Lab', 1),
(7, 'BCAN-201 Computer Architecture', 2),
(8, 'BCAN-202 Software Engineering', 2),
(9, 'BCAN-203 Data Structure with C', 2),
(10, 'BMN-201 Advanced Mathematical Computation', 2),
(11, 'HUN-201 English Language and Comminucation', 2),
(12, 'BCAN-293 Data Structure Lab with C', 2),
(13, 'HUN-291 Business Presentation and Language Lab', 2),
(14, 'BCAN-301 Operating System', 3),
(15, 'BCAN-E302A Object Oriented Programming with C++', 3),
(16, 'BCAN-E302B GUI Programming with .NET', 3),
(17, 'BCAN-303 Computer Graphics', 3),
(18, 'BMN-301 Mathematics for Computing', 3),
(19, 'BCAN-E392A Programming Lab with C++', 3),
(20, 'BCAN-E392B Programming Lab with .NET', 3),
(21, 'BCAN-381 Web Technology Lab', 3),
(22, 'BCAN-401 Database Management System', 4),
(23, 'BCAN-402 Programming with Java', 4),
(24, 'BCAN-403 Computer Networking', 4),
(25, 'BMN-401 Numerical Analysis', 4),
(26, 'BCAN-491 Database Lab', 4),
(27, 'BCAN-492 Programming Lab with Java', 4),
(28, 'BCAN-481 Soft Skill Development', 4),
(29, 'BCAN-501 Cyber Security', 5),
(30, 'BCAN-502 Unix and Shell Programming', 5),
(31, 'BCA(BBA)N-501 Management and Accounting', 5),
(32, 'BCAN-591 Minor Project', 5),
(33, 'BCAN-592 Linux Lab', 5),
(34, 'BCAN-583 Industrial Training', 5),
(35, 'BCAN-E601A Python Programming', 6),
(36, 'BCAN-E601B Artificial Intelligence', 6),
(37, 'BCAN-E601C E-Commerce', 6),
(38, 'BCAN-E602A Web Technology with PHP', 6),
(39, 'BCAN-E602B MySQL Advanced DBMS', 6),
(40, 'BCAN-E603C PLSQL Digital Marketing', 6),
(41, 'HUN-601 Values and Ethics of Profession', 6),
(42, 'BCAN-691 Major Project with Viva-Voce', 6),
(43, 'BBAN-101 English', 7),
(44, 'BBAN-102 Basics of Mathematics', 7),
(45, 'BBAN-103 Fundamentals of Statistics', 7),
(46, 'BBAN-104 Economics(Micro)', 7),
(47, 'BBAN-105 Computer Application', 7),
(48, 'BBAN-201 Business Communication', 8),
(49, 'BBAN-202 Advanced Mathematics and Statistics', 8),
(50, 'BBAN-203 Organizational Behaviour', 8),
(51, 'BBAN-204 Economics(Macro)', 8),
(52, 'BBAN-205 Indian Social Structure and Values & Ethics', 8),
(53, 'BBAN-301 Principles of Management', 9),
(54, 'BBAN-302 Managerial Economics', 9),
(55, 'BBAN-303 Business Laws', 9),
(56, 'BBAN-304 Financial Accounting', 9),
(57, 'BBAN-305 Environmental Sciences', 9),
(58, 'BBAN-401 Production & Materials Managemt', 10),
(59, 'BBAN-402 Management Information System', 10),
(60, 'BBAN-403 Cost Accounting', 10),
(61, 'BBAN-404 Marketing Management', 10),
(62, 'BBAN-405 Human Resource Management', 10),
(63, 'BBAN-501 Financial Management', 11),
(64, 'BBAN-502 Sales & Distribution Management', 11),
(65, 'BBAN-503 Human Resource Development', 11),
(66, 'BBAN-504 Entrepreneurship Development', 11),
(67, 'BBAN-505 Research Methodology', 11),
(68, 'BBAN-601 Management Accounting', 12),
(69, 'BBAN-602 Advertising & Sales Promotion', 12),
(70, 'BBAN-603 Industrial Relations', 12),
(71, 'BBAN-604 Public Service Management', 12),
(72, 'BBAN-605 Project and Viva', 12),
(73, 'MCA-101 Computer Organisation & Architecture', 13),
(74, 'MCA-102 Business System and Application', 13),
(75, 'MCA-103 Computer Programming with C', 13),
(76, 'MM-101 Discrete Mathematical Structure', 13),
(77, 'HU-101 Business English and Communication', 13),
(78, 'MCA-191 Micro Programming & Architecture Lab', 13),
(79, 'MCA-193 Programming Lab (C)', 13),
(80, 'HU-191 Business Presentation and Language Lab', 13),
(81, 'MCA-201 Data Communication & Computer Networks', 14),
(82, 'MCA-202 Information System Analysis & Design', 14),
(83, 'MCA-203 Data Structure with C', 14),
(84, 'MCA-204 Database Management System 1', 14),
(85, 'MCA-205 Object-Oriented Programming with C++', 14),
(86, 'MCA-293 Data Structure Lab', 14),
(87, 'MCA-294 Database Lab', 14),
(88, 'MCA-295 Object-Oriented Programming Lab', 14),
(89, 'MCA-301 Operating Systems & Systems Software', 15),
(90, 'MCA-302 Unix and Shell Programming', 15),
(91, 'MCA-303 Intelligent Systems', 15),
(92, 'MM-301 Statistics and Numerical Techniques', 15),
(93, 'MBA-301 Business Management', 15),
(94, 'MBA-302 Management Accounting', 15),
(95, 'MCA-392 Unix Lab', 15),
(96, 'MM-391 Statistics and Numerical Analysis', 15),
(97, 'MBA-392 Accounting Systems Lab', 15),
(98, 'MCA-401 Software Engineering & TQM', 16),
(99, 'MCA-402 Graphics & Multimedia', 16),
(100, 'MCA-403 Database Management System II', 16),
(101, 'MM-401 Operation Research & Optimisation Techniques', 16),
(102, 'HU-401 Environment & Ecology', 16),
(103, 'MCA-491 Software Project Management Lab', 16),
(104, 'MCA-492 Graphics & Multimedia Lab', 16),
(105, 'MCA-493 Advanced Database Lab', 16),
(106, 'MICS-101 Discrete Mathematics', 17),
(107, 'MICS-102 Linear Algebra', 17),
(108, 'MICS-103 Computer Networks', 17),
(109, 'MICS-104 Design and Analysis of Algorithms', 17),
(110, 'MICS-191 Python Programming Lab', 17),
(111, 'MICS-192 Design and Analysis of Algorithms Lab', 17),
(112, 'MICS-201 Cryptography', 18),
(113, 'MICS-202 Operating System', 18),
(114, 'MICS-203 Bayesian Networks', 18),
(115, 'MICS-204 Pattern Recognition and Machine Learning', 18),
(116, 'MICS-205 Network Security Firewalls and Virtual Private Networks', 18),
(117, 'MICS-291 Machine Learning Lab', 18),
(118, 'MICS-292 Operating System Lab', 18),
(119, 'MICS-301 Information Security Risk Management', 19),
(120, 'MICS-302 Biometric Security', 19),
(121, 'MICS-303 Data Privacy', 19),
(122, 'MICS-304 Intrusion Detection and Prevention System', 19),
(123, 'MICS-305 Wireless and Mobile Device Security', 19),
(124, 'MICS-391 Linux Systems Security Lab', 19),
(125, 'MICS-392 Wireless Security Lab', 19),
(126, 'MICS-481 Major Project', 20),
(127, 'MICS-482 Grand Viva', 20),
(128, 'MICS-E401A Security in Internet of Things', 20),
(129, 'MICS-E401B Security in Cloud Computing', 20),
(130, 'MICS-E401C Legal Issues in Cyber Security', 20),
(131, 'MICS-E402A Computer Forensics', 20),
(132, 'MICS-E402B Information Warfare', 20),
(133, 'MICS-E402C Social Network Analysis', 20);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `midname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bca` int(10) NOT NULL,
  `bba` int(11) NOT NULL,
  `mca` int(11) NOT NULL,
  `msc` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `unique_id`, `firstname`, `midname`, `lastname`, `dob`, `gender`, `bca`, `bba`, `mca`, `msc`, `phone`, `email`, `password`, `photo`) VALUES
(30, '15201219048', 'DEBOJYOTI', '', 'DAS', '1999-10-15', 'male', 1, 1, 1, 1, '6290289140', 'debojyotidas9294@gmail.com', 'rivu2016', 'images/15201219048_DEBOJYOTI DAS.jpg'),
(32, '15201219115', 'Rajendra', 'Kumar', 'Shaw', '2001-06-25', 'male', 1, 0, 1, 0, '7980998131', 'rajendra250601@gmail.com', 'Rahul', 'images/15201219115_IMG20211218100653.jpg'),
(33, '15201219026', 'Ronit', '', 'Singh', '2001-08-03', 'male', 1, 0, 1, 0, '7003622801', 'ronitsingh7003@gmail.com', 'ronit', 'images/15201219026_Ronit.webp'),
(34, '15201219026', 'Ronit', '', 'Singh', '2001-08-03', 'male', 1, 0, 1, 0, '7003622801', 'ronitsingh7003@gmail.com', 'ronit', 'images/15201219026_Ronit.webp');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `year` varchar(15) NOT NULL,
  `title` varchar(150) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `stream`, `year`, `title`, `message`, `file`, `date`, `time`) VALUES
(1, 'ALL', 'ALL', 'College Reopening', 'It is hereby notify that college is reopeningon 16th November 2021.', '', '2021-12-12', '03:04:30am'),
(2, 'ALL', 'ALL', 'College Reopening', 'It is hereby notify that college is reopeningon 16th November 2021.', '', '2021-12-12', '03:05:53am'),
(3, 'ALL', 'ALL', 'spark quest 3.0', 'spark quest 3.0 is coming soon', '', '2021-12-15', '12:54:30am'),
(4, 'BCA', 'Second Year', 'bca', 'hello hifive', '', '2021-12-23', '02:03:25am'),
(5, 'BCA', 'First Year', 'Team Exchanger', 'We glad to inform you our project is going to complete', 'Updates/xx.PNG', '2021-12-26', '04:46:29am'),
(6, 'BCA', 'First Year', 'Team Exchanger', 'We glad to inform you our project is going to complete', 'Updates/xx.PNG', '2021-12-26', '04:48:06am'),
(7, 'BCA', 'Second Year', 'Exam Form Fillup', 'Fillup the exam form from 4th january 2021.', '', '2021-12-28', '01:34:40am'),
(8, 'BCA', 'Second Year', 'Exam Form Fillup', 'Fillup the exam form from 4th january 2021.', '', '2021-12-28', '01:35:27am'),
(9, 'ALL', 'ALL', 'Double File Checking', '', 'Updates/bca-bca-602c-advanced-database-management-2009.pdf', '2021-12-28', '09:53:25am'),
(11, 'ALL', 'ALL', '3 Files', '', 'Updates/bca-bca-602c-advanced-database-management-2011.pdf,Updates/bca-bca-602c-advanced-database-management-2013.pdf,Updates/bca-bca-602c-advanced-database-management-system-2012.pdf,', '2021-12-28', '10:28:03am'),
(12, 'BCA', 'Second Year', 'Indian Timezone', 'Current time is 10:02pm', 'Updates/,', '2021-12-28', '10:03:01pm'),
(13, 'BBA', 'Second Year', 'xyz', '', '', '2021-12-31', '11:31:35pm'),
(14, 'BCA', 'First Year', 'happy new year', '', '', '2021-12-31', '11:41:23pm'),
(15, 'BCA', 'First Year', 'testing', '', '', '2021-12-31', '11:43:17pm'),
(16, 'BCA', 'First Year', 'testing2', 'hello', '', '2021-12-31', '11:45:01pm'),
(17, 'BBA', 'Second Year', 'etes', '', '', '2021-12-31', '11:45:15pm'),
(18, 'BCA', 'Third Year', 'tes', '', '', '2021-12-31', '11:46:14pm'),
(19, 'BBA', 'First Year', 'dhvuyi', '', '', '2021-12-31', '11:46:36pm'),
(20, 'BCA', 'First Year', 'dhbdu', '', '', '2021-12-31', '11:47:26pm'),
(21, 'BCA', 'First Year', 'dhbdu', '', '', '2021-12-31', '11:47:33pm'),
(22, 'ALL', 'ALL', '2file', '', 'Updates/bca-102-5.pdf,Updates/bca-102-6.pdf,', '2021-12-31', '11:48:03pm'),
(23, 'ALL', 'ALL', 'tesi', 'no file', '', '2021-12-31', '11:50:47pm'),
(24, 'ALL', 'ALL', 'Hello World', 'Hello Ronit', '', '2022-01-03', '11:01:48am');

-- --------------------------------------------------------

--
-- Table structure for table `update_sem`
--

CREATE TABLE `update_sem` (
  `id` int(11) NOT NULL,
  `sem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_sem`
--

INSERT INTO `update_sem` (`id`, `sem`) VALUES
(1, 'ALL'),
(2, 'SEM1'),
(3, 'SEM2'),
(4, 'SEM3'),
(5, 'SEM4'),
(6, 'SEM5'),
(7, 'SEM6');

-- --------------------------------------------------------

--
-- Table structure for table `update_streams`
--

CREATE TABLE `update_streams` (
  `id` int(11) NOT NULL,
  `stream` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_streams`
--

INSERT INTO `update_streams` (`id`, `stream`) VALUES
(1, 'ALL'),
(2, 'BCA'),
(3, 'BBA'),
(4, 'MCA'),
(5, 'MSC');

-- --------------------------------------------------------

--
-- Table structure for table `upload_notes`
--

CREATE TABLE `upload_notes` (
  `id` int(250) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `file` varchar(250) NOT NULL,
  `recordinglink` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_notes`
--

INSERT INTO `upload_notes` (`id`, `faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `file`, `recordinglink`) VALUES
(1, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-03', 'Notes/class.cpp', ''),
(2, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-11-29', 'Notes/EXAMPLE.CPP', 'https://youtu.be/XcVuLO2DlB8'),
(3, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphpF698.tmp,Notes/C:xampp	mpphpF6A9.tmp,Notes/C:xampp	mpphpF6AA.tmp,', ''),
(4, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphpCF48.tmp,Notes/C:xampp	mpphpCF49.tmp,Notes/C:xampp	mpphpCF4A.tmp,', ''),
(5, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphp6AD6.tmp,Notes/C:xampp	mpphp6AD7.tmp,Notes/C:xampp	mpphp6AD8.tmp,', ''),
(6, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphp46B2.tmp,Notes/C:xampp	mpphp46C2.tmp,Notes/C:xampp	mpphp46C3.tmp,', ''),
(7, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphpCE34.tmp,Notes/C:xampp	mpphpCE35.tmp,Notes/C:xampp	mpphpCE36.tmp,', ''),
(8, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphp57CA.tmp,Notes/C:xampp	mpphp57CB.tmp,Notes/C:xampp	mpphp57CC.tmp,', ''),
(9, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphp7BAC.tmp,Notes/C:xampp	mpphp7BAD.tmp,Notes/C:xampp	mpphp7BBD.tmp,', ''),
(10, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphp8270.tmp,Notes/C:xampp	mpphp8271.tmp,Notes/C:xampp	mpphp8272.tmp,', ''),
(11, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphpF523.tmp,Notes/C:xampp	mpphpF524.tmp,Notes/C:xampp	mpphpF534.tmp,', ''),
(12, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/C:xampp	mpphpC8E1.tmp,Notes/C:xampp	mpphpC8F2.tmp,Notes/C:xampp	mpphpC8F3.tmp,', ''),
(13, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/atm.cpp,Notes/BankingSystem.cpp,Notes/C++ File Handling.docx,', ''),
(14, '1', 'Subrata Saha', 'BCA', 'SEM1', 'Alpha', 'C Programming', 'Codechef code', '2021-12-01', 'Notes/atm.cpp,Notes/BankingSystem.cpp,Notes/C++ File Handling.docx,', ''),
(15, '15201219026', 'Ronit  Singh', 'BCA', 'SEM1', 'Combined', 'BCAN-103 C Programming', 'Ex_001', '2021-12-09', 'Notes/EX_001.C,', ''),
(16, '15201219026', 'Ronit  Singh', 'BCA', 'SEM3', 'Beta', 'BCAN-301 Operating System', 'OS Note 1', '2021-12-03', 'Notes/OS NOTE 1.pdf,', ''),
(17, '15201219026', 'Ronit  Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(18, '15201219026', 'Ronit  Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-301 Operating System', 'OS Note 2', '2021-12-09', 'Notes/08-28 OS NOTE 2.pdf,Notes/OS NOTE 2.pdf,', ''),
(19, '15201219026', 'Ronit  Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(20, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(21, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(22, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(23, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(24, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(25, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(26, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(27, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(28, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(29, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(30, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(31, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(32, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(33, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(34, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(35, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(36, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(37, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(38, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(39, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(40, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(41, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(42, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(43, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(44, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(45, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(46, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(47, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(48, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(49, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(50, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(51, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(52, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(53, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(54, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(55, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(56, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(57, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(58, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(59, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(60, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(61, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(62, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(63, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(64, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(65, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(66, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(67, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(68, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(69, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(70, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(71, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(72, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(73, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(74, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(75, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(76, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(77, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(78, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(79, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(80, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(81, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(82, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(83, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(84, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(85, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(86, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(87, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(88, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(89, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(90, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(91, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(92, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(93, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(94, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(95, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(96, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(97, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(98, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(99, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(100, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(101, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(102, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(103, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(104, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(105, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(106, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(107, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(108, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(109, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(110, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(111, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(112, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(113, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(114, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(115, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(116, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(117, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(118, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(119, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(120, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(121, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(122, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(123, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(124, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(125, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(126, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(127, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(128, '15201219026', 'Ronit Singh', 'BCA', 'SEM3', 'Combined', 'BCAN-E302A Object Oriented Programming with C++', 'Sum of Two Number', '2021-12-10', 'Notes/00 Sum of two number.cpp,', ''),
(129, '15201219026', 'Ronit  Singh', 'BCA', 'SEM5', 'Combined', 'BCAN-592 Linux Lab', 'PHP Files', '2021-12-11', 'Notes/Calculation.php,Notes/Palindrome String.php,Notes/PalindromeNumber.php,Notes/SampleData.html,Notes/SampleForm.html,', ''),
(130, '15201219026', 'Ronit  Singh', 'BCA', 'SEM5', 'Combined', 'BCAN-502 Unix and Shell Programming', 'MCQ for Exam', '2022-01-07', 'Notes/test.c,', ''),
(131, '15201219026', 'Ronit  Singh', 'BCA', 'SEM5', 'Combined', 'BCAN-502 Unix and Shell Programming', 'MCQ for Exam', '2022-01-07', 'Notes/test.c,', ''),
(132, '15201219026', 'Ronit  Singh', 'BCA', 'SEM5', 'Combined', 'BCAN-502 Unix and Shell Programming', 'MCQ for Exam', '2022-01-07', 'Notes/test.c,', ''),
(133, '15201219026', 'Ronit  Singh', 'BCA', 'SEM5', 'Beta', 'BCA(BBA)N-501 Management and Accounting', 'testing', '2022-01-05', 'Notes/test.c,', '');

-- --------------------------------------------------------

--
-- Table structure for table `verification_data`
--

CREATE TABLE `verification_data` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_data`
--

INSERT INTO `verification_data` (`id`, `unique_id`, `email`, `role`, `otp`, `status`) VALUES
(4, '15201219063', 'parweena224@gmail.com', 'student', '408282', 1),
(5, '15201219054', 'manishyadav01445@gmail.com', 'student', '847350', 1),
(7, '15201220115', 'nandanipuja234@gmail.com', 'student', '439918', 1),
(9, '15201219086', 'gaurav.jha.1703@gmail.com', 'student', '995903', 1),
(11, '15201219115', 'sayandipart598@gmail.com', 'student', '228915', 1),
(16, '15201219115', 'rajendra250601@gmail.com', 'teacher', '243470', 0),
(17, '15201219026', 'ronitsingh7003@gmail.com', 'teacher', '299536', 0),
(25, '15201219048', 'debojyotidas9293@gmail.com', 'student', '777401', 1),
(28, '15201219129', 'banerjeedeblina07@gmail.com', 'student', '863302', 0),
(29, '15201219027', 'ronitsinghpersonal@gmail.com', 'student', '908399', 1),
(30, '15201219000', 'mail.to.ronit.official@gmail.com', 'admin', '723786', 1),
(36, '15201219025', 'atulgiri21dec@gmail.com', 'admin', '606494', 0),
(37, '15201221007', 'agamani.banerjee28092003@gmail.com', 'student', '588961', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year`) VALUES
(1, '2012'),
(2, '2013'),
(3, '2014'),
(4, '2015'),
(5, '2016'),
(6, '2017'),
(7, '2018'),
(8, '2019'),
(9, '2020'),
(10, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `stream_id`) VALUES
(1, 'First Year', 2),
(2, 'Second Year', 2),
(3, 'Third Year', 2),
(4, 'First Year', 3),
(5, 'Second Year', 3),
(6, 'Third Year', 3),
(7, 'First Year', 4),
(8, 'Second Year', 4),
(9, 'First Year', 5),
(10, 'Second Year', 5),
(11, 'ALL', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_paper`
--
ALTER TABLE `q_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_class`
--
ALTER TABLE `schedule_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_sem`
--
ALTER TABLE `update_sem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_streams`
--
ALTER TABLE `update_streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_notes`
--
ALTER TABLE `upload_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_data`
--
ALTER TABLE `verification_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `q_paper`
--
ALTER TABLE `q_paper`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `schedule_class`
--
ALTER TABLE `schedule_class`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `upload_notes`
--
ALTER TABLE `upload_notes`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `verification_data`
--
ALTER TABLE `verification_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
