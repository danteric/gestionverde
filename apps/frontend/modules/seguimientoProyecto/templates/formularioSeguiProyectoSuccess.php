<script src="/js/validaciones.js"></script>

<script type="text/javascript">

//--- inicializo para utilizar el popover----------------
$(document).ready(function(){
    $("[data-toggle='popover']").popover(); 

});

//--- al editar un proyecto, traigo todas las fichas relacionadas al mismo----------------
window.onload = function() {
      fichasPorFase();
  };



//funcion para volver al menu anterior al clickear boton "volver"
    cancelar = function(){   
        var defaultPrevented;
        location.href = '<?php echo url_for("seguimientoProyecto/seguimientoProyecto") ?>';
    }




    //--------ver las fichas dependiendo de la fase--------------------- 
   fichasPorFase = function() {
      var proy_id = $('#proy_id').val();
      var proy_fase = $('#proy_fase_id').val();

        //dependiendo de la fase, busca las fichas que debe tomar acción
        $.get("<?php echo url_for('seguimientoProyecto/FichasPorFase') ?> ", 
        {
         proy_id,
         proy_fase
         },
              function(data){
                  $('#tablaFichas').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });        
      
    }





  //  dependiendo del pais , trae el listado de provincias
  mostrarSubProvin = function() {

    $.post("<?php echo url_for('seguimientoProyecto/comboSubprovin') ?>",
    { 
     proy_pais_id: $("#proy_pais_id").val(),  
     proy_prov_id: $("#proy_prov_id").val(),
    },  
          function(data){
              $('#resulSubprov').html(data);
              startTableOnlySorter();
          });
  }

   $(document).ready(function(){
        mostrarSubProvin();
  });



</script>

<style>  input[type="text"] {  width: 150px;} 

.encabezado {background-color: #37474f; color: white}
.modal.modal-wide {top:10%;}
.modal.modal-wide .modal-dialog{max-width: 50%;}
.disabledTab{ pointer-events: none;}


</style>

<!-- ..............................FORMULARIO......................................... -->

<form id="formulario" method="POST" action="<?php echo url_for("abmProyecto/formularioProyecto") ?>">
<?php $optionsSelect = $cursor;
      $optionsSelect_fich_adhoc = $cursor_fich_adhoc;

		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("Seguimiento de Proyectos"),'seguimientoProyecto/seguimientoProyecto'));
    $cabecera->titulo(__("Seguimiento del Proyecto: '".$optionsSelect[0]['proy_nombre']."'" ))->ruta(__("Proyecto"));
       
      
    if($_SESSION["usuario"]["modi"] == "S")
    {
        $cabecera->accion('<button type="submit" id="btngrabar" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i>  Grabar</button>');
        $cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
    }
    
		echo $cabecera;
?>

<!-- .................................................................................. -->

<div id="spinner" class="spinner">
    <p class="text-error">
     <i class="icon-spinner icon-spin icon-large"></i> Obteniendo resultados,
  	<br>espere por favor...
    </p>
</div>


<div class="form-group row" style="margin-top: 10px">
        
        <label for="example-tel-input" class="col-md-1 col-form-label">Fase actual</label>
        <div class="col-md-2">
              <?php $optionsSelect = $dd_fase;?>
              <select id= "proy_fase_id" name="proy_fase_id" class="form-control" onchange="fichasPorFase()">
              <?php foreach ($optionsSelect as $arraySelect) { ?>
                  <option value="<?php echo $arraySelect['fase_id'];?>" <?php if($arraySelect['fase_id'] == $row['proy_fase_id']){echo 'selected';} ?> >
                    <?php echo $arraySelect['fase_deno']; ?>
                  </option> 
              <?php } ?>
              </select>

        </div>

        <label for="example-tel-input" class="col-md-1 col-form-label">Estado</label>
        <div class="col-md-2">
              <select id= "proy_estado" name="proy_estado" class="form-control">
                  <option value="A" selected>Abierto</option>
                  <option value="C">Cerrado</option> 
              </select>
        </div>

        <label for="example-tel-input" class="col-md-1 col-form-label">Fecha de cierre real</label>
        <div class="col-xs-2 col-md-2">
          <input type="date" class="form-control" id="proy_cierre_f" name="proy_cierre_f" value="<?php echo $row['proy_cierre_f']?>">
        </div> 
 </div>



