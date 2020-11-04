<?php
    include_once '../models/usuario.php';
    session_start();
    
    $login=new Usuario();

    $usuario=$_POST['usuario'];
    $clave=$_POST['password'];

    if(!empty($_SESSION['id_usuario'])){
        header('Location:../views/home.php');
    }else{
        
        $login->login($usuario,$clave);

        if(!empty($login->objetos)){
            foreach ($login->objetos as $objeto) {
                $_SESSION['id_usuario']=$objeto->id_usuario;
                $_SESSION['usuario']=$objeto->usuario;
                $_SESSION['correo']=$objeto->email;
                $_SESSION['nombre']=$objeto->nombre;
                $_SESSION['avatar']=$objeto->avatar;
            }
            header('Location:../views/home.php');
        }else{
            header('Location:../index.php');
        }
    }
?>