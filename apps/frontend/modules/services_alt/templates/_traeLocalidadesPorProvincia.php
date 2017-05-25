<?php $optionsSelect = $sf_data->getRaw('localidades'); ?> 
<select id="localidades" name="localidades" class="required">
	<?php foreach ($optionsSelect as $arraySelect) { ?>
		<option value="<?php echo $arraySelect["LOCA_CODIGO"] ?>"><?php echo $arraySelect["LOCA_DESCRIPCION"] ?></option>
	 <?php } ?>
</select>