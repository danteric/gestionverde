<?php

/**
 * Fecha: 30/08/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campus
 */
class infoProfePreviaActions extends sfActions {


    public function executeInfoProfePrevia(sfWebRequest $request) {
        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);
        //$this->pagina          = $request->getParameter('pagina');
        //$this->descripcion     = $request->getParameter('descripcion');
        //$valor = 'S';
        $this->total_registros = 0;
        $this->total_paginas   = 0;


        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        //echo "<pre>"; print_r($this->dd_sexo); exit;

    }

    public function executeTraeInfoProfePrevia(sfWebRequest $request) {
        // echo "<pre>";  print_r($request->getOptions());  print_r($request->getRequestContext());
        
        $this->errors  = array();
        $this->notices = array();
        $this->carre   = $request->getParameter('carre');

    //print_r($_REQUEST); exit;
        $this->errors = array();
        $this->notices= array();
        //$pagina = 0;
    
        $sql = "SEL_CAMP_INFO_ACADEMICA_PREVIA('".$_SESSION["usuario"]["username"]."',".$this->carre.")";                      
        $this->acad = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_INFO_PROFESIONAL_PREVIA('".$_SESSION["usuario"]["username"]."',".$this->carre.")";                      
        $this->prof = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);;

        $sql = "GET_CAMP_PAISES_RS(null)" ;
        $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_INFO_ACADEM_NIVELES_RS()" ;
        $this->dd_nive = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_INFO_ACADEM_TIPO_TITULO_RS()" ;
        $this->dd_tipt = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        //$this->filasPorPagina = 10; //$_SESSION['usuario']['filas_pag'];
        $_SESSION["usuario"]["carre"] = $this->carre;

        return $this->renderPartial('infoProfePrevia/infoProfePrevia', array('acad' => $this->acad,
          'prof' => $this->prof, 'dd_pais' => $this->dd_pais, 'carre' => $this->carre,
          'dd_nive' => $this->dd_nive, 'dd_tipt' => $this->dd_tipt));
          
    }

    public function executeComboSubprovin_tit(sfWebRequest $request){
    
        $id_pais_tit            = $request->getParameter('id_pais_tit');
        $this->codigoProvincia  = $request->getParameter('codigoProvincia'); // solo recuperar dato
        $this->solapa           = $request->getParameter('solapa');

        //print_r($_REQUEST);
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$id_pais_tit."',null)";
        $this->dd_provin_tit = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        return $this->renderPartial('infoProfePrevia/comboSubprovin_tit', array('dd_provin_tit' => $this->dd_provin_tit,
         'codigoProvincia' =>$this->codigoProvincia, 'solapa' =>$this->solapa));
    } 

    public function executeComboSubprovin_mat(sfWebRequest $request){
    
        $id_pais_mat            = $request->getParameter('id_pais_mat');
        $this->codigoProvincia  = $request->getParameter('codigoProvincia'); // solo recuperar dato
        $this->solapa           = $request->getParameter('solapa');
        //print_r($_REQUEST);
        $sql = "SEL_CAMP_PROVINCIAS_DD_RS('".$id_pais_mat."',null)";
        $this->dd_provin_mat = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        return $this->renderPartial('infoProfePrevia/comboSubprovin_mat', array('dd_provin_mat' => $this->dd_provin_mat,
         'codigoProvincia' =>$this->codigoProvincia, 'solapa' =>$this->solapa));
    } 


    public function executeFormularioInfoProfePrevia(sfWebRequest $request){
        $this->errors  = array();
        $this->notices = array();
         
        // fila nueva a insertar
        $sql = "GET_CAMP_PAISES_RS(null)" ;
        $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_INFO_PROFESIONAL_PREVIA('".$_SESSION["usuario"]["username"]."',".
                                                    $_SESSION["usuario"]["carre"].")";                      
        $this->prof = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);;
    }

    public function executeFormularioInfoAcademPrevia(sfWebRequest $request){
        $this->errors  = array();
        $this->notices = array();

        // fila nueva a insertar
        $sql = "GET_CAMP_PAISES_RS(null)" ;
        $this->dd_pais = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo $sql; echo "<pre>"; print_r($this->roles);exit;
        $sql = "SEL_CAMP_INFO_ACADEMICA_PREVIA('".$_SESSION["usuario"]["username"]."',".
                                                  $_SESSION["usuario"]["carre"].")";                      
        $this->acad = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_INFO_ACADEM_NIVELES_RS()" ;
        $this->dd_nive = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "GET_CAMP_INFO_ACADEM_TIPO_TITULO_RS()" ;
        $this->dd_tipt = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


    }
    public function executeGrabar(sfWebRequest $request){

        $this->errors       = array();
        $this->notices      = array();
//print_r($_REQUEST); exit;
        $ind                = 1;  
        $this->cantit       = $request->getParameter('cantit');
        $this->carre        = $request->getParameter('carre');

        // ***************   Ciclo de titulos ***********************************
        if ($this->cantit>0) {
            while ($ind <= $this->cantit) { 

                $this->ciap_nro_titulo      = $request->getParameter('ciap_nro_titulo'.$ind);
                $this->ciap_titulo          = $request->getParameter('ciap_titulo'.$ind);
                $this->ciap_id_nivel        = $request->getParameter('ciap_id_nivel'.$ind);
                $this->ciap_id_tipo_titulo  = $request->getParameter('ciap_id_tipo_titulo'.$ind);
                $this->ciap_fechagraduacion = $request->getParameter('ciap_fechagraduacion'.$ind);
                $this->ciap_instituto       = $request->getParameter('ciap_instituto'.$ind);
                $this->ciap_id_pais         = $request->getParameter('ciap_id_pais'.$ind);
                $this->ciap_id_provincia    = $request->getParameter('ciap_id_provincia'.$ind);
                $this->ciap_id_localidad    = $request->getParameter('loca'.$ind);
                $this->ciap_conva_reva      = $request->getParameter('ciap_conva_reva'.$ind);
                $this->ciap_universidad     = $request->getParameter('ciap_universidad'.$ind);
                $this->ciap_resolucion      = $request->getParameter('ciap_resolucion'.$ind);
                $this->ciap_fechaemision    = $request->getParameter('ciap_fechaemision'.$ind);             

                $sql = "AM_CAMP_INFO_ACADEM_PREVIA_NOV_RS('".$_SESSION["usuario"]["username"]."','"
                                        .$_SESSION["usuario"]["username"]."','"
                                        .$this->carre."','"
                                        .$this->ciap_nro_titulo."','"
                                        .$this->ciap_titulo."','"
                                        .$this->ciap_id_nivel."','"
                                        .$this->ciap_id_tipo_titulo."','"
                                        .$this->ciap_fechagraduacion."','"
                                        .$this->ciap_instituto."','"
                                        .$this->ciap_id_pais."','"
                                        .$this->ciap_id_provincia."','"
                                        .$this->ciap_id_localidad."','"
                                        .$this->ciap_conva_reva."','"
                                        .$this->ciap_universidad."','"
                                        .$this->ciap_resolucion."','"
                                        .$this->ciap_fechaemision."')";
                $this->cursor_t = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo $sql;
                $resp_sp = $this->cursor_t[0]['respuesta'];
                $exito = $this->cursor_t[0]['respues_exito'];

                $ind++;

            };
        };
        // ***************   Ciclo de matriculas ***********************************
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor_t[0]['respuesta']);
        } ;

        $ind = 1;  
        $this->canmat       = $request->getParameter('canmat');
 
        if ($this->canmat>0) {
            while ($ind <= $this->canmat) { 

                $this->cipp_nro_profesion   = $request->getParameter('cipp_nro_profesion'.$ind);
                $this->cipp_entidad         = $request->getParameter('cipp_entidad'.$ind);
                $this->cipp_lugar           = $request->getParameter('cipp_lugar'.$ind);
                $this->cipp_nro_matricula   = $request->getParameter('cipp_nro_matricula'.$ind);
                $this->cipp_fechavto        = $request->getParameter('cipp_fechavto'.$ind);
                $this->cipp_id_pais         = $request->getParameter('cipp_id_pais'.$ind);
                $this->cipp_id_provincia    = $request->getParameter('cipp_id_provincia'.$ind);
          

                $sql = "AM_CAMP_INFO_PROFESIONAL_PREVIA_NOV_RS('".$_SESSION["usuario"]["username"]."','"
                                        .$_SESSION["usuario"]["username"]."','"
                                        .$this->carre."','"
                                        .$this->cipp_nro_profesion."','"
                                        .$this->cipp_entidad."','"
                                        .$this->cipp_lugar."','"
                                        .$this->cipp_nro_matricula."','"
                                        .$this->cipp_fechavto."','"
                                        .$this->cipp_id_pais."','"
                                        .$this->cipp_id_provincia."')";
                $this->cursor_m = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

                $resp_sp2 = $this->cursor_m[0]['respuesta'];
                $exito2 = $this->cursor_m[0]['respues_exito'];

                $ind++;

            };
        };

//echo $sql; print_r($_REQUEST) ; exit;
        
        if ($resp_sp2 != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor_m[0]['respuesta']);
        };

        if ($resp_sp == 'OK' and $resp_sp2 == 'OK' ) {
            $this->getUser()->setFlash('notice', $this->cursor_t[0]['respues_exito']);
        } ;

        $this->redirect("infoProfePrevia/infoProfePrevia");
    
    }
    public function executeAltaTitulo(sfWebRequest $request){

        $this->errors       = array();
        $this->notices      = array();

        $this->carre                = $_SESSION["usuario"]["carre"];

        $this->ciap_titulo          = $request->getParameter('ciap_titulo');
        $this->ciap_id_nivel        = $request->getParameter('ciap_id_nivel');
        $this->ciap_id_tipo_titulo  = $request->getParameter('ciap_id_tipo_titulo');
        $this->ciap_fechagraduacion = $request->getParameter('ciap_fechagraduacion');
        $this->ciap_instituto       = $request->getParameter('ciap_instituto');
        $this->ciap_id_pais         = $request->getParameter('ciap_id_pais');
        $this->ciap_id_provincia    = $request->getParameter('ciap_id_provincia');
        $this->ciap_id_localidad    = $request->getParameter('loca');
        $this->ciap_conva_reva      = $request->getParameter('ciap_conva_reva');
        $this->ciap_universidad     = $request->getParameter('ciap_universidad');
        $this->ciap_resolucion      = $request->getParameter('ciap_resolucion');
        $this->ciap_fechaemision    = $request->getParameter('ciap_fechaemision');             

        $sql = "A_CAMP_INFO_ACADEM_PREVIA_RS('".$_SESSION["usuario"]["username"]."','"
                                .$_SESSION["usuario"]["username"]."','"
                                .$this->carre."','"
                                .$this->ciap_titulo."','"
                                .$this->ciap_id_nivel."','"
                                .$this->ciap_id_tipo_titulo."','"
                                .$this->ciap_fechagraduacion."','"
                                .$this->ciap_instituto."','"
                                .$this->ciap_id_pais."','"
                                .$this->ciap_id_provincia."','"
                                .$this->ciap_id_localidad."','"
                                .$this->ciap_conva_reva."','"
                                .$this->ciap_universidad."','"
                                .$this->ciap_resolucion."','"
                                .$this->ciap_fechaemision."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo $sql;exit;
        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };

        $this->redirect("infoProfePrevia/infoProfePrevia");
    }
  
    public function executeAltaMatricula(sfWebRequest $request){

        $this->errors       = array();
        $this->notices      = array();
//print_r($_REQUEST); exit;
        $this->carre                = $_SESSION["usuario"]["carre"];

        $this->cipp_entidad         = $request->getParameter('cipp_entidad');
        $this->cipp_lugar           = $request->getParameter('cipp_lugar');
        $this->cipp_nro_matricula   = $request->getParameter('cipp_nro_matricula');
        $this->cipp_fechavto        = $request->getParameter('cipp_fechavto');
        $this->cipp_id_pais         = $request->getParameter('cipp_id_pais');
        $this->cipp_id_provincia    = $request->getParameter('cipp_id_provincia');
  
        $sql = "A_CAMP_INFO_PROFESIONAL_PREVIA_RS('".$_SESSION["usuario"]["username"]."','"
                                .$_SESSION["usuario"]["username"]."','"
                                .$this->carre."','"
                                .$this->cipp_entidad."','"
                                .$this->cipp_lugar."','"
                                .$this->cipp_nro_matricula."','"
                                .$this->cipp_fechavto."','"
                                .$this->cipp_id_pais."','"
                                .$this->cipp_id_provincia."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };

        $this->redirect("infoProfePrevia/infoProfePrevia");
    }


    public function executeBajaTitulo(sfWebRequest $request){

        $this->errors       = array();
        $this->notices      = array();

        $this->carre        = $_SESSION["usuario"]["carre"];
        $this->nro_titulo   = $request->getParameter('nro_titulo');
        
        $sql = "B_CAMP_INFO_ACADEM_PREVIA_RS('".$_SESSION["usuario"]["username"]."','"
                                .$_SESSION["usuario"]["username"]."','"
                                .$this->carre."','"
                                .$this->nro_titulo."')";
//echo $sql;exit;
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };

        $this->redirect("infoProfePrevia/infoProfePrevia");
    }
  
    public function executeBajaMatricula(sfWebRequest $request){

        $this->errors          = array();
        $this->notices         = array();
//print_r($_REQUEST); exit;
        $this->carre           = $_SESSION["usuario"]["carre"];
        $this->nro_profesion   = $request->getParameter('nro_profesion');
  
        $sql = "B_CAMP_INFO_PROFESIONAL_PREVIA_RS('".$_SESSION["usuario"]["username"]."','"
                                .$_SESSION["usuario"]["username"]."','"
                                .$this->carre."','"
                                .$this->nro_profesion."')";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };

        $this->redirect("infoProfePrevia/infoProfePrevia");
    }

}
