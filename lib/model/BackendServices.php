<?php
                        
class BackendServices
{
	private static $instancia;
	private $conn;
    private $conn1;                   

	public function __construct() {

/*
            $host = "localhost";
            $port = "3306";
            $dbname = "adaclub"; 
            $username = "root"; 
            $password = "";
            */
            //$username = "postgres";
            //$password = "123456";
            #die("--");
            #$this->conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$username." password=".$password);
            //$this->conn = oci_connect(sfConfig::get('USER_ORACLE'), sfConfig::get('PASS_ORACLE'), sfConfig::get('IP_ORACLE'),'AL32UTF8');
            #$this->conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$username." password=".$password);
            //connect to database
  //$this->conn = mysqli_connect($host, $username, $password, $dbname) or die(mysqli_connect_error());

            $this->conn = mysqli_connect(sfConfig::get('IP_HOST'), sfConfig::get('USER_NAME'), sfConfig::get('PASS'), sfConfig::get('DB_NAME')) or die(mysqli_connect_error());

            mysqli_set_charset($this->conn,"utf8");
	}

        public function getConnection()
        {
            return $this->conn;
        }
        
	/**
	 * @return BackendServices
	 */
	public static function getInstance() {
          if(!self::$instancia instanceof self)
          {
               self::$instancia = new self;
          }
	  return self::$instancia;
	}
        
        protected function exeProcedure($store_call){
/*            pg_query($this->conn, "BEGIN;");
            pg_query($this->conn, 'SELECT '.$store_call);
            $result = pg_query($this->conn, 'FETCH ALL IN "data"');
            if(!$result && !empty(pg_last_error($this->conn))){
                return pg_last_error($this->conn);
            }
            pg_query($this->conn, "COMMIT;");
            $data = pg_fetch_all($result);
            return $data;*/
        }
        
	public function getResultsFromStoreProcedure($store_call = ""){
            #$store_call = str_replace(":data", "data", str_replace(":col", "col", $store_call));
            #$store_call = "SELECT * FROM clientes;";

            if ($_SESSION["usuario"]["log_inciden"] == 'SI') {
                $log_inciden = "CALL USU_INS_INCIDENTES_LOG('".$_SESSION["usuario"]["username"].
                                            "','".
                                            str_replace("'","\'",$store_call).
                                            "',1,'T',null);";
                //echo $log_inciden;exit;
                mysqli_query($this->conn, $log_inciden);
            };

            #$result = mysqli_query($this->conn, $store_call) or die("Error de base de datos: " . mysqli_error($this->conn));
            $result = mysqli_query($this->conn, "CALL ".$store_call);
            $errores = mysqli_error($this->conn);
            if (!empty($errores)) { 
                // registro el error en la tabla, hay aseguimiento o no
                echo 'ERROR INTERNO : ',$errores,', Notifique a sistemas' ; 
                $log_inciden = "CALL USU_INS_INCIDENTES_LOG('".$_SESSION["usuario"]["username"].
                                            "','".
                                            str_replace("'","\'",$store_call).
                                            "',1,'E','".str_replace("'","\'",$errores)."');";
                //echo $log_inciden;exit;
                mysqli_query($this->conn, $log_inciden);

            };
            $records = array();

            if(is_object($result)){
                if($result->num_rows > 0)
                {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        $records[] =  $row;
                    }
                }
                $result->close();
                $this->conn->next_result();
            }

