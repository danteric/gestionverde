<script type="text/javascript" src="/js/configvarios.js"></script>

<div class="panel-body">
<script>

    cargarGrilla = function(respuesta,total) {
        $('#spinner').show();
        $.post("<?php echo url_for('cronoExamenes/traeCronoExamenes') ?>",
        { carre: $('#carre').val()}, 
            function(data){
                $('#cargargrillacons').html(data);
                startTableOnlySorter();
                $('#spinner').hide();             
            });
    }
  
    $(document).ready(function(){
        cargarGrilla();
    });

function cancelar(url) {
     location.href = url;   
     return false;
}

</script>
<form id="examenesForm" class="" name="examenesForm" method="POST" action="<?php echo url_for("cronoExamenes/Anotar") ?>" >

<?php 
	$cabecera = new Cabecera();
	$cabecera->ruta('Incripción de examenes'); 
  //$cabecera->titulo('Cronograma de examenes'); 
	
   if($_SESSION["usuario"]["modi"] == "S") {
        $cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar(\'/\')" value="Cancelar"  class="btn alert-info"/>');
   };

?>

    <?php $cabecera->ini_filtro(__("Actividad académica")); ?>
        <?php $optionsSelect = $sf_data->getRaw('dd_cabe'); ?>
         <select id="carre" name="carre" class="form-control" onchange="cargarGrilla()"> 
            <?php foreach ($optionsSelect as $arraySelect) { ?>
                <option   value="<?php echo $arraySelect["ccaa_id_carrera"];?>"><?php echo $arraySelect["ccaa_carrera"] ?></option>
            <?php } ?>
         </select>
    <?php $cabecera->fin_filtro(__("Actividad académica")); ?>
    
    <?php echo $cabecera; ?>

    <div class="row">
      <div class="col-md-4"><b><?php echo ' ',$arraySelect['apenom'],' '; ?></b></div>
      <div class="col-md-4" style="text-align:center;"><span class="label <?php if ($arraySelect['ceac_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo 'Estado académico:'?><b><?php echo $arraySelect['ceac_estadoacademico'];?></b></span></div>
      <div class="col-md-4" style="text-align:center;"><span class="label <?php if ($arraySelect['cead_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo 'Estado administr:'?><b><?php echo $arraySelect['cead_estadoadministrativo'];?></b></span></div>
    </div>
    <br>

	  <?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    
    <div id="cargargrillacons"></div>
    </div>

</form>



   