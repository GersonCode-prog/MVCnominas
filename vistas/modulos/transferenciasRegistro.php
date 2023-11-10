<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Registrar Transferencia</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="empleados"><i class="fa fa-dashboard"></i> Empleados</a></li>
            <li class="active">Registrar Transferencias</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Solicitud de Transferencias -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Realizar Transferencia</h3>
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

                                $transferencias = ControladorTransferencias::ctrMostrarTransferencias($item, $valor);

                                if(!$transferencias){

                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="801" readonly>';
                              

                                }else{

                                  foreach ($transferencias as $key => $value) {
                                    
                                    
                                  
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

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Enviar Solicitud</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php

                          $crearTransferencia = new ControladorTransferencias();
                          $crearTransferencia -> ctrAgregarTrans();

                        ?>  

                    </div>
                </div>
            </div>
            <!-- Tabla de Solicitudes de Transferencias -->
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
                                    <th>Fecha de Solicitud</th>
                                    <th>Fecha de Aprobación</th>
                                    <th>Estado</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $idEmpleado = $_SESSION["idEmpleado"];

                                 $item = "idEmpleado";
                                  $valor = $idEmpleado;

                                // var_dump($idEmpleado);

                                  $Transferencias = ControladorTransferencias::ctrMostrarTransferencias( $item, $valor);

                                  foreach ($Transferencias as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>
                                          <td>'.$value["monto"].'</td>
                                          <td>'.$value["fecha"].'</td>
                                          <td>'.$value["fechaAprobacion"].'</td>
                                          <td>'.$value["estado"].'</td>
                                          

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
