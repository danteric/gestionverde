<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('abmProyecto/tablaProyecto') ?> ", 
      {
       id_nombre: $('#id_nombre').val(),
       id_fecha: $('#id_fecha').val(),
       id_estado: $('#id_estado').val()
       },
            function(data){
                $('#tablaProyecto').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
         
      }

 </script>

<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta("Administración de Proyectos");
	$cabecera->titulo(__('Administración de Proyectos'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<button class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>');

    $cabecera->ini_filtro(__("Nombre de Proyecto:"));?>
    <input type="text" id="id_nombre" name="id_nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("Nombre de Proyecto:")); 

    $cabecera->ini_filtro(__("Fecha inicio desde:"));?>
    <input type="date" id="id_fecha" name="id_fecha" class="form-control pull-right"  />
    <?php $cabecera->fin_filtro(__("Fecha inicio desde:"));

    $cabecera->ini_filtro(__("Estado:"));?>
    <select id="id_estado" class="form-control">
        <option value="T" selected>(Todos)</option>
        <option value="A">Abiertos</option>
        <option value="C">Cerrados</option>
    </select>
    <?php $cabecera->fin_filtro(__("Estado:"));

        

    
    $cabecera->accion(sprintf('<a href="%s" button type="button" class="btn btn-success"> <i class="icon-plus"></i> Nuevo Proyecto</a>', url_for("ABM-Proyecto/formularioProyecto")));

    echo $cabecera;

?>

        <div id="tablaProyecto" class="responsiveWidth"></div>



  

<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php //require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
