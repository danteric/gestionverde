<?php

//require('claseExcel.php');
//include_once("claseExcel.php");


//include($_SERVER["DOCUMENT_ROOT"]."/PDFN1.php");
class ExportacionActions extends sfActions
{


 public function executeExcel(sfWebRequest $request) 
 {

    //$f=fopen("traza.log","a+");
    //echo 'llega'; exit;
 //   $excel = new SimpleExcel();
    $this->setLayout(false);
    $proceso = $request->getParameter('pro');
    $args    = $request->getParameter('args');
    $sql     = sprintf('%s(%s); ',$proceso, implode(', ', $args));
  

    if ($_SESSION["usuario"]["excel"]!='S') { exit;} ;


    $c_datos = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
    // encabezados por reporte
    $sql    = "SEL_ZZ_REPO_EXPORTAR('".$proceso."')";
    $c_encabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

    $titulo  = 'Sin titulo';
    $subtit  = '';
    $archivo = 'reporte';
    $colum   =  array();
    $ind     = 0;
    foreach ($c_encabe as $fila) {

        if (substr($fila['COL'],0,1) == '_') {
            if ($fila['COL'] == '_titulo') {
                $titulo  = $fila['LAB'];
            } elseif ($fila['COL'] == '_archivo') {
                $archivo = $fila['LAB'];
            };
        } else {
          if ($fila['ANCHO']>0) {
              $ind=$ind + 1;
              $colum[$ind]['col'] = $fila['COL'];
              $colum[$ind]['lab'] = $fila['LAB'];
              $colum[$ind]['anc'] = $fila['ANCHO'];
              $colum[$ind]['ali'] = $fila['ALINE'];
          } 

        }
        
    };
    $archivo = $archivo.rand(0, 100).".xml";
  
    include('ExcelWriterXML.php');
    $xml = new ExcelWriterXML($archivo);

    // Add some general properties to the document
    $xml->docTitle($titulo);
    $xml->docAuthor($_SESSION["usuario"]["username"]);
    $xml->docCompany($_SESSION["usuario"]["empresa_razon_social"]);
    $xml->docManager('Wife');
     
    // Choose to show any formatting/input errors on a seperate sheet
    $xml->showErrorSheet(true);
     
    // Primera hoja
    $sheet1 = $xml->addSheet('Datos');
    $sheet1->writeString(1,1,$_SESSION["usuario"]["empresa_razon_social"]);
    // Titulo
    $f_tit = $xml->addStyle('tit style');
    $f_tit->fontBold();
    $f_tit->fontSize(14);
    
    $sheet1->rowHeight(2,'20');
    $sheet1->writeString(2,2,$titulo,$f_tit);
    //$sheet1->columnWidth(1,'100');

    // label columnas
    $f_lab = $xml->addStyle('lab style');
    $f_lab->fontBold();
    $f_lab->bgColor('Black');
    $f_lab->fontColor('White');

    $c_col = count($colum);
    for ($i_col=1; $i_col <= $c_col; $i_col++) { 
        $sheet1->columnWidth($i_col,$colum[$i_col]['anc']);
      // $sheet1->columnWidth($i_col,'100');
        $sheet1->writeString(3,$i_col,$colum[$i_col]['lab'],$f_lab);
    }


    // detalle de datos
    $i_fil = 4;
    $c_col = count($colum);
    foreach ($c_datos as $fila) {

        for ($i_col=1; $i_col <= $c_col; $i_col++) { 
            $valor = $fila[$colum[$i_col]['col']];
     //echo $colum[$i_col]['col'], $colum[$i_col]['ali'],'<br>';
            if ($colum[$i_col]['ali'] == 'L') {
                $sheet1->writeString($i_fil,$i_col,$valor);
              } else {
                if (is_numeric($valor)) {
                    $sheet1->writeNumber($i_fil,$i_col,$valor);
                } else {
                    $sheet1->writeString($i_fil,$i_col,$valor);
                }
                   
              }
              
        }
        $i_fil = $i_fil + 1;      

    }


//$sheet1->writeFormula('Number',4,2,'=SUM(R[-3]C:R[-1]C)');
//$sheet1->addComment(4,2,'Here is my formula: =SUM(R[-3]C:R[-1]C)','My NAME');


    $sheet2 = $xml->addSheet('Info'); 
    $sheet2->writeString(2,1,$_SESSION["usuario"]["empresa_razon_social"]);
    $sheet2->writeString(3,1,$_SESSION["usuario"]["version"]);
    $sheet2->writeString(4,1,'Generado por '.$_SESSION["usuario"]["username"].' el '.date('d/m/Y').'  '.strftime("%H:%M") );
    $sheet2->writeString(5,1,'Cant de registros listados='.count($c_datos));  

    $xml->sendHeaders();
    $xml->writeData();

 
    return sfView::NONE;      
  }





