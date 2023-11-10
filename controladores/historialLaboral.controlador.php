<?php

class ControladorHistoriales{


	/*=============================================
	MOSTRAR HISTORIAL LABORAL
	=============================================*/

	static public function ctrMostrarHistorial($item, $valor){

		$tabla = "historial_laboral";

		$respuesta = ModeloHistoriales::mdlMostrarHistorial($tabla, $item, $valor);

		return $respuesta;

	}



    /*=============================================
    MOSTRAR HISTORIAL LABORAL POR ID
    =============================================*/

   		public static function ctrMostrarHistorialPorId($item, $valor) {
        
        $tabla = "historial_laboral"; // Reemplaza con el nombre de tu tabla de documentos
        $respuesta = ModeloHistoriales::mdlMostrarHistorialPorId($tabla, $item, $valor);
        
        // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }


       /*=============================================
         REGISTRAR HISTORIAL
         =============================================*/

       static public function ctrCrearHistorialLaboral(){

        if(isset($_POST["idEmpleado"])){

            if(preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["nuevaFechaI"]) &&
               preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["nuevaFechaS"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ]+$/',  $_POST["nuevoDepartamentoT"]) &&
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ]+$/',  $_POST["nuevoCargo"]) && 
                preg_match('/^\d+(\.\d+)?$/', $_POST["nuevoSalario"])){

                $tabla = "historial_laboral";

                $datos = array("idEmpleado"=>$_POST["idEmpleado"],
                               "fechaIngreso"=>$_POST["nuevaFechaI"],
                               "fechaSalida"=>$_POST["nuevaFechaS"],
                               "departamento"=>$_POST["nuevoDepartamentoT"],
                               "cargo"=>$_POST["nuevoCargo"],
                               "salario"=>$_POST["nuevoSalario"]);

                $respuesta = ModeloHistoriales::mdlIngresarHistorial($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                    swal({
                          type: "success",
                          title: "Los datos ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                          }).then((result) => {
                                    if (result.value) {

                                    window.location = "historialLaboral";

                                    }
                                })

                    </script>';

                }

            }else{

                echo '<script>

                    swal({

                            type: "error",
                            title: "!Hubo un problema al cargar los datos ingresados!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "historialLaboral";
                                    }

                                })

                </script>';

            }

        }

    }

     /*=========================================
           BORRAR DOCUMENTO
    ===========================================*/

    static public function ctrBorrarHistorial(){

        if(isset($_GET["idHistorial"])){

            $tabla = "historial_laboral";
            $datos = $_GET["idHistorial"];

            $respuesta = ModeloHistoriales::mdlBorrarHistorial($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "La informacion laboral ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "historialLaboral";
                                    }

                                })

                </script>';


            }

        }

    }
}

