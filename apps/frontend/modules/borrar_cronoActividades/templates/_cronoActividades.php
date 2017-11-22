<script>

$.fn.dataTable.moment( 'DD/MM' );

$(document).ready(function() {
    $('#cartel').DataTable({            
    //"scrollY": '200px',
    "dom" : '<"clear">',
    "responsive" : true,
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

        <?php //if ($sindatos == '1') { ?>  
           
  <table id="cartel" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
                <tr class="alert-info wrapper">
                    <th style="text-align:center;" colspan="11">Cartelera por dia</th>
                </tr>
                <tr class="alert-info wrapper">
                    <th><?php echo "Cohorte"; ?></th>
                    <th><?php echo "Asignatura"; ?></th>
                    <th><?php echo "Fecha"; ?></th>
                    <th><?php echo "Hora"; ?></th>
                    <th><?php echo "Aula"; ?></th>
                    <th><?php echo "Detalle"; ?></th>
                    <th><?php echo "Edificio"; ?></th>
                    <th><?php echo "Dirección"; ?></th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($carte as $row){ ?>
                <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')"
                      >
                    <td><?php echo $row['ccar_cohorte']; ?></td>
                    <td style="background-color:<?php echo $row['color'] ?>"><?php echo $row['ccar_asignatura']; ?></td>
                    <td style="background-color:<?php echo $row['color'] ?>"><?php echo $row['ccar_fecha'],' ',$row['hoy']; ?></td>
                    <td style="background-color:<?php echo $row['color'] ?>"><?php echo $row['ccar_hora_inicio'],' a ',$row['ccar_hora_fin']; ?></td>
                    <td><?php echo $row['ccar_aula']; ?></td>
                    <td><?php echo $row['ccar_detalle']; ?></td>
                    <td><?php echo $row['caul_edificio']; ?></td>
                    <td><?php echo $row['caul_direccion']; ?></td>
                </tr>
                <?php $c++; } ?>
        </tbody>
    </table>
    </div>
    </div>

