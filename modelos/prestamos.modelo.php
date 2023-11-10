<?php require_once "conexion.php";

class ModeloPrestamos {
    
    /*=========================================
           MOSTRAR PRESTAMOS
    ===========================================*/
   
    static public function mdlMostrarPrestamos($tabla, $item, $valor){
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
           MOSTRAR PRESTAMOS PINFORMES
    ===========================================*/
   
    static public function mdlMostrarPrestamosI($tabla, $item, $valor){
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
           MOSTRAR PRESTAMOS PENDIENTES
    ===========================================*/

    static public function mdlMostrarPrestamosPendientes($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'pendiente'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=========================================
           MOSTRAR PRESTAMOS ACEPTADOS
    ===========================================*/

    static public function mdlMostrarPrestamosAceptados($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 'aprobado'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

     /*=========================================
           MOSTRAR MONTOPRESTAMO Y PLAZOPAGO
    ===========================================*/

     static public function mdlObtenerMontoPlazoPrestamo($idEmpleado) {

        $tabla = "prestamos";

        $stmt = Conexion::conectar()->prepare("SELECT montoPrestamo, plazoPago FROM $tabla WHERE idEmpleado = :idEmpleado");

        $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

      /*=========================================
           MOSTRAR PRESTAMO NO REPETIR
    ===========================================*/
   
    static public function mdlValidarMes($tabla, $idEmpleado, $mes){
        try {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as total FROM $tabla WHERE idEmpleado = :idEmpleado AND mes = :mes");
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si 'total' es mayor que 0, significa que ya existe un cálculo para ese empleado y mes
            return $resultado['total'] > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // Puedes manejar el error de la forma que prefieras
        }
    }

    /*=========================================
           MOSTRAR IDPRESTAMO DEL EMPLEADO
    ===========================================*/

            public static function mdlMostrarPrestamosId($tablaPrestamo, $idEmpleado)
        {
            $stmt = Conexion::conectar()->prepare("SELECT idPrestamo FROM $tablaPrestamo WHERE idEmpleado = :idEmpleado");
            $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Convierte el valor a un entero si se encontró un resultado
            if ($resultado) {
                $idPrestamo = intval($resultado['idPrestamo']);
                return $idPrestamo;
            } else {
                return null; // 
            }
        }




     /*=============================================
    AGREGAR SOLICITUD PRESTAMO
    =============================================*/
    static public function mdlCrearRegistroPrestamo($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, codigo, montoPrestamo, plazoPago, mes) VALUES (:idEmpleado, :codigo, :montoPrestamo, :plazoPago, :mes)");

            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":montoPrestamo", $datos["montoPrestamo"], PDO::PARAM_STR);
            $stmt->bindParam(":plazoPago", $datos["plazoPago"], PDO::PARAM_INT);
            $stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error"; // 
        }
    }

    /*=========================================
           ACTUALIZAR ESTADO PRESTAMO
    ===========================================*/
     static public function mdlActualizarEstadoPrestamo($tabla, $datos) {
        try {
            // Consulta SQL para actualizar el estado del préstamo en la base de datos
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :nuevoEstado, fechaAprobacion = :fechaAprobacion, idAprobador = :idAprobador, cuotaMensual = :cuotaMensual, totalPago = :totalPago WHERE idEmpleado = :idEmpleado");

            // Bind de los parámetros
            $stmt->bindParam(":nuevoEstado", $datos["nuevoEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaAprobacion", $datos["fechaAprobacion"], PDO::PARAM_STR);
            $stmt->bindParam(":idAprobador", $datos["idAprobador"], PDO::PARAM_INT);
            $stmt->bindParam(":cuotaMensual", $datos["cuotaMensual"], PDO::PARAM_STR);
            $stmt->bindParam(":totalPago", $datos["totalPago"], PDO::PARAM_STR);
            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok"; // Éxito
            } else {
                return "error"; // Error en la ejecución de la consulta
            }
        } catch (PDOException $e) {
            return "error"; // Error en la conexión a la base de datos
        }
    }

}