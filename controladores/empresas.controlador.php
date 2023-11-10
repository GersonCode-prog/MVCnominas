<?php 


class ControladorEmpresas{


	/*=============================================
	CREAR EMPRESA
	=============================================*/
	static public function ctrCrearEmpresa(){

		if(isset($_POST["nuevaEmpresa"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ]+$/',  $_POST["nuevaEmpresa"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])){

			   	$tabla = "empresas";

			   	$datos = array("nombreEmpresa"=>$_POST["nuevaEmpresa"],
			   			       "direccion"=>$_POST["nuevaDireccion"],
					           "telefono"=>$_POST["nuevoTelefono"]);

			   	$respuesta = ModeloEmpresas::mdlIngresarEmpresa($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La emprea ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "empresas";

									}
								})

					</script>';

				}

			}else{

				echo '<script>

  					swal({

  							type: "error",
  							title: "!El nombre no puede ir vacía o llevar caracteres especiales!", 
  							showConfirmButton: true,
  							confirmButtonText: "Cerrar",
  							closeOnConfirm: false

  							}).then((result)=>{

  									if(result.value){

  										window.location = "empresas";
  									}

  								})

  				</script>';

  			}

  		}

	}

	/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function ctrMostrarEmpresa($item, $valor){

		$tabla = "empresas";

		$respuesta = ModeloEmpresas::mdlMostrarEmpresa($tabla, $item, $valor);

		return $respuesta;

	}

/*=============================================
	EDITAR EMPRESAS
	=============================================*/


	static public function ctrEditarEmpresa(){

		if(isset($_POST["editarEmpresa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarEmpresa"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"]) &&
			    preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])){

			   	$tabla = "empresas";

			   	$datos = array("idEmpresa"=>$_POST["idEmpresa"],
			   				   "nombreEmpresa"=>$_POST["editarEmpresa"],
					           "direccion"=>$_POST["editarDireccion"],
					           "telefono"=>$_POST["editarTelefono"]);
					        

			   	$respuesta = ModeloEmpresas::mdlEditarEmpresa($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Los datos ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "empresas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Error verifique que los datos ingresados sean correctos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "empresas";

							}
						})

			  	</script>';



			}

		}

	}


    /*=========================================
           BORRAR EMPRESA
    ===========================================*/

    static public function ctrBorrarEmpresa(){

        if(isset($_GET["idEmpresa"])){

            $tabla = "empresas";
            $datos = $_GET["idEmpresa"];

            $respuesta = ModeloEmpresas::mdlBorrarEmpresa($tabla, $datos);

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

                                        window.location = "empresas";
                                    }

                                })

                </script>';


            }

        }

    }

}



