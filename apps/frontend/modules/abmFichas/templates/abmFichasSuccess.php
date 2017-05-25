<script languaje= "JavaScript" type="text/javascript" src= "js/configvarios.js"> </script>


<?php 

	$cabecera = new Cabecera();
	$cabecera->ruta('ABMFichas');
	$cabecera->titulo(__('Administración de Fichas'));

	$cabecera->accion(sprintf('<a href="%s"><i class="icon-plus text-info"></i> Nueva Ficha</a>', url_for("abmFichas/formularioFichas"))); 
    
	echo $cabecera;

?>

<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    <div class="wrapper tipoframe">
    <div class="panel-body">
    <table border="0" frame="" class="tablesorter responsiveWidth table table-striped table-bordered">
        <thead>
                <tr class="alert-success wrapper">
                    <th style="text-align:center"><?php echo "Cod Interno"; ?></th>
                    <th style="text-align:center"><?php echo "Catálogo"; ?></th>
                    <th style="text-align:center"><?php echo "Denominacion"; ?></th>
                    <th class="nosort" style="text-align: center">Acciones</th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($fichas as $row){ ?>
                <tr onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                    <td style="text-align: center"><?php echo $row['fich_id']; ?></td>
                    <td><?php echo $row['fich_cata_id']; ?></td>
                    <td><?php echo $row['fich_deno']; ?></td>
                    <td style="text-align: center">
                        <?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
                            <a class = "btn btn-mini" href="<?php echo url_for("abmFichas/formularioFichas?fich_id=".$row['fich_id']) ?>">
                                <i class="icon icon-pencil text-success"></i>
                            </a>
                            <a class = "btn btn-mini" onclick="eliminarEntidad('<?php echo url_for("abmFichas/baja?fich_id=".$row['fich_id']) ?>">
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
