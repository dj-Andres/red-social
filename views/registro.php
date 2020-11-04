<?php 
	require_once('./template/header.php')
 ?>
 <body>
 <div class="main-content">
    <div class="header">
      <img src="../img/logo.png" />
    </div>
    <form action="" method="">
      <div class="l-part">
        <input type="email" placeholder="Correo electrónico" id="correo" class="input" name="mail" required />
        <div class="overlap-text">
          <input type="text" placeholder="Nombre completo" id="nombre" class="input" name="nombre" required />
        </div>
        <div class="overlap-text">
          <input type="text" placeholder="Usuario" id="usuario" class="input" name="usuario" required />
        </div>
        <div class="overlap-text">
          <input type="password" placeholder="Contraseña" id="clave" class="input" name="password" required />
        </div>
        <button id="registrar" class="btn">Registrar</button>
      </div>
    </form>
  </div>
  <div class="sub-content">
    <div class="s-part">
      ¿Tienes una cuenta? <a href="../index.php">Entrar</a>
    </div>
  </div>

</div>
<?php 
	require_once('./template/footer.php')
 ?>
 <script src="../js/usuario.js"></script>