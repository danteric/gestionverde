<?php

/**
 * roles actions.
 *
 * @package    gcbaFrontend
 * @subpackage roles
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rolesActions extends sfActions
{

	public function executeRoles(sfWebRequest $request){
		$this->errors = array();
		$this->notices = array();
		$this->usuario = "GAMSI";

		$sql = "USU_ROLES_DEFINIDOS_RS('".$this->usuario."');";
		$this->roles = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		#echo "<pre>";print_r($this->roles);exit;
                
		//limite a mostrar por pantalla cantidad de registros
                $sql = "USU_USUARIO_RS('".$_SESSION["usuario"]["username"]."');";
                $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                #echo "<pre>";print_r($cursor);exit;
                $this->filasPorPagina = 20;
                
	}

	public function executeBorrar(sfWebRequest $request){
		$usr_rol = $request->getParameter('usr_rol');
		echo $sql = "USU_ABM_ROLES_RS('B',
                                         '".$_SESSION["usuario"]["username"]."',
                                         '" . $usr_rol . "',
                                         '',
                                         '',
                                         '',
                                         '',
                                         '');";
                
		$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		#echo "<pre>";print_r($this->cursor);die;
                $this->redirect("roles/roles");
	}
        
	public function executeFormularioRoles(sfWebRequest $request){
		$this->errors  = array();
		$this->notices = array();
		$this->usr_rol = $request->getParameter('usr_rol');
		$this->notas   = "";
		$this->pdf     = "";
		$this->excel   = "";
		$this->html    = "";
		$this->modif   = "";
		$this->alta    = 1;

		if(isset($this->usr_rol) && !empty($this->usr_rol)) {
			$this->alta = 0;
			$sql = "USU_ROL_RS('".$this->usr_rol."');";
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
			#echo "<pre>";print_r($this->cursor);die;
			$row = $this->cursor[0];
			$this->notas = $row['usro_observaciones'];
			$this->pdf   = $row['usro_perm_pdf'];
			$this->excel = $row['usro_perm_excel'];
			$this->html  = $row['usro_perm_html'];
			$this->modif = $row['usro_perm_modi'];
		}

//echo "<pre>"; print_r($this->cursor);exit;

                
		$sql = "USU_LISTA_ROL_ARMADO_RS('GAMSI','".$this->usr_rol."');";
		$this->roles = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		#echo $sql; echo "<pre>"; print_r($this->roles);exit;
		if($request->getMethod() == "POST"){
				if($_SESSION["usuario"]["modi"] != "S"){
                                	$this->redirect("errores/forbidden");
                                }
				$this->menurol = $request->getParameter("menurol");
				$this->notas   = $request->getParameter('notas');
				$this->pdf     = $request->getParameter("pdf");
				$this->excel   = $request->getParameter("excel");
				$this->modif   = $request->getParameter("modif");
                                $this->html    = 'S'; //$request->getParameter("html");
				$alta = $request->getParameter('alta');
                                
				if(!empty($alta)){
					$this->usr_rol = $request->getParameter('usr_rol_str');
					$sql = "USU_ABM_ROLES_RS('A',
								 '".$_SESSION["usuario"]["username"]."',
								 '".$this->usr_rol."',
								 '".$this->notas."',
								 '".$this->pdf."',
								 '".$this->excel."',
								 '".$this->html."',
								 '".$this->modif."');";

					$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				}else{
					$this->usr_rol = $request->getParameter('usr_rol');
					$sql = "USU_ABM_ROLES_RS('M', 
                                                                '".$_SESSION["usuario"]["username"]."',
                                                                '".$this->usr_rol."',
                                                                '".$this->notas."',
                                                                '".$this->pdf."',
                                                                '".$this->excel."',
                                                                '".$this->html."',
                                                                '".$this->modif."');";
					$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                                        #echo "<pre>";print_r($this->cursor);die;
				}
                                
                                #echo "<pre>";print_r($this->menurol);die;
                                #echo "<pre>";
				foreach($this->menurol as $rol){
					 $sql = "USU_ABM_ROLES_ARMADO_RS('".$_SESSION["usuario"]["username"]."',
                                                                        'GAMSI',
                                                                        '" . $this->usr_rol . "',
                                                                        '".$rol["item"]."',
                                                                        '".$rol["item_hab"]."');";
					$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                                       # print_r($this->cursor);echo "<hr/>";
				}
				#exit;
				$this->redirect("roles/roles");
		}
	}

        /**
         * Convierte el value de un checkbox a true or false
         *
         * @param type $param
         * @return string
         */
        public function convertirCheckBox($param) {

                        if($param == "on" || $param == 1) {
                                        $param = "S";
                        } else {
                                        $param = "N";
                        }
                        return $param;
        }

}
