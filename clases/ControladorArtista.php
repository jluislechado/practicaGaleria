<?php

require '../clases/AutoCarga.php';

class ControladorArtista {

    function handle() {
        $bd = new DataBase();
        $gestor = new ManageArtista($bd);
        $op = Request::get("op");
        $metodo = "metodo" . $op;
        if (method_exists($this, $metodo)) {
            $this->$metodo($gestor);
        } else {
            $this->metodousuario($gestor);
        }
    }

    function metodo0() {
        $contenido = file_get_contents("../plantillas/_ver.html");
        $pagina = file_get_contents("../plantillas/_plantilla.1.html");
        $datos = array(
            "contenido" => $contenido
        );
        foreach ($datos as $key => $value) {
            $pagina = str_replace("{" . $key . "}", $value, $pagina);
        }
        echo $pagina;
    }

    function metodoregistro($gestor) {
        $alias = Request::post('alias');
        $consultaA = $gestor->getByAlias($alias)->getAlias();
        if($consultaA!=""){
            $texto="¡Error! Ya existe un artista registrado con ese alias";
            self::escribir($texto);
        }else{
        $email = Request::post('email');
        $clave = Request::post('contrasena');
        $claveR = Request::post('repeticion');
        $consulta = $gestor->get($email)->getEmail();
        if ($consulta != null) {
            $texto="¡Error! Ya existe un artista registrado con ese email";
            self::escribir($texto);
        } else {
            if ($clave === $claveR) {
                //$alias = $email;
                $claveCifrada = sha1($clave . Constant::SEMILLA);
                $plantilla = 1;
                $artista = new Artista($email, $claveCifrada, $alias, $plantilla, 0);
                $gestor->insert($artista);

                $origen = "jluislechado@gmail.com";
                $destino = $email;
                $sha1 = sha1($destino . Constant::SEMILLA);
                $asunto = "Activar tu cuenta en Galerias.com";
                $mensaje = "Confirme su registro y active su cuenta pulsando el siguiente enlace: " . "https://galeria-jluislechado.c9users.io/artista/index.php?op=activar&email=$destino&sha1=$sha1";
                require_once '../clases/Google/autoload.php';
                require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload
                $cliente = new Google_Client();
                $cliente->setApplicationName('EnviarCorreo');
                $cliente->setClientId('115672413596-eebnhh7vaacu32dgrem7g1ir672u7n62.apps.googleusercontent.com');
                $cliente->setClientSecret('isA8kjzaHQ54j5ESHcZFn9G7');
                $cliente->setRedirectUri('https://galeria-jluislechado.c9users.io/oauth/guardar.php');
                $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
                $cliente->setAccessToken(file_get_contents('../oauth/token.conf'));
                if ($cliente->getAccessToken()) {
                    $service = new Google_Service_Gmail($cliente);
                    try {
                        $mail = new PHPMailer();
                        $mail->CharSet = "UTF-8";
                        $mail->From = $origen;
                        $mail->FromName = $alias;
                        $mail->AddAddress($destino);
                        $mail->AddReplyTo($origen, $alias);
                        $mail->Subject = $asunto;
                        $mail->Body = $mensaje;
                        $mail->preSend();
                        $mime = $mail->getSentMIMEMessage();
                        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
                        $mensaje = new Google_Service_Gmail_Message();
                        $mensaje->setRaw($mime);
                        $service->users_messages->send('me', $mensaje);
                        $texto="La operación se ha realizado con éxito. Active su cuenta pinchando en el enlace que tiene en su correo";
                        self::escribir($texto);
                    } catch (Exception $e) {
                        print($e->getMessage());
                    }
                } else {
                    $texto='¡Error! No se ha realizado el envío. Inténtelo de nuevo';
                    self::escribir($texto);
                }
            } else {
                $texto="¡Error! Las contraseñas introducidas no coinciden";
                self::escribir($texto);
            }
        }
    }
    }
    function metodoactivar($gestor){
        $email = Request::get('email');
        $sha1 = Request::get('sha1');
        $emailCifrado=sha1($email . Constant::SEMILLA);
        if($emailCifrado==$sha1){
            $artista=$gestor->get($email);
            $clave=$artista->getClave();
            $alias=$artista->getAlias();
            $plantilla=$artista->getPlantilla();
            $artistaNuevo=new Artista($email,$clave,$alias,$plantilla,1);
            $gestor->set($artistaNuevo);
            //Crear carpeta
            $carpeta='../archivos/'.$alias;
            if(!file_exists($carpeta))
            {
                 mkdir($carpeta, 0777, true);
            } 
            header("Location:../index.php");
        }else{
            $texto="¡Error! No tiene permiso para acceder a este punto. Active su cuenta desde su email";
            self::escribir($texto);
        }
    }
    
    function metodologin($gestor){
        
        $alias=Request::post("alias");
        $clave=Request::post("contrasena");
        $claveCifrada=sha1($clave.Constant::SEMILLA);
        $artista=$gestor->getByAlias($alias);
        if($artista==""){
            $texto="¡Error! No existe ningún artista con el alias introducido";
            self::escribir($texto);
        }else{
            $claveAlmacenada=$artista->getClave();
            if($claveAlmacenada==$claveCifrada){
                $sesion=new Session();
                $sesion->set('_artista',$artista);
                header("Location:?op=usuario");
            }else{
                $texto="¡Error! La contraseña introducida no es válida";
                self::escribir($texto);
            }
        }
    }
    
    function metodousuario($gestor){
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
    
    function metodoelegirPlantilla($gestor) {
        $contenido = file_get_contents("../plantillas/_previsualizar.html");
        $pagina = file_get_contents("../plantillas/_plantillaPre.html");
        $datos = array(
            "contenido" => $contenido
        );
        foreach ($datos as $key => $value) {
            $pagina = str_replace("{" . $key . "}", $value, $pagina);
        }
        echo $pagina;
    }
    
    function metodoelegir($gestor){
        $opcion=Request::get("opcion");
        $sesion=new Session();
        $artista=$sesion->get('_artista');
        $email=$artista->getEmail();
        $clave=$artista->getClave();
        $alias=$artista->getAlias();
        $activo=$artista->getActivo();
        $artista2= new Artista($email,$clave,$alias,$opcion,$activo);
        $gestor->set($artista2);
        $sesion->set('_artista',$artista2);
        $texto="Se ha almacenado su elección";
        self::escribir2($texto);
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