<?php 

	require_once "../controladores/categorias.controlador.php";
	require_once "../modelos/categorias.modelo.php";
	
	class AjaxCategorias{

	/*=============================================
    EDITAR CATEGORíA
    =============================================*/ 

    public $idCategoria;

    public function ajaxEditarCategoria(){

    	$item = "id";

    	$valor = $this->idCategoria;

    	$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

    	echo json_encode($respuesta);

    }

    /*=============================================
    VALIDAR NO REPETIR CATEGORIA
    =============================================*/ 

    public  $validarCateogria;

    public  function ajaxValidarCategoria(){

        $item = "categoria";
        $valor = $this->validarCateogria;
        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);


    }
}

	/*=============================================
    EDITAR CATEGORíA
    =============================================*/ 
    if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();

}

 
 /*=============================================
    VALIDAR NO REPETIR CATEGORIA 
=============================================*/ 

if(isset($_POST["validarCateogria"])){

    $valCategoria = new AjaxCategorias();
    $valCategoria -> validarCateogria = $_POST["validarCateogria"];
    $valCategoria -> ajaxValidarCategoria();

}