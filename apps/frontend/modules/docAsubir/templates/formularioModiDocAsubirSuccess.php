<script type="text/javascript">
cancelar = function(){
    var defaultPrevented;
    location.href = '<?php echo url_for("docAsubir/docAsubir") ?>';
}

</script>
<div class=" panel-body">

<?php $cur = $sf_data->getRaw('cursor');?>
<?php foreach($cur as $row) { }; ?>

<form id="documForm"  class="form-horizontal" name="documForm" method="POST" action="<?php echo url_for("docAsubir/Modificar") ?>" >
  <?php $cabecera = new Cabecera();
  $cabecera->ruta(link_to(__("Documentacion a subir"), 'docAsubir/docAsubir'));
        
  if($_SESSION["usuario"]["modi"] == "S"):
    $cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
    $cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
  endif;
  $cabecera->titulo(__("Modificar atributos doc #".$row['cdsu_id']))->ruta(__("Modificar atributos doc #".$row['cdsu_id']));

  echo $cabecera;
  ?>

  <br/>
  <div class="wrapper">
  <div class="panel-body">

  <input type="hidden" id="cdsu_id" name="cdsu_id" value="<?php echo $row['cdsu_id'] ?>"/>

    <div class="form-group">
        <label for="cdsu_id_tipoadjunto" class="col-sm-3 control-label" >Tipo de documentación</label>
        <div class="col-sm-7">
            <?php $optionsSelect = $sf_data->getRaw('dd_tipo');?>
            <select id="cdsu_id_tipoadjunto" name="cdsu_id_tipoadjunto" class="form-control" width="40%">
                <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                    <option data="<?php echo $arraySelect["cdoc_id_tipoadjunto"] ?>" <?php if($row['cdsu_id_tipoadjunto']==$arraySelect["cdoc_id_tipoadjunto"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cdoc_id_tipoadjunto"] ?>"><?php echo $arraySelect["cdoc_deno_tipoadjunto"] ?></option> 
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="cdsu_nota" class="col-sm-3 control-label">Comentario (opcional):</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="cdsu_nota" name="cdsu_nota" value="<?php echo $row['cdsu_nota'] ?>"/>
        </div>
    </div>

    <div class="form-group">
        <label for="archivo" class="col-sm-3 control-label">Archivo subido:</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="archivo" name="archivo" readonly="" value="<?php echo $row['cdsu_nombre'],' (',$row['doc_size_k'],' Kb) ', $row['cdsu_fechasubida'] ?>"/>
        </div>
    </div>

  </div>
  </div>
  
</form>
</div>