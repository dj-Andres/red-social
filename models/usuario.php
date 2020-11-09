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
    function tabla_archivos(){
      $sql="SHOW TABLE STATUS WHERE `Name` = 'archivos'";
      $query=$this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
    }
    function publicaciones($descripcion,$id){
      $sql="INSERT INTO publicaciones(descripcion,fecha,usuario)VALUES(:descripcion,'now()',:id)";
      $query=$this->acceso->prepare($sql);
      $query->execute(array(':descripcion'=>$descripcion,':id'=>$id));
      $this->objetos=$query->fetchall();
    }
    function ultima_publicacion($id){
      $sql="SELECT id_publicacion FROM publicaciones WHERE usuario=:id";
      $query=$this->acceso->prepare($sql);
      $query->execute(array(':id'=>$id));
      $this->objetos=$query->fetchall();
    }
    function archivos($id,$foto_name,$tipo,$tamaño,$id_publicacion,$filtro){
      $sql="INSERT INTO archivos(usuario,ruta,tipo,size,publicacion,filtro,fecha)VALUES(:usuario,:foto,:tipo,:tamaño,:id,:filtro,'now()')";
      $query=$this->acceso->prepare($sql);
      $query->execute(array(':usuario'=>$id,':foto'=>$foto_name,':tipo'=>$tipo,':tamaño'=>$tamaño,':id'=>$id_publicacion,':filtro'=>$filtro));
      $this->objetos=$query->fetchall();
    }
  }
?>