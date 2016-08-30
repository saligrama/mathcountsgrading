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
  `competition_type` enum('chapter','state','national') NOT NULL,
  `status_sprint` float(10,2) DEFAULT NULL,
  `status_target1` float(10,2) DEFAULT NULL,
  `status_target2` float(10,2) DEFAULT NULL,
  `status_target3` float(10,2) DEFAULT NULL,
  `status_target4` float(10,2) DEFAULT NULL,
  `status_team` float(10,2) DEFAULT NULL,
  `competition_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition`
--

LOCK TABLES `competition` WRITE;
/*!40000 ALTER TABLE `competition` DISABLE KEYS */;
INSERT INTO `competition` VALUES (28,'2016-08-15','chapter',NULL,NULL,NULL,NULL,NULL,NULL,'123'),(30,'2016-08-16','state',0.00,0.00,0.00,0.00,0.00,0.00,'1298361289371212983612936126391283'),(33,'2016-08-20','state',0.00,0.00,0.00,0.00,0.00,0.00,'asdasd'),(34,'2016-08-22','national',0.00,0.00,0.00,0.00,0.00,0.00,'National competition'),(35,'2016-08-22','chapter',0.00,0.00,0.00,0.00,0.00,0.00,'wfsdfsdf'),(36,'2016-08-22','chapter',0.00,0.00,0.00,0.00,0.00,0.00,'sdfsdfsadf'),(37,'2016-08-23','chapter',0.00,0.00,0.00,0.00,0.00,0.00,''),(38,'2016-08-23','chapter',0.00,0.00,0.00,0.00,0.00,0.00,'test');
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
  `problem_type` enum('sprint','target1','target2','target3','target4','team') NOT NULL,
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
INSERT INTO `competition_participants` VALUES (1,1),(1,2),(1,3),(25,7),(25,8),(27,8),(27,9),(29,7),(29,8),(30,8),(27,10),(32,9),(32,10),(32,11),(33,8),(33,9),(34,7),(34,8),(29,9),(35,8),(35,9),(36,7),(36,8),(36,9),(37,9),(37,10),(37,11),(38,7),(38,11),(38,12),(28,7),(28,12),(28,14),(30,10),(30,14),(30,9),(30,11),(30,12),(30,7),(28,8),(28,9),(28,10);
/*!40000 ALTER TABLE `competition_participants` ENABLE KEYS */;
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
INSERT INTO `current_competition` VALUES (28);
/*!40000 ALTER TABLE `current_competition` ENABLE KEYS */;
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
  `gender` enum('Male','Female','Other') NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mathlete_info`
--

LOCK TABLES `mathlete_info` WRITE;
/*!40000 ALTER TABLE `mathlete_info` DISABLE KEYS */;
INSERT INTO `mathlete_info` VALUES (31,7,'Saligrama','Aditya','','Male'),(32,7,'Kaxiras','Vassilios','','Male'),(33,7,'Granger','Hermione','','Female'),(34,7,'Potter','Harry','','Male'),(35,7,'Weasley','Ronald','Ron','Male'),(36,7,'Longbottom','Neville','','Male'),(37,7,'Greengrass','Daphne','','Female'),(38,7,'Hyun-ah','Cho','Heather','Female'),(39,7,'Sharp','Nola','','Female'),(40,7,'Behan','Jammie','','Female'),(41,8,'Kearl','Beulah','','Female'),(42,8,'Arterburn','Phoebe','','Female'),(43,8,'Witt','Shawnee','','Female'),(44,8,'Cambre','Tatum','','Female'),(45,8,'Tallmadge','Marguerite','','Female'),(46,8,'Horsman','Humberto','','Male'),(47,8,'Faucher','Gillian','','Female'),(48,8,'Costales','Hyman','','Male'),(49,8,'Cron','Lavona','','Female'),(50,8,'Courtois','Lila','','Female'),(51,9,'Vasko','Grady','','Male'),(52,9,'Rademacher','Fidelia','','Female'),(53,9,'Leiva','Mitzie','','Female'),(54,9,'Cofer','Keneth','','Male'),(55,9,'Furlough','Trent','','Male'),(56,9,'Cruikshank','Takako','','Female'),(57,9,'Shinn','Rhea','','Female'),(58,9,'Blanchard','Jacquetta','','Female'),(59,9,'Graham','Marcie','','Female'),(60,9,'Varnum','Olin','','Male');
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
  `ly_rank` int(11) NOT NULL,
  `ly_score` float(10,2) NOT NULL,
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_info`
--

