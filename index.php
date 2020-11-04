<!DOCTYPE html>
<html lang="es">
<head>
	<title>Instagram</title>
	<meta charset="utf-8">
	<meta name="description" content="Red Social basada en Instagram hecha con PHP 7">
	<meta name="keywords" content="Photogram,PHP,Instagram,Red Social">
	<meta name="author" content="Diego Jimenez" />
	<meta name="copyrigth" content="Dj-Andres">
	<meta name="robots" content="index">
	<link rel="icon" type="img/jpg" href="img/icons/instagram.jpg">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/instagram.css">
</head>
<?php 
  session_start();
  if(!empty($_SESSION['id_usuario'])){
    header('Location:controllers/controller-login.php');
  }else{
    session_destroy();
?>
<body>
 <div id="wrapper">
 	<div class="w-left"><img src="img/celulares.png"></div>
    <div class="w-right">
      	<div class="main-content">
        <div class="header">
          <img src="img/logo.png">
        </div>
        <div class="l-part">
          <form action="controllers/controller-login.php" method="POST">
            <input type="text" placeholder="Usuario" class="input" name="usuario" autocomplete="off" />
            <div class="overlap-text">
              <input type="password" placeholder="Contraseña" class="input" name="password" />
              <a href="">Olvidaste?</a>
            </div>
            <input type="submit" value="Entrar" class="btn" name="entrar" />
          </form>
        </div>
      </div>
      <div class="sub-content">
        <div class="s-part">
          ¿No tienes una cuenta? <a href="views/registro.php">Regístrate</a>
        </div>
      </div>
      <center><img src="img/appstores.png"></center>
    </div>
 </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
  }
?>