            #echo "<pre>";print_r($records);die;
            return $records;
	}
        

    public function getResultsFromStoreProcedureReport($store_call = "") {
        /*$stmt = oci_parse($this->conn, $store_call);
        if (!$result)
            print "Error parsing SQL";

        //$stmt = oci_parse($conn, "select * from system.ciudades");

        $p_cursor = oci_new_cursor($this->conn);
        $p_cursor1 = oci_new_cursor($this->conn);
        
        oci_bind_by_name($stmt, ':data', $p_cursor, -1, OCI_B_CURSOR);
        oci_bind_by_name($stmt, ':col', $p_cursor1, -1, OCI_B_CURSOR);


        oci_execute($stmt);
        oci_execute($p_cursor, OCI_DEFAULT);
        oci_execute($p_cursor1, OCI_DEFAULT);
        //oci_fetch_all($stmt, $res);

        oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_fetch_all($p_cursor1, $cursor1, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        oci_free_statement($stmt);
        oci_free_statement($p_cursor);
        oci_free_statement($p_cursor1);
        $s=null;
        $s=oci_error();
        if(!empty($s))
        {
            throw new Exception($s);
            
        }*/

        //return array($cursor, $cursor1);
         $result = mysqli_query($this->conn, "CALL ".$store_call);
        // echo "<pre>"; 
         //print_r(mysqli_fetch_array($result, MYSQLI_ASSOC)); exit;
          //die($result);
            $records = array();

            if(is_object($result)){
                if($result->num_rows > 0)
                {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        $records[] =  $row;
                    }
                }
                $result->close();
                $this->conn->next_result();
            }

            
            #echo "<pre>";print_r($records);die;
            return $records;
    }
  /*  
    public function getResultsFromStoreProcedureReportExport($store_call = "", $func) {
  //      self::getGrabarLogs($store_call,'getResultsFromStoreProcedureReportExport'); // agregue para capturar llamadas a procedimientos
  //      $stmt = oci_parse($this->conn, $store_call);
   //     if (!$stmt)
  //          print "Error parsing SQL";

   //return array($cursor, $cursor1);
         $p_cursor = mysqli_query($this->conn, "CALL ".$store_call);
        // echo "<pre>"; 
         //print_r(mysqli_fetch_array($result, MYSQLI_ASSOC)); exit;
          //die($result);
            $records = array();

            if(is_object($p_cursor)){
                if($p_cursor->num_rows > 0)
                {
                    while($row = mysqli_fetch_array($p_cursor, MYSQLI_ASSOC))
                    {
                        $records[] =  $row;
                    }
                }
                $p_cursor->close();
                // $this->conn->next_result();
            }

        //$stmt = oci_parse($conn, "select * from system.ciudades");

        $p_cursor = oci_new_cursor($this->conn);
        $p_cursor1 = oci_new_cursor($this->conn);
        oci_bind_by_name($stmt, ':data', $p_cursor, -1, OCI_B_CURSOR);
        oci_bind_by_name($stmt, ':col', $p_cursor1, -1, OCI_B_CURSOR);

        // saco argumentos
        //$store_name = $store_call

        //$p_cursor1 = mysqli_query($this->conn, "call SEL_ZZ_REPO_EXPORTAR('".$store_name."'); ");
    //    $p_cursor1 = mysqli_query($this->conn, "call SEL_ZZ_REPO_EXPORTAR('SEL_SOCIOS_TOTAL_RP') ");
        // echo "<pre>"; 
         //print_r(mysqli_fetch_array($result, MYSQLI_ASSOC)); exit;
          //die($result);
    
        oci_execute($stmt);
        oci_execute($p_cursor, OCI_DEFAULT);
        oci_execute($p_cursor1, OCI_DEFAULT);
        oci_fetch_all($stmt, $res);
        //print_r($res);exit;
        //oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_fetch_all($p_cursor1, $cursor1, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        $n=0;

        while ($datos =oci_fetch_array($p_cursor, OCI_ASSOC)) {
            //var_dump(array_change_key_case($datos, CASE_UPPER));exit;
            $func(array_change_key_case($datos, CASE_UPPER), $cursor1, $n);
            $n++;
        }
        oci_free_statement($stmt);
        oci_free_statement($p_cursor);
        oci_free_statement($p_cursor1);
        $s=null;
        $s=oci_error();
        if(!empty($s))
        {
            throw new Exception($s);
            
        }       
        
    }
*/
        /*
         * retorna por un sql
         */
        public function getResultsFromSql($store_call = ""){
            //$store_call = "SELECT * FROM clientes;";
            $result = mysqli_query($this->conn, $store_call) or die("Error de base de datos: " . mysqli_error($this->conn));
            if($result)
            {
                $records = array();
                while ($row=mysqli_fetch_assoc($result))
                {
                    $records[] =  $row;
                }
                mysqli_free_result($result);
            }
            
            return $records;
	}
        
        /*
         * Funcion usada para armar bien el array de los
         * metadatos y poder recorrerlos por el nombre de columna
         */
        public function armarArrayMetadata($metadata){
            $newMetadata = array();
            foreach($metadata as $key => $value){
                foreach($value as $k => $v){
                    $newMetadata[$value['columna']][$k] = $v;
                }
            }
            return $newMetadata;
        }
       
        /*
         * Funcion que recupera de la tabla SEL_PARAMETIQUETA("idioma", "formulario", "data")
         */
        public function getMetadata($idioma = "1", $empresa = null,  $formulario = ""){
	    /*            
	    $store_call = "SEL_PARAMETIQUETA($idioma, $empresa, '$formulario', 'data')";
            pg_query($this->conn, "BEGIN;");
            pg_query($this->conn, 'SELECT '.$store_call);
            $result = pg_query($this->conn, 'FETCH ALL IN "data"');
            
            if(!$result && !empty(pg_last_error($this->conn))){
                return pg_last_error($this->conn);
            }    
            pg_query($this->conn, "COMMIT;");
            $data = pg_fetch_all($result);
                  
            if(!empty($data) && is_array($data))
                return $this->armarArrayMetadata($data);
            else
                return null; */
        }
                
        /*
         * Funcion usada para las altas y modificaciones
         */
        //------------------------------------------------------//
        public function amRecordFromProcedure($store_call = ""){
            #$this->iniPerformance();
            $xuuid = $this->generateUuid(); //id de transaccion unico a guardar en cada tabla
            $store_call = str_replace(":data", "data", str_replace("xuuid", $xuuid, $store_call));
            
            #echo $store_call;die;
            $inserto = $this->exeProcedure($store_call);
            #$this->finPerformance();
            return $inserto;
   	}
        
        /*
         * Funcion usada para las bajas (estado = 0)
         */
        public function bajaRecordFromProcedure($store_call = ""){
            $xuuid = $this->generateUuid(); //id de transaccion unico a guardar en cada tabla               
            $store_call = str_replace(":data", "data", str_replace("xuuid", $xuuid, $store_call));
            return $this->exeProcedure($store_call);
	}
        //------------------------------------------------------//
        
	/*
	 *  Cualquier catch de Acceso denegado, lleva a esta pantalla
	 */
	public function forbiddenError() {
            sfContext::getInstance()->getController()->redirect('errores/forbidden');
	}
        
        //----------------------------------------------------------------------------------//
        protected function generateUuid(){
            return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                            mt_rand( 0, 0x0fff ) | 0x4000,
                            mt_rand( 0, 0x3fff ) | 0x8000,
                            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );        
        }
        
        public function encriptarPass($pass){
            $secret_key = $this->key;
            $key = hash('sha256', $secret_key);
            $secret_iv = $this->ivkey;
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $encrypt = openssl_encrypt(base64_encode(md5(sha1($pass))), "AES-256-CBC", $key, 0, $iv);
            return $encrypt;
        }
                
        /*
         *  Limpia parametros para evitar SQLI y inyecciones XSS
         */
        public function limpiarParametros($params){
            $parametros = array();
            foreach($params as $param => $val){
                $parametros [$param] = htmlentities(addslashes($val)); 
            }
            return $parametros;
        }
        
        
        /*
         *  Ingresa una fecha en formato como lo ingresa el usuario
         *  ej: dd/mm/aaaa y la convierte en aaaa-mm-dd para la base de datos
        */
        public function convertirFechas($fecha){
            if(!empty($fecha)){
                $fecha = str_replace("/", "-", $fecha);
                $fecha = new DateTime($fecha);
                $fecha = $fecha->format('Y-m-d');
            }
            return $fecha;
        }
        
        //verificar todas las funciones, por las dudas
        
        //---------------------Validadores-----------------------//
        /*
         *  La cadena solo tenga caracteres de letra
         */
        public function validarSoloLetras($var){
            #return preg_match('/[^a-z\s-]/i', $var);
            return preg_match('/^[a-zA-Z]+$/', $var);
        }
                
        /*
         *  La cadena solo tenga numeros enteros o flotantes
         */
        public function validarSoloNumeroFloat($var){
            return (preg_match('/^-?(?:\d+|\d*\.\d+)$/', $var) xor preg_match('/^[0-9]+$', $var));
        }
        
        /*
         * Valida  email (VERIFICAR), sino usar preg_match
         */
        public function validarEmail(){
            return (filter_var($email, FILTER_VALIDATE_EMAIL));
        }
        //-------------------------------------------------------//
        
        //----------------------Performance----------------------//
        /*
         * Comienza el contador de tiempo y de memoria
         */
        public function iniPerformance(){
            $this->tiempo = microtime(true);
            $this->memoria = memory_get_usage();
        }
        
        /*
         * Finaliza el contador de tiempo y de memoria y lo inserta en un log (se debe llamar a iniPerformance() con anterioridad)
         */    
        public function finPerformance(){
           $memoria = memory_get_usage() - $this->memoria;
           $tiempo = microtime(true) - $this->tiempo;

           echo "<pre>";
           print_r(array("memoria" => $memoria." bytes ", "tiempo" => $tiempo." segundos" ));
           die;
        }
        //-------------------------------------------------------//
}