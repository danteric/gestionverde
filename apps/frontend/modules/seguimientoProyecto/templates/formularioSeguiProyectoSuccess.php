<script src="/js/validaciones.js"></script>

<script type="text/javascript">

//--- inicializo para utilizar el popover----------------
$(document).ready(function(){
    $("[data-toggle='popover']").popover({
      container: 'body'
    }); 

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
        $.get("<?php echo url_for('seguimientoProyecto/fichasPorFase') ?> ", 
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

   // modal para el cierre de proyecto, pregunta si esta seguro de cerrar el proyecto
   modal_cerrarProyecto = function(){
      $('#modal_cierreProyecto').modal('show');
   }

  
   //funcion para cerrar el proyecto, colocando su estado en cerrado
   cerrarProyecto = function(){

      var proy_id = $('#proy_id').val();
      var proy_fase = $('#proy_fase_id').val();

      $.get("<?php echo url_for('seguimientoProyecto/cierreProyecto') ?>",
      { 
       proy_id,
       proy_fase
      },  
            function(data){
                $('#cierreProyectoCorrecto').html(data);
            });
            
            $('#modal_cierreProyecto').modal('hide');
            location.href = '<?php echo url_for("seguimientoProyecto/seguimientoProyecto") ?>';
            
    }





</script>

<style>  input[type="text"] {  width: 150px;} 

.encabezado {background-color: #37474f; color: white}
.modal.modal-wide {top:10%;}
.modal.modal-wide .modal-dialog{max-width: 50%;}
.disabledTab{ pointer-events: none;}


</style>

<!-- ..............................FORMULARIO......................................... -->

<form id="formulario" method="POST" action="<?php echo url_for("seguimientoProyecto/FormularioSeguiProyecto") ?>">
<?php 
      $optionsSelect_fich_adhoc = $cursor_fich_adhoc;
      $optionsSelect = $cursor;
		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("Seguimiento de Proyectos"),'seguimientoProyecto/seguimientoProyecto'));
    $cabecera->titulo(__("Seguimiento del Proyecto: '".$optionsSelect[0]['proy_nombre']."'" ))->ruta(__("Proyecto"));
       
      
    if($_SESSION["usuario"]["modi"] == "S")
    {
        $cabecera->accion('<button type="button" class="btn btn-success" onclick="modal_cerrarProyecto()"><i class="glyphicon glyphicon-ok"></i> Cerrar Proyecto</button>');

        $cabecera->accion('<button type="submit" id="btngrabar" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i>  Guardar Fase Actual</button>');

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

<?php foreach ($cursor as $row) {}?> <!-- inicializo datos del proyecto -->

<div class="form-group row" style="margin-top: 10px">
        
        <label for="example-tel-input" class="col-md-1 col-form-label">Fase actual</label>
        <div class="col-md-2">
              <?php $optionsSelectFases = $dd_fase;?>
              <select id= "proy_fase_id" name="proy_fase_id" class="form-control" onchange="fichasPorFase()" data-content="Seleccione la fase actual del proyecto" data-toggle="popover" data-trigger="hover" data-placement="right">
              <?php foreach ($optionsSelectFases as $arraySelect) { ?>
                  <option value="<?php echo $arraySelect['fase_id'];?>" <?php if($arraySelect['fase_id'] == $row['proy_fase_actual']){echo 'selected';} ?> >
                    <?php echo $arraySelect['fase_deno']; ?>
                  </option> 
              <?php } ?>
              </select>

        </div>
        
        <!-- 
        <label for="example-tel-input" class="col-md-1 col-form-label">Estado</label>
        <div class="col-md-2">
              <select id= "proy_estado" name="proy_estado" class="form-control">
                  <option value="A" selected>Abierto</option>
                  <option value="C">Cerrado</option> 
              </select>
        </div>

        <label for="example-tel-input" class="col-md-1 col-form-label">Fecha de cierre real</label>
        <div class="col-xs-2 col-md-2">
          <input type="date" class="form-control" id="proy_cierre_f" name="proy_cierre_f" value="<?php //echo $row['proy_cierre_f']?>">
        </div> 
        -->
 </div>



<div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
            
            <li class="active">
              <a data-toggle="tab" href="#fich_fase">Fichas a utilizar</a>
            </li>

            <li>
              <a data-toggle="tab" href="#datosProy">Datos del Proyecto</a>
            </li>
          

        </ul>
             
        
        <div class="tab-content" id="content" style="margin-top: 20px; overflow-x: hidden;">

        
          <!-- .................................Panel de Fichas relacionadas........................ -->
          <div id="fich_fase" class="tab-pane fade in active"  >
          
            <div id="tablaFichas" class="responsiveWidth"></div>

          </div>


          <div id="datosProy"  class="tab-pane fade">
            
            <!-- selecciona cursor que es donde estan todos los datos del proyecto en seguimiento.php -->
            
          
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
              <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Domicilio</label>
              <div class="col-xs-8 col-md-8">
                <textarea class="form-control" name="proy_domicilio" readonly><?php echo $row['proy_domicilio'] ?></textarea>
              </div>  
            </div>
              
            <div class="form-group row">
                  
                  <label for="proy_pais_id" class="col-md-1 col-form-label">Pais</label>
                  <div class="col-xs-8 col-md-2">
                      <input  id="proy_pais_id" class="form-control" name="proy_pais_id" value="<?php echo $row['cpai_pais'] ?>" readonly>
                  </div>

                  <label for="proy_prov_id" class="col-md-1 col-form-label">Provincia</label>
                  <div class="col-xs-8 col-md-2">
                     <input id="proy_prov_id" class="form-control" value="<?php echo $row['cprv_provincia'] ?>" readonly>
                  </div>
    
                  <label for="id_localidad" class="col-md-1 col-form-label">Localidad</label>
                  <div class="col-xs-8 col-md-2">
                      <input class='form-control' id="proy_loca_id"  name="proy_loca_id" value="<?php echo $row['cloc_localidad']?>" readonly>
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

           
         <!-- .......................Modal de advertencia al cerrar el proyecto........................... -->
          <div id="modal_cierreProyecto" class="modal modal-wide fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">¿Está seguro de cerrar el proyecto?</h4>
                  </div>
                  
                  <div class="modal-body">
                    <p>El proyecto se colocará en estado "cerrado" y se removerá del módulo de seguimiento de proyectos</p>
                  </div>
              
                  <div id="cierreProyectoCorrecto"></div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="cerrarProyecto()">Cerrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                  </div>
                  

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal-->   
  

    
      </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 


<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
