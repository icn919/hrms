-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 06:15 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$RvtUPzkoksmbHr2lH4lGbuPupQ3zSmfXgGdrxGg7rkjFtD4LKayt6', 'ADMINISTRATOR', '', 'download.png', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(87, 1, '2020-05-08', '01:40:51', 1, '00:00:00', 0),
(88, 1, '2021-07-10', '17:47:25', 0, '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `deleted_on` date DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `monthly_rate` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gsis` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `bir` varchar(255) NOT NULL,
  `comelec` varchar(255) NOT NULL,
  `green_card` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `vaccinated` varchar(255) NOT NULL,
  `sg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `photo`, `created_on`, `deleted_on`, `reason`, `monthly_rate`, `age`, `gsis`, `philhealth`, `pagibig`, `bir`, `comelec`, `green_card`, `remarks`, `vaccinated`, `sg`) VALUES
(30, 'WRN1302', 'Ivan Carl', 'NAZAIRE', 'Kawit Cavite', '1997-05-26', '09283667570', 'Male', 1, '80671833_2694905963888550_916776458846732288_n.jpg', '2021-08-04', NULL, NULL, '500', 24, '2000-809-453', '1900-0095-8682', '1210-6770-8190', '187-356-687', '', '', 'MWF', 'Not Yet', 'ABC-L'),
(31, 'HDF3210', 'Alljon', 'MIRANDA', 'Las Pinas', '1997-06-25', '09283667571', 'Male', 2, '44379803_474470883045015_1661535861126201344_n.jpg', '2021-08-04', NULL, NULL, '501', 24, '2001-3205-300', '1658-9875-9563', '3215-6568-6548', '543-985-632', '', '', 'MWF', 'Not Yet', 'ABC-C'),
(32, 'FZW0312', 'Justin', 'CORONEL', 'Imus Cavite', '1997-07-27', '09283667573', 'Male', 3, '54413266_2214437598873674_5979173429033566208_n.jpg', '2021-08-04', '2021-08-04', NULL, '502', 24, '6985-6565-6321', '9897-6328-9853', '1547-6532-4258', '132-745-874', '', '', 'TTS', 'Done', 'ABC-B'),
(33, 'NMG3102', 'John Paul', 'GARCIA', 'Bacoor Cavite', '1997-07-30', '09283667574', 'Male', 4, '82777568_1537644099707054_116610668483837952_n.jpg', '2021-08-04', NULL, NULL, '503', 24, '2184-6623-5421', '1548-5622-3115', '7155-3112-6114', '548-546-874', '', '', 'TTS', 'Done', 'ABC-H'),
(34, 'MLI0321', 'Marklin', 'VIRAY', 'Imus Cavite', '1997-08-25', '09283667575', 'Male', 5, '80431255_2654797684587712_1648632301900267520_n.jpg', '2021-08-04', NULL, NULL, '504', 24, '3215-6515-6513', '4765-4543-6653', '6548-5421-3215', '321-654-324', '', '', 'TTS', 'Done', 'ABC-G'),
(35, 'NUR0132', 'Elijah Jeremy', 'RACCA', 'Sta. Rosa Laguna', '1995-04-24', '09283667576', 'Male', 6, '210233302_2325800164218825_6642619738251092053_n.jpg', '2021-08-04', NULL, NULL, '505', 26, '5432-6549-2156', '9845-3215-3214', '6546-2315-9862', '321-369-985', '', '', 'MWF', 'Done', 'ABC-I'),
(36, 'FMD0312', 'Kean Patrick', 'ALFON', 'Imus Cavite', '1997-09-25', '09283667577', 'Male', 6, '221318647_3110141099219300_9203292596488148566_n.jpg', '2021-08-04', NULL, NULL, '506', 23, '6548-9875-3216', '6548-6548-3216', '9826-3215-6547', '321-985-312', '', '', 'TTS', 'Done', 'ABC-A'),
(37, 'HSO1230', 'Psalm Joseph', 'CAITOM', 'Imus Cavite', '1998-10-27', '09283667578', 'Male', 7, '78481149_712481692577313_4536797916387344384_n.jpg', '2021-08-04', NULL, NULL, '507', 27, '2156-6548-6512', '9875-6542-3254', '6845-5425-3542', '321-987-346', '', '', 'TTS', 'Done', 'ABC-D'),
(38, 'PFG1230', 'Rodney', 'OMPOC', 'Zapote Cavite', '1995-05-30', '09283667579', 'Male', 8, '212979500_4630232977004566_7989501869119439454_n.jpg', '2021-08-04', NULL, NULL, '508', 26, '3215-6548-6548', '3215-6532-6542', '3215-8763-3215', '321-656-321', '', '', 'TTS', 'Done', 'ABC-J'),
(39, 'LFG2031', 'Patrick', 'GARCIA', 'Taal Batangas', '1998-05-15', '09283667580', 'Male', 8, '206900741_4136715113056209_3920248369135367837_n.jpg', '2021-08-04', NULL, NULL, '509', 23, '3215-3215-3215', '9875-3215-3125', '6548-6543-6532', '321-315-543', '', '', 'Senior Citizen', '2nd Dose', 'ABC-F'),
(41, 'IXL0312', 'Kenneth', 'MAGLANTAY', 'Bacoor, Cavite', '1997-06-30', '09827461624', 'Male', 16, 'kenneth.jpg', '2021-07-20', NULL, NULL, '507', 21, '6548-9875-3235', '6548-6548-3235', '9826-3215-6535', '321-985-335', '', '', 'TTS', 'Done', 'ABC-E'),
(42, 'PMZ0132', 'Justin Keir', 'QUILATES', 'Imus, Cavite', '1999-10-25', '09284615234', 'Male', 2, 'justin.jpg', '2019-10-31', NULL, NULL, '501', 23, '6548-9875-3236', '6548-6548-3236', '9826-3215-6536', '321-985-336', '', '', 'MWF', '1st Dose', 'ABC-K');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`) VALUES
(1, 'CASUAL 1 -GARBAGE'),
(2, 'CASUAL 1 -YELLOW BOYS CASUAL'),
(3, 'CASUAL 1 -ADMIN'),
(4, 'CASUAL 1 -MO SPD YELLOW BOYS'),
(5, 'JOB ORDER -CLEAN & GREEN/MAINTENANCE'),
(6, 'JOB ORDER -YELLOW BOYS'),
(7, 'JOB ORDER -PC YELLOW BOYS'),
(8, 'JOB ORDER -WATER TRUCK'),
(9, 'JOB ORDER -COMPACTOR TRUCK DRIVER'),
(10, 'JOB ORDER -COMPACTOR TRUCK PALERO'),
(11, 'JOB ORDER -SPD SOLID WASTE MANAGEMENT (SPD SWM)'),
(12, 'JOB ORDER -SOLID WASTE MANAGEMENT (SWM)'),
(13, 'VOLUNTEER -BANTAY KALIKASAN'),
(14, 'VOLUNTEER -ENVIRONMENTAL POLICE'),
(15, 'VOLUNTEER -OVERPASS ATTENDANT'),
(16, 'JOB ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `tbleave`
--

CREATE TABLE `tbleave` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `leavetype_id` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `posting` date DEFAULT NULL,
  `adminremark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleave`
--

INSERT INTO `tbleave` (`id`, `employee_id`, `leavetype_id`, `fromdate`, `todate`, `posting`, `adminremark`) VALUES
(32, '36', 2, '2021-08-25', '2021-08-30', '2021-08-04', 'Medical Purpose'),
(33, '32', 3, '2021-08-04', '2021-09-30', '2021-08-04', 'Family Matter'),
(34, '31', 13, '2021-08-30', '2021-09-06', '2021-08-04', 'Attitude');

-- --------------------------------------------------------

--
-- Table structure for table `tbleavetype`
--

CREATE TABLE `tbleavetype` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleavetype`
--

INSERT INTO `tbleavetype` (`id`, `description`, `creationdate`) VALUES
(2, 'Medical Leave Test', '2021-07-22 13:56:18'),
(3, 'Vacation Leave', '2021-07-22 13:57:52'),
(13, 'Force Leave', '2021-08-04 08:05:28'),
(14, 'Maternity Leave', '2021-08-04 08:05:39'),
(15, 'Sick Leave', '2021-08-04 08:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbmemo`
--

CREATE TABLE `tbmemo` (
  `id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  `employee_id` varchar(15) NOT NULL,
  `memo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmemo`
--

INSERT INTO `tbmemo` (`id`, `date_created`, `employee_id`, `memo`) VALUES
(17, '2021-08-04', '36', 'Laziness'),
(18, '2021-08-04', '32', 'Late'),
(19, '2021-08-04', '31', 'Uncooperative'),
(20, '2021-08-04', '37', 'Disciplinary Action'),
(21, '2021-08-04', '39', 'Verbal Warning'),
(22, '2021-08-04', '34', 'Written Warning'),
(23, '2021-08-04', '33', 'Performance Improvement Plan'),
(24, '2021-08-04', '35', 'Temporary Pay Cut'),
(25, '2021-08-04', '38', 'Lost of Privileges'),
(26, '2021-08-04', '30', 'Suspension');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbleave`
--
ALTER TABLE `tbleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbleavetype`
--
ALTER TABLE `tbleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbmemo`
--
ALTER TABLE `tbmemo`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbleave`
--
ALTER TABLE `tbleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbleavetype`
--
ALTER TABLE `tbleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbmemo`
--
ALTER TABLE `tbmemo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
