<script type="text/javascript">

    function toggle_password(){

        var tag1 = document.getElementById("password");
        var tag2 = document.getElementById("showhide");

        if (tag2.innerHTML == 'Mostrar contraseña'){
            tag1.setAttribute('type', 'text');   
            tag2.innerHTML = 'Ocultar contraseña';
        }
        else{
            tag1.setAttribute('type', 'password');   
            tag2.innerHTML = 'Mostrar contraseña';
        }
    }


/*
    llenaRazonSocial = function() {
        $('#empresa_razon_social').val($('#empresa option:selected').text());
    }

     $(document).ready(function(){
    llenaRazonSocial();
    jQuery.validator.messages.required = "";
    $("#loginForm").validate({
        invalidHandler: function(e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted below'
                    : 'You missed ' + errors + ' fields.  They have been highlighted below';
                $("div.error span").html(message);
                $("div.error").show();
            } else {
                $("div.error").hide();
            }
        },
        onkeyup: false,
        messages: {
            username: {
                required: "Nombre de usuario requerido"
            }
        },
        debug:false
    });
    //setTimeout( "refresh()", 100 );   
   //nuevo cpmbox modal x leon 
	var panel = $('.seleccione .panelcargando');
	var timeout;
	
	$('.seleccione').hover(
		function(){	
			//abrir combox al pasar sobre ella	
			clearTimeout(timeout);
			timeout = setTimeout(function(){panel.trigger('open');},100);
		},
		function(){
			//cerrar combox
			clearTimeout(timeout);
			timeout = setTimeout(function(){panel.trigger('close');},100);
		}
	);
	var loaded=false;
	panel.bind('open',function(){
		panel.slideDown(function(){
			if(!loaded)
			{
				// Leo los paises disponibles
				panel.load('/combox_paisuser/_paisLogin.php');
				//panel.load('/../../consola/index.php');\
				loaded=true;
			}
		});
	}).bind('close',function(){
		panel.slideUp();
	});
});
*/
/*
$("#paginando2").live("click", function(){
		var ur_actual = $('#ur_actual').val();
		var ur_aredirect=$(this).attr("data");
        var toLoad= "http://"+ur_aredirect ;
        console.log(toLoad);
        location.href = toLoad;
});
*/
</script>


<?php include_partial('services/notices', array('errors' => $errors, 'notices' => $notices)) ?>
<center>

<div class="panel panel-primary" style="width: 300px;">

    <div class="panel-heading">Ingreso</div>

    <div class="panel-body">
        <form id="loginForm" name="loginForm" method="POST" action="<?php echo url_for("registro/login") ?>" class="form-horizontal">
            <input type="hidden" name="empresa_razon_social" id="empresa_razon_social"/>
            <input type="hidden" name="codigoOrigen" id="codigoOrigen" value="" />
            <input type="hidden" id="ur_actual" value="<?php echo @$_SERVER['HTTP_HOST']; ?>" />
            <br>
            <img src="/img/camarco-icono.png">
            <br><br>
            <br>
                <div class="form-group">
                    <label class="col-sm-4 col-xs-4 control-label">Usuario:</label>
                    <div class="col-sm-8 col-xs-8">
                    <input type="text" id="username" class="required form-control" autofocus name="username" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-xs-4 control-label">Contraseña:</label>
                    <div class="col-sm-8 col-xs-8">
                    <input type="password" id="password" name="password" class="form-control"/>
                    </div>
                </div>
                <a href="#" onclick="toggle_password();" id="showhide">Mostrar contraseña</a>

                <br><br>
                <input class="btn btn-success btn-block" type="submit" value="Ingresar"/>
                <input class="btn btn-default  btn-block" type="button" value="Cambiar contraseña" onclick="$('#recuperarContraseñaForm').show('slow');"/>
                
                <a href="#" onclick="$('#mandarMailForm').show('slow');" id="mandarmail">Mandar contraseña al mail</a>
        </form>
        <br>
    </div>
</div>

</center>

<div id="recuperarContraseñaForm" class="well" style="display: none;">
    <div class="text-center">
    <div class="combopaginado">
    <div class="panel-body text-left">
        <form id="contraForm" name="contraForm" method="POST" action="<?php echo url_for("registro/nuevaContrasena") ?>">
            <legend>Modificar contraseña </legend>
            <table  >
                <tr>
                    <td >Usuario:</td>
                    <td>
                        <input type="text" id="usu" name="usu" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Contraseña anterior:</td>
                    <td>
                        <input type="password" id="password2" name="password2" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td >Contraseña nueva:</td>
                    <td>
                        <input type="password" id="password_nuevo" name="password_nuevo" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Repetir contraseña:</td>
                    <td>
                        <input type="password" id="password_nuevo_rep" name="password_nuevo_rep" class="form-control" />
                    </td>
                </tr>
            </table>
            <div class="botoneraLogin pull-right">
                <input class="btn button" type="submit" value="Modificar"/>
            </div>
        </form>
    </div>
    </div>
    </div>

</div>

<div id="mandarMailForm" class="well" style="display: none;">
    <div class="text-center">
    <div class="combopaginado">
    <div class="panel-body text-left">
        <form id="contraForm" name="contraForm" method="POST" action="<?php echo url_for("registro/enviarContrasena") ?>">
            <legend>Enviar contraseña al mail registrado</legend>
            <div class="form-group">
                <label class="col-sm-4 col-xs-4 control-label">Usuario:</label>
                <div class="col-sm-8 col-xs-8">
                <input type="text" id="usuamail" class="required form-control" autofocus name="usuamail" />
                </div>
            </div>

            <div class="botoneraLogin pull-right">
                <input class="btn btn-success btn-block" type="submit" value="Enviar al mail"/>
            </div>
        </form>
    </div>
    </div>
    </div>

</div>


