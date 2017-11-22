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
function submitContactForm(){
    var usu = $('#usu').val();
    var password2 = $('#password2').val();
    var password_nuevo = $('#password_nuevo').val();
    var password_nuevo_rep = $('#password_nuevo_rep').val();

    $.ajax({
            type:'POST',
            url:'echo url_for("registro/nuevaContrasena")',
            data: $('#form').serialize();
            
        });
    $('#recuperarContraseñaForm').modal('hide');
    }
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



<!-- .......................Modal para el cambio de contraseña........................... 
<div id="recuperarContraseñaForm" class="modal modal-wide fade" >
<div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modificar Contraseña</h4>
      </div>
      
      <div class="modal-body">
        <form id="form" role="form">
            <table  >
                <tr>
                    <td >Usuario:</td>
                    <td>
                        <input type="text" id="usu" name="usu" class="form-control" required />
                    </td>
                </tr>
                <tr>
                    <td>Contraseña anterior:</td>
                    <td>
                        <input type="password" id="password2" name="password2" class="form-control" required/>
                    </td>
                </tr>
                <tr>
                    <td >Contraseña nueva:</td>
                    <td>
                        <input type="password" id="password_nuevo" name="password_nuevo" class="form-control" required/>
                    </td>
                </tr>
                <tr>
                    <td>Repetir contraseña:</td>
                    <td>
                        <input type="password" id="password_nuevo_rep" name="password_nuevo_rep" class="form-control" required/>
                    </td>
                </tr>
            </table>
        
        </form>
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
      </div>

    </div> 
 </div> 
</div> 

 -->


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


