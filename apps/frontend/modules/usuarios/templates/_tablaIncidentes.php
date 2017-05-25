<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>
    
    <input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
    <div class="wrapper tipoframe">
    <div class="panel-body">	
	<table border="0"  frame=""   class="responsiveWidth onlytablesorter table table-striped table-bordered">
			<thead>
					<tr class="alert-info wrapper">
					<th ><?php echo __("Fecha") ?></th>
					<th ><?php echo __("Usuario") ?></th>
					<th ><?php echo __("Proceso") ?></th>
					<th ><?php echo __("Error") ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $c = 0; foreach($items as $row) { ?>
					<tr class="<?php if($c%2 == 0){ echo "even";}else{echo "odd";} ?>" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
						<td><?php echo $row['usil_fecha_hora'] ?></td>
						<td><?php echo $row['usil_usua_nombre'] ?></td>
						<td><?php echo $row['usil_proceso'] ?></td>
						<td><?php echo $row['usil_error'] ?></td>
				<?php $c++; } ?>
			</tbody>

	</table>
	</div>
	</div>
	<?php echo include_partial('estilos/paginado', ['pagina'=> $pagina, 'total_paginas'=> $total_paginas, 'total_registros' => $total_registros]) ?>
