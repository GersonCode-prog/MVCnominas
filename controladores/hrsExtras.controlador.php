<?php

class ControladorHrsExtras {

    /*=========================================
           MOSTRAR HORAS EXTRAS
    ===========================================*/

    static public function ctrMostrarHrsExtras($item, $valor)
    {
        $tabla = "horasextras";
        $respuesta = ModeloHrsExtras::mdlMostrarHrsExtras($tabla, $item, $valor);

        // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR HORAS EXTRAS PENDIENTES
    ===========================================*/

    static public function ctrMostrarHrsExtrasPendientes($item, $valor)
    {
        $tabla = "horasextras";
        $respuesta = ModeloHrsExtras::mdlMostrarHrsExPendientes($tabla, $item, $valor);

        // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR HORAS EXTRAS ACEPTADOS
    ===========================================*/

    static public function ctrMostrarHrsExtrasAprobado($item, $valor)
    {
        $tabla = "horasextras";
        $respuesta = ModeloHrsExtras::mdlMostrarHrsExtrasAceptados($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           REGISTRAR HORAS EXTRAS
    ===========================================*/

    static public function ctrAgregarHrsExtra()
    {
        if (isset($_POST["nuevaHoras"])) {
            if (preg_match('/^\d+(\.\d+)?$/', $_POST["nuevaHoras"])) {
                $tabla = "horasextras";
                $datos = array(
                    "idEmpleado" => $_POST["idEmpleado"],
                    "codigo" => $_POST["nuevoCodigo"],
                    "horasTrabajadas" => $_POST["nuevaHoras"]
                );

                $respuesta = ModeloHrsExtras::mdlRegistrarHoraExtra($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El registro ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "hrsExtras";
                            }
                        })
                    </script>';
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
                            window.location = "hrsExtras";
                        }
                    })
                </script>';
            }
        }
    }

    /*=========================================
        ACTUALIZAR ESTADO Y CALCULAR SALARIO EXTRA
    ===========================================*/

    static public function ctrActualizarEstadoHorasExtras()
    {
        if (isset($_POST["idEmpleado"]) && isset($_POST["nuevoEstado"]) && isset($_POST["idUsuario"])) {
            $tablaHorasExtras = "horasextras";
            $tablaHistorialLaboral = "historial_laboral";

            date_default_timezone_set('America/Guatemala');
            $fechaHoraActual = date("Y-m-d H:i:s");

            $idEmpleado = $_POST["idEmpleado"];
            $nuevoEstado = $_POST["nuevoEstado"];
            $idUsuario = $_POST["idUsuario"];

            // Obtener las horas trabajadas de la base de datos
            $horasTrabajadas = ModeloHrsExtras::mdlObtenerHorasTrabajadas($tablaHorasExtras, $idEmpleado);

            // Obtener el salario del historial laboral
            $salario = ModeloHistoriales::mdlObtenerSalarioPorEmpleado($tablaHistorialLaboral, $idEmpleado);

            // Calcular el salario extra
            $tarifaPorHoraExtra = ($salario / 40) * 1.5;
            $salarioExtra = $tarifaPorHoraExtra * $horasTrabajadas;

            $datosHorasExtras = array(
                "nuevoEstado" => $nuevoEstado,
                "fechaAprobacion" => $fechaHoraActual,
                "idAprobador" => $idUsuario
            );

            if ($nuevoEstado == "Aprobado") {
                // Actualizar el salario extra en la tabla de horas extras
                $datosSalarioExtra = array(
                    "salarioExtra" => $salarioExtra
                );
                ModeloHrsExtras::mdlActualizarSalarioExtra($tablaHorasExtras, $datosSalarioExtra, $idEmpleado);
            }

            $respuesta = ModeloHrsExtras::mdlActualizarEstadoHorasExtras($tablaHorasExtras, $datosHorasExtras, $idEmpleado);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "Horas extras actualizadas correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "hrsExtrasPendientes";
                        }
                    });
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
                            window.location = "hrsExtrasPendientes";
                        }
                    });
                </script>';
            }
        }
    }
}
?>
