<div class="content-wrapper">
    <section class="content-header">
        <h1>Historial Comisiones Ventas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"> Comisiones y Bonificacaciones</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Codigo Comisión</th>
                            <th>Empleado</th>
                            <th>Monto Venta</th>
                            <th>Mes</th>
                            <th>Porcentaje</th>
                            <th>Bonificación</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                                 $item = null;
                                 $valor = null;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorComisiones::ctrMostrarBonificaciones($item, $valor);

                                  foreach ($anticipos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                        <td>'.$value["codigo"].'</td>';

                                  $itemEmpleado = "idEmpleado";
                                  $valorEmpleado = $value["idEmpleado"];

                                  $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                                    echo '<td>' .$respuestaEmpleado["nombre"]. ' ' .$respuestaEmpleado["apellido"].'</td>';

                                    echo '<td>Q. '.$value["montoVenta"].'</td>
                                          <td>'.$value["mes"].'</td>
                                          <td>'.$value["porcentajeComision"].'</td>
                                          <td>Q. '.$value["bonificacion"].'</td>   

                                        </tr>';

                                  }

                                   ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>