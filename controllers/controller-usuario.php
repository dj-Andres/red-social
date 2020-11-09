<?php 
    include_once '../models/usuario.php';
    
    $usuario=new Usuario();

    if($_POST['funcion']=='registrar'){
        $correo=$_POST['correo'];
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $avatar='avatar.png';

        $usuario->crear($correo,$nombre,$usuario,$clave,$avatar);
    }
?>