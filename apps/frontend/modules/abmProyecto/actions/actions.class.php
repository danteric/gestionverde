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

         //echo "<pre>"; print_r($this->c_numerador);

         $sql = "GET_TAMANIO_RS(null,'N')";
         $this->dd_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TIPOLOGIA_RS(null,'N')";
         $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


		/*----si recibe id es una modificación y se necesita rellenar los campos--*/
		
		if(!empty($proy_id))
		{
			$this->alta = 0;
			$sql = "GET_PROYECTO_RS(".$proy_id.")";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			$proy_id = $this->cursor[0]['proy_id'];

		}
		
		
		/*--------------------Alta-------------------------------------*/
		/*
		if($request->getMethod() == "POST")
		{

			/*--si es modificación obtiene los parámetros---*/
			/*
			$fich_id 		= $request->getParameter("fich_id");
			$this->fich_deno 	= $request->getParameter("fich_deno");
			$this->fich_desc 	= $request->getParameter("fich_desc");
			$this->fich_cata_id = $request->getParameter("fich_cata_id");
			$this->graba_ok 	= 1;	


			
		/*-----------Validacion de campos vacios y tipos de datos---------*/
			/*
            $sql = "AM_FICHA_RS('".$_SESSION['usuario']['username']."',
                                   '".$fich_id."',
                                   '".$this->fich_deno."',
                                   '".$this->fich_desc."',
                                   '".$this->fich_cata_id."',
								   @out_id);";
          
            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
            $resp_sp = $this->cursor[0]['respuesta'];
			$resp_sp_id = $this->cursor[0]['respuesta_id'];
			$fich_id= $resp_sp_id ;
					
	

			  //si hubo problemas, no graba
            if ($resp_sp != 'OK') {
                $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                $this->graba_ok = 0;
            }
 
			/*----------- si grabo ok sigo con las fases -----------*/
		     	/*
		 
            if ($this->graba_ok == 1) { 	


			    $this->anota_fase_f = $request->getParameter('anota_fase_f');
			    $this->listaAnota   = '';
				
				
			    // recorro items =========================================
			    foreach ($this->anota_fase_f as $value)
			      {
			         $this->listaAnota=$this->listaAnota.$value.',';
			      }

			    $sql = "AM_FICHA_FASES_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$fich_id."','"
			                                        .$this->listaAnota."')"; 
			


			    $this->cursor_fases = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

				 
			    
				
			    $resp_sp = $this->cursor_fases[0]['respuesta'];
			    $exito   = $this->cursor_fases[0]['respues_exito'];
			    if ($resp_sp != 'OK') 
			    {
			        $this->getUser()->setFlash('error', $this->cursor_fases[0]['respuesta']);
			        $this->graba_ok = 0;
			    }
   
			} 
			

            /*----------- si grabo ok sigo  con medios -----------*/
            /*
            if ($this->graba_ok == 1) 
            { 	

			    $this->anota_medi_f = $request->getParameter('anota_medi_f');
			    $this->listaAnota  = '';
			 	

			        // recorro items =========================================
			        foreach ($this->anota_medi_f as $value)
			           {
			           $this->listaAnota = $this->listaAnota.$value.',';
			        
			           }
					//print_r($_REQUEST);
					//echo $this->listaAnota ; exit;
				   		
			        //echo "<pre>"; print_r($this->listaAnota); exit;

			        $sql = "AM_FICHA_MEDIOS_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$fich_id."','"
			                                        .$this->listaAnota."')";      
			        
			    
			                	
			        $this->cursor_medios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

			     
					//echo $sql; print_r($_REQUEST) ; exit;
			        $resp_sp = $this->cursor_medios[0]['respuesta'];
			        $exito   = $this->cursor_medios[0]['respues_exito'];
			        
				 
				
			        if ($resp_sp != 'OK') 
			        {
			            $this->getUser()->setFlash('error', $this->cursor_medios[0]['respuesta']);
			            $this->graba_ok = 0;
			        }

   
			} 
			
			
			 /*----------- si grabo ok sigo  con tamaño -----------*/
            /*
		       if ($this->graba_ok == 1) 
            { 	

			    $this->anota_tama_f = $request->getParameter('anota_tama_f');
			    $this->listaAnota  = '';
			 	

			        // recorro items =========================================
			        foreach ($this->anota_tama_f as $value)
			           {
			           $this->listaAnota = $this->listaAnota.$value.',';
			        
			           }
					//print_r($_REQUEST);
					//echo $this->listaAnota ; exit;
				   		
			        //echo "<pre>"; print_r($this->listaAnota); exit;

			        $sql = "AM_FICHA_TAMANIOS_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$fich_id."','"
			                                        .$this->listaAnota."')";      
			        
			    
			                	
			        $this->cursor_tamanios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

			     
					//echo $sql; print_r($_REQUEST) ; exit;
			        $resp_sp = $this->cursor_tamanios[0]['respuesta'];
			        $exito   = $this->cursor_tamanios[0]['respues_exito'];
			        
				 
				
			        if ($resp_sp != 'OK') 
			        {
			            $this->getUser()->setFlash('error', $this->cursor_tamanios[0]['respuesta']);
			            $this->graba_ok = 0;
			        }

   
			} 
			 /*----------- si grabo ok sigo  con tipologia -----------*/
            /*
            if ($this->graba_ok == 1) 
            { 	

			    $this->anota_tipo_f = $request->getParameter('anota_tipo_f');
			    $this->listaAnota  = '';
			 	

			        // recorro items =========================================
			        foreach ($this->anota_tipo_f as $value)
			           {
			           $this->listaAnota = $this->listaAnota.$value.',';
			        
			           }


			        $sql = "AM_FICHA_TIPOLOGIAS_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$fich_id."','"
			                                        .$this->listaAnota."')";      
			        
			    
			                	
			        $this->cursor_tipologias = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

			     
					//echo $sql; print_r($_REQUEST) ; exit;
			        $resp_sp = $this->cursor_tipologias[0]['respuesta'];
			        $exito   = $this->cursor_tipologias[0]['respues_exito'];
			        
				 
				
			        if ($resp_sp != 'OK') 
			        {
			            $this->getUser()->setFlash('error', $this->cursor_tipologias[0]['respuesta']);
			            $this->graba_ok = 0;
			        }

   
			} 
			
			
			/*----------- si grabo ok sigo  con procedimientos ----------- */
			/*

            if ($this->graba_ok == 1) 
            {     	

			    $this->proc_id_f 	= $request->getParameter('proc_id_f');
			    $this->proc_text_f 	= $request->getParameter('proc_text_f');
			    $this->proc_borr_f 	= $request->getParameter('proc_borr_f');
			    $max = sizeof($this->proc_id_f); 
			
			    for( $ind = 1; $ind<=$max; $ind++ ) 
			    {
	
			        $sql = "AMB_FICHA_PROCEDIMIENTOS_RS('".$_SESSION["usuario"]["username"]."','"
			        								.$fich_id."','"
			                                        .$this->proc_id_f[$ind]."','"
			                                        .$this->proc_text_f[$ind]."','"
			                                        .$this->proc_borr_f[$ind]."')";   
			        

			        $this->cur_proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			  	};
         	};
         		
         	
		

			/*----------- si grabo ok sigo  con recursos ----------- */
