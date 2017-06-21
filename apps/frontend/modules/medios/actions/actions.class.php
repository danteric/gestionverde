<?php

class mediosActions extends sfActions
{   
        protected $formulario = 'medios';
        
        /*----------------------Redireccion a lista, como principal--------------------------*/
        public function executeIndex(sfWebRequest $request){
            $this->executeLista($request);
        }

        /*----------------------------------Listar las Tamanios ---------------------------------*/
        public function executeMedios(sfWebRequest $request)
        {
            /********************/
            $this->errors = array();
            $this->notices = array();

            $sql = "GET_MEDIO_RS(null,'N')";
            $this->medios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            	 	               
            $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];
        }
        


        /*-----------------------------Alta o Modificación Tamanio---------------------------------*/
        public function executeFormularioMedios(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors  = array();
            $this->notices = array();
            $this->medio_id = null;
            

            $medio_id = $request->getParameter('medio_id');
            
            /* ---Si recibe id es una modificacion y se necesitan rellenar los campos ---*/
            if(!empty($medio_id)) //es una modificacion
            {
               $this->medio_id = $request->getParameter('medio_id');

               $sql = "GET_MEDIO_RS('".$this->medio_id."')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->cursor = $this->cursor[0];
               
               //echo "<pre>";print_r($this->cursor);die;  para verificar que trae los datos
               $this->medio_id         = $this->cursor['medio_id'];
               $this->medio_deno       = $this->cursor['medio_deno'];
               $this->medio_deno_redu  = $this->cursor['medio_deno_redu'];
            }
            
            /*----alta-----*/
            if($request->getMethod() == "POST")
            {
            
                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
             
                $this->medio_id        = $request->getParameter("medio_id");
                $this->medio_deno      = $request->getParameter("medio_deno");
                $this->medio_deno_redu = $request->getParameter("medio_deno_redu");
   
                /* Validacion de campos vacios y tipos de datos*/
                $sql = "AM_MEDIO_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->medio_id."',
                                       '".$this->medio_deno."',
                                       '".$this->medio_deno_redu."');";

                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
      
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') 
                {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

                $this->redirect("medios/medios");
            }//end if
          }//end function
                        
        /*-----------------------------Baja de Tamanio---------------------------------*/
        public function executeBaja(sfWebRequest $request)
        {   
            
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('medio_id') && $request->getMethod() == "GET")
            {
               $this->medio_id = $request->getParameter('medio_id');
                $sql = "B_MEDIO_RS('".$_SESSION['usuario']['username']."','".$this->medio_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("medios/medios");
            }//end if
        }//end function

}//end class
