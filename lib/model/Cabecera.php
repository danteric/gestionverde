<?php 

class Cabecera {
  protected 
    $titulo, $filtros;
  protected $rutas, $acciones = array();
  public $fija = true;
  public function titulo($titulo)
  {
    $this->titulo = $titulo;
    return $this;
  }
  public function ruta($ruta)
  {
    $this->rutas[] = $ruta;
    return $this;    
  }
  public function boton($nombre)
  {
    return $this->accion(get_partial('estilos/btn-'.$nombre));
  }
  public function accion($accion)
  {
    $this->acciones[] = $accion;
    return $this;
  }
  public function ini_filtro($nombre)
  {
    slot($nombre);
    return $this;
  }
  public function fin_filtro($nombre)
  {
    end_slot($nombre);
    return $this->filtro($nombre, get_slot($nombre));
  }
  public function filtro($nombre, $filtro)
  {
    if(is_null($nombre)):
      $this->filtros[] = $filtro;
    else:
      $this->filtros[$nombre] = $filtro;
    endif;
    return $this;
  }
  public function __toString()
  {
    return $this->render();
  }
  public function render()
  {
    $args = new stdClass();
    $args->titulo   = $this->titulo;
    $args->rutas    = $this->rutas;
    $args->acciones = $this->acciones;
    $args->filtros  = $this->filtros;
    $args->fija     = $this->fija;
    return get_partial('estilos/cab-mod', array('cabecera'=>$args));
  }
}