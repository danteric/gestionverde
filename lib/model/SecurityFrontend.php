<?php


class SecurityFrontend
{
	private static $instancia;
	
	
	public function __construct() {
		
	}
	
	public static function getInstance() {
		if (  !self::$instancia instanceof self)
		{
			self::$instancia = new self;
		}
		return self::$instancia;
	}
	
	/**
	 *  Cualquier catch de Acceso denegado, lleva a esta pantalla
	 */
	public function forbiddenError() {
		sfContext::getInstance()->getController()->redirect('error/forbidden');
	}
	
	/**
	 *  Checkea el rol del usuario, si tiene o no acceso a la pantalla dada
	 * @param type $pantalla
	 * @param type $usuario
	 * @return boolean
	 */
	public function checkPermisos($pantalla, $usuario) {
		
		
		foreach($usuario as $pantallaRol ) {
			if(in_array($pantalla, $pantallaRol)) {
				return true;
			}
		}
		
		$this->forbiddenError();
	}
	
	public function checkPermisosBool($pantalla, $usuario) {
		
		
		foreach($usuario as $pantallaRol ) {
			if(in_array($pantalla, $pantallaRol)) {
				return true;
			}
		}
		
		return false;
	}
	
}