-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 03:17 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.14-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mathcountsgrading`
--
CREATE DATABASE IF NOT EXISTS `mathcountsgrading` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mathcountsgrading`;

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE IF NOT EXISTS `competition` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `competition_date` date NOT NULL,
  `competition_type` enum('chapter','state','national') NOT NULL,
  `status_sprint` float(10,2) DEFAULT NULL,
  `status_target1` float(10,2) DEFAULT NULL,
  `status_target2` float(10,2) DEFAULT NULL,
  `status_target3` float(10,2) DEFAULT NULL,
  `status_target4` float(10,2) DEFAULT NULL,
  `status_team` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `competition_answers`
--

CREATE TABLE IF NOT EXISTS `competition_answers` (
  `CID` int(11) NOT NULL,
  `problem_type` enum('sprint','target1','target2','target3','target4','team') NOT NULL,
  `problem_number` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `tie_index` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competition_participants`
--

CREATE TABLE IF NOT EXISTS `competition_participants` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mathlete_info`
--

CREATE TABLE IF NOT EXISTS `mathlete_info` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SCID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `is_team` tinyint(1) NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `mathlete_scores`
--

CREATE TABLE IF NOT EXISTS `mathlete_scores` (
  `SID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `sprint_raw` int(11) NOT NULL,
  `target_raw1` int(11) NOT NULL,
  `target_raw2` int(11) NOT NULL,
  `target_raw3` int(11) NOT NULL,
  `target_raw4` int(11) NOT NULL,
  `target_raw_total` int(11) NOT NULL,
  `main_total` int(11) NOT NULL,
  `mathlete_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE IF NOT EXISTS `school_info` (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `first_year` tinyint(1) NOT NULL,
  `ly_rank` int(11) NOT NULL,
  `ly_score` float(10,2) NOT NULL,
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE IF NOT EXISTS `student_answers` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `GID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `problem_type` enum('sprint','target1','target2','target3','target4') NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_cleaner`
--

CREATE TABLE IF NOT EXISTS `student_cleaner` (
  `SID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `sprint_raw` int(11) NOT NULL,
  `target_raw1` int(11) NOT NULL,
  `target_raw2` int(11) NOT NULL,
  `target_raw3` int(11) NOT NULL,
  `target_raw4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_answers`
--

CREATE TABLE IF NOT EXISTS `team_answers` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL,
  `GID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `team_answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_cleaner`
--

CREATE TABLE IF NOT EXISTS `team_cleaner` (
  `SCID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `team_raw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
