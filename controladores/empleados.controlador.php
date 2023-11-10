<?php class ControladorEmpleados{

 /*=============================================
    MOSTRAR EMPLEADOS
 =============================================*/
    static public function ctrMostrarEmpleados($item, $valor){

        $tabla = "empleados";

        $respuesta = ModeloEmpleados::mdlMostrarEmpleados($tabla, $item, $valor);

        return $respuesta;

    }

        /*=============================================
        CREAR EMPLEADOS
        =============================================*/

          static public function ctrAgregarEmpleado() {

        if (isset($_POST["nuevoNombre"])) {

            // Validaciones y obtención de otros datos del formulario

            $datos = array(
                "nombre" => $_POST["nuevoNombre"],
                "apellido" => $_POST["nuevoApellido"],
                "fechaNacimiento" => $_POST["nuevaFecha"],
                "genero" => $_POST["nuevoGenero"],
                "estadoCivil" => $_POST["nuevoEstado"],
                "departamento" => $_POST["nuevaDireccion"],
                "correoElectronico" => $_POST["nuevoEmail"]
            );

            // Verificar si se ha cargado una imagen
            if (isset($_FILES["nuevaFoto"]) && $_FILES["nuevaFoto"]["error"] == 0) {
                $rutaImagen = $_FILES["nuevaFoto"]["tmp_name"];
                $tipoImagen = $_FILES["nuevaFoto"]["type"];

                // Verificar si es una imagen válida (puedes agregar más validaciones aquí)
                if ($tipoImagen == "image/jpeg" || $tipoImagen == "image/png") {
                    // Leer la imagen en bytes
                    $imagenBytes = file_get_contents($rutaImagen);

                    $datos["foto"] = $imagenBytes;
                }
            }

            // Llamada al modelo para agregar el empleado
            $respuesta = ModeloEmpleados::mdlAgregarEmpleado("empleados", $datos);

            if ($respuesta == "ok") {

                // Éxito: el registro se insertó correctamente
                echo '<script>
                    swal({
                          type: "success",
                          title: "El empleado ha sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "empleados";
                        }
                    });
                </script>';

            } else {
                // Error al insertar en la base de datos
                echo '<script>
                    swal({
                          type: "error",
                          title: "!El empleado no puede ir vacío o llevar caracteres especiales!", 
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "empleados";
                        }
                    });
                </script>';
            }
        }
    }

   


    /*=========================================
           BORRAR EMPLEADO
    ===========================================*/

    static public function ctrBorrarEmpleado(){

        if(isset($_GET["idEmpleado"])){

            $tabla = "idEmpleado";
            $datos = $_GET["idEmpleado"];

            $respuesta = ModeloEmpleados::mdlBorrarEmpleado($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "La Empleado ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "empleados";
                                    }

                                })

                </script>';


            }

        }

    }

}