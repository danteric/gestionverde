<script>

//$.fn.dataTable.moment( 'DD/MM/YYYY' );
$.extend( $.fn.dataTable.defaults, {
    responsive: true
} );

$(document).ready(function() {
    $('#cartel').DataTable({            
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

<style type="text/css">
.label-as-badge {
    border-radius: 1em;
    float: right;
}
</style>


 	<?php $optionsSelect = $sf_data->getRaw('dd_cabe'); ?>
    <?php foreach ($optionsSelect as $arraySelect) { }?>
    <div class="col-xs-12 col-md-4">
        <ul class="list-group">
            <li class="list-group-item">
                <b><?php echo $arraySelect['apenom']; ?></b>
            </li>
            <li class="list-group-item">
                Estado académico:
                <span class="label <?php if ($arraySelect['ceac_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo $arraySelect['ceac_estadoacademico'];?></span>
            </li>
            <li class="list-group-item">
                Estado admin:
                <span class="label <?php if ($arraySelect['cead_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo $arraySelect['cead_estadoadministrativo'];?></span>
            </li>
            <li class="list-group-item">
                Actividad/Inicio:
                <span class="label label-info label-as-badge"><?php echo $arraySelect['ccaa_cl_carrera'],' / ',$arraySelect['calu_anioinicio'];?></span>
            </li>                                                                                              
            <li class="list-group-item">
                Cohorte:
                <span class="label label-info label-as-badge"><?php echo $arraySelect['calu_cohorte'];?></span>
            </li>   
            <?php $incripcion = $sf_data->getRaw('inscrip'); ?>
            <?php foreach ($incripcion as $arraySelect) { ?>   
            <li class="list-group-item">
                <b><?php echo $arraySelect['label'];?></b>:

                <?php if ( $arraySelect['semafo'] == 'V') { $label='label-success'; };
                      if ( $arraySelect['semafo'] == 'A') { $label='label-info'; };
                      if ( $arraySelect['semafo'] == 'R') { $label='label-danger'; }; ?>
                <span class="label <?php echo $label ?> label-as-badge"><?php echo $arraySelect['valor'];?></span>
            </li>   
            <?php  }?>    
            <?php foreach($last_lg as $row){ }?>
            <li class="list-group-item">
                Ultima visita al sitio:
                <p class="pull-right text text-info"><?php echo $row['usal_fecha_hora'];?></p>
            </li> 
        </ul>                
    </div>


<div class="col-xs-12 col-md-8">
<div class="panel panel-primary">
    <div class="panel-heading">Actividades de hoy</div>
    <div class="panel-body">    
  	<table id="cartel" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
                <tr >
                    <th><?php echo "Actividad"; ?></th>
                    <th><?php echo "Asignatura"; ?></th>
                    <th><?php echo "Hora"; ?></th>
                    <th><?php echo "Aula"; ?></th>
                    <th><?php echo "Detalle"; ?></th>
                    <th><?php echo "Edificio"; ?></th>
                    <th><?php echo "Dirección"; ?></th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($cursor as $row){ ?>
                <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')"
                      >
                    <td><?php echo $row['ccaa_cl_carrera']; ?></td>
                    <td><?php echo $row['ccar_asignatura']; ?></td>
                    <td><?php echo $row['ccar_hora_inicio'],' a ',$row['ccar_hora_fin']; ?></td>
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
</div>




