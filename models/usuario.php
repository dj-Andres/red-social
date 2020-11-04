<?php 
	include_once 'conexion.php';

  class Usuario{
    var $objetos;
    public function __construct()
    {
      $db=new conexion();
      $this->acceso=$db->pdo;
    }
    function crear($correo,$nombre,$usuario,$clave,$avatar){
      $sql="SELECT * FROM usuarios WHERE correo=:correo AND usuario=:usuario";
      $query=$this->acceso->prepare($sql);
      $query->execute(array(':correo'=>$correo,':usuario'=>$usuario));
      $this->objetos=$query->fetchall();

      if(!empty($this->objetos)){
          echo 'no-crear';
      }else{
        $sql="INSERT INTO usuarios(usuario,password,email,nombre,avatar)VALUES(:usuario,:clave,:correo,:nombre,:avatar)";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':usuario'=>$usuario,':clave'=>$clave,':correo'=>$correo,':nombre'=>$nombre,':avatar'=>$avatar));
        echo 'crear';
      }
    }
    function login($usuario,$clave){
        $sql="SELECT * FROM usuarios WHERE usuario=:usuario AND password=:clave";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':usuario' =>$usuario,'clave'=>$clave));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }
  }
?>