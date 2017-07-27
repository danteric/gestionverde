-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
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
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo` (
  `cata_id` int(11) NOT NULL AUTO_INCREMENT,
  `cata_deno` varchar(50) NOT NULL,
  `cata_deno_redu` varchar(10) NOT NULL,
  `cata_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cata_alta_usu` varchar(50) NOT NULL,
  `cata_baja_f` date DEFAULT NULL,
  `cata_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cata_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` VALUES (1,'Prevención de la contaminación','Prev. Cont','2017-05-07 20:49:40','',NULL,NULL),(2,'Consumo eficiente de recursos','Cons. Efi','2017-05-07 20:49:40','',NULL,NULL),(3,'Preservación de actividades vecinas','Preserv. A','2017-05-07 20:49:40','',NULL,NULL),(11,'Minimización De emisiones','Min. De Em','2017-07-08 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fase`
--

LOCK TABLES `fase` WRITE;
/*!40000 ALTER TABLE `fase` DISABLE KEYS */;
INSERT INTO `fase` VALUES (1,'Documentación Inicial','Doc. I','2017-05-07 20:51:38','',NULL,NULL),(2,'Puesta en Marcha','Puest. Mar','2017-05-07 20:51:38','',NULL,NULL),(3,'Ejecución','Ejec.','2017-05-07 20:51:38','',NULL,NULL),(4,'Retiro de Obra','Retir. Obr','2017-05-07 20:51:38','',NULL,NULL);
/*!40000 ALTER TABLE `fase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha` (
  `fich_id` int(11) NOT NULL AUTO_INCREMENT,
  `fich_deno` varchar(50) NOT NULL,
  `fich_desc` text NOT NULL,
  `fich_cata_id` int(11) NOT NULL,
  `fich_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fich_alta_usu` varchar(50) NOT NULL,
  `fich_baja_f` date DEFAULT NULL,
  `fich_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fich_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` VALUES (48,'Controlar contaminación de las aguas superficiales','Evitar la contaminación de las agua superficiales y subterráneas por las actividades realizadas por equipamientos, maquinarias y personas.',1,'2017-07-08 03:00:00','admin',NULL,NULL),(49,'Disminuir transporte de madera','Utilizar madera local y reutilizar para reducir el consumo.',2,'2017-07-08 03:00:00','admin',NULL,NULL),(51,'Separar escombros para reutilizar','Acopiar los escombros de forma diferenciada para reutilizarlos como rellenos.',2,'2017-07-15 03:00:00','admin',NULL,NULL),(52,'Manipulación de sustancias químicas activas presen','Conocer que tipo de sustancias se manipulan, y si son peligrosas para la salud y el medioambiente para lograr un uso correcto de las mismas.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(53,'Separar hidrocarburos del agua','Lograr disponer de una red de agua no contaminada para ser reutilizada en otras tareas.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(54,'Proveer cestos para residuos reciclables','Incorporar al obrador cestos que diferencien los distintos tipos de residuos.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(55,'Controlar la contaminación del suelo','Evitar la contaminación del suelo, debido a las actividades del proyecto y la operación de la obra vial.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(56,'Gestión de Residuos','Organizar y planificar el proceso que se inicia con la generación de los residuos y que termina con su eliminación o disposición final.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(57,'Manejo de agua de lluvia','Diseñar el escurrimiento del agua de lluvia minimizando el arrastre de contaminantes y la inundación en obra, y permitiendo la recuperación del agua de lluvia.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(58,'Control de pérdidas de aceite y combustibles','Disponer de recursos para la gestión y contención de eventuales pérdidas de hidrocarburos, evitando que se transformen en contaminación.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(59,'Plan de iluminación eficiente','Implementar una gestión para la infraestructura de iluminación en obra, asignando recursos en función de necesidades de iluminación específicas y horarios de uso.',1,'2017-07-26 03:00:00','admin',NULL,NULL),(60,'Recolección de agua de lluvia','Utilizar el agua de lluvia para determinados consumos de agua en la obra.',2,'2017-07-26 03:00:00','admin',NULL,NULL),(61,'Separación de suelos','Diferenciar el suelo reutilizable para evitar el desperdicio del mismo.',2,'2017-07-26 03:00:00','admin',NULL,NULL),(62,'Manipular materiales durante el acopio','Sistema de manejo adecuado para el transporte, carga, descarga y manipulación de los materiales durante el acopio.',3,'2017-07-26 03:00:00','admin',NULL,NULL),(63,'Separar ambientes con generación de polvo','Diseñar distintos sectores en la obra permitiendo la separación entre ambientes donde se desarrollen tareas que generen polvo, y ambientes sensibles al mismo.',3,'2017-07-26 03:00:00','admin',NULL,NULL),(64,'Minimizar la generación de polvo','Implementar programas de riego, sobre todo en áreas de tránsito y de materiales almacenados.',3,'2017-07-26 03:00:00','admin',NULL,NULL),(65,'Reducir la generación de ruido','Identificar las fuentes de ruido de la obra, y gestionar recursos y actividades para moderar su emisión o su efecto.',3,'2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `ficha_fases` VALUES (48,2,'2017-07-08 03:00:00','admin',NULL,NULL),(48,3,'2017-07-08 03:00:00','admin',NULL,NULL),(49,1,'2017-07-08 03:00:00','admin',NULL,NULL),(49,2,'2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'2017-07-15 03:00:00','admin',NULL,NULL),(51,3,'2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'2017-07-26 03:00:00','admin',NULL,NULL),(52,3,'2017-07-26 03:00:00','admin',NULL,NULL),(53,2,'2017-07-26 03:00:00','admin',NULL,NULL),(53,3,'2017-07-26 03:00:00','admin',NULL,NULL),(53,4,'2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'2017-07-26 03:00:00','admin',NULL,NULL),(54,2,'2017-07-26 03:00:00','admin',NULL,NULL),(54,3,'2017-07-26 03:00:00','admin',NULL,NULL),(55,3,'2017-07-26 03:00:00','admin',NULL,NULL),(56,2,'2017-07-26 03:00:00','admin',NULL,NULL),(56,3,'2017-07-26 03:00:00','admin',NULL,NULL),(56,4,'2017-07-26 03:00:00','admin',NULL,NULL),(57,2,'2017-07-26 03:00:00','admin',NULL,NULL),(57,3,'2017-07-26 03:00:00','admin',NULL,NULL),(58,2,'2017-07-26 03:00:00','admin',NULL,NULL),(58,3,'2017-07-26 03:00:00','admin',NULL,NULL),(59,3,'2017-07-26 03:00:00','admin',NULL,NULL),(60,3,'2017-07-26 03:00:00','admin',NULL,NULL),(61,3,'2017-07-26 03:00:00','admin',NULL,NULL),(62,3,'2017-07-26 03:00:00','admin',NULL,NULL),(63,2,'2017-07-26 03:00:00','admin',NULL,NULL),(63,3,'2017-07-26 03:00:00','admin',NULL,NULL),(64,3,'2017-07-26 03:00:00','admin',NULL,NULL),(64,4,'2017-07-26 03:00:00','admin',NULL,NULL),(65,3,'2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_fases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_fuentes`
--

DROP TABLE IF EXISTS `ficha_fuentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_fuentes` (
  `fifu_fich_id` int(11) NOT NULL,
  `fifu_fuen_id` int(11) NOT NULL,
  `fifu_texto` text NOT NULL,
  `fifu_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fifu_alta_usu` varchar(50) NOT NULL,
  `fifu_baja_f` date DEFAULT NULL,
  `fifu_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fifu_fich_id`,`fifu_fuen_id`),
  CONSTRAINT `FK_ficha_fichafuente` FOREIGN KEY (`fifu_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_fuentes`
--

LOCK TABLES `ficha_fuentes` WRITE;
/*!40000 ALTER TABLE `ficha_fuentes` DISABLE KEYS */;
INSERT INTO `ficha_fuentes` VALUES (48,1,'Min. de Planificación Federal, Inv. Pública y Servicios; Secret. de Obras Públicas; Dirección Nac. de Vialidad. 0000. \"Manual de Evaluación y Gestión Ambiental de Obras Viales (MEGA II)\". (pag: 163)','2017-07-08 03:00:00','admin','2017-07-08','admin'),(48,2,'Min. de Planificación Federal, Inv. Pública y Servicios; Secret. de Obras Públicas; Dirección Nac. de Vialidad. 0000. \"Manual de Evaluación y Gestión Ambiental de Obras Viales (MEGA II)\". (pag: 163)','2017-07-08 03:00:00','admin',NULL,NULL),(49,1,'UOCRA; OPDS; Aulas y Andamios. 2009. \"guía de buenas practicas ambientales para obras en construcción\". (pag: 16)','2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 31)','2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'Los escombros resultantes de la construcción se acopiarán en un lugar diferenciado para ser reutilizados como relleno, o para ser dispuestos en forma segura. Bajo ningún concepto podrán mezclarse con tierra negra o con otros tipos de suelos.','2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'UOCRA; OPDS; Aulas y Andamios. 2009. \"guía de buenas practicas ambientales para obras en construcción\". (pag: 30)','2017-07-26 03:00:00','admin',NULL,NULL),(53,1,'Área Metropolitana del Valle de Aburrá; Secretaría del Medio Ambiente de Medellín; Empresas Públicas de Medellín. 2009. \"Manual de Gestión Socio-Ambiental para Obras de Construcción\". (pag: 65)','2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 48)','2017-07-26 03:00:00','admin',NULL,NULL),(55,1,'Min. de Planificación Federal, Inv. Pública y Servicios; Secret. de Obras Públicas; Dirección Nac. de Vialidad. 0000. \"Manual de Evaluación y Gestión Ambiental de Obras Viales (MEGA II)\". (pag: 169)','2017-07-26 03:00:00','admin',NULL,NULL),(56,1,'UOCRA; OPDS; Aulas y Andamios. 2009. \"guía de buenas practicas ambientales para obras en construcción\". (pag: 43)','2017-07-26 03:00:00','admin',NULL,NULL),(57,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 43)','2017-07-26 03:00:00','admin',NULL,NULL),(58,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 55)','2017-07-26 03:00:00','admin',NULL,NULL),(59,1,'UOCRA; OPDS; Aulas y Andamios. 2009. \"guía de buenas practicas ambientales para obras en construcción\". (pag: 40)','2017-07-26 03:00:00','admin',NULL,NULL),(60,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 45)','2017-07-26 03:00:00','admin',NULL,NULL),(61,1,'Municipalidad de Rosario; CIMPAR. . \"Buenas Practicas Ambientales en la construcción\". (pag: 17)','2017-07-26 03:00:00','admin',NULL,NULL),(62,1,'Área Metropolitana del Valle de Aburrá; Secretaría del Medio Ambiente de Medellín; Empresas Públicas de Medellín. 2009. \"Manual de Gestión Socio-Ambiental para Obras de Construcción\". (pag: 46)','2017-07-26 03:00:00','admin',NULL,NULL),(63,1,'Consejo Profesional de Arquitectura y Urbanismo. 2015. \"Sustentabilidad en Arquitectura3\". (pag: 59)','2017-07-26 03:00:00','admin',NULL,NULL),(64,1,'Área Metropolitana del Valle de Aburrá; Secretaría del Medio Ambiente de Medellín; Empresas Públicas de Medellín. 2009. \"Manual de Gestión Socio-Ambiental para Obras de Construcción\". (pag: 39)','2017-07-26 03:00:00','admin',NULL,NULL),(65,1,'Área Metropolitana del Valle de Aburrá; Secretaría del Medio Ambiente de Medellín; Empresas Públicas de Medellín. 2009. \"Manual de Gestión Socio-Ambiental para Obras de Construcción\". (pag: 45)','2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_fuentes` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `ficha_medios` VALUES (48,1,'2017-07-08 03:00:00','admin',NULL,NULL),(48,2,'2017-07-08 03:00:00','admin',NULL,NULL),(49,1,'2017-07-08 03:00:00','admin',NULL,NULL),(49,2,'2017-07-08 03:00:00','admin',NULL,NULL),(49,3,'2017-07-08 03:00:00','admin',NULL,NULL),(49,4,'2017-07-08 03:00:00','admin',NULL,NULL),(49,6,'2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'2017-07-26 03:00:00','admin',NULL,NULL),(52,2,'2017-07-26 03:00:00','admin',NULL,NULL),(52,3,'2017-07-26 03:00:00','admin',NULL,NULL),(52,4,'2017-07-26 03:00:00','admin',NULL,NULL),(52,6,'2017-07-26 03:00:00','admin',NULL,NULL),(53,1,'2017-07-26 03:00:00','admin',NULL,NULL),(53,2,'2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'2017-07-26 03:00:00','admin',NULL,NULL),(54,2,'2017-07-26 03:00:00','admin',NULL,NULL),(54,3,'2017-07-26 03:00:00','admin',NULL,NULL),(54,4,'2017-07-26 03:00:00','admin',NULL,NULL),(54,6,'2017-07-26 03:00:00','admin',NULL,NULL),(55,1,'2017-07-26 03:00:00','admin',NULL,NULL),(55,2,'2017-07-26 03:00:00','admin',NULL,NULL),(55,3,'2017-07-26 03:00:00','admin',NULL,NULL),(55,4,'2017-07-26 03:00:00','admin',NULL,NULL),(55,6,'2017-07-26 03:00:00','admin',NULL,NULL),(56,1,'2017-07-26 03:00:00','admin',NULL,NULL),(56,2,'2017-07-26 03:00:00','admin',NULL,NULL),(56,3,'2017-07-26 03:00:00','admin',NULL,NULL),(57,1,'2017-07-26 03:00:00','admin',NULL,NULL),(57,2,'2017-07-26 03:00:00','admin',NULL,NULL),(57,3,'2017-07-26 03:00:00','admin',NULL,NULL),(57,6,'2017-07-26 03:00:00','admin',NULL,NULL),(58,1,'2017-07-26 03:00:00','admin',NULL,NULL),(58,2,'2017-07-26 03:00:00','admin',NULL,NULL),(58,3,'2017-07-26 03:00:00','admin',NULL,NULL),(58,4,'2017-07-26 03:00:00','admin',NULL,NULL),(58,6,'2017-07-26 03:00:00','admin',NULL,NULL),(59,1,'2017-07-26 03:00:00','admin',NULL,NULL),(59,2,'2017-07-26 03:00:00','admin',NULL,NULL),(59,3,'2017-07-26 03:00:00','admin',NULL,NULL),(60,1,'2017-07-26 03:00:00','admin',NULL,NULL),(60,2,'2017-07-26 03:00:00','admin',NULL,NULL),(60,3,'2017-07-26 03:00:00','admin',NULL,NULL),(60,4,'2017-07-26 03:00:00','admin',NULL,NULL),(60,6,'2017-07-26 03:00:00','admin',NULL,NULL),(61,1,'2017-07-26 03:00:00','admin',NULL,NULL),(61,2,'2017-07-26 03:00:00','admin',NULL,NULL),(61,3,'2017-07-26 03:00:00','admin',NULL,NULL),(61,4,'2017-07-26 03:00:00','admin',NULL,NULL),(61,6,'2017-07-26 03:00:00','admin',NULL,NULL),(62,1,'2017-07-26 03:00:00','admin',NULL,NULL),(62,2,'2017-07-26 03:00:00','admin',NULL,NULL),(63,1,'2017-07-26 03:00:00','admin',NULL,NULL),(63,2,'2017-07-26 03:00:00','admin',NULL,NULL),(63,3,'2017-07-26 03:00:00','admin',NULL,NULL),(63,4,'2017-07-26 03:00:00','admin',NULL,NULL),(63,6,'2017-07-26 03:00:00','admin',NULL,NULL),(64,1,'2017-07-26 03:00:00','admin',NULL,NULL),(64,2,'2017-07-26 03:00:00','admin',NULL,NULL),(65,1,'2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_medios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_procedimientos`
--

DROP TABLE IF EXISTS `ficha_procedimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_procedimientos` (
  `fipr_fich_id` int(11) NOT NULL,
  `fipr_proce_id` int(11) NOT NULL,
  `fipr_texto` text NOT NULL,
  `fipr_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fipr_alta_usu` varchar(50) NOT NULL,
  `fipr_baja_f` date DEFAULT NULL,
  `fipr_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fipr_fich_id`,`fipr_proce_id`),
  CONSTRAINT `FK_ficha_fichaprocedimientos` FOREIGN KEY (`fipr_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_procedimientos`
--

LOCK TABLES `ficha_procedimientos` WRITE;
/*!40000 ALTER TABLE `ficha_procedimientos` DISABLE KEYS */;
INSERT INTO `ficha_procedimientos` VALUES (48,1,'Conocer las condiciones de calidad de recursos y cuerpos de agua previo a la realización de la obra.','2017-07-08 03:00:00','admin',NULL,NULL),(48,2,'Gestionar adecuadamente los procesos constructivos y operativos de todas la actividades realizadas por equipamientos, maquinarias y personas afectdas a la construcción/operación de la obra que pueda producir contaminación en los recursos hídricos.','2017-07-08 03:00:00','admin',NULL,NULL),(48,3,'En las etapas relacionadas con: movimiento de tierras, explotación de canteras y yacimientos, lavado de áridos, depósito de materiales, funcionamiento y mantenimiento de las plantas asfálticas, plantas de materiales, maquinarias y equipos.','2017-07-08 03:00:00','admin',NULL,NULL),(48,4,'Control de la disposición de residuos sólidos, líquidos y gaseosos, potencialmente contaminantes.','2017-07-08 03:00:00','admin',NULL,NULL),(49,1,'Durante la cotización y evaluación de proveedores de madera, se debe solicitar información de origen del material a proveer.\r\nSon datos relevantes a solicitar:\r\n• El sitio de extracción.\r\n• La distancia transportada\r\n• El tipo de bosque (nativo o forestado)\r\n• Si tiene o no origen certificado.','2017-07-08 03:00:00','admin',NULL,NULL),(49,2,'Al evaluar ofertas, considerar estas variables, además de las usadas habitualmente (calidad, plazo, costo, forma de pago, etc.).','2017-07-08 03:00:00','admin',NULL,NULL),(49,3,'Los certificados FSC pueden garantizar las declaraciones del proveedor, pero aún sin estos certificados existen proveedores con características muy diferentes.','2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'Planificar tareas de demolición para permitir la acumulación diferenciada de desechos según su tipo','2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'Diferenciar desechos: inertes, recuperables, reciclable, degradables, y peligrosos.','2017-07-15 03:00:00','admin',NULL,NULL),(51,3,'Realizar tareas de desmonte previo de elementos recuperables, reciclables, etc.','2017-07-15 03:00:00','admin',NULL,NULL),(51,4,'Disponer sectores diferenciados para los distintos tipos de desechos.','2017-07-15 03:00:00','admin',NULL,NULL),(51,5,'Prever modos de reutilización de los desechos, planificando su acopio de manera acorde.','2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'Conocer los símbolos de peligrosidad y toxicidad internacionales.','2017-07-26 03:00:00','admin',NULL,NULL),(52,2,'Solicitar la hoja técnica de Seguridad de los materiales que se manipulan para conocer sus efectos en la salud.','2017-07-26 03:00:00','admin',NULL,NULL),(52,3,'Comprobar el etiquetado de las sustancias desde que ingresan a la obra, identificarlas siempre incluso si son trasvasadas a envases que no tengan instrucciones claras de manejo.','2017-07-26 03:00:00','admin',NULL,NULL),(52,4,'Asegurarse que las latas de pinturas y disolventes hayan quedado cerradas correctamente, en especial al final de la jornada de trabajo.','2017-07-26 03:00:00','admin',NULL,NULL),(52,5,'Contar con un plan de contingencia anti-derrames, para saber actuar frente a un eventual vertido de sustancias peligrosas.','2017-07-26 03:00:00','admin',NULL,NULL),(52,6,'Utilizar pinturas de tecnología base agua, que contienen sólo pequeñas partes de disolvente orgánico, en lugar de pinturas con disolvente','2017-07-26 03:00:00','admin',NULL,NULL),(52,7,'Sustituir sustancias químicas utilizadas para desengrasar metales y piezas por una solución de detergente sin fosfato y de aclarado, disparado en forma de spray sobre las piezas.','2017-07-26 03:00:00','admin',NULL,NULL),(53,1,'Colocar trampas de grasas en las zonas de cambio de combustibles y aceites.\r\nEn dichos separadores, las aguas entran primero, y seguidamente se pasa a producir la decantación entre los sólidos más pesados, los cuales vendrán depositados en la parte inferior del depósito. A la misma vez, se producirá la separación de las grasas de origen animal, así como también la separación de los jabones o detergentes, siguiendo la diferencia de pesos específicos, lo que producirá que las grasas queden depositadas en la parte superior del depósito.\r\nEn estos aparatos hay un tubo de salida para el agua que se encuentra situado en la parte media del aparato para evitar que se puedan verter sólidos pesados que se encontraran en la parte inferior, y por lo tanto no existirá el peligro de que salgan por dicho tubo. Sucede lo mismo en el caso de las grasas y los detergentes, que al situarse en la parte super','2017-07-26 03:00:00','admin',NULL,NULL),(53,2,'Realizar el lavado de llantas de los vehículos, equipos y herramientas sobre piso duro, permitiendo la recolección y conducción de las aguas hacia una estructura que funcione como separador, antes de disponerlas a la red de recolección de agua.','2017-07-26 03:00:00','admin',NULL,NULL),(53,3,'Evitar lavar en el sitio de obra los mezcladores de cemento, transporte de sustancias peligrosas ni vehículos particulares o del personal de obra.','2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'Analizar las necesidades de la obra para la gestión de residuos (volúmenes generados, medios de acarreo interno, medios de retiro, puntos de generación, etc).\r\nIncorporar cestos diferenciados por color u otra simbología que se pueda aplicar de manera uniforme a toda la obra.','2017-07-26 03:00:00','admin',NULL,NULL),(54,2,'Analizar en un plano de obrador o layout con frentes de trabajo, cuáles son los puntos de generación de residuos para localizar cestos acordes a los volúmenes de generación y los tipos de residuos generados.','2017-07-26 03:00:00','admin',NULL,NULL),(54,3,'De este modo separar:\r\n• Material orgánico.\r\n• Material reciclable dentro del predio (subproductos).\r\n• Material reciclable por terceros.\r\n• Materiales peligrosos (contaminantes, tóxicos, explosivos, otros).','2017-07-26 03:00:00','admin',NULL,NULL),(55,1,'Presentar medidas dirigidas a la prevención y al control de la contaminación y afectación del suelo.','2017-07-26 03:00:00','admin',NULL,NULL),(55,2,'Previo al cierre de las instalaciones y sitios de obra, se recomienda al Contratista realizar un nuevo Informa sobre la condición de los suelos como resultante de la construcción de la obra y en los casos necesarios, señalar los métodos de remediación de las afectaciones producidas y los resultados esperados a mediano plazo para la restauración de los suelos.','2017-07-26 03:00:00','admin',NULL,NULL),(55,3,'Tener en cuenta las siguientes leyes:\r\n- Ley de Residuos Peligrosos (24.051/992)\r\n- Ley de Fomento y Conservación de los Suelos, la cual promueve la recuperación de la capacidad productiva de los suelos, y su Decreto Reglamentario 681/81.','2017-07-26 03:00:00','admin',NULL,NULL),(55,4,'En caso de estar localizada la obra en una Eco-Región, donde la desertificación de los suelos sea un problema significativo, se recomienda trabajar con los actuales requerimientos implementados por la Secretaría de Medio Ambiente y Desarrollo Sustentable de la Nación.','2017-07-26 03:00:00','admin',NULL,NULL),(56,1,'Identificar elementos o materiales sobrantes en la obra.','2017-07-26 03:00:00','admin',NULL,NULL),(56,2,'Recolectar y acopiar.\r\nEn caso de poder acopiarse los residuos, clasificarlos y separarlos en la obra para poder ser utilizados para rellenos, etc.','2017-07-26 03:00:00','admin',NULL,NULL),(56,3,'Gestionar los medios para que los residuos clasificados sean tratados, reciclados o vayan a disposición final.','2017-07-26 03:00:00','admin',NULL,NULL),(56,4,'Un criterio posible es:\r\n• Separar los residuos en:\r\n- Inorgánicos (papel, cartón, vidrio, envases de productos no tóxicos, herramientas viejas)\r\n- Orgánicos (restos de alimentos, cáscaras de frutas, yerba)\r\n- Especiales (trapos con aceite)\r\n- Patogénicos (con riesgo biológico)\r\n- Demolición y Construcción (escombros, chatarra)\r\n- Radioactivos (líquidos y gases residuales contaminados)','2017-07-26 03:00:00','admin',NULL,NULL),(56,5,'Utilizar contenedores resistentes de acuerdo a los materiales que se depositan en cada uno de ellos, cuidando que su estructura no sea afectada por el residuo, y etiquetarlos de manera correcta.','2017-07-26 03:00:00','admin',NULL,NULL),(56,6,'Contactar organizaciones de reciclaje urbano gubernamentales o no gubernamentales.','2017-07-26 03:00:00','admin',NULL,NULL),(56,7,'Contratar gestores de residuos autorizados para el transporte, tratamiento y disposición final de cada corriente de residuos. Exigir el manifiesto de transporte, el certificado de tratamiento y de disposición final de los residuos.','2017-07-26 03:00:00','admin',NULL,NULL),(57,1,'Garantizar la preservación de niveles enterrados mediante la polderización de los mismos. Esto se logra elevando el sector perimetral a las excavaciones de forma continua. La altura de elevación debe ser mayor a la altura por la cual el agua de lluvia sale del terreno.','2017-07-26 03:00:00','admin',NULL,NULL),(57,2,'Garantizar que el agua de lluvia no entre en contacto con contenedores de hidrocarburos o maquinaria que pudiera estar sucia con hidrocarburos. Para esto, prever áreas de guardado propicias.','2017-07-26 03:00:00','admin',NULL,NULL),(57,3,'Evitar la canalización por taludes sin cobertura vegetal.','2017-07-26 03:00:00','admin',NULL,NULL),(57,4,'Si el caudal fuera suficiente, incorporar trampas de filtrado con piedra partida y eventualmente arena gruesa.','2017-07-26 03:00:00','admin',NULL,NULL),(57,5,'Conducir parte del agua de lluvia a depósitos para su posterior utilización.','2017-07-26 03:00:00','admin',NULL,NULL),(57,6,'Cubrir materiales que puedan aportar contaminantes o material particulado al agua de lluvia.','2017-07-26 03:00:00','admin',NULL,NULL),(57,7,'Incorporar planes de contingencia ante lluvias inesperadas.','2017-07-26 03:00:00','admin',NULL,NULL),(58,1,'Identificar maquinarias, equipos, vehículos, y procedimientos de carga de combustible y cambio de aceite en obra que puedan producir derrames.','2017-07-26 03:00:00','admin',NULL,NULL),(58,2,'Incorporar zonas de contención, preferentemente resguardadas de la lluvia a tales fines.','2017-07-26 03:00:00','admin',NULL,NULL),(58,3,'Disponer de medios de extracción ante eventuales derrames.','2017-07-26 03:00:00','admin',NULL,NULL),(58,4,'Implementar controles periódicos de acumulación de derrames y eventual extracción.','2017-07-26 03:00:00','admin',NULL,NULL),(58,5,'Implementar sistemas de capacitación y control.','2017-07-26 03:00:00','admin',NULL,NULL),(58,6,'Incorporar esta práctica para equipos permanentes y para equipos temporales de la obra.','2017-07-26 03:00:00','admin',NULL,NULL),(59,1,'Diseñar un Plan de Gestión que permita una iluminación eficiente durante la obra.','2017-07-26 03:00:00','admin',NULL,NULL),(59,2,'Diferenciar el tipo de iluminación a utilizar según distintos sectores, empleando preferentemente para frentes de trabajo puntuales artefactos de sodio alta presión, montados sobre trípodes, con interruptores accesibles para fácil apagado en momentos improductivos. Una lámpara de sodio alta presión de 70 W cubre hasta 15 m2 de superficie de trabajo, garantizando 400 lux de iluminación.','2017-07-26 03:00:00','admin',NULL,NULL),(59,3,'En el sector de circulaciones de la obra, iluminación constante durante la jornada de trabajo: Utilizar lámparas de sodio alta presión o tubos fluorescentes, empleando uno cada 5m para proveer la iluminación mínima.','2017-07-26 03:00:00','admin',NULL,NULL),(59,4,'Capacitar a los operarios para iluminar los frentes de trabajo activos (entre 200 y 500 lux dependiendo del trabajo), los sectores de circulaciones, acopio y obrador a 50 lux aprox. y acerca de cómo reponer lámparas y gestionar los residuos generados','2017-07-26 03:00:00','admin',NULL,NULL),(59,5,'Garantizar en todos los casos un tendido eléctrico aéreo por encima de los dos metros de altura, con cable tipo Taller o Subterráneo (Sintenax) (o en todo caso de doble vaina).\r\nDisponer de repuestos para los distintos artefactos que se utilicen.','2017-07-26 03:00:00','admin',NULL,NULL),(60,1,'Incluir en el diseño del Obrador un sistema que permita recolectar el agua de lluvia y la almacene en tanques de reserva exclusivos.','2017-07-26 03:00:00','admin',NULL,NULL),(60,2,'Conducir el agua de las superficies impermeables, como losas, hacia el lugar deseado, por ejemplo, construyendo un borde para que el agua se desvíe toda hacia el mismo lado.','2017-07-26 03:00:00','admin',NULL,NULL),(60,3,'Realizar una conexión entre los tanques de recolección y las bombas de depresión de napas para no desperdiciar el agua recogida.','2017-07-26 03:00:00','admin',NULL,NULL),(60,4,'Tener en cuenta la conexión de los tanques a los sanitarios para utilizar el agua recolectada.','2017-07-26 03:00:00','admin',NULL,NULL),(60,5,'El agua recolectada en los tanques se puede reutilizar tanto como para uso sanitario, limpieza de herramientas en la obra, riego de determinadas superficies, etc.','2017-07-26 03:00:00','admin',NULL,NULL),(60,6,'Capacitar a los operarios para realizar el mantenimiento de los tanques.','2017-07-26 03:00:00','admin',NULL,NULL),(60,7,'Capacitar al personal de la obra para que no se vuelque ningún otro líquido sobre las rejillas pluviales, y para no consumir este agua de los grifos del sistema.','2017-07-26 03:00:00','admin',NULL,NULL),(60,8,'Esta BPA se puede combinar con la BPA recuperación de agua proveniente de la depresión de napas.','2017-07-26 03:00:00','admin',NULL,NULL),(61,1,'Separar el suelo orgánico del no orgánico.','2017-07-26 03:00:00','admin',NULL,NULL),(61,2,'Almacenar el suelo orgánico removido, para poder utilizarlo para el paisajismo final. Es recomendable cubrirlo con plástico o preferiblemente con los restos del material vegetal que haya sido retirado, para evitar su contaminación y la pérdida o alteración de sus características físicas y químicas.','2017-07-26 03:00:00','admin',NULL,NULL),(61,3,'Verificar la calidad de la tierra para determinar si es apta para su aprovechamiento en la misma obra o en otras obras cercanas.','2017-07-26 03:00:00','admin',NULL,NULL),(61,4,'Evitar esparcir residuos sobre el suelo y así minimizar la posibilidad de contaminación de las capas de agua, así como también evitar verter líquidos tales como aceites, pinturas, solventes, etc. en el suelo.','2017-07-26 03:00:00','admin',NULL,NULL),(61,5,'Los residuos vegetales blandos pueden almacenarse para integrarse posteriormente al suelo orgánico.','2017-07-26 03:00:00','admin',NULL,NULL),(61,6,'Capacitar a los operarios para realizar la clasificación de la tierra durante la fase de Movimiento de suelos.','2017-07-26 03:00:00','admin',NULL,NULL),(62,1,'Definir los parámetros de cómo efectuar la carga y descarga de materiales de manera adecuada, garantizando la seguridad de los operarios, y la menor obstrucción posible en la vía pública, evitando que se realice en doble fila o en lugares donde el estacionamiento se encuentra prohibido por razones de seguridad vial, circulación, y seguridad para los transeúntes','2017-07-26 03:00:00','admin',NULL,NULL),(62,2,'Incluir, dentro de la programación de obra, el cálculo de cantidades según la demanda del proyecto, evitando consumos y almacenamientos innecesarios, volcando los resultados en un plano de Obrador o Layout, con datos de superficies destinadas al acopio.','2017-07-26 03:00:00','admin',NULL,NULL),(62,3,'Establecer un único horario para el cargue y descargue de materiales.','2017-07-26 03:00:00','admin',NULL,NULL),(62,4,'Identificar requisitos para el acopio de cada tipo de material:\r\nEjemplos:\r\n• Combustibles: cuarto ventilado, con batea de contención de derrames y métodos de extinción.\r\n• Otros fluidos contaminantes no explosivos, como pinturas: depósito con batea de contención.\r\n• Materiales que se deterioran.\r\n• Materiales que pueden deteriorase con la luz solar, como caños de agua y gas de polipropileno: cubierto de la radiación solar directa.\r\n• Materiales sensibles a la humedad, como aglomerantes, cemento, cal: protegidos de la intemperie, lluvia y el escurrimiento pluvial de la obra, separados 10 cm del piso.','2017-07-26 03:00:00','admin',NULL,NULL),(63,1,'Definir sectores destinados a realizar las tareas que generan polvo, sobre todo las de carpintería y corte de cerámicos, pero también aquellas que emitan compuestos al ambiente.','2017-07-26 03:00:00','admin',NULL,NULL),(63,2,'Delimitar estos espacios con cortinas de film de polietileno, o membranas similares.','2017-07-26 03:00:00','admin',NULL,NULL),(63,3,'Generar ventilación cruzada en el ambiente que permita la renovación de aire, extrayendo las partículas fuera de las áreas de trabajo y lejos de otros usos sensibles.','2017-07-26 03:00:00','admin',NULL,NULL),(63,4,'Proveer de equipos y elementos de protección personal acordes a los trabajadores presentes en estos espacios.','2017-07-26 03:00:00','admin',NULL,NULL),(64,1,'Realizar una evaluación de las fuentes de emisión de polvo, así también de las condiciones meteorológicas del entorno, que van a determinar el comportamiento y difusión del polvo en la atmósfera.','2017-07-26 03:00:00','admin',NULL,NULL),(64,2,'Para el tránsito de vehículos (camiones, equipo pesado y vehículos de servicio) se recomienda también efectuar un control de la velocidad con adecuada señalización, así como cubrir la caja de los camiones de transporte de tierras y arenas con una malla adecuada, y realizar un lavado de llantas con el fin de disminuir la propagación del polvo.','2017-07-26 03:00:00','admin',NULL,NULL),(64,3,'Implementar un programa de riego, preferentemente con agua recolectada de lluvia, el cual deberá considerar las áreas a regar, requerimientos de agua, fuentes de captación, equipo necesario, ruteo y frecuencia de aplicación.','2017-07-26 03:00:00','admin',NULL,NULL),(64,4,'Sobre vías no pavimentadas, efectuar el programa de riego, y sobre vías pavimentadas, elaborar un programa de barrido regular, ya que el material particulado provocado por el tránsito es muy alto. Esta práctica debe evitarse en medios sensibles al consumo de agua o grandes extensiones de circulación.','2017-07-26 03:00:00','admin',NULL,NULL),(64,5,'Capacitar a los operarios para realizar el riego periódico de las superficies.','2017-07-26 03:00:00','admin',NULL,NULL),(65,1,'Evitar los \"ruidos molestos\", los daños acústicos y las vibraciones provocadas por la obra. Se recomienda establecer horarios fijos de lunes a sábado para poder realizar dichas obras, evitando los domingos y feriados; como así también dando aviso a los vecinos de la realización de las obras.','2017-07-26 03:00:00','admin',NULL,NULL),(65,2,'En el caso de que los problemas persistan, se considera útil llegar a un acuerdo con los vecinos para establecer horarios para realizar las actividades ruidosas de la obra.','2017-07-26 03:00:00','admin',NULL,NULL),(65,3,'Identificar las tareas y actividades con ruido, definiendo un nivel máximo de 80 dBA. En primera instancia, proponer medidas de eliminación o mitigación de la fuente, y en caso de no ser posible, proceder a la protección auditiva del trabajador.','2017-07-26 03:00:00','admin',NULL,NULL),(65,4,'Utilizar los equipos más ruidosos por períodos cortos de tiempo y sólo en jornada diurna','2017-07-26 03:00:00','admin',NULL,NULL),(65,5,'Evitar equipos ruidosos cuando la obra sea lindera a un edificio con Uso Sensible, como hospitales o escuelas. En caso de ser imposible, intercalar ciclos cortos de trabajo con descansos silenciosos.','2017-07-26 03:00:00','admin',NULL,NULL),(65,6,'Establecer únicos horarios para carga y descarga de materiales.','2017-07-26 03:00:00','admin',NULL,NULL),(65,7,'Verificar el estado técnico de los equipos utilizados para evitar que un ocasional mal funcionamiento genere ruidos indeseados.','2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_procedimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_recursos`
--

DROP TABLE IF EXISTS `ficha_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_recursos` (
  `fire_fich_id` int(11) NOT NULL,
  `fire_recurso_id` int(11) NOT NULL,
  `fire_texto` text NOT NULL,
  `fire_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fire_alta_usu` varchar(50) NOT NULL,
  `fire_baja_f` date DEFAULT NULL,
  `fire_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fire_fich_id`,`fire_recurso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_recursos`
--

LOCK TABLES `ficha_recursos` WRITE;
/*!40000 ALTER TABLE `ficha_recursos` DISABLE KEYS */;
INSERT INTO `ficha_recursos` VALUES (48,1,'asd','2017-07-08 03:00:00','admin','2017-07-08','admin'),(49,1,'- Personal técnico de compras o personal administrativo: 20 hs (para entre 5 y 10 proveedores)','2017-07-08 03:00:00','admin',NULL,NULL),(49,2,'- Sobrecosto por insumo sostenible: variable (+10%)','2017-07-08 03:00:00','admin',NULL,NULL),(49,3,'Planificar la compra de madera evaluando diferentes proveedores según el origen de su producto.','2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'Planificación\r\nJefe de Obra: 10 hs mensuales de trabajo.','2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'Obrador: Incremento en 20% de la superficie de acopio.','2017-07-15 03:00:00','admin',NULL,NULL),(51,3,'Ejecución:\r\nIncremento en 15% de las tareas de movimiento de desechos dentro de la obra.','2017-07-15 03:00:00','admin',NULL,NULL),(51,4,'La separación de los resultados de la demolición exige tanto tareas de planificación como capacitación y ejecución supervisada.','2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'Jefe de Obra: 2 horas mensuales para planificacion.','2017-07-26 03:00:00','admin',NULL,NULL),(52,2,'Materiales: Pinturas - incremento del 20% por sustitución de pinturas o similares.','2017-07-26 03:00:00','admin',NULL,NULL),(53,1,'- Para llevar a cabo esta práctica, se debe disponer de al menos un separador de grasas.','2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'Jefe de obra: 1 hora mensual adicional destinada a la Planificación de obrador.','2017-07-26 03:00:00','admin',NULL,NULL),(54,2,'Ayudante: incremento de tareas de mantenimiento de cestos y gestión. de residuos de 20%.','2017-07-26 03:00:00','admin',NULL,NULL),(54,3,'Materiales: incremento del costo de cestos un 60%.','2017-07-26 03:00:00','admin',NULL,NULL),(56,1,'Contenedores: incremente un 50% el costo de contenedores respecto de fabricación in situ con madera.','2017-07-26 03:00:00','admin',NULL,NULL),(56,2,'Capacitación: incluida en las actividades de SeH.\r\nGestión Externa: 20hs mensuales de mando medio para la coordinación con organizaciones externas (recolector, reciclador, etc).','2017-07-26 03:00:00','admin',NULL,NULL),(57,1,'Planificación:\r\n- Jefe de obra: 5 a 20 hs mensuales (según los objetivos definidos).','2017-07-26 03:00:00','admin',NULL,NULL),(57,2,'Implementación:\r\n- Mano de obra: 20 a 80 hs mensuales (según los objetivos definidos).','2017-07-26 03:00:00','admin',NULL,NULL),(57,3,'- Recursos materiales: film de polietileno, arena, piedra partida, tierra.','2017-07-26 03:00:00','admin',NULL,NULL),(58,1,'Implementación:\r\n- Ejecución de superficie de hormigón con cordón de contención (acorde al tamaño de los equipos).\r\n- Materiales absorbentes de hidrocarburos.\r\n- Servicio de tratamiento de residuos.','2017-07-26 03:00:00','admin',NULL,NULL),(58,2,'Capacitación\r\n- Se puede incluir en capacitación de SeH.','2017-07-26 03:00:00','admin',NULL,NULL),(59,1,'Para la estimación de costos, se puede considerar que un artefacto para lámparas de sodio alta presión equivale en costo a dos artefactos para 2 tubos fluorescentes 36 W cada uno, teniendo los primeros las ventajas de:\r\n- Tener una mayor vida útil (8000 a 12000 horas).\r\n- Ser artefactos más fáciles de manipular, direccionando la luz hacia donde sea necesario','2017-07-26 03:00:00','admin',NULL,NULL),(60,1,'Instalación (para 40 m2 de superficie colectada):\r\n- Tanque de agua reutilizable y/o recuperado 500 a 1000 l.\r\n- 30 m de cañería de distribución.\r\n- 2 canillas de servicio.\r\n- 2 letreros indicadores de uso.\r\n- 2 jornales de instalación.\r\nCapacitación de uso\r\n- Incluible en capacitación de SeH.','2017-07-26 03:00:00','admin',NULL,NULL),(61,1,'Disponer un sector de la obra para el acopio del suelo posible de reutilizar.','2017-07-26 03:00:00','admin',NULL,NULL),(61,2,'La reutilización del suelo supondría un beneficio para la obra ya que evita futuros gastos de compra de tierra.','2017-07-26 03:00:00','admin',NULL,NULL),(62,1,'Jefe de obra: variable (4 horas mensuales por mes por cada 20m² de superficie de acopio).','2017-07-26 03:00:00','admin',NULL,NULL),(62,2,'Oficial: variable (2 jornales por semana por cada 20m² de superficie de acopio).','2017-07-26 03:00:00','admin',NULL,NULL),(62,3,'Materiales: variable (sin valores de referencia).','2017-07-26 03:00:00','admin',NULL,NULL),(63,1,'Considerar el gasto por la compra de materiales para separar los ambientes (plásticos, etc).','2017-07-26 03:00:00','admin',NULL,NULL),(64,1,'Demolición:\r\nAyudantes: incremento del 5% para la humectación.\r\n10 litros de agua por cada m³ a demoler. Preferentemente agua recuperadas de lluvia o depresión de napas.','2017-07-26 03:00:00','admin',NULL,NULL),(64,2,'Circulación:\r\n5 litros por m² por días (promedio entre días húmedos y secos. Varía según regíon).','2017-07-26 03:00:00','admin',NULL,NULL),(65,1,'Jefe de Obra: 4 horas mensuales para la planificación de tareas.','2017-07-26 03:00:00','admin',NULL,NULL),(65,2,'Ayudantes y operarios: incremento de 5% sobre las tareas destinadas a acopio y organización de obrador.','2017-07-26 03:00:00','admin',NULL,NULL),(65,3,'Alquiler de equipos: incremento en los tiempos del alquiler.','2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_tamanio`
--

DROP TABLE IF EXISTS `ficha_tamanio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_tamanio` (
  `fita_fich_id` int(11) NOT NULL,
  `fita_tama_id` int(11) NOT NULL,
  `fita_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fita_alta_usu` varchar(50) NOT NULL,
  `fita_baja_f` date DEFAULT NULL,
  `fita_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fita_fich_id`,`fita_tama_id`),
  CONSTRAINT `FK_ficha_fichatamanio` FOREIGN KEY (`fita_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_tamanio`
--

LOCK TABLES `ficha_tamanio` WRITE;
/*!40000 ALTER TABLE `ficha_tamanio` DISABLE KEYS */;
INSERT INTO `ficha_tamanio` VALUES (48,26,'2017-07-08 03:00:00','admin',NULL,NULL),(48,27,'2017-07-08 03:00:00','admin',NULL,NULL),(48,28,'2017-07-08 03:00:00','admin',NULL,NULL),(49,27,'2017-07-08 03:00:00','admin',NULL,NULL),(49,28,'2017-07-08 03:00:00','admin',NULL,NULL),(51,27,'2017-07-15 03:00:00','admin',NULL,NULL),(51,28,'2017-07-15 03:00:00','admin',NULL,NULL),(52,26,'2017-07-26 03:00:00','admin',NULL,NULL),(52,27,'2017-07-26 03:00:00','admin',NULL,NULL),(52,28,'2017-07-26 03:00:00','admin',NULL,NULL),(53,27,'2017-07-26 03:00:00','admin',NULL,NULL),(53,28,'2017-07-26 03:00:00','admin',NULL,NULL),(54,27,'2017-07-26 03:00:00','admin',NULL,NULL),(54,28,'2017-07-26 03:00:00','admin',NULL,NULL),(55,27,'2017-07-26 03:00:00','admin',NULL,NULL),(55,28,'2017-07-26 03:00:00','admin',NULL,NULL),(56,27,'2017-07-26 03:00:00','admin',NULL,NULL),(56,28,'2017-07-26 03:00:00','admin',NULL,NULL),(57,27,'2017-07-26 03:00:00','admin',NULL,NULL),(57,28,'2017-07-26 03:00:00','admin',NULL,NULL),(58,27,'2017-07-26 03:00:00','admin',NULL,NULL),(58,28,'2017-07-26 03:00:00','admin',NULL,NULL),(59,26,'2017-07-26 03:00:00','admin',NULL,NULL),(59,27,'2017-07-26 03:00:00','admin',NULL,NULL),(59,28,'2017-07-26 03:00:00','admin',NULL,NULL),(60,27,'2017-07-26 03:00:00','admin',NULL,NULL),(60,28,'2017-07-26 03:00:00','admin',NULL,NULL),(61,27,'2017-07-26 03:00:00','admin',NULL,NULL),(61,28,'2017-07-26 03:00:00','admin',NULL,NULL),(62,27,'2017-07-26 03:00:00','admin',NULL,NULL),(62,28,'2017-07-26 03:00:00','admin',NULL,NULL),(63,27,'2017-07-26 03:00:00','admin',NULL,NULL),(63,28,'2017-07-26 03:00:00','admin',NULL,NULL),(64,27,'2017-07-26 03:00:00','admin',NULL,NULL),(64,28,'2017-07-26 03:00:00','admin',NULL,NULL),(65,27,'2017-07-26 03:00:00','admin',NULL,NULL),(65,28,'2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_tamanio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_tipologias`
--

DROP TABLE IF EXISTS `ficha_tipologias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_tipologias` (
  `fiti_fich_id` int(11) NOT NULL,
  `fiti_tipo_id` int(11) NOT NULL,
  `fiti_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fiti_alta_usu` varchar(50) NOT NULL,
  `fiti_baja_f` date DEFAULT NULL,
  `fiti_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fiti_fich_id`,`fiti_tipo_id`),
  CONSTRAINT `FK_ficha_fichatipologia` FOREIGN KEY (`fiti_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_tipologias`
--

LOCK TABLES `ficha_tipologias` WRITE;
/*!40000 ALTER TABLE `ficha_tipologias` DISABLE KEYS */;
INSERT INTO `ficha_tipologias` VALUES (48,7,'2017-07-08 03:00:00','admin',NULL,NULL),(48,8,'2017-07-08 03:00:00','admin',NULL,NULL),(49,1,'2017-07-08 03:00:00','admin',NULL,NULL),(49,3,'2017-07-08 03:00:00','admin',NULL,NULL),(49,4,'2017-07-08 03:00:00','admin',NULL,NULL),(49,5,'2017-07-08 03:00:00','admin',NULL,NULL),(51,1,'2017-07-15 03:00:00','admin',NULL,NULL),(51,2,'2017-07-15 03:00:00','admin',NULL,NULL),(51,3,'2017-07-15 03:00:00','admin',NULL,NULL),(51,4,'2017-07-15 03:00:00','admin',NULL,NULL),(52,1,'2017-07-26 03:00:00','admin',NULL,NULL),(52,2,'2017-07-26 03:00:00','admin',NULL,NULL),(52,3,'2017-07-26 03:00:00','admin',NULL,NULL),(52,4,'2017-07-26 03:00:00','admin',NULL,NULL),(52,5,'2017-07-26 03:00:00','admin',NULL,NULL),(52,6,'2017-07-26 03:00:00','admin',NULL,NULL),(52,7,'2017-07-26 03:00:00','admin',NULL,NULL),(52,8,'2017-07-26 03:00:00','admin',NULL,NULL),(53,2,'2017-07-26 03:00:00','admin',NULL,NULL),(53,3,'2017-07-26 03:00:00','admin',NULL,NULL),(53,4,'2017-07-26 03:00:00','admin',NULL,NULL),(54,1,'2017-07-26 03:00:00','admin',NULL,NULL),(54,2,'2017-07-26 03:00:00','admin',NULL,NULL),(54,3,'2017-07-26 03:00:00','admin',NULL,NULL),(54,4,'2017-07-26 03:00:00','admin',NULL,NULL),(54,5,'2017-07-26 03:00:00','admin',NULL,NULL),(54,6,'2017-07-26 03:00:00','admin',NULL,NULL),(55,7,'2017-07-26 03:00:00','admin',NULL,NULL),(55,8,'2017-07-26 03:00:00','admin',NULL,NULL),(56,1,'2017-07-26 03:00:00','admin',NULL,NULL),(56,2,'2017-07-26 03:00:00','admin',NULL,NULL),(56,3,'2017-07-26 03:00:00','admin',NULL,NULL),(56,4,'2017-07-26 03:00:00','admin',NULL,NULL),(56,5,'2017-07-26 03:00:00','admin',NULL,NULL),(56,6,'2017-07-26 03:00:00','admin',NULL,NULL),(56,7,'2017-07-26 03:00:00','admin',NULL,NULL),(56,8,'2017-07-26 03:00:00','admin',NULL,NULL),(57,3,'2017-07-26 03:00:00','admin',NULL,NULL),(57,4,'2017-07-26 03:00:00','admin',NULL,NULL),(57,5,'2017-07-26 03:00:00','admin',NULL,NULL),(57,7,'2017-07-26 03:00:00','admin',NULL,NULL),(57,8,'2017-07-26 03:00:00','admin',NULL,NULL),(58,3,'2017-07-26 03:00:00','admin',NULL,NULL),(58,4,'2017-07-26 03:00:00','admin',NULL,NULL),(58,5,'2017-07-26 03:00:00','admin',NULL,NULL),(58,6,'2017-07-26 03:00:00','admin',NULL,NULL),(58,7,'2017-07-26 03:00:00','admin',NULL,NULL),(58,8,'2017-07-26 03:00:00','admin',NULL,NULL),(59,2,'2017-07-26 03:00:00','admin',NULL,NULL),(59,3,'2017-07-26 03:00:00','admin',NULL,NULL),(59,4,'2017-07-26 03:00:00','admin',NULL,NULL),(59,5,'2017-07-26 03:00:00','admin',NULL,NULL),(59,6,'2017-07-26 03:00:00','admin',NULL,NULL),(60,3,'2017-07-26 03:00:00','admin',NULL,NULL),(60,4,'2017-07-26 03:00:00','admin',NULL,NULL),(60,5,'2017-07-26 03:00:00','admin',NULL,NULL),(60,6,'2017-07-26 03:00:00','admin',NULL,NULL),(61,2,'2017-07-26 03:00:00','admin',NULL,NULL),(61,3,'2017-07-26 03:00:00','admin',NULL,NULL),(61,4,'2017-07-26 03:00:00','admin',NULL,NULL),(61,5,'2017-07-26 03:00:00','admin',NULL,NULL),(61,6,'2017-07-26 03:00:00','admin',NULL,NULL),(62,3,'2017-07-26 03:00:00','admin',NULL,NULL),(62,4,'2017-07-26 03:00:00','admin',NULL,NULL),(63,3,'2017-07-26 03:00:00','admin',NULL,NULL),(63,4,'2017-07-26 03:00:00','admin',NULL,NULL),(63,5,'2017-07-26 03:00:00','admin',NULL,NULL),(63,6,'2017-07-26 03:00:00','admin',NULL,NULL),(64,1,'2017-07-26 03:00:00','admin',NULL,NULL),(64,2,'2017-07-26 03:00:00','admin',NULL,NULL),(64,3,'2017-07-26 03:00:00','admin',NULL,NULL),(64,4,'2017-07-26 03:00:00','admin',NULL,NULL),(64,5,'2017-07-26 03:00:00','admin',NULL,NULL),(64,6,'2017-07-26 03:00:00','admin',NULL,NULL),(64,7,'2017-07-26 03:00:00','admin',NULL,NULL),(64,8,'2017-07-26 03:00:00','admin',NULL,NULL),(65,1,'2017-07-26 03:00:00','admin',NULL,NULL),(65,2,'2017-07-26 03:00:00','admin',NULL,NULL),(65,3,'2017-07-26 03:00:00','admin',NULL,NULL),(65,4,'2017-07-26 03:00:00','admin',NULL,NULL),(65,5,'2017-07-26 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha_tipologias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medio`
--

DROP TABLE IF EXISTS `medio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medio` (
  `medi_id` int(11) NOT NULL AUTO_INCREMENT,
  `medi_deno` varchar(50) NOT NULL,
  `medi_deno_redu` varchar(10) NOT NULL,
  `medi_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `medi_alta_usu` varchar(50) NOT NULL,
  `medi_baja_f` date DEFAULT NULL,
  `medi_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`medi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medio`
--

LOCK TABLES `medio` WRITE;
/*!40000 ALTER TABLE `medio` DISABLE KEYS */;
INSERT INTO `medio` VALUES (1,'Urbano','Urb.','2017-05-07 20:54:18','',NULL,NULL),(2,'Periurbano','Periurb.','2017-05-07 20:54:18','',NULL,NULL),(3,'Rural','Rur.','2017-05-07 20:54:18','',NULL,NULL),(4,'Selvático - Agreste','Selv.','2017-05-07 20:54:18','',NULL,NULL),(6,'Costero','Cost.','2017-06-10 03:00:00','admin',NULL,NULL),(7,'aaa','aaa','2017-07-08 03:00:00','admin','2017-07-08','admin');
/*!40000 ALTER TABLE `medio` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `proy_id` int(11) NOT NULL AUTO_INCREMENT,
  `proy_nomb` varchar(50) NOT NULL,
  `proy_inicio_f` date NOT NULL,
  `proy_fin_f` date NOT NULL,
  `proy_loca_id` int(11) NOT NULL,
  `proy_obs` text,
  `proy_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proy_alta_usu` varchar(50) NOT NULL,
  `proy_baja_f` date DEFAULT NULL,
  `proy_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`proy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_fichas`
--

DROP TABLE IF EXISTS `proyecto_fichas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_fichas` (
  `prof_proy_id` int(11) NOT NULL,
  `prof_fich_id` int(11) NOT NULL,
  `prof_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prof_alta_usu` varchar(50) NOT NULL,
  `prof_baja_f` date DEFAULT NULL,
  `prof_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prof_proy_id`,`prof_fich_id`),
  CONSTRAINT `FK_proy_proyectofichas` FOREIGN KEY (`prof_proy_id`) REFERENCES `proyecto` (`proy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_fichas`
--

LOCK TABLES `proyecto_fichas` WRITE;
/*!40000 ALTER TABLE `proyecto_fichas` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_fichas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_fichas_adhoc`
--

DROP TABLE IF EXISTS `proyecto_fichas_adhoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_fichas_adhoc` (
  `pfad_proy_id` int(11) NOT NULL,
  `pfad_id` int(11) NOT NULL,
  `pfad_nomb` text NOT NULL,
  `pfad_proc` text NOT NULL,
  `pfad_recu` text,
  `pfad_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pfad_alta_usu` varchar(50) NOT NULL,
  `pfad_baja_f` date DEFAULT NULL,
  `pfad_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pfad_id`,`pfad_proy_id`),
  KEY `FK_proy_proyectofichasadhoc_idx` (`pfad_proy_id`),
  CONSTRAINT `FK_proy_proyectofichasadhoc` FOREIGN KEY (`pfad_proy_id`) REFERENCES `proyecto` (`proy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_fichas_adhoc`
--

LOCK TABLES `proyecto_fichas_adhoc` WRITE;
/*!40000 ALTER TABLE `proyecto_fichas_adhoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_fichas_adhoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamanio`
--

DROP TABLE IF EXISTS `tamanio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tamanio` (
  `tama_id` int(11) NOT NULL AUTO_INCREMENT,
  `tama_deno` varchar(50) NOT NULL,
  `tama_deno_redu` varchar(10) NOT NULL,
  `tama_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tama_alta_usu` varchar(50) NOT NULL,
  `tama_baja_f` date DEFAULT NULL,
  `tama_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamanio`
--

LOCK TABLES `tamanio` WRITE;
/*!40000 ALTER TABLE `tamanio` DISABLE KEYS */;
INSERT INTO `tamanio` VALUES (26,'Pequeña','Peq.','2017-06-10 03:00:00','admin',NULL,NULL),(27,'Mediana','Med,','2017-06-10 03:00:00','admin',NULL,NULL),(28,'Grande','Gran.','2017-06-10 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `tamanio` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `usu_accesos_log`
--

DROP TABLE IF EXISTS `usu_accesos_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_accesos_log` (
  `usal_fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usal_orden` int(11) DEFAULT NULL,
  `usal_usua_nombre` varchar(50) DEFAULT NULL,
  `usal_clave` varchar(50) DEFAULT NULL,
  `usal_codigo_number` int(11) DEFAULT NULL,
  `usal_codigo_char` varchar(50) DEFAULT NULL,
  `usal_vistas` varchar(300) DEFAULT NULL,
  `usal_habilitado` varchar(1) DEFAULT NULL,
  `usal_alta_f` date DEFAULT NULL,
  `usal_usr_alta` varchar(50) DEFAULT NULL,
  `usal_mofi_f` date DEFAULT NULL,
  `usal_usr_modi` varchar(50) DEFAULT NULL,
  `usal_empre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_accesos_log`
--

LOCK TABLES `usu_accesos_log` WRITE;
/*!40000 ALTER TABLE `usu_accesos_log` DISABLE KEYS */;
INSERT INTO `usu_accesos_log` VALUES ('2017-05-07 22:20:02',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-07',NULL,NULL,NULL,1),('2017-05-12 22:33:16',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 22:42:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 22:43:47',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:30:23',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:37:05',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:45:20',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:52:30',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo hola',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:53:15',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo coco',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:54:02',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo coco',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 02:40:17',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:21:27',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:23:20',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las jj Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:38:26',1,'admin','ACTUALIZA',7,'catalogo','Catalogo extensa',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:39:52',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:44:00',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:13',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:36',1,'admin','ACTUALIZA',8,'catalogo','Catalogo catalogo nuevo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:46',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Catalogo Nuevo maxi',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:54:46',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Catalogo Nwe Maxi',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:57:53',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 21:19:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 22:16:43',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-15 00:44:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-15',NULL,NULL,NULL,1),('2017-05-20 20:52:45',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-20',NULL,NULL,NULL,1),('2017-05-20 21:45:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-20',NULL,NULL,NULL,1),('2017-05-21 23:48:18',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-21',NULL,NULL,NULL,1),('2017-05-23 13:45:44',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 14:08:15',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 15:44:48',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 16:46:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:46:12',1,'admin','ACTUALIZA',5,'fase','fase ',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:48:28',1,'admin','ACTUALIZA',6,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:50:42',1,'admin','ACTUALIZA',7,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:57:41',1,'admin','ACTUALIZA',0,'fase','fase Documentación ',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:57:52',1,'admin','ACTUALIZA',0,'fase','fase Documentación Inicial',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:58:24',1,'admin','ACTUALIZA',8,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 19:56:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-24 13:19:19',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-24 17:27:34',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-24 21:52:27',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-25 19:47:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-25',NULL,NULL,NULL,1),('2017-05-25 21:25:50',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-25',NULL,NULL,NULL,1),('2017-05-27 18:27:01',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-27 20:12:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-27 23:18:02',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-28 19:22:03',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-28',NULL,NULL,NULL,1),('2017-05-29 23:39:29',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-29',NULL,NULL,NULL,1),('2017-05-30 00:49:16',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-30',NULL,NULL,NULL,1),('2017-05-30 00:58:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-30',NULL,NULL,NULL,1),('2017-06-03 12:09:14',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 13:21:24',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 13:56:53',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 21:37:08',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 22:18:56',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 22:20:24',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:10:44',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:12:59',NULL,'6','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:24:58',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:25:07',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:26:27',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:27:00',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:28:57',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2),(4);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-04 14:08:18',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 21:38:01',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 21:52:29',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 22:31:51',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:48:50',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(3),(2),(4);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:49:03',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:50:54',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:51:53',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:52:05',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:53:47',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:53:57',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:56:22',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:56:30',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:56:42',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:56:51',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-04 23:57:03',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:00:13',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:00:19',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:01:11',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:01:40',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:02:12',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:02:50',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:32:30',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:32:55',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:33:10',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:38:29',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:39:30',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:39:41',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:40:11',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:40:40',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:41:12',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:41:19',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:41:56',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:42:45',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:45:22',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (1),(2),(3);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:46:05',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:48:30',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:48:59',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:49:12',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:49:58',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:53:22',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:53:50',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:54:25',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:54:54',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:58:46',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (1),(2),(3);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 00:59:52',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (1),(2),(3);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:01:15',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:01:49',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:03:15',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:04:19',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:04:41',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:05:06',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:05:43',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:05:57',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:05:58',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3),(4),(1);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:06:13',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-05 01:06:13',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (5);)',NULL,'2017-06-04',NULL,NULL,NULL,1),('2017-06-09 13:17:35',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-09 14:04:17',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-09 15:02:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-09 20:35:33',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-09 21:37:54',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-09 22:43:42',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-09',NULL,NULL,NULL,1),('2017-06-10 19:26:37',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:39:59',1,'admin','ACTUALIZA',16,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:41:18',1,'admin','ACTUALIZA',17,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:41:54',1,'admin','ACTUALIZA',18,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:43:40',1,'admin','ACTUALIZA',19,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:49:33',1,'admin','ACTUALIZA',20,'tamanio','Tamaño pequeño',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:50:21',1,'admin','ACTUALIZA',21,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 19:51:48',1,'admin','ACTUALIZA',22,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 20:17:44',1,'admin','ACTUALIZA',23,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 20:19:14',1,'admin','ACTUALIZA',24,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 20:39:47',1,'admin','ACTUALIZA',25,'tamanio','Tamaño ',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 20:55:50',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:07:32',1,'admin','ACTUALIZA',26,'tamanio','Tamaño Pequeña',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:08:10',1,'admin','ACTUALIZA',0,'tamanio','Tamaño Pequeñas',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:08:17',1,'admin','ACTUALIZA',0,'tamanio','Tamaño Pequeña',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:08:28',1,'admin','ACTUALIZA',27,'tamanio','Tamaño Mediana',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:08:40',1,'admin','ACTUALIZA',28,'tamanio','Tamaño Grande',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:11:49',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo Eficient De Recursos',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:12:01',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo Eficiente De Recursos',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:18:22',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo Eficiente De Recursos',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:19:37',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo Eficiente De Recursos',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:26:30',1,'admin','ACTUALIZA',9,'catalogo','Catalogo mmm',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:52:27',1,'admin','ACTUALIZA',10,'catalogo','Catalogo Protección',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:52:44',1,'admin','ACTUALIZA',0,'fase','fase Documentación Inal',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:52:51',1,'admin','ACTUALIZA',0,'fase','fase Documentación Inal',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 21:53:02',1,'admin','ACTUALIZA',9,'fase','fase asd',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:07:39',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3),(2),(4);)',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:07:40',NULL,'1','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (5),(2),(3),(4),(1);)',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:15:53',1,'admin','ACTUALIZA',0,'medio','Medio prueba1',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:16:04',1,'admin','ACTUALIZA',6,'medio','Medio Costero',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:19:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:21:42',NULL,'8','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3),(2),(4);)',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-10 22:21:43',NULL,'8','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-06-10',NULL,NULL,NULL,1),('2017-06-11 12:49:03',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 13:44:05',NULL,'12','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 13:44:05',NULL,'12','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 14:00:51',NULL,'14','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 14:00:51',NULL,'14','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 15:17:52',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 17:19:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 17:56:40',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 18:53:41',NULL,'39','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 18:55:11',NULL,'40','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3),(2),(4);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 18:55:12',NULL,'40','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:21',NULL,'41','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:21',NULL,'41','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:22',NULL,'41','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:22',NULL,'41','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:49',NULL,'42','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:49',NULL,'42','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:50',NULL,'42','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-11 19:00:50',NULL,'42','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES ();)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:31:28',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 01:32:03',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:32:03',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:32:04',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:32:04',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:34:44',NULL,'44','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:34:45',NULL,'44','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:34:45',NULL,'44','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (26);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 01:34:45',NULL,'44','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (4),(5),(6);)',NULL,'2017-06-11',NULL,NULL,NULL,1),('2017-06-12 23:10:40',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:11:19',NULL,'45','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:11:19',NULL,'45','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:11:19',NULL,'45','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:11:20',NULL,'45','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:16:47',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:17:31',NULL,'46','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:17:32',NULL,'46','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:17:32',NULL,'46','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-12 23:17:33',NULL,'46','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3);)',NULL,'2017-06-12',NULL,NULL,NULL,1),('2017-06-17 13:54:41',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:02:29',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:12:49',NULL,'38','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(2),(4);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:12:50',NULL,'38','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(4);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:12:51',NULL,'38','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:12:51',NULL,'38','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:13:29',NULL,'47','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3),(2);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:13:30',NULL,'47','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:13:31',NULL,'47','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:13:31',NULL,'47','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:19',NULL,'39','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:20',NULL,'39','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:21',NULL,'39','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:21',NULL,'39','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:47',NULL,'39','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:48',NULL,'39','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:48',NULL,'39','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:24:49',NULL,'39','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:57:05',NULL,'41','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:57:05',NULL,'41','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:57:06',NULL,'41','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:57:06',NULL,'41','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:58:04',NULL,'40','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (9),(3),(2),(4);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:58:04',NULL,'40','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:58:04',NULL,'40','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (27);)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 14:58:05',NULL,'40','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES ();)',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 15:31:17',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-17 19:46:47',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-17',NULL,NULL,NULL,1),('2017-06-18 20:47:25',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:08:39',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:08:39',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:08:40',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:08:40',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:09:01',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:09:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:09:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:09:03',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:10:24',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:10:25',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:10:26',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:10:26',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:12:58',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:12:58',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:12:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:12:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:37:01',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:37:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:37:03',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-18 21:37:03',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-18',NULL,NULL,NULL,1),('2017-06-20 13:19:13',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:25:40',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:25:40',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:25:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:25:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:09',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:10',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:10',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:24',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:25',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:25',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:27:26',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:28:16',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:28:16',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:28:17',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:28:17',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:30:04',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:30:05',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:30:05',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 13:30:06',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 16:05:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-20 17:50:09',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-20',NULL,NULL,NULL,1),('2017-06-25 13:21:07',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 13:59:25',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 14:45:27',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 15:39:53',NULL,'46','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 15:39:53',NULL,'46','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 15:39:54',NULL,'46','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 15:39:54',NULL,'46','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:10:37',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:05',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:06',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:06',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:07',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:44',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:44',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:45',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:11:45',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:12:01',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:12:01',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:12:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:12:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:10',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:12',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:40',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:24:42',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:25:10',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:25:10',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:25:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:25:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:38',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:39',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:39',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:40',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:58',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:58',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:26:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:27:32',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:27:32',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:27:32',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:27:33',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:31:34',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:31:35',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:31:36',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:31:36',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:32:58',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:32:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:32:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:33:00',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:33:12',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:33:12',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:33:13',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:33:14',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:40:58',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:40:58',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:40:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:40:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:17',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:18',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:19',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:19',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:26',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:26',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:27',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:41:27',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:43:00',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:43:01',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:43:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:43:02',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:48:10',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:48:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:48:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:48:12',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:59:45',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:59:45',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:59:46',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 16:59:47',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:02:21',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:02:22',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:02:22',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:02:23',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:08:39',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:08:40',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:08:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:08:41',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:11:10',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:11:10',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:11:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:11:11',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:12:05',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:12:05',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:12:06',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:12:06',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:14:48',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:14:48',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:14:49',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:14:49',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:03',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:04',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:05',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:05',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:21',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:21',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:22',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:22',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:57',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:57',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:58',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:15:59',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:32',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:32',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:33',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:34',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:49',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:49',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:49',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-25 17:18:50',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-06-25',NULL,NULL,NULL,1),('2017-06-26 00:45:38',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-26',NULL,NULL,NULL,1),('2017-07-01 17:38:35',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 17:47:38',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 17:54:44',NULL,'43','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2),(4);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 17:54:44',NULL,'43','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 17:54:45',NULL,'43','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(26);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 17:54:45',NULL,'43','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (5),(8),(1),(7),(2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-01 23:39:17',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:16:55',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:16:56',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:16:56',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:16:57',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:17:39',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:17:40',NULL,'7','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:17:40',NULL,'7','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:17:41',NULL,'7','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:21:28',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:21:28',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:21:29',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:21:29',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:27:00',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:27:01',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:27:01',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-02 00:27:02',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-01',NULL,NULL,NULL,1),('2017-07-08 18:48:58',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:35',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:35',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:36',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:36',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:47',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:47',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:48',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:49:49',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:50:03',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:50:04',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:50:04',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:50:05',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:51:02',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:51:02',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:51:03',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:51:03',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:54:29',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:54:30',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:54:30',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:54:31',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:55:10',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:55:10',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:55:11',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:55:11',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:57:36',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:57:36',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:57:37',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 18:57:38',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:19',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:20',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:21',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:21',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:43',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:44',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:44',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:04:45',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:05:13',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:05:13',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:05:14',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:05:15',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:15:42',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:15:42',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:15:43',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:15:43',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:20',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:20',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:21',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:21',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:34',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:35',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:36',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:16:36',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:18:43',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:18:44',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:18:44',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:18:45',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:19:05',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:19:06',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:19:07',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:19:07',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:18',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:18',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:19',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:20',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:52',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:53',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:53',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:22:54',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:23:04',NULL,'5','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:23:05',NULL,'5','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES ();)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:23:06',NULL,'5','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:23:07',NULL,'5','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:42:51',1,'admin','ACTUALIZA',11,'catalogo','Catalogo Minimización de Emisiones',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 19:58:08',1,'admin','ACTUALIZA',7,'medio','Medio aaa',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:48:50',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:48:51',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:48:51',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:48:52',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:49:54',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:49:54',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:49:55',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:49:55',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:50:59',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:00',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:01',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:01',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:48',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:49',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:50',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:51:50',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:00',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:00',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:01',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:02',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:45',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:46',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:46',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:52:47',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:53:40',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:53:41',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:53:41',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:53:42',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:55:56',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:55:57',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:55:58',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:55:59',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:57:53',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:57:53',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:57:54',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:57:54',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:58:12',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:58:12',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:58:13',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 20:58:13',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:43',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:43',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:44',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:44',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:56',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:56',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:57',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:08:57',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:11',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:12',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:13',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:13',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:25',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:26',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:26',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:27',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:28',NULL,'48','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:29',NULL,'48','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:29',NULL,'48','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:09:30',NULL,'48','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:22:51',NULL,'49','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:22:52',NULL,'49','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:22:53',NULL,'49','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:22:54',NULL,'49','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:23:55',NULL,'49','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:23:55',NULL,'49','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:23:56',NULL,'49','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 21:23:56',NULL,'49','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(1);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 22:09:19',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-08 22:47:00',NULL,'59','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(3);)',NULL,'2017-07-08',NULL,NULL,NULL,1),('2017-07-15 17:24:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:30:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:38:07',NULL,'51','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(3),(2);)',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:38:08',NULL,'51','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:38:08',NULL,'51','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:38:09',NULL,'51','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(1),(2);)',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 17:43:35',1,'admin','ACTUALIZA',0,'fase','fase Documentación Inicial',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 18:09:43',NULL,'consulta','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-15 18:09:58',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-15',NULL,NULL,NULL,1),('2017-07-16 22:57:50',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-16',NULL,NULL,NULL,1),('2017-07-22 01:24:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-22',NULL,NULL,NULL,1),('2017-07-22 13:03:01',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-22',NULL,NULL,NULL,1),('2017-07-22 13:03:03',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-22',NULL,NULL,NULL,1),('2017-07-22 15:55:56',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-22',NULL,NULL,NULL,1),('2017-07-22 16:36:19',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-22',NULL,NULL,NULL,1),('2017-07-24 23:48:51',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-24',NULL,NULL,NULL,1),('2017-07-26 13:19:22',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 13:19:33',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:08:25',NULL,'52','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:08:25',NULL,'52','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:08:26',NULL,'52','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:08:26',NULL,'52','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:20:43',NULL,'53','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2),(4);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:20:43',NULL,'53','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:20:44',NULL,'53','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:20:44',NULL,'53','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:32:23',NULL,'54','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(3),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:32:24',NULL,'54','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:32:24',NULL,'54','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:32:24',NULL,'54','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(1),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:36:07',NULL,'55','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:36:08',NULL,'55','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:36:08',NULL,'55','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:36:09',NULL,'55','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (8),(7);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:38:19',NULL,'56','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2),(4);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:38:19',NULL,'56','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:38:19',NULL,'56','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:38:20',NULL,'56','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:41:40',NULL,'57','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:41:40',NULL,'57','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:41:40',NULL,'57','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:41:41',NULL,'57','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(8),(7);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:43:23',NULL,'58','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:43:24',NULL,'58','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:43:24',NULL,'58','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 14:43:24',NULL,'58','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(7);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:42:11',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:43:49',NULL,'59','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:43:49',NULL,'59','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(3),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:43:50',NULL,'59','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27),(26);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:43:50',NULL,'59','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:51:22',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo eficiente de recursos',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:51:34',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Minimización de emisiones',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:54:29',NULL,'60','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:54:30',NULL,'60','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:54:30',NULL,'60','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:54:31',NULL,'60','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:56:00',NULL,'61','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:56:00',NULL,'61','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:56:00',NULL,'61','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 15:56:01',NULL,'61','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:21:00',NULL,'62','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:21:00',NULL,'62','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:21:01',NULL,'62','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:21:02',NULL,'62','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:22:19',NULL,'63','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:22:19',NULL,'63','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (6),(2),(3),(4),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:22:20',NULL,'63','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:22:20',NULL,'63','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:23:43',NULL,'64','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3),(4);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:23:44',NULL,'64','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (2),(1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:23:44',NULL,'64','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:23:45',NULL,'64','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(6),(8),(1),(7),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:25:11',NULL,'65','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (3);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:25:12',NULL,'65','ACTUALIZA',NULL,'0','Incluye medio  medios (INSERT INTO lismedi VALUES (1);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:25:13',NULL,'65','ACTUALIZA',NULL,'0','Incluye tamanio  tamanios (INSERT INTO listama VALUES (28),(27);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 16:25:13',NULL,'65','ACTUALIZA',NULL,'0','Incluye tipologias  tipologias (INSERT INTO listipo VALUES (3),(4),(5),(1),(2);)',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:17:51',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:35:44',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo eficiente De Recursos',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:38:15',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo eficiente De Recursos',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:39:01',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Consumo eficiente de recursos',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:41:17',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Preservación de actividades vecinas',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:41:28',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Prevención de la contaminación',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 18:42:16',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Minimización De emisiones',NULL,'2017-07-26',NULL,NULL,NULL,1),('2017-07-26 20:15:18',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-07-26',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `usu_accesos_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usu_aplicaciones`
--

DROP TABLE IF EXISTS `usu_aplicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_aplicaciones` (
  `usap_apli` varchar(10) NOT NULL DEFAULT '',
  `usap_habilitado` varchar(1) DEFAULT NULL,
  `usap_fch_alta` date DEFAULT NULL,
  `usap_usr_alta` varchar(50) DEFAULT NULL,
  `usap_fch_modi` date DEFAULT NULL,
  `usap_usr_modi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usap_apli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_aplicaciones`
--

LOCK TABLES `usu_aplicaciones` WRITE;
/*!40000 ALTER TABLE `usu_aplicaciones` DISABLE KEYS */;
INSERT INTO `usu_aplicaciones` VALUES ('GAMSI','S','0000-00-00','admin',NULL,NULL);
/*!40000 ALTER TABLE `usu_aplicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usu_incidentes_log`
--

DROP TABLE IF EXISTS `usu_incidentes_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_incidentes_log` (
  `usil_orden` int(11) NOT NULL AUTO_INCREMENT,
  `usil_fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usil_usua_nombre` varchar(50) NOT NULL,
  `usil_error_test` char(1) NOT NULL,
  `usil_proceso` varchar(500) NOT NULL,
  `usil_error` varchar(350) DEFAULT NULL,
  `usil_empre` int(11) DEFAULT NULL,
  PRIMARY KEY (`usil_orden`)
) ENGINE=InnoDB AUTO_INCREMENT=1676 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_incidentes_log`
--

LOCK TABLES `usu_incidentes_log` WRITE;
/*!40000 ALTER TABLE `usu_incidentes_log` DISABLE KEYS */;
INSERT INTO `usu_incidentes_log` VALUES (1608,'2017-06-12 01:56:14','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1609,'2017-06-12 01:56:42','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1610,'2017-06-12 01:59:21','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1611,'2017-06-12 23:10:52','admin','E','B_FICHA_RS(\'admin\',\r\n                                       \'38\')','PROCEDURE gestionverde.B_FICHA_RS does not exist',1),(1612,'2017-06-12 23:10:56','admin','E','B_FICHA_RS(\'admin\',\r\n                                       \'38\')','PROCEDURE gestionverde.B_FICHA_RS does not exist',1),(1613,'2017-06-12 23:11:41','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1614,'2017-06-12 23:17:17','admin','E','B_FICHA_RS(\'admin\',\r\n                                       \'8\')','PROCEDURE gestionverde.B_FICHA_RS does not exist',1),(1615,'2017-06-12 23:20:27','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1616,'2017-06-17 14:11:43','admin','E','B_FICHA_RS(\'admin\',\r\n                                       \'38\')','PROCEDURE gestionverde.B_FICHA_RS does not exist',1),(1617,'2017-06-17 14:13:15','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1618,'2017-06-17 14:57:06','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1619,'2017-06-17 14:58:05','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1620,'2017-06-18 21:08:40','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1621,'2017-06-18 21:09:03','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1622,'2017-06-20 13:27:26','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1623,'2017-06-20 13:28:18','admin','E','AMB_FICHA_PROCEDIMIENTOS_RS','ERROR interno al insert ficha_procedimientos',NULL),(1624,'2017-06-20 14:58:58','admin','E','GET_FASE_RS(null)','Incorrect number of arguments for PROCEDURE gestionverde.GET_FASE_RS; expected 2, got 1',1),(1625,'2017-06-20 16:39:58','admin','E','GET_ABM_FICHA_RS(\'admin\', \'2\',\'\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1626,'2017-06-20 16:40:13','admin','E','GET_ABM_FICHA_RS(\'admin\', \'2\',\'\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1627,'2017-06-20 17:50:22','admin','E','GET_ABM_FICHA_RS(\'admin\', \r\n                                  \'2\',\'\"0\",\"0\",\"0\",\"0\",\"NF\",\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1628,'2017-06-20 17:50:30','admin','E','','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1',1),(1629,'2017-06-20 17:51:40','admin','E','','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1',1),(1630,'2017-06-20 17:51:53','admin','E','','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1',1),(1631,'2017-06-20 17:55:09','admin','E','','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1',1),(1632,'2017-06-20 17:55:59','admin','E','GET_ABM_FICHA_RS(\'admin\', \r\n                                  \'\',\'\"0\",\"0\",\"0\",\"0\",\"NF\",\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1633,'2017-06-20 18:07:49','admin','E','GET_ABM_FICHA_RS(\'admin\', \r\n                                  \'2\',\'\"0\",\"0\",\"0\",\"0\",\"NF\",\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1634,'2017-06-20 18:21:38','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',0\',0\',0\',\',\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\',0\',0\',\',\')\' at line 1',1),(1635,'2017-06-20 18:23:38','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',0\',0\',0\',\',\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\',0\',0\',\',\')\' at line 1',1),(1636,'2017-06-20 18:23:53','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',0\',0\',0\',\',\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\',0\',0\',\',\')\' at line 1',1),(1637,'2017-06-20 18:23:57','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',0\',0\',0\',\',\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\',0\',0\',\',\')\' at line 1',1),(1638,'2017-06-20 18:30:57','admin','E','GET_ABM_FICHA_RS(\'admin\', \r\n                                  \'0\',\'\"0\",\"0\",\"0\",\"0\",\"NF\",\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 8, got 3',1),(1639,'2017-06-25 16:10:29','','E','USU_VALIDA_USUARIO_HOY_RS(\'\', \'\', 1)','Table \'gestionverde.camp_alumnos\' doesn\'t exist',1),(1640,'2017-06-26 00:45:48','admin','E','GET_FICHA_FUENTES_RS(\'43\')','PROCEDURE gestionverde.GET_FICHA_FUENTES_RS does not exist',1),(1641,'2017-07-01 17:38:55','admin','E','GET_FICHA_FUENTES_RS(\'43\')','PROCEDURE gestionverde.GET_FICHA_FUENTES_RS does not exist',1),(1642,'2017-07-08 19:58:15','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1643,'2017-07-08 19:59:31','admin','E','GET_TAMANIO_RS(\'28\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_TAMANIO_RS; expected 2, got 1',1),(1644,'2017-07-08 20:00:15','admin','E','GET_MEDIO_RS(\'6N\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1645,'2017-07-08 20:00:58','admin','E','GET_MEDIO_RS(\'6N\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1646,'2017-07-08 20:01:17','admin','E','GET_MEDIO_RS(\'6N\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1647,'2017-07-08 20:02:25','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1648,'2017-07-08 20:02:38','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1649,'2017-07-08 20:06:31','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1650,'2017-07-08 20:08:09','admin','E','GET_MEDIO_RS(\'6?\'N\'\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'N\'\')\' at line 1',1),(1651,'2017-07-08 20:12:33','admin','E','GET_MEDIO_RS(\'6?\'N\'\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'N\'\')\' at line 1',1),(1652,'2017-07-08 20:13:45','admin','E','GET_MEDIO_RS(\'6\'N\'\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'N\'\')\' at line 1',1),(1653,'2017-07-08 20:18:04','admin','E','GET_MEDIO_RS(\'6\'N\'\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'N\'\')\' at line 1',1),(1654,'2017-07-08 20:18:53','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1655,'2017-07-08 20:19:42','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1656,'2017-07-08 20:20:00','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1657,'2017-07-08 20:21:17','admin','E','GET_MEDIO_RS(\'6&\'N\'\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'N\'\')\' at line 1',1),(1658,'2017-07-08 20:27:41','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1659,'2017-07-08 20:47:11','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1660,'2017-07-08 20:52:47','admin','E','AMB_FICHA_FUENTES_RS','ERROR interno al insert ficha_fuentes',NULL),(1661,'2017-07-08 20:55:59','admin','E','AMB_FICHA_FUENTES_RS','ERROR interno al insert ficha_fuentes',NULL),(1662,'2017-07-08 20:58:14','admin','E','AMB_FICHA_FUENTES_RS','ERROR interno al insert ficha_fuentes',NULL),(1663,'2017-07-08 21:22:01','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1664,'2017-07-08 21:27:03','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1665,'2017-07-08 21:34:04','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1666,'2017-07-08 22:42:24','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1667,'2017-07-08 22:44:13','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1668,'2017-07-08 22:49:29','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1669,'2017-07-08 23:08:29','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1670,'2017-07-08 23:09:40','admin','E','GET_MEDIO_RS(\'6\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_MEDIO_RS; expected 2, got 1',1),(1671,'2017-07-08 23:11:51','admin','E','GET_FASE_RS(\'1\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_FASE_RS; expected 2, got 1',1),(1672,'2017-07-15 17:50:20','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',\'0\',\'5\',\'0\',\'NF\',\'\')','Table \'gestionverde.ficha_tipologias\' doesn\'t exist',1),(1673,'2017-07-15 17:57:07','admin','E','GET_ABM_FICHA_RS(\'admin\', \'0\',\'0\',\'0\',\'0\',\'0\',\'RE\',\'escombros\')','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'0 ORDER BY 2\' at line 1',1),(1674,'2017-07-15 18:06:55','admin','E','USU_ABM_USUARIOS_RS(\'B\',\r\n                                                \'admin\',\r\n                                                \'1716112725\',\r\n                                                \'\',\r\n                                                \'\',\r\n                                                \'\');','Incorrect number of arguments for PROCEDURE gestionverde.USU_ABM_USUARIOS_RS; expected 5, got 6',1),(1675,'2017-07-26 13:35:57','admin','E','begin .SEL_USUARIOS_AYUDA_RS(\'/usuarios/lista\', :data); end;','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \':data); end\' at line 1',1);
/*!40000 ALTER TABLE `usu_incidentes_log` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `usu_menues_rol` VALUES ('GAMSI','ADMIN','m_admin','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_fichas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_proyectos','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_tablas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ALUMNO','m_alumno','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','CONSULTA','m_consfichas','S','S','S','S','2017-07-15','admin',NULL,NULL),('GAMSI','CONSULTA','m_proye_arma','S','S','S','S','2017-07-15','admin',NULL,NULL);
/*!40000 ALTER TABLE `usu_menues_rol` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `usu_roles` VALUES ('ADMIN','Administracion de la aplicacion','S','0000-00-00','admin',NULL,NULL,'S','S','S','S'),('CONSULTA','No modifica datos','S','2017-07-15','admin',NULL,NULL,'S','N','S','N');
/*!40000 ALTER TABLE `usu_roles` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `usu_roles_usuario` VALUES ('ADMIN','admin','S','0000-00-00','admin',NULL,NULL),('CONSULTA','consulta','S','0000-00-00','admin',NULL,NULL);
/*!40000 ALTER TABLE `usu_roles_usuario` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `usuarios` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','usuario administrador','S','2015-07-23','admin','2015-10-06','admin',20,0),('consulta','5d76beffe761403531a6eb339e0f0231','Perfil de solo consulta','S','2016-04-19','mariano.drets','0000-00-00','',0,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zz_ayuda`
--

DROP TABLE IF EXISTS `zz_ayuda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zz_ayuda` (
  `zhlp_id` int(11) NOT NULL AUTO_INCREMENT,
  `uhlp_enlace` varchar(250) NOT NULL,
  `uhlp_titulo` varchar(100) NOT NULL,
  `uhlp_texto` text NOT NULL,
  `uhlp_relac` varchar(200) DEFAULT NULL,
  `uhlp_loc_imagen` varchar(100) DEFAULT NULL,
  `uhlp_img_ancho` varchar(20) DEFAULT NULL,
  `uhlp_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uhlp_baja_f` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`zhlp_id`),
  UNIQUE KEY `zz_ayuda_ik` (`uhlp_enlace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zz_ayuda`
--

LOCK TABLES `zz_ayuda` WRITE;
/*!40000 ALTER TABLE `zz_ayuda` DISABLE KEYS */;
/*!40000 ALTER TABLE `zz_ayuda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zz_repo_exportar`
--

DROP TABLE IF EXISTS `zz_repo_exportar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zz_repo_exportar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporte` char(40) NOT NULL,
  `orden` smallint(6) NOT NULL,
  `col` char(40) NOT NULL,
  `lab` char(40) NOT NULL,
  `ancho` char(5) NOT NULL,
  `alineacion` char(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `zz_repo_exportar_ik` (`reporte`,`col`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zz_repo_exportar`
--

LOCK TABLES `zz_repo_exportar` WRITE;
/*!40000 ALTER TABLE `zz_repo_exportar` DISABLE KEYS */;
/*!40000 ALTER TABLE `zz_repo_exportar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zz_sistema`
--

DROP TABLE IF EXISTS `zz_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zz_sistema` (
  `texto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zz_sistema`
--

LOCK TABLES `zz_sistema` WRITE;
/*!40000 ALTER TABLE `zz_sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `zz_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zz_tabla_info`
--

DROP TABLE IF EXISTS `zz_tabla_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zz_tabla_info` (
  `ztai_column` varchar(30) NOT NULL,
  `ztai_table` varchar(30) NOT NULL,
  `ztai_type` varchar(15) NOT NULL,
  `ztai_length` int(5) DEFAULT NULL,
  `ztai_null` varchar(3) NOT NULL,
  `ztai_label` varchar(50) NOT NULL,
  `ztai_mensaje` varchar(50) NOT NULL,
  `ztai_alta_f` date NOT NULL,
  `ztai_baja_f` date DEFAULT NULL,
  PRIMARY KEY (`ztai_column`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zz_tabla_info`
--

LOCK TABLES `zz_tabla_info` WRITE;
/*!40000 ALTER TABLE `zz_tabla_info` DISABLE KEYS */;
INSERT INTO `zz_tabla_info` VALUES ('calu_fechanac','camp_alumnos','date',10,'N','F.nacim','fecha de nacimiento','2016-09-14',NULL);
/*!40000 ALTER TABLE `zz_tabla_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'gestionverde'
--

--
-- Dumping routines for database 'gestionverde'
--
/*!50003 DROP FUNCTION IF EXISTS `F_CONSISTEN_CHAR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_CONSISTEN_CHAR`(
p_columna 			char(30),
p_valor 			varchar(500),
p_forzar_completar 	char(1)) RETURNS varchar(1000) CHARSET utf8
BEGIN
   DECLARE v_ztai_length        char(50);
   DECLARE v_ztai_null      	char(3);
   DECLARE v_ztai_mensaje  		char(50);
   DECLARE v_respuesta          varchar(100) DEFAULT '';
   DECLARE v_sql                varchar(4000);
   DECLARE v_columna            varchar(30);

	BEGIN             
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			
			SET v_respuesta = 'ERROR interno tabla zz_tabla_info';
		END; 
	select  ztai_length, ztai_null, ztai_mensaje 
		into v_ztai_length, v_ztai_null, v_ztai_mensaje 
      from zz_tabla_info
      where ztai_column = p_columna;
	END; 
	if p_forzar_completar ='S' then
	  set v_ztai_null = 'NO';
	end if;
	if (p_valor is null or rtrim(p_valor) = '') and v_ztai_null = 'NO' then
	  set v_respuesta = concat('Complete ',v_ztai_mensaje,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
	end if;
	if LENGTH(trim(p_valor)) > v_ztai_length then
	  set v_respuesta = concat('Excede longitud en ',v_ztai_mensaje,' (Max ',v_ztai_length,')',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
	end if;
	RETURN v_respuesta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_CONSISTEN_DATE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_CONSISTEN_DATE`(
p_columna char(30),
p_valor varchar(500),
p_forzar_completar char(1),
p_mayor_menor_hoy_error char(2)) RETURNS varchar(1000) CHARSET utf8
BEGIN
   DECLARE v_fecha_ok			char(1) DEFAULT 'S';
   DECLARE v_fecha				date;
   DECLARE v_ztai_length        char(50);
   DECLARE v_ztai_null      	char(3);
   DECLARE v_ztai_mensaje  		char(50);
   DECLARE v_respuesta          varchar(100) DEFAULT '';
   DECLARE v_sql                varchar(4000);
   DECLARE v_columna            varchar(30);

	BEGIN             
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			
			SET v_respuesta = 'ERROR interno tabla zz_tabla_info';
		END; 
	select  ztai_length, ztai_null, ztai_mensaje 
		into v_ztai_length, v_ztai_null, v_ztai_mensaje 
      from zz_tabla_info
      where ztai_column = p_columna;
	END; 
	BEGIN             
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			
			SET v_fecha_ok = 'N';
		END; 
		select str_to_date(p_valor,'%d/%m/%Y')
			into v_fecha
			from dual;
            
	END; 
   
	if v_respuesta = '' then
	 
	   if v_ztai_null = 'YES' and p_forzar_completar ='S' then
		  set v_ztai_null = 'NO';
	   end if;
	   
	   if trim(p_valor)='' and v_ztai_null = 'NO' then
		  set v_respuesta = concat('Complete ',v_ztai_mensaje,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
	   end if;
       
       if v_fecha is null or v_fecha_ok = 'N' then
		  set v_respuesta = concat('Formato fecha no valido en ',v_ztai_mensaje,CHAR(13 USING ASCII),CHAR(10 USING ASCII));       
       end if;
	   
	   if p_mayor_menor_hoy_error is not null then 
		  if p_mayor_menor_hoy_error = '>' then
			 if v_fecha <= now() then
				set v_respuesta = concat(v_ztai_mensaje,' debe ser mayor a hoy',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			 end if;
		  elseif p_mayor_menor_hoy_error = '>=' then
			 if v_fecha < now() then
				set v_respuesta = concat(v_ztai_mensaje,' debe ser mayor o igual a hoy',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			 end if;
		  elseif p_mayor_menor_hoy_error = '<' then
			 if v_fecha >= now() then
				set v_respuesta = concat(v_ztai_mensaje,' debe ser menor a hoy',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			  end if;
		  elseif p_mayor_menor_hoy_error = '<=' then
			  if v_fecha > now() then
				set v_respuesta = concat(v_ztai_mensaje,' debe ser menor o igual a hoy',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			  end if;
		  end if;
	   end if;
	   
   end if;
   
   RETURN v_respuesta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_CONSISTEN_NUMBER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_CONSISTEN_NUMBER`(
p_columna 		char(30),
p_valor 		varchar(500),
p_rango_des 	integer,
p_rango_has 	integer,
p_forzar_completar char(1)) RETURNS varchar(1000) CHARSET utf8
BEGIN
   DECLARE v_numero				decimal(12,2);
   DECLARE v_ztai_length        char(50);
   DECLARE v_ztai_null      	char(3);
   DECLARE v_ztai_mensaje  		char(50);
   DECLARE v_respuesta          varchar(100) DEFAULT '';
   DECLARE v_sql                varchar(4000);
   DECLARE v_columna            varchar(30);

	BEGIN             
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			
			SET v_respuesta = 'ERROR interno tabla zz_tabla_info';
		END; 
	select  ztai_length, ztai_null, ztai_mensaje 
		into v_ztai_length, v_ztai_null, v_ztai_mensaje 
      from zz_tabla_info
      where ztai_column = p_columna;
	END; 
  
	if v_respuesta = '' then
    
	   if p_forzar_completar ='S' then
		  set v_ztai_null = 'NO';
	   end if;
	   if LENGTH(trim(p_valor)) > v_ztai_length then
		   set v_respuesta = concat('Excede longitud en ',v_ztai_mensaje,' (Max ',v_ztai_length,')',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
	   end if;
	   if (p_valor REGEXP '^[0-9]+\.[0-9]+$') or (substr(p_valor,1,1)='-' and substr(p_valor,2) REGEXP '^[0-9]+\.[0-9]+$') then
			set v_numero = CONVERT(p_valor,decimal(15,2));
			
			if v_numero is null and v_ztai_null = 'NO' then
				set v_respuesta = concat('Complete ',v_ztai_mensaje,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			end if;
			if (p_rango_Des is not null) and v_numero < p_rango_des then 
				set v_respuesta = concat('El valor en ',v_ztai_mensaje,' no puede ser menor que ',p_rango_des,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			end if;
			if (p_rango_has is not null) and v_numero > p_rango_has then 
				set v_respuesta = concat('El valor en ',v_ztai_mensaje,' no puede ser mayor a ',p_rango_has,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			end if;
		 
		else
			set v_respuesta = concat(v_ztai_mensaje,' debe ser numerico ',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
		end if;
	
    end if;
    
   RETURN v_respuesta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_EDAD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_EDAD`(
a_fecha_nacim date) RETURNS int(11)
BEGIN
if a_fecha_nacim = '' then
	RETURN 0;
end if;
RETURN YEAR(CURDATE())-YEAR(a_fecha_nacim) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(a_fecha_nacim,'%m-%d'), 0, -1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_PROPER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_PROPER`( str VARCHAR(128) ) RETURNS varchar(128) CHARSET utf8
BEGIN 
  DECLARE c CHAR(1); 
  DECLARE s VARCHAR(128); 
  DECLARE i INT DEFAULT 1; 
  DECLARE bool INT DEFAULT 1; 
  DECLARE punct CHAR(18) DEFAULT ' ()[]{},.-_\'!@;:?/'; 
  SET s = LCASE( str ); 
  WHILE i <= LENGTH( str ) DO 
    BEGIN 
      SET c = SUBSTRING( s, i, 1 ); 
      IF LOCATE( c, punct ) > 0 THEN 
        SET bool = 1; 
      ELSEIF bool=1 THEN  
        BEGIN 
          IF c >= 'a' AND c <= 'z' THEN  
            BEGIN 
              SET s = CONCAT(LEFT(s,i-1),UCASE(c),SUBSTRING(s,i+1)); 
              SET bool = 0; 
            END; 
          ELSEIF c >= '0' AND c <= '9' THEN 
            SET bool = 0; 
          END IF; 
        END; 
      END IF; 
      SET i = i+1; 
    END; 
  END WHILE; 
  RETURN s; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_TIRA_DE_ROLES` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_TIRA_DE_ROLES`(
  p_usuario varchar(50),
  p_separa char
) RETURNS varchar(1000) CHARSET latin1
BEGIN
  
  DECLARE v_respuesta varchar(1000) DEFAULT '';
  DECLARE p_usro_rol varchar(50);
  DECLARE v_fin INTEGER DEFAULT 0;
  
  DECLARE c_roles CURSOR FOR
   SELECT usru_usro_rol
     FROM usu_roles_usuario
    WHERE usru_usua_nombre = p_usuario 
      AND usru_habilitado = 'S';
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_fin = 1;
  OPEN c_roles;
    loop1: LOOP
      FETCH c_roles INTO p_usro_rol;
      IF v_fin = 1 THEN
        LEAVE loop1;
      END IF;
      SET v_respuesta = CONCAT(v_respuesta, p_separa, p_usro_rol);
    END LOOP loop1;
  CLOSE c_roles;
  
  RETURN SUBSTRING(v_respuesta,CHAR_LENGTH(p_separa)+1,CHAR_LENGTH(v_respuesta));
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_TIRA_DE_USUARIOS_X_ROL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_TIRA_DE_USUARIOS_X_ROL`(
  p_rol varchar(30),
  p_separa char(2)
) RETURNS varchar(1000) CHARSET latin1
BEGIN
  
  DECLARE v_respuesta varchar(1000) DEFAULT '';
  DECLARE p_usua_nombre varchar(50);
  DECLARE v_fin INTEGER DEFAULT 0;
  
  DECLARE c_roles CURSOR FOR
    SELECT usru_usua_nombre
      FROM usu_roles_usuario
     WHERE usru_usro_rol = p_rol
       AND usru_habilitado = 'S';
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_fin = 1;
  OPEN c_roles;
    loop1: LOOP
      FETCH c_roles INTO p_usua_nombre;
      IF v_fin = 1 THEN
        LEAVE loop1;
      END IF;
      SET v_respuesta = CONCAT(v_respuesta, p_separa,' ', p_usua_nombre);
    END LOOP loop1;
  CLOSE c_roles;
  
  RETURN SUBSTRING(v_respuesta,CHAR_LENGTH(p_separa)+1,CHAR_LENGTH(v_respuesta));
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_TO_DATE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_TO_DATE`(
 p_fecha_text char(10)
) RETURNS char(12) CHARSET utf8
BEGIN

RETURN concat(CHAR(39 USING ASCII),mid(p_fecha_text,7,4),'-',mid(p_fecha_text,4,2),'-',mid(p_fecha_text,1,2),CHAR(39 USING ASCII));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_TRIM` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_TRIM`(
 p_linea varchar(1000)
 ) RETURNS varchar(1000) CHARSET utf8
BEGIN
   DECLARE v_linea varchar(1000) DEFAULT p_linea;
	set v_linea = replace(v_linea,'&ntilde;','ñ');
	set v_linea = replace(v_linea,'&aacute;','á');
    set v_linea = replace(v_linea,'&eacute;','é');
    set v_linea = replace(v_linea,'&iacute;','í');
    set v_linea = replace(v_linea,'&oacute;','ó');
    set v_linea = replace(v_linea,'&uacute;','ú');
    
	RETURN trim(v_linea);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_USU_FILAS_PAG` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_USU_FILAS_PAG`(
p_usuario varchar(50)) RETURNS int(11)
BEGIN
  
  DECLARE v_filas_pag INTEGER;
  
 SELECT usua_filas_pag into v_filas_pag 
     FROM usuarios
    WHERE usua_nombre = p_usuario;
    
  if v_filas_pag < 3 then
   set v_filas_pag = 15;
  end if;
  
RETURN v_filas_pag;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_VAL_CUIT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_VAL_CUIT`(
p_pais char(2),
p_cuit varchar(20),
p_es_oblig char(1)) RETURNS varchar(1000) CHARSET utf8
BEGIN
DECLARE v_suma 		numeric(10,2);
DECLARE v_ElNumero  varchar(8);
DECLARE v_Resultado char(2);
DECLARE v_Multiplicador int;
DECLARE v_iNum 		int;
DECLARE v_Suma_cl 	int; 
DECLARE v_recorre 	int;
DECLARE v_respuesta VARCHAR(100) DEFAULT '';

if p_es_oblig = 'S' and length(p_cuit) = 0 then 
	set v_respuesta = 'Complete CUIT';
end if;
    
if p_pais = 'AR' and length(p_cuit) > 0 then    
    if length(rtrim(p_Cuit)) <> 11 then
        set v_respuesta = concat('ERROR en CUIT: Deben ser 11 digitos',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
    end if;
  
    if p_Cuit REGEXP('^[0-9]+$') = 0  then 
        set v_respuesta = concat('ERROR en CUIT: Deben ser digitos numéricos',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
    end if;
    
    if  not (substr(p_Cuit,1,2) = '20' or 
            substr(p_Cuit,1,2) = '21' or 
            substr(p_Cuit,1,2) = '23' or
            substr(p_Cuit,1,2) = '24' or
            substr(p_Cuit,1,2) = '27' or
            substr(p_Cuit,1,2) = '30' or 
            substr(p_Cuit,1,2) = '33' or
            substr(p_Cuit,1,2) = '34') then
        set v_respuesta = concat('ERROR en CUIT: Primeros dos digitos inválidos',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
    end if;
    if v_respuesta = '' then    
      set v_suma = 0;
      set v_suma = v_suma + substr(p_Cuit,1,1) * 5;
      set v_suma = v_suma + substr(p_Cuit,2,1) * 4;
      set v_suma = v_suma + substr(p_Cuit,3,1) * 3;
      set v_suma = v_suma + substr(p_Cuit,4,1) * 2;
      set v_suma = v_suma + substr(p_Cuit,5,1) * 7;
      set v_suma = v_suma + substr(p_Cuit,6,1) * 6;
      set v_suma = v_suma + substr(p_Cuit,7,1) * 5;
      set v_suma = v_suma + substr(p_Cuit,8,1) * 4;
      set v_suma = v_suma + substr(p_Cuit,9,1) * 3;
      set v_suma = v_suma + substr(p_Cuit,10,1) * 2;
      set v_suma = v_suma + substr(p_Cuit,11,1) * 1;
      
      if round(v_suma / 11,0) = (v_suma / 11) then
        set v_respuesta = '';
      else
        set v_respuesta = concat('ERROR en CUIT: No es correcto',CHAR(13 USING ASCII),CHAR(10 USING ASCII));
      end if;
      
    end if;
end if;

RETURN v_respuesta;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_VAL_EMAIL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_VAL_EMAIL`(
p_email varchar(500),
p_es_oblig char(1),
p_etiqueta_en_error varchar(50)) RETURNS varchar(1000) CHARSET utf8
BEGIN
DECLARE v_respuesta VARCHAR(500) DEFAULT '';
DECLARE v_emails VARCHAR(500); 
DECLARE v_elem VARCHAR(100);
DECLARE v_ind  integer DEFAULT 0;
if p_es_oblig = 'S' and length(p_email) = 0 then 
	set v_respuesta = concat('Complete E-mail ',p_etiqueta_en_error);
end if;
    
if length(p_email) > 0 then 
    if instr(p_email,',') + instr(p_email,' ') > 0 then
		set v_respuesta = concat('Error en E-mail, no utilice espacios ni coma, utilice ";" para separar emails ',p_etiqueta_en_error);
    else
		if instr(p_email,';') = 0 then
			if p_email NOT REGEXP '^[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9._-]@[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9]\\.[a-zA-Z]{2,4}$' then
				set v_respuesta = concat('ERROR en EMAIL: El formato no es correcto ',p_etiqueta_en_error,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
			end if;
        else 
			set v_emails = concat(rtrim(p_email),';');
			myloop:WHILE (locate(';', v_emails) > 0)
			DO  
				set v_elem = substring(v_emails,1,locate(';', v_emails) - 1);
				set v_emails= substring(v_emails, locate(';',v_emails) + 1);
				set v_ind=v_ind+1; 
                if v_ind > 5 then 
					LEAVE myloop;
				end if;
				if v_elem NOT REGEXP '^[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9._-]@[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9]\\.[a-zA-Z]{2,4}$' then
					set v_respuesta = concat(v_respuesta,'ERROR en EMAIL: El formato no es correcto en el ',
										case  v_ind when 1 then 'primer' 
													when 2 then 'segundo' 
                                                    when 3 then 'tercer' 
                                                    when 4 then 'cuarto' 
													when 5 then 'quinto' end,' mail en ',
										p_etiqueta_en_error,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
				end if;
			END WHILE;
		end if;
    end if;
end if;
RETURN v_respuesta;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_VAL_NRO_TELEFONO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_VAL_NRO_TELEFONO`(
p_nrotel varchar(200),
p_es_oblig char(1),
p_etiqueta_en_error varchar(50)) RETURNS varchar(1000) CHARSET utf8
BEGIN
DECLARE v_respuesta VARCHAR(100) DEFAULT '';
DECLARE v_nrotel varchar(200) DEFAULT p_nrotel;
if p_es_oblig = 'S' and length(p_nrotel) = 0 then 
	set v_respuesta = concat('Complete Nro de telefono ',p_etiqueta_en_error);
end if;
    
if length(p_nrotel) > 0 then 
	set v_nrotel = replace(v_nrotel,'-','');
	set v_nrotel = replace(v_nrotel,' ','');
    if v_nrotel REGEXP('^[0-9]+$') = 0  then 
        set v_respuesta = concat('ERROR: El Nro de telefono debe contener solo numeros, guiones y espacios ',p_etiqueta_en_error,CHAR(13 USING ASCII),CHAR(10 USING ASCII));
    end if;
end if;
RETURN v_respuesta;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `F_ZZI_LOG_ERR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `F_ZZI_LOG_ERR`(
 p_user char(30),
 p_error varchar(1000),
 p_sp char(45)
 ) RETURNS varchar(1000) CHARSET utf8
BEGIN
   
DECLARE v_respuesta  varchar(1000);

	BEGIN             
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			
			SET v_respuesta = 'ERROR interno al insertar usu_incidentes_log';
		END; 
	insert into usu_incidentes_log (usil_usua_nombre,usil_error_test,usil_error, usil_proceso) 
			values (p_user,'E',substring(p_error,1,350), p_sp);

	END; 
	RETURN p_error;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AMB_FICHA_FUENTES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AMB_FICHA_FUENTES_RS`(
  IN p_user varchar(50),
  IN p_fifu_fich_id int,
  IN p_fifu_fuen_id int,
  IN p_fifu_texto varchar(900),
  IN p_fifu_baja varchar(5)
)
BEGIN

DECLARE v_respuesta varchar(100) DEFAULT 'OK';
DECLARE v_errores varchar(2000) DEFAULT NULL;
DECLARE v_baja char(1) DEFAULT 'N';


IF p_fifu_baja = 'on' THEN
	set v_baja = 'S';
END IF;
IF trim(p_fifu_texto) = '' or p_fifu_texto is null THEN
	set v_baja = 'S';
END IF;


IF v_baja = 'S' THEN

	BEGIN -- baja
	  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	  BEGIN -- de excepcion
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al eliminar ficha_fuentes','AMB_FICHA_FUENTES_RS');
	  END; -- de excepcion

	  UPDATE ficha_fuentes
		 SET fifu_baja_usu = p_user,
			 fifu_baja_f   = date(CURDATE())
	   WHERE fifu_fich_id = p_fifu_fich_id
	   AND fifu_fuen_id  = p_fifu_fuen_id;
	END;
                
ELSE  
	IF p_fifu_fuen_id = 0 THEN

		  BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_fuentes','AMB_FICHA_FUENTES_RS');
			END; -- de excepcion
		
			INSERT INTO ficha_fuentes (
			  fifu_fich_id,
			  fifu_fuen_id,
			  fifu_texto,
			  fifu_alta_f,
			  fifu_alta_usu) 
			SELECT p_fifu_fich_id,
				  ifnull(max(fifu_fuen_id),0) + 1,
				  trim(p_fifu_texto),
				  date(CURDATE()),
				  p_user
			FROM ficha_fuentes
			WHERE fifu_fich_id  = p_fifu_fich_id; 
			
		  END; -- alta
	ELSE -- no es alta
			BEGIN -- modifica
			  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			  BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update ficha_fuentes','AMB_FICHA_FUENTES_RS');
			  END; -- de excepcion

			  UPDATE ficha_fuentes
				 SET fifu_texto     = trim(p_fifu_texto),
					 fifu_baja_f    = null
			   WHERE fifu_fich_id = p_fifu_fich_id
			   AND fifu_fuen_id  = p_fifu_fuen_id;
			END;
	  -- DBMS_OUTPUT.PUT_LINE('Log...'||trim(p_user)||'-'||upper(trim(P_TIDC_CODIGO))||'-'|| v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
	  -- A_LOG_ficha_procedimientosS(trim(p_user), upper(trim(P_TIDC_CODIGO)), v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
	  END IF;
END IF;

/*
INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
	
values  (p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'ficha_procedimientos',
		concat('ficha_procedimientos ',p_cata_deno),
		now());
    */
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AMB_FICHA_PROCEDIMIENTOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AMB_FICHA_PROCEDIMIENTOS_RS`(
  IN p_user varchar(50),
  IN p_fipr_fich_id int,
  IN p_fipr_proce_id int,
  IN p_fipr_texto varchar(900),
  IN p_fipr_baja varchar(5)
)
BEGIN

-- AMB_FICHA_PROCEDIMIENTOS_RS('admin',1,'5','proc uno ','')
-- AMB_FICHA_PROCEDIMIENTOS_RS('admin',1,'6','proc 2 ','on')
-- AMB_FICHA_PROCEDIMIENTOS_RS('admin',1,'0','nuevo','')  
DECLARE v_respuesta varchar(100) DEFAULT 'OK';
DECLARE v_errores varchar(2000) DEFAULT NULL;
DECLARE v_baja char(1) DEFAULT 'N';


IF p_fipr_baja = 'on' THEN
	set v_baja = 'S';
END IF;
IF trim(p_fipr_texto) = '' or p_fipr_texto is null THEN
	set v_baja = 'S';
END IF;


IF v_baja = 'S' THEN

	BEGIN -- baja
	  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	  BEGIN -- de excepcion
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al eliminar ficha_procedimientos','AMB_FICHA_PROCEDIMIENTOS_RS');
	  END; -- de excepcion

	  UPDATE ficha_procedimientos
		 SET fipr_baja_usu = p_user,
			 fipr_baja_f   = date(CURDATE())
	   WHERE fipr_fich_id = p_fipr_fich_id
	   AND fipr_proce_id  = p_fipr_proce_id;
	END;
                
ELSE  
	IF p_fipr_proce_id = 0 THEN

		  BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_procedimientos','AMB_FICHA_PROCEDIMIENTOS_RS');
			END; -- de excepcion
		
			INSERT INTO ficha_procedimientos (
			  fipr_fich_id,
			  fipr_proce_id,
			  fipr_texto,
			  fipr_alta_f,
			  fipr_alta_usu) 
			SELECT p_fipr_fich_id,
				  ifnull(max(fipr_proce_id),0) + 1,
				  trim(p_fipr_texto),
				  date(CURDATE()),
				  p_user
			FROM ficha_procedimientos
			WHERE fipr_fich_id  = p_fipr_fich_id; 
			
		  END; -- alta
	ELSE -- no es alta
			BEGIN -- modifica
			  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			  BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update ficha_procedimientos','AMB_FICHA_PROCEDIMIENTOS_RS');
			  END; -- de excepcion

			  UPDATE ficha_procedimientos
				 SET fipr_texto     = trim(p_fipr_texto),
					 fipr_baja_f    = null
			   WHERE fipr_fich_id = p_fipr_fich_id
			   AND fipr_proce_id  = p_fipr_proce_id;
			END;
	  -- DBMS_OUTPUT.PUT_LINE('Log...'||trim(p_user)||'-'||upper(trim(P_TIDC_CODIGO))||'-'|| v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
	  -- A_LOG_ficha_procedimientosS(trim(p_user), upper(trim(P_TIDC_CODIGO)), v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
	  END IF;
END IF;

/*
INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
	
values  (p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'ficha_procedimientos',
		concat('ficha_procedimientos ',p_cata_deno),
		now());
    */
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AMB_FICHA_RECURSOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AMB_FICHA_RECURSOS_RS`(
  IN p_user varchar(50),
  IN p_fire_fich_id int,
  IN p_fire_recurso_id int,
  IN p_fire_texto varchar(900),
  IN p_fire_baja varchar(5)
)
BEGIN

DECLARE v_respuesta varchar(100) DEFAULT 'OK';
DECLARE v_errores varchar(2000) DEFAULT NULL;
DECLARE v_baja char(1) DEFAULT 'N';


IF p_fire_baja = 'on' THEN
	set v_baja = 'S';
END IF;
IF trim(p_fire_texto) = '' or p_fire_texto is null THEN
	set v_baja = 'S';
END IF;


IF v_baja = 'S' THEN

	BEGIN -- baja
	  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	  BEGIN -- de excepcion
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al eliminar ficha_procedimientos','AMB_FICHA_RECURSOS_RS');
	  END; -- de excepcion

	  UPDATE ficha_recursos
		 SET fire_baja_usu = p_user,
			 fire_baja_f   = date(CURDATE())
	   WHERE fire_fich_id = p_fire_fich_id
	   AND fire_recurso_id  = p_fire_recurso_id;
	END;
                
ELSE  
	IF p_fire_recurso_id = 0 THEN

		  BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_procedimientos','AMB_FICHA_RECURSOS_RS');
			END; -- de excepcion
		
			INSERT INTO ficha_recursos (
			  fire_fich_id,
			  fire_recurso_id,
			  fire_texto,
			  fire_alta_f,
			  fire_alta_usu) 
			SELECT p_fire_fich_id,
				  ifnull(max(fire_recurso_id),0) + 1,
				  trim(p_fire_texto),
				  date(CURDATE()),
				  p_user
			FROM ficha_recursos
			WHERE fire_fich_id  = p_fire_fich_id; 
			
		  END; -- alta
	ELSE -- no es alta
			BEGIN -- modifica
			  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			  BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update ficha_procedimientos','AMB_FICHA_RECURSOS_RS');
			  END; -- de excepcion

			  UPDATE ficha_recursos
				 SET fire_texto     = trim(p_fire_texto),
					 fire_baja_f    = null
			   WHERE fire_fich_id = p_fire_fich_id
			   AND fire_recurso_id  = p_fire_recurso_id;
			END;
            
	  END IF;
END IF;


COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_CATALOGO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_CATALOGO_RS`(
  IN p_user varchar(50),
  IN p_cata_id int,
  IN p_cata_deno varchar(500),
  IN p_cata_deno_redu varchar(500)
)
BEGIN
  DECLARE v_cata_id int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  
IF NOT EXISTS (SELECT 1 FROM catalogo
                    WHERE cata_id = p_cata_id) THEN
      BEGIN -- alta
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN -- de excepcion
        	ROLLBACK;
            SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert catalogo','AM_CATALOGO_RS');
        END; -- de excepcion
        
        INSERT INTO catalogo (
          cata_deno,
          cata_deno_redu,
          cata_alta_f,
          cata_alta_usu)
        VALUES (
          p_cata_deno,
          p_cata_deno_redu,
          date(CURDATE()),
          p_user);
      END; -- alta
ELSE -- no es alta
        BEGIN -- modifica
          DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
          BEGIN -- de excepcion
          	ROLLBACK;
          	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update catalogo','AM_CATALOGO_RS');
          END; -- de excepcion

          UPDATE catalogo
             SET cata_deno      = p_cata_deno,
				 cata_deno_redu = p_cata_deno_redu,
                 cata_baja_f    = null
           WHERE cata_id = p_cata_id;
        END;
  -- DBMS_OUTPUT.PUT_LINE('Log...'||trim(p_user)||'-'||upper(trim(P_TIDC_CODIGO))||'-'|| v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  -- A_LOG_CATALOGOS(trim(p_user), upper(trim(P_TIDC_CODIGO)), v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  END IF;


INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
	
values  (p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'catalogo',
		concat('Catalogo ',p_cata_deno),
		now());
    
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FASE_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FASE_RS`(
	IN p_user varchar(50),
    IN p_fase_id int,
    IN p_fase_deno varchar(500),
    IN p_fase_deno_redu varchar (500)
)
BEGIN
	DECLARE v_fase_id int;
	DECLARE v_respuesta varchar(100) DEFAULT 'OK';
	DECLARE v_errores varchar (2000) DEFAULT 'NULL';
		
	IF NOT EXISTS (SELECT 1 FROM fase 
							where fase_id = p_fase_id) THEN
		BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert catalogo','AM_FASE_RS');
			END; -- de excepcion
		
		INSERT INTO fase (
			fase_deno,
			fase_deno_redu,
			fase_alta_f,
			fase_alta_usu)
			VALUES (
			p_fase_deno,
			p_fase_deno_redu,
			date(CURDATE()),
			p_user);
		END; -- alta

	ELSE -- no es alta
		
		BEGIN -- modifica
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update catalogo','AM_FASE_RS');
			END; -- de excepcion

			UPDATE fase
				 SET fase_deno      = p_fase_deno,
					 fase_deno_redu = p_fase_deno_redu,
					 fase_baja_f    = null
			WHERE fase_id = p_fase_id;
		END;
	  
	END IF;

INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
		
	values  (p_user,
			1,
			1,
			'ACTUALIZA',
			LAST_INSERT_ID(),
			'fase',
			concat('fase ',p_fase_deno),
			now());
		
	COMMIT;
	  
	SELECT v_respuesta as respuesta,
			 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
	FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FICHA_FASES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FICHA_FASES_RS`(
  IN p_user varchar(50),
  IN p_fich_id varchar(20),
  IN p_lista_fases_apli varchar(500)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE v_sql varchar(1000);
  DECLARE v_lista varchar(500) DEFAULT p_lista_fases_apli;

-- call AM_FICHA_FASES_RS('admin','2','1,2,')
  
-- Borro todas y repongo las Ok
BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al delete ficha_fases','AM_FICHA_FASES_RS');
	END; 
	    
	DELETE from ficha_fases
	where fifa_fich_id = p_fich_id;
END; 

BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert temp #lisfas','AM_FICHA_FASES_RS');
	END; 
	
	set v_lista = left(v_lista,length(v_lista) - 1);
	set v_lista = concat('INSERT INTO lisfas VALUES (',replace(v_lista,',','),('),');');
	DROP TEMPORARY TABLE IF EXISTS lisfas;
	CREATE TEMPORARY TABLE lisfas (fase int NULL);
	SET @query = v_lista;
	PREPARE stmt FROM @query;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END;


BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_fases','AM_FICHA_FASES_RS');
	END; 
    
    
    INSERT INTO ficha_fases (fifa_fich_id,
								fifa_fase_id,
								fifa_alta_f,
								fifa_alta_usu) 
	  select  p_fich_id,
			  lisfas.fase,
			  date(CURDATE()),
			  p_user
		from lisfas;
END;


  IF v_respuesta = 'OK' THEN
  	 
	 INSERT INTO usu_accesos_log (usal_usua_nombre,usal_empre,usal_clave,usal_codigo_char,usal_vistas,usal_alta_f)
        VALUES  (p_fich_id,1,'ACTUALIZA',0,concat('Incruye fase ',' fases (',v_lista,')'),now());
  ELSE
     SET v_respuesta := 'No se puede concretar la operacion : '||v_errores; 
  END IF;
  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FICHA_MEDIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FICHA_MEDIOS_RS`(
  IN p_user varchar(50),
  IN p_fich_id varchar(20),
  IN p_lista_medios_apli varchar(500)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE v_sql varchar(1000);
  DECLARE v_lista varchar(500) DEFAULT p_lista_medios_apli;

-- call AM_FICHA_MEDIOS_RS('admin','2','1,2,')
  
-- Borro todas y repongo las Ok
BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al delete ficha_fases','AM_FICHA_MEDIOS_RS');
	END; 
	    
	DELETE from ficha_medios
	where fime_fich_id = p_fich_id;
END; 

BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert temp #lisfas','AM_FICHA_MEDIOS_RS');
	END; 
	
	set v_lista = left(v_lista,length(v_lista) - 1);
	set v_lista = concat('INSERT INTO lismedi VALUES (',replace(v_lista,',','),('),');');
	DROP TEMPORARY TABLE IF EXISTS lismedi;
	CREATE TEMPORARY TABLE lismedi (medi int NULL);
	SET @query = v_lista;
	PREPARE stmt FROM @query;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END;


BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_fases','AM_FICHA_MEDIOS_RS');
	END; 
    
    
    INSERT INTO ficha_medios (fime_fich_id,
								fime_medi_id,
								fime_alta_f,
								fime_alta_usu) 
	  select  p_fich_id,
			  lismedi.medi,
			  date(CURDATE()),
			  p_user
		from lismedi;
END;


  IF v_respuesta = 'OK' THEN
  	 
	 INSERT INTO usu_accesos_log (usal_usua_nombre,usal_empre,usal_clave,usal_codigo_char,usal_vistas,usal_alta_f)
        VALUES  (p_fich_id,1,'ACTUALIZA',0,concat('Incluye medio ',' medios (',v_lista,')'),now());
  ELSE
     SET v_respuesta := 'No se puede concretar la operacion : '||v_errores; 
  END IF;
  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FICHA_RS`(
  IN p_user varchar(50),
  IN p_fich_id int,
  IN p_fich_deno varchar(500),
  IN p_fich_desc varchar(500),
  IN p_fich_cata_id int,
  OUT out_id int
)
BEGIN
  DECLARE v_fich_id_dup int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE out_id  int;
 
  
-- valildo que no haya otra denominacion igual
select fich_id into v_fich_id_dup 
				from ficha
		where fich_deno like trim(p_fich_deno)
				and (fich_id != p_fich_id or p_fich_id is null);

	if v_fich_id_dup is not null then
	  set v_respuesta = concat('Esta denominacion ya existe para ficha ',v_fich_id_dup);
	end if;
  
if v_respuesta = 'OK' then   
	-- call AM_FICHA_RS('mariano',1,'Ficha uno',3)
	IF NOT EXISTS (SELECT 1 FROM ficha
						WHERE fich_id = p_fich_id) THEN
		  BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha','AM_FICHA_RS');
			END; -- de excepcion
			
			INSERT INTO ficha (
			  fich_id,
			  fich_deno,
              fich_desc,
			  fich_cata_id,
			  fich_alta_f,
			  fich_alta_usu)
			VALUES (
			  p_fich_id,
			  p_fich_deno,
              p_fich_desc,
			  p_fich_cata_id,
			  date(CURDATE()),
			  p_user);
		
		  END; -- alta
		  
	ELSE -- no es alta
			BEGIN -- modifica
			  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
			  BEGIN -- de excepcion
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update ficha','AM_FICHA_RS');
			  END; -- de excepcion

			  UPDATE ficha
				 SET fich_deno      = p_fich_deno,
					 fich_desc 		= p_fich_desc,
					 fich_cata_id 	= p_fich_cata_id,
					 fich_baja_f    = null
			   WHERE fich_id = p_fich_id;
		  
			END; 
		  
	  END IF;


	/* INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
		
	values  (p_user,
			1,
			1,
			'ACTUALIZA',
			LAST_INSERT_ID(),
			'catalogo',
			concat('Catalogo ',p_cata_deno),
			now());
	  */  
	COMMIT;
    
end if;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito, 
         case when v_respuesta = 'OK' then  (select  LAST_INSERT_ID()) else '' end as respuesta_id
    FROM DUAL;
 

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FICHA_TAMANIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FICHA_TAMANIOS_RS`(
  IN p_user varchar(50),
  IN p_fich_id varchar(20),
  IN p_lista_tamanios_apli varchar(500)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE v_sql varchar(1000);
  DECLARE v_lista varchar(500) DEFAULT p_lista_tamanios_apli;

-- call AM_FICHA_TAMANIOS_RS('admin','2','1,2,')
  
-- Borro todas y repongo las Ok
BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al delete ficha_fases','AM_FICHA_TAMANIOS_RS');
	END; 
	    
	DELETE from ficha_tamanio
	where fita_fich_id = p_fich_id;
END; 

BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert temp #lisfas','AM_FICHA_TAMANIOS_RS');
	END; 
	
	set v_lista = left(v_lista,length(v_lista) - 1);
	set v_lista = concat('INSERT INTO listama VALUES (',replace(v_lista,',','),('),');');
	DROP TEMPORARY TABLE IF EXISTS listama;
	CREATE TEMPORARY TABLE listama (tama int NULL);
	SET @query = v_lista;
	PREPARE stmt FROM @query;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END;


BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_fases','AM_FICHA_TAMANIOS_RS');
	END; 
    
    
    INSERT INTO ficha_tamanio (fita_fich_id,
								fita_tama_id,
								fita_alta_f,
								fita_alta_usu) 
	  select  p_fich_id,
			  listama.tama,
			  date(CURDATE()),
			  p_user
		from listama;
END;


  IF v_respuesta = 'OK' THEN
  	 
	 INSERT INTO usu_accesos_log (usal_usua_nombre,usal_empre,usal_clave,usal_codigo_char,usal_vistas,usal_alta_f)
        VALUES  (p_fich_id,1,'ACTUALIZA',0,concat('Incluye tamanio ',' tamanios (',v_lista,')'),now());
  ELSE
     SET v_respuesta := 'No se puede concretar la operacion : '||v_errores; 
  END IF;
  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_FICHA_TIPOLOGIAS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_FICHA_TIPOLOGIAS_RS`(
  IN p_user varchar(50),
  IN p_fich_id varchar(20),
  IN p_lista_tipologias_apli varchar(500)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE v_sql varchar(1000);
  DECLARE v_lista varchar(500) DEFAULT p_lista_tipologias_apli;

-- call AM_FICHA_TIPOLOGIAS_RS('admin','2','1,2,')
  
-- Borro todas y repongo las Ok
BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al delete ficha_fases','AM_FICHA_TIPOLOGIAS_RS');
	END; 
	    
	DELETE from ficha_tipologias
	where fiti_fich_id = p_fich_id;
END; 

BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert temp #lisfas','AM_FICHA_TIPOLOGIAS_RS');
	END; 
	
	set v_lista = left(v_lista,length(v_lista) - 1);
	set v_lista = concat('INSERT INTO listipo VALUES (',replace(v_lista,',','),('),');');
	DROP TEMPORARY TABLE IF EXISTS listipo;
	CREATE TEMPORARY TABLE listipo (tipo int NULL);
	SET @query = v_lista;
	PREPARE stmt FROM @query;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END;


BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert ficha_fases','AM_FICHA_TIPOLOGIAS_RS');
	END; 
    
    
    INSERT INTO ficha_tipologias (fiti_fich_id,
								fiti_tipo_id,
								fiti_alta_f,
								fiti_alta_usu) 
	  select  p_fich_id,
			  listipo.tipo,
			  date(CURDATE()),
			  p_user
		from listipo;
END;


  IF v_respuesta = 'OK' THEN
  	 
	 INSERT INTO usu_accesos_log (usal_usua_nombre,usal_empre,usal_clave,usal_codigo_char,usal_vistas,usal_alta_f)
        VALUES  (p_fich_id,1,'ACTUALIZA',0,concat('Incluye tipologias ',' tipologias (',v_lista,')'),now());
  ELSE
     SET v_respuesta := 'No se puede concretar la operacion : '||v_errores; 
  END IF;
  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_MEDIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_MEDIO_RS`(
	IN p_user varchar(50),
	IN p_medio_id int,
	IN p_medio_deno varchar(500),
	IN p_medio_deno_redu varchar(500)
)
BEGIN
	DECLARE v_medio_id int; 
	DECLARE v_respuesta varchar(100) DEFAULT 'OK';
	DECLARE v_errores varchar(2000) DEFAULT NULL;
    
    IF NOT EXISTS (SELECT 1 FROM medio WHERE medi_id = p_medio_id) THEN
		BEGIN -- alta
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION -- excepcion
			BEGIN
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert medio','AM_MEDIO_RS');
			END;
		
			INSERT INTO medio (
				medi_deno,
				medi_deno_redu,
				medi_alta_f,
				medi_alta_usu)
			VALUES (
				p_medio_deno,
				p_medio_deno_redu,
				date(CURDATE()),
				p_user);
		END;
	ELSE
		BEGIN -- modifica
			DECLARE CONTINUE HANDLER FOR SQLEXCEPTION -- excepcion
			BEGIN
				ROLLBACK;
				SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al actualizar medio','AM_MEDIO_RS');
			END;
			
            UPDATE medio
			SET medi_deno      = p_medio_deno,
			medi_deno_redu = p_medio_deno_redu,
			medi_baja_f    = null
			WHERE medi_id = p_medio_id;
        END;
END IF;
	
    INSERT INTO usu_accesos_log (
		usal_usua_nombre,usal_orden,
		usal_empre,usal_clave,
		usal_codigo_number,
		usal_codigo_char,
		usal_vistas,
		usal_alta_f)
	VALUES  (
		p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'medio',
		concat('Medio ',p_medio_deno),
		now());
    COMMIT;
	SELECT v_respuesta as respuesta,
		CASE WHEN v_respuesta = 'OK'
		THEN 'Actualización correcta'
		ELSE'' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_TAMANIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_TAMANIO_RS`( 
  IN p_user varchar(50),
  IN p_tama_id int,
  IN p_tama_deno varchar(500),
  IN p_tama_deno_redu varchar(500)
)
BEGIN
  DECLARE v_tama_id int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  
IF NOT EXISTS (SELECT 1 FROM tamanio
                    WHERE tama_id = p_tama_id) THEN
      BEGIN -- alta
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN -- de excepcion
        	ROLLBACK;
            SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert tamanio','AM_TAMANIO_RS');
        END; -- de excepcion
        
        INSERT INTO tamanio (
          tama_deno,
          tama_deno_redu,
          tama_alta_f,
          tama_alta_usu)
        VALUES (
          p_tama_deno,
          p_tama_deno_redu,
          date(CURDATE()),
          p_user);
      END; -- alta
ELSE -- no es alta
        BEGIN -- modifica
          DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
          BEGIN -- de excepcion
          	ROLLBACK;
          	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update tamaño','AM_TAMANIO_RS');
          END; -- de excepcion

          UPDATE tamanio
             SET tama_deno      = p_tama_deno,
				 tama_deno_redu = p_tama_deno_redu,
                 tama_baja_f    = null
           WHERE tama_id = p_tama_id;
        END;
  -- DBMS_OUTPUT.PUT_LINE('Log...'||trim(p_user)||'-'||upper(trim(P_TIDC_CODIGO))||'-'|| v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  -- A_LOG_CATALOGOS(trim(p_user), upper(trim(P_TIDC_CODIGO)), v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  END IF;

INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
	
values  (p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'tamanio',
		concat('Tamaño ',p_tama_deno),
		now());
    
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AM_TIPOLOGIA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AM_TIPOLOGIA_RS`(
  IN p_user varchar(50),
  IN p_tipo_id int,
  IN p_tipo_deno varchar(500),
  IN p_tipo_deno_redu varchar(500)
)
BEGIN
  DECLARE v_tipo_id int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  
IF NOT EXISTS (SELECT 1 FROM tipologia
                    WHERE tipo_id = p_tipo_id) THEN
      BEGIN -- alta
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN -- de excepcion
        	ROLLBACK;
            SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert tipo','AM_TIPOLOGIA_RS');
        END; -- de excepcion
        
        INSERT INTO tipologia (
          tipo_deno,
          tipo_deno_redu,
          tipo_alta_f,
          tipo_alta_usu)
        VALUES (
          p_tipo_deno,
          p_tipo_deno_redu,
          date(CURDATE()),
          p_user);
      END; -- alta
ELSE -- no es alta
        BEGIN -- modifica
          DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
          BEGIN -- de excepcion
          	ROLLBACK;
          	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update tamaño','AM_TIPOLOGIA_RS');
          END; -- de excepcion

          UPDATE tipologia
             SET tipo_deno      = p_tipo_deno,
				 tipo_deno_redu = p_tipo_deno_redu,
                 tipo_baja_f    = null
           WHERE tipo_id = p_tipo_id;
        END;
  -- DBMS_OUTPUT.PUT_LINE('Log...'||trim(p_user)||'-'||upper(trim(P_TIDC_CODIGO))||'-'|| v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  -- A_LOG_CATALOGOS(trim(p_user), upper(trim(P_TIDC_CODIGO)), v_log||' de tipo de documento : '||initcap(trim(P_TIDC_DESCRIPCION)));
  END IF;


INSERT INTO usu_accesos_log (usal_usua_nombre,usal_orden,usal_empre,usal_clave,usal_codigo_number,usal_codigo_char,usal_vistas,usal_alta_f)
	
values  (p_user,
		1,
		1,
		'ACTUALIZA',
		LAST_INSERT_ID(),
		'tipologia',
		concat('Tamaño ',p_tipo_deno),
		now());
    
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_CATALOGO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_CATALOGO_RS`(
  IN p_user varchar(50),
  IN p_cata_id int
)
BEGIN
 DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  

BEGIN 
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
  BEGIN -- de excepcion
	ROLLBACK;
	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja catalogo','B_CATALOGO_RS');
  END; -- de excepcion

  UPDATE catalogo
	 SET cata_baja_f    = date(CURDATE()),
		 cata_baja_usu  = p_user
   WHERE cata_id = p_cata_id;
END;
 
COMMIT;

SELECT v_respuesta as respuesta,
	 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
FROM DUAL;  

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_FASE_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_FASE_RS`(
  IN p_user varchar(50),
  IN p_fase_id int
)
BEGIN
	DECLARE v_respuesta varchar(100) DEFAULT 'OK';
    
	BEGIN
		DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN -- de excepcion
			ROLLBACK;
			SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja catalogo','B_FASE_RS');
		END; -- de excepcion

		UPDATE fase
		 SET fase_baja_f    = date(CURDATE()),
			 fase_baja_usu  = p_user
		WHERE fase_id = p_fase_id;
	END;
	 
	COMMIT;

	SELECT v_respuesta as respuesta,
		 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
	FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_FICHA_RS`(
  IN p_user varchar(50),
  IN p_fich_id int
)
BEGIN
	DECLARE v_respuesta varchar(100) DEFAULT 'OK';
    
	BEGIN
		DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN -- de excepcion
			ROLLBACK;
			SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja catalogo','B_FICHA_RS');
		END; -- de excepcion

		UPDATE ficha
		 SET fich_baja_f    = date(CURDATE()),
			 fich_baja_usu  = p_user
		WHERE fich_id = p_fich_id;
	END;
	 
	COMMIT;

	SELECT v_respuesta as respuesta,
		 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
	FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_MEDIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_MEDIO_RS`(
	IN p_user varchar(50),
	IN p_medio_id int
)
BEGIN
	DECLARE v_respuesta varchar(100) DEFAULT 'OK';
	BEGIN 
		DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN -- de excepcion
			ROLLBACK;
			SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja medio','B_TAMANIO_RS');
		END; -- de excepcion
		UPDATE medio
		SET medi_baja_f    = date(CURDATE()),
		medi_baja_usu  = p_user
		WHERE medi_id = p_medio_id;
	END;
	COMMIT;
	SELECT v_respuesta as respuesta,
	case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
	FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_TAMANIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_TAMANIO_RS`(
	IN p_user varchar(50),
	IN p_tama_id int
)
BEGIN
 DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  

BEGIN 
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
  BEGIN -- de excepcion
	ROLLBACK;
	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja tamaño','B_TAMANIO_RS');
  END; -- de excepcion

  UPDATE tamanio
	 SET tama_baja_f    = date(CURDATE()),
		 tama_baja_usu  = p_user
   WHERE tama_id = p_tama_id;
END;
 
COMMIT;

SELECT v_respuesta as respuesta,
	 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
FROM DUAL;  

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `B_TIPOLOGIA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `B_TIPOLOGIA_RS`(
  IN p_user varchar(50),
  IN p_tipo_id int
)
BEGIN
 DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  

BEGIN 
  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
  BEGIN -- de excepcion
	ROLLBACK;
	SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno baja tipologia','B_TIPOLOGIA_RS');
  END; -- de excepcion

  UPDATE tipologia
	 SET tipo_baja_f    = date(CURDATE()),
		 tipo_baja_usu  = p_user
   WHERE tipo_id = p_tipo_id;
END;
 
COMMIT;

SELECT v_respuesta as respuesta,
	 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
FROM DUAL;  

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_ABM_FICHA_OPCIONES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ABM_FICHA_OPCIONES_RS`()
BEGIN

select  'NF' as tabla , 'Nombre de ficha' as deno
UNION
select  'DF' as tabla , 'Descrip ficha' as deno
UNION
select  'PR' as tabla , 'Procedimientos' as deno
UNION
select  'FU' as tabla , 'Fuentes' as deno
UNION
select  'RE' as tabla , 'Recurso' as deno;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_ABM_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_ABM_FICHA_RS`(
    IN p_user char(50),
	IN p_cata_id int,
    IN p_fase_id int,
    IN p_medi_id int,
    IN p_tipo_id int,
    IN p_tama_id int,
    IN p_tabla char(2),
    IN p_descri varchar(50))
BEGIN

DECLARE v_descri varchar(100);
DECLARE v_sql varchar(2000);
-- call GET_ABM_FICHA_RS ('admin',0,1,0,0,1,'NF','manipula')
-- call GET_ABM_FICHA_RS ('admin',1,0,0,0,0,'NF','manipula')
-- GET_ABM_FICHA_RS('admin', '0','0','0','0','0','RE','escombros')
-- tabla ( de que tabla busco la descrip) :
--  NF=Nombre ficha , DF=descr ficha, PR=proc FU=fuentes, RE=recurso

set v_sql = 'SELECT fich_id,
		   f_proper(cata_deno) as cata_deno,
		   f_proper(fich_deno) as fich_deno,
           fich_desc 
	FROM ficha, catalogo
	WHERE fich_cata_id = cata_id
    AND (fich_cata_id = p_cata_id or p_cata_id = 0)
    AND fich_baja_f is null
    AND (exists(select 1 from ficha_fases
			    where fifa_fich_id = fich_id
                and   fifa_fase_id = p_fase_id
                and   fifa_baja_f is null) or (p_fase_id = 0))
    AND (exists(select 1 from ficha_medios
			    where fime_fich_id = fich_id
                and   fime_medi_id = p_medi_id
                and   fime_baja_f is null) or (p_medi_id = 0))  
	AND (exists(select 1 from ficha_tipologias
			    where fiti_fich_id = fich_id
                and   fiti_tipo_id = p_tipo_id
                and   fiti_baja_f is null) or (p_tipo_id = 0))
	AND (exists(select 1 from ficha_tamanio
			    where fita_fich_id = fich_id
                and   fita_tama_id = p_tama_id
                and   fita_baja_f is null) or (p_tama_id = 0)) 
    ';



SET v_sql = REPLACE(v_sql, 'p_cata_id', p_cata_id);
SET v_sql = REPLACE(v_sql, 'p_fase_id', p_fase_id);
SET v_sql = REPLACE(v_sql, 'p_medi_id', p_medi_id);
SET v_sql = REPLACE(v_sql, 'p_tipo_id', p_tipo_id);
SET v_sql = REPLACE(v_sql, 'p_tama_id', p_tama_id);

if p_descri <> '' and p_descri is not null then
	set v_descri = concat("'%",rtrim(p_descri),"%'");

    if p_tabla = 'NF' then 
		set v_sql = concat(v_sql,' AND fich_deno like ',v_descri) ;
	end if;
    if p_tabla = 'DF' then 
		set v_sql = concat(v_sql,' AND fich_desc like ',v_descri) ;
	end if;
    if p_tabla = 'PR' then 
		set v_sql = concat(v_sql,' AND exists(select 1 from ficha_procedimientos 
 			    where fipr_fich_id = fich_id
                 and  fipr_texto like ',v_descri,'
                 and  fipr_baja_f is null)') ;
                 
	end if;
    if p_tabla = 'FU' then 
         set v_sql = concat(v_sql,' AND exists(select 1 from ficha_fuentes
 			    where fifu_fich_id = fich_id
                 and  fifu_texto like ',v_descri,'
                 and  fifu_baja_f is null)');
	end if;
               
    if p_tabla = 'RE' then 
		set v_sql = concat(v_sql,' AND exists(select 1 from ficha_recursos
 			    where fire_fich_id = fich_id
                 and  fire_texto like ',v_descri,'
                 and  fire_baja_f is null)');
    end if;

end if;

set v_sql = concat(v_sql,' ORDER BY 2;');

-- select v_sql;

SET @query = v_sql;
PREPARE stmt FROM @query;
EXECUTE stmt;
DEALLOCATE PREPARE stmt; 


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_CAMP_PAISES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_CAMP_PAISES_RS`(
  IN p_pais int
)
BEGIN
SELECT cpai_id_pais, 
	   case cpai_id_pais when 0 then '( No informado )' else f_proper(cpai_pais) end as cpai_pais 
FROM camp_paises
WHERE (cpai_pais = p_pais or p_pais is null)
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_CATALOGO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_CATALOGO_RS`(
  IN p_cata_id int,
  IN p_todos char(1)
)
BEGIN
SELECT cata_id, 
	   f_proper(cata_deno) as cata_deno,
       f_proper(cata_deno_redu) as cata_deno_redu
FROM catalogo
WHERE (cata_id = p_cata_id or p_cata_id is null)
AND cata_baja_f is null
UNION
select 0 as cata_id,
		'(todos)' as cata_deno,
        '(todos)' as cata_deno_redu
        from dual
        where p_todos ='S'
UNION
select 0 as cata_id,
		'(seleccionar)' as cata_deno,
        '(seleccionar)' as cata_deno_redu
        from dual
        where p_todos ='V'
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_FASE_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FASE_RS`(
	IN p_fase_id int,
	IN p_todos char(1)
    )
BEGIN
	SELECT fase_id,
		   f_proper(fase_deno) as fase_deno,
           f_proper(fase_deno_redu) as fase_deno_redu

	FROM fase
    WHERE (fase_id = p_fase_id or p_fase_id is null)
    AND fase_baja_f is null
    UNION
		select 0 as fase_id,
		'(todos)' as fase_deno,
        '(todos)' as fase_deno_redu
        from dual
        where p_todos ='S'
    ORDER BY 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_FICHA_FUENTES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FICHA_FUENTES_RS`(
  IN p_fich_id int
)
BEGIN
SELECT fifu_fuen_id,
    fifu_texto,
    fifu_alta_f,
    fifu_alta_usu
FROM ficha_fuentes
WHERE (fifu_fich_id = p_fich_id)
AND fifu_baja_f is null
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_FICHA_PROCEDIMIENTOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FICHA_PROCEDIMIENTOS_RS`(
  IN p_fich_id int
)
BEGIN
SELECT fipr_proce_id,
    fipr_texto,
    fipr_alta_f,
    fipr_alta_usu
FROM ficha_procedimientos
WHERE (fipr_fich_id = p_fich_id)
AND fipr_baja_f is null
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_FICHA_RECURSOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FICHA_RECURSOS_RS`(
  IN p_fich_id int
)
BEGIN
SELECT fire_recurso_id,
    fire_texto,
    fire_alta_f,
    fire_alta_usu
FROM ficha_recursos
WHERE (fire_fich_id = p_fich_id)
AND fire_baja_f is null
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_FICHA_RS`(
  IN p_fich_id int
)
BEGIN
SELECT fich_id,
    fich_deno,
    fich_desc,
    fich_cata_id,
    fich_alta_f,
    fich_alta_usu,
	cata_deno
FROM ficha
  left outer join catalogo on fich_cata_id = cata_id
WHERE (fich_id = p_fich_id or p_fich_id is null)
AND fich_baja_f is null
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_MEDIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_MEDIO_RS`(
	IN p_medio_id int,
    IN p_todos char (1)
)
BEGIN
	SELECT medi_id,
	f_proper(medi_deno) as medi_deno,
    f_proper(medi_deno_redu) as medi_deno_redu
	FROM medio
    WHERE (medi_id = p_medio_id or p_medio_id is null)
    AND medi_baja_f is null
    UNION
		select 0 as medi_id,
		'(todos)' as medi_deno,
        '(todos)' as medi_deno_redu
        from dual
        where p_todos ='S'
    
    ORDER BY 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_PARAMETROS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_PARAMETROS_RS`(
  IN p_empre int,
  IN p_para_clave varchar(30)
)
BEGIN

SELECT para_valor_n, para_valor_c
FROM parametros
WHERE para_clave = p_para_clave;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_TAMANIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TAMANIO_RS`(
	IN p_tama_id int,
	IN p_todos char(1)
)
BEGIN
	SELECT tama_id,
		   f_proper(tama_deno) as tama_deno,
           f_proper(tama_deno_redu) as tama_deno_redu

	FROM tamanio
    WHERE (tama_id = p_tama_id or p_tama_id is null)
    AND tama_baja_f is null
    UNION
		select 0 as tama_id,
		'(todos)' as tama_deno,
        '(todos)' as tama_deno_redu
        from dual
        where p_todos ='S'
    
    ORDER BY 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GET_TIPOLOGIA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_TIPOLOGIA_RS`(
  IN p_tipo_id int,
  IN p_todos char(1)
)
BEGIN
SELECT tipo_id, 
	   f_proper(tipo_deno) as tipo_deno,
       f_proper(tipo_deno_redu) as tipo_deno_redu
FROM tipologia
WHERE (tipo_id = p_tipo_id or p_tipo_id is null)
AND tipo_baja_f is null
 UNION
		select 0 as tipo_id,
		'(todos)' as tipo_deno,
        '(todos)' as tipo_deno_redu
        from dual
        where p_todos ='S'


order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_CAMP_INICIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_CAMP_INICIO`(
  IN p_id_alumno char(20))
BEGIN


select ccaa_cl_carrera,
ccar_id_materia,
  ccar_cohorte,
  ccar_asignatura,
  ccar_comision,
  ccar_hora_inicio,
  ccar_hora_fin,
  ccar_aula,
  F_PROPER(caul_edificio) as caul_edificio,
  F_PROPER(caul_direccion) as caul_direccion,
  F_PROPER(ccar_detalle) as ccar_detalle
from camp_alumnos 
	join camp_cartelera 
			on ccar_id_carrera = calu_id_carrera
	join camp_carrera
			on ccaa_id_carrera = calu_id_carrera
	left join camp_aulas
			on caul_id_aula = ccar_aula
where calu_id_alumno = '1716112725' 
 and ccar_fecha = STR_TO_DATE('29/08/2016','%d/%m/%Y') 
and exists(select 1 from camp_curso_alumno
			where cual_id_alumno= calu_id_alumno
            and cual_id_carrera = calu_id_carrera
            and cual_id_materia = ccar_id_materia);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_CAMP_LOCALIDADES_BUSCAR_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_CAMP_LOCALIDADES_BUSCAR_RS`(
  IN p_pais integer,
  IN p_provin integer,
  IN p_loca_opc integer,
  IN p_input char(100)
)
BEGIN 
declare v_input varchar(100) default p_input;




if p_loca_opc is null then
	if length(v_input) >= 2 then
		set v_input = concat('%',upper(rtrim(v_input)),'%');
		select cloc_id_localidad, F_PROPER(cloc_localidad) as loca_deno
		from camp_localidades
		where cloc_id_pais = p_pais
		and cloc_id_provincia = p_provin
		and upper(cloc_localidad) like v_input;
	else
        select 0, null as loca_deno
        from dual;
	end if;
else
	select cloc_id_localidad, F_PROPER(cloc_localidad) as loca_deno
		from camp_localidades
		where cloc_id_pais = p_pais
		and cloc_id_provincia = p_provin
		and cloc_id_localidad = p_loca_opc;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_CAMP_PROVINCIAS_DD_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_CAMP_PROVINCIAS_DD_RS`(
IN p_pais integer,
IN p_prov integer)
BEGIN

select  cprv_id_provincia,  
        case cprv_id_provincia when 0 then '( No informado )' else f_proper(cprv_provincia) end as cprv_provincia 
from camp_provincias
where cprv_id_pais = p_pais
 and (cprv_id_provincia = p_prov or p_prov is null)
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_DD_CAMP_PROVINCIAS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_DD_CAMP_PROVINCIAS_RS`(
IN p_pais integer,
IN p_prov integer)
BEGIN
select  cprv_id_provincia,  
        case cprv_id_provincia when 0 then '( No informado )' else f_proper(cprv_provincia) end as cprv_provincia 
from camp_provincias
where cprv_id_pais = p_pais
 and (cprv_id_provincia = p_prov or p_prov is null)
order by 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_FASES_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_FASES_FICHA_RS`(
IN p_fich_id integer)
BEGIN

-- call SEL_FASES_FICHA_RS(1)
select fase_id,
	fase_deno,
    case when fifa_alta_f is null then 'N' else 'S' end as si_no
from fase
	left outer join ficha_fases on fifa_fich_id = p_fich_id
							   and fifa_fase_id = fase_id 
where fase_baja_f is null 
order by 2;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_MEDIOS_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_MEDIOS_FICHA_RS`(
IN p_fich_id integer)
BEGIN

-- call SEL_MEDIOS_FICHA_RS(1)
select medi_id,
	medi_deno,
    case when fime_alta_f is null then 'N' else 'S' end as si_no
from medio
	left outer join ficha_medios on fime_fich_id = p_fich_id
							   and fime_medi_id = medi_id 
where medi_baja_f is null 
order by 2;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_TAMANIO_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_TAMANIO_FICHA_RS`(
IN p_fich_id integer)
BEGIN

 
select tama_id,
	tama_deno,
    case when fita_alta_f is null then 'N' else 'S' end as si_no
from tamanio
	left outer join ficha_tamanio on fita_fich_id = p_fich_id
							   and fita_tama_id = tama_id 
where tama_baja_f is null 
order by 2;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SEL_TIPOLOGIA_FICHA_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SEL_TIPOLOGIA_FICHA_RS`(
IN p_fich_id integer)
BEGIN

-- call SEL_MEDIOS_FICHA_RS(1)
select tipo_id,
	tipo_deno,
    case when fiti_alta_f is null then 'N' else 'S' end as si_no
from tipologia
	left outer join ficha_tipologias on fiti_fich_id = p_fich_id
							   and fiti_tipo_id = tipo_id 
where tipo_baja_f is null 
order by 2;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ABM_ROLES_ARMADO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ABM_ROLES_ARMADO_RS`(
  IN p_user varchar(50),
  IN p_apli varchar(10),
  IN p_rol  varchar(30),
  IN p_item_menu varchar(50),
  IN p_habilitado varchar(1)
)
BEGIN
  DECLARE v_respuesta varchar(500) DEFAULT 'OK';
  DECLARE v_log       varchar(200);
  DECLARE v_ahora     date;
  DECLARE v_orden     integer;
  
  SELECT now() INTO v_ahora FROM DUAL;
  IF p_habilitado = 'S' THEN
    
    SET v_log = CONCAT('Incluye item ', p_item_menu, ' en rol ', p_rol);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLSTATE '23000'
      BEGIN 
        ROLLBACK;
        UPDATE usu_menues_rol
           SET usmr_habilitado = 'S',
               usmr_fch_alta = NOW(),
               usmr_usr_alta = p_user
         WHERE usmr_usap_apli = UPPER(p_apli)
           AND usmr_usro_rol = UPPER(p_rol)
           AND usmr_item = p_item_menu;
      END; 
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'ERROR interno al insertar';
      END;
      INSERT INTO usu_menues_rol (
        usmr_usap_apli,
        usmr_usro_rol,
        usmr_item,
        usmr_habilitado,
        usmr_alta,
        usmr_baja,
        usmr_modif,            
        usmr_fch_alta,
        usmr_usr_alta)
      VALUES (
        UPPER(p_apli),
        UPPER(p_rol),
        p_item_menu,
        'S',
        'S',
        'S',
        'S',                                    
        NOW(),
        p_user
      );
    END;
           
  ELSE 
    SET v_log = CONCAT('Excluye item ', p_item_menu, ' en rol ', p_rol);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_respuesta = 'ERROR interno al actualizar';
      	SET v_log = 'NO';
      END; 
      UPDATE usu_menues_rol
         SET usmr_habilitado = 'N',
             usmr_fch_modi = NOW(),
             usmr_usr_modi = p_user
       WHERE usmr_usap_apli = upper(p_apli)
         AND usmr_usro_rol = upper(p_rol)
         AND usmr_item = p_item_menu;
    END;
  END IF; 
  IF v_log <> 'NO' THEN
    BEGIN
      SELECT IFNULL(MAX(usal_orden),0) + 1
        INTO v_orden
        FROM usu_accesos_log
       WHERE usal_fecha_hora = v_ahora
         AND usal_usua_nombre = p_user;
    END;
    BEGIN 
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_respuesta = 'ERROR interno al insertar en Accesos_Log';
      END; 
      INSERT INTO usu_accesos_log (
        usal_fecha_hora,
        usal_orden,
        usal_usua_nombre,
        usal_clave,
        usal_codigo_number,
        usal_codigo_char,
        usal_vistas,
        usal_habilitado,
        usal_fch_alta,
        usal_usr_alta)
      VALUES (
        v_ahora,
        v_orden,
        p_user,
        'ADMIN',
        0,
        p_rol,
        v_log,
        'S',
        NOW(),
        p_user
      );
    END;
  END IF;
  
  COMMIT;
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Rol actualizado correctamente' else '' end as respues_exito
    FROM DUAL;  
   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ABM_ROLES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ABM_ROLES_RS`(
  IN p_accion char,
  IN p_user varchar(50),
  IN p_rol varchar(30),
  IN p_obser varchar(200),
  IN p_usro_perm_pdf varchar(1),
  IN p_usro_perm_excel varchar(1),
  IN p_usro_perm_html varchar(1),
  IN p_usro_perm_modi varchar(1)
)
BEGIN
  DECLARE v_usu varchar(50);
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_log varchar(100);

  IF p_accion = 'B' THEN
    SET v_log = CONCAT('Baja Rol : ', UPPER(p_rol));
   
    BEGIN
      SELECT MAX(usru_usua_nombre) INTO v_usu
        FROM usu_roles_usuario
       WHERE usru_usro_rol = UPPER(p_rol)
         AND usru_habilitado= 'S';
    END;
    IF v_usu IS NULL THEN
      BEGIN
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN
          SET v_respuesta = 'Error en update ROLES';
        END;
        UPDATE usu_roles
           SET usro_habilitado = 'N',                
               usro_fch_modi   = NOW(),
               usro_usr_modi   = p_user
         WHERE UPPER(usro_rol) = UPPER(p_rol);
      END;
    ELSE
      SET v_respuesta = CONCAT(' Error: Desasigne este rol en usuarios previamente y reintente (', v_usu, ')');
    END IF;
  ELSE
    SET v_log = CONCAT('Alta Rol : ', UPPER(p_rol), ' obser:', p_obser);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLSTATE '23000'
      BEGIN 
        ROLLBACK;
        SET v_log = CONCAT('Modifica Rol : ', p_rol, ' obser:', p_obser);
        
        UPDATE usu_roles
           SET usro_habilitado = 'S',
               usro_observaciones = p_obser,
               usro_perm_pdf   = p_usro_perm_pdf, 
               usro_perm_excel = p_usro_perm_excel, 
               usro_perm_html  = p_usro_perm_html, 
               usro_perm_modi  = p_usro_perm_modi,                   
               usro_fch_alta   = NOW(),
               usro_usr_alta   = p_user
         WHERE UPPER(usro_rol) = UPPER(p_rol);
      END;
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error en insert ROLES';
      END;
      INSERT INTO usu_roles (
        usro_rol,
        usro_observaciones,
        usro_perm_pdf, 
        usro_perm_excel, 
        usro_perm_html, 
        usro_perm_modi,
        usro_habilitado,
        usro_fch_alta,
        usro_usr_alta)
      VALUES (
        UPPER(p_rol),
        p_obser,
        p_usro_perm_pdf, 
        p_usro_perm_excel, 
        p_usro_perm_html, 
        p_usro_perm_modi,
        'S',
        NOW(),
        p_user
      );
    END;
  END IF;
  IF v_log = 'OK' THEN
    BEGIN 
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_respuesta = 'ERROR interno al insertar en Accesos_Log';
      END; 
      INSERT INTO usu_accesos_log (
        usal_fecha_hora,
        usal_orden,
        usal_usua_nombre,
        usal_clave,
        usal_codigo_number,
        usal_codigo_char,
        usal_vistas,
        usal_habilitado,
        usal_fch_alta,
        usal_usr_alta)
      VALUES (
        NOW(),
        0,
        p_user,
        'ADMIN',
        0,
        UPPER(p_rol),
        v_log,
        'S',
        NOW(),
        p_user
      );
    END;
  END IF;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Rol actualizado correctamente' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ABM_ROLES_USUARIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ABM_ROLES_USUARIO_RS`(
  IN p_user        varchar(50),
  IN p_usua_nombre varchar(50),
  IN p_rol         varchar(30),
  IN p_habilitado  varchar(1)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_log       varchar(100);
  DECLARE v_ahora     date;
  DECLARE v_orden     integer;
  SET v_ahora = NOW();
  IF p_habilitado = 'S' THEN
    SET v_log = CONCAT('Habilita rol ', p_rol);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLSTATE '23000'
      BEGIN 
        ROLLBACK;
        UPDATE usu_roles_usuario
           SET usru_habilitado = 'S',
               usru_fch_alta = NOW(),
               usru_usr_alta = p_user
         WHERE usru_usua_nombre = TRIM(LOWER(p_usua_nombre))
           AND usru_usro_rol = p_rol;
      END; 
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'ERROR interno al insertar';
      END;
      INSERT INTO usu_roles_usuario (
        usru_usua_nombre,
        usru_usro_rol,
        usru_habilitado,
        usru_fch_alta,
        usru_usr_alta)
      VALUES (
        TRIM(LOWER(p_usua_nombre)),
        p_rol,
        'S',
        NOW(),
        p_user
      );
    END;
  ELSE 
    SET v_log = CONCAT('Revoca rol ', p_rol);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_log = 'NO';
      END; 
      UPDATE usu_roles_usuario
         SET usru_habilitado = 'N',
             usru_fch_modi = NOW(),
             usru_usr_modi = p_user
       WHERE usru_usua_nombre = TRIM(LOWER(p_usua_nombre))
         AND usru_usro_rol = p_rol;
    END;
            
  END IF;
  IF v_log <> 'NO' THEN
    BEGIN
      SELECT IFNULL(MAX(usal_orden),0) + 1
        INTO v_orden
        FROM usu_accesos_log
       WHERE usal_fecha_hora = v_ahora
         AND usal_usua_nombre = p_user;
    END;
    
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_respuesta = 'ERROR interno al insertar en Accesos_Log';
      END; 
      INSERT INTO usu_accesos_log (
        usal_fecha_hora,
        usal_orden,
        usal_usua_nombre,
        usal_clave,
        usal_codigo_number,
        usal_codigo_char,
        usal_vistas,
        usal_habilitado,
        usal_fch_alta,
        usal_usr_alta)
      VALUES (
        v_ahora,
        v_orden,
        p_user,
        'ADMIN',
        0,
        TRIM(LOWER(p_usua_nombre)),
        v_log,
        'S',
        NOW(),
        p_user
      );
    END;
  END IF;
  COMMIT; 
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Roles actualizados correctamente' else '' end as respues_exito
    FROM DUAL;  
  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ABM_USUARIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ABM_USUARIOS_RS`(
  IN p_accion            char,
  IN p_empre             int,
  IN p_user              varchar(50),
  IN p_usua_nombre       varchar(50),
  IN p_usua_nota         varchar(100)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT '';
  DECLARE v_log varchar(100);
  
 
  IF p_accion = 'A' THEN
    SET v_log = CONCAT('Alta usuario ', p_usua_nombre, ' - ', p_usua_nota);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Usuario ya existente con ese nombre';
      END;
      INSERT INTO usuarios (
        usua_nombre,
        usua_nota,
        usua_habilitado,
        usua_pwd,
        usua_fch_alta,
        usua_usr_alta)
      VALUES  (
        LOWER(TRIM(p_usua_nombre)),
        p_usua_nota,
        'S',
        MD5(TRIM(LOWER(p_usua_nombre))),
        NOW(),
        p_user
      );
    END;
  END IF;
  IF p_accion = 'M' THEN
    SET v_log = CONCAT('Modifica usuario ', p_usua_nombre, ' - ', p_usua_nota);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error en Modificación';
      END;
      
      UPDATE usu_roles_usuario
         SET usru_habilitado = 'N',
             usru_fch_modi = NOW(),
             usru_usr_modi = p_user
       WHERE usru_usua_nombre = LOWER(TRIM(p_usua_nombre));
            
      UPDATE usuarios
         SET usua_nota = p_usua_nota,
             usua_fch_modi = NOW(),
             usua_usr_modi = p_user
       WHERE usua_nombre = LOWER(TRIM(p_usua_nombre));
    END;
  END IF;
  IF p_accion = 'B' THEN
    SET v_log = CONCAT('Baja usuario ', p_usua_nombre, ' - ', p_usua_nota);
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error en Baja de Usuario';
      END;
      UPDATE usuarios
         SET usua_habilitado = 'N',
             usua_fch_modi = NOW(),
             usua_usr_modi = p_user
       WHERE usua_nombre = LOWER(TRIM(p_usua_nombre));
    END;
   
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error en Baja de Usuario';
      END;
    
      UPDATE usu_roles_usuario
         SET usru_habilitado = 'N',
             usru_fch_modi = NOW(),
             usru_usr_modi = p_user
       WHERE usru_usua_nombre = LOWER(TRIM(p_usua_nombre));
    END;
  
  END IF;
    
  IF p_accion <> 'V' AND v_respuesta = 'OK' THEN
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
      	ROLLBACK;
      	SET v_respuesta = 'ERROR interno al insertar en Accesos_Log';
      END; 
      INSERT INTO usu_accesos_log (
        usal_empre,
        usal_fecha_hora,
        usal_usua_nombre,
        usal_clave,
        usal_codigo_number,
        usal_codigo_char,
        usal_vistas,
        usal_fch_alta,
        usal_usr_alta)
      VALUES (
		p_empre,
        NOW(),
        p_user,
        'ADMIN',
        0,
        LOWER(TRIM(p_usua_nombre)),
        v_log,
        'S',
        NOW(),
        p_user);
    END;
  END IF;
  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Usuario actualizado correctamente' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ABM_USUARIO_PWD_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ABM_USUARIO_PWD_RS`(
  IN p_user              varchar(50),
  IN p_usua_nombre       varchar(50),
  IN p_opcion            char(1),
  IN p_pwd_ant           varchar(50),
  IN p_pwd_nue           varchar(50),
  IN p_pwd_con           varchar(50)
)
BEGIN

  DECLARE v_respuesta       varchar(100) DEFAULT 'OK';
  DECLARE v_log             varchar(100);
  DECLARE v_usua_pwd        varchar(50);

  IF p_opcion = 'R' THEN
    SET v_log = 'Reseteo de contraseña';
    BEGIN
      DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error al resetar contraseña';
      END;
      UPDATE usuarios
         SET usua_pwd = MD5(usua_nombre)
       WHERE usua_nombre = p_usua_nombre;
    END;
  ELSE 
    SET v_log = 'Cambio de contraseña';
    BEGIN
      DECLARE CONTINUE HANDLER FOR NOT FOUND
      BEGIN
        ROLLBACK;
        SET v_respuesta = 'Error el recuperar contraseña';
      END;
      SELECT usua_pwd 
        INTO v_usua_pwd
        FROM usuarios
        WHERE usua_nombre = p_usua_nombre;
    END;
    IF v_usua_pwd = MD5(p_pwd_ant) THEN
      IF MD5(p_pwd_nue) = MD5(p_pwd_con) THEN
        IF MD5(p_pwd_nue) = MD5(p_pwd_ant) THEN
          SET v_respuesta = 'Contraseña debe ser distinta a la anterior';
        END IF;
      ELSE
        SET v_respuesta = 'Contraseña nueva difiere con la de confirmación';
      END IF;
    ELSE
      SET v_respuesta = 'Contraseña anterior incorrecta';
    END IF;
    
    IF v_respuesta = 'OK' THEN
      BEGIN
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN
          ROLLBACK;
          SET v_respuesta = 'Error al regrabar contraseña';
        END;
      	UPDATE usuarios SET usua_pwd = MD5(p_pwd_nue)
      	 WHERE usua_nombre = p_usua_nombre;
      END;
    END IF;
  END IF;
  IF v_respuesta = 'OK' THEN
    BEGIN
    	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
      BEGIN 
        ROLLBACK;
        SET v_respuesta = 'ERROR interno al insertar en Accesos_Log';
      END; 
      INSERT INTO usu_accesos_log (
        usal_fecha_hora,
        usal_usua_nombre,
        usal_clave,
        usal_codigo_number,
        usal_vistas,
        usal_alta_f)
      VALUES (
        NOW(),
        p_usua_nombre,
        'ADMIN',
        0,
        v_log,
        NOW());
    END;
        
  END IF;
    
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Contraseña reseteada ( pwd = usuario)' else '' end as respues_exito
    FROM DUAL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ACCESOS_LOG_LISTA_OPCIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ACCESOS_LOG_LISTA_OPCIO_RS`()
BEGIN 
 SELECT  * FROM (
  SELECT td_clave.clave as usal_clave,
		F_PROPER(td_clave.clave) as descripcion,
		1 as orden 
  from (select distinct usal_clave  as clave
          from usu_accesos_log) td_clave
  
  UNION
  SELECT null usal_clave , '(Todos)' as descripcion, 0 as orden
  FROM dual) as usu
  ORDER BY 3,1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ACCESOS_LOG_RP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ACCESOS_LOG_RP`(
  IN p_user      	varchar(50),
  IN p_usuario      varchar(50),
  IN p_usal_clave   varchar(50),
  IN p_fecha_des    varchar(50),
  IN p_nro_pagina   integer
)
BEGIN
  DECLARE v_fecha_des     date;
  DECLARE v_contador      integer;
  DECLARE v_filas_pag     integer;
  DECLARE v_cant_pag      integer;
  DECLARE v_row_des       integer;
  DECLARE v_row_has       integer;
  DECLARE v_sql           varchar(3000);
  DECLARE v_select        varchar(3000);
  DECLARE v_where         varchar(3000);
  DECLARE v_subtit        varchar(300) DEFAULT '';
  DECLARE v_titulo        varchar(300) DEFAULT 'Log de tareas en el sistema ';
 
 
 
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      SELECT 'ERROR interno: Las fechas deben tener formato YYYY-MM-DD' FROM DUAL;
    END;
    SET v_fecha_des = STR_TO_DATE(p_fecha_des,'%Y-%m-%d');
  END;
 
  
SET v_select = 'SELECT DATE_FORMAT(usal_fecha_hora,#%d/%m/%Y %H:%i#) as fecha_hora,
	usal_usua_nombre as usuario,
	usal_clave as sector, 
	usal_codigo_char as referencia,
	usal_vistas as tarea,
    usal_fecha_hora as orden ';
SET v_where = concat(' FROM usu_accesos_log 
	WHERE usal_fecha_hora >= #',v_fecha_des,'# 
	AND ( FILTRO_NOMBRE ) 
	AND ( FILTRO_CLAVE ) ');
 
IF p_usuario = '' THEN   
    SET v_where = REPLACE(v_where, 'FILTRO_NOMBRE', '1=1');
  ELSE
    SET v_where = REPLACE(v_where, 'FILTRO_NOMBRE', CONCAT('usal_usua_nombre = #',p_usuario,'#'));
  END IF;
  IF p_usal_clave = '' THEN   
    SET v_where = REPLACE(v_where, 'FILTRO_CLAVE', '1=1');
  ELSE
    SET v_where = REPLACE(v_where, 'FILTRO_CLAVE', CONCAT('usal_clave = #',p_usal_clave,'#'));
  END IF;
 
  SET v_where = REPLACE(v_where,'#',CHAR(39 USING ASCII));
  SET v_select = REPLACE(v_select,'#',CHAR(39 USING ASCII));
  
    BEGIN
	  DECLARE v_cont1 varchar(5000); 
      SET @c1 = '';
      SET v_cont1 = CONCAT('SELECT count(*) INTO @c1 ', v_where);
      SET @query = v_cont1;
      PREPARE stmt FROM @query;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
      SET v_cont1 = @c1;
      SET v_contador = CAST(v_cont1 as unsigned);
    END;
 


  
  IF p_nro_pagina = 0 THEN 
  
  SET v_sql = CONCAT(v_select, ', 0 as total_paginas, 0 as total_registros ', v_where, ' ORDER BY 6 ,2  ');
  
  ELSE  
    
    SET v_filas_pag = F_USU_FILAS_PAG(p_user);
     
    SET v_cant_pag = ceil(v_contador / v_filas_pag);
    SET v_row_des = 1 + (( p_nro_pagina - 1 ) * v_filas_pag );
	SET v_sql = CONCAT(v_select, 
     ', CAST(', CHAR(39 USING ASCII), v_cant_pag, CHAR(39 USING ASCII), ' as unsigned) as total_paginas',
	 ', CAST(', CHAR(39 USING ASCII), v_contador, CHAR(39 USING ASCII), ' as unsigned) as total_registros ',
	v_where, ' ORDER BY 6 ASC, 2 ASC LIMIT ',v_row_des,',',v_filas_pag);
  
  END IF;
  
  

  
  SET @_sql = v_sql;
  PREPARE smpt FROM @_sql;
  
  EXECUTE smpt;
  
  DEALLOCATE PREPARE smpt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_BUSCAR_USUARIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_BUSCAR_USUARIO_RS`(
  IN p_user char(30),
  IN p_input char(100)
)
BEGIN 
declare v_input varchar(100) default p_input;




if p_user is null then
	if length(v_input) >= 2 then
		set v_input = concat('%',upper(rtrim(v_input)),'%');
		select usua_nombre, concat(F_PROPER(usua_nombre),' (',usua_nota) as user_deno
		from usuarios
		where upper(usua_nombre) like v_input;
	else
        select null as usua_nombre, null as user_deno
        from dual;
	end if;
else
		select usua_nombre, concat(F_PROPER(usua_nombre),' (',usua_nota) as user_deno
		from usuarios
		where usua_nombre = p_user;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_GET_LAST_LOGIN_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_GET_LAST_LOGIN_RS`(
  IN p_user varchar(50)
)
BEGIN

 select max(usal_fecha_hora) as usal_fecha_hora

from usu_accesos_log
where usal_usua_nombre = p_user;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_GET_PARAMETROS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_GET_PARAMETROS_RS`(
  IN p_empre int,
  IN p_para_clave varchar(30)
)
BEGIN

SELECT para_valor_n, para_valor_c, para_texto
FROM parametros
WHERE para_clave = p_para_clave;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_GET_USUARIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_GET_USUARIOS_RS`(
  IN p_user varchar(50)
)
BEGIN
  SELECT usua_nombre,
         usua_nota,
         td_perm.perm_pdf,
         td_perm.perm_excel,
         td_perm.perm_html,
         td_perm.perm_modi,
         F_TIRA_DE_ROLES(usua_nombre, ', ') as lista_roles,
         DATE_FORMAT(usua_fch_alta,'%Y-%m-%d') as usua_fch_alta
    FROM usuarios LEFT JOIN
         (SELECT usru_usua_nombre     as usuario,
                 MAX(usro_perm_pdf)   as perm_pdf,
                 MAX(usro_perm_excel) as perm_excel,
                 MAX(usro_perm_html)  as perm_html,
                 MAX(usro_perm_modi)  as perm_modi
            FROM usu_roles, 
                 usu_roles_usuario
           WHERE usru_usro_rol = usro_rol
             AND usro_habilitado = 'S'
             AND usru_habilitado = 'S'
           GROUP BY usru_usua_nombre) td_perm
         ON usua_nombre = td_perm.usuario
   WHERE usua_habilitado = 'S'
     AND usua_nombre = LOWER(p_user)
   ORDER BY 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_INCIDENTES_LOG_RP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_INCIDENTES_LOG_RP`(
  IN p_user      	varchar(50),
  IN p_fecha_des    varchar(50),
  IN p_error_test   char(1),
  IN p_nro_pagina   integer
)
BEGIN
  DECLARE v_fecha_des     date;
  DECLARE v_contador      integer;
  DECLARE v_filas_pag     integer;
  DECLARE v_cant_pag      integer;
  DECLARE v_row_des       integer;
  DECLARE v_row_has       integer;
  DECLARE v_sql           varchar(3000);
  DECLARE v_select        varchar(3000);
  DECLARE v_where         varchar(3000);
  DECLARE v_subtit        varchar(300) DEFAULT '';
  DECLARE v_titulo        varchar(300) DEFAULT 'Log de tareas en el sistema ';
 
 
 
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      SELECT 'ERROR interno: Las fechas deben tener formato YYYY-MM-DD' FROM DUAL;
    END;
    SET v_fecha_des = STR_TO_DATE(p_fecha_des,'%Y-%m-%d');
  END;
 
  
SET v_select = 'SELECT DATE_FORMAT(usil_fecha_hora,#%d/%m/%Y %H:%i#) as usil_fecha_hora,
  usil_usua_nombre,
  usil_proceso,
  usil_error,
  usil_orden';
SET v_where = concat(' FROM usu_incidentes_log 
	WHERE usil_fecha_hora >= #',v_fecha_des,'# 
	AND usil_error_test= #',p_error_test,'#');
 
 
  SET v_where = REPLACE(v_where,'#',CHAR(39 USING ASCII));
  SET v_select = REPLACE(v_select,'#',CHAR(39 USING ASCII));
  
   
   
    BEGIN
	  DECLARE v_cont1 varchar(5000); 
      SET @c1 = '';
      SET v_cont1 = CONCAT('SELECT count(*) INTO @c1 ', v_where);
      SET @query = v_cont1;
      PREPARE stmt FROM @query;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
      SET v_cont1 = @c1;
      SET v_contador = CAST(v_cont1 as unsigned);
    END;
 


  
  IF p_nro_pagina = 0 THEN 
  
	SET v_sql = CONCAT(v_select, ', 0 as total_paginas, 0 as total_registros ', v_where, ' ORDER BY 6 ,2  ');
  
  ELSE  
    
    SET v_filas_pag = F_USU_FILAS_PAG(p_user);
     
    SET v_cant_pag = ceil(v_contador / v_filas_pag);
    SET v_row_des = 1 + (( p_nro_pagina - 1 ) * v_filas_pag );
	SET v_sql = CONCAT(v_select, 
     ', CAST(', CHAR(39 USING ASCII), v_cant_pag, CHAR(39 USING ASCII), ' as unsigned) as total_paginas',
	 ', CAST(', CHAR(39 USING ASCII), v_contador, CHAR(39 USING ASCII), ' as unsigned) as total_registros ',
	v_where, ' ORDER BY 5 ASC LIMIT ',v_row_des,',',v_filas_pag);
  
  END IF;
  
  
  

  
  SET @_sql = v_sql;
  PREPARE smpt FROM @_sql;
  
  EXECUTE smpt;
  
  DEALLOCATE PREPARE smpt;
  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_INS_INCIDENTES_LOG` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_INS_INCIDENTES_LOG`(
  IN p_user      	varchar(50),
  IN p_proceso      varchar(500),
  IN p_empre        integer,
  IN p_error_test   char(1),
  IN p_error        varchar(500)
)
BEGIN
 
 
    insert into usu_incidentes_log (usil_fecha_hora,
									usil_usua_nombre,
									usil_error_test,
									usil_proceso,
                                    usil_error,
									usil_empre)
    values (now(),
			p_user,
			p_error_test,
			p_proceso,
            p_error,
			p_empre);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_LISTA_ROL_ARMADO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_LISTA_ROL_ARMADO_RS`(
  IN p_apli varchar(10),
  IN p_rol varchar(50)
)
BEGIN
  SELECT TD_NIVEL1.des_item                                                 as nivel1,
        case when usma_nivel2 = ' ' then ' ' else usma_des_item end         as nivel2,
        usu_menues_apli.usma_item                                           as item,
        case when usu_menues_apli.usma_nivel2 <> ' ' then 'H' else 'P' end  as p_item_nivel,  
        case when TD_ROL.apli is null then 'N' else 'S' end                 as habilitado ,
        (TD_NIVEL1.usma_orden * 1000) + case when usu_menues_apli.usma_nivel2 <> ' ' then usu_menues_apli.usma_orden else 0 end  as orden
  FROM (SELECT usu_menues_apli.usma_des_item as des_item,
          usu_menues_apli.usma_item as item,
          usu_menues_apli.usma_orden          
          FROM usu_menues_apli
          WHERE usu_menues_apli.usma_nivel2 = ' ' 
          AND usu_menues_apli.usma_habilitado = 'S') TD_NIVEL1,
    usu_menues_apli LEFT JOIN
      ((SELECT usu_menues_rol.usmr_usap_apli   as apli,
          usu_menues_rol.usmr_item  as item         
          FROM usu_menues_rol
          WHERE usu_menues_rol.usmr_usro_rol  = p_rol
          AND usu_menues_rol.usmr_usap_apli   = p_apli
          AND usu_menues_rol.usmr_habilitado  = 'S') TD_ROL)
      ON usu_menues_apli.usma_usap_apli = TD_ROL.apli and usu_menues_apli.usma_item = TD_ROL.item
    WHERE usu_menues_apli.usma_nivel1 = TD_NIVEL1.item
    and usu_menues_apli.usma_habilitado = 'S'
    ORDER BY orden;   
  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_LISTA_USUARIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_LISTA_USUARIOS_RS`(
  IN p_usuario_def varchar(50),
  IN p_inclu_todos char
)
BEGIN 
  
  SELECT usua_nombre, descripcion, orden
  FROM (
  SELECT usua_nombre,
         usua_nombre as descripcion,
         CASE WHEN UPPER(usua_nombre) = UPPER(p_usuario_def) THEN 1 ELSE 2 END AS orden
    FROM usuarios
   WHERE usua_habilitado = 'S'
   UNION
  SELECT NULL AS usua_nombre,
         '(Todos)' as descripcion,
         0  as orden
   FROM dual
   WHERE p_inclu_todos = 'S') usu
   ORDER BY 3,1;    
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_MENUES_X_ROLES_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_MENUES_X_ROLES_RS`(
  IN p_apli char(15),
  IN p_rol char(50)
)
BEGIN

  SELECT TD_NIVEL1.des_item as nivel1,
        usu_menues_apli.usma_des_item as nivel2,
        usu_menues_apli.usma_item as item,
        usu_menues_apli.usma_enlace as enlace,
        TD_NIVEL1.alta,
        TD_NIVEL1.baja,
        TD_NIVEL1.modif,
        'T' as modo
  FROM usu_menues_apli,
      (SELECT usu_menues_apli.usma_des_item as des_item,
          usu_menues_apli.usma_item as item,
          usu_menues_rol.usmr_alta as alta,
          usu_menues_rol.usmr_baja as baja,
          usu_menues_rol.usmr_modif as modif
          FROM usu_menues_rol,
              usu_menues_apli
          WHERE usu_menues_apli.usma_usap_apli = usu_menues_rol.usmr_usap_apli
          AND usu_menues_apli.usma_item = usu_menues_rol.usmr_item
          AND usu_menues_apli.usma_nivel2 = ' ' 
          AND usu_menues_rol.usmr_usro_rol = p_rol
          AND usu_menues_rol.usmr_usap_apli = p_apli
          AND usu_menues_rol.usmr_habilitado = 'S'
          AND usu_menues_apli.usma_habilitado = 'S' ) TD_NIVEL1   
    WHERE usu_menues_apli.usma_nivel1 = TD_NIVEL1.item
    and usu_menues_apli.usma_nivel2 <> ' '  
    and usu_menues_apli.usma_habilitado = 'S'
UNION 
  
    SELECT TD_NIVEL.des_item as nivel1,
          usu_menues_apli.usma_des_item as nivel2,
          usu_menues_apli.usma_item as item,
          usu_menues_apli.usma_enlace as enlace,
          usu_menues_rol.usmr_alta as alta,
          usu_menues_rol.usmr_baja as baja,
          usu_menues_rol.usmr_modif as modif,
          'P' as modo
          FROM usu_menues_rol,
          usu_menues_apli,
          (SELECT usma_item as item,
              usma_des_item as des_item 
              FROM usu_menues_apli 
              WHERE usma_nivel2 = ' ' 
              AND usma_habilitado = 'S') TD_NIVEL
          WHERE usu_menues_apli.usma_usap_apli = usu_menues_rol.usmr_usap_apli
          AND usu_menues_apli.usma_item = usu_menues_rol.usmr_item
          AND usu_menues_apli.usma_nivel2 <> ' ' 
          AND usu_menues_rol.usmr_usro_rol  = p_rol
          AND usu_menues_rol.usmr_usap_apli = p_apli
          AND usu_menues_rol.usmr_habilitado = 'S'
          AND usu_menues_apli.usma_habilitado = 'S'
          AND usu_menues_apli.usma_nivel1 = TD_NIVEL.item
			ORDER BY 1,2;
      
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_MENUES_X_USUARIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_MENUES_X_USUARIO_RS`(
  IN p_apli varchar(10),
  IN p_usuario varchar(50)
)
BEGIN
  DECLARE v_apli varchar(10);
  
  SET v_apli = p_apli;
  
  
  
    
    SELECT TD_NIVEL1.des_item             as nivel1,
           usu_menues_apli.usma_des_item  as nivel2,
           usu_menues_apli.usma_item      as item,
           usu_menues_apli.usma_enlace    as enlace,
           TD_NIVEL1.alta,
           TD_NIVEL1.baja,
           TD_NIVEL1.modif,
           (TD_NIVEL1.usma_orden * 1000) + usu_menues_apli.usma_orden as orden,
           usu_menues_apli.usma_icono     as icono
      FROM usu_menues_apli,
           (SELECT usu_menues_apli.usma_des_item as des_item,
                   usu_menues_apli.usma_item as item,
                   usu_menues_rol.usmr_alta as alta,
                   usu_menues_rol.usmr_baja as baja,
                   usu_menues_rol.usmr_modif as modif,
                   usu_menues_apli.usma_orden          
              FROM usu_menues_rol,
                   usu_roles_usuario,
                   usu_menues_apli
             WHERE usu_menues_rol.usmr_usro_rol = usu_roles_usuario.usru_usro_rol
               AND usu_menues_apli.usma_usap_apli = usu_menues_rol.usmr_usap_apli
               AND usu_menues_apli.usma_item = usu_menues_rol.usmr_item
               AND usu_menues_apli.usma_nivel2 = ' ' 
               AND usu_roles_usuario.usru_usua_nombre = p_usuario
               AND usu_menues_rol.usmr_usap_apli = v_apli
               AND usu_menues_rol.usmr_habilitado = 'S'
               AND usu_roles_usuario.usru_habilitado = 'S'
               AND usu_menues_apli.usma_habilitado = 'S') TD_NIVEL1   
     WHERE usu_menues_apli.usma_nivel1 = TD_NIVEL1.item
       AND usu_menues_apli.usma_nivel2 <> ' '
       AND usu_menues_apli.usma_habilitado = 'S'
 
  UNION 
  
    SELECT TD_NIVEL.des_item as nivel1,
           usu_menues_apli.usma_des_item as nivel2,
           case when usma_nivel2 = ' ' then ' ' else usu_menues_apli.usma_item end as item,
           usu_menues_apli.usma_enlace as enlace,
           usu_menues_rol.usmr_alta as alta,
           usu_menues_rol.usmr_baja as baja,
           usu_menues_rol.usmr_modif as modif,
           (TD_NIVEL.usma_orden * 1000) + usu_menues_apli.usma_orden as orden,
           usu_menues_apli.usma_icono      as icono
      FROM usu_menues_rol,
           usu_roles_usuario,
           usu_menues_apli,
           (SELECT usma_item as item,
                   usma_des_item as des_item,
                   usma_orden
              FROM usu_menues_apli 
             WHERE usma_nivel2 = ' ' 
               AND usma_habilitado = 'S') TD_NIVEL
     WHERE usu_menues_rol.usmr_usro_rol = usu_roles_usuario.usru_usro_rol
       AND usu_menues_apli.usma_usap_apli = usu_menues_rol.usmr_usap_apli
       AND usu_menues_apli.usma_item = usu_menues_rol.usmr_item
       AND usu_menues_apli.usma_nivel2 <> ' ' 
       AND usu_roles_usuario.usru_usua_nombre = p_usuario
       AND usu_menues_rol.usmr_usap_apli = v_apli
       AND usu_menues_rol.usmr_habilitado = 'S'
       AND usu_roles_usuario.usru_habilitado = 'S'
       AND usu_menues_apli.usma_habilitado = 'S'
       AND usu_menues_apli.usma_nivel1 = TD_NIVEL.item
  UNION
    
    SELECT TD_NIVEL1.des_item              as nivel1,
           usu_menues_apli.usma_des_item   as nivel2,
           usu_menues_apli.usma_item       as item,
           usu_menues_apli.usma_enlace     as enlace,
           null as alta,
           null as baja,
           null as modif,
           1000 + usu_menues_apli.usma_orden as orden,
           usu_menues_apli.usma_icono        as icono
      FROM usu_menues_apli,
           (SELECT usma_des_item as des_item
              FROM usu_menues_apli
             WHERE usma_nivel1 = 'm_sistema'
               AND usma_nivel2 = ' '
               AND usma_usap_apli = v_apli) TD_NIVEL1
     WHERE usma_nivel1 = 'm_sistema' 
       AND usma_nivel2 <> ' '
       AND usma_usap_apli = v_apli
  ORDER BY orden;
      
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ROLES_DEFINIDOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ROLES_DEFINIDOS_RS`(
  IN p_apli varchar(10)
)
BEGIN
  SELECT usro_rol, 
         usro_observaciones, 
         F_TIRA_DE_USUARIOS_X_ROL(usro_rol, ', ') as lista_usuarios,
         usro_perm_pdf, 
         usro_perm_excel, 
         usro_perm_html, 
         usro_perm_modi,
         
         DATE_FORMAT(IFNULL(usro_fch_modi, usro_fch_alta), '%Y-%m-%d') as ult_modi,
         IFNULL(usro_usr_modi, usro_usr_alta) as usuario
    FROM usu_roles 
   WHERE usro_habilitado = 'S';
      
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_ROL_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_ROL_RS`(
  IN p_rol varchar(30)
)
BEGIN
  SELECT usro_rol,
         usro_observaciones,
         usro_perm_pdf, 
         usro_perm_excel, 
         usro_perm_html, 
         usro_perm_modi
    FROM usu_roles
   WHERE usro_rol = p_rol
     AND usro_habilitado = 'S';
   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_SEL_ADMIN_USUARIOS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_SEL_ADMIN_USUARIOS_RS`()
BEGIN
    
  SELECT usua_nombre,
         usua_nota,
  
  
         td_perm.perm_pdf,
         td_perm.perm_excel,
         td_perm.perm_html,
         td_perm.perm_modi,
         F_TIRA_DE_ROLES(USUA_NOMBRE, ', ')    as lista_roles,
         DATE_FORMAT(USUA_FCH_ALTA,'%Y-%m-%d') as usua_fch_alta
    FROM usuarios LEFT JOIN
         (SELECT usru_usua_nombre     as usuario,
                 MAX(usro_perm_pdf)   as perm_pdf,
                 MAX(usro_perm_excel) as perm_excel,
                 MAX(usro_perm_html)  as perm_html,
                 MAX(usro_perm_modi)  as perm_modi
            FROM usu_roles, 
                 usu_roles_usuario
           WHERE usru_usro_rol = usro_rol
             AND usro_habilitado = 'S'
             AND usru_habilitado = 'S'
           GROUP BY usru_usua_nombre) td_perm
         ON USUA_NOMBRE = td_perm.usuario
   WHERE USUA_HABILITADO = 'S'
   ORDER BY 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_SENDMAIL_PWD_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_SENDMAIL_PWD_RS`(
  IN p_user varchar(50),
  IN p_id_alumno varchar(20)
)
BEGIN
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  DECLARE v_email varchar(300);
  DECLARE v_email_send varchar(900) DEFAULT '';
  DECLARE v_email_msg varchar(900) DEFAULT '';
  DECLARE v_ind int DEFAULT 0;
  DECLARE v_i int DEFAULT 0;
  DECLARE v_char char(1);
  DECLARE v_fin INTEGER DEFAULT 0;
  DECLARE v_repito char(1) DEFAULT 'N';
  DECLARE v_text text;
  DECLARE v_pwd_new char(4);
  DECLARE v_titulo text;


  
DECLARE c_mail CURSOR FOR
	select calu_email from camp_alumnos
	where calu_id_alumno = p_id_alumno; 

BEGIN
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_fin = 1;
  OPEN c_mail;
    loop1: LOOP
      FETCH c_mail INTO v_email;
      IF v_fin = 1 THEN
        LEAVE loop1;
      END IF;
      
	  set v_ind = v_ind + 1;
      if v_email > '' then
		  if v_email_send = '' then
			  set v_email_send = replace(v_email, ';',',');
		  else
			  set v_email_send = concat(v_email_send,',', replace(v_email, ';',',') );
		  end if;
      end if;
      
  END LOOP loop1;
  
  CLOSE c_mail;
 END;
 
if v_ind = 0 then
	set v_respuesta = 'Usuario inexistente';
else
	if v_email_send = '' then
		set v_respuesta = 'No hay mail registrado';
    end if;
	INSERT INTO usu_accesos_log (usal_usua_nombre,usal_empre,usal_clave,usal_codigo_char,usal_vistas,usal_alta_f)
						VALUES  (p_id_alumno,1,'LOGIN',0,concat('Solicitud de envio de nueva password:',v_respuesta,v_email_send),now());
	COMMIT;
end if;      

if v_respuesta = 'OK' then
 
	WHILE v_i <= length(v_email_send) DO
		set v_char = substring(v_email_send,v_i,1);
		if v_char = '@' or v_repito = 'S' then
			set v_char   = '*';
			set v_repito = 'S';
		end if;
		if substring(v_email_send,v_i,1) = ',' then
			set v_char   = ',';
			set v_repito = 'N';
		end if;
		set v_email_msg = concat(v_email_msg,v_char);
		set v_i = v_i + 1;
	END WHILE;
	set v_email_msg = replace(v_email_msg,'****','*');
else
	set v_respuesta = concat('Error: No se envio mail ',v_respuesta);
end if;
        

if v_respuesta = 'OK' then

	select para_texto into v_titulo
	from parametros
	where para_clave ='MAIL_RECUP_PWD_TITULO';
    
	select para_texto into v_text
	from parametros
	where para_clave ='MAIL_RECUP_PWD_CUERPO';

	select substring(RAND(),5,4) into v_pwd_new 
	from dual;

	
	BEGIN 
		DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
		BEGIN 
			ROLLBACK;
			SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al update pwd usuarios','USU_SENDMAIL_PWD_RS');
		END; 
		
		
		UPDATE usuarios SET usua_pwd = MD5(v_pwd_new)
		WHERE usua_nombre = p_id_alumno;
	END;

	set v_text = replace(v_text,'%USU%',p_id_alumno);
	set v_text = replace(v_text,'%PWD%',v_pwd_new);
end if;


SELECT v_respuesta  as respuesta,
	   case when v_respuesta = 'OK' then  concat('Se envió mail a ',v_email_msg) else '' end as respues_exito,
       v_email_send as lista_mail,
       v_text       as cuerpo,
       v_titulo		as titulo
         
    FROM DUAL;  
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_SET_PARAMETROS_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_SET_PARAMETROS_RS`(
  IN p_empre int,
  IN p_para_clave varchar(30),
  IN p_para_valor_n int, 
  IN p_para_valor_c varchar(30),
  IN p_para_texto text
)
BEGIN

DECLARE v_respuesta varchar(100) DEFAULT 'OK';
BEGIN 
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN 
		ROLLBACK;
		SET v_respuesta = 'ERROR interno al registar en parametros';
	END; 
    
	UPDATE parametros SET para_valor_n = p_para_valor_n, 
						  para_valor_c = p_para_valor_c,
                          para_texto   = p_para_texto
	WHERE para_clave = p_para_clave;
END; 

  COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_USUARIO_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_USUARIO_RS`(
  IN p_usua_nombre varchar(50)
)
BEGIN
  SELECT usua_nombre,
         usua_nota
   FROM usuarios
   WHERE usua_nombre = p_usua_nombre
     AND usua_habilitado = 'S';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `USU_VALIDA_USUARIO_HOY_RS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `USU_VALIDA_USUARIO_HOY_RS`(
	IN p_user varchar(50),
	IN p_pwd varchar(50),
    IN p_empre integer
)
BEGIN
	

  DECLARE v_respuesta        varchar(100) DEFAULT 'OK';
  DECLARE v_user        	 varchar(50) DEFAULT p_user;
  DECLARE v_usua_habilitado  char(1);
  DECLARE v_usua_pwd         varchar(50);
  DECLARE v_usua_clie_id     int;
  DECLARE v_usua_filas_pag   int;
  DECLARE v_peri_perio       date;
  DECLARE v_pais             varchar(50);
  DECLARE v_pais_codigo      varchar(2);
  DECLARE v_rol_cont         integer;
  DECLARE v_perm_pdf         varchar(1);
  DECLARE v_perm_excel       varchar(1);
  DECLARE v_perm_html        varchar(1);
  DECLARE v_perm_modi        varchar(1);
  DECLARE v_sis_version      varchar(100);
  DECLARE v_date             date;
  DECLARE v_log_inciden      char(2);
  
  DECLARE v_camp_id_alumno 	varchar(20);
  DECLARE v_camp_apenom 	varchar(50);
  
  SELECT utc_date INTO v_date FROM DUAL;


if not exists(SELECT 1
				FROM usuarios
				WHERE lower(usua_nombre) = lower(v_user)) then
	 BEGIN
		DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET v_camp_id_alumno = null;
		
		select calu_id_alumno, concat(calu_apellido,', ',calu_nombre)
			into v_camp_id_alumno, v_camp_apenom 
		from camp_alumnos
		where calu_nrodoc = v_user;
	  END;
	
	if v_camp_id_alumno is null then
		set v_respuesta = 'Usuario inexistente en la institucion';
	else 
		
		if exists(select 1 from usuarios
						where usua_nombre = v_camp_id_alumno
						and usua_habilitado = 'S') then
			set v_user = v_camp_id_alumno;
		else
			
			if not exists(select 1 from usuarios
							where usua_nombre = v_camp_id_alumno) then
				BEGIN
				   insert into usuarios (usua_nombre,
								usua_pwd,
								usua_nota,
								usua_habilitado,
								usua_fch_alta,
								usua_usr_alta,
								usua_filas_pag)
						values (v_camp_id_alumno,
								md5(v_user),
								concat(v_camp_apenom,' (Alta autom alumno)'),
								'S',
								now(),
								'sistema',
								12);
								
					insert into usu_roles_usuario (usru_usro_rol,
								usru_usua_nombre,
								usru_habilitado,
								usru_fch_alta,
								usru_usr_alta)
						values ('ALUMNO',
								v_camp_id_alumno,
								'S',
								now(),
								'sistema');                            
				END;
			else 
				BEGIN
					update usuarios set usua_habilitado = 'S'
					where usua_nombre = v_camp_id_alumno;
					
					update usu_roles_usuario set usru_habilitado = 'S'
					where usua_nombre = v_camp_id_alumno;
				END;
			end if;
		end if;
	end if;
end if;

  IF v_respuesta = 'OK' THEN    
	BEGIN
		DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET v_respuesta = 'Usuario inexistente';
		SELECT usua_habilitado, usua_pwd, usua_clie_id, usua_filas_pag
		  INTO v_usua_habilitado, v_usua_pwd, v_usua_clie_id, v_usua_filas_pag
		  FROM usuarios
		 WHERE lower(usua_nombre) = lower(v_user);
	END;
    IF v_usua_habilitado = 'N' THEN
			SET v_respuesta = 'Usuario dado de baja';
    ELSEIF p_pwd is null THEN
			SET v_respuesta = 'Complete Contraseña';
    ELSEIF v_usua_pwd <> md5(p_pwd) THEN
			SET v_respuesta = 'Usuario/Contraseña incorrecta';
    END IF;
    
    SELECT count(*) INTO v_rol_cont
      FROM usu_roles_usuario
     WHERE usru_usua_nombre = v_user
       AND usru_habilitado = 'S';
      
    IF v_rol_cont = 0 THEN
      SET v_respuesta ='Usuario sin accesos permitidos';
    END IF;
  END IF;
  
  BEGIN
    DECLARE CONTINUE HANDLER FOR NOT FOUND
    SET v_sis_version = '?';
    SELECT para_valor_c
      INTO v_sis_version
      FROM parametros
     WHERE para_clave = 'INSTANCIA_VERSION';
	 
  END;
  
	SELECT MAX(usro_perm_excel) INTO v_perm_excel
		FROM usu_roles, usu_roles_usuario
   WHERE usru_usro_rol = usro_rol
		 AND usro_habilitado = 'S'
		 AND usru_habilitado = 'S'
		 AND usru_usua_nombre = LOWER(v_user);
   SELECT MAX(usro_perm_pdf) INTO v_perm_pdf
     FROM usu_roles, 
          usu_roles_usuario
    WHERE usru_usro_rol = usro_rol
      AND usro_habilitado = 'S'
      AND usru_habilitado = 'S'
      AND usru_usua_nombre = LOWER(v_user);
 
  SELECT MAX(usro_perm_html) INTO v_perm_html
    FROM usu_roles, 
         usu_roles_usuario
   WHERE usru_usro_rol = usro_rol
     AND usro_habilitado = 'S'
     AND usru_habilitado = 'S'
     AND usru_usua_nombre = LOWER(v_user);  
	SELECT MAX(usro_perm_modi) INTO v_perm_modi
		FROM usu_roles, usu_roles_usuario
	 WHERE usru_usro_rol = usro_rol
		 AND usro_habilitado = 'S'
		 AND usru_habilitado = 'S'
		 AND usru_usua_nombre = LOWER(v_user);  
   
  SELECT para_valor_c INTO v_log_inciden
	FROM parametros 
	WHERE para_clave = 'LOG_BBDD_ACTIVO'
	AND   para_empre = p_empre;
  if v_log_inciden is null then
	set v_log_inciden = 'NO';
  end if;
   
  IF v_respuesta = 'OK' THEN
    INSERT INTO usu_accesos_log (
      usal_fecha_hora,
      usal_empre,
      usal_usua_nombre,
      usal_clave,
      usal_codigo_number,
      usal_vistas,
      usal_alta_f)
    VALUES (
      now(),
      p_empre,
      v_user,
      'LOGIN',
      0,
      'Ingreso al sistema',
      v_date);
  END IF;
  
  COMMIT;
  
	SELECT v_respuesta     as respuesta, 
				 v_date,
				 lower(v_user)   as p_user,
				 date_format(v_date,'%d/%m/%y') as hoy,
				 v_perm_excel    as perm_excel,
				 v_perm_pdf      as perm_pdf,
				 v_perm_html     as perm_html,
				 v_perm_modi     as perm_modi,
                 v_usua_filas_pag as filas_pag,
				 v_sis_version   as sis_version,
                 v_log_inciden   as log_inciden
	FROM DUAL;
   
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ZZU_TABLA_INFO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ZZU_TABLA_INFO`()
BEGIN
DECLARE v_fin 		        INTEGER DEFAULT 0;
DECLARE vc_column_name		varchar(50);
DECLARE vc_table_name		varchar(50);
DECLARE vc_is_nullable		varchar(50); 
DECLARE vc_data_type		varchar(50);
DECLARE vc_longi			integer;
DECLARE v_cnt				INTEGER DEFAULT 0;
DECLARE c_meta CURSOR FOR
 SELECT column_name,table_name,is_nullable, data_type, ifnull(character_maximum_length, numeric_precision) as longi 
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE table_schema = 'adaclub' 
  AND table_name = 'socios'
  AND substr(column_name,6,6) <> 'baja_f'
  AND substr(column_name,6,6) <> 'alta_f'
  AND substr(column_name,6,2) <> 'id'
  ORDER BY ordinal_position;  
BEGIN
DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_fin = 1;
	OPEN c_meta;
    
    loop_act: LOOP
    
	  FETCH c_meta INTO vc_column_name,
						 vc_table_name,
						 vc_is_nullable,
						 vc_data_type,
						 vc_longi;
						 
    	IF v_fin = 1 THEN
			LEAVE loop_act;
		END IF;
	
		BEGIN
		if exists(select 1 from zz_tabla_info
					where ztai_column = vc_column_name) then
			update zz_tabla_info set ztai_table = vc_table_name,
									ztai_type 	= vc_data_type,
									ztai_length = vc_longi,
									ztai_null 	= vc_is_nullable,
									ztai_alta_f = now()
					where ztai_column = vc_column_name;
		  
		else
			insert into zz_tabla_info (ztai_column,
			  ztai_table,
			  ztai_type,
			  ztai_length,
			  ztai_null,
			  ztai_label,
			  ztai_mensaje,
			  ztai_alta_f) values (vc_column_name,
						 vc_table_name,
						 vc_data_type,
						 vc_longi,
                         vc_is_nullable,
                         F_PROPER(substring(vc_column_name,6)),
						 substring(vc_column_name,6),
                         now());
			set v_cnt = v_cnt + 1; 
		end if;
		
		END;
    END LOOP loop_act;
  CLOSE c_meta;
  
END;
	SELECT v_cnt as cant_nuevos
	FROM DUAL;  
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-27 18:56:00
