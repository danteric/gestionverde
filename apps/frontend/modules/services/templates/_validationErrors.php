<?php $errors = $sf_data->getRaw('errors'); ?>
<div >
	<?php if(count($errors > 0)) { ?>
		<?php foreach($errors as $unError) { ?>
			<div class="alert alert-error"><?php echo $unError ?></div>
		<?php } ?>
	<?php } ?>
</div>