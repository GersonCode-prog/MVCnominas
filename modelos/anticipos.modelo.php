<?php require_once "conexion.php";

class ModeloAnticipos {
    
    /*=========================================
           MOSTRAR ANTICIPOS
    ===========================================*/
   
    static public function mdlMostrarAnticipos($tabla, $item, $valor){
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
           MOSTRAR ANTICIPOS PINFORMES
    ===========================================*/
   
    static public function mdlMostrarAnticiposI($tabla, $item, $valor){
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
           MOSTRAR ANTICIPOS PENDIENTES
    ===========================================*/

    static public function mdlMostrarAnticiposPendientes($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'pendiente'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=========================================
           MOSTRAR ANTICIPOS ACEPTADOS
    ===========================================*/

    static public function mdlMostrarAnticiposAceptados($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'aprobado'");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*=============================================
    AGREGAR SOLICITUD ANTICIPO
    =============================================*/
    static public function mdlCrearSolicitudAnticipo($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, codigo, monto, motivo) VALUES (:idEmpleado, :codigo,:monto, :motivo)");
            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
            $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
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
           ACTUALIZAR ESTADO
    ===========================================*/
    static public function mdlActualizarEstadoAnticipo($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :nuevoEstado, fechaAprobacion = :fechaAprobacion, idAprobador = :idAprobador WHERE idEmpleado = :idEmpleado");
        $stmt->bindParam(":nuevoEstado", $datos["nuevoEstado"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaAprobacion", $datos["fechaAprobacion"], PDO::PARAM_STR);
        $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
        $stmt->bindParam(":idAprobador", $datos["idAprobador"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /*=========================================
    BORRAR ANTICIPO
    ===========================================*/
    static public function mdlBorrarAnticipo($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idAnticipo = :idAnticipo");
        $stmt->bindParam(":idAnticipo", $datos, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
}

