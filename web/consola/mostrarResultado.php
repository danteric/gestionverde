
  <?php
  if($_POST && !empty($_POST)) {
    $consultaquery = trim($_POST['consulta']);
    $conex 		   = trim($_POST['conex']);
    $usuario 	   = trim($_POST['usuario']);
    $pass          = trim($_POST['pass']);
    $host          = trim($_POST['host']);
	
	$aRemplazar    = $consultaquery;
	$remplazado    = $aRemplazar; /*str_replace(array("INSER","UPDAT","TRUNCAT","USUARI"),
	array("<div style='color: red;font-weight: bold;'>No es pertido realizar INSERTS</div>",
	 	   "<div style='color: red;font-weight: bold;'>No es permitido realizar UPDATES</div>",
		   "<div style='color: red;font-weight: bold;'>No es permitido realizar DROPS</div>",
		   "<div style='color: red;font-weight: bold;'>No es permitido realizar TRUNCATE</div>",
 		   "<div style='color: red;font-weight: bold;'>No es permitido realizar consulta sobre USUARIOS</div>"
		   ), 
		   $aRemplazar);*/	
		   ?>
<div class='wrapper'>
<div class='panel-body'> 		   
<?php		   
    echo "Query: "; echo "<div class='combopaginado'>";  echo $remplazado; echo "</div><br>"; 
	echo "Conexion: "; echo "<div class='combopaginado luzRojo'>";  echo $conex; echo "</div><br>"; 
  if(empty($consultaquery)){
    echo "Query: "; echo "<div class='error2'>";  echo "Consulta vacia"; echo "</div><br>"; 
  }
   }else {
    $consultaquery = "";
  }

  require ("class/TraerDatos.php");
  $datos_bus = new TraerDatos();

/*-------------------------------------------------------------------//
               CLASES PARA TRAER DATOS DE LA TABLA_INFO
//-------------------------------------------------------------------*/
     $datosEncontrados = array();
     $datosEncontrados = $datos_bus->buscarInformacion($conex,$remplazado,$usuario,$pass,$host);
?>

<div class='wrapperrmodif tipoframe'>
    <div class='panel-body'> 
    	
    <?php	
  	if(!empty($datosEncontrados[0]['code'])){ ?>

	<table border="1"  frame=""  class="table  table-bordered font">

	<thead>
	<div class="combopaginado error">No se ha encontrado ningun resultado</div>
	<div class="alert-error">
		
	    <?php foreach ($datosEncontrados as $valor) {  ?>
		    	<tr class="alert-success wrapper">
		    	<?php foreach ($valor as $key => $value) { ?> 
		    		<th class="alert-error botoncuadro"> <?php echo $key ?> </th> <p>
	
				<?php } ?>
		</tr>
		
		
		  <tr class="alert-success wrapper">
		  	  <br>
		    	<?php foreach ($valor as $key => $value) { ?> 
		    		<th class=" alert-error font"> <?php echo $value ?> </th> <p>
	
				<?php } ?>
		</tr>	
		  
		  <?php } ?>
 		</div>
	</thead>
		</table>
		  <!--
		    <?php foreach ($datosEncontrados as $valor) { 
		    	
		    	foreach ($valor as $key => $value) { ?> 
		    		<div class="alert alert-error"> <?php echo $key ?>       : <?php echo $value.'<br>' ?></div>
					 echo "<th>" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</th>\n"; ?>
				<?php } ?>
		      
		  </br>
		  <?php } ?>
		   -->
				<?php //echo "No se ha encontrado ningun RESULTADOS";
				//  print_r($datosEncontrados); ?>
		
	    	
<?php
	
}	
else
{ ?>  	
    	
    <table border="0"  frame=""  class=" responsiveWidth table table-hover table-striped table-bordered font">

	<thead>
	<tr class="columnaindicadores colorfondo3 combopaginado2">
	<?php
	$cont = 0;
	while ($fila = oci_fetch_array($datosEncontrados, OCI_ASSOC+OCI_RETURN_NULLS)) { ?>	
	
	  <?php
	  
	   foreach ($fila as $elemento => $valor) {
	
	        if($cont < 1){
	          echo "<th>" . ($elemento !== null ? htmlentities($elemento, ENT_QUOTES) : "") . "</th>\n"; ?>
		      <?php }} ?>
 	</tr>
	</thead>
	
	 <tbody>
	 	<tr>
		<?php
	    foreach ($fila as $elemento => $valor) {
	    	
	        echo "    <td class='brillar'>" . ($valor !== null ? htmlentities($valor, ENT_QUOTES) : "") . "</td>\n";
	    }
	    echo "</tr>\n";
		$cont = $cont +1; 
		
	}
	echo '<div class="columnaindicadores ">';
	echo 'Total columnas : '.'<b class="combopaginado3">'.ocinumcols($datosEncontrados).'</b>';
	echo '   Total filas : '.'<b class="combopaginado3">'.$cont.'</b>';
	echo '</div>'
	?>
	
    </tr>		
	</tbody>
	</table>	
</div>
</div>
</div>
</div>
<?php } ?>
