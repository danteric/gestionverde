<script>


function cancelar(url) {
     location.href = url;   
     return false;
}

</script>

<form id="mailRecuperaContraForm" class="" name="mailRecuperaContraForm" method="POST" action="<?php echo url_for("mailRecuperaContra/mailRecuperaContraGuardar") ?>">

	<?php $cabecera = new Cabecera();
	$cabecera->ruta('Seguridad')->ruta(link_to(__("Leyanda mail recupero"), 'mailRecuperaContra/mailRecuperaContra'))	;

	if($_SESSION["usuario"]["modi"] == "S"):
		$cabecera->accion('<input type="submit" value="Aceptar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar(\'/\')" value="Cancelar"  class="btn alert-info"/>');
	endif;

	$cabecera->titulo('Leyendas de mail de recupero de contraseña');
	echo $cabecera;
	?>
	<div class="wrapper">
	<div class="panel-body">
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)); ?>

		<div class="form-group form-group-sm">
            <label style="text-align:right;" for="titulo" class="col-sm-2 control-label"><?php echo __("Asunto del mail: ")?></label>
			<div class="col-sm-10">
                <input type='text' id="titulo" name="titulo" placeholder="Asunto del mail" class='form-control' value="<?php echo $titulo ?>">
                <br>
            </div>
		</div>

		<div class="form-group form-group-sm">
            <label style="text-align:right;" for="cuerpo" class="col-sm-2 control-label"><?php echo __("Cuerpo del mail: ")?></label>
			<div class="col-sm-7">
                <textarea class="form-control" rows="3" name="cuerpo"> <?php echo $cuerpo ?> </textarea>
            </div>
            <div class="col-sm-3">
            <h6><?php echo "Utilizar variable '%USU%' para imprimir el usuario, y '%PWD%' para la contraseña desencriptada" ?> </h6> 
            </div>
		</div>
	
	</div>
	</div>
</form>
<!-- ayuda --> 
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->