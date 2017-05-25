<?php

/**
 * paginado comun actions.
 *
 * @package    gcbaFrontend
 * @subpackage pagcomun
 * @author     leon
 * @version    
 */
class pagcomunActions extends sfActions
{
	public function executePagcomun(sfWebRequest $request){
		// limite a mostrar por pantalla cantidad de registros
        // $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".USU_USUARIO_RS ('".$_SESSION["usuario"]["username"]."',:data); end;";
        // $cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
        $this->filasPorPagina = $_SESSION["filas_pag"] //  $cursor[0]['USUA_OPC_FILAS_PAG'];
	}
}
