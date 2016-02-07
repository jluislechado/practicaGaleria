<?php


class ManageObra {
    
    private $bd = null;
    private $tabla = "obra";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($ruta){
        //devuelve un objeto de la clase artista
        $parametros = array();
        $parametros['ruta'] = $ruta;
        $this->bd->select($this->tabla, "*", "ruta=:ruta", $parametros);
        $fila=$this->bd->getRow();
        $obra = new Obra();
        $obra->set($fila);
        return $obra;
    }
    function getListWhere($condicion,$pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, array(), "nombre","", $registroInicial, $nrpp);
         $r=array();
         while($fila =$this->bd->getRow()){
             $obra = new Obra();
             $obra->set($fila);
             $r[]=$obra;
         }
         return $r;
    }
    function getList($proyeccion='*',$orden='nombre',$criterio='1', $pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, $proyeccion, "1=1", array(), $orden, $criterio, "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $obra = new Obra();
             $obra->set($fila);
             $r[]=$obra;
         }
         return $r;
    }
    function delete($ruta) {
        $parametros = array();
        $parametros['ruta'] = $ruta;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function deleteObras($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }
    function set(Obra $obra) {
        $parametrosSet = array();
        $parametrosSet['ruta'] = $obra->getRuta();
        $parametrosSet['nombre']=$obra->getNombre();
        $parametrosSet['autor']=$obra->getAutor();
        $parametrosSet['descripcion']=$obra->getDescripcion();
        $parametrosWhere = array();
        $parametrosWhere['ruta'] = $obra->getRuta();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function insert(Obra $obra) {
        $parametrosSet = array();
        $parametrosSet['ruta'] = $obra->getRuta();
        $parametrosSet['nombre']=$obra->getNombre();
        $parametrosSet['autor']=$obra->getAutor();
        $parametrosSet['descripcion']=$obra->getDescripcion();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    function getValuesSelect($proyeccion,$orden){
        $this->bd->query($this->tabla, $proyeccion, array(), $orden);
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[0];
        }
        return $array;
    }
    
    function getValuesSelect2($proyeccion,$orden){
        $this->bd->query($this->tabla, $proyeccion, array(), $orden);
        $array = array();
        $i=0;
        while($fila=$this->bd->getRow()){
            $array[$i] = $fila[0];
            $i++;
        }
        return $array;
    }
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function getList2($pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), "nombre", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $obra = new Obra();
             $obra->set($fila);
             $r[]=$obra;
         }
         return $r;
    }
}