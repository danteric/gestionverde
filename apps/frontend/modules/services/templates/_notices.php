<?php $notices = $sf_data->getRaw('notices'); ?>
<?php $errors = $sf_data->getRaw('errors'); ?>
<?php if(count($errors) != 0 || count($notices) != 0) { ?>
	<div>
		<?php if(count($errors > 0)) { ?>
			<?php foreach($errors as $unError) { ?>
				<div class="alert alert-error"><?php echo $unError ?></div>
			<?php } ?>
		<?php } ?>
		<?php if(count($notices > 0)) { ?>
			<?php foreach($notices as $unNotice => $v) { ?>
				<div class="alert alert-success"><?php echo $v ?></div>
			<?php } ?>
		<?php } ?>
	</div>
<?php } ?>