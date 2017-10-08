<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>


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

<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>


<div class="wrapper tipoframe">
 <div class="panel-body">
  
  <?php if ($sindatos == '1'){ ?>
	<table id="cartel" border="0" class="tablesorter responsiveWidth table table-hover table-bordered table-condensed">
	
		<thead  class="alert-success wrapper" >
			<tr>
				<th style="text-align: center;"><?php echo __("ID") ?></th>
				<th style="text-align: center;"><?php echo __("Nombre Proyecto") ?></th> 
				<th style="text-align: center;"><?php echo __("Localidad") ?></th>
				<th style="text-align: center;"><?php echo __("Fecha Inicio") ?></th>
                <th style="text-align: center;"><?php echo __("Fecha Fin Estimada") ?></th>
				<th style="text-align: center;"><?php echo __("Observaciones") ?></th>
                <th style="text-align: center;"><?php echo __("Acciones") ?></th>
            </tr>
		</thead>
		<tbody>

		<?php foreach($cursor as $row): ?>

		<tr class="<?php echo $class ?>">
			<td style="text-align:center; vertical-align: middle;width: 50px"><?php echo $row['proy_id'] ?></td>
			<td style="vertical-align: middle;"><?php echo $row['proy_nombre'] ?></td>
			<td style="vertical-align: middle;text-align:center"><?php echo $row['proy_loca_id'] ?></td>
			<td style="vertical-align: middle;text-align:center;width: 100px"><?php echo $row['proy_inicio_f'] ?></td>
            <td style="vertical-align: middle;text-align:center;width: 150px"><?php echo $row['proy_fin_estimado_f'] ?></td>
            <td style="vertical-align: middle;"><?php echo $row['proy_obser'] ?></td>
			<td style="vertical-align: middle; width: 80px">
						<?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
							<a class = "btn btn-mini" href="<?php echo url_for("abmProyecto/formularioProyecto?proy_id=".$row['proy_id']) ?>" rel="tooltip" title="Modificar">
								<i class="icon icon-pencil text-success"></i>
							</a>
							<a class = "btn btn-mini" onclick="eliminarEntidad('<?php echo url_for("abmProyecto/baja?proy_id=".$row['proy_id']) ?>');" href="#">
								<i class="icon icon-remove text-danger"></i>
							</a>
						<?php } ?>
					</td>
                </tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
    <?php }else{ ?>
		      <div class="wrapper" id="nadaporaqui">
                <div class="panel-body">
                       <div class="text-center  alert">
                         <h5><?php echo "No hay ning&uacute;n dato que cumpla con los criterios de b&uacute;squeda";?></h5>
                       </div>     
                </div>
            </div>
    <?php } ?>

</div>
</div>

