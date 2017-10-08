<script type="text/javascript">
//------------------------------------------------------------------------------

$(document).ready(function(){
    $("[data-toggle='popover']").popover(); 

});


     verFicha_no_rel = function(fich_id) {
      $.get("<?php echo url_for('abmProyecto/fichaReducida') ?> ", 
        {
         fich_id : fich_id
         },
              function(data){
                  $('#fichaReducida_no_rel').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });
         }

</script>


<div class ="row">
  
  <div class="col-md-5">
      <div class="wrapper tipoframe " style="overflow-x: hidden;">
      <table id="frelacionadas" border="0" class=" tablesorter responsiveWidth table table-hover table-bordered table-condensed">
              <thead  class="alert-success wrapper" >
                   <tr>
                      <th style="text-align: center;width: 5%"><?php echo __("ID") ?></th>
                      <th style="text-align: center;width: 75%"><?php echo __("Ficha") ?></th> 
                      <th style="text-align: center;width: 10%"><?php echo __("¿Incluir?") ?></th>
                      <th style="text-align: center;width: 10%"><?php echo __("Ver") ?></th>
                   </tr>
               </thead>
                               
              <tbody>
                <?php $c = 0;foreach($cursor as $row){ ?>
                      <tr>
                          <td style="text-align:center; vertical-align: middle;"><?php echo $row['fich_id'] ?></td>
                          <td style="vertical-align: middle;"><?php echo $row['fich_deno'] ?></td>
                          <td style="text-align: center;vertical-align: middle"> 
                             <div class="row">
      	                        <label class="switch">
      	                             <input type="checkbox" name="anota_fich_rel_f['<?php echo $c ?>']" id="anota_fich_rel_f<?php echo $row['fich_id'] ?>" value="<?php echo $row['fich_id'] ?>"  class="switch-input" 
      	                                    <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
      	                             <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
      	                             <span class="switch-handle"></span>
      	                        </label>   	                      	          						
      	                     </div> 
                          </td>
                          <td style="text-align: center;vertical-align: middle;margin-right: 2px"> 
                              <a  href="#" class="btn btn-primary btn-xs" id="proy_fich_id" onclick="verFicha_no_rel(<?php echo $row['fich_id']?>)" data-content="Ver ficha" data-toggle="popover" data-trigger="hover"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
                          </td>
                      </tr>
                <?php $c++; } //end foreach ?>
              </tbody>

      </table>
      </div>
    </div> <!-- ancho de la tabla-->


    <!-- ..................................Detalle de la ficha................................... -->
    <div class="col-md-7">

      <div id="fichaReducida_no_rel" class="responsiveWidth"></div>

    </div>

 </div> <!-- div row-->
