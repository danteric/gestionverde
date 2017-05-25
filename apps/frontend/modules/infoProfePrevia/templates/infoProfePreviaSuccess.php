<script type="text/javascript" src="/js/configvarios.js"></script>

<div class="panel-body">
<script>

    cargarGrilla = function() {
        $('#spinner').show();
        $.post("<?php echo url_for('infoProfePrevia/traeInfoProfePrevia') ?>",
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

</script>
<form id="infopreviaForm" class="" name="infopreviaForm" method="POST" action="<?php echo url_for("infoProfePrevia/Grabar") ?>" >

<?php 
	$cabecera = new Cabecera();
	$cabecera->ruta('Informacion profesional previa'); ?>
	<?php
    if($_SESSION["usuario"]["modi"] == "S") {
        
        $cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar(\'/\')" value="Cancelar"  class="btn alert-info"/>');

        $cabecera->accion('<a href="'.url_for("infoProfePrevia/formularioInfoAcademPrevia").'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" role="button" ><i class="icon icon-plus text-info"></i>Título</a>') ;
        $cabecera->accion('<a href="'.url_for("infoProfePrevia/formularioInfoProfePrevia").'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" role="button"><i class="icon icon-plus text-info"></i>Matrícula</a>') ;
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

	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    
    <div id="cargargrillacons"></div>
    </div>

</form>


<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


