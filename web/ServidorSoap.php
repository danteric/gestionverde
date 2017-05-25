<?php
require_once ("lib/nusoap.php");
function ProcessMySoapObject($mySoapObjects) {
	$mso = $mySoapObjects[3];
	$mso['Name'] = "|||";
	return $mso;
}
    require_once ("lib/BackendServices.php");  
	 //require_once ("funcionSesion.php");
							/*   $tk = $nuevoToken;
  $fa = $fechaActual; 
  $fe = $fechaExpira; */
  	function obtenCaracterAleatorio($arreglo) {
		$clave_aleatoria = array_rand($arreglo, 1);	//obten clave aleatoria
		return $arreglo[ $clave_aleatoria ];	//devolver item aleatorio
	}

	function obtenCaracterMd5($caracter) {
		$md5Car = md5($caracter.Time());	//Codificar el caracter y el tiempo (timestamp) en md5
		$arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
		$caracterToken = obtenCaracterAleatorio($arrCar);	//obten un item aleatoriamente
		return $caracterToken;
	}


	function obtenerToken($longitud) {
		//crear alfabeto
		$mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
		$mayusculas = str_split($mayus);	//Convertir a array
		//echo "<pre>"; print_r($mayusculas) ; exit;
		//crear array de numeros 0-9
		$numeros = range(0,9);
		//echo "<pre>"; print_r($numeros) ; exit;
		//revolver arrays
		shuffle($mayusculas);
		shuffle($numeros);
		//Unir arrays
		$arregloTotal = array_merge($mayusculas,$numeros);
		//echo "<pre>"; print_r($arregloTotal) ; exit;
		$newToken = "";
		
		for($i=0;$i<=$longitud;$i++) {
				$miresultado = obtenCaracterAleatorio($arregloTotal);
				$newToken .= obtenCaracterMd5($miresultado);
		}
		return $newToken;

	}
 //***************************************FUNCTION LOGIN*********************************************//
            function setLogin ($usuario,
                             $clave
                             ){

	$nuevoToken = "";
	$result = "";
	//$tkk = new FuncionSesion(); 
	$tmpToken = obtenerToken(15);
	$nuevoToken = $tmpToken;

    $hora = strtotime('+60 minutes');
	$fechaActual = date("d")."/".date("m")."/".date("Y")." ".date("H:i:s ");  
	//$fechaExpira = date("d")."/".date("m")."/".date("Y")." ".date("H:i:s",$hora);  
	$fechaExpira = date("d-m-Y H:i:s", (strtotime ("+60 minutes")));

                   $sql = "begin WS_LOGIN("
                                     ."'".$usuario."',"
                                     ."'".$clave."',"
                                     ."'".$nuevoToken."',"
                                     ."'".$fechaActual."',"
                                     ."'".$fechaExpira."', :data); end;"; 
                  $result_login = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                  //print_r($result_login);
                  $devolver = array();
                  $devolver =  explode("|", $result_login[0][':B3'].'|'.$result_login[0][':B2'].'|'.$result_login[0][':B1']);
                  //print_r($devolver);exit;
                  return join("@",$devolver).'@';
                   //return json_encode($devolver);
           }

    //***************************************FIN FUNCTION LOGIN***************************************//

    //***************************************FUNCTION REQUERIMIENTO***********************************//
            function setRequerimiento ($nrolote,
                                       $token,
                                       $fecha,
                                       $consultas,
                                       $nroregistros,  
                                       $proximidad,
                                       $puntuacion,
                                       $opcionbusqueda
                                      ){
									  //print_r($consultas);
									  $contador = 0;
									  $p_nombre = array();
									  $p_documento = array();
									  foreach($consultas as $fila) {
									  $p_nombre[$contador] = $fila['NOMBRE'];
									  $p_documento[$contador] = $fila['DOCUMENTO'];
									  $contador = $contador +1;
									  //$p_nombre[$contador] = $fila
									  }
									  //print_r($p_documento);exit;
									  //$p_nombre = array('Delgado', 'Perezzz');
									  //$p_documento = array('25457988', '20046100728');
                    $sql = "begin WEBSERVICESLI.WS_REQUERIMIENTO_LI_VALIDA3("
                                        ."'".$nrolote."',"
                                       ."'".$token."',"
                                       ."'".$fecha."',"
                                       ."'".$nroregistros."',"
                                       ."'".$proximidad."',"
                                       ."'".$puntuacion."',"
                                       ."'".$opcionbusqueda."' ,'LI', :p_nombre, :p_documento, :data); end;";
                                      //echo $sql;
                    $result_requerimientos = BackendServices::getInstance()->getResultsFromStoreProcedureArray($sql, $p_nombre, $p_documento);
                    //print_r($result_requerimientos);
                    $devolver = array();
                    $devolver =  explode("|", $result_requerimientos[0][':B1']);
                    //print_r($devolver);exit;
                    return join(",\n\r",$devolver);
             }
     //***************************************FIN FUNCTION REQUERIMIENTO*********************************//

    //***************************************FUNCTION STATUS***********************************//
            function setStatus ($status_nrolote, $token_n){
			/* if ( mssql_num_rows($kvpRes) > 0 )
   {
     // Initalize the return array
     $retarray = array();
     while ( $row = mssql_fetch_assoc ($kvpRes) )
       {
         // Currently returns the ID every time, this can be optimize
         // out and only returned over the wire once.  BUT if multiple
         // ID's are allowed in the future, this will be nessicary
         // overhead required.
         array_push($retarray, new soapval('kvp', 'tns:KVPentry', $row));
       }
      return $retarray;
   }
 else
   return new soap_fault('SOAP-ENV:Server',NULL,"No KVPs are available for
$ID",NULL);*/
			
                    $sql = "begin WS_JOBS_STATUS("."'".$status_nrolote."', '".$token_n."', 'LI', :col, :data); end;";
                    //echo $sql;exit;
                    //$result_status = BackendServices::getInstance()->getResultsFromStoreProcedureReport($sql)[0];
                    $result_status = BackendServices::getInstance()->getResultsFromStoreProcedureReport($sql);

                    $columnas = $result_status[1][0];
                    $datos = $result_status[0];
                                      //print_r($cursor[1]); //exit;
                  	$grilla = array();
                  	$contador = 0;
                  		foreach($datos as $fila) {
                  			
                  				$arrayRegistro = array();
                                 foreach($columnas as $campo) { 
                                  //'ESTADO'=> array('ESTADO' => 'Prueba2','type' => 'string'),
                                  //echo "'".$campo."'";exit;
                          				//echo "'".$campo."'" ."=>".$fila[$campo];exit;
                          				//$arrayRegistro[$campo] = array($campo => $fila[$campo], 'type'=>'string');
										$arrayRegistro[$campo] = $fila[$campo];
                          				//echo "<pre>";
                          				//print_r($arrayRegistro);
                                  //echo $campo; 
                          				//$arreglo = array('Columna'=>$columna);
                                  // print_r($arreglo); exit;
                          }
                  				$grilla[$contador] = $arrayRegistro;
                  				$contador = $contador + 1;
                       
                          } 
			$row = array();		  
	$MyComplexType[0] = array('ESTADO' => "Prueba",
                        'CONSULTA' => "perez",
                        'ENTIDAD' => "contactway",
                        'NOMBRE' => "andres",
                        'DETALLE' => "det",
                        'CATEGORIA' => "1",
                        'POSICION' => "pos",
                        'PAIS' => "Argentina",
                        'DOCUMENTO' => "25457988",
                        'PASAPORTE' => "123")
                        ;
//array_push($MyComplexType, new soapval('RespuestaGrillaArray', 'tns:RespuestaGrilla', $row));							
	$MyComplexType[1] = array(
                        'ESTADO' => "Prueba",
                        'CONSULTA' => "per2ez",
                        'ENTIDAD' => "contactway",
                        'NOMBRE' => "andres",
                        'DETALLE' => "det",
                        'CATEGORIA' => "1",
                        'POSICION' => "pos",
                        'PAIS' => "Argentina",
                        'DOCUMENTO' => "25457988",
                        'PASAPORTE' => "123")
                        ;
//array_push($MyComplexType, new soapval('RespuestaGrillaArray', 'tns:RespuestaGrilla', $row));							
                        //return $MyComplexType;
                        return $grilla;
                        //print_r($result_status);// exit;
             }
     //***************************************FIN FUNCTION STATUS*********************************//


