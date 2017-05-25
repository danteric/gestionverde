<?php
//*******************************//
//recibo el dato enviado por post//
    $accion = $valor;
    $contienealgo = $contienealgo;
//*******************************//
?>  


<!--
************************************************************************************
INICIO DE USUARIOS
************************************************************************************
-->
<!-- menu con pestaña o solapas-->
<!--       
<div class="row">
        <div class="tabs-left">
        <ul class="nav nav-tabs">
        <li class='active'><a href="#profesiones" data-toggle="tab">Profesiones</a></li>
        <li ><a href="#catalogos" data-toggle="tab">Catalogos</a></li>
        </ul>
        <div class="tab-content">
        <div class="tab-pane active" id="profesiones">
        <p>Profesiones</p>
        </div>
        <div class="tab-pane " id="catalogos">
        <p>Catalogos</p>
        </div>
        </div>
        </div>
</div>
-->

<script>
$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$(document).ready(function(){
 
    $('.ir-arriba').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
 
    $(window).scroll(function(){
        if( $(this).scrollTop() > 0 ){
            $('.ir-arriba').slideDown(300);
        } else {
            $('.ir-arriba').slideUp(300);
        }
    });
 
});
</script>

<?php if(isset($contienealgo) && $contienealgo != NULL) { ?>
       <div class="modal2 tipoframe4">
       <div class="panel-body">
       <a href="#" data-dismiss="modal"> <img src="/img/cross.png" class="zoom limpiar"  width="40px" title="Cerrar"></a> 
       <div id="fotocargando" style="width: 100%; text-align: center; display:none"><img src="/img/ajax-loader.gif"><p> <div class="text-info">Cargando</div></div>

<?php
foreach ($valor as $ayudagral) {
     $enlace   = $ayudagral['UHLP_ENLACE'];
     $titulo   = $ayudagral['UHLP_TITULO']; 
     $texto    = $ayudagral['UHLP_TEXTO'];
     $relacion = $ayudagral['UHLP_RELAC'];
     $img      = $ayudagral['UHLP_LOC_IMAGEN'];
     $ancho = $ayudagral['UHLP_IMGANCHO'];
?>
    
                     <br>
                     <div class='alert alert-info text-left '><abbr title=""><h5 style="color: red"><?php echo $titulo ?></h5></abbr></div>
                     <table border="0" class="table-condensed"> 
                     <div class="text-left bs-docs-example">
                               <br>
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
                     <br>
                            <tr >
                               <td><i class="icon-circle-arrow-right alert-info zoom"></i></td> <td class="wrapper5">&nbsp;<strong>Ver tambien:<span class="divider"></strong>&nbsp;<?php echo $relacion ?></td>
                            </tr>
                      <br>    
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="" style="background-color:transparent">
                    <div class="panel-body wrapper">
                       <br>
                       <br>
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                       <br>
                       <br>
                       <br>
                    </div>
                 </div>
              </div>
              
<?php } } else { ?> 
                 <h3 class="text-center">Manual del Usuario S.M.O.G.</h3>  
<?php 
foreach ($valor as $ayudagral) {
     $enlace   = $ayudagral['UHLP_ENLACE'];
     $titulo   = $ayudagral['UHLP_TITULO']; 
     $texto    = $ayudagral['UHLP_TEXTO'];
     $relacion = $ayudagral['UHLP_RELAC'];
     $img      = $ayudagral['UHLP_LOC_IMAGEN'];
     $ancho = $ayudagral['UHLP_IMGANCHO'];
?>
                     <span class="ir-arriba alert-info  btn-info"></span>
                     
                     <br>
                     <div class='alert alert-info text-left '><abbr title=""><h5 style="color: red"><?php echo $titulo ?></h5></abbr></div>
                     <table border="0" class="table-condensed"> 
                     <div class="text-left bs-docs-example">
                     <br>
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
                     <br>
                            <tr >
                               <td><i class="icon-circle-arrow-right alert-info zoom"></i></td> <td class="wrapper5">&nbsp;<strong>Ver tambien:<span class="divider"></strong>&nbsp;<?php echo $relacion ?></td>
                            </tr>
                      <br>    
                    </table>
            
                    <br>
                    <div class="text-center">
                    <?php if (isset($img) && $img != '') { ?>
                    <div class="" style="background-color:transparent">
                    <div class="panel-body wrapper">
                       <br>
                       <br>
                    <img src="/img/<?php echo $img; ?>" width="<?php if($ancho != ''){ echo $ancho.'px';}else {echo '380px';}?>" class="zoom wrapperimg" />
                        <?php } ?>
                       <br>
                       <br>
                       <br>
                    </div>
                 </div>
            </div> 
<?php } } ?> 