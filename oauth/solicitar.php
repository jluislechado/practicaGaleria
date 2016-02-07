<?php

session_start();

require_once '../clases/Google/autoload.php';

$cliente = new Google_Client();

$cliente->setApplicationName('proyectoEnviarCorreoDesdeGmail');

$cliente->setClientId('978263362475-psgg4drljoa0lpnfinod4h91v1dmlauv.apps.googleusercontent.com'); 

$cliente->setClientSecret('xoTPKiCpi1pAM1kdpPIjo-iv');

$cliente->setRedirectUri('https://galeria-jluislechado.c9users.io/oauth/guardar.php');

$cliente->setScopes('https://mail.google.com/');

$cliente->setAccessType('offline');

if (!$cliente->getAccessToken()) {

   $auth = $cliente->createAuthUrl(); //solicitud

   header("Location: $auth");

}
