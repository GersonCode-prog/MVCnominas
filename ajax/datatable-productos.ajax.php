<?php  

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class TablaProductos{

/*=========================================
   		MOSTRAR LA TABLA PRODUCTOS
  ========================================*/

  public function mostrarTablaProductos(){

  	$item = null;
    $valor = null;
    $orden = "id";

  	$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

  	$datosJson = '{

  		"data": [';

  		for($i =0; $i <count($productos); $i++){

  		/*=========================================
   		TRAENDO CATEGORIA
  		========================================*/

  		$item = "id";
  		$valor = $productos[$i]["id_categoria"];

  		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


  		/*=========================================
   		STOCK
  		========================================*/

  		if($productos[$i]["stock"] <=10){

  			$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</buton>";

  		}else if($productos[$i]["stock"] > 10 && $productos[$i]["stock"] <= 15){

  			$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</buton>";
  		}else{

  		$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</buton>";
  		}

  		/*=========================================
   		TRAEMOS LAS ACCIONES
 		========================================*/

 			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador"){


  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
  			
  			}else{

  					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

  				
  			}

  		$datosJson .= '[
			      "'.($i+1).'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$stock.'",
			      "'.$productos[$i]["precio_compra"].'",
			      "'.$productos[$i]["precio_venta"].'",
			      "'.$productos[$i]["ventas"].'",
			      "'.$productos[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

  		}

  		$datosJson = substr($datosJson, 0,  -1);

  		$datosJson .=	']

  	}';

  	echo $datosJson;
  	

  }


}


/*=========================================
   		ACTIVAR PRODUCTO
  ========================================*/

  $activarProductos = new TablaProductos();
  $activarProductos -> mostrarTablaProductos();