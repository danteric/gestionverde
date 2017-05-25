<?php $optionsSelect = $sf_data->getRaw('cps'); ?> 
<?php foreach ($optionsSelect as $arraySelect) { ?>
	<option value="<?php echo $arraySelect["LOCP_CODIGO"] ?>"><?php echo $arraySelect["LOCP_CODIGO"] ?></option>
 <?php } ?>
