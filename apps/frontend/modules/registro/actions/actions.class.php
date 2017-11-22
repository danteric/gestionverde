<?php

/**
 * Clase de acciones para registro
 */
class RegistroActions extends sfActions
{

	public function executeLogin(sfWebRequest $request) {


		$_SESSION["usuario"] = "";
		unset($_SESSION["usuario"]);

		$this->errors = array();
		$this->notices = array();
		if($request->getMethod() == "POST") {
			$nombreUsuario	= $request->getParameter("username");
			$password		= $request->getParameter("password");

			$usuarioSession = $this->getUser();
			if ($usuarioSession->isAuthenticated()) {
				return $this->redirect('consultas/home');
			}

			if($usuarioSession->login($nombreUsuario, $password, $usuarioSession)) {
				return $this->redirect('paginaInicio/home');
			} else {
				BackendServices::getInstance()->forbiddenError();
			}


		}


	}

	public function executeNuevaContrasena(sfWebRequest $request) {

		$_SESSION["usuario"] = "";
		unset($_SESSION["usuario"]);

		$this->errors = array();
		$this->notices = array();
		if($request->getMethod() == "POST") {
			$password		= $request->getParameter("password2");
			$usuario		= $request->getParameter("usu");
			$password_nuevo	= $request->getParameter("password_nuevo");
			$password_nuevo_rep	= $request->getParameter("password_nuevo_rep");

			$sql = "USU_ABM_USUARIO_PWD_RS('".$usuario."', '"
											.$usuario."', 'M', '"
											.$password."', '"
											.$password_nuevo."', '"
											.$password_nuevo_rep."')";
			$result = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

			if($result[0]['respuesta'] == "OK") {
				$this->notices = array(0 => $result[0]['respues_exito']);
			} else {
				$this->errors = array(0 => $result[0]['respuesta']);
			}



		}
		$this->setTemplate('login');

	}

public function executeEnviarContrasena(sfWebRequest $request) {

		$_SESSION["usuario"] = "";
		unset($_SESSION["usuario"]);

		$this->errors  = array();
		$this->notices = array();

		$usuamail	   = $request->getParameter("usuamail");
		$sql    = "USU_SENDMAIL_PWD_RS('".$usuamail."','".$usuamail."')";				
		$result = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$mail   = $result[0]['lista_mail'];
		$cuerpo = $result[0]['cuerpo'];
		$titulo = $result[0]['titulo'];

		if($result[0]['respuesta'] == "OK") {

			$bool = mail($mail,$titulo,$cuerpo);
			if($bool){
			    $mesanje_ok = "Mail enviado - ";
			}else{
			    $mesanje_ok = "Mail no enviado - ";
			}
			$mesanje_ok = $mesanje_ok.$result[0]['respues_exito'];

			$this->notices = array(0 => $mesanje_ok);
		} else {
			$this->errors = array(0 => $result[0]['respuesta']);
		}

		$this->setTemplate('login');

	}


}
?>
