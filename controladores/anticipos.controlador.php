<?php

class ControladorAnticipos {


/*=========================================
           MOSTRAR ANTICIPOS
  ===========================================*/

    static public function ctrMostrarAnticipos($item, $valor)
    {
        $tabla = "anticipos";
        $respuesta = ModeloAnticipos::mdlMostrarAnticipos($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR ANTICIPOS PINFORMES
  ===========================================*/

    static public function ctrMostrarAnticiposI($item, $valor)
    {
        $tabla = "anticipos";
        $respuesta = ModeloAnticipos::mdlMostrarAnticiposI($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR ANTICIPOS PENTDIENTES
  ===========================================*/

    static public function ctrMostrarAnticiposPendientes($item, $valor)
    {
        $tabla = "anticipos";
        $respuesta = ModeloAnticipos::mdlMostrarAnticiposPendientes($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

    /*=========================================
           MOSTRAR ANTICIPOS ACEPTADOS
  ===========================================*/

    static public function ctrMostrarAnticiposAceptados($item, $valor)
    {
        $tabla = "anticipos";
        $respuesta = ModeloAnticipos::mdlMostrarAnticiposAceptados($tabla, $item, $valor);
         // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

        /*=========================================
            EMPLEADOS CON ANTICIPO PENDIENTE
        ===========================================*/

        static public function ctrObtenerEmpleadosConAnticipoPendiente() {
        $estadoPendiente = "Pendiente"; // El estado de anticipo pendiente
        $empleadosConPendiente = ModeloEmpleadosPendientes::mdlObtenerEmpleadosConAnticipoPendiente($estadoPendiente);
        return $empleadosConPendiente;
    }


/*=========================================
        CREAR SOLICITUD REGISTRO
  ===========================================*/
 
        static public function ctrAgregarAnticipo(){

          if(isset($_POST["nuevoMonto"])){

            if(preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoMonto"]) &&
              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ]+$/',  $_POST["nuevoMotivo"])){

                $tabla = "anticipos";

                $datos = array("idEmpleado"=>$_POST["idEmpleado"],
                           "codigo"=>$_POST["nuevoCodigo"],
                           "monto"=>$_POST["nuevoMonto"],
                           "motivo"=>$_POST["nuevoMotivo"]);

                $respuesta = ModeloAnticipos::mdlCrearSolicitudAnticipo($tabla, $datos);

                if($respuesta == "ok"){

                echo'<script>

                swal({
                    type: "success",
                    title: "La solicitud ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {

                        window.location = "anticipos";

                        }
                      })

                </script>';

              }

            }else{

              echo '<script>

                  swal({

                      type: "error",
                      title: "!Error en la carga de los datos, intente nuevamente!", 
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false

                      }).then((result)=>{

                          if(result.value){

                            window.location = "anticipos";
                          }

                        })

                </script>';

              }

            }

        }

    /*=========================================
           ACTUALIZAR SOLICITUD
    ===========================================*/   


    static public function ctrActualizarEstadoAnticipo(){

       

        if(isset($_POST["idEmpleado"]) && isset($_POST["nuevoEstado"])  && isset($_POST["idUsuario"])){

            $tabla = "anticipos";

            // Obtener la fecha y hora actual del servidor
            date_default_timezone_set('America/Guatemala');
            $fechaHoraActual = date("Y-m-d H:i:s");

            $datos = array(
                "idEmpleado" => $_POST["idEmpleado"],
                "nuevoEstado" => $_POST["nuevoEstado"],
                "fechaAprobacion" => $fechaHoraActual, // Fecha y hora de aprobación
                "idAprobador" => $_POST["idUsuario"]
            );
            
            $respuesta = ModeloAnticipos::mdlActualizarEstadoAnticipo($tabla, $datos);
            
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

                                        window.location = "solicitudesPendientes";
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

                            window.location = "solicitudesPendientes";
                          }

                        })

                </script>';
            }
        }
    }


    /*=========================================
           BORRAR EMPRESA
    ===========================================*/

    static public function ctrBorrarAnticipo(){

        if(isset($_GET["idAnticipo"])){

            $tabla = "anticipos";
            $datos = $_GET["idAnticipo"];

            $respuesta = ModeloAnticipos::mdlBorrarAnticipo($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "La empresa ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "anticipos";
                                    }

                                })

                </script>';


            }

        }

    }
}

