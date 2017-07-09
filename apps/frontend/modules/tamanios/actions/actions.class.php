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

            $sql = "GET_TAMANIO_RS(null,'N')";
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
            $this->tama_id = null;
            
            //echo "<pre>";print_r($_REQUEST); die;

            $tama_id = $request->getParameter('tama_id');
            

            /* ---Si recibe id es una modificacion y se necesitan rellenar los campos ---*/
            if(!empty($tama_id)) //es una modificacion
            {
               $this->tama_id = $request->getParameter('tama_id');


               $sql = "GET_TAMANIO_RS('".$this->tama_id."','N')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               
               //echo "<pre>";print_r($this->cursor);die; 

               $this->cursor = $this->cursor[0];
               
               //echo "<pre>";print_r($this->cursor);die;  para verificar que trae los datos
               $this->tama_id         = $this->cursor['tama_id'];
               $this->tama_deno       = $this->cursor['tama_deno'];
               $this->tama_deno_redu  = $this->cursor['tama_deno_redu'];


            }
            
            /*----alta-----*/
            if($request->getMethod() == "POST")
            {

                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
              
                //echo "<pre>";print_r($_REQUEST); die;
      

                $this->tama_id        = $request->getParameter("tama_id");
                $this->tama_deno      = $request->getParameter("tama_deno");
                $this->tama_deno_redu = $request->getParameter("tama_deno_redu");
                
              
                /* Validacion de campos vacios y tipos de datos*/
                $sql = "AM_TAMANIO_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->tama_id."',
                                       '".$this->tama_deno."',
                                       '".$this->tama_deno_redu."');";



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
           
            if($request->getParameter('tama_id') && $request->getMethod() == "GET")
            {
               $this->tama_id = $request->getParameter('tama_id');
                $sql = "B_TAMANIO_RS('".$_SESSION['usuario']['username']."','".$this->tama_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->redirect("tamanios/tamanios");
            }//end if
        }//end function

}//end class
