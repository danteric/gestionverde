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
         $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];

	}

	/*------------------------filtro para buscar una ficha------------------------------*/
	public function executeConsultaTablaFichas(sfWebRequest $request) {
     // echo "<pre>"; print_r($_REQUEST); exit;
   		$this->id_ficha   	= $request->getParameter("id_ficha");
      	$this->id_nombre	= $request->getParameter("id_nombre");
     
		$this->cursor       = array();
		$this->total_paginas = 1;

    	$sql = "GET_ABM_FICHA_RS('".
                                  $_SESSION["usuario"]["username"]."', '".
                                  $this->id_ficha."','".
                                  $this->id_nombre."')";

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

 		$sql = "GET_FICHA_PROCEDIMIENTOS_RS('".$id_ficha."')";
        $this->proc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

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
													'proc' =>$this->proc,
											     'sindatos' =>$this->sindatos)); 
		
	}
	

}//end class

?>