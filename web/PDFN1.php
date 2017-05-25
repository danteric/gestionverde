<?php
require('fpdf.php');
//require("../lib/model/Entity/Empresa.php");
$procedimiento;
$argumentos = array();
$tituloPrimario;
$tituloSecundario;
$tituloSecundarioBis;
$tituloTerciario;
$titulos;
$logo;
$tamanoColumnas = array();
$alinear = array();

class PDFN1 extends FPDF 
{


function getTamColumna($texto){
  /*Viene la cantidad de caracteres en el mismo texto separado por ;*/
  $pos1 = strpos($texto, ';');
  $nroCaracteres = substr($texto,$pos1+1,strlen($texto));
  //para datos que vienen de una sola letra ej 'R' o 'L'
  $alineacion = substr($texto,$pos1+4,strlen($texto));
  $textoTitulo = utf8_decode(substr($texto,0,$pos1));
  $espacioTitulo = $this->GetStringWidth($textoTitulo);
  $valorColumna = 0;
  if (strlen($textoTitulo) < $nroCaracteres){
    $espacioRestante = ($nroCaracteres - $this->GetStringWidth($textoTitulo))*$this->GetStringWidth(' ');
    $valorColumna = $this->GetStringWidth($textoTitulo) + $espacioRestante;
  }else{
    $valorColumna =  $this->GetStringWidth($textoTitulo);

  }

  return $valorColumna;

}
//Cabecera de página
   function Header()
   {

    $fill=false;
    global $titulos, $tituloPrimario, $tituloSecundario, $tituloSecundarioBis, $tituloTerciario, $logo, $tamanoColumnas, $alinear, $pathLogo, $tipo_imagen;
    $this->Image('data://image/JPG;base64,'.base64_encode(file_get_contents($pathLogo)),null, null, 0, 0, $tipo_imagen);
    $this->SetFont('Arial','B',11);
    //Movernos a la derecha
    //Título
    $this->SetY(10);
    $this->SetTitle(utf8_decode($tituloPrimario),false);
    $this->Cell(0,10,utf8_decode($tituloPrimario),0,0,'C',$fill);
    //Salto de línea
    $this->Ln(5);
    //$this->Cell(0,10,iconv ( 'UTF-8' ,  'windows-1252' ,$tituloSecundario.': '.$tituloSecundarioBis),0,0,'C',$fill);
    $this->Cell(0,10,utf8_decode($tituloSecundario.': '.$tituloSecundarioBis),0,0,'C',$fill);
    $this->Ln(5);
    //$this->Cell(60,10,$GLOBALS["subtitulo"],'L',0,'C', false);
    //$this->Ln(20);
    $this->Cell(0,10,utf8_decode($tituloTerciario. ' / '.$_GET['version']),0,0,'C',$fill);



    //Arial italic 8
    ////$this->SetFont('Arial','I',8);
    //Número de página

    $this->Ln(15);
    $this->SetFont('Arial','B',8);
    $indiceColumnas = 0;
	$this->SetFillColor(229, 229, 229);
	//,1,0,'L',1);
    //echo $this->GetStringWidth(' ') ; exit;
    for ($c=4; $c < count($titulos); $c++) {
        $pos1 = strpos($titulos[$c], ';');
		$alineacion = substr($titulos[$c],$pos1+4);
		//si viene alineacion ENTERO TEXTO y el 3er parametro puede venir cualquiera, aqui lo detecto la ultima letra
		// este proceso se hace para los enteros y texto sin decimales
		$alignder= substr($alineacion,'ETR'+2,strlen($alineacion));
		//le asigno a $alignderecho el ultimo valor optenido
		$alignderecho= substr($alineacion,'ET'.$alignder+2,strlen($alineacion));
		if($alineacion != 'ET'.$alignderecho){
			$alineamiento = $alineacion;
		}else{
			$alineamiento = $alignderecho;
		}
		//echo $alignderecho;
        //$pos2 = strpos($titulos[$c], ';', $pos1);
        $tamColumna = 0;
        if ($pos1 === false) {
            $tamColumna = strlen($titulos[$c]) + 1;
            $pos1 = $tamColumna;
        } else {
            //$nombreColumna = substr($titulos[$c],$pos1+1,$pos2 - $pos1);
            //$tamColumna = substr($titulos[$c],$pos2+1,strlen($titulos[$c]));
            //$tamColumna = substr($titulos[$c],$pos1+1,strlen($titulos[$c]));
            $tamColumna = $this->getTamColumna($titulos[$c]);
            $tamanoColumnas[$indiceColumnas]= $tamColumna;
			
	
			$alinear[$indiceColumnas] = $alineacion;
			//print_r($alinear[$indiceColumnas]);
			//print_r($alinear[$indiceColumnas]); echo "<p>";
            //$tamanoColumnas[$indiceColumnas][0]= $nombreColumna;
            //$tamanoColumnas[$indiceColumnas][1]= $tamColumna;
        }
		//si viene alineacion muestro aqui
		if(isset($alineacion) && !empty($alineacion)){
			$this->Cell($tamColumna,4,utf8_decode(substr($titulos[$c],0,$pos1)),0,0,$alineamiento,1);
		}
		else {
			//esto es es en caso de que la columna 'ALINEACION' no exista como salida
			$this->Cell($tamColumna,4,utf8_decode(substr($titulos[$c],0,$pos1)),0,0,'L',1);
		}

        if ($tamColumna > 1 ) {
        $this->Cell(3);}
        $indiceColumnas = $indiceColumnas + 1;
        }
$this->Ln(5);
}
      
   
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-12);
    //Arial italic 8
    ////$this->SetFont('Arial','I',8);
    //Número de página
    if(!empty($_GET['version'])){
    $this->Cell(0,10,utf8_decode('Firma: _________________________                                  Firma: _________________________'),false,0,'L',false);
	}
    $this->Cell(0,10,utf8_decode('Pagina '.$this->PageNo().'/{nb}'),0,0,'R');
   }
   //Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
