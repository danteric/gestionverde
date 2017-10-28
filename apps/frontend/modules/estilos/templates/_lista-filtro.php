
<?php $canti = sizeof($filtros); $tama_label="col-md-1" ?>
<?php if ($canti <= 3) { $tama_label="col-md-2"; }; ?>

<div class="container-fluid">
		<div class="row">
				<?php $ind=0; foreach ($filtros as $key => $value): ?>
				  
				  <div class="form-group"> 
				    <div class="<?php echo $tama_label?>">
				    	<h5 style="text-align:center;"><b><?php echo $key ?></b></h5>
				    </div>

				    <div class="col-md-2">
				    <?php echo $value ?>
				    </div>  
				  </div>

				<?php $ind=$ind+1;  if ($ind>=4) { $ind=0; }; ?>
				<?php if ($ind==0) { ; ?>
		</div>
		<div class="row">
			<?php }; ?>

	  		<?php endforeach ?>
		</div>
</div>

