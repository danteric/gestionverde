<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <title>Explora carpetas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
	<link rel="stylesheet" type="text/css" media="screen" href="/css/estilovarios.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" /> 
		<script src="/js/jquery-1.8.3.js" type="text/javascript"></script>
		<script src="/js/jquery.contextMenu.js" type="text/javascript"></script>
		<link href="/css/jquery.contextMenu.css" rel="stylesheet" type="text/css">
	<script>
			function cerrar(){
			location = "index.php";
		}
	</script>


		<style type="text/css">
			BODY,
			HTML {
				padding: 0px;
				margin: 0px;
			}
			BODY {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				background: #FFF;
				padding: 15px;
			}

			H1 {
				font-family: Georgia, serif;
				font-size: 20px;
				font-weight: normal;
			}

			H2 {
				font-family: Georgia, serif;
				font-size: 16px;
				font-weight: normal;
				margin: 0px 0px 10px 0px;
			}

			#myDiv {
				width: 150px;
				border: solid 1px #2AA7DE;
				background: #6CC8EF;
				text-align: center;
				padding: 4em .5em;
				margin: 1em;
				float: left;
			}



			#options {
				clear: left;
			}

			#options INPUT {
				font-family: Verdana, Arial, Helvetica, sans-serif;
				font-size: 11px;
				width: 150px;
			}
			
			/* Esto lo puso pisar el estilo del CSS libreria contextMenu */
			
			.contextMenu LI.new A { background-image: url(img/page_white_new.png); }
			.contextMenu LI.new_folder A { background-image: url(img/page_white_new_folder.png); }
			.contextMenu LI.edit A { background-image: url(img/page_white_edit.png); }
			.contextMenu LI.cut A { background-image: url(img/cut.png); }
			.contextMenu LI.copy A { background-image: url(img/page_white_copy.png); }
			.contextMenu LI.paste A { background-image: url(img/page_white_paste.png); }
			.contextMenu LI.delete A { background-image: url(img/page_white_delete.png); }
			.contextMenu LI.quit A { background-image: url(img/door.png); }			

		</style>
		<script type="text/javascript">

			$(document).ready( function() {

				if (localStorage['action_session']) {
				$('#myMenu').enableContextMenuItems('#paste');
				} else {
				$('#myMenu').disableContextMenuItems('#paste');
				}

				// Show menu when #myDiv is clicked
				$("#myDiv").contextMenu({
					menu: 'myMenu'
				},
					function(action, el, pos) {
					alert(
						'Action: ' + action + '\n\n' +
						'Element ID: ' + $(el).attr('id') + '\n\n' +
						'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' +
						'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
						);
				});

				var ruta_original = '';
				var archivo_original = '';

				$('#myList :input').focusout(function() {
				var el = this;
				var ruta = $(el).prev('.ruta').val();
				var archivo_nuevo = $(el).val();
				var action = 'edit';
				var url = $(location).attr('pathname') + '?una-ruta=' + ruta + '&ac=exp&action=' + action + '&original=' + archivo_original + '&nuevo=' + archivo_nuevo + '&ruta=' + ruta;
				if (archivo_nuevo != '') {
				$(location).attr('href',url);
				}
				});

				// Show menu when a list item is clicked
				$("#myList UL LI").contextMenu({
					menu: 'myMenu'
				}, function(action, el, pos) {

				switch (action) {
/*					case 'delete':
					var url = $(el).children('a').attr('href') + '&action=' +action + '&' + $(el).attr('class');
					$(location).attr('href',url);
					break;*/
					
					case 'edit':
					archivo_original = $(el).children('.archivo').val();
					if (archivo_original != '') {
					$(el).children('.archivo').prop('type','text');
					$(el).children('a').hide();
					}
					break;
					
					case 'copy':
					if ($(el).children('.archivo').val() != '') {
					localStorage['archivo_session'] = $(el).children('.archivo').val();
					localStorage['ruta_session'] = $(el).children('.ruta').val();
					localStorage['action_session'] = 'copy';
					}
					break;
					
					case 'cut':
					if ($(el).children('.archivo').val() != '') {
					localStorage['archivo_session'] = $(el).children('.archivo').val();
					localStorage['ruta_session'] = $(el).children('.ruta').val();
					localStorage['action_session'] = 'cut';
					}
					break;
					
					case 'paste':
					var ruta_de = localStorage['ruta_session'];
					var ruta_a = $(el).children('.ruta').val();
					var archivo = localStorage['archivo_session'];
					var action = localStorage['action_session'];
					var url = $(location).attr('pathname') + '?una-ruta=' + ruta_a + '&ac=exp&action=' +action + '&de=' + ruta_de+archivo + '&a=' + ruta_a+archivo;
					if (ruta_de != ruta_a && archivo != '') {
					$(location).attr('href',url);
					}
					break;

					default:
					var respuesta;
					var ruta = $(el).children('.ruta').val();
					var archivo = $(el).children('.archivo').val();
					
					if (action == 'delete' && archivo != '') {
					respuesta = confirm("Usted eliminara un elemento del servidor!!");
					} else if (action == 'delete' && archivo == '') {
					respuesta = false;
					} else {
					respuesta = true;
					}

					if (respuesta == true) {
					var url = $(location).attr('pathname') + '?una-ruta=' + ruta + '&ac=exp&action=' +action + '&' + $(el).attr('class') + '&ruta=' + ruta + '&archivo=' + archivo;
					$(location).attr('href',url);
					}
					break;
					}
				});

				// Disable menus
				$("#disableMenus").click( function() {
					$('#myDiv, #myList UL LI').disableContextMenu();
					$(this).attr('disabled', true);
					$("#enableMenus").attr('disabled', false);
				});

				// Enable menus
				$("#enableMenus").click( function() {
					$('#myDiv, #myList UL LI').enableContextMenu();
					$(this).attr('disabled', true);
					$("#disableMenus").attr('disabled', false);
				});

				// Disable cut/copy
				$("#disableItems").click( function() {
					$('#myMenu').disableContextMenuItems('#cut,#copy');
					$(this).attr('disabled', true);
					$("#enableItems").attr('disabled', false);
				});

				// Enable cut/copy
				$("#enableItems").click( function() {
					$('#myMenu').enableContextMenuItems('#cut,#copy');
					$(this).attr('disabled', true);
					$("#disableItems").attr('disabled', false);
				});

			});

		</script>
	</head>
