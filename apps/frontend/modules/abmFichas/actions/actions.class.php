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

			$fich_id = $request->getParameter('fich_id');

			/*----si recibe id es una modificación y se necesita rellenar los campos--*/
			
			if(!empty($fich_id))
			{
				$this->fich_id = $request->getParameter('fich_id');
				$sql = "GET_FICHA_RS('".$this->fich_id."')";
				$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				$this->cursor = $this->cursor[0];

				$this->fich_id = $this->cursor['fich_id'];
				$this->fich_deno = $this->cursor['fich_deno'];
				$this->fich_cata_id = $this->cursor['fich_cata_id'];
				$this->fich_tama_id = $this->cursor['fich_tama_id'];
				$this->fich_proc_id = $this->cursor['fich_proc_id'];
				$this->fich_recu_id = $this->cursor['fich_recu_id'];
				$this->fich_fuen_id = $this->cursor['fich_fuen_id'];
			}//end if


			/*--------------------Alta-------------------------------------*/
			/*
			if($request->getMethod() == "POST")
			{
				$parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());

				$this->fich_id = $request->getParameter("fich_id");
				$this->fich_deno = $request->getParameter("fich_deno");
				$this->fich_cata_id = $request->getParameter("fich_cata_id");
				$this->fich_tama_id = $request->getParameter("fich_tama_id");
				$this->fich_proc_id = $request->getParameter("fich_proc_id");
				$this->fich_recu_id = $request->getParameter("fich_recu_id");
				$this->fich_fuen_id = $request->getParameter("fich_fuen_id");
			}

			/*-----------Validacion de campos vacios y tipos de datos---------*/
             /*
                $sql = "AM_FICHA_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->fich_id."',
                                       '".$this->fich_deno."',
                                       '".$this->fich_cata_id."',
                                       '".$this->fich_tama_id."',
                                       '".$this->fich_proc_id."',
                                       '".$this->fich_recu_id."',
                                       '".$this->fich_fuen_id."');";

                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
     
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

			}//end if
			*/
			$this->redirect("abmFichas/abmFichas");
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