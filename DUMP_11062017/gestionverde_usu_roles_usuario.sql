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
-- Table structure for table `usu_roles_usuario`
--

DROP TABLE IF EXISTS `usu_roles_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_roles_usuario` (
  `usru_usro_rol` varchar(30) NOT NULL DEFAULT '',
  `usru_usua_nombre` varchar(50) NOT NULL DEFAULT '',
  `usru_habilitado` varchar(1) DEFAULT NULL,
  `usru_fch_alta` date DEFAULT NULL,
  `usru_usr_alta` varchar(50) DEFAULT NULL,
  `usru_fch_modi` date DEFAULT NULL,
  `usru_usr_modi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usru_usro_rol`,`usru_usua_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_roles_usuario`
--

LOCK TABLES `usu_roles_usuario` WRITE;
/*!40000 ALTER TABLE `usu_roles_usuario` DISABLE KEYS */;
INSERT INTO `usu_roles_usuario` VALUES ('ADMIN','admin','S','0000-00-00','admin',NULL,NULL),('ALUMNO','1716112725','S','2016-09-14','sistema',NULL,NULL),('ALUMNO','18215859','S','2016-09-09','sistema',NULL,NULL),('ALUMNO','18859217','S','2016-09-23','sistema',NULL,NULL),('ALUMNO','34389682','S','2016-09-19','sistema',NULL,NULL),('ALUMNO','36314598','S','2016-09-09','sistema',NULL,NULL),('ALUMNO','38069305','S','2016-09-19','sistema',NULL,NULL),('ALUMNO','40462857','S','2016-09-13','sistema',NULL,NULL),('ALUMNO','40923448','S','2016-09-23','sistema',NULL,NULL),('ALUMNO','mariano.drets','S','0000-00-00','admin',NULL,NULL),('CONSULTA','consulta','S','0000-00-00','admin',NULL,NULL);
/*!40000 ALTER TABLE `usu_roles_usuario` ENABLE KEYS */;
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
