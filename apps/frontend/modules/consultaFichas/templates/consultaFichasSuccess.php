<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {
        $('#spinner').show();
        $.get("<?php echo url_for('consultaFichas/consultaTablaFichas') ?> ", 
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

 cargarFicha = function(ficha_id) {
        $('#spinner').show();
        $.get("<?php echo url_for('consultaFichas/detalleFicha') ?> ", 
        {
        id_ficha: ficha_id
        },
            function(data){
                $('#detalleFicha').html(data);
               // startTableOnlySorter();
                $('#spinner').hide();
            });
    }
 </script>

<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta('Consulta Fichas');
	$cabecera->titulo(__('Consulta de Fichas'));

    $cabecera->boton('filtrar') ;
    $cabecera->accion('<input type="button" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />');


    $cabecera->ini_filtro(__("Catalogo"));
    $optionsSelect = $dd_cata;?>

    <select id= "id_ficha" name="ficha" class="form-control" onchange="cargarGrilla()">
    <?php foreach ($optionsSelect as $arraySelect) { ?>
        <option value="<?php echo $arraySelect['cata_id'];?>" >
            <?php echo $arraySelect['cata_deno']; ?>
        </option>
        
    <?php } ?>
    </select>
    <?php $cabecera->fin_filtro(__("Catalogo")); ?>
       
    <?php $cabecera->ini_filtro(__("o complete denominacion de ficha"));?>
    <input type="text" id="id_nombre" name="nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("o complete denominacion de ficha")); 

    //$cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
     
	echo $cabecera;

?>

<div class="row"> <!-- row de datos cabecera -->
  <div class="col-xs-2 col-md-2">
        <div id="tablaFichas" class="responsiveWidth"></div>
  </div>
  <div class="col-xs-10 col-md-10">
        <div id="derecha" class="wrapper tipoframe" style="background:#D3FFCE; padding-left:15px;">
            <div class="panel-body">
                <div id="detalleFicha" class="responsiveWidth"></div>
            </div>
        </div>
</div> <!-- cierre del row de datos cabecera -->

