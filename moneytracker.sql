-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 07:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneytracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `Sr_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`Sr_no`, `email`, `category`, `date`, `description`, `amount`) VALUES
(1, 'shubhampatelsp812@gmail.com', 'Personal', '08/12/2016', 'Food', 210),
(2, 'shubhampatelsp812@gmail.com', 'Utility Bills', '07/08/2016', 'Electricity Bill', 2080),
(3, 'shubhampatelsp812@gmail.com', 'Transportation', '12/12/12', 'asd', 12311);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Sr_no` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Current Salary` int(10) NOT NULL,
  `confirm` int(1) NOT NULL DEFAULT '0',
  `created on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Sr_no`, `name`, `email`, `password`, `Current Salary`, `confirm`, `created on`) VALUES
(1, 'Shubham Patel', 'shubhampatelsp812@gmail.com', '123', 40000, 0, '2016-07-30 12:14:36'),
(10, 'Shubham', 'contact@shubhampatel.com', '1234', 40000, 0, '2016-07-30 16:23:20'),
(11, 'Shubham Patel', 'contact@shubhampatel.com', '1234', 123, 0, '2016-07-30 17:02:08'),
(12, 'Shubham Patel', 'contact@shubhampatel.com', '1234', 123, 0, '2016-07-30 17:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `verifyemail`
--

CREATE TABLE `verifyemail` (
  `code` int(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifyemail`
--

INSERT INTO `verifyemail` (`code`, `email`) VALUES
(29428, 'contact@shubhampatel.com'),
(13090, 'contact@shubhampatel.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
