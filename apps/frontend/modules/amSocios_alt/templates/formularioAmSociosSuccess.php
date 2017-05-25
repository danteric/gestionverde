<script>
  cancelar = function() {
    location.href = '<?php echo url_for("amSocios/amSocios") ?>';
}
</script>

<script>
     var validarSociosForm = function(soci_codi,soci_ape,soci_nom,soci_tipo_codi,soci_domi,soci_barrio,soci_naci_f,soci_docu,soci_nacio,soci_tele)

      {    

         //alert(soci_codi+soci_ape+soci_nom);
         $.get("<?php echo url_for('amSocios/validaAmSocios') ?>", 
         { soci_codi  : soci_codi,
           soci_ape   : soci_ape,
           soci_nom   : soci_nom,
           soci_tipo_codi : soci_tipo_codi,
           soci_domi : soci_domi,
           soci_barrio : soci_barrio,
           soci_naci_f : soci_naci_f,
           soci_docu : soci_docu,
           soci_nacio : soci_nacio,
           soci_tele : soci_tele
         },
            function(data){
              info = JSON.parse(data);
            
        //al seleccionar un legajo envio el codigo el mensaje devuelta del plsql
        if(info != "OK"){
        $(".mostrarMensaje").html('<div class="alert alert-error">'+info+'</div>');
        //$("#"+ape).addClass('trcolor');
        }else{  
       // $("#marcaValidacion_"+marcarValidacion).html('<div class="combomedio3"> '+info+'</div>');
        $(".mostrarMensaje").html('<div class="alert alert-info">'+info+'</div>');
        //$("#editadoSiNo_"+marcarValidacion).val('SI');
        }
        //$('#spinner').hide();
        //return false;
              });
        
      }

$(document).ready(function(){
        // chequeo manulamente habilitado para dar de alta o no
         $('.validarB').click(function()
                     {
                       var soci_codi = <?php echo $soci_codi; ?>;
                       var soci_ape = $('#soci_ape').val();
                       var soci_nom = $('#soci_nom').val();
                       var soci_tipo_codi = $('#soci_tipo_codi').val();
                       var soci_domi = $('#soci_domi').val();
                       var soci_barrio = $('#soci_barrio').val();
                       var soci_naci_f = $('#soci_naci_f').val();
                       var soci_docu = $('#soci_docu').val();
                       var soci_nacio = $('#soci_nacio').val();
                       var soci_tele = $('#soci_tele').val();

                       validarSociosForm(soci_codi,soci_ape,soci_nom,soci_tipo_codi,soci_domi,soci_barrio,soci_naci_f,soci_docu,soci_nacio,soci_tele);
                     });
                   });
 </script>

<!--
<form id="datosCapacitacionForm" class="formularioValidado datosCapacitacionForm" name="datosCapacitacionForm" method="POST" action="<?php echo url_for("amSocios/formularioAmSocios") ?>" onsubmit="return valida_sp()">
--> 
<div class="row-fluid mostrarMensaje" id="flashMessages">
      
</div>
<form id="datosAmSociosForm" class="formularioValidado datosAmSociosForm" name="datosAmSociosForm" method="POST" action="<?php echo url_for("amSocios/formularioAmSocios") ?>" >

<?php $cabecera = (new Cabecera())-> 
  ruta('Socios')->
  ruta(link_to(__("Socios"), 'amSocios/amSocios'))  ;
  if($_SESSION["usuario"]["modi"] == "S"):
        $cabecera->accion('<input type="button"  value="Validar" class="btn btn-warning validarB" />');
        $cabecera->accion('<input type="submit" onclick="exCluir()" value="Grabar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar()" value="Cancelar"  class="btn alert-info"/>');
  endif;

  //if($alta!='1'):
  //$cabecera->accion(sprintf('<button type="button" data-target="#agregar_valores" data-toggle="modal"  onclick="CargarHelp();" class="btn btn-danger"><i class="icon-question-sign"></i> Ayuda</button>'));
  //endif;
  if(empty($soci_codi)):
    $cabecera->titulo(__("Nuevo Socio"))->ruta(__("Nuevo Socio"));
  else:
    $cabecera->titulo(__("Editando Socio #".$soci_codi))->ruta(__("Editando Socio #".$soci_codi));
  endif;
  echo $cabecera;
?>

<input type="hidden" id="alta" name="alta" value="<?php echo $alta ?>" />

<table>
           <tr>
            <td>
                <table class="responsiveWidth onlytablesorter table table-hover table-striped table-bordered">
                      <thead>
                          <tr class="alert-success wrapper">

                              <th style="text-align:left; width: 50%;">Datos personales</th>
                              <th style="text-align:center; width: 20%;">Foto</th>
                              <th style="text-align:center; width: 40%;">Actividad</th>
                            
                          </tr>
                      </thead>
                      <tbody>
                            <tr>
                              <td> <!-- begin Grilla 1 arriba -->

          <table>
                 
                      <tr>
                          <td width="15%"><?php echo __("Nro Socio: ")?></td>
                          <td><input type="text" id="" name="" disabled="true" class="input-medium" value="<?php echo $soci_codi ?>" />
                            <input type="hidden" id="soci_codi" name="soci_codi"  class="input-medium" value="<?php echo $soci_codi ?>" />

                          </td>      
                          <td width="15%"><?php echo __("Categoria: ")?></td>
                          <td>
                          <?php $optionsSelect = $sf_data->getRaw('soc_tipos'); ?>
                          <select id="soci_tipo_codi" name="soci_tipo_codi" class="input-medium required" >  
                              <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                                  <option <?php if($soci_tipo_codi==$arraySelect["tipo_codi"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["tipo_codi"] ?>"><?php echo $arraySelect["tipo_deno"] ?></option>
                              <?php } ?>
                          </select>
                          </td>      
                      </tr>
                     <tr>
                          <td width="15%"><?php echo __("Apellido: ")?></td>
                          <td><input type="text" id="soci_ape" class="input-large" name="soci_ape" required value="<?php echo $soci_ape ?>" /></td>
                          <td width="15%"><?php echo __("Nombre: ")?></td>
                          <td><input type="text" id="soci_nom" class="input-large" name="soci_nom" required value="<?php echo $soci_nom ?>" /></td>
                      </tr>
                      <tr>
                          <td width="15%"><?php echo __("Domicilio: ")?></td>
                          <td><input type="text" id="soci_domi" class="input-large" name="soci_domi" required value="<?php echo $soci_domi ?>" /></td>
                          <td width="15%"><?php echo __("Barrio: ")?></td>
                          <td>
                          <?php $optionsSelect = $sf_data->getRaw('barrios'); ?>
                          <select id="soci_barrio" name="soci_barrio" class="input-large required" >  
                              <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                                  <option <?php if($soci_barrio==$arraySelect["barr_id"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["barr_id"] ?>"><?php echo $arraySelect["barr_deno"] ?></option>
                              <?php } ?>
                          </select>
                          </td>
                      </tr>
                      <tr>
                          <td width="15%"><?php echo __("Teléfono: ")?></td>
                          <td><input type="text" id="soci_tele" class="input-large" name="soci_tele"  value="<?php echo $soci_tele ?>" /></td>
                          <td width="15%"><?php echo __("Nro.Documento: ")?></td>
                          <td><input type="text" id="soci_docu" class="input-large" name="soci_docu"  value="<?php echo $soci_docu ?>" /></td>
                      </tr>
                      <tr>
                          <td width="15%"><?php echo __("F.Nacim: ")?></td>
                          <td><input type="text" id="soci_naci_f" class="required datepicker" name="soci_naci_f" required value="<?php echo $soci_naci_f ?>" /></td>
                          <td width="15%"><?php echo __("Nacionalidad: ")?></td>
                          <td>
                          <?php $optionsSelect = $sf_data->getRaw('nacionalidad'); ?>
                          <select id="soci_nacio" name="soci_nacio" class="input-large required" >  
                              <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                                  <option <?php if($soci_nacio==$arraySelect["sona_id"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["sona_id"] ?>"><?php echo $arraySelect["sona_deno"] ?></option>
                              <?php } ?>
                          </select>
                          </td>
                      </tr>
                      <tr>
                          <td width="15%"><?php echo __("F.Ingreso: ")?></td>
                          <td><?php echo $soci_ingre_f,"         #Carnets:",$soci_cant_imp_carnets ?></td>
                          <td width="15%"><?php echo __("F.Baja: ")?></td>
                          <td><input type="text" id="soci_baja_f" name="soci_baja_f" disabled="true" class="input-medium" value="<?php echo $soci_baja_f ?>" /></td>
                      </tr>

                  </table>
                            </td> <!-- End Grilla 1 arriba -->
                            <td> <!-- Begin Grilla 2 arriba -->
                  <table>
                      <tr>
                      <td><br><img align="middle" src="/img/fotoVacia.jpg"><br></td>       
                      </tr>
                      <tr>
                      <td><input type="buttom" value="Cargar desde ..." class="btn btn-success" /></td>
                      </tr>                  
                  </table>

                      </td> <!-- End Grilla 2 arriba -->
                      <td> <!-- Begin Grilla 3 arriba -->

                  <table  class="responsiveWidth onlytablesorter table table-hover table-striped table-bordered">
                       <?php $c = 0; foreach($actividades as $row) { ?>
      
                         <tr>
                            
                            <td  style="text-align:left" class=""> 
                              <fieldset class="tasks-list">
                              <label class="tasks-list-item" style="padding: 0px 0px;">
                                <input type="checkbox"  name="sociosActi['<?php echo $c ?>']"  style="display: none" id="sociosActi<?php echo $row['acti_acti'] ?>" value="<?php echo $row['acti_acti'] ?>" class="tasks-list-cb micheckbox">
                                <span class="tasks-list-mark" title="Alta/Modificacion"></span>
                                <span class="tasks-list-desc"></span>
                              </label>
                              </fieldset> 
                              </td>
                            <td class="text-left">
                               <?php echo $row['acti_deno'] ?>
                            </td>
                            
                    </tr>  

<!----------JQUERY PARA CHECKBOX-------------->
<script>
$(document).ready(function () 
{
  var cheka = '<?php echo $row['acti_si_no'] ?>';
  //alert(cheka);
  if(cheka == 'S'){
    $("#sociosActi<?php echo $row['acti_acti'] ?>").attr("checked", "checked");
  }

$('.micheckbox').click(function() {
    $(".mensjok").hide(1000);

});
});
       var exCluir = function(fila){
            var todosChecks = '';   
            //hago un bucle en jquery   
             $('.micheckbox:checked').each(
                function() {
                    var todosChecks = $(this).val();                  
                    var myArray = [todosChecks];
     
                }
             );
      } 
</script>
            <?php 
            $c++; 
            } 
            ?>
                  </table>
                      </td> <!-- End Grilla 3 arriba -->
                      </tr>
                  </tbody>
        </tr>

        <!-- grillas de abajo  solo son de consulta-->
        <tr>

        <table class="responsiveWidth onlytablesorter table table-hover table-striped table-bordered">
              <thead>
                  <tr class="alert-success wrapper">

                      <th style="text-align:left; width: 60%;">Historial de pagos</th>
                      <th style="text-align:left; width: 30%;">Ultimo pago registrado</th>
                      <th style="text-align:left; width: 10%;">Log cambios</th>
                     
                  </tr>
              </thead>
                  <tbody>
                  <tr>
                     <td class="">  <!-- Begin Grila de registro de pagos (es solo consulta )-->

              <table class="responsiveWidth onlytablesorter table table-hover table-striped table-bordered">
              <thead>
                  <tr class="alert-success wrapper">

                      <th style="text-align:left; width: 4%; background-color:lightgrey;">Año</th>
                      <th style="text-align:left; width: 8%;">Ene</th>
                      <th style="text-align:left; width: 8%;">Feb</th>
                      <th style="text-align:left; width: 8%;">Mar</th>
                      <th style="text-align:left; width: 8%;">Abr</th>
                      <th style="text-align:left; width: 8%;">Mayo</th>
                      <th style="text-align:left; width: 8%;">Jun</th>
                      <th style="text-align:left; width: 8%;">Jul</th>
                      <th style="text-align:left; width: 8%;">Ago</th>
                      <th style="text-align:left; width: 8%;">Sep</th>
                      <th style="text-align:left; width: 8%;">Oct</th>
                      <th style="text-align:left; width: 8%;">Nov</th>
                      <th style="text-align:left; width: 8%;">Dic</th>
                     
                  </tr>
              </thead>
              <tbody>
                  <?php $optionsSelect = $sf_data->getRaw('regpagos'); ?>
                  <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                  <tr>
                     <td style="text-align:left; background-color:lightgrey;"><?php echo $arraySelect["anio"] ?></td>
                     <td><?php echo $arraySelect["mes01"] ?></td>
                     <td><?php echo $arraySelect["mes02"] ?></td>
                     <td><?php echo $arraySelect["mes03"] ?></td>
                     <td><?php echo $arraySelect["mes04"] ?></td>
                     <td><?php echo $arraySelect["mes05"] ?></td>
                     <td><?php echo $arraySelect["mes06"] ?></td>
                     <td><?php echo $arraySelect["mes07"] ?></td>
                     <td><?php echo $arraySelect["mes08"] ?></td>
                     <td><?php echo $arraySelect["mes09"] ?></td>
                     <td><?php echo $arraySelect["mes10"] ?></td>
                     <td><?php echo $arraySelect["mes11"] ?></td>
                     <td><?php echo $arraySelect["mes12"] ?></td>
                   </tr>
                   <?php } ?>                 
              </tbody>
              </table>

                     </td>  <!-- End Grila de registro de pagos (es solo consulta )-->
                     <td>   <!-- Begin Grila de ultimo pagos (es solo consulta )-->
              <table class="responsiveWidth onlytablesorter table table-hover table-striped table-bordered">
         <!--     <thead>
                  <tr class="alert-success wrapper">
                      <th style="text-align:center;" colspan="2">Ultimo Pago registrado</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
              -->
                  <?php $optionsSelect = $sf_data->getRaw('ultpago'); ?>
                  <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                  <tr>
                     <td style="text-align:left; background-color:lightgrey;"><?php echo $arraySelect["anio"] ?></td>
                     <td><?php echo $arraySelect["det"] ?></td>
                     <td><?php echo $arraySelect["val"] ?></td>
                   </tr>
                   <?php } ?>                 
          <!--    </tbody>   -->
              </table>
                     
                     </td>   <!-- End Grila de ultimo pagos (es solo consulta )-->
                      <td class="">Datos log</td> 
                  </tr>
              </tbody>
          </table>
    
        </tr>

        </table>
 <!-- </table>  -->
 

 </form>


