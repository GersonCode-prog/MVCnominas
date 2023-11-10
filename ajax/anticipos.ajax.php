<?php 

	require_once "../controladores/anticipos.controlador.php";
	require_once "../modelos/anticipos.modelo.php";
	
	class AjaxAnticipos{

	/*=============================================
    EDITAR ANTICIPO
    =============================================*/ 

    public $idAnticipo;

    public function ajaxEditarAnticipo(){

    	$item = "idAnticipo";

    	$valor = $this->idAnticipo;

    	$respuesta = ControladorAnticipos::ctrMostrarAnticipos($item, $valor);

    	echo json_encode($respuesta);

    }

   }

   	/*=============================================
    EDITAR ANTICIPO
    =============================================*/ 
    if(isset($_POST["idAnticipo"])){

	$anticipo = new AjaxAnticipos();
	$anticipo -> idAnticipo = $_POST["idAnticipo"];
	$anticipo -> ajaxEditarAnticipo();

}