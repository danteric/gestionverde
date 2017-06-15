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
				('consultaFichas/tablaFichas', array('cursor' =>$this->cursor,
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
		
		$sql = "SEL_TAMANIO_FICHA_RS('".$fich_id."')";
        $this->l_tama = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$sql = "SEL_TIPOLOGIA_FICHA_RS('".$fich_id."')";
        $this->l_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

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
		
					
			
	}//end function formularioFichas

	/*-------------------------------Baja de una Ficha--------------------------------*/
	public function executeBaja (sfWebRequest $request)
	{
			
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('fich_id') && $request->getMethod() == "GET")
            {
               $this->fich_id = $request->getParameter('fich_id');
                $sql = "B_FICHA_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->fich_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("consultaFichas/consultaFichas");
            }
			

	}//end function Baja


}//end class

?>