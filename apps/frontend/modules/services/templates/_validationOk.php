<?php $errors = $sf_data->getRaw('errors'); ?>
<div >
	<?php if(isset($errors)) { ?>
		
			<div class="alert alert-error"><?php echo 'Se guardo correctamente' ?></div>
		
	<?php } ?>
</div>