<script>

$(document).ready(function(){    
    // llamado automatico para mostrar nombre de lalocal
    mostrarNombreGenerico($("#usu_simula").val(),'usu_usuario','datosinfo');
    //autocomplete//
    $('.datosinfo').keyup(function(){
        var valor = $(this).val();   
        var accion = 'usu_usuario';
        var dataString = "valor="+valor+','+accion;

        console.log(dataString);
        $("#logo_spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getgenerico') ?>",
            data: dataString,
            success: function(data) {
                //alert(data);
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#logo_spinner").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                                $('#datosinfo').val($('#'+id).attr('data2'));
                                $('#usu_simula').val($('#'+id).attr('data'));
                                //cargarGrilla($('#usu_simula').val());
                }); 
                // SI HAGLO CLICK AFUERA CIERRO EL DIV Y LIMPIO EL CAMPO
                $('.container').click(function(){
                     $('#muestroayudabuscado').hide();
                     //$('.datosinfo').val('');
                });  
          
         } });     
       
    });
    });

function cancelar(url) {
     location.href = url;   
     return false;
}

</script>

<form id="simulaUsuarioForm" class="" name="simulaUsuarioForm" method="POST" action="<?php echo url_for("simulaUsuario/simulaUsuarioGuardar") ?>">

	<?php $cabecera = new Cabecera();
    $cabecera->ruta('Seguridad')->ruta(link_to(__("Simular usuario"), 'simulaUsuario/simulaUsuario'));

	if($_SESSION["usuario"]["modi"] == "S"){
		$cabecera->accion('<input type="submit" value="Aceptar" class="btn btn-success" />');
        $cabecera->accion('<input type="button" onclick="cancelar(\'/\')" value="Cancelar"  class="btn alert-info"/>');
	};

	$cabecera->titulo('Simular Usuario en el sistema');
	echo $cabecera;
	?>
	<div class="wrapper">
	<div class="panel-body">
	<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)); ?>
	
		<div class="form-group form-group-sm">
			<!-- <td style="text-align:right;"><label for="datosinfo" > </label></td> -->
            <label style="text-align:right;" for="datosinfo" class="col-sm-2 control-label"><?php echo __("Usuario: ")?></label>
			<div class="col-sm-4">
                <i id="logo_spinner" style="display:none" class="icon-spinner icon-spin icon-large"></i>
                <input type='text' id="datosinfo" name="usuario" placeholder="Escriba usuario" class='form-control datosinfo limpiarcampo' value="<?php echo $usuario_simulado ?>">
                <input type="hidden" id="usu_simula" name="id_usuario" value="<?php echo $usuario_simulado ?>" />
                <div id="muestroayudabuscado"></div>
                <b class="focusMensajes" id="focusMensajes" ></b> 
            </div>
		</div>
	
	</div>
	</div>
</form>
<!-- ayuda --> 
<?php //require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->