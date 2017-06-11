-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestionverde
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `ficha_fases`
--

DROP TABLE IF EXISTS `ficha_fases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_fases` (
  `fifa_fich_id` int(11) NOT NULL,
  `fifa_fase_id` int(11) NOT NULL,
  `fifa_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fifa_alta_usu` varchar(50) NOT NULL,
  `fifa_baja_f` date DEFAULT NULL,
  `fifa_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fifa_fich_id`,`fifa_fase_id`),
  CONSTRAINT `FK_ficha_fichafases` FOREIGN KEY (`fifa_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_fases`
--

LOCK TABLES `ficha_fases` WRITE;
/*!40000 ALTER TABLE `ficha_fases` DISABLE KEYS */;
INSERT INTO `ficha_fases` VALUES (1,2,'2017-06-10 03:00:00','admin',NULL,NULL),(1,3,'2017-06-10 03:00:00','admin',NULL,NULL),(1,4,'2017-06-10 03:00:00','admin',NULL,NULL),(1,9,'2017-06-10 03:00:00','admin',NULL,NULL),(5,0,'2017-06-04 03:00:00','admin',NULL,NULL),(6,0,'2017-06-03 03:00:00','admin',NULL,NULL),(7,1,'2017-06-04 03:00:00','admin',NULL,NULL),(7,2,'2017-06-04 03:00:00','admin',NULL,NULL),(8,2,'2017-06-10 03:00:00','admin',NULL,NULL),(8,3,'2017-06-10 03:00:00','admin',NULL,NULL),(8,4,'2017-06-10 03:00:00','admin',NULL,NULL),(8,9,'2017-06-10 03:00:00','admin',NULL,NULL),(12,0,'2017-06-11 03:00:00','admin',NULL,NULL),(14,9,'2017-06-11 03:00:00','admin',NULL,NULL),(39,3,'2017-06-11 03:00:00','admin',NULL,NULL),(39,9,'2017-06-11 03:00:00','admin',NULL,NULL),(40,2,'2017-06-11 03:00:00','admin',NULL,NULL),(40,3,'2017-06-11 03:00:00','admin',NULL,NULL),(40,4,'2017-06-11 03:00:00','admin',NULL,NULL),(40,9,'2017-06-11 03:00:00','admin',NULL,NULL),(41,0,'2017-06-11 03:00:00','admin',NULL,NULL),(42,0,'2017-06-11 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_fases` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:42
