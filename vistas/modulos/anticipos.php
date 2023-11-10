<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Solicitud de Anticipos</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="empleados"><i class="fa fa-dashboard"></i> Empleados</a></li>
            <li class="active">Solicitud de Anticipos</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Solicitud de Anticipos -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Solicitar Anticipo</h3>
                        <form role="form" method="post">
                            <div class="box-body">


                            <!-- Campo oculto para idEmpleado -->

                              <input type="hidden" name="idEmpleado" value="<?php echo $_SESSION["idEmpleado"]; ?>">
                                   
                            <!-- Campo para Codigo  -->

                              <div class="form-group">
                              
                              <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <?php

                                $item = null;
                                $valor = null;

                                $anticipos = ControladorAnticipos::ctrMostrarAnticipos($item, $valor);

                                if(!$anticipos){

                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="101" readonly>';
                              

                                }else{

                                  foreach ($anticipos as $key => $value) {
                                    
                                    
                                  
                                  }

                                  $codigo = $value["codigo"] + 1;



                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                              

                                }

                                ?>
                                
                                
                              </div>
                            
                            </div>

                            <!-- Campo Monto -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input type="number" class="form-control input-lg" name="nuevoMonto" placeholder="Monto del Anticipo" min="0" required>
                                    </div>
                                </div>

                                <!-- Campo Motivo -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <textarea class="form-control input-lg" name="nuevoMotivo" placeholder="Motivo de la Solicitud" rows="4" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Enviar Solicitud</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php

                          $crearAnticipo = new ControladorAnticipos();
                          $crearAnticipo -> ctrAgregarAnticipo();

                        ?>  

                    </div>
                </div>
            </div>
            <!-- Tabla de Solicitudes de Anticipos -->
            <div class="col-lg-8 ">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No.</th>
                                    <th>Codigo</th>
                                    <th>Monto</th>
                                    <th>Motivo</th>
                                    <th>Fecha de Solicitud</th>
                                    <th>Fecha de Aprobación</th>
                                    <th>Estado</th>
                                    <th style="width: 10px;">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $idEmpleado = $_SESSION["idEmpleado"];

                                 $item = "idEmpleado";
                                  $valor = $idEmpleado;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorAnticipos::ctrMostrarAnticipos( $item, $valor);

                                  foreach ($anticipos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>
                                          <td>'.$value["monto"].'</td>
                                          <td>'.$value["motivo"].'</td>
                                          <td>'.$value["fechaSolicitud"].'</td>
                                          <td>'.$value["fechaAprobacion"].'</td>
                                          <td>'.$value["estado"].'</td>
                                          <td>
                                            
                                            <div class="btn-group">
                                              

                                               <button class="btn btn-danger btnEliminarAnticipo" idAnticipo="'.$value["idAnticipo"].'"><i class="fa fa-times"></i></button>

                                            </div>

                                          </td>

                                        </tr>';

                                  }

                                   ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- =========================================
               MODAL EDITAR SOLICITUD ANTICIPO
    ===========================================-->

   
  <!-- Modal -->
  <div id="modalEditarAnticipo" class="modal fade" role="dialog">

    <div class="modal-dialog">

      
      <div class="modal-content">

          <form role="form" method="post">  
    <!-- =========================================
               CABEZA DEL MODAL
    ===========================================-->

        <div class="modal-header" style="background: #009b78; color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Solicitud</h4>

        </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

        <!-- Campo Monto -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input type="number" class="form-control input-lg" name="editarMonto" id="editarMonto" placeholder="Monto del Anticipo" min="0" required>

                    <input type="hidden" name="idAnticipo" id="idAnticipo" required>
                </div>
            </div>

            <!-- Campo Motivo -->
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <textarea class="form-control input-lg" name="editarMotivo" id="editarMotivo"  placeholder="Motivo de la Solicitud" rows="4" required></textarea>
                </div>
            </div>


      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar cambios</button>

      </div>

     

      </form>

    </div>

  </div>

</div>
 <?php

  $eliminarAnticipo = new ControladorAnticipos();
  $eliminarAnticipo -> ctrBorrarAnticipo();

?>  
