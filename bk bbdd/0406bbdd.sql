-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: gestionverde
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

 
--
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
 
CREATE TABLE `catalogo` (
  `cata_id` int(11) NOT NULL AUTO_INCREMENT,
  `cata_deno` varchar(50) NOT NULL,
  `cata_deno_redu` varchar(10) NOT NULL,
  `cata_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cata_alta_usu` varchar(50) NOT NULL,
  `cata_baja_f` date DEFAULT NULL,
  `cata_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cata_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
 
--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
INSERT INTO `catalogo` VALUES (1,'Prevención de la contaminación','Prev. Cont','2017-05-07 20:49:40','',NULL,NULL),(2,'Consumo Eficiente de Recursos','Cons. Efic','2017-05-07 20:49:40','',NULL,NULL),(3,'Preservación de Actividades Vecinas','Preserv. A','2017-05-07 20:49:40','',NULL,NULL),(4,'Protección De Las Condiciones De Trabajo','Protec. ','2017-05-07 20:49:40','',NULL,NULL),(5,'coco','cococo r','2017-05-12 03:00:00','marino','2017-05-12','mariano'),(6,'coco','cococo r','2017-05-12 03:00:00','marino','2017-05-12','marisno'),(7,'extensa','redu','2017-05-13 03:00:00','admin','2017-05-13','admin'),(8,'Catalogo Nwe Maxi','Cata Reduc','2017-05-13 03:00:00','admin','2017-05-13','admin');
UNLOCK TABLES;

--
-- Table structure for table `fase`
--

DROP TABLE IF EXISTS `fase`;
CREATE TABLE `fase` (
  `fase_id` int(11) NOT NULL AUTO_INCREMENT,
  `fase_deno` varchar(50) NOT NULL,
  `fase_deno_redu` varchar(10) NOT NULL,
  `fase_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fase_alta_usu` varchar(50) NOT NULL,
  `fase_baja_f` date DEFAULT NULL,
  `fase_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fase`
--

LOCK TABLES `fase` WRITE;
INSERT INTO `fase` VALUES (1,'Documentación Inicial','Doc. Ini.','2017-05-07 20:51:38','',NULL,NULL),(2,'Puesta en Marcha','Puest. Mar','2017-05-07 20:51:38','',NULL,NULL),(3,'Ejecución','Ejec.','2017-05-07 20:51:38','',NULL,NULL),(4,'Retiro de Obra','Retir. Obr','2017-05-07 20:51:38','',NULL,NULL),(5,'','','2017-05-23 03:00:00','admin','2017-05-23','admin'),(6,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin'),(7,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin'),(8,'modif','modif','2017-05-23 03:00:00','admin','2017-05-23','admin');
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE `ficha` (
  `fich_id` int(11) NOT NULL AUTO_INCREMENT,
  `fich_deno` varchar(50) NOT NULL,
  `fich_desc` varchar(200) NOT NULL,
  `fich_cata_id` int(11) NOT NULL,
  `fich_tipo_id` int(11) NOT NULL,
  `fich_medi_id` int(11) NOT NULL,
  `fich_fase_id` int(11) NOT NULL,
  `fich_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fich_alta_usu` varchar(50) NOT NULL,
  `fich_baja_f` date DEFAULT NULL,
  `fich_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fich_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
INSERT INTO `ficha` VALUES (1,'manipulación de residuos organicos','Evitar la contaminación de residuos',1,0,0,0,'2017-05-24 13:12:28','',NULL,NULL),(5,'sonido','contaminación sonora',1,0,0,0,'2017-06-03 03:00:00','admin',NULL,NULL),(6,'cascos','protección de cascos',0,0,0,0,'2017-06-03 03:00:00','admin',NULL,NULL),(7,'ropa','ropa de trabajo adecuada',0,0,0,0,'2017-06-03 03:00:00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `ficha_fases`
--

DROP TABLE IF EXISTS `ficha_fases`;
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

--
-- Dumping data for table `ficha_fases`
--

LOCK TABLES `ficha_fases` WRITE;
INSERT INTO `ficha_fases` VALUES (1,1,'2017-06-03 03:00:00','admin',NULL,NULL),(1,2,'2017-06-03 03:00:00','admin',NULL,NULL),(1,4,'2017-06-03 03:00:00','admin',NULL,NULL),(6,0,'2017-06-03 03:00:00','admin',NULL,NULL),(7,1,'2017-06-03 03:00:00','admin',NULL,NULL),(7,2,'2017-06-03 03:00:00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `ficha_fuentes`
--

DROP TABLE IF EXISTS `ficha_fuentes`;
CREATE TABLE `ficha_fuentes` (
  `fifu_fich_id` int(11) NOT NULL,
  `fifu_fuen_id` int(11) NOT NULL,
  `fifu_text` text NOT NULL,
  `fifu_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fifa_alta_usu` varchar(50) NOT NULL,
  `fifa_baja_f` date DEFAULT NULL,
  `fifa_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fifu_fich_id`,`fifu_fuen_id`),
  CONSTRAINT `FK_ficha_fichafuente` FOREIGN KEY (`fifu_fich_id`) REFERENCES `ficha` (`fich_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha_fuentes`
--

LOCK TABLES `ficha_fuentes` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `ficha_medios`
--

DROP TABLE IF EXISTS `ficha_medios`;
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

--
-- Dumping data for table `ficha_medios`
--

LOCK TABLES `ficha_medios` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `ficha_procedimientos`
--

DROP TABLE IF EXISTS `ficha_procedimientos`;
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

--
-- Dumping data for table `ficha_procedimientos`
--

LOCK TABLES `ficha_procedimientos` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `medio`
--

DROP TABLE IF EXISTS `medio`;
CREATE TABLE `medio` (
  `medi_id` int(11) NOT NULL AUTO_INCREMENT,
  `medi_deno` varchar(50) NOT NULL,
  `medi_deno_redu` varchar(10) NOT NULL,
  `medi_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `medi_alta_usu` varchar(50) NOT NULL,
  `medi_baja_f` date DEFAULT NULL,
  `medi_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`medi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medio`
--

LOCK TABLES `medio` WRITE;
INSERT INTO `medio` VALUES (1,'Urbano','Urb.','2017-05-07 20:54:18','',NULL,NULL),(2,'Periurbano','Periurb.','2017-05-07 20:54:18','',NULL,NULL),(3,'Rural','Rur.','2017-05-07 20:54:18','',NULL,NULL),(4,'Selvático - Agreste','Selv.','2017-05-07 20:54:18','',NULL,NULL),(5,'Costero','Cost.','2017-05-07 20:54:18','',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `parametros`
--

DROP TABLE IF EXISTS `parametros`;
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

--
-- Dumping data for table `parametros`
--

LOCK TABLES `parametros` WRITE;
INSERT INTO `parametros` VALUES (1,'DIA_LIMITE','DEFAULT',15,'','cantidad de dias para considerarlo deudor','S','2015-07-23','admin','0000-00-00','',NULL),(1,'INSTANCIA_VERSION','DEFAULT',0,'CAMARCO','Version del programa','S','2015-07-23','admin','0000-00-00','',NULL),(1,'LOG_BBDD_ACTIVO','DEFAULT',0,'NO','SI esta en SI guarda los llamados a la BD en USU_LOG_DB en opcion menu Incidentes','S','2016-10-10','admin',NULL,NULL,NULL),(1,'MAIL_RECUP_PWD_CUERPO','DEFAULT',0,'LEYENDA','Texto del mail que se envia, puede utiliz %USU% y %PWD% como variables para mostrar info','S','2016-10-10','admin',NULL,NULL,'  Sistema extranet campus: La password para el usuario %USU% es desde ahora  %PWD%  '),(1,'MAIL_RECUP_PWD_TITULO','DEFAULT',0,'LEYENDA','Asunto del mail','S','2016-10-10','admin',NULL,NULL,'Mensaje de extranet, contraseña nueva'),(1,'USUARIO_SIMULADO','DEFAULT',0,'1716112725','El admin puede simular la vista de un usuario alumno','S','2016-09-02','admin','0000-00-00','',NULL);
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
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

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_fichas`
--

DROP TABLE IF EXISTS `proyecto_fichas`;
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

--
-- Dumping data for table `proyecto_fichas`
--

LOCK TABLES `proyecto_fichas` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_fichas_adhoc`
--

DROP TABLE IF EXISTS `proyecto_fichas_adhoc`;
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

--
-- Dumping data for table `proyecto_fichas_adhoc`
--

LOCK TABLES `proyecto_fichas_adhoc` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `tamanio`
--

DROP TABLE IF EXISTS `tamanio`;
CREATE TABLE `tamanio` (
  `tamanio_id` int(11) NOT NULL AUTO_INCREMENT,
  `tamanio_deno` varchar(50) NOT NULL,
  `tamanio_deno_redu` varchar(10) NOT NULL,
  `tamanio_alta_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tamanio_alta_usu` varchar(50) NOT NULL,
  `tamanio_baja_f` date DEFAULT NULL,
  `tamanio_baja_usu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tamanio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tamanio`
--

LOCK TABLES `tamanio` WRITE;
INSERT INTO `tamanio` VALUES (10,'Pequeño','Peq.','2017-05-27 03:00:00','admin',NULL,NULL),(11,'Mediano','Med.','2017-05-27 03:00:00','admin','2017-05-27','admin'),(12,'Grande','Gran.','2017-05-27 03:00:00','admin','2017-05-27','admin'),(13,'Grande','Gran.','2017-05-27 03:00:00','admin','2017-05-27','admin'),(14,'Mediano','Med.','2017-05-27 03:00:00','admin',NULL,NULL),(15,'Grande','Gran.','2017-05-27 03:00:00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
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

--
-- Dumping data for table `tipologia`
--

LOCK TABLES `tipologia` WRITE;
INSERT INTO `tipologia` VALUES (1,'Refacciones / Reciclajes','Refac. Rec','2017-05-07 20:56:28','',NULL,NULL),(2,'Viviendas Unifamiliares','Viv. Unif.','2017-05-07 20:56:28','',NULL,NULL),(3,'Edificios en Altura','Edif. Alt.','2017-05-07 20:56:28','',NULL,NULL),(4,'Edificios Públicos','Edif. Publ','2017-05-07 20:56:28','',NULL,NULL),(5,'Galpones / Naves','Galp. / Na','2017-05-07 20:56:28','',NULL,NULL),(6,'Plantas Productivas','Plan. Prod','2017-05-07 20:56:28','',NULL,NULL),(7,'Vialidad','Vial.','2017-05-07 20:56:28','',NULL,NULL),(8,'Redes de Infraestructura','Red. Infra','2017-05-07 20:56:28','',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `usu_accesos_log`
--

DROP TABLE IF EXISTS `usu_accesos_log`;
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

--
-- Dumping data for table `usu_accesos_log`
--

LOCK TABLES `usu_accesos_log` WRITE;
INSERT INTO `usu_accesos_log` VALUES ('2017-05-07 22:20:02',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-07',NULL,NULL,NULL,1),('2017-05-12 22:33:16',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 22:42:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 22:43:47',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:30:23',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:37:05',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-12 23:45:20',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:52:30',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo hola',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:53:15',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo coco',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 01:54:02',1,'marino','ACTUALIZA',1,'Incripcion asignaturas','Catalogo coco',NULL,'2017-05-12',NULL,NULL,NULL,1),('2017-05-13 02:40:17',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:21:27',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:23:20',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las jj Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:38:26',1,'admin','ACTUALIZA',7,'catalogo','Catalogo extensa',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:39:52',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:44:00',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:13',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:36',1,'admin','ACTUALIZA',8,'catalogo','Catalogo catalogo nuevo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:47:46',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Catalogo Nuevo maxi',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:54:46',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Catalogo Nwe Maxi',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 20:57:53',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 21:19:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-13 22:16:43',1,'admin','ACTUALIZA',0,'catalogo','Catalogo Protección De Las Condiciones De Trabajo',NULL,'2017-05-13',NULL,NULL,NULL,1),('2017-05-15 00:44:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-15',NULL,NULL,NULL,1),('2017-05-20 20:52:45',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-20',NULL,NULL,NULL,1),('2017-05-20 21:45:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-20',NULL,NULL,NULL,1),('2017-05-21 23:48:18',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-21',NULL,NULL,NULL,1),('2017-05-23 13:45:44',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 14:08:15',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 15:44:48',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 16:46:55',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:46:12',1,'admin','ACTUALIZA',5,'fase','fase ',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:48:28',1,'admin','ACTUALIZA',6,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:50:42',1,'admin','ACTUALIZA',7,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:57:41',1,'admin','ACTUALIZA',0,'fase','fase Documentación ',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:57:52',1,'admin','ACTUALIZA',0,'fase','fase Documentación Inicial',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 17:58:24',1,'admin','ACTUALIZA',8,'fase','fase modif',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-23 19:56:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-23',NULL,NULL,NULL,1),('2017-05-24 13:19:19',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-24 17:27:34',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-24 21:52:27',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-24',NULL,NULL,NULL,1),('2017-05-25 19:47:57',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-25',NULL,NULL,NULL,1),('2017-05-25 21:25:50',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-25',NULL,NULL,NULL,1),('2017-05-27 18:27:01',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-27 20:12:43',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-27 23:18:02',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-27',NULL,NULL,NULL,1),('2017-05-28 19:22:03',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-28',NULL,NULL,NULL,1),('2017-05-29 23:39:29',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-29',NULL,NULL,NULL,1),('2017-05-30 00:49:16',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-30',NULL,NULL,NULL,1),('2017-05-30 00:58:26',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-05-30',NULL,NULL,NULL,1),('2017-06-03 12:09:14',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 13:21:24',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 13:56:53',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 21:37:08',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 22:18:56',NULL,'admin','LOGIN',0,NULL,'Ingreso al sistema',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 22:20:24',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:10:44',NULL,'7','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:12:59',NULL,'6','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES ();)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:24:58',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:25:07',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:26:27',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:27:00',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2);)',NULL,'2017-06-03',NULL,NULL,NULL,1),('2017-06-03 23:28:57',NULL,'1','ACTUALIZA',NULL,'0','Incruye fase  fases (INSERT INTO lisfas VALUES (1),(2),(4);)',NULL,'2017-06-03',NULL,NULL,NULL,1);
UNLOCK TABLES;

--
-- Table structure for table `usu_aplicaciones`
--

DROP TABLE IF EXISTS `usu_aplicaciones`;
CREATE TABLE `usu_aplicaciones` (
  `usap_apli` varchar(10) NOT NULL DEFAULT '',
  `usap_habilitado` varchar(1) DEFAULT NULL,
  `usap_fch_alta` date DEFAULT NULL,
  `usap_usr_alta` varchar(50) DEFAULT NULL,
  `usap_fch_modi` date DEFAULT NULL,
  `usap_usr_modi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usap_apli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usu_aplicaciones`
--

LOCK TABLES `usu_aplicaciones` WRITE;
INSERT INTO `usu_aplicaciones` VALUES ('GAMSI','S','0000-00-00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `usu_incidentes_log`
--

DROP TABLE IF EXISTS `usu_incidentes_log`;
CREATE TABLE `usu_incidentes_log` (
  `usil_orden` int(11) NOT NULL AUTO_INCREMENT,
  `usil_fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usil_usua_nombre` varchar(50) NOT NULL,
  `usil_error_test` char(1) NOT NULL,
  `usil_proceso` varchar(500) NOT NULL,
  `usil_error` varchar(350) DEFAULT NULL,
  `usil_empre` int(11) DEFAULT NULL,
  PRIMARY KEY (`usil_orden`)
) ENGINE=InnoDB AUTO_INCREMENT=1471 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usu_incidentes_log`
--

LOCK TABLES `usu_incidentes_log` WRITE;
INSERT INTO `usu_incidentes_log` VALUES (980,'2017-05-07 22:20:02','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(981,'2017-05-07 22:20:02','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(982,'2017-05-07 22:20:02','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(983,'2017-05-12 22:33:16','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(984,'2017-05-12 22:33:16','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(985,'2017-05-12 22:33:16','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(986,'2017-05-12 22:42:43','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(987,'2017-05-12 22:42:43','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(988,'2017-05-12 22:42:43','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(989,'2017-05-12 22:43:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(990,'2017-05-12 22:43:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(991,'2017-05-12 22:43:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(992,'2017-05-12 22:43:47','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(993,'2017-05-12 22:43:47','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(994,'2017-05-12 22:43:47','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(995,'2017-05-12 22:43:52','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(996,'2017-05-12 22:43:52','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(997,'2017-05-12 22:43:52','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(998,'2017-05-12 23:30:23','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(999,'2017-05-12 23:30:23','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1000,'2017-05-12 23:30:23','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1001,'2017-05-12 23:37:06','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1002,'2017-05-12 23:37:06','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1003,'2017-05-12 23:37:06','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1004,'2017-05-12 23:42:22','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1005,'2017-05-12 23:42:22','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1006,'2017-05-12 23:42:22','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1007,'2017-05-12 23:44:27','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1008,'2017-05-12 23:44:27','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1009,'2017-05-12 23:44:27','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1010,'2017-05-12 23:44:38','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1011,'2017-05-12 23:44:38','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1012,'2017-05-12 23:44:38','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1013,'2017-05-12 23:44:46','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1014,'2017-05-12 23:44:46','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1015,'2017-05-12 23:44:46','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1016,'2017-05-12 23:45:20','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1017,'2017-05-12 23:45:20','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1018,'2017-05-12 23:45:20','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1019,'2017-05-13 02:13:01','mariano','E','B_CATALOGO_RS','ERROR interno baja catalogo',NULL),(1020,'2017-05-13 02:17:08','mariano','E','B_CATALOGO_RS','ERROR interno baja catalogo',NULL),(1021,'2017-05-13 02:21:25','mariano','E','B_CATALOGO_RS','ERROR interno baja catalogo',NULL),(1022,'2017-05-13 02:40:17','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1023,'2017-05-13 02:40:17','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1024,'2017-05-13 02:40:17','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1025,'2017-05-13 02:40:21','admin','E','GET_CATALOGO_RS(\'null)','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'null)\' at line 1',1),(1026,'2017-05-13 20:21:28','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1027,'2017-05-13 20:21:28','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1028,'2017-05-13 20:21:28','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1029,'2017-05-13 20:39:52','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1030,'2017-05-13 20:39:52','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1031,'2017-05-13 20:39:52','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1032,'2017-05-13 20:40:36','admin','E','begin .SEL_USUARIOS_AYUDA_RS(\'/usuarios/lista\', :data); end;','You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \':data); end\' at line 1',1),(1033,'2017-05-13 20:44:00','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1034,'2017-05-13 20:44:00','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1035,'2017-05-13 20:44:00','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1036,'2017-05-13 20:45:18','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1037,'2017-05-13 20:45:18','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1038,'2017-05-13 20:45:18','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1039,'2017-05-13 20:45:23','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1040,'2017-05-13 20:45:23','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1041,'2017-05-13 20:45:23','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1042,'2017-05-13 20:46:45','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1043,'2017-05-13 20:46:45','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1044,'2017-05-13 20:46:45','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1045,'2017-05-13 20:54:25','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1046,'2017-05-13 20:54:25','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1047,'2017-05-13 20:54:25','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1048,'2017-05-13 20:57:54','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1049,'2017-05-13 20:57:54','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1050,'2017-05-13 20:57:54','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1051,'2017-05-13 21:19:56','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1052,'2017-05-13 21:19:56','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1053,'2017-05-13 21:19:56','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1054,'2017-05-13 22:31:23','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1055,'2017-05-13 22:31:23','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1056,'2017-05-13 22:31:23','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1057,'2017-05-13 22:45:39','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1058,'2017-05-13 22:45:39','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1059,'2017-05-13 22:45:39','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1060,'2017-05-15 00:44:28','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1061,'2017-05-15 00:44:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1062,'2017-05-15 00:44:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1063,'2017-05-15 01:04:44','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1064,'2017-05-15 01:04:44','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1065,'2017-05-15 01:04:44','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1066,'2017-05-15 01:04:56','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1067,'2017-05-15 01:04:56','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1068,'2017-05-15 01:04:56','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1069,'2017-05-15 01:06:02','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1070,'2017-05-15 01:06:02','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1071,'2017-05-15 01:06:02','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1072,'2017-05-20 20:52:46','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1073,'2017-05-20 20:52:46','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1074,'2017-05-20 20:52:46','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1075,'2017-05-20 20:52:58','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1076,'2017-05-20 20:52:58','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1077,'2017-05-20 20:52:58','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1078,'2017-05-20 21:45:26','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1079,'2017-05-20 21:45:26','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1080,'2017-05-20 21:45:26','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1081,'2017-05-20 21:45:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1082,'2017-05-20 21:45:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1083,'2017-05-20 21:45:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1084,'2017-05-20 21:48:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1085,'2017-05-20 21:48:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1086,'2017-05-20 21:48:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1087,'2017-05-20 21:48:43','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1088,'2017-05-20 21:48:44','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1089,'2017-05-20 21:48:44','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1090,'2017-05-20 21:50:08','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1091,'2017-05-20 21:50:09','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1092,'2017-05-20 21:50:09','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1093,'2017-05-20 21:50:26','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1094,'2017-05-20 21:50:26','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1095,'2017-05-20 21:50:26','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1096,'2017-05-20 21:50:36','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1097,'2017-05-20 21:50:36','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1098,'2017-05-20 21:50:36','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1099,'2017-05-20 21:52:12','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1100,'2017-05-20 21:52:12','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1101,'2017-05-20 21:52:12','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1102,'2017-05-20 21:52:44','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1103,'2017-05-20 21:52:44','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1104,'2017-05-20 21:52:44','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1105,'2017-05-20 21:53:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1106,'2017-05-20 21:53:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1107,'2017-05-20 21:53:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1108,'2017-05-20 21:53:33','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1109,'2017-05-20 21:53:33','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1110,'2017-05-20 21:53:33','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1111,'2017-05-20 21:53:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1112,'2017-05-20 21:53:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1113,'2017-05-20 21:53:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1114,'2017-05-20 21:59:54','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1115,'2017-05-20 21:59:54','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1116,'2017-05-20 21:59:54','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1117,'2017-05-21 23:48:21','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1118,'2017-05-21 23:48:21','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1119,'2017-05-21 23:48:21','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1120,'2017-05-22 00:16:28','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1121,'2017-05-22 00:16:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1122,'2017-05-22 00:16:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1123,'2017-05-23 13:45:45','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1124,'2017-05-23 13:45:45','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1125,'2017-05-23 13:45:45','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1126,'2017-05-23 13:58:15','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1127,'2017-05-23 13:58:15','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1128,'2017-05-23 13:58:15','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1129,'2017-05-23 14:08:15','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1130,'2017-05-23 14:08:15','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1131,'2017-05-23 14:08:16','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1132,'2017-05-23 15:44:49','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1133,'2017-05-23 15:44:49','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1134,'2017-05-23 15:44:49','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1135,'2017-05-23 15:44:54','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1136,'2017-05-23 15:44:54','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1137,'2017-05-23 15:44:54','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1138,'2017-05-23 15:45:06','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1139,'2017-05-23 15:45:07','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1140,'2017-05-23 15:45:07','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1141,'2017-05-23 15:45:12','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1142,'2017-05-23 15:45:12','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1143,'2017-05-23 15:45:12','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1144,'2017-05-23 15:46:07','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1145,'2017-05-23 15:46:07','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1146,'2017-05-23 15:46:07','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1147,'2017-05-23 15:46:10','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1148,'2017-05-23 15:46:10','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1149,'2017-05-23 15:46:10','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1150,'2017-05-23 15:47:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1151,'2017-05-23 15:47:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1152,'2017-05-23 15:47:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1153,'2017-05-23 15:47:36','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1154,'2017-05-23 15:47:36','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1155,'2017-05-23 15:47:36','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1156,'2017-05-23 16:11:01','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1157,'2017-05-23 16:11:01','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1158,'2017-05-23 16:11:01','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1159,'2017-05-23 16:46:55','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1160,'2017-05-23 16:46:55','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1161,'2017-05-23 16:46:55','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1162,'2017-05-23 18:28:40','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1163,'2017-05-23 18:28:41','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1164,'2017-05-23 18:28:41','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1165,'2017-05-23 18:29:03','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1166,'2017-05-23 18:29:03','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1167,'2017-05-23 18:29:03','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1168,'2017-05-23 19:30:16','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1169,'2017-05-23 19:30:16','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1170,'2017-05-23 19:30:16','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1171,'2017-05-23 19:30:59','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1172,'2017-05-23 19:30:59','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1173,'2017-05-23 19:30:59','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1174,'2017-05-23 19:31:01','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1175,'2017-05-23 19:31:01','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1176,'2017-05-23 19:31:01','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1177,'2017-05-23 19:35:06','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1178,'2017-05-23 19:35:06','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1179,'2017-05-23 19:35:06','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1180,'2017-05-23 19:35:07','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1181,'2017-05-23 19:35:07','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1182,'2017-05-23 19:35:07','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1183,'2017-05-23 19:35:11','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1184,'2017-05-23 19:35:11','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1185,'2017-05-23 19:35:11','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1186,'2017-05-23 19:37:45','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1187,'2017-05-23 19:37:45','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1188,'2017-05-23 19:37:45','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1189,'2017-05-23 19:38:21','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1190,'2017-05-23 19:38:21','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1191,'2017-05-23 19:38:21','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1192,'2017-05-23 19:38:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1193,'2017-05-23 19:38:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1194,'2017-05-23 19:38:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1195,'2017-05-23 19:38:35','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1196,'2017-05-23 19:38:35','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1197,'2017-05-23 19:38:35','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1198,'2017-05-23 19:50:25','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1199,'2017-05-23 19:50:25','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1200,'2017-05-23 19:50:25','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1201,'2017-05-23 19:50:29','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1202,'2017-05-23 19:50:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1203,'2017-05-23 19:50:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1204,'2017-05-23 19:50:41','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1205,'2017-05-23 19:50:41','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1206,'2017-05-23 19:50:41','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1207,'2017-05-23 19:56:57','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1208,'2017-05-23 19:56:57','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1209,'2017-05-23 19:56:57','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1210,'2017-05-23 19:57:01','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1211,'2017-05-23 19:57:01','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1212,'2017-05-23 19:57:01','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1213,'2017-05-23 19:57:04','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1214,'2017-05-23 19:57:04','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1215,'2017-05-23 19:57:04','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1216,'2017-05-23 19:58:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1217,'2017-05-23 19:58:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1218,'2017-05-23 19:58:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1219,'2017-05-23 19:59:46','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1220,'2017-05-23 19:59:46','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1221,'2017-05-23 19:59:46','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1222,'2017-05-23 19:59:57','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1223,'2017-05-23 19:59:57','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1224,'2017-05-23 19:59:57','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1225,'2017-05-23 20:05:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1226,'2017-05-23 20:05:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1227,'2017-05-23 20:05:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1228,'2017-05-23 20:05:49','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1229,'2017-05-23 20:05:49','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1230,'2017-05-23 20:05:49','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1231,'2017-05-23 20:06:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1232,'2017-05-23 20:06:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1233,'2017-05-23 20:06:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1234,'2017-05-23 20:06:48','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1235,'2017-05-23 20:06:48','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1236,'2017-05-23 20:06:48','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1237,'2017-05-23 20:06:59','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1238,'2017-05-23 20:06:59','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1239,'2017-05-23 20:06:59','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1240,'2017-05-23 20:07:11','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1241,'2017-05-23 20:07:11','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1242,'2017-05-23 20:07:11','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1243,'2017-05-23 20:09:18','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1244,'2017-05-23 20:09:18','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1245,'2017-05-23 20:09:18','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1246,'2017-05-23 20:09:35','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1247,'2017-05-23 20:09:35','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1248,'2017-05-23 20:09:36','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1249,'2017-05-23 20:09:40','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1250,'2017-05-23 20:09:40','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1251,'2017-05-23 20:09:40','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1252,'2017-05-24 13:19:21','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1253,'2017-05-24 13:19:21','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1254,'2017-05-24 13:19:21','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1255,'2017-05-24 13:19:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1256,'2017-05-24 13:19:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1257,'2017-05-24 13:19:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1258,'2017-05-24 13:52:26','admin','E','GET_FICHAS_RS(null)','PROCEDURE gestionverde.GET_FICHAS_RS does not exist',1),(1259,'2017-05-24 14:18:02','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1260,'2017-05-24 14:19:05','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1261,'2017-05-24 14:20:23','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1262,'2017-05-24 14:20:29','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1263,'2017-05-24 14:20:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1264,'2017-05-24 14:20:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1265,'2017-05-24 14:20:30','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1266,'2017-05-24 14:24:16','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1267,'2017-05-24 14:24:16','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1268,'2017-05-24 14:24:17','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1269,'2017-05-24 14:24:18','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1270,'2017-05-24 14:24:22','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1271,'2017-05-24 14:24:22','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1272,'2017-05-24 14:24:22','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1273,'2017-05-24 14:26:05','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1274,'2017-05-24 14:26:15','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1275,'2017-05-24 14:26:15','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1276,'2017-05-24 14:26:15','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1277,'2017-05-24 14:31:08','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1278,'2017-05-24 14:31:08','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1279,'2017-05-24 14:31:08','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1280,'2017-05-24 14:31:16','admin','E','GET_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1281,'2017-05-24 14:31:17','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1282,'2017-05-24 14:31:17','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1283,'2017-05-24 14:31:17','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1284,'2017-05-24 14:33:35','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1285,'2017-05-24 14:33:35','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1286,'2017-05-24 14:33:35','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1287,'2017-05-24 14:35:50','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1288,'2017-05-24 14:35:51','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1289,'2017-05-24 14:35:51','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1290,'2017-05-24 14:35:51','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1291,'2017-05-24 14:36:36','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1292,'2017-05-24 14:36:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1293,'2017-05-24 14:36:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1294,'2017-05-24 14:36:38','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1295,'2017-05-24 14:38:28','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1296,'2017-05-24 14:43:14','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'fch_cata_id\' in \'field list\'',1),(1297,'2017-05-24 14:47:08','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'ficha_cadaid\' in \'where clause\'',1),(1298,'2017-05-24 14:47:22','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'ficha_cata_id\' in \'where clause\'',1),(1299,'2017-05-24 14:47:33','admin','E','GET_ABM_FICHA_RS(null)','Unknown column \'ficha_cata_id\' in \'where clause\'',1),(1300,'2017-05-24 14:56:10','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1301,'2017-05-24 14:56:10','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1302,'2017-05-24 14:56:10','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1303,'2017-05-24 16:10:29','admin','E','GET_FICHA_RS(\'1\')','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1304,'2017-05-24 16:10:32','admin','E','GET_FICHA_RS(\'1\')','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1305,'2017-05-24 16:10:34','admin','E','GET_FICHA_RS(\'1\')','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1306,'2017-05-24 16:19:48','admin','E','GET_FICHA_RS(\'1\')','Unknown column \'fich_deno_redu\' in \'field list\'',1),(1307,'2017-05-24 17:27:35','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1308,'2017-05-24 17:27:35','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1309,'2017-05-24 17:27:35','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1310,'2017-05-24 21:52:29','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1311,'2017-05-24 21:52:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1312,'2017-05-24 21:52:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1313,'2017-05-25 19:47:59','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1314,'2017-05-25 19:47:59','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1315,'2017-05-25 19:48:00','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1316,'2017-05-25 20:18:45','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1317,'2017-05-25 20:18:45','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1318,'2017-05-25 20:18:45','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1319,'2017-05-25 20:18:49','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1320,'2017-05-25 20:18:49','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1321,'2017-05-25 20:18:49','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1322,'2017-05-25 20:20:15','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1323,'2017-05-25 20:20:15','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1324,'2017-05-25 20:20:15','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1325,'2017-05-25 20:20:39','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1326,'2017-05-25 20:20:39','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1327,'2017-05-25 20:20:39','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1328,'2017-05-25 20:21:41','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1329,'2017-05-25 20:21:41','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1330,'2017-05-25 20:21:41','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1331,'2017-05-25 21:25:51','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1332,'2017-05-25 21:25:51','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1333,'2017-05-25 21:25:51','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1334,'2017-05-25 21:26:06','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1335,'2017-05-25 21:26:06','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1336,'2017-05-25 21:26:06','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1337,'2017-05-25 21:26:26','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1338,'2017-05-25 21:26:26','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1339,'2017-05-25 21:26:26','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1340,'2017-05-25 21:27:19','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1341,'2017-05-25 21:27:19','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1342,'2017-05-25 21:27:19','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1343,'2017-05-25 21:27:23','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1344,'2017-05-25 21:27:23','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1345,'2017-05-25 21:27:23','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1346,'2017-05-25 21:35:31','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1347,'2017-05-25 21:35:31','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1348,'2017-05-25 21:35:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1349,'2017-05-27 18:27:04','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1350,'2017-05-27 18:27:04','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1351,'2017-05-27 18:27:04','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1352,'2017-05-27 19:00:47','admin','E','GET_ABM_FICHA_RS(null)','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 3, got 1',1),(1353,'2017-05-27 19:00:51','admin','E','GET_TAMANIO_RS(null)','PROCEDURE gestionverde.GET_TAMANIO_RS does not exist',1),(1354,'2017-05-27 19:01:13','admin','E','GET_ABM_FICHA_RS(null)','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 3, got 1',1),(1355,'2017-05-27 19:02:09','admin','E','GET_ABM_FICHA_RS(null,0)','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 3, got 2',1),(1356,'2017-05-27 19:03:04','admin','E','GET_ABM_FICHA_RS(null,\'S\')','Incorrect number of arguments for PROCEDURE gestionverde.GET_ABM_FICHA_RS; expected 3, got 2',1),(1357,'2017-05-27 19:15:19','admin','E','GET_TAMANIO_RS(null)','PROCEDURE gestionverde.GET_TAMANIO_RS does not exist',1),(1358,'2017-05-27 19:25:37','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Pequeño\',\r\n                                       \'Peq.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1359,'2017-05-27 19:25:46','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Mediano\',\r\n                                       \'Med.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1360,'2017-05-27 19:26:01','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Grande\',\r\n                                       \'Gran.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1361,'2017-05-27 19:26:01','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Grande\',\r\n                                       \'Gran.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1362,'2017-05-27 19:26:56','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Mediano\',\r\n                                       \'Med.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1363,'2017-05-27 19:27:04','admin','E','AM_TAMANIO_RS(\'admin\',\r\n                                       \'\',\r\n                                       \'Grande\',\r\n                                       \'Gran.\');','Unknown column \'p_cata_deno\' in \'field list\'',1),(1364,'2017-05-27 20:12:44','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1365,'2017-05-27 20:12:44','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1366,'2017-05-27 20:12:44','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1367,'2017-05-27 20:17:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1368,'2017-05-27 20:17:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1369,'2017-05-27 20:17:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1370,'2017-05-27 20:17:42','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1371,'2017-05-27 20:17:42','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1372,'2017-05-27 20:17:42','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1373,'2017-05-27 20:18:19','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1374,'2017-05-27 20:18:19','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1375,'2017-05-27 20:18:19','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1376,'2017-05-27 20:18:57','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1377,'2017-05-27 20:18:57','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1378,'2017-05-27 20:18:57','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1379,'2017-05-27 20:19:15','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1380,'2017-05-27 20:19:15','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1381,'2017-05-27 20:19:15','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1382,'2017-05-27 20:19:37','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1383,'2017-05-27 20:19:37','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1384,'2017-05-27 20:19:37','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1385,'2017-05-27 20:19:56','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1386,'2017-05-27 20:19:56','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1387,'2017-05-27 20:19:56','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1388,'2017-05-27 20:20:29','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1389,'2017-05-27 20:20:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1390,'2017-05-27 20:20:30','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1391,'2017-05-27 20:22:05','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1392,'2017-05-27 20:22:05','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1393,'2017-05-27 20:22:05','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1394,'2017-05-27 20:22:10','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1395,'2017-05-27 20:22:11','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1396,'2017-05-27 20:22:11','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1397,'2017-05-27 20:23:40','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1398,'2017-05-27 20:23:41','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1399,'2017-05-27 20:23:41','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1400,'2017-05-27 20:24:56','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1401,'2017-05-27 20:24:56','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1402,'2017-05-27 20:24:56','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1403,'2017-05-27 20:26:51','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1404,'2017-05-27 20:26:51','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1405,'2017-05-27 20:26:51','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1406,'2017-05-27 23:18:04','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1407,'2017-05-27 23:18:04','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1408,'2017-05-27 23:18:04','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1409,'2017-05-28 00:04:29','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1410,'2017-05-28 00:04:29','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1411,'2017-05-28 00:04:29','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1412,'2017-05-28 19:22:05','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1413,'2017-05-28 19:22:05','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1414,'2017-05-28 19:22:05','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1415,'2017-05-28 19:22:13','admin','E','SEL_FUENTES_FICHA_RS(\'\')','Table \'gestionverde.fuente\' doesn\'t exist',1),(1416,'2017-05-28 19:25:44','admin','E','SEL_FUENTES_FICHA_RS(\'\')','Table \'gestionverde.fuente\' doesn\'t exist',1),(1417,'2017-05-28 19:28:23','admin','E','SEL_FUENTES_FICHA_RS(\'1\')','Table \'gestionverde.fuente\' doesn\'t exist',1),(1418,'2017-05-28 19:31:46','admin','E','SEL_FUENTES_FICHA_RS(\'\')','Table \'gestionverde.fuente\' doesn\'t exist',1),(1419,'2017-05-29 23:39:30','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1420,'2017-05-29 23:39:30','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1421,'2017-05-29 23:39:31','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1422,'2017-05-29 23:40:08','admin','E','SEL_FUENTES_FICHA_RS(\'1\')','Table \'gestionverde.fuente\' doesn\'t exist',1),(1423,'2017-05-30 00:23:54','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1424,'2017-05-30 00:49:17','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1425,'2017-05-30 00:49:17','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1426,'2017-05-30 00:49:17','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1427,'2017-05-30 00:58:27','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1428,'2017-05-30 00:58:27','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1429,'2017-05-30 00:58:27','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1430,'2017-06-03 12:09:16','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1431,'2017-06-03 12:09:16','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1432,'2017-06-03 12:09:16','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1433,'2017-06-03 13:21:25','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1434,'2017-06-03 13:21:25','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1435,'2017-06-03 13:21:25','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1436,'2017-06-03 13:56:53','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1437,'2017-06-03 13:56:53','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1438,'2017-06-03 13:56:53','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1439,'2017-06-03 21:37:08','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1440,'2017-06-03 21:37:08','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1441,'2017-06-03 21:37:08','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1442,'2017-06-03 22:15:16','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1443,'2017-06-03 22:15:16','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1444,'2017-06-03 22:15:16','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1445,'2017-06-03 22:15:25','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1446,'2017-06-03 22:15:26','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1447,'2017-06-03 22:15:26','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1448,'2017-06-03 22:15:26','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1449,'2017-06-03 22:16:01','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1450,'2017-06-03 22:16:01','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1451,'2017-06-03 22:16:01','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1452,'2017-06-03 22:16:01','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert temp #lisfas',NULL),(1453,'2017-06-03 22:17:14','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1454,'2017-06-03 22:18:56','admin','E','SEL_CAMP_CABE_ALUMNO_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CABE_ALUMNO_RS does not exist',1),(1455,'2017-06-03 22:18:56','admin','E','SEL_CAMP_INCRIP_FECHAS_STATUS_RS(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_INCRIP_FECHAS_STATUS_RS does not exist',1),(1456,'2017-06-03 22:18:56','admin','E','SEL_CAMP_CARTEL_TODA_HOY(\'admin\')','PROCEDURE gestionverde.SEL_CAMP_CARTEL_TODA_HOY does not exist',1),(1457,'2017-06-03 22:20:24','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1458,'2017-06-03 22:30:31','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1459,'2017-06-03 22:32:24','admin','E','AM_FICHA_RS(\'admin\',\r\n                                   \'\',\r\n                                   \'sonido\',\r\n                                   \'consideración sobre la contaminación del sonido\',\r\n                                   \'\');','Incorrect number of arguments for PROCEDURE gestionverde.AM_FICHA_RS; expected 4, got 5',1),(1460,'2017-06-03 22:34:25','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1461,'2017-06-03 22:37:37','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1462,'2017-06-03 22:39:43','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1463,'2017-06-03 22:44:38','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1464,'2017-06-03 22:59:00','admin','E','AM_FICHA_FASES_RS','ERROR interno al insert ficha_fases',NULL),(1465,'2017-06-03 23:10:44','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1466,'2017-06-03 23:12:59','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1467,'2017-06-03 23:24:58','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1468,'2017-06-03 23:25:07','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1469,'2017-06-03 23:26:28','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL),(1470,'2017-06-03 23:27:00','admin','E','AM_FICHA_MEDIOS_RS','ERROR interno al insert ficha_fases',NULL);
UNLOCK TABLES;

--
-- Table structure for table `usu_menues_apli`
--

DROP TABLE IF EXISTS `usu_menues_apli`;
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

--
-- Dumping data for table `usu_menues_apli`
--

LOCK TABLES `usu_menues_apli` WRITE;
INSERT INTO `usu_menues_apli` VALUES ('GAMSI','m_abmfichas','m_fichas','m_abmfichas','ABM Fichas','abmFichas/abmFichas','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_admin','m_admin',' ','Seguridad',NULL,'S','2017-05-01','admin',NULL,NULL,40,'icon-user'),('GAMSI','m_catalogos','m_tablas','m_catalogos','Cat&aacute;logos','catalogos/catalogos','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_consfichas','m_fichas','m_consfichas','Consulta Fichas','consultaFichas/consultaFichas','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_fases','m_tablas','m_fases','Fases','fases/fases','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_fichas','m_fichas',' ','Fichas','','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_medios','m_tablas','m_medios','Medios','medios/medios','S','2017-05-01','admin',NULL,NULL,40,'icon-user'),('GAMSI','m_proyectos','m_proyectos',' ','Proyectos','','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_proye_arma','m_proyectos','m_proye_arma','Armado de Proyecto','armaProyecto/armaProyecto','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_proye_baja','m_proyectos','m_proye_baja','Baja de Proyecto','bajaProyecto/bajaProyecto','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_proye_segui','m_proyectos','m_proye_segui','Segumiento de Proyecto','seguiProyecto/seguiProyecto','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_tablas','m_tablas',' ','Tablas','','S','2017-05-01','admin',NULL,NULL,10,'icon-user'),('GAMSI','m_tamanio','m_tablas','m_tamanio','Tama&ntilde;os','tamanios/tamanios','S','2017-05-01','admin',NULL,NULL,30,'icon-user'),('GAMSI','m_ulogaccesos','m_admin','m_ulogaccesos','Log de Usuarios','usuarios/logs','S','2017-05-01','admin',NULL,NULL,60,'icon-user'),('GAMSI','m_uroles','m_admin','m_uroles','Definir Roles','roles/roles','S','2017-05-01','admin',NULL,NULL,20,'icon-user'),('GAMSI','m_usuarios','m_admin','m_usuarios','Usuarios','usuarios/lista','S','2017-05-01','admin',NULL,NULL,30,'icon-user');
UNLOCK TABLES;

--
-- Table structure for table `usu_menues_rol`
--

DROP TABLE IF EXISTS `usu_menues_rol`;
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

--
-- Dumping data for table `usu_menues_rol`
--

LOCK TABLES `usu_menues_rol` WRITE;
INSERT INTO `usu_menues_rol` VALUES ('GAMSI','ADMIN','m_admin','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_fichas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_proyectos','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ADMIN','m_tablas','S','S','S','S','0000-00-00','admin',NULL,NULL),('GAMSI','ALUMNO','m_alumno','S','S','S','S','0000-00-00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `usu_roles`
--

DROP TABLE IF EXISTS `usu_roles`;
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

--
-- Dumping data for table `usu_roles`
--

LOCK TABLES `usu_roles` WRITE;
INSERT INTO `usu_roles` VALUES ('ADMIN','Administracion de la aplicacion','S','0000-00-00','admin',NULL,NULL,'S','S','S','S'),('ALUMNO','perfil para el alumno','S','0000-00-00','admin',NULL,NULL,'S','S','S','S'),('CONSULTA','No modifica datos','S','0000-00-00','admin',NULL,NULL,'N','N','N','N');
UNLOCK TABLES;

--
-- Table structure for table `usu_roles_usuario`
--

DROP TABLE IF EXISTS `usu_roles_usuario`;
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

--
-- Dumping data for table `usu_roles_usuario`
--

LOCK TABLES `usu_roles_usuario` WRITE;
INSERT INTO `usu_roles_usuario` VALUES ('ADMIN','admin','S','0000-00-00','admin',NULL,NULL),('ALUMNO','1716112725','S','2016-09-14','sistema',NULL,NULL),('ALUMNO','18215859','S','2016-09-09','sistema',NULL,NULL),('ALUMNO','18859217','S','2016-09-23','sistema',NULL,NULL),('ALUMNO','34389682','S','2016-09-19','sistema',NULL,NULL),('ALUMNO','36314598','S','2016-09-09','sistema',NULL,NULL),('ALUMNO','38069305','S','2016-09-19','sistema',NULL,NULL),('ALUMNO','40462857','S','2016-09-13','sistema',NULL,NULL),('ALUMNO','40923448','S','2016-09-23','sistema',NULL,NULL),('ALUMNO','mariano.drets','S','0000-00-00','admin',NULL,NULL),('CONSULTA','consulta','S','0000-00-00','admin',NULL,NULL);
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
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

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
INSERT INTO `usuarios` VALUES ('1716112725','5a7983d0ab14dbbc95d914eaf2872068','IRIGOYEN BONILLA, María Cristina (Alta autom alumno)','S','2016-09-14','sistema',NULL,NULL,12,NULL),('18215859','3c33384b0307652f21116a66f98a2bda','IRRAZABAL, Clara Anselma (Alta autom alumno)','S','2016-09-09','sistema',NULL,NULL,12,NULL),('18859217','e72a2d14f4e2e4c67a33a6e159291f17','NUÑEZ, Aurelien Jaime Anselme (Alta autom alumno)','S','2016-09-23','sistema',NULL,NULL,12,NULL),('34389682','dbacf37e30fa0c8c362c2fbb887f1da4','GUINART BOGUSLAWSKI, Carolina Alexandra María (Alta autom alumno)','S','2016-09-19','sistema',NULL,NULL,12,NULL),('36314598','4bd7c421aa1a52a5e898dc91e87927eb','CORTINA REVELLI, Valentina (Alta autom alumno)','S','2016-09-09','sistema',NULL,NULL,12,NULL),('38069305','b5f85bcc8a944b2275489ad0dffa9969','Biancucci, Matias Ezequiel (Alta autom alumno)','S','2016-09-19','sistema',NULL,NULL,12,NULL),('40462857','0686a2399c4380c6cd821b22bf349483','FERNANDEZ, Juana (Alta autom alumno)','S','2016-09-13','sistema',NULL,NULL,12,NULL),('40923448','2ac0f66a2c6dfe3fb38a8b07093a6e35','ARIAS, Eva Guadalupe (Alta autom alumno)','S','2016-09-23','sistema',NULL,NULL,12,NULL),('admin','21232f297a57a5a743894a0e4a801fc3','usuario administrador','S','2015-07-23','admin','2015-10-06','admin',20,0),('consulta','5d76beffe761403531a6eb339e0f0231','Perfil de solo consulta','S','2016-04-19','mariano.drets','0000-00-00','',0,0),('mariano.drets','6fbcf2d48c7dce4ddbb52a1fd849b698','Fundacion','S','2015-07-23','admin','2015-10-07','admin',20,0);
UNLOCK TABLES;

--
-- Table structure for table `zz_ayuda`
--

DROP TABLE IF EXISTS `zz_ayuda`;
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

--
-- Dumping data for table `zz_ayuda`
--

LOCK TABLES `zz_ayuda` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `zz_repo_exportar`
--

DROP TABLE IF EXISTS `zz_repo_exportar`;
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

--
-- Dumping data for table `zz_repo_exportar`
--

LOCK TABLES `zz_repo_exportar` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `zz_sistema`
--

DROP TABLE IF EXISTS `zz_sistema`;
CREATE TABLE `zz_sistema` (
  `texto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zz_sistema`
--

LOCK TABLES `zz_sistema` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `zz_tabla_info`
--

DROP TABLE IF EXISTS `zz_tabla_info`;
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

--
-- Dumping data for table `zz_tabla_info`
--

LOCK TABLES `zz_tabla_info` WRITE;
INSERT INTO `zz_tabla_info` VALUES ('calu_fechanac','camp_alumnos','date',10,'N','F.nacim','fecha de nacimiento','2016-09-14',NULL);
UNLOCK TABLES;

--
-- Dumping events for database 'gestionverde'
--

--
-- Dumping routines for database 'gestionverde'
--
DROP FUNCTION IF EXISTS `F_CONSISTEN_CHAR`;
DELIMITER ;;
CREATE   FUNCTION `F_CONSISTEN_CHAR`(
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

DROP FUNCTION IF EXISTS `F_CONSISTEN_DATE`;
DELIMITER ;;
CREATE   FUNCTION `F_CONSISTEN_DATE`(
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
DROP FUNCTION IF EXISTS `F_CONSISTEN_NUMBER`;
DELIMITER ;;
CREATE   FUNCTION `F_CONSISTEN_NUMBER`(
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

DROP FUNCTION IF EXISTS `F_EDAD` ; 
DELIMITER ;;
CREATE   FUNCTION `F_EDAD`(
a_fecha_nacim date) RETURNS int(11)
BEGIN
if a_fecha_nacim = '' then
	RETURN 0;
end if;
RETURN YEAR(CURDATE())-YEAR(a_fecha_nacim) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(a_fecha_nacim,'%m-%d'), 0, -1);
END ;;
DELIMITER ;
 
DROP FUNCTION IF EXISTS `F_PROPER`; 
DELIMITER ;;
CREATE   FUNCTION `F_PROPER`( str VARCHAR(128) ) RETURNS varchar(128) CHARSET utf8
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
  
DROP FUNCTION IF EXISTS  `F_TIRA_DE_ROLES`; 
DELIMITER ;;
CREATE   FUNCTION `F_TIRA_DE_ROLES`(
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
 
DROP FUNCTION IF EXISTS `F_TIRA_DE_USUARIOS_X_ROL`; 
DELIMITER ;;
CREATE   FUNCTION `F_TIRA_DE_USUARIOS_X_ROL`(
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
 
DROP FUNCTION IF EXISTS `F_TO_DATE`;
DELIMITER ;;
CREATE   FUNCTION `F_TO_DATE`(
 p_fecha_text char(10)
) RETURNS char(12) CHARSET utf8
BEGIN

RETURN concat(CHAR(39 USING ASCII),mid(p_fecha_text,7,4),'-',mid(p_fecha_text,4,2),'-',mid(p_fecha_text,1,2),CHAR(39 USING ASCII));
END ;;
DELIMITER ;
  
DROP FUNCTION IF EXISTS `F_TRIM`; 
DELIMITER ;;
CREATE   FUNCTION `F_TRIM`(
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
 
DROP FUNCTION IF EXISTS `F_USU_FILAS_PAG`; 
DELIMITER ;;
CREATE   FUNCTION `F_USU_FILAS_PAG`(
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
 
DROP FUNCTION IF EXISTS `F_VAL_CUIT`; 
DELIMITER ;;
CREATE   FUNCTION `F_VAL_CUIT`(
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
 
DROP FUNCTION IF EXISTS `F_VAL_EMAIL`; 
DELIMITER ;;
CREATE   FUNCTION `F_VAL_EMAIL`(
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
 
DROP FUNCTION IF EXISTS `F_VAL_NRO_TELEFONO` ; 
DELIMITER ;;
CREATE   FUNCTION `F_VAL_NRO_TELEFONO`(
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
 
DROP FUNCTION IF EXISTS `F_ZZI_LOG_ERR`; 
DELIMITER ;;
CREATE   FUNCTION `F_ZZI_LOG_ERR`(
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
 
DROP PROCEDURE IF EXISTS `AM_CATALOGO_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_CATALOGO_RS`(
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
DROP PROCEDURE IF EXISTS `AM_FASE_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_FASE_RS`(
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
 
DROP PROCEDURE IF EXISTS `AM_FICHA_FASES_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_FICHA_FASES_RS`(
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
 
DROP PROCEDURE IF EXISTS `AM_FICHA_MEDIOS_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_FICHA_MEDIOS_RS`(
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
 
DROP PROCEDURE IF EXISTS `AM_FICHA_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_FICHA_RS`(
  IN p_user varchar(50),
  IN p_fich_id int,
  IN p_fich_deno varchar(500),
  IN p_fich_desc varchar(500),
  IN p_fich_cata_id int
)
BEGIN
  DECLARE v_fich_id_dup int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  
  
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


	/*	
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
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  

  
END ;;
DELIMITER ; 
DROP PROCEDURE IF EXISTS `AM_TAMANIO_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `AM_TAMANIO_RS`( 
  IN p_user varchar(50),
  IN p_tamanio_id int,
  IN p_tamanio_deno varchar(500),
  IN p_tamanio_deno_redu varchar(500)
)
BEGIN
  DECLARE v_tamanio_id int; 
  DECLARE v_respuesta varchar(100) DEFAULT 'OK';
  DECLARE v_errores varchar(2000) DEFAULT NULL;
  
IF NOT EXISTS (SELECT 1 FROM tamanio
                    WHERE tamanio_id = p_tamanio_id) THEN
      BEGIN -- alta
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN -- de excepcion
        	ROLLBACK;
            SET v_respuesta = F_ZZI_LOG_ERR(p_user,'ERROR interno al insert tamanio','AM_TAMANIO_RS');
        END; -- de excepcion
        
        INSERT INTO tamanio (
          tamanio_deno,
          tamanio_deno_redu,
          tamanio_alta_f,
          tamanio_alta_usu)
        VALUES (
          p_tamanio_deno,
          p_tamanio_deno_redu,
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
             SET tamanio_deno      = p_tamanio_deno,
				 tamanio_deno_redu = p_tamanio_deno_redu,
                 tamanio_baja_f    = null
           WHERE tamanio_id = p_tamanio_id;
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
		concat('Tamaño ',p_cata_deno),
		now());
    
COMMIT;
  
  SELECT v_respuesta as respuesta,
         case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
    FROM DUAL;  
END ;;
DELIMITER ;
 
DROP PROCEDURE IF EXISTS `B_CATALOGO_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `B_CATALOGO_RS`(
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
 
DROP PROCEDURE IF EXISTS `B_FASE_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `B_FASE_RS`(
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
 
DROP PROCEDURE IF EXISTS `B_TAMANIO_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `B_TAMANIO_RS`(
	IN p_user varchar(50),
	IN p_tamanio_id int
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
	 SET tamanio_baja_f    = date(CURDATE()),
		 tamanio_baja_usu  = p_user
   WHERE tamanio_id = p_tamanio_id;
END;
 
COMMIT;

SELECT v_respuesta as respuesta,
	 case when v_respuesta = 'OK' then 'Actualización correcta' else '' end as respues_exito
FROM DUAL;  

END ;;
DELIMITER ;
 
DROP PROCEDURE IF EXISTS `GET_ABM_FICHA_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `GET_ABM_FICHA_RS`(
    IN p_user char(50),
	IN p_cata_id int,
    IN p_descri varchar(50))
BEGIN

-- call GET_ABM_FICHA_RS ('ff',1,'manipula')
SELECT fich_id,
		   f_proper(cata_deno) as cata_deno,
		   f_proper(fich_deno) as fich_deno,
           fich_desc 
	FROM ficha,catalogo
    
    WHERE fich_cata_id = cata_id
    AND (cata_id = p_cata_id or p_cata_id = 0)
    AND (fich_deno like concat('%',p_descri,'%') or p_descri is null)
    AND fich_baja_f is null
    ORDER BY 2;

END ;;
DELIMITER ;
 
DROP PROCEDURE IF EXISTS `GET_CAMP_PAISES_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `GET_CAMP_PAISES_RS`(
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
 
DROP PROCEDURE IF EXISTS `GET_CATALOGO_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `GET_CATALOGO_RS`(
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
        where p_todos ='S';
END ;;
DELIMITER ;
 
 DROP PROCEDURE IF EXISTS `GET_FASE_RS`; 
 DELIMITER ;; 
CREATE   PROCEDURE `GET_FASE_RS`(
	IN p_fase_id int)
BEGIN
	SELECT fase_id,
		   f_proper(fase_deno) as fase_deno,
           f_proper(fase_deno_redu) as fase_deno_redu

	FROM fase
    WHERE (fase_id = p_fase_id or p_fase_id is null)
    AND fase_baja_f is null
    ORDER BY 2;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS `GET_FICHA_RS`; 
DELIMITER ;; 
CREATE   PROCEDURE `GET_FICHA_RS`(
  IN p_fich_id int
)
BEGIN
SELECT fich_id,
    fich_deno,
    fich_desc,
    fich_alta_f,
    fich_alta_usu
FROM ficha
WHERE (fich_id = p_fich_id or p_fich_id is null)
AND fich_baja_f is null
order by 2;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS `GET_PARAMETROS_RS`; 
DELIMITER ;;
CREATE   PROCEDURE `GET_PARAMETROS_RS`(
  IN p_empre int,
  IN p_para_clave varchar(30)
)
BEGIN

SELECT para_valor_n, para_valor_c
FROM parametros
WHERE para_clave = p_para_clave;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS GET_TAMANIO_RS; 
DELIMITER ; ;
CREATE   PROCEDURE `GET_TAMANIO_RS`(
	IN p_tamanio_id int)
BEGIN
	SELECT tamanio_id,
		   f_proper(tamanio_deno) as tamanio_deno,
           f_proper(tamanio_deno_redu) as tamanio_deno_redu

	FROM tamanio
    WHERE (tamanio_id = p_tamanio_id or p_tamanio_id is null)
    AND tamanio_baja_f is null
    ORDER BY 2;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS SEL_CAMP_INICIO; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_CAMP_INICIO`(
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
DROP PROCEDURE IF EXISTS SEL_CAMP_LOCALIDADES_BUSCAR_RS; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_CAMP_LOCALIDADES_BUSCAR_RS`(
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
DROP PROCEDURE IF EXISTS SEL_CAMP_PROVINCIAS_DD_RS; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_CAMP_PROVINCIAS_DD_RS`(
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
DROP FUNCTION IF EXISTS SEL_DD_CAMP_PROVINCIAS_RS; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_DD_CAMP_PROVINCIAS_RS`(
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
DROP PROCEDURE IF EXISTS SEL_FASES_FICHA_RS; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_FASES_FICHA_RS`(
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
DROP PROCEDURE IF EXISTS SEL_MEDIOS_FICHA_RS; 
DELIMITER ;;
CREATE   PROCEDURE `SEL_MEDIOS_FICHA_RS`(
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
DROP PROCEDURE IF EXISTS USU_ABM_ROLES_ARMADO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ABM_ROLES_ARMADO_RS`(
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
DROP PROCEDURE IF EXISTS USU_ABM_ROLES_RS ; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ABM_ROLES_RS`(
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
DROP PROCEDURE IF EXISTS USU_ABM_ROLES_USUARIO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ABM_ROLES_USUARIO_RS`(
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
DROP PROCEDURE IF EXISTS USU_ABM_USUARIOS_RS;
DELIMITER ;;
CREATE   PROCEDURE `USU_ABM_USUARIOS_RS`(
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
DROP PROCEDURE IF EXISTS USU_ABM_USUARIO_PWD_RS;
DELIMITER ;;
CREATE   PROCEDURE `USU_ABM_USUARIO_PWD_RS`(
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
DROP PROCEDURE IF EXISTS USU_ACCESOS_LOG_LISTA_OPCIO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ACCESOS_LOG_LISTA_OPCIO_RS`()
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
DROP PROCEDURE IF EXISTS USU_ACCESOS_LOG_RP ; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ACCESOS_LOG_RP`(
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
DROP PROCEDURE IF EXISTS USU_BUSCAR_USUARIO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_BUSCAR_USUARIO_RS`(
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
DROP PROCEDURE IF EXISTS USU_GET_LAST_LOGIN_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_GET_LAST_LOGIN_RS`(
  IN p_user varchar(50)
)
BEGIN

 select max(usal_fecha_hora) as usal_fecha_hora

from usu_accesos_log
where usal_usua_nombre = p_user;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS USU_GET_PARAMETROS_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_GET_PARAMETROS_RS`(
  IN p_empre int,
  IN p_para_clave varchar(30)
)
BEGIN

SELECT para_valor_n, para_valor_c, para_texto
FROM parametros
WHERE para_clave = p_para_clave;
END ;;
DELIMITER ;
DROP PROCEDURE IF EXISTS USU_GET_USUARIOS_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_GET_USUARIOS_RS`(
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
DROP PROCEDURE IF EXISTS USU_INCIDENTES_LOG_RP; 
DELIMITER ;;
CREATE   PROCEDURE `USU_INCIDENTES_LOG_RP`(
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
DROP PROCEDURE IF EXISTS USU_INS_INCIDENTES_LOG; 
DELIMITER ;;
CREATE   PROCEDURE `USU_INS_INCIDENTES_LOG`(
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
DROP PROCEDURE IF EXISTS USU_LISTA_ROL_ARMADO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_LISTA_ROL_ARMADO_RS`(
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
DROP PROCEDURE IF EXISTS USU_LISTA_USUARIOS_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_LISTA_USUARIOS_RS`(
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
DROP PROCEDURE IF EXISTS USU_MENUES_X_ROLES_RS ; 
DELIMITER ;;
CREATE   PROCEDURE `USU_MENUES_X_ROLES_RS`(
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
DROP PROCEDURE IF EXISTS USU_MENUES_X_USUARIO_RS;
 DELIMITER ;;
CREATE   PROCEDURE `USU_MENUES_X_USUARIO_RS`(
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
DROP PROCEDURE IF EXISTS USU_ROLES_DEFINIDOS_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_ROLES_DEFINIDOS_RS`(
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
DROP PROCEDURE IF EXISTS USU_ROL_RS;
DELIMITER ;;
CREATE   PROCEDURE `USU_ROL_RS`(
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
DROP PROCEDURE IF EXISTS USU_SEL_ADMIN_USUARIOS_RS;
 DELIMITER ;;
CREATE   PROCEDURE `USU_SEL_ADMIN_USUARIOS_RS`()
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
DROP PROCEDURE IF EXISTS USU_SENDMAIL_PWD_RS;
 DELIMITER ;;
CREATE   PROCEDURE `USU_SENDMAIL_PWD_RS`(
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
DROP PROCEDURE IF EXISTS USU_SET_PARAMETROS_RS;
 DELIMITER ;;
CREATE   PROCEDURE `USU_SET_PARAMETROS_RS`(
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
DROP PROCEDURE IF EXISTS USU_USUARIO_RS; 
DELIMITER ;;
CREATE   PROCEDURE `USU_USUARIO_RS`(
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
DROP PROCEDURE IF EXISTS USU_VALIDA_USUARIO_HOY_RS;
 DELIMITER ;;
CREATE   PROCEDURE `USU_VALIDA_USUARIO_HOY_RS`(
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
DROP PROCEDURE IF EXISTS ZZU_TABLA_INFO; 
DELIMITER ;;
CREATE   PROCEDURE `ZZU_TABLA_INFO`()
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


-- Dump completed on 2017-06-04 11:06:14
