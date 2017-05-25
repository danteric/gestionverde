<?php

/**
 * amSocios actions.
 *
 * @package    gcbaFrontend
 * @subpackage am de socios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class amSociosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  	public function executeIndex(sfWebRequest $request)
  	{
    $this->forward('default', 'module');
  	}

  	public function executeAmSocios(sfWebRequest $request){

		$this->errors = array();
		$this->notices = array();
		$this->cursor = array(0);
		//$this->actividades= "";
		$this->item= ""; 
		
  	}

	public function executeTablaAmSocios(sfWebRequest $request) {
      // echo "<pre>"; print_r($_REQUEST); exit;
   		$this->soci_codi   	= $request->getParameter("soci_codi");
      	$this->apelli		= $request->getParameter("apelli");
      	$this->nombre 		= $request->getParameter("nombre");
     
		$this->cursor       = array();
		$this->total_paginas = 1;

    	$sql = "SEL_SOCIOS_AM_RS('".
                                  $_SESSION["usuario"]["username"]."', '".
                                  $_SESSION["usuario"]["empresa"]."', '".
                                  $this->soci_codi."','".
                                  $this->apelli."','".
                                  $this->nombre."')";
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
				('amSocios/tablaAmSocios', array('cursor' =>$this->cursor,
											     'sindatos' =>$this->sindatos,
												 'total_paginas' => $this->total_paginas,
					                            'total_registros' =>$this->total_registros,
					                            'pagina' => $this->pagina));
	}
	

	public function executeFormularioAmSocios(sfWebRequest $request){

		$this->errors = array();
		$this->notices = array();
		$this->sociosActi = array();
		$this->soci_codi = $request->getParameter('soci_codi');
		//echo $this->soci_codi; 
		$alta = $request->getParameter('alta');
		$this->alta = 0; //si es alta envio 0 al template

 		$sql = "GET_SOC_TIPOS_RS('N',null)";
        $this->soc_tipos = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		
 		$sql = "GET_LOCA_BARRIOS_RS('N',null)";
        $this->barrios = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo "<pre>"; print_r($this->barrios); exit;
		$sql = "GET_SOC_NACIONALIDAD_RS('N',null)";
        $this->nacionalidad = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

//		$sql = "SEL_SOCFICHA_ACTIVIDADES_RS('".
//                                  $_SESSION["usuario"]["empresa"]."', 0 )";
//        $this->actividades = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
  
		if(isset($this->soci_codi) && !empty($this->soci_codi)) {
				$this->alta = 1; //si es editar envio 1 al template
				//busco resultados del ciclo de acuerdo al codigo que le estoy pasando
				$sql = "GET_SOCIOS_RS('".
                                  $_SESSION["usuario"]["empresa"]."', '".
                                  $this->soci_codi."')";
				$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				//echo "<pre>"; echo $sql; print_r($this->cursor); exit;
				//aqui envio parametros para mostrar cuando se edita en template
				foreach($this->cursor as $row) {
					    $this->soci_id 		= $row['soci_id'];
						$this->soci_empre 	= $row['soci_empre'];
						$this->soci_codi 	= $row['soci_codi'];
						$this->soci_ape 	= $row['soci_ape'];
						$this->soci_nom 	= $row['soci_nom'];
						$this->soci_tipo_codi=$row['soci_tipo_codi'];
						$this->soci_domi 	= $row['soci_domi'];
 						$this->soci_barrio 	= $row['soci_barrio'];
    					$this->soci_naci_f 	= $row['soci_naci_f'];
    					$this->soci_ingre_f = $row['soci_ingre_f'];
    					$this->soci_docu 	= $row['soci_docu'];
    					$this->soci_baja_f 	= $row['soci_baja_f'];
    					$this->soci_nacio 	= $row['soci_nacio'];
    					$this->soci_tele 	= $row['soci_tele'];
    					$this->soci_cant_imp_carnets = $row['soci_cant_imp_carnets'];
				}

				$sql = "SEL_SOCFICHA_ACTIVIDADES_RS('".
		                                  $_SESSION["usuario"]["empresa"]."', '".
		                                  $this->soci_codi."')";
		        $this->actividades = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		        //echo "<pre>"; print_r($this->actividades); exit;
				$sql = "SEL_SOCFICHA_HISTO_PAGOS_RS('".
		                                  $_SESSION["usuario"]["empresa"]."', '".
		                                  $this->soci_codi."')";
		        $this->regpagos = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

				$sql = "SEL_COBXCAJA_ULT_RECIBO_RS('".
		                                  $_SESSION["usuario"]["empresa"]."', '".
		                                  $this->soci_codi."',null,null)";
		        $this->ultpago = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				   

		} else { // es un alta, limpiamos la grilla selectora
				$sql = "SEL_SOCFICHA_ACTIVIDADES_RS('".$_SESSION["usuario"]["empresa"]."', 0 )";
        		$this->actividades = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		}



	   if($request->getMethod() == "POST") {

	   			//echo "<pre>"; print_r($_REQUEST); 

				if($_SESSION["usuario"]["modi"] != "S"){
		        	$this->redirect("errores/forbidden");
		        }
  
		        $this->soci_codi 	= $request->getParameter('soci_codi');
		        $this->soci_ape  	= $request->getParameter('soci_ape');
		        $this->soci_nom  	= $request->getParameter('soci_nom');
		        $this->soci_tipo_codi=$request->getParameter('soci_tipo_codi');
		        $this->soci_domi  	= $request->getParameter('soci_domi');
		        $this->soci_barrio  = $request->getParameter('soci_barrio');
		        $this->soci_naci_f  = $request->getParameter('soci_naci_f');
		        $this->soci_docu  	= $request->getParameter('soci_docu');
		        $this->soci_nacio  	= $request->getParameter('soci_nacio');
		        $this->soci_tele  	= $request->getParameter('soci_tele');

		//		if($alta == 1) {				
		//			$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".AM_CAPACI_CICLOS_RS('A','".$_SESSION["usuario"]["username"]."','".$_SESSION["usuario"]["empresa"]."', '".$this->codigo."', '".$vigente."', '".$descripcion."', :data); end;";
		//		} else {
		//			$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".AM_CAPACI_CICLOS_RS('A','".$_SESSION["usuario"]["username"]."','".$_SESSION["usuario"]["empresa"]."', '', '".$vigente."', '".$descripcion."', :data); end;";
				$sql = "AM_SOCIOS_RS('".
											$_SESSION["usuario"]["username"]."', '".
											$_SESSION["usuario"]["empresa"]."', '".
											"A', '".
											$this->soci_codi."', '".
											$this->soci_ape."', '".
											$this->soci_nom."', '".
											$this->soci_tipo_codi."', '".
											$this->soci_domi."', '".
											$this->soci_barrio."', '".
											$this->soci_naci_f."', '".
											$this->soci_docu."', '".
											$this->soci_nacio."', '".
											$this->soci_tele."') ";

 				//echo $sql; exit;
				//}
				$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				//echo "<pre>"; echo $sql; print_r($this->cursor); //exit;
				
				$resp_sp = $this->cursor[0]['respuesta'];

				if ($resp_sp != 'OK') {

					$this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);

				}else{
			
                    $this->soci_codi_alta = $this->cursor[0]['soci_codi_alta'];
					$resp_ok = 'Socio '.$this->cursor[0]['soci_codi_alta'].' actualizado correctamente'; //.':'.$this->cursor[0]['respues_exito'];
                    $this->getUser()->setFlash('notice', $resp_ok);

                // if ($this->alta == 1) {$this->getUser()->setFlash('notice', 'Alta Socio nro '.$this->soci_codi_alta);}
                    ///$_SESSION  $this->cursor[0]['soci_codi_alta']
				};

				//echo $this->soci_codi_alta;exit;
              //echo "<pre>"; echo $sql; print_r($resp_sp); exit;
				// ************   Ciclo de actividades ******************
				// armo la lista de actividades separadas con coma, debe terminar con coma
				//Ej-- CALL AM_SOCIOS_ACTIVI_ALLSELEC_RS (1,2050,'F,B,')
				//-- CALL AM_SOCIOS_ACTIVI_ALLSELEC_RS (1,2050,'T,')

		        $this->sociosActi  	= $request->getParameter('sociosActi');
		        $listaActi          = '';
               //  print_r($this->sociosActi);
		        foreach ($this->sociosActi as $key => $value) {
		       //echo "<pre>"; print_r($this->sociosActi);
		        	$listaActi = $listaActi.$this->sociosActi[$key].',';

		      }

		      // si esta vacio el codigo es porque es un alta
			  if(isset($this->soci_codi) && empty($this->soci_codi)) {
				$this->soci_codi = $this->soci_codi_alta;
		  		}

                //echo "<pre>"; print_r($this->sociosActi); 
				$sql = "AM_SOCIOS_ACTIVI_ALLSELEC_RS('".
											$_SESSION["usuario"]["username"]."', '".
											$_SESSION["usuario"]["empresa"]."', '".
											$this->soci_codi."', '".
											$listaActi."') ";

 				//cho $sql; exit;
				//}
				$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				//echo "<pre>"; echo $sql; print_r($this->cursor); exit;
                /*
                $resp_sp2 = $this->cursor[0]['respuesta'];
				if ($resp_sp2 != 'OK') {

					$this->getUser()->setFlash('error', $resp_sp2);

				}else{
                    $this->getUser()->setFlash('notice', $resp_sp2);
				};
				*/
				$this->redirect("amSocios/amSocios");

		
			
			}

		}

/*
		public function executeValidaAmSociosssss(sfWebRequest $request) {
		
            $this->soci_codi 	= $request->getParameter('soci_codi');
            $this->soci_ape  	= $request->getParameter('soci_ape');
	        $this->soci_nom  	= $request->getParameter('soci_nom');
	        $this->soci_tipo_codi=$request->getParameter('soci_tipo_codi');
	        $this->soci_domi  	= $request->getParameter('soci_domi');
	        $this->soci_barrio  = $request->getParameter('soci_barrio');
	        $this->soci_naci_f  = $request->getParameter('soci_naci_f');
	        $this->soci_docu  	= $request->getParameter('soci_docu');
	        $this->soci_nacio  	= $request->getParameter('soci_nacio');
	        $this->soci_tele  	= $request->getParameter('soci_tele');

			$errors = array();
			if($request->getMethod() == "POST") {
				$sql = "AM_SOCIOS_RS('".
											$_SESSION["usuario"]["username"]."', '".
											$_SESSION["usuario"]["empresa"]."', '".
											"V', '".
											$this->soci_codi."', '".
											$this->soci_ape."', '".
											$this->soci_nom."', '".
											$this->soci_tipo_codi."', '".
											$this->soci_domi."', '".
											$this->soci_barrio."', '".
											$this->soci_naci_f."', '".
											$this->soci_docu."', '".
											$this->soci_nacio."', '".
											$this->soci_tele."') ";

 			//echo $sql; exit;
			//}
			$this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				$errors = Helper::getInstance()->validarRespuesta($this->cursor[0]['respuesta']);
			}
            
			if(count($errors) == 0) {
				echo "string"; exit;
				return $this->renderPartial('services/validationPassed');
			} else {
				$this->redirect("amSocios/formularioAmSocios?soci_codi=2050");

				//return $this->renderPartial('services/validationErrors', array("errors" => $errors));
			}
		}
*/
	public function executeValidaAmSocios(sfWebRequest $request)
	  {
           $errors = array();
		
            $this->soci_codi 	= $request->getParameter('soci_codi');
            $this->soci_ape  	= $request->getParameter('soci_ape');
	        $this->soci_nom  	= $request->getParameter('soci_nom');
	        $this->soci_tipo_codi=$request->getParameter('soci_tipo_codi');
	        $this->soci_domi  	= $request->getParameter('soci_domi');
	        $this->soci_barrio  = $request->getParameter('soci_barrio');
	        $this->soci_naci_f  = $request->getParameter('soci_naci_f');
	        $this->soci_docu  	= $request->getParameter('soci_docu');
	        $this->soci_nacio  	= $request->getParameter('soci_nacio');
	        $this->soci_tele  	= $request->getParameter('soci_tele');

			$sql = "AM_SOCIOS_RS('".
											$_SESSION["usuario"]["username"]."', '".
											$_SESSION["usuario"]["empresa"]."', '".
											"V', '".
											$this->soci_codi."', '".
											$this->soci_ape."', '".
											$this->soci_nom."', '".
											$this->soci_tipo_codi."', '".
											$this->soci_domi."', '".
											$this->soci_barrio."', '".
											$this->soci_naci_f."', '".
											$this->soci_docu."', '".
											$this->soci_nacio."', '".
											$this->soci_tele."') ";         

		   $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		   $resultado = $this->cursor[0]['respuesta'];
		   return $this->renderText(json_encode($resultado));
	} 
}
