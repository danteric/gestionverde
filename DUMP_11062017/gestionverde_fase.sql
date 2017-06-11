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
-- Table structure for table `fase`
--

DROP TABLE IF EXISTS `fase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fase` (
  `fase_id` int(11) NOT NULL AUTO_INCREMENT,
  `fase_deno` varchar(50) NOT NULL,
  `fase_deno_redu` varchar(10) NOT NULL,
  `fase_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fase_alta_usu` varchar(50) NOT NULL,
  `fase_baja_f` date DEFAULT NULL,
  `fase_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fase`
--

LOCK TABLES `fase` WRITE;
/*!40000 ALTER TABLE `fase` DISABLE KEYS */;
INSERT INTO `fase` VALUES (1,'Documentación Inal','Doc. I','2017-05-07 20:51:38','','2017-06-10','admin'),(2,'Puesta en Marcha','Puest. Mar','2017-05-07 20:51:38','',NULL,NULL),(3,'Ejecución','Ejec.','2017-05-07 20:51:38','',NULL,NULL),(4,'Retiro de Obra','Retir. Obr','2017-05-07 20:51:38','',NULL,NULL),(5,'','','2017-05-23 03:00:00','admin','2017-05-23','admin'),(6,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin'),(7,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin'),(8,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin'),(9,'asd','asdsad','2017-06-10 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `fase` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:47
