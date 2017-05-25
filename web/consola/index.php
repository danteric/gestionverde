<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Inciar consulta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->

    <script src='js/jquery-1.8.3.js'></script>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/estilovarios.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" />      
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	
  
  </head>
<script type="text/javascript">
$(document).ready(function() {
  $('.achicar').click(function(){ 
  $("#content").hide(1000);

   });
   $('.agrandar').click(function(){ 
  $("#content").show(1000);

   });
 
   $('.refresh').click(function(){   
             location.reload();
   });
 $("#conex").live("click", function(){
 			switch ($(this).val()) {
		case 'LOCAL':
			$("#pinto_2").addClass('trcolor');
			break;
		case 'HOMO':
			$("#pinto_3").addClass('trcolor');
			break;
		case 'PROD':
			$("#pinto_1").addClass('trcolor');
			break;
		case 'DESA':
			$("#pinto_0").addClass('trcolor');
			break;
		case 'OTRO':
			$("#pinto_4").addClass('trcolor');
			break;
	}
 		
 		
		var valordato3=$(this).attr("value");
		$("#conexelegida").val(valordato3);
           if(valordato3 == 'OTRO'){
        		$(".activo").show();
      			}else{
        		$(".activo").hide();
      			}
});

 $('#resumenStatus').click(function(){ 
      $("#fotocargando").show();
      valordato=$("#queryconsulta").val();
      valordato2=$("#conexelegida").val();
      valordatousu=$("#usuario").val();
      valordatopass=$("#pass").val();
      valordatohost=$("#host").val();
      if(valordato2 == ''){
		   	alert('No has seleccionado ningun tipo de conexion');
		   }else{
      $.ajax({
      type: "POST",
      url: "mostrarResultado.php",
      data:{consulta:valordato,conex:valordato2,usuario:valordatousu,pass:valordatopass,host:valordatohost},
      success: function(a) {
      console.log(valordato2);
                $('#verResumen').html(a);
                $("#fotocargando").hide();
                $("#content").hide(1000);
                
          }
       });
      }
      });
   
    // borrado automatico
 /*   $(".borrardatos").fadeOut(1000, function(){
   	 var r=confirm("Estas seguro que desea vaciar todo el contenido ?")
	  if (r==false) {
		return true;
	  }
      $.ajax({
      type: "POST",
      url: "borrarArchivo.php",
      data :{ borrar:'si'},
      success: function(a) {
                $('.muestroaqui').html(a);                
          }
       });
   });
*/
   
   $("#divLogs").hide(1000);
   });
   
//borado manual
borrarDatos = function(){
	  var r=confirm("Estas seguro que desea vaciar todo el contenido ?")
	  if (r==false) {
		return true;
	  }
      $.ajax({
      type: "POST",
      url: "borrarArchivo.php",
      data :{ borrar:'si'},
      success: function(a) {
                $('.muestroaqui').html(a);                
          }
       });
}

</script>
<div class='panel-body'>

	<?php
		if (isset($_GET['reiniciar'])) {
		echo exec ('"C:\\Program Files\\Apache Software Foundation\\Apache2.2\\bin\\httpd.exe" -k restart');
		}
		
	   $Rows = array(
					array('OP_1' => "select * from USER_TABLES WHERE TABLESPACE_NAME = 'SMOGP'"),
					array('OP_2' => "SELECT * FROM ALL_OBJECTS WHERE OBJECT_TYPE IN ('FUNCTION','PROCEDURE','PACKAGE') and OWNER = 'SMOGAR'"),
					array('OP_3' => "SELECT * FROM user_tab_columns WHERE table_name='xxxxxxxxx'"),
					array('OP_4' => "SELECT * from product_component_version")
				   
				   );
	
	   $aDevices =  array(
				    array('code'=>'DESA','name'=>'Desarrollo'),
				    array('code'=>'PROD','name'=>'Produccion'),
				    array('code'=>'LOCAL','name'=>'Localhost'),
				    array('code'=>'HOMO','name'=>'Homo'),
				    array('code'=>'CO','name'=>'Colombia'),
				    array('code'=>'PY','name'=>'Paraguay'),
				    array('code'=>'UY','name'=>'Uruguay'),
				    array('code'=>'PE','name'=>'Peru'),
				    array('code'=>'TERADATA','name'=>'Teradata'),
				    array('code'=>'OTRO','name'=>'Otro'),
				   );			   
				   ?>

