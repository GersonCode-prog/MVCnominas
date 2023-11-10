<?php
require_once "conexion.php";


class ModeloUsuarios {


   /*=============================================
   MOSTRAR USUARIOS
   =============================================*/
       static public function mdlMostrarUsuarios($tabla, $item, $valor){

      if($item != null){

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

         $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetch();

      }else{

         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

         $stmt -> execute();

         return $stmt -> fetchAll();

      }
      

      $stmt -> close();

      $stmt = null;

   }

    /*=============================================
       ACTUALIZAR USUARIO
    =============================================*/

   static public  function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

         $stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
         $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

      if($stmt -> execute()){

         return "ok";

      }else{

         return "error";
      }

      $stmt->close();

         $stmt = null;

   }

    /*=============================================
       REGISTRAR USUARIO
    =============================================*/

     static public function mdlIngresarUsuario($tabla, $datos){

         $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idEmpresa, idEmpleado, perfil, nombreUsuario, contrasena) VALUES (:idEmpresa, :idEmpleado, :perfil, :nombreUsuario, :contrasena)");

         $stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_INT);
         $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
         $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
         $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
         $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);

         if($stmt->execute()){

            return "ok";

         }else{

            return "error";
         }

         $stmt->close();

         $stmt = null;
  }

  /* =========================================
             EDITAR USUARIOS
  ===========================================*/

   static public function mdlEditarUsuario($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idEmpresa = :idEmpresa, perfil = :perfil, nombreUsuario = :nombreUsuario, contrasena = :contrasena  WHERE nombreUsuario = :nombreUsuario");

         $stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_INT);
         $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
         $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
         $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
         

      if($stmt -> execute()){

         return "ok";

      }else{

         return "error";
      }
      
         $stmt->close();

         $stmt = null;

   }
     /* =========================================
             BORRAR USUARIO
  ===========================================*/

   static public function mdlBorrarUsuario($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

      $stmt->bindParam("idUsuario", $datos, PDO::PARAM_STR);

       if($stmt -> execute()){

         return "ok";

      }else{

         return "error";
      }

      $stmt->close();

      $stmt = null;

   }


}


