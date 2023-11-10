<?php require_once "conexion.php";

class ModeloComisiones {
    
    /*=========================================
           MOSTRAR VENTASCOMISIONES
    ===========================================*/
   
    static public function mdlMostrarComisiones($tabla, $item, $valor){
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
           MOSTRAR BONIFICACIONES
    ===========================================*/
   
    static public function mdlMostrarBonificaciones($tabla, $item, $valor){
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
           MOSTRAR BONIFICACIONES NO REPETIR
    ===========================================*/
   
    static public function mdlValidarMes($idEmpleado, $mes){
        try {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as total FROM bonificacioncomision WHERE idEmpleado = :idEmpleado AND mes = :mes");
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
         OBTENER SUMA VENTAS EMPLEADO
    ===========================================*/

    static public function mdlObtenerVentasEmpleado($tablaVentasComisiones, $idEmpleado, $Mes) {
       $stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) AS ventasTotales FROM $tablaVentasComisiones WHERE idEmpleado = :idEmpleado AND mes = :Mes");

        $stmt->bindParam(":idEmpleado", $idEmpleado, PDO::PARAM_INT);
        $stmt->bindParam(":Mes", $Mes, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $ventasTotales = $result['ventasTotales'];

        return $ventasTotales;
    }

    
     /*=========================================
    REGISTRAR VENTAS DE COMISIONES
    ===========================================*/
    static public function mdlRegistrarVentas($tabla, $datos)
    {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (idEmpleado, codigo, ventas) VALUES (:idEmpleado, :codigo, :ventas)");

            $stmt->bindParam(":idEmpleado", $datos["idEmpleado"], PDO::PARAM_INT);
            $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
          

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error";
        }
    }

         /*=========================================
        REGISTRAR BONIFICACIONCOMISION
        ===========================================*/
        static public function mdlAgregarBonificacion($tablaBonificacion, $datosVentasComision) {

         $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaBonificacion (idEmpleado, codigo, mes, montoVenta, porcentajeComision, bonificacion, fecha) VALUES (:idEmpleado, :codigo, :mes, :montoVenta, :porcentajeComision, :bonificacion, NOW())");


        $stmt->bindParam(":idEmpleado", $datosVentasComision["idEmpleado"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datosVentasComision["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":mes", $datosVentasComision["mes"], PDO::PARAM_STR);
        $stmt->bindParam(":montoVenta", $datosVentasComision["montoVenta"], PDO::PARAM_STR);
        $stmt->bindParam(":porcentajeComision", $datosVentasComision["porcentajeComision"], PDO::PARAM_STR);
        $stmt->bindParam(":bonificacion", $datosVentasComision["bonificacion"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
