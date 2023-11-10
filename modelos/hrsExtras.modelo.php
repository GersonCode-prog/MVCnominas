<?php require_once "conexion.php";

class ModeloHrsExtras {
   
    /*=========================================
           MOSTRAR HORAS EXTRAS
    ===========================================*/
   
    static public function mdlMostrarHrsExtras($tabla, $item, $valor) {

        if ($item != null && $valor != null) {
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
           MOSTRAR REGISTROS HRS ESTADO PENDIENTE
    ===========================================*/

    static public function mdlMostrarHrsExPendientes($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'pendiente'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=========================================
           MOSTRAR REGISTROS HRS ESTADO ACEPTADOS
    ===========================================*/

    static public function mdlMostrarHrsExtrasAceptados($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'aprobado'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=========================================
        ACTUALIZAR ESTADO Y CALCULAR SALARIO EXTRA
    ===========================================*/

    static public function mdlActualizarEstadoHorasExtras($tablaHorasExtras, $datosHorasExtras, $idEmpleado) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tablaHorasExtras SET estado = :nuevoEstado, fechaAprobacion = :fechaAprobacion, idAprobador = :idAprobador WHERE idEmpleado = :idEmpleado");
            $stmt->bindParam(":nuevoEstado", $datosHorasExtras["nuevoEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaAprobacion", $datosHorasExtras["fechaAprobacion"], PDO::PARAM_STR);
            $stmt->bindParam(":idAprobador", $datosHorasExtras["idAprobador"], PDO::PARAM_INT);
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*=========================================
        ACTUALIZAR SALARIO EXTRA
    ===========================================*/

    static public function mdlActualizarSalarioExtra($tablaHorasExtras, $datosSalarioExtra, $idEmpleado) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tablaHorasExtras SET salarioExtra = :salarioExtra WHERE idEmpleado = :idEmpleado");
            $stmt->bindParam(":salarioExtra", $datosSalarioExtra["salarioExtra"], PDO::PARAM_STR);
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*=========================================
        OBTENER HORAS TRABAJADAS
    ===========================================*/

    static public function mdlObtenerHorasTrabajadas($tablaHorasExtras, $idEmpleado) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT horasTrabajadas FROM $tablaHorasExtras WHERE idEmpleado = :idEmpleado");
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)["horasTrabajadas"];
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*=============================================
    AGREGAR REGISTRO HRS EXTRAS
    =============================================*/

    static public function mdlRegistrarHoraExtra($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, codigo, horasTrabajadas) VALUES (:idEmpleado, :codigo, :horasTrabajadas)");
            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $stmt->bindParam(":horasTrabajadas", $datos["horasTrabajadas"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error"; // Puedes personalizar el mensaje de error según tu lógica.
        }
    }

}
