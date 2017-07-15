<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>

<script>

    cargarGrilla = function() {
        $('#spinner').show();
        $.get("<?php echo url_for('consultaFichas/consultaTablaFichas') ?> ", 
        {
        cata_id: $('#cata_id').val(),
        opci_id: $('#opci_id').val(),
        medi_id: $('#medi_id').val(),
        tipo_id: $('#tipo_id').val(),
        tama_id: $('#tama_id').val(),
        fase_id: $('#fase_id').val(),
        text_desc: $('#text_desc').val()
        

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

    //---------Filtro catálogo--------------------
    $cabecera->ini_filtro(__("Catalogo"));
    $optionsSelect = $dd_cata;?>
    
    
        <select id= "cata_id" name="ficha" class="form-control">
        <?php foreach ($optionsSelect as $arraySelect) { ?>
            <option value="<?php echo $arraySelect['cata_id'];?>" >
                <?php echo $arraySelect['cata_deno']; ?>
            </option>
            
        <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Catalogo")); ?>
    

     <!---Filtro Fases-->
    <?php
    $cabecera->ini_filtro(__("Fase"));
    $optionsSelectFase = $dd_fase;?>

        <select id= "fase_id" name="fases" class="form-control" >
            <?php foreach ($optionsSelectFase as $arraySelect) { ?>
                <option value="<?php echo $arraySelect['fase_id'];?>" >
                    <?php echo $arraySelect['fase_deno']; ?>
                </option>
                
            <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Fase")); ?>


    <!---Filtro Medios-->
    <?php
    $cabecera->ini_filtro(__("Medio"));
    $optionsSelectMedi = $dd_medi;?>
    
        <select id= "medi_id" name="medios" class="form-control" >
            <?php foreach ($optionsSelectMedi as $arraySelect) { ?>
                <option value="<?php echo $arraySelect['medi_id'];?>" >
                    <?php echo $arraySelect['medi_deno']; ?>
                </option>
                
            <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Medio")); ?>


    <!---Filtro Tamanios-->
    <?php
    $cabecera->ini_filtro(__("Tamaño"));
    $optionsSelectTama = $dd_tama;?>

        <select id= "tama_id" name="tamanios" class="form-control" >
            <?php foreach ($optionsSelectTama as $arraySelect) { ?>
                <option value="<?php echo $arraySelect['tama_id'];?>" >
                    <?php echo $arraySelect['tama_deno']; ?>
                </option>
                
            <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Tamaño")); ?>


    <!---Filtro Tipologia-->
    <?php
    $cabecera->ini_filtro(__("Tipología"));
    $optionsSelectTipo = $dd_tipo;?>

        <select id= "tipo_id" name="Tipologia" class="form-control" >
            <?php foreach ($optionsSelectTipo as $arraySelect) { ?>
                <option value="<?php echo $arraySelect['tipo_id'];?>" >
                    <?php echo $arraySelect['tipo_deno']; ?>
                </option>
                
            <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Tipología")); ?>

    
     <!---Filtro nombre-->
    <?php
    $cabecera->ini_filtro(__("Buscar en"));
    $optionsSelectOpc = $dd_opciones;?>

        <select id= "opci_id" name="opciones" class="form-control" >
            <?php foreach ($optionsSelectOpc as $arraySelect) { ?>
                <option value="<?php echo $arraySelect['tabla'];?>" >
                    <?php echo $arraySelect['deno']; ?>
                </option>
                
            <?php } ?>
        </select>
    <?php $cabecera->fin_filtro(__("Buscar en")); ?>


    <?php $cabecera->ini_filtro(__("texto a busc."));?>
    <input type="text" id="text_desc" name="nombre" class="form-control pull-right" />
    <?php $cabecera->fin_filtro(__("texto a busc.")); 
    
	echo $cabecera;

?>

<div class="row"> <!-- row de datos cabecera -->
  <div class="col-xs-3 col-md-3">
        <div id="tablaFichas" class="responsiveWidth"></div>
  </div>
  <div class="col-xs-9 col-md-9">
        <div id="derecha" class="wrapper tipoframe" style="; padding-left:15px;">
            <div class="panel-body">
                <div id="detalleFicha" class="responsiveWidth"></div>
            </div>
        </div>
</div> <!-- cierre del row de datos cabecera -->

