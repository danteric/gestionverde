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
-- Table structure for table `usu_menues_apli`
--

DROP TABLE IF EXISTS `usu_menues_apli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_menues_apli` (
  `usma_usap_apli` varchar(10) NOT NULL,
  `usma_item` varchar(50) NOT NULL,
  `usma_nivel1` varchar(50) NOT NULL,
  `usma_nivel2` varchar(50) DEFAULT NULL,
  `usma_des_item` varchar(50) DEFAULT NULL,
  `usma_enlace` varchar(200) DEFAULT NULL,
  `usma_habilitado` varchar(1) DEFAULT NULL,
  `usma_fch_alta` date DEFAULT NULL,
  `usma_usr_alta` varchar(50) DEFAULT NULL,
  `usma_fch_modi` date DEFAULT NULL,
  `usma_usr_modi` varchar(50) DEFAULT NULL,
  `usma_orden` smallint(6) DEFAULT NULL,
  `usma_icono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usma_usap_apli`,`usma_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_menues_apli`
--

LOCK TABLES `usu_menues_apli` WRITE;
/*!40000 ALTER TABLE `usu_menues_apli` DISABLE KEYS */;
INSERT INTO `usu_menues_apli` VALUES ('GAMSI','m_abmfichas','m_fichas','m_abmfichas','ABM Fichas','abmFichas/abmFichas','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_admin','m_admin',' ','Seguridad',NULL,'S','2017-05-01','admin',NULL,NULL,40,'icon-user'),('GAMSI','m_catalogos','m_tablas','m_catalogos','Cat&aacute;logos','catalogos/catalogos','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_consfichas','m_fichas','m_consfichas','Consulta Fichas','consultaFichas/consultaFichas','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_fases','m_tablas','m_fases','Fases','fases/fases','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_fichas','m_fichas',' ','Fichas','','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_medios','m_tablas','m_medios','Medios','medios/medios','S','2017-05-01','admin',NULL,NULL,40,'icon-user'),('GAMSI','m_proyectos','m_proyectos',' ','Proyectos','','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_proye_arma','m_proyectos','m_proye_arma','Armado de Proyecto','armaProyecto/armaProyecto','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_proye_baja','m_proyectos','m_proye_baja','Baja de Proyecto','bajaProyecto/bajaProyecto','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_proye_segui','m_proyectos','m_proye_segui','Segumiento de Proyecto','seguiProyecto/seguiProyecto','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_tablas','m_tablas',' ','Tablas','','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_tamanio','m_tablas','m_tamanio','Tama&ntilde;os','tamanios/tamanios','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_tipologia','m_tablas','m_tipologia','Tipologias','tipologias/tipologias','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_ulogaccesos','m_admin','m_ulogaccesos','Log de Usuarios','usuarios/logs','S','2017-05-01','admin',NULL,NULL,60,'icon-user'),('GAMSI','m_uroles','m_admin','m_uroles','Definir Roles','roles/roles','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_usuarios','m_admin','m_usuarios','Usuarios','usuarios/lista','S','2017-05-01','admin',NULL,NULL,30,'icon-user');
/*!40000 ALTER TABLE `usu_menues_apli` ENABLE KEYS */;
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
