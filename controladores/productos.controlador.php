<?php 

class ControladorProductos{

    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/

    static public function ctrMostrarProductos($item, $valor, $orden){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

        return $respuesta;

    }


  /*=========================================
           CREAR PRODUCTO
  ===========================================*/

  static public function ctrCrearProducto(){

    if(isset($_POST["nuevaDescripcion"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
            preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
            preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
            preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){


            $tabla = "productos";

            $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "stock" => $_POST["nuevoStock"],
                               "precio_compra" => $_POST["nuevoPrecioCompra"],
                               "precio_venta" => $_POST["nuevoPrecioVenta"]);

            $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos, $orden);


            if($respuesta == "ok"){

                echo '<script>

                    swal({

                            type: "success",
                            title: "!El producto ha sido guardado correctamente!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "productos";
                                    }

                                })

                </script>';

            }


        }else{

            echo '<script>

                    swal({

                            type: "error",
                            title: "!El producto no puede ir vacío o llevar caracteres especiales!", 
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{

                                    if(result.value){

                                        window.location = "productos";
                                    }

                                })

                </script>';


        }

      }

    }
      /*=========================================
           EDITAR PRODUCTO
  ===========================================*/

    static public function ctrEditarProducto(){

        if(isset($_POST["editarDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
               preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&   
               preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
               preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

                    $tabla = "productos";

                $datos = array("id_categoria" => $_POST["editarCategoria"],
                               "codigo" => $_POST["editarCodigo"],
                               "descripcion" => $_POST["editarDescripcion"],
                               "stock" => $_POST["editarStock"],
                               "precio_compra" => $_POST["editarPrecioCompra"],
                               "precio_venta" => $_POST["editarPrecioVenta"]);

                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                        swal({
                              type: "success",
                              title: "El producto ha sido editado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {

                                        window.location = "productos";

                                        }
                                    })

                        </script>';

                }


            }else{

                echo'<script>

                    swal({
                          type: "error",
                          title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "productos";

                            }
                        })

                </script>';
            }
        }
    }


    /*=============================================
    BORRAR PRODUCTO
    =============================================*/
    static public function ctrEliminarProducto(){

        if(isset($_GET["idProducto"])){

            $tabla ="productos";
            $datos = $_GET["idProducto"];

            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "El producto ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "productos";

                                }
                            })

                </script>';

            }       
        }


    }


    /*=============================================
    MOSTRAR SUMA VENTAS
    =============================================*/

    static public function ctrMostrarSumaVentas(){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

        return $respuesta;

    }
}
