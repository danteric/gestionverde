<?php  


class seguimientoProyectoActions extends sfActions
{
	protected $formulario = 'seguimientoProyecto';

	/*----------------------Redireccion a lista, como principal--------------------------*/
	public function executeIndex (sfWebRequest $request)
	{
		$this->executeLista($request);

	}

	/*----------------------------------Listar las Proyecto ---------------------------------*/
	
	public function executeSeguimientoProyecto (sfWebRequest $request)
	{
		 $this->errors = array();
         $this->notices = array();

         
         $sql = "GET_FASE_RS(null,'S')";
         $this->dd_fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

	}

	/*------------------------filtro para buscar un proyecto------------------------------*/
	public function executeTablaSeguimientoProyecto(sfWebRequest $request) {
	
        $this->nombre_proyecto	= $request->getParameter("id_nombre");
      	$this->fecha_desde	= $request->getParameter("id_fecha");
      	$this->fase_actual = $request->getParameter("proy_fase_actual");
		$this->cursor       = array();



    	$sql = "GET_ABM_PROYECTO_RS('".$_SESSION["usuario"]["username"]."','".
    							   'A'."','".
    							   $this->fase_actual."','".
    							   $this->fecha_desde."','".
    							   $this->nombre_proyecto."','".                             
                                   'P'."')";
        	                           
                      

		$cursor_nombre = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   		

    	$this->cursor = $cursor_nombre;

		if ($this->cursor == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}
		
		if(empty($this->cursor)){
			$this->cursor = array(0);
		}

		return $this->renderPartial
				('seguimientoProyecto/tablaSeguimientoProyecto', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos));
	
	}
	

	/*--------------------------Modificación de seguimiento de Proyecto ---------------------------------*/
	public function executeFormularioSeguiProyecto (sfWebRequest $request)
	{
					
		$this->errors = array();
		$this->notices = array();


		$proy_id = $request->getParameter('proy_id');	//obtiene el id del proyecto del array $request

		// trae todos los datos relevantes para el armado de un proyecto
		
 		 $sql = "GET_FASE_RS(null,'')";
         $this->dd_fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_CAMP_PAISES_RS(null)" ;
         $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		 $sql = "GET_PROYECTO_RS(".$proy_id.")";
		 $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		 $sql = "GET_PROYECTO_FICHA_ADHOC_RS(".$proy_id.")";
		 $this->cursor_fich_adhoc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


		// -------------------------------grabar-----------------------------
		
		if($request->getMethod() == "POST")
		{

			$proy_id		= $request->getParameter("proy_id");
			$this->fase_id = $request->getParameter("proy_fase_id");
			$this->graba_ok 	= 1;	


		//-----------Validacion de campos vacios y tipos de datos---------
		
            $sql = "M_PROYECTO_MODIF_FASE_RS('".$_SESSION['usuario']['username']."','"
            						  .$proy_id."','"
                                     .$this->fase_id."')"; 


            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
            $resp_sp = $this->cursor[0]['respuesta'];

	
			  //si hubo problemas, no graba
            if ($resp_sp != 'OK') {
                $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                $this->graba_ok = 0;
            }
 		


           	//-------Si hay algun error, no graba y continua en el ABM de un proyecto -----
			if ($this->graba_ok == 1) 
			{
				$this->redirect("seguimientoProyecto/seguimientoProyecto");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("seguimientoProyecto/FormularioSeguiProyecto?proy_id=".$proy_id);
				
			} 
			
		}//post
		
	}//end function formularioProyecto





/*-------------------------------Guardar el seguimiento de la ficha-------------------------------*/
	public function executeGuardarSeguimientoFicha(sfWebRequest $request) {
	
      	$proy_id = $request->getParameter("proy_id");
      	$proy_fase = $request->getParameter("proy_fase");
      	$proy_fich_id = $request->getParameter("fich_id");
      	$proy_fich_text = $request->getParameter("fich_text");

		$cursor_ficha  = array();
		$total_paginas = 1;

    	$sql = "AM_SEGUIM_PROYE_FICHA_FASE_RS('".$_SESSION['usuario']['username']."',
                                   '".$proy_id."',
                                   '".$proy_fich_id ."',
                                   '".$proy_fase."',
                                   '".$proy_fich_text."');";

		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   		
   		$this->cursor_ficha = $cursor;

   		if ($this->cursor_ficha == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}

		if(empty($this->cursor_ficha)){
			$this->cursor_ficha = array(0);
		}


		return $this->renderPartial
				('seguimientoProyecto/tablaComentarioGuardado', array('cursor' =>$this->cursor_ficha,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
		
	}	



/*-------------------------------Lee el seguimiento de una ficha--------------------------------*/
	public function executeLeerSeguimientoFicha(sfWebRequest $request) {
	
      	$proy_id = $request->getParameter("proy_id");
      	$fich_id= $request->getParameter("fich_id");
      	$proy_fase= $request->getParameter("proy_fase");
		$this->$cursor_fichas  = array();

    	$sql = "SEL_SEGUIM_PROYE_FICHA('".$proy_id."','".
    									  $fich_id."','".
					                      $proy_fase."')";

 		
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

   		$this->cursor_fichas = $cursor;

   		if ($this->cursor_fichas == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}

		if(empty($this->cursor_fichas)){
			$this->cursor_fichas = array(0);
		}

		return $this->renderPartial
				('seguimientoProyecto/fichaSeguimientoLeida', array('cursor' =>$this->cursor_fichas,
											     'sindatos' =>$this->sindatos
												 ));
		
	}	

/*-------------------------------Cerrar el proyecto en seguimiento--------------------------------*/
	public function executeCierreProyecto(sfWebRequest $request) {
	
      	$proy_id = $request->getParameter("proy_id");
      	$proy_fase = $request->getParameter("proy_fase");
		$this->$sindatos  = array();
		$cursor  = array();

		
		//Store procedure para el cierre del proyecto.
    	$sql = "M_CIERRE_PROYECTO_RS('".$_SESSION['usuario']['username']."','"
    									.$proy_id."','"
    									.$proy_fase."')";
		

 		
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


   		if ($cursor == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}

		if(empty($cursor)){
			$cursor = array(0);
		}

		return $this->renderPartial
				('seguimientoProyecto/cierreProyectoCorrecto', array('cursor' =>$cursor,
											     'sindatos' =>$this->sindatos
												 ));
		
	}	

/*-------------------------------Buscar fichas relacionadas--------------------------------*/
	public function executeFichasPorFase(sfWebRequest $request) {
	
      	$proy_id = $request->getParameter("proy_id");
      	$proy_fase = $request->getParameter("proy_fase");
		$cursor_fichas  = array();
		$total_paginas = 1;


    	$sql = "SEL_SEGUIM_PROYE_FICHA_FASE_RS('".$proy_id."','".
					                              $proy_fase."')";
 
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   		
   		$this->cursor_fichas = $cursor;

   		if ($this->cursor_fichas == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}

		if(empty($this->cursor_fichas)){
			$this->cursor_fichas = array(0);
		}


		return $this->renderPartial
				('seguimientoProyecto/tablaFichas', array('cursor' =>$this->cursor_fichas,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
		
	}	


/*-------------------------------ABuscar fichas relacionadas--------------------------------*/
	
	public function executeFichaReducida(sfWebRequest $request) {
	
      	$this->fich_id = $request->getParameter("fich_id");


    	$sql = "GET_FICHA_RS('".$this->fich_id."')";
		$this->fich = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$sql = "GET_FICHA_PROCEDIMIENTOS_RS('".$this->fich_id."')";
        $this->proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_RECURSOS_RS('".$this->fich_id."')";         
        $this->recu = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_FUENTES_RS('".$this->fich_id."')";         
        $this->fuen = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

   		//echo $sql;
   		//echo "<pre>"; print_r($this->cursor_fichas_rel);die;
   		
		return $this->renderPartial
				('seguimientoProyecto/fichaReducida', array('fich'=>$this->fich,
												  'proc'=>$this->proc,
												  'recu'=>$this->recu,
												  'fuen'=>$this->fuen
												 ));
	
	}




}//end class

?>