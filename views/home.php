<?php
session_start();
if (!empty($_SESSION['id_usuario'])) {
    include_once('./template/header.php')
?>
<body>
<?php include_once('./template/barra.php') ?>
        <div class="h-content">
            <div class="h-left">
                <div class="hl-cont">
                    <div class="hl-top">
                        <div class="hl-profile">
                            <div class="hl-pic"><a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>"><img src="img/<?php echo $_SESSION['avatar']; ?>" width="50" height="50"></a></div>
                        </div>
                        <div class="hl-username">
                            <div class="hl-name"><a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>"><?php echo $_SESSION['usuario']; ?></a></div>
                            <div class="hl-location">location</div>
                        </div>
                    </div>
                    <div class="hl-middle">
                        <img src="archivos" width="100%" class="">
                    </div>
                    <div class="hl-section-likes">
                        <div id="" class="like" style="float: left; cursor: pointer;">
                            <img src="img/icons/cora.png">
                        </div>
                        <div id="" class="like" style="float: left; cursor: pointer;">
                            <img src="img/icons/cora2.png">
                        </div>
                        <div style="float: left;">
                            <img src="img/icons/comentario.png">
                        </div>
                        <div id="FAV" class="fav" style="float: left;">
                            <img src="img/icons/favorito.png">
                        </div>
                        <div id="FAV" class="fav" style="float: left;">
                            <img src="img/icons/favorito2.png">
                        </div>
                    </div>
                    <div class="hl-bottom">
                        <strong style="color: #262626;"><?php echo $_SESSION['usuario']; ?></strong>
                    </div>
                    <div id="comentarios">
                        <form action="" method="" id=""><input type="hidden" name="idpublicacion" value=" ">
                            <input type="hidden" name="usuariocomenta" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <textarea id="comentario" name="comentario" style="width:600px; right:-100px; "></textarea>
                            <button class="button_blue" style="position: relative; right:-480px;"> Comentario </button>
                        </form>
                    </div>
                </div>
                <div class="h-right">
                    <div class="hl-menu">
                        <div class="hl-icon">
                            <img src="img/icons/lupa.png" width="50">
                        </div>
                        <div class="hl-icon">
                            <a href="subir.php"><img src="images/icons/mas.png" width="50" title="Sube una foto ó video"></a>
                        </div>
                        <div class="hl-icon">
                            <img src="img/icons/corazon.png" width="50">
                        </div>
                    </div>
                    <div class="hr-top">
                        <div class="hr-profile">
                            <div class="hr-pic"><a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>"><img src="img" width="60" height="60"></a></div>
                        </div>
                        <div class="hr-username">
                            <div class="hr-name">
                                <a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>"><?php echo $_SESSION['usuario']; ?></a>
                            </div>
                            <div class="hr-nombre"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
<?php
    include_once('./template/footer.php');
 }else{
    header('Location:../index.php');
}
?>