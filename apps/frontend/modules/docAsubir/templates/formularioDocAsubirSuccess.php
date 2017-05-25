<script type="text/javascript">
cancelar = function(){
    var defaultPrevented;
    location.href = '<?php echo url_for("docAsubir/docAsubir") ?>';
}
/*
$(document).on('change', ':file', function() {

    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

alert(label);
	$('#ver_archivo').val(label);
    //input.trigger('fileselect', [numFiles, label]);
});
*/

$(document).ready( function() {

	$('.input-file').change(function (){
	   	 
	     var sizeByte = this.files[0].size;
	     if (sizeByte >= 1073741824) {
	        pesoActu = parseFloat(sizeByte / 1073741824).toFixed(2) + ' GB';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	        //return false;
	        } 
	        else
	        if (sizeByte >= 1048576) {
	        pesoActu = parseFloat(sizeByte / 1048576).toFixed(2) + ' MB';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	       // return false;
	        } 
	        else
	        if (sizeByte >= 1024) {
	        pesoActu = parseFloat(sizeByte / 1024).toFixed(2) + ' KB';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	        //return false;
	        } 
	        else
	        if (sizeByte > 1) {
	        pesoActu = parseFloat(sizeByte).toFixed(2) + ' bytes';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	       // return false;
	        } 
	        else
	        if (sizeByte == 1) {
	        pesoActu = '1 bytes';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	        //return false;
	        }else{
	        pesoActu = '0 bytes';
	        $("#tamano").html('<i class="icon-paperclip text-danger redondo3"><b> Peso:</b>  '  +pesoActu+'</i>');
	       // return false;
	        } 

		$('#ver_archivo').val(this.files[0].name);


	     var siezekiloByte = parseInt(sizeByte / 1024);
	     if(siezekiloByte > $(this).attr('size')){
	         //alert('El tamaño supera el limite permitido');
	         $("#mensajito").html('<i class="icon-paperclip alert alert-error cierro"><b> El tamaño supera el limite permitido</b> </i>');
	         $(".clin").addClass('alert alert-danger');
	         $("#botoncito").html('<i class="icon-remove redondo text-error combomedio3"></i>');
	         return false;
	     }else{
	     	$(".cierro").hide();
	     	 $(".clin").removeClass('alert alert-danger');
	     	 $(".clin").addClass('alert alert-info');
	     	 $("#botoncito").html('<i class="icon-ok text-info redondo combomedio3"></i>');
	     	 return false;
	     }


	   });
   });

</script>
 <div class=" panel-body">

<form id="documForm" enctype="multipart/form-data" class="form-horizontal" name="documForm" method="POST" action="<?php echo url_for("docAsubir/Guardar") ?>" >
	<?php $cabecera = new Cabecera();
	$cabecera->ruta(link_to(__("Documentacion a subir"), 'docAsubir/docAsubir'));
        
	if($_SESSION["usuario"]["modi"] == "S"):
		$cabecera->accion('<input type="submit"  value="Grabar" class="btn btn-success" />');
		$cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
	endif;
        
	if(empty($nombre)):
        $cabecera->titulo(__("Nuevo documento a subir"))->ruta(__("Nuevo documento"));
	else:
	    $cabecera->titulo(__("Modificar atributos en documento #".$nombre))->ruta(__("Modificar atributos en doc #".$nombre));
	endif;
        
	echo $cabecera;
        ?>
	<br/>
	<div class="wrapper">
	<div class="panel-body">
	
    	<input type="hidden" id="alta" name="alta" value="<?php echo $alta ?>" />

		<div class="form-group">
		    <label for="cdsu_id_tipoadjunto" class="col-sm-4 control-label" >Tipo de documentación</label>
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
	    	<label for="cdsu_nota" class="col-sm-4 control-label">Comentario (opcional):</label>
	    	<div class="col-sm-7">
	      	<input type="text" class="form-control" id="cdsu_nota" name="cdsu_nota" value="<?php echo $row['cdsu_nota'] ?>"/>
	      	</div>
	  	</div>

		<div class="form-group">
			<div class="col-sm-1">
			</div>
			<label for="get_archivo" class="btn btn-primary col-sm-3 control-label">Seleccione archivo...
			<input type="file" multiple="" id="get_archivo" class="input-file" size="30000" name="get_archivo">  <!-- hasta 10 Mb --> 
			</label>
			<div class="col-sm-6">
			<input type="text" id="ver_archivo" name="ver_archivo" class="form-control filefield" readonly="" value="">
			</div>
			<div class="col-sm-2"><h6 class="text-info"><?php echo $arraySelect["v_max_size"] ?></h6>
				<h6 id="tamano"></h6>
			</div>
	  	</div>

	</div>
	</div>
	
</form>
</div>