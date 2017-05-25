<?php 

class Adjuntos
{
    static public function alta($entidad, $archivo, $descripcion, $nombre, $aler_proceso = null, $aler_codigo = null, $aler_id = null)
    {
        //M_ENTIDAD_DOC_ADJUNTOS_RS ('A',p_user,777,null,'Balance.pdf',null,null,RS)
        if(empty($aler_proceso)):
            $aler_proceso = 'NULL';
        else:
            $aler_proceso = "'$aler_proceso'";
        endif;
        if(empty($aler_codigo)):
            $aler_codigo  = 'NULL';
        else:
            $aler_codigo  = "'$aler_codigo'";
        endif;
        if(empty($aler_id)):
            $aler_id      = 'NULL';
        else:
            $aler_id      = "'$aler_id'";
        endif;
        $sql = sprintf(
        "INSERT INTO %s.ENTIDAD_DOC_ADJUNTOS(
                ENDA_ENTI_CODIGO,
                ENDA_ITEM,
                ENDA_DESCRIPCION,
                ENDA_FECHA,
                ENDA_HABILITADO,
                ENDA_FCH_ALTA,
                ENDA_USR_ALTA,
                ENDA_ADJUNTO,
                ENDA_ALOP_PROCE_NRO,
                ENDA_ALOP_ALER_CODIGO,
                ENDA_ALOP_ALOD_ID
                ) 
        VALUES( 
                :entidad,
                (SELECT nvl(MAX(ENDA_ITEM), 0) FROM ENTIDAD_DOC_ADJUNTOS)+1,
                :descripcion,
                sysdate,
                'S',
                sysdate,
                :usuario, 
                EMPTY_BLOB(),
                %s,
                %s,
                %s
              )        
        RETURNING 
            ENDA_ADJUNTO 
        INTO 
            :archivo",
            sfConfig::get('SCHEMA_ORACLE'),
            $aler_proceso, $aler_codigo, $aler_id );

            //"begin AM_ENTIDAD_DOC_ADJUNTOS_RS('A','%s','%s', null, '%s',null, null, :data); end;" ,

            //$entidad,$archivo);
        //print($sql);exit;
        $cnx =  BackendServices::getInstance()->getConnection();

        $lob = oci_new_descriptor($cnx, OCI_D_LOB);

    // preparamos la SQL
    //$sql = "INSERT INTO web_temp_blob(ID, nombre, archivo) VALUES(seq_web_temp_blob.NEXTVAL,            :nombre, EMPTY_BLOB()) RETURNING ID, archivo INTO :id, :archivo";

        if(empty($descripcion)):
            $descripcion = $nombre;
        endif;
        $usuario = Usuario::logueado();
        $exec = oci_parse($cnx, $sql);
        //oci_bind_by_name($exec, ":id", $id, 100);
        oci_bind_by_name($exec, ":descripcion", $descripcion, 500);
        oci_bind_by_name($exec, ":entidad", $entidad, 500);

        //oci_bind_by_name($exec, ":aler_proceso,", $aler_proceso);
        //oci_bind_by_name($exec, ":aler_codigo,",  $aler_codigo);
        //oci_bind_by_name($exec, ":aler_id",       $aler_id);

        //oci_bind_by_name($exec, ":item",    $item, 500);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        
    // cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }

  static public function altaR3($codigo, $archivo, $descripcion, $nombre,$perio)
    {
        $fp = fopen('altaR3.txt', 'w');
        $sql = sprintf(
        "INSERT INTO %s.RESOLUCIONES_DOC_ADJUNTOS(
                REDA_CODIGO,
                REDA_ITEM,
                REDA_DESCRIPCION,
                REDA_PERIO,
                REDA_HABILITADO,
                REDA_FCH_ALTA,
                REDA_USR_ALTA,
                REDA_FCH_MODI,
                REDA_USR_MODI,
                REDA_ADJUNTO,
                REDA_EMPR_CODIGO
                ) 
        VALUES( 
                :codigo,
                (SELECT nvl(MAX(REDA_ITEM), 0) FROM RESOLUCIONES_DOC_ADJUNTOS)+1,
                :descripcion,
                to_date('$perio', 'DD/MM/YYYY'),
                'S',
                sysdate,
                :usuario, 
                NULL,
                NULL,
                EMPTY_BLOB(),
                :empresa
              )        
        RETURNING 
            REDA_ADJUNTO 
        INTO 
            :archivo",
            sfConfig::get('SCHEMA_ORACLE'));
        fwrite($fp,  $sql);
        fclose($fp);

