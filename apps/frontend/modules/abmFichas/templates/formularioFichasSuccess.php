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

<div class="wrapper">
  <div class="panel-body">
    
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Cod interno</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_id" value="<?php echo $fich_id ?>" readonly >
        </div>
      </div>

      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_deno" value="<?php echo $fich_deno ?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Catálogo</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_cata_id" value="<?php echo $fich_cata_id ?>" required >
        </div>
      </div>
		
	  <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Para tamaño de obra</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_tama_id value="<?php echo $fich_tama_id ?>" required >
        </div>
      </div>

       <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Procedimiento</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_proc_id" value="<?php echo $fich_proc_id ?>" required >
        </div>
      </div>

       <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Recursos estimados</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_recu_id" value="<?php echo $fich_recu_id ?>" required >
        </div>
      </div>

       <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Fuente</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="fich_fuen_id" value="<?php echo $fich_fuen_id ?>" required >
        </div>
      </div>

</div>    
</div>
</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->