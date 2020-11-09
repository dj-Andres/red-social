<?php
 include_once '../models/usuario.php';

 $publicaciones=new Usuario();

 session_start();

 $id=$_SESSION['id_usuario'];

 if(isset($_POST['subir'])){
    $imagen=$_FILES['file-input']['tmp_name'];
    $tipo_imagen=exif_imagetype($_FILES['file-input']['tmp_name']);

    if ($tipo_imagen == IMAGETYPE_PNG OR  $tipo_imagen == IMAGETYPE_JPEG OR $tipo_imagen == IMAGETYPE_BMP) {
        $filtro=$_POST['filter'];
        $descripcion=$_POST['descripcion'];

        if (is_uploaded_file($_FILES['file-input']['tmp_name'])) {
            $publicaciones->tabla_archivos();
            $extension=".jpg";

            $nombrefinal=trim($_FILES['file-input']['name']);
            $nombrefinal=str_replace(" "," ",$nombrefinal);
            $ramdon=substr(strtoupper(md5(microtime(true))),0,6);
            $nombrefinal='NAME-'.$ramdon;

            if ($tipo_imagen == IMAGETYPE_PNG) {
                $imagen=imagecreatefromgd($imagen);
                imagejpeg($imagen,'files/'.$nombrefinal.$extension,100);
                $nuevaimagen='files/'.$nombrefinal.$extension;
            }else{
                $nuevaimagen=$imagen;
            }

            $foto_original=imagecreatefromjpeg($nuevaimagen);
            $ancho_maximo=1080; $alto_maximo=1080;

            $x_radio=$ancho_maximo / $ancho;
            $y_radio=$alto_maximo / $alto;

            if(($ancho <=$ancho_maximo) && ($alto <= $alto_maximo)){
                $ancho_final=$ancho;
                $alto_final=$alto;
            }else if(($x_radio * $alto) < $alto_maximo){
                $alto_final= ceil($x_radio * $alto);
                $ancho_final=$ancho_maximo;
            }else{
                $ancho_final=ceil($y_radio * $ancho);
                $alto_final=$alto_maximo;
            }

            $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
            imagecopyresampled($lienzo,$foto_original,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);
            imagedestroy($foto_original);
            imagejpeg($lienzo,"files/".$nombrefinal.$extension);
        }
        if($_FILES['file-input']['tmp_name']){
            $tipo=$_FILES['file-input']['type'];
            $tamaño=$_FILES['file-input']['size'];
            $foto_name=$nombrefinal.$extension;

            $publicaciones->publicaciones($descripcion,$id);
            $publicaciones->ultima_publicacion($id);
            $id_publicacion=$publicaciones->ultima_publicacion($id);
            $publicaciones->archivos($id,$foto_name,$tipo,$tamaño,$id_publicacion,$filtro);

            header("refresh: 0; url = home.php");
        }
    }
}else{
    echo "<script>alert('Solo puedes subir imágenes');</script>";
}
?>