<?php
if (isset($_REQUEST['ac']) && !empty($_REQUEST['ac']) && $_REQUEST['ac'] == 'exp'):
	null;
else:
	echo "No puedes acceder a este archivo";
	exit;
endif;


//ruta del archivo PHP actual
$ruta = 'C:\tmp';//dirname(__FILE__)."/";
//codificación
$array_codif = Array(
"UTF-8",
"ISO-8859-1",
"ISO-8859-15"
);

//Por defecto
$codificacion = "ISO-8859-1";

//Vemos si hay algo en el GET
if (isset($_GET)){
    foreach($_GET as $campo=>$valor){
        switch ($campo) {
            //Obtenemos una ruta, carpeta o archivo
            case "una-ruta":
                $ruta = htmlspecialchars($valor, ENT_QUOTES);
                if (get_magic_quotes_gpc() == 1) $ruta = stripslashes($ruta);
                break;
            //Vemos la codificación
            case "una-codificacion":
                $codificacion = htmlspecialchars($valor, ENT_QUOTES);
                if (get_magic_quotes_gpc() == 1) $codificacion = stripslashes($codificacion);
                break;
        }
    }
}

function copyr($source, $dest)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }
    
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        copyr("$source/$entry", "$dest/$entry");
    }

    // Clean up
    $dir->close();
    return true;
}

switch ($_GET['action']) {
            case "delete":
			if ( isset($_GET['ruta']) && !is_null($_GET['ruta']) && isset($_GET['archivo']) && !is_null($_GET['archivo']) ) {
				if (isset($_GET['carpeta'])) {
				echo exec('rmdir "'.$_GET['ruta'].$_GET['archivo'].'" /s /q');
				}
				else {
				echo exec('DEL "'.$_GET['ruta'].$_GET['archivo'].'" /Q');
				}
			}
			break;

            case "edit":
			if ( isset($_GET['original']) && !is_null($_GET['original']) && isset($_GET['nuevo']) && !is_null($_GET['nuevo']) && isset($_GET['ruta']) && !is_null($_GET['ruta'])) {
			$ruta = $_GET['ruta'];
			$original = $_GET['original'];
			$nuevo = $_GET['nuevo'];
				if ($original != $nuevo) {
				rename( $ruta.$original, $ruta.$nuevo  );
				}
			}
			break;

            case "copy":
			if ( isset($_GET['de']) && !is_null($_GET['de']) && isset($_GET['a']) && !is_null($_GET['a']) ) {
			$de = $_GET['de'];
			$a = $_GET['a'];
			copyr( $de, $a  );
			}
			break;

            case "cut":
			if ( isset($_GET['de']) && !is_null($_GET['de']) && isset($_GET['a']) && !is_null($_GET['a']) ) {
			$de = $_GET['de'];
			$a = $_GET['a'];
			rename( $de, $a  );
			}
			break;

            case "new":
			if ( isset($_GET['ruta']) && !is_null($_GET['ruta']) ) {
			$ruta = $_GET['ruta'];
			$archivo = 'nuevo_archivo';
			$extension = '.php';
			$i = 0;
			
			while (file_exists($ruta.$archivo.($i > 0 ? '('.$i.')' : '').$extension)) {
			$i++;
			}
			$file = fopen($ruta.$archivo.($i > 0 ? '('.$i.')' : '').$extension, "w");
			fclose($file);
			}
			break;

            case "new_folder":
			if ( isset($_GET['ruta']) && !is_null($_GET['ruta']) ) {
			$ruta = $_GET['ruta'];
			$carpeta = 'nueva_carpeta';
			$i = 0;
			
			while (file_exists($ruta.$carpeta.($i > 0 ? '('.$i.')' : ''))) {
			$i++;
			}
			if(!mkdir($ruta.$carpeta.($i > 0 ? '('.$i.')' : ''), 0777, true)) {
				die('No tiene permisos suficientes en esta ruta');
			}
			}
			break;
			
}
//Si la ruta es vacía, pone la del presente script
if ($ruta == "") $ruta = dirname(__FILE__)."\\";


if (isset($_POST['contenido'])){
$fp = fopen($ruta, 'w');
fwrite($fp, $_POST['contenido']);
fclose($fp);
unset($_POST);
}

//Esta variable contendrá la lista de nodos (carpetas y archivos)
$presenta_nodos = "";

//Esta variable es para el contenido del archivo
$presenta_archivo = "";

//Si la ruta es una carpeta, la exploramos. Si es un archivo
//sacamos también el contenido del archivo.
if (is_dir($ruta)){//ES UNA CARPETA
    //Con realpath convertimos los /../ y /./ en la ruta real
    if (realpath($ruta) == 'C:\\') {
    $ruta = realpath($ruta);		
	} else {
    $ruta = realpath($ruta)."\\";		
	}

    //exploramos los nodos de la carpeta
    $presenta_nodos = explora_ruta($ruta);
} else {//ES UN ARCHIVO
    $ruta = realpath($ruta);
    //Sacamos también los nodos de la carpeta
    $presenta_nodos = explora_ruta(dirname($ruta)."\\");
    //Y sacamos el contenido del archivo
    $presenta_archivo = '<br />CONTENIDO DEL ARCHIVO: '.
    $ruta.'</br>
    <form action="'.$_SERVER['REQUEST_URI'].'" method="post" name="myform" id="myform">
    <input name="submit" type="submit" class="combopaginado4 brillar cerrarLogs  pointer" id="submit" value="Guardar" />
	</form>
	<textarea name="contenido" id="contenido" style="margin: 0px 0px 0px; height: 500px; width: 98%;" form="myform">'.
    explora_archivo($ruta, $codificacion).
    '</textarea>';
}

function explora_ruta($ruta){
    //En esta cadena haremos una lista de nodos
    $cadena = "";
    //Para agregar una barra al final si es una carpeta
    $barra = "";
    //Este es el manejador del explorador
    $manejador = @dir($ruta);
    while ($recurso = $manejador->read()){
        //El recurso sera un archivo o una carpeta
        $nombre = "$ruta$recurso";
        if (@is_dir($nombre)) {//ES UNA CARPETA
            //Agregamos la barra al final
			if ($nombre == 'C:\\') {
            $barra = "";
			} else {
            $barra = "\\";				
			}
            $cadena .= "<li class=\"carpeta\">Carpeta: ";
        } else {//ES UN ARCHIVO
            //No agregamos barra
            $barra = "";
            $cadena .= "<li>Archivo: ";
        }
        //Vemos si el recurso existe y se puede leer
        if (@is_readable($nombre)){
            $cadena .= "<input class=\"ruta\" type=\"hidden\" value=\"".$ruta."\"><input style=\"height: 8px; font-size: 12px;\" class=\"archivo\" type=\"hidden\" value=\"".($recurso == '..' ? '' : ($recurso == '.' ? '' : $recurso) )."\"><a href=\"".$_SERVER["PHP_SELF"].
            "?una-ruta=$nombre$barra&ac=exp\" title='ver detalle'>$recurso$barra</a>";
        } else {
            $cadena .= "$recurso$barra";
        }
        $cadena .= "</li>";
    }
    $manejador->close();
    return '<div id="myList"><ul>'.$cadena.'</ul></div>';
}

//Función para extraer el contenido de un archivo
function explora_archivo($ruta, $codif){
    //abrimos un buffer para leer el archivo
    ob_start();
    readfile($ruta);
    //volcamos el buffer en una variable
    $contenido = ob_get_contents();
    //limpiamos el buffer
    ob_clean();
    //retornamos el contenido después de limpiarlo
    //aplicando la codificación seleccionada
    return htmlentities($contenido, ENT_QUOTES, $codif);
}
?>
<body>
<ul id="myMenu" class="contextMenu" >
			<li class="new"><a href="#new">Nuevo Archivo</a></li>
			<li class="new_folder"><a href="#new_folder">Nueva Carpeta</a></li>
			<li class="edit"><a href="#edit">Renombrar</a></li>
			<li class="cut separator"><a href="#cut">Cortar</a></li>
			<li class="copy"><a href="#copy">Copiar</a></li>
			<li class="paste"><a href="#paste">Pegar</a></li>
			<li class="delete"><a href="#delete">Eliminar</a></li>
			<li class="quit separator"><a href="#quit">Salir</a></li>
</ul>
<div class="modal-backdrop fade in"></div>
  <div class="wrapperrmodif  modal4 " style="width: 1100px; height: 530px;"> 
	<div class="panel-body">
		<div class="tipoframe4" style="height: 530px">
 <div class="text-right">
    <input type="submit" class="combopaginado4 brillar cerrarLogs  pointer" value="Cerrar" onclick="cerrar()"/>
   </div>
   
   
    <div class="combopaginado4">Opciones de configuracion PHP (restringen explorador)</div>
    <ul>
    <?php
        $opciones = "<li>".
        "<code>safe_mode</code> ";
        if (ini_get("safe_mode")){
            $opciones .= ": activado";
        } else {
            $opciones .= ": desactivado";
        }
        $opciones .= "</li>".
        "<li>".
        "<code>open_basedir</code>: ".ini_get("open_basedir")."</li>".
        "<li>".
        "<code>getmyuid()</code>: ".getmyuid()."</li>".
        "<li>".
        "<code>getmygid()</code>: ".getmygid()."</li>";
        echo $opciones;
    ?>
    </ul>

   <div class="combopaginado4">Exploracion</div>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get">
        Ruta <small>(Usar en Windows ambas barras "/" y "\")</small>
        <br /><textarea rows="5" cols="50" name="una-ruta"
        ><?php echo $ruta; ?></textarea><br />
        <input type="hidden" name="ac" value="<?php echo $_REQUEST['ac'] ?>" />
        <div class="combopaginado4"> Codificacion para ver archivos:</div>
        <select name="una-codificacion" class="input-xlarge pagesize combopaginado4">
            <?php
                foreach ($array_codif as $i=>$val){
                    echo "<option value=\"$val\"";
                    if ($codificacion == $val) echo " selected=\"selected\"";
                    echo ">$val</option>";
                }
            ?>
        </select>
         <a title="Subir Zip" class="combopaginado4 pointer brillar"   href="su.php?ac=sub" ><i class="icon-file text-success"></i></a><br />
        <input type="submit" class="combopaginado4 brillar cerrarLogs  pointer" value="Ver archivos" />
       
    </form>
    <?php

        echo "<br />$presenta_nodos";
        echo "<br />$presenta_archivo";

    ?>

</body>
</div>
</div>
</div>
</html>    