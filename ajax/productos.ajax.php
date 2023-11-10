<?php 

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

	class AjaxProductos{


	public $idCategoria;

	public function ajaxCrearCodigoProducto(){

		$item = "id_categoria";
		$valor = $this->idCategoria;
		$orden = "id";

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		echo json_encode($respuesta);

	}

	
/*=============================================
EDITAR PRODUCTO
=============================================*/ 
	
	 public $idProducto;

	 public $traerProductos;

	 public $nombreProducto;

	 public function ajaxEditarProducto(){

	 		if($this->traerProductos == "ok"){

	 			$item = null;
	 			$valor = null;
	 			$orden = "id";


	 			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

	 			echo json_encode($respuesta);

	 		}else if($this->nombreProducto != ""){

	 			$item = "descripcion";
	 			$valor = $this->nombreProducto;
	 			$orden = "id";


	 			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

     		echo json_encode($respuesta);
	

	 		} else{

		 $item = "id";
     $valor = $this->idProducto;
     $orden = "id";


     $respuesta =  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

     echo json_encode($respuesta);
	
   	}

	}

/*=============================================
    VALIDAR NO REPETIR PRODUCTOS
    =============================================*/ 

    public  $validarProducto;

    public  function ajaxValidarProducto(){

        $item = "descripcion";
        $valor = $this->validarProducto;
        $orden = "id";
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);


    }

}


	/*=============================================
	GENERANDO CODIGO A PARTIR DE ID CATEGORIA
	=============================================*/

	if(isset($_POST["idCategoria"])){

		$codigoProducto = new AjaxProductos();
		$codigoProducto -> idCategoria = $_POST["idCategoria"];
		$codigoProducto -> ajaxCrearCodigoProducto();

}

/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
TRARE PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $editarProductos = new AjaxProductos();
  $editarProductos -> traerProductos = $_POST["traerProductos"];
  $editarProductos -> ajaxEditarProducto();

}

/*=============================================
TRARE PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $editarProductos = new AjaxProductos();
  $editarProductos -> nombreProducto = $_POST["nombreProducto"];
  $editarProductos -> ajaxEditarProducto();

}

/*=============================================
    VALIDAR NO REPETIR PRODUCTO 
=============================================*/ 

if(isset($_POST["validarProducto"])){

    $valProducto = new AjaxProductos();
    $valProducto -> validarProducto = $_POST["validarProducto"];
    $valProducto -> ajaxValidarProducto();

}

