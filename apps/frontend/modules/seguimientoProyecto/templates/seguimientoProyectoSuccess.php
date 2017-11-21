<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('seguimientoProyecto/tablaSeguimientoProyecto') ?> ", 
      {
       id_nombre: $('#id_nombre').val(),
       proy_fase_actual: $('#id_fase_actual').val(),
       id_fecha: $('#id_fecha').val(),
       id_estado: $('#id_estado').val()
       },
            function(data){
                $('#tablaSeguimientoProyecto').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
         
      }

 </script>



<!-- ..............................Datos de cabecera....................................... -->
<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta("Seguimiento de Proyectos");
	$cabecera->titulo(__('Seguimiento de Proyectos'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<button class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>');

    $cabecera->ini_filtro(__("Nombre de Proyecto:"));?>
    <input type="text" id="id_nombre" name="id_nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("Nombre de Proyecto:")); 

    
    $cabecera->ini_filtro(__("Fase de Proyecto: "));?>
    <select id="id_fase_actual" name="id_fase_actual" class="form-control">
    <?php foreach ($dd_fase as $arraySelect) { ?>
        <option value="<?php echo $arraySelect['fase_id'];?>" >
            <?php echo $arraySelect['fase_deno']; ?>
        </option>
      
    <?php } ?>
     </select> 
    <?php $cabecera->fin_filtro(__("Fase de Proyecto: ")); ?>


    <?php
    $cabecera->ini_filtro(__("Fecha inicio desde:"));?>
    <input type="date" id="id_fecha" name="id_fecha" class="form-control pull-right"  />
    <?php $cabecera->fin_filtro(__("Fecha inicio desde:"));

    echo $cabecera;

?>
        
        <div id="tablaSeguimientoProyecto" class="responsiveWidth"></div>