//Restauración de colores y fuentes
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('Arial','',8);
$fill=false;
$restablecerX = 0;
$restablecerY = 0;
$valorYProximo = 0;
global $tamanoColumnas;
global $alinear;
$indiceTitulos = 0;
$valorYProximo = $this->GetY();
$banderaML = 0;
$maxML = 1;
$cantidadML = 1;
$respuestaRC = 0;

$maxIndiceTitulos = (count($tamanoColumnas) > count($header))? count($header) : count($tamanoColumnas);
$indiceTitulos = 0;
for ($c=0; $c < count($header); $c++) {
  /*Pregunto si el ancho del dato es mas grande que el ancho del titulo esto me defini si imprimo con 
  multilinea o con linea simple*/

    if ($this->GetStringWidth($header[$c]) > $tamanoColumnas[$indiceTitulos]) {
      /*Tomo los valores actuales de X e Y*/
    $restablecerX = $this->GetX();
    $restablecerY = $this->GetY();
    /*Imprimo multilinea*/
    $this->MultiCell($tamanoColumnas[$indiceTitulos],3,utf8_decode($header[$c]));
    /*asigno el nuevo valor de X que es el valor anterior mas el ancho de la columna*/
    $restablecerX = $restablecerX + $tamanoColumnas[$indiceTitulos];
    /*Para restablecer el valor de Y me fijo si el valorYProximo es mas grande que el actual*/
     $valorYProximo = ($valorYProximo > $this->GetY())? $valorYProximo : $this->GetY();
     /*restablezco X e Y*/
    $this->SetY($restablecerY);
    $this->SetX($restablecerX);
    /*Bandera para saber que pase por un Multi Linea*/
    $banderaML = 1;
}
else
{
  /*imprimo sin multi linea*/ 
  //*********************************************************//
  //si viene $alinear imprimo si es derecha o izquierda//
  //*********************************************************//
  if(isset($alinear[$indiceTitulos]) && !empty($alinear[$indiceTitulos]))
  {
  	//Entonces le asigno el valor 'R' a $aderecho para imprimir alineado a la derecha y sin DECIMAL//
  	$aderecho= substr($alinear[$indiceTitulos],'ETR'+2,strlen($alinear[$indiceTitulos])); 
	$sDer= substr($alinear[$indiceTitulos],'ET'.$aderecho+2,strlen($alinear[$indiceTitulos])); 

	
  	//si el dato es numerico y esta alineado con la 'R' y es distinto de ENTERO TEXTO imprimo con decimal//
  	if(is_numeric($header[$c]) && $alinear[$indiceTitulos] == 'R'&& $alinear[$indiceTitulos] != 'ET'.$sDer){
  	  $this->Cell($tamanoColumnas[$indiceTitulos],3,number_format(utf8_decode(substr($header[$c],0,$tamanoColumnas[$indiceTitulos])), 2, ",", "."),0,0,$alinear[$indiceTitulos],$fill);	
  	}
  	//si el dato es ENTERO TEXTO alineado imprimo SIN decimal//
  	elseif($alinear[$indiceTitulos] == 'ET'.$sDer){

  	$this->Cell($tamanoColumnas[$indiceTitulos],3,utf8_decode(substr($header[$c],0,$tamanoColumnas[$indiceTitulos])),0,0,$sDer,$fill);	
  	}else{
    // al final sino no cumplen con las dos condiciones de arriba imprimo sin decimal y alineado segun corresponda en el SP
  	$this->Cell($tamanoColumnas[$indiceTitulos],3,utf8_decode(substr($header[$c],0,$tamanoColumnas[$indiceTitulos])),0,0,$alinear[$indiceTitulos],$fill);	
  	}
  }
  else
  {
  	//si NO viene $alinear imprimo jarcodeado con 'L'
  	//esto es es en caso de que la columna 'ALINEACION' no exista como salida
 $this->Cell($tamanoColumnas[$indiceTitulos],3,utf8_decode(substr($header[$c],0,$tamanoColumnas[$indiceTitulos])),0,0,'L',$fill);
  }

//RECORRIDO DE ARRAYS MULTIDIMENSIONALES
  $banderaML = 0;
}
  if ($indiceTitulos < $maxIndiceTitulos-1){
    $indiceTitulos = $indiceTitulos +1;
    //if ($tamanoColumnas[$indiceTitulos] > 1 ) {$this->Cell(4);}
    $this->Cell(3);
  }
  else
  {
    $indiceTitulos = 0;
  }
  }
