<?php require_once "conexion.php";

class ModeloEmpleados{


/*=============================================
    MOSTRAR EMPLEADOS
 =============================================*/

    static public function mdlMostrarEmpleados($tabla, $item, $valor){

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
    AGREGAR EMPLEADOS
    =============================================*/

    static public function mdlAgregarEmpleado($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (nombre, apellido, foto, fechaNacimiento, genero, estadoCivil, departamento, correoElectronico) VALUES (:nombre, :apellido, :foto, :fechaNacimiento, :genero, :estadoCivil, :departamento, :correoElectronico)");

            // Bind the image data
            if (isset($datos["foto"])) {
                $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_LOB);
            } else {
                $stmt->bindValue(":foto", null, PDO::PARAM_NULL);
            }

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoCivil", $datos["estadoCivil"], PDO::PARAM_STR);
            $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
            $stmt->bindParam(":correoElectronico", $datos["correoElectronico"], PDO::PARAM_STR);
           
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
           BORRAR EMPLEADOS
  ===========================================*/

  static public function mdlBorrarEmpleado($tabla, $datos){


     $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEmpleado = :idEmpleado");

    $stmt->bindParam(":idEmpleado", $datos, PDO::PARAM_STR);

    if($stmt->execute()){

            return "ok";

         }else{

            return "error";
         }

         $stmt->close();

         $stmt = null;


  }

}

