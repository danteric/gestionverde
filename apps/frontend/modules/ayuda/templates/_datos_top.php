<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Ayuda</title>
		<meta name="description" content="ayuda" />
	    <head>
  		<script type="text/javascript">
  		$( document ).ready( function() {
   		//$( '#cerrar' ).load( 'url' );   
		$("#trigger-overlay").click(function(){
		$("#footer").hide();
		});
		$("#cerrar").click(function(){
		$("#footer").show(); 
		});
		});
		
		function cargarContenidos(urlDatos){
		$.get(urlDatos, function(data) {
		  $('#verayuda').html(data);
		});
		}
		function cargarImagen(){
		var img = new Image();
		$(img).load(function(){
		   $("#divContenedor").html(this);
		}).attr('src',"carpeta/imagen.jpg");
		}
		
		//envio por post el valor mostrar como ayuda
        // AYUDA PARA PANTALLAS PRINCIPALES
		$(document).ready(function(){
		/*$("button").click(function(){
		$("#verayuda").show();		
		$.post("<?php echo url_for('ayuda/manual_sistema') ?>",
		/*{ 
		 valor: $("#ayuda").val(),
		 },
            function(data){
                $('#verayuda').html(data);
            });
		  });*/
		
		
		////HELPS CON PROCEDIMIENTOS PARA FORMULARIOS///
		$(".help").click(function(){  
        $.post("<?php echo url_for('ayuda/manual_sistemaHelp') ?>",
        {    
            valor: $("#ayuda").val(), 
            valor2: $("#ayudaformulario").val(),   
        },
            function(data){
                $('#verayuda').html(data);
            });
          });
          
          //--------atributo para mover todos los modals--------//
           //$('.modal').draggable().attr('title', 'Arrastrar').attr('style','cursor:move;');
           $('.modal4').draggable().attr('title', 'Arrastrar').attr('style','cursor:move;');
           $('.modal5').draggable().attr('title', 'Arrastrar').attr('style','cursor:move;');
           //$('.modal3').draggable().attr('title', 'Arrastrar').attr('style','cursor:move;');
           $(".modal4").mouseleave(function(event){
		   $(".modal4").attr('title', 'Arrastrar');
			});
		});
		
    //esta funcion de help lo puse aqui por que me hace conflicto del la otra forma como igual para todos     
     cargarHelp = function() {
        $.post("<?php echo url_for('ayuda/manual_sistemaHelp') ?>",
        {    
            valor: $("#ayuda").val(), 
            valor2: $("#ayudaformulario").val(),   
        },
            function(data){
                $('#verayuda').html(data);
            });
    }
    ocultar = function(){
    	$('.modal-backdrop fade in').addClass('hide');
    	location.reload();
    }

       ////FIN HELPS CON PROCEDIMIENTOS PARA FORMULARIOS///
       
		//aqui envio los valores antes de hacer click
		/*$(document).ready(function(){
		$("button").hover(function(){
		valordato=$("#ayuda").val(); 
		$.ajax({
			url:"../ayuda/manual_sistema.php",cache:false,
			type:"POST",
			data:{valor:valordato},
			success:function(result){
			$("#verayuda").html(result);
			}});
		});
		});*/
		/* onload=function() {
	    document.getElementById('dir').value = 'usu';
	    }*/
	 </script>
	</head>
<body>
<?php
// con esta funcion obtengo los ultimos datos de la url ej. /profesiones/profesiones
    function obtenerURL() {
      return   $_SERVER['REQUEST_URI'];
    }

    $url = obtenerUrl();
    $datos = parse_url ($url);
     
    foreach ($datos as $urlactual) {
     //echo  "$urlactual";
    }
?>  

<!-- HELP -->
<?php //echo substr($urlactual, 0,50); ?>
<input type="hidden" id="ayuda" value="<?php echo $urlactual; ?>"/>
<div id="agregar_valoresayuda" name="agregar_valores" class="modal modalayuda hide fade in" style="display: none;">
        <div class="modal-header">
            <h3>Ayuda</h3>
        </div>
        <div class="modal-body tipoframe" id="verayuda">
                   <!-- aqui muestro la ayuda-->    
        </div>
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">                       
                        <div class="text-left" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 8px">
                        <h>Guia operativa <strong>Sistema <?php echo $_SESSION["usuario"]["version"];?></strong> &nbsp;<i class="icon-align-justify"></i>&nbsp;Departamento de Tecnolog&iacute;as de la Informaci&oacute;n Area de Apoyo &nbsp;<i class="icon-align-justify"></i>&nbsp; Ayuda de navegaci&oacute;n
                        </div>
                    <a href="#" data-dismiss="modal"> <img src="/img/cross.png" class="zoom"  width="40px" onclick="ocultar()"></a>
                </li>
             
            </ul>
        </div>
    </div>
