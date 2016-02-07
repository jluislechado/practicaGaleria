<?php


class ManageArtista {
    
    private $bd = null;
    private $tabla = "artista";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($email){
        //devuelve un objeto de la clase artista
        $parametros = array();
        $parametros['email'] = $email;
        $this->bd->select($this->tabla, "*", "email=:email", $parametros);
        $fila=$this->bd->getRow();
        $artista = new Artista();
        $artista->set($fila);
        return $artista;
    }
    
    function getByAlias($alias) {//pasandole el alias convierto una fila de mi tabla en un objeto artista
        $parametros['alias'] = $alias;
        $this->bd->select($this->tabla, "*", "alias=:alias", $parametros);
        $fila = $this->bd->getRow();
        $artista = new Artista();
        $artista->set($fila);
        return $artista;
}

    function getListWhere($condicion,$pagina=1, $nrpp=Constant::NRPF){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, array(), "email, alias","", $registroInicial, $nrpp);
         $r=array();
         while($fila =$this->bd->getRow()){
             $artista = new Artista();
             $artista->set($fila);
             $r[]=$artista;
         }
         return $r;
    }
    
    function getListOrder($orden='email',$criterio='asc',$pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select2($this->tabla, "*", "1=1", array(), $orden,$criterio,"" ,$registroInicial, $nrpp);
         $r=array();
         while($fila =$this->bd->getRow()){
             $artista = new Artista();
             $artista->set($fila);
             $r[]=$artista;
         }
         return $r;
    }
    function getListProyeccion($proyeccion,$orden,$criterio,$pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, $proyeccion, "1=1", array(), $orden,$criterio, "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $artista = new Artista();
             $artista->set($fila);
             $r[]=$artista;
         }
         return $r;
    }
    function getList($proyeccion='*',$orden='email',$criterio='1', $pagina=1, $nrpp=Constant::NRPF){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, $proyeccion, "1=1", array(), $orden, $criterio, "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $artista = new Artista();
             $artista->set($fila);
             $r[]=$artista;
         }
         return $r;
    }
    function delete($email) {
        $parametros = array();
        $parametros['email'] = $email;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function deleteArtistas($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }
    function set(Artista $artista) {
        $parametrosSet = array();
        $parametrosSet['email'] = $artista->getEmail();
        $parametrosSet['clave'] = $artista->getClave();
        $parametrosSet['alias']=$artista->getAlias();
        $parametrosSet['plantilla']=$artista->getPlantilla();
        $parametrosSet['activo']=$artista->getActivo();
        $parametrosWhere = array();
        $parametrosWhere['email'] = $artista->getEmail();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function set2(Usuario $usuario) {
        $parametrosSet = array();
        $parametrosSet['email'] = $artista->getEmail();
        $parametrosSet['clave'] = $artista->getClave();
        $parametrosSet['alias']=$artista->getAlias();
        $parametrosSet['plantilla']=$artista->getPlantilla();
        $parametrosSet['activo']=$artista->getActivo();
        $parametrosWhere = array();
        $parametrosWhere['alias'] = $artista->getAlias();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function insert(Artista $artista) {
        $parametrosSet = array();
        $parametrosSet['email'] = $artista->getEmail();
        $parametrosSet['clave'] = $artista->getClave();
        $parametrosSet['alias']=$artista->getAlias();
        $parametrosSet['plantilla']=$artista->getPlantilla();
        $parametrosSet['activo']=$artista->getActivo();
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
         $this->bd->select($this->tabla, "*", "1=1", array(), "email, alias", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $artista = new Artista();
             $artista->set($fila);
             $r[]=$artista;
         }
         return $r;
    }
}