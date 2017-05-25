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
                          switch ($accion) {
                              case 'socio':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['soci_codi'].'" 
                                      data2="'.$row['apenom'].'"
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['soci_codi'].'">'.$row['soci_codi'].' '.$row['apenom'].'</a></li>';
                              break;

                              case 'loca_prov':
                                      echo '<li  class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['cloc_id_localidad'].'"      
                                      data2="'.$row['loca_deno'].'"      loca_deno                           
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['cloc_id_localidad'].'">'.$row['loca_deno'].'</a></li>';
                              break;

                            case 'usu_usuario':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['usua_nombre'].'" 
                                      data2="'.$row['user_deno'].'"
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['usua_nombre'].'">'.$row['user_deno'].'</a></li>';
                            break;

                          }   

                          

                         
                    $contador++;
                    } 
               } 
         ?>
         </ul>