//exit;
      /*Seteo Y a Valor Proximo Y y pregnto si supera los 179 de ser asi salto de pagina*/
      $this->SetY($valorYProximo);
      /*si bandera es mayor a 1 solo hago un salto de linea de 2 sino de 4*/
      if ($banderaML < 1){
      $this->Ln(4);
}else{$this->Ln(2);}
}

function HeaderTablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
//$this->SetFont('','B');
//Cabecera

for($i=0;$i<count($header);$i++)
$this->Cell(40,7,utf8_decode($header[$i]),1,0,'C',1);
$this->Ln();
}  

}

$pdf = new PDFN1('L','mm','A4');
$pdf->titulo= $_GET['titulo'];
$subtitulo1 = $_GET['subtit'];
$cabecera = $_GET['cabecera'];
$empresa = $_GET['empresa'];
//print_r($_GET);exit;
//echo $titulo1;exit;

$cuerpo = $_GET['cuerpo'];
$fila = 1;
$header=Array();
$maxML = 1;
$cantidadML = 1;
$indiceTitulos = 0;
global $titulos, $tituloPrimario, $tituloSecundario, $tituloSecundarioBis, $tituloTerciario, $logo, $pathLogo, $tipo_imagen;
   /*$fichero_texto = fopen ("pdf/logo", "r");
   $logo = fread($fichero_texto, filesize("pdf/logo"));
*/

$tipo_negocio_v = $_GET['tipo_negocio'];
if ($tipo_negocio_v === "SEG"){
$tipo_imagen = "PNG";
}else{$tipo_imagen = "JPG";}
$pathLogo = "pdf/logo".$empresa;
$logo = file_get_contents($pathLogo);
if (($gestor = fopen($cabecera, "r")) !== FALSE) {
  $titulos = fgetcsv($gestor, 1000, "|");
  //$titulos = explode("|", $datos);
  $tituloPrimario = $titulos[0];
  $tituloSecundario = $titulos[1];
  $tituloSecundarioBis = $titulos[2];
  $tituloTerciario = $titulos[3];
}
fclose($gestor);
//Disable automatic page break
$pdf->SetAutoPageBreak(false); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
if (($gestor = fopen($cuerpo, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, "|")) !== FALSE) {
        $maxIndiceTitulos = (count($tamanoColumnas) > count($datos))? count($datos) : count($tamanoColumnas);
        for ($c=0; $c < count($datos)-1; $c++) {
          if ($c===0){$maxML=$pdf->NbLines($tamanoColumnas[$c],utf8_decode($datos[$c]));}
          $cantidadML = $pdf->NbLines($tamanoColumnas[$c],utf8_decode($datos[$c]));
          $maxML = ($cantidadML > $maxML)? $cantidadML : $maxML;
            if ($indiceTitulos < $maxIndiceTitulos-1){
            $indiceTitulos = $indiceTitulos +1;
            
          }else{
            $indiceTitulos = 0;
          }
        }
        if ($pdf->GetY()+ $maxML  >165){
           $pdf->AddPage();

        }
    $pdf->TablaColores($datos);
        $fila++ ;
    }
 // exit;
    fclose($gestor);
}
$contador = 1;
/*foreach($cursor[0] as $row):
$pdf->TablaColores($row);
endforeach;*/
ob_end_clean();
$pdf->Output();

?>
