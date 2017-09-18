<script src="/js/validaciones.js"></script>

<script type="text/javascript">

    cancelar = function(){   //funcion para volver al clickear boton "volver"
        var defaultPrevented;
        location.href = '<?php echo url_for("abmProyecto/abmProyecto") ?>';
    }

$(document).ready(function(){
    $("[data-toggle='popover']").popover(); 

});

 
    //------------------Funcion al confirmar datos--------------------- 
   agregarFichaRel = function() {

      var proy_medi_id = $('#proy_medi_id').val();
      var proy_tama_id = $('#proy_tama_id').val();
      var proy_tipo_id = $('#proy_tipo_id').val();
      var proy_nombre = $('#proy_nombre').val();
      var proy_inicio_f = $('#proy_inicio_f').val();
      var proy_fin_estimado_f = $('#proy_fin_estimado_f').val();

     //$("from#formulario").submit(function(){

     if ( (proy_medi_id == '') || (proy_tama_id == '') || (proy_tipo_id == '') 
            || (proy_nombre == '') || (proy_inicio_f == '') || (proy_fin_estimado_f == '') )
     {  
        $('#men_err_completar').modal('show');

     }else{

        $.get("<?php echo url_for('abmProyecto/FichasRelacionadas') ?> ", 
        {
         proy_medi_id,
         proy_tama_id,
         proy_tipo_id
         },
              function(data){
                  $('#tablaFichasRel').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });

        //deshabilito las opciones de la clasificación del proyecto
         $('#proy_tama_id').attr("disabled",true);
         $('#proy_tipo_id').attr("disabled",true);
         $('#proy_medi_id').attr("disabled",true);

        //habilito las pestañas para adjuntar fichas
         $('#tabFichRel').removeClass('disabled disabledTab');    

        //cambio el boton de confirmar a deshabilitado y habilito el de modificar datos
         $('#botonConfirmar').removeClass('btn-primary');
         $('#botonModificar').removeClass('disabled');
         $('#botonConfirmar').addClass('btn-default');
         $('#botonConfirmar').addClass('disabled');
         $('#botonModificar').addClass('btn-primary');
         

      } 
      
    }


  //modificar los datos de las clasificaciones de la obra
  modificarDatos = function() {
      $('#tabFichRel').addClass('disabled disabledTab');
      $('#botonConfirmar').removeClass('disabled');
      $('#botonConfirmar').addClass('btn-primary');
      $('#botonModificar').addClass('disabled');
      $('#botonModificar').removeClass('btn-primary');
      $('#proy_tama_id').attr("disabled",false);
      $('#proy_tipo_id').attr("disabled",false);
      $('#proy_medi_id').attr("disabled",false);

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
        var pais = $("#proy_pais_id").val();
        var prov = $("#p_id_provincia").val();
        
        var accion = 'loca_prov';
        var dataString = "valor="+valor+','+accion+','+pais+','+prov;

        console.log(dataString);
        $("#id_localidad").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#id_localidad").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo').val($('#'+id).attr('data2'));
                                $('#proy_loca_id').val($('#'+id).attr('data'));
                               
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado').hide();
                    
                });  
          
         } });     
       
    });
    });


</script>

<style>  input[type="text"] {  width: 150px;} 

.encabezado {background-color: #37474f; color: white}
.modal.modal-wide {top:10%;}
.modal.modal-wide .modal-dialog{max-width: 50%;}
.disabledTab{ pointer-events: none;}


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

            <li id="tabFichRel" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_rel">Fichas Relacionadas</a>
            </li>
            
            <li id="tabFichNoRel" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_no_rel">Fichas no Relacionadas</a>
            </li>

            <li id="tabFichAdHoc" class="disabled disabledTab">
              <a data-toggle="tab" href="#fich_ad_hoc">Ficha Ad-Hoc</a>
            </li>
        </ul>
             
        
        <div class="tab-content" id="content" style="margin-top: 20px; overflow-x: hidden;">

            <div id="home" class="tab-pane fade in active" >
              
              <!-- selecciona cursor que es donde estan todos los datos del proyecto en abmProyecto.php -->
              
              <?php foreach ($cursor as $row) {} ?>

              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-1 col-md-1 col-form-label">Cod. interno</label>
                  <div class="col-xs-1 col-md-1">
                      <input class="form-control" type="text" name="proy_id" value="<?php echo $row['proy_id'] ?>" readonly >
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
                  <textarea class="form-control" name="proy_obser" required><?php echo $row['proy_obser'] ?></textarea>
                </div>  
              </div>
              
              <div class="form-group row">
                    
                    <label for="proy_pais_id" class="col-md-1 col-form-label">Pais</label>
                    <div class="col-xs-8 col-md-2">
                        <?php $optionsSelect = $sf_data->getRaw('dd_pais');?>
                        <select id="proy_pais_id" name="proy_pais_id" class="form-control" onchange="mostrarSubProvin()" required>
                        <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                        <option data="<?php echo $arraySelect["cpai_id_pais"] ?>" <?php if($row['proy_pais_id']==$arraySelect["cpai_id_pais"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cpai_id_pais"] ?>"><?php echo $arraySelect["cpai_pais"] ?></option> 
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
                            <input type="hidden" id="proy_loca_id" name="proy_loca_id" value="<?php echo $row['proy_loca_id']?>" />
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
                             
                <a  href="#" id="botonConfirmar" class="btn btn-primary" onclick="agregarFichaRel()" data-content="Al confirmar podrá adjuntar fichas" data-toggle="popover" data-trigger="hover" data-placement="right">Confirmar datos</a>

                <a  href="#" id="botonModificar" class="btn btn-default disabled" style="margin-left: 5px" onclick="modificarDatos()" data-content="Se eliminaran las fichas adjuntas" data-toggle="popover" data-trigger="hover" data-placement="right">Modificar Clasificaciones</a>

             </div>
        
          </div> <!--cierre del div id=home-->
            
        
          <!-- .................................Panel de Fichas relacionadas........................ -->
          <div id="fich_rel" class="tab-pane fade" >
          
            <div id="tablaFichasRel" class="responsiveWidth"></div>
          
          </div>






         

          
          <!-- .......................Modal de Adjuntar Fichas Relacionadas........................... -->
          <!--
          <div id="adjFichRel" class="modal modal-wide fade" data-backdrop="static" data-keyboard="false">
          <?php// $optionsSelect = $cursor_fichas_rel;?>

            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Fichas Relacionadas</h4>
                  </div>
                  
                  <div class="modal-body">
                      <div id="tablaFichasRel" class="responsiveWidth"></div>
                  </div>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>

                </div> 
             </div> 
           </div> 
          -->


          <!-- .......................Modal de Adjuntar otras Fichas........................... -->
          <div id="adjOtrasFichas" class="modal modal-wide fade" data-backdrop="static" data-keyboard="false">
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
          <div id="adjFichAd" class="modal modal-wide fade" data-backdrop="static">
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