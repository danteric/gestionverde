<script>
 $(document).ready(function() {
    $("body").delegate("#botonFiltrar", "click", function() {
        $('#spinner').show();
        $('#pagina').val(1);
          $.get("<?php echo url_for('usuarios/tablaIncidentes') ?>", { fecha: $('#fecha').val(),
                                                                  error_test: $('#error_test').val(),
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
      $.get("<?php echo url_for('usuarios/tablaIncidentes') ?>", { fecha: $('#fecha').val(),
                                                                  error_test: $('#error_test').val(),
                                                                  pagina: $('#pagina').val()},
            function(data){
                $('#tablaInciden').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
  }

 seguimientoActivar = function(si_no) {
      $('#spinner').show();

		$.get("<?php echo url_for('usuarios/seguimientoActivar') ?>", 
			{ si_no: si_no },
            function(data){
                $('#spinner').hide();
                location.href = '/'; 
                return false;
            });

  }

         
</script>

<div class="panel-body">
	<form role="form" class="row" name="filtroLogs" id="filtroLogs" method="POST" action="<?php echo url_for("usuarios/logs") ?>">
            
		<?php $cabecera = new Cabecera(); ?>
		<?php $cabecera->titulo('Incidentes BD') ?>
		<?php $cabecera->ruta('Seguridad') ?>
		<?php $cabecera->ruta('Incidentes BD') ?>
		<?php $cabecera->boton('filtrar') ?>
		<?php $cabecera->accion('<input type="button" id="botonFiltrar" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />') ?>
		<?php //$cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>');?>
 		<?php if($log_inciden == 'NO') {
				$cabecera->accion('<input type="button" id="aceptar" value="Activar Seguimiento" class="btn btn-success" onclick="seguimientoActivar(\'SI\')"; />');
 			  } else {
				$cabecera->accion('<input type="button" id="aceptar" value="Desctivar Seguimiento" class="btn btn-danger" onclick="seguimientoActivar(\'NO\');" />');
        	  } ?>

		<?php $cabecera->ini_filtro(__("Fecha desde")); ?>
			<input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-j',strtotime('-1 day',strtotime(date('Y-m-j'))))?>" class="form-control" />
		<?php $cabecera->fin_filtro(__("Fecha desde")); ?>
		
		<?php $cabecera->ini_filtro(__("Ver")); ?>
			<select id="error_test" name="error_test" class="form-control">
				<option value="E" <?php if($log_inciden == 'NO') { echo "selected";} ?> >Errores de Base</option>
				<option value="T" <?php if($log_inciden == 'SI') { echo "selected";} ?> >Seguimiento de Ejecución</option>
			</select>
		<?php $cabecera->fin_filtro(__("Ver")); ?>
	
		<?php echo $cabecera ?>
		
		<input type="hidden" id="pagina" name="pagina" class="" value="1"/>
	</form>
	
	<div id="tablaInciden" class="responsiveWidth" /></div>
</div>

<!-- ayuda -->
<?//php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->