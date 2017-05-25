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
                              case 'sectorEconomico':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['SECTOR_CODIGO'].'" 
                                      data2="'.$row['SECTOR_DESCRIPCION'].'"
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['SECTOR_CODIGO'].'">'.$row['SECTOR_CODIGO'].' '.$row['SECTOR_DESCRIPCION'].'</a></li>';
                              break;
                              case 'categoriaScoring':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['CATS_CODIGO'].'"      
                                      data2="'.$row['CATS_SUBGRUPO'].'"                                 
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['CATS_CODIGO'].'">'.$row['CATS_SUBGRUPO'].'</a></li>';
                              break;
                              case 'listaInformados':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['ROW_ID'].'"      
                                      data2="'.$row['RESULTADO'].'"                                 
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['ROW_ID'].'">'.$row['CUIT_BUSCADO']. ' || ' .$row['RESULTADO'].'</a></li>';
                              break;
                              case 'profesiones':
                                      echo '<li class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['PROF_CODIGO'].'"      
                                      data2="'.$row['PROF_DESCRIPCION'].'"                                 
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['PROF_CODIGO'].'">'.$row['PROF_DESCRIPCION'].'</a></li>';
                              break;
                              case 'bancos':
                                      echo '<li  class=""><a style="text-decoration:none; cursor:pointer;" class="activocombo selectacomplete" 
                                      data="'.$row['ENTI_CODIGO'].'"      
                                      data2="'.$row['ENTI_RAZON_SOCIAL'].'"                                 
                                      id="valor_'.$contador.'_'.$dif.'_'.$row['ENTI_CODIGO'].'">'.$row['ENTI_RAZON_SOCIAL'].'</a></li>';
                              break;
                          }   

                         
                    $contador++;
                    } 
               } 
         ?>
         </ul>