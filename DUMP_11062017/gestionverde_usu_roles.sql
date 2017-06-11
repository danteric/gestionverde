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
-- Table structure for table `usu_roles`
--

DROP TABLE IF EXISTS `usu_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_roles` (
  `usro_rol` varchar(30) NOT NULL DEFAULT '',
  `usro_observaciones` varchar(200) DEFAULT NULL,
  `usro_habilitado` varchar(1) DEFAULT NULL,
  `usro_fch_alta` date DEFAULT NULL,
  `usro_usr_alta` varchar(50) DEFAULT NULL,
  `usro_fch_modi` date DEFAULT NULL,
  `usro_usr_modi` varchar(50) DEFAULT NULL,
  `usro_perm_pdf` varchar(1) DEFAULT NULL,
  `usro_perm_excel` varchar(1) DEFAULT NULL,
  `usro_perm_html` varchar(1) DEFAULT NULL,
  `usro_perm_modi` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`usro_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_roles`
--

LOCK TABLES `usu_roles` WRITE;
/*!40000 ALTER TABLE `usu_roles` DISABLE KEYS */;
INSERT INTO `usu_roles` VALUES ('ADMIN','Administracion de la aplicacion','S','0000-00-00','admin',NULL,NULL,'S','S','S','S'),('ALUMNO','perfil para el alumno','S','0000-00-00','admin',NULL,NULL,'S','S','S','S'),('CONSULTA','No modifica datos','S','0000-00-00','admin',NULL,NULL,'N','N','N','N');
/*!40000 ALTER TABLE `usu_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:43
