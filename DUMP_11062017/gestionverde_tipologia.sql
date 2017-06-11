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
-- Table structure for table `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipologia` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_deno` varchar(50) NOT NULL,
  `tipo_deno_redu` varchar(10) NOT NULL,
  `tipo_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_alta_usu` varchar(50) NOT NULL,
  `tipo_baja_f` date DEFAULT NULL,
  `tipo_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipologia`
--

LOCK TABLES `tipologia` WRITE;
/*!40000 ALTER TABLE `tipologia` DISABLE KEYS */;
INSERT INTO `tipologia` VALUES (1,'Refacciones / Reciclajes','Refac. Rec','2017-05-07 20:56:28','',NULL,NULL),(2,'Viviendas Unifamiliares','Viv. Unif.','2017-05-07 20:56:28','',NULL,NULL),(3,'Edificios en Altura','Edif. Alt.','2017-05-07 20:56:28','',NULL,NULL),(4,'Edificios Públicos','Edif. Publ','2017-05-07 20:56:28','',NULL,NULL),(5,'Galpones / Naves','Galp. / Na','2017-05-07 20:56:28','',NULL,NULL),(6,'Plantas Productivas','Plan. Prod','2017-05-07 20:56:28','',NULL,NULL),(7,'Vialidad','Vial.','2017-05-07 20:56:28','',NULL,NULL),(8,'Redes de Infraestructura','Red. Infra','2017-05-07 20:56:28','',NULL,NULL);
/*!40000 ALTER TABLE `tipologia` ENABLE KEYS */;
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
