<?php $optionsSelect = $sf_data->getRaw('actividades'); ?> 
<?php foreach ($optionsSelect as $arraySelect) { ?>
	<option value="<?php echo $arraySelect["ENRA_ACTIVIDAD"] ?>%<?php echo $arraySelect["ENRA_ENRE_CODIGO"] ?>" onclick="llenaDatosActividades('<?php echo $arraySelect["ENRA_ACTIVIDAD"] ?>', '<?php echo $arraySelect["ENRA_ENRE_CODIGO"] ?>')"><?php echo $arraySelect["DESCRIPCION"] ?></option>	
<?php } ?>
<script type="text/javascript">
	llenaDatosActividades();
</script>