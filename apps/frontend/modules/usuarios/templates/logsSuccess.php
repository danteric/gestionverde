<script>
 $(document).ready(function() {
    $("body").delegate("#botonFiltrar", "click", function() {
        $('#spinner').show();
        $('#pagina').val(1);
          $.get("<?php echo url_for('usuarios/tablaLog') ?>", { fecha: $('#fecha').val(),
                                                                  usuarios: $('#usuarios').val(),
                                                                  filtro_opciones: $('#filtro_opciones').val(),
                                                                  pagina: $('#pagina').val()},
            function(data){
                $('#tablaInciden').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
    });

});

 cargarGrilla = function() {
      $('#spinner').show();
      $.get("<?php echo url_for('usuarios/tablaLog') ?>", { fecha: $('#fecha').val(),
                                                                  usuarios: $('#usuarios').val(),
                                                                  filtro_opciones: $('#filtro_opciones').val(),
                                                                  pagina: $('#pagina').val()},
            function(data){
                $('#tablaInciden').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
  }

         
</script>

<div class="panel-body">
	<form role="form" class="row" name="filtroLogs" id="filtroLogs" method="POST" action="<?php echo url_for("usuarios/logs") ?>">
            
		<?php $cabecera = new Cabecera(); ?>
		<?php $cabecera->titulo('Log de usuarios') ?>
		<?php $cabecera->ruta('Seguridad') ?>
		<?php $cabecera->ruta('Log de usuarios') ?>
		<?php $cabecera->boton('filtrar') ?>
		<?php $cabecera->accion('<input type="button" id="botonFiltrar" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />') ?>
		<?php $cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>');?>
		<?php $cabecera->ini_filtro(__("Fecha desde")); ?>
			
			<input type="date" id="fecha" name="fecha" value="<?php echo date ('Y-m-j',strtotime('-1 day',strtotime(date('Y-m-j'))))?>" class="form-control" />

		<?php $cabecera->fin_filtro(__("Fecha desde")); ?>
		
		<?php $cabecera->ini_filtro(__("Usuarios")); ?>
			<?php $optionsSelect = $sf_data->getRaw('usuarios'); ?>
			
			<select id="usuarios" name="usuarios" class="form-control">
			<?php foreach ($optionsSelect as $arraySelect) { ?>
				<option  <?php if($usuario == $arraySelect["usua_nombre"]){ echo "selected"; } ?> value="<?php echo $arraySelect["usua_nombre"] ?>"><?php echo $arraySelect["descripcion"] ?></option>
			<?php } ?>
			</select>
			
		<?php $cabecera->fin_filtro(__("Usuarios")); ?>
                
		<?php $cabecera->ini_filtro(__("Opciones")); ?>
			<?php $optionsSelect = $sf_data->getRaw('opciones'); ?>
			<select id="filtro_opciones" name="filtro_opciones" class="form-control">
				<?php foreach($optionsSelect as $arraySelect){ ?>
						<option  <?php if($filtro_opciones == $arraySelect["usal_clave"]){ echo "selected"; } ?> value="<?php echo $arraySelect["usal_clave"] ?>"><?php echo $arraySelect["descripcion"] ?></option>
				<?php } ?>
			</select>
		<?php $cabecera->fin_filtro(__("Opciones")); ?>
	
		<?php echo $cabecera ?>
		
		<input type="hidden" id="pagina" name="pagina" class="" value="1"/>
	</form>
	
	<div id="tablaInciden" class="responsiveWidth" /></div>
</div>

<!-- ayuda -->
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->