<?php

/**
 * Fecha: 30/08/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campus
 */
class cronoExamenesActions extends sfActions {

    public function executeCronoExamenes(sfWebRequest $request) {
        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);
        $valor = 'S';

        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        //echo "<pre>"; print_r($this->dd_sexo); exit;

    }

    public function executeTraeCronoExamenes(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors  = array();
        $this->notices = array();
        $this->carre   = $request->getParameter('carre');
        //print_r($_REQUEST); exit;

        $this->errors = array();
        $this->notices= array();
        //$pagina = (!empty($request->getParameter('pagina'))?$request->getParameter('pagina'):1);
        $pagina = 0;
        $sql = "SEL_CAMP_CRONOPARCIALES_FECHAS('".$_SESSION["usuario"]["username"]."',".$this->carre.")";                        
        $this->cronof = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_CRONOFINALES_FECHAS('".$_SESSION["usuario"]["username"]."',".$this->carre.")";    
        $this->finalf = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        return $this->renderPartial('cronoExamenes/cronoExamenes', array('cronof' => $this->cronof,
         'finalf' => $this->finalf, 'sindatos' => $this->sindatos));
          
    }
  
    public function executeAnotar(sfWebRequest $request)
        {
            /********************/
        $this->errors       = array();
        $this->notices      = array();
        $this->cursor_f     = array();
        $this->cursor_p     = array();
        $this->anotar       = $request->getParameter('anotar');
        $this->anotar_f     = $request->getParameter('anotar_f');
        $this->todos_par    = $request->getParameter('todos_par');
        $this->todos_fin    = $request->getParameter('todos_fin');
        $this->listaAnota   = '';

        // Parciales =========================================
        foreach ($this->anotar as $value)
           {
           $this->listaAnota=$this->listaAnota.$value.',';
           }
//print_r($_REQUEST);exit;
//echo 'anotada:',$this->listaAnota, ' todas:',$this->todos_par; exit;
        $sql = "AM_CAMP_EXAMEN_NOV_RS('".$_SESSION["usuario"]["username"]."','"
                                        .$_SESSION["usuario"]["username"]."','"
                                        .$this->todos_par."','"
                                        .$this->listaAnota."','P')";
        $this->cursor_p = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        // Finales =========================================
        $this->listaAnota   = '';
        foreach ($this->anotar_f as $value)
           {
           $this->listaAnota=$this->listaAnota.$value.',';
           }
//print_r($_REQUEST);
//echo 'anotada:',$this->listaAnota, ' todas:',$this->todos_fin; exit;
        $sql = "AM_CAMP_EXAMEN_NOV_RS('".$_SESSION["usuario"]["username"]."','"
                                        .$_SESSION["usuario"]["username"]."','"
                                        .$this->todos_fin."','"
                                        .$this->listaAnota."','F')";
        $this->cursor_f = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo $sql; print_r($_REQUEST) ; exit;
        $resp_sp = $this->cursor_f[0]['respuesta'];
        $exito = $this->cursor_f[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor_f[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor_f[0]['respues_exito']);
        } ;

        $this->redirect("cronoExamenes/cronoExamenes");


        }

}
