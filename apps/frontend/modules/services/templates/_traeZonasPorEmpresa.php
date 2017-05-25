<?php $optionsSelect = $sf_data->getRaw('zonas'); ?>

<?php foreach ($optionsSelect as $arraySelect) { ?>
	<option value="<?php echo $arraySelect["EMSU_CODIGO"] ?>" onclick="llenaDatosZona('<?php echo $arraySelect["EMSU_PROV_CODIGO"] ?>', '<?php echo @$arraySelect["EMSU_CIUD_CODIGO"] ?>', '<?php echo $arraySelect["EMSU_PAIS_CODIGO"] ?>')"><?php echo $arraySelect["DISPLAY"] ?></option>
<?php } ?>
<script type="text/javascript">
	llenaDatosZona('<?php echo $optionsSelect[0]["EMSU_PROV_CODIGO"] ?>', '<?php echo $optionsSelect[0]["EMSU_PAIS_CODIGO"] ?>');
</script>