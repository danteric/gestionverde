<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('seguimientoProyecto/tablaSeguimientoProyecto') ?> ", 
      {
       id_nombre: $('#id_nombre').val(),
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

<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta("Seguimiento de Proyectos");
	$cabecera->titulo(__('Seguimiento de Proyectos'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<button class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>');

    $cabecera->ini_filtro(__("Nombre de Proyecto:"));?>
    <input type="text" id="id_nombre" name="id_nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("Nombre de Proyecto:")); 

    $cabecera->ini_filtro(__("Fecha inicio desde:"));?>
    <input type="date" id="id_fecha" name="id_fecha" class="form-control pull-right"  />
    <?php $cabecera->fin_filtro(__("Fecha inicio desde:"));

    echo $cabecera;

?>

        <div id="tablaSeguimientoProyecto" class="responsiveWidth"></div>



  

<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php //require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
