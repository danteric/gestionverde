<?php
class actividadesAction extends sfAction
{

  public function execute($request)
  {
    $sql = sprintf('BEGIN %s.SEL_ENTI_ACTIVI_SUJ_BUSCAR_RS(\'%s\', :data); END;',
      sfConfig::get('SCHEMA_ORACLE'),
      $request->getParameter('actividad')
      );
    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
    $this->setLayout(false);
    $this->getResponse()->setContentType('text/json');
	
    return $this->renderText(json_encode($response));
  }
}
?>