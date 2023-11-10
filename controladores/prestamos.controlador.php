<?php

class ControladorPrestamos{

/*=========================================
           MOSTRAR PRESTAMOS
  ===========================================*/

    static public function ctrMostrarPrestamos($item, $valor)
    {
        $tabla = "prestamos";
        $respuesta = ModeloPrestamos::mdlMostrarPrestamos($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

     /*=========================================
           MOSTRAR APRESTAMOS PINFORMES
  ===========================================*/

    static public function ctrMostrarPrestamosI($item, $valor)
    {
        $tabla = "prestamos";
        $respuesta = ModeloPrestamos::mdlMostrarPrestamosI($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR APRESTAMOS PENTDIENTES
  ===========================================*/

    static public function ctrMostrarPrestamosPendientes($item, $valor)
    {
        $tabla = "prestamos";
        $respuesta = ModeloPrestamos::mdlMostrarPrestamosPendientes($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR APRESTAMOS ACEPTADOS
  ===========================================*/

    static public function ctrMostrarPrestamosAceptados($item, $valor)
    {
        $tabla = "prestamos";
        $respuesta = ModeloPrestamos::mdlMostrarPrestamosAceptados($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

        /*=========================================
            EMPLEADOS CON PRESTAMOS PENDIENTE
        ===========================================*/

        static public function ctrObtenerEmpleadosConAnticipoPendiente() {
        $estadoPendiente = "Pendiente"; // El estado de anticipo pendiente
        $empleadosConPendiente = ModeloEmpleadosPendientes::mdlObtenerEmpleadosConAnticipoPendiente($estadoPendiente);

        return $empleadosConPendiente;
    }

    /*=========================================
CREAR REGISTRO PRESTAMO
==========================================*/

static public function ctrAgregarPrestamos() {
    if (isset($_POST["nuevoMonto"])) {
        if (preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoMonto"]) && preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoPlazo"])) {
            
            $tabla = "prestamos";

            $idEmpleado = $_POST["idEmpleado"];
            $mes = $_POST["nuevoMes"];

            // Verificar si ya existe un préstamo para el mismo empleado en el mismo mes
            $prestamoExistente = ModeloPrestamos::mdlValidarMes($tabla, $idEmpleado, $mes);

            if ($prestamoExistente) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Ya has solicitado un préstamo este mes.",
                        text: "No puedes solicitar más de un préstamo en el mismo mes.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                    });
                </script>';
            } else {

                $datos = array(
                    "idEmpleado" => $idEmpleado,
                    "codigo" => $_POST["nuevoCodigo"],
                    "montoPrestamo" => $_POST["nuevoMonto"],
                    "plazoPago" => $_POST["nuevoPlazo"],
                    "mes" => $mes,
                );

                $respuesta = ModeloPrestamos::mdlCrearRegistroPrestamo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La solicitud ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "prestamosSolicitud";
                            }
                        });
                    </script>';
                }
            }
        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "!Error en la carga de los datos, intente nuevamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "prestamosSolicitud";
                    }
                });
            </script>';
        }
    }
}


    /*=========================================
           ACTUALIZAR SOLICITUD PRESTAMO
    ===========================================*/   


   static public function ctrActualizarEstadoAnticipo() {
    if (isset($_POST["idEmpleado"]) && isset($_POST["nuevoEstado"]) && isset($_POST["idUsuario"])) {
        $tabla = "prestamos";
        $idEmpleado = $_POST["idEmpleado"];
        $tasaInteres = 1.75; // Tasa de interés mensual (1.75% anual)

        // Obtener la fecha y hora actual del servidor
        date_default_timezone_set('America/Guatemala');
        $fechaHoraActual = date("Y-m-d H:i:s");

        // Obtener el monto del préstamo y el plazo de pago desde la tabla de préstamos
        $infoPrestamo = ModeloPrestamos::mdlObtenerMontoPlazoPrestamo($idEmpleado);

        if ($infoPrestamo) {
            $montoPrestamo = $infoPrestamo["montoPrestamo"];
            $plazoPago = $infoPrestamo["plazoPago"];

            // Calcular la cuota mensual utilizando la fórmula de amortización
            $tasaInteresDecimal = $tasaInteres / 100;
            $cuotaMensual =  ($montoPrestamo * $tasaInteresDecimal) / (1 - pow(1 + $tasaInteresDecimal, -$plazoPago));

            $totalPago = $cuotaMensual * $plazoPago;

            $datos = array(
                "idEmpleado" => $_POST["idEmpleado"],
                "nuevoEstado" => $_POST["nuevoEstado"],
                "fechaAprobacion" => $fechaHoraActual, // Fecha y hora de aprobación
                "idAprobador" => $_POST["idUsuario"],
                "cuotaMensual" => $cuotaMensual,
                "totalPago" => $totalPago,

            );

            $respuesta = ModeloPrestamos::mdlActualizarEstadoPrestamo($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

                    swal({

                        type: "success",
                        title: "Solicitud aprobada correctamente", 
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result) => {

                        if (result.value) {
                            window.location = "prestamosPendientes";
                        }

                    })

                </script>';
            } else {
                echo '<script>

                    swal({

                        type: "error",
                        title: "!Error al actualizar estado, intente nuevamente!", 
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result) => {

                        if (result.value) {
                            window.location = "prestamosPendientes";
                        }

                    })

                </script>';
            }
        }
    }
}

}