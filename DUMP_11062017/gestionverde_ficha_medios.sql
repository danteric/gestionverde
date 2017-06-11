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
-- Table structure for table `ficha_medios`
--

DROP TABLE IF EXISTS `ficha_medios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_medios` (
  `fime_fich_id` int(11) NOT NULL,
  `fime_medi_id` int(11) NOT NULL,
  `fime_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fime_alta_usu` varchar(50) NOT NULL,
  `fime_baja_f` date DEFAULT NULL,
  `fime_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fime_fich_id`,`fime_medi_id`),
  CONSTRAINT `FK_ficha_fichamedios` FOREIGN KEY (`fime_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_medios`
--

LOCK TABLES `ficha_medios` WRITE;
/*!40000 ALTER TABLE `ficha_medios` DISABLE KEYS */;
INSERT INTO `ficha_medios` VALUES (1,1,'2017-06-10 03:00:00','admin',NULL,NULL),(1,2,'2017-06-10 03:00:00','admin',NULL,NULL),(1,3,'2017-06-10 03:00:00','admin',NULL,NULL),(1,4,'2017-06-10 03:00:00','admin',NULL,NULL),(1,5,'2017-06-10 03:00:00','admin',NULL,NULL),(7,5,'2017-06-04 03:00:00','admin',NULL,NULL),(8,1,'2017-06-10 03:00:00','admin',NULL,NULL),(8,2,'2017-06-10 03:00:00','admin',NULL,NULL),(8,3,'2017-06-10 03:00:00','admin',NULL,NULL),(8,4,'2017-06-10 03:00:00','admin',NULL,NULL),(8,6,'2017-06-10 03:00:00','admin',NULL,NULL),(12,1,'2017-06-11 03:00:00','admin',NULL,NULL),(12,2,'2017-06-11 03:00:00','admin',NULL,NULL),(12,3,'2017-06-11 03:00:00','admin',NULL,NULL),(12,4,'2017-06-11 03:00:00','admin',NULL,NULL),(12,6,'2017-06-11 03:00:00','admin',NULL,NULL),(14,0,'2017-06-11 03:00:00','admin',NULL,NULL),(40,1,'2017-06-11 03:00:00','admin',NULL,NULL),(40,2,'2017-06-11 03:00:00','admin',NULL,NULL),(40,3,'2017-06-11 03:00:00','admin',NULL,NULL),(40,4,'2017-06-11 03:00:00','admin',NULL,NULL),(40,6,'2017-06-11 03:00:00','admin',NULL,NULL),(41,0,'2017-06-11 03:00:00','admin',NULL,NULL),(42,2,'2017-06-11 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_medios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:46