LOCK TABLES `school_info` WRITE;
/*!40000 ALTER TABLE `school_info` DISABLE KEYS */;
INSERT INTO `school_info` VALUES (7,'Rampaging Rams','Belmont','Bill Belichick','25 Washington Street','rampaging.rams@gmail.com',1,63.25),(8,'Precise Penguins','Watertown','Bill Brotch','76 Jacob Road','precise.penguins@yahoo.com',10,80.25),(9,'Yellow Yaks','Worchester','Matt Damon','23 Hillside Terrace','yellow.yaks@outlook.com',8,60.00),(10,'12093102381-83712938711231','123123','13123123123123','123123123123','123123123123@1232',0,0.00),(11,'123','123','123','123','123@123',0,0.00),(12,'213123','1312313','13123123','1321313','123132@123',0,0.00),(14,'s;kjdfhskadjfhaskdfjhsklfjhsdakjfhsadklfhsdklfjhsdklfjhsklfjhsaklfhskadjlf','hello','hello','hello','h@h',0,0.00);
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
  `GID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `problem_type` enum('sprint','target1','target2','target3','target4') NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_answers`
--

LOCK TABLES `student_answers` WRITE;
/*!40000 ALTER TABLE `student_answers` DISABLE KEYS */;
INSERT INTO `student_answers` VALUES (1,1,1,1,'target1','29',2),(1,2,1,1,'target1','22',2),(1,3,1,1,'target1','29',2),(1,4,1,1,'target1','29',2),(1,11,1,1,'target1','29',2),(1,12,1,1,'target1','24',2),(1,13,1,1,'target1','29',2),(1,14,1,1,'target1','29',2),(1,21,1,1,'target1','39',2),(1,22,1,1,'target1','29',2),(1,23,1,1,'target1','41',2),(1,24,1,1,'target1','15',2),(1,1,2,1,'target1','29',2),(1,2,2,1,'target1','23',2),(1,3,2,1,'target1','29',2),(1,4,2,1,'target1','37',2),(1,11,2,1,'target1','29',2),(1,12,2,1,'target1','26',2),(1,13,2,1,'target1','29',2),(1,14,2,1,'target1','28',2),(1,21,2,1,'target1','39',2),(1,22,2,1,'target1','29',2),(1,23,2,1,'target1','41',2),(1,24,2,1,'target1','15\"',2),(1,1,1,2,'target1','1/4',2),(1,2,1,2,'target1','1/5',2),(1,3,1,2,'target1','1/4',2),(1,4,1,2,'target1','1/4',2),(1,11,1,2,'target1','3/7',2),(1,12,1,2,'target1','1/4',2),(1,13,1,2,'target1','1/4',2),(1,14,1,2,'target1','15/11',2),(1,21,1,2,'target1','1/4',2),(1,22,1,2,'target1','1/4',2),(1,23,1,2,'target1','27/32',2),(1,24,1,2,'target1','1/4',2),(1,1,2,2,'target1','1/4',2),(1,2,2,2,'target1','1/6',2),(1,3,2,2,'target1','1/4',2),(1,4,2,2,'target1','1/4',2),(1,11,2,2,'target1','3/7',2),(1,12,2,2,'target1','1/4',2),(1,13,2,2,'target1','3/5',2),(1,14,2,2,'target1','15/11',2),(1,21,2,2,'target1','1/4',2),(1,22,2,2,'target1','1/9',2),(1,23,2,2,'target1','27/32',2),(1,24,2,2,'target1','1/4',2);
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
  `sprint_raw` int(11) NOT NULL,
  `target_raw1` int(11) NOT NULL,
  `target_raw2` int(11) NOT NULL,
  `target_raw3` int(11) NOT NULL,
  `target_raw4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_cleaner`
--

