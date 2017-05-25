
<script type="text/javascript" src="/js/configvarios.js">
</script>
<div class="panel-body">
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

<form id="datosRolesForm" class="formularioValidado datosRolesForm" name="datosRolesForm" method="POST" action="<?php echo url_for("docAsubir/formularioDocAsubir") ?>">
<?php 
	$cabecera = new Cabecera();
	$cabecera->ruta('Documentación a subir y subida'); 
	
    if($_SESSION["usuario"]["modi"] == "S"):
        $cabecera->accion('<a href="'.url_for("docAsubir/formularioDocAsubir").'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" role="button"><i class="icon icon-plus text-info"></i> Nuevo Documento</a>') ;
    endif;
    ?>
    <?php echo $cabecera; ?>

    <br>
    <div class="row">
         <?php $optionsSelect = $sf_data->getRaw('dd_cabe'); ?>
         <?php foreach ($optionsSelect as $arraySelect) { }?>
        <div class="col-md-4"><b><?php echo ' ',$arraySelect['apenom'],' '; ?></b></div>
        <div class="col-md-4" style="text-align:center;"><span class="label <?php if ($arraySelect['ceac_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo 'Estado académico:'?><b><?php echo $arraySelect['ceac_estadoacademico'];?></b></span></div>
        <div class="col-md-4" style="text-align:center;"><span class="label <?php if ($arraySelect['cead_semaforo']=='V') {echo 'label-success';} else {echo 'label-danger';} ?> label-as-badge"><?php echo 'Estado administr:'?><b><?php echo $arraySelect['cead_estadoadministrativo'];?></b></span></div>
    </div>

    </div>
    <br>

<!--	<input type="hidden" id="pagina" name="pagina" class="" value="1"/> -->
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    
    <div class="mensaje"></div>
<input type="hidden"  id="sindatos"  name="sindatos" value="<?php echo $sindatos; ?>" />  
<input type="hidden" id="total_paginas" name="total_paginas" value="<?php echo $total_paginas ?>"/>
<div class="wrapper tipoframe">
    <div class="panel-body">

        <?php //if ($sindatos == '1') { ?>  
           
  <table id="cartel" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
                <tr class="alert-info wrapper">
                    <th style="text-align:center;" colspan="11">Documentos subidos</th>
                </tr>
                <tr class="alert-info wrapper">
                    <th><?php echo "#Docum"; ?></th>
                    <th><?php echo "Tipo documentacion"; ?></th>
                    <th><?php echo "Nombre archivo"; ?></th>
                    <th><?php echo "Tamaño"; ?></th>
                    <th><?php echo "Subida el"; ?></th>
                    <th><?php echo "Nota"; ?></th>
                    <th><?php echo "Recibida"; ?></th>
                    <th class="nosort" style="text-align: center">Acciones</th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($cursor as $row){ ?>
                <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                    <td><?php echo $row['cdsu_id']; ?></td>
                    <td><?php echo $row['cdoc_deno_tipoadjunto']; ?></td>
                    <td><?php echo $row['cdsu_nombre']; ?></td>
                    <td><?php echo $row['doc_size_k'],' Kb'; ?></td>
                    <td><?php echo $row['cdsu_fechasubida']; ?></td>
                    <td><?php echo $row['cdsu_nota']; ?></td>
                    <td><?php echo $row['cdsu_fecharecibida']; ?></td>
                    <td>
                        <div class="btn-groups text-center">
                            <?php if($_SESSION["usuario"]["modi"] == "S"){ ?>    
                            <a class="btn btn-default btn-xs" href="<?php echo url_for("docAsubir/formularioModiDocAsubir?cdsu_id=".$row['cdsu_id']) ?>" data-toggle="modal" data-target="#exampleModal">
                                <i class="icon icon-pencil text-success"></i>
                            </a>
                            <a class="btn btn-default btn-xs" href="<?php echo url_for("docAsubir/formularioBajaDocAsubir?cdsu_id=".$row['cdsu_id']) ?>" data-toggle="modal" data-target="#exampleModal">
                                <i class="icon icon-remove text-danger"></i>
                            </a>
                            <a class="btn btn-default btn-xs" href="<?php echo url_for("docAsubir/download?cdsu_id=".$row['cdsu_id']) ?>">
                                <i class="glyphicon glyphicon-cloud-download text-info"></i>
                            </a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <?php $c++; } ?>
        </tbody>
    </table>
    </div>
    </div>


    </div>
</form>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
            <div class="modal-body">
      </div>
    </div>
  </div>
</div>

