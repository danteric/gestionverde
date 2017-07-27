<?php

class catalogosActions extends sfActions
{   
        protected $formulario = 'catalogos';
        /*
         * Redireccion a lista, como principal
         */
        public function executeIndex(sfWebRequest $request){
            $this->executeLista($request);
        }

        /*
         *  Lista de tipos de monedas
         */
        public function executeCatalogos(sfWebRequest $request)
        {
            /********************/
            $this->errors = array();
            $this->notices = array();
      
            $sql = "GET_CATALOGO_RS(null,'N')";
            $this->catalogos = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            
		#echo "<pre>";print_r($this->catalogos);die;  funcion para mostrar variables por pantalla para probar
	    #echo "<pre>";print_r($this->catalogos);die;
	    
           // $this->feriados = $this->catalogos;
            $this->filasPorPagina = $_SESSION['usuario']['filas_pag'];
        }
        
        /*
         * Formulario de tipos de monedas (alta/modificacion)
         */
	public function executeFormularioCatalogos(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors  = array();
            $this->notices = array();
            $this->cata_id = null;
            

            $cata_id = $request->getParameter('cata_id');
            
            /* Si recibe id es una modificacion y se necesitan rellenar los campos */
            if(!empty($cata_id)) 
            {
               //$this->acti_id   = $request->getParameter('acti_id');
               $this->cata_id = $request->getParameter('cata_id');

               $sql = "GET_CATALOGO_RS('".$this->cata_id."','N')";
               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               $this->cursor = $this->cursor[0];
               
               #echo "<pre>";print_r($this->cursor);die;
               $this->cata_id         = $this->cursor['cata_id'];
               $this->cata_deno       = $this->cursor['cata_deno'];
               $this->cata_deno_redu  = $this->cursor['cata_deno_redu'];
               

            }
            
            if($request->getMethod() == "POST")
            {
                $parametros = BackendServices::getInstance()->limpiarParametros($request->getPostParameters());
            

                $this->cata_id        = $request->getParameter("cata_id");
                $this->cata_deno      = $request->getParameter("cata_deno");
                $this->cata_deno_redu = $request->getParameter("cata_deno_redu");
   
                #Validacion de campos vacios y tipos de datos#
                $sql = "AM_CATALOGO_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->cata_id."',
                                       '".$this->cata_deno."',
                                       '".$this->cata_deno_redu."');";


                $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql); 
      //echo $sql;exit;
                $resp_sp = $this->cursor[0]['respuesta'];
                if ($resp_sp != 'OK') {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $resp_ok = $this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);
                }

                $this->redirect("catalogos/catalogos");
            }
	     }
                        
        /*-------------------------Baja del catálogo-------------------------*/
	     public function executeBaja(sfWebRequest $request)
        {   
            
            $this->errors = array();
            $this->notices = array();
            
          
            if($request->getParameter('cata_id') && $request->getMethod() == "GET")
            {
               $this->cata_id = $request->getParameter('cata_id');
               
                $sql = "B_CATALOGO_RS('".$_SESSION['usuario']['username']."',
                                       '".$this->cata_id."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
               #echo "<pre>";print_r($this->cursor);die;
               $this->redirect("catalogos/catalogos");
            }
	     }
}
