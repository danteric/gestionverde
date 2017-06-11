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
-- Table structure for table `parametros`
--

DROP TABLE IF EXISTS `parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros` (
  `para_empre` int(11) NOT NULL,
  `para_clave` varchar(30) NOT NULL,
  `para_atributo` varchar(30) DEFAULT NULL,
  `para_valor_n` int(11) DEFAULT NULL,
  `para_valor_c` varchar(30) DEFAULT NULL,
  `para_descripcion` varchar(100) DEFAULT NULL,
  `para_habilitado` varchar(1) DEFAULT NULL,
  `para_fch_alta` date DEFAULT NULL,
  `para_usr_alta` varchar(30) DEFAULT NULL,
  `para_fch_modi` date DEFAULT NULL,
  `para_usr_modi` varchar(30) DEFAULT NULL,
  `para_texto` text,
  PRIMARY KEY (`para_empre`,`para_clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros`
--

LOCK TABLES `parametros` WRITE;
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
INSERT INTO `parametros` VALUES (1,'DIA_LIMITE','DEFAULT',15,'','cantidad de dias para considerarlo deudor','S','2015-07-23','admin','0000-00-00','',NULL),(1,'INSTANCIA_VERSION','DEFAULT',0,'CAMARCO','Version del programa','S','2015-07-23','admin','0000-00-00','',NULL),(1,'LOG_BBDD_ACTIVO','DEFAULT',0,'NO','SI esta en SI guarda los llamados a la BD en USU_LOG_DB en opcion menu Incidentes','S','2016-10-10','admin',NULL,NULL,NULL),(1,'MAIL_RECUP_PWD_CUERPO','DEFAULT',0,'LEYENDA','Texto del mail que se envia, puede utiliz %USU% y %PWD% como variables para mostrar info','S','2016-10-10','admin',NULL,NULL,'  Sistema extranet campus: La password para el usuario %USU% es desde ahora  %PWD%  '),(1,'MAIL_RECUP_PWD_TITULO','DEFAULT',0,'LEYENDA','Asunto del mail','S','2016-10-10','admin',NULL,NULL,'Mensaje de extranet, contraseña nueva'),(1,'USUARIO_SIMULADO','DEFAULT',0,'1716112725','El admin puede simular la vista de un usuario alumno','S','2016-09-02','admin','0000-00-00','',NULL);
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;
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
