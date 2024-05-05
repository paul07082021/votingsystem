-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 09:09 PM
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
(5, 'admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidates`
--

CREATE TABLE `tbl_candidates` (
  `c_id` int(11) NOT NULL,
  `c_elec_id` int(11) NOT NULL,
  `c_name` varchar(55) NOT NULL,
  `c_age` varchar(55) NOT NULL,
  `c_yearlevel` varchar(55) NOT NULL,
  `c_course` varchar(55) NOT NULL,
  `c_partylist` int(11) NOT NULL,
  `c_position` int(11) NOT NULL,
  `c_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `elec_id` int(11) NOT NULL,
  `elec_name` varchar(55) DEFAULT NULL,
  `elect_dateadded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_election`
--

INSERT INTO `tbl_election` (`elec_id`, `elec_name`, `elect_dateadded`) VALUES
(1, '2024 ELECTION', '2024-05-05');

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
(6, 'President', 1),
(7, 'Vice President', 1),
(8, 'Secretary', 1),
(9, 'Treasurer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vote`
--

CREATE TABLE `tbl_vote` (
  `v_id` int(11) NOT NULL,
  `v_election_id` int(11) NOT NULL,
  `v_studid` int(11) NOT NULL,
  `v_studentname` varchar(55) NOT NULL,
  `v_candidate_voted` int(11) NOT NULL,
  `v_position_id` int(11) NOT NULL,
  `v_partylist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `stud_pass` varchar(120) NOT NULL,
  `stud_isvote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  ADD PRIMARY KEY (`v_id`);

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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_election`
--
ALTER TABLE `tbl_election`
  MODIFY `elec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_partylist`
--
ALTER TABLE `tbl_partylist`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_vote`
--
ALTER TABLE `tbl_vote`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
