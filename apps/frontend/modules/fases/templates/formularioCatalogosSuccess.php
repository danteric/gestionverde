<script src="/js/validaciones.js"></script>
<style>
input[type="text"]{
  width: 150px;
}
</style>

<form id="formulario" class="formularioValidado" name="modificacionMonedaForm" method="POST" action="<?php echo url_for("catalogos/formularioCatalogos") ?>">
<?php
        $cabecera = new Cabecera();
        $cabecera->ruta(link_to(__("Catalogos"), 'catalogos/catalogos'));

//echo url_for("feriado/formulario");

        if($alta)
            $cabecera->titulo(__("Nueva Catalogo"))->ruta(__("Nueva Catalogo"));
        else
            $cabecera->titulo(__("Editando Catalogo"))->ruta(__("Editando Catalogo"));
        
        if($_SESSION["usuario"]["modi"] == "S"){
            $cabecera->accion('<input type="submit" id="btngrabar" value="Grabar" class="btn btn-primary" />');
        }
        
       	#$cabecera->accion(sprintf('<button type="button" data-target="#agregar_valoresayuda" data-toggle="modal" class="btn btn-success help"><i class="icon-question-sign"></i> Ayuda</button>'));
	echo $cabecera;
?>

<?php //include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>

<!--
<input type="hidden" id="urlValidar" name="urlValidar" value="<?php //echo url_for("moneda/validaMoneda") ?>" />
-->

<div id="spinner" class="spinner">
    <p class="text-error">
     <i class="icon-spinner icon-spin icon-large"></i> Obteniendo resultados,
  	<br>espere por favor...
    </p>
</div>

<input type="hidden" id="alta" name="alta" value="<?php echo $alta; ?>" />
<input type="hidden" id="id" name="id" class="" value="<?php echo $id; ?>" />

<div class="panel-default">
    
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Cod interno</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="cata_id" value="<?php echo $cata_id ?>" readonly >
        </div>
      </div>
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion extensa</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="cata_deno" value="<?php echo $cata_deno ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion reducida</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="cata_deno_redu" value="<?php echo $cata_deno_redu ?>" >
        </div>
      </div>
    
</div>
</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->