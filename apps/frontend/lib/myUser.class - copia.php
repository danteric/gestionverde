<?php

class myUser extends sfGuardSecurityUser
{
	/**
	 *
	 * Post para authenticar el usuario con el backend
	 *
	 * @param type $username
	 * @param type $password
	 * @param type $user
	 * @return type
	 */
	public function login($username, $password, $user){
                        #echo "<pre>";print_r($user);die;
			$username = strtolower(addslashes(htmlspecialchars($username)));
                        $password = addslashes(($password));
                        
                        //die($username." -------- ".$password);
                        #$sql = "begin ".sfConfig::get("SCHEMA_ORACLE").".USU_VALIDA_USUARIO_HOY_RS('".$username."', '".$password."',  :data); end;";
                        
                        $sql = "USU_VALIDA_USUARIO_HOY_RS('".$username."', '".$password."',1)";
                        $this->cursor =	BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                        #echo "<pre>";print_r($this->cursor);die;
                        $pais       = $this->cursor[0]['pais'] = '1';
			$pais_cod   = $this->cursor[0]['pais_codigo'] = '1';
			$hoy        = $this->cursor[0]['hoy'];
			$perm_excel = $this->cursor[0]['perm_excel'];
                        
                        /************************************/
                        $legajo     = $this->cursor[0]['legajo'];
                        $cliente    = $this->cursor[0]['cliente'];
                        $periodo    = $this->cursor[0]['periodo'];
                        #$administrador = (empty($cliente))?true:false;
                        /*************************************/
                        
			$perm_pdf   = $this->cursor[0]['perm_pdf'];
			$perm_html  = $this->cursor[0]['perm_html'];
      $perm_modi  = $this->cursor[0]['perm_modi'];
      $filas_pag  = $this->cursor[0]['filas_pag'];
      $version    = $this->cursor[0]['sis_version'];
      $log_inciden= $this->cursor[0]['log_inciden'];
			$response   = reset($this->cursor[0]);
                        $response   = $this->cursor[0]['respuesta'];
                        #$response = 'OK';
                        #echo "<pre>";var_dump($this->cursor);die;
			if($response == "OK"){
          /**************************************/
          $sql = "USU_MENUES_X_USUARIO_RS('GAMSI','".$username."');";
          $itemsMenu = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
          #echo "<pre>";print_r($itemsMenu);die;
					$nivelesMenu = array();
          //  array_multisort($itemsMenu);
                                        
					foreach($itemsMenu as $unItem){
                      $nivelesMenu[($unItem['nivel1'])."|".$unItem['icono']][] = array(($unItem['nivel2']),
                                                                                     $unItem['item'],
                                                                                     $unItem['enlace'],
                                                                                     $unItem['alta'],
                                                                                     $unItem['baja'],
                                                                                     $unItem['modif']
                                                                              );
          }
          
                                        /*
                                        $sistemaKey = array_shift(array_keys($nivelesMenu));
                                        $sistema = array_shift($nivelesMenu);
                                        #echo "<pre>";print_r($sistemaKey);die;
                                        $sistema[$sistemaKey] = $sistema;
                                        echo "<pre>";print_r($sistema);die;
                                        unset($sistema[0]);
                                        #nivelesMenu = array_merge($nivelesMenu, $sistema);
					#echo "<pre>";print_r($nivelesMenu);die;
                                        */
                                        
          $_SESSION["usuario"]["acceso"]	= $nivelesMenu;
                                        /**************************************/
                                        
					$sfGuardUser = new sfGuardUser();
					$user->signIn($sfGuardUser, $remember = false, $con = null);
					//$_SESSION["usuario"]["id"]		= $response[1]["id"];
          $_SESSION["usuario"]["id"]              = "1";
					$_SESSION["usuario"]["username"]	= strtolower($username);
					
                                        /**************************/
                                        $_SESSION["usuario"]["legajo"]          = $legajo;//$legajo;
                                        $_SESSION["usuario"]["cliente"]         = $cliente;
                                        $_SESSION["usuario"]["clienteid"]       = $cliente; //strtolower($_REQUEST['empresa']);
          $_SESSION["usuario"]["empresa"]         = strtolower($_REQUEST['empresa']);
          $_SESSION["usuario"]["empresa_razon_social"] = $_REQUEST['empresa_razon_social'];
                                  $_SESSION['usuario']['periodooriginal'] = $_SESSION['usuario']['periodo'] = $periodo;
                                        /**************************/
                                        
          $_SESSION["usuario"]["pais"]		    = $pais;
					$_SESSION["usuario"]["pais_codigo"] = $pais_cod;
					$_SESSION["usuario"]["excel"]		    = $perm_excel;
					$_SESSION["usuario"]["pdf"]		      = $perm_pdf;
					$_SESSION["usuario"]["modi"]		    = $perm_modi;
					$_SESSION["usuario"]["html"]		    = $perm_html;
          $_SESSION["usuario"]["filas_pag"]   = $filas_pag;
					$_SESSION["usuario"]["version"]		  = $version;
          $_SESSION["usuario"]["log_inciden"] = $log_inciden;
                                    
                                    //------------//
                                    $_SESSION["usuario"]["idregion"]        = "1"; //ESP
                                    $_SESSION['usuario']['idempresa']       = "1"; //DSAT
                                    //------------//
                                                                                
					$_SESSION["hoy"] = $hoy;
					return true;
			}else{
					$_SESSION["loginResponse"]	= reset($this->cursor[0]);
					return false;
			}
    }
   
   /**
   * Signs in the user on the application via webservices.
   *
   * @param sfGuardUser $user The sfGuardUser id
   * @param boolean $remember Whether or not to remember the user
   * @param Doctrine_Connection $con A Doctrine_Connection object
   */
  public function signIn($user, $remember = false, $con = null)
  {
	// signin
	//$this->setAttribute('user_id', $user->getId(), 'sfGuardSecurityUser');
	$this->setAuthenticated(true);
	$this->clearCredentials();
	//$this->addCredentials($user->getAllPermissionNames());

	// save last login
	//$user->setLastLogin(date('Y-m-d H:i:s'));
	//$user->save($con);

	// remember?
	if ($remember)
	{
	  $expiration_age = sfConfig::get('app_sf_guard_plugin_remember_key_expiration_age', 15 * 24 * 3600);

	  // remove old keys
//      Doctrine_Core::getTable('sfGuardRememberKey')->createQuery()
//        ->delete()
//        ->where('created_at < ?', date('Y-m-d H:i:s', time() - $expiration_age))
//        ->execute();

	  // remove other keys from this user
//      Doctrine_Core::getTable('sfGuardRememberKey')->createQuery()
//        ->delete()
//        ->where('user_id = ?', $user->getId())
//        ->execute();

	  // generate new keys
	  $key = $this->generateRandomKey();

	  // save key
	  $rk = new sfGuardRememberKey();
	  $rk->setRememberKey($key);
	  $rk->setUser($user);
	  $rk->setIpAddress($_SERVER['REMOTE_ADDR']);
	  $rk->save($con);

	  // make key as a cookie
	  $remember_cookie = sfConfig::get('app_sf_guard_plugin_remember_cookie_name', 'sfRemember');
	  sfContext::getInstance()->getResponse()->setCookie($remember_cookie, $key, time() + $expiration_age);
	}
  }
}
