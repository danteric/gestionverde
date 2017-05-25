<form id="datosOpcionesForm" class="formularioValidado datosOpcionesForm" name="datosOpcionesForm" method="POST" action="<?php echo url_for("usuarios/opcionesGuardar") ?>">

	<?php $cabecera = new Cabecera();
	$cabecera->ruta('Catalogos')->ruta(link_to(__("Opciones"), 'usuarios/opciones'));
	if($_SESSION["usuario"]["modi"] == "S"){
			$cabecera->accion('<input type="submit" value="Grabar" class="btn btn-success" />');
	};
	echo $cabecera;
	?>
	
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)); ?>
	
	<table class="tableform table table-striped" style="width: 400px;">
		<tr>
			<td><?php echo __("Filas por página: ")?> </td>
			<td >
				<input type="text" id="filasPorPagina" name="filasPorPagina" class="required" value="<?php echo $filasPorPagina ?>" />
			</td>
		</tr>
	</table>
</form>
