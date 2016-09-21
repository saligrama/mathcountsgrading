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
INSERT INTO `competition_participants` VALUES (1,1),(1,2),(1,3),(25,7),(25,8),(27,8),(27,9),(29,7),(29,8),(30,8),(27,10),(32,9),(32,10),(32,11),(33,8),(33,9),(34,7),(34,8),(29,9),(35,8),(35,9),(36,7),(36,8),(36,9),(37,9),(37,10),(37,11),(38,7),(38,11),(38,12),(28,7),(28,12),(28,14),(30,10),(30,14),(30,9),(30,11),(30,12),(30,7),(33,7),(34,9),(28,8),(28,9),(28,10),(28,11),(28,539),(28,540),(28,541),(28,542),(28,543),(28,544),(28,545),(28,546),(28,547),(28,548),(28,549),(28,550),(28,551),(28,552),(28,553),(28,554),(28,555),(28,556),(28,557),(28,558),(28,559),(28,560),(28,561),(28,562),(28,563),(28,564),(28,565),(28,566),(28,567),(28,568),(28,569),(28,570),(28,571),(28,572),(28,573),(28,574),(28,575),(28,576),(28,577),(28,578),(28,579),(28,580),(28,581),(28,582),(28,583),(28,584),(28,585),(28,586),(28,587),(28,588),(28,589),(28,590),(28,591),(28,592),(28,593),(28,594),(28,595),(28,596),(28,597),(28,598),(28,599),(28,600),(28,601),(28,602),(28,603),(28,604),(28,605),(28,606),(28,607),(28,608),(28,609),(28,610),(28,611),(28,612),(28,613),(28,614),(28,615),(28,616),(28,617),(28,618),(28,619),(28,620),(28,621),(28,622),(28,623),(28,624),(28,625),(28,626),(28,627),(28,628),(28,629),(28,630),(28,631),(28,632),(28,633),(28,634),(28,635),(28,636),(28,637),(28,638),(28,639),(28,640),(28,641),(28,642),(28,643),(28,644),(28,645),(28,646),(28,647),(28,648),(28,649),(28,650),(28,651),(28,652),(28,653),(28,654),(28,655),(28,656),(28,657),(28,658),(28,659),(28,660),(28,661),(28,662),(28,663),(28,664),(28,665),(28,666),(28,667),(28,668),(28,669),(28,670),(28,671),(28,672),(28,673),(28,674),(28,675),(28,676),(28,677),(28,678),(28,679),(28,680),(28,681),(28,682),(28,683),(28,684),(28,685),(28,686),(28,687),(28,688),(28,689),(28,690),(28,691),(28,692),(28,693),(28,694),(28,695),(28,696),(28,697),(28,698),(28,699),(28,701),(28,702),(28,703),(28,704),(28,705),(28,706),(28,707),(28,708),(28,709),(28,710),(28,711),(28,712),(28,713),(28,714),(28,715),(28,716),(28,717),(28,718),(28,719),(28,720),(28,721),(28,722),(28,723),(28,724),(28,725),(28,726),(28,727),(28,728),(28,729),(28,730),(28,731),(28,732),(28,733),(28,734),(28,735),(28,736),(28,737),(28,738);
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
INSERT INTO `current_competition` VALUES (0);
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
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=11174 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mathlete_info`
--

LOCK TABLES `mathlete_info` WRITE;
/*!40000 ALTER TABLE `mathlete_info` DISABLE KEYS */;
INSERT INTO `mathlete_info` VALUES (31,700,'Saligrama','Aditya','','Male'),(32,700,'Kaxiras','Vassilios','','Male'),(33,700,'Granger','Hermione','','Female'),(34,700,'Potter','Harry','','Male'),(35,700,'Weasley','Ronald','Ron','Male'),(36,700,'Longbottom','Neville','','Male'),(37,700,'Greengrass','Daphne','','Female'),(38,700,'Hyun-ah','Cho','Heather','Female'),(39,700,'Sharp','Nola','','Female'),(40,700,'Behan','Jammie','','Female'),(41,8,'Kearl','Bob','','Male'),(42,8,'Arterburn','Phoebe','','Female'),(43,8,'Witt','Shawnee','','Female'),(44,8,'Cambre','Tatum','','Female'),(45,8,'Tallmadge','Marguerite','','Female'),(46,8,'Horsman','Humberto','','Male'),(47,8,'Faucher','Gillian','','Female'),(48,8,'Costales','Hyman','','Male'),(49,8,'Cron','Lavona','','Female'),(50,8,'Courtois','Lila','','Female'),(51,700,'Vasko','Grady','','Male'),(52,700,'Rademacher','Fidelia','','Female'),(53,700,'Leiva','Mitzie','','Female'),(54,700,'Cofer','Keneth','','Male'),(55,700,'Furlough','Trent','','Male'),(56,700,'Cruikshank','Takako','','Female'),(57,700,'Shinn','Rhea','','Female'),(58,700,'Blanchard','Jacquetta','','Female'),(59,700,'Graham','Marcie','','Female'),(60,700,'Varnum','Olin','','Male'),(61,700,'Cod','Bob','','Male'),(62,700,'Other','Other','','Other'),(63,700,'Bobby','Fra','Bob the Cod player 60','Male'),(10173,9,'','test',NULL,NULL),(10174,9,'','test',NULL,NULL),(10175,9,'','test',NULL,NULL),(10176,9,'','test',NULL,NULL),(10177,9,'','test',NULL,NULL),(10178,9,'','test',NULL,NULL),(10179,9,'','test',NULL,NULL),(10180,9,'','test',NULL,NULL),(10181,9,'','test',NULL,NULL),(10182,9,'','test',NULL,NULL),(10183,9,'','test',NULL,NULL),(10184,9,'','test',NULL,NULL),(10185,9,'','test',NULL,NULL),(10186,9,'','test',NULL,NULL),(10187,9,'','test',NULL,NULL),(10188,9,'','test',NULL,NULL),(10189,9,'','test',NULL,NULL),(10190,9,'','test',NULL,NULL),(10191,9,'','test',NULL,NULL),(10192,9,'','test',NULL,NULL),(10193,9,'','test',NULL,NULL),(10194,9,'','test',NULL,NULL),(10195,9,'','test',NULL,NULL),(10196,9,'','test',NULL,NULL),(10197,9,'','test',NULL,NULL),(10198,9,'','test',NULL,NULL),(10199,9,'','test',NULL,NULL),(10200,9,'','test',NULL,NULL),(10201,9,'','test',NULL,NULL),(10202,9,'','test',NULL,NULL),(10203,9,'','test',NULL,NULL),(10204,9,'','test',NULL,NULL),(10205,9,'','test',NULL,NULL),(10206,9,'','test',NULL,NULL),(10207,9,'','test',NULL,NULL),(10208,9,'','test',NULL,NULL),(10209,9,'','test',NULL,NULL),(10210,9,'','test',NULL,NULL),(10211,9,'','test',NULL,NULL),(10212,9,'','test',NULL,NULL),(10213,9,'','test',NULL,NULL),(10214,9,'','test',NULL,NULL),(10215,9,'','test',NULL,NULL),(10216,9,'','test',NULL,NULL),(10217,9,'','test',NULL,NULL),(10218,9,'','test',NULL,NULL),(10219,9,'','test',NULL,NULL),(10220,9,'','test',NULL,NULL),(10221,9,'','test',NULL,NULL),(10222,9,'','test',NULL,NULL),(10223,9,'','test',NULL,NULL),(10224,9,'','test',NULL,NULL),(10225,9,'','test',NULL,NULL),(10226,9,'','test',NULL,NULL),(10227,9,'','test',NULL,NULL),(10228,9,'','test',NULL,NULL),(10229,9,'','test',NULL,NULL),(10230,9,'','test',NULL,NULL),(10231,9,'','test',NULL,NULL),(10232,9,'','test',NULL,NULL),(10233,9,'','test',NULL,NULL),(10234,9,'','test',NULL,NULL),(10235,9,'','test',NULL,NULL),(10236,9,'','test',NULL,NULL),(10237,9,'','test',NULL,NULL),(10238,9,'','test',NULL,NULL),(10239,9,'','test',NULL,NULL),(10240,9,'','test',NULL,NULL),(10241,9,'','test',NULL,NULL),(10242,9,'','test',NULL,NULL),(10243,9,'','test',NULL,NULL),(10244,9,'','test',NULL,NULL),(10245,9,'','test',NULL,NULL),(10246,9,'','test',NULL,NULL),(10247,9,'','test',NULL,NULL),(10248,9,'','test',NULL,NULL),(10249,9,'','test',NULL,NULL),(10250,9,'','test',NULL,NULL),(10251,9,'','test',NULL,NULL),(10252,9,'','test',NULL,NULL),(10253,9,'','test',NULL,NULL),(10254,9,'','test',NULL,NULL),(10255,9,'','test',NULL,NULL),(10256,9,'','test',NULL,NULL),(10257,9,'','test',NULL,NULL),(10258,9,'','test',NULL,NULL),(10259,9,'','test',NULL,NULL),(10260,9,'','test',NULL,NULL),(10261,9,'','test',NULL,NULL),(10262,9,'','test',NULL,NULL),(10263,9,'','test',NULL,NULL),(10264,9,'','test',NULL,NULL),(10265,9,'','test',NULL,NULL),(10266,9,'','test',NULL,NULL),(10267,9,'','test',NULL,NULL),(10268,9,'','test',NULL,NULL),(10269,9,'','test',NULL,NULL),(10270,9,'','test',NULL,NULL),(10271,9,'','test',NULL,NULL),(10272,9,'','test',NULL,NULL),(10273,9,'','test',NULL,NULL),(10274,9,'','test',NULL,NULL),(10275,9,'','test',NULL,NULL),(10276,9,'','test',NULL,NULL),(10277,9,'','test',NULL,NULL),(10278,9,'','test',NULL,NULL),(10279,9,'','test',NULL,NULL),(10280,9,'','test',NULL,NULL),(10281,9,'','test',NULL,NULL),(10282,9,'','test',NULL,NULL),(10283,9,'','test',NULL,NULL),(10284,9,'','test',NULL,NULL),(10285,9,'','test',NULL,NULL),(10286,9,'','test',NULL,NULL),(10287,9,'','test',NULL,NULL),(10288,9,'','test',NULL,NULL),(10289,9,'','test',NULL,NULL),(10290,9,'','test',NULL,NULL),(10291,9,'','test',NULL,NULL),(10292,9,'','test',NULL,NULL),(10293,9,'','test',NULL,NULL),(10294,9,'','test',NULL,NULL),(10295,9,'','test',NULL,NULL),(10296,9,'','test',NULL,NULL),(10297,9,'','test',NULL,NULL),(10298,9,'','test',NULL,NULL),(10299,9,'','test',NULL,NULL),(10300,9,'','test',NULL,NULL),(10301,9,'','test',NULL,NULL),(10302,9,'','test',NULL,NULL),(10303,9,'','test',NULL,NULL),(10304,9,'','test',NULL,NULL),(10305,9,'','test',NULL,NULL),(10306,9,'','test',NULL,NULL),(10307,9,'','test',NULL,NULL),(10308,9,'','test',NULL,NULL),(10309,9,'','test',NULL,NULL),(10310,9,'','test',NULL,NULL),(10311,9,'','test',NULL,NULL),(10312,9,'','test',NULL,NULL),(10313,9,'','test',NULL,NULL),(10314,9,'','test',NULL,NULL),(10315,9,'','test',NULL,NULL),(10316,9,'','test',NULL,NULL),(10317,9,'','test',NULL,NULL),(10318,9,'','test',NULL,NULL),(10319,9,'','test',NULL,NULL),(10320,9,'','test',NULL,NULL),(10321,9,'','test',NULL,NULL),(10322,9,'','test',NULL,NULL),(10323,9,'','test',NULL,NULL),(10324,9,'','test',NULL,NULL),(10325,9,'','test',NULL,NULL),(10326,9,'','test',NULL,NULL),(10327,9,'','test',NULL,NULL),(10328,9,'','test',NULL,NULL),(10329,9,'','test',NULL,NULL),(10330,9,'','test',NULL,NULL),(10331,9,'','test',NULL,NULL),(10332,9,'','test',NULL,NULL),(10333,9,'','test',NULL,NULL),(10334,9,'','test',NULL,NULL),(10335,9,'','test',NULL,NULL),(10336,9,'','test',NULL,NULL),(10337,9,'','test',NULL,NULL),(10338,9,'','test',NULL,NULL),(10339,9,'','test',NULL,NULL),(10340,9,'','test',NULL,NULL),(10341,9,'','test',NULL,NULL),(10342,9,'','test',NULL,NULL),(10343,9,'','test',NULL,NULL),(10344,9,'','test',NULL,NULL),(10345,9,'','test',NULL,NULL),(10346,9,'','test',NULL,NULL),(10347,9,'','test',NULL,NULL),(10348,9,'','test',NULL,NULL),(10349,9,'','test',NULL,NULL),(10350,9,'','test',NULL,NULL),(10351,9,'','test',NULL,NULL),(10352,9,'','test',NULL,NULL),(10353,9,'','test',NULL,NULL),(10354,9,'','test',NULL,NULL),(10355,9,'','test',NULL,NULL),(10356,9,'','test',NULL,NULL),(10357,9,'','test',NULL,NULL),(10358,9,'','test',NULL,NULL),(10359,9,'','test',NULL,NULL),(10360,9,'','test',NULL,NULL),(10361,9,'','test',NULL,NULL),(10362,9,'','test',NULL,NULL),(10363,9,'','test',NULL,NULL),(10364,9,'','test',NULL,NULL),(10365,9,'','test',NULL,NULL),(10366,9,'','test',NULL,NULL),(10367,9,'','test',NULL,NULL),(10368,9,'','test',NULL,NULL),(10369,9,'','test',NULL,NULL),(10370,9,'','test',NULL,NULL),(10371,9,'','test',NULL,NULL),(10372,9,'','test',NULL,NULL),(10373,9,'','test',NULL,NULL),(10374,9,'','test',NULL,NULL),(10375,9,'','test',NULL,NULL),(10376,9,'','test',NULL,NULL),(10377,9,'','test',NULL,NULL),(10378,9,'','test',NULL,NULL),(10379,9,'','test',NULL,NULL),(10380,9,'','test',NULL,NULL),(10381,9,'','test',NULL,NULL),(10382,9,'','test',NULL,NULL),(10383,9,'','test',NULL,NULL),(10384,9,'','test',NULL,NULL),(10385,9,'','test',NULL,NULL),(10386,9,'','test',NULL,NULL),(10387,9,'','test',NULL,NULL),(10388,9,'','test',NULL,NULL),(10389,9,'','test',NULL,NULL),(10390,9,'','test',NULL,NULL),(10391,9,'','test',NULL,NULL),(10392,9,'','test',NULL,NULL),(10393,9,'','test',NULL,NULL),(10394,9,'','test',NULL,NULL),(10395,9,'','test',NULL,NULL),(10396,9,'','test',NULL,NULL),(10397,9,'','test',NULL,NULL),(10398,9,'','test',NULL,NULL),(10399,9,'','test',NULL,NULL),(10400,9,'','test',NULL,NULL),(10401,9,'','test',NULL,NULL),(10402,9,'','test',NULL,NULL),(10403,9,'','test',NULL,NULL),(10404,9,'','test',NULL,NULL),(10405,9,'','test',NULL,NULL),(10406,9,'','test',NULL,NULL),(10407,9,'','test',NULL,NULL),(10408,9,'','test',NULL,NULL),(10409,9,'','test',NULL,NULL),(10410,9,'','test',NULL,NULL),(10411,9,'','test',NULL,NULL),(10412,9,'','test',NULL,NULL),(10413,9,'','test',NULL,NULL),(10414,9,'','test',NULL,NULL),(10415,9,'','test',NULL,NULL),(10416,9,'','test',NULL,NULL),(10417,9,'','test',NULL,NULL),(10418,9,'','test',NULL,NULL),(10419,9,'','test',NULL,NULL),(10420,9,'','test',NULL,NULL),(10421,9,'','test',NULL,NULL),(10422,9,'','test',NULL,NULL),(10423,9,'','test',NULL,NULL),(10424,9,'','test',NULL,NULL),(10425,9,'','test',NULL,NULL),(10426,9,'','test',NULL,NULL),(10427,9,'','test',NULL,NULL),(10428,9,'','test',NULL,NULL),(10429,9,'','test',NULL,NULL),(10430,9,'','test',NULL,NULL),(10431,9,'','test',NULL,NULL),(10432,9,'','test',NULL,NULL),(10433,9,'','test',NULL,NULL),(10434,9,'','test',NULL,NULL),(10435,9,'','test',NULL,NULL),(10436,9,'','test',NULL,NULL),(10437,9,'','test',NULL,NULL),(10438,9,'','test',NULL,NULL),(10439,9,'','test',NULL,NULL),(10440,9,'','test',NULL,NULL),(10441,9,'','test',NULL,NULL),(10442,9,'','test',NULL,NULL),(10443,9,'','test',NULL,NULL),(10444,9,'','test',NULL,NULL),(10445,9,'','test',NULL,NULL),(10446,9,'','test',NULL,NULL),(10447,9,'','test',NULL,NULL),(10448,9,'','test',NULL,NULL),(10449,9,'','test',NULL,NULL),(10450,9,'','test',NULL,NULL),(10451,9,'','test',NULL,NULL),(10452,9,'','test',NULL,NULL),(10453,9,'','test',NULL,NULL),(10454,9,'','test',NULL,NULL),(10455,9,'','test',NULL,NULL),(10456,9,'','test',NULL,NULL),(10457,9,'','test',NULL,NULL),(10458,9,'','test',NULL,NULL),(10459,9,'','test',NULL,NULL),(10460,9,'','test',NULL,NULL),(10461,9,'','test',NULL,NULL),(10462,9,'','test',NULL,NULL),(10463,9,'','test',NULL,NULL),(10464,9,'','test',NULL,NULL),(10465,9,'','test',NULL,NULL),(10466,9,'','test',NULL,NULL),(10467,9,'','test',NULL,NULL),(10468,9,'','test',NULL,NULL),(10469,9,'','test',NULL,NULL),(10470,9,'','test',NULL,NULL),(10471,9,'','test',NULL,NULL),(10472,9,'','test',NULL,NULL),(10473,9,'','test',NULL,NULL),(10474,9,'','test',NULL,NULL),(10475,9,'','test',NULL,NULL),(10476,9,'','test',NULL,NULL),(10477,9,'','test',NULL,NULL),(10478,9,'','test',NULL,NULL),(10479,9,'','test',NULL,NULL),(10480,9,'','test',NULL,NULL),(10481,9,'','test',NULL,NULL),(10482,9,'','test',NULL,NULL),(10483,9,'','test',NULL,NULL),(10484,9,'','test',NULL,NULL),(10485,9,'','test',NULL,NULL),(10486,9,'','test',NULL,NULL),(10487,9,'','test',NULL,NULL),(10488,9,'','test',NULL,NULL),(10489,9,'','test',NULL,NULL),(10490,9,'','test',NULL,NULL),(10491,9,'','test',NULL,NULL),(10492,9,'','test',NULL,NULL),(10493,9,'','test',NULL,NULL),(10494,9,'','test',NULL,NULL),(10495,9,'','test',NULL,NULL),(10496,9,'','test',NULL,NULL),(10497,9,'','test',NULL,NULL),(10498,9,'','test',NULL,NULL),(10499,9,'','test',NULL,NULL),(10500,9,'','test',NULL,NULL),(10501,9,'','test',NULL,NULL),(10502,9,'','test',NULL,NULL),(10503,9,'','test',NULL,NULL),(10504,9,'','test',NULL,NULL),(10505,9,'','test',NULL,NULL),(10506,9,'','test',NULL,NULL),(10507,9,'','test',NULL,NULL),(10508,9,'','test',NULL,NULL),(10509,9,'','test',NULL,NULL),(10510,9,'','test',NULL,NULL),(10511,9,'','test',NULL,NULL),(10512,9,'','test',NULL,NULL),(10513,9,'','test',NULL,NULL),(10514,9,'','test',NULL,NULL),(10515,9,'','test',NULL,NULL),(10516,9,'','test',NULL,NULL),(10517,9,'','test',NULL,NULL),(10518,9,'','test',NULL,NULL),(10519,9,'','test',NULL,NULL),(10520,9,'','test',NULL,NULL),(10521,9,'','test',NULL,NULL),(10522,9,'','test',NULL,NULL),(10523,9,'','test',NULL,NULL),(10524,9,'','test',NULL,NULL),(10525,9,'','test',NULL,NULL),(10526,9,'','test',NULL,NULL),(10527,9,'','test',NULL,NULL),(10528,9,'','test',NULL,NULL),(10529,9,'','test',NULL,NULL),(10530,9,'','test',NULL,NULL),(10531,9,'','test',NULL,NULL),(10532,9,'','test',NULL,NULL),(10533,9,'','test',NULL,NULL),(10534,9,'','test',NULL,NULL),(10535,9,'','test',NULL,NULL),(10536,9,'','test',NULL,NULL),(10537,9,'','test',NULL,NULL),(10538,9,'','test',NULL,NULL),(10539,9,'','test',NULL,NULL),(10540,9,'','test',NULL,NULL),(10541,9,'','test',NULL,NULL),(10542,9,'','test',NULL,NULL),(10543,9,'','test',NULL,NULL),(10544,9,'','test',NULL,NULL),(10545,9,'','test',NULL,NULL),(10546,9,'','test',NULL,NULL),(10547,9,'','test',NULL,NULL),(10548,9,'','test',NULL,NULL),(10549,9,'','test',NULL,NULL),(10550,9,'','test',NULL,NULL),(10551,9,'','test',NULL,NULL),(10552,9,'','test',NULL,NULL),(10553,9,'','test',NULL,NULL),(10554,9,'','test',NULL,NULL),(10555,9,'','test',NULL,NULL),(10556,9,'','test',NULL,NULL),(10557,9,'','test',NULL,NULL),(10558,9,'','test',NULL,NULL),(10559,9,'','test',NULL,NULL),(10560,9,'','test',NULL,NULL),(10561,9,'','test',NULL,NULL),(10562,9,'','test',NULL,NULL),(10563,9,'','test',NULL,NULL),(10564,9,'','test',NULL,NULL),(10565,9,'','test',NULL,NULL),(10566,9,'','test',NULL,NULL),(10567,9,'','test',NULL,NULL),(10568,9,'','test',NULL,NULL),(10569,9,'','test',NULL,NULL),(10570,9,'','test',NULL,NULL),(10571,9,'','test',NULL,NULL),(10572,9,'','test',NULL,NULL),(10573,9,'','test',NULL,NULL),(10574,9,'','test',NULL,NULL),(10575,9,'','test',NULL,NULL),(10576,9,'','test',NULL,NULL),(10577,9,'','test',NULL,NULL),(10578,9,'','test',NULL,NULL),(10579,9,'','test',NULL,NULL),(10580,9,'','test',NULL,NULL),(10581,9,'','test',NULL,NULL),(10582,9,'','test',NULL,NULL),(10583,9,'','test',NULL,NULL),(10584,9,'','test',NULL,NULL),(10585,9,'','test',NULL,NULL),(10586,9,'','test',NULL,NULL),(10587,9,'','test',NULL,NULL),(10588,9,'','test',NULL,NULL),(10589,9,'','test',NULL,NULL),(10590,9,'','test',NULL,NULL),(10591,9,'','test',NULL,NULL),(10592,9,'','test',NULL,NULL),(10593,9,'','test',NULL,NULL),(10594,9,'','test',NULL,NULL),(10595,9,'','test',NULL,NULL),(10596,9,'','test',NULL,NULL),(10597,9,'','test',NULL,NULL),(10598,9,'','test',NULL,NULL),(10599,9,'','test',NULL,NULL),(10600,9,'','test',NULL,NULL),(10601,9,'','test',NULL,NULL),(10602,9,'','test',NULL,NULL),(10603,9,'','test',NULL,NULL),(10604,9,'','test',NULL,NULL),(10605,9,'','test',NULL,NULL),(10606,9,'','test',NULL,NULL),(10607,9,'','test',NULL,NULL),(10608,9,'','test',NULL,NULL),(10609,9,'','test',NULL,NULL),(10610,9,'','test',NULL,NULL),(10611,9,'','test',NULL,NULL),(10612,9,'','test',NULL,NULL),(10613,9,'','test',NULL,NULL),(10614,9,'','test',NULL,NULL),(10615,9,'','test',NULL,NULL),(10616,9,'','test',NULL,NULL),(10617,9,'','test',NULL,NULL),(10618,9,'','test',NULL,NULL),(10619,9,'','test',NULL,NULL),(10620,9,'','test',NULL,NULL),(10621,9,'','test',NULL,NULL),(10622,9,'','test',NULL,NULL),(10623,9,'','test',NULL,NULL),(10624,9,'','test',NULL,NULL),(10625,9,'','test',NULL,NULL),(10626,9,'','test',NULL,NULL),(10627,9,'','test',NULL,NULL),(10628,9,'','test',NULL,NULL),(10629,9,'','test',NULL,NULL),(10630,9,'','test',NULL,NULL),(10631,9,'','test',NULL,NULL),(10632,9,'','test',NULL,NULL),(10633,9,'','test',NULL,NULL),(10634,9,'','test',NULL,NULL),(10635,9,'','test',NULL,NULL),(10636,9,'','test',NULL,NULL),(10637,9,'','test',NULL,NULL),(10638,9,'','test',NULL,NULL),(10639,9,'','test',NULL,NULL),(10640,9,'','test',NULL,NULL),(10641,9,'','test',NULL,NULL),(10642,9,'','test',NULL,NULL),(10643,9,'','test',NULL,NULL),(10644,9,'','test',NULL,NULL),(10645,9,'','test',NULL,NULL),(10646,9,'','test',NULL,NULL),(10647,9,'','test',NULL,NULL),(10648,9,'','test',NULL,NULL),(10649,9,'','test',NULL,NULL),(10650,9,'','test',NULL,NULL),(10651,9,'','test',NULL,NULL),(10652,9,'','test',NULL,NULL),(10653,9,'','test',NULL,NULL),(10654,9,'','test',NULL,NULL),(10655,9,'','test',NULL,NULL),(10656,9,'','test',NULL,NULL),(10657,9,'','test',NULL,NULL),(10658,9,'','test',NULL,NULL),(10659,9,'','test',NULL,NULL),(10660,9,'','test',NULL,NULL),(10661,9,'','test',NULL,NULL),(10662,9,'','test',NULL,NULL),(10663,9,'','test',NULL,NULL),(10664,9,'','test',NULL,NULL),(10665,9,'','test',NULL,NULL),(10666,9,'','test',NULL,NULL),(10667,9,'','test',NULL,NULL),(10668,9,'','test',NULL,NULL),(10669,9,'','test',NULL,NULL),(10670,9,'','test',NULL,NULL),(10671,9,'','test',NULL,NULL),(10672,9,'','test',NULL,NULL),(10673,9,'','test',NULL,NULL),(10674,9,'','test',NULL,NULL),(10675,9,'','test',NULL,NULL),(10676,9,'','test',NULL,NULL),(10677,9,'','test',NULL,NULL),(10678,9,'','test',NULL,NULL),(10679,9,'','test',NULL,NULL),(10680,9,'','test',NULL,NULL),(10681,9,'','test',NULL,NULL),(10682,9,'','test',NULL,NULL),(10683,9,'','test',NULL,NULL),(10684,9,'','test',NULL,NULL),(10685,9,'','test',NULL,NULL),(10686,9,'','test',NULL,NULL),(10687,9,'','test',NULL,NULL),(10688,9,'','test',NULL,NULL),(10689,9,'','test',NULL,NULL),(10690,9,'','test',NULL,NULL),(10691,9,'','test',NULL,NULL),(10692,9,'','test',NULL,NULL),(10693,9,'','test',NULL,NULL),(10694,9,'','test',NULL,NULL),(10695,9,'','test',NULL,NULL),(10696,9,'','test',NULL,NULL),(10697,9,'','test',NULL,NULL),(10698,9,'','test',NULL,NULL),(10699,9,'','test',NULL,NULL),(10700,9,'','test',NULL,NULL),(10701,9,'','test',NULL,NULL),(10702,9,'','test',NULL,NULL),(10703,9,'','test',NULL,NULL),(10704,9,'','test',NULL,NULL),(10705,9,'','test',NULL,NULL),(10706,9,'','test',NULL,NULL),(10707,9,'','test',NULL,NULL),(10708,9,'','test',NULL,NULL),(10709,9,'','test',NULL,NULL),(10710,9,'','test',NULL,NULL),(10711,9,'','test',NULL,NULL),(10712,9,'','test',NULL,NULL),(10713,9,'','test',NULL,NULL),(10714,9,'','test',NULL,NULL),(10715,9,'','test',NULL,NULL),(10716,9,'','test',NULL,NULL),(10717,9,'','test',NULL,NULL),(10718,9,'','test',NULL,NULL),(10719,9,'','test',NULL,NULL),(10720,9,'','test',NULL,NULL),(10721,9,'','test',NULL,NULL),(10722,9,'','test',NULL,NULL),(10723,9,'','test',NULL,NULL),(10724,9,'','test',NULL,NULL),(10725,9,'','test',NULL,NULL),(10726,9,'','test',NULL,NULL),(10727,9,'','test',NULL,NULL),(10728,9,'','test',NULL,NULL),(10729,9,'','test',NULL,NULL),(10730,9,'','test',NULL,NULL),(10731,9,'','test',NULL,NULL),(10732,9,'','test',NULL,NULL),(10733,9,'','test',NULL,NULL),(10734,9,'','test',NULL,NULL),(10735,9,'','test',NULL,NULL),(10736,9,'','test',NULL,NULL),(10737,9,'','test',NULL,NULL),(10738,9,'','test',NULL,NULL),(10739,9,'','test',NULL,NULL),(10740,9,'','test',NULL,NULL),(10741,9,'','test',NULL,NULL),(10742,9,'','test',NULL,NULL),(10743,9,'','test',NULL,NULL),(10744,9,'','test',NULL,NULL),(10745,9,'','test',NULL,NULL),(10746,9,'','test',NULL,NULL),(10747,9,'','test',NULL,NULL),(10748,9,'','test',NULL,NULL),(10749,9,'','test',NULL,NULL),(10750,9,'','test',NULL,NULL),(10751,9,'','test',NULL,NULL),(10752,9,'','test',NULL,NULL),(10753,9,'','test',NULL,NULL),(10754,9,'','test',NULL,NULL),(10755,9,'','test',NULL,NULL),(10756,9,'','test',NULL,NULL),(10757,9,'','test',NULL,NULL),(10758,9,'','test',NULL,NULL),(10759,9,'','test',NULL,NULL),(10760,9,'','test',NULL,NULL),(10761,9,'','test',NULL,NULL),(10762,9,'','test',NULL,NULL),(10763,9,'','test',NULL,NULL),(10764,9,'','test',NULL,NULL),(10765,9,'','test',NULL,NULL),(10766,9,'','test',NULL,NULL),(10767,9,'','test',NULL,NULL),(10768,9,'','test',NULL,NULL),(10769,9,'','test',NULL,NULL),(10770,9,'','test',NULL,NULL),(10771,9,'','test',NULL,NULL),(10772,9,'','test',NULL,NULL),(10773,9,'','test',NULL,NULL),(10774,9,'','test',NULL,NULL),(10775,9,'','test',NULL,NULL),(10776,9,'','test',NULL,NULL),(10777,9,'','test',NULL,NULL),(10778,9,'','test',NULL,NULL),(10779,9,'','test',NULL,NULL),(10780,9,'','test',NULL,NULL),(10781,9,'','test',NULL,NULL),(10782,9,'','test',NULL,NULL),(10783,9,'','test',NULL,NULL),(10784,9,'','test',NULL,NULL),(10785,9,'','test',NULL,NULL),(10786,9,'','test',NULL,NULL),(10787,9,'','test',NULL,NULL),(10788,9,'','test',NULL,NULL),(10789,9,'','test',NULL,NULL),(10790,9,'','test',NULL,NULL),(10791,9,'','test',NULL,NULL),(10792,9,'','test',NULL,NULL),(10793,9,'','test',NULL,NULL),(10794,9,'','test',NULL,NULL),(10795,9,'','test',NULL,NULL),(10796,9,'','test',NULL,NULL),(10797,9,'','test',NULL,NULL),(10798,9,'','test',NULL,NULL),(10799,9,'','test',NULL,NULL),(10800,9,'','test',NULL,NULL),(10801,9,'','test',NULL,NULL),(10802,9,'','test',NULL,NULL),(10803,9,'','test',NULL,NULL),(10804,9,'','test',NULL,NULL),(10805,9,'','test',NULL,NULL),(10806,9,'','test',NULL,NULL),(10807,9,'','test',NULL,NULL),(10808,9,'','test',NULL,NULL),(10809,9,'','test',NULL,NULL),(10810,9,'','test',NULL,NULL),(10811,9,'','test',NULL,NULL),(10812,9,'','test',NULL,NULL),(10813,9,'','test',NULL,NULL),(10814,9,'','test',NULL,NULL),(10815,9,'','test',NULL,NULL),(10816,9,'','test',NULL,NULL),(10817,9,'','test',NULL,NULL),(10818,9,'','test',NULL,NULL),(10819,9,'','test',NULL,NULL),(10820,9,'','test',NULL,NULL),(10821,9,'','test',NULL,NULL),(10822,9,'','test',NULL,NULL),(10823,9,'','test',NULL,NULL),(10824,9,'','test',NULL,NULL),(10825,9,'','test',NULL,NULL),(10826,9,'','test',NULL,NULL),(10827,9,'','test',NULL,NULL),(10828,9,'','test',NULL,NULL),(10829,9,'','test',NULL,NULL),(10830,9,'','test',NULL,NULL),(10831,9,'','test',NULL,NULL),(10832,9,'','test',NULL,NULL),(10833,9,'','test',NULL,NULL),(10834,9,'','test',NULL,NULL),(10835,9,'','test',NULL,NULL),(10836,9,'','test',NULL,NULL),(10837,9,'','test',NULL,NULL),(10838,9,'','test',NULL,NULL),(10839,9,'','test',NULL,NULL),(10840,9,'','test',NULL,NULL),(10841,9,'','test',NULL,NULL),(10842,9,'','test',NULL,NULL),(10843,9,'','test',NULL,NULL),(10844,9,'','test',NULL,NULL),(10845,9,'','test',NULL,NULL),(10846,9,'','test',NULL,NULL),(10847,9,'','test',NULL,NULL),(10848,9,'','test',NULL,NULL),(10849,9,'','test',NULL,NULL),(10850,9,'','test',NULL,NULL),(10851,9,'','test',NULL,NULL),(10852,9,'','test',NULL,NULL),(10853,9,'','test',NULL,NULL),(10854,9,'','test',NULL,NULL),(10855,9,'','test',NULL,NULL),(10856,9,'','test',NULL,NULL),(10857,9,'','test',NULL,NULL),(10858,9,'','test',NULL,NULL),(10859,9,'','test',NULL,NULL),(10860,9,'','test',NULL,NULL),(10861,9,'','test',NULL,NULL),(10862,9,'','test',NULL,NULL),(10863,9,'','test',NULL,NULL),(10864,9,'','test',NULL,NULL),(10865,9,'','test',NULL,NULL),(10866,9,'','test',NULL,NULL),(10867,9,'','test',NULL,NULL),(10868,9,'','test',NULL,NULL),(10869,9,'','test',NULL,NULL),(10870,9,'','test',NULL,NULL),(10871,9,'','test',NULL,NULL),(10872,9,'','test',NULL,NULL),(10873,9,'','test',NULL,NULL),(10874,9,'','test',NULL,NULL),(10875,9,'','test',NULL,NULL),(10876,9,'','test',NULL,NULL),(10877,9,'','test',NULL,NULL),(10878,9,'','test',NULL,NULL),(10879,9,'','test',NULL,NULL),(10880,9,'','test',NULL,NULL),(10881,9,'','test',NULL,NULL),(10882,9,'','test',NULL,NULL),(10883,9,'','test',NULL,NULL),(10884,9,'','test',NULL,NULL),(10885,9,'','test',NULL,NULL),(10886,9,'','test',NULL,NULL),(10887,9,'','test',NULL,NULL),(10888,9,'','test',NULL,NULL),(10889,9,'','test',NULL,NULL),(10890,9,'','test',NULL,NULL),(10891,9,'','test',NULL,NULL),(10892,9,'','test',NULL,NULL),(10893,9,'','test',NULL,NULL),(10894,9,'','test',NULL,NULL),(10895,9,'','test',NULL,NULL),(10896,9,'','test',NULL,NULL),(10897,9,'','test',NULL,NULL),(10898,9,'','test',NULL,NULL),(10899,9,'','test',NULL,NULL),(10900,9,'','test',NULL,NULL),(10901,9,'','test',NULL,NULL),(10902,9,'','test',NULL,NULL),(10903,9,'','test',NULL,NULL),(10904,9,'','test',NULL,NULL),(10905,9,'','test',NULL,NULL),(10906,9,'','test',NULL,NULL),(10907,9,'','test',NULL,NULL),(10908,9,'','test',NULL,NULL),(10909,9,'','test',NULL,NULL),(10910,9,'','test',NULL,NULL),(10911,9,'','test',NULL,NULL),(10912,9,'','test',NULL,NULL),(10913,9,'','test',NULL,NULL),(10914,9,'','test',NULL,NULL),(10915,9,'','test',NULL,NULL),(10916,9,'','test',NULL,NULL),(10917,9,'','test',NULL,NULL),(10918,9,'','test',NULL,NULL),(10919,9,'','test',NULL,NULL),(10920,9,'','test',NULL,NULL),(10921,9,'','test',NULL,NULL),(10922,9,'','test',NULL,NULL),(10923,9,'','test',NULL,NULL),(10924,9,'','test',NULL,NULL),(10925,9,'','test',NULL,NULL),(10926,9,'','test',NULL,NULL),(10927,9,'','test',NULL,NULL),(10928,9,'','test',NULL,NULL),(10929,9,'','test',NULL,NULL),(10930,9,'','test',NULL,NULL),(10931,9,'','test',NULL,NULL),(10932,9,'','test',NULL,NULL),(10933,9,'','test',NULL,NULL),(10934,9,'','test',NULL,NULL),(10935,9,'','test',NULL,NULL),(10936,9,'','test',NULL,NULL),(10937,9,'','test',NULL,NULL),(10938,9,'','test',NULL,NULL),(10939,9,'','test',NULL,NULL),(10940,9,'','test',NULL,NULL),(10941,9,'','test',NULL,NULL),(10942,9,'','test',NULL,NULL),(10943,9,'','test',NULL,NULL),(10944,9,'','test',NULL,NULL),(10945,9,'','test',NULL,NULL),(10946,9,'','test',NULL,NULL),(10947,9,'','test',NULL,NULL),(10948,9,'','test',NULL,NULL),(10949,9,'','test',NULL,NULL),(10950,9,'','test',NULL,NULL),(10951,9,'','test',NULL,NULL),(10952,9,'','test',NULL,NULL),(10953,9,'','test',NULL,NULL),(10954,9,'','test',NULL,NULL),(10955,9,'','test',NULL,NULL),(10956,9,'','test',NULL,NULL),(10957,9,'','test',NULL,NULL),(10958,9,'','test',NULL,NULL),(10959,9,'','test',NULL,NULL),(10960,9,'','test',NULL,NULL),(10961,9,'','test',NULL,NULL),(10962,9,'','test',NULL,NULL),(10963,9,'','test',NULL,NULL),(10964,9,'','test',NULL,NULL),(10965,9,'','test',NULL,NULL),(10966,9,'','test',NULL,NULL),(10967,9,'','test',NULL,NULL),(10968,9,'','test',NULL,NULL),(10969,9,'','test',NULL,NULL),(10970,9,'','test',NULL,NULL),(10971,9,'','test',NULL,NULL),(10972,9,'','test',NULL,NULL),(10973,9,'','test',NULL,NULL),(10974,9,'','test',NULL,NULL),(10975,9,'','test',NULL,NULL),(10976,9,'','test',NULL,NULL),(10977,9,'','test',NULL,NULL),(10978,9,'','test',NULL,NULL),(10979,9,'','test',NULL,NULL),(10980,9,'','test',NULL,NULL),(10981,9,'','test',NULL,NULL),(10982,9,'','test',NULL,NULL),(10983,9,'','test',NULL,NULL),(10984,9,'','test',NULL,NULL),(10985,9,'','test',NULL,NULL),(10986,9,'','test',NULL,NULL),(10987,9,'','test',NULL,NULL),(10988,9,'','test',NULL,NULL),(10989,9,'','test',NULL,NULL),(10990,9,'','test',NULL,NULL),(10991,9,'','test',NULL,NULL),(10992,9,'','test',NULL,NULL),(10993,9,'','test',NULL,NULL),(10994,9,'','test',NULL,NULL),(10995,9,'','test',NULL,NULL),(10996,9,'','test',NULL,NULL),(10997,9,'','test',NULL,NULL),(10998,9,'','test',NULL,NULL),(10999,9,'','test',NULL,NULL),(11000,9,'','test',NULL,NULL),(11001,9,'','test',NULL,NULL),(11002,9,'','test',NULL,NULL),(11003,9,'','test',NULL,NULL),(11004,9,'','test',NULL,NULL),(11005,9,'','test',NULL,NULL),(11006,9,'','test',NULL,NULL),(11007,9,'','test',NULL,NULL),(11008,9,'','test',NULL,NULL),(11009,9,'','test',NULL,NULL),(11010,9,'','test',NULL,NULL),(11011,9,'','test',NULL,NULL),(11012,9,'','test',NULL,NULL),(11013,9,'','test',NULL,NULL),(11014,9,'','test',NULL,NULL),(11015,9,'','test',NULL,NULL),(11016,9,'','test',NULL,NULL),(11017,9,'','test',NULL,NULL),(11018,9,'','test',NULL,NULL),(11019,9,'','test',NULL,NULL),(11020,9,'','test',NULL,NULL),(11021,9,'','test',NULL,NULL),(11022,9,'','test',NULL,NULL),(11023,9,'','test',NULL,NULL),(11024,9,'','test',NULL,NULL),(11025,9,'','test',NULL,NULL),(11026,9,'','test',NULL,NULL),(11027,9,'','test',NULL,NULL),(11028,9,'','test',NULL,NULL),(11029,9,'','test',NULL,NULL),(11030,9,'','test',NULL,NULL),(11031,9,'','test',NULL,NULL),(11032,9,'','test',NULL,NULL),(11033,9,'','test',NULL,NULL),(11034,9,'','test',NULL,NULL),(11035,9,'','test',NULL,NULL),(11036,9,'','test',NULL,NULL),(11037,9,'','test',NULL,NULL),(11038,9,'','test',NULL,NULL),(11039,9,'','test',NULL,NULL),(11040,9,'','test',NULL,NULL),(11041,9,'','test',NULL,NULL),(11042,9,'','test',NULL,NULL),(11043,9,'','test',NULL,NULL),(11044,9,'','test',NULL,NULL),(11045,9,'','test',NULL,NULL),(11046,9,'','test',NULL,NULL),(11047,9,'','test',NULL,NULL),(11048,9,'','test',NULL,NULL),(11049,9,'','test',NULL,NULL),(11050,9,'','test',NULL,NULL),(11051,9,'','test',NULL,NULL),(11052,9,'','test',NULL,NULL),(11053,9,'','test',NULL,NULL),(11054,9,'','test',NULL,NULL),(11055,9,'','test',NULL,NULL),(11056,9,'','test',NULL,NULL),(11057,9,'','test',NULL,NULL),(11058,9,'','test',NULL,NULL),(11059,9,'','test',NULL,NULL),(11060,9,'','test',NULL,NULL),(11061,9,'','test',NULL,NULL),(11062,9,'','test',NULL,NULL),(11063,9,'','test',NULL,NULL),(11064,9,'','test',NULL,NULL),(11065,9,'','test',NULL,NULL),(11066,9,'','test',NULL,NULL),(11067,9,'','test',NULL,NULL),(11068,9,'','test',NULL,NULL),(11069,9,'','test',NULL,NULL),(11070,9,'','test',NULL,NULL),(11071,9,'','test',NULL,NULL),(11072,9,'','test',NULL,NULL),(11073,9,'','test',NULL,NULL),(11074,9,'','test',NULL,NULL),(11075,9,'','test',NULL,NULL),(11076,9,'','test',NULL,NULL),(11077,9,'','test',NULL,NULL),(11078,9,'','test',NULL,NULL),(11079,9,'','test',NULL,NULL),(11080,9,'','test',NULL,NULL),(11081,9,'','test',NULL,NULL),(11082,9,'','test',NULL,NULL),(11083,9,'','test',NULL,NULL),(11084,9,'','test',NULL,NULL),(11085,9,'','test',NULL,NULL),(11086,9,'','test',NULL,NULL),(11087,9,'','test',NULL,NULL),(11088,9,'','test',NULL,NULL),(11089,9,'','test',NULL,NULL),(11090,9,'','test',NULL,NULL),(11091,9,'','test',NULL,NULL),(11092,9,'','test',NULL,NULL),(11093,9,'','test',NULL,NULL),(11094,9,'','test',NULL,NULL),(11095,9,'','test',NULL,NULL),(11096,9,'','test',NULL,NULL),(11097,9,'','test',NULL,NULL),(11098,9,'','test',NULL,NULL),(11099,9,'','test',NULL,NULL),(11100,9,'','test',NULL,NULL),(11101,9,'','test',NULL,NULL),(11102,9,'','test',NULL,NULL),(11103,9,'','test',NULL,NULL),(11104,9,'','test',NULL,NULL),(11105,9,'','test',NULL,NULL),(11106,9,'','test',NULL,NULL),(11107,9,'','test',NULL,NULL),(11108,9,'','test',NULL,NULL),(11109,9,'','test',NULL,NULL),(11110,9,'','test',NULL,NULL),(11111,9,'','test',NULL,NULL),(11112,9,'','test',NULL,NULL),(11113,9,'','test',NULL,NULL),(11114,9,'','test',NULL,NULL),(11115,9,'','test',NULL,NULL),(11116,9,'','test',NULL,NULL),(11117,9,'','test',NULL,NULL),(11118,9,'','test',NULL,NULL),(11119,9,'','test',NULL,NULL),(11120,9,'','test',NULL,NULL),(11121,9,'','test',NULL,NULL),(11122,9,'','test',NULL,NULL),(11123,9,'','test',NULL,NULL),(11124,9,'','test',NULL,NULL),(11125,9,'','test',NULL,NULL),(11126,9,'','test',NULL,NULL),(11127,9,'','test',NULL,NULL),(11128,9,'','test',NULL,NULL),(11129,9,'','test',NULL,NULL),(11130,9,'','test',NULL,NULL),(11131,9,'','test',NULL,NULL),(11132,9,'','test',NULL,NULL),(11133,9,'','test',NULL,NULL),(11134,9,'','test',NULL,NULL),(11135,9,'','test',NULL,NULL),(11136,9,'','test',NULL,NULL),(11137,9,'','test',NULL,NULL),(11138,9,'','test',NULL,NULL),(11139,9,'','test',NULL,NULL),(11140,9,'','test',NULL,NULL),(11141,9,'','test',NULL,NULL),(11142,9,'','test',NULL,NULL),(11143,9,'','test',NULL,NULL),(11144,9,'','test',NULL,NULL),(11145,9,'','test',NULL,NULL),(11146,9,'','test',NULL,NULL),(11147,9,'','test',NULL,NULL),(11148,9,'','test',NULL,NULL),(11149,9,'','test',NULL,NULL),(11150,9,'','test',NULL,NULL),(11151,9,'','test',NULL,NULL),(11152,9,'','test',NULL,NULL),(11153,9,'','test',NULL,NULL),(11154,9,'','test',NULL,NULL),(11155,9,'','test',NULL,NULL),(11156,9,'','test',NULL,NULL),(11157,9,'','test',NULL,NULL),(11158,9,'','test',NULL,NULL),(11159,9,'','test',NULL,NULL),(11160,9,'','test',NULL,NULL),(11161,9,'','test',NULL,NULL),(11162,9,'','test',NULL,NULL),(11163,9,'','test',NULL,NULL),(11164,9,'','test',NULL,NULL),(11165,9,'','test',NULL,NULL),(11166,9,'','test',NULL,NULL),(11167,9,'','test',NULL,NULL),(11168,9,'','test',NULL,NULL),(11169,9,'','test',NULL,NULL),(11170,9,'','test',NULL,NULL),(11171,9,'','test',NULL,NULL),(11172,9,'','test',NULL,NULL),(11173,8,'SASHA','HOOVY','POOTIS PENCER HEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE','Male');
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
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB AUTO_INCREMENT=739 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_info`
--

