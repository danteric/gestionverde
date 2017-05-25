

<div class="panel-body">
<script>
    cargarGrilla = function(respuesta,total) {

    $('#spinner').show();
    $.post("<?php echo url_for('modificaPersonales/traeModificaPersonales') ?>",
    { 
     pagina: $('#pagina').val()
     }, 
        function(data){
            $('#cargargrillaRama').html(data);
            $('#spinner').hide();
        });
    }
   
    function cancelar(url) {
     location.href = url;   
     return false;
    }

    $(document).ready(function(){
        cargarGrilla();
    });

</script>
<form id="examenesForm" class="form-horizontal" name="datosPersonalesForm" method="POST" action="<?php echo url_for("modificaPersonales/Grabar") ?>" >
<?php 
	$cabecera = new Cabecera();
	//$cabecera->titulo(__("Confirmacion de datos personales"));
	$cabecera->ruta('Confirmacion de datos personales');
	
      // if($_SESSION["usuario"]["modi"] == "S"):
        $cabecera->accion('<input type="submit" value="Grabar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar(\'/\')" value="Cancelar"  class="btn alert-info"/>');
  // endif;
   ?>    
    <?php echo $cabecera; ?>

	<input type="hidden" id="pagina" name="pagina" class="" value="1"/>
	<!--<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>-->
    <div id="cargargrillaRama"></div>
</div>
</form>

