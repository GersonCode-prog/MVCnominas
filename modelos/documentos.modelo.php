<?php require_once "conexion.php";


class ModeloDocumentos{


    /*=============================================
    MOSTRAR DOCUMENTOS
    =============================================*/

    static public function mdlMostrarDocuemento($tabla, $item, $valor){

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
    MOSTRAR DOCUMENTOS POR EMPLEADO
    =============================================*/

        public static function mdlMostrarDocumentosPorEmpleado($tabla, $item, $valor) {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }


    /*=============================================
    AGREGAR DOCUMENTO
    =============================================*/
    static public function mdlAgregarDocumento($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, tipoDocumento, nombreArchivo, contenido) VALUES (:idEmpleado, :tipoDocumento, :nombreArchivo, :contenido)");

            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":tipoDocumento", $datos["tipoDocumento"], PDO::PARAM_STR);
            $stmt->bindParam(":nombreArchivo", $datos["nombreArchivo"], PDO::PARAM_STR);
            $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_LOB);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error"; // Puedes personalizar el mensaje de error según tu lógica.
        }
    }


     /*=========================================
           BORRAR DOCUMENTO
  ===========================================*/

  static public function mdlBorrarDocumento($tabla, $datos){

     $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idDocumento = :idDocumento");

    $stmt->bindParam(":idDocumento", $datos, PDO::PARAM_STR);

    if($stmt->execute()){

            return "ok";

         }else{

            return "error";
         }

         $stmt->close();

         $stmt = null;


  }

}

