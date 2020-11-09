<?php
session_start();
if (!empty($_SESSION['id_usuario'])) {
    include_once('./template/header.php');
    
?>
    <script src="../js/jquery1.min.js"></script>
    <script src="../js/fotos.js"></script>
    <?php include_once('./template/barra.php') ?>

    <form action="../../controllers/controller-usuario.php" method="POST" enctype="multipart/form-data">

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
                <input name="submit" type="submit" class="myButton" value="Compartir">
            </div>
    </form>
<?php
    include_once('./template/footer.php');
} else {
    header('Location:../index.php');
}
?>