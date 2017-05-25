<?php
//*******************************//
//recibo el dato enviado por post//
	$accion = $valor;
//*******************************//
?>  
<div class="panel-default">
<div class="panel-body">
	
<!--
************************************************************************************
INICIO DE USUARIOS
************************************************************************************
-->
	
<?php if(isset($enlace) && $enlace == NULL) { ?>
               <div class="text-left textopre alert alert-error">
                    <br>
                       <br>
                       <br>
                       <br>
                          <h5>Por el momento no existe ayuda para este item</h5>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>
                    <br>
               </div>     
<?php   } 
//----------------------------------------------------------------------------------//
?> 
<?php if(isset($accion) && $accion == '/usuarios/lista') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?> 
<!--
************************************************************************************
FIN DE USUARIOS Y
COMIENZO DE ROLES 
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/roles/roles') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?> 
<!--
************************************************************************************
FIN DE ROLES Y
COMIENZO DE LOG DE USUARIOS 
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/usuarios/logs') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?> 
			
			
<!--
************************************************************************************
FIN DE LOGS Y
COMIENZO DE PROFESIONES 
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/profesiones/profesiones') {  ?>

					 <br>
					 <div class="panel-success">	 
		        	 <div class='alert alert-info text-left'><abbr title=""><?php echo $titulo ?></abbr></div>
		        	 </div>
		    
		        	 <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);

                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $verconformato=$dar_espacops;
                                echo "$verconformato";
                                ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
		
<?php } ?>			
				
<!--
************************************************************************************
FIN DE PROFESIONES Y
COMIENZO DE CLASE ENTIDADES  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/claseEntidades/claseEntidades') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE CLASE ENTIDADES Y
COMIENZO DE TIPO DE SOCIADES
************************************************************************************
-->		
	
<?php if(isset($accion) && $accion == '/tipoSociedades/tipoSociedades') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE TIPO DE SOCIEDADES Y
COMIENZO DE  CARGOS DE PERSONAS 
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/abm/cargos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE CARGOS DE PERSONAS Y
COMIENZO DE DOCUMENTACION A PEDIR 
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/documentacionAPedir/documentacionAPedir' || $accion == '/documentacionAPedir/formularioDocumentacionAPedir/tipo_persona') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
                     
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                        <?php if(isset($accion) && $accion == '/documentacionAPedir/formularioDocumentacionAPedir/tipo_persona'){ ?>
                    <div class="text-center">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                    </div>
                    <?php } else { ?>
                        <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                      <?php }} ?>
                    </div></div></div>
        
<?php } ?> 


<!--
************************************************************************************
FIN DE DOCUMENTACION A PEDIR Y
COMIENZO DE  TIPOS DE DOCUMENTOS
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/tipoDocumentos/tipoDocumentos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE TIPOS DE DOCUMENTOS Y
COMIENZO DE ARES TELEFONICAS
************************************************************************************
--> 			 
			 
<?php if(isset($accion) && $accion == '/areasTelefonicas/areasTelefonicas' || $accion == '/areasTelefonicas/formularioAreasTelefonicas') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                      <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  ARES TELEFONICAS Y
COMIENZO DE  PONDERA DATOS
************************************************************************************
--> 	

<?php if(isset($accion) && $accion == '/ponderaDatos/ponderaDatos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  PONDERA DATOS Y
COMIENZO DE  TIPO SUJETO OBLIGADO
************************************************************************************
-->  

<?php if(isset($accion) && $accion == '/tipoSujetoObligado/tipoSujetoObligado') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                      <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  TIPO SUJETO OBLIGADOS Y
COMIENZO DE  LOC PAISES
************************************************************************************
-->              		 
	
<?php if(isset($accion) && $accion == '/locgeoPaises/locgeoPaises' || $accion == '/locgeoPaises/formularioPais/codigo_pais') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  LOC PAISES Y
COMIENZO DE LOC PROVINCIAS 
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/locgeoProvin/locgeoProvin') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  LOC PROVINCIAS Y
COMIENZO DE  LOC LOCALIDADES  
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/locgeoLoca/locgeoLoca') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  LOC LOCALIDADES Y
COMIENZO DE MATRIZ RIEZGO CONFIGURAR VIGENTE   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/matrizRiesgo/configurarVigente') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  M RIEZGO CONFIGURAR VIGENTE Y
COMIENZO DE  CIERRE VIGENTE  
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/matrizRiesgo/cierreVigente') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--
************************************************************************************
FIN DE  CIERRE VIGENTE Y
COMIENZO DE    
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/matrizRiesgo/consulta') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  /listaInformados/listaInformados       /listaInformados/consultados
************************************************************************************
FIN DE  MATRIZ CONSULTA Y
COMIENZO DE LISTA INFORMADOS 
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/listaInformados/listaInformados') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--         
************************************************************************************
FIN DE LISTA INFRMADOS Y
COMIENZO DE  LISTAINFORMADOS CONSULTADOS  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/listaInformados/consultados') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  LISTAINFORMADOS CONSULTADOS Y
COMIENZO DE VISADO CARTERA    
************************************************************************************
-->   

<?php if(isset($accion) && $accion == '/listaInformados/visadoCartera') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  VISADO CARTERA Y
COMIENZO DE ABM CLIENTES
************************************************************************************
--> 

<?php if(isset($accion) && $accion == '/abm/clientes') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  ABM CLIENTES Y
COMIENZO DE ABM REPORTES
************************************************************************************
--> 

<?php if(isset($accion) && $accion == '/abm/reporteDeClientes') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  ABM REPORTES Y
COMIENZO DE   STATUS 
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/listaInformados/status') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  STATUS Y
COMIENZO DE   ENVIO CARTAS 
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/cartas/envios') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  ENVIO CARTAS Y
COMIENZO DE DOCUMENTACION REGISTRADA   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/documRegistrada/documRegistrada') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE  DOCUMENTACION REGISTRADA Y
COMIENZO DE  SIN DOCUMENTACION  
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/sinDocumentacion/sinDocumentacion') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE SIN DOCUMENTACION Y
COMIENZO DE CONSOLIDADOCLIENTES   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/consolidadoClientes/consolidadoClientes') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CONSOLIDADOCLIENTES Y
COMIENZO DE SEGUIMIENTOCAMBIOS   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/seguimientoCambios/seguimientoCambios') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CLIENTESTATUS Y
COMIENZO DE    
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/clientes/status') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CLIENTESTATUS Y
COMIENZO DE  RELEVANCIA
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/relevancias/relevancias') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE RELEVANCIA Y
COMIENZO DE  IMPORTACION OPERACIONES  
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/importacion/importacionOperaciones') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE IMPORTACION OPERACIONES Y
COMIENZO DE ALTAS TERCEROS   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/altas/terceros') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALTAS TERCEROS Y
COMIENZO DE ALTAS CLIENTES
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/altas/clientes') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALTAS CLIENTES Y
COMIENZO DE ALTA MANUAL  
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/operaciones/altaManual') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALTA MANUAL Y
COMIENZO DE OPERACIONES CONSULTAS   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/operaciones/operacionesConsultas' || $accion == '/operaciones/operacionesConsultas#tabs-3' || $accion == '/operaciones/operacionesConsultas#tabs-5' || $accion == '/operaciones/operacionesConsultas#tabs-6') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE OPERACIONES CONSULTAS Y
COMIENZO DE CONSULTA DE OPERACIONES   
************************************************************************************
-->

<?php if(isset($accion) && $accion == '/operaciones/consultaProcesos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CONSULTA DE OPERACIONES Y
COMIENZO DE  ALERTAS CATALOGOS  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/catalogo') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS CATALOGOS Y
COMIENZO DE ALERTAS ASIGNACION   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/asignacion') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS ASIGNACION Y
COMIENZO DE ALERTAS GENERAR   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/generar') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS GENERAR Y
COMIENZO DE ALERTAS TRATAMIENTO    
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/tratamiento') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS TRATAMIENTO Y
COMIENZO DE ALERTAS CIERRE   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/cierre') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS CIERRE Y
COMIENZO DE ALERTAS CONSULTA   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/alertas/consulta') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS CONSULTA Y
COMIENZO DE ALERTAS REPORTE R70   
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/alertas/reporteR70') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS REPORTE R70 Y
COMIENZO DE  ALERTAS STATUS  
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/alertas/status') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ALERTAS STATUS Y
COMIENZO DE  DEFINE MODULOS  
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/capacitacion/defineModulos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE DEFINE MODULOS Y
COMIENZO DE  CAPACITACION CATEGORIAS  
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/capacitacion/categorias') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CAPACITACION CATEGORIAS Y
COMIENZO DE  DEFINE CICLOS  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/defineCiclos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE DEFINE CICLOS Y
COMIENZO DE CAPACITACION REGISTRO   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/capacitacion/registro') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CAPACITACION REGISTRO Y
COMIENZO DE CAPACITACION REPORTE   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/capacitacion/reporte') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CAPACITACION REPORTE  Y
COMIENZO DE CAPACITACION LEGAJOS   
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/capacitacion/formularioLegajos') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE CAPACITACION LEGAJOS  Y
COMIENZO DE REPORTES REPORTES   
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/reportes/reportes') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE REPORTES REPORTES  Y
COMIENZO DE  PROCESOS STATUS  
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/procesosStatus/procesosStatus') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE PROCESOS STATUS  Y
COMIENZO DE OPCIONES DE USUARIOS   
************************************************************************************
-->  
<?php if(isset($accion) && $accion == '/opcionesUsuario/opcionesUsuario') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE OPCIONES DE USUARIOS  Y
COMIENZO DE  NOTAS  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/notas/notas') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE NOTAS  Y
COMIENZO DE  AUTORIDADES  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/autoridad/autoridades') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE AUTORIDADES  Y
COMIENZO DE  ACCIONISTAS  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/accionistas/accionistas') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ACIONISTAS  Y
COMIENZO DE  FORMULARION DOCUMENTACION  
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/documentacion/formularioDocumentacion') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE FORMULARIO DOCUMENTACION  Y
COMIENZO DE RELACIONES    
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/relaciones/formularioRelaciones') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE RELACIONES  Y
COMIENZO DE ADJUNTO LISTA   
************************************************************************************
--> 
<?php if(isset($accion) && $accion == '/adjuntos/lista') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ADJUNTO LISTA  Y
COMIENZO DE   ACTIVIDADES 
************************************************************************************
-->
<?php if(isset($accion) && $accion == '/actividades/actividades') {  ?>
                     <br>
                     <div class="panel-success">       
                     <div class='alert alert-info text-left wrapper3'><abbr title=""><h5><?php echo $titulo ?></h5></abbr></div>
                     </div>
            
                     <table border="0" class="table-condensed"> 
                     <div class="text-left wrapper3">
                               <?php //echo "<pre div class='textopre'>"; echo $texto; echo "</pre>"; ?>
                               <?php 
                                $verconformato = stripslashes($texto);
                                $dar_enters= str_replace("\n","<br>",$verconformato);
                                $dar_espacops= str_replace(" "," ",$dar_enters); 
                                $tumgu = str_replace("Nueva Relación","<a class=''><i class='icon-plus text-info'></i> Nueva Relación</a>",$dar_espacops);
                                $tumgu2 = str_replace("Guardar","<input type='submit' value='Grabar' class='btn btn-success btn-mini'>",$tumgu);
                                $tumgu3 = str_replace("Nuevo Adjunto","<a class=''><i class='icon-plus text-info'></i> Nuevo Adjunto</a>",$tumgu2);
                                $tumgu4 = str_replace("+ Nuevo","<a class=''><i class='icon-plus text-info'></i> Nuevo</a>",$tumgu3);
                                $tumgu5 = str_replace("Filtrar","<input type='submit' value='Filtrar' class='btn btn-warning btn-mini'>",$tumgu4);
                                $tumgu6 = str_replace("Genera XML","<input type='submit' value='Genera XML' class='btn btn-success btn-mini'>",$tumgu5);
                                $tumgu7 = str_replace("Nueva Autoridad","<input type='submit' value='Nueva Autoridad' class='btn btn-success btn-mini'>",$tumgu6);
                                $tumgu8 = str_replace("Historico","<input type='submit' value='Historico' class='btn btn-warning btn-mini'>",$tumgu7);
                                $tumgu9 = str_replace("Nuevo accionista","<input type='submit' value='Nuevo accionista' class='btn btn-warning btn-mini'>",$tumgu8);
                                $tumgu10 = str_replace("Generar Alertas","<input type='submit' value='Generar Alertas' class='btn btn-warning btn-mini'>",$tumgu9);
                                $tumgu11 = str_replace("Procesar","<input type='submit' value='Procesar' class='btn btn-success btn-mini'>",$tumgu10);
                                $tumgu12 = str_replace("Visar clientes-autoridades","<input type='submit' value='Visar clientes-autoridades' class='btn btn-success btn-mini'>",$tumgu11);
                                $tumgu13 = str_replace("Confirmar","<input type='submit' value='Confirmar' class='btn btn-success btn-mini'>",$tumgu12);
                                $tumgu14 = str_replace("Eliminar","<a class='btn btn-mini'><i class='icon icon-remove text-error'></i></a>",$tumgu13);
                                $tumgu15 = str_replace("Nuevo registro","<input type='submit' value='Nuevo registro' class='btn btn-warning btn-mini'>",$tumgu14);
                                $tumgu16 = str_replace("Grabar Grilla","<input type='submit' value='Grabar Grilla' class='btn btn-success btn-mini'>",$tumgu15);
                                $tumgu17 = str_replace("Copia Total","<a class='btn btn-mini'><i class='icon-circle-arrow-up text-error'></i></a>",$tumgu16);
                                $tumgu18 = str_replace("Copia Destino","<a class='btn btn-mini'><i class='icon-circle-arrow-down text-success'></i></a>",$tumgu17);
                                $verconformato=$tumgu18;
                                echo "$verconformato";     
                     ?>
                     </div>
                     <br>
                            <tr>
                                <td><i class="icon-circle-arrow-right alert-info zoom"></i>&nbsp;<strong>Ver tambien:<span class="divider"></strong></td><td> <?php echo $relacion ?></td>
                            </tr>
                            
                    </table>
            
                    <br>
                    <div class="text-left">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="wrapperimg" style="background-color:transparent">
                    <div class="panel-body">
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                    </div></div></div>
        
<?php } ?>  

<!--  
************************************************************************************
FIN DE ADTIVIDADES  Y
COMIENZO DE    
************************************************************************************
-->
</div>
</div>