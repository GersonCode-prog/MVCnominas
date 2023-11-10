<?php

class ControladorComisiones {


/*=========================================
           MOSTRAR VENTASCOMISIONES
  ===========================================*/

    static public function ctrMostrarComisiones($item, $valor)
    {
        $tabla = "ventascomsiones";
        $respuesta = ModeloComisiones::mdlMostrarComisiones($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }



/*=========================================
           MOSTRAR BONIFICACIONES
  ===========================================*/

    static public function ctrMostrarBonificaciones($item, $valor)
    {
        $tabla = "bonificacioncomision";
        $respuesta = ModeloComisiones::mdlMostrarBonificaciones($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

  

   
/*=========================================
    REGISTRAR VENTAS COMISION
==========================================*/

static public function ctrAgregarVentas()
{
    if (isset($_POST["nuevoMonto"])) {
        if (preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoMonto"])) {
            $tabla = "ventascomsiones";

            $datos = array(
                "idEmpleado" => $_POST["idEmpleado"],
                "codigo" => $_POST["nuevoCodigo"],
                "ventas" => $_POST["nuevoMonto"],
            );

            $respuesta = ModeloComisiones::mdlRegistrarVentas($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "Ventas registradas correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "comisionesRegistro";
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
                        window.location = "comisionesRegistro";
                    }
                })
            </script>';
        }
    }
}
/*=========================================
   OBTENER PORCENTAJECOMISION Y BONIFICACION
==========================================*/
static public function ctrCalcularBonifiacionesComision()
{
    if (isset($_POST["idEmpleado"]) && isset($_POST["nuevoMes"]) && isset($_POST["nuevoCodigo"])) {
        $tablaVentasComisiones = "ventascomsiones";
        $tablaBonificacion = "bonificacioncomision";

        $idEmpleado = $_POST["idEmpleado"];
        $mes = $_POST["nuevoMes"];
        $codigo = $_POST['nuevoCodigo'];

        // Verificar si el mes ya tiene un cálculo registrado
        $existeRegistro  = ModeloComisiones::mdlValidarMes($idEmpleado, $mes);

        if ($existeRegistro ) {
            // Mostrar un mensaje de error o tomar la acción adecuada
            echo '<script>
                    swal({
                        type: "error",
                        title: "!Ya existe un cálculo Para este mes!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "comisionesCalculos";
                        }
                    });
                </script>';
        } else {
            // Inicializamos porcentajeComision y bonificacion a 0
            $porcentajeComision = 0.0;
            $bonificacion = 0.0;

            // Obtener las ventas en base al mes y el empleado
            $ventasTotales = ModeloComisiones::mdlObtenerVentasEmpleado($tablaVentasComisiones, $idEmpleado, $mes);

            // Calcular el porcentaje de comisión y la bonificación

            if ($ventasTotales >= 0 && $ventasTotales <= 100000) {
                $porcentajeComision = 0.0;
            } elseif ($ventasTotales >= 100001 && $ventasTotales <= 200000) {
                $porcentajeComision = 2.5;
            } elseif ($ventasTotales >= 200001 && $ventasTotales <= 400000) {
                $porcentajeComision = 3.5;
            } else {
                $porcentajeComision = 4.5;
            }

            $bonificacion = (($ventasTotales * $porcentajeComision) / 100);

            $datosVentasComision = array(
                "idEmpleado" => $idEmpleado,
                "codigo" => $codigo, 
                "mes" => $mes, 
                "montoVenta" => $ventasTotales,
                "porcentajeComision" => $porcentajeComision,
                "bonificacion" => $bonificacion,
            );

            $respuesta = ModeloComisiones::mdlAgregarBonificacion($tablaBonificacion, $datosVentasComision);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "Los datos han sido calculados e ingresados correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "comisionesCalculos";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "!Error al ingresar los datos, intente nuevamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "comisionesCalculos";
                        }
                    });
                </script>';
            }
        }
    }
}



}