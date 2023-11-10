<?php
    class ControladorUsuarios {

    /*=========================================
      INGRESO DE USUARIOS
    ===========================================*/

    static public function ctrIngresoUsuario() {

        if (isset($_POST["nombreUsuario"])) {

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["idEmpresa"]) && 
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nombreUsuario"]) &&
               preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasena"])){


                $encriptar = crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios"; 

                $item = "nombreUsuario";
                $valor = $_POST["nombreUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if(is_array($respuesta)){

                if($respuesta["idEmpresa"] == $_POST["idEmpresa"] && $respuesta["nombreUsuario"] == $_POST["nombreUsuario"] && $respuesta["contrasena"] == $encriptar){

                    if($respuesta["estado"] == 1){

                   
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["idUsuario"] = $respuesta["idUsuario"];
                    $_SESSION["idEmpleado"] = $respuesta["idEmpleado"];
                    $_SESSION["nombreUsuario"] = $respuesta["nombreUsuario"];
                    $_SESSION["idEmpresa"] = $respuesta["idEmpresa"];
                    $_SESSION["perfil"] = $respuesta["perfil"];


                    /*=========================================
              REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                        ===========================================*/

                        date_default_timezone_set('America/Guatemala');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha.' '.$hora;

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;

                        $item2 = "idUsuario";
                        $valor2 = $respuesta["idUsuario"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if($ultimoLogin == "ok"){

                                echo '<script>

                                            window.location =  "inicio";


                                            </script>';

                        }


                }else{

                        echo '<br>
                                  <div class="alert alert-danger">El usuario aún no está activado</div>';

                }

            

                }else{
                    echo '<br><div class="alert alert-danger">Contraseña ingresada incorrecta vuelve a intentar</div>';

                }


        }else {
                    echo '<br><div class="alert alert-danger">Usuario ingresado incorrecto vuelve a intentar</div>';    

        }
  
     }

 }

}
 

    /*=========================================
              MOSRAR USUARIOS
  ===========================================*/

  static public function ctrMostrarUsuarios($item, $valor){

    $tabla = "usuarios";
    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;

  }


    /*=========================================
       AGREGAR NUEVO USUARIO
    ===========================================*/

   static public function ctrCrearUsuario(){

    if(isset($_POST["nombreEmpresa"])){

        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
           preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevaContrasena"])){

            $tabla = "usuarios";

            $encriptar = crypt($_POST["nuevaContrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $datos = array("idEmpresa" => $_POST["nombreEmpresa"],
                           "idEmpleado" => $_POST["nombreEmpleado"],
                           "perfil" => $_POST["nuevoPerfil"],
                           "nombreUsuario" => $_POST["nuevoUsuario"],
                           "contrasena" => $encriptar);         

            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "!El usuario ha sido guardado correctamente!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "usuarios";
                                    }

                                })

                </script>';

            }

        }else{

                echo '<script>

                    swal({

                            type: "error",
                            title: "!El usuario no puede ir vacío o llevar caracteres especiales!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "usuarios";
                                    }

                                })

                </script>';

        }


     }


  }
  /*=========================================
              EDITAR USUARIO
  ===========================================*/

static public function ctrEditarUsuario(){

            if(isset($_POST["editarUsuario"])){

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuario"])){


                    $tabla = "usuarios";


                    if($_POST["nuevaContrasena"] != ""){

                        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevaContrasena"])){

                            $encriptar = crypt($_POST["nuevaContrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                        }else{

                            echo'<script>

                                    swal({
                                          type: "error",
                                          title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                          showConfirmButton: true,
                                          confirmButtonText: "Cerrar"
                                          }).then(function(result){
                                            if (result.value) {

                                            window.location = "usuarios";

                                            }
                                        })

                                </script>';

                        }

                    }else{

                        $encriptar = $_POST["passwordActual"];

                    }

                    $datos = array("idEmpresa" => $_POST["editarEmpresa"],
                                   "perfil" => $_POST["editarPerfil"],
                                   "nombreUsuario" => $_POST["editarUsuario"],
                                   "contrasena" => $encriptar);

                    $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                    if($respuesta == "ok"){

                        echo'<script>

                        swal({
                              type: "success",
                              title: "El usuario modificado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar",
                              closeOnConfirm: false
                              }).then(function(result){
                                if (result.value) {

                                        window.location = "usuarios";

                                        }
                                    })

                        </script>';

                    }


                }else{

                    echo'<script>

                        swal({
                              type: "error",
                              title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {

                                window.location = "usuarios";

                                }
                            });

                    </script>';

                }

            }

        }


    /*=========================================
              BORRAR USUARIO
  ===========================================*/

  static public function ctrBorrarUsuario(){

        if(isset($_GET["idUsuario"])){

                $tabla = "usuarios";
                $datos = $_GET["idUsuario"];

                $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                              type: "success",
                              title: "El usuario ha sido borrado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {

                                        window.location = "usuarios";

                                        }
                                    })

                        </script>';

                    }
                    
        }

  }

}