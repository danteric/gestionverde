<script>

  mostrarSubProvin_tit = function(solapa) {

    $.post("<?php echo url_for('infoProfePrevia/comboSubprovin_tit') ?>",
    { 
     id_pais_tit:     $("#ciap_id_pais"+solapa).val(),  
     codigoProvincia: $("#codigoProv_tit"+solapa).val(),
     solapa: solapa,
    },  
          function(data){
              $('#resulSubprov_tit'+solapa).html(data);
              startTableOnlySorter();
          });
  }

   $(document).ready(function(){
        mostrarSubProvin_tit(1);
   });

   $(document).ready(function(){
        mostrarSubProvin_tit(2);
   });

   $(document).ready(function(){
        mostrarSubProvin_tit(3);
   });

 mostrarSubProvin_mat = function(solapa) {

    $.post("<?php echo url_for('infoProfePrevia/comboSubprovin_mat') ?>",
    { 
     id_pais_mat:      $("#cipp_id_pais"+solapa).val(),  
     codigoProvincia:  $("#codigoProv_mat"+solapa).val(),
     solapa: solapa,
    },  
          function(data){
              $('#resulSubprov_mat'+solapa).html(data);
              startTableOnlySorter();
          });
   }

   $(document).ready(function(){
        mostrarSubProvin_mat(1);
   });

   $(document).ready(function(){
        mostrarSubProvin_mat(2);
   });

   $(document).ready(function(){
        mostrarSubProvin_mat(3);
   });


