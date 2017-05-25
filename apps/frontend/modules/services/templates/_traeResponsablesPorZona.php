<?php $optionsSelect = $sf_data->getRaw('responsables'); ?>
<?php foreach ($optionsSelect as $arraySelect) { ?>
		<option value="<?php echo $arraySelect["EMRE_CODIGO_LEGAJO"] ?>"><?php echo $arraySelect["APENOM"] ?></option>
<?php } ?>