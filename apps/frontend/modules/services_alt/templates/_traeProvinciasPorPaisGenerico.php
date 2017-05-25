<?php $optionsSelect = $sf_data->getRaw('provincias'); ?> 
<?php foreach ($optionsSelect as $arraySelect) { ?>
		<option value="<?php echo $arraySelect["PROV_CODIGO"] ?>"><?php echo $arraySelect["PROV_DESCRIPCION"] ?></option>
<?php } ?>
