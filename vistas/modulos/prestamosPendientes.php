<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Prestamos Pendientes</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Solicitud Prestamo</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Solicitud de Anticipos -->
            <div class="col-lg-3 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Aprobar / Rechazar</h3>
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

                                  $ausencias = ControladorPrestamos::ctrMostrarPrestamosPendientes($item, $valor);

                                   foreach ($ausencias as $key => $value) {
                                   
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

                          $actualizarPrestamo = new ControladorPrestamos();
                          $actualizarPrestamo -> ctrActualizarEstadoAnticipo();

                        ?>  


                    </div>
                </div>
            </div>



            <!-- TABLA PRESTAMOS PENDIENTES -->
            <div class="col-lg-9 ">
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
                                    <th>Plazo Pago</th>
                                    <th>Cuota</th>
                                    <th>fecha Ingreso</th>                               
                                </tr>
                            </thead>
                            <tbody>
                               <?php 

                              

                                 $item = null;
                                  $valor = null;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorPrestamos::ctrMostrarPrestamosPendientes( $item, $valor);

                                  foreach ($anticipos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>';

                                  $itemEmpleado = "idEmpleado";
                                  $valorEmpleado = $value["idEmpleado"];

                                  $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                                    echo '<td>' .$respuestaEmpleado["nombre"]. ' ' .$respuestaEmpleado["apellido"].'</td>';

                                    echo ' <td>'.$value["montoPrestamo"].'</td>
                                          <td>'.$value["plazoPago"].'</td>
                                          <td>'.$value["cuotaMensual"].'</td> 
                                          <td>'.$value["fechaIngreso"].'</td>
                            
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