<div class="button4 alert-info font"> Escriba el query para ejecutar la consulta</div>
<a title="Minimizar"  class="combopaginado4  pointer brillar achicar"><i class="icon-arrow-up "></i></a>
<a title="Maximizar"  class="combopaginado4  pointer brillar agrandar"><i class="icon-arrow-down text-info"></i></a>
<a title="Abrir log" class="combopaginado4 pointer brillar" data-target="#TANGA" data-toggle="modal" href="#" ><i class="icon-file text-success"></i></a>
<?php if(isset($_GET['explorar'])): ?>
<a title="Explorar directorios" class="combopaginado4 pointer brillar"   href="exp.php?ac=exp" ><i class="icon-eject text-success"></i></a>
<a title="Subir Zip" class="combopaginado4 pointer brillar"   href="su.php?ac=sub" ><i class="icon-file text-success"></i></a>

<?php endif; ?>

<br>  
<br>       
<?php  require 'tabs.php'; ?>


<!--ESTADISTICAS-->


	<div id="TANGA" class="modal hide fade in" style="display: none; width: 620px">
		<div class="modal-header">
			<h4>LOGS</h4>
		</div>

		<div class="modal-body">
			<!-- AQUI SE CARGA LO QUE SE QUIERE MOSTRAR-->
				

<a class="combopaginado4 brillar pointer refresh" title="Refrescar"><i class="icon-refresh text-info "></i></a>
<div class="combopaginado4 brillar pointer" title="Borrar datos" onclick="borrarDatos()"><i class="icon-remove text-info "> </i> Borrar contenido</div>
<div class="combomedio3 text-center"> Logs de parametros</div>
<?php
$origen = '../smog-logsApp/logsParametrosApp.txt';
$peso_archivo = filesize($origen); // obtenemos su peso en bytes
$pesoTotal = tamano_archivo($peso_archivo);  // mostramos su peso ya modificado
echo '<div class="combomedio3 colorfondo" title="EL ARCHIVO SE VACIARA AL LLEGAR A LOS 200 KB ">Peso total: '.$pesoTotal.'</div>';
?>
<div class='tipoframe6 muestroaqui' style="font-size: 11px"> 
<?php





// abro el archivo para mostrar en el navegador
$archivo = fopen("$origen", "r") or die("Hubo un problema en tratar de abrir el archivo");
while (!feof($archivo)) {
	$traer = fgets($archivo);
	$saltarlinea = nl2br($traer);
	echo $saltarlinea;
}
?>
</div>

		</div>
		<!-- PIE FOOTER-->
		<div class="modal-footer">
			<ul>
				<li style="list-style:none;">
					<div title="Cerrar"  data-dismiss="modal" class="combopaginado4 brillar cerrarLogs  pointer"><i class="icon-off text-success " ></i>Cerrar</div>
				</li>
			</ul>
		</div>
	</div>



<div id="explorador" class="modal hide fade in" style="display: none; width: 620px">
		<div class="modal-header">
			<h4>LOGS</h4>
		</div>

		<div class="modal-body">
		<div class='tipoframe6 muestroaqui' style="font-size: 11px"> 
		<?php include 'dir.php' ?>
		</div>

		</div>
		<!-- PIE FOOTER-->
		<div class="modal-footer">
			<ul>
				<li style="list-style:none;">
					<div title="Cerrar"  data-dismiss="modal" class="combopaginado4 brillar cerrarLogs  pointer"><i class="icon-off text-success " ></i>Cerrar</div>
				</li>
			</ul>
		</div>
	</div>



<!--FIN ESTADISTICAS-->
<br>
<div id="verResumen"></div>