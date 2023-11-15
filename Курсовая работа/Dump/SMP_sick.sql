CREATE DATABASE  IF NOT EXISTS `SMP` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `SMP`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: SMP
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sick`
--

DROP TABLE IF EXISTS `sick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sick` (
  `sick_id` int NOT NULL AUTO_INCREMENT,
  `sick_age` int DEFAULT NULL,
  `sick_address_sity` varchar(45) DEFAULT NULL,
  `sick_address_street` varchar(45) DEFAULT NULL,
  `sick_address_home` varchar(45) DEFAULT NULL,
  `sick_address_flat` varchar(45) DEFAULT NULL,
  `sick_fam` varchar(45) DEFAULT NULL,
  `sick_nam` varchar(45) DEFAULT NULL,
  `sick_otch` varchar(45) DEFAULT NULL,
  `sick_where_sent` varchar(45) DEFAULT NULL,
  `sick_diagnos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sick`
--

LOCK TABLES `sick` WRITE;
/*!40000 ALTER TABLE `sick` DISABLE KEYS */;
INSERT INTO `sick` VALUES (1,23,'Красное-На-Волге','Песочная','','','Антонов','Антон','Антонович','домой',''),(2,26,'Красное-На-Волге','Песочная','23','','Иванов','Антон','Сергеевич','больница','Обезвоживание');
/*!40000 ALTER TABLE `sick` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-15 18:32:14
