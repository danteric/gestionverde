<?php  


class abmFichasActions extends sfActions
{
	protected $formulario = 'abmFichas';

	/*----------------------Redireccion a lista, como principal--------------------------*/
	public function executeIndex (sfWebRequest $request)
	{
		$this->executeLista($request);

	}

	/*----------------------------------Listar las Fichas ---------------------------------*/
	
	public function executeAbmFichas (sfWebRequest $request)
	{
		 $this->errors = array();
         $this->notices = array();

         $sql = "GET_CATALOGO_RS(null,'S')";
         $this->dd_cata = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
         $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];



	}

	/*------------------------filtro para buscar una ficha------------------------------*/
	public function executeTablaFichas(sfWebRequest $request) {
     // echo "<pre>"; print_r($_REQUEST); exit;
   		$this->cata_id   	= $request->getParameter("cata_id");
      	$this->id_nombre	= $request->getParameter("id_nombre");
     
		$this->cursor       = array();
		$this->total_paginas = 1;

    	$sql = "GET_ABM_FICHA_RS('".
                                  $_SESSION["usuario"]["username"]."','"
                                  .$this->cata_id."','0','0','0','0','NF','".                                 
                                   $this->id_nombre."')";
                                   



		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   
    	$this->cursor = $cursor;

		if ($cursor == NULL){
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}
		
		if(empty($this->cursor)){
			$this->cursor = array(0);
		}

		return $this->renderPartial
				('abmFichas/tablaFichas', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
	}
	
	
	/*--------------------------Alta/modificación de Fichas ---------------------------------*/
	public function executeFormularioFichas (sfWebRequest $request)
	{
			

		$this->errors = array();
		$this->notices = array();
		$fich_id = null;
		$this->fich_cata_id =null;
		$alta = 1;

		$fich_id = $request->getParameter('fich_id');	//obtiene el id de la ficha del array $request
	
		// trae todos los datos de la ficha
 		$sql = "GET_CATALOGO_RS(null,'V')";
        $this->dd_cata = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
 		$sql = "SEL_FASES_FICHA_RS('".$fich_id."')";
        $this->l_fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

 		$sql = "SEL_MEDIOS_FICHA_RS('".$fich_id."')";
        $this->l_medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
		$sql = "SEL_TAMANIO_FICHA_RS('".$fich_id."')";
        $this->l_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$sql = "SEL_TIPOLOGIA_FICHA_RS('".$fich_id."')";
        $this->l_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_PROCEDIMIENTOS_RS('".$fich_id."')";         
        $this->l_proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_RECURSOS_RS('".$fich_id."')";         
        $this->l_recur = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_FUENTES_RS('".$fich_id."')";         
        $this->l_fuen = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		/*----si recibe id es una modificación y se necesita rellenar los campos--*/
		

		if(!empty($fich_id))
		{
			$alta = 0;
			$sql = "GET_FICHA_RS(".$fich_id.")";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			$fich_cata_id = $this->cursor[0]['fich_cata_id'];

		}
		
		
		/*--------------------Alta-------------------------------------*/

		if($request->getMethod() == "POST")
		{

			/*--si es modificación obtiene los parámetros---*/
		
			$fich_id 		= $request->getParameter("fich_id");
			$this->fich_deno 	= $request->getParameter("fich_deno");
			$this->fich_desc 	= $request->getParameter("fich_desc");
			$this->fich_cata_id = $request->getParameter("fich_cata_id");
			$this->graba_ok 	= 1;	


			
		/*-----------Validacion de campos vacios y tipos de datos---------*/
			
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
                echo "falló solapa propiedades";die;
            }
 
			/*----------- si grabo ok sigo con las fases -----------*/
		     	
		 
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
			
			 	echo $sql; die;

			    $this->cursor_fases = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

				 
			    
				
			    $resp_sp = $this->cursor_fases[0]['respuesta'];
			    $exito   = $this->cursor_fases[0]['respues_exito'];
			    if ($resp_sp != 'OK') 
			    {
			        $this->getUser()->setFlash('error', $this->cursor_fases[0]['respuesta']);
			        $this->graba_ok = 0;
			        echo "falló solapa fases a";die;
			    }
   
			} 
			

            /*----------- si grabo ok sigo  con medios -----------*/
            
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
			             echo "falló solapa medios";die;
			        }

   
			} 
			
			
			 /*----------- si grabo ok sigo  con tamaño -----------*/
            
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
			             echo "falló solapa tamanios";die;
			        }

   
			} 
			 /*----------- si grabo ok sigo  con tipologia -----------*/
            
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
         		
          
			

			/*-------Si hay algun error, no graba y continua en el ABM de la ficha -----*/
			if ($this->graba_ok == 1) 
			{
				$this->redirect("abmFichas/abmFichas");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("abmFichas/formularioFichas?fich_id=".$fich_id);
				
			} 

		}//de post	

	}//end function formularioFichas

	/*-------------------------------Baja de una Ficha--------------------------------*/
	public function executeBaja (sfWebRequest $request)
	{
			
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('fich_id') && $request->getMethod() == "GET")
            {
               $fich_id = $request->getParameter('fich_id');
                $sql = "B_FICHA_RS('".$_SESSION['usuario']['username']."',
                                       '".$fich_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("abmFichas/abmFichas");
            }
			

	}//end function Baja


}//end class

?>