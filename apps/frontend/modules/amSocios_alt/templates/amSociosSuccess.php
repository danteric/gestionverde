<script>
	cargarGrilla = function() {
		$('#spinner').show();
		$.get("<?php echo url_for('amSocios/tablaAmSocios') ?>", 
      {
       soci_codi: $('#soci_codi').val(),
       apelli: 	  $('#apelli').val(), 
       nombre:    $('#nombre').val()
       },
            function(data){
                $('#tablaAmSocios').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });
	}
 </script>
 
<?php 
    $args[] = $_SESSION["usuario"]["username"];
    $args[] = $_SESSION["usuario"]["empresa"];
    $args[] = ["\$('#tipo').val()"];
    $args[] = ["(function(){args=\$('#doc_faltante').val().split('%');return args[0];})()"];
    $args[] = ["(function(){args=\$('#doc_faltante').val().split('%');return args[1];})()"];
    $args[] = ["\$('#zona').val()"];
    $args[] = ["\$('#fecha').val()"];
    $args[] = ["\$('#cliente').val()"];
    $args[] = ["\$('#clase').val()"];    
	$args[] = ["\$('#tipo_pers').val()"]; 
	$args[] = ["\$('#incluir_inactivos').val()"];
    $args[] = ["(function(){if(\$('#impresion_hojas').val() == 0){return 0;}else{return \$('#pagina').val();}})()"];
  ?>
</div>

  <div class="formulario">
    <form name="filtrosinDocumentacion" method="POST" action="<?php echo url_for("sinDocumentacion/sinDocumentacion") ?>">
	
		<?php $cabecera = new Cabecera(); ?>
		<?php $cabecera->titulo('Administración de Socios') ?>
		<?php $cabecera->ruta('Socios') ?>
		<?php $cabecera->ruta('Alta-Modif Socios') ?>
		<?php $cabecera->accion(sprintf('<a href="%s"><i class="icon-plus text-info"></i> Nuevo Socio</a>', url_for("amSocios/formularioAmSocios")));  ?>
		<?php $cabecera->boton('filtrar') ?>
		<?php $cabecera->accion('<input type="button" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />') ?>
		<?php $cabecera->accion(Reportes::render('SEL_SOCIOS_AM_RS', $args)) ?>
        <?php $cabecera->accion(sprintf('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>'));?>


		<?php $cabecera->ini_filtro(__("Nro de Socio <i class=\"icon-user\"></i>")); ?>
		<input type="text" id="soci_codi" name="soci_codi" class="input-small" />
		<?php $cabecera->fin_filtro(__("Nro de Socio <i class=\"icon-user\"></i>")); ?>
		
		<?php $cabecera->ini_filtro(__("o complete Apellido que contenga <i class=\"icon-user\"></i>")); ?>
		<input type="text" id="apelli" name="apelli" class="input-large" />
		<?php $cabecera->fin_filtro(__("o complete Apellido que contenga <i class=\"icon-user\"></i>")); ?>
		
		<?php $cabecera->ini_filtro(__("o complete Nombre <i class=\"icon-user\"></i>")); ?>
		<input type="text" id="nombre" name="nombre" class="input-large" />
		<?php $cabecera->fin_filtro(__("o complete Nombre <i class=\"icon-user\"></i>")); ?>
<!--<?php  url_for("amSocios/formularioAmSocios"); ?> -->
		<?php echo $cabecera ?>
		
		<input type="hidden" id="pagina" name="pagina" class="" value="1"/>
		
	</form>
	
	<div id="tablaAmSocios" class="responsiveWidth">
	</div>

</div>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->