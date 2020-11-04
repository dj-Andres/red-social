<?php
    include_once '../models/usuario.php';
    session_start();
    
    $login=new Usuario();

    $usuario=$_POST['usuario'];
    $clave=$_POST['password'];

    $login->login($usuario,$clave);

    foreach ($login->objetos as $objeto) {
        $_SESSION['id_usuario']=$objeto->id_usuario;
        $_SESSION['usuario']=$objeto->usuario;
        $_SESSION['correo']=$objeto->email;
        $_SESSION['nombre']=$objeto->nombre;
    }

?>