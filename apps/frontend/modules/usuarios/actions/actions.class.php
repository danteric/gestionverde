<?php

/**
 * usuarios actions.
 *
 * @package    gcbaFrontend
 * @subpackage usuarios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuariosActions extends sfActions
{
	protected $formulario = 'usuario';
	
	public function executeLista(sfWebRequest $request)
	{
            
            //$pagina = (!empty($request->getParameter('pagina'))?$request->getParameter('pagina'):1);
            $pagina = 0;
            
            $sql = "USU_SEL_ADMIN_USUARIOS_RS()";
            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            #echo "<pre>";print_r($this->cursor);die;
            
            $a = $request->getParameter('a');
            $usuario = $request->getParameter('usuario');
            
            if(isset($usuario) && !empty($usuario)){
                if($_SESSION["usuario"]["modi"] == "S"){
                    if($a == 'res'){
                        $sql = "USU_ABM_USUARIO_PWD_RS('".$_SESSION["usuario"]["username"]."',
                                                       '".$usuario."',
                                                       'R',
                                                       '',
                                                       '',
                                                       '');";

                        $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                        if($response){
                             $this->getUser()->setFlash('notice', 'Reseteo con exito');
                        }else{
                             $this->getUser()->setFlash('error', 'Hubo un error al tratar de reiniciar la password, intentelo nuevamente en unos minutos');
                        }
                    }else{ //es una baja de usuaro
                         $sql = "USU_ABM_USUARIOS_RS('B',
                                                '".$_SESSION["usuario"]["username"]."',
                                                '".$usuario."',
                                                '".$parametros['nota']."',
                                                '".$parametros['cliente']."',
                                                '".$parametros['legajo']."');";
                         
                         $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                         if($response){  
                             $this->getUser()->setFlash('notice', 'Usuario '.$usuario.' dado de baja con exito');
                         }else{
                             $this->getUser()->setFlash('error', 'Hubo un error al tratar de dar de baja al usuario '.$usuario.', intentelo nuevamente en unos minutos');
                         }
                         #echo "<pre>";var_dump($response);die;
                    }
                }else{
                    $this->redirect("errores/forbidden");
                }
            }
            
            
            $this->filasPorPagina = 10;
            //$this->getUser()->setFlash('notice', $this->cursor[0]['RESPUES_EXITO']);
            //$this->redirect("usuarios/opciones");
	}


        public function executeFormulario(sfWebRequest $request)
        {
            //$bservice = new BackendServices();
            $this->errors = array();
            $this->notices = array();
            $this->alta = 1; //es un alta por defecto
            $this->id = null;
            
//            $sql = "SEL_CLIENTES_RS()";
//            $this->clientes = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            #echo "<pre>";print_r($this->clientes);die;
            $sql = "USU_ROLES_DEFINIDOS_RS('GAMSI')";
            $this->roles = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
            $id = $request->getParameter('id');

            if(!empty($id)) #es una modificacion
            {
               $this->alta = 0;
               $this->username = $request->getParameter('id');
               $sql = "USU_GET_USUARIOS_RS('".$this->username."')";

               $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
   
               $this->cursor = $this->cursor[0];
               #echo "<pre>";print_r($this->cursor);die;
               $this->rolesasignados = (!empty($this->cursor['lista_roles']))?explode(',',$this->cursor['lista_roles']):'';
               $this->cliente_seleccionado = $this->cursor['usua_clie_id'];
               #die($this->cliente_seleccionado);
               $this->perm_pdf   = $this->cursor['perm_pdf'];
               $this->perm_excel = $this->cursor['perm_excel'];
               $this->perm_pdf   = $this->cursor['perm_modi'];

               #echo "<pre>";print_r($this->cursor);die;
            }else if($request->getMethod() != "POST"){ #cuando es un nuevo registro, busco solo la metadata
                //die("No selecciono ningun usuario");
            }
            
            //-------------//
            $ac = 'A';
            if($request->getParameter('edicion') == 1) {
                  $ac = 'M';
            }
    
            //-------------//
            if($request->getMethod() == "POST")
            {
                 //die($ac);
                $parametros = $request->getPostParameters();
                #echo "<pre>";print_r($parametros);die;
                $roles_asignados = $parametros['roles'];
                #if($parametros['alta'] == 0){ #es una modificacion
                $sql = "USU_ABM_USUARIOS_RS('".$ac."',
                                            '".$_SESSION["usuario"]["empresa"]."',
                                            '".$_SESSION["usuario"]["username"]."',
                                            '".$parametros['usuario']."',
                                            '".$parametros['nota']."')";
        //echo $sql;exit;
                $this->altauser = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                
                #var_dump($this->altauser);die;
                /********************grabar roles*********************/
                $roles = array();
                foreach($this->roles as $r){
                    $roles[] = $r['usro_rol'];
                }

                foreach($roles as $rol){
                    if(in_array($rol, $roles_asignados)){
                        $sql = "USU_ABM_ROLES_USUARIO_RS('".$_SESSION["usuario"]["username"]."',
                                                         '".$parametros['usuario']."',
                                                         '".$rol."',
                                                         'S');";
                    }else{
                        $sql = "USU_ABM_ROLES_USUARIO_RS('".$_SESSION["usuario"]["username"]."',
                                                         '".$parametros['usuario']."',
                                                         '".$rol."',
                                                         'N');";
                    }
                    $this->altaroles = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                    #echo "<hr/>";
                }
                /*********************************************/
                #}
                
                $this->mensajeExito = "Registro modificado exitosamente";
                $this->getUser()->setFlash('notice', $this->mensajeExito);
                $this->redirect("usuarios/lista");
                /* Seteo las variables para que no se resetee el formulario */
                $this->id = $parametros['id'];
            }
	}
        
	public function executeValidaFormUsuario(sfWebRequest $request) {
		$errors = array();
		if($request->getMethod() == "POST") {
			$this->nombre = $request->getParameter('usuario');
			$this->nota = $request->getParameter('notas');

			$sql = "USU_ABM_USUARIOS_RS('V','".$_SESSION["usuario"]["username"]."',
																			'".$this->nombre."',
																			'".$this->nota."')";

			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			$errors = Helper::getInstance()->validarRespuesta($this->cursor[0]['respuesta']);
		}

		if(count($errors) == 0) {
			return $this->renderPartial('services/validationPassed');
		}
		return $this->renderPartial('services/validationErrors', array("errors" => $errors));
	}
        
	public function executeLogs(sfWebRequest $request)
	{
        $this->errors = array();
        $this->notices = array();
        $this->cursor = array(0);
        $this->fecha = "";
        $this->usuario = "";
        $this->opciones = "";
        $this->filtro_opciones= "";

        $sql = "USU_LISTA_USUARIOS_RS('','S');";
        $this->usuarios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        #echo "<pre>";print_r($this->usuarios);die;
        $sql = "USU_ACCESOS_LOG_LISTA_OPCIO_RS();";
        $this->opciones = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        #echo "<pre>";print_r($this->opciones);die;
    }

	public function executeTablaLog(sfWebRequest $request){
	    $this->errors = array();
        $this->notices = array();
            
	    $this->total_paginas = 0;
	    $this->total_paginas = 0;
	    $this->total_registros = 0;

        $this->fecha           = $request->getParameter("fecha");
	    $this->usuario         = $request->getParameter("usuarios");
        $this->filtro_opciones = $request->getParameter("filtro_opciones");             
	    $this->pagina          = $request->getParameter('pagina');
	    $this->cursor          = array();

	    if(empty($this->pagina)){
	      $this->pagina = "1";
	    }
        if(empty($this->fecha)){
            $this->fecha = date('Y-m-d');
        }

//print_r($_REQUEST);

        #die($this->fecha);
        $sql = "USU_ACCESOS_LOG_RP('".$_SESSION["usuario"]["username"]."',
                                   '".$this->usuario."', 
                                   '".$this->filtro_opciones."', 
                                   '".$this->fecha."',
                                   '".$this->pagina."');";

        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo "<pre>";print_r($this->cursor);exit;
        if(isset($this->cursor[0])){
                $this->total_paginas = $this->cursor[0]['total_paginas'];
                $this->total_registros = $this->cursor[0]['total_registros'];
        }else{
                $this->total_paginas = 0;
                $this->total_registros = 0;
        }
        
        return $this->renderPartial('usuarios/tablaLog', 
                                array('items' =>$this->cursor,
                                    'total_paginas' => $this->total_paginas,
                                    'total_registros' =>$this->total_registros,
                                    'pagina' => $this->pagina));
    }


    public function executeIncidentesBD(sfWebRequest $request)
    {
        $this->errors   = array();
        $this->notices  = array();
        $this->cursor   = array(0);
        $this->fecha    = "";
        $this->usuario  = "";
        $this->opciones = "";
        $this->log_inciden = $_SESSION["usuario"]["log_inciden"];
         
    }

    public function executeTablaIncidentes(sfWebRequest $request){
        $this->errors = array();
        $this->notices = array();
            
        $this->total_paginas = 0;
        $this->total_paginas = 0;
        $this->total_registros = 0;
            
        $this->fecha        = $request->getParameter("fecha");
        $this->error_test   = $request->getParameter("error_test");
        $this->pagina       = $request->getParameter('pagina');
        $this->cursor       = array();
//print_r($_REQUEST);
        $sql = "USU_INCIDENTES_LOG_RP('".$_SESSION["usuario"]["username"]."',
                                       '".$this->fecha."',
                                       '".$this->error_test."',
                                       '".$this->pagina."');";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo "<pre>";print_r($this->cursor);exit;

        if(isset($this->cursor[0])){
                $this->total_paginas = $this->cursor[0]['total_paginas'];
                $this->total_registros = $this->cursor[0]['total_registros'];
        }else{
                $this->total_paginas = 0;
                $this->total_registros = 0;
        }
        
        return $this->renderPartial('usuarios/tablaIncidentes', 
                                    array('items' =>$this->cursor,
                                    'total_paginas' => $this->total_paginas,
                                    'total_registros' =>$this->total_registros,
                                    'pagina' => $this->pagina));
        }
 
    public function executeSeguimientoActivar(sfWebRequest $request){

        //print_r($_REQUEST);
        $this->si_no        = $request->getParameter("si_no");
        $this->cursor       = array();

        $sql = "USU_SET_PARAMETROS_RS(1,'LOG_BBDD_ACTIVO',0,'".$this->si_no."',null)" ;
        $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $_SESSION["usuario"]["log_inciden"] = $this->si_no;

        $this->redirect("/");

    }
 

}
