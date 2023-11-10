<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Registrar Ventas</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Registrar Ventas</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de comision ventas registro -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registrar Ventas</h3>
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

                                $comisiones = ControladorComisiones::ctrMostrarComisiones($item, $valor);

                                if(!$comisiones){

                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="501" readonly>';
                              

                                }else{

                                  foreach ($comisiones as $key => $value) {
                                    
                                    
                                  
                                  }

                                  $codigo = $value["codigo"] + 1;



                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                              

                                }

                                ?>
                                
                                
                              </div>
                            
                            </div>

                            <!-- Campo Total Venta -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input type="number" class="form-control input-lg" name="nuevoMonto" placeholder="Ingrse el monto toal ventas" min="0" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Enviar Solicitud</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>

                                </div>
                            </div>
                        </form>
                        <?php

                          $crearComisiones = new ControladorComisiones();
                          $crearComisiones -> ctrAgregarVentas();

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
                                    <th>Ventas</th>
                                    <th>fecha de ingreso</th>
                                    <th>Mes</th>
                                    <th style="width: 10px;">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $idEmpleado = $_SESSION["idEmpleado"];

                                 $item = "idEmpleado";
                                  $valor = $idEmpleado;

                                // var_dump($idEmpleado);

                                  $comisiones = ControladorComisiones::ctrMostrarComisiones( $item, $valor);

                                  foreach ($comisiones as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>
                                          <td>Q. '.$value["ventas"].'</td> 
                                          <td>'.$value["fecha"].'</td>
                                          <td>'.$value["mes"].'</td>
                                          <td>
                                            
                                            <div class="btn-group">
                                              
                                                <button class="btn btn-warning btnEditarComision" idVenta="'.$value["idVenta"].'"><i class="fa fa-times"></i></button>

                                               <button class="btn btn-danger btnEliminarComision" idVenta="'.$value["idVenta"].'"><i class="fa fa-times"></i></button>

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