/*		
			
            if ($this->graba_ok == 1)
             {   	


			    $this->recu_id_f 	= $request->getParameter('recu_id_f');
			    $this->recu_text_f 	= $request->getParameter('recu_text_f');
			    $this->recu_borr_f 	= $request->getParameter('recu_borr_f');
			    $max = sizeof($this->recu_id_f); 



			    for( $ind = 1; $ind<=$max; $ind++ ) 
			    {
	
			        $sql = "AMB_FICHA_RECURSOS_RS('".$_SESSION["usuario"]["username"]."','"
			        								.$fich_id."','"
			                                        .$this->recu_id_f[$ind]."','"
			                                        .$this->recu_text_f[$ind]."','"
			                                        .$this->recu_borr_f[$ind]."')";   
			                            
			        $this->cur_recurso = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         		};
         	};
         		

			/*----------- si grabo ok sigo  con fuentes ----------- */
 			/*
 			 if ($this->graba_ok == 1) 
 			 {     	

			    $this->fuen_id_f 	= $request->getParameter('fuen_id_f');
			    $this->fuen_text_f 	= $request->getParameter('fuen_text_f');
			    $this->fuen_borr_f 	= $request->getParameter('fuen_borr_f');
			    $max = sizeof($this->fuen_id_f); 

			

			    for( $ind = 1; $ind<=$max; $ind++ ) 
			    {
	
			        $sql = "AMB_FICHA_FUENTES_RS('".$_SESSION["usuario"]["username"]."','"
			        								.$fich_id."','"
			                                        .$this->fuen_id_f[$ind]."','"
			                                        .$this->fuen_text_f[$ind]."','"
			                                        .$this->fuen_borr_f[$ind]."')";   
			        
			        $this->cur_fuen = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			  
         		};
         	};
         		
          /*
			

			/*-------Si hay algun error, no graba y continua en el ABM de la ficha -----*/
			/*
			if ($this->graba_ok == 1) 
			{
				$this->redirect("abmProyecto/abmProyecto");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("abmProyecto/formularioProyecto?fich_id=".$fich_id);
				
			} 

		}//de post	
		*/
	}//end function formularioProyecto

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