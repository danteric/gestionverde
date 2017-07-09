<script src="/js/validaciones.js"></script>
<script type="text/javascript">

    cancelar = function(){   //funcion para volver al clickear boton "volver"
        var defaultPrevented;
        location.href = '<?php echo url_for("abmFichas/abmFichas") ?>';
    }

    // funcion para agregar los procedimientos dinamicamente
    agregarProce = function() {
        var fila=$("#tablaProc tr").length;

        $(".tablaProc").append('<tr><td colspan="2">'+
                                  '<textarea class="form-control" name="proc_text_f['+fila+']" placeholder="Nuevo procedimiento..."></textarea></td>'+       
                                  '<input type="hidden" name="proc_id_f['+fila+']" value="0">'+      
                                  '<td style="text-align: center">'+ 
                                    '<label class="switch">'+
                                         '<input type="checkbox" name="proc_borr_f['+fila+']" id="proc_id_new_f'+fila+'"'+
                                          ' class="switch-input" >'+
                                                //<?php //if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         '<span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>'+
                                         '<span class="switch-handle"></span>'+
                                    '</label>'+
                                  '</td></tr>');
    }
    // funcion para agregar los recursos dinamicamente
   agregarRecurso = function() {
        var fila=$("#tablaRecur tr").length;

        $(".tablaRecur").append('<tr><td colspan="2">'+
                                  '<textarea class="form-control" name="recu_text_f['+fila+']" placeholder="Nuevo Recurso..."></textarea></td>'+       
                                  '<input type="hidden" name="recu_id_f['+fila+']" value="0">'+      
                                  '<td style="text-align: center">'+ 
                                    '<label class="switch">'+
                                         '<input type="checkbox" name="recu_borr_f['+fila+']" id="recu_id_new_f'+fila+'"'+
                                          ' class="switch-input" >'+
                                         '<span class="switch-label" id="lori" data-on="Si" data-off="No"></span>'+
                                         '<span class="switch-handle"></span>'+
                                    '</label>'+
                                  '</td></tr>');
    }

  agregarFuen = function() {

        var fila=$("#tablaFuen tr").length;

        $(".tablaFuen").append('<tr><td colspan="2">'+
                                  '<textarea class="form-control" name="fuen_text_f['+fila+']" placeholder="Nueva fuente (URL)...">'+ 
                                  '</textarea></td>'+       
                                  '<input type="hidden" name="fuen_id_f['+fila+']" value="0">'+      
                                  '<td style="text-align: center">'+ 
                                    '<label class="switch">'+
                                         '<input type="checkbox" name="fuen_borr_f['+fila+']" id="fuen_id_new_f'+fila+'"'+
                                          ' class="switch-input" >'+
                                                //<?php //if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         '<span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>'+
                                         '<span class="switch-handle"></span>'+
                                    '</label>'+
                                  '</td>'+
                                   '<td>'+
                                    '<a title="Copy al clipboard" onclick="copyToClipboard(<?php echo $c ?>); return false;" class="btn btn-info pull-right"> <i class="icon-copy text-info"></i></a>'+
                                '</td>'+
                               '<td>'+
                                    '<a title="Abrir en nueva solapa" onclick="abrirFuen(<?php echo $c ?>); return false;" class="btn btn-info pull-center">Abrir</a>'+  
                                '</td>'+ 
                                  '</tr>');
                                  
    }

    abrirFuen = function(fila) {

        var v_url

        v_url = $('#id_fuen_text'+fila).val();
        window.open(v_url);       
    }

    copyToClipboard = function(fila) {

        var v_url

        v_url = $('#id_fuen_text'+fila).val();
        $("body").append(v_url);
        $('#id_fuen_text'+fila).select();
        document.execCommand("copy");
    }




</script>

<style>  input[type="text"] {  width: 150px;}  </style>

<form id="formulario" method="POST" action="<?php echo url_for("abmFichas/formularioFichas") ?>">
<?php $optionsSelect = $cursor;?>
<?php
		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("AbmFichas"),'abmFichas/abmFichas'));


		if($alta==1)
        {  
            $cabecera->titulo(__("Nueva Ficha"))->ruta(__("Nueva Ficha"));
        }else{
            $cabecera->titulo(__("Editando Ficha '".$optionsSelect[0]['fich_deno']."'" ))->ruta(__("Editando Ficha"));
        }

        if($_SESSION["usuario"]["modi"] == "S")
        {
            $cabecera->accion('<input type="submit" id="btngrabar" value="Grabar" class="btn btn-primary" />');
            $cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
        }
        
   
		echo $cabecera;
?>

<div id="spinner" class="spinner">
    <p class="text-error">
     <i class="icon-spinner icon-spin icon-large"></i> Obteniendo resultados,
  	<br>espere por favor...
    </p>
</div>

<input type="hidden" id="alta" name="alta" value="<?php echo $alta; ?>" />
<input type="hidden" id="id" name="id" class="" value="<?php echo $id; ?>" />

<div class="wrapper tipoframe">
    <div class="panel-body">

        <ul id="tabs" class="nav nav-tabs">
          <li class="active">
            <a data-toggle="tab" href="#home">Propiedades</a>
          </li>

          <li>
            <a data-toggle="tab" href="#menu1">Aplica a</a>
          </li>

           <li>
            <a data-toggle="tab" href="#menu2">Procedimientos y Recursos </a>
          </li>

           <li>
            <a data-toggle="tab" href="#menu3">Fuentes</a>
          </li>

        </ul>
             
        <div class="tab-content" id="content">
            <div id="home" class="tab-pane fade in active">
              
              <!-- selecciona cursor que es donde estan todos los datos de la ficha en abmFicha.php -->
              
              <?php foreach ($cursor as $row) {} ?>

              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-1 col-form-label">Cod interno</label>
                  <div class="col-xs-3">
                      <input class="form-control" type="text" name="fich_id" value="<?php echo $row['fich_id'] ?>" readonly >
                  </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-form-label">Denominacion</label>
                <div class="col-xs-3 col-md-6">
                  <input class="form-control" name="fich_deno" value="<?php echo $row['fich_deno'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-form-label">Descripción</label>
                <div class="col-xs-3 col-md-6">
                  <textarea class="form-control" name="fich_desc"><?php echo $row['fich_desc'] ?></textarea>
                </div>  
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-form-label">Catálogo</label>
                <div class="col-xs-3">
                 <?php $optionsSelect = $dd_cata;?>
                  <select id= "fich_cata_id" name="fich_cata_id" class="form-control">
                  <?php foreach ($optionsSelect as $arraySelect) { ?>
                      <option value="<?php echo $arraySelect['cata_id'];?>" <?php if($arraySelect['cata_id'] == $row['fich_cata_id']){echo 'selected';} ?> >
                        <?php echo $arraySelect['cata_deno']; ?>
                      </option> 
                  <?php } ?>
                </div>
              </div>
              

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-1 col-form-label">Catálogo</label>
                <div class="col-xs-9">
                 <?php $optionsSelect = $dd_cata;?>
                  <select id= "fich_1" name="fich_2" class="form-control">
                  <?php foreach ($optionsSelect as $arraySelect) { ?>
                      <option value="">
                      </option> 
                  <?php } ?>
                </div>
              </div>
              
            </div> <!--cierre del div id=home-->
            
            <!---  solapa de Aplica a .. -->
            <div id="menu1" class="tab-pane fade">

                <div class="row">

                  <div class="col-xs-6 col-md-3">
                    <table id="fases" class="table table-striped table-bordered font12" cellspacing="0" >
                        <thead>
                            <tr class="alert-info wrapper">
                                <th><?php echo "Fases"; ?></th>
                                <th width="80" class="nosort" style="text-align: center">Aplica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; foreach($l_fase as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                <td><?php echo $row['fase_deno']; ?></td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="anota_fase_f['<?php echo $c ?>']" id="anota_fase_f<?php echo $row['fase_id'] ?>" value="<?php echo $row['fase_id'] ?>"  class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                            <?php $c++; } ?>
                        </tbody>
                    </table>
                  </div>

                  <div class="col-xs-6 col-md-3">
                    <table id="medios" class="table table-striped table-bordered font12" cellspacing="0" >
                        <thead>
                            <tr class="alert-info wrapper">
                                <th><?php echo "Medios"; ?></th>
                                <th width="80" class="nosort" style="text-align: center">Aplica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; foreach($l_medi as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                <td><?php echo $row['medi_deno']; ?></td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="anota_medi_f['<?php echo $c ?>']" id="anota_medi_f<?php echo $row['medi_id'] ?>" value="<?php echo $row['medi_id'] ?>"  class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                            <?php $c++; } ?>
                        </tbody>
                    </table>
                  </div>
					<div class="col-xs-6 col-md-3">
                    <table id="tamanio" class="table table-striped table-bordered font12" cellspacing="0" >
                        <thead>
                            <tr class="alert-info wrapper">
                                <th><?php echo "Tamaño"; ?></th>
                                <th width="80" class="nosort" style="text-align: center">Aplica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; foreach($l_tama as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                <td><?php echo $row['tama_deno']; ?></td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="anota_tama_f['<?php echo $c ?>']" id="anota_tama_f<?php echo $row['tama_id'] ?>" value="<?php echo $row['tama_id'] ?>"  class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                            <?php $c++; } ?>
                        </tbody>
                    </table>
                  </div>
				  
				  <div class="col-xs-6 col-md-3">
                    <table id="tipologia" class="table table-striped table-bordered font12" cellspacing="0" >
                        <thead>
                            <tr class="alert-info wrapper">
                                <th><?php echo "Tipologia"; ?></th>
                                <th width="80" class="nosort" style="text-align: center">Aplica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; foreach($l_tipo as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                <td><?php echo $row['tipo_deno']; ?></td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="anota_tipo_f['<?php echo $c ?>']" id="anota_tipo_f<?php echo $row['tipo_id'] ?>" value="<?php echo $row['tipo_id'] ?>"  class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                            <?php $c++; } ?>
                        </tbody>
                    </table>
              </div>

          </div> <!-- cierre del row -->
        </div> <!-- cierre solapa "aplica a" -->

        <!---  solapa de procedimientos y recursos .. -->
            <div id="menu2" class="tab-pane fade">
                <div class="row">

                <div class="col-xs-12 col-md-6">
                  <table id="tablaProc" class="tablaProc table-striped table-bordered font12" cellspacing="0" >
                      
                        <thead>
                            <tr class="alert-info wrapper">
                                <th ><?php echo "Procedimientos Recomendados"; ?>
                                
                             
                                <th><a title="Agregar un procedimiento" onclick="agregarProce(); return false;" class="btn btn-info pull-right"> <i class="icon-plus text-info"></i>  Nuevo </a>
                                
                                <th  class="nosort" style="text-align: center">Eliminar</th>
      
                            </tr>
                        </thead>
                        
                      <tbody>
                            <?php $c = 1; foreach($l_proc as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                
                                <td colspan="2">
                                  <textarea class="form-control" name="proc_text_f[<?php echo $c ?>]" id="id_proc_text<?php echo $c ?>"><?php echo $row['fipr_texto'];?></textarea>
                                  
                                  <input type="hidden" name="proc_id_f[<?php echo $c ?>]"
                                                       value="<?php echo $row['fipr_proce_id'] ?>">     
                                </td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="proc_borr_f[<?php echo $c ?>]" id="proc_id_f<?php echo $row['fipr_proce_id'] ?>" class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                          <?php $c++; } ?>
                      </tbody>
                       
                  </table>
                </div>

                <!--recursos-->
               <div class="col-xs-12 col-md-6">
                  <table id="tablaRecur" class="tablaRecur table-striped table-bordered font12" cellspacing="0" >

                        <thead>
                            <tr class="alert-info wrapper">
                                <th ><?php echo "Previsión de recursos recomendada"; ?>
                                
                                <th><a title="Agregar recurso" onclick="agregarRecurso(); return false;" class="btn btn-info pull-right"> <i class="icon-plus text-info"></i>  Nuevo </a>
                           
                                <th  class="nosort" style="text-align: center">Eliminar</th>
                            </tr>
                        </thead>

                      <tbody>
                            <?php $c = 1; foreach($l_recur as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                
                                <td colspan="2"> <!--columnas-->

                                  <textarea class="form-control" name="recu_text_f[<?php echo $c ?>]" id="id_recu_text<?php echo $c ?>"><?php echo $row['fire_texto'];?></textarea>

                                  <input type="hidden" name="recu_id_f[<?php echo $c ?>]" value="<?php echo $row['fire_recurso_id'] ?>">     
                                </td>
                                
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="recu_borr_f[<?php echo $c ?>]" id="recu_id_f <?php echo $row['fire_recurso_id'] ?>" class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td> 
                            </tr>
                          <?php $c++; } ?>
                      </tbody>
                  </table>
                </div>

                </div> <!-- cierre del row -->
              </div> <!-- cierre solapa "procedimientos" -->

  <!---  solapa de fuente .. -->
            <div id="menu3" class="tab-pane fade">

                  <table id="tablaFuen" class="tablaFuen table-striped table-bordered font12" cellspacing="0" >

                        <thead>
                            <tr class="alert-info wrapper">
                                <th ><?php echo "Fuentes Registradas"; ?>
                                
                                <th><a title="Agregar fuente" onclick="agregarFuen(); return false;" class="btn btn-info pull-right"> <i class="icon-plus text-info"></i>  Nuevo </a>
                           
                                <th  class="nosort" style="text-align: center">Eliminar</th>
                                <th colspan="2" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>

                      <tbody>
                            <?php $c = 1; foreach($l_fuen as $row){ ?>
                            <tr  onMouseOver="CambiaColor(this,'#dff0d8','blue')" onMouseOut="CambiaColor2(this,'#000000')">
                                
                                <td colspan="2">
                                  <textarea class="form-control" name="fuen_text_f[<?php echo $c ?>]" id="id_fuen_text<?php echo $c ?>"><?php echo $row['fifu_texto'];?></textarea>
                                  <input type="hidden" name="fuen_id_f[<?php echo $c ?>]"
                                                       value="<?php echo $row['fifu_fuen_id'] ?>">     
                                </td>
                                <td style="text-align: center"> 
                                    <label class="switch">
                                         <input type="checkbox" name="fuen_borr_f[<?php echo $c ?>]" id="fuen_id_f<?php echo $row['fifu_fuen_id'] ?>" class="switch-input" 
                                                <?php if ($row['si_no'] == "S") {echo "checked";} ?> >
                                         <span class="switch-label" id="lopi" data-on="Si" data-off="No"></span>
                                         <span class="switch-handle"></span>
                                    </label>
                                </td>
                                 <td>
                                    <a title="Copy al clipboard" onclick="copyToClipboard(<?php echo $c ?>); return false;" class="btn btn-info pull-right"> <i class="icon-copy text-info"></i></a>
                                </td>
                                <td>
                                    <a title="Abrir en nueva solapa" onclick="abrirFuen(<?php echo $c ?>); return false;" class="btn btn-info pull-center">Abrir</a>  
                                </td> 
                            </tr>
                          <?php $c++; } ?>
                      </tbody>
                  </table>
                            
              </div> <!-- cierre solapa "procedimientos" -->


            </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 


<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->