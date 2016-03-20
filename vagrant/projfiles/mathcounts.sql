-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: mathcounts
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1-log

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
  `competition_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_sprint` tinyint(2) NOT NULL,
  `status_target` tinyint(2) NOT NULL,
  `status_team` tinyint(2) NOT NULL,
  PRIMARY KEY (`competition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition`
--

LOCK TABLES `competition` WRITE;
/*!40000 ALTER TABLE `competition` DISABLE KEYS */;
/*!40000 ALTER TABLE `competition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competition_participants_final`
--

DROP TABLE IF EXISTS `competition_participants_final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_participants_final` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coach_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_year` tinyint(2) NOT NULL,
  `last_year_rank` int(3) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_participants_final`
--

LOCK TABLES `competition_participants_final` WRITE;
/*!40000 ALTER TABLE `competition_participants_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `competition_participants_final` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competition_participants_known`
--

DROP TABLE IF EXISTS `competition_participants_known`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition_participants_known` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coach_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_year` tinyint(2) NOT NULL,
  `last_year_rank` int(3) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_participants_known`
--

LOCK TABLES `competition_participants_known` WRITE;
/*!40000 ALTER TABLE `competition_participants_known` DISABLE KEYS */;
/*!40000 ALTER TABLE `competition_participants_known` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graders`
--

DROP TABLE IF EXISTS `graders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `graders` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graders`
--

LOCK TABLES `graders` WRITE;
/*!40000 ALTER TABLE `graders` DISABLE KEYS */;
/*!40000 ALTER TABLE `graders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_sprint`
--

DROP TABLE IF EXISTS `official_answers_sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_sprint` (
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q11` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q12` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q14` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q15` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q16` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q17` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q18` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q19` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q20` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q21` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q22` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q23` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q25` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q26` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q27` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q28` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q29` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q30` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_sprint`
--

LOCK TABLES `official_answers_sprint` WRITE;
/*!40000 ALTER TABLE `official_answers_sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_target1`
--

DROP TABLE IF EXISTS `official_answers_target1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_target1` (
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_target1`
--

LOCK TABLES `official_answers_target1` WRITE;
/*!40000 ALTER TABLE `official_answers_target1` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_target1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_target2`
--

DROP TABLE IF EXISTS `official_answers_target2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_target2` (
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_target2`
--

LOCK TABLES `official_answers_target2` WRITE;
/*!40000 ALTER TABLE `official_answers_target2` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_target2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_target3`
--

DROP TABLE IF EXISTS `official_answers_target3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_target3` (
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_target3`
--

LOCK TABLES `official_answers_target3` WRITE;
/*!40000 ALTER TABLE `official_answers_target3` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_target3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_target4`
--

DROP TABLE IF EXISTS `official_answers_target4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_target4` (
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_target4`
--

LOCK TABLES `official_answers_target4` WRITE;
/*!40000 ALTER TABLE `official_answers_target4` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_target4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_answers_team`
--

DROP TABLE IF EXISTS `official_answers_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_answers_team` (
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q10` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_answers_team`
--

LOCK TABLES `official_answers_team` WRITE;
/*!40000 ALTER TABLE `official_answers_team` DISABLE KEYS */;
/*!40000 ALTER TABLE `official_answers_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_sprint`
--

DROP TABLE IF EXISTS `student_answers_sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_sprint` (
  `student_id` int(10) unsigned NOT NULL,
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q11` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q12` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q14` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q15` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q16` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q17` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q18` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q19` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q20` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q21` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q22` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q23` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q25` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q26` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q27` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q28` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q29` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q30` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_sprint`
--

LOCK TABLES `student_answers_sprint` WRITE;
/*!40000 ALTER TABLE `student_answers_sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_answers_sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_target1`
--

DROP TABLE IF EXISTS `student_answers_target1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_target1` (
  `student_id` int(10) unsigned NOT NULL,
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_target1`
--

LOCK TABLES `student_answers_target1` WRITE;
/*!40000 ALTER TABLE `student_answers_target1` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_answers_target1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_target2`
--

DROP TABLE IF EXISTS `student_answers_target2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_target2` (
  `student_id` int(10) unsigned NOT NULL,
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_target2`
--

LOCK TABLES `student_answers_target2` WRITE;
/*!40000 ALTER TABLE `student_answers_target2` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_answers_target2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_target3`
--

DROP TABLE IF EXISTS `student_answers_target3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_target3` (
  `student_id` int(10) unsigned NOT NULL,
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_target3`
--

LOCK TABLES `student_answers_target3` WRITE;
/*!40000 ALTER TABLE `student_answers_target3` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_answers_target3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_answers_target4`
--

DROP TABLE IF EXISTS `student_answers_target4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_answers_target4` (
  `student_id` int(10) unsigned NOT NULL,
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers_target4`
--

LOCK TABLES `student_answers_target4` WRITE;
/*!40000 ALTER TABLE `student_answers_target4` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_answers_target4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_info` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_team` tinyint(1) NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_info`
--

LOCK TABLES `student_info` WRITE;
/*!40000 ALTER TABLE `student_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_scores`
--

DROP TABLE IF EXISTS `student_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_scores` (
  `student_id` int(10) unsigned NOT NULL,
  `sprint_raw` int(3) NOT NULL,
  `target_raw` int(3) NOT NULL,
  `total` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_scores`
--

LOCK TABLES `student_scores` WRITE;
/*!40000 ALTER TABLE `student_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_answers`
--

DROP TABLE IF EXISTS `team_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_answers` (
  `school_id` int(11) unsigned NOT NULL,
  `Q1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Q10` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_answers`
--

LOCK TABLES `team_answers` WRITE;
/*!40000 ALTER TABLE `team_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_answers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-18 19:52:45
