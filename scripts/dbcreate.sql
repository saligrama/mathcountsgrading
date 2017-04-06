-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mathcountsgrading
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `competition`
--

DROP TABLE IF EXISTS `competition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `competition_date` date NOT NULL,
  `competition_level` enum('chapter','state','national') DEFAULT NULL,
  `competition_name` varchar(100) DEFAULT NULL,
  `CTID` int(11) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competition_answers`
--

DROP TABLE IF EXISTS `competition_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_answers` (
  `CID` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `tie_index` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competition_participants`
--

DROP TABLE IF EXISTS `competition_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_participants` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competition_status`
--

DROP TABLE IF EXISTS `competition_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_status` (
  `CID` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `status` float(6,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `competition_type`
--

DROP TABLE IF EXISTS `competition_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_type` (
  `CTID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  `num_alternates` int(11) NOT NULL,
  `num_regulars` int(11) NOT NULL,
  `num_graders_to_confirm` int(11) NOT NULL,
  `grade_average` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CTID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `current_competition`
--

DROP TABLE IF EXISTS `current_competition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_competition` (
  `CID` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grader_responses`
--

DROP TABLE IF EXISTS `grader_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grader_responses` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB AUTO_INCREMENT=424 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grader_responses_team`
--

DROP TABLE IF EXISTS `grader_responses_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grader_responses_team` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `TRID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`TRID`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grading_conflicts`
--

DROP TABLE IF EXISTS `grading_conflicts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grading_conflicts` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `COID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`COID`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `grading_conflicts_team`
--

DROP TABLE IF EXISTS `grading_conflicts_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grading_conflicts_team` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `TCID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`TCID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mathlete_info`
--

DROP TABLE IF EXISTS `mathlete_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mathlete_info` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SCID` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=11196 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mathlete_scores`
--

DROP TABLE IF EXISTS `mathlete_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mathlete_scores` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `round`
--

DROP TABLE IF EXISTS `round`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round` (
  `CTID` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL AUTO_INCREMENT,
  `num_questions` int(11) NOT NULL,
  `points_per_question` int(11) NOT NULL,
  `round_name` varchar(100) DEFAULT NULL,
  `indiv` tinyint(1) NOT NULL,
  PRIMARY KEY (`RNDID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `school_info`
--

DROP TABLE IF EXISTS `school_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_info` (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `coach` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB AUTO_INCREMENT=744 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `student_answers`
--

DROP TABLE IF EXISTS `student_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `student_cleaner`
--

DROP TABLE IF EXISTS `student_cleaner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_cleaner` (
  `SID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `raw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `student_participants`
--

DROP TABLE IF EXISTS `student_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_participants` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `type` enum('regular','alternate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `team_answers`
--

DROP TABLE IF EXISTS `team_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_answers` (
  `CID` int(11) NOT NULL,
  `SCID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `team_cleaner`
--

DROP TABLE IF EXISTS `team_cleaner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_cleaner` (
  `SCID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `raw` int(11) NOT NULL,
  `RNDID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `SCID` int(11) DEFAULT NULL,
  `type` enum('admin','grader') DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-06  0:01:17
