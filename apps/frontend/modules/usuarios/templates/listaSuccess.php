<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>
<script>
	resetPassEntidad = function(url) {
		var r=confirm("Se modificará la contraseña al valor del nombre de usuario, está seguro?")
		if (r==true) {
			location.href = url;
		}
		return false;
	}
</script>

<?php
    $cabecera = new Cabecera();
    //$cabecera->titulo(__("Listado de usuarios"));
    //$cabecera->titulo($metadata['_titulo']['lab']);
    $cabecera->ruta('Usuarios');
    #$cabecera->ruta(__('Usuarios'));
    //$cabecera->ruta($metadata['_titulo']['lab']);
    $cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-success help"><i class="icon-question-sign"></i> Ayuda</button>');
    $cabecera->accion(sprintf('<a href="%s"><i class="icon-plus text-info"></i> Nuevo Usuario</a>', url_for("usuarios/formulario")));
    echo $cabecera;
?>
<div class="wrapper tipoframe">
<div class="panel-body">
	<table border="0"  frame="" class="tablesorter responsiveWidth table table-striped table-bordered">
					<thead>
						<tr class="alert-info wrapper">
                            <th ><?php echo "Usuario"; ?></th>
							<th ><?php echo "Nota"; ?></th>
                            <th ><?php echo "Roles"; ?></th>
							<th style="text-align: center" ><?php echo __("Pdf") ?></th>
							<th style="text-align: center" ><?php echo __("Excel") ?></th>
							<th style="text-align: center" ><?php echo __("Modif datos") ?></th>
							<th  class="nosort"><?php echo __("Acciones ")?></th>
						</tr>
					</thead>
					<tbody>
						<?php $c = 0; foreach($cursor as $row) { ?>
							<tr class="<?php if($c%2 == 0){ echo "even";}else{echo "odd";} ?>" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
								<td><?php echo $row['usua_nombre']; ?></td>
                                <td><?php echo $row['usua_nota']; ?></td>
								<td><?php echo $row['lista_roles']; ?></td>
								<td style="text-align: center"><i class="icon <?php if($row['perm_pdf'] == "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                                <td style="text-align: center"><i class="icon <?php if($row['perm_excel']== "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                             	<td style="text-align: center"><i class="icon <?php if($row['perm_modi']== "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                                                        

                                <td>
									<a class = "btn btn-default btn-xs" href="<?php echo url_for("usuarios/formulario?id=".$row['usua_nombre'])?>">
										<i class="icon icon-pencil text-success"></i>
									</a>
									<a class = "btn btn-default btn-xs" onclick="resetPassEntidad('<?php echo url_for("usuarios/lista?a=res&usuario=".$row['usua_nombre']) ?>');" href="#" title="Reiniciar contraseña">
										<i class="icon-key"></i>
									</a>
									<?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
										<a class = "btn btn-default btn-xs" onclick="eliminarEntidad('<?php echo url_for("usuarios/lista?usuario=".$row['usua_nombre']) ?>');" href="#">
											<i class="icon icon-remove text-danger"></i>
										</a>
									<?php } ?>
								</td>
							</tr>
						<?php $c++; } ?>
					</tbody>
		</table>
</div>
</div>
<?php require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->