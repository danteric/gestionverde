<script>
accesoRol = function(event,item) 
{
	var elem;
	if (event.srcElement){
		elem = event.srcElement;
	}
	else if (event.target){
		elem = event.target;
	}
	else{
		return;
	}
	
	if(elem.checked == true){
		$("#menurol\\["+item+"\\]\\[item_hab\\]").val('S');
	}else{
		$("#menurol\\["+item+"\\]\\[item_hab\\]").val('N');
	}
}
cancelar = function(){
    var defaultPrevented;
    location.href = '<?php echo url_for("roles/roles") ?>';
}
$(document).ready(function () {
	$("#tablaRoles :checkbox").change(function() {
	   accesoRol($(this).attr('class'));
	});
	$('#tablaRoles').checkboxTree();
});
</script>
<form id="datosRolesForm" class="formularioValidado datosRolesForm" name="datosRolesForm" method="POST" action="<?php echo url_for("roles/formularioRoles") ?>">
	<?php $cabecera = new Cabecera();
	$cabecera->ruta('Seguridad')->ruta(link_to(__("Roles"), 'roles/roles'));
        
	if($_SESSION["usuario"]["modi"] == "S"){
		$cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
		$cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
	};
        
	if(empty($nombre)):
            $cabecera->titulo(__("Roles"))->ruta(__("Roles"));
	else:
	    $cabecera->titulo(__("Editando Rol #".$nombre))->ruta(__("Editando Rol #".$nombre));
	endif;
        
	echo $cabecera;
        ?>
	<br/>
	<div class="wrapper">
	<div class="panel-body">
	<h2><?php echo __("Administrar") ?> <span class="paso">  <?php echo __("roles") ?></span></h2>
        
        <input type="hidden" id="alta" name="alta" value="<?php echo $alta ?>" />
	<div class="form">
		<div>
			<table class="tableform table table-striped">
				<tr class="">
					<td><?php echo __("Nombre") ?>:</td>
					<td>
					<input type="text" id="usr_rol_str" name="usr_rol_str" class="form-control" <?php if($alta=='0') echo 'disabled="disabled"' ?> value="<?php echo $usr_rol ?>" />
					<input type="hidden" id="usr_rol" name="usr_rol" class="" value="<?php echo $usr_rol ?>" />
					</td>
				</tr>
				<tr class="">
					<td><?php echo __("Notas") ?>:</td>
					<td>
					<input name="notas" id="notas" type="text" class="form-control" value="<?php echo $notas ?>" />
					</td>
				</tr>
                <tr class="">
					<td><?php echo "Permiso PDF" ?>:</td>
					<td>
                    <select id="pdf" name="pdf" class="form-control">
                        <option value="N"<?php if ($pdf == 'N') {echo ' selected ';} ?> >No</option>
                        <option value="S"<?php if ($pdf == 'S') {echo ' selected ';} ?> >Si</option>
                    </select>
					</td>
				</tr>

                <tr class="">
					<td><?php echo "Permiso Excel" ?>:</td>
					<td>
                    <select id="excel" name="excel" class="form-control">
                      	<option value="N"<?php if ($excel == 'N') {echo ' selected ';} ?> >No</option>
                        <option value="S"<?php if ($excel == 'S') {echo ' selected ';} ?> >Si</option>
                    </select>
					</td>

                <tr class="">
					<td><?php echo "Permiso Modificar" ?>:</td>
					<td>
                    <select id="modif" name="modif" class="form-control">
                        <option value="N"<?php if ($modif == 'N') {echo ' selected ';} ?> >No</option>
                        <option value="S"<?php if ($modif == 'S') {echo ' selected ';} ?> >Si</option>
                    </select>
					</td>
				</tr>
			</table>
			<h2><?php echo __("Permisos") ?>:</h2>
			
			<div id="tablaRoles" style="zoom:80%">
				<ul>
                                    <?php
                                    $nivelesMenu = array();
                                    foreach($roles as $rol){
                                            $nivelesMenu[$rol['nivel1']][] = array($rol['nivel2'],
                                                                                   $rol['item'],
                                                                                   $rol['p_item_nivel'],
                                                                                   $rol['habilitado'],
                                                                                   $rol['orden']);
                                    }
                                    
                                    function buscaChecks($ar){
                                            foreach($ar as $itemK22 => $itemSubMenu2){
                                                    if($itemSubMenu2[3] == 'S'){
                                                            return true;
                                                    }
                                            }
                                            return false;
                                    }
                                    $data = '';
                                    $data_h = '';
                                    $data .= '<ul>';
                                    foreach($nivelesMenu as $itemK => $itemV) {
                                            $data .= '<li>'.$itemK;
                                            $data .= '<input type="checkbox" disabled id="'.$itemV[0][0].'"'.'name="'.$itemV[0][0].'" onclick="accesoRol(\''.$itemV[0][1].'\');"';
                                            if(buscaChecks($itemV)){
                                                    $data .= 'checked';
                                            }
                                            $data .= '/>';

                                            foreach($itemV as $itemK2 => $itemSubMenu){
                                                                if($itemK2 != 0) {
                                                                        $data .= '<ul>';
                                                                        //check de cada submenus//
                                                                        $data .= '<li>&nbsp;<input type="checkbox" id="'.$itemSubMenu[0].'"'.'name="'.$itemSubMenu[0].'" class="'.$itemSubMenu[1].'" onclick="accesoRol(event,\''.$itemSubMenu[1].'\');"';
                                                                        if($itemSubMenu[3] == 'S'){
                                                                                $data .= 'checked';
                                                                        }
                                                                        $data .= '/>';
                                                                        //descipcion de submenus
                                                                        $data .= ''.$itemSubMenu[0];
                                                                        $data .= '</li>';
                                                                        $data .= '</ul>';
                                                                        $data_h .= '<input type="hidden" id="menurol['.$itemSubMenu[1].'][item]" name="menurol['.$itemSubMenu[1].'][item]" value="'.$itemSubMenu[1].'" />';
                                                                        $data_h .= '<input type="hidden" id="menurol['.$itemSubMenu[1].'][item_nivel]" name="menurol['.$itemSubMenu[1].'][item_nivel]" value="'.$itemSubMenu[2].'" />';
                                                                        $data_h .= '<input type="hidden" id="menurol['.$itemSubMenu[1].'][item_hab]" name="menurol['.$itemSubMenu[1].'][item_hab]" value="'.$itemSubMenu[3].'" />';

                                                                }
                                            }

                                            $data .= '</li>';

                                    }
                                    $data .= '</ul>';
                                    ?>

                                    <?php echo $data ?>
                                    <?php echo $data_h ?>
				</ul>
			</div>
		</div>

	</div>
	</div></div>
</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->