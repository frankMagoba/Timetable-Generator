CREATE DATABASE  IF NOT EXISTS `ttgs` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ttgs`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ttgs
-- ------------------------------------------------------
-- Server version	5.6.21-log

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
-- Table structure for table `classnames`
--

DROP TABLE IF EXISTS `classnames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classnames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classnames`
--

LOCK TABLES `classnames` WRITE;
/*!40000 ALTER TABLE `classnames` DISABLE KEYS */;
INSERT INTO `classnames` VALUES (1,'1A'),(2,'1B'),(3,'1C'),(4,'2A'),(5,'2B'),(6,'2C'),(7,'3A'),(8,'3B'),(9,'3C'),(10,'4A'),(11,'4B'),(12,'4C');
/*!40000 ALTER TABLE `classnames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(200) DEFAULT NULL,
  `subjects` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=578 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (422,'1A',1,13),(423,'1A',2,11),(424,'1A',3,5),(425,'1A',4,18),(426,'1A',5,7),(427,'1A',6,7),(428,'1A',7,2),(429,'1A',8,23),(430,'1A',9,0),(431,'1A',10,22),(432,'1A',11,2),(433,'1A',12,0),(434,'1A',13,0),(435,'1B',1,12),(436,'1B',2,9),(437,'1B',3,3),(438,'1B',4,8),(439,'1B',5,3),(440,'1B',6,5),(441,'1B',7,1),(442,'1B',8,9),(443,'1B',9,0),(444,'1B',10,6),(445,'1B',11,1),(446,'1B',12,0),(447,'1B',13,0),(448,'1C',1,13),(449,'1C',2,14),(450,'1C',3,5),(451,'1C',4,22),(452,'1C',5,7),(453,'1C',6,24),(454,'1C',7,2),(455,'1C',8,23),(456,'1C',9,0),(457,'1C',10,6),(458,'1C',11,2),(459,'1C',12,0),(460,'1C',13,0),(461,'2A',1,16),(462,'2A',2,14),(463,'2A',3,8),(464,'2A',4,22),(465,'2A',5,28),(466,'2A',6,24),(467,'2A',7,10),(468,'2A',8,27),(469,'2A',9,0),(470,'2A',10,22),(471,'2A',11,10),(472,'2A',12,0),(473,'2A',13,0),(474,'2B',1,16),(475,'2B',2,17),(476,'2B',3,8),(477,'2B',4,22),(478,'2B',5,29),(479,'2B',6,24),(480,'2B',7,11),(481,'2B',8,9),(482,'2B',9,0),(483,'2B',10,22),(484,'2B',11,17),(485,'2B',12,0),(486,'2B',13,0),(487,'2C',1,12),(488,'2C',2,23),(489,'2C',3,30),(490,'2C',4,24),(491,'2C',5,29),(492,'2C',6,25),(493,'2C',7,14),(494,'2C',8,23),(495,'2C',9,0),(496,'2C',10,22),(497,'2C',11,17),(498,'2C',12,0),(499,'2C',13,0),(500,'3A',1,12),(501,'3A',2,27),(502,'3A',3,28),(503,'3A',4,8),(504,'3A',5,3),(505,'3A',6,25),(506,'3A',7,11),(507,'3A',8,27),(508,'3A',9,0),(509,'3A',10,22),(510,'3A',11,10),(511,'3A',12,0),(512,'3A',13,0),(513,'3B',1,12),(514,'3B',2,14),(515,'3B',3,30),(516,'3B',4,22),(517,'3B',5,29),(518,'3B',6,7),(519,'3B',7,15),(520,'3B',8,27),(521,'3B',9,0),(522,'3B',10,6),(523,'3B',11,1),(524,'3B',12,0),(525,'3B',13,0),(526,'3C',1,26),(527,'3C',2,15),(528,'3C',3,21),(529,'3C',4,25),(530,'3C',5,7),(531,'3C',6,24),(532,'3C',7,1),(533,'3C',8,23),(534,'3C',9,0),(535,'3C',10,22),(536,'3C',11,17),(537,'3C',12,0),(538,'3C',13,0),(539,'4A',1,13),(540,'4A',2,17),(541,'4A',3,30),(542,'4A',4,22),(543,'4A',5,28),(544,'4A',6,7),(545,'4A',7,14),(546,'4A',8,23),(547,'4A',9,0),(548,'4A',10,6),(549,'4A',11,2),(550,'4A',12,0),(551,'4A',13,0),(552,'4B',1,13),(553,'4B',2,11),(554,'4B',3,29),(555,'4B',4,18),(556,'4B',5,28),(557,'4B',6,24),(558,'4B',7,15),(559,'4B',8,27),(560,'4B',9,0),(561,'4B',10,22),(562,'4B',11,2),(563,'4B',12,0),(564,'4B',13,0),(565,'4C',1,16),(566,'4C',2,14),(567,'4C',3,8),(568,'4C',4,22),(569,'4C',5,29),(570,'4C',6,25),(571,'4C',7,11),(572,'4C',8,23),(573,'4C',9,0),(574,'4C',10,22),(575,'4C',11,1),(576,'4C',12,0),(577,'4C',13,0);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_double_lesson`
--

DROP TABLE IF EXISTS `subject_double_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_double_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(45) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_double_lesson`
--

LOCK TABLES `subject_double_lesson` WRITE;
/*!40000 ALTER TABLE `subject_double_lesson` DISABLE KEYS */;
INSERT INTO `subject_double_lesson` VALUES (1,'1',1),(2,'3',2);
/*!40000 ALTER TABLE `subject_double_lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_lessons_per_week`
--

DROP TABLE IF EXISTS `subject_lessons_per_week`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_lessons_per_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_id` int(11) DEFAULT NULL,
  `subject_lessons_per_week` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_lessons_per_week`
--

LOCK TABLES `subject_lessons_per_week` WRITE;
/*!40000 ALTER TABLE `subject_lessons_per_week` DISABLE KEYS */;
INSERT INTO `subject_lessons_per_week` VALUES (1,1,6),(2,2,6),(3,3,5),(4,4,4),(5,5,4),(6,6,4),(7,7,3),(8,8,4),(9,9,3),(10,10,3),(11,11,3),(12,12,1),(13,13,1),(14,78,5),(15,910,4);
/*!40000 ALTER TABLE `subject_lessons_per_week` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_priority`
--

