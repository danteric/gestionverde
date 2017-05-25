<?php 
$procedimiento;
$argumentos = array();
$tituloPrimario;
$tituloSecundario;
$tituloSecundarioBis;
$tituloTerciario;
$titulos;
$logo;
$tamanoColumnas = array();

class repo extends FPDF 
{


function getTamColumna($texto){
  /*Viene la cantidad de caracteres en el mismo texto separado por ;*/
  $pos1 = strpos($texto, ';');
  $nroCaracteres = substr($texto,$pos1+1,strlen($texto));
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
    global $titulos, $tituloPrimario, $tituloSecundario, $tituloSecundarioBis, $tituloTerciario, $logo, $tamanoColumnas;
    $this->Image('data://image/JPG;base64,'.base64_encode(file_get_contents("pdf/logo")),null, null, 0, 0, 'JPG');
	//$this->Image('data://image/JPG;base64,'.base64_encode($encabe['EMPR_LOGO']),null, null, 0, 0, 'JPG');
    
	$this->SetFont('Arial','B',11);
    //Movernos a la derecha
    //Título
    $this->SetY(10);
    $this->SetTitle(utf8_decode($tituloPrimario),false);
	$this->Cell(10);
    $this->Cell(0,10,utf8_decode($tituloPrimario),0,0,'C',$fill);
    //Salto de línea
    $this->Ln(5);
    //$this->Cell(0,10,iconv ( 'UTF-8' ,  'windows-1252' ,$tituloSecundario.': '.$tituloSecundarioBis),0,0,'C',$fill);
    $this->Cell(0,10,utf8_decode($tituloSecundario),0,0,'C',$fill);
    $this->Ln(5);
    //$this->Cell(60,10,$GLOBALS["subtitulo"],'L',0,'C', false);
    //$this->Ln(20);
    $this->Cell(0,10,utf8_decode($tituloTerciario),0,0,'C',$fill);
    $this->Ln(15);
    $this->SetFont('Arial','B',8);
    $indiceColumnas = 0;
    //echo $this->GetStringWidth(' ') ; exit;
    for ($c=4; $c < count($titulos); $c++) {
        $pos1 = strpos($titulos[$c], ';');
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
            //$tamanoColumnas[$indiceColumnas][0]= $nombreColumna;
            //$tamanoColumnas[$indiceColumnas][1]= $tamColumna;
        }

        $this->Cell($tamColumna,4,utf8_decode(substr($titulos[$c],0,$pos1)),0,0,'L',$fill);
        if ($tamColumna > 1 ) {
        $this->Cell(3);}
        $indiceColumnas = $indiceColumnas + 1;
        }
$this->Ln(5);
}
      
   
   
   //Pie de página
   function Footer()
   {
    $this->SetY(-8);
	$this->SetFont('Arial','I',7);
	$this->Cell(0,10,date('d-m-Y')." / " . Usuario::logueado(),0,0,'L',false);
    $this->Cell(0,10,utf8_decode('Pag '.$this->PageNo().'/{nb}'),0,0,'R');
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
}else{
  /*imprimo sin multi linea*/
  $this->Cell($tamanoColumnas[$indiceTitulos],3,utf8_decode(substr($header[$c],0,$tamanoColumnas[$indiceTitulos])),0,0,'L',$fill);
  $banderaML = 0;
}
  if ($indiceTitulos < $maxIndiceTitulos-1){
    $indiceTitulos = $indiceTitulos +1;
    //if ($tamanoColumnas[$indiceTitulos] > 1 ) {$this->Cell(4);}
    $this->Cell(3);
  }else{
    $indiceTitulos = 0;
  }
  }
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
?>