$namespace = "http://localhost";
// create a new soap server
$server = new soap_server();
// configure our WSDL
$server->configureWSDL("SimpleService");
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;
				$server->wsdl->addComplexType(
				'RespuestaGrilla',
				'complexType',
				'struct',
				'all',
				'',
				array( 
					'ESTADO' => array('name' => 'ESTADO','type' => 'xsd:string'),
				   'CONSULTA' => array('name' => 'CONSULTA','type' => 'xsd:string'),
				   'ENTIDAD' => array('name' => 'ENTIDAD','type' => 'xsd:string'),
				   'NOMBRE' => array('name' => 'NOMBRE','type' => 'xsd:string'),
				   'DETALLE' => array('name' => 'DETALLE','type' => 'xsd:string'),
				   'CATEGORIA' => array('name' => 'CATEGORIA','type' => 'xsd:string'),
				   'PORCENTAJE' => array('name' => 'PORCENTAJE','type' => 'xsd:string'),
				   'POSICION' => array('name' => 'POSICION','type' => 'xsd:string'),
				   'PAIS' => array('name' => 'PAIS','type' => 'xsd:string'),
				   'DOCUMENTO' => array('name' => 'DOCUMENTO','type' => 'xsd:string'),
				   'PASAPORTE' => array('name' => 'PASAPORTE','type' => 'xsd:string')
				   ));

