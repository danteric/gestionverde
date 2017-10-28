<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {

   
        $('#spinner').show();

        $.get("<?php echo url_for('abmFichas/tablaFichas') ?> ", 
      {
       cata_id: $('#cata_id').val(),
       id_nombre: $('#id_nombre').val()
       },
            function(data){
                $('#tablaFichas').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
         
      }


 </script>

<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta('ABMFichas');
	$cabecera->titulo(__('Administración de Fichas'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<button class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();"><i class="glyphicon glyphicon-filter"></i> Filtrar</button>');


    $cabecera->ini_filtro(__("Catalogo"));
    $optionsSelect = $dd_cata;?>

    <select id= "cata_id" name="ficha" class="form-control" onchange="cargarGrilla()">
    <?php foreach ($optionsSelect as $arraySelect) { ?>
        <option value="<?php echo $arraySelect['cata_id'];?>" >
            <?php echo $arraySelect['cata_deno']; ?>
        </option>
        
    <?php } ?>
    </select>

    <?php $cabecera->fin_filtro(__("Catalogo")); ?>

    
    <?php $cabecera->ini_filtro(__("o complete denom. de ficha"));?>
    <input type="text" id="id_nombre" name="nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("o complete denom. de ficha")); 

    
    $cabecera->accion(sprintf('<a href="%s" button type="button" class="btn btn-success"> <i class="icon-plus"></i> Nueva Ficha</a>', url_for("abmFichas/formularioFichas")));

    


	echo $cabecera;

?>

        <div id="tablaFichas" class="responsiveWidth"></div>



  

<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php //require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
