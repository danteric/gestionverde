<?php

/**
 * servicios actions.
 *
 * @package    prosegur
 * @subpackage servicios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class servicesActions extends sfActions
{



	public function executeTraeMascaraCuit(sfWebRequest $request) {
		$pais = $request->getParameter("pais");
		$sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".GET_PAISES_RS (null,'".$pais."', :data); end;";

		$cuit = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

		$mascara = $cuit[0]['MASK_CUIT'];
		return $this->renderText(json_encode(array('mascara' => $mascara, 'label' => $cuit[0]['CUIT_DENOMINA'])));

	}
    public function executeGetgenerico(sfWebRequest $request)
    {
        $array_grupo    = split(",", $request->getParameter('valor'));
                      //  print_r( $array_grupo)   ;
         $datos         = $array_grupo[0];
         $accion        = $array_grupo[1];
         $param1        = $array_grupo[2];
         $param2        = $array_grupo[3];

         switch ($accion) {
         case 'socio':

				$sql = "SEL_SOCIOS_BUSCAR_RS('".$_SESSION["usuario"]["username"]."', '".
												$_SESSION["usuario"]["empresa"]."', '".
											$datos."') ";

                $this->resulta = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                if($this->resulta == null){
                   $this->resulta = 'Nulo';
                }else{
                   $this->resulta = $this->resulta;
                }
                return $this->renderPartial('services/autocompleteGenerico', array('resulRespuesta' =>$this->resulta,'accion' => 'socio'));
          break;

         case 'loca_prov':

         // param SEL_CAMP_LOCALIDADES_BUSCAR_RS(pais,prov,null,cadena_a_buscar)

				$sql = "SEL_CAMP_LOCALIDADES_BUSCAR_RS('".$param1."','".$param2."',null,'".$datos."') ";

                $this->resulta = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                //echo $sql;print_r($this->resulta); exit;
                if($this->resulta == null){
                   $this->resulta = 'Nulo';
                }else{
                   $this->resulta = $this->resulta;
                }
                return $this->renderPartial('services/autocompleteGenerico', array('resulRespuesta' =>$this->resulta,'accion' => 'loca_prov'));
          break;

         case 'usu_usuario':

				$sql = "USU_BUSCAR_USUARIO_RS( null,'".$datos."') ";

                $this->resulta = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
                if($this->resulta == null){
                   $this->resulta = 'Nulo';
                }else{
                   $this->resulta = $this->resulta;
                }
                return $this->renderPartial('services/autocompleteGenerico', array('resulRespuesta' =>$this->resulta,'accion' => 'usu_usuario'));
          break;
	   
        }
        
    }

  public function executeTraeDescripcionVarios(sfWebRequest $request)
  {
//  	$this->codigo = $request->getParameter('codigo');
	$this->parametro = $request->getParameter('parametroOrigen');
	$array_param    = split(",", $request->getParameter('codigo'));
    $dato1        = $array_param[0];
    $dato2        = $array_param[1];
    $dato3        = $array_param[2];

//echo $array_param,' ',$dato1,' ',$dato2,' ',$dato3;exit;

	
	switch ($this->parametro) {

		case 'loca_prov':
			    $sql = "SEL_CAMP_LOCALIDADES_BUSCAR_RS ('".$dato3."','".$dato2."','".$dato1."',null);";
			    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				
				$response = $response[0]['loca_deno'];
			break;
		case 'usu_usuario': 
			    $sql = "USU_BUSCAR_USUARIO_RS ('".$dato1."',null);";
			    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				
				$response = $response[0]['user_deno'];
			break;

	}

    $this->setLayout(false);
    $this->getResponse()->setContentType('text/json');
    
    return $this->renderText(json_encode($response));
  }

/*
  public function executeTraeDescripcionVarios(sfWebRequest $request)
  {
  	$this->codigo = $request->getParameter('codigo');
	$this->parametro = $request->getParameter('parametroOrigen');

	print_r($_REQUEST); exit;
	
	switch ($this->parametro) {
		case 'bancos':
			    $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_LISTA_ENT_TODOS_BANCOS_RS('".$_SESSION["usuario"]["username"]."','".$_SESSION["usuario"]["empresa"]."','".$this->codigo."', '', :data); end;";
			    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				BackendServices::getInstance()->getGrabarLogs($response,'executeTraeDescripcionVarios'); // debug
				$response = $response[0]['ENTI_RAZON_SOCIAL'];
			break;
		case 'loca_prov':
			    $sql = "SEL_CAMP_LOCALIDADES_BUSCAR_RS ('3','2','".$this->codigo."',null);";
			    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				
				$response = $response[0]['loca_deno'];
			break;
		case 'usu_usuario': 
			    $sql = "USU_BUSCAR_USUARIO_RS ('".$this->codigo."',null);";
			    $response = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
				
				$response = $response[0]['user_deno'];
			break;

	}

    $this->setLayout(false);
    $this->getResponse()->setContentType('text/json');
    
    return $this->renderText(json_encode($response));
  }





*/

  	 /* public function executeGetMostrarlocalidades(sfWebRequest $request)
	  {
           $errors = array();
		   $this->text = 'NULL';
		   $this->domicilio_real_localidad = $request->getParameter('domicilio_localidad'); 
           $this->domicilio_real_provincia = $request->getParameter('domicilio_provincia');
		   $this->domicilio_real_pais = $request->getParameter('domicilio_pais'); 

		   $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_LOCALIDAD_BUSCAR_RS
																				   (
																				   ".$this->text.",
																				   '".$this->domicilio_real_localidad."',
																				   '".$this->domicilio_real_provincia."',
																				   '".$this->domicilio_real_pais."', 
																				   :data
																				   ); end;";            
		   $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
		   $resultado = $this->cursor[0]['DESC_LOCA'];
		   if($resultado == NULL){
		   	$respuesta = 'No se ha seleccionado ningun dato..';
		   return $this->renderText(json_encode($respuesta));
		   }
		   return $this->renderText(json_encode($resultado));
	} */
 
    
}

