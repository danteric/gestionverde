<script src="/js/validaciones.js"></script>

<script type="text/javascript">

    cancelar = function(){   //funcion para volver al clickear boton "volver"
        var defaultPrevented;
        location.href = '<?php echo url_for("abmProyecto/abmProyecto") ?>';
    }

     
   agregarFichaRel = function() {


      //cata_id: $('#proy_nombre').val(),

     //$("from#formulario").submit(function(){
        //alert ("lo hizo");
      $.get("<?php echo url_for('abmProyecto/FichasRelacionadas') ?> ", 
      {
       proy_medi_id: $('#proy_medi_id').val(),
       proy_tama_id: $('#proy_tama_id').val(),
       proy_tipo_id: $('#proy_tipo_id').val()
       },
            function(data){
                $('#tablaFichasRel').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
            });




        $('#adjFichRel').modal('show');
       // });
      //alert ("no lo hizo");
      
    }

//$('#myModalExito').modal('show');

/*
    $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
    }); 
*/
</script>

<style>  input[type="text"] {  width: 150px;}  

.encabezado {background-color: #37474f; color: white}
.modal{top:20%;}
.modal-wide .modal-body{overflow-y: auto;}
.modal.modal-wide .modal-dialog{max-width: 60%}
#adjFichRel .modal-body{margin-bottom: 250px}
 #adjOtrasFichas .modal-body{margin-bottom: 250px}

</style>

<form id="formulario" method="POST" action="<?php echo url_for("abmProyecto/formularioProyecto") ?>">
<?php $optionsSelect = $cursor;

		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("Adm. de Proyectos"),'abmProyecto/abmProyecto'));
    
    $alta_proyecto = $alta; //para inicializar en esta sección si es un alta o no

   	if($alta_proyecto == 1)
        {  
            $cabecera->titulo(__("Nuevo Proyecto"))->ruta(__("Nuevo Proyecto"));
        }else{
            $cabecera->titulo(__("Editando Proyecto: '".$optionsSelect[0]['proy_nombre']."'" ))->ruta(__("Editando Proyecto"));
        }

        if($_SESSION["usuario"]["modi"] == "S")
        {
            $cabecera->accion('<input type="submit" id="btngrabar" value="Grabar" class="btn btn-primary" />');
            $cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
        }
        
   		echo $cabecera;
?>



<div id="spinner" class="spinner">
    <p class="text-error">
     <i class="icon-spinner icon-spin icon-large"></i> Obteniendo resultados,
  	<br>espere por favor...
    </p>
</div>

<input type="hidden" id="alta" name="alta" value="<?php echo $alta; ?>" />
<input type="hidden" id="id" name="id" class="" value="<?php echo $id; ?>" />
 <?php foreach ($c_numerador as $row_num) {} ?>
<input type="hidden" id="temp_proye" name="temp_proye" class="" value="<?php echo $row_num['temp_proye']; ?>" />

<div class="wrapper tipoframe">
    <div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="#home">Datos del Proyecto</a>
            </li>

        </ul>
             
        <div class="tab-content" id="content" style="margin-top: 20px; overflow-x: hidden;">

            <div id="home" class="tab-pane fade in active" >
              
              <!-- selecciona cursor que es donde estan todos los datos del proyecto en abmProyecto.php -->
              
              <?php foreach ($cursor as $row) {} ?>

              <div class="form-group row">
                  <label for="example-tel-input" class="col-md-1 col-form-label">Cod. interno</label>
                  <div class="col-md-1">
                      <input class="form-control" type="text" name="proy_id" value="<?php echo $row['proy_id'] ?>" readonly >
                  </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-md-1 col-form-label">Nombre</label>
                <div class="col-xs-8 col-md-8">
                  <input class="form-control" id="proy_nombre" name="proy_nombre" value="<?php echo $row['proy_nombre'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-md-1 col-form-label">Descripción</label>
                <div class="col-xs-8 col-md-8">
                  <textarea class="form-control" name="proy_obser" required><?php echo $row['proy_obser'] ?></textarea>
                </div>  
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-md-1 col-form-label">Localidad</label>
                <div class="col-xs-8 col-md-4">
                  <select id= "proy_loca_id" name="proy_loca_id" class="form-control">
                  </select>
                </div>  
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-md-1 col-form-label">Fecha de inicio</label>
                <div class="col-xs-1 col-md-1 input-group date" data-provide="datepicker">
                  <input type="date" class="form-control" required>
                   <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>  
              </div>
     

             

              <div class="form-group row">
                  
                  <label for="example-tel-input" class="col-md-1 col-form-label">Tamaño de la obra</label>
                  <div class="col-md-2">
                        <?php $optionsSelect = $dd_tama;?>
                        <select id= "proy_tama_id" name="proy_tama_id" class="form-control" required>
                        <?php foreach ($optionsSelect as $arraySelect) { ?>
                            <option value="<?php echo $arraySelect['tama_id'];?>" <?php if($arraySelect['tama_id'] == $row['proy_tama_id']){echo 'selected';} ?> >
                              <?php echo $arraySelect['tama_deno']; ?>
                            </option> 
                        <?php } ?>
                        </select>

                  </div>
  
                  <label for="example-tel-input" class="col-md-1 col-form-label">Medio</label>
                  <div class="col-md-2">
                        <?php $optionsSelect = $dd_medi;?>
                        <select id= "proy_medi_id" name="proy_medi_id" class="form-control" required>
                        <?php foreach ($optionsSelect as $arraySelect) { ?>
                            <option value="<?php echo $arraySelect['medi_id'];?>" <?php if($arraySelect['medi_id'] == $row['proy_medi_id']){echo 'selected';} ?> >
                              <?php echo $arraySelect['medi_deno']; ?>
                            </option> 
                        <?php } ?>
                       </select>
                  </div>
                
                  <label for="example-tel-input" class="col-md-1 col-form-label">Tipología</label>
                  <div class="col-md-2">
                        <?php $optionsSelect = $dd_tipo;?>
                        <select id= "proy_tipo_id" name="proy_tipo_id" class="form-control" required>
                        <?php foreach ($optionsSelect as $arraySelect) { ?>
                            <option value="<?php echo $arraySelect['tipo_id'];?>" <?php if($arraySelect['tipo_id'] == $row['proy_tipo_id']){echo 'selected';} ?> >
                              <?php echo $arraySelect['tipo_deno']; ?>
                            </option> 
                        <?php } ?>
                       </select>
                  </div>

              </div><!-- cierre form group row -->

              
             <div class="form-group row" style="margin-left: 0px ;margin-top:15px">
                
                <a  href="#" class="btn btn-primary" onclick="agregarFichaRel()"> Adjuntar Fichas Relacionadas</a>

                <a data-toggle="modal" href="#adjOtrasFichas" class="btn btn-default"> Adjuntar otras Fichas</a>

                <a data-toggle="modal" href="#adjFichAd" class="btn btn-default"> Adjuntar Ficha Ad-hoc</a>
            
              </div>
          </div> <!--cierre del div id=home-->
            
            
          


          <!-- .......................Modal de Adjuntar Fichas Relacionadas........................... -->
          <div id="adjFichRel" class="modal modal-wide fade">
          <?php $optionsSelect = $cursor_fichas_rel;?>

            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Adjuntar Fichas Relacionadas </h4>
                  </div>
                  
                  <div class="modal-body">
                      <div id="tablaFichasRel" class="responsiveWidth"></div>
                  </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal-->


          <!-- .......................Modal de Adjuntar otras Fichas........................... -->
          <div id="adjOtrasFichas" class="modal modal-wide fade">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Adjuntar Fichas Adicionales</h4>
                  </div>
                  
                  <div class="modal-body">
                      <p>Ver como subir la info..</p>
                  </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal--> 

           <!-- .......................Modal de Adjuntar Ficha adhoc........................... -->
          <div id="adjFichAd" class="modal modal-wide fade">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Adjuntar Ficha Propia</h4>
                  </div>
                  
                  <div class="modal-body" style="overflow-x: hidden;">
                     
                      <div class="form-group row">
                        <div class="row">

                          <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label" style="margin-left: 15px">Nombre Ficha</label>
                          <div class="col-xs-9 col-md-4">
                             <textarea class="form-control" name="pfad_nombre" style="margin-bottom: 5px"></textarea>
                          </div>  
                        </div>
                        <div class="row">
                          <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label" style="margin-left: 15px">Procedimientos</label>
                          <div class="col-xs-9 col-md-9">
                             <textarea class="form-control" name="pfad_proce" style="margin-bottom: 5px"></textarea>
                          </div>
                         </div>  
                        <div class="row">
                          <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label" style="margin-left: 15px">Recursos Estimados</label>
                          <div class="col-xs-9 col-md-9">
                             <textarea class="form-control" name="pfad_recurso" style="margin-bottom: 5px"></textarea>
                          </div> 
                        </div>
                    </div>
                  </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal--> 

      </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 


<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->