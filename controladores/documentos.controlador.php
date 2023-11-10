<?php

		class ControladorDocumentos {

	
    	/*=============================================
		    MOSTRAR  DOCUMENTOS
		 =============================================*/

   		public static function ctrMostrarDocumentosPorEmpleado($item, $valor) {
        
        $tabla = "documentos"; // Reemplaza con el nombre de tu tabla de documentos
        $respuesta = ModeloDocumentos::mdlMostrarDocumentosPorEmpleado($tabla, $item, $valor);
        
        // Verifica si $respuesta es null y, si lo es, devuelve un arreglo vacío
        return ($respuesta != null) ? $respuesta : array();
    }

        /*=============================================
        CREAR DOCUMENTO
        =============================================*/
        static public function ctrCrearDocumento() {

            if (isset($_POST["idEmpleado"]) && isset($_POST["nuevoTipo"]) && isset($_POST["nuevoNombreD"]) && isset($_FILES["nuevoDocumento"])) {

                // Validar y obtener los datos del formulario
                $idEmpleado = $_POST["idEmpleado"];
                $tipoDocumento = $_POST["nuevoTipo"];
                $nombreDocumento = $_POST["nuevoNombreD"];

                // Verificar si se ha cargado un documento
                if ($_FILES["nuevoDocumento"]["error"] == 0) {
                    $rutaDocumento = $_FILES["nuevoDocumento"]["tmp_name"];
                    $tipoDocumentoArchivo = $_FILES["nuevoDocumento"]["type"];

                    // Verificar si es un tipo de documento válido (puedes agregar más validaciones aquí)
                    if ($tipoDocumentoArchivo == "application/pdf") {
                        // Leer el contenido del documento en bytes
                        $contenidoDocumento = file_get_contents($rutaDocumento);

                        // Guardar el documento en la base de datos
                        $tabla = "documentos";
                        $datos = array(
                            "idEmpleado" => $idEmpleado,
                            "tipoDocumento" => $tipoDocumento,
                            "nombreArchivo" => $nombreDocumento,
                            "contenido" => $contenidoDocumento
                        );

                        $respuesta = ModeloDocumentos::mdlAgregarDocumento($tabla, $datos);

                        if ($respuesta == "ok") {
                            echo '<script>
                                swal({
                                    type: "success",
                                    title: "El documento ha sido guardado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result) => {
                                    if (result.value) {
                                        window.location = "cargarDocumentos";
                                    }
                                });
                            </script>';
                        } else {
                            echo '<script>
                                swal({
                                    type: "error",
                                    title: "¡Error al guardar el documento!",
                                    text: "Tamaño de documento muy grande",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                }).then((result) => {
                                    if (result.value) {
                                        window.location = "cargarDocumentos";
                                    }
                                });
                            </script>';
                        }
                    } else {
                        echo '<script>
                            swal({
                                type: "error",
                                title: "¡Tipo de documento inválido!",
                                text: "Por favor, seleccione un documento en formato PDF.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result) => {
                                if (result.value) {
                                    window.location = "cargarDocumentos";
                                }
                            });
                        </script>';
                    }
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "¡Error al cargar el documento!",
                            text: "Por favor, seleccione un documento válido.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "documentos";
                            }
                        });
                    </script>';
                }
            }
        }

     /*=========================================
           BORRAR DOCUMENTO
    ===========================================*/

    static public function ctrBorrarDocumento(){

        if(isset($_GET["idDocumento"])){

            $tabla = "documentos";
            $datos = $_GET["idDocumento"];

            $respuesta = ModeloDocumentos::mdlBorrarDocumento($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "La documento ha sido borrada correctamente", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "cargarDocumentos";
                                    }

                                })

                </script>';


            }

        }

    }
}

    
