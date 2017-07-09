<?php

class fasesActions extends sfActions
{   
        protected $formulario = 'fases';
        
        /*----------------------Redireccion a lista, como principal--------------------------*/
        public function executeIndex(sfWebRequest $request){
            $this->executeLista($request);
        }




        /*----------------------------------Listar las Fases ---------------------------------*/
        public function executeFases(sfWebRequest $request)
        {
            /********************/
            $this->errors = array();
            $this->notices = array();

            $sql = "GET_FASE_RS(null,'N')";
            $this->fases = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            
		        //echo "<pre>";print_r($this->fases);die;  funcion para mostrar variables por pantalla para probar
	 	               
            $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];
        }
        


        /*-----------------------------Alta o Modificación Fase---------------------------------*/
        public function executeFormularioFases(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors  = array();
            $this->notices = array();
            $this->fase_id = null;
            

            $fase_id = $request->getParameter('fase_id');
            
            /* ---Si recibe id es una modificacion y se necesitan rellenar los campos ---*/
            if(!empty($fase_id)) //es una modificacion
            {
               $this->fase_id = $request->getParameter('fase_id');

               $sql = "GET_FASE_RS('".$this->fase_id."','N')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->cursor = $this->cursor[0];
               
               //echo "<pre>";print_r($this->cursor);die;  para verificar que trae los datos
               $this->fase_id         = $this->cursor['fase_id'];
               $this->fase_deno       = $this->cursor['fase_deno'];
               $this->fase_deno_redu  = $this->cursor['fase_deno_redu'];
            }
            
            /*----alta-----*/
            if($request->getMethod() == "POST")
            {
            
                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
             
                $this->fase_id        = $request->getParameter("fase_id");
                $this->fase_deno      = $request->getParameter("fase_deno");
                $this->fase_deno_redu = $request->getParameter("fase_deno_redu");
   
                /* Validacion de campos vacios y tipos de datos*/
                $sql = "AM_FASE_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->fase_id."',
                                       '".$this->fase_deno."',
                                       '".$this->fase_deno_redu."');";

                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
      
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') 
                {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

                $this->redirect("fases/fases");
            }//end if
          }//end function
                        
        /*-----------------------------Baja de Fase---------------------------------*/
        public function executeBaja(sfWebRequest $request)
        {   
            
            $this->errors = array();
            $this->notices = array();
           
            if($request->getParameter('fase_id') && $request->getMethod() == "GET")
            {
               $this->fase_id = $request->getParameter('fase_id');
                $sql = "B_FASE_RS('".$_SESSION['usuario']['username']."','".$this->fase_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("fases/fases");
            }//end if
        }//end function

}//end class
