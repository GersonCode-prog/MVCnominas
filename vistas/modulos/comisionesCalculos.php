<div class="content-wrapper">
    <section class="content-header">
        <h1>Porcentaje Comisión y Bonificación</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Comisiones y Bonificaciones</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- Formulario de Solicitud de Anticipos -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mes correspondiente</h3>
                        <form role="form" method="post">
                            <div class="box-body">
                                <!-- Campo oculto para idEmpleado -->
                                <input type="hidden" name="idEmpleado" value="<?php echo $_SESSION["idEmpleado"]; ?>">
                                <!-- Campo para Código -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $anticipos = ControladorComisiones::ctrMostrarBonificaciones($item, $valor);
                                        if (!$anticipos) {
                                            echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="601" readonly>';
                                        } else {
                                            foreach ($anticipos as $key => $value) {
                                            }
                                            $codigo = $value["codigo"] + 1;
                                            echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Campo de entrada para el mes -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <?php
                                        $mesActual = date("F");
                                        echo '<input type="text" class="form-control input-lg" name="nuevoMes" id="nuevoMes" value="' . $mesActual . '" readonly>';
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right" id="realizarCalculoBtn">Realizar Cálculo</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        $crearBonificacion = new ControladorComisiones();
                        $crearBonificacion -> ctrCalcularBonifiacionesComision();
                        ?>
                    </div>

                </div>
            </div>
            <!-- Tabla de Solicitudes de Anticipos -->
            <div class="col-lg-8">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No.</th>
                                    <th>Código</th>
                                    <th>Total Venta</th>
                                    <th>Porcentaje Comisión</th>
                                    <th>Bonificación</th>
                                    <th>Fecha</th>
                                    <th>Mes</th>
                                    <th style="width: 10px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $idEmpleado = $_SESSION["idEmpleado"];
                                $item = "idEmpleado";
                                $valor = $idEmpleado;
                                $anticipos = ControladorComisiones::ctrMostrarBonificaciones($item, $valor);
                                foreach ($anticipos as $key => $value) {
                                    echo '<tr>  
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["codigo"].'</td>
                                        <td>'.$value["montoVenta"].'</td>
                                        <td>'.$value["porcentajeComision"].'</td>
                                        <td>'.$value["bonificacion"].'</td>
                                        <td>'.$value["fecha"].'</td>
                                        <td>'.$value["mes"].'</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btnEliminarAnticipo" idBonificacion="'.$value["idBonificacion"].'"><i class="fa fa-times"></i></button>
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