        $cnx =  BackendServices::getInstance()->getConnection();
        
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $usuario = Usuario::logueado();
        $empresa = Usuario::empresa();
        $exec = oci_parse($cnx, $sql);

        oci_bind_by_name($exec, ":descripcion", $descripcion, 500);
        oci_bind_by_name($exec, ":nombre", $nombre, 500);
        oci_bind_by_name($exec, ":codigo", $codigo, 500);
        oci_bind_by_name($exec, ":nombre", $nombre, 500);
        oci_bind_by_name($exec, ":perio",  $perio, 500);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ":empresa", $empresa, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
        
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
        
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
   static public function edicionR3($codigo, $item, $archivo, $descripcion, $nombre,$perio, $fecha)
    {
        $fp = fopen('edicionR3.txt', 'w');
        $usuario = Usuario::logueado();
        $sql = sprintf(
         "UPDATE %s.RESOLUCIONES_DOC_ADJUNTOS SET 
                                         REDA_ADJUNTO           = EMPTY_BLOB(), 
                                         REDA_DESCRIPCION       = '".$descripcion."', 
                                         REDA_PERIO             = to_date('$perio', 'DD/MM/YYYY'),
                                         REDA_USR_ALTA          = '".$usuario."',
                                         REDA_USR_MODI          = '".$usuario."',
                                         REDA_FCH_MODI          = to_date('$fecha', 'DD/MM/YYYY')
                                             WHERE REDA_CODIGO = '".$codigo."'
                                             AND REDA_ITEM = '".$item."'
                                             RETURNING 
                                                REDA_ADJUNTO 
                                             INTO 
                                                :archivo",
        sfConfig::get('SCHEMA_ORACLE'));
        fwrite($fp,  $sql);
        fclose($fp);
        $cnx =  BackendServices::getInstance()->getConnection();
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $exec = oci_parse($cnx, $sql);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
        
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
        
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
    
  static public function altaRequerimiento($codigoreque, $archivo, $nombre, $descripAdjunto,$fecha)
    {
        $sql = sprintf(
        "INSERT INTO %s.REQUE_DOC_ADJUNTOS(
                REQA_REQI_CODIGO,
                REQA_REQI_ITEM,
                REQA_SOLI_ITEM,
                REQA_ITEM,
                REQA_DESCRIPCION,
                REQA_USO_INTERNO,
                REQA_HABILITADO,
                REQA_FCH_ALTA,
                REQA_USR_ALTA,
                REQA_FCH_MODI,
                REQA_USR_MODI,
                REQA_ADJUNTO
                ) 
        VALUES( 
                :codigoreque,
                '0',
                '0',
                (SELECT nvl(MAX(REQA_ITEM), 0) FROM REQUE_DOC_ADJUNTOS)+1,
                :descripAdjunto,
                'S',
                'S',
                sysdate,
                :usuario,
                NULL,
                NULL,
                EMPTY_BLOB()
              )        
        RETURNING 
            REQA_ADJUNTO 
        INTO 
            :archivo",
            sfConfig::get('SCHEMA_ORACLE'));
        //print($sql); //exit;
        $cnx =  BackendServices::getInstance()->getConnection();
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $usuario = Usuario::logueado();
        $exec = oci_parse($cnx, $sql);

        oci_bind_by_name($exec, ":descripAdjunto", $descripAdjunto, 500);
        oci_bind_by_name($exec, ":nombre", $nombre, 500);
        oci_bind_by_name($exec, ":codigoreque", $codigoreque, 500);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
		
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
		
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
static public function altaRequerimientoSolici($codigoreque, $archivo, $nombre, $descripAdjunto,$fecha,$requi_Item,$itemSolic,$item)
    {
    	BackendServices::getInstance()->getGrabarLogs(array(array('codigoreque' =>$codigoreque,
																  'archivo' => $archivo,
																  'descripAdjunto' => $descripAdjunto,
																  'fecha' => $fecha,
																  'requi_Item' => $requi_Item,
																  'itemSolic' => $itemSolic,
																  'item' => $item)),'altaRequerimientoSolici'); // debug
																  

        $sql = sprintf(
        "INSERT INTO %s.REQUE_DOC_ADJUNTOS(
                REQA_REQI_CODIGO,
                REQA_REQI_ITEM,
                REQA_SOLI_ITEM,
                REQA_ITEM,
                REQA_DESCRIPCION,
                REQA_USO_INTERNO,
                REQA_HABILITADO,
                REQA_FCH_ALTA,
                REQA_USR_ALTA,
                REQA_FCH_MODI,
                REQA_USR_MODI,
                REQA_ADJUNTO
                ) 
        VALUES( 
                :codigoreque,
                :requi_Item,
                :itemSolic,
                --:item,
                (SELECT nvl(MAX(REQA_ITEM), 0) FROM REQUE_DOC_ADJUNTOS)+1,
                :descripAdjunto,
                'S',
                'S',
                sysdate,
                :usuario,
                NULL,
                NULL,
                EMPTY_BLOB()
              )        
        RETURNING 
            REQA_ADJUNTO 
        INTO 
            :archivo",
            sfConfig::get('SCHEMA_ORACLE'));
        //print($sql); //exit;
        $cnx =  BackendServices::getInstance()->getConnection();
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $usuario = Usuario::logueado();
        $exec = oci_parse($cnx, $sql);

        oci_bind_by_name($exec, ":descripAdjunto", $descripAdjunto, 500);
        oci_bind_by_name($exec, ":nombre", $nombre, 500);
        oci_bind_by_name($exec, ":codigoreque", $codigoreque, 500);
        oci_bind_by_name($exec, ":requi_Item", $requi_Item, 500);
        oci_bind_by_name($exec, ":itemSolic", $itemSolic, 500);
        oci_bind_by_name($exec, ":item", $item, 500);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
		
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
		
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
    static public function edicionRequerimiento($codigoreque, $archivo, $nombre, $descripAdjunto,$fecha,$requi_Item,$itemSolic,$item)
    {
        BackendServices::getInstance()->getGrabarLogs(array(array('codigoreque' =>$codigoreque,
																  'archivo' => $archivo,
																  'descripAdjunto' => $descripAdjunto,
																  'fecha' => $fecha,
																  'requi_Item' => $requi_Item,
																  'itemSolic' => $itemSolic,
																  'item' => $item)),'edicionRequerimiento'); // debug
        $fp = fopen('edicionRequerimiento.txt', 'w');
		$usuario = Usuario::logueado();
		
	    $sql = sprintf(
         "UPDATE %s.REQUE_DOC_ADJUNTOS SET 
         								 REQA_ADJUNTO           = EMPTY_BLOB(), 
								         REQA_DESCRIPCION       = '".$descripAdjunto."', 
										 REQA_FCH_ALTA          = to_date('$fecha', 'DD/MM/YYYY'),
										 REQA_REQI_ITEM        = '".$requi_Item."',
										 REQA_SOLI_ITEM         = '".$itemSolic."',
								         REQA_USR_ALTA          = '".$usuario."'
									         WHERE REQA_REQI_CODIGO = '".$codigoreque."'
									         AND REQA_ITEM = '".$item."'
									         RETURNING 
									            REQA_ADJUNTO 
									         INTO 
									            :archivo",
        sfConfig::get('SCHEMA_ORACLE'));
        //print($sql);
		//exit;
		fwrite($fp,  $sql);
        fclose($fp);
        $cnx =  BackendServices::getInstance()->getConnection();
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $exec = oci_parse($cnx, $sql);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
		
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
		
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
    static public function edicionRequerimientoInicial($codigoreque, $archivo, $nombre, $descripAdjunto,$fecha,$item)
    {
        BackendServices::getInstance()->getGrabarLogs(array(array('codigoreque' =>$codigoreque,
																  'archivo' => $archivo,
																  'descripAdjunto' => $descripAdjunto,
																  'fecha' => $fecha,
																  'item' => $item)),'edicionRequerimientoInicial'); // debug

		$usuario = Usuario::logueado();
		
	    $sql = sprintf(
         "UPDATE %s.REQUE_DOC_ADJUNTOS SET 
         								 REQA_ADJUNTO           = EMPTY_BLOB(), 
								         REQA_DESCRIPCION       = '".$descripAdjunto."', 
										 REQA_FCH_ALTA          = to_date('$fecha', 'DD/MM/YYYY'),
								         REQA_USR_ALTA          = '".$usuario."'
									         WHERE REQA_REQI_CODIGO = '".$codigoreque."'
									         AND REQA_ITEM = '".$item."'
									         RETURNING 
									            REQA_ADJUNTO 
									         INTO 
									            :archivo",
        sfConfig::get('SCHEMA_ORACLE'));
        //print($sql);
		//exit;

        $cnx =  BackendServices::getInstance()->getConnection();
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $exec = oci_parse($cnx, $sql);
        oci_bind_by_name($exec, ":usuario", $usuario, 500);
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
		
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
		
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $nombre;
        //cargamos el fichero en la tabla
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
            throw new \Exception("No se pudo subir archivo");            
        endif;
        $lob->free();
        return true;

    }
    
 static public function edicion($codigocliente, $item, $archivo, $descripcion,$adjunto_nombre,$usuario,$fecha)
    {
    		
    	 if(empty($descripcion)):
              $descripcion = $adjunto_nombre;
         endif;	
		 // pongo valor vacío EMPTY_BLOB() dentro del campo blob.	
    	 $sql = sprintf(
         "UPDATE %s.ENTIDAD_DOC_ADJUNTOS SET 
         								 ENDA_ADJUNTO           = EMPTY_BLOB(), 
								         ENDA_DESCRIPCION       = '".$descripcion."', 
										 ENDA_FECHA             = to_date('$fecha', 'DD/MM/YYYY'),
										 ENDA_FCH_ALTA          = to_date('$fecha', 'DD/MM/YYYY'),
								         ENDA_USR_ALTA          = '".$usuario."'
									         WHERE ENDA_ENTI_CODIGO = '".$codigocliente."' 
									         AND ENDA_ITEM          = '".$item."'
									         RETURNING 
									            ENDA_ADJUNTO 
									         INTO 
									            :archivo",
        sfConfig::get('SCHEMA_ORACLE'));
        //echo $sql; exit;
        $cnx =  BackendServices::getInstance()->getConnection();
		//inicio el descriptor para manejar los campos blob.
        $lob = oci_new_descriptor($cnx, OCI_D_LOB);
        $exec = oci_parse($cnx, $sql);
		//indico que viene datos binarios
        oci_bind_by_name($exec, ':archivo', $lob, -1, OCI_B_BLOB);
        if(!oci_execute($exec, OCI_DEFAULT)) $id = 0;
        $_archivo['file'] = $archivo;
        $_archivo['name'] = $adjunto_nombre;
        // cargamos el fichero en la tabla $_archivo contiene la ruta en binario
        if ($lob->save(json_encode($_archivo))):
            oci_commit($cnx);
        else:
           throw new Exception("No se pudo actualizar archivo");  
        endif;
        //libero la memoria
        $lob->free();
        return true;



/*
   	 $conexion = oci_connect("plaft",
                                                         "admin",
                                                         "//localhost:1521/XE") or die ( "Error al conectar : ".oci_error() );
    		
    	 if(empty($descripcion)):
              $descripcion = $adjunto_nombre;
         endif;		

	$stmt = "UPDATE imagenes SET  imagen  = EMPTY_BLOB()	WHERE imagen_id = '".$item."' RETURNING  imagen INTO :archivo";			
$lob = oci_new_descriptor($conexion, OCI_D_LOB);
        $stmt = oci_parse($conexion, $stmt);
        oci_bind_by_name($stmt, ':archivo', $lob, -1, OCI_B_BLOB);
       
        if(!oci_execute($stmt, OCI_DEFAULT)  == 0);
		//print_r(oci_execute($stmt, OCI_DEFAULT)); exit;
        $archivo = $archivo;

if($lob->save($archivo)){
oci_commit($conexion);
}else{
echo "No se guardo el archivo en el campo blob";
return false;
}

oci_free_statement($stmt); 
 
 */




    }
    public static function subir_archivo($contenido, $entidad, $item)
    {
        return;
        $sql = sprintf("UPDATE ENTIDAD_DOC_ADJUNTOS SET ENDA_ADJUNTO = TO_LOB('%s')
                    WHERE ENDA_ENTI_CODIGO = '%s' AND ENDA_ITEM = '%s'", $contenido, $entidad, $item);
        return BackendServices::getInstance()->getResultsFromFunction($sql);
    }

    public static function bajar_archivo($entidad, $item)
    {     
        $sql = sprintf("begin %s.SEL_ENTIDAD_DOC_ADJ_ADJUNTO_RS ('%s', '%s', '%s', :data); end;" ,
            sfConfig::get('SCHEMA_ORACLE'),
            Usuario::logueado(), $entidad, $item);
        $return =  BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        return json_decode($return[0]['ENDA_ADJUNTO'], true);
    }
    public static function bajar_archivoR3($codigo, $item)
    {     
        $sql = sprintf("begin %s.GET_RESOLUCION_DOC_ADJUNTOS_RS ('%s','%s', '%s', '%s','%s', :data); end;" ,
            sfConfig::get('SCHEMA_ORACLE'),
            Usuario::logueado(),Usuario::empresa(), $codigo, $item, null);
        $return =  BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        return json_decode($return[0]['REDA_ADJUNTO'], true);
    }
	public static function bajar_archivoRequer($codigo,$item)
    {
        $fp = fopen('bajar_archivoRequer.txt', 'w');     
        $sql = sprintf("begin %s.SEL_REQUE_INFORME_SOL_ADJUN_RS ('%s', '%s','%s','%s', :data); end;" ,
            sfConfig::get('SCHEMA_ORACLE'),
            Usuario::logueado(), 
            $codigo,
            $item,
            '');
        $return =  BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        fwrite($fp,  $sql);
        fclose($fp);
        return json_decode($return[0]['REQA_ADJUNTO'], true);
    }
    public static function bajar_archivoRequerGenerales($codigo,$item)
    {
        $fp = fopen('bajar_archivoRequerGenerales.txt', 'w');     
        $sql = sprintf("begin %s.SEL_REQUERIMIENTOS_ADJUN_RS ('%s', '%s','%s', :data); end;" ,
            sfConfig::get('SCHEMA_ORACLE'),
            Usuario::logueado(), 
            $codigo,
            $item);
        $return =  BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        fwrite($fp,  $sql);
        fclose($fp);
        return json_decode($return[0]['REQA_ADJUNTO'], true);
    }
    
    static public function traeradjuntosInformados($codigo,$item)
    {
        $fp = fopen('traeradjuntosInformados.txt', 'w');
        $sql = sprintf("begin %s.SEL_REQUE_INFORME_SOL_ADJUN_RS ('%s', '%s','%s','%s', :data); end;" ,
                        sfConfig::get('SCHEMA_ORACLE'),
                        Usuario::logueado(), 
                        $codigo,
                        $item,
                        '');
        $return =  BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        fwrite($fp,  $sql);
        return json_decode($return[0]['REQA_ADJUNTO'], true);
        //return json_decode($return[0], true);
     }

}