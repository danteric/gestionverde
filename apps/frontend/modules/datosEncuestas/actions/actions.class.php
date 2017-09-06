<?php

/**
 * Fecha: 01/09/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campusnet
 */
class datosEncuestasActions extends sfActions {

    public function executeDatosEncuestas(sfWebRequest $request) {
        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);
        $this->pagina          = $request->getParameter('pagina');
        $this->descripcion     = $request->getParameter('descripcion');
        $valor = 'S';
        $this->total_registros = 0;
        $this->total_paginas   = 0;

        if (empty($this->pagina)):
            $this->pagina = 1;

        endif;

        //echo "<pre>"; print_r($this->dd_sexo); exit;

    }

    public function executeTraeDatosEncuestas(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors = array();
        $this->notices = array();
        //print_r($_REQUEST); exit;
        $sql = "GET_CAMP_ENCUESTAS_ITEMS_RS()" ;
        $this->dd_item = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_PAISES_RS(null)" ;
        $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_ENCUESTAS_PADRES_NOV('".$_SESSION["usuario"]["username"]."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
 
        //echo "<pre>"; print_r($this->cursor); exit;

        return $this->renderPartial('datosEncuestas/datosEncuestas', array('cursor' => $this->cursor,
             'dd_pais' => $this->dd_pais, 'dd_item' => $this->dd_item ));

    }

  public function executeComboSubprovin_p(sfWebRequest $request){
    

        $p_id_pais       = $request->getParameter('p_id_pais');
        $this->codigoProvincia  = $request->getParameter('codigoProvincia_p'); // solo recuperar dato
        
        //$calu_id_provincia_pro  == 1; //$request->getParameter('calu_id_provincia_pro');
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$p_id_pais."',null)";
        $this->dd_provin_p = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//print_r($this->dd_provin_pro); exit;

        return $this->renderPartial('datosEncuestas/comboSubprovin_p', array('dd_provin_p' => $this->dd_provin_p, 'codigoProvincia' =>$this->codigoProvincia));
    } 

  public function executeComboSubprovin_m(sfWebRequest $request){
    

        $m_id_pais       = $request->getParameter('m_id_pais');
        $this->codigoProvin = $request->getParameter('codigoProvincia_m'); // solo recuperar dato
        
        //$calu_id_provincia_pro  == 1; //$request->getParameter('calu_id_provincia_pro');
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$m_id_pais."',null)";
        $this->dd_provin_m = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //print_r($this->dd_provin_m); exit;

        return $this->renderPartial('datosEncuestas/comboSubprovin_m', array('dd_provin_m' => $this->dd_provin_m, 'codigoProvin' =>$this->codigoProvin));
    } 

     public function executeGrabar(sfWebRequest $request)
        {
            
        $this->errors = array();
        $this->notices = array();

 //print_r($_REQUEST); exit;
        $p_id_nivelinstruccion = $request->getParameter('p_id_nivelinstruccion');
        $p_apellido         = $request->getParameter('p_apellido');
        $p_nombre           = $request->getParameter('p_nombre');
        $p_domicilio        = $request->getParameter('p_domicilio');
        $p_codigopostal     = $request->getParameter('p_codigopostal');
        $p_id_localidad     = $request->getParameter('p_loca_actual');
        $p_id_provincia     = $request->getParameter('p_id_provincia');
        $p_id_pais          = $request->getParameter('p_id_pais');
        $p_te               = $request->getParameter('p_te');
        $p_celular          = $request->getParameter('p_celular');
        $p_email            = $request->getParameter('p_email');

        $m_id_nivelinstruccion = $request->getParameter('m_id_nivelinstruccion');
        $m_apellido         = $request->getParameter('m_apellido');
        $m_nombre           = $request->getParameter('m_nombre');
        $m_domicilio        = $request->getParameter('m_domicilio');
        $m_codigopostal     = $request->getParameter('m_codigopostal');
        $m_id_localidad     = $request->getParameter('m_loca_actual');
        $m_id_provincia     = $request->getParameter('m_id_provincia');
        $m_id_pais          = $request->getParameter('m_id_pais');
        $m_te               = $request->getParameter('m_te');
        $m_celular          = $request->getParameter('m_celular');
        $m_email            = $request->getParameter('m_email');

        //echo "<pre>";print_r($_REQUEST); exit;
        $sql = "AM_CAMP_ENCUESTAS_PADRES_NOV_RS('".$_SESSION["usuario"]["username"]."','".
                                    $_SESSION["usuario"]["username"]."','".
                                    $p_id_nivelinstruccion."','".
                                    $p_apellido."','".
                                    $p_nombre."','".
                                    $p_domicilio."','".
                                    $p_codigopostal."','".
                                    $p_id_localidad."','".
                                    $p_id_provincia."','".
                                    $p_id_pais."','".
                                    $p_te."','".
                                    $p_celular."','".
                                    $p_email."','".
                                    $m_id_nivelinstruccion."','".
                                    $m_apellido."','".
                                    $m_nombre."','".
                                    $m_domicilio."','".
                                    $m_codigopostal."','".
                                    $m_id_localidad."','".
                                    $m_id_provincia."','".
                                    $m_id_pais."','".
                                    $m_te."','".
                                    $m_celular."','".
                                    $m_email."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo $sql; exit;

        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        } ;

        $this->redirect("datosEncuestas/datosEncuestas");

        }

}
