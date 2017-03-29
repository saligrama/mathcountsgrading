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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition`
--

LOCK TABLES `competition` WRITE;
/*!40000 ALTER TABLE `competition` DISABLE KEYS */;
INSERT INTO `competition` VALUES (45,'2017-02-16','state','First competition',1);
/*!40000 ALTER TABLE `competition` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `competition_answers`
--

LOCK TABLES `competition_answers` WRITE;
/*!40000 ALTER TABLE `competition_answers` DISABLE KEYS */;
INSERT INTO `competition_answers` VALUES (45,1,1,'8',NULL),(45,1,2,'9',NULL),(45,1,3,'89',NULL),(45,1,4,'89',NULL),(45,1,5,'89',NULL),(45,1,6,'9',NULL),(45,1,7,'8',NULL),(45,1,8,'8',NULL),(45,1,9,'98',NULL),(45,1,10,'98',NULL),(45,1,11,'98',NULL),(45,1,12,'98',NULL),(45,1,13,'9',NULL),(45,1,14,'9',NULL),(45,1,15,'89',NULL),(45,1,16,'89',NULL),(45,1,17,'8988',NULL),(45,1,18,'98',NULL),(45,1,19,'98',NULL),(45,1,20,'98',NULL),(45,1,21,'9',NULL),(45,1,22,'98',NULL),(45,1,23,'99',NULL),(45,1,24,'8',NULL),(45,1,25,'9',NULL),(45,1,26,'89',NULL),(45,1,27,'8',NULL),(45,1,28,'98',NULL),(45,1,29,'',NULL),(45,1,30,'',NULL),(45,6,1,'89',NULL),(45,6,2,'97',NULL),(45,6,3,'897',NULL),(45,6,4,'897',NULL),(45,6,5,'897',NULL),(45,6,6,'9',NULL),(45,6,7,'797',NULL),(45,6,8,'9',NULL),(45,6,9,'789',NULL),(45,6,10,'78',NULL),(45,2,1,'798',NULL),(45,2,2,'7',NULL),(45,3,1,'78',NULL),(45,3,2,'78',NULL),(45,4,1,'789',NULL),(45,4,2,'7',NULL),(45,5,1,'2',NULL),(45,5,2,'2',NULL);
/*!40000 ALTER TABLE `competition_answers` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `competition_participants`
--

LOCK TABLES `competition_participants` WRITE;
/*!40000 ALTER TABLE `competition_participants` DISABLE KEYS */;
INSERT INTO `competition_participants` VALUES (45,741),(45,742),(45,743);
/*!40000 ALTER TABLE `competition_participants` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `competition_status`
--

LOCK TABLES `competition_status` WRITE;
/*!40000 ALTER TABLE `competition_status` DISABLE KEYS */;
INSERT INTO `competition_status` VALUES (45,1,0.2077),(45,6,0.6667),(45,3,0.0769);
/*!40000 ALTER TABLE `competition_status` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`CTID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition_type`
--

LOCK TABLES `competition_type` WRITE;
/*!40000 ALTER TABLE `competition_type` DISABLE KEYS */;
INSERT INTO `competition_type` VALUES (1,'Mathcounts',10,5,2);
/*!40000 ALTER TABLE `competition_type` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `current_competition`
--

LOCK TABLES `current_competition` WRITE;
/*!40000 ALTER TABLE `current_competition` DISABLE KEYS */;
INSERT INTO `current_competition` VALUES (45);
/*!40000 ALTER TABLE `current_competition` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grader_responses`
--

