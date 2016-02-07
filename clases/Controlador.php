<?php
require 'clases/AutoCarga.php';
class Controlador {
   
    function handle() {
        $op = Request::get("op");
        $metodo = "metodo" . $op;
        $bd=new DataBase();
        $gestor=new ManageArtista($bd);
        if (method_exists($this, $metodo)) { 
            $this->$metodo($gestor);
        } else {
            $this->metodo0($gestor);
        }
    }

    function metodo0($gestor) {
        $contenido= file_get_contents("plantillas/_ver.html");
        $pagina = file_get_contents("plantillas/_plantilla.html");
        $datos = array(
            "contenido" => $contenido
        );
        foreach ($datos as $key => $value) {
            $pagina = str_replace("{" . $key . "}", $value, $pagina);
        }
        echo $pagina;
    }

    function metodo1($gestor) {
        $contenido= file_get_contents("plantillas/_login.html");
        $pagina = file_get_contents("plantillas/_plantilla.html");
        $datos = array(
            "contenido" => $contenido
        );
        foreach ($datos as $key => $value) {
            $pagina = str_replace("{" . $key . "}", $value, $pagina);
        }
        echo $pagina;
    }

    function metodo2($gestor) {
        $contenido=Plantilla::cargarPlantilla("plantillas/_registro.html");
        $pagina=Plantilla::cargarPlantilla("plantillas/_plantilla.html");
        $datos = array(
            "contenido" => $contenido
        );
        echo Plantilla::sustituirDatos($datos,$pagina);
    }
    
    function metodocerrar($gestor){
        $sesion=new Session();
        $sesion->destroy();
        $contenido= file_get_contents("plantillas/_ver.html");
        $pagina = file_get_contents("plantillas/_plantilla.html");
        $datos = array(
            "contenido" => $contenido
        );
        foreach ($datos as $key => $value) {
            $pagina = str_replace("{" . $key . "}", $value, $pagina);
        }
        echo $pagina;
    }
    
    function metodover($gestor){
        $listaArtistas=$gestor->getList2();
        $plantillaArtistas =Plantilla::cargarPlantilla("plantillas/_artistas.html");
        $artistas = "";
        foreach ($listaArtistas as $key => $value) {
            $artistai = str_replace("{contenido}", $value->getAlias(), $plantillaArtistas);
            $artistai = str_replace("{nombre}", $value->getAlias(), $artistai);
            $artistas .= $artistai;
            }
         $pagina = Plantilla::cargarPlantilla("plantillas/_plantilla.html");
        $datos = array(
            "contenido" => $artistas
            );
        echo Plantilla::sustituirDatos($datos,$pagina);
    }
    
    function metodoverObras($gestor){
        $bd=new DataBase();
        $gestorObra=new ManageObra($bd);
        $autor=Request::get("nombre");
        $artista=$gestor->getByAlias($autor);
        $email=$artista->getEmail();
        $plantilla=$artista->getPlantilla();
        $condicion="autor='$autor'";
        $listaObras = $gestorObra->getListWhere($condicion);
        $plantillaObras =Plantilla::cargarPlantilla("plantillas/_obras$plantilla.html");
        $obras = "";
        foreach ($listaObras as $key => $value) {
            $obrai = str_replace("{tituloObra}", $value->getNombre(), $plantillaObras);
            $obrai = str_replace("{ruta}", "../".$value->getRuta(), $obrai);
            $obrai = str_replace("{descripcion}", $value->getDescripcion(), $obrai);
            $obras .= $obrai;
        }
        $pagina = Plantilla::cargarPlantilla("plantillas/_plantillaObras1.html");
        $datos = array(
            "contenido" => $obras
            );
            echo Plantilla::sustituirDatos($datos,$pagina);
       }
}