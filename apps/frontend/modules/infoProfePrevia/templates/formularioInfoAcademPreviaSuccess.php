<script> 

cancelar2 = function(){

	var defaultPrevented;
	location.href = '<?php echo url_for("infoProfePrevia/infoProfePrevia") ?>';
}


mostrarSubProvin_tit = function() {
	
	$.post("<?php echo url_for('infoProfePrevia/comboSubprovin_tit') ?>",
	{ 
	 id_pais_tit:     $("#ciap_id_pais").val(),  
	 codigoProvincia: $("#codigoProv_tit").val(),
	},  
	      function(data){
	          $('#resulSubprov_tit').html(data);
	          startTableOnlySorter();
	      });
}

$(document).ready(function(){
    mostrarSubProvin_tit();
});


//autocomplete//
$('.datosinfo').keyup(function(){
    var valor = $(this).val();   
    var pais = $("#ciap_id_pais").val();
    var prov = $("#ciap_id_provincia").val(); 
//alert('marano',prov);  
    var accion = 'loca_prov';
    var dataString = "valor="+valor+','+accion+','+pais+','+prov;
//alert(dataString);
    //console.log(dataString);
    $("#ciap_id_localidad").show();
    $.ajax({
        type: "POST",
        url: "<?php echo url_for('/services/getgenerico') ?>",
        data: dataString,
        success: function(data) {
            //alert(data);
            $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
             $("#ciap_id_localidad").hide(); 
             
             $('.activocombo').click(function()
             {
                var id = $(this).attr('id');
                console.log(id);
                $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                            $('#datosinfo').val($('#'+id).attr('data2'));
                            $('#loca').val($('#'+id).attr('data'));
                            //cargarGrilla($('#loca_actual_pro').val());
            }); 
            // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
            $('.container').click(function(){
                 $('#muestroayudabuscado').hide();
                 //$('.datosinfo_pro').val('');
            });  
      
      } });     
   
    });


</script>
<div class=" panel-body">

<form id="documForm" class="form-horizontal" name="documForm" method="POST" action="<?php echo url_for("infoProfePrevia/altaTitulo") ?>" >
	<?php $cabecera = new Cabecera();
	$cabecera->ruta(link_to(__("Informacion profesional previa"), 'infoProfePrevia/infoProfePrevia'));
      
	if($_SESSION["usuario"]["modi"] == "S") {
    if (count($acad) < 3) {
		   $cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
    }
		$cabecera->accion('<button type="button" onclick="cancelar2()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
	};
  $cabecera->titulo(__("Nuevo Título"))->ruta(__("Nuevo Título"));

        
	echo $cabecera;

      
  if (count($acad)>=3) {  ?>

      <div class="text-danger grilla-val">
        <b><?php echo 'Lo sentimos, solo puede registrar hasta 3 títulos'; ?></b>
      </div>

  <?php } else {?>
	<br/>
	<div class="wrapper">
	<div class="panel-body">
	
    	<div class="row">
            <div class="col-xs-12 col-md-6">

              <input type="hidden" name="ciap_nro_titulo" value="<?php echo $row['ciap_nro_titulo']; ?>" > 

              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Título</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="ciap_titulo" required value="<?php echo $row['ciap_titulo'] ?>">
              </div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Nivel</label>
              <div class="col-xs-9">
                  <?php $optionsSelect = $sf_data->getRaw('dd_nive');?>
                  <select id="ciap_id_nivel" name="ciap_id_nivel" class="form-control" width="40%"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cial_id_nivel"] ?>" <?php if($row['ciap_id_nivel']==$arraySelect["cial_id_nivel"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cial_id_nivel"] ?>"><?php echo $arraySelect["cial_nivel"] ?></option> 
                      <?php } ?>
                  </select> 
              </div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Tipo Título</label>
              <div class="col-xs-9">
                  <?php $optionsSelect = $sf_data->getRaw('dd_tipt');?>
                  <select id="ciap_id_tipo_titulo" name="ciap_id_tipo_titulo" class="form-control" width="40%"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["citt_id_tipo_titulo"] ?>" <?php if($row['ciap_id_tipo_titulo']==$arraySelect["citt_id_tipo_titulo"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["citt_id_tipo_titulo"] ?>"><?php echo $arraySelect["citt_tipo_titulo"] ?></option> 
                      <?php } ?>
                  </select>
              </div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">F.Graduación</label>
              <div class="col-xs-9">
                <input class="form-control" type="date" name="ciap_fechagraduacion" value="<?php echo $row['ciap_fechagraduacion'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">Instituto</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="ciap_instituto" value="<?php echo $row['ciap_instituto'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">Pais Instituto</label>
              <div class="col-xs-9">
                  <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                  <select id="ciap_id_pais" name="ciap_id_pais" class="form-control" width="40%" onchange="mostrarSubProvin_tit()"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['ciap_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                      <?php } ?>
                  </select> 
              </div>
              </div>

            </div> <!-- del frame izq  -->

            <div class="col-xs-12 col-md-6">

              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Provincia Instit</label>
              <div class="col-xs-9">
                  <input type="hidden" id="codigoProv_tit" value="<?php echo $row['ciap_id_provincia'] ?>"  />
                    <p id="resulSubprov_tit"> </p>
              </div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Localidad Instit</label>
              <div class="col-xs-9">
                  <i id="ciap_id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i> 
                  <input type="text" id="datosinfo"   placeholder="Escriba localidad" class='form-control datosinfo limpiarcampo' value=''>
                  <input type="hidden" id="loca" name="loca" value="<?php echo $row['ciap_id_localidad']?>" />
                  <div id="muestroayudabuscado"></div>
                  <b class="focusMensajes" id="focusMensajes" ></b>
              </div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Conval/Revalid</label>
              <div class="col-xs-9">
                  <select id="ciap_conva_reva" name="ciap_conva_reva" class="form-control" width="40%">
                      <option data="N" <?php if($row['ciap_conva_reva']=='N') { echo 'selected'; }; ?> value="N">( Ninguna )</option> 
                      <option data="C" <?php if($row['ciap_conva_reva']=='C') { echo 'selected'; }; ?> value="C">Convalida</option> 
                      <option data="R" <?php if($row['ciap_conva_reva']=='R') { echo 'selected'; }; ?> value="R">Revalida</option> 
                  </select>
              </div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">Universidad</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="ciap_universidad" value="<?php echo $row['ciap_universidad'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">Resolución</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="ciap_resolucion" value="<?php echo $row['ciap_resolucion'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">F.Emisión</label>
              <div class="col-xs-9">
                <input class="form-control" type="date" name="ciap_fechaemision" value="<?php echo $row['ciap_fechaemision'] ?>" >
              </div>
              </div>

            </div> <!-- del frame der  -->
        </div> <!-- del row -->


	</div>
	</div>
	
    <?php } // del if de hasta cantidad max (3) ?>

</form>
</div>