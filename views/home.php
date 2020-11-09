<?php
session_start();
if (!empty($_SESSION['id_usuario'])) {
    include_once('./template/header.php')
?>

    <body>
        <?php include_once('./template/barra.php') ?>

        <div class="h-content">        
            <div class="h-right">		
            <div class="hl-menu">
                <div class="hl-icon"><img src="../img/icons/lupa.png" width="50"></div>
                <div class="hl-icon"><a href="subir.php"><img src="../img/icons/mas.png" width="50" title="Sube una foto ó video"></a></div>
                <div class="hl-icon"><img src="../img/icons/corazon.png" width="50"></div>
            </div>
            <div class="hr-top">
                <div class="hr-profile">
                    <div class="hr-pic"><a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>"><img src="../img/<?php echo $_SESSION['avatar'];?>" width="60" height="60"></a></div>
                </div>
                    <div class="hr-username">
                        <div class="hr-name"><a href="perfil.php?username=<?php echo $_SESSION['usuario']; ?>">Diego</a></div>
                    <div class="hr-nombre"><?php echo $_SESSION['usuario']; ?></div>
                </div>	
            </div>	
	    </div>
        
<?php
    include_once('./template/footer.php');
} else {
    header('Location:../index.php');
}
?>