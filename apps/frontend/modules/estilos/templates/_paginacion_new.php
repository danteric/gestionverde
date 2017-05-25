<?php
// limite a mostrar por pantalla cantidad de registros
      $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".USU_USUARIO_RS ('".$_SESSION["usuario"]["username"]."',:data); end;";
      $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
      $filasPorPagina = $cursor[0]['USUA_OPC_FILAS_PAG'];
/******************************************************************************************
 * EMPIEZO A RECIBIR PARAMETROS Y ARMO EL PAGINADO Y ES NECESARIO EL $total_registros
 ******************************************************************************************/
        $total_filas = $total_registros;

        if ($total_filas>0)
         {
	            $filas_pagina=$filasPorPagina;
				if(!isset($pagina) || empty($pagina)){
	            	$numero_pagina=1;
				}else{
	            	$numero_pagina= $pagina;
				}
            	//con ceil hago un redondeo de numeros decimales
                //$campo_de_inicio=($numero_pagina-1)*$filas_pagina;
                $total_paginas=ceil($total_filas/$filas_pagina);
         if ($total_paginas>1)
            {
                echo "<div align='center'>";
                echo "<div  class='pager' style='clear: both; position: none;''>";
                if ($numero_pagina!=1)
                    echo "<li><a id='paginando' title='Atras' class='first pointer' data='".($numero_pagina-1)."'>&laquo; Anterior</a>  </li>";
                    else 
                    echo "<li class='disabled'><a  title='Imposible continuar' class='first pointer'>&laquo; Anterior</a>  </li>";     
                    for ($i=1;$i<=$total_paginas;$i++)
                    {
                        if($numero_pagina==$i)
                        {
                            $paginaPosicion = $i;
                        }
                        else 
                        if($i == 1 || $i == $total_paginas || ($i >= $numero_pagina - 2 && $i <= $numero_pagina + 2))
                            {
			                    echo "<div class='button zoom combopaginado '>
                                <a id='paginando' title='Ir a pagina' class='badge badge-success' data='".$i."'> ".$i."</a> 
                                </div>";						
                            }
                    }
                    echo "<li><a title='Posicion actual' class='last'>Pagina </a>  </li>";
                    ?>
                                        <select class="combopaginado comboMedio trcolor" style="border-radius:50px"> 
                                        <?php
                                           for ($i2=1;$i2<=$total_paginas;$i2++)
                                                    {
                                                     ?>
                                                     <option <?php if($numero_pagina == $i2){ echo "selected"; } ?> class="comboMedio zoom" id='paginando' data='<?php echo $i2 ?>'><?php echo $i2;?>  </option>
                                                    <?php  
                                                    }
                                        ?>
                                        </select>     
                <?php
                    echo "<div class='button combopaginado'><a title='Total paginas' class='badge badge-success'> Paginas: (".$total_paginas.")</a> </div> ";
                    echo "<div class='button combopaginado '><a title='Total registros' class='badge badge-success'>Items: (".$total_filas.") </a>  </div>";
                if($numero_pagina!=$total_paginas)
                {     
                    echo "<li><a id='paginando' title='Siguiente' class='last pointer' data='".($numero_pagina+1)."'>Siguiente &raquo;</a>";
                }
                else
                {
                    echo "<li class='disabled'><a title='Imposible continuar' class='last pointer'>Siguiente &raquo;</a> ";    
                }

                echo "</div>";
                echo "</div>";
            }
        }
     	
/******************************************************************************************
 * FIN
 ******************************************************************************************/
?>
<!--
<input  type="text" class="comboMedio zoom typeando" id="paginando2" data="<?php echo $i2 ?>" value="<?php echo $numero_pagina; ?>"/>
                  
<script>
	$(document).ready(function() {    
    		$('.typeando').keyup(function(){
    		total_pagina = '<?php echo $total_registros ?>';
			var pagina= $(this).val();
			var cadena="pagina="+pagina;
			$.ajax({
		            type: "POST",
		            url: "<?php echo url_for('abm/tablaClientes') ?>",
		            data: cadena,
		            success: function(data) {
		                  $('#tablaClientes').html(data);
		                  startTableOnlySorter();
		               	  $('#spinner').hide();    
		          }
		        });
		    });
	});  
</script>

/**************PAGINADO NUEVO************************************/
$(document).ready(function() {    
    		$("#paginando").live("click", function(){
		    $('#spinner').show();
			var pagina=$(this).attr("data");
			var cadena="pagina="+pagina;
			$.ajax({
            			type: "POST",
            			url:"<?php echo url_for('altas/tablaClientes') ?>",cache:false,
            			data:cadena,
            			success:function(data)
            			{
                		$("#tablaTerceros").html(data);
                	    startTableOnlySorter();
                		$('#spinner').hide();
            			}
        			});
        			return false;
    		});
	});  
/**************PAGINADO NUEVO************************************/	
</script>
-->

