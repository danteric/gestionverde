<script>
$(document).ready(function () {
	if ($('li[id=current]').children().attr("data-original-title") == 'Habilita') {
		var movedItemId;
        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li:not(.dontsortme)',
            toleranceElement: '> div',
			stop: function(event,item) {//accesoRol();
            //cargarMenu();
			CargarItem('#menu\\['+$('input[type=checkbox]', item.item).attr('id')+'\\]\\[sector\\]');			
			//console.log(movedItemId);
			}
			})//.on("sort", function(a, item){
        //movedItemId = '';
        //$('input[type=checkbox]', item.item).each(function(){
        //    movedItemId = '#menu\\['+$('input[type=checkbox]', item.item).attr('id')+'\\]\\[sector\\]';
        //    movedItemId += '#menu\\['+$(this).attr('id')+'\\]\\[sector\\]';
        //    movedItemId = $('div', item.item).attr('id');
		//	console.log(movedItemId);
        //});
	//});
	} 
		$('#tablaMenu').checkboxTree(
		);		
});		
</script>
	<div class="form">
		<div>
			<h2><?php echo __("Permisos") ?>:</h2>
			<div id="tablaMenu" >
			<div>
			<input type="hidden" id="item" name="item" value="raiz" />
			<input type="hidden" id="menu[raiz][usma_id]" name="menu[raiz][usma_id]" value="0" />
			</div>
				<ol class="sortable">
				<?php 
							$nivel_anterior = 1;
							$i = 0;
							$count = count($roles);
							$salida = '<li class="dontsortme">';
							foreach($roles as $array) {
									if ($array[USMA_HABILITADO] == 'S' || $array[USMA_USAP_APLI] == 'TODOS')  {$checked = 'checked';} else {$checked = '';$dontsortme = '';}
									if ($array[USMA_USAP_APLI] == 'TODOS') {$disabled = ' disabled readonly'; $dontsortme = 'class="dontsortme"';} else {$disabled = ''; $dontsortme = '';}
									$salida_tmp = '<div class="over" id="menu['.$array[USMA_ITEM].'][sector]"><input'.$disabled.' type="checkbox" id="'.$array[USMA_ITEM].'" name="'.$array[USMA_ITEM].'" '.$checked.'><texto id="menu['.$array[USMA_ITEM].'][texto]" class="editar">'.$array[USMA_DES_ITEM].'</texto><texto id="agregar"></texto>';
									$salida_tmp .= '<input type="hidden" id="item" name="item" value="'.$array[USMA_ITEM].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][item_original]" name="menu['.$array[USMA_ITEM].'][item_original]" value="'.$array[USMA_ITEM].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][item]" name="menu['.$array[USMA_ITEM].'][item]" value="'.$array[USMA_ITEM].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][item_hab]" name="menu['.$array[USMA_ITEM].'][item_hab]" value="'.$array[USMA_HABILITADO].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_usap_apli]" name="menu['.$array[USMA_ITEM].'][usma_usap_apli]" value="'.$array[USMA_USAP_APLI].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_id]" name="menu['.$array[USMA_ITEM].'][usma_id]" value="'.$array[USMA_ID].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_padre_id]" name="menu['.$array[USMA_ITEM].'][usma_padre_id]" value="'.$array[USMA_PADRE_ID].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_des_item]" name="menu['.$array[USMA_ITEM].'][usma_des_item]" value="'.$array[USMA_DES_ITEM].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_enlace]" name="menu['.$array[USMA_ITEM].'][usma_enlace]" value="'.$array[USMA_ENLACE].'" />';
									$salida_tmp .= '<input type="hidden" id="menu['.$array[USMA_ITEM].'][usma_orden]" name="menu['.$array[USMA_ITEM].'][usma_orden]" value="'.$array[USMA_ORDEN].'" /></div>';
									
									$i++;
									if ($nivel_anterior == $array[NIVEL]) {
										if ($i == 1) {
										$salida = $salida.$salida_tmp;
										} else {
										$salida = $salida.'</li><li '.$dontsortme.'>'.$salida_tmp;
										}
										//if ($array[NIVEL] == 1)

									} elseif ($nivel_anterior < $array[NIVEL]) {
									if ($array[NIVEL] == 2) {$caret = 'caret';} else {$caret = 'right-caret';} //== 2 o >2
									if ($array[NIVEL] == 2) {$clase = '';} else {$clase = ' sub-menu';}
									$salida = $salida.'<ol><li '.$dontsortme.'>'.$salida_tmp;
									$j++;
									}
									else {
									$k = $nivel_anterior - $array[NIVEL];
									$salida = $salida.str_repeat('</li></ol>',$k).'</li><li '.$dontsortme.'>'.$salida_tmp;
									$j = $j - $k;
									}

									if ($j > 0 and $count == $i) {
									$salida = $salida.str_repeat('</li></ol>',$j);
									$j = 0;
									}
									$nivel_anterior = $array[NIVEL];
							$max = $array[MAXIMO];
							}
							echo $salida.'</li>';
				?>
				</ol>
 			<input id="max" type="hidden" value="<?php echo $max?>">
			</div>
		</div>
	<!--
		<div class="botonera">
			<a href="<?php echo url_for("roles/roles") ?>" class="btn btn-inverse">Volver</a>
			<?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
				<input type="submit" value="Grabar" class="btn btn-success" />
			<?php } ?>

		</div>
		-->
	</div>