<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Solicitud de Anticipos Pendientes</h1>
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

                           

                            <!-- Campo para Codigo Empleado -->
                            <div class="form-group">
                  
                              <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                
                               <select class="form-control select2" style="width: 100%;" id="idEmpleado" name="idEmpleado" required>

                                <option value="" disabled selected>Seleccionar Codigo</option>

                                <?php

                                  $item = null;
                                  $valor = null;

                                  $empresa = ControladorAnticipos::ctrMostrarAnticiposPendientes($item, $valor);

                                   foreach ($empresa as $key => $value) {
                                   
                                     echo '<option value="'.$value["idEmpleado"].'">'.$value["codigo"]. '</option>';

                                   }

                                ?>

                                </select>
                                
                              </div>
                            
                            </div>
                            
                             <!-- ENTRADA PARA EL ESTADO -->
          
                               <div class="form-group"> 

                                  <div class="input-group"> 

                                      <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>

                                      <select class="form-control input-lg" name="nuevoEstado" id="nuevoEstado">
                                         <option value="">Cambiar Estado</option>

                                          <option value="Aprobado">Aprobado</option>

                                          <option value="Rechazado">Rechazado</option>

                                      </select>

                                  </div>

                              </div>
                                   
                            <!-- Campo oculto para idUsuario -->
                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Cambiar Estado</button>
                                    <button type="button" class="btn btn-danger" id="cancelarP">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php

                          $crearAnticipo = new ControladorAnticipos();
                          $crearAnticipo -> ctrActualizarEstadoAnticipo();

                        ?>  

                    </div>
                </div>
            </div>



            <!-- TABLA ANTICIPOS PENDIENTES -->
            <div class="col-lg-8 ">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No.</th>
                                    <th>Codigo</th>
                                    <th>Empleado</th>
                                    <th>Monto</th>
                                    <th>Motivo</th>
                                    <th>Fecha Solicitud</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php 


                                 $item = null;
                                 $valor = null;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorAnticipos::ctrMostrarAnticiposPendientes($item, $valor);

                                  foreach ($anticipos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>';

                                  $itemEmpleado = "idEmpleado";
                                  $valorEmpleado = $value["idEmpleado"];

                                  $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                                    echo '<td>' .$respuestaEmpleado["nombre"]. ' ' .$respuestaEmpleado["apellido"].'</td>';

                                    echo '<td>'.$value["monto"].'</td>
                                          <td>'.$value["motivo"].'</td>
                                          <td>'.$value["fechaSolicitud"].'</td>
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

 <?php

  $eliminarAnticipo = new ControladorAnticipos();
  $eliminarAnticipo -> ctrBorrarAnticipo();

?>  
