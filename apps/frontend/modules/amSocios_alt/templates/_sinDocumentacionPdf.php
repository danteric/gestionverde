<?php include_partial('services/pdfHeader') ?>
<img src="./img/portada_pj.png" >
<br/>
<div class="title">
	<b><?php echo __("Clientes sin documentación"); ?></b>
</div>
<div class="columna">
	<table class="tablesorter1Col table table-striped" border="0"  frame="" >

						<tr>
							<th><?php echo __("Fecha alta") ?></th>
							<th><?php echo __("Cod.cliente") ?></th>
							<th><?php echo __("Documento") ?></th>
							<th><?php echo __("Unic.vez") ?></th>
							<th><?php echo __("Razón social") ?></th>
						</tr>
						<?php $c = 0; foreach($cursor as $row) { ?>
							<tr class="<?php if($c%2 == 0){ echo "even";}else{echo "odd";} ?>">
								<td><?php echo $row['ENTI_FCH_ALTA'] ?></td>
								<td><?php echo $row['CLIENTE_SIST_EXT'] ?></td>
								<td><?php echo $row['DOCUMENTO'] ?></td>
								<td><?php echo $row['ENTI_ES_INTERNAC'] ?></td>
								<td><?php echo $row['RAZON'] ?></td>
							</tr>
						<?php $c++; } ?>
		</table>

	</div>

<?php include_partial('services/pdfFooter') ?>