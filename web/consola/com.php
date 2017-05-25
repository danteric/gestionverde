
<head>
    <title>Explora</title>
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" /> 
</head> 
<div class="modal-backdrop fade in"></div>
  <div class=" modal " style=""> 
  <div class="panel-body">
    <div class="" style="padding: 55px 55px">

<?php
/*
	ini_set('post_max_size','300M');
	ini_set('upload_max_filesize','300M');
	
    $rutazip         = $_POST['rutazip'];
    $archivo         = $_FILES['txtFile']['tmp_name'];
    $ruta            = $_POST['ruta']; 
<<<<<<< .mine

  $verificar = explode(".", $archivo);
  //print_r($archivo); exit;
  if(empty($archivo) || empty($_FILES['txtFile']['name'])){
    echo "No tiene ningun dato Enviado";
    echo '<div class="text-right">
          <input type="submit" class="btn btn-warning" value="Volver" onclick="javascript:history.back(3)()"/>
          </div>';
    exit;
  }
*/
   ni_set('post_max_size','300M');
  ini_set('upload_max_filesize','300M');
  
    $rutazip         = $_POST['rutazip'];
    $archivo         = $_FILES['txtFile']['tmp_name'];
    $ruta            = $_POST['ruta']; 
  
  $verificar = explode(".", $_FILES['txtFile']['name']);
  //echo '<pre>'; print_r($verificar); exit;
  if(empty($archivo) || empty($_FILES['txtFile']['name'])){
    echo "No tiene ningun dato Enviado";
    echo '<div class="text-right">
          <input type="submit" class="btn btn-warning" value="Volver" onclick="javascript:history.back(3)()"/>
          </div>';
    exit;
  }
  if($verificar[1] == 'zip'){
=======
	
	$verificar = explode(".", $_FILES['txtFile']['name']);
	//echo '<pre>'; print_r($verificar); exit;
	if(empty($archivo) || empty($_FILES['txtFile']['name'])){
		echo "No tiene ningun dato Enviado";
		echo '<div class="text-right">
		      <input type="submit" class="btn btn-warning" value="Volver" onclick="javascript:history.back(3)()"/>
		      </div>';
		exit;
	}

	if($verificar[1] == 'zip'){
>>>>>>> .r747
     // descomprimir archivo
    $zip = new ZipArchive();
    
    // Abrimos el archivo zip:
    if( $zip->open($archivo, ZIPARCHIVE::CREATE) === true )
    {
        $zip->extractTo($ruta);
        $zip->close();

        echo 'Archivo descomprimido';
    }

  }
  else
  {

        $response = array();
          $target_path = $ruta;
          $target_path = $target_path . basename( $_FILES['txtFile']['name']);
          if((!empty($_FILES['txtFile']['name'])) && ($_FILES['txtFile']['error'] == 0)) {
          
            $filename = basename($_FILES['txtFile']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if (($_FILES['txtFile']["size"] < 35000000)) {
                //$newname = dirname(__FILE__).'/../../web/consola/'.$ruta.$filename;
        $newname = $ruta.$filename;
               // if (!file_exists($newname)) {
                  if ((move_uploaded_file($_FILES['txtFile']['tmp_name'],$newname))) {
                     $response[0] = 1;
                     $response[1] = $filename;
           $response[2] = $newname;
                  } else {
                    $response[0] = 0;
                    $response[1] = "Error!";;
                  }
                //} 
            } else {
                $response[0] = 0;
                $response[1] = "Error! Tamaño fichero";
            }
        } else {
            $response[0] = 0;
            $response[1] = "Error! Fichero inexistente. Verificar Ruta del Archivo de origen";
        }
        echo "<pre>";print_r($response);
  
  
  }

?>
   <div class="text-right">
    <input type="submit" class="btn btn-warning" value="Volver" onclick="javascript:history.back(3)()"/>
   </div>
</div>
</div>
</div>