<script> 

cancelar2 = function(){

	var defaultPrevented;
	location.href = '<?php echo url_for("infoProfePrevia/infoProfePrevia") ?>';
}


mostrarSubProvin_mat = function() {
	
//alert($("#cipp_id_pais").val());

	$.post("<?php echo url_for('infoProfePrevia/comboSubprovin_mat') ?>",
	{ 
	 id_pais_mat:     $("#cipp_id_pais").val(),  
	 codigoProvincia: $("#codigoProv_mat").val(),
	},  
	      function(data){
	          $('#resulSubprov_mat').html(data);
	          startTableOnlySorter();
	      });
}

$(document).ready(function(){
    mostrarSubProvin_mat();
});



</script>
<div class=" panel-body">

<form id="documForm" class="form-horizontal" name="documForm" method="POST" action="<?php echo url_for("infoProfePrevia/altaMatricula") ?>" >
	<?php $cabecera = new Cabecera();
	$cabecera->ruta(link_to(__("Informacion profesional previa"), 'infoProfePrevia/infoProfePrevia'));
      
	if($_SESSION["usuario"]["modi"] == "S"){
    if (count($prof) < 3) {
		    $cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
    }
		$cabecera->accion('<button type="button" onclick="cancelar2()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
	};
  $cabecera->titulo(__("Nueva Matrícula"))->ruta(__("Nueva Matrícula"));

        
	echo $cabecera;

  if (count($prof)>=3) {  ?>

      <div class="text-danger grilla-val">
        <b><?php echo 'Lo sentimos, solo puede registrar hasta 3 matrículas'; ?></b>
      </div>

  <?php } else {?>
	<br/>
	<div class="wrapper">
	<div class="panel-body">
	
    <div class="row">
            <div class="col-xs-12 col-md-6">

              <br>
              <div class="form-group row">
              <label for="example-text-input" class="col-xs-3 col-form-label">Entidad</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="cipp_entidad" required value="<?php echo $row['cipp_entidad'] ?>">
              </div>
              </div>

              <div class="form-group row">
              <label for="example-search-input" class="col-xs-3 col-form-label">Lugar</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="cipp_lugar" required value="<?php echo $row['cipp_lugar'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-url-input" class="col-xs-3 col-form-label">Matrícula</label>
              <div class="col-xs-9">
                <input class="form-control" type="text" name="cipp_nro_matricula" required value="<?php echo $row['cipp_nro_matricula'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-tel-input" class="col-xs-3 col-form-label">F.Vencimiento</label>
              <div class="col-xs-9">
                <input class="form-control" type="date" name="cipp_fechavto" value="<?php echo $row['cipp_fechavto'] ?>" >
              </div>
              </div>

              <div class="form-group row">
              <label for="example-password-input" class="col-xs-3 col-form-label">Pais</label>
              <div class="col-xs-9">
                  <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                  <select id="cipp_id_pais" name="cipp_id_pais" class="form-control" width="40%" onchange="mostrarSubProvin_mat()"> 
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                          <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['cipp_id_pais']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                      <?php } ?>
                  </select>
              </div>
              </div>

              <div class="form-group row">
              <label for="example-email-input" class="col-xs-3 col-form-label">Provincia</label>
              <div class="col-xs-9">
                  <input type="hidden" id="codigoProv_mat" value="<?php echo $row['cipp_id_provincia'] ?>"  />
                  <p id="resulSubprov_mat"> </p>
              </div>
              </div>

     
           </div> <!-- del panel -->

        </div> <!-- del row -->


	</div>
	</div>
	 <?php } // del if de hasta cantidad max (3) ?>
</form>
</div>