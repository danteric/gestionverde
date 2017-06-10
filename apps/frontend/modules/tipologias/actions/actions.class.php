<?php

class tipologiasActions extends sfActions
{   
        protected $formulario = 'tipologias';
        
        /*----------------------Redireccion a lista, como principal--------------------------*/
        public function executeIndex(sfWebRequest $request){
            $this->executeLista($request);
        }




        /*----------------------------------Listar las Tipologias ---------------------------------*/
        public function executeTipologias(sfWebRequest $request)
        {
            /********************/
            $this->errors = array();
            $this->notices = array();

            $sql = "GET_TIPOLOGIA_RS(null)";
            $this->tipologias = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            
		        //echo "<pre>";print_r($this->tipologias);die;  funcion para mostrar variables por pantalla para probar
	 	               
            $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];
        }
        


        /*-----------------------------Alta o Modificación Tipologia---------------------------------*/
        public function executeFormularioTipologias(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors  = array();
            $this->notices = array();
            $this->tipo_id = null;
            

            $tipo_id = $request->getParameter('tipo_id');
            
            /* ---Si recibe id es una modificacion y se necesitan rellenar los campos ---*/
            if(!empty($tipo_id)) //es una modificacion
            {
               $this->tipo_id = $request->getParameter('tipo_id');

               $sql = "GET_TIPOLOGIA_RS('".$this->tipo_id."')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->cursor = $this->cursor[0];
               
               //echo "<pre>";print_r($this->cursor);die;  
               $this->tipo_id         = $this->cursor['tipo_id'];
               $this->tipo_deno       = $this->cursor['tipo_deno'];
               $this->tipo_deno_redu  = $this->cursor['tipo_deno_redu'];
            }
            
            /*----alta-----*/
            
			
			 if($request->getMethod() == "POST")
            {
				 
                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
				// echo "<pre>";print_r($_REQUEST);die;  
                $this->tipo_id        = $request->getParameter("tipo_id");
                $this->tipo_deno      = $request->getParameter("tipo_deno");
                $this->tipo_deno_redu = $request->getParameter("tipo_deno_redu");
				 
				
                /* Validacion de campos vacios y tipos de datos*/
                $sql = "AM_TIPOLOGIA_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->tipo_id."',
                                       '".$this->tipo_deno."',
                                       '".$this->tipo_deno_redu."');";
				
		

                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
      
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') 
                {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

                $this->redirect("tipologias/tipologias");
            }//end if
          }//end function
                        
        /*-----------------------------Baja de Tipologia---------------------------------*/
        public function executeBaja(sfWebRequest $request)
        {   
            
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('tipo_id') && $request->getMethod() == "GET")
            {
               $this->tipo_id = $request->getParameter('tipo_id');
                $sql = "B_TIPOLOGIA_RS('".$_SESSION['usuario']['username']."','".$this->tipo_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("tipologias/tipologias");
            }//end if
        }//end function

}//end class
