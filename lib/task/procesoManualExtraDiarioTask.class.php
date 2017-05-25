<?php

class procesoExportarClientesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'Prosegur','frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));
    $this->addOption('empresa', null, sfCommandOption::PARAMETER_REQUIRED, 'Empresa');
    $this->addOption('usuario', null, sfCommandOption::PARAMETER_REQUIRED, 'Usuario');
    $this->namespace        = '';
    $this->name             = 'procesoExportarClientes';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [procesoExportarClientes|INFO] task does things.
Call it with:

  [php symfony procesoExportarClientes|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $contextInstance = sfContext::createInstance($this->configuration);
    $contextInstance->getConfiguration()->loadHelpers('Partial');
    $empresa = $options["empresa"];
    $usuario = $options["usuario"];
    set_time_limit(0);
    $hash = uniqid();
    $this->filtro_razon_social = "";
    $i=1;
    $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_ENTIDADES_X_RAZON_CUIT_RP('DOWNLOAD', '".$empresa."','".$this->filtro_razon_social."','".$i."', :data); end;";
    $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

    $this->paginas = $this->cursor[0]['TOTAL_PAGINAS'];
    $this->pagina = 1;
    $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_ENCABE_LISTADOS_RS('".$empresa."','".$usuario."',:data); end;";

    $this->encabezado = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
    $content = get_partial('bach/clientesPdf', array('filtro_razon_social' => $this->filtro_razon_social,
                                                    'encabezado' => $this->encabezado,
                                                    'cursor' => $this->cursor,
                                                    'paginas' =>$this->paginas,
                                                    'pagina' => $this->pagina) );


    try
    {

      $html2pdf = new HTML2PDF("L", "A4", "es");
      $html2pdf->writeHTML($content);
      $html2pdf->Output('./web/pdf/'.$i."_".$hash."_reporte_cliente.pdf", 'F');
    }
    catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
    }
          $this->pagina++;
    //$html2pdf->writeHTML("dasds");

    $this->pagina = 2;
    for($i=2;$i<=$this->paginas;$i++) {
      unset($this->cursor);
      unset($content);
      $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_ENTIDADES_X_RAZON_CUIT_RP('DOWNLOAD', '".$empresa."','".$this->filtro_razon_social."','".$i."', :data); end;";
      $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
      $content = get_partial('bach/clientesPdfSinEncabezado', array('filtro_razon_social' => $this->filtro_razon_social,
                                                    'encabezado' => $this->encabezado,
                                                    'cursor' => $this->cursor,
                                                    'paginas' =>$this->paginas,
                                                    'pagina' => $i));
      //Helper::getInstance()->generatePdfToFile($content, $i."_".$hash."_reporte_cliente.pdf","L");
      try
    {

      $html2pdf = new HTML2PDF("L", "A4", "es");
      $html2pdf->writeHTML($content);
      $html2pdf->Output('./web/pdf/'.$i."_".$hash."_reporte_cliente.pdf", 'F');
    }
    catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
    }
      $this->pagina++;
    }

    $files = array();



    for($i=1;$i<=$this->paginas;$i++) {
      $files[] = './web/pdf/'.$i.'_'.$hash.'_reporte_cliente.pdf';
    }


    $path = './web/pdf/reporte_cliente_completo.pdf';
    $pdf = new concat_pdf();
    $pdf->setFiles($files);
    $pdf->concat("L");
    $pdf->Output($path, "F");
    //$response = $this->getResponse();
    //$response->setContentType('Content-Type: application/pdf');
    //$response->setHttpHeader('Content-Disposition', 'attachment; filename="' . basename($path) . '"');
    //$response->setContent(file_get_contents($path));


  }
}
