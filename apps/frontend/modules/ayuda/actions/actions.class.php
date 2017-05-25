<?php
/**
 * notas actions.
 * @package    gcbaFrontend
 * @subpackage notas
 * @author     Your name here
 * @version   
 */
class ayudaActions extends sfActions
{
	public function executeDatos_footer(sfWebRequest $request){
	
	}
	public function executeDatos_top(sfWebRequest $request){
	
	}
	public function executeManual_sistema(sfWebRequest $request){

	 $this->valor = $request->getParameter('valor');
	 //echo  $this->valor; exit;
	 return $this->renderPartial('ayuda/manual_sistema', array('valor' =>$this->valor));
	 
	}
    public function executeManual_sistemaHelp(sfWebRequest $request){
             
     $this->valorayuda = $request->getParameter('valor');
     $this->valorayudaformulario = $request->getParameter('valor2');
     
     if (isset($this->valorayudaformulario) && $this->valorayudaformulario != '') {
        $this->valor = $request->getParameter('valor2'); 
     }else {
        $this->valor = $request->getParameter('valor'); 
     }  
     $this->titulo = '';
     $this-> texto = '';
     $this->relacion = '';
     $this->img = '';
     $this->enlace = '';
     $this->ancho = '';
     //echo  $this->valor; //exit;
     $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_USUARIOS_AYUDA_RS('".$this->valor."', :data); end;";
     $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
     //echo "<pre>";echo $sql;  print_r($this->cursor2);  exit;
     
     foreach($this->cursor as $row) {  
                         $this->enlace = $row['UHLP_ENLACE'];
                         $this->titulo = $row['UHLP_TITULO']; 
                         $this->texto = $row['UHLP_TEXTO'];
                         $this->relacion = $row['UHLP_RELAC'];
                         $this->img = $row['UHLP_LOC_IMAGEN'];
                         $this->ancho = $row['UHLP_IMGANCHO'];
                }
     if($this->enlace == null) {
         //echo "NO EXISTE AYUDA";
     } else {
         //echo "EXISTE AYUDA";
     }
     return $this->renderPartial('ayuda/manual_sistema', array('valor' =>$this->enlace,
                                                               'titulo' =>$this->titulo,
                                                               'texto' =>$this->texto,
                                                               'relacion' =>$this->relacion,
                                                               'enlace' =>$this->enlace,
                                                               'img' =>$this->img,
                                                               'ancho'=> $this->ancho
                                                               ));
    }
    public function executeManual_sistemaGral(sfWebRequest $request){

     $this->valorayuda = $request->getParameter('valor');
     $this->titulo = '';
     $this-> texto = '';
     $this->relacion = '';
     $this->img = '';
     $this->enlace = '';
     //echo  $this->valor; //exit;
     $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_USUARIOS_AYUDA_RS2('".$this->valorayuda."', :data); end;";
     $this->cursor = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
     //echo "<pre>";echo $sql;  print_r($this->cursor);  //exit;
    
     return $this->renderPartial('ayuda/manual_sistemaGral', array('valor' =>$this->cursor,'contienealgo'=> $this->valorayuda));
    }
     public function executeTraeAyuda(sfWebRequest $request)
    {
        $this->valorayuda = $request->getParameter('valorbusqueda');
        //echo $this->nombre; exit;

          $sql = "begin ".sfConfig::get('SCHEMA_ORACLE').".SEL_USUARIOS_AYUDA_RS2('".$this->valorayuda."', :data); end;";
          $this->resultactividad = BackendServices::getInstance()->getResultsFromStoreProcedure($sql);
          //echo "<pre>"; print_r($this->resultactividad); exit;
         
         return $this->renderPartial('ayuda/resultado_ayuda', array('resulactivi' =>$this->resultactividad));
    }

}
