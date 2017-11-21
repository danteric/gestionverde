<script src="/js/validaciones.js"></script>

<script type="text/javascript">

//--- inicializo para utilizar el popover----------------
$(document).ready(function(){
    $("[data-toggle='popover']").popover(); 

});

//--- al editar un proyecto, traigo todas las fichas relacionadas al mismo----------------
window.onload = function() {
  <?php 
      if($alta == 0) { ?>
              agregarFichas();
  <?php }; ?>
};



//funcion para volver al menu anterior al clickear boton "volver"
    cancelar = function(){   
        var defaultPrevented;
        location.href = '<?php echo url_for("abmProyecto/abmProyecto") ?>';
    }


// ya que al desabilitar las clasificaciones no se envian al servidor, al guardar las habilito
     grabo_clasif = function(){   
       $('#proy_tama_id').attr("disabled",false);
      $('#proy_tipo_id').attr("disabled",false);
      $('#proy_medi_id').attr("disabled",false);
    }


    //------------------Funcion al confirmar datos--------------------- 
   agregarFichas = function() {
      var proy_id = $('#proy_id').val();
      var medi_rel = $('#proy_medi_id').val();
      var tama_rel = $('#proy_tama_id').val();
      var tipo_rel = $('#proy_tipo_id').val();
      var proy_nombre = $('#proy_nombre').val();
      var proy_inicio_f = $('#proy_inicio_f').val();
      var proy_fin_estimado_f = $('#proy_fin_estimado_f').val();


        //dependiendo de la clasificación, busca en la BD las fichas relacionadas
        $.get("<?php echo url_for('abmProyecto/FichasRelacionadas') ?> ", 
        {
         proy_id,
         medi_rel,
         tama_rel,
         tipo_rel
         },
              function(data){
                  $('#tablaFichasRel').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });
        
        //dependiendo de la clasificación, busca en la BD las fichas no relacionadas
        
        $.get("<?php echo url_for('abmProyecto/FichasNoRelacionadas') ?> ", 
        {
         proy_id,
         medi_rel,
         tama_rel,
         tipo_rel
         },
              function(data){
                  $('#tablaFichasNoRel').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });
          
        //deshabilito las opciones de la clasificación del proyecto      
         $('#proy_tama_id').attr("disabled",true);
         $('#proy_tipo_id').attr("disabled",true);
         $('#proy_medi_id').attr("disabled",true);

        //habilito las pestañas para adjuntar fichas
         $('#tabFichRel').removeClass('disabled disabledTab');    
         $('#tabFichNoRel').removeClass('disabled disabledTab'); 
         $('#tabFichAdHoc').removeClass('disabled disabledTab'); 

        //cambio el boton de confirmar a deshabilitado y habilito el de modificar datos
         $('#botonConfirmar').removeClass('btn-primary');
         $('#botonModificar').removeClass('disabled');
         $('#botonConfirmar').addClass('btn-default');
         $('#botonConfirmar').addClass('disabled');
         $('#botonModificar').addClass('btn-primary');
         
      
    }


 //modal para modificar las clasificaciones   
modal_modificarDatos = function() { $('#alert_modificarDatos').modal('show'); }


//modificar los datos de las clasificaciones de la obra
modificarDatos = function() {

      //var proy_id = $('#proy_id').val();
      $('#alert_modificarDatos').modal('hide');
      $('#tabFichRel').addClass('disabled disabledTab');
      $('#tabFichNoRel').addClass('disabled disabledTab');
      $('#tabFichAdHoc').addClass('disabled disabledTab');
      $('#botonConfirmar').removeClass('disabled');
      $('#botonConfirmar').addClass('btn-primary');
      $('#botonModificar').addClass('disabled');
      $('#botonModificar').removeClass('btn-primary');
      $('#proy_tama_id').attr("disabled",false);
      $('#proy_tipo_id').attr("disabled",false);
      $('#proy_medi_id').attr("disabled",false);

      //borro las fichas que se adjuntaron al proyecto
      $.get("<?php echo url_for('abmProyecto/borrarFichasProyecto') ?> ", 
      {
       proy_id : $('#proy_id').val()
       },
            function(data){
                $('#resulborra').html(data);
            });

  }



  //  dependiendo del pais , trae el listado de provincias
  mostrarSubProvin = function() {

    $.post("<?php echo url_for('abmProyecto/comboSubprovin') ?>",
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


// funcion para mostrar dinamicamente las localidades al escribir en el input
$(document).ready(function(){    
    // llamado automatico para mostrar nombre de lalocal
    var locaString = $("#proy_loca_id").val()+','+$("#proy_prov_id").val()+','+$("#proy_pais_id").val();
    mostrarNombreGenerico(locaString,'loca_prov','datosinfo');
    //autocomplete//
    $('.datosinfo').keyup(function(){

        var valor = $(this).val();   
        if (valor.length > 2) {
                 var pais = $("#proy_pais_id").val();
        var prov = $("#p_id_provincia").val();
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

   
        $("#id_localidad").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#id_localidad").hide(); 
                
                  $('.activocombo').click(function(event){
                  event.preventDefault();
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo').val($('#'+id).attr('data2'));
                                $('#proy_loca_id').val($('#'+id).attr('data'));
                               
                });  
         } });  

        }   
    });
    });





