<script language="JavaScript" type="text/javascript" src="/js/configvarios.js">
    
$(document).ready(function() {
$('#tabla').DataTable({            

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



    <?php
        $cabecera = new Cabecera();
        $cabecera->ruta('Medios');
        $cabecera->titulo(__("Medios"));
        $cabecera->accion(sprintf('<a href="%s"button type="button" class="btn btn-success"><i class="icon-plus"></i> Nuevo Medio</a>', url_for("medios/formularioMedios")));  
        //$cabecera->accion('<input type="button" value="Filtrar" class="btn btn-warning" onclick="$(\'#pagina\').val(1);cargarGrilla();" />');
        echo $cabecera;
    ?>

    <?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    <div class="wrapper tipoframe">
    <div class="panel-body">
    <table id="tabla" border="0" frame="" class="tablesorter responsiveWidth table table-hover table-bordered table-condensed">
        <thead>
                <tr class="alert-success wrapper">
                    <th style="text-align: center;vertical-align: middle;width: 80px"><?php echo "ID"; ?></th>
                    <th style="text-align: center;vertical-align: middle;"><?php echo "Nombre"; ?></th>
                    <th class="nosort" style="text-align: center;vertical-align: middle;width: 150px"><?php echo "Acciones"; ?></th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($medios as $row){ ?>
                <tr onMouseOver="CambiaColor(this,'#dff0d8')" onMouseOut="CambiaColor2(this,'#000000')">
                    <td style="text-align: center;vertical-align: middle;"><?php echo $row['medi_id']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $row['medi_deno']; ?></td>
                    <td style="text-align: center;vertical-align: middle;">
                        <?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
                            <a class = "btn btn-mini" data-content="Editar" data-toggle="popover" data-trigger="hover" data-placement="top" href="<?php echo url_for("medios/formularioMedios?medi_id=".$row['medi_id']) ?>">
                                <i class="icon icon-pencil text-success"></i>
                            </a>
                            <a class = "btn btn-mini" data-content="Eliminar" data-toggle="popover" data-trigger="hover" data-placement="top" onclick="eliminarEntidad('<?php echo url_for("medios/baja?medi_id=".$row['medi_id']) ?>');" href="#">
                                <i class="icon icon-remove text-danger"></i>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php $c++; } ?>
        </tbody>
    </table>
    </div>
    </div>
<?php //require __DIR__. '/../../pagcomun/templates/_paginaciona_listas_ajax.php' ?>
<?php require __DIR__. '/../../pagcomun/templates/_pagcomun.php' ?> 
<!-- /ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->

