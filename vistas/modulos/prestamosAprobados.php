<div class="content-wrapper">
    <section class="content-header">
        <h1>Historial Prestamos Aprobados</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Prestamos Aprobados</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                             <th>Codigo</th>
                             <th>Empleado</th>
                             <th>Fecha Solicitud</th>
                             <th>Monto</th>
                             <th>Plazo Pago</th>
                             <th>Cuota</th>
                             <th>Estado</th>
                             <th>Fecha Aprobado</th>
                             <th>Aprobador</th>
                             <th>Mes</th>
                             <th>Informe</th>
                        </tr>
                    </thead>
                    <tbody>

                       <?php 

                              

                                 $item = null;
                                  $valor = null;

                                // var_dump($idEmpleado);

                                  $prestamos = ControladorPrestamos::ctrMostrarPrestamosAceptados( $item, $valor);

                                  foreach ($prestamos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>';

                                  $itemEmpleado = "idEmpleado";
                                  $valorEmpleado = $value["idEmpleado"];

                                  $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                                    echo '<td>' .$respuestaEmpleado["nombre"]. ' ' .$respuestaEmpleado["apellido"].'</td>';

                                    echo ' <td>'.$value["fechaIngreso"].'</td>
                                          <td>'.$value["montoPrestamo"].'</td>
                                          <td>'.$value["plazoPago"].'</td> 
                                          <td>'.$value["cuotaMensual"].'</td>
                                          <td>'.$value["estado"].'</td>
                                          <td>'.$value["fechaAprobacion"].'</td>';


                                              $idUsuario = $_SESSION['idUsuario'];

                                              $itemUsuario = "idUsuario";
                                              $valorUsuario = $idUsuario;

                                              $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);


                                                 echo '<td>'.$respuestaUsuario["nombreUsuario"].'</td>

                                                 <td>'.$value["mes"].'</td>

                                         <td>
                                            
                                           <div class="btn-group">
                    
                                            <button class="btn btn-warning btnImprimirFacturaPrestamos"  codigoVenta="'.$value["codigo"].'">

                                            <i class="fa fa-print"></i></button>

                                          </td>
                                          </td>

                                        </tr>';

                                  }

                                   ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>