<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>

<script type="text/javascript">
  $(".menu-fichas").hover(function() {
    if($(".menu-fichas").css( "left") < "30px") 
    {
      $(".menu-fichas").css( "left", "0px" );  
    }
   });
  $("#tablaFichas").hover(function()  {
    if($(".menu-fichas").css( "left") == "0px") 
    {
      $(".menu-fichas").css( "left", "-300px" );  
    }
   });

  $("#detalleFicha").hover(function() {
    if($(".menu-fichas").css( "left") == "0px") 
    {
      $(".menu-fichas").css( "left", "-300px" );  
    }
   });

</script>

<style>
  .menu-fichas {position: absolute; left: -300px;transition: .4s; z-index: 99999;}
</style>

<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
<div class="wrapper tipoframe menu-fichas">
     <div class="panel-body">
      
      	<?php if ($sindatos == '1'){ ?>
      		<div class=" btn-group-vertical" role="group" aria-label="...">
        			<?php foreach($cursor as $row) { ?>
      			
                  <div class="btn-group" role="group">
          				    <button type="button" class="btn btn-primary btn-sm" style="text-align: left " onclick="<?php echo 'cargarFicha('.$row['fich_id'].')' ?>">
                      <?php echo $row['fich_deno'] ?>
                      </button>
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



