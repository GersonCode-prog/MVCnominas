<?php

class ControladorAusencias {


/*=========================================
           MOSTRAR AUSENCIAS
  ===========================================*/

    static public function ctrMostrarAusencia($item, $valor)
    {
        $tabla = "solicitudesausencias";
        $respuesta = ModeloAusencias::mdlMostrarAusencia($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }
     /*=========================================
           MOSTRAR AUSENCIAS PINFORMES
  ===========================================*/

    static public function ctrMostrarAusenciasI($item, $valor)
    {
        $tabla = "solicitudesausencias";
        $respuesta = ModeloAusencias::mdlMostrarAusenciasI($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

      /*=========================================
           MOSTRAR SOLICITUDES AUSENCIAS PENTDIENTES
  ===========================================*/

    static public function ctrMostrarAusenciasPendientes($item, $valor)
    {
        $tabla = "solicitudesausencias";
        $respuesta = ModeloAusencias::mdlMostrarAusenciasPendientes($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR AUSENCIAS ACEPTADOS
  ===========================================*/

    static public function ctrMostrarAusenciasAceptados($item, $valor)
    {
        $tabla = "solicitudesausencias";
        $respuesta = ModeloAusencias::mdlMostrarAusenciasAceptados($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

/*=========================================
        CREAR SOLICITUD AUSENCIA
  ===========================================*/

static public function ctrCrearAusencia(){

    if(isset($_POST["nuevoCodigo"])){

        if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoMotivoA"])){

            $tabla = "solicitudesAusencias";

            $datos = array("idEmpleado" => $_POST["idEmpleado"],
                "codigo" => $_POST["nuevoCodigo"],
                "fechaInicio" => $_POST["nuevaFechaAI"],
                "fechaFin" => $_POST["nuevaFechaAF"],
                "razon" => $_POST["nuevaRazon"],
                "motivo" => $_POST["nuevoMotivoA"]);

            // Convertir fechas a objetos DateTime
            $fechaInicioObj = new DateTime($_POST["nuevaFechaAI"]);
            $fechaFinObj = new DateTime($_POST["nuevaFechaAF"]);

            // Calcular la diferencia en días
            $diferencia = $fechaInicioObj->diff($fechaFinObj);
            $diasAusencia = $diferencia->days;

            // Agregar el número de días de ausencia a la matriz de datos
            $datos["diasAusencia"] = $diasAusencia+1;

            $respuesta = ModeloAusencias::mdlCrearAusencia($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>
                swal({
                    type: "success",
                    title: "La solicitud ha sido guardada correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if (result.value) {
                        window.location = "solicitudesAusencias";
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
                    window.location = "solicitudesAusencias";
                }
            })
            </script>';

        }

    }

}



    /*=========================================
           ACTUALIZAR SOLICITUD AUSENCIA
    ===========================================*/   


    static public function ctrActualizarEstadoAusencia(){

       

        if(isset($_POST["idEmpleado"]) && isset($_POST["nuevoEstado"])  && isset($_POST["idUsuario"])){

            $tabla = "solicitudesAusencias";

            // Obtener la fecha y hora actual del servidor
            date_default_timezone_set('America/Guatemala');
            $fechaHoraActual = date("Y-m-d H:i:s");

            $datos = array(
                "idEmpleado" => $_POST["idEmpleado"],
                "nuevoEstado" => $_POST["nuevoEstado"],
                "fechaAprobacion" => $fechaHoraActual, // Fecha y hora de aprobación
                "idAprobador" => $_POST["idUsuario"]
            );
            
            $respuesta = ModeloAusencias::mdlActualizarEstadoAusencia($tabla, $datos);
            
            if($respuesta == "ok"){
                echo '<script>

                    swal({

                            type: "success",
                            title: "solicitud aprobada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "ausenciasPendientes";
                                    }

                                })

                </script>';

            }else{
                echo '<script>

                  swal({

                      type: "error",
                      title: "!Error al actualizar estado, intente nuevamente!", 
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false

                      }).then((result)=>{

                          if(result.value){

                            window.location = "ausenciasPendientes";
                          }

                        })

                </script>';
            }
        }
    }

}