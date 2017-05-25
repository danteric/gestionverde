<?php

class tamaniosActions extends sfActions
{   
        protected $formulario = 'tamanios';
        
        /*----------------------Redireccion a lista, como principal--------------------------*/
        public function executeIndex(sfWebRequest $request){
            $this->executeLista($request);
        }




        /*----------------------------------Listar las Tamanios ---------------------------------*/
        public function executeTamanios(sfWebRequest $request)
        {
            /********************/
            $this->errors = array();
            $this->notices = array();

            $sql = "GET_TAMANIO_RS(null)";
            $this->tamanios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            
		        //echo "<pre>";print_r($this->tamanios);die;  funcion para mostrar variables por pantalla para probar
	 	               
            $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];
        }
        


        /*-----------------------------Alta o Modificación Tamanio---------------------------------*/
        public function executeFormularioTamanios(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors  = array();
            $this->notices = array();
            $this->tamanio_id = null;
            

            $tamanio_id = $request->getParameter('tamanio_id');
            
            /* ---Si recibe id es una modificacion y se necesitan rellenar los campos ---*/
            if(!empty($tamanio_id)) //es una modificacion
            {
               $this->tamanio_id = $request->getParameter('tamanio_id');

               $sql = "GET_TAMANIO_RS('".$this->tamanio_id."')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->cursor = $this->cursor[0];
               
               //echo "<pre>";print_r($this->cursor);die;  para verificar que trae los datos
               $this->tamanio_id         = $this->cursor['tamanio_id'];
               $this->tamanio_deno       = $this->cursor['tamanio_deno'];
               $this->tamanio_deno_redu  = $this->cursor['tamanio_deno_redu'];
            }
            
            /*----alta-----*/
            if($request->getMethod() == "POST")
            {
            
                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
             
                $this->tamanio_id        = $request->getParameter("tamanio_id");
                $this->tamanio_deno      = $request->getParameter("tamanio_deno");
                $this->tamanio_deno_redu = $request->getParameter("tamanio_deno_redu");
   
                /* Validacion de campos vacios y tipos de datos*/
                $sql = "AM_TAMANIO_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->tamanio_id."',
                                       '".$this->tamanio_deno."',
                                       '".$this->tamanio_deno_redu."');";

                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
      
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') 
                {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

                $this->redirect("tamanios/tamanios");
            }//end if
          }//end function
                        
        /*-----------------------------Baja de Tamanio---------------------------------*/
        public function executeBaja(sfWebRequest $request)
        {   
            
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('tamanio_id') && $request->getMethod() == "GET")
            {
               $this->tamanio_id = $request->getParameter('tamanio_id');
                $sql = "B_TAMANIO_RS('".$_SESSION['usuario']['username']."','".$this->tamanio_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("tamanios/tamanios");
            }//end if
        }//end function

}//end class
