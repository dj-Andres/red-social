<?php
session_start();
if (!empty($_SESSION['id_usuario'])) {
    include_once('./template/header.php');
    
?>
    <script src="../js/jquery1.min.js"></script>
    <script src="../js/fotos.js"></script>
    <?php include_once('./template/barra.php') ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="hl-icon" style="margin-left: 49%;">
            <div class="image-upload">
                <label for="file-input">
                    <img src="../img/icons/mas.png" width="50" title="Sube una foto ó video">
                </label>
                <input id="file-input" type="file" name="file-input" hidden="" />
            </div>
        </div>

        <body onload="capturar()">

            <div style="float: left; margin-left: 3%;">
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="reyes" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="reyes" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="sierra" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="sierra" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="gingham" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="gingham" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="stinson" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="stinson" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="maven" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="maven" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="kelvin" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="kelvin" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="Lo-Fi" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="Lo-Fi" width="150">
                    </label>
                </div>
                <div class="imgcheck">
                    <label>
                        <input type="radio" name="filter" value="moon" onclick="capturar()">
                        <img src="../img/filtro.jpg" class="moon" width="150">
                    </label>
                </div>
            </div>
            <div style="float: left; clear: both; width: 600px; margin-left: 30%;">
                <div id="resultado" class=""><img id="imgSalida" width="600" /></div>
            </div>

            <div style="float: left; clear: both; margin-top: 30px; margin-bottom: 30px; margin-left: 24%;">
                <textarea rows="6" cols="100%" name="descripcion" placeholder="Descripción de tu publicación"></textarea>
            </div>

            <div style="float: left; clear: both; margin-left: 45%;">
                <input name="subir" type="submit" class="myButton" value="Compartir" id="subir">
            </div>
    </form>
<?php
    include_once('./template/footer.php');
} else {
    header('Location:../index.php');
}
?>
<?php
 include_once '../models/usuario.php';

 $publicaciones=new Usuario();

 //session_start();

 $id=$_SESSION['id_usuario'];

 if(!isset($_POST['subir'])){
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