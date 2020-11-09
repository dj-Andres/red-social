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

    if(isset($_POST['submut'])){
        $imagen=$_FILES['file-input']['tmp_name'];
        $tipo_imagen=exif_imagetype($_FILES['file-input']['tmp_name']);

        if ($tipo_imagen == IMAGETYPE_PNG OR  $tipo_imagen == IMAGETYPE_JPEG OR $tipo_imagen == IMAGETYPE_BMP) {
            $filtro=$_POST['filter'];
            $descripcion=$_POST['descripcion'];

            if (is_uploaded_file($_FILES['file-input']['tmp_name'])) {
                $usuario->tabla_archivos();
            }
        }
    }
?>