LOCK TABLES `school_info` WRITE;
/*!40000 ALTER TABLE `school_info` DISABLE KEYS */;
INSERT INTO `school_info` VALUES (7,'Rampaging Rams','Belmont','Bill Belichick','25 Washington Street','rampaging.rams@gmail.com'),(8,'Precise Penguins','Watertown','Bill Brotch','76 Jacob Road','precise.penguins@yahoo.com'),(9,'Yellow Yaks','Worchester','Matt Damon','23 Hillside Terrace','yellow.yaks@outlook.com'),(10,'12093102381-83712938711231','123123','13123123123123','123123123123','123123123123@1232'),(11,'123','123','123','123','123@123'),(12,'213123','1312313','13123123','1321313','123132@123'),(14,'s;kjdfhskadjfhaskdfjhsklfjhsdakjfhsadklfhsdklfjhsdklfjhsklfjhsaklfhskadjlf','hello','hello','hello','h@h'),(539,'test','','','',''),(540,'test','','','',''),(541,'test','','','',''),(542,'test','','','',''),(543,'test','','','',''),(544,'test','','','',''),(545,'test','','','',''),(546,'test','','','',''),(547,'test','','','',''),(548,'test','','','',''),(549,'test','','','',''),(550,'test','','','',''),(551,'test','','','',''),(552,'test','','','',''),(553,'test','','','',''),(554,'test','','','',''),(555,'test','','','',''),(556,'test','','','',''),(557,'test','','','',''),(558,'test','','','',''),(559,'test','','','',''),(560,'test','','','',''),(561,'test','','','',''),(562,'test','','','',''),(563,'test','','','',''),(564,'test','','','',''),(565,'test','','','',''),(566,'test','','','',''),(567,'test','','','',''),(568,'test','','','',''),(569,'test','','','',''),(570,'test','','','',''),(571,'test','','','',''),(572,'test','','','',''),(573,'test','','','',''),(574,'test','','','',''),(575,'test','','','',''),(576,'test','','','',''),(577,'test','','','',''),(578,'test','','','',''),(579,'test','','','',''),(580,'test','','','',''),(581,'test','','','',''),(582,'test','','','',''),(583,'test','','','',''),(584,'test','','','',''),(585,'test','','','',''),(586,'test','','','',''),(587,'test','','','',''),(588,'test','','','',''),(589,'test','','','',''),(590,'test','','','',''),(591,'test','','','',''),(592,'test','','','',''),(593,'test','','','',''),(594,'test','','','',''),(595,'test','','','',''),(596,'test','','','',''),(597,'test','','','',''),(598,'test','','','',''),(599,'test','','','',''),(600,'test','','','',''),(601,'test','','','',''),(602,'test','','','',''),(603,'test','','','',''),(604,'test','','','',''),(605,'test','','','',''),(606,'test','','','',''),(607,'test','','','',''),(608,'test','','','',''),(609,'test','','','',''),(610,'test','','','',''),(611,'test','','','',''),(612,'test','','','',''),(613,'test','','','',''),(614,'test','','','',''),(615,'test','','','',''),(616,'test','','','',''),(617,'test','','','',''),(618,'test','','','',''),(619,'test','','','',''),(620,'test','','','',''),(621,'test','','','',''),(622,'test','','','',''),(623,'test','','','',''),(624,'test','','','',''),(625,'test','','','',''),(626,'test','','','',''),(627,'test','','','',''),(628,'test','','','',''),(629,'test','','','',''),(630,'test','','','',''),(631,'test','','','',''),(632,'test','','','',''),(633,'test','','','',''),(634,'test','','','',''),(635,'test','','','',''),(636,'test','','','',''),(637,'test','','','',''),(638,'test','','','',''),(639,'test','','','',''),(640,'test','','','',''),(641,'test','','','',''),(642,'test','','','',''),(643,'test','','','',''),(644,'test','','','',''),(645,'test','','','',''),(646,'test','','','',''),(647,'test','','','',''),(648,'test','','','',''),(649,'test','','','',''),(650,'test','','','',''),(651,'test','','','',''),(652,'test','','','',''),(653,'test','','','',''),(654,'test','','','',''),(655,'test','','','',''),(656,'test','','','',''),(657,'test','','','',''),(658,'test','','','',''),(659,'test','','','',''),(660,'test','','','',''),(661,'test','','','',''),(662,'test','','','',''),(663,'test','','','',''),(664,'test','','','',''),(665,'test','','','',''),(666,'test','','','',''),(667,'test','','','',''),(668,'test','','','',''),(669,'test','','','',''),(670,'test','','','',''),(671,'test','','','',''),(672,'test','','','',''),(673,'test','','','',''),(674,'test','','','',''),(675,'test','','','',''),(676,'test','','','',''),(677,'test','','','',''),(678,'test','','','',''),(679,'test','','','',''),(680,'test','','','',''),(681,'test','','','',''),(682,'test','','','',''),(683,'test','','','',''),(684,'test','','','',''),(685,'test','','','',''),(686,'test','','','',''),(687,'test','','','',''),(688,'test','','','',''),(689,'test','','','',''),(690,'test','','','',''),(691,'test','','','',''),(692,'test','','','',''),(693,'test','','','',''),(694,'test','','','',''),(695,'test','','','',''),(696,'test','','','',''),(697,'test','','','',''),(698,'test','','','',''),(699,'test','','','',''),(701,'test','','','',''),(702,'test','','','',''),(703,'test','','','',''),(704,'test','','','',''),(705,'test','','','',''),(706,'test','','','',''),(707,'test','','','',''),(708,'test','','','',''),(709,'test','','','',''),(710,'test','','','',''),(711,'test','','','',''),(712,'test','','','',''),(713,'test','','','',''),(714,'test','','','',''),(715,'test','','','',''),(716,'test','','','',''),(717,'test','','','',''),(718,'test','','','',''),(719,'test','','','',''),(720,'test','','','',''),(721,'test','','','',''),(722,'test','','','',''),(723,'test','','','',''),(724,'test','','','',''),(725,'test','','','',''),(726,'test','','','',''),(727,'test','','','',''),(728,'test','','','',''),(729,'test','','','',''),(730,'test','','','',''),(731,'test','','','',''),(732,'test','','','',''),(733,'test','','','',''),(734,'test','','','',''),(735,'test','','','',''),(736,'test','','','',''),(737,'test','','','',''),(738,'test','','','','');
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
INSERT INTO `student_participants` VALUES (28,31,'regular'),(28,32,'regular'),(28,35,'regular'),(28,33,'alternate'),(28,34,'alternate'),(28,37,'regular'),(28,38,'alternate'),(30,31,'regular'),(30,33,'regular'),(30,59,'regular'),(30,61,'regular'),(30,32,'alternate'),(30,58,'alternate'),(30,62,'alternate'),(28,41,'regular'),(28,42,'regular'),(28,43,'regular'),(28,44,'regular'),(28,45,'regular'),(28,46,'regular'),(28,47,'regular'),(28,48,'regular'),(28,49,'regular'),(28,50,'regular');
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

-- Dump completed on 2016-09-16  1:06:00
