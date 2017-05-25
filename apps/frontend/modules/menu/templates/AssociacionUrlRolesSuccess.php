<script>
$(document).ready(function(){
				$('#roles').remove();
	$('.btn-success').click(function( e ) {
			$('#spinner').show();

			var id = $( this ).parent('td').parent('tr').attr('id');
			$('#trigger').val(id);
			$.post("<?php echo url_for('roles/AssociacionUrlRoles') ?>",
			{ 
			accion:  		'M',
			USMA_ID: 		$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('USMA_ID'),
			USMA_ITEM: 		$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('USMA_ITEM'),
			USMA_DES_ITEM: 	$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('USMA_DES_ITEM'),
			USMA_ENLACE: 	$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('USMA_ENLACE'),			
			USMA_ENLACE: 	$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('USMA_ENLACE'),
			AEIM_ENLACE:	$(this).parent('td').parent('tr').find( 'select option:selected' ).attr('AEIM_ENLACE')
			}, 
				function(data){
				var salida = jQuery.parseJSON(data);
				if (salida.RESULTADO == 'OK') {
				$('#'+id).remove();
				}
				else {
				$('#Salidita').html(salida.RESULTADO);
				}
				$('#spinner').hide();
				});
    });
});	
</script>
<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>
<?php $cabecera = new Cabecera(); ?>
<?php $cabecera->titulo('Roles '.$usuario) ?>
<?php $cabecera->ruta('Usuarios') ?>
<?php $cabecera->ruta('Roles') ?>
<?php $cabecera->accion('<a href="'.url_for("roles/formularioRoles").'" ><i class="icon icon-plus text-info"></i> Nuevo</a>') ?>
<?php $cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>'); ?>
<?php echo $cabecera ?>
<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    <div class="wrapper tipoframe">
    <div class="panel-body">
	<table border="0"  frame=""  class="><?php if (count($assoc_url) > 0) {echo 'tablesorter ';}?>responsiveWidth table table-striped table-bordered">
					<thead>
						<tr class="alert-success wrapper">
							<th><?php echo __("Url") ?></th>
							<th><?php echo __("Asociar a") ?></th>
							<th class="nosort" style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>

					  <?php
					$niveles = array();

					foreach($assoc_url as $unItem) {
							$niveles[$unItem['AEIM_ENLACE']][] = array(	$unItem['USMA_ID'],
																		$unItem['USMA_ITEM'],
																		$unItem['USMA_DES_ITEM'],
																		$unItem['USMA_ENLACE']
																		);
					}
					//echo '<pre>';print_r($nivelesMenu);
					?>

						

						<?php $c = 0; foreach($niveles as $select => $option ) {
						?>
						<tr id="<?php echo str_replace('/','',$select); ?>" class="<?php if($c%2 == 0){ echo "even";}else{echo "odd";} ?>"onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
						<?php
						echo '<td>'.$select.'</td><td><select>';
						foreach($option as $item_desc) {
						//echo '<pre>';print_r($item_desc);
						echo '<option name="values" AEIM_ENLACE="'.$select.'" USMA_ID="'.$item_desc[0].'" USMA_ITEM="'.$item_desc[1].'" USMA_DES_ITEM="'.$item_desc[2].'" USMA_ENLACE="'.$item_desc[3].'">'.$item_desc[2].'</option>';
						}
						echo '</select></td><td width="5%" align="center"><input id="'.$select.'" type="button" id="Botton_Update" value="Grabar" class="btn btn-success"></td></tr>';
						} 
						?>

					</tbody>
		</table>
<div id="Salidita"></div>
<input value="" id="trigger" type="hidden"/>
</div>
</div>
<?php require __DIR__.'/../../pagcomun/templates/_pagcomun.php' ?>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->