<?php
if (isset($_REQUEST['borrar']) && !empty($_REQUEST['borrar'])){ 
$origen = '../smog-logsApp/logsParametrosApp.txt';
$archivo = fopen("$origen", "w+")
or die("Hubo un problema en tratar de abriri el archivo");
echo "<br><br>";
echo "<div class='combopaginado  alert-error font'>HAS BORRADO TODO EL CONTENIDO DEL ARCHIVO....</div>";
}
else
{ 
	echo "<div class='combopaginado  alert-error font'>lo sentimos, no se puede borrar el contenido de este archivo</div>";
} 
?>