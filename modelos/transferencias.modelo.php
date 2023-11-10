<?php require_once "conexion.php";

class ModeloTransferencias {
    
    /*=========================================
           MOSTRAR TRANSFERENCIAS 
    ===========================================*/
   
    static public function mdlMostrarTransferencias($tabla, $item, $valor){
        if($item != null && $valor != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    /*=========================================
           MOSTRAR TRANSFERENCIAS PINFORMES
    ===========================================*/
   
    static public function mdlMostrarTransferenciasI($tabla, $item, $valor){
        if($item != null && $valor != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    /*=========================================
           MOSTRAR TRANSFERENCIAS PENDIENTES
    ===========================================*/

    static public function mdlMostrarTransferenciasPendientes($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'pendiente'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=========================================
           MOSTRAR TRANSFERENCIAS ACEPTADOS
    ===========================================*/

    static public function mdlMostrarTransferenciasAceptados($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'aprobado'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

     /*=============================================
    AGREGAR SOLICITUD TRANSFERENCIA PRESTAMO
    =============================================*/
    static public function mdlAgregarTrans($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, codigo, monto, idPrestamo) VALUES (:idEmpleado, :codigo, :monto, :idPrestamo)");

            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":idPrestamo", $datos["idPrestamo"], PDO::PARAM_INT);
          
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error"; 
        }
    }


}