
<script type="text/javascript"src="/js/configvarios.js"></script>

<script>
$(document).ready(function() {

    $.fn.dataTable.moment( 'DD/MM/YYYY' );

    $('#exam_par,#exam_fin').DataTable({            
    //"scrollY": '200px',
    "dom" : '<"clear">',
    "scrollCollapse": true,
    "paging": false , 
    "processing": true, 
    "language":{
        "sProcessing":     "<i class='fa fa-cog fa-spin'></i>   Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "<br><i class='fa fa-cog fa-spin'></i>   Cargando...<br><br>",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
});
} );
</script>

<div class="mensaje"></div>
<input type="hidden"  id="sindatos"  name="sindatos" value="<?php echo $sindatos; ?>" />  
<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
<div class="wrapper tipoframe">
    <div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Cronograma de Parciales</a></li>
          <li><a data-toggle="tab" href="#menu1">Cronograma de Finales</a></li>
        </ul>
           
        <div class="tab-content" id="content">
            <div id="home" class="tab-pane fade in active">

                <table id="exam_par" class="table table-striped table-bordered font12" cellspacing="0" width="100%">
                <thead>
                    <tr class="alert-info wrapper">
                        <th><?php echo "Asignatura"; ?></th>
                        <th><?php echo "Ciclo"; ?></th>
                        <th><?php echo "Tipo examen"; ?></th>
                        <th><?php echo "Fecha"; ?></th>
                        <th width="80" class="nosort" style="text-align: center">Inscr.Recuperat</th>
                        <th><?php echo "Confirmado"; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 0; $todos_p = ''; foreach($cronof as $row){ ?>
                    <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                        <td><?php echo $row['ccro_asignatura'];?></td>
                        <td><?php echo $row['ccro_ciclo']; ?></td>
                        <td><?php echo $row['ccro_tipo_examen']; ?></td>
                        <td><?php echo $row['ccro_fecha']; ?></td>
                        <td style="text-align: center">
                            <?php if ($row['ccro_recuperatorio'] =='S') { ?>
                                <label class="switch">
                                     <input type="checkbox" name="anotar['<?php echo $c ?>']" id="anotar<?php echo $row['ccro_id_examen'] ?>" value="<?php echo $row['ccro_id_examen'] ?>"  class="switch-input" 
                                            <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                     <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                     <span class="switch-handle"></span>
                                </label>
                            <?php } ?>
                        </td> 
                        <td><?php echo $row['cexn_fechaconfirma']; ?></td>

                        <?php $todos_p = $todos_p.$row['ccro_id_examen'].','; // hago una lista de todos los exam ?>
                    </tr>

                    <?php $c++; } ?>
                </tbody>
                </table>
                <input type="hidden" name="todos_par" id="todos_par" value="<?php echo $todos_p ?>" />
            </div> 
            <!------- otra solapa ----- -->
            <div id="menu1" class="tab-pane fade"> 
                <table id="exam_fin" class="table table-striped table-bordered font12" cellspacing="0" width="100%">
                <thead>
                    <tr class="alert-info wrapper">
                        <th><?php echo "Asignatura"; ?></th>
                        <th><?php echo "Fecha"; ?></th>
                        <th><?php echo "Observaciones"; ?></th>
                        <th width="80" class="nosort" style="text-align: center">Inscribir</th>
                        <th><?php echo "Confirmado"; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 0; $todos_f = ''; foreach($finalf as $row){ ?>
                    <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                        <td><?php echo $row['cfif_asignatura']; ?></td>
                        <td><?php echo $row['cfif_fecha']; ?></td>
                        <td><?php echo $row['cfif_observacion']; ?></td>
                        <td style="text-align: center"> 
                            <label class="switch">
                                 <input type="checkbox" name="anotar_f['<?php echo $c ?>']" id="anotar_f<?php echo $row['cfif_id_examen'] ?>" value="<?php echo $row['cfif_id_examen'] ?>"  class="switch-input" 
                                        <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                 <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                 <span class="switch-handle"></span>
                            </label>
                        </td> 
                        <td><?php echo $row['cexn_fechaconfirma']; ?></td>
                        <?php $todos_f = $todos_f.$row['cfif_id_examen'].','; // hago una lista de todos los exam ?>
                    </tr>
                    <?php $c++; } ?>
                </tbody>
                </table>
                <input type="hidden" name="todos_fin" id="todos_fin" value="<?php echo $todos_f ?>" />
            </div>
        </div>
    </div>
</div>

 
