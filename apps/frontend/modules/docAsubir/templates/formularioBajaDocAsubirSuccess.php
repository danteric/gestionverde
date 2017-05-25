<script type="text/javascript">
cancelar = function(){
    var defaultPrevented;
    location.href = '<?php echo url_for("docAsubir/docAsubir") ?>';
}

</script>
<div class=" panel-body">

<?php $cur = $sf_data->getRaw('cursor');?>
<?php foreach($cur as $row) { }; ?>

<form id="documForm"  class="form-horizontal" name="documForm" method="POST" action="<?php echo url_for("docAsubir/Eliminar") ?>" >
  <?php $cabecera = new Cabecera();
  $cabecera->ruta(link_to(__("Documentacion a subir"), 'docAsubir/docAsubir'));
        
  if($_SESSION["usuario"]["modi"] == "S") {
    $cabecera->accion('<input type="submit"  value="Eliminar" class="btn btn-danger" />');
    $cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
  };
  $cabecera->titulo(__("Eliminar documento #".$row['cdsu_id']))->ruta(__("Eliminar doc #".$row['cdsu_id']));

  echo $cabecera;
  ?>

  <br/>
  <div class="wrapper">
  <div class="panel-body">
    <input type="hidden" id="cdsu_id" name="cdsu_id" value="<?php echo $row['cdsu_id'] ?>"/>
    <div class="form-group">
        <div class="col-sm-4 text-right" ><b>Tipo de documentación:</b></div>
        <div class="col-sm-7 text-danger text-left"><?php echo $row['cdoc_deno_tipoadjunto'] ?></div>
    </div>
       <div class="form-group">
        <div class="col-sm-4 text-right" ><b>Comentario:</b></div>
        <div class="col-sm-7 text-danger text-left"><?php echo $row['cdsu_nota'] ?></div>
    </div>
       <div class="form-group">
        <div class="col-sm-4 text-right" ><b>Archivo subido:</b></div>
        <div class="col-sm-7 text-danger text-left"><?php echo $row['cdsu_nombre'],' (',$row['doc_size_k'],' Kb) ', $row['cdsu_fechasubida'] ?></div>
    </div>

  </div>
  </div>
  
</form>
</div>