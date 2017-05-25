<tfoot>
                <td colspan="3">
                    <div id="pager" class="pager" style="clear: both; position: none;">
                        <form>
                              <li>
                                  <a href="#" class="first" title="Primera" onMouseOver="CambiaColor(this,'rgba(234, 245, 134, 1)','blue')" onMouseOut="CambiaColor2(this,'')">&laquo; Primera </a>
                               </li>
                               <li>
                                  <a href="#" class="prev" title="Anterior" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'')"> &larr; Anterior</a>
                               </li>   
                               <li>
                                  <a href="#" class="next" title="Siguiente" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'')"> Siguiente &rarr;</a>
                               </li> 
                               <li>
                                  <a href="#" class="last" title="Ultima"> Ultima &raquo;</a>  
                               </li> 
                               <li style="width: 65%;">
                                 <a>
                                  <span class="badge badge-info">Mostrar</span>
                                 </a>
                               </li>   
                
                                <select class="pagesize combopaginado"> 
                                <?php
                                $totalmultiplo =  $filasPorPagina;

                                //die($_SESSION['filas_pag']);exit;

                                     for($maxfila=1;$maxfila<=15;$maxfila++)
                                            {
                                             $resultado = $maxfila*$totalmultiplo; 
                                             ?>
                                             <option  value="<?php echo $resultado ?>"><?php echo $resultado ?></option>
                                            <?php  
                                            }
                                ?>
                                </select> 
                        </form>
                    </div>
                </td>
        </tfoot>   
        
<!-- paginado modificado por leon
    <tfoot>
            <tr>
                <td colspan="3">
                    <div id="pager" class="pager" style="clear: both; position: none;">
                        <form>
                              <li>
                                  <a href="#" class="zoom" title="Primera" onMouseOver="CambiaColor(this,'rgba(234, 245, 134, 1)','blue')" onMouseOut="CambiaColor2(this,'#000000')"> <?php echo image_tag('/img/icons/prev2.png', array("class" => "first combopaginado2")); ?></a>
                              </li> 
                              <li>
                                  <a href="#" class="zoom" title="Anterior" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')"> <?php echo image_tag('/img/icons/prev.png', array("class" => "prev combopaginado2")); ?></a>
                              </li> 
                              <span class="pagedisplay" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')"></span>
                              <li>
                                  <a href="#" class="zoom" title="Siguiente" onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')"> <?php echo image_tag('/img/icons/next.png', array("class" => "next combopaginado2")); ?></a>
                              </li> 
                              <li>
                                  <a href="#" class="zoom" title="Ultima" onMouseOver="CambiaColor(this,'rgba(234, 245, 134, 1)','blue')" onMouseOut="CambiaColor2(this,'#000000')"> <?php echo image_tag('/img/icons/next2.png', array("class" => "last combopaginado2")); ?></a>
                              </li> 
                              <li>
                              <a class="combopaginado2">Mostrar:</a></li> <select class="pagesize combopaginado">
                                <option selected="selected"  value="<?php echo $filasPorPagina ?>"><?php echo $filasPorPagina ?></option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                                <option  value="100">100</option>
                            </select>
                        </form>
                    </div>
                </td>
            </tr>
 </tfoot>
-->