  public function executeHtml(sfWebRequest $request)
  {
      $this->setLayout(false);
      $proceso = $request->getParameter('pro');
      $args    = $request->getParameter('args');      
      $fnc = function ($linea){ echo $linea;flush();};
      $response = $this->getResponse();
      $response->send();
      $that = $this;
      $first = function($cabecera) use ($fnc, $that)
        { 
          $that->cabecera_html($fnc); 
          foreach ($cabecera as $key => $value) {
            if(empty($value['LAB']) || $value['COL']{0} == '_'):
              if ($value['COL']=='_titulo') {
                $titulo= $value['LAB'];
              }
              if ($value['COL']=='_subtit') {
                $subtit = $value['LAB'];
              }              
              continue;
            endif;           
          }
		  
          $fnc($that->getPartial('exportacion/cabecera',['titulo'=>$titulo, 'subtitulo'=>$subtit]));
         // $fnc("<table class='table table-striped table-condensed lista-simple-larga'>");
        
		};
      $this->render($proceso, $args, $fnc, $first);
	  
      return sfView::NONE;      
  }  

  protected function cabecera_html($fnc)
  {
      $fnc("<html>");
      $fnc("<header>");
      $fnc('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>');
      $fnc('<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" />');
      $fnc('<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />');
      $fnc("</header>");
      $fnc("<body>");
      
      return;
  }
   protected function cabecera_pdf($fnc)
  {
      $fnc("<html>");
      $fnc("<header>");
      $css  = sprintf('%s/web/css/bootstrap.min.css', PROJECT_PATH);
      $css1 = sprintf('%s/web/css/pdf.css',           PROJECT_PATH);
      //$css1 = sprintf(PROJECT_PATH);
      $fnc('<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>');
      $fnc(sprintf('<style type="text/css">%s</style>', file_get_contents($css)));
      $fnc(sprintf('<style type="text/css">%s</style>', file_get_contents($css1)));
      //$fnc(sprintf('<link rel="stylesheet" type="text/css" media="screen" href="file://" />', PROJECT_PATH));
      //$fnc('<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />');
      $fnc("</header>");
      $fnc("<body>");
      
      return;
  }
    static public function url_base($proc, $url, $titulo, $subtitulo, array $args)
  {
    $_args = [];
    foreach ($args as $key => $value) {
      $_args['args'][] =  is_numeric($value) ? $value : "'$value'";
    }
    //echo $url .'--'.$proc.'--'.http_build_query($_args).'--'.$titulo.'--'.$subtitulo; exit;
    $url =  sprintf('%s?pro=%s&%s&titulo=%s&subtit=%s',$url, $proc, http_build_query($_args), $titulo, $subtitulo);
    $url = str_replace('%7B', '{', $url);
    $url = str_replace('%7D', '}', $url);
    return $url;
  } 
      static public function url_baseII($url, $titulo, $subtitulo, $archCabecera, $archCuerpo, $empresa, $tipo_negocio, $version)
  {
    $url =  sprintf('%s?titulo=%s&subtit=%s&cabecera=%s&cuerpo=%s&empresa=%s&tipo_negocio=%s&version=%s',$url, 'HHH'/*$titulo*/, 'JJJ'/*$subtitulo*/, $archCabecera, $archCuerpo, $empresa, $tipo_negocio, $version);
    $url = str_replace('%7B', '{', $url);
    $url = str_replace('%7D', '}', $url);
    return $url;
  }
  public function executePdfNew (sfWebRequest $request)
  {


    $proceso = $request->getParameter('pro');
    $args    = $request->getParameter('args');
    $sql     = sprintf('%s(%s); ',$proceso, implode(', ', $args));
  

    if ($_SESSION["usuario"]["pdf"]!='S') { exit;} ;


    $c_datos = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
    // encabezados por reporte
    $sql    = "SEL_ZZ_REPO_EXPORTAR('".$proceso."')";
    $c_encabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


    $titulo  = 'Sin titulo';
    $subtit  = '';
    $archivo = 'reporte';
    $colum   =  array();
    $ind     = 0;
    foreach ($c_encabe as $fila) {

        if (substr($fila['COL'],0,1) == '_') {
            if ($fila['COL'] == '_titulo') {
                $titulo  = $fila['LAB'];
            } elseif ($fila['COL'] == '_archivo') {
                $archivo = $fila['LAB'];
            };
        } else {
          if ($fila['ANCHO']>0) {
              $ind=$ind + 1;
              $colum[$ind]['col'] = $fila['COL'];
              $colum[$ind]['lab'] = $fila['LAB'];
              $colum[$ind]['anc'] = $fila['ANCHO'];
              $colum[$ind]['ali'] = $fila['ALINE'];
          } 

        } 
        
    };
    $archivo = $archivo.rand(0, 100).".pdf";


    require('fpdf.php');

    //$pdf = new repo('L','mm','A4');
   $pdf = new FPDF();

//    $pdf->titulo= $titulo;
  //  $subtitulo1 = "Subtitulo";
 //   $cabecera = "Cabecera";

    //Disable automatic page break
    $pdf->SetAutoPageBreak(false); 
  //  $pdf->AliasNbPages();

   
    $empresa = $_SESSION["usuario"]["empresa"];
    $logo    = "img/logolis".$empresa.".jpg";
    $lin_pag = 25;

    $ancho = 0;
    $salto = 0;
    $c_col = count($colum);
    $lin_r   = 0;
 
     foreach ($c_datos as $fila) {

       if ($lin_r == 0) {
          // --------  encabezado -------------
            $pdf->AddPage('L');
            $pdf->Image($logo,10,10,40,20);
            $pdf->SetFont('Arial','B',16);
            $pdf->SetXY(80,15);
            $pdf->Cell(40,10,$titulo);
            $pdf->SetXY(10,35);
            $pdf->SetFont('Arial','B',8);
     

         // labels de columnas con su ancho
            $lin_r = $lin_r + 1;
            for ($i_col=1; $i_col <= $c_col; $i_col++) { 
                $ancho = ( $colum[$i_col]['anc'] ) / 3.3;
                $salto = 0;
                if ($i_col == $c_col) {$salto = 1;}
                $pdf->Cell($ancho,6,utf8_decode($colum[$i_col]['lab']),1,$salto,'C',false);
            };
  
        };

      $lin_r = $lin_r + 1;
  
      // ------------ cada linea de detalle -----------
        for ($i_col=1; $i_col <= $c_col; $i_col++) { 
            $valor = $fila[$colum[$i_col]['col']];
            $ancho = ( $colum[$i_col]['anc'] ) / 3.3;
            $salto = 0;
            $aline = $colum[$i_col]['ali']; 
            if ($i_col == $c_col) {$salto = 1;}
            $pdf->Cell($ancho,6,utf8_decode($valor),0,$salto,$aline,false);
        };
  
        // --------- me fijo si llego al fn de la hoja -----------
        if ($lin_r == $lin_pag) { 
            $lin_r = 0; 
          };

    };


    $pdf->Output();

//    header("Location: $varUrl");
	
  }
  public function executePdf(sfWebRequest $request)
  {
      $this->setLayout(false);
      $that = $this;
      $proceso  = $request->getParameter('pro');
      $args     = $request->getParameter('args');      
      #$response = $this->getResponse();      
      #$response->setContentType('Content-Type: application/pdf');      
      $titulo = $subtit = $pdf = $fnc = $archivo = null;


      //$response->send();
      $first = function($cabecera) use (&$fnc, &$pdf, &$archivo, &$titulo, &$subtit, $that)
      {

          foreach ($cabecera as $key => $value) {
          $value['LAB'] = trim($value['LAB']);
          if(empty($value['LAB']) || $value['COL']{0} == '_'):
            if ($value['COL']=='_titulo') {
              $titulo= $value['LAB'];
            }
            if ($value['COL']=='_subtit') {
              $subtit = $value['LAB'];
            }              
            if ($value['COL']=='_archivo') {
              #$response->setHttpHeader('Content-Disposition', 'attachment; filename="'.$value['LAB'].'.pdf"');
              #$response->send();
              $archivo = sprintf('pdf/%s-%s.html', $value['LAB'], date('d-m-Y_H.i.s'));
              $pdf = sprintf('%s/web/%s',PROJECT_PATH, $archivo);
              $pdf = fopen($pdf, 'a+');
              $fnc = function ($linea) use (&$pdf)
              { 
                fwrite($pdf, $linea);
              };
            }
            continue;
          endif;

        }
        $that->cabecera_pdf($fnc);
        $fnc($that->getPartial('exportacion/hacktable'));
        //$fnc("<table class='splitForPrint'>");
      };
      $this->render($proceso, $args, $fnc, $first);
      fclose($pdf);
      //flush();
      $_pdf_archivo = sprintf('pdf/cabecera-%s-%s.html', $_SESSION["usuario"]["empresa"], md5($archivo));
      $f_cabecera   = sprintf('%s/web/%s',PROJECT_PATH, $_pdf_archivo);
      sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
      $cabecera_html = $this->getPartial('exportacion/cabecera', ['titulo'=>$titulo, 'subtitulo'=>$subtit]);
      $cabecera_html = $this->getPartial('exportacion/body_pdf', ['cabecera'=>$cabecera_html]);
      file_put_contents($f_cabecera, $cabecera_html);
      //exit;
      //Helper::goToPDF($archivo, 'A4', 'Portrait', $f_cabecera);
	  //echo $archivo;
	  //exit;
      $fp = fopen("TraxaGOTo.txt","a");
      fwrite($fp, $cabecera_html);
      fclose($fp);
      Helper::goToPDF($archivo, 'A4', 'Landscape', $f_cabecera);
      return sfView::NONE;      
  }

