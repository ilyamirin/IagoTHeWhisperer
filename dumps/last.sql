-- MySQL dump 10.13  Distrib 5.6.45-86.1, for Linux (x86_64)
--
-- Host: 172.17.0.1    Database: sberbank_profile
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.2-MariaDB-1:10.4.2+maria~bionic

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
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (1,'Сбербанк'),(2,'Альфа-Банк'),(3,'ВТБ'),(4,'МТСБанк'),(5,'Примтеркомбанк'),(6,'Модульбанк'),(7,'Росбанк'),(8,'АО Солид Банк'),(9,'Промсвязьбанк'),(10,'Промсвязьбанк'),(11,'Тинькофф'),(12,'ФК Открытие'),(13,'Точка');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `check_range`
--

DROP TABLE IF EXISTS `check_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_range` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tariff_id` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9DD698B92348FD2` (`tariff_id`),
  CONSTRAINT `FK_9DD698B92348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_range`
--

LOCK TABLES `check_range` WRITE;
/*!40000 ALTER TABLE `check_range` DISABLE KEYS */;
INSERT INTO `check_range` VALUES (1,1,0,5000000,0.05),(2,1,5000000,NULL,0.1),(3,2,0,2000000,0.04),(4,2,2000000,5000000,0.05),(5,2,5000000,NULL,0.1),(6,3,0,2000000,0.03),(7,3,2000000,5000000,0.05),(8,3,5000000,NULL,0.1),(9,4,0,2000000,0.03),(10,4,2000000,5000000,0.05),(11,4,5000000,NULL,0.1),(12,5,0,2000000,0.03),(13,5,2000000,5000000,0.05),(14,5,5000000,NULL,0.1);
/*!40000 ALTER TABLE `check_range` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extradition_range`
--

DROP TABLE IF EXISTS `extradition_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extradition_range` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tariff_id` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C305D29B92348FD2` (`tariff_id`),
  CONSTRAINT `FK_C305D29B92348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extradition_range`
--

LOCK TABLES `extradition_range` WRITE;
/*!40000 ALTER TABLE `extradition_range` DISABLE KEYS */;
INSERT INTO `extradition_range` VALUES (1,1,0,NULL,0.03),(2,2,400,NULL,0.03),(3,3,400,NULL,0.03),(4,4,400,NULL,0.03),(5,5,0,500000,0),(6,5,500000,NULL,0.03);
/*!40000 ALTER TABLE `extradition_range` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191012060603','2019-11-23 05:03:58'),('20191028041900','2019-11-23 05:03:58'),('20191028054602','2019-11-23 05:03:58'),('20191028063722','2019-11-23 05:03:58'),('20191104021714','2019-11-23 05:03:58'),('20191109060104','2019-11-23 05:03:58'),('20191116053759','2019-11-23 05:03:59'),('20191123000852','2019-11-23 05:03:59'),('20191123023210','2019-11-23 05:03:59');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reception_range`
--

DROP TABLE IF EXISTS `reception_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reception_range` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tariff_id` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F9C0F62192348FD2` (`tariff_id`),
  CONSTRAINT `FK_F9C0F62192348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reception_range`
--

LOCK TABLES `reception_range` WRITE;
/*!40000 ALTER TABLE `reception_range` DISABLE KEYS */;
INSERT INTO `reception_range` VALUES (1,1,0,NULL,0.0015),(2,2,0,50000,0),(3,2,50000,NULL,0.003),(4,3,0,100000,0),(5,3,100000,NULL,0.0015),(6,4,0,NULL,0.003),(7,5,0,500000,0),(8,5,500000,NULL,0.003);
/*!40000 ALTER TABLE `reception_range` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tariff`
--

DROP TABLE IF EXISTS `tariff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tariff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `year_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `adapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `free_errands_amount` int(11) NOT NULL DEFAULT 0,
  `errand_cost` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `IDX_9465207D11C8FB41` (`bank_id`),
  CONSTRAINT `FK_9465207D11C8FB41` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tariff`
--

LOCK TABLES `tariff` WRITE;
/*!40000 ALTER TABLE `tariff` DISABLE KEYS */;
INSERT INTO `tariff` VALUES (1,1,'Лёгкий старт','0 руб.','-','бесплатно Visa Business Momentum / Mastercard Business Momentum','-','App\\Adapter\\CommonAdapter',3,199),(2,1,'Удачный сезон','590 руб.','-','250 руб. в месяц / 2 500руб. в год VisaBusiness/MasterCard Business','-','App\\Adapter\\CommonAdapter',5,49),(3,1,'Хорошая выручка','1090 руб.','-','250 руб. в месяц / 2 500руб. в год VisaBusiness/MasterCard Business','-','App\\Adapter\\CommonAdapter',10,37),(4,1,'Активные расчеты','Активные расчеты','-','250 руб. в месяц / 2 500руб. в год VisaBusiness/MasterCard Business','-','App\\Adapter\\CommonAdapter',50,16),(5,1,'Большие возможности','12 990 руб.','-','бесплатно Visa Platinum Business / MasterCard Preferred','-','App\\Adapter\\CommonAdapter',100,100);
/*!40000 ALTER TABLE `tariff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_range`
--

DROP TABLE IF EXISTS `transfer_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_range` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tariff_id` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3003AF1192348FD2` (`tariff_id`),
  CONSTRAINT `FK_3003AF1192348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_range`
--

LOCK TABLES `transfer_range` WRITE;
/*!40000 ALTER TABLE `transfer_range` DISABLE KEYS */;
INSERT INTO `transfer_range` VALUES (1,1,0,150000,0.005),(2,1,150000,300000,0.01),(3,1,300000,1500000,0.017),(4,1,1500000,5000000,0.035),(5,1,5000000,NULL,0.08),(6,2,0,150000,0.005),(7,2,150000,300000,0.01),(8,2,300000,1500000,0.017),(9,2,1500000,5000000,0.035),(10,2,5000000,NULL,0.08),(11,3,0,150000,0.005),(12,3,150000,300000,0.01),(13,3,300000,1500000,0.017),(14,3,1500000,5000000,0.035),(15,3,5000000,NULL,0.08),(16,4,0,150000,0.005),(17,4,150000,300000,0.01),(18,4,300000,1500000,0.017),(19,4,1500000,5000000,0.035),(20,4,5000000,NULL,0.08),(21,5,0,300000,0),(22,5,300000,1500000,0.017),(23,5,1500000,5000000,0.035),(24,5,5000000,NULL,0.08);
/*!40000 ALTER TABLE `transfer_range` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-23  5:58:07
