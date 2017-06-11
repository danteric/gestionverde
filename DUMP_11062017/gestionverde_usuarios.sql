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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usua_nombre` varchar(50) NOT NULL,
  `usua_pwd` varchar(50) NOT NULL,
  `usua_nota` varchar(100) DEFAULT NULL,
  `usua_habilitado` char(1) NOT NULL,
  `usua_fch_alta` date NOT NULL,
  `usua_usr_alta` varchar(50) NOT NULL,
  `usua_fch_modi` date DEFAULT NULL,
  `usua_usr_modi` varchar(50) DEFAULT NULL,
  `usua_filas_pag` int(11) DEFAULT NULL,
  `usua_clie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usua_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('1716112725','5a7983d0ab14dbbc95d914eaf2872068','IRIGOYEN BONILLA, María Cristina (Alta autom alumno)','S','2016-09-14','sistema',NULL,NULL,12,NULL),('18215859','3c33384b0307652f21116a66f98a2bda','IRRAZABAL, Clara Anselma (Alta autom alumno)','S','2016-09-09','sistema',NULL,NULL,12,NULL),('18859217','e72a2d14f4e2e4c67a33a6e159291f17','NUÑEZ, Aurelien Jaime Anselme (Alta autom alumno)','S','2016-09-23','sistema',NULL,NULL,12,NULL),('34389682','dbacf37e30fa0c8c362c2fbb887f1da4','GUINART BOGUSLAWSKI, Carolina Alexandra María (Alta autom alumno)','S','2016-09-19','sistema',NULL,NULL,12,NULL),('36314598','4bd7c421aa1a52a5e898dc91e87927eb','CORTINA REVELLI, Valentina (Alta autom alumno)','S','2016-09-09','sistema',NULL,NULL,12,NULL),('38069305','b5f85bcc8a944b2275489ad0dffa9969','Biancucci, Matias Ezequiel (Alta autom alumno)','S','2016-09-19','sistema',NULL,NULL,12,NULL),('40462857','0686a2399c4380c6cd821b22bf349483','FERNANDEZ, Juana (Alta autom alumno)','S','2016-09-13','sistema',NULL,NULL,12,NULL),('40923448','2ac0f66a2c6dfe3fb38a8b07093a6e35','ARIAS, Eva Guadalupe (Alta autom alumno)','S','2016-09-23','sistema',NULL,NULL,12,NULL),('admin','21232f297a57a5a743894a0e4a801fc3','usuario administrador','S','2015-07-23','admin','2015-10-06','admin',20,0),('consulta','5d76beffe761403531a6eb339e0f0231','Perfil de solo consulta','S','2016-04-19','mariano.drets','0000-00-00','',0,0),('mariano.drets','6fbcf2d48c7dce4ddbb52a1fd849b698','Fundacion','S','2015-07-23','admin','2015-10-07','admin',20,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 16:08:45
