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
-- Table structure for table `usu_menues_rol`
--

DROP TABLE IF EXISTS `usu_menues_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_menues_rol` (
  `usmr_usap_apli` varchar(10) NOT NULL DEFAULT '',
  `usmr_usro_rol` varchar(30) NOT NULL DEFAULT '',
  `usmr_item` varchar(50) NOT NULL DEFAULT '',
  `usmr_alta` varchar(1) DEFAULT NULL,
  `usmr_baja` varchar(1) DEFAULT NULL,
  `usmr_modif` varchar(1) DEFAULT NULL,
  `usmr_habilitado` varchar(1) DEFAULT NULL,
  `usmr_fch_alta` date DEFAULT NULL,
  `usmr_usr_alta` varchar(50) DEFAULT NULL,
  `usmr_fch_modi` date DEFAULT NULL,
  `usmr_usr_modi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usmr_usap_apli`,`usmr_usro_rol`,`usmr_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_menues_rol`
--

LOCK TABLES `usu_menues_rol` WRITE;
/*!40000 ALTER TABLE `usu_menues_rol` DISABLE KEYS */;
INSERT INTO `usu_menues_rol` VALUES ('GAMSI','ADMIN','m_admin','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_fichas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_proyectos','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_tablas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ALUMNO','m_alumno','S','S','S','S','0000-00-00','admin',NULL,NULL);
/*!40000 ALTER TABLE `usu_menues_rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:44