LOCK TABLES `grader_responses` WRITE;
/*!40000 ALTER TABLE `grader_responses` DISABLE KEYS */;
INSERT INTO `grader_responses` VALUES (45,11188,12,1,1,'8',106),(45,11188,12,2,1,'8',107),(45,11188,12,3,1,'8',108),(45,11188,12,4,1,'8',109),(45,11188,12,5,1,'8',110),(45,11188,12,6,1,'',111),(45,11188,12,7,1,'',112),(45,11188,12,8,1,'',113),(45,11188,12,9,1,'',114),(45,11188,12,10,1,'',115),(45,11188,12,11,1,'',116),(45,11188,12,12,1,'',117),(45,11188,12,13,1,'',118),(45,11188,12,14,1,'',119),(45,11188,12,15,1,'',120),(45,11188,12,16,1,'',121),(45,11188,12,17,1,'',122),(45,11188,12,18,1,'',123),(45,11188,12,19,1,'',124),(45,11188,12,20,1,'',125),(45,11188,12,21,1,'',126),(45,11188,12,22,1,'',127),(45,11188,12,23,1,'',128),(45,11188,12,24,1,'',129),(45,11188,12,25,1,'',130),(45,11188,12,26,1,'',131),(45,11188,12,27,1,'',132),(45,11188,12,28,1,'',133),(45,11188,12,29,1,'',134),(45,11188,12,30,1,'',135),(45,11188,10,1,1,'9',136),(45,11188,10,2,1,'89',137),(45,11188,10,3,1,'9',138),(45,11188,10,4,1,'89',139),(45,11188,10,5,1,'89',140),(45,11188,10,6,1,'',141),(45,11188,10,7,1,'',142),(45,11188,10,8,1,'',143),(45,11188,10,9,1,'',144),(45,11188,10,10,1,'',145),(45,11188,10,11,1,'',146),(45,11188,10,12,1,'',147),(45,11188,10,13,1,'',148),(45,11188,10,14,1,'',149),(45,11188,10,15,1,'',150),(45,11188,10,16,1,'',151),(45,11188,10,17,1,'',152),(45,11188,10,18,1,'',153),(45,11188,10,19,1,'',154),(45,11188,10,20,1,'',155),(45,11188,10,21,1,'',156),(45,11188,10,22,1,'',157),(45,11188,10,23,1,'',158),(45,11188,10,24,1,'',159),(45,11188,10,25,1,'',160),(45,11188,10,26,1,'',161),(45,11188,10,27,1,'',162),(45,11188,10,28,1,'',163),(45,11188,10,29,1,'',164),(45,11188,10,30,1,'',165),(45,0,10,4,1,'88787',166),(45,11188,10,1,1,'7878787878',167),(45,11188,10,2,1,'78',168),(45,11188,10,3,1,'7',169),(45,11188,10,4,1,'8',170),(45,11188,10,5,1,'',171),(45,11192,12,1,1,'8',172),(45,11192,12,2,1,'98',173),(45,11192,12,3,1,'9',174),(45,11192,12,4,1,'89',175),(45,11192,12,5,1,'89',176),(45,11192,12,6,1,'89',177),(45,11192,12,7,1,'89',178),(45,11192,12,8,1,'8',179),(45,11192,12,9,1,'9',180),(45,11192,12,10,1,'',181),(45,11192,12,11,1,'',182),(45,11192,12,12,1,'',183),(45,11192,12,13,1,'',184),(45,11192,12,14,1,'',185),(45,11192,12,15,1,'',186),(45,11192,12,16,1,'',187),(45,11192,12,17,1,'',188),(45,11192,12,18,1,'',189),(45,11192,12,19,1,'',190),(45,11192,12,20,1,'',191),(45,11192,12,21,1,'',192),(45,11192,12,22,1,'',193),(45,11192,12,23,1,'',194),(45,11192,12,24,1,'',195),(45,11192,12,25,1,'',196),(45,11192,12,26,1,'',197),(45,11192,12,27,1,'',198),(45,11192,12,28,1,'',199),(45,11192,12,29,1,'',200),(45,11192,12,30,1,'',201),(45,11192,10,1,1,'8',202),(45,11192,10,2,1,'9',203),(45,11192,10,3,1,'90',204),(45,11192,10,4,1,'5',205),(45,11192,10,5,1,'454',206),(45,11192,10,6,1,'54',207),(45,11192,10,7,1,'',208),(45,11192,10,8,1,'',209),(45,11192,10,9,1,'',210),(45,11192,10,10,1,'',211),(45,11192,10,11,1,'',212),(45,11192,10,12,1,'',213),(45,11192,10,13,1,'',214),(45,11192,10,14,1,'',215),(45,11192,10,15,1,'',216),(45,11192,10,16,1,'',217),(45,11192,10,17,1,'',218),(45,11192,10,18,1,'',219),(45,11192,10,19,1,'',220),(45,11192,10,20,1,'',221),(45,11192,10,21,1,'',222),(45,11192,10,22,1,'',223),(45,11192,10,23,1,'',224),(45,11192,10,24,1,'',225),(45,11192,10,25,1,'',226),(45,11192,10,26,1,'',227),(45,11192,10,27,1,'',228),(45,11192,10,28,1,'',229),(45,11192,10,29,1,'',230),(45,11192,10,30,1,'',231),(45,0,10,8,1,'hj',232),(45,11192,10,1,1,'kj',233),(45,11192,10,2,1,'hk',234),(45,11192,10,3,1,'jh',235),(45,11192,10,4,1,'kjh',236),(45,11192,10,5,1,'',237),(45,11192,10,6,1,'',238),(45,11195,10,1,4,'7',239),(45,11195,10,2,4,'7',240);
/*!40000 ALTER TABLE `grader_responses` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grader_responses_team`
--

LOCK TABLES `grader_responses_team` WRITE;
/*!40000 ALTER TABLE `grader_responses_team` DISABLE KEYS */;
INSERT INTO `grader_responses_team` VALUES (45,743,12,1,6,'7',0,81),(45,743,12,2,6,'87',0,82),(45,743,12,3,6,'87',0,83),(45,743,12,4,6,'87',0,84),(45,743,12,5,6,'',0,85),(45,743,12,6,6,'',0,86),(45,743,12,7,6,'',0,87),(45,743,12,8,6,'',0,88),(45,743,12,9,6,'',0,89),(45,743,12,10,6,'',0,90),(45,743,10,1,6,'78',0,91),(45,743,10,2,6,'7',0,92),(45,743,10,3,6,'87',0,93),(45,743,10,4,6,'87',0,94),(45,743,10,5,6,'87',0,95),(45,743,10,6,6,'87',0,96),(45,743,10,7,6,'87',0,97),(45,743,10,8,6,'87',0,98),(45,743,10,9,6,'8',0,99),(45,743,10,10,6,'78',0,100),(45,742,10,1,6,'',0,101),(45,742,10,2,6,'45',0,102),(45,742,10,3,6,'45',0,103),(45,742,10,4,6,'4',0,104),(45,742,10,5,6,'5',0,105),(45,742,10,6,6,'54',0,106),(45,742,10,7,6,'',0,107),(45,742,10,8,6,'',0,108),(45,742,10,9,6,'',0,109),(45,742,10,10,6,'',0,110),(45,742,12,1,6,'kjgh',0,111),(45,742,12,2,6,'hj',0,112),(45,742,12,3,6,'ghjg',0,113),(45,742,12,4,6,'jhg',0,114),(45,742,12,5,6,'hg',0,115),(45,742,12,6,6,'hjg',0,116),(45,742,12,7,6,'hj',0,117),(45,742,12,8,6,'',0,118),(45,742,12,9,6,'',0,119),(45,742,12,10,6,'',0,120),(45,742,12,1,6,'hg',0,121),(45,742,12,2,6,'jh',0,122),(45,742,12,3,6,'gjh',0,123),(45,742,12,4,6,'ghj',0,124),(45,742,12,5,6,'ghj',0,125),(45,742,12,6,6,'g',0,126),(45,742,12,7,6,'',0,127),(45,742,10,1,6,'kjh',0,128),(45,742,10,2,6,'jh',0,129),(45,742,10,3,6,'kj',0,130),(45,742,10,4,6,'h',0,131),(45,742,10,5,6,'',0,132),(45,742,10,6,6,'',0,133),(45,742,10,1,6,'jh',0,134),(45,742,10,2,6,'gjh',0,135),(45,742,10,3,6,'g',0,136),(45,742,10,4,6,'jhg',0,137),(45,742,10,5,6,'jhg',0,138),(45,742,10,1,6,'i6',0,139),(45,742,10,2,6,'87',0,140),(45,742,10,3,6,'987',0,141),(45,742,10,4,6,'876',0,142),(45,742,10,5,6,'87',0,143),(45,742,10,1,6,'ku',0,144),(45,742,10,2,6,'hjh',0,145),(45,742,10,3,6,'gjk',0,146),(45,742,10,4,6,'hj',0,147),(45,742,10,5,6,'g',0,148),(45,742,10,6,6,'hjgh',0,149),(45,742,10,7,6,'j',0,150),(45,742,10,1,6,'789',0,151),(45,742,10,2,6,'789',0,152),(45,742,10,3,6,'78',0,153),(45,742,10,4,6,'97',0,154),(45,742,10,5,6,'89',0,155),(45,742,10,6,6,'789',0,156),(45,742,10,7,6,'78',0,157),(45,742,10,8,6,'97',0,158),(45,742,10,9,6,'8',0,159),(45,742,10,2,6,'798',0,160),(45,742,10,3,6,'9',0,161),(45,742,10,4,6,'78',0,162),(45,742,10,5,6,'978',0,163),(45,742,10,6,6,'9789',0,164),(45,742,10,8,6,'978',0,165),(45,742,10,9,6,'97',0,166),(45,742,10,10,6,'897',0,167),(45,742,10,1,6,'heheheh',0,168),(45,742,10,2,6,'heh',0,169),(45,742,10,3,6,'eh',0,170),(45,742,10,4,6,'he',0,171),(45,742,10,5,6,'eh',0,172),(45,742,10,6,6,'eh',0,173),(45,742,10,7,6,'e',0,174);
/*!40000 ALTER TABLE `grader_responses_team` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `grading_conflicts`
--

LOCK TABLES `grading_conflicts` WRITE;
/*!40000 ALTER TABLE `grading_conflicts` DISABLE KEYS */;
INSERT INTO `grading_conflicts` VALUES (45,11188,3,1,67),(45,11188,5,1,69),(45,11188,1,1,70),(45,11188,2,1,71),(45,11188,4,1,72),(45,11192,2,1,73),(45,11192,3,1,74),(45,11192,4,1,75),(45,11192,5,1,76),(45,11192,6,1,77),(45,11192,7,1,78),(45,11192,9,1,80),(45,11192,1,1,81),(45,11192,8,1,82);
/*!40000 ALTER TABLE `grading_conflicts` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grading_conflicts_team`
--

LOCK TABLES `grading_conflicts_team` WRITE;
/*!40000 ALTER TABLE `grading_conflicts_team` DISABLE KEYS */;
INSERT INTO `grading_conflicts_team` VALUES (45,743,1,6,5),(45,743,2,6,6),(45,743,3,6,7),(45,743,4,6,8),(45,743,5,6,9),(45,743,6,6,10),(45,743,7,6,11),(45,743,8,6,12),(45,743,9,6,13),(45,743,10,6,14),(45,742,1,6,15),(45,742,2,6,16),(45,742,3,6,17),(45,742,4,6,18),(45,742,5,6,19),(45,742,6,6,20),(45,742,7,6,21),(45,742,8,6,22),(45,742,9,6,23),(45,742,10,6,24);
/*!40000 ALTER TABLE `grading_conflicts_team` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `mathlete_info`
--

LOCK TABLES `mathlete_info` WRITE;
/*!40000 ALTER TABLE `mathlete_info` DISABLE KEYS */;
INSERT INTO `mathlete_info` VALUES (11183,741,'Kearl','Bob','','Male'),(11184,741,'Obama','Barack','','Male'),(11185,741,'Trump','Donald','','Male'),(11186,741,'Note','Death','','Female'),(11187,741,'Note','Life','','Female'),(11188,743,'Nope','Hmm','','Male'),(11189,743,'Why','Ok','','Other'),(11190,743,'Else','If','','Female'),(11191,743,'Catch','Try','','Male'),(11192,742,'Bob','Kanto','','Male'),(11193,742,'If','What','','Female'),(11194,742,'Now','What','','Female'),(11195,742,'Left','Nothing ','','Male');
/*!40000 ALTER TABLE `mathlete_info` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `mathlete_scores`
--

LOCK TABLES `mathlete_scores` WRITE;
/*!40000 ALTER TABLE `mathlete_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `mathlete_scores` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (1,1,30,1,'Sprint Round',1),(1,2,2,2,'Target, Round 1',1),(1,3,2,2,'Target, Round 2',1),(1,4,2,2,'Target, Round 3',1),(1,5,2,2,'Target, Round 4',1),(1,6,10,2,'Team Round',0);
/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `school_info`
--

LOCK TABLES `school_info` WRITE;
/*!40000 ALTER TABLE `school_info` DISABLE KEYS */;
INSERT INTO `school_info` VALUES (741,'Rampaging Rams','Ram town','Rammy ram','rams','rams@rams.com'),(742,'Yellow Yaks','Yellow town','Brochie','23 Yellow Street','yello@w.com'),(743,'Precise Penguins','Towny','penguins','89 bob street','penguins@pen.com');
/*!40000 ALTER TABLE `school_info` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `student_answers`
--

LOCK TABLES `student_answers` WRITE;
/*!40000 ALTER TABLE `student_answers` DISABLE KEYS */;
INSERT INTO `student_answers` VALUES (45,11184,1,1,'7',0),(45,11184,2,1,'7',0),(45,11184,3,1,'7',1),(45,11184,4,1,'',0),(45,11184,5,1,'',0),(45,11184,6,1,'',0),(45,11184,7,1,'',0),(45,11184,8,1,'',0),(45,11184,9,1,'',0),(45,11184,10,1,'',0),(45,11184,11,1,'',0),(45,11184,12,1,'',0),(45,11184,13,1,'',0),(45,11184,14,1,'',0),(45,11184,15,1,'',0),(45,11184,16,1,'',0),(45,11184,17,1,'',0),(45,11184,18,1,'',0),(45,11184,19,1,'',0),(45,11184,20,1,'',0),(45,11184,21,1,'',0),(45,11184,22,1,'',0),(45,11184,23,1,'',0),(45,11184,24,1,'',0),(45,11184,25,1,'',0),(45,11184,26,1,'',0),(45,11184,27,1,'',0),(45,11184,28,1,'',0),(45,11184,29,1,'',0),(45,11184,30,1,'',0),(45,11185,1,3,'7',0),(45,11185,2,3,'7',0),(45,11188,6,1,'',0),(45,11188,7,1,'',0),(45,11188,8,1,'',0),(45,11188,9,1,'',0),(45,11188,10,1,'',0),(45,11188,11,1,'',0),(45,11188,12,1,'',0),(45,11188,13,1,'',0),(45,11188,14,1,'',0),(45,11188,15,1,'',0),(45,11188,16,1,'',0),(45,11188,17,1,'',0),(45,11188,18,1,'',0),(45,11188,19,1,'',0),(45,11188,20,1,'',0),(45,11188,21,1,'',0),(45,11188,22,1,'',0),(45,11188,23,1,'',0),(45,11188,24,1,'',0),(45,11188,25,1,'',0),(45,11188,26,1,'',0),(45,11188,27,1,'',0),(45,11188,28,1,'',0),(45,11188,29,1,'',0),(45,11188,30,1,'',0),(45,11188,1,1,'7878787878',0),(45,11188,2,1,'78',0),(45,11188,3,1,'7',1),(45,11188,4,1,'8',0),(45,11188,5,1,'',0),(45,11192,10,1,'',0),(45,11192,11,1,'',0),(45,11192,12,1,'',0),(45,11192,13,1,'',0),(45,11192,14,1,'',0),(45,11192,15,1,'',0),(45,11192,16,1,'',0),(45,11192,17,1,'',0),(45,11192,18,1,'',0),(45,11192,19,1,'',0),(45,11192,20,1,'',0),(45,11192,21,1,'',0),(45,11192,22,1,'',0),(45,11192,23,1,'',0),(45,11192,24,1,'',0),(45,11192,25,1,'',0),(45,11192,26,1,'',0),(45,11192,27,1,'',0),(45,11192,28,1,'',0),(45,11192,29,1,'',0),(45,11192,30,1,'',0),(45,11195,1,4,'7',0),(45,11195,2,4,'7',2);
/*!40000 ALTER TABLE `student_answers` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `student_cleaner`
--

LOCK TABLES `student_cleaner` WRITE;
/*!40000 ALTER TABLE `student_cleaner` DISABLE KEYS */;
INSERT INTO `student_cleaner` VALUES (11184,45,1,1),(11185,45,3,0),(11188,45,1,0),(11192,45,1,0);
/*!40000 ALTER TABLE `student_cleaner` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `student_participants`
--

LOCK TABLES `student_participants` WRITE;
/*!40000 ALTER TABLE `student_participants` DISABLE KEYS */;
INSERT INTO `student_participants` VALUES (45,11183,'regular'),(45,11184,'regular'),(45,11185,'regular'),(45,11186,'regular'),(45,11187,'regular'),(45,11188,'regular'),(45,11189,'regular'),(45,11190,'regular'),(45,11192,'regular'),(45,11195,'regular'),(45,11191,'alternate'),(45,11193,'alternate'),(45,11194,'alternate');
/*!40000 ALTER TABLE `student_participants` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `team_answers`
--

LOCK TABLES `team_answers` WRITE;
/*!40000 ALTER TABLE `team_answers` DISABLE KEYS */;
INSERT INTO `team_answers` VALUES (45,743,1,6,'78',0),(45,743,2,6,'7',0),(45,743,3,6,'87',0),(45,743,4,6,'87',0),(45,743,5,6,'87',0),(45,743,6,6,'87',0),(45,743,7,6,'87',0),(45,743,8,6,'87',0),(45,743,9,6,'8',0),(45,743,10,6,'78',2),(45,742,1,6,'heheheh',0),(45,742,2,6,'heh',0),(45,742,3,6,'eh',0),(45,742,4,6,'he',0),(45,742,5,6,'eh',0),(45,742,6,6,'eh',0),(45,742,7,6,'e',0),(45,742,8,6,'',0),(45,742,9,6,'',0),(45,742,10,6,'',0);
/*!40000 ALTER TABLE `team_answers` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `team_cleaner`
--

LOCK TABLES `team_cleaner` WRITE;
/*!40000 ALTER TABLE `team_cleaner` DISABLE KEYS */;
INSERT INTO `team_cleaner` VALUES (743,45,2,6),(742,45,0,6);
/*!40000 ALTER TABLE `team_cleaner` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'Bobby','Bob','bob@bob.com','$2y$10$n7eNK6txZTYFYrcXqpGZ0Oq3HPIbs5RftoFdpxSSdTA7WTnhywJB.',0,'admin'),(11,'Grader','First','grader1@grader.com','$2y$10$kFQKuxehCrAG/cRd.XdBHeJgcM9bWYpe6RvwQpcr0YDenSR.qiPYK',742,'grader'),(12,'1','grader','grader@grader.com','$2y$10$QwkVzSVLZZ1vjqlXRoRcBOr9j4zk5KQO6XqbmHD/tNoMUD.mgEiYe',741,'grader');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-29 11:06:49
