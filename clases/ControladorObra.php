<?php

require '../clases/AutoCarga.php';

class ControladorObra {

    function handle() {
        $bd = new DataBase();
        $gestor = new ManageObra($bd);
        $op = Request::get("op");
        $metodo = "metodo" . $op;
        if (method_exists($this, $metodo)) {
            $this->$metodo($gestor);
        } else {
            $this->metodo0();
        }
    }

    function metodo0() {
        $sesion=new Session();
        $artista=$sesion->get('_artista');
        if($artista==null){
            $texto="¡Error! No tiene permiso para acceder a esta zona. Imprescindible inscribirse";
            self::escribir($texto);
        }else{
            $contenido = file_get_contents("../plantillas/_usuario.html");
            $pagina = file_get_contents("../plantillas/_plantilla.1.html");
            $datos = array(
                "contenido" => $contenido
            );
            foreach ($datos as $key => $value) {
                $pagina = str_replace("{" . $key . "}", $value, $pagina);
            }
            echo $pagina;
            }
    }
    
    function metodoviewInsertar($gestor){
        $contenido=Plantilla::cargarPlantilla("../plantillas/_insertar.html");
        $pagina=Plantilla::cargarPlantilla("../plantillas/_plantilla2.html");
        $datos = array(
            "contenido" => $contenido
        );
        echo Plantilla::sustituirDatos($datos,$pagina);
    }
    
    function metodoinsertarObra($gestor){
        $subir= new UploadFile("archivo");
        $sesion=new Session();
        $alias=$sesion->get("_artista")->getAlias();
        $subir->setDestino("../archivos/$alias/");
        $subir->setPolitica(UploadFile::RENOMBRAR);
        if($subir->upload()){
            //Si la sube, la insertamos en la base de datos
            $nombreA=$subir->getNombre();
            $extension=$subir->getExtension();
            $nombreArchivo=$nombreA.".".$extension;
            $ruta="archivos/$alias/$nombreArchivo";
            $nombre=Request::post('nombre');
            $descripcion=Request::post('descripcion');
            $obra=new Obra($ruta,$nombre,$alias,$descripcion);
            $gestor->insert($obra);
            $texto="Obra almacenada en la base de datos";
            self::escribir2($texto);
        } else{
            $texto="No se ha podido almacenar la obra";
            self::escribir2($texto); 
        }
    }
    
    function metodoeliminarObra($gestor){
            $sesion=new Session;
            $autor=$sesion->get('_artista')->getAlias();
            $condicion="autor='$autor'";
            $listaObras = $gestor->getListWhere($condicion);
            $plantillaObras =Plantilla::cargarPlantilla("../plantillas/_obras.html");
            $obras = "";
            foreach ($listaObras as $key => $value) {
            $obrai = str_replace("{contenido}", $value->getNombre(), $plantillaObras);
            $obrai = str_replace("{ruta}", $value->getRuta(), $obrai);
            $obras .= $obrai;
        }
        $pagina = Plantilla::cargarPlantilla("../plantillas/_plantilla.1.html");
        $datos = array(
            "contenido" => $obras
        );
        echo Plantilla::sustituirDatos($datos,$pagina);
      
    }
    function metodoborrar($gestor){
        $ruta=Request::get("ruta");
        $gestor->delete($ruta);
        unlink("../".$ruta);
        header("Location:?op=eliminarObra");
    }
    
    function metodoprevisualizar($gestor){
            $sesion=new Session;
            $autor=$sesion->get('_artista')->getAlias();
            $condicion="autor='$autor'";
            $plantillaElegida=$sesion->get('_artista')->getPlantilla();
            $listaObras = $gestor->getListWhere($condicion);
            $plantillaObras =Plantilla::cargarPlantilla("../plantillas/_obras$plantillaElegida.html");
            $obras = "";
            foreach ($listaObras as $key => $value) {
            $obrai = str_replace("{ruta}", "../".$value->getRuta(), $plantillaObras);
            $obrai = str_replace("{tituloObra}", $value->getNombre(), $obrai);
            $obrai = str_replace("{descripcion}", $value->getDescripcion(), $obrai);
            $obras .= $obrai;
        }
        $pagina = Plantilla::cargarPlantilla("../plantillas/_plantillaObras1.html");
        $datos = array(
            "contenido" => $obras
        );
        echo Plantilla::sustituirDatos($datos,$pagina);
      
    }
    
    function escribir($mensaje){
            $contenido = Plantilla::cargarPlantilla("../plantillas/_mensaje.html");
            $datos = array(
                "mensaje" => $mensaje
            );
            $contenido=Plantilla::sustituirDatos($datos, $contenido);
            $pagina = Plantilla::cargarPlantilla("../plantillas/_plantilla.1.html");
            $datos = array(
                "contenido" => $contenido
            );
            echo Plantilla::sustituirDatos($datos, $pagina);
    }
    
    function escribir2($mensaje){
            $contenido = Plantilla::cargarPlantilla("../plantillas/_mensajeartista.html");
            $datos = array(
                "mensaje" => $mensaje
            );
            $contenido=Plantilla::sustituirDatos($datos, $contenido);
            $pagina = Plantilla::cargarPlantilla("../plantillas/_plantilla.1.html");
            $datos = array(
                "contenido" => $contenido
            );
            echo Plantilla::sustituirDatos($datos, $pagina);
    }
}