  public function render($proceso, $args, &$fnc, &$first=null) 
  {
      $sql = sprintf('begin %s.%s(%s, :col, :data); end;',
        sfConfig::get('SCHEMA_ORACLE'),
	        $proceso, implode(', ', $args));
			//echo 'render: '.$sql; exit;
      if($this->request->getParameter('sql', false)):
      //echo $sql;exit;
      endif;
      //ob_flush();
	  
      $func = function($datos, $cabecera, $num) use (&$fnc, &$first)
      {

        $final = $cab = array();
        $i=-1;
        if($num==0):
          if(is_callable($first)):
            $first($cabecera);
          endif;
          foreach ($cabecera as $key => $value) {
            $value['LAB'] = trim($value['LAB']);
            if(empty($value['LAB']) || $value['COL']{0} == '_'):
//              if ($value['COL']=='_titulo') {
//                $fnc(sprintf('<b>%s</b>', $value['LAB']));
//                $fnc("<hr>");
//              }
//              if ($value['COL']=='_subtit') {
//                $fnc(sprintf('<b>%s</b>', $value['LAB']));
//              }              
              continue;
            endif;
            $cab[] = $value['LAB'];
			
          }
          $fnc("<table class='table table-condensed lista-simple-larga splitForPrint'>");
          $fnc('<thead class="heading1"><tr><th>'.implode("</th><th>", $cab)."</th><tr></thead>\n");
        endif;
        $fnc("<tr>");
        foreach ($cabecera as $key => $value) {
          $valor = null;
          $value['LAB'] = trim($value['LAB']);
          if(empty($value['LAB']) || $value['COL']{0} == '_'):
            continue;
          endif;
          $valor = trim(@$datos[strtoupper($value['COL'])]);
		  //var_dump($valor);exit;
          if (is_numeric($valor)) {
            $fnc("<td style=\"text-align: right;\">$valor</td>");
          }else{
            $valor = nl2br($valor);
            $fnc("<td>$valor</td>");
          }
          //$final[] = nl2br();
        }
        //var_dump($cabecera);
        //$fnc('<td>'.implode("</td><td>", $final)."</td></tr>\n");
        $fnc("</tr>");
      };
		//echo $sql.' ** ';
		//print_r($func);
		//exit;
      BackendServices::getInstance()->getResultsFromStoreProcedureReportExport($sql, $func);
      $fnc("</table>");
      //$fnc("<pre>--------------------------------------------------------------</pre>");
      $fnc("<div style=\"text-align: center; width:100%; padding-top:5px;border-top: 1px solid black;\"><h3>Fin del Listado</h3></div>");
      $fnc("</body>");
      $fnc("</html>");

      //$response->setContentType('Content-Type: text/csv');
  }
  
}