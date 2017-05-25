
<?php
require('fpdf.php');

class PDF extends FPDF 
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("portada_pf.png" , 10 ,8, 35 , 38 , "PNG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'Operaciones desde CSV',1,0,'C');
    //Salto de línea
    $this->Ln(20);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
    
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
      $this->Cell(40,5,"linea 4",1);
   }
   
   //Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
//Restauración de colores y fuentes
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('');
//Datos
   $fill=false;
        for ($c=0; $c < count($header); $c++) {
			$this->Cell(40,6,$header[$c],'LR',0,'L',$fill);
        }
$this->Ln();
/*      $fill=!$fill;
      $this->Cell(40,6,"col",'LR',0,'L',$fill);
$this->Cell(40,6,"col2",'LR',0,'L',$fill);
$this->Cell(40,6,"col3",'LR',0,'R',$fill);
$this->Cell(40,6,"col4",'LR',0,'R',$fill);
$fill=true;
   $this->Ln();
   $this->Cell(160,0,'','T');*/
}

function HeaderTablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
//Cabecera

for($i=0;$i<count($header);$i++)
$this->Cell(40,7,$header[$i],1,0,'C',1);
$this->Ln();
}   
   
}

$pdf=new PDF();
//Títulos de las columnas
$fila = 1;
$header=Array();
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
$cursor              = array();
//$cursor = Rep::getInstance()->getCursor();
$sql = "begin smogar.SEL_ENTIDADES_X_RAZON_CUIT_RP('admin', '1','','','1',:col, :data); end;";
$cursor = BackendServices::getInstance()->getResultsFromStoreProcedureReport($sql); 

/*if (($gestor = fopen("clientes.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, "|")) !== FALSE) {
	//echo $fila;
		if ($fila == 1){
			//echo 'Cabecera';
			$pdf->HeaderTablaColores($datos);
		}else{
		$numero = count($datos);
		$pdf->TablaColores($datos);
		//echo 'Fila';
		}
        $fila++ ;
    }
	//exit;
    fclose($gestor);
}*/
foreach($cursor as $row):
$pdf->TablaColores($row);
endforeach;

$pdf->Output();
?>
