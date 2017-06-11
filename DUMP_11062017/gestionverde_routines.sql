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
	    
	DELETE from ficha_tipologia
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
    
    
    INSERT INTO ficha_tipologia (fiti_fich_id,
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
SELECT fipr_fich_id,
    fipr_proce_id,
    fipr_texto,
    fipr_alta_f,
    fipr_alta_usu
FROM ficha_procedimientos
WHERE (fipr_fich_id = p_fich_id or p_fich_id is null)
AND fipr_baja_f is null
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
    fich_alta_usu
FROM ficha
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
	IN p_medio_id int
)
BEGIN
	SELECT medi_id as medio_id,
	f_proper(medi_deno) as medio_deno,
    f_proper(medi_deno_redu) as medio_deno_redu
	FROM medio
    WHERE (medi_id = p_medio_id or p_medio_id is null)
    AND medi_baja_f is null
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
	IN p_tama_id int)
BEGIN
	SELECT tama_id,
		   f_proper(tama_deno) as tama_deno,
           f_proper(tama_deno_redu) as tama_deno_redu

	FROM tamanio
    WHERE (tama_id = p_tama_id or p_tama_id is null)
    AND tama_baja_f is null
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
  IN p_tipo_id int
)
BEGIN
SELECT tipo_id, 
	   f_proper(tipo_deno) as tipo_deno,
       f_proper(tipo_deno_redu) as tipo_deno_redu
FROM tipologia
WHERE (tipo_id = p_tipo_id or p_tipo_id is null)
AND tipo_baja_f is null
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
	left outer join ficha_tipologia on fiti_fich_id = p_fich_id
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

-- Dump completed on 2017-06-11 16:08:47
