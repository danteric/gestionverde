<?php

/**
 * Fecha: 01/09/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campusnet
 */
class modificaPersonalesActions extends sfActions {

    public function executeModificaPersonales(sfWebRequest $request) {
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

    public function executeTraeModificaPersonales(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors = array();
        $this->notices = array();
        //print_r($_REQUEST); exit;

        $sql = "GET_CAMP_TIPODOC_RS(null) " ;
        $this->dd_tdoc = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
    
        $sql = "GET_CAMP_SEXO_RS(null)" ;
        $this->dd_sexo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_PAISES_RS(null)" ;
        $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_NACIONALIDADES_RS(null)" ;
        $this->dd_nacio = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_ALUMNOS_NOV_RS('".$_SESSION["usuario"]["username"]."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
 
                // echo "<pre>"; print_r($this->cursor); exit;
       if ($this->cursor == NULL) :
            $this->sindatos = '0';
        else:
            $this->sindatos = '1';
        endif;

        return $this->renderPartial('modificaPersonales/modificaPersonales', array('datos' => $this->cursor,
            'sindatos' => $this->sindatos, 'dd_sexo' => $this->dd_sexo, 'dd_tdoc' => $this->dd_tdoc,
            'dd_pais' => $this->dd_pais, 'dd_nacio' => $this->dd_nacio));

    }

  public function executeComboSubprovin_pro(sfWebRequest $request){
    

        $calu_id_pais_pro       = $request->getParameter('calu_id_pais_pro');
        $this->codigoProvincia  = $request->getParameter('codigoProvincia'); // solo recuperar dato
        
        //$calu_id_provincia_pro  == 1; //$request->getParameter('calu_id_provincia_pro');
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$calu_id_pais_pro."',null)";
        $this->dd_provin_pro = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//print_r($this->dd_provin_pro); exit;
//echo 'mariano'.$calu_id_provincia_pro;
        return $this->renderPartial('modificaPersonales/comboSubprovin_pro', array('dd_provin_pro' => $this->dd_provin_pro, 'codigoProvincia' =>$this->codigoProvincia));
    } 

  public function executeComboSubprovin(sfWebRequest $request){
    

        $calu_id_pais       = $request->getParameter('calu_id_pais');
        $this->codigoProvin = $request->getParameter('codigoProvin'); // solo recuperar dato
        
        //$calu_id_provincia_pro  == 1; //$request->getParameter('calu_id_provincia_pro');
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$calu_id_pais."',null)";
        $this->dd_provin = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//print_r($this->dd_provin_pro); exit;
//echo 'mariano'.$calu_id_provincia_pro;
        return $this->renderPartial('modificaPersonales/comboSubprovin', array('dd_provin' => $this->dd_provin, 'codigoProvin' =>$this->codigoProvin));
    } 

     public function executeGrabar(sfWebRequest $request)
        {
            /********************/
        $this->errors = array();
        $this->notices = array();

 //print_r($_REQUEST); exit;

        $calu_apellido          = $request->getParameter('calu_apellido');
        $calu_nombre            = $request->getParameter('calu_nombre');
        $calu_id_sexo           = $request->getParameter('calu_id_sexo');
        $calu_id_tipodoc        = $request->getParameter('calu_id_tipodoc');
        $calu_nrodoc            = $request->getParameter('calu_nrodoc');
        $calu_id_paisemision    = $request->getParameter('calu_id_paisemision');
        $calu_id_nacionalidad   = $request->getParameter('calu_id_nacionalidad');
        $calu_cuil              = $request->getParameter('calu_cuil');
        $calu_fechanac          = $request->getParameter('calu_fechanac');
        $calu_id_paisnac        = $request->getParameter('calu_id_paisnac');
        $calu_lugarnacimiento   = $request->getParameter('calu_lugarnacimiento');
        $calu_distritonacimiento= $request->getParameter('calu_distritonacimiento');
        $calu_calle_pro         = $request->getParameter('calu_calle_pro');
        $calu_nro_pro           = $request->getParameter('calu_nro_pro');
        $calu_piso_pro          = $request->getParameter('calu_piso_pro');
        $calu_dto_pro           = $request->getParameter('calu_dto_pro');
        $calu_codigopostal_pro  = $request->getParameter('calu_codigopostal_pro');
        $calu_id_pais_pro       = $request->getParameter('calu_id_pais_pro');
        $calu_id_provincia_pro  = $request->getParameter('calu_id_provincia_pro');
        $calu_id_localidad_pro  = $request->getParameter('loca_actual_pro');
        $calu_calle             = $request->getParameter('calu_calle');
        $calu_nro               = $request->getParameter('calu_nro');
        $calu_piso              = $request->getParameter('calu_piso');
        $calu_dto               = $request->getParameter('calu_dto');
        $calu_codigopostal      = $request->getParameter('calu_codigopostal');
        $calu_id_pais           = $request->getParameter('calu_id_pais');
        $calu_id_provincia      = $request->getParameter('calu_id_provincia');
        $calu_id_localidad      = $request->getParameter('loca_actual');
        $calu_te                = $request->getParameter('calu_te');
        $calu_celular           = $request->getParameter('calu_celular');
        $calu_email             = $request->getParameter('calu_email');
        $calu_email2            = $request->getParameter('calu_email2');

   
         //echo "<pre>";print_r($_REQUEST); exit;
        $sql = "AM_CAMP_ALUMNOS_NOV_RS('".$_SESSION["usuario"]["username"]."','".
                                     $_SESSION["usuario"]["username"]."','".
                                    $calu_apellido."','".
                                    $calu_nombre."','".
                                    $calu_id_tipodoc."','".
                                    $calu_nrodoc."','".
                                    $calu_id_sexo."','".
                                    $calu_id_nacionalidad."','".
                                    $calu_fechanac."','".
                                    $calu_lugarnacimiento."','".
                                    $calu_distritonacimiento."','".
                                    $calu_id_paisnac."','".
                                    $calu_calle."','".
                                    $calu_nro."','".
                                    $calu_piso."','".
                                    $calu_dto."','".
                                    $calu_codigopostal."','".
                                    $calu_id_localidad."','".
                                    $calu_id_provincia."','".
                                    $calu_id_pais."','".
                                    $calu_te."','".
                                    $calu_celular."','".
                                    $calu_email."','".
                                    $calu_email2."','".
                                    $calu_cuil."','".
                                    $calu_id_paisemision."','".
                                    $calu_calle_pro."','".
                                    $calu_nro_pro."','".
                                    $calu_piso_pro."','".
                                    $calu_dto_pro."','".
                                    $calu_codigopostal_pro."','".
                                    $calu_id_localidad_pro."','".
                                    $calu_id_provincia_pro."','".
                                    $calu_id_pais_pro."')";

        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//print_r($sql); exit;

        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        } ;

        $this->redirect("modificaPersonales/modificaPersonales");

        }

}