$server->wsdl->addComplexType(
    'MySoapObject',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Author' => array('name'=>'Author','type'=>'xsd:string'),
        'Name' => array('name'=>'Name','type'=>'xsd:string'),
        'Description' => array('name'=>'Description','type'=>'xsd:string'),
        'Text' => array('name'=>'Text','type'=>'xsd:string'),
        'VoteTotal' => array('name'=>'VoteTotal','type'=>'xsd:int'),
        'VoteCount' => array('name'=>'VoteCount','type'=>'xsd:int')
    )
);

$server->wsdl->addComplexType(
    'MySoapObjectArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:MySoapObject[]')),
    'tns:MySoapObject'
);

			 $server->wsdl->addComplexType(
    'RespuestaGrillaArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:RespuestaGrilla[]')),
    'tns:RespuestaGrilla'
);

$server->wsdl->addComplexType('Busquedas','complexType','struct','all','',
			array( 'NOMBRE' => array('name' => 'NOMBRE','type' => 'xsd:string'),
				   'DOCUMENTO' => array('name' => 'DOCUMENTO','type' => 'xsd:string')
				   ));
			 
			 $server->wsdl->addComplexType(
    'ArrayBusquedas',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Busquedas[]')),
    'tns:Busquedas'
);
// register our WebMethod

$server->register(
    "setLogin",
                array("usuario"=>"xsd:string" 
                      ,"clave"=>"xsd:string"),    
                array("return" => "xsd:string"),
    $namespace,
    false,
    'rpc',
    false,
    'Login del usuario');			 

	$server->register(
    'setRequerimiento',
array("nrolote"=>"xsd:string" 
                    ,"token"=>"xsd:string"
                    ,"fecha"=>"xsd:string"
                    ,"consultas"=>'tns:ArrayBusquedas'
                    ,"nroregistros"=>"xsd:string"   
                    ,"proximidad"=>"xsd:string"    
                    ,"puntuacion"=>"xsd:string"  
                    ,"opcionbusqueda"=>"xsd:string"),    
              array("return" => "xsd:string"),
    $namespace,
    false,
    'rpc',
    false,
    'Registra el requerimiento');			 

$server->register(
    'setStatus',
    array("status_nrolote"=>"xsd:string"
			  ,"token_n"=>"xsd:string"),
    array('return'=>'tns:RespuestaGrillaArray'),
    $namespace,
    false,
    'rpc',
    false,
    'Devuelve el Estado de la busqueda');			 
                
// Get our posted data if the service is being consumed
// otherwise leave this data blank.                
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) 
                ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service                    
$server->service($POST_DATA);                
exit();?>