DROP TABLE IF EXISTS `subject_priority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(11) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_priority`
--

LOCK TABLES `subject_priority` WRITE;
/*!40000 ALTER TABLE `subject_priority` DISABLE KEYS */;
INSERT INTO `subject_priority` VALUES (1,1,1),(2,2,2),(3,3,3),(4,2,4),(5,1,5),(6,3,6),(7,4,12),(8,4,13),(9,3,910),(10,2,78);
/*!40000 ALTER TABLE `subject_priority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) DEFAULT NULL,
  `scode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Eng',101),(2,'Kisw',102),(3,'Maths',121),(4,'Bio',231),(5,'Phyc',232),(6,'Chem',233),(7,'Hist&Govt',311),(8,'Geo',312),(9,'Bs',313),(10,'Agric',443),(11,'CRE',565),(12,'Lifeskills',112),(13,'PE',113);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(45) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `subject1` int(11) DEFAULT NULL,
  `subject2` int(11) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Mr. Were','Humanities',7,11,'07'),(2,'Mrs. Akidiva','Humanities',7,11,'07'),(3,'Mr. Shivina','Science',3,5,'07'),(5,'Mr. Wanyama .M.','Science',3,6,'07'),(6,'Mr. Wasilwa','Humanities',10,10,'07'),(7,'Mr. Muchemu','Science',6,5,'07'),(8,'Mr. Kegode','Science',3,4,'07'),(9,'Mr. Wambulwa','Languages',2,8,'07'),(10,'Ms. Katasi','Humanities',7,11,'07'),(11,'Mr. Wafula','Humanities',7,2,'07'),(12,'Mrs. Wamalwa','Languages',1,1,'07'),(13,'Mr. Muniafu','Languages',1,1,'07'),(14,'Mr. Wanyama .D.','Languages',2,7,'07'),(15,'Mr. Ondabu','Languages',2,7,'07'),(16,'Mr. Luseno','Languages',1,1,'07'),(17,'Ms. Khaemba','Languages',2,11,'07'),(18,'Mr. Masinde','Science',4,3,'07'),(21,'Mr. Kimongoi','Science',3,3,'07'),(22,'Mrs. Juma','Technicals',10,4,'07'),(23,'Mr. Siva','Languages',2,8,'07'),(24,'Mr. Bonke','Science',4,6,'07'),(25,'Mrs. Orina','Science',4,6,'07'),(26,'Mr. Simwa','Languages',1,1,'07'),(27,'Mr. Ondego','Languages',2,8,'07'),(28,'Mr. Were','Science',3,5,'07'),(29,'Mr. Muhati','Science',3,5,'07'),(30,'Mr. Wanami','Science',3,5,'07');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_slots`
--

DROP TABLE IF EXISTS `time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slots` varchar(45) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slots`
--

LOCK TABLES `time_slots` WRITE;
/*!40000 ALTER TABLE `time_slots` DISABLE KEYS */;
INSERT INTO `time_slots` VALUES (1,'8:00am',0),(2,'8:40am',0),(3,'9:20am',0),(4,'10:00am',1),(5,'10:20am',0),(6,'11:00am',0),(7,'11:40am',1),(8,'11:50am',0),(9,'12:30pm',0),(10,'1:10pm',1),(11,'2:00pm',0),(12,'2:40pm',0),(13,'3:20pm',0);
/*!40000 ALTER TABLE `time_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ttgs'
--

--
-- Dumping routines for database 'ttgs'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-01 19:47:19
