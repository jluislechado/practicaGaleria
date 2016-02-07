<?php


class Artista {
    private $email;
    private $clave;
    private $alias;
    private $plantilla;
    private $activo;
    
    function __construct($email=null, $clave=null, $alias=null, $plantilla=null,$activo=0) {
        $this->email = $email;
        $this->clave = $clave;
        $this->alias = $alias;
        $this->plantilla = $plantilla;
        $this->activo = $activo;
    }
    
    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getAlias() {
        return $this->alias;
    }

    function getPlantilla() {
        return $this->plantilla;
    }
    
    function getActivo() {
        return $this->activo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setPlantilla($plantilla) {
        $this->plantilla = $plantilla;
    }
    
    function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }

}