<!-- /HELP -->   


<!----------------- resultado modal x jquery ------------------
--------------------------------------------------------------->     
<div id="mostrardetalle"  class="modal modal3   cerrar hide fade in " style="display: none; font-size:12px">

	    <div class="wrapper3">
	    <div class="panel-body"> 
	        <div class="modal-body tipoframe">
	              <!-- aqui muestro lo que se esta llamando-->  
	        </div>
		</div>
		</div>	
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">                       
                        <div class="text-left" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 8px">
                        <h>Guia operativa <strong>Sistema <?php echo $_SESSION["usuario"]["version"];?></strong> &nbsp;<i class="icon-align-justify"></i>&nbsp;Departamento de Tecnolog&iacute;as de la Informaci&oacute;n Area de Apoyo &nbsp;<i class="icon-align-justify"></i>&nbsp; Ayuda de navegaci&oacute;n
                        </div>
                    <a href="#" data-dismiss="modal"> <img src="/img/cross.png" class="zoom"  width="40px" onclick="ocultar()"></a>
                </li>
             
            </ul>
        </div>
</div>
<!----------------- fin resultado modal x jquery ---------------
--------------------------------------------------------------->


<!----------------- resultado modal x jquery modal ------------------
--------------------------------------------------------------->     
<div id="mostrardetalle2"  class="modal   cerrar hide fade in " style="display: none; font-size:12px">

	    <div class="colorfondo">
	    <div class="panel-body"> 
	        <div class="modal-body">
	              <!-- aqui muestro lo que se esta llamando-->  
	        </div>
		</div>
		</div>	
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">                       
                    <a href="#" data-dismiss="modal"> <img src="/img/cross.png" class="zoom reFrescar"  width="40px" onclick="ocultar()"></a>
                </li>
             
            </ul>
        </div>
</div>
<!----------------- fin resultado modal x jquery ---------------
--------------------------------------------------------------->

<!----------------- resultado modal x jquery modal ------------------
--------------------------------------------------------------->     
<div id="mostrardetalle3"  class="modal-body  cerrar hide fade in " style="display: none; font-size:12px">

	    <div class="colorfondo">
	    <div class="panel-body"> 
	        <div class="modal-body modal5">

	              <!-- aqui muestro lo que se esta llamando--> 
	               
	        </div>
		</div>
		</div>	
</div>
<!----------------- fin resultado modal x jquery ---------------
--------------------------------------------------------------->

<!----------------- resultado modal x jquery ---------------
--------------------------------------------------------------->
<div id="mostrardetalle4" class="modal combopaginado hide fade in" style="display: none; width: 650px;">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">
                        <!-- <div class="text-left" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 8px">
                        <h>Guia operativa <strong>Sistema <?php echo $_SESSION["usuario"]["version"];?></strong> &nbsp;<i class="icon-align-justify"></i>&nbsp;Departamento de Tecnolog&iacute;as de la Informaci&oacute;n Area de Apoyo &nbsp;<i class="icon-align-justify"></i>&nbsp; Ayuda de navegaci&oacute;n
                        </div> -->
                    <a href="#" data-dismiss="modal"><img src="/img/cross.png" class="zoom reFrescar"  width="40px"></a>
                </li>

            </ul>
        </div>
    </div>     
<!----------------- fin resultado modal x jquery ---------------
--------------------------------------------------------------->

<!----------------- resultado modal x jquery ------------------
--------------------------------------------------------------->     
<div id="mostrardetalle5"  class="modal modal3   cerrar hide fade in " style="display: none; font-size:12px">

        <div class="wrapper3">
        <div class="panel-body"> 
            <div class="modal-body tipoframe">
                  <!-- aqui muestro lo que se esta llamando-->  
            </div>
        </div>
        </div>  
        <div class="modal-footer">
            <ul>
                <li style="list-style:none;">                       
                        <div class="text-left" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 8px">
                        <h>Guia operativa <strong>Sistema <?php echo $_SESSION["usuario"]["version"];?></strong> &nbsp;<i class="icon-align-justify"></i>&nbsp;Departamento de Tecnolog&iacute;as de la Informaci&oacute;n Area de Apoyo &nbsp;<i class="icon-align-justify"></i>&nbsp; Ayuda de navegaci&oacute;n
                        </div>
                    <a href="#" data-dismiss="modal"> <img src="/img/cross.png" class="zoom"  width="40px"></a>
                </li>
             
            </ul>
        </div>
</div>
<!----------------- fin resultado modal x jquery ---------------
--------------------------------------------------------------->

</body>
</html>