<?php

require_once "../controladores/empresas.controlador.php";
require_once "../modelos/empresas.modelo.php";

class AjaxEmpresas{

    /*=============================================
    EDITAR EMPRESA
    =============================================*/ 

    public $idEmpresa;

    public function ajaxEditarEmpresa(){

        $item = "idEmpresa";
        $valor = $this->idEmpresa;

        $respuesta = ControladorEmpresas::ctrMostrarEmpresa($item, $valor);

        echo json_encode($respuesta);


    }

    /*=============================================
    VALIDAR NO REPETIR EMPRESA
    =============================================*/ 

    public  $validarEmpresa;

    public  function ajaxvalidarEmpresa(){

        $item = "nombreEmpresa";
        $valor = $this->validarEmpresa;
        $respuesta = ControladorEmpresas::ctrMostrarEmpresa($item, $valor);

        echo json_encode($respuesta);


    }
}


/*=============================================
EDITAR EMPRESA
=============================================*/ 

if(isset($_POST["idEmpresa"])){

    $empresa = new AjaxEmpresas();
    $empresa -> idEmpresa = $_POST["idEmpresa"];
    $empresa -> ajaxEditarEmpresa();

    }


 /*=============================================
    VALIDAR NO REPETIR EMPRESA 
=============================================*/ 

if(isset($_POST["validarEmpresa"])){

    $ValEmpresa = new AjaxEmpresas();
    $ValEmpresa -> validarEmpresa = $_POST["validarEmpresa"];
    $ValEmpresa -> ajaxvalidarEmpresa();

}