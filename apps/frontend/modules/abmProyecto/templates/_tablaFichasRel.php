<script type="text/javascript">
//------------------------------------------------------------------------------

     verFicha = function(fich_id) {



      $.get("<?php echo url_for('abmProyecto/fichaReducida') ?> ", 
        {
         fich_id : fich_id
         },
              function(data){
                  $('#fichaReducida').html(data);
                  startTableOnlySorter();
                  $('#spinner').hide();
              });


          $('#mostrarFicha').modal('show');
      
      }

      cerrarModal = function(){

        $('#mostrarFicha').modal('hide');
      } 
</script>


<style>
#mostrarFicha .modal-dialog{right: 20%;top: 5%; ;height: 100%; }  

</style>





<div class="wrapper tipoframe " style="overflow-x: hidden;">
<table id="frelacionadas" border="0" class="tablesorter responsiveWidth table table-hover table-bordered table-condensed">
        <thead  class="alert-success wrapper" >
             <tr>
                <th style="text-align: center;width: 10%"><?php echo __("ID") ?></th>
                <th style="text-align: center;width: 65%"><?php echo __("Ficha") ?></th> 
                <th style="text-align: center;width: 25%"><?php echo __("Acciones") ?></th>
             </tr>
         </thead>
                         
        <tbody>
          <?php foreach($cursor as $row): ?>
                <tr>
                    <td style="text-align:center; vertical-align: middle;"><?php echo $row['fich_id'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $row['fich_deno'] ?></td>
                    <td style="text-align: center;vertical-align: middle"> 
                       <div class="row">
                        
	                        <label class="switch" style="margin-right: 5px">
	                             <input type="checkbox" name="anota_fich_rel['<?php echo $c ?>']" id="anota_fich_rel<?php echo $row['fich_id'] ?>" value="<?php echo $row['fich_id'] ?>"  class="switch-input" 
	                                    <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
	                             <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
	                             <span class="switch-handle"></span>
	                        </label>
	                    	
	          							<a  href="#" class="btn btn-primary btn-xs" id="proy_fich_id" onclick="verFicha(<?php echo $row['fich_id']?>)"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
	                    		
	                   </div> 
                    </td>
                </tr>
          <?php endforeach; ?>
        </tbody>

</table>
</div>






<!-- .............................modal para ver una ficha.................................... --> 
    <div id="mostrarFicha" class="modal " data-backdrop="static" data-keyboard="false" style="width: 200%;">

            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  
                 
                  <div class="modal-body ">
                      <div id="fichaReducida" class="responsiveWidth"></div>
                  </div>
              
                  <div class="modal-footer">
                       <button type="button" class="btn btn-default" onclick="cerrarModal()">Cerrar</button>
                  </div>

                </div> <!-- modal content-->
             </div> <!-- modal dialog-->
           </div> <!-- modal-->



