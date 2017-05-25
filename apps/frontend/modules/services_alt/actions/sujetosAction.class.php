<?php
class sujetosAction extends sfAction
{

  public function execute($request)
  {
	$sujeto = $request->getParameter('sujeto');

	$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_TIPO_SUJETO_OBLI_BUSCAR_RS('".$sujeto."', :data); end;";
    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
    $this->setLayout(false);
    $this->getResponse()->setContentType('text/json');
    return $this->renderText(json_encode($response));
  }
}
?>