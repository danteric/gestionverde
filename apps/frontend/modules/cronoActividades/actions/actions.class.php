<?php

/**
 * Fecha: 30/08/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campus
 */
class cronoActividadesActions extends sfActions {

    public function executeCronoActividades(sfWebRequest $request) {
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

        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo "<pre>"; print_r($this->dd_sexo); exit;

    }

    public function executeTraeCronoActividades(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors  = array();
        $this->notices = array();
        $this->carre   = $request->getParameter('carre');
        //print_r($_REQUEST); exit;

        $this->errors = array();
        $this->notices= array();
        //$pagina = (!empty($request->getParameter('pagina'))?$request->getParameter('pagina'):1);
        $pagina = 0;
        $sql = "SEL_CAMP_CARTELERA('".$_SESSION["usuario"]["username"]."',".$this->carre.")";                      
        $this->carte = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        //echo "<pre>";print_r($this->carte);die;
        $this->filasPorPagina = 10; //$_SESSION['usuario']['filas_pag'];

        return $this->renderPartial('cronoActividades/cronoActividades', array('carte' => $this->carte,
          'sindatos' => $this->sindatos));
          
    }
    public function executeHome(sfWebRequest $request) {

        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);
  
        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo "<pre>"; print_r($this->dd_cabe); exit;

        $sql = "SEL_CAMP_INCRIP_FECHAS_STATUS_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->inscrip = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


        $sql = "USU_GET_LAST_LOGIN_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->last_lg = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        $sql = "SEL_CAMP_CARTEL_TODA_HOY('".$_SESSION["usuario"]["username"]."')" ;
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);  
          
    }
}
