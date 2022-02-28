-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2022 at 08:38 PM
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
(21, 'sampleschooltpr', 'Sample Senior International School', '04:51pm', '20-02-2022', 'aadharsh oru kirukan\r\n', 0, '[]'),
(22, 'sampleschooltpr', 'Sample Senior International School', '03:12pm', '23-02-2022', 'Para paraiso de aventura por mi alma prisionera.', 0, '[]'),
(25, 'sampleschooltpr', 'Sample Senior International School', '08:14pm', '23-02-2022', 'Screen resize check confirmed ✅', 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `sampleschooltpr_students`
--

CREATE TABLE `sampleschooltpr_students` (
  `id` int(15) NOT NULL,
  `rollnumber` varchar(11) NOT NULL DEFAULT '0',
  `student_name` varchar(200) NOT NULL DEFAULT 'name not mentioned',
  `search_keyword` varchar(150) NOT NULL,
  `photo_name` varchar(500) NOT NULL,
  `class` varchar(10) NOT NULL,
  `class_status` varchar(10) NOT NULL,
  `edu_group` varchar(23) NOT NULL,
  `dob` varchar(14) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `contact_1` varchar(20) NOT NULL,
  `contact_2` varchar(20) NOT NULL DEFAULT 'Not Mentioned',
  `annual_income` varchar(25) NOT NULL,
  `cared_by` varchar(10) NOT NULL,
  `academic_year` varchar(25) NOT NULL,
  `account_status` varchar(11) NOT NULL,
  `stu_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `school_account_info`
--

CREATE TABLE `school_account_info` (
  `id` int(250) NOT NULL,
  `schoolusername` varchar(200) NOT NULL,
  `join_date` varchar(50) NOT NULL,
  `renewal_date` varchar(50) NOT NULL,
  `expiration_date` varchar(50) NOT NULL,
  `total_stu_count` int(50) NOT NULL DEFAULT 0,
  `used_stu_count` int(50) NOT NULL DEFAULT 0,
  `per_stu_price` int(10) NOT NULL DEFAULT 0,
  `total_staff_count` int(50) NOT NULL DEFAULT 0,
  `used_staff_count` int(50) NOT NULL DEFAULT 0,
  `per_staff_price` int(10) NOT NULL DEFAULT 0,
  `total_classrooms` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_account_info`
--

INSERT INTO `school_account_info` (`id`, `schoolusername`, `join_date`, `renewal_date`, `expiration_date`, `total_stu_count`, `used_stu_count`, `per_stu_price`, `total_staff_count`, `used_staff_count`, `per_staff_price`, `total_classrooms`) VALUES
(1, 'sampleschooltpr', '14/02/2022', '14/02/2022', '14/02/2023', 1400, 10, 15, 150, 3, 25, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampleschooltpr_feeder`
--
ALTER TABLE `sampleschooltpr_feeder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sampleschooltpr_students`
--
ALTER TABLE `sampleschooltpr_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_list`
--
ALTER TABLE `schools_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_account_info`
--
ALTER TABLE `school_account_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampleschooltpr_feeder`
--
ALTER TABLE `sampleschooltpr_feeder`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sampleschooltpr_students`
--
ALTER TABLE `sampleschooltpr_students`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools_list`
--
ALTER TABLE `schools_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_account_info`
--
ALTER TABLE `school_account_info`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
