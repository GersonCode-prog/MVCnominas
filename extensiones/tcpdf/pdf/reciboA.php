<?php


require_once "../../../controladores/ausencias.controlador.php";
require_once "../../../modelos/ausencias.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";




class imprimirReciboA{

public $codigo;

public function traerImpresionReciboA(){


// TRAEMOS LA INFROMACION DEL ANTICIPO

$itemAuasencia = "codigo";
$valorAuasencia = $this->codigo;

$respuestaAuasencia = ControladorAusencias::ctrMostrarAusenciasI($itemAuasencia, $valorAuasencia);

$diasAusencia = $respuestaAuasencia["diasAusencia"];
$fechaSolicitud = $respuestaAuasencia["fechaSolicitud"];
$fechaFin = $respuestaAuasencia["fechaFin"];
$fechaInicio = $respuestaAuasencia["fechaInicio"];
$fechaAprobacion = $respuestaAuasencia["fechaAprobacion"];
$razon = $respuestaAuasencia["razon"];
$motivo = $respuestaAuasencia["motivo"];
$idAprobador = $respuestaAuasencia["idAprobador"];
$estado = $respuestaAuasencia["estado"];
$idEmpleado = $respuestaAuasencia["idEmpleado"];


//INF. USUARIO

$itemUsuario = "idUsuario";
$valorUsuario = $respuestaAuasencia["idAprobador"];

$respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

$nombreUsuario = $respuestaUsuario["nombreUsuario"];








//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------
//PRIMER BLOQUE INF. DE LA EMPRESA NO. DE FACTURA

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/log.jpg"></td>

			<td sytle="backgroudn-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

				<br>
				NIT: 71.759.963-9
				
				<br>
				Direccion: Barrio San benito, calle 448 91-11

				</div>

			</td>

			<td sytle="backgroudn-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">

				<br>
				Teléfono: 5446 6824
				
				<br>
				pruebapdf@gmail.com
				</div>

			</td>

			<td style="background-color:white; widht:110px; text-align:center; color:red"><br><br>INFORME N.<br>$valorAuasencia</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------
// INF. DEL CLIENTE Y EL VENDEDOR 

$bloque2 = <<<EOF

<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>


	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:270px">

				Encargado: $nombreUsuario

			</td>

			<td style="border: 1px solid #666; background-color:white; width:270px; text-align:left">
			
				Fecha Solicitud: $fechaSolicitud
			</td>

		</tr>

		<tr>

		<td 

			style="border: 1px solid #666; background-color:white; width:270px">Empleado: $idEmpleado 
		
		</td>

		<td 

			style="border: 1px solid #666; background-color:white; width:270px; text-align:left">
			
				Estado: $estado
		</td>


		</tr>

		<tr>

		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');



// ---------------------------------------------------------
// TITULOS DE INF. DE LA VENTA
$bloque3 = <<<EOF

<table style="font-size:10px; padding:5px 10px;">

	<tr>
	
	<td style="border: 1px solid #666; background-color:white; width:115px; text-align:center">Dias Ausente</td> 
	<td style="border: 1px solid #666; background-color:white; width:155px; text-align:center">Motivo</td> 
	<td style="border: 1px solid #666; background-color:white; width:135px; text-align:center">Fecha Inicio</td>
	<td style="border: 1px solid #666; background-color:white; width:135px; text-align:center">Fehca Fin</td>
	</tr>



	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:115px; text-align:center">
				$diasAusencia
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:155px; text-align:center">
				$razon
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:135px; text-align:center">
				$fechaInicio
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:135px; text-align:center"> 
				$fechaFin
			</td>



		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');


// ---------------------------------------------------------



//SALIDA DEL ARCHIVO
$pdf->Output('factura.pdf');


}


}


// almacenamos lo el codigo que viene en la variable get en la variable codigo.
$recibo = new imprimirReciboA();
$recibo -> codigo = $_GET["codigo"];
$recibo -> traerImpresionReciboA();


?>