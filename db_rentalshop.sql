-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_rentalshop
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `tbl_account`
--

DROP TABLE IF EXISTS `tbl_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_account` (
  `accNo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `rpword` varchar(255) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `acc_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `accNo` (`accNo`),
  CONSTRAINT `tbl_account_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_indreg` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_account`
--

LOCK TABLES `tbl_account` WRITE;
/*!40000 ALTER TABLE `tbl_account` DISABLE KEYS */;
INSERT INTO `tbl_account` VALUES (70,'arvin@gmail.com','$2y$10$EKQuHxBF5Cr78l8pT5HRPeNDWS3b83N/dZCE6B14BoBCIwVL4ULwu','$2y$10$jMR/RP.BH8UDtWSb6dqcfezF7F.7AznaOc8wRSGdqrmr/n9QDTkDq','user',0),(68,'da@g.c','$2y$10$wxrc4PuYJYCuk0EAWHOXeeLRHxYnE/ezd0MucQEgKlkddJAQsJW7W','$2y$10$eGeDbSWhi7DivKlEb8FcDOtZdwr0o.hb8lyutLSp6VbEmKSr08RLO','user',0),(72,'francia@gmail.com','$2y$10$X7R/j08F7fIHrTTY3hbNWeKXZWWHzj0oObePf1ViQv.zRUu.IendC','$2y$10$GnrIKML.72pu2I3doe84uu4mFu9yubjsPJm7bSbwr01ZZWZDiRlGu','userShop',0),(69,'mama@gmail.com','$2y$10$BuEPSolKdPNokGK60u/THOAVGuIvRZVlG0gNC7/Zt7l3wVpc8ZSxm','$2y$10$h4GsAVIFata0yJGW3bpp2eDPm1KpeA0fyz1JqOu81MH3O9IMUxqY.','userShop',0),(82,'omar@gmail.com','$2y$10$sjnONJ3QsegR7JMR1LDJQ.o.3AEyUow1S1oMj9Oahex6gHJ/jNsIW','$2y$10$sjnONJ3QsegR7JMR1LDJQ.o.3AEyUow1S1oMj9Oahex6gHJ/jNsIW','user',0),(71,'pau@gmail.com','$2y$10$lu4dUuZgk0hWOs2zMJlqzuextDOQyGQzC5WNU06RBcu/ZRmLKPMyW','$2y$10$tBtpG1F8Cu2bAhSSxHfdhO7Pboe1hzrpebmox3IKIwkK47zTfN28.','user',0),(75,'pesino@gmail.com','$2y$10$LGczVkGBtccUQqaYdg1/4effs.nj2HStgBGp3euxldN/yS3MGG3UW','$2y$10$3fb6iPto4AUempTdmcK1POeaQiPjDsRuBUMeXJgR/DSy.6UvjAFNW','user',0),(1,'rhasta_clent@yahoo.com','$2y$10$IZi6k96Xbqtamnr9INmMxOo1fqoabBWm5NJxp/qj0aLvyUAkHbXgS','$2y$10$z0MuuSIEycJuBw1wCpLQJuCggP5.ta3ttpGQ39EqRrB1LCBuX6Yka','admin',0),(76,'ww@gg.c','$2y$10$RjujNYlJGHo/ZrBPn/5rcezXdgr1JmZBwhyFO.xVVwtJM9VqG5iLm','$2y$10$G7ynmPBo8.72oCzbP2AenOQSeLln6kmM3qZSEsVY.amrVyx06R6Ma','user',0);
/*!40000 ALTER TABLE `tbl_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_address`
--

DROP TABLE IF EXISTS `tbl_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_address` (
  `address_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `st` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  PRIMARY KEY (`address_no`),
  KEY `accNo` (`accNo`),
  CONSTRAINT `tbl_address_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_indreg` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_address`
--

LOCK TABLES `tbl_address` WRITE;
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
INSERT INTO `tbl_address` VALUES (3,82,'Fighter','10','Bulig','Legazpi','default'),(4,68,'Magallanes','1','Bitano','Legazpi','default'),(5,68,'Rizal','3','San Roque','Legazpi','shipping');
/*!40000 ALTER TABLE `tbl_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_billing`
--

DROP TABLE IF EXISTS `tbl_billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_billing` (
  `payment_no` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_no` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`payment_no`),
  KEY `transaction_no` (`transaction_no`),
  CONSTRAINT `tbl_billing_ibfk_1` FOREIGN KEY (`transaction_no`) REFERENCES `tbl_transaction_log` (`transaction_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_billing`
--

LOCK TABLES `tbl_billing` WRITE;
/*!40000 ALTER TABLE `tbl_billing` DISABLE KEYS */;
INSERT INTO `tbl_billing` VALUES (1,2,'partial',100,'2011-01-01 07:07:43',100);
/*!40000 ALTER TABLE `tbl_billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cart` (
  `cart_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_size` varchar(255) NOT NULL,
  `item_color` varchar(255) NOT NULL,
  `type_of_ship` varchar(255) NOT NULL,
  PRIMARY KEY (`cart_no`),
  KEY `accNo` (`accNo`),
  KEY `tbl_cart_ibfk_2` (`item_no`),
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cart`
--

LOCK TABLES `tbl_cart` WRITE;
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
INSERT INTO `tbl_cart` VALUES (2,68,405,100,'Large','Blue','pickup');
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `category_no` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_size` tinyint(1) NOT NULL,
  `category_color` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (5,'Gadgets',0,1),(6,'Transportation',0,1),(7,'Gowns',1,1),(8,'Brain',1,0),(9,'Sound System',0,0),(10,'Gown2',0,1),(11,'Costume',1,1),(12,'Gowns',1,1);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_chat_message`
--

DROP TABLE IF EXISTS `tbl_chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_chat_message` (
  `msg_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `shop_no` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msg_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`msg_no`),
  KEY `accNo` (`accNo`),
  KEY `shop_no` (`shop_no`),
  CONSTRAINT `tbl_chat_message_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_chat_message_ibfk_2` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chat_message`
--

LOCK TABLES `tbl_chat_message` WRITE;
/*!40000 ALTER TABLE `tbl_chat_message` DISABLE KEYS */;
INSERT INTO `tbl_chat_message` VALUES (7,68,1,'ds',68,1,'2011-01-01 05:54:39',0),(8,68,1,'ds',68,1,'2011-01-01 05:54:39',0),(9,68,1,'good job',68,1,'2011-01-01 05:54:39',0),(10,68,1,'sample sample sample testing testing testing',68,1,'2011-01-01 05:54:39',0),(11,68,1,'another test',68,1,'2011-01-01 05:54:39',0),(12,68,1,'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',68,1,'2011-01-01 05:54:39',0),(13,68,1,'sssssssssssssssssssssssssssssss ssssss sssss',68,1,'2011-01-01 05:54:39',0),(14,68,1,'taking on seven years the holy ghost had left alone test my ar ms kick like crayz ive been trying way too long',68,1,'2011-01-01 05:54:39',0),(15,68,1,'sample testing',68,1,'2011-01-01 05:54:39',0),(16,68,1,'testing',68,1,'2011-01-01 05:54:40',0),(17,68,1,'good',68,1,'2011-01-01 05:54:40',0),(18,68,2,'soory na',68,2,'2011-01-01 05:53:44',0),(19,68,2,'kahit na ikaw ang mali',68,2,'2011-01-01 05:53:44',0),(20,68,2,'are u ok?',2,68,'2011-01-01 08:49:56',0),(21,68,2,'coz im not',2,68,'2011-01-01 08:49:56',0),(22,68,2,'sender',68,0,'2011-01-01 08:27:30',0),(23,68,2,'sender',68,2,'2011-01-01 08:28:20',0),(24,68,2,'receiver',2,68,'2011-01-01 08:30:09',0),(25,68,2,'receive this',2,68,'2011-01-01 08:39:06',0),(26,68,2,'ok',2,68,'2011-01-01 08:41:27',0),(27,68,2,'its ok ser',2,68,'2011-01-01 08:41:55',0),(28,68,2,'scroll now',68,2,'2011-01-01 08:44:54',0),(29,68,2,'good job',2,68,'2011-01-01 08:45:00',0),(30,68,2,'not bad',68,2,'2011-01-01 08:45:07',0),(31,68,2,'sample testing chat',2,68,'2011-01-01 08:45:18',0),(32,68,2,'try and try',68,2,'2011-01-01 09:01:37',0),(33,68,2,'yes',2,68,'2011-01-01 09:18:01',0),(34,68,2,'no',68,2,'2011-01-01 09:18:10',0),(35,68,2,'yes',2,68,'2011-01-01 09:18:19',0),(36,68,2,'hellow',2,68,'2011-01-01 09:34:32',0),(37,68,2,'try now',68,2,'2011-01-01 09:39:00',0),(38,68,2,'another try',68,2,'2011-01-01 09:39:14',0),(39,68,1,'testing',1,68,'2011-01-01 09:41:10',0),(40,68,1,'try now',1,68,'2011-01-01 09:41:20',0),(41,68,1,'try me',1,68,'2011-01-01 09:41:23',0),(42,68,2,'send to user',2,68,'2011-01-01 08:32:58',0),(43,68,2,'send to shop',68,2,'2011-01-01 08:33:33',0),(44,68,2,'send again',68,2,'2011-01-01 08:33:40',0),(45,68,2,'sample',2,68,'2011-01-01 08:46:57',0),(46,68,2,'22',2,68,'2011-01-01 08:47:25',0),(47,68,2,'sample 22',68,2,'2011-01-01 08:47:35',0),(48,68,2,'ako po si',2,68,'2011-01-01 08:48:24',0),(49,68,2,'chat back',68,2,'2011-01-01 08:48:31',0),(50,68,2,'follow up po ng ininquire',68,2,'2011-01-01 08:09:49',0),(51,68,2,'soryy for the late response',2,68,'2011-01-01 08:10:06',0),(52,68,1,'k',68,1,'2011-01-01 09:17:21',0),(53,68,1,'bonak',1,68,'2011-01-01 09:17:29',0),(54,68,1,'hata pula',1,68,'2011-01-01 09:17:38',0),(55,68,1,'send',1,68,'2011-01-01 09:17:47',0),(56,68,1,'labot ko',68,1,'2011-01-01 09:18:01',0),(57,68,1,'hellow',1,68,'2011-01-01 09:52:12',0),(58,68,1,'futa',1,68,'2011-01-01 09:52:19',0),(59,68,1,'poli',68,1,'2011-01-01 09:52:54',0),(60,68,1,'akoako',68,1,'2011-01-01 09:55:26',0),(61,68,2,'kk',68,2,'2011-01-01 09:56:25',0),(62,68,2,'http://localhost/bonak/product_desc2.php?item_no=356',68,2,'2011-01-01 10:52:06',0),(63,68,2,'hey',68,2,'2011-01-01 10:52:32',0),(64,68,1,'good',68,1,'2011-01-01 11:46:06',0),(65,68,1,'sample',68,1,'2011-01-01 11:04:19',0),(66,68,1,'ss',68,1,'2011-01-01 11:04:41',0),(67,68,1,'sheyt',68,1,'2011-01-01 11:05:22',0),(68,68,1,'sadadas da jkd',68,1,'2011-01-01 11:39:19',0),(69,68,2,'ty',68,2,'2011-01-01 08:15:23',0),(70,68,2,'insert',2,68,'2011-01-01 03:57:10',0),(71,68,2,'hello',68,2,'2011-01-01 08:13:25',0),(72,68,1,'try',1,68,'2011-01-01 11:47:46',0),(73,68,1,'try 2',1,68,'2011-01-01 08:10:23',0),(74,68,1,'try 3',1,68,'2011-01-01 08:10:41',0),(75,68,1,'chat',68,1,'2011-01-01 11:45:07',0);
/*!40000 ALTER TABLE `tbl_chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_indreg`
--

DROP TABLE IF EXISTS `tbl_indreg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_indreg` (
  `accNo` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(2) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `bday` date NOT NULL,
  `user_img` varchar(255) NOT NULL,
  PRIMARY KEY (`accNo`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_indreg`
--

LOCK TABLES `tbl_indreg` WRITE;
/*!40000 ALTER TABLE `tbl_indreg` DISABLE KEYS */;
INSERT INTO `tbl_indreg` VALUES (1,'Darrel','Datur','Naz','Da','Male',2147483647,'1995-07-21',''),(68,'Darrel','D','Datur','Da','Male',12345,'2011-01-26',''),(69,'Francia','Datur','Naz','Ma','Female',930,'1966-01-13',''),(70,'Arvin','Hus','Lason','A','Male',993,'2013-01-01',''),(71,'Paula','Datur','Naz','Pa','Female',987675890,'1998-10-20',''),(72,'Francia','Datur','naz','fr','Female',2147483647,'1966-02-13',''),(75,'Joan','Pokpok','Pesino','Fe','Female',93837,'2018-10-13',''),(76,'dsad','dasd','dasd','ds','Female',112321,'0001-01-01',''),(82,'Mar','Maute','Camlian','Ju','Male',2147483647,'1995-11-21','avatar1.png');
/*!40000 ALTER TABLE `tbl_indreg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item` (
  `shop_no` int(11) NOT NULL,
  `item_no` int(11) NOT NULL AUTO_INCREMENT,
  `category_no` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `type_of_ship` varchar(255) NOT NULL,
  PRIMARY KEY (`item_no`),
  KEY `shop_no` (`shop_no`),
  KEY `category_no` (`category_no`),
  CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_item_ibfk_2` FOREIGN KEY (`category_no`) REFERENCES `tbl_category` (`category_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item`
--

LOCK TABLES `tbl_item` WRITE;
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
INSERT INTO `tbl_item` VALUES (1,381,7,'clothes','clothes',1,1,1,'pickup'),(1,388,8,'utak','utak',1,1,1,'ship'),(1,404,5,'gadgets','phones tablets',1,1,1,'ship'),(1,405,7,'Womens Gown','gown for women',1,1,1,'pickupship'),(1,406,6,'Sakayan','sakayan ',1,1,1,'pickup'),(1,407,7,'simple gown','simple',1,1,1,'pickupship'),(1,416,9,'Karaoke','sound',1,1,1,'ship'),(1,417,9,'Microphone','mic',1,2,1,'pickup'),(1,418,8,'Donate Utak','Big Brain',1,1,1,'ship'),(1,419,8,'dsad','dasdsad',1,1,1,'pickup'),(1,420,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship'),(1,421,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship'),(1,422,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship'),(1,423,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship'),(1,424,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship'),(1,425,11,'Belle Gown (Beauty and Beast)','bka bka',1,1,1,'pickupship');
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item_photo_name`
--

DROP TABLE IF EXISTS `tbl_item_photo_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item_photo_name` (
  `image_no` int(11) NOT NULL AUTO_INCREMENT,
  `variants_no` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `item_photo_name` varchar(255) NOT NULL,
  PRIMARY KEY (`image_no`),
  KEY `item_no` (`item_no`),
  KEY `tbl_item_photo_name_ibfk_2` (`variants_no`),
  CONSTRAINT `tbl_item_photo_name_ibfk_1` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_item_photo_name_ibfk_2` FOREIGN KEY (`variants_no`) REFERENCES `tbl_item_size` (`variants_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=394 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item_photo_name`
--

LOCK TABLES `tbl_item_photo_name` WRITE;
/*!40000 ALTER TABLE `tbl_item_photo_name` DISABLE KEYS */;
INSERT INTO `tbl_item_photo_name` VALUES (339,110,381,'4d1eaa87a07b15.89307056.png'),(340,110,381,'4d1eaa87b8a6f5.17148752.png'),(341,110,381,'4d1eaa87d14fd9.54678440.png'),(342,118,388,'4d1eb19baae445.02812301.png'),(343,118,388,'4d1eb19bd98676.96685424.png'),(353,131,404,'4d1ec7564beb22.88443398.png'),(354,131,404,'4d1ec756781c45.98639845.png'),(355,132,404,'4d1ec7568f4e19.47735647.png'),(356,132,404,'4d1ec756c3cc69.45042002.png'),(357,132,404,'4d1ec756d6d7a4.36094476.png'),(358,133,405,'4d1ed4f47a3440.82836837.png'),(359,133,405,'4d1ed4f512b251.98664623.png'),(360,134,405,'4d1ed4f5303d46.09711998.png'),(361,134,405,'4d1ed4f53f2204.88089159.png'),(362,135,405,'4d1ed4f5522d44.63233663.png'),(363,135,405,'4d1ed4f567a990.60978648.png'),(364,136,405,'4d1ed4f57ab4e0.54585286.png'),(365,136,405,'4d1ed4f5a5ec02.07734498.png'),(366,137,405,'4d1ed4f61e6e10.19453510.png'),(367,137,405,'4d1ed4f62f8552.76462549.png'),(368,138,405,'4d1ed4f6454020.82479432.png'),(369,138,405,'4d1ed4f65695e5.39536388.png'),(370,139,406,'4d1f1514910903.51793275.png'),(371,139,406,'4d1f15150a0823.33064153.png'),(372,139,406,'4d1f1515290a10.32566044.png'),(373,140,406,'4d1f151569bd86.59126713.png'),(374,140,406,'4d1f15158bad85.13205427.png'),(375,140,406,'4d1f1515cc60f5.78876726.png'),(376,141,407,'4d1f156f94bf69.24704258.png'),(377,141,407,'4d1f156fa2aa17.23158066.png'),(378,141,407,'4d1f156fb5b565.41874932.png'),(380,142,407,'4d1f1570495153.77316083.png'),(381,142,407,'4d1f157063afc7.22498858.png'),(382,143,407,'4d1f15707ec9a3.86583557.png'),(383,143,407,'4d1f1570919668.83688287.png'),(384,143,407,'4d1f1570a1f229.33138948.png'),(389,146,416,'4d1ecf382b48d1.38879151.png'),(390,147,417,'4d1ecf87ed0698.14949895.png'),(391,148,418,'4d1ed25d84a7d0.32627305.png'),(392,148,418,'4d1ed25db9a326.57348046.png'),(393,149,419,'4d1ef1bd90a386.62490000.png');
/*!40000 ALTER TABLE `tbl_item_photo_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item_size`
--

DROP TABLE IF EXISTS `tbl_item_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item_size` (
  `variants_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_no` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`variants_no`),
  KEY `item_no` (`item_no`),
  CONSTRAINT `tbl_item_size_ibfk_1` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item_size`
--

LOCK TABLES `tbl_item_size` WRITE;
/*!40000 ALTER TABLE `tbl_item_size` DISABLE KEYS */;
INSERT INTO `tbl_item_size` VALUES (110,381,1,100,'Xlarge','Violet'),(118,388,3,100,'Xlarge',''),(131,404,1,100,'','Red'),(132,404,1,100,'','Blue'),(133,405,2,100,'Xsmall','Red'),(134,405,2,100,'Xsmall','Orange'),(135,405,2,200,'Small','Orange'),(136,405,2,200,'Small','Yellow'),(137,405,2,200,'Large','Blue'),(138,405,2,200,'Large','Red'),(139,406,1,5000,'','Violet'),(140,406,1,5000,'','Blue'),(141,407,1,100,'Xsmall','Red'),(142,407,1,100,'Xsmall','Yellow'),(143,407,1,100,'Small','Yellow'),(146,416,1,500,'',''),(147,417,1,100,'',''),(148,418,1,100,'Xsmall',''),(149,419,1,100,'Xsmall','');
/*!40000 ALTER TABLE `tbl_item_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_rate_reviews`
--

DROP TABLE IF EXISTS `tbl_product_rate_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_rate_reviews` (
  `review_no` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_no` int(11) NOT NULL,
  `accNo` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `reviews` varchar(2000) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_no`),
  KEY `accNo` (`accNo`),
  KEY `tbl_product_rate_reviews_ibfk_2` (`item_no`),
  KEY `transaction_no` (`transaction_no`),
  CONSTRAINT `tbl_product_rate_reviews_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_product_rate_reviews_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_product_rate_reviews_ibfk_3` FOREIGN KEY (`transaction_no`) REFERENCES `tbl_transaction_log` (`transaction_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_rate_reviews`
--

LOCK TABLES `tbl_product_rate_reviews` WRITE;
/*!40000 ALTER TABLE `tbl_product_rate_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_rate_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_rate_reviews_img`
--

DROP TABLE IF EXISTS `tbl_product_rate_reviews_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_rate_reviews_img` (
  `review_img_no` int(11) NOT NULL AUTO_INCREMENT,
  `review_no` int(11) NOT NULL,
  `review_img_name` varchar(255) NOT NULL,
  PRIMARY KEY (`review_img_no`),
  KEY `review_no` (`review_no`),
  CONSTRAINT `tbl_product_rate_reviews_img_ibfk_1` FOREIGN KEY (`review_no`) REFERENCES `tbl_product_rate_reviews` (`review_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_rate_reviews_img`
--

LOCK TABLES `tbl_product_rate_reviews_img` WRITE;
/*!40000 ALTER TABLE `tbl_product_rate_reviews_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_rate_reviews_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_renter`
--

DROP TABLE IF EXISTS `tbl_renter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_renter` (
  `renterID` int(255) NOT NULL,
  `accNo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`renterID`),
  KEY `accNo` (`accNo`),
  KEY `email` (`email`),
  CONSTRAINT `tbl_renter_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_indreg` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_renter_ibfk_2` FOREIGN KEY (`email`) REFERENCES `tbl_account` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_renter`
--

LOCK TABLES `tbl_renter` WRITE;
/*!40000 ALTER TABLE `tbl_renter` DISABLE KEYS */;
INSERT INTO `tbl_renter` VALUES (18298,68,'da@g.c'),(1293853205,76,'ww@gg.c'),(1293859445,75,'pesino@gmail.com');
/*!40000 ALTER TABLE `tbl_renter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_report_issues`
--

DROP TABLE IF EXISTS `tbl_report_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_report_issues` (
  `accNo` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `issues` varchar(2000) NOT NULL,
  KEY `accNo` (`accNo`),
  KEY `item_no` (`item_no`),
  CONSTRAINT `tbl_report_issues_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_report_issues_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_report_issues`
--

LOCK TABLES `tbl_report_issues` WRITE;
/*!40000 ALTER TABLE `tbl_report_issues` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_report_issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_saved_product`
--

DROP TABLE IF EXISTS `tbl_saved_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_saved_product` (
  `accNo` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  KEY `tbl_saved_product_ibfk_1` (`accNo`),
  KEY `tbl_saved_product_ibfk_2` (`item_no`),
  CONSTRAINT `tbl_saved_product_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_saved_product_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_saved_product`
--

LOCK TABLES `tbl_saved_product` WRITE;
/*!40000 ALTER TABLE `tbl_saved_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_saved_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shop`
--

DROP TABLE IF EXISTS `tbl_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shop` (
  `shop_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `shop_contact` varchar(255) NOT NULL,
  `shop_desc` varchar(255) NOT NULL,
  `shop_a_st` varchar(100) NOT NULL,
  `shop_a_zone` varchar(100) NOT NULL,
  `shop_a_brgy` varchar(100) NOT NULL,
  `shop_a_city` varchar(100) NOT NULL,
  `shop_img` varchar(255) NOT NULL,
  PRIMARY KEY (`shop_no`),
  KEY `accNo` (`accNo`),
  CONSTRAINT `tbl_shop_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_indreg` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shop`
--

LOCK TABLES `tbl_shop` WRITE;
/*!40000 ALTER TABLE `tbl_shop` DISABLE KEYS */;
INSERT INTO `tbl_shop` VALUES (1,69,'Althea\'s Gown and Barong','mama@gmail.com','09308700765','Come and experience the taste of my best pansit.','Magallanes St','1','Bitano','Legazpi','04d1ec71cc731f0.369132151.jpg'),(2,72,'Electronics Rental Shop','francia@gmail.com','2147483647','a computer shop that is built for a business purposes.','magallanes','1','bitano','legazpi','724d1eb720245d15.624903752.png');
/*!40000 ALTER TABLE `tbl_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shop_followers`
--

DROP TABLE IF EXISTS `tbl_shop_followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shop_followers` (
  `follower_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `shop_no` int(11) NOT NULL,
  PRIMARY KEY (`follower_no`),
  KEY `accNo` (`accNo`),
  KEY `shop_no` (`shop_no`),
  CONSTRAINT `tbl_shop_followers_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_shop_followers_ibfk_2` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shop_followers`
--

LOCK TABLES `tbl_shop_followers` WRITE;
/*!40000 ALTER TABLE `tbl_shop_followers` DISABLE KEYS */;
INSERT INTO `tbl_shop_followers` VALUES (3,68,1);
/*!40000 ALTER TABLE `tbl_shop_followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shop_notifications`
--

DROP TABLE IF EXISTS `tbl_shop_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shop_notifications` (
  `shop_notif_no` int(11) NOT NULL AUTO_INCREMENT,
  `shop_no` int(11) NOT NULL,
  `transaction_no` int(11) NOT NULL,
  `shop_notif_status` int(11) NOT NULL,
  PRIMARY KEY (`shop_notif_no`),
  KEY `tbl_shop_notifications_ibfk_2` (`transaction_no`),
  KEY `shop_no` (`shop_no`),
  CONSTRAINT `tbl_shop_notifications_ibfk_2` FOREIGN KEY (`transaction_no`) REFERENCES `tbl_transaction_log` (`transaction_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_shop_notifications_ibfk_3` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shop_notifications`
--

LOCK TABLES `tbl_shop_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_shop_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shop_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shop_profile`
--

DROP TABLE IF EXISTS `tbl_shop_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shop_profile` (
  `accNo` int(11) NOT NULL,
  `shop_no` int(11) NOT NULL,
  KEY `accNo` (`accNo`),
  KEY `shop_no` (`shop_no`),
  CONSTRAINT `tbl_shop_profile_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_indreg` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_shop_profile_ibfk_2` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shop_profile`
--

LOCK TABLES `tbl_shop_profile` WRITE;
/*!40000 ALTER TABLE `tbl_shop_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shop_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_shop_rate_reviews`
--

DROP TABLE IF EXISTS `tbl_shop_rate_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_shop_rate_reviews` (
  `accNo` int(11) NOT NULL,
  `shop_no` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `reviews` varchar(2000) NOT NULL,
  KEY `tbl_shop_rate_reviews_ibfk_1` (`accNo`),
  KEY `shop_no` (`shop_no`),
  CONSTRAINT `tbl_shop_rate_reviews_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_shop_rate_reviews_ibfk_2` FOREIGN KEY (`shop_no`) REFERENCES `tbl_shop` (`shop_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_shop_rate_reviews`
--

LOCK TABLES `tbl_shop_rate_reviews` WRITE;
/*!40000 ALTER TABLE `tbl_shop_rate_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shop_rate_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status` (
  `status_no` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pending` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`status_no`),
  KEY `email` (`email`),
  CONSTRAINT `tbl_status_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tbl_account` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'da@g.c',0,0,0),(2,'mama@gmail.com',0,0,0),(3,'rhasta_clent@yahoo.com',0,0,0),(4,'arvin@gmail.com',1,0,0),(5,'pau@gmail.com',1,0,0),(6,'francia@gmail.com',0,0,0),(7,'pesino@gmail.com',1,0,0),(8,'ww@gg.c',1,0,0);
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaction_log`
--

DROP TABLE IF EXISTS `tbl_transaction_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaction_log` (
  `transaction_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_no` int(11) NOT NULL,
  `accNo` int(11) NOT NULL,
  `rent_quantity` int(11) NOT NULL,
  `rent_color` varchar(100) NOT NULL,
  `rent_size` varchar(100) NOT NULL,
  `rent_delivery_option` varchar(100) NOT NULL,
  `rent_add_st` varchar(100) NOT NULL,
  `rent_add_zone` varchar(100) NOT NULL,
  `rent_add_brgy` varchar(100) NOT NULL,
  `rent_add_city` varchar(100) NOT NULL,
  `rent_date` date NOT NULL,
  `date_to_be_rent` date NOT NULL,
  `date_to_be_return` date NOT NULL,
  `date_returned` date NOT NULL,
  `item_status` varchar(100) NOT NULL,
  `transaction_status` varchar(100) NOT NULL,
  `review_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`transaction_no`),
  KEY `item_no` (`item_no`),
  KEY `accNo` (`accNo`),
  CONSTRAINT `tbl_transaction_log_ibfk_2` FOREIGN KEY (`item_no`) REFERENCES `tbl_item` (`item_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_transaction_log_ibfk_3` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaction_log`
--

LOCK TABLES `tbl_transaction_log` WRITE;
/*!40000 ALTER TABLE `tbl_transaction_log` DISABLE KEYS */;
INSERT INTO `tbl_transaction_log` VALUES (2,388,68,2,'','Xlarge','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-03','2011-01-04','2011-01-04','not available','on process',0),(3,404,68,1,'Blue','','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-27','2011-01-30','2011-01-30','not available','on process',0),(5,404,68,1,'Red','','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-10','2011-01-12','2011-01-12','not available','on process',0),(8,405,68,1,'Yellow','Small','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-05','2011-01-08','2011-01-08','not available','Delivered',0),(9,405,68,1,'Orange','Small','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-12','2011-01-14','2011-01-14','not available','on process',0),(10,405,68,1,'Orange','Small','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-05','2011-01-06','2011-01-06','not available','on process',0),(11,405,68,1,'Orange','Small','ship','Magallanes Street','Magallanes Street','Bitano','Legazpi City','2011-01-01','2011-01-05','2011-01-06','2011-01-06','not available','on process',0),(12,405,82,1,'Blue','Large','ship','Fighter','Fighter','Bulig','Legazpi','2011-01-01','2011-01-24','2011-01-26','2011-01-26','not available','on process',0),(13,405,68,1,'Yellow','Small','ship','Rizal','Rizal','San Roque','Legazpi','2011-01-01','2011-01-19','2011-01-20','2011-01-20','not available','on process',0);
/*!40000 ALTER TABLE `tbl_transaction_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_notifications`
--

DROP TABLE IF EXISTS `tbl_user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_notifications` (
  `user_notif_no` int(11) NOT NULL AUTO_INCREMENT,
  `accNo` int(11) NOT NULL,
  `transaction_no` int(11) NOT NULL,
  `user_notif_status` int(11) NOT NULL,
  PRIMARY KEY (`user_notif_no`),
  KEY `accNo` (`accNo`),
  KEY `transaction_no` (`transaction_no`),
  CONSTRAINT `tbl_user_notifications_ibfk_1` FOREIGN KEY (`accNo`) REFERENCES `tbl_account` (`accNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_user_notifications_ibfk_2` FOREIGN KEY (`transaction_no`) REFERENCES `tbl_transaction_log` (`transaction_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_notifications`
--

LOCK TABLES `tbl_user_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_user_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_notifications` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-01-01  1:08:46
