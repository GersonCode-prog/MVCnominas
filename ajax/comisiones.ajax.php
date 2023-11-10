<?php  

require_once "../controladores/comisiones.controlador.php";
require_once "../modelos/comisiones.modelo.php";

class AjaxComisiones{

/*=============================================
    VALIDAR NO REPETIR MES
=============================================*/

public function ajaxValidarMes()
{
    $mes = $this->validarMes;
    $existeMes = ControladorComisiones::ctrValidarMes($mes);

    echo json_encode($existeMes);
}

}


/*=============================================
    VALIDAR NO REPETIR MES
=============================================*/

if (isset($_POST["validarMes"])) {
    $valMes = new AjaxComisiones();
    $valMes->validarMes = $_POST["validarMes"];
    $valMes->ajaxValidarMes();
}

