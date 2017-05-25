<?php

/**
 * Fecha: 30/08/2016
 * CREADO POR : Mariano Drets
 * Proyecto: campus
 */
class docAsubirActions extends sfActions {

    public function executeDocAsubir(sfWebRequest $request) {
        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);

        $sql = "SEL_CAMP_CABE_ALUMNO_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->dd_cabe = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $sql = "SEL_CAMP_DOCUMENTACION_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."',null)";                      
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
//echo "<pre>"; print_r($this->dd_cabe); exit;
    }

    public function executeFormularioDocAsubir(sfWebRequest $request){
        $this->errors  = array();
        $this->notices = array();
        $this->usr_rol = $request->getParameter('usr_rol');
        $this->notas   = "";
        $this->alta    = 1;
        
        $sql = "GET_CAMP_DOCUMEN_TIPO_A_SUBIR_RS();";
        $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        #echo $sql; echo "<pre>"; print_r($this->roles);exit;
    }


    public function executeGuardar(sfWebRequest $request){
           
        $this->errors = array();
        $this->notices = array();
        $this->cursor  = array();

        $archivo        = $_FILES["get_archivo"]["tmp_name"]; 
        $tamanio        = $_FILES["get_archivo"]["size"];
        $tipo           = $_FILES["get_archivo"]["type"];
        $nombre         = $_FILES["get_archivo"]["name"];
        $cdsu_id_tipoadjunto = $request->getParameter('cdsu_id_tipoadjunto');
        $cdsu_nota           = $request->getParameter('cdsu_nota');
//echo "<pre>";print_r($_FILES); 
        if ( $archivo != "none" and $nombre!='' ) {
            $fp        = fopen($archivo,"rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 

            $sql = "AM_CAMP_DOCUMEN_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."','"
                                                 .$_SESSION["usuario"]["username"]."',"
                                                 ."null,"
                                                 .$cdsu_id_tipoadjunto.",'"
                                                 .$contenido."','"
                                                 .$nombre."','"
                                                 .$tipo."','"
                                                 .$cdsu_nota."',"
                                                 .$tamanio.")";
            $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

            $resp_sp = $this->cursor[0]['respuesta'];
            $exito = $this->cursor[0]['respues_exito'];
//echo $sql,' resp:',$resp_sp,' exito:',$exito;exit;

            if ($resp_sp == null) { 

                $this->getUser()->setFlash('error', 'No se concreto la Operacion: Error al subir el archivo');
            } else {
               if ($resp_sp != 'OK') {
                    $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
                }else{
                    $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
                } ;
            };

        } else { 
            $this->getUser()->setFlash('error', 'No se seleccionó archivo para subir'); 
        }

        $this->redirect("docAsubir/docAsubir");
    }

    public function executeDownload(sfWebRequest $request)
    {

        $cdsu_id  = $request->getParameter('cdsu_id');
        $sql = "SEL_CAMP_DOCUMENTACION_DOWNLOAD_NOV('".$_SESSION["usuario"]["username"]."',"
                                                      .$cdsu_id.")";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        foreach($this->cursor as $row){ };
  
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: '".$row['cdsu_tipo']."'");
        header("Content-Disposition: attachment; filename=".$row['cdsu_nombre']);
        header("Content-Transfer-Encoding: binary");
        print $row['cdsu_doc']; 

        $this->redirect("docAsubir/docAsubir");
    }
  
    public function executeFormularioBajaDocAsubir(sfWebRequest $request){

        $this->errors = array();
        $this->notices = array();
        $this->cdsu_id = $request->getParameter('cdsu_id');
        
        $sql = "SEL_CAMP_DOCUMENTACION_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."',".$this->cdsu_id.")";                      
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo "<pre>"; echo $sql; print_r($this->cursor); exit;

    }

    public function executeEliminar(sfWebRequest $request){
           
        $this->errors = array();
        $this->notices = array();
        $this->cursor  = array();
        $this->cdsu_id = $request->getParameter('cdsu_id');
        
        $sql = "B_CAMP_DOCUMEN_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."','"
                                            .$_SESSION["usuario"]["username"]."',"
                                            .$this->cdsu_id.")";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
//echo $sql,' resp:',$resp_sp,' exito:',$exito;exit;
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };
         
        $this->redirect("docAsubir/docAsubir");

    }

    public function executeFormularioModiDocAsubir(sfWebRequest $request){

        $this->errors = array();
        $this->notices = array();
        $this->cdsu_id = $request->getParameter('cdsu_id');

        $sql = "GET_CAMP_DOCUMEN_TIPO_A_SUBIR_RS();";
        $this->dd_tipo = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        
        $sql = "SEL_CAMP_DOCUMENTACION_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."',".$this->cdsu_id.")";                      
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        //echo "<pre>"; echo $sql; print_r($this->cursor); exit;

    }

    public function executeModificar(sfWebRequest $request){
           
        $this->errors = array();
        $this->notices = array();
        $this->cursor  = array();

        $this->cdsu_id              = $request->getParameter('cdsu_id');
        $this->cdsu_id_tipoadjunto  = $request->getParameter('cdsu_id_tipoadjunto');
        $this->cdsu_nota            = $request->getParameter('cdsu_nota');
//print_r($_REQUEST);
        $sql = "AM_CAMP_DOCUMEN_SUBIDA_NOV('".$_SESSION["usuario"]["username"]."','"
                                             .$_SESSION["usuario"]["username"]."',"
                                             .$this->cdsu_id.","
                                             .$this->cdsu_id_tipoadjunto.","
                                             ."null,"
                                             ."null,"
                                             ."null,'"
                                             .$this->cdsu_nota."',"
                                             ."null)";
        $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);

        $resp_sp = $this->cursor[0]['respuesta'];
        $exito = $this->cursor[0]['respues_exito'];
//echo $sql,' resp:',$resp_sp,' exito:',$exito;exit;
        if ($resp_sp != 'OK') {
            $this->getUser()->setFlash('error', $this->cursor[0]['respuesta']);
        }else{
            $this->getUser()->setFlash('notice', $this->cursor[0]['respues_exito']);
        };
         
        $this->redirect("docAsubir/docAsubir");

    }

}