<div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
            
            <li class="active">
              <a data-toggle="tab" href="#fich_fase">Fichas a utilizar</a>
            </li>

            <li>
              <a data-toggle="tab" href="#datosProy">Datos del Proyecto</a>
            </li>
          
            
            <li id="tabFichNoRel">
              <a data-toggle="tab" href="#fich_no_rel">Todas las fichas</a>
            </li>

        </ul>
             
        
        <div class="tab-content" id="content" style="margin-top: 20px; overflow-x: hidden;">

        
          <!-- .................................Panel de Fichas relacionadas........................ -->
          <div id="fich_fase" class="tab-pane fade in active"  >
          
            <div id="tablaFichas" class="responsiveWidth"></div>

          </div>


          <div id="datosProy"  class="tab-pane fade">
            
            <!-- selecciona cursor que es donde estan todos los datos del proyecto en seguimiento.php -->
            
            <?php foreach ($cursor as $row) {} ?> <!-- datos del proyecto -->
            <?php foreach ($cursor_fich_adhoc as $row_2) {} ?> <!-- ficha adhoc -->  

            <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Cod. interno</label>
                <div class="col-xs-1 col-md-1">
                    <input class="form-control" type="text" id="proy_id" name="proy_id" value="<?php echo $row['proy_id'] ?>" readonly >
                </div>
            </div>

            <div class="form-group row">
              <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Nombre</label>
              <div class="col-xs-8 col-md-8">
                <input class="form-control" id="proy_nombre" name="proy_nombre" value="<?php echo $row['proy_nombre'] ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Descripción</label>
              <div class="col-xs-8 col-md-8">
                <textarea class="form-control" name="proy_obser" readonly><?php echo $row['proy_obser'] ?></textarea>
              </div>  
            </div>
              
            <div class="form-group row">
                  
                  <label for="proy_pais_id" class="col-md-1 col-form-label">Pais</label>
                  <div class="col-xs-8 col-md-2">
                      <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>

                      <select id="proy_pais_id" name="proy_pais_id" class="form-control" readonly>
                      <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                      <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['proy_pais_id'] ==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                      <?php } ?>
                       </select>
                  </div>

                  <label for="proy_prov_id" class="col-md-1 col-form-label">Provincia</label>
                  <div class="col-xs-8 col-md-2">
                      <input type="hidden" id="proy_prov_id" value="<?php echo $row['proy_prov_id'] ?>" readonly>
                      <b id="resulSubprov" style="font-weight: normal" readonly></b>
                  </div>
    
                  <label for="id_localidad" class="col-md-1 col-form-label">Localidad</label>
                  <div class="col-xs-8 col-md-2">
                          <input type='text' id="datosinfo"  placeholder="-" class='form-control datosinfo limpiarcampo' value='' readonly>
                          <input type="hidden" id="proy_loca_id" name="proy_loca_id" value="<?php echo $row['proy_loca_id']?>" >

                  </div>
                             
            </div> <!-- form group localidad -->


            <div class="form-group row">
               
                  <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Fecha de inicio</label>
                  <div class="col-xs-2 col-md-2">
                    <input type="date" class="form-control" id="proy_inicio_f" name="proy_inicio_f" value="<?php echo $row['proy_inicio_f']?>" readonly>
                  </div>  
                               
                  <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Cierre Estimado</label>
                  <div class="col-xs-2 col-md-2">
                    <input type="date" class="form-control" id="proy_fin_estimado_f" name="proy_fin_estimado_f" value="<?php echo $row['proy_fin_estimado_f']?>" readonly>
                  </div>           
            </div>

</div> <!--cierre del div id=home-->
   

            <!-- .................................Panel de Fichas No relacionadas........................ -->
          <div id="fich_no_rel" class="tab-pane fade" >
          
            <div id="tablaFichasNoRel" class="responsiveWidth"></div>

          </div>

 
                  
          <!-- .......................Modal de advertencia al modificar clasificaciones........................... -->
          <div id="alert_modificarDatos" class="modal modal-wide fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">¿Está seguro de modificar las clasificaciones?</h4>
                  </div>
                  
                  <div class="modal-body">
                      <p>Se eliminarán todas las fichas que se incluyeron al proyecto. Deberá volverlas a incluir confirmando la nueva clasificación (Tamaño/Medio/Tipología).</p>
                  </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="modificarDatos()">Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal--> 

           
  

    
      </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 


<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
