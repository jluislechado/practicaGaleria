<?php

class Obra {
    private $ruta;
    private $nombre;
    private $autor;
    private $descripcion;
    
    function __construct($ruta=null, $nombre=null, $autor=null, $descripcion=null) {
        $this->ruta = $ruta;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->descripcion=$descripcion;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAutor() {
        return $this->autor;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
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