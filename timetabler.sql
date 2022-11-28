-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 02:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `timetabler`
--

-- --------------------------------------------------------
--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`)
VALUES (5, 'Friday'),
  (1, 'Monday'),
  (4, 'Thursday'),
  (2, 'Tuesday'),
  (3, 'Wednesday');
-- --------------------------------------------------------
--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `unit_code` varchar(20) NOT NULL,
  `lecturer` varchar(30) NOT NULL,
  `constraint_timeshift` varchar(50) DEFAULT NULL,
  `constraint_venue_category` varchar(50) DEFAULT NULL,
  `constraint_days` varchar(50) DEFAULT NULL,
  `Allocated_Day` varchar(50) DEFAULT NULL,
  `Allocated_Timeshift` varchar(50) DEFAULT NULL,
  `Allocated_Venue` varchar(50) DEFAULT NULL,
  `no` int(3) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (
    `id`,
    `unit_code`,
    `lecturer`,
    `constraint_timeshift`,
    `constraint_venue_category`,
    `constraint_days`,
    `Allocated_Day`,
    `Allocated_Timeshift`,
    `Allocated_Venue`,
    `no`
  )
VALUES (
    1,
    'MM01',
    'Mr M',
    'Dawn',
    'ADB Building,Computer Labs',
    'Tuesday',
    NULL,
    NULL,
    NULL,
    4
  ),
  (
    2,
    'SIT 300',
    'Mr Mwai',
    'Dawn',
    'High Floor,Engineering Labs,F ',
    'Tuesday,Thursday',
    NULL,
    NULL,
    NULL,
    6
  ),
  (
    3,
    'CCM 202',
    'Ms Mwangi',
    '',
    'Engineering Labs,F ',
    '',
    NULL,
    NULL,
    NULL,
    2
  ),
  (
    4,
    'BBM 303',
    'Mr Njagi',
    '',
    '',
    '',
    NULL,
    NULL,
    NULL,
    0
  ),
  (
    5,
    'CIT 202',
    'Mr Muswimi',
    'Dawn',
    'ADB Building,High Floor,Engineering Labs,F ',
    'Monday,Tuesday',
    NULL,
    NULL,
    NULL,
    7
  ),
  (
    6,
    'MM02',
    'Dr Mweni',
    '',
    '',
    'Wednesday',
    NULL,
    NULL,
    NULL,
    1
  ),
  (
    7,
    'BOC 220',
    'Ms Mathenge',
    'Dawn',
    'Pioneer Building',
    'Monday,Tuesday,Wednesday',
    NULL,
    NULL,
    NULL,
    5
  ),
  (
    8,
    'DDI 101',
    'Mr Martin',
    '',
    '',
    '',
    NULL,
    NULL,
    NULL,
    0
  ),
  (
    9,
    'UCU 202',
    'Mrs Kamunge',
    '',
    '',
    '',
    NULL,
    NULL,
    NULL,
    0
  ),
  (
    10,
    'SIT 303',
    'Dr Kyalo',
    'Dawn,Afternoon,Evening',
    'Engineering Labs',
    'Monday,Tuesday,Wednesday,Thursday',
    NULL,
    NULL,
    NULL,
    8
  ),
  (
    11,
    'FFC 202',
    'Ms Kelly',
    'Evening',
    'Pioneer Building',
    'Monday,Tuesday',
    NULL,
    NULL,
    NULL,
    4
  ),
  (
    12,
    'CIT 102',
    'Dr Susan',
    'Evening',
    '',
    'Wednesday',
    NULL,
    NULL,
    NULL,
    2
  ),
  (
    13,
    'MED 202',
    'Dr Mugambi',
    'Dawn,Morning,Afternoon',
    '',
    'Tuesday,Thursday',
    NULL,
    NULL,
    NULL,
    5
  ),
  (
    14,
    'HND 063',
    'Mrs Maina',
    'Evening',
    '',
    '',
    NULL,
    NULL,
    NULL,
    1
  ),
  (
    15,
    'SMA 331',
    'Mr Bundi',
    'Afternoon',
    '',
    'Thursday',
    NULL,
    NULL,
    NULL,
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `timeshifts`
--

CREATE TABLE `timeshifts` (
  `id` int(11) NOT NULL,
  `timeshift` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `timeshifts`
--

INSERT INTO `timeshifts` (`id`, `timeshift`)
VALUES (3, 'Afternoon'),
  (1, 'Dawn'),
  (4, 'Evening'),
  (2, 'Morning');
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`)
VALUES (
    1,
    'PeterNdungu',
    'pndunguedu@gmail.com',
    '12345'
  );
-- --------------------------------------------------------
--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(11) NOT NULL,
  `venue` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `capacity` int(4) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue`, `category`, `capacity`)
VALUES (1, 'ADB 202', 'ADB Building', 200),
  (2, 'ADB Gen Lab', 'Computer Labs', 50),
  (3, 'ADB 303', 'High Floor', 150),
  (4, 'EEE 2', 'Engineering Labs', 50),
  (5, 'FD12', 'F & D Workshops', 25),
  (6, 'PF1L1', 'Pioneer Building', 70);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `days`
--
ALTER TABLE `days`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day` (`day`);
--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `timeshifts`
--
ALTER TABLE `timeshifts`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timeshift` (`timeshift`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venue` (`venue`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 16;
--
-- AUTO_INCREMENT for table `timeshifts`
--
ALTER TABLE `timeshifts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;