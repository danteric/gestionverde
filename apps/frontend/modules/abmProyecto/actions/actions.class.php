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
			$this->proy_domicilio = $request->getParameter("proy_domicilio");
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
								   '".$this->proy_domicilio."',
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


	/*----------------- funcion para relacionar las provincias con los paises-------------------*/
	 public function executeComboSubprovin(sfWebRequest $request){
    
        $p_id_pais       = $request->getParameter('proy_pais_id');
        $this->codigoProvincia  = $request->getParameter('proy_prov_id'); // solo recuperar dato
                
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$p_id_pais."',null)";
        $this->dd_provin = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
        return $this->renderPartial('abmProyecto/comboSubprovin', array('dd_provin' => $this->dd_provin, 'codigoProvincia' =>$this->codigoProvincia));
    } 



	/*-------------------------------Buscar fichas relacionadas--------------------------------*/
	public function executeFichasRelacionadas(sfWebRequest $request) {
	
      	$proy_id_rel = $request->getParameter("proy_id");
      	$medi_rel = $request->getParameter("medi_rel");
      	$tama_rel = $request->getParameter("tama_rel");
      	$tipo_rel = $request->getParameter("tipo_rel");
		$cursor_fichas_rel   = array();
		$total_paginas = 1;


    	$sql = "GET_PROYECTO_FICHAS_RELACIONADAS_RS('".$proy_id_rel."','".
    												   $medi_rel."','".
					                                   $tama_rel."','".
					                                   $tipo_rel."')";
        
		$cursor_rel = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   		$this->cursor_fichas_rel = $cursor_rel;

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

/*-------------------------------ABuscar fichas no relacionadas--------------------------------*/
public function executeFichasNoRelacionadas(sfWebRequest $request) {
	
      	$proy_id_rel = $request->getParameter("proy_id");
      	$medi_rel = $request->getParameter("medi_rel");
      	$tama_rel = $request->getParameter("tama_rel");
      	$tipo_rel = $request->getParameter("tipo_rel");
		$cursor_fichas_no_rel   = array();
		$total_paginas = 1;
         
        
        		
   		$sql = "GET_PROYECTO_FICHAS_NO_RELACIONADAS_RS('".$proy_id_rel."','".
   														  $medi_rel."','".
					                                      $tama_rel."','".
					                                      $tipo_rel."')";
	
	
		$cursor_no_rel = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
   		$this->cursor_fichas_no_rel = $cursor_no_rel;


   		if ($this->cursor_fichas_no_rel == NULL)
		{
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}


		
		if(empty($this->cursor_fichas_no_rel)){
			$this->cursor_fichas_no_rel = array(0);
		}


		return $this->renderPartial
				('abmProyecto/tablaFichasNoRel', array('cursor' =>$this->cursor_fichas_no_rel,
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


	/*-------------------------------Baja de las fichas del proyecto--------------------------------*/
	public function executeBorrarFichasProyecto (sfWebRequest $request)
	{
		$proy_id = $request->getParameter('proy_id');
		$this->sindatos = array();
		
		$sql = "B_PROYECTO_FICHAS_RS ('".$_SESSION['usuario']['username']."',
                                       '".$proy_id."')";   
		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		echo 'Borrado ant:',$cursor[0]['respuesta'];
		
		return $this->renderPartial
				('abmProyecto/tablaBorrados', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos));

	}

	/*-------------------------------Baja de una Ficha--------------------------------*/
	public function executeBaja (sfWebRequest $request)
	{
			
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('proy_id') && $request->getMethod() == "GET")
            {
               $del_proy_id = $request->getParameter('proy_id');
                $sql = "B_PROYECTO_RS('".$_SESSION['usuario']['username']."',
                                       '".$del_proy_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("abmProyecto/abmProyecto");
            }
			

	}//end function Baja


}//end class

?>