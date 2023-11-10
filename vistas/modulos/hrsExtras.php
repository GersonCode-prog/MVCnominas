<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Registro de horas extras</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="empleados"><i class="fa fa-dashboard"></i>HorasExtras</a></li>
            <li class="active">Registar Horas Extras</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Registro de horas extras -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registar Horas Extras</h3>
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

                                $HrsExtras = ControladorHrsExtras::ctrMostrarHrsExtras($item, $valor);

                                if(!$HrsExtras){

                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="401" readonly>';
                              

                                }else{

                                  foreach ($HrsExtras as $key => $value) {
                                    
                                    
                                  
                                  }

                                  $codigo = $value["codigo"] + 1;



                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                              

                                } 

                                ?>
                                
                                
                              </div>
                            
                            </div>

                        <!-- ENTRADA PARA HORAS TRABAJADAS -->

                          <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <label for="fecha">Horas trabajadas:</label>
                                  <input type="number" class="form-control input-lg" name="nuevaHoras" id="nuevaHoras" placeholder="Ingresar horas trabajadas" max="4" min="0" required>

                              </div>

                          </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Enviar Solicitud</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php

                          $crearAnticipo = new ControladorHrsExtras();
                          $crearAnticipo -> ctrAgregarHrsExtra();

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
                                    <th>Fecha de registro</th>
                                    <th>Horas Trabajadas</th>
                                    <th>Estado</th>
                                   
                                    <th>Salario Extra</th>
                              

                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $idEmpleado = $_SESSION["idEmpleado"];

                                 $item = "idEmpleado";
                                  $valor = $idEmpleado;

                                // var_dump($idEmpleado);

                                  $HrsExtras = ControladorHrsExtras::ctrMostrarHrsExtras( $item, $valor);

                                  foreach ($HrsExtras as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>
                                          <td>'.$value["fecha"].'</td>
                                          <td>'.$value["horasTrabajadas"].'</td>
                                          <td>'.$value["estado"].'</td>
                                          <td>'.$value["salarioExtra"].'</td>
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
