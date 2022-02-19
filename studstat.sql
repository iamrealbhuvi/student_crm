-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2022 at 06:53 PM
-- Server version: 10.6.5-MariaDB-2
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studstat`
--

-- --------------------------------------------------------

--
-- Table structure for table `sampleschooltpr_feeder`
--

CREATE TABLE `sampleschooltpr_feeder` (
  `id` int(200) NOT NULL,
  `postby` varchar(200) NOT NULL,
  `postername` varchar(255) NOT NULL DEFAULT 'NULL',
  `posttime` varchar(200) NOT NULL,
  `postdate` varchar(200) NOT NULL,
  `postcontent` varchar(1500) NOT NULL,
  `upvotes` int(100) NOT NULL DEFAULT 0,
  `upvoters` longtext NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampleschooltpr_feeder`
--

INSERT INTO `sampleschooltpr_feeder` (`id`, `postby`, `postername`, `posttime`, `postdate`, `postcontent`, `upvotes`, `upvoters`) VALUES
(1, 'sampleschooltpr', 'Sample Senior International School', '12.45pm', '16-02-2022', 'Due to upcoming elections, our school shut-down for three days.\r\n( 17-02-22, 18-02-22, 19-02-22 ).\r\n\r\n-By Sample School Management.', 3, '[\"teacher01\", \"teacher02\", \"teacher03\"]'),
(2, 'sampleschooltpr', 'Sample Senior International School', '02.50pm', '16-02-2022', 'School will be reopened on coming Monday( 21-02-2022 ).\r\n', 2, '[\'teacher01\', \'teacher03\']'),
(3, 'sampleschooltpr', 'Sample Senior International School', '03:39pm', '18-02-2022', 'Hola Students', 0, '[]'),
(4, 'sampleschooltpr', 'Sample Senior International School', '03:40pm', '18-02-2022', 'Hey Students, There\'s a an exhibition in our conducted on next moth first monday.', 0, '[]'),
(5, 'sampleschooltpr', 'Sample Senior International School', '03:45pm', '18-02-2022', 'Team Lag is one of the best growing team.', 0, '[]'),
(6, 'sampleschooltpr', 'Sample Senior International School', '03:53pm', '18-02-2022', 'Hey there!!!', 0, '[]'),
(7, 'sampleschooltpr', 'Sample Senior International School', '03:54pm', '18-02-2022', 'Hey there!!!', 0, '[]'),
(8, 'sampleschooltpr', 'Sample Senior International School', '03:55pm', '18-02-2022', 'Good evening teachers and students.', 0, '[]'),
(9, 'sampleschooltpr', 'Sample Senior International School', '03:56pm', '18-02-2022', 'Good evening Teachers and students...', 0, '[]'),
(10, 'sampleschooltpr', 'Sample Senior International School', '03:59pm', '18-02-2022', 'Our student student01 won in district level chess championship', 0, '[]'),
(11, 'sampleschooltpr', 'Sample Senior International School', '04:00pm', '18-02-2022', 'Kappal vidum poti nadatha padum', 0, '[]'),
(12, 'sampleschooltpr', 'Sample Senior International School', '04:00pm', '18-02-2022', 'Kappal vidum poti nadatha padum', 0, '[]'),
(13, 'sampleschooltpr', 'Sample Senior International School', '04:02pm', '18-02-2022', 'Sun is a star', 0, '[]'),
(14, 'sampleschooltpr', 'Sample Senior International School', '04:54pm', '18-02-2022', 'Internet Server Verification status done!!!', 0, '[]'),
(15, 'sampleschooltpr', 'Sample Senior International School', '03:12pm', '19-02-2022', 'Happy Weekend', 0, '[]'),
(16, 'sampleschooltpr', 'Sample Senior International School', '03:14pm', '19-02-2022', 'Tuesday in our school we planned an eye test camp. Don\'t Take leave...', 0, '[]'),
(17, 'sampleschooltpr', 'Sample Senior International School', '03:14pm', '19-02-2022', 'Thanks', 0, '[]'),
(19, 'sampleschooltpr', 'Sample Senior International School', '03:19pm', '19-02-2022', 'quiero dinero mas mas mas ', 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `schools_list`
--

CREATE TABLE `schools_list` (
  `id` int(100) NOT NULL,
  `schoolname` varchar(250) NOT NULL,
  `schoolusername` varchar(200) NOT NULL,
  `schoolpassword` varchar(200) NOT NULL,
  `schooladdress` varchar(400) NOT NULL,
  `schoolphonenumber1` varchar(100) NOT NULL,
  `schoolphonenumber2` varchar(100) NOT NULL,
  `premiumstatus` varchar(100) NOT NULL,
  `joindate` varchar(100) NOT NULL,
  `schoolidcode` varchar(100) NOT NULL,
  `schoolprofile` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_list`
--

INSERT INTO `schools_list` (`id`, `schoolname`, `schoolusername`, `schoolpassword`, `schooladdress`, `schoolphonenumber1`, `schoolphonenumber2`, `premiumstatus`, `joindate`, `schoolidcode`, `schoolprofile`) VALUES
(1, 'Sample Senior International School', 'sampleschooltpr', 'sampleschool@123', 'Sample School, 15 Velamplayam, Tirupur', '9876543210', '9012345678', 'active', '12/02/2022', 'SMPL', 'sampleschooltpr.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampleschooltpr_feeder`
--
ALTER TABLE `sampleschooltpr_feeder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_list`
--
ALTER TABLE `schools_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampleschooltpr_feeder`
--
ALTER TABLE `sampleschooltpr_feeder`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schools_list`
--
ALTER TABLE `schools_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
