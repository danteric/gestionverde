
<?php foreach($cursor as $row){} ?>

<div>
		<label>Seguimiento para esta fase (Última modificación: <?php echo $row['seff_alta_f'] ?>)</label> 
		<textarea class="form-control" id="seff_seguimiento" name="seff_seguimiento" style="margin-bottom: 5px" ><?php echo $row['seff_seguimiento']; ?></textarea>
		
		
		<label>Seguimiento en la ficha</label>
		<textarea class="form-control" id="seff_seguim_full" name="seff_seguim_full" style="margin-bottom: 5px" readonly rows="6"><?php echo $row['seff_seguim_full']; ?></textarea>

</div>