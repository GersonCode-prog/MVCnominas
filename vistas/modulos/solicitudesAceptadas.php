<div class="content-wrapper">
    <section class="content-header">
        <h1>Solicitudes Aceptadas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Hitorial de solicitudes aceptadas</li>
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
                            <th>Monto</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                            <th>Fecha de Solicitud</th>
                            <th>Fecha de Aprobación</th>
                            <th>Encargado</th>
                            <th>Informe</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                                 $item = null;
                                 $valor = null;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorAnticipos::ctrMostrarAnticiposAceptados($item, $valor);

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
                                          <td>'.$value["estado"].'</td>
                                          <td>'.$value["fechaSolicitud"].'</td>
                                          <td>'.$value["fechaAprobacion"].'</td>';


                                  $idUsuario = $_SESSION['idUsuario'];

                                  $itemUsuario = "idUsuario";
                                  $valorUsuario = $idUsuario;

                                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);


                                     echo '<td>'.$respuestaUsuario["nombreUsuario"].'</td>
                                          <td>
                                            
                                           <div class="btn-group">
                    
                                            <button class="btn btn-warning btnImprimirFactura"  codigoVenta="'.$value["codigo"].'">

                                            <i class="fa fa-print"></i></button>

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