<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>

	<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
	<div class="wrapper tipoframe">
    <div class="panel-body">
  <?php if ($sindatos == '1'){ ?>
	<table border="0"  frame=""  class="tablesorter responsiveWidth table table-striped table-hover table-bordered">
	
		<thead>
			<tr class="alert-success wrapper">
				<th><?php echo __("Nro Soc") ?></th>
				<th><?php echo __("Razón social") ?></th> 
				<th><?php echo __("Cat") ?></th>
				<th><?php echo __("Grupo") ?></th>
				<th><?php echo __("Actividad") ?></th>
				<th><?php echo __("Edad") ?></th>
				<th><?php echo __("F.Baja") ?></th>
				<th><?php echo __("Acciones") ?></th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($cursor as $row): ?>
				<tr class="<?php echo $class ?>">
					<td><?php echo $row['soci_codi'] ?></td>
					<td><?php echo $row['apenom'] ?></td>
					<td><?php echo $row['tipo_deno_redu'] ?></td>
					<td><?php echo $row['grupo_fam'] ?></td>
					<td><?php echo $row['acti_deno'] ?></td>
					<td><?php echo $row['edad'] ?></td>
					<td><?php echo $row['soci_baja_f'] ?></td>
					<td>
						<?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
							<a class = "btn btn-mini" href="<?php echo url_for("amSocios/formularioAmSocios?soci_codi=".$row['soci_codi']) ?>">
								<i class="icon icon-pencil text-success"></i>
							</a>
							<a class = "btn btn-mini" href="<?php echo url_for("amSocios/formularioBajaAmSocios?soci_codi=".$row['soci_codi']) ?>">
								<i class="icon icon-remove text-error"></i>
							</a>
						<?php } ?>
					</td>
			<?php endforeach; ?>
		</tbody>
		</table>
		<?php }else{ ?>
		               <div class="wrapper" id="nadaporaqui">
                <div class="panel-body">
                       <div class="text-center  alert">
                         <h5><?php echo "No hay ning&uacute;n dato que cumpla con los criterios de b&uacute;squeda";?></h5>
                       </div>     
                </div>
                </div>
         <?php } ?>

</div>
</div>

