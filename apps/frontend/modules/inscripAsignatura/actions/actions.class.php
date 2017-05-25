<?php

/**
 * Fecha: 30/08/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campus
 */
class inscripAsignaturaActions extends sfActions {

    public function executeInscripAsignatura(sfWebRequest $request) {
        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);
        $valor = 'S';

        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        //echo "<pre>"; print_r($this->dd_sexo); exit;

    }

    public function executeTraeInscripAsignatura(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors  = array();
        $this->notices = array();
        $this->carre   = $request->getParameter('carre');
        //print_r($_REQUEST); exit;

        $this->errors = array();
        $this->notices= array();
        //$pagina = (!empty($request->getParameter('pagina'))?$request->getParameter('pagina'):1);
        $pagina = 0;
        $sql = "SEL_CAMP_MATERIAS_A_CURSAR('".$_SESSION["usuario"]["username"]."',".$this->carre.")";                        
        $this->mater = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo $sql;exit;
        return $this->renderPartial('inscripAsignatura/inscripAsignatura', array('mater' => $this->mater,
          'sindatos' => $this->sindatos));
          
    }
  
    public function executeAnotar(sfWebRequest $request)
        {
            /********************/
        $this->errors       = array();
        $this->notices      = array();
        $this->anotar       = $request->getParameter('anotar');
        $this->listaAnota   = '';

        foreach ($this->anotar as $value)
           {
           $this->listaAnota=$this->listaAnota.$value.',';
           }
//echo 'anotada:',$this->listaAnota, ' todas:',$this->todos_par; exit;
        $sql = "AM_CAMP_INSCRIP_MATERIA_NOV_RS('".$_SESSION["usuario"]["username"]."','"
                                        .$_SESSION["usuario"]["username"]."','"
                                        .$this->listaAnota."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo $sql; exit;
        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        } ;

        $this->redirect("inscripAsignatura/inscripAsignatura");

        }

}
