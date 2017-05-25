s<?php

/**
 * roles actions.
 *
 * @package    gcbaFrontend
 * @subpackage roles
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{

	public function executeMenu (sfWebRequest $request){

	}

	public function executeCargarMenu (sfWebRequest $request){
		$this->errors = array();
		$this->notices = array();
		$this->accion = $request->getParameter('accion');
		$this->notas = "";
		$this->pdf = "";
		$this->excel = "";
		$this->html = "";
		$this->modif = "";
		$this->alta = 0;
		//echo "<pre>"; print_r($_REQUEST); exit;

		//echo $sql; echo "<pre>"; print_r($this->roles); exit;

		if($request->getMethod() == "POST") {
		//echo "string"; exit;
				if($_SESSION["usuario"]["modi"] != "S"){
		        	$this->redirect("errores/forbidden");
		        }
				$this->menu = str_replace('menu%5Braiz%5D%5Busma_id%5D=0','',$request->getParameter("menu"));
				$this->solapa = $request->getParameter("solapa");
				parse_str($this->menu, $searcharray);
				//print_r($searcharray);
				$this->notas = $request->getParameter('notas');
				
				foreach($searcharray[menu] as $rol) {
					if ($rol["item"] == $rol["item_original"]) {$accion = 'AM';} else {$accion = 'M';}
					$sql = "begin " . sfConfig::get('SCHEMA_ORACLE') . ".SEL_ABM_MENU('".$_SESSION["usuario"]["username"]."',
																								 '".$rol["usma_usap_apli"]."',
																								 '".$rol["usma_id"]."',
																								 '".$rol["usma_padre_id"]."',
																								 '".$rol["item"]."',
																								 '".$rol["usma_des_item"]."',
																								 '".$rol["usma_enlace"]."',																								 
																								 '".$rol["item_hab"]."',
																								 '".$rol["usma_orden"]."',
																								 '".$this->solapa."',
																								 '".$accion."',
																								 :data); end;";
					//echo $sql.' ';
					$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
					//echo json_encode($this->cursor[0]).'<br>';
					//echo "<pre>"; echo $sql;   print_r($this->menurol);
				}
				
				//exit;
				//return $this->renderText(json_encode($this->cursor[0]));
				//$this->redirect("roles/roles");
		}
		$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_ABM_MENU('".$_SESSION["usuario"]["username"]."',
																					'SMOG',
																					'',
																					'',
																					'',
																					'',
																					'',
																					'',
																					'',
																					'".$this->solapa."',	
																					'',
																					:data); end;";
		$this->roles = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);		
		//echo '<pre>'; print_r($this->roles);exit;
		return $this->renderPartial('menu/MenuGrilla', array('cursor' => $this->cursor, 
														   'roles' => $this->roles));
	}

}
