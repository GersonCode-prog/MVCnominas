<?php $idDocumento = $_COOKIE['idDocumento'] ?? ''; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Ver Documento</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="cargarDocumentos"><i class="fa fa-arrow-left"></i> Regresar</a></li>
      <li class="active">Documento</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-body">
        <?php
          if (is_numeric($idDocumento)) {
            $item = "idDocumento";
            $valor = $idDocumento;

            $documento = ControladorDocumentos::ctrMostrarDocumentosPorEmpleado($item, $valor);

            if (!empty($documento)) {
              // Accede directamente al primer registro del resultado
              $primerDocumento = $documento[0];

              // Imprime el contenido del PDF en toda la pantalla
              echo '<div id="pdf-container"><embed src="data:application/pdf;base64,' . base64_encode($primerDocumento["contenido"]) . '" type="application/pdf" width="1170px" height="650px"></embed></div>';
            } else {
              echo '<p>No se encontraron documentos para este empleado.</p>';
            }
          } else {
            echo "El idDocumento no es válido.";
          }
        ?>
      </div>
    </div>
  </section>
</div>
