<?php $optionsSelect = $sf_data->getRaw('provincias'); ?> 
<select id="provincia" name="<?php echo $input_name ?>" class="required">
	<?php foreach ($optionsSelect as $arraySelect) { ?>
		<option value="<?php echo $arraySelect["PROV_CODIGO"] ?>"><?php echo $arraySelect["PROV_DESCRIPCION"] ?></option>
	 <?php } ?>
</select>