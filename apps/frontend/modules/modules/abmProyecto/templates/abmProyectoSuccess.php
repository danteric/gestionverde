<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('abmProyecto/tablaProyecto') ?> ", 
      {
       id_nombre: $('#id_nombre').val()
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
	$cabecera->ruta("Adm. de Proyectos");
	$cabecera->titulo(__('Administración de Proyectos'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<input type="button" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />');

    
    $cabecera->ini_filtro(__("Nombre de Proy."));?>
    <input type="text" id="id_nombre" name="id_nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("Nombre de Proy.")); 

    
    $cabecera->accion(sprintf('<a href="%s" button type="button" class="btn btn-success"> <i class="icon-plus"></i> Nuevo Proyecto</a>', url_for("ABM-Proyecto/formularioProyecto")));

    echo $cabecera;

?>

        <div id="tablaProyecto" class="responsiveWidth"></div>



  

<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
