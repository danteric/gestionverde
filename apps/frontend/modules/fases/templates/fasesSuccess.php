<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>
    <?php
        $cabecera = new Cabecera();
        $cabecera->ruta('Fases');
        $cabecera->titulo(__("Fases"));
        #$cabecera->accion(sprintf('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-success help"><i class="icon-question-sign"></i> Ayuda</button>'));
        $cabecera->accion(sprintf('<a href="%s"button type="button" class="btn btn-success"><i class="icon-plus"></i> Nueva Fase</a>', url_for("fases/formularioFases")));  
        
        /*if($_SESSION["usuario"]["modi"] == "S")
        {
          $cabecera->accion('<a href="'.url_for("fases/formularioFases").'" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" role="button"><i class="icon icon-plus text-info"> </i> Nueva Fase</a>');
        }
        */
       
        echo $cabecera;
    ?>

    <?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
    <div class="wrapper tipoframe">
    <div class="panel-body">
    <table border="0" frame="" class="tablesorter responsiveWidth table table-striped table-hover table-bordered">
        <thead>
                <tr class="alert-success wrapper">
                    <th style="text-align: center;vertical-align: middle;"><?php echo "ID"; ?></th>
                    <th style="text-align: center;vertical-align: middle;"><?php echo "Denominacion"; ?></th>
                    <th style="text-align: center;vertical-align: middle;"><?php echo "Denominacion reducida"; ?></th>
                    <th class="nosort" style="text-align: center;vertical-align: middle;">Acciones</th>
                </tr>
        </thead>
        <tbody>
                <?php $c = 0; foreach($fases as $row){ ?>
                <tr onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                    <td style="text-align: center;vertical-align: middle;"><?php echo $row['fase_id']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $row['fase_deno']; ?></td>
                    <td style="vertical-align: middle;"><?php echo $row['fase_deno_redu']; ?></td>
                    <td style="text-align: center;vertical-align: middle;">
                        <?php if($_SESSION["usuario"]["modi"] == "S"){ ?>
                            <a class = "btn btn-mini" href="<?php echo url_for("fases/formularioFases?fase_id=".$row['fase_id']) ?>">
                                <i class="icon icon-pencil text-success"></i>
                            </a>
                            <a class = "btn btn-mini" onclick="eliminarEntidad('<?php echo url_for("fases/baja?fase_id=".$row['fase_id']) ?>');" href="#">
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