$(document).ready(function(){    

    for (solapa = 1; solapa <= 3; solapa++) { 
          // llamado automatico para mostrar nombre de lalocal
        var locaString = $("#loca"+solapa).val()+','+$("#codigoProv_tit"+solapa).val()+','+$("#ciap_id_pais"+solapa).val();
        mostrarNombreGenerico(locaString,'loca_prov','datosinfo'+solapa);

        //alert($("#loca"+solapa).val());
    };

    //autocomplete//
    $('.datosinfo1').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#ciap_id_pais1").val();
        var prov = $("#codigoProv_tit1").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        //console.log(dataString);
        $("#ciap_id_localidad1").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado1').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#ciap_id_localidad1").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado1').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo1').val($('#'+id).attr('data2'));
                                $('#loca1').val($('#'+id).attr('data'));
                                //cargarGrilla($('#loca_actual_pro').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado1').hide();
                     //$('.datosinfo_pro').val('');
                });  
          
          } });     
       
        });


    $('.datosinfo2').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#ciap_id_pais2").val();
        var prov = $("#codigoProv_tit2").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        //console.log(dataString);
        $("#ciap_id_localidad2").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado2').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#ciap_id_localidad2").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado2').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo2').val($('#'+id).attr('data2'));
                                $('#loca2').val($('#'+id).attr('data'));
                                //cargarGrilla($('#loca_actual_pro').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado2').hide();
                     //$('.datosinfo_pro').val('');
                });  
          
          } });     
       
        });



    $('.datosinfo3').keyup(function(){
        var valor = $(this).val();   
        var pais = $("#ciap_id_pais3").val();
        var prov = $("#ciap_id_provincia3").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;
//alert(dataString);
        //console.log(dataString);
        $("#ciap_id_localidad3").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado3').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#ciap_id_localidad3").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado3').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo3').val($('#'+id).attr('data2'));
                                $('#loca3').val($('#'+id).attr('data'));
                                //cargarGrilla($('#loca_actual_pro').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado3').hide();
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
         
<!--  primero: titulos y luego todas las matriculas -->
<?php $cantit = count($acad); $cantab = $cantit; 
      if ($cantit==0) { $cantab=1; }
?>
<input type="hidden" name="cantit" value="<?php echo $cantit ?>" >

<ul id="tabs" class="nav nav-tabs">
  <!-- solapas titulos -->
<?php $solap=1;  
while ($solap <= $cantab) { ?>

  <li <?php if ($solap==1) { echo 'class="active"'; } ?> ><a data-toggle="tab" href="#titu<?php echo $solap ?>">Título <?php echo $solap ?></a></li>

<?php $solap++;
}; 
  // solapas matriculas -->
$canmat = count($prof);
$nromat = 1;
//$solap++;  
while ($nromat <= $canmat) { ?>

  <li><a data-toggle="tab" href="#matr<?php echo $nromat ?>">Matrícula <?php echo $nromat ?></a></li>

<?php $nromat++;
};

?>
</ul>
<input type="hidden" name="canmat" value="<?php echo $canmat ?>" >


<!-- Definicion de tabs -->
<div class="tab-content" id="content">
    
    <?php if ($cantit == 0) { ?>
    <div id="titu1" class="tab-pane fade in active">
         <div class="text-danger grilla-val"><b><?php echo 'No hay informacion academica previa'; ?></b></div>
    </div>   
    <?php } else { ?>

    <?php  $c = 1; 
    foreach($acad as $row){ ?>
      <div id="titu<?php echo $c; ?>" class="tab-pane <?php if ($c == 1) { echo 'fade in active';} ?>" >
        <div class="container">

          <?php if($row['ciap_origen_dato']=='USU') { // Solo se da de baja a reg propios ?>
            <a href="<?php echo url_for('infoProfePrevia/bajaTitulo'),'?nro_titulo=',$row['ciap_nro_titulo'] ?>" class="btn btn-danger pull-right" role="button">Eliminar este registro</a>
          <?php } ?>
          <br>
          <!-- En un móvil las columnas ocupan la mitad del dispositivo y en un 
               ordenador ocupan un cuarto parte de la anchura disponible -->
          <div class="row">
            <div class="col-xs-12 col-md-6">

              <input type="hidden" name="ciap_nro_titulo<?php echo $c ?>" value="<?php echo $row['ciap_nro_titulo']; ?>" > 

              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Título</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_titulo<?php echo $c ?>" value="<?php echo $row['ciap_titulo'] ?>">
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_titulo'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Nivel</label>
              <div class="col-xs-6">
                  <?php $optionsSelect = $sf_data->getRaw('dd_nive');?>
                  <select id="ciap_id_nivel<?php echo $c ?>" name="ciap_id_nivel<?php echo $c ?>" class="form-control" width="40%"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cial_id_nivel"] ?>" <?php if($row['ciap_id_nivel']==$arraySelect["cial_id_nivel"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cial_id_nivel"] ?>"><?php echo $arraySelect["cial_nivel"] ?></option> 
                      <?php } ?>
                  </select> 
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_nivel'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Tipo Título</label>
              <div class="col-xs-6">
                <?php $optionsSelect = $sf_data->getRaw('dd_tipt');?>
                  <select id="ciap_id_tipo_titulo<?php echo $c ?>" name="ciap_id_tipo_titulo<?php echo $c ?>" class="form-control" width="40%"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["citt_id_tipo_titulo"] ?>" <?php if($row['ciap_id_tipo_titulo']==$arraySelect["citt_id_tipo_titulo"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["citt_id_tipo_titulo"] ?>"><?php echo $arraySelect["citt_tipo_titulo"] ?></option> 
                      <?php } ?>
                  </select>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_tipo_titulo'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">F.Graduación</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_fechagraduacion<?php echo $c ?>" value="<?php echo $row['ciap_fechagraduacion'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_fechagraduacion'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">Instituto</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_instituto<?php echo $c ?>" value="<?php echo $row['ciap_instituto'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_instituto'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">Pais Instituto</label>
              <div class="col-xs-6">
                  <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                  <select id="ciap_id_pais<?php echo $c ?>" name="ciap_id_pais<?php echo $c ?>" class="form-control" width="40%" onchange="mostrarSubProvin_tit(<?php echo $c ?>)"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['ciap_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                      <?php } ?>
                  </select> 
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_id_pais'] ?></b></div>
              </div>

            </div> <!-- del frame izq  -->

            <div class="col-xs-12 col-md-6">

              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Provincia Instit</label>
              <div class="col-xs-6">
                  <input type="hidden" id="codigoProv_tit<?php echo $c ?>" value="<?php echo $row['ciap_id_provincia'] ?>"  />
                    <p id="resulSubprov_tit<?php echo $c ?>"> </p>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_id_provincia'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Localidad Instit</label>
              <div class="col-xs-6">
                  <i id="ciap_id_localidad<?php echo $c ?>" style="display:none" class="icon-spinner icon-spin icon-large"></i> 
                  <input type='text' id="datosinfo<?php echo $c ?>"   placeholder="Escriba localidad" class='form-control datosinfo<?php echo $c ?> limpiarcampo' value=''>
                  <input type="hidden" id="loca<?php echo $c ?>" name="loca<?php echo $c ?>" value="<?php echo $row['ciap_id_localidad']?>" />
                  <div id="muestroayudabuscado<?php echo $c ?>"></div>
                  <b class="focusMensajes" id="focusMensajes<?php echo $c ?>" ></b>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_id_localidad'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Conval/Revalid</label>
              <div class="col-xs-6">
                 <select id="ciap_conva_reva<?php echo $c ?>" name="ciap_conva_reva<?php echo $c ?>" class="form-control" width="40%">
                      <option data="N" <?php if($row['ciap_conva_reva']=='N') { echo 'selected'; }; ?> value="N">( Ninguna )</option> 
                      <option data="C" <?php if($row['ciap_conva_reva']=='C') { echo 'selected'; }; ?> value="C">Convalida</option> 
                      <option data="R" <?php if($row['ciap_conva_reva']=='R') { echo 'selected'; }; ?> value="R">Revalida</option> 
                  </select>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_conva_reva'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">Universidad</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_universidad<?php echo $c ?>" value="<?php echo $row['ciap_universidad'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_universidad'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">Resolución</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_resolucion<?php echo $c ?>" value="<?php echo $row['ciap_resolucion'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_resolucion'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">F.Emisión</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="ciap_fechaemision<?php echo $c ?>" value="<?php echo $row['ciap_fechaemision'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_fechaemision'] ?></b></div>
              </div>

            </div> <!-- del frame der  -->
           </div> <!-- del row -->

        </div> <!-- del container -->
        </div> <!-- del tab -->

      <?php $c++; 

        }; // del foreach
      }; // del if que hay titulos 
    ?>



    <?php if ($canmat == 0) { ?>
    <div id="matr1" class="tab-pane">
         <div class="text-danger grilla-val"><b><?php echo 'No hay información profesional previa'; ?></b></div>
    </div>   
    <?php } else { ?>

    <?php  $c = 1; 
    foreach($prof as $row){ ?>
      <div id="matr<?php echo $c; ?>" class="tab-pane">
        <div class="container">
       
          <input type="hidden" name="cipp_nro_profesion<?php echo $c ?>" value="<?php echo $row['cipp_nro_profesion']; ?>" > 
          <!-- En un móvil las columnas ocupan la mitad del dispositivo y en un 
               ordenador ocupan un cuarto parte de la anchura disponible -->
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <br>
              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Entidad</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="cipp_entidad<?php echo $c ?>" value="<?php echo $row['cipp_entidad'] ?>">
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_entidad'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Lugar</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="cipp_lugar<?php echo $c ?>" value="<?php echo $row['cipp_lugar'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_lugar'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">Matrícula</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="cipp_nro_matricula<?php echo $c ?>" value="<?php echo $row['cipp_nro_matricula'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_nro_matricula'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">F.Vencimiento</label>
              <div class="col-xs-6">
                <input class="form-control" type="text" name="cipp_fechavto<?php echo $c ?>" value="<?php echo $row['cipp_fechavto'] ?>" >
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_fechavto'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">Pais</label>
              <div class="col-xs-6">
                  <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                  <select id="cipp_id_pais<?php echo $c ?>" name="cipp_id_pais<?php echo $c ?>" class="form-control" width="40%" onchange="mostrarSubProvin_mat(<?php echo $c ?>)"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['cipp_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                      <?php } ?>
                  </select>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_id_pais'] ?></b></div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Provincia</label>
              <div class="col-xs-6">
                  <input type="hidden" id="codigoProv_mat<?php echo $c ?>" value="<?php echo $row['cipp_id_provincia'] ?>"  />
                  <p id="resulSubprov_mat<?php echo $c ?>"> </p>
              </div>
              <div class="col-xs-3 text-danger"><b><?php echo $row['conf_id_provincia'] ?></b></div>
              </div>

     
           </div> <!-- del panel izq -->
           <div class="col-xs-12 col-md-6">
             <?php if($row['cipp_origen_dato']=='USU') { // Solo se da de baja a reg propios ?>
                <a href="<?php echo url_for('infoProfePrevia/bajaMatricula'),'?nro_profesion=',$row['cipp_nro_profesion'] ?>" class="btn btn-danger" role="button">Eliminar este registro</a>
                <?php } ?>
           </div> <!-- del panel der -->

        </div> <!-- del row -->
        </div> <!-- del container -->
        </div> <!-- del tab -->
      <?php $c++; 

        }; // del foreach
      }; // del if que hay matriculas 
    ?>
</div>

 
</div>  
</div>

