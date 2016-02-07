<?php
require '../clases/AutoCarga.php';
$bd=new DataBase();
$gestor=new ManageUsuario($bd);
$sesion=new Session();
$email=Request::get('email');
$clave=Request::get('sha1');
$usuario=$gestor->get($email);
$usuario->setActivo(1);
echo 'el usuario se ha registrado correctamente';
$sesion->sendRedirect('../php/login.php');


    
    ?>
