<?php
class opcionesUsuarioActions extends sfActions
{
	public function executeOpcionesUsuario(sfWebRequest $request)
	{
		$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".USU_USUARIO_RS ('".$_SESSION["usuario"]["username"]."',:data); end;";
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		$this->filasPorPagina = $cursor[0]['USUA_OPC_FILAS_PAG'];
	}
	
	public function executeOpcionesUsuarioGuardar(sfWebRequest $request)
	{
		$filasPorPagina = $request->getParameter('filasPorPagina');
		
		$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".USU_USUARIO_MOD_OPCIONES_RS (
			'".$_SESSION["usuario"]["username"]."',
			'".$filasPorPagina."',
			:data); end;";
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		$this->getUser()->setFlash('notice', $cursor[0]['RESPUES_EXITO']);
		$this->redirect("opcionesUsuario/opcionesUsuario");
	}

}
?>