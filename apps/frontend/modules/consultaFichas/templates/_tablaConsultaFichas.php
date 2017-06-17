<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>

<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
<div class="wrapper tipoframe">
 <div class="panel-body">
  
  	<?php if ($sindatos == '1'){ ?>
		<div class="btn-group-vertical" role="group" aria-label="...">
  			<?php foreach($cursor as $row) { ?>
			<div class="btn-group" role="group">
  				<button type="button" class="btn btn-primary" onclick="<?php echo 'cargarFicha('.$row['fich_id'].')' ?>"><?php echo $row['fich_deno'] ?></button>

  			</div>
  			<?php }; ?>
		</div>
	<?php }else{ ?>
		<div class="wrapper" id="nadaporaqui">
        <div class="panel-body">
             <div class="text-center  alert">
               <h5><?php echo "Sin registros";?></h5>
             </div>     
        </div>
    </div>
    <?php } ?>

</div>
</div>

