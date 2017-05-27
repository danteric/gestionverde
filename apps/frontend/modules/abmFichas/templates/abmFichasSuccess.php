<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>
    /*-------------------Funcion para cargar la lista de catalogos--------*/
    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('abmFichas/tablaFichas') ?> ", 
      {
       id_ficha: $('#id_ficha').val(),
       id_nombre: $('#id_nombre').val()
       },
            function(data){
                $('#tablaFichas').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
         
      }

 </script>
  <div style="float:left;">> 
<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta('ABMFichas');
	$cabecera->titulo(__('Administración de Fichas'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<input type="button" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />');


    $cabecera->ini_filtro(__("Catalogo"));
    $optionsSelect = $dd_cata;?>

    <select id= "id_ficha" name="ficha" class="form-control" onchange="cargarGrilla()">
    <?php foreach ($optionsSelect as $arraySelect) { ?>
        <option value="<?php echo $arraySelect['cata_id'];?>"><?php echo $arraySelect['cata_deno']; ?>
        </option> 
    <?php } ?>
    <?php $cabecera->fin_filtro(__("Catalogo")); ?>

         
    <?php $cabecera->ini_filtro(__("o complete denominacion de ficha<i class=\"icon-user\"></i>"));?>
    <input type="text" id="id_nombre" name="nombre"  class="form-control" />
    <?php $cabecera->fin_filtro(__("o complete denominacion de ficha<i class=\"icon-user\"></i>")); 

    $cabecera->accion(sprintf('<a href="%s"><i class="icon-plus text-info"></i> Nueva Ficha</a>', url_for("abmFichas/formularioFichas"))); 

   
       

	echo $cabecera;

?>
</div>


    <div id="tablaFichas" class="responsiveWidth">
    </div>

<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