LOCK TABLES `student_cleaner` WRITE;
/*!40000 ALTER TABLE `student_cleaner` DISABLE KEYS */;
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
INSERT INTO `student_participants` VALUES (28,31,'regular'),(28,32,'regular'),(28,35,'regular'),(28,33,'alternate'),(28,34,'alternate'),(28,37,'regular'),(28,38,'alternate');
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
  `GID` int(11) NOT NULL,
  `problem_number` int(11) NOT NULL,
  `team_answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_answers`
--

LOCK TABLES `team_answers` WRITE;
/*!40000 ALTER TABLE `team_answers` DISABLE KEYS */;
INSERT INTO `team_answers` VALUES (1,1,1,1,'10'),(1,1,1,2,'1/4'),(1,1,1,3,'146235'),(1,1,1,4,'250pi'),(1,1,1,5,'2161'),(1,1,1,6,'17'),(1,1,1,7,'16.3'),(1,1,1,8,'24'),(1,1,1,9,'64'),(1,1,1,10,'12'),(1,1,2,1,'10'),(1,1,2,2,'1/4'),(1,1,2,3,'146235'),(1,1,2,4,'250pi'),(1,1,2,5,'2162'),(1,1,2,6,'18'),(1,1,2,7,'16.3'),(1,1,2,8,'24'),(1,1,2,9,'64'),(1,1,2,10,'12'),(1,2,3,1,'29'),(1,2,3,2,'1/3'),(1,2,3,3,'146235'),(1,2,3,4,'25pi'),(1,2,3,5,'2160'),(1,2,3,6,'18'),(1,2,3,7,'16.3'),(1,2,3,8,'24'),(1,2,3,9,'64'),(1,2,3,10,'25'),(1,2,4,1,'29'),(1,2,4,2,'1/3'),(1,2,4,3,'1466,235'),(1,2,4,4,'25pi'),(1,2,4,5,'2160'),(1,2,4,6,'18'),(1,2,4,7,'16.3'),(1,2,4,8,'24'),(1,2,4,9,'46'),(1,2,4,10,'25'),(1,3,5,1,'29'),(1,3,5,2,'1/4'),(1,3,5,3,'146235'),(1,3,5,4,'250pi'),(1,3,5,5,'2160'),(1,3,5,6,'18'),(1,3,5,7,'16.3'),(1,3,5,8,'24'),(1,3,5,9,'64'),(1,3,5,10,'24'),(1,3,6,1,'29'),(1,3,6,2,'1/4'),(1,3,6,3,'146235'),(1,3,6,4,'250pi'),(1,3,6,5,'2610'),(1,3,6,6,'18'),(1,3,6,7,'16.3'),(1,3,6,8,'24'),(1,3,6,9,'64'),(1,3,6,10,'24');
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
  `team_raw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_cleaner`
--

LOCK TABLES `team_cleaner` WRITE;
/*!40000 ALTER TABLE `team_cleaner` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,NULL,NULL,'margo@eecs.harvard.edu','$2y$10$2tYmr4x6ZMRew2d0LsNsaeywJHoXO6c1l6TVANWmUBUqAki9L/Nsm',0,'admin'),(3,NULL,NULL,'bobby.tables@gmail.com','$2y$10$BMrwckGzBGuhMU82X.eIz.4afZm3qs2ywkztlf2vf6AykaTMVAi3y',7,'grader'),(4,'bob','user','user@user.com','$2y$10$FEXiEHDldn/8SvXBE3DrFOgmZ0w3C8RISSG5CTMnXZVcHs3m5YBLW',0,'admin'),(5,'','123','123@123','$2y$10$5yPsnOCwnnFzoLvmAEQGhOF97OVCuUajrlH5PvYgyDg0tWwwZgcfS',0,'admin'),(6,'','','sdlkjfksdjfhslkjdfhslkjfhslkfhsalkfjhskldfjhskfjhslkfjhksjflasfhlkjsadfhlskjfhsklajdfhaksjldfhlskjfs','$2y$10$spPM563TsGKKKxHWsVjz6Olp7x4gAv.fobwFYD3Tt5Zgg0q40vjj.',0,'admin'),(7,'1234','123','123@1234','$2y$10$I/WSLWOqjAzM6uSzBiEJCeEH3a2IywhqFwPE1Zd9xgVNC8Aqmy2bG',0,'admin');
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

-- Dump completed on 2016-08-30 15:00:25
