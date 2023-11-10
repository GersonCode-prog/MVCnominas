<?php

class ControladorTransferencias {


/*=========================================
           TRANSFERENCIA
  ===========================================*/

    static public function ctrMostrarTransferencias($item, $valor)
    {
        $tabla = "transferenciasbanco";
        $respuesta = ModeloTransferencias::mdlMostrarTransferencias($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR  TRANSFERENCIA PINFORMES
  ===========================================*/

    static public function ctrMostrarTransferenciasI($item, $valor)
    {
        $tabla = "transferenciasbanco";
        $respuesta = ModeloTransferencias::mdlMostrarTransferenciasI($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR  TRANSFERENCIA PENTDIENTES
  ===========================================*/

    static public function ctrMostrarTransferenciasPendientes($item, $valor)
    {
        $tabla = "transferenciasbanco";
        $respuesta = ModeloTransferencias::mdlMostrarTransferenciasPendientes($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR  TRANSFERENCIA ACEPTADOS
  ===========================================*/

    static public function ctrMostrarTransferenciasAceptados($item, $valor)
    {
        $tabla = "transferenciasbanco";
        $respuesta = ModeloTransferencias::mdlMostrarTransferenciasAceptados($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

        /*=========================================
            EMPLEADOS CON TRANSFERENCIA PENDIENTE
        ===========================================*/

        static public function ctrObtenerEmpleadosConAnticipoPendiente() {
        $estadoPendiente = "Pendiente"; // El estado de anticipo pendiente
        $empleadosConPendiente = ModeloEmpleadosPendientes::mdlObtenerEmpleadosConAnticipoPendiente($estadoPendiente);
        return $empleadosConPendiente;
    }

    /*=========================================
        CREAR SOLICITUD TRANSACCION
    ===========================================*/

    static public function ctrAgregarTrans(){

     if (isset($_POST["idEmpleado"]) && isset($_POST["nuevoMonto"])) {

        if(preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoMonto"])){

            $tabla = "transferenciasbanco";
            $tablaPrestamo = "prestamos";
            $idEmpleado = $_POST['idEmpleado'];

            $idPrestamo = ModeloPrestamos::mdlMostrarPrestamosId($tablaPrestamo, $idEmpleado); 
            var_dump($idPrestamo);

            $datos = array("idEmpleado" => $_POST["idEmpleado"],
                "codigo" => $_POST["nuevoCodigo"],
                "monto" => $_POST["nuevoMonto"],
                "idPrestamo" => $idPrestamo 
            );


            $respuesta = ModeloTransferencias::mdlAgregarTrans($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>
                swal({
                    type: "success",
                    title: "El registro ha sido guardada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "transferenciasRegistro";
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
                    window.location = "transferenciasRegistro";
                }
            })
            </script>';

        }

    }

}

}