</script>

<style>
input[type="text"] {  width: 150px;} 

.encabezado {background-color: #37474f; color: white}
.modal.modal-wide {top:10%;}
.modal.modal-wide .modal-dialog{max-width: 50%;}
.disabledTab{ pointer-events: none;}
fieldset{border: 2px groove #ccc !important; width: : auto; position: relative; border-radius: 4px;padding:  0px 0px 0px 15px !important; border-bottom: none; } 
legend {margin-bottom: 5px}


</style>

<!-- ..............................FORMULARIO......................................... -->

<form id="formulario" class="form-project" method="POST" action="<?php echo url_for("abmProyecto/formularioProyecto") ?>" autocomplete="off">
<?php $optionsSelect = $cursor;
      $optionsSelect_fich_adhoc = $cursor_fich_adhoc;

		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("Administración de Proyectos"),'abmProyecto/abmProyecto'));
    
    $alta_proyecto = $alta; //para inicializar en esta sección si es un alta o no

   	if($alta_proyecto == 1)
        {  
            $cabecera->titulo(__("Nuevo Proyecto"))->ruta(__("Nuevo Proyecto"));
        }else{
            $cabecera->titulo(__("Proyecto: '".$optionsSelect[0]['proy_nombre']."'" ))->ruta(__("Editando Proyecto"));
       
        }

        if($_SESSION["usuario"]["modi"] == "S")
        {
            $cabecera->accion('<button type="submit" id="btngrabar" onclick="grabo_clasif()" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Grabar</button>');
            
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




    <div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="#home">Datos del Proyecto</a>
            </li>

            <li id="tabFichRel" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_rel">Fichas Relacionadas</a>
            </li>
            
            <li id="tabFichNoRel" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_no_rel">Fichas no Relacionadas</a>
            </li>
            
            <!--
            <li id="tabFichAdHoc" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_ad_hoc">Ficha Ad-Hoc</a>
            </li>
            -->
        </ul>
             
        
        <div class="tab-content" id="content" style="margin-top: 10px; ">

            <div id="home" class="tab-pane fade in active" >
              
              <!-- selecciona cursor que es donde estan todos los datos del proyecto en abmProyecto.php -->
              
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
                  <input class="form-control" id="proy_nombre" name="proy_nombre" value="<?php echo $row['proy_nombre'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Descripción</label>
                <div class="col-xs-8 col-md-8">
                  <textarea class="form-control" id="proy_obser" name="proy_obser" required><?php echo $row['proy_obser'] ?></textarea>
                </div>  
              </div>

                <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Dirección</label>
                <div class="col-xs-8 col-md-8">
                  <textarea class="form-control" id="proy_domicilio" name="proy_domicilio" rows="1" required ><?php echo $row['proy_domicilio'] ?></textarea>
                </div>  
              </div>
              
              <div class="form-group row">
                    
                    <label for="proy_pais_id" class="col-md-1 col-form-label">Pais</label>
                    <div class="col-xs-8 col-md-2">
                        <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                        <?php if($row['proy_pais_id'] == ''){$row['proy_pais_id'] = '3'; };?>

                        <select id="proy_pais_id" name="proy_pais_id" class="form-control" onchange="mostrarSubProvin()" required>
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                        <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['proy_pais_id'] ==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
                        <?php } ?>
                         </select>
                    </div>

                    <label for="proy_prov_id" class="col-md-1 col-form-label">Provincia</label>
                    <div class="col-xs-8 col-md-2">
                        <input type="hidden" id="proy_prov_id" value="<?php echo $row['proy_prov_id'] ?>" required>
                        <b id="resulSubprov" style="font-weight: normal"></b>
                    </div>
      
                    <label for="id_localidad" class="col-md-1 col-form-label">Localidad</label>
                    <div class="col-xs-8 col-md-2">
                            <i id="id_localidad" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                            <input type='text' id="datosinfo"  placeholder="Escriba localidad" class='form-control datosinfo limpiarcampo' value=''>
                            <input type="hidden" id="proy_loca_id" name="proy_loca_id" value="<?php echo $row['proy_loca_id']?>" >
                            <div id="muestroayudabuscado"></div>
                            <b class="focusMensajes" id="focusMensajes" ></b>  
                    </div>
                               
              </div> <!-- form group localidad -->


              <div class="form-group row">
                 
                    <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Fecha de inicio</label>
                    <div class="col-xs-2 col-md-2">
                      <input type="date" class="form-control" id="proy_inicio_f" name="proy_inicio_f" value="<?php echo $row['proy_inicio_f']?>" required>
                    </div>  
                                 
                    <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Cierre Estimado</label>
                    <div class="col-xs-2 col-md-2">
                      <input type="date" class="form-control" id="proy_fin_estimado_f" name="proy_fin_estimado_f" value="<?php echo $row['proy_fin_estimado_f']?>" required>
                    </div>               
              
              </div>
     

            <div class="row col-md-8">
            <fieldset>
            <legend style="font-size: 14px;width: auto;border-bottom: none">Clasificación del proyecto</legend>
                                    
                       <div class="form-group row">
            
                          <label for="example-tel-input" class="col-md-1" style="margin-top:5px;padding-right: 0px">Tamaño</label>
                          <div class="col-md-2" >
                                <?php $optionsSelect = $dd_tama;?>
                                <select id= "proy_tama_id" name="proy_tama_id" class="form-control" required>
                                <?php foreach ($optionsSelect as $arraySelect) { ?>
                                    <option value="<?php echo $arraySelect['tama_id'];?>" <?php if($arraySelect['tama_id'] == $row['proy_tama_id']){echo 'selected';} ?> >
                                      <?php echo $arraySelect['tama_deno']; ?>
                                    </option> 
                                <?php } ?>
                                </select>

                          </div>
          
                          <label for="example-tel-input" class="col-md-1" style="margin-top:5px">Medio</label>
                          <div class="col-md-3">
                                <?php $optionsSelect = $dd_medi;?>
                                <select id= "proy_medi_id" name="proy_medi_id" class="form-control" required>
                                <?php foreach ($optionsSelect as $arraySelect) { ?>
                                    <option value="<?php echo $arraySelect['medi_id'];?>" <?php if($arraySelect['medi_id'] == $row['proy_medi_id']){echo 'selected';} ?> >
                                      <?php echo $arraySelect['medi_deno']; ?>
                                    </option> 
                                <?php } ?>
                               </select>
                          </div>
                        
                          <label for="example-tel-input" class="col-md-1" style="margin-top:5px">Tipología</label>
                          <div class="col-md-3">
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
                 
              
              </fieldset>
            </div>
           
            <div class="row col-md-8">
               <div class="form-group row" style="margin-left: 0px ;margin-top:10px;margin-bottom: 20px">
                               
                  <a  href="#" id="botonConfirmar" class="btn btn-success" onclick="agregarFichas()" data-content="Al confirmar el tamaño de obra, medio y tipología, podrá adjuntar fichas al proyecto" data-toggle="popover" data-trigger="hover" data-placement="right"><i class="glyphicon glyphicon-ok"></i> Confirmar clasificación</a>

                  <a  href="#" id="botonModificar" class="btn btn-default disabled" style="margin-left: 5px" onclick="modal_modificarDatos()" data-content="Modificar las clasificaciones (Tamaño/Medio/Tipología)" data-toggle="popover" data-trigger="hover" data-placement="right"><i class="glyphicon glyphicon-edit"></i> Modificar Clasificaciones</a>
                  <div id="resulborra" class="responsiveWidth">
                  </div>
               </div>
            </div>
           
          </div> <!--cierre del div id=home-->
         
        
          <!-- .................................Panel de Fichas relacionadas........................ -->
          <div id="fich_rel" class="tab-pane fade" >
          
            <div id="tablaFichasRel" class="responsiveWidth"></div>

          </div>


            <!-- .................................Panel de Fichas No relacionadas........................ -->
          <div id="fich_no_rel" class="tab-pane fade" >
          
            <div id="tablaFichasNoRel" class="responsiveWidth"></div>

          </div>
    
          <!-- .................................Panel de Ficha Ad-Hoc........................ -->
          <!--
          <div id="fich_ad_hoc" class="tab-pane fade" >
          
              <div class="row">
                  <div class="col-md-8">   
                      <div class="row">
                            <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label">Nombre Ficha</label>
                            <div class="col-xs-8 col-md-4">
                                  <textarea class="form-control" name="pfad_nombre" style="margin-bottom: 5px"><?php echo $row_2['pfad_nombre'] ?></textarea>
                            </div>  
                       </div> 

                      <div class="row">
                              <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label">Procedimiento</label>
                              <div class="col-xs-12 col-md-8">
                                 <textarea class="form-control" name="pfad_proce" style="margin-bottom: 5px"><?php echo $row_2['pfad_proce'] ?></textarea>
                              </div>
                      </div>  

                      <div class="row">
                              <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label">Recursos Estimados</label>
                              <div class="col-xs-12 col-md-8">
                                 <textarea class="form-control" name="pfad_recurso" style="margin-bottom: 5px"><?php echo $row_2['pfad_recurso'] ?></textarea>
                              </div> 
                      </div>
                  </div>    
              </div> 
          </div>
          -->

                  
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


           
  
          <!-- ............modal de error al no completar campos de caracteristicas.... -->        
          <div id="men_err_completar" class="modal modal-wide fade" style="top: 30%">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body">
                  <p style="text-align: center;vertical-align: middle;font-size: 15px; font-weight: bold;">Completar los datos obligatorios</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

    
      </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 


<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->
