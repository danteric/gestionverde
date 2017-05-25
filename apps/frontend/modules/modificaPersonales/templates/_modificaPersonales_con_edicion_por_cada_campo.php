   <style>

     .editable span{display:block;}
        .editable span:hover {background:url(../img/editar.png) 90% 50% no-repeat;cursor:pointer}
        
        td input{height:24px;width:200px;border:1px solid #ddd;padding:0 5px;margin:0;border-radius:6px;vertical-align:middle}
        a.enlace{display:inline-block;width:24px;height:24px;margin:0 0 0 5px;overflow:hidden;text-indent:-999em;vertical-align:middle}
            .guardar{background:url(../img/accept.png) 0 0 no-repeat}
            .guardarComb{background:url(../img/accept.png) 0 0 no-repeat}
            .cancelar{background:url(../img/close.png) 0 0 no-repeat}
            .cancelarComb{background:url(../img/close.png) 0 0 no-repeat}
    .mensaje{display:block;text-align:center;margin:0 0 20px 0}
       
    </style>

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
     calu_id_pais_pro:      $("#calu_id_pais_pro").val(),  
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
    mostrarNombreGenerico($("#loca_actual_pro").val(),'loca_prov','datosinfo_pro');
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
    mostrarNombreGenerico($("#loca_actual").val(),'loca_prov','datosinfo');
    //autocomplete//
    $('.datosinfo').keyup(function(){
        var valor = $(this).val();   
        var pais = 3 // siempre es argentina aca $("#calu_id_pais").val();
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
<div class="wrapper tipoframe">
    <div class="panel-body">

        <?php if ($sindatos == '1') { ?>  
           



<table border="0"  frame=""  class="responsiveWidth table table-bordered editinplace">
        
        <thead>
            <tr class="alert-success wrapper">
                <th style="text-align:center;" colspan="2">Datos de identificación</th>
                <th style="text-align:center;" class="alert alert-warning" >Modif a confirmar</th>
            </tr>
        </thead>
        <tbody><tr>
            <?php foreach($datos as $row) { ?>
                
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Apellido")?></td>
                <td  class="editable" width="40%" data-campo='calu_apellido'><span><?php echo $row['calu_apellido'] ?></span></td>
                <td width="40%" <?php if($row['conf_apellido']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_apellido']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Nombre")?></td>
                <td  class="editable" width="40%" data-campo='calu_nombre'><span><?php echo $row['calu_nombre'] ?></span></td>
                <td width="40%" <?php if($row['conf_nombre']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_nombre']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Sexo")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_sexo');?>
                    <select id="calu_id_sexo" name="calu_id_sexo" class="combox_calu_id_sexo  input-medium" width="40%">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["csex_id_sexo"] ?>" <?php if($row['calu_id_sexo']==$arraySelect["csex_id_sexo"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["csex_id_sexo"] ?>"><?php echo $arraySelect["csex_sexo"] ?></option> 
                        <?php } ?>
                    </select>
                     <b id="divCombox_calu_id_sexo"></b> <!-- aqui muestro el campo input oculto-->
                </td>
                <td width="40%" <?php if($row['conf_id_sexo']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_sexo']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Tipo Docum")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_tdoc');?>
                    <select id="calu_id_tipodoc" name="calu_id_tipodoc" class="combox_calu_id_tipodoc  input-medium" width="40%">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["ctdc_id_tipodoc"] ?>" <?php if($row['calu_id_tipodoc']==$arraySelect["ctdc_id_tipodoc"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["ctdc_id_tipodoc"] ?>"><?php echo $arraySelect["ctdc_tipodoc"] ?></option> 
                        <?php } ?>
                    </select>
                     <b id="divCombox_calu_id_tipodoc"></b> <!-- aqui muestro el campo input oculto-->         
                </td>
                <td width="40%" <?php if($row['conf_id_tipodoc']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_tipodoc']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="2%"><?php echo __("Nro Docum")?></td>
                <td class="editable" data-campo='calu_nrodoc' width="40%"><span><?php echo $row['calu_nrodoc'] ?></span></td>
                <td width="40%" <?php if($row['conf_nrodoc']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_nrodoc']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Pais emisión")?></td>
                <td>
                   <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                    <select id="calu_id_paisemision" name="calu_id_paisemision" class="combox_calu_id_paisemision  input-medium" width="40%">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_paisemision']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                        <?php } ?>
                    </select>
                     <b id="divCombox_calu_id_paisemision"></b> <!-- aqui muestro el campo input oculto-->

                </td>
                <td width="40%" <?php if($row['conf_id_paisemision']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_paisemision']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Nacionalidad")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_nacio');?>
                    <select id="calu_id_nacionalidad" name="calu_id_nacionalidad" class="combox_calu_id_nacionalidad  input-medium" width="40%">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["cnac_id_nacionalidad"] ?>" <?php if($row['calu_id_nacionalidad']==$arraySelect["cnac_id_nacionalidad"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cnac_id_nacionalidad"] ?>"><?php echo $arraySelect["cnac_nacionalidad"] ?></option> 
                        <?php } ?>
                    </select>
                     <b id="divCombox_calu_id_nacionalidad"></b> <!-- aqui muestro el campo input oculto-->

                </td>
                <td width="40%" <?php if($row['conf_id_nacionalidad']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_nacionalidad']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("CUIL")?></td>
                <td class="editable" data-campo='calu_cuil' width="40%"><span><?php echo $row['calu_cuil'] ?></span></td>
                <td width="40%" <?php if($row['conf_cuil']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_cuil']?></td>
            </tr>
        </tbody>

<thead><tr><td></td></tr></thead>
<tbody><tr><td></td></tr></tbody>

        <thead>
            <tr class="alert-success wrapper">
                <th style="text-align:center;" colspan="2">Datos de nacimiento</th>
                <th style="text-align:center;" class="alert alert-warning">Modif a confirmar</th>
            </tr>
        </thead>
        <tbody> 
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Fecha")?></td>
                <td class="editable" data-campo='calu_fechanac'><span><?php echo $row['calu_fechanac'] ?></span></td>
                <td width="40%" <?php if($row['conf_fechanac']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_fechanac']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Pais")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                    <select id="calu_id_paisnac" name="calu_id_paisnac" class="combox_calu_id_paisnac input-medium" >
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_paisnac']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                        <?php } ?>
                    </select>
                    <b id="divCombox_calu_id_paisnac"></b> <!-- aqui muestro el campo input oculto-->
                </td>
                <td width="40%" <?php if($row['conf_id_paisnac']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_paisnac']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Lugar")?></td>
                <td class="editable" data-campo='calu_lugarnacimiento'><span><?php echo $row['calu_lugarnacimiento'] ?></span></td>
                <td width="40%" <?php if($row['conf_lugarnacimiento']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_lugarnacimiento']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Distrito")?></td>
                <td class="editable" data-campo='calu_distritonacimiento'><span><?php echo $row['calu_distritonacimiento'] ?></span></td>
                <td width="40%" <?php if($row['conf_distritonacimiento']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_distritonacimiento']?></td>
            </tr>
        </tbody>

<thead><tr><td></td></tr></thead>
<tbody><tr><td></td></tr></tbody>

        <thead>
            <tr class="alert-success wrapper">
                <th style="text-align:center;" colspan="2">Domicilio procedencia</th>
                <th style="text-align:center;" class="alert alert-warning" >Modif a confirmar</th>
            </tr>
        </thead>
        <tbody> 
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Calle")?></td>
                <td class="editable" data-campo='calu_calle_pro'><span><?php echo $row['calu_calle_pro'] ?></span></td>
                <td width="40%" <?php if($row['conf_calle_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_calle_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Nro")?></td>
                <td class="editable" data-campo='calu_nro_pro'><span><?php echo $row['calu_nro_pro'] ?></span></td>
                <td width="40%" <?php if($row['conf_nro_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_nro_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("piso")?></td>
                <td class="editable" data-campo='calu_piso_pro'><span><?php echo $row['calu_piso_pro'] ?></span></td>
                <td width="40%" <?php if($row['conf_piso_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_piso_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("depto")?></td>
                <td class="editable" data-campo='calu_dto_pro'><span><?php echo $row['calu_dto_pro'] ?></span></td>
                <td width="40%" <?php if($row['conf_dto_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_dto_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Cod postal")?></td>
                <td class="editable" data-campo='calu_codigopostal_pro'><span><?php echo $row['calu_codigopostal_pro'] ?></span></td>
                <td width="40%" <?php if($row['conf_codigopostal_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_codigopostal_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Pais")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                    <select id="calu_id_pais_pro" name="calu_id_pais_pro" class="combox_calu_id_pais_pro input-medium" onchange="mostrarSubProvin_pro()">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_pais_pro']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                        <?php } ?>
                    </select>
                    <b id="divCombox_calu_id_pais_pro"></b> <!-- aqui muestro el campo input oculto-->
                </td>
                <td width="40%" <?php if($row['conf_id_pais_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_pais_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Provincia")?></td>
                <td>
                    <input type="hidden" id="codigoProvincia" value="<?php echo $row['calu_id_provincia_pro'] ?>"  />
                    <b id="resulSubprov_pro"> </b>
                    
                </td>
                <td width="40%" <?php if($row['conf_id_provincia_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_provincia_pro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Localidad")?></td>
                <td>
                    <i id="calu_id_localidad_pro" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                    <input type='text' id="datosinfo_pro"  placeholder="Escriba localidad" class='input-large datosinfo_pro limpiarcampo' value=''>
                    <input type="hidden" id="loca_actual_pro" value="<?php echo $row['calu_id_localidad_pro']?>" />
                    <div id="muestroayudabuscado_pro"></div>
                    <b class="focusMensajes" id="focusMensajes" ></b> 
                </td>
                <td width="40%" <?php if($row['conf_id_localidad_pro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_localidad_pro']?></td>
            </tr>
        </tbody>

<thead><tr><td></td></tr></thead>
<tbody><tr><td></td></tr></tbody>

        <thead>
            <tr class="alert-success wrapper">
                <th style="text-align:center;" colspan="2">Domicilio estadía actual</th>
                <th style="text-align:center;" class="alert alert-warning" >Modif a confirmar</th>
            </tr>
        </thead>
        <tbody> 
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Calle")?></td>
                <td class="editable" data-campo='calu_calle'><span><?php echo $row['calu_calle'] ?></span></td>
                <td width="40%" <?php if($row['conf_calle']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_calle']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Nro")?></td>
                <td class="editable" data-campo='calu_nro'><span><?php echo $row['calu_nro'] ?></span></td>
                <td width="40%" <?php if($row['conf_nro']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_nro']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("piso")?></td>
                <td class="editable" data-campo='calu_piso'><span><?php echo $row['calu_piso'] ?></span></td>
                <td width="40%" <?php if($row['conf_piso']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_piso']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("depto")?></td>
                <td class="editable" data-campo='calu_dto'><span><?php echo $row['calu_dto'] ?></span></td>
                <td width="40%" <?php if($row['conf_dto']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_dto']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Cod postal")?></td>
                <td class="editable" data-campo='calu_codigopostal'><span><?php echo $row['calu_codigopostal'] ?></span></td>
                <td width="40%" <?php if($row['conf_codigopostal']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_codigopostal']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Pais")?></td>
                <td>
                    <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                    <select id="calu_id_pais" name="calu_id_pais" class="combox_calu_id_pais input-medium" onchange="mostrarSubProvin()">
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                            <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['calu_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                        <?php } ?>
                    </select>
                    <b id="divCombox_calu_id_pais"></b> <!-- aqui muestro el campo input oculto-->
                </td>
                <td width="40%" <?php if($row['conf_id_pais']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_pais']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Provincia")?></td>
                <td>
                    <input type="hidden" id="codigoProvin" value="<?php echo $row['calu_id_provincia'] ?>" />
                    <b id="resulSubprov"><b id="divCombox_calu_id_provincia"></b></b>
                </td>
                <td width="40%" <?php if($row['conf_id_provincia']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_provincia']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Localidad")?></td>
                <td>
                    <i id="calu_id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                    <input type='text' id="datosinfo"  placeholder="Escriba localidad" class='input-large datosinfo limpiarcampo' value=''>
                    <input type="hidden" id="loca_actual" value="<?php echo $row['calu_id_localidad']?>" />
                    <div id="muestroayudabuscado"></div>
                    <b class="focusMensajes" id="focusMensajes" ></b> 
                </td>

                <td width="40%" <?php if($row['conf_id_localidad']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_id_localidad']?></td>
            </tr>
        </tbody>

<thead><tr><td></td></tr></thead>
<tbody><tr><td></td></tr></tbody>

        <thead>
            <tr class="alert-success wrapper">
                <th style="text-align:center;" colspan="2">Datos de contacto</th>
                <th style="text-align:center;" class="alert alert-warning" >Modif a confirmar</th>
            </tr>
        </thead>
        <tbody> 
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Telef Fijo")?></td>
                <td class="editable" data-campo='calu_te'><span><?php echo $row['calu_te'] ?></span></td>
                <td width="40%" <?php if($row['conf_te']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_te']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Celular")?></td>
                <td class="editable" data-campo='calu_celular'><span><?php echo $row['calu_celular'] ?></span></td>
                <td width="40%" <?php if($row['conf_celular']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_celular']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("E-Mail")?></td>
                <td class="editable" data-campo='calu_email'><span><?php echo $row['calu_email'] ?></span></td>
                <td width="40%" <?php if($row['conf_email']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_email']?></td>
            </tr>
            <tr><td class="alert-success wrapper" width="20%"><?php echo __("Otro E-Mail")?></td>
                <td class="editable" data-campo='calu_email2'><span><?php echo $row['calu_email2'] ?></span></td>
                <td width="40%" <?php if($row['conf_email2']!=null) { echo 'class="alert alert-error"'; }; ?> ><?php echo $row['conf_email2']?></td>
            </tr>
        </tbody>

<script type="text/javascript">
 $(document).ready(function() 
    {
        /*************************FUNCION COMBOX AL CAMBIAR *******************/    
                // la clase .combox_???? no deben repetirse nunca
                 $('.combox_calu_id_sexo').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_sexo'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_sexo").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_sexo").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 
  
                 $('.combox_calu_id_tipodoc').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_tipodoc'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_tipodoc").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_tipodoc").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 
    
                 $('.combox_calu_id_paisemision').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_paisemision'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_paisemision").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_paisemision").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 

                 $('.combox_calu_id_nacionalidad').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_nacionalidad'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_nacionalidad").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_nacionalidad").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 

                 $('.combox_calu_id_paisnac').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_paisnac'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_paisnac").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_paisnac").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 

                 $('.combox_calu_id_pais_pro').change(function() 
                 {
                     // obtengo todo los datos necesarios
                    var id = '<?php echo $row['calu_id_pais_pro'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_pais_pro").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_pais_pro").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 

                 $('.combox_calu_id_pais').change(function() 
                 {
                   // alert('0gggggg');
                     // obtengo todo los datos necesarios
                    var id      = '<?php echo $row['calu_id_pais'] ?>';
                    var valor    = (this).value; 
                    var campo = $(this).attr('id');
                    $("#divCombox_calu_id_pais").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                    $("#divCombox_calu_id_pais").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   }); 

                $(' #resulSubprov,.combox_calu_id_provincia').change(function()  
                 {
                    //alert((this).value);
                     // obtengo todo los datos necesarios
                    var id    = '<?php echo $row['calu_id_provincia'] ?>';
                    var valor = $('#calu_id_provincia').val();//(this).value; 
                    var campo = 'calu_id_provincia'; //$(this).attr('id');
                    $("#divCombox_calu_id_provincia").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                   $("#divCombox_calu_id_provincia").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   return false;
                   });

                $(' #resulSubprov_pro,.combox_calu_id_provincia_pro').change(function()  
                 {
                    //alert((this).value);
                     // obtengo todo los datos necesarios
                    var id    = '<?php echo $row['calu_id_provincia_pro'] ?>';
                    var valor = $('#calu_id_provincia_pro').val();//(this).value; 
                    var campo = 'calu_id_provincia_pro'; //$(this).attr('id');
                    $("#divCombox_calu_id_provincia_pro").show();  //muestro el div oculto y en ella agrego un campo input hidden
                    $("td:not(.id)").removeClass("editable"); // le saco todas las clases por el momento para evitar seleccionar otros campos
                   $("#divCombox_calu_id_provincia_pro").html('<input type="hidden" name="'+campo+'" value="'+valor+'"><a class="enlace guardarComb"  onclick="guardarCombox(\''+campo+'\',\''+valor+'\',\''+id+'\')" href="#">Guardar</a><a class="enlace cancelarComb" onclick="cancelarCombox(\''+campo+'\')" href="#">Cancelar</a>');
                   });
          /*************************FIN FUNCION COMBOX AL CAMBIAR  *******************/     
        
        var td,campo,valor,id;
        $(document).on("click","td.editable span",function(e)
        {
            // limpiamos el cartel del resultado
            $("#cartelito").hide(1000);
            e.preventDefault();
            $("td:not(.id)").removeClass("editable");
            td=$(this).closest("td");
            campo=$(this).closest("td").data("campo");
            valor=$(this).text();
            id=$(this).closest("tr").find(".id").text();
            td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
        });
        
        $(document).on("click",".cancelar",function(e)
        {
            e.preventDefault();
            td.html("<span>"+valor+"</span>");
            $("td:not(.id)").addClass("editable");
        });
        
        $(document).on("click",".guardar",function(e)
        {
            $(".mensaje").html("<img src='../img/ajax-loader.gif'>");
            e.preventDefault();
            nuevovalor=$(this).closest("td").find("input").val();
            if(nuevovalor.trim()!="")
            {
                $.ajax({
                    type: "POST",
                    url: "/modificaPersonales/modificaPersonalesGuardar",
                    data: { campo: campo, valor: nuevovalor, id:id }
                })
                .done(function( mensaje ) {
                    $(".mensaje").html(mensaje);
                    td.html("<span>"+nuevovalor+"</span>");
                    $("td:not(.id)").addClass("editable");
                    //setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
                    //cargarGrilla();
                });
            }
            else $(".mensaje").html("<p class='ko alert alert-error'>Debes ingresar un valor</p>");
        });
    });
    
  function reFrescarPagina(){
        location.reload(1000);

}

  /********FUNCIONES PARA UTILIZAR COMBOX DE ESTE TIPO ES GENERICO *************/
  // estas funciones seran utilizadas solamente si cambias el change del select
 function guardarCombox(campo,valor,idobtenido){
           $(".mensaje").html("<img src='loading.gif'>");
            
//alert(campo);
//            alert(nuevovalor);
                       
                $.ajax({
                    type: "POST",
                    url: "/modificaPersonales/modificaPersonalesGuardar",
                    data: { campo: campo, valor: valor, id:idobtenido }
                })
                .done(function( mensaje ) {
                    $(".mensaje").html(mensaje);


                    //cargarGrilla();
                    $("#divCombox_"+campo).hide();
                    $("td:not(.id)").addClass("editable");
                });
                  
          

}
 function cancelarCombox(campo){
  $("#divCombox_"+campo).hide();
  $("td:not(.id)").addClass("editable");
  location.reload(); // ver como hago el reload de un solo campo
 }
   /********FIN FUNCIONES PARA UTILIZAR COMBOX DE ESTE TIPO ES GENERICO *************/


</script>
            <?php  } ?>

        </tbody>
    </table>




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
</div>  

<!--
    <div id="mostrarFormulario" class="modal combopaginado hide fade in" style="display: none; width: 650px; margin-left: -366px;">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">
                    <a href="#" data-dismiss="modal"><img src="/img/cross.png" class="zoom reFrescar"  width="40px"></a>
                </li>
            </ul>
        </div>

-->
