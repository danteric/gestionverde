<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>

<script type="text/javascript">
  $(".menu-fichas").hover(function() {

      $(".menu-fichas").css( "width", "400px" );
      $(".menu-fichas").css("overflow-y","scroll");  
       });

  $(".menu-fichas").mouseleave(function() {

      $(".menu-fichas").css( "width", "45px" );
      $(".menu-fichas").css("overflow-y","hidden");

       });

</script>



<style>
 .menu-fichas {position: absolute; left: 0px;transition: .4s; z-index: 99999; width: 150px}
 .btn-group-vertical {width: 100%; margin: 0px}
 .scrollbar{margin-left: 10px;float: left;height: 400px;width: 45px;background: #F5F5F5;overflow: hidden; ;margin-bottom:25px;}
 #style-3::-webkit-scrollbar-track{-webkit-box-shadow: insert 0 0 6px rgba(9,0,0,0.3);background-color: #F5F5F5}
 #style-3::-webkit-scrollbar{width: 6px;background-color: #F5F5F5}
 #style-3::-webkit-scrollbar-thumb{background-color: #424242}
</style>

<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>


<div class="wrapper tipoframe-noresize menu-fichas scrollbar" id="style-3">
     <div class="panel-body">
      
      	<?php if ($sindatos == '1'){ ?>
      		<div class="btn-group-vertical" aria-label="...">
        			<?php foreach($cursor as $row) { ?>
      			     <div class="row"> 
                  <div class="btn-group" style="width: 400px">
                     <a class="btn btn-primary btn-sm" style="width: 50px;"><i class="glyphicon glyphicon-menu-right"></i></a>
        
                      <button class="btn btn-primary btn-sm" style="text-align: left;margin-left: 0px;width: 350px " onclick="<?php echo 'cargarFicha('.$row['fich_id'].')' ?>">
                      <?php echo $row['fich_deno'] ?>
                      </button>
          			  </div>
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



