<script src="/js/validaciones.js"></script>


  <script type="text/javascript">
  cancelar = function(){   //funcion para volver al clickear boton "volver"
      var defaultPrevented;
      location.href = '<?php echo url_for("catalogos/catalogos") ?>';
  }

</script>

<style>
input[type="text"]{
  width: 150px;
}
</style>

<form  id="formulario" method="POST" action="<?php echo url_for("catalogos/formularioCatalogos") ?>">
    <?php
            $cabecera = new Cabecera();
            $cabecera->ruta(link_to(__("Catalogos"), 'catalogos/catalogos'));

   

            if($alta)
            {  
                $cabecera->titulo(__("Nueva Catalogo"))->ruta(__("Nueva Catalogo"));
            }else{
                $cabecera->titulo(__("Editando Catalogo"))->ruta(__("Editando Catalogo"));
            }

            if($_SESSION["usuario"]["modi"] == "S")
            {
                $cabecera->accion('<button type="submit" id="btngrabar" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Grabar</button>');
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
            <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label">Cod. interno</label>
            <div class="col-md-2">
              <input class="form-control" type="text" name="cata_id" value="<?php echo $cata_id ?>" readonly >
            </div>
        </div>

        <div class="form-group row">
            <label for="example-tel-input" class="col-xs-2 col-md-2 col-form-label">Nombre del catálogo</label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="cata_deno" value="<?php echo $cata_deno ?>" required>
            </div>
        </div>

      </div>    
    </div>

</form>
<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->