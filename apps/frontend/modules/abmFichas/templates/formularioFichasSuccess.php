<script src="/js/validaciones.js"></script>

	  <script type="text/javascript">
	  cancelar = function(){   //funcion para volver al clickear boton "volver"
	      var defaultPrevented;
	      location.href = '<?php echo url_for("abmFichas/abmFichas") ?>';
	  }
</script>

<style>  input[type="text"] {  width: 150px;}  </style>

<form id="formulario" method="POST" action="<?php echo url_for("abmFichas/formularioFichas") ?>">
<?php
		$cabecera = new cabecera();
		$cabecera->ruta(link_to(__("AbmFichas"),'abmFichas/abmFichas'));

		if($alta)
        {  
            $cabecera->titulo(__("Nueva Ficha"))->ruta(__("Nueva Ficha"));
        }else{
            $cabecera->titulo(__("Editando Ficha"))->ruta(__("Editando Ficha"));
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
        </ul>
             
        <div class="tab-content" id="content">
            <div id="home" class="tab-pane fade in active">
              
              <!-- selecciona cursor que es donde estan todos los datos de la ficha en abmFicha.php -->
              <?php $optionsSelect = $cursor;?>
              <?php foreach ($cursor as $row) {} ?>

              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-3 col-form-label">Cod interno</label>
                  <div class="col-xs-9">
                      <input class="form-control" type="text" name="fich_id" value="<?php echo $row['fich_id'] ?>" readonly >
                  </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion</label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" name="fich_deno" value="<?php echo $row['fich_deno'] ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-3 col-form-label">Descripción</label>
                <div class="col-xs-9">
                  <textarea class="form-control" name="fich_desc"><?php echo $row['fich_desc'] ?></textarea>
                </div>  
              </div>

              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-3 col-form-label">Catálogo</label>
                <div class="col-xs-9">
                 <?php $optionsSelect = $dd_cata;?>
                  <select id= "id_ficha" name="ficha" class="form-control">
                  <?php foreach ($optionsSelect as $arraySelect) { ?>
                      <option value="<?php echo $arraySelect['cata_id'];?>"><?php echo $arraySelect['cata_deno']; ?>
                      </option> 
                  <?php } ?>
                </div>
              </div>
    
              <div class="form-group row">
                <label for="example-tel-input" class="col-xs-3 col-form-label">Catálogo</label>
                <div class="col-xs-9">
                 <?php $optionsSelect = $dd_cata;?>
                  <select id= "id_ficha" name="ficha" class="form-control">
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

                  <div class="col-xs-12 col-md-6">
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

                  <div class="col-xs-12 col-md-6">
                    <table id="fuentes" class="table table-striped table-bordered font12" cellspacing="0" >
                        <thead>
                            <tr class="alert-info wrapper">
                                <th><?php echo "Fuentes"; ?></th>
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

                </div> <!-- cierre del row -->
              </div> <!-- cierre solapa "aplica a" -->
            </div> <!--cierre id=content-->
    </div><!--cierre panel body-->
</div>
	 
<!--
</div>    
</div>
</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->