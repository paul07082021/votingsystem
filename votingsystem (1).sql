-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(55) NOT NULL,
  `admin_username` varchar(55) NOT NULL,
  `admin_password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_password`) VALUES
(1, 'Sample Admin', 'sampleadmin123', 'ggwphahah'),
(2, 'Sample Admin', 'sampleadmin123', 'ggwphahah'),
(3, 'Sample Admin', 'sampleadmin123', 'ggwphahah'),
(4, 'jonasss', 'jonas123', '1111122'),
(5, 'paul123', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidates`
--

CREATE TABLE `tbl_candidates` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(55) NOT NULL,
  `c_age` varchar(55) NOT NULL,
  `c_yearlevel` varchar(55) NOT NULL,
  `c_course` varchar(55) NOT NULL,
  `c_partylist` int(11) NOT NULL,
  `c_position` int(11) NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_candidates`
--

INSERT INTO `tbl_candidates` (`c_id`, `c_name`, `c_age`, `c_yearlevel`, `c_course`, `c_partylist`, `c_position`, `c_image`) VALUES
(1, 'adsada', '12', 'adsada', 'adsadsa', 2, 1, 'hahahaha.png'),
(2, 'dsad', '12', 'adsada', 'adsadasdsa', 4, 1, 'hahahaha.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `elec_id` int(11) NOT NULL,
  `elec_name` int(11) NOT NULL,
  `elect_dateadded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partylist`
--

CREATE TABLE `tbl_partylist` (
  `par_id` int(11) NOT NULL,
  `par_name` varchar(55) NOT NULL,
  `par_logo` varchar(255) NOT NULL,
  `par_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_partylist`
--

INSERT INTO `tbl_partylist` (`par_id`, `par_name`, `par_logo`, `par_desc`) VALUES
(4, 'ggg111', 'hahahaha.png', 'asdadasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `po_id` int(11) NOT NULL,
  `po_name` varchar(55) NOT NULL,
  `po_max_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`po_id`, `po_name`, `po_max_vote`) VALUES
(1, 'Presidents', 1),
(2, 'Vice President', 1),
(3, 'Secretary', 1),
(4, 'Treasurer', 1),
(5, 'Escorts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voters`
--

CREATE TABLE `tbl_voters` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(55) NOT NULL,
  `stud_fullname` varchar(55) NOT NULL,
  `stud_year` varchar(55) NOT NULL,
  `stud_course` varchar(55) NOT NULL,
  `stud_pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_voters`
--

INSERT INTO `tbl_voters` (`id`, `stud_id`, `stud_fullname`, `stud_year`, `stud_course`, `stud_pass`) VALUES
(14, '192-16892', 'Paul A Cayago', '4TH YEARs', 'BSITs', 'OcJILJoZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_election`
--
ALTER TABLE `tbl_election`
  ADD PRIMARY KEY (`elec_id`);

--
-- Indexes for table `tbl_partylist`
--
ALTER TABLE `tbl_partylist`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_election`
--
ALTER TABLE `tbl_election`
  MODIFY `elec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_partylist`
--
ALTER TABLE `tbl_partylist`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
