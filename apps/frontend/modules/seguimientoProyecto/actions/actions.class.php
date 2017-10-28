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



         $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];



	}

	/*------------------------filtro para buscar un proyecto------------------------------*/
	public function executeTablaSeguimientoProyecto(sfWebRequest $request) {
	
        $this->nombre_proyecto	= $request->getParameter("id_nombre");
      	$this->estado	= $request->getParameter("id_estado");
      	$this->fecha_desde	= $request->getParameter("id_fecha");
		$this->cursor       = array();
		$this->total_paginas = 1;


    	$sql = "GET_ABM_PROYECTO_RS('".$_SESSION["usuario"]["username"]."','".
    							   $this->estado."','".
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
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
	
	}
	
	
	/*--------------------------Alta/modificación de Proyecto ---------------------------------*/
	public function executeFormularioSeguiProyecto (sfWebRequest $request)
	{
					
		$this->errors = array();
		$this->notices = array();

		$this->alta = 1;


		$proy_id = $request->getParameter('proy_id');	//obtiene el id del proyecto del array $request

		// trae todos los datos relevantes para el armado de un proyecto
		


 		 $sql = "GET_MEDIO_RS(null,'')";
         $this->dd_medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TAMANIO_RS(null,'')";
         $this->dd_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TIPOLOGIA_RS(null,'')";
         $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_CAMP_PAISES_RS(null)" ;
         $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		//----si recibe id es una modificación y se necesita rellenar los campos--
		
		if(!empty($proy_id))
		{
			$this->alta = 0;	
			$sql = "GET_PROYECTO_RS(".$proy_id.")";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

			$sql_2 = "GET_PROYECTO_FICHA_ADHOC_RS(".$proy_id.")";
			$this->cursor_fich_adhoc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql_2);

			$proy_id = $this->cursor[0]['proy_id'];
		}



		// -------------------------------grabar-----------------------------
		if($request->getMethod() == "POST")
		{


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


		//-----------Validacion de campos vacios y tipos de datos---------

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
          
			//echo "<pre>"; print_r($_REQUEST);die;
			//echo ($sql);die;


            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
            $resp_sp = $this->cursor[0]['respuesta'];
			
			$resp_sp_id = $this->cursor[0]['respuesta_id'];
			$proy_id= $resp_sp_id ;
					
			

			  //si hubo problemas, no graba
            if ($resp_sp != 'OK') {
                $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                $this->graba_ok = 0;
            }
 			


			//----------- adjunto las fichas al proyecto-----------
			
            if ($this->graba_ok == 1) { 	

				// lista de fichas relacionadas y no relacionadas
			    $this->anota_fich_rel_f = $request->getParameter('anota_fich_rel_f');
			    $this->anota_fich_no_rel_f = $request->getParameter('anota_fich_no_rel_f');
			    $this->listaAnota   = '';
								
			    // recorro items 
			    foreach ($this->anota_fich_rel_f as $value)
			      {
			         $this->listaAnota=$this->listaAnota.$value.',';
			      }

				 		
			    // recorro items 
			    foreach ($this->anota_fich_no_rel_f as $value)
			      {
			         $this->listaAnota=$this->listaAnota.$value.',';
			      }

			
			    $sql = "AM_PROYECTO_FICHA_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$proy_id."','"
			                                        .$this->listaAnota."')"; 
			
			          


			    $this->cursor_fichas = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

				 
			    
				
			    $resp_sp = $this->cursor_fichas[0]['respuesta'];
			    $exito   = $this->cursor_fichas[0]['respues_exito'];
			    if ($resp_sp != 'OK') 
			    {
			        $this->getUser()->setFlash('error', $this->cursor_fichas[0]['respuesta']);
			        $this->graba_ok = 0;
			    }
   
			} 	            
        		

			//----------- adjunto la ficha adhoc al proyecto-----------
			
            if ($this->graba_ok == 1) { 	

            $this->pfad_nombre = $request->getParameter("pfad_nombre");
			$this->pfad_proce = $request->getParameter("pfad_proce");
			$this->pfad_recurso = $request->getParameter("pfad_recurso");


            $sql = "AM_PROYECTO_FICHA_AD_HOC_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$proy_id."','"
			                                        .$this->pfad_nombre."','"
			                                        .$this->pfad_proce."','"
			                                        .$this->pfad_recurso."')"; 
			
			 
			 $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


             $resp_sp = $this->cursor[0]['respuesta'];
			 $exito   = $this->cursor[0]['respues_exito'];
			    if ($resp_sp != 'OK') 
			    {
			        $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
			        $this->graba_ok = 0;
			    }
   
			} 	  



           	//-------Si hay algun error, no graba y continua en el ABM de un proyecto -----
			if ($this->graba_ok == 1) 
			{
				$this->redirect("abmProyecto/abmProyecto");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("abmProyecto/formularioProyecto?proy_id=".$proy_id);
				
			} 
			
		}//post
		
	}//end function formularioProyecto


	
/*-------------------------------ABuscar fichas relacionadas--------------------------------*/
	/*
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


	/*-------------------------------Baja de las fichas del proyecto--------------------------------*/
	/*
	public function executeBorrarFichasProyecto (sfWebRequest $request)
	{
		$proy_id = $request->getParameter('proy_id');
		$this->sindatos = array();
		
		$sql = "B_PROYECTO_FICHAS_RS ('".$_SESSION['usuario']['username']."',
                                       '".$proy_id."')";

        echo $sql ;die;
       $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);  

       return $this->renderPartial('abmProyecto/borrarFichasProyecto',array('sindatos' =>$this->sindatos));

	}

	/*-------------------------------Baja de una Ficha--------------------------------*/


}//end class

?>