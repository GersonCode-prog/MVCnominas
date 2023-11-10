<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Horas Extras</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Horas Extras</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Validación de Horas Extras -->
            <div class="col-lg-3 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Validar Horas Extras</h3>
                        <form role="form" method="post">
                            <div class="box-body">

                                <!-- Campo para Código Empleado -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <select class="form-control select2" style="width: 100%;" id="idEmpleado" name="idEmpleado" required>
                                            <option value="" disabled selected>Seleccionar Código</option>
                                            <?php
                                                $item = null;
                                                $valor = null;
                                                $Hrs = ControladorHrsExtras::ctrMostrarHrsExtrasPendientes($item, $valor);
                                                foreach ($Hrs as $key => $value) {
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
                            $actualizarAusencias = new ControladorHrsExtras();
                            $actualizarAusencias -> ctrActualizarEstadoHorasExtras();
                        ?>
                    </div>
                </div>
            </div>

            <!-- TABLA HORAS EXTRAS PENDIENTES -->
            <div class="col-lg-9">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Código</th>
                                    <th>Empleado</th>
                                    <th>Fecha de registro</th>
                                    <th>Horas Trabajadas</th>
                                    <th>Estado</th>
                                    <th>Salario Extra</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                   
                                     $item = null;
                                     $valor = null;

                                     $HrsExtras = ControladorHrsExtras::ctrMostrarHrsExtrasPendientes($item, $valor);
                                    foreach ($HrsExtras as $key => $value) {
                                        echo '<tr>  
                                                <td>'.($key+1).'</td>
                                                <td>'.$value["codigo"].'</td>';

                                      $itemEmpleado = "idEmpleado";
                                      $valorEmpleado = $value["idEmpleado"];

                                      $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                                        echo '<td>' .$respuestaEmpleado["nombre"]. ' ' .$respuestaEmpleado["apellido"].'</td>';

                                        echo '
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
<?php
    $eliminarAnticipo = new ControladorAnticipos();
    $eliminarAnticipo -> ctrBorrarAnticipo();
?>
