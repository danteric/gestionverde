<?php
class mailRecuperaContraActions extends sfActions
{
	public function executeMailRecuperaContra(sfWebRequest $request)
	{
	
		$sql = "USU_GET_PARAMETROS_RS(1,'MAIL_RECUP_PWD_CUERPO')" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		$this->cuerpo = $cursor[0]['para_texto'];

		$sql = "USU_GET_PARAMETROS_RS(1,'MAIL_RECUP_PWD_TITULO')" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		$this->titulo = $cursor[0]['para_texto'];

	}
	
	public function executeMailRecuperaContraGuardar(sfWebRequest $request)
	{

		//print_r($_REQUEST); exit;

		$cuerpo = $request->getParameter('cuerpo');
		$sql = "USU_SET_PARAMETROS_RS(1,'MAIL_RECUP_PWD_CUERPO',0,'LEYENDA','".$cuerpo."')" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$titulo = $request->getParameter('titulo');
		$sql = "USU_SET_PARAMETROS_RS(1,'MAIL_RECUP_PWD_TITULO',0,'LEYENDA','".$titulo."')" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);	

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