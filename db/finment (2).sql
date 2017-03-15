-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 01:44 PM
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
-- Table structure for table `clientrequest`
--

CREATE TABLE `clientrequest` (
  `access_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `amountrequested` text,
  `totrequested` text,
  `amountrepay` text,
  `totrepay` text,
  `bapproval` int(11) DEFAULT NULL,
  `rapproval` int(11) DEFAULT NULL,
  `interestrate` double DEFAULT NULL,
  `category` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientrequest`
--

INSERT INTO `clientrequest` (`access_id`, `email`, `created_at`, `amountrequested`, `totrequested`, `amountrepay`, `totrepay`, `bapproval`, `rapproval`, `interestrate`, `category`) VALUES
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:46:51', '200', '40300', NULL, NULL, 0, NULL, 2.5, 'loan'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:46:35', '100', '40100', NULL, NULL, 0, NULL, 2.5, 'loan'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:46:44', NULL, NULL, '3000', '13000', NULL, 0, 0, 'repay'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:46:01', NULL, NULL, '10000', '10000', NULL, 0, 0, 'repay'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:46:10', '10000', '40000', NULL, NULL, 0, NULL, 2.5, 'loan'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:45:54', '20000', '30000', NULL, NULL, 0, NULL, 2.5, 'loan'),
('9939', 'ravi.sairam27@icloud.com', '2017-03-15 15:45:47', '10000', '10000', NULL, NULL, 0, NULL, 2.5, 'loan'),
('9939', 'sameer.valor@gmail.com', '2017-03-15 17:51:41', NULL, NULL, '3000', '3000', NULL, 0, 0, 'backamt');

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
(19, '58c82a60994122.14262889', '9939', 'sai', 'ram', 'ravi.sairam27@icloud.com', 'tpUysBpjtI1fM3MgeLBUImIWmIkwNDliMjMxMjg2', '049b231286', '2017-03-14 23:07:36', '2017-03-15 12:32:41', '9160545192', 231312, 'GCXPS7223E', '9160545192', 'eff938390e6919154e6719e093c3c6b3', 1),
(18, '58c82a3bbf9334.02918458', '9939', 'sai', 'ram', 'ravi.sairam97@live.com', 'SqqSwxCswfFEnHdCJfi6ADdNibI2NzQ2OTU3NTc3', '6746957577', '2017-03-14 23:06:59', NULL, '9160545192', 231434, 'GCXPS7223E', '9160545192', '1edf5e39d5d83e0f39474d4b9a41356a', 1);

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
(12, '58c829f1727657.55955262', '9939', 'sairam', 'ravi', 'ravi.sairam27@gmail.com', 'Pc6OUmqolERpyPP7TrKpLvYou+QwOGFiM2YzZWY2', '08ab3f3ef6', '2017-03-14 23:05:45', NULL, '9160545192', 2313, 'GCXPS7223E', '9160545192', 'ae762bb696e9843d84b1401505bef401', 1, '2', '2', NULL);

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
('9939', '2017-03-14 23:05:45', NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `fintax`
--

CREATE TABLE `fintax` (
  `access_id` varchar(11) NOT NULL,
  `created_id` datetime DEFAULT NULL,
  `interestearned` text,
  `taxutp` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investorrequest`
--

CREATE TABLE `investorrequest` (
  `access_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `amountinvest` text,
  `totamtinvest` text,
  `amountback` text,
  `totamtback` text,
  `iapproval` int(11) DEFAULT NULL,
  `baapproval` int(11) DEFAULT NULL,
  `interestrate` double DEFAULT NULL,
  `category` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investorrequest`
--

INSERT INTO `investorrequest` (`access_id`, `email`, `created_at`, `amountinvest`, `totamtinvest`, `amountback`, `totamtback`, `iapproval`, `baapproval`, `interestrate`, `category`) VALUES
('9939', 'sameer.valor@gmail.com', '2017-03-15 18:46:08', '20000', '30000', NULL, NULL, 0, NULL, 1.5, 'invest'),
('9939', 'sameer.valor@gmail.com', '2017-03-15 18:46:02', '10000', '10000', NULL, NULL, 0, NULL, 1.5, 'invest');

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
(18, '58c84421896e42.54134379', '9939', 'vamshi', 'pabba', 'yuvnith.vamshi@gmail.com', 'bYbdbE6Djp5sAunSGrBA7lbhtGJmNTEyNTExMmRm', 'f5125112df', '2017-03-15 00:57:29', NULL, '9160545192', 123144, 'GCXPS7223E', '9160545192', '1e44d5477eb47787ff84ea39a0fe0780', 0),
(17, '58c843afd72da6.92929790', '9939', 'sam', 'sameer', 'sameer.valor@gmail.com', 'rTJdSLfD8cM0+2WDFa564BXULZgzMWZjZmVmNmRh', '31fcfef6da', '2017-03-15 00:55:35', NULL, '9160545192', 12312, 'GCXPS7223E', '9160545192', '8600a6a54a9b1f41029f8cfa0eabd9cb', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `financiers`
--
ALTER TABLE `financiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
