       	<ul style="top: auto; left: 0px; position: relative; display: block;" class="typeahead dropdown-menu selectcombox">
<?php 
          	  if($resulRespuesta == 'Nulo')
          	  {
            	  	echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete colorfondo3" data="" id="">Sin Resultados</a></li>'; 
              }
         else
              {
		          	$contador = 0;
					$dif = rand(0, 10000); //hago una roun para no tener invonvenientes con autogenerado
		            foreach($resulRespuesta as $row) 
		            {		
						  echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
		                  data="'.$row['DESC_LOCA'].'" 
		                  pais="'.$row['COD_PAIS'].'"
		                  prov="'.$row['COD_PROV'].'" 
		                  loc="'.$row['COD_LOCA'].'"   
		                  id="valor_'.$contador.'_'.$dif.'_'.$row['COD_PAIS'].'">'.$row['DESC_LOCA'].'</a></li>';
						 
					$contador++;
		            } 
		       } 
 ?>
 </ul>
 
 