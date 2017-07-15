<?php  


class consultaFichasActions extends sfActions
{
	protected $formulario = 'consultaFichas';

	/*----------------------Redireccion a lista, como principal--------------------------*/
	public function executeIndex (sfWebRequest $request)
	{
		$this->executeLista($request);

	}

	/*----------------------------------Listar las Fichas ---------------------------------*/
	
	public function executeConsultaFichas (sfWebRequest $request)
	{
		 $this->errors = array();
         $this->notices = array();

         $sql = "GET_CATALOGO_RS(null,'S')";
         $this->dd_cata = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_FASE_RS(null,'S')";
         $this->dd_fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_MEDIO_RS(null,'S')";
         $this->dd_medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TAMANIO_RS(null,'S')";
         $this->dd_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_TIPOLOGIA_RS(null,'S')";
         $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $sql = "GET_ABM_FICHA_OPCIONES_RS()";
         $this->dd_opciones = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

         $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];

	}

	/*------------------------filtro para buscar una ficha------------------------------*/
	public function executeConsultaTablaFichas(sfWebRequest $request) {
     // echo "<pre>"; print_r($_REQUEST); exit;
   		$this->cata_id   	= $request->getParameter("cata_id");
      	$this->fase_id	= $request->getParameter("fase_id");
     	$this->medi_id	= $request->getParameter("medi_id");
     	$this->tipo_id	= $request->getParameter("tipo_id");
     	$this->tama_id	= $request->getParameter("tama_id");
     	$this->opci_id	= $request->getParameter("opci_id");
     	$this->text_desc	= $request->getParameter("text_desc");



		$this->cursor       = array();
		$this->total_paginas = 1;

    	$sql = "GET_ABM_FICHA_RS('".
                                  $_SESSION["usuario"]["username"]."', '".
                                  $this->cata_id."','".
                                  $this->fase_id."','".
                                  $this->medi_id."','".
                                  $this->tipo_id."','".
                                  $this->tama_id."','".
                                  $this->opci_id."','".
								  $this->text_desc."')";



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

//echo "<pre>"; print_r($cursor); exit;
		return $this->renderPartial('consultaFichas/tablaConsultaFichas', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
	}
	
	
	


	/*--------------------------Detalle de una Ficha ---------------------------------*/
	public function executeDetalleFicha(sfWebRequest $request) {
	
	 //echo "<pre>"; print_r($_REQUEST); exit;
   		$id_ficha   	  = $request->getParameter("id_ficha");

		$this->fich       = array();
		$this->sindatos   = array();

    	$sql = "GET_FICHA_RS('".$id_ficha."')";
		$this->fich = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$sql = "SEL_FASES_FICHA_RS('".$id_ficha."')";
        $this->fase = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

 		$sql = "SEL_MEDIOS_FICHA_RS('".$id_ficha."')";
        $this->medi = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_TAMANIO_FICHA_RS('".$id_ficha."')";
        $this->tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$sql = "SEL_TIPOLOGIA_FICHA_RS('".$id_ficha."')";
        $this->tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

 		$sql = "GET_FICHA_PROCEDIMIENTOS_RS('".$id_ficha."')";
        $this->proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_RECURSOS_RS('".$id_ficha."')";         
        $this->recu = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_FICHA_FUENTES_RS('".$id_ficha."')";         
        $this->fuen = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

    //echo "<pre>"; echo $id_ficha, print_r($this->fase); exit;
		if ($fich == NULL){
        	$this->sindatos = '0';
		}else{
         	$this->sindatos = '1';
		}
	
		if(empty($this->fich)){
			$this->fich = array(0);
		}
    

    //print_r($this->$fich);exit;
//echo "<pre>"; print_r($cursor); exit;
		return $this->renderPartial('consultaFichas/detalleFicha', array('fich' =>$this->fich,
													'fase' =>$this->fase,
													'medi' =>$this->medi,
													'tama' =>$this->tama,
													'tipo' =>$this->tipo,
													'proc' =>$this->proc,
													'recu' =>$this->recu,
													'fuen' =>$this->fuen,
											     'sindatos' =>$this->sindatos)); 
		
	}
	

}//end class

?>