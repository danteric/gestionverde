<?php
class simulaUsuarioActions extends sfActions
{
	public function executeSimulaUsuario(sfWebRequest $request)
	{
	
		$sql = "USU_GET_PARAMETROS_RS(1,'USUARIO_SIMULADO')" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$this->usuario_simulado = $cursor[0]['para_valor_c'];

	}
	
	public function executeSimulaUsuarioGuardar(sfWebRequest $request)
	{

		//print_r($_REQUEST); exit;

		$id_usuario = $request->getParameter('id_usuario');
		
		$sql = "USU_SET_PARAMETROS_RS(1,'USUARIO_SIMULADO',0,'".$id_usuario."',null)" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$_SESSION["usuario"]["username"] = $id_usuario;

   /*   	$resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        } ;
	*/
//echo print_r($_REQUEST);exit;

        $this->redirect("/");
	}

}
?>