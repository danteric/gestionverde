
<!-- ***************************************************************** -->
<script>
/*
function iniMostrarLoad(form){
    if(form.codigo.value != '' && form.descripcion.value != '' && form.cotizacion.value != '')
        mostrarLoad();
    else
        return false;
*/

  mostrarSubProvin_pro = function() {

    $.post("<?php echo url_for('modificaPersonales/comboSubprovin_pro') ?>",
    { 
     calu_id_pais_pro:     $("#calu_id_pais_pro").val(),  
     codigoProvincia:      $("#codigoProvincia").val(),
    },  
          function(data){
              $('#resulSubprov_pro').html(data);
              startTableOnlySorter();
          });
  }

   $(document).ready(function(){
        mostrarSubProvin_pro();
  });

 mostrarSubProvin = function() {

    $.post("<?php echo url_for('modificaPersonales/comboSubprovin') ?>",
    { 
     calu_id_pais:      $("#calu_id_pais").val(),  
     codigoProvin:      $("#codigoProvin").val(),
    },  
          function(data){
              $('#resulSubprov').html(data);
              startTableOnlySorter();
          });
  }
   $(document).ready(function(){
        mostrarSubProvin();
  });



$(document).ready(function(){    

    // llamado automatico para mostrar nombre de lalocal
    var locaString = $("#loca_actual_pro").val()+','+$("#codigoProvincia").val()+','+$("#calu_id_pais_pro").val();
    mostrarNombreGenerico(locaString,'loca_prov','datosinfo_pro');
    //autocomplete//
    $('.datosinfo_pro').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#calu_id_pais_pro").val();
        var prov = $("#calu_id_provincia_pro").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        console.log(dataString);
        $("#calu_id_localidad_pro").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado_pro').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#calu_id_localidad_pro").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado_pro').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo_pro').val($('#'+id).attr('data2'));
                                $('#loca_actual_pro').val($('#'+id).attr('data'));
                                //cargarGrilla($('#loca_actual_pro').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado_pro').hide();
                     //$('.datosinfo_pro').val('');
                });  
          
         } });     
       
    });
    });



$(document).ready(function(){    
    // llamado automatico para mostrar nombre de lalocal
    var locaString = $("#loca_actual").val()+','+$("#codigoProvin").val()+','+$("#calu_id_pais").val();
    mostrarNombreGenerico(locaString,'loca_prov','datosinfo');
    //autocomplete//
    $('.datosinfo').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#calu_id_pais").val();
        var prov = $("#calu_id_provincia").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        console.log(dataString);
        $("#calu_id_localidad").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#calu_id_localidad").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo').val($('#'+id).attr('data2'));
                                $('#loca_actual').val($('#'+id).attr('data'));
                                //cargarGrilla($('#loca_actual_pro').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado').hide();
                     //$('.datosinfo_pro').val('');
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

        <?php if ($sindatos == '1') { ?>  
           

<?php $msg = '( modif a confirmar, valor orig.: ' ?>

<?php foreach($datos as $row) { ?>


<!-- <form class="form-horizontal"> -->
  <h3><b>Datos de identificación</b></h3>
  <div class="form-group form-group-sm">
    <label for="apellido" class="col-sm-2 control-label">Apellido/s</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="apellido" name="calu_apellido" required value="<?php echo $row['calu_apellido'] ?>"/>
    </div>
    <?php if($row['conf_apellido']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_apellido'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="nombre" class="col-sm-2 control-label">Nombre/s</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nombre" name="calu_nombre" required value="<?php echo $row['calu_nombre'] ?>"/>
    </div>
    <?php if($row['conf_nombre']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_nombre'],')','</b></div>'; }; ?>
  </div>
 
  <div class="form-group form-group-sm">
    <label for="id_sexo" class="col-sm-2 control-label">Sexo</label>
    <div class="col-sm-4">
           <?php $optionsSelect = $sf_data->getRaw('dd_sexo');?>
            <select id="id_sexo" name="calu_id_sexo" class="form-control" width="40%">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["csex_id_sexo"] ?>" <?php if($row['calu_id_sexo']==$arraySelect["csex_id_sexo"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["csex_id_sexo"] ?>"><?php echo $arraySelect["csex_sexo"] ?></option> 
                <?php } ?>
            </select>
    </div>
    <?php if($row['conf_id_sexo']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_sexo'],')','</b></div>'; }; ?>
  </div>

 <div class="form-group form-group-sm">
    <label for="id_paisemision" class="col-sm-2 control-label">Pais de emisión</label>
    <div class="col-sm-4">
            <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
            <select id="id_paisemision" name="calu_id_paisemision" class="form-control" width="40%">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_paisemision']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                <?php } ?>
            </select> 
    </div>
    <?php if($row['conf_id_paisemision']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_paisemision'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="id_nacionalidad" class="col-sm-2 control-label">Nacionalidad</label>
    <div class="col-sm-4">
            <?php $optionsSelect = $sf_data->getRaw('dd_nacio');?>
            <select id="id_nacionalidad" name="calu_id_nacionalidad" class="form-control" width="40%">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cnac_id_nacionalidad"] ?>" <?php if($row['calu_id_nacionalidad']==$arraySelect["cnac_id_nacionalidad"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cnac_id_nacionalidad"] ?>"><?php echo $arraySelect["cnac_nacionalidad"] ?></option> 
                <?php } ?>
            </select> 
    </div>
    <?php if($row['conf_id_nacionalidad']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_nacionalidad'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="tipodoc" class="col-sm-2 control-label">Tipo de documento</label>
    <div class="col-sm-4">
            <?php $optionsSelect = $sf_data->getRaw('dd_tdoc');?>
            <select id="tipodoc" name="calu_id_tipodoc" class="form-control" width="40%">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["ctdc_id_tipodoc"] ?>" <?php if($row['calu_id_tipodoc']==$arraySelect["ctdc_id_tipodoc"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["ctdc_id_tipodoc"] ?>"><?php echo $arraySelect["ctdc_tipodoc"] ?></option> 
                <?php } ?>
            </select>      
    </div>
    <?php if($row['conf_id_tipodoc']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_tipodoc'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="nrodoc" class="col-sm-2 control-label">Nº de documento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nrodoc" name="calu_nrodoc" required value="<?php echo $row['calu_nrodoc'] ?>"/>
    </div>
    <?php if($row['conf_nrodoc']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_nrodoc'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="cuil" class="col-sm-2 control-label">CUIL/T</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="cuil" name="calu_cuil" required value="<?php echo $row['calu_cuil'] ?>"/>
    </div>
    <?php if($row['conf_cuil']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_cuil'],')','</b></div>'; }; ?>
  </div>

  <br>
  <h4><b>Datos de nacimiento</b></h4>

  <div class="form-group form-group-sm">
    <label for="fechanac" class="col-sm-2 control-label">Fecha de nacimiento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="fechanac" name="calu_fechanac" required value="<?php echo $row['calu_fechanac'] ?>"/>
    </div>
    <?php if($row['conf_fechanac']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_fechanac'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="id_paisnac" class="col-sm-2 control-label">País de nacimiento</label>
    <div class="col-sm-4">
            <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
            <select id="id_paisnac" name="calu_id_paisnac" class="form-control" >
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_paisnac']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                <?php } ?>
            </select>
    </div>
    <?php if($row['conf_id_paisnac']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_paisnac'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="lugarnacimiento" class="col-sm-2 control-label">Provincia / Estado de nacimiento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="lugarnacimiento" name="calu_lugarnacimiento"  value="<?php echo $row['calu_lugarnacimiento'] ?>"/>
    </div>
    <?php if($row['conf_lugarnacimiento']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_lugarnacimiento'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="distritonacimiento" class="col-sm-2 control-label">Ciudad / Localidad / Partido</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="distritonacimiento" name="calu_distritonacimiento"  value="<?php echo $row['calu_distritonacimiento'] ?>"/>
    </div>
    <?php if($row['conf_distritonacimiento']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_distritonacimiento'],')','</b></div>'; }; ?>
  </div>

  <br>
  <h4><b>Domicilio de procedencia</b></h4>

  <div class="form-group form-group-sm">
    <label for="calle_pro" class="col-sm-2 control-label">Calle</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="calle_pro" name="calu_calle_pro"  value="<?php echo $row['calu_calle_pro'] ?>"/>
    </div>
    <?php if($row['conf_calle_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_calle_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="nro_pro" class="col-sm-2 control-label">Número</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nro_pro" name="calu_nro_pro"  value="<?php echo $row['calu_nro_pro'] ?>"/>
    </div>
    <?php if($row['conf_nro_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_nro_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="piso_pro" class="col-sm-2 control-label">Piso</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="piso_pro" name="calu_piso_pro"  value="<?php echo $row['calu_piso_pro'] ?>"/>
    </div>
    <?php if($row['conf_piso_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_piso_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="depto_pro" class="col-sm-2 control-label">Departamento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="depto_pro" name="calu_dto_pro"  value="<?php echo $row['calu_dto_pro'] ?>"/>
    </div>
    <?php if($row['conf_dto_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_dto_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="codigopostal_pro" class="col-sm-2 control-label">Código postal</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="codigopostal_pro" name="calu_codigopostal_pro"  value="<?php echo $row['calu_codigopostal_pro'] ?>"/>
    </div>
    <?php if($row['conf_codigopostal_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_codigopostal_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="calu_id_pais_pro" class="col-sm-2 control-label">País</label>
    <div class="col-sm-4">
           <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
            <select id="calu_id_pais_pro" name="calu_id_pais_pro" class="form-control" onchange="mostrarSubProvin_pro()">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_pais_pro']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                <?php } ?>
            </select>
    </div>
    <?php if($row['conf_id_pais_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_pais_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="codigoProvincia" class="col-sm-2 control-label">Provincia / Estado</label>
    <div class="col-sm-4">
           <input type="hidden" id="codigoProvincia" value="<?php echo $row['calu_id_provincia_pro'] ?>"  />
                    <b id="resulSubprov_pro"> </b>
    </div>
    <?php if($row['conf_id_provincia_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_provincia_pro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="calu_id_localidad_pro" class="col-sm-2 control-label">Ciudad / Localidad / Partido</label>
    <div class="col-sm-4">
           <i id="calu_id_localidad_pro" style="display:none" class="icon-spinner icon-spin icon-large"></i> 
            <input type='text' id="datosinfo_pro"   placeholder="Escriba localidad" class='form-control datosinfo_pro limpiarcampo' value=''>
            <input type="hidden" id="loca_actual_pro" name="loca_actual_pro" value="<?php echo $row['calu_id_localidad_pro']?>" />
            <div id="muestroayudabuscado_pro"></div>
            <b class="focusMensajes" id="focusMensajes" ></b> 
    </div>
    <?php if($row['conf_id_localidad_pro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_localidad_pro'],')','</b></div>'; }; ?>
  </div>

 <br>
  <h4><b>Domicilio de residencia actual</b></h4>

  <div class="form-group form-group-sm">
    <label for="calle" class="col-sm-2 control-label">Calle</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="calle" name="calu_calle"  value="<?php echo $row['calu_calle'] ?>"/>
    </div>
    <?php if($row['conf_calle']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_calle'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="nro" class="col-sm-2 control-label">Número</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nro" name="calu_nro"  value="<?php echo $row['calu_nro'] ?>"/>
    </div>
    <?php if($row['conf_nro']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_nro'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="piso" class="col-sm-2 control-label">Piso</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="piso" name="calu_piso"  value="<?php echo $row['calu_piso'] ?>"/>
    </div>
    <?php if($row['conf_piso']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_piso'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="depto" class="col-sm-2 control-label">Departamento</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="depto" name="calu_dto"  value="<?php echo $row['calu_dto'] ?>"/>
    </div>
    <?php if($row['conf_dto']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_dto'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="codigopostal" class="col-sm-2 control-label">Código postal</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="codigopostal" name="calu_codigopostal"  value="<?php echo $row['calu_codigopostal'] ?>"/>
    </div>
    <?php if($row['conf_codigopostal']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_codigopostal'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="calu_id_pais" class="col-sm-2 control-label">País</label>
    <div class="col-sm-4">
           <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
            <select id="calu_id_pais" name="calu_id_pais" class="form-control" onchange="mostrarSubProvin()">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                <?php } ?>
            </select>
    </div>
    <?php if($row['conf_id_pais']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_pais'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="codigoProvin" class="col-sm-2 control-label">Provincia / Estado</label>
    <div class="col-sm-4">
          <input type="hidden" id="codigoProvin" value="<?php echo $row['calu_id_provincia'] ?>" />
          <b id="resulSubprov"></b>
    </div>
    <?php if($row['conf_id_provincia']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_provincia'],')','</b></div>'; }; ?>
  </div>

  <div class="form-group form-group-sm">
    <label for="calu_id_localidad" class="col-sm-2 control-label">Ciudad / Localidad / Partido</label>
    <div class="col-sm-4">
            <i id="calu_id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i>
            <input type='text' id="datosinfo"  placeholder="Escriba localidad" class='form-control datosinfo limpiarcampo' value=''>
            <input type="hidden" id="loca_actual" name="loca_actual" value="<?php echo $row['calu_id_localidad']?>" />
            <div id="muestroayudabuscado"></div>
            <b class="focusMensajes" id="focusMensajes" ></b>  
    </div>
    <?php if($row['conf_id_localidad']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_id_localidad'],')','</b></div>'; }; ?>
  </div>

  <br>
  <h4><b>Datos de contacto</b></h4>

  <div class="form-group form-group-sm">
    <label for="te" class="col-sm-2 control-label">Teléfono particular</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="te" name="calu_te"  value="<?php echo $row['calu_te'] ?>"/>
    </div>
    <?php if($row['conf_te']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_te'],')','</b></div>'; }; ?>
   </div>

  <div class="form-group form-group-sm">
    <label for="celular" class="col-sm-2 control-label">Teléfono celular</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="celular" name="calu_celular"  value="<?php echo $row['calu_celular'] ?>"/>
    </div>
    <?php if($row['conf_celular']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_celular'],')','</b></div>'; }; ?>
   </div>

  <div class="form-group form-group-sm">
    <label for="email" class="col-sm-2 control-label">E-Mail 1</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email" name="calu_email"  value="<?php echo $row['calu_email'] ?>"/>
    </div>
    <?php if($row['conf_email']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_email'],')','</b></div>'; }; ?>
   </div>

  <div class="form-group form-group-sm">
    <label for="email2" class="col-sm-2 control-label">E-Mail 2</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email2" name="calu_email2"  value="<?php echo $row['calu_email2'] ?>"/>
    </div>
    <?php if($row['conf_email2']!=null) { echo '<div class="col-sm-6 text-danger"><b>',$msg,$row['conf_email2'],')','</b></div>'; }; ?>
   </div>



<!-- </form> -->


            <?php  } ?>




<?php }
else {
    ?>
            <div class="wrapper" id="nadaporaqui">
                <div class="panel-body">
                    <div class="text-center  alert">
                        <h5><?php echo "No hay datos para mostrar"; ?></h5>
                    </div>     
                </div>
            </div>
<?php } ?>  
    
</div>  

