-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 06:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alohababes`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'admin', 'password', 'ADMINISTRATOR', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `emp_id` int(11) NOT NULL,
  `emp_card` int(11) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_position` varchar(50) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_contact` varchar(20) NOT NULL,
  `emp_gender` enum('Male','Female') NOT NULL,
  `emp_timein` time NOT NULL,
  `emp_timeout` time NOT NULL,
  `sched_id` int(11) NOT NULL,
  `emp_regdate` date NOT NULL,
  `emp_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `date_advance` date NOT NULL,
  `emp_card` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_timein` time NOT NULL,
  `attendance_timeout` time NOT NULL,
  `attendance_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`attendance_id`, `employee_id`, `employee_name`, `attendance_date`, `attendance_timein`, `attendance_timeout`, `attendance_hour`) VALUES
(7, '90221', 'Dela Cerna, Keinth', '2024-05-02', '12:31:23', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_list`
--

CREATE TABLE `emp_list` (
  `emp_id` int(11) NOT NULL,
  `emp_card` varchar(100) NOT NULL,
  `emp_fname` varchar(100) NOT NULL,
  `emp_lname` varchar(100) NOT NULL,
  `emp_position` int(11) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_contact` varchar(100) NOT NULL,
  `emp_gender` varchar(100) NOT NULL,
  `emp_timein` time NOT NULL,
  `emp_timeout` time NOT NULL,
  `sched_id` int(11) NOT NULL,
  `emp_regdate` date NOT NULL,
  `emp_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_position`
--

CREATE TABLE `emp_position` (
  `pos_id` int(11) NOT NULL,
  `position_title` varchar(100) NOT NULL,
  `position_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_sched`
--

CREATE TABLE `emp_sched` (
  `sched_id` int(11) NOT NULL,
  `sched_in` time NOT NULL,
  `sched_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `emp_card` varchar(15) DEFAULT NULL,
  `emp_hours` double DEFAULT NULL,
  `emp_mins` double DEFAULT NULL,
  `date_overtime` date DEFAULT NULL,
  `emp_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary_deduct`
--

CREATE TABLE `salary_deduct` (
  `deduct_id` int(11) NOT NULL,
  `deduct_desc` varchar(100) NOT NULL,
  `deduct_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `emp_list`
--
ALTER TABLE `emp_list`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_position`
--
ALTER TABLE `emp_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `emp_sched`
--
ALTER TABLE `emp_sched`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_deduct`
--
ALTER TABLE `salary_deduct`
  ADD PRIMARY KEY (`deduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_list`
--
ALTER TABLE `emp_list`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `emp_position`
--
ALTER TABLE `emp_position`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_sched`
--
ALTER TABLE `emp_sched`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `salary_deduct`
--
ALTER TABLE `salary_deduct`
  MODIFY `deduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
