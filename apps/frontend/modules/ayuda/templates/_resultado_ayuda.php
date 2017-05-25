
<div class="panel alert-info wrapperimg" style="width: 54%; ">
     
   <div class="panel-body">
       <div class="tipoframe2">
            <?php 
            foreach($resulactivi as $row) 
            {
                  echo '<div class=""><a  style="text-decoration:none; cursor:pointer;" class="activocombo" data="'.$row['UHLP_TITULO'].'"  id="valor'.$row['UHLP_TITULO'].'">'.$row['UHLP_TITULO'].'</a></div>'; 

            } 
 ?>
 </div> 
  </div> 
</div>

