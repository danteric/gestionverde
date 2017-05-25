
<script type="text/javascript" src="/js/configvarios.js"></script>
<div class="panel-body">
<script>

    cargarGrilla = function(respuesta,total) {
        $('#spinner').show();
        $.post("<?php echo url_for('cronoActividades/traeCronoActividades') ?>",
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
<?php 
	$cabecera = new Cabecera();
	$cabecera->ruta('Cronograma de actividades'); ?>
	
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
    </div>
    <br>

<!--	<input type="hidden" id="pagina" name="pagina" class="" value="1"/> -->
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    
    <div id="cargargrillacons"></div>
    </div>


<!--
<div id="mostrarFormulario2" class="modal redondo fade in " style="display: none; width: 950px; margin-left: -500px;">
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <ul>
            <li style="list-style:none;">
                <a href="#" data-dismiss="modal"><img src="/img/cross.png" class="zoom reFrescar"  width="40px"></a>
            </li>

        </ul>
    </div>
</div>
-->

   