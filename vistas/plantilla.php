<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>NominasUMG</title>

  <!-- plugins -->
  <!-- valores de escala de pantalla -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/nominas.png">

   <!--=========================================
              PLUGINS DE CSS
  ===========================================-->

  <!-- Bootstrap -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins.-->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="vistas/dist/css/custom.css">


  <!-- Google Font/ tipografia con la que se va a trabajar -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

    <!-- select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/select2.min.css">

  <!-- PDF -->

  <link rel="stylesheet" type="text/css" href="vistas/plugins/pdfjs-3.11.174-dist/web/viewer.js">

  <!--=========================================
              PLUGINS DE JAVASCRIPT
  ===========================================-->
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap  -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->

  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

   <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- JQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker -->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

    <!-- ChartJS -->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>

  <!-- Select2 -->
  <script src="vistas/plugins/select2/select2.min.js"></script>

  <!-- PDF -->
<script src="vistas/plugins/pdfjs-3.11.174-dist/build/pdf.js"></script>

</head>

  <!--=========================================
                CUERPO DOCUMENTO
  ===========================================-->

<body class="hold-transition skin-blue sidebar-collapse  sidebar-mini login-page"> 
<!-- Site wrapper -->

<?php
if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
{


  echo '<div class="wrapper">';

  // incluimos lo que hara el modulo cabezote.php
   /*=========================================
                CABEZOTE
  ===========================================*/
  include "modulos/cabezote.php";

/*=========================================
                MENU
  ===========================================*/
  include "modulos/menu.php";

  /*=========================================
                CONTENIDO
  ===========================================*/

  if(isset($_GET["ruta"])){

    if($_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "empleados" ||
      $_GET["ruta"] == "cargarDocumentos" ||
      $_GET["ruta"] == "mostrarDocumento" ||
      $_GET["ruta"] == "historialLaboral" ||
      $_GET["ruta"] == "anticipos" ||
      $_GET["ruta"] == "solicitudesPendientes" ||
      $_GET["ruta"] == "solicitudesAceptadas" ||
      $_GET["ruta"] == "solicitudesAusencias" ||
      $_GET["ruta"] == "ausenciasPendientes" ||
      $_GET["ruta"] == "ausenciasAprobadas" ||
      $_GET["ruta"] == "hrsExtras" ||
      $_GET["ruta"] == "hrsExtrasPendientes" ||
      $_GET["ruta"] == "hrsExtrasAprobadas" ||
      $_GET["ruta"] == "comisionesCalculos" ||
      $_GET["ruta"] == "comisionesRegistro" ||
      $_GET["ruta"] == "comisionesInforme" ||
      $_GET["ruta"] == "prestamosAprobados" ||
      $_GET["ruta"] == "prestamosSolicitud" ||
      $_GET["ruta"] == "prestamosPendientes" ||
      $_GET["ruta"] == "transferenciasPendientes" ||
      $_GET["ruta"] == "transferenciasAprobación" ||
      $_GET["ruta"] == "transferenciasRegistro" ||
      $_GET["ruta"] == "categorias" ||  
      $_GET["ruta"] == "productos" ||
      $_GET["ruta"] == "empresas" ||
      $_GET["ruta"] == "ventas" ||
      $_GET["ruta"] == "crear-venta" ||
      $_GET["ruta"] == "editar-venta" ||
      $_GET["ruta"] == "reportes" || 
      $_GET["ruta"] == "manual" || 
      $_GET["ruta"] == "salir"){
      
      include "modulos/".$_GET["ruta"].".php";

    }else{

      include "modulos/404.php";
    }

  }else{

      include "modulos/inicio.php";

  }

  
  /*=========================================
                FOOTER
  ===========================================*/

  include "modulos/footer.php";

  echo '</div>';

}else{

  include "modulos/login.php";

}
  ?>
  
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/imagen.js"></script>
<script src="vistas/js/empleados.js"></script>
<script src="vistas/js/empresas.js"></script>
<script src="vistas/js/documentos.js"></script>
<script src="vistas/js/historialLaboral.js"></script>
<script src="vistas/js/anticipos.js"></script>
<script src="vistas/js/informe.js"></script>
<script src="vistas/js/comisiones.js"></script>
<script src="vistas/js/verDocumento.js"></script>


</body>
</html>
