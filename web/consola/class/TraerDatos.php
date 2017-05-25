<?php

class TraerDatos
{
	private $data;
	private $conexion;
	private $consulta;
	private $server;
	private $conexiones;
	private $usuario;
	private $pass;
	private $host;

	public function __construct() {

		 $this->data=array();
		 $this->conexion = array();
		 $this->consulta = array();
		 $this->conexiones = array();
		 $this->usuario = array();
		 $this->pass = array();
		 $this->host = array();
		 $this->server = @$_SERVER['HTTP_HOST']."\n";

}

	public  function buscarInformacion($conexiones,$consulta,$usuario,$pass,$host) {
    					//$query_sql = str_replace(';', '";"', $consulta);
						//********PRODUCTION*************//
						if($conexiones == 'PROD')
						{
						    $this->conexion = oci_connect("smogar",
														 "5m0gP",
														 "//usdc1srp3-scan.prosegur.local:1521/SMOGP") or die ( "Error al conectar : ".oci_error() );
						}else				   
						//********PRODUCTION*************//

						//********DESARROLLO*************//
						if($conexiones == 'DESA')
						{
							$this->conexion = oci_connect("smogar",
														 "smogdesa",
														 "//ardc4srd01-SCAN.latam1.prosegur.local:1521/SMOGD") or die ( "Error al conectar : ".oci_error() );
						}else
						//********DESARROLLO*************//
						 //********LOCAL*************//
						if($conexiones == 'LOCAL')
						{
						    $this->conexion = oci_connect("plaft",
														 "plaft2",
														 "//localhost:1521/XE") or die ( "Error al conectar : ".oci_error() );
					    }
                         //********HOMO*************//
                        if($conexiones == 'HOMO')
                        {
                            $this->conexion = oci_connect("smogar",
                                                         "prose2013",
                                                         "//ardc1srhlb-SCAN.prosegur.com.ar:1521/SMOGHDOS") or die ( "Error al conectar : ".oci_error() );
                        }
                         //********COLOMBIA*************//
                        if($conexiones == 'CO')
                        {
                            $this->conexion = oci_connect("smogco",
                                                         "smogco",
                                                         "//ardc4srd01-SCAN.latam1.prosegur.local:1521/SMOGD") or die ( "Error al conectar : ".oci_error() );
                        }
                         //********PARAGUAY*************//
                        if($conexiones == 'PY')
                        {
                            $this->conexion = oci_connect("smogpy",
                                                         "smogpy",
                                                         "//ardc4srd01-SCAN.latam1.prosegur.local:1521/SMOGD") or die ( "Error al conectar : ".oci_error() );
                        }
                         //********URUGUAY*************//
                        if($conexiones == 'UY')
                        {
                            $this->conexion = oci_connect("smoguy",
                                                         "smoguy",
                                                         "//ardc4srd01-SCAN.latam1.prosegur.local:1521/SMOGD") or die ( "Error al conectar : ".oci_error() );
                        }
                         //********PERU*************//
                        if($conexiones == 'PE')
                        {
                            $this->conexion = oci_connect("smogpe",
                                                         "smogpe",
                                                         "//ardc4srd01-SCAN.latam1.prosegur.local:1521/SMOGD") or die ( "Error al conectar : ".oci_error() );
                        }
                         //********TERADATA*************//
                        if($conexiones == 'TERADATA')
                        {
                 
							$this->conexion = odbc_connect("Driver=Teradata;DBCName=10.28.26.239;Database=STG_CONFIGURACION","CARGA_CONFIGURACION", "CARGA_CONFIGURACION_P2401");
						}
					    else				   
						//********LOCAL*************//

						 //********OTRO*************//
						if($conexiones == 'OTRO')
						{
						    $this->conexion = oci_connect($usuario,
														 $pass,
														 $host) or die ( "Error al conectar : ".oci_error() );
					    }				   
						//********OTRO*************//

	if ($conexiones == 'TERADATA'){
	$query = $consulta;
	$result = odbc_exec($this->conexion,$query);

			while ($data[] = odbc_fetch_array($result));
		    odbc_free_result($result);
			//Close Connection
			//echo "<pre>";
			echo "<pre>";print_r($data); exit;
		    return $data;
		    odbc_close($this->conexion);	
	}else{

	$query = $consulta;
	$info_datos = oci_parse($this->conexion, $query);
	oci_execute($info_datos, OCI_NO_AUTO_COMMIT);
	
	$r = oci_execute($info_datos);	
	//echo "<pre>"; print_r(oci_fetch_array($info_datos, OCI_ASSOC+OCI_RETURN_NULLS));
	if (!$r) {
	    $e[] = oci_error($info_datos);  // Para errores de oci_execute, pase el gestor de sentencia
		return $e;
	}
	else{
		echo "<br><div class='button4 alert-info font'>Procesos lanzado exitosamente</div><br><br>";
	}	

	return $info_datos;
	}	
	}
}