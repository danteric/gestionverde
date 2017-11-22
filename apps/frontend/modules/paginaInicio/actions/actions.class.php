
<?php
class paginaInicioActions extends sfActions
{
	 public function executeHome(sfWebRequest $request) {

        $this->errors          = array();
        $this->notices         = array();
        $this->cursor          = array(0);


        $sql = "USU_GET_LAST_LOGIN_RS('".$_SESSION["usuario"]["username"]."')" ;
        $this->last_lg = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);


          
    }
}
?>