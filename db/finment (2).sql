-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 09:28 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finment`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `access_id` varchar(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `mobile` varchar(40) NOT NULL,
  `aadhar` int(15) NOT NULL,
  `panid` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `unique_id`, `access_id`, `fname`, `lname`, `email`, `encrypted_password`, `salt`, `created_at`, `updated_at`, `mobile`, `aadhar`, `panid`, `password1`, `confirmation`, `activated`) VALUES
(17, '58c7a2ba7a5666.55814381', '7819', 'ram', 'rahim', 'ravi.sairam27@icloud.com', 'WTXP7c9HrM9+7QPRUpqZmoa4FngzMjc0ODE2NTUw', '3274816550', '2017-03-14 13:28:50', NULL, '9160545192', 21312, 'GCXPS7223E', '9160545192', '7fc2873a99f9bb992ce5a90a13e36129', 0),
(16, '58c7a253701ea3.11957984', '7819', 'sai', 'ram', 'ravi.sairam97@live.com', 'k4c9b9vGk0iFG+QjWowwrzkKFOpkNTYyYTcyNWMy', 'd562a725c2', '2017-03-14 13:27:07', NULL, '9160545192', 12312, 'GCXPS7223E', '9160545192', '51bcb95b0fb84144cf293896ef0b49aa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_no` varchar(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financiers`
--

CREATE TABLE `financiers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `access_id` varchar(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `mobile` varchar(40) NOT NULL,
  `aadhar` int(15) DEFAULT NULL,
  `panid` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `activated` int(11) NOT NULL,
  `clients` varchar(30) DEFAULT NULL,
  `Investors` varchar(30) DEFAULT NULL,
  `balance` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financiers`
--

INSERT INTO `financiers` (`id`, `unique_id`, `access_id`, `fname`, `lname`, `email`, `encrypted_password`, `salt`, `created_at`, `updated_at`, `mobile`, `aadhar`, `panid`, `password1`, `confirmation`, `activated`, `clients`, `Investors`, `balance`) VALUES
(11, '58c7a1e9ca3063.90528932', '7819', 'sai', 'ravi', 'ravi.sairam27@gmail.com', 'IFRKBKQYR8QoOIsuCZJyVfWYBlU5NzhhNDlhYmUy', '978a49abe2', '2017-03-14 13:25:21', NULL, '9160545192', 123123, 'GCXPS7223E', '9160545192', '368958a2c97df5b209399c4b19305a03', 1, '2', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finbalance`
--

CREATE TABLE `finbalance` (
  `access_id` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `amountadded` text,
  `amountreturned` text,
  `interestrate` double DEFAULT NULL,
  `interest` text,
  `balance` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finbalance`
--

INSERT INTO `finbalance` (`access_id`, `created_at`, `amountadded`, `amountreturned`, `interestrate`, `interest`, `balance`) VALUES
('7819', '2017-03-14 14:56:25', '2000', NULL, NULL, NULL, '110000'),
('7819', '2017-03-14 14:06:07', '3000', NULL, NULL, NULL, '108000'),
('7819', '2017-03-14 13:35:44', '2000', NULL, NULL, NULL, '105000'),
('7819', '2017-03-14 13:34:10', '100000', NULL, NULL, NULL, '103000'),
('7819', '2017-03-14 13:33:01', '3000', NULL, NULL, NULL, '3000'),
('7819', '2017-03-14 13:25:21', NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `access_id` varchar(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `mobile` varchar(40) NOT NULL,
  `aadhar` int(15) NOT NULL,
  `panid` varchar(20) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `activated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`id`, `unique_id`, `access_id`, `fname`, `lname`, `email`, `encrypted_password`, `salt`, `created_at`, `updated_at`, `mobile`, `aadhar`, `panid`, `password1`, `confirmation`, `activated`) VALUES
(16, '58c7a37845c947.80443243', '7819', 'ravi', 'ram', 'ravi.airam97@yahoo.com', 'MZixg0FPMhuKyFZdNTSqGgO6QQU5NWYxNjk0NDUx', '95f1694451', '2017-03-14 13:32:00', NULL, '9160545192', 21312, 'GCXPS7223E', '9160545192', '31f7ca0f8c4e05b3a4885a4752fc8401', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `financiers`
--
ALTER TABLE `financiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `financiers`
--
ALTER TABLE `financiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
