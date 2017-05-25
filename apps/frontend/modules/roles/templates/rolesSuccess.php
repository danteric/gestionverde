<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>
<?php $cabecera = new Cabecera(); ?>
<?php $cabecera->titulo('Roles de usuarios en el sistema') ?>
<?php $cabecera->ruta('Usuarios') ?>
<?php $cabecera->ruta('Roles') ?>
<?php $cabecera->accion('<a href="'.url_for("roles/formularioRoles").'" ><i class="icon icon-plus text-info"></i> Nuevo</a>') ?>
<?php //$cabecera->accion('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-danger help"><i class="icon-question-sign"></i> Ayuda</button>'); ?>
<?php echo $cabecera ?>
<?php //include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    <div class="wrapper tipoframe">
    <div class="panel-body">
	<table border="0"  frame=""  class="tablesorter responsiveWidth table table-striped table-bordered">
                                <thead>
                                        <tr class="alert-info wrapper">
                                                <th><?php echo __("Rol") ?></th>
                                                <th><?php echo __("Observaciones") ?></th>
                                                <th><?php echo __("Usuarios") ?></th>
                                                <th style="text-align: center"><?php echo __("PDF") ?></th>
                                                <th style="text-align: center"><?php echo __("EXCEL") ?></th>
                                                <th style="text-align: center"><?php echo __("Modif.") ?></th>
                                                <th class="nosort" style="text-align: center">Acciones</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php $c = 0; foreach($roles as $row) { ?>
                                                <tr class="<?php if($c%2 == 0){ echo "even";}else{echo "odd";} ?>"onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">

                                                        <td><?php echo $row['usro_rol'] ?></td>
                                                        <td><?php echo $row['usro_observaciones'] ?></td>
                                                        <td><?php echo $row['lista_usuarios'] ?></td>
                                                        <td style="text-align: center"><i class="icon <?php if($row['usro_perm_pdf'] == "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                                                        <td style="text-align: center"><i class="icon <?php if($row['usro_perm_excel']== "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                                                        <td style="text-align: center"><i class="icon <?php if($row['usro_perm_modi']== "S"){ echo "glyphicon glyphicon-ok text-success"; } else { echo 'glyphicon glyphicon-minus-sign text-danger'; } ?>"> </i> </td>
                                                        <td>
                                                            <div class="btn-groups text-center">
                                                                <?php if($_SESSION["usuario"]["modi"] == "S"){ ?>    
                                                                <a class="btn btn-default btn-xs" href="<?php echo url_for("roles/formularioRoles?usr_rol=".$row['usro_rol']) ?>">
                                                                    <i class="icon icon-pencil text-success"></i>
                                                                </a>
                                                                
                                                                <a class="btn btn-default btn-xs" href="<?php echo url_for("roles/borrar?usr_rol=".$row['usro_rol']) ?>" onclick="if(!confirm('¿Desea Borrar el item?')){return false;}">
                                                                    <i class="icon icon-remove text-danger"></i>
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
<?php require __DIR__.'/../../pagcomun/templates/_pagcomun.php' ?>
<!-- ayuda -->
<?php require __DIR__.'/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->