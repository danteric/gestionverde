<?php
		// si entro aqui significa que esta todo ok y creo la clase para ejecutar el form.submit
		//---------------------------//
		class Entroaqui {
		 public $valor;
		}
	
		//llamo a la clase y le doy un valor por default "1"
		//este valor lo recibe en baje.js ||submitHandler: function(form)||
		$entroaqui = new Entroaqui();
		$entroaqui->valor = 1;
		//echo json_encode($entroaqui);
		echo $entroaqui->valor;
		//---------------------------//

		
?>