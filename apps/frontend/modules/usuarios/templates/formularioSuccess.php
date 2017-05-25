<form id="datosUsuarioForm" class="formularioValidado datosUsuarioForm" name="datosUsuarioForm" method="POST" action="<?php echo url_for("usuarios/formulario") ?>">
    <?php $cabecera = new Cabecera();
    $cabecera->ruta(link_to(__("Usuarios"), 'usuarios/lista'));
	if($_SESSION["usuario"]["modi"] == "S"):
                $cabecera->accion('<input type="submit" value="Grabar" class="btn btn-primary" />');
	endif;
        
	if(empty($nombre)):
		$cabecera->titulo(__("Nuevo usuario"))->ruta(__("Nuevo usuario"));
                //$cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>');
	else:
		$cabecera->titulo(__("Editando usuario #".$nombre))->ruta(__("Editando usuario #".$nombre));
	endif;
	echo $cabecera;
    ?>
    
    <!--<input type="hidden" id="urlValidar" name="urlValidar" value="<?php echo url_for("usuarios/validaFormUsuario") ?>" /> -->
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $usuario ?>" />
    <input type="hidden" id="alta" name="alta" value="<?php echo $alta ?>" />
    <input type="hidden" id="id" name="id" class="" value="<?php echo $id; ?>" />
    <?php if(!empty($cursor['usua_nombre'])){ ?>
    <input type="hidden" id="edicion" name="edicion" value="1" />
    <?php } ?>
    <div class="form">
		<div>
			<table class="tableform table table-striped">
				<tr class="">
					<td><?php echo "Usuario"; ?>:</td>
                    <td><input name="usuario" id="usuario" type="text" class="form-control"
                    value="<?php echo (!empty($cursor['usua_nombre']))?$cursor['usua_nombre']:''; ?>" />
					</td>
				</tr>
                <tr>
                    <td><?php echo "Nota"; ?>:</td>
                    <td><input name="nota" maxlength="50" id="nota" type="text" class="form-control"
                    value="<?php echo (!empty($cursor['usua_nota']))? $cursor['usua_nota']:''; ?>" />
                    </td>
                </tr>
				<tr class="">
					<td><?php echo "Roles" ?>:</td>
					<td>
                    <?php $rolesasignados = $sf_data->getRaw('rolesasignados'); ?>
                    <select id="roles" name="roles[]" multiple="multiple" class="form-control" >
                        <?php foreach ($roles as $rol){ ?>
                                <?php if(in_array($rol["usro_rol"], $rolesasignados)){ ?>
                                        <option value="<?php echo $rol["usro_rol"]; ?>" selected><?php echo $rol["usro_rol"] ?></option>
                                <?php }else{ ?>
                                        <option value="<?php echo $rol["usro_rol"]; ?>" ><?php echo $rol["usro_rol"] ?></option>
                                <?php } ?>
                        <?php } ?>
                    </select>
                    (mantener ctrl para seleccions multiples)
					</td>
				</tr>
                                
               
			</table>
        </div>
    </div>
</form>
<!-- ayuda -->
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->