<?php if ($sf_user->hasFlash('notice') || $sf_user->hasFlash('error')) { ?>
	<div>
		<?php if ($sf_user->hasFlash('notice')): ?>
		<div class="alert alert-success"><?php echo nl2br(__($sf_user->getFlash('notice'),
		array(), 'sf_admin')) ?></div>
		<?php endif; ?>

		<?php if ($sf_user->hasFlash('error')): ?>
		<div class="alert alert-danger"><?php echo nl2br(__($sf_user->getFlash('error'),
		array(), 'sf_admin')) ?></div>
		<?php endif; ?>
	</div>
<?php } ?>