-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 07:06 PM
-- Server version: 5.6.24-log
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appoinment`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_avail`
--

CREATE TABLE `change_avail` (
  `staff_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `mor_time` varchar(250) NOT NULL,
  `aft_time` varchar(250) NOT NULL,
  `eve_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `change_avail`
--

INSERT INTO `change_avail` (`staff_id`, `date`, `mor_time`, `aft_time`, `eve_time`) VALUES
(1, '2017-04-03', '03:00AM', '03:00PM', '03:00PM'),
(1, '2017-04-20', '03:00AM', 'undefined', 'undefined'),
(1, '2017-04-12', '03:00AM', '03:00PM', '03:00PM'),
(1, '2017-04-22', '03:00AM', 'undefined', '03:00PM'),
(2, '2017-04-25', '08:00AM-08:30AM-undefined-undefined-10:00AM-10:30AM-11:00AM-11:30AM', '12:00PM-12:30PM-undefined-undefined-02:00PM-02:30PM-03:00PM-03:30PM-04:00PM-04:30PM', '05:00PM-05:30PM-06:00PM-undefined-07:00PM-07:30PM-08:00PM-08:30PM'),
(2, '2017-04-12', '08:00AM-08:30AM-09:00AM-09:30AM-10:00AM-10:30AM-11:00AM-11:30AM', '12:00PM-12:30PM-01:00PM-01:30PM-02:00PM-02:30PM-03:00PM-03:30PM-04:00PM-04:30PM', '05:00PM-05:30PM-06:00PM-06:30PM-07:00PM-07:30PM-08:00PM-08:30PM');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `staff_id` int(10) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `from_day` varchar(20) NOT NULL,
  `to_day` varchar(20) NOT NULL,
  `time_slot` int(10) NOT NULL,
  `mor_start` varchar(20) NOT NULL,
  `mor_end` varchar(20) NOT NULL,
  `aft_start` varchar(20) NOT NULL,
  `aft_end` varchar(20) NOT NULL,
  `eve_start` varchar(20) NOT NULL,
  `eve_end` varchar(20) NOT NULL,
  `file` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`staff_id`, `dept`, `from_day`, `to_day`, `time_slot`, `mor_start`, `mor_end`, `aft_start`, `aft_end`, `eve_start`, `eve_end`, `file`) VALUES
(1, 'MCG School', 'Mon', 'Wed', 30, '03:00 PM', '03:00 PM', '03:00 PM', '03:00 PM', '03:00 PM', '03:00 PM', 'Whitesleeves.png'),
(2, 'Dental Science', 'Mon', 'Sat', 30, '08:00 AM', '11:30 AM', '12:00 PM', '04:30 PM', '05:00 PM', '08:30 PM', 'Prestige-house.png'),
(3, 'Dental Science', 'Mon', 'Sat', 30, '08:00 AM', '11:30 AM', '12:00 PM', '04:30 PM', '05:00 PM', '07:30 PM', 'bass-guitar.png'),
(4, 'MCG School', 'Mon', 'Sat', 30, '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', 'ayna.png'),
(5, 'Dental Science', 'Mon', 'Fri', 30, '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', 'calezy-1.png'),
(6, 'Dental Science', 'Mon', 'Fri', 30, '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', '05:15 PM', 'calezy.png'),
(7, 'Dental Science', 'Mon', 'Fri', 30, '05:30 PM', '05:30 PM', '05:30 PM', '05:30 PM', '05:30 PM', '05:30 PM', 'EGAM.png');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uin` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `type`, `name`, `uin`, `email`, `pass`) VALUES
(1, 2, 'vishal patel', 2125, 'vishal@gmail.com', 'vishal'),
(2, 2, 'Arzoo Shaikh', 3154, 'arzoo@gmail.com', 'arzoo'),
(3, 2, 'vivek patel', 1713, 'vivek@gmail.com', 'vivek'),
(4, 2, 'vijay patel', 8272, 'vijay@gmail.com', 'vijay'),
(5, 2, 'raj patel', 4149, 'raj@gmail.com', 'raj'),
(6, 2, 'harsh patel', 7000, 'harsh@gmail.com', 'harsh'),
(7, 2, 'subhash patel', 4466, 'subhash@gmail.com', 'subhash'),
(8, 1, 'vishal akbari', 1742, 'vishalpatel@gmail.com', 'vishal'),
(9, 1, 'vivek patel', 1742, 'vivek@gmail.com', 'vivek');

-- --------------------------------------------------------

--
-- Table structure for table `student_appoinment`
--

CREATE TABLE `student_appoinment` (
  `staff_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `shift_time` varchar(12) NOT NULL,
  `shift_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_appoinment`
--

INSERT INTO `student_appoinment` (`staff_id`, `student_id`, `shift_time`, `shift_date`) VALUES
(2, 8, '09:00AM', '2017-04-04'),
(2, 8, '10:30', '2017-04-08'),
(2, 8, '06:30PM', '2017-04-12'),
(3, 8, '11:00AM', '2017-04-04'),
(2, 9, '08:00AM', '2017-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `uin`
--

CREATE TABLE `uin` (
  `uin_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uin`
--

INSERT INTO `uin` (`uin_no`) VALUES
(9936),
(9012),
(1713),
(2869),
(5760),
(3154),
(4220),
(4258),
(4202),
(8272),
(2289),
(1742),
(2455),
(7000),
(2125),
(4149),
(6094),
(2350),
(2645),
(4466),
(5963),
(7064),
(9143),
(2041),
(1505),
(6661),
(8437),
(9671),
(5336),
(3350),
(1408),
(7470),
(9384),
(5482),
(8235),
(4893),
(2902),
(1966),
(1233),
(7305);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
