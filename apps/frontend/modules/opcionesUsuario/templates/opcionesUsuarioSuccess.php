<form id="datosOpcionesUsuarioForm" class="formularioValidado datosOpcionesUsuarioForm" name="datosOpcionesUsuarioForm" method="POST" action="<?php echo url_for("opcionesUsuario/opcionesUsuarioGuardar") ?>">

	<?php $cabecera = new Cabecera()
	$cabecera->ruta('Catalogos')->ruta(link_to(__("Opciones de usuario"), 'opcionesUsuario/opcionesUsuario'));
	if($_SESSION["usuario"]["modi"] == "S") {
		$cabecera->accion('<input type="submit" value="Grabar" class="btn btn-success" />');
        $cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>');
    };
	echo $cabecera;
	?>
	<div class="wrapper">
	<div class="panel-body">
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)); ?>
	
	<table class="tableform table">
		<tr>
			<td><?php echo __("Filas por página: ")?> </td>
			<td >
				<input type="text" id="filasPorPagina" name="filasPorPagina" class="required" value="<?php echo $filasPorPagina ?>" />
			</td>
		</tr>
	</table>
	</div>
	</div>
</form>
<!-- ayuda --> 
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->