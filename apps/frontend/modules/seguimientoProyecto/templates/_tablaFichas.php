<script type="text/javascript">
//------------------------------------------------------------------------------

$(document).ready(function(){
    $("[data-toggle='popover']").popover(); 

});

//modal para insertar comentarios de seguimiento 
modal_insertarSeguimiento = function(fich_id) { 

    $('#realizarSeguimiento').modal('show'); 
}


//ver las fichas dependiendo de la fase
 verFicha_rel = function(fich_id) {

  $.get("<?php echo url_for('seguimientoProyecto/fichaReducida') ?> ", 
    {
     fich_id : fich_id
     },
          function(data){
              $('#fichaReducida').html(data);
              startTableOnlySorter();
              $('#spinner').hide();
          });
     }

//guarda el comentario de seguimiento
guardarSeguimiento = function() {

 
      alert (fich_id);
      var proy_id = $('#proy_id').val();
      var proy_fase = $('#proy_fase_id').val();
      var fich_text = $('#prof_seguimiento').val();
      
      $.get("<?php echo url_for('seguimientoProyecto/guardarSeguimientoFicha') ?> ", 
        {
          proy_id,
          fich_id,
          proy_fase,
          fich_text

         },
              function(data){
                  $('#ComentarioGuardado').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });
              
        $('realizarSeguimiento').modal('hide');
         }


</script>

<style>  
#realizarSeguimiento {}

</style>


<div class ="row">
  
  <div class="col-md-5">
      <div class="wrapper tipoframe " style="overflow-x: hidden;">
      <table id="frelacionadas" border="0" class=" tablesorter responsiveWidth table table-hover table-bordered table-condensed">
              <thead  class="alert-success wrapper" >
                   <tr>
                      <th style="text-align: center;width: 5%"><?php echo __("ID") ?></th>
                      <th style="text-align: center;width: 65%"><?php echo __("Ficha") ?></th> 
                      <th style="text-align: center;width: 10%"><?php echo __("Comentarios") ?></th>
                      <th style="text-align: center;width: 10%"><?php echo __("Check") ?></th>
                      <th style="text-align: center;width: 10%"><?php echo __("Ver") ?></th>
                   </tr>
               </thead>
                               
              <tbody>
                <?php $c = 0;foreach($cursor as $row){ ?>
                      <tr>
                          <!-- ID -->
                          <td style="text-align:center; vertical-align: middle;"><?php echo $row['fich_id'] ?></td>
                      
                          <!-- Ficha -->
                          <td style="vertical-align: middle;"><?php echo $row['fich_deno'] ?></td>
                      
                          <!-- Comentarios -->
                          <td style="text-align: center;vertical-align: middle;margin-right: 2px"> 
                              <a  href="#" class="btn btn-primary btn-xs" id="seguimiento_proyecto" onclick="modal_insertarSeguimiento(<?php echo $row['fich_id'] ?>)" data-content="Insertar comentarios de seguimiento" data-toggle="popover" data-trigger="hover"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                          </td>
                          
                          <!-- Check -->
                          <td style="text-align: center;vertical-align: middle"> 
                             <div class="row">
      	                        <label class="switch">
      	                             <input type="checkbox" name="tiene_seguimiento['<?php echo $c ?>']" id="tiene_seguimiento<?php echo $row['tiene_seguimiento'] ?>" value="<?php echo $row['tiene_seguimiento'] ?>"  class="switch-input" 
      	                                    <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
      	                             <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
      	                             <span class="switch-handle"></span>
      	                        </label>   	                      	          						
      	                     </div> 
                          </td>
                          
                          <!-- Ver ficha -->
                          <td style="text-align: center;vertical-align: middle;margin-right: 2px"> 
                              <a  href="#" class="btn btn-primary btn-xs" id="proy_fich_id" onclick="verFicha_rel(<?php echo $row['fich_id']?>)" data-content="Ver ficha" data-toggle="popover" data-trigger="hover"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
                          </td>
                      </tr>
                <?php $c++; } //end foreach ?>
              </tbody>
              <div id="ComentarioGuardado" class="responsiveWidth">

      </table>
      </div>
    </div> <!-- ancho de la tabla-->


    <!-- ..................................Detalle de la ficha................................... -->
    <div class="col-md-7">

      <div id="fichaReducida" class="responsiveWidth"></div>

    </div>


  <!-- .......................Modal para escribir comentarios........................... -->
          <div id="realizarSeguimiento" class="modal modal-wide fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Seguimiento de la Ficha</h4>
                  </div>
                  
                  <div class="modal-body">
                      <textarea class="form-control" id="prof_seguimiento" style="margin-bottom: 5px"><?php echo $row_2['prof_seguimiento'] ?></textarea>
                  </div>
                  <a id="ficha" value="" hidden></a>
              
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="guardarSeguimiento()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal--> 








 </div> <!-- div row-->





