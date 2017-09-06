<?php  


class abmProyectoActions extends sfActions
{
	protected $formulario = 'abmProyecto';

	/*----------------------Redireccion a lista, como principal--------------------------*/
	public function executeIndex (sfWebRequest $request)
	{
		$this->executeLista($request);

	}

	/*----------------------------------Listar las Proyecto ---------------------------------*/
	
	public function executeAbmProyecto (sfWebRequest $request)
	{
		 $this->errors = array();
         $this->notices = array();



         $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];



	}

	/*------------------------filtro para buscar un proyecto------------------------------*/
	public function executeTablaProyecto(sfWebRequest $request) {
     // echo "<pre>"; print_r($_REQUEST); exit;
	
      	$this->id_nombre	= $request->getParameter("id_nombre");
		$this->cursor       = array();
		$this->total_paginas = 1;


    	$sql = "GET_ABM_PROYECTO_RS('".$_SESSION["usuario"]["username"]."','".                             
                                   $this->id_nombre."')";
                                   

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
				('abmProyecto/tablaProyecto', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
	
	}
	
	
	/*--------------------------Alta/modificación de Proyecto ---------------------------------*/
	public function executeFormularioProyecto (sfWebRequest $request)
	{
					
		$this->errors = array();
		$this->notices = array();
		//$fich_id = null;
		//$this->fich_cata_id =null;
		$this->alta = 1;


		$proy_id = $request->getParameter('proy_id');	//obtiene el id del proyecto del array $request

		// trae todos los datos relevantes para el armado de un proyecto
		

		 $sql = "GET_TEMP_PROYE()";
		 $this->c_numerador = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

 		 $sql = "GET_MEDIO_RS(null,'B')";
         $this->dd_medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TAMANIO_RS(null,'B')";
         $this->dd_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TIPOLOGIA_RS(null,'B')";
         $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_CAMP_PAISES_RS(null)" ;
         $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		/*----si recibe id es una modificación y se necesita rellenar los campos--*/
		
		if(!empty($proy_id))
		{
			$this->alta = 0;
			$sql = "GET_PROYECTO_RS(".$proy_id.")";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			$proy_id = $this->cursor[0]['proy_id'];


		}
		
		if($request->getMethod() == "POST")
		{

			/*--si es modificación obtiene los parámetros---*/

			$proy_id		= $request->getParameter("proy_id");
			$this->proy_nombre 	= $request->getParameter("proy_nombre");
			$this->proy_obser 	= $request->getParameter("proy_obser");
			$this->proy_inicio_f = $request->getParameter("proy_inicio_f");
			$this->proy_fin_estimado_f = $request->getParameter("proy_fin_estimado_f");
			$this->proy_pais_id = $request->getParameter("proy_pais_id");
			$this->proy_prov_id = $request->getParameter("p_id_provincia");
			$this->proy_loca_id = $request->getParameter("proy_loca_id");
			$this->proy_tama_id = $request->getParameter("proy_tama_id");
			$this->proy_medi_id= $request->getParameter("proy_medi_id");
			$this->proy_tipo_id = $request->getParameter("proy_tipo_id");
			$this->graba_ok 	= 1;	

			
		/*-----------Validacion de campos vacios y tipos de datos---------*/

            $sql = "AM_PROYECTO_RS('".$_SESSION['usuario']['username']."',
                                   '".$proy_id."',
                                   '".$this->proy_nombre."',
                                   '".$this->proy_obser."',
                                   '".$this->proy_inicio_f."',
								   '".$this->proy_fin_estimado_f."',
								   '".$this->proy_pais_id."',
								   '".$this->proy_prov_id."',
								   '".$this->proy_loca_id."',
   								   '".$this->proy_tama_id."',
                                   '".$this->proy_medi_id."',
								   '".$this->proy_tipo_id."',
								   @out_id);";
          


            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
            $resp_sp = $this->cursor[0]['respuesta'];
			
			$resp_sp_id = $this->cursor[0]['respuesta_id'];
			$proy_id= $resp_sp_id ;
					
			

			  //si hubo problemas, no graba
            if ($resp_sp != 'OK') {
                $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                $this->graba_ok = 0;
            }
 			
			  			            
        

           	/*-------Si hay algun error, no graba y continua en el ABM de un proyecto -----*/
			if ($this->graba_ok == 1) 
			{
				$this->redirect("abmProyecto/abmProyecto");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("abmProyecto/formularioProyecto?proy_id=".$proy_id);
				
			} 
			
		}//post
	}//end function formularioProyecto


	/*--- funcion para relacionar las provincias con los paises------------*/
	 public function executeComboSubprovin(sfWebRequest $request){
    

        $p_id_pais       = $request->getParameter('proy_pais_id');
        $this->codigoProvincia  = $request->getParameter('proy_prov_id'); // solo recuperar dato
        
        //$calu_id_provincia_pro  == 1; //$request->getParameter('calu_id_provincia_pro');
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$p_id_pais."',null)";
        $this->dd_provin = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		//print_r($this->dd_provin); die;

        return $this->renderPartial('abmProyecto/comboSubprovin', array('dd_provin' => $this->dd_provin, 'codigoProvincia' =>$this->codigoProvincia));
    } 



	/*-------------------------------ABuscar fichas relacionadas--------------------------------*/
	public function executeFichasRelacionadas(sfWebRequest $request) {
	
      	$this->proy_medi_id = $request->getParameter("proy_medi_id");
      	$this->proy_tama_id = $request->getParameter("proy_tama_id");
      	$this->proy_tipo_id = $request->getParameter("proy_tipo_id");
		$this->cursor_fichas_rel   = array();
		$this->total_paginas = 1;

		
    	$sql = "GET_PROYECTO_FICHAS_RELACIONADAS_RS('".$this->proy_medi_id."','".
					                                   $this->proy_tama_id."','".
					                                   $this->proy_tipo_id."')";
        
   

		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   		
   		$this->cursor_fichas_rel = $cursor;

   		//echo $sql;
   		//echo "<pre>"; print_r($this->cursor_fichas_rel);die;
   		if ($this->cursor_fichas_rel == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}
		
		if(empty($this->cursor_fichas_rel)){
			$this->cursor_fichas_rel = array(0);
		}

		return $this->renderPartial
				('abmProyecto/tablaFichasRel', array('cursor' =>$this->cursor_fichas_rel,
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


   		//echo $sql;
   		//echo "<pre>"; print_r($this->cursor_fichas_rel);die;
   		
		return $this->renderPartial
				('abmProyecto/fichaReducida', array('fich'=>$this->fich,
												  'proc'=>$this->proc,
												  'recu'=>$this->recu
												 ));
	
	}




	/*-------------------------------Baja de una Ficha--------------------------------*/
	public function executeBaja (sfWebRequest $request)
	{
			/*
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('fich_id') && $request->getMethod() == "GET")
            {
               $fich_id = $request->getParameter('fich_id');
                $sql = "B_FICHA_RS('".$_SESSION['usuario']['username']."',
                                       '".$fich_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("abmProyecto/abmProyecto");
            }
			*/

	}//end function Baja


}//end class

?>