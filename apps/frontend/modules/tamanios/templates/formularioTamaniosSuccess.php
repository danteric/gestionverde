<script src="/js/validaciones.js"></script>


<script type="text/javascript">
    cancelar = function(){      //funcion para volver al clickear el boton "volver"
        var defaultPrevented;
        location.href = '<?php echo url_for("tamanios/tamanios") ?>';
    }
</script>

<style>
    input[type="text"]{width: 150px;}
</style>

<form id="formulario" method="POST" action="<?php echo url_for("tamanios/formularioTamanios") ?>">

<?php
        $cabecera = new Cabecera();
        $cabecera->ruta(link_to(__("Tamaños"), 'tamanios/tamanios'));


        if($alta)
        {
            $cabecera->titulo(__("Nuevo Tamaño"))->ruta(__("Nuevo Tamaño"));
        }else{
            $cabecera->titulo(__("Editando Tamaño"))->ruta(__("Editando Tamaño"));
        }

        /*---Si el usuario tiene permisos para grabar, muestra boton "grabar"-----*/
        if($_SESSION["usuario"]["modi"] == "S"){
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
          <input class="form-control" type="text" name="tama_id" value="<?php echo $tama_id ?>" readonly >
        </div>
      </div>
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion extensa</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="tama_deno" value="<?php echo $tama_deno ?>" required >
        </div>
      </div>
      <div class="form-group row">
        <label for="example-tel-input" class="col-xs-3 col-form-label">Denominacion reducida</label>
        <div class="col-xs-9">
          <input class="form-control" type="text" name="tama_deno_redu" value="<?php echo $tama_deno_redu ?>" required>
        </div>
      </div>
  </div> 
</div>
</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->