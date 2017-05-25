<?php


class BackendServices
{
	private static $instancia;


	public function __construct() {
		// $this->conn = oci_connect(sfConfig::get('USER_ORACLE'),
									// sfConfig::get('PASS_ORACLE'),
									// sfConfig::get('IP_ORACLE'),'AL32UTF8');
		$this->conn = oci_connect("smogar", "smogdesa", "//ARDC1SRD-SCAN.prosegur.com.ar:1521/SMOGD", "AL32UTF8");
		if (!$this->conn) {
		   $m = oci_error();
		   echo $m['message'], "\n";
		   exit;
		}
		else {
		   //print "Connected to Oracle!";
		}
	}

    public function getConnection()
    {
    	return $this->conn;
    }
	/**
	 *
	 * @return BackendServices
	 */
	public static function getInstance() {
      if (  !self::$instancia instanceof self)
      {
         self::$instancia = new self;
      }
	  return self::$instancia;
	}

	
	public function getResultsFromStoreProcedureArray($store_call = "", $p_nombre, $p_documento) {
		//echo $store_call; exit;		
		$stmt = oci_parse($this->conn, $store_call);
		if (!$stmt)
			print "Error parsing SQL";

		//$stmt = oci_parse($conn, "select * from system.ciudades");

		$p_cursor = oci_new_cursor($this->conn);
		//$array = array("one", "two", "three", "four", "five");
//oci_bind_array_by_name($stmt, ":p_nombre", $array, 5, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':p_nombre', $p_nombre, 60, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':p_documento', $p_documento, 60, -1, SQLT_CHR);
		oci_bind_by_name($stmt, ':data', $p_cursor, -1, OCI_B_CURSOR);

		oci_execute($stmt);
		oci_execute($p_cursor, OCI_DEFAULT);
		//oci_fetch_all($stmt, $res);

		oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);

		oci_free_statement($stmt);
		oci_free_statement($p_cursor);
		$s=null;
		$s=oci_error();
		if(!empty($s))
		{
			throw new Exception($s);
			
		}
		return $cursor;
	}	


	public function getResultsFromStoreProcedure($store_call = "") {
		$stmt = oci_parse($this->conn, $store_call);
		if (!$stmt)
			print "Error parsing SQL";

		//$stmt = oci_parse($conn, "select * from system.ciudades");

		$p_cursor = oci_new_cursor($this->conn);
		oci_bind_by_name($stmt, ':data', $p_cursor, -1, OCI_B_CURSOR);


		oci_execute($stmt);
		oci_execute($p_cursor, OCI_DEFAULT);
		//oci_fetch_all($stmt, $res);

		oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);

		oci_free_statement($stmt);
		oci_free_statement($p_cursor);
		$s=null;
		$s=oci_error();
		if(!empty($s))
		{
			throw new Exception($s);
			
		}
		return $cursor;
	}

	public function getResultsFromStoreProcedureReport($store_call = "") {
		$stmt = oci_parse($this->conn, $store_call);
		if (!$stmt)
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
			
		}
		return array($cursor, $cursor1);
	}
	public function getResultsFromStoreProcedureReportExport($store_call = "", $func) {
		$stmt = oci_parse($this->conn, $store_call);
		if (!$stmt)
			print "Error parsing SQL";

		//$stmt = oci_parse($conn, "select * from system.ciudades");

		$p_cursor = oci_new_cursor($this->conn);
		$p_cursor1 = oci_new_cursor($this->conn);
		oci_bind_by_name($stmt, ':data', $p_cursor, -1, OCI_B_CURSOR);
		oci_bind_by_name($stmt, ':col', $p_cursor1, -1, OCI_B_CURSOR);


		oci_execute($stmt);
		oci_execute($p_cursor, OCI_DEFAULT);
		oci_execute($p_cursor1, OCI_DEFAULT);
		oci_fetch_all($stmt, $res);
		//print_r($res);exit;
		//oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		oci_fetch_all($p_cursor1, $cursor1, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		$n=0;

		while ($datos =oci_fetch_array($p_cursor, OCI_ASSOC)) {
			$func($datos, $cursor1, $n);
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

	public function getResultsFromFunction($store_call = "") {
		$stmt = oci_parse($this->conn, $store_call);
		if (!$stmt)
			print "Error parsing SQL";

		//$stmt = oci_parse($conn, "select * from system.ciudades");


		oci_execute($stmt);
		oci_result($stmt);
		//oci_fetch_all($stmt, $res);


		oci_free_statement($stmt);
		oci_free_statement($p_cursor);

		return $cursor;
	}



	public function googleAuthenticate($username, $password, $source = '', $service = 'lh2') {
		$session_token = '_auth_token';

		//if ($_SESSION[$session_token]) {
		//	return $_SESSION[$session_token];
		//}

		// get an authorization token
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/accounts/ClientLogin");
		$post_fields = "accountType=" . urlencode('HOSTED_OR_GOOGLE')
			. "&Email=" . urlencode($username)
			. "&Passwd=" . urlencode($password)
			. "&source=" . urlencode($source)
			. "&service=" . urlencode($service);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		//curl_setopt($ch, CURLINFO_HEADER_OUT, true); // for debugging the request
		//var_dump(curl_getinfo($ch,CURLINFO_HEADER_OUT)); //for debugging the request

		$response = curl_exec($ch);

		if (strpos($response, '200 OK') === false) {
			return false;
		}

		// find the auth code
		preg_match("/(Auth=)([\w|-]+)/", $response, $matches);

		if (!$matches[2]) {
			return false;
		}

		$_SESSION[$session_token] = $matches[2];
		return $matches[2];
	}

	/**
	 *  Cualquier catch de Acceso denegado, lleva a esta pantalla
	 */
	public function forbiddenError() {
		sfContext::getInstance()->getController()->redirect('errores/forbidden');
	}


}