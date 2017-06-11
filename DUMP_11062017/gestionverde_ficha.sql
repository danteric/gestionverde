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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` VALUES (1,'Prueba 1 ','Prueba 1',10,'2017-05-24 13:12:28','',NULL,NULL),(5,'sonido','contaminación sonora',4,'2017-06-03 03:00:00','admin',NULL,NULL),(6,'cascos','protección de cascos',1,'2017-06-03 03:00:00','admin',NULL,NULL),(7,'ropa','ropa de trabajo asdjasd',4,'2017-06-03 03:00:00','admin',NULL,NULL),(8,'ficha modi','ficha modi',10,'2017-06-10 03:00:00','admin',NULL,NULL),(9,'ficha nueva 2','ficha nueva 2 ',10,'2017-06-10 03:00:00','admin',NULL,NULL),(10,'nueva ficha3','nueva ficha3',3,'2017-06-10 03:00:00','admin','2017-06-11',NULL),(11,'prueba dante','prueba',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(12,'fases','fases',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(13,'medios','mdio',1,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(14,'aaa','aaa',10,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(15,'s','',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(16,'adad','asdasd',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(17,'aaaaa','13',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(18,'a','dante 18',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(19,'19','19',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(20,'20','20',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(21,'21','21',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(22,'22','22',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(23,'23','23',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(24,'24','24',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(25,'25','5',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(26,'nueva fichita','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(27,'nueva aa','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(28,'nueva aasa','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(29,'nueva ava','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(30,'aas ava','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(31,'s ava','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(32,'dante','nuevita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(33,'aaasd','daste',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(34,'saaccsd ava','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(35,'dante 1','datn',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(36,'saa11111ava','nueva fichita',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(37,'2222222','22222',2,'2017-06-11 03:00:00','admin','2017-06-11',NULL),(38,'ruen','da',2,'2017-06-11 03:00:00','admin',NULL,NULL),(39,'prueba','das',2,'2017-06-11 03:00:00','admin',NULL,NULL),(40,'full a','full a',2,'2017-06-11 03:00:00','admin',NULL,NULL),(41,'ficha tipo','tipo',2,'2017-06-11 03:00:00','admin',NULL,NULL),(42,'ficha tma','tam',2,'2017-06-11 03:00:00','admin',NULL,NULL);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
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
