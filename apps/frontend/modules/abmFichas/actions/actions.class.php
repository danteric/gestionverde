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
   		$this->id_ficha   	= $request->getParameter("id_ficha");
      	$this->id_nombre	= $request->getParameter("id_nombre");
     
		$this->cursor       = array();
		$this->total_paginas = 1;

    	$sql = "GET_ABM_FICHA_RS('".
                                  $_SESSION["usuario"]["username"]."', '".
                                  $this->id_ficha."','".
                                  $this->id_nombre."')";
                                  //echo $sql;exit;   


		$cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
	//echo "<pre>"; print_r($cursor); exit;
   
    	$this->cursor = $cursor;
  /*  	if(isset($this->cursor)){
			$this->total_paginas = $this->cursor[0]['total_paginas'];
		}
		if(isset($this->cursor)){
			$this->total_registros = $this->cursor[0]['total_registros'];
		}
*/     
		if ($cursor == NULL){
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}
		
		if(empty($this->cursor)){
			$this->cursor = array(0);
		}

    //echo "<pre>"; print_r($cursor); exit;
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
		$this->fich_id = null;
		$this->fich_cata_id =null;

		$fich_id = $request->getParameter('fich_id');	//obtiene el id de la ficha del array $request
	
		// trae todos los datos de la ficha
 		$sql = "GET_CATALOGO_RS(null,'N')";
        $this->dd_cata = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
 		$sql = "SEL_FASES_FICHA_RS('".$fich_id."')";
        $this->l_fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

 		$sql = "SEL_MEDIOS_FICHA_RS('".$fich_id."')";
        $this->l_medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_PROCEDIMIENTOS_RS('".$fich_id."')";         
        $this->l_proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		/*----si recibe id es una modificación y se necesita rellenar los campos--*/
		
		if(!empty($fich_id))
		{
			//$this->fich_id = $request->getParameter('fich_id');
			$sql = "GET_FICHA_RS(".$fich_id.")";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			$fich_cata_id = $this->cursor[0]['fich_cata_id'];

		}
		
		
		/*--------------------Alta-------------------------------------*/

		if($request->getMethod() == "POST")
		{


		
			$this->fich_id 		= $request->getParameter("fich_id");
			$this->fich_deno 	= $request->getParameter("fich_deno");
			$this->fich_desc 	= $request->getParameter("fich_desc");
			$this->fich_cata_id = $request->getParameter("fich_cata_id");
			$this->graba_ok 	= 1;	

			
		/*-----------Validacion de campos vacios y tipos de datos---------*/
			
            $sql = "AM_FICHA_RS('".$_SESSION['usuario']['username']."',
                                   '".$this->fich_id."',
                                   '".$this->fich_deno."',
                                   '".$this->fich_desc."',
                                   '".$this->fich_cata_id."');";

           
            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
            $resp_sp = $this->cursor[0]['respuesta'];
            
            //si hubo problemas, no graba
            if ($resp_sp != 'OK') {
                $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                $this->graba_ok = 0;	
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
			                                        .$this->fich_id."','"
			                                        .$this->listaAnota."')";                        
			    $this->cursor_fases = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			    $this->listaAnota   = '';
			     
				
			    $resp_sp = $this->cursor_fases[0]['respuesta'];
			    $exito   = $this->cursor_fases[0]['respues_exito'];
			    if ($resp_sp != 'OK') 
			    {
			        $this->getUser()->setFlash('error', $this->cursor_fases[0]['respuesta']);
			        $this->graba_ok = 0;
			    }
   
			} 
			

            /*----------- si grabo ok sigo  con medios -----------*/
            
            if ($this->graba_ok == 1) 
            { 	

			    $this->anota_medi_f = $request->getParameter('anota_medi_f');
			    $this->listaAnota   = '';
			 	

			        // recorro items =========================================
			        foreach ($this->anota_medi_f as $value)
			           {
			           $this->listaAnota = $this->listaAnota.$value.',';
			        
			           }
					//print_r($_REQUEST);
					//echo $this->listaAnota ; exit;
				   		
			        //echo "<pre>"; print_r($this->listaAnota); exit;

			        $sql = "AM_FICHA_MEDIOS_RS('".$_SESSION["usuario"]["username"]."','"
			                                        .$this->fich_id."','"
			                                        .$this->listaAnota."')";      
			        
			                         	
			        $this->cursor_medios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			        $this->listaAnota   = '';
			     
					//echo $sql; print_r($_REQUEST) ; exit;
			        $resp_sp = $this->cursor_medios[0]['respuesta'];
			        $exito   = $this->cursor_medios[0]['respues_exito'];
			        
			
			        if ($resp_sp != 'OK') 
			        {
			            $this->getUser()->setFlash('error', $this->cursor_medios[0]['respuesta']);
			            $this->graba_ok = 0;
			        }

   
			} 
			
			
			if ($this->graba_ok == 1) {
				$this->redirect("abmFichas/abmFichas");
			    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);			        
			}else{    // error vuelve al item editado
 				$this->redirect("abmFichas/formularioFichas?fich_id=".$this->fich_id);
				//echo ' ';formularioFichas/fich_id/4
			} 

		}//de post
			
			
	}//end function formularioFichas

	/*-------------------------------Baja de una Ficha--------------------------------*/
	public function executeBaja (sfWebRequest $request)
	{
			/*
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('fich_id') && $request->getMethod() == "GET")
            {
               $this->fich_id = $request->getParameter('fich_id');
                $sql = "B_FICHA_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->fich_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("abmFichas/abmFichas");
            }
			*/

	}//end function Baja


}//end class

?>