
<!-- ***************************************************************** -->
<script>
/*
function iniMostrarLoad(form){
    if(form.codigo.value != '' && form.descripcion.value != '' && form.cotizacion.value != '')
        mostrarLoad();
    else
        return false;
*/

  mostrarSubProvin_p = function() {

    $.post("<?php echo url_for('datosEncuestas/comboSubprovin_p') ?>",
    { 
     p_id_pais:         $("#p_id_pais").val(),  
     codigoProvincia_p: $("#codigoProvincia_p").val(),
    },  
          function(data){
              $('#resulSubprov_p').html(data);
              startTableOnlySorter();
          });
  }

   $(document).ready(function(){
        mostrarSubProvin_p();
  });

 mostrarSubProvin_m = function() {

    $.post("<?php echo url_for('datosEncuestas/comboSubprovin_m') ?>",
    { 
     m_id_pais:         $("#m_id_pais").val(),  
     codigoProvincia_m: $("#codigoProvincia_m").val(),
    },  
          function(data){
              $('#resulSubprov_m').html(data);
              startTableOnlySorter();
          });
  }
   $(document).ready(function(){
        mostrarSubProvin_m();
  });



$(document).ready(function(){    

    // llamado automatico para mostrar nombre de lalocal
    var locaString = $("#p_loca_actual").val()+','+$("#codigoProvincia_p").val()+','+$("#p_id_pais").val();
    mostrarNombreGenerico(locaString,'loca_prov','p_datosinfo');
    //autocomplete//
    $('.p_datosinfo').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#p_id_pais").val();
        var prov = $("#p_id_provincia").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;
    

        console.log(dataString);
        $("#p_id_localidad").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado_p').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#p_id_localidad").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado_p').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#p_datosinfo').val($('#'+id).attr('data2'));
                                $('#p_loca_actual').val($('#'+id).attr('data'));
                                
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado_p').hide();
                     
                });  
          
         } });     
       
    });
    });



$(document).ready(function(){    
    // llamado automatico para mostrar nombre de lalocal
    var locaString = $("#m_loca_actual").val()+','+$("#codigoProvincia_m").val()+','+$("#m_id_pais").val();
    mostrarNombreGenerico(locaString,'loca_prov','m_datosinfo');
    //autocomplete//
    $('.m_datosinfo').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#m_id_pais").val();
        var prov = $("#codigoProvincia_m").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        console.log(dataString);
        $("#m_id_localidad").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado_m').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#m_id_localidad").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado_m').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#m_datosinfo').val($('#'+id).attr('data2'));
                                $('#m_loca_actual').val($('#'+id).attr('data'));
                               
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado_m').hide();
                    
                });  
          
         } });     
       
    });
    });


</script>

<!-- ***************************************************************** -->

<div class="mensaje"></div>
<input type="hidden"  id="sindatos"  name="sindatos" value="<?php echo $sindatos; ?>" />  
<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
    <div class="panel-body">

        <?php //if ($sindatos == '1') { ?>  
           
<?php foreach($cursor as $row) { }?>


 <!-- En un móvil las columnas ocupan la mitad del dispositivo y en un 
     ordenador ocupan un cuarto parte de la anchura disponible -->
<div class="row">
  <div class="col-xs-12 col-md-6"><h3><b>Datos del Padre</b></h3>
  <br>
      <div class="form-group form-group-sm">
        <label for="p_id_nivelinstruccion" class="col-sm-3 control-label">Nivel Instrucción</label>
        <div class="col-sm-6">
             <?php $optionsSelect = $sf_data->getRaw('dd_item');?>
              <select id="p_id_nivelinstruccion" name="p_id_nivelinstruccion" class="form-control">
                  <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                      <option data="<?php echo $arraySelect["ceei_id_nivelinstruccion"] ?>" <?php if($row['p_id_nivelinstruccion']==$arraySelect["ceei_id_nivelinstruccion"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["ceei_id_nivelinstruccion"] ?>"><?php echo $arraySelect["ceei_deno"] ?></option> 
                  <?php } ?>
              </select>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_apellido" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_apellido" name="p_apellido"  value="<?php echo $row['p_apellido'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_nombre" name="p_nombre"  value="<?php echo $row['p_nombre'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_domicilio" class="col-sm-3 control-label">Domicilio</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_domicilio" name="p_domicilio"  value="<?php echo $row['p_domicilio'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_codigopostal" class="col-sm-3 control-label">Cod postal</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_codigopostal" name="p_codigopostal"  value="<?php echo $row['p_codigopostal'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_id_pais" class="col-sm-3 control-label">Pais</label>
        <div class="col-sm-6">
               <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                <select id="p_id_pais" name="p_id_pais" class="form-control" onchange="mostrarSubProvin_p()">
                    <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                        <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['p_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                    <?php } ?>
                </select>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="codigoProvincia_p" class="col-sm-3 control-label">Provincia</label>
        <div class="col-sm-6">
              <input type="hidden" id="codigoProvincia_p" value="<?php echo $row['p_id_provincia'] ?>" />
              <b id="resulSubprov_p"></b>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_id_localidad" class="col-sm-3 control-label">Localidad</label>
        <div class="col-sm-6">
                <i id="p_id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                <input type='text' id="p_datosinfo"  placeholder="Escriba localidad" class='form-control p_datosinfo limpiarcampo' value=''>
                <input type="hidden" id="p_loca_actual" name="p_loca_actual" value="<?php echo $row['p_id_localidad']?>" />
                <div id="muestroayudabuscado_p"></div>
                <b class="focusMensajes" id="focusMensajes" ></b>  
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="p_te" class="col-sm-3 control-label">Teléfono Fijo</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_te" name="p_te"  value="<?php echo $row['p_te'] ?>"/>
        </div>
       </div>

      <div class="form-group form-group-sm">
        <label for="p_celular" class="col-sm-3 control-label">Teléfono celular</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_celular" name="p_celular"  value="<?php echo $row['p_celular'] ?>"/>
        </div>
       </div>

      <div class="form-group form-group-sm">
        <label for="p_email" class="col-sm-3 control-label">E-Mail</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="p_email" name="p_email"  value="<?php echo $row['p_email'] ?>"/>
        </div>
       </div>

  <br>

  </div>
  <!-- Grilla -->
  <div class="col-xs-12 col-md-6"><h3><b>Datos de la Madre</b></h3>
  <br>
      <div class="form-group form-group-sm">
        <label for="m_id_nivelinstruccion" class="col-sm-3 control-label">Nivel Instrucción</label>
         <div class="col-sm-6">
               <?php $optionsSelect = $sf_data->getRaw('dd_item');?>
                <select id="m_id_nivelinstruccion" name="m_id_nivelinstruccion" class="form-control">
                    <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                        <option data="<?php echo $arraySelect["ceei_id_nivelinstruccion"] ?>" <?php if($row['m_id_nivelinstruccion']==$arraySelect["ceei_id_nivelinstruccion"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["ceei_id_nivelinstruccion"] ?>"><?php echo $arraySelect["ceei_deno"] ?></option> 
                    <?php } ?>
                </select>
          </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_apellido" class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_apellido" name="m_apellido"  value="<?php echo $row['m_apellido'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_nombre" name="m_nombre"  value="<?php echo $row['m_nombre'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_domicilio" class="col-sm-3 control-label">Domicilio</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_domicilio" name="m_domicilio"  value="<?php echo $row['m_domicilio'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_codigopostal" class="col-sm-3 control-label">Cod postal</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_codigopostal" name="m_codigopostal"  value="<?php echo $row['m_codigopostal'] ?>"/>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_id_pais" class="col-sm-3 control-label">Pais</label>
        <div class="col-sm-6">
               <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                <select id="m_id_pais" name="m_id_pais" class="form-control" onchange="mostrarSubProvin_m()">
                    <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                        <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['m_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                    <?php } ?>
                </select>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="codigoProvincia_m" class="col-sm-3 control-label">Provincia</label>
        <div class="col-sm-6">
              <input type="hidden" id="codigoProvincia_m" value="<?php echo $row['m_id_provincia'] ?>" />
              <b id="resulSubprov_m"></b>
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_id_localidad" class="col-sm-3 control-label">Localidad</label>
        <div class="col-sm-6">
                <i id="m_id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                <input type='text' id="m_datosinfo"  placeholder="Escriba localidad" class='form-control m_datosinfo limpiarcampo' value=''>
                <input type="hidden" id="m_loca_actual" name="m_loca_actual" value="<?php echo $row['m_id_localidad']?>" />
                <div id="muestroayudabuscado_m"></div>
                <b class="focusMensajes" id="focusMensajes" ></b>  
        </div>
      </div>

      <div class="form-group form-group-sm">
        <label for="m_te" class="col-sm-3 control-label">Teléfono Fijo</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_te" name="m_te"  value="<?php echo $row['m_te'] ?>"/>
        </div>
       </div>

      <div class="form-group form-group-sm">
        <label for="m_celular" class="col-sm-3 control-label">Teléfono celular</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_celular" name="m_celular"  value="<?php echo $row['m_celular'] ?>"/>
        </div>
       </div>

      <div class="form-group form-group-sm">
        <label for="m_email" class="col-sm-3 control-label">E-Mail</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="m_email" name="m_email"  value="<?php echo $row['m_email'] ?>"/>
        </div>
       </div>

  </div>
</div>


    
</div>  

