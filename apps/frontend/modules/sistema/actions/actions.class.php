<?php
/**
 * notas actions.
 * @package    gcbaFrontend
 * @subpackage notas
 * @author     leon
 * @version   
 */
class sistemaActions extends sfActions
{
	public function executeSalir(sfWebRequest $request){
		if($_SESSION["usuario"]["modi"] != "S"){
		    $this->redirect("errores/forbidden");
		}
			$this->redirect("sfGuardAuth/signout");
	}
        public function executeManualdeusuario(sfWebRequest $request){
           // return $this->renderPartial
           // ('ayuda/manual_sistema', array('valor' =>''));

         }
}
