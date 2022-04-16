-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 14, 2022 at 07:35 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_db`
--
CREATE DATABASE IF NOT EXISTS `employee_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `employee_db`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(15) NOT NULL,
  `announcement` longtext NOT NULL,
  `date` timestamp NOT NULL,
  `pdf_file_name` varchar(75) NOT NULL,
  `employee_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(15) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `mission_statement` longtext NOT NULL,
  `company_logo` varchar(50) NOT NULL,
  `state_initial` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(15) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_initial` char(2) NOT NULL,
  `zip_code` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `employee_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_initial` varchar(5) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_initial`, `department_name`) VALUES
('BQT', 'banquet'),
('FD', 'front desk'),
('HK', 'house keeping'),
('HR', 'human resources'),
('RES', 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT 'user',
  `hashed_password` varchar(255) NOT NULL DEFAULT '12345',
  `user_level` varchar(10) DEFAULT 'employee',
  `department_initial` varchar(5) DEFAULT 'HR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `birthday`, `start_date`, `email`, `username`, `hashed_password`, `user_level`, `department_initial`) VALUES
(18, 'Mechelle', 'Presnell', '1970-08-28', '2017-10-08', 'me@me.com', 'user', '12345', 'admin', 'BQT'),
(34, 'Mike', 'Smith', '1970-08-28', '2020-08-28', 'mike@none.com', 'MikeSmith', '$2y$10$RWo6v78kE7karlOek.zffuCNoVYEOqh/deYgDugRl04pmrxIyp2Wq', 'admin', 'FD'),
(38, 'john', 'smith', '1990-10-10', '2020-10-10', 'john@john.com', 'user', '12345', 'admin', 'BQT'),
(40, 'john', 'lennon', '1966-10-10', '2020-10-10', 'j@j.com', 'user', '12345', 'admin', 'BQT'),
(43, 'Jennifer', 'Black', '1972-04-04', '2020-04-04', 'jen@jen.com', 'JenBlack', '$2y$10$4hPf6JjtnoHpPsuZm0GQo.L3ftkWfYyzwSLu.FBr75aw7UhSVRmHG', 'admin', 'HR'),
(50, 'Me', 'Pr', '1999-08-28', '2017-10-08', 'me@me.com', 'Mechelle', '$2y$10$lI7zyESVrT1nxDhiDFJWter3IXN6vJm0P7P/seN88yWkcJL9FkgYm', 'admin', 'BQT'),
(52, 'sue', 'dillin', '1999-10-10', '2020-10-10', 'me@me.com', 'sue123', '$2y$10$.ooal1zoZotfeccZ7hesQ.GbI5YRDCzGUG5lYH3ZHniudn6QbfmjK', 'admin', 'RES'),
(56, 'Mechelle', 'Presnell', '1970-08-28', '2017-10-08', 'me@me.com', 'Mechelle12345', '$2y$10$HVxgPd3UeJLhA4WyeWzkqOfAc3.OVuj78t.z8d3G.3yLtb6QzZKnm', 'admin', 'BQT'),
(57, 'Brionnah', 'Malcuit', '1996-05-29', '2017-10-08', 'me@me.com', 'Brionnah12345', '$2y$10$UjR.KmeY62h7QtQqFt4nreZtw/lfGKGhtfNG8v1sEu309WjTiEKj.', 'employee', 'FD'),
(58, 'Jennifer', 'Black', '1971-04-04', '2017-10-08', 'me@me.com', 'Jennifer12345', '$2y$10$Q5Sm3IIlhM.v03oIdh79YO2.G5yRDV5nXP1mySRJIv2b9N8b7Puha', 'admin', 'BQT'),
(59, 'Andrew', 'Presnell', '1998-10-02', '2017-10-08', 'a@a.com', 'Andrew12345', '$2y$10$f932ZPfnBncbSH7TtBvb0OJ2DLa2dntEhBd0tuAwR.2KeZ67RmRfC', 'employee', 'RES'),
(60, 'Bri', 'Mal', '2020-10-10', '2020-10-10', 'bri@bri.com', 'BriMal123', '$2y$10$rVacAduTDD0z24ibrotr2eoa1Rl5HEkCfmXTc6WpNmtXi5f.NLlDe', 'employee', 'BQT'),
(61, 'M', 'M', '2222-02-02', '2222-02-02', 'me@me.com', 'MePr12345', '$2y$10$BVQDLGGbBo.fVvv35ZwB/.c2PPhns.I6RGkWSwImKdaU465Tuvxji', 'admin', 'BQT'),
(63, 'Tyler', 'Presnell', '2020-10-10', '2020-10-10', 'T@t.com', 'Tyler12345', '$2y$10$leX2DqtW.VRQOyZJRzu/P.X.NpKwK8W4/gNQWSpMRE8agu4mhkCrW', 'admin', 'BQT'),
(68, 'Mike', 'Smith', '1999-09-09', '2020-09-09', 'mike@mike.com', 'Mike12345', '$2y$10$QAxNVf1bVWaXKEK9H3RWqu/HLut152qyTYawogZZPcMP6kDinzgKe', 'employee', 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(15) NOT NULL,
  `file_name` varchar(75) NOT NULL,
  `upload_date` timestamp NOT NULL,
  `employee_id` int(15) NOT NULL,
  `announcement_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_initial` char(2) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_initial`, `state_name`) VALUES
('AK', 'Alaska'),
('AL', ' Alabama'),
('AR', 'Arkansas'),
('AZ', 'Arizona'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('CZ', 'Canal Zone'),
('DC', 'District of Columbia'),
('DE', 'Delaware'),
('FL', 'Florida'),
('GA', 'Georgia'),
('GU', 'Guam'),
('HI', 'Hawaii'),
('IA', 'Iowa'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('MA', 'Massachusetts'),
('MD', 'Maryland'),
('ME', 'Maine'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MO', 'Missouri'),
('MS', 'Mississippi'),
('MT', 'Montana'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('NE', 'Nebraska'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NV', 'Nevada'),
('NY', 'New York'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VA', 'Virginia'),
('VI', 'Virgin Islands'),
('VT', 'Vermont'),
('WA', 'Washington'),
('WI', 'Wisconsin'),
('WV', 'West Virginia'),
('WY', 'Wyoming');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `state_initial` (`state_initial`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `state_initial` (`state_initial`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_initial`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `username` (`username`),
  ADD KEY `department_initial` (`department_initial`) USING BTREE;

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `announcement_id` (`announcement_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_initial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`state_initial`) REFERENCES `state` (`state_initial`);

--
-- Constraints for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD CONSTRAINT `contact_info_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `contact_info_ibfk_2` FOREIGN KEY (`state_initial`) REFERENCES `state` (`state_initial`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_initial`) REFERENCES `department` (`department_initial`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`announcement_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
