
<script type="text/javascript"src="/js/configvarios.js"></script>

<script>
function crearTabla(fila,json_exam){
   
    //viene un obj asi '[ {#examen#:#Primer Parcial#,#fecha#:#03/05/2016#,#nota#:#7#},{#examen#:#Segundo Parcial#,#fecha#:#15/08/2016#,#nota#:#4#}]';
    jsonString=json_exam.replace(/#/g,'"');
    var obj = jsonString
    //console.log(obj);
    var types = JSON.parse(obj);
    //console.log(types);
 
    var tabla='<table border="0" class="responsiveWidth table table-bordered" >';
    for(x=0; x<types.length; x++) {
        tabla+="<tr><td>"+types[x].cl_materia+"</td><td>"+types[x].asignatura+"</td><td>"+types[x].condicion+"</td></tr>";
    }
    tabla+="</table>"
    document.getElementById("resultado"+fila).innerHTML=tabla;

}
</script>

<div class="mensaje"></div>
<input type="hidden"  id="sindatos"  name="sindatos" value="<?php echo $sindatos; ?>" />  
<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
<div class="wrapper tipoframe">
    <div class="panel-body">
        <!--********* Acordeon *********-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
        <?php $fila = 0; foreach($mater as $row){ ?>
 
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $row['id_row']; ?>">

                <b>     
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['id_row']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $row['id_row']; ?>">
                    <i class="<?php if($row['tira_mater']!=null) { echo 'glyphicon glyphicon-triangle-bottom text-success'; } ; ?>"></i><?php echo ' ',$row['cmcu_cl_materia'],' - ',$row['cmcu_asignatura'],' - ','<b class="text-danger">'.$row['cmcu_anio'].'º año'.'</b>'; ?></a>
                </b>
               <div class="pull-right"> 
                    <label class="<?php if( $row['confirmado']=='S' ) { echo 'text-success';} else { echo 'text-danger';} ?>"><?php echo $row['cimn_fechaconfirma'] ?>
                    </label>
                    <label class="switch" >
                         <input type="checkbox" name="anotar['<?php echo $fila ?>']" id="anotar<?php echo $row['cmcu_id_materia'] ?>" value="<?php echo $row['cmcu_id_materia'] ?>"  class="switch-input" 
                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                         <span class="switch-handle"></span>
                    </label>
                    <?php if ($row['hubo_alta'] == "S" and $row['si_no'] == "N") { ?>
                    <i class="glyphicon glyphicon-remove text-danger"></i>
                    <?php } ?>
                </div>  
            </div>
            <div id="collapse<?php echo $row['id_row']; ?>" class="accordion-body <?php if($row['tira_mater']!=null) { echo 'collapse'; };?>">
              <div id="resultado<?php echo $fila; ?>"></div>
                    <?php if($row['tira_mater']!=null) { echo "<script> crearTabla(".$fila.",'".$row['tira_mater']."'); </script>"; }; ?>
              </div>
            
          </div>
 
        <?php $fila++; } ?>
        </div>
        <!--********* Acordeon *********-->
    </div>
</div>

 
