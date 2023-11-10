<?php require_once "conexion.php";


class ModeloEmpresas{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function mdlIngresarEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreEmpresa, direccion, telefono) VALUES (:nombreEmpresa, :direccion, :telefono)");

		$stmt->bindParam(":nombreEmpresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function mdlMostrarEmpresa($tabla, $item, $valor){

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
	EDITAR EMPRESA
	=============================================*/

	static public function mdlEditarEmpresa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreEmpresa = :nombreEmpresa, direccion = :direccion, telefono = :telefono WHERE idEmpresa = :idEmpresa");

		$stmt->bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreEmpresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=========================================
           BORRAR EMPRESAS
  ===========================================*/

  static public function mdlBorrarEmpresa($tabla, $datos){


     $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idEmpresa = :idEmpresa");

    $stmt->bindParam(":idEmpresa", $datos, PDO::PARAM_STR);

    if($stmt->execute()){

            return "ok";

         }else{

            return "error";
         }

         $stmt->close();

         $stmt = null;


  }

}


