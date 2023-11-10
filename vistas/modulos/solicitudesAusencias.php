<div class="content-wrapper">
    
    <section class="content-header">
        <h1>Solicitud de Ausencias</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Solicitar Ausencias</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Formulario de Solicitud de Anticipos -->
            <div class="col-lg-4 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Solicitar Ausencia</h3>
                        <form role="form" method="post">
                            <div class="box-body">


                            <!-- Campo oculto para idEmpleado -->

                              <input type="hidden" name="idEmpleado" value="<?php echo $_SESSION["idEmpleado"]; ?>">
                                   
                               <div class="form-group">
                              
                              <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <?php

                                $item = null;
                                $valor = null;

                                $ausencias = ControladorAusencias::ctrMostrarAusencia($item, $valor);

                                if(!$ausencias){

                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="201" readonly>';
                              

                                }else{

                                  foreach ($ausencias as $key => $value) {
                                    
                                    
                                  
                                  }

                                  $codigo = $value["codigo"] + 1;



                                  echo '<input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" value="'.$codigo.'" readonly>';
                              

                                }

                                ?>
                                
                                
                              </div>
                            
                            </div>
                                
                                <!-- ENTRADA PARA  FECHA DE Inicio -->

                          <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-arrow-circle-left"></i></span>
                                  <label for="fecha">Fecha de Inicio:</label>
                                  <input type="date" class="form-control input-lg" name="nuevaFechaAI" id="nuevaFechaAI" placeholder="Ingresar fecha de Inicio" required>

                              </div>

                            </div>

                            <!-- ENTRADA PARA  FECHA DE FIN -->

                                  <div class="form-group"> 

                                      <div class="input-group"> 

                                          <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span>
                                          <label for="fecha">Fecha de Fin:</label>
                                          <input type="date" class="form-control input-lg" name="nuevaFechaAF" id="nuevaFechaAF" placeholder="Ingresar fecha de fin" required>

                                      </div>

                            </div>

                              <!-- ENTRADA PARA EL MOTIVO -->
                          
                           <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                  <select class="form-control input-lg" name="nuevaRazon" id="nuevaRazon">
                                    
                                      <option value="">Seleccione el Motivo</option>

                                     <option value="Vacaciones anuales pagadas">Vacaciones anuales pagadas</option>
                                    <option value="Licencia por enfermedad">Licencia por enfermedad</option>
                                    <option value="Licencia por maternidad">Licencia por maternidad</option>
                                    <option value="Licencia por paternidad">Licencia por paternidad</option>
                                    <option value="Duelo o licencia por fallecimiento">Duelo o licencia por fallecimiento</option>
                                    <option value="Licencia por enfermedad de un familiar">Licencia por enfermedad de un familiar</option>
                                    <option value="Permiso de estudios">Permiso de estudios</option>
                                    <option value="Permiso sin goce de sueldo">Permiso sin goce de sueldo</option>
                                    <option value="Licencia por adopción">Licencia por adopción</option>
                                    <option value="Licencia por cuidado de hijos">Licencia por cuidado de hijos</option>
                                    <option value="Licencia por matrimonio">Licencia por matrimonio</option>
                                    <option value="Días personales">Días personales</option>
                                    <option value="Licencia por accidente laboral">Licencia por accidente laboral</option>
                                    <option value="Licencia sin sueldo por razones familiares">Licencia sin sueldo por razones familiares</option>
                                    <option value="Permiso por servicio militar">Permiso por servicio militar</option>
                                    <option value="Licencia por duelo prenatal">Licencia por duelo prenatal</option>
                                    <option value="Licencia por motivos religiosos">Licencia por motivos religiosos</option>
                                    <option value="Permiso de emergencia">Permiso de emergencia</option>
                                    <option value="Licencia por enfermedad grave">Licencia por enfermedad grave</option>
                                    <option value="Permiso para asuntos legales">Permiso para asuntos legales</option>

                                  </select>

                              </div>

                          </div>

                            <!-- Campo Descripcion -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <textarea class="form-control input-lg" name="nuevoMotivoA" id="nuevoMotivoA" placeholder="Descripción" rows="4" required></textarea>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Enviar Solicitud</button>
                                    <button type="button" class="btn btn-danger" id="cancelarCargaA">Cancelar</button>
                                </div>
                            </div>
                        </form>
                        <?php

                         $crearAusencia = new ControladorAusencias();
                          $crearAusencia -> ctrCrearAusencia(); 

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
                                    <th>Motivo</th>
                                    <th>Descripción</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Dias Ausente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $idEmpleado = $_SESSION["idEmpleado"];

                                 $item = "idEmpleado";
                                  $valor = $idEmpleado;

                                // var_dump($idEmpleado);

                                  $anticipos = ControladorAusencias::ctrMostrarAusencia( $item, $valor);

                                  foreach ($anticipos as $key => $value) {
                                    
                                    echo '<tr>  
                                          <td>'.($key+1).'</td>
                                          <td>'.$value["codigo"].'</td>
                                          <td>'.$value["razon"].'</td>
                                          <td>'.$value["motivo"].'</td>
                                          <td>'.$value["fechaInicio"].'</td> 
                                          <td>'.$value["fechaFin"].'</td>
                                          <td>'.$value["diasAusencia"].'</td>
                                          <td>'.$value["estado"].'</td>
                                          <td>
                                            
                                            <div class="btn-group">
                                              

                                               <button class="btn btn-danger btnEliminarAnticipo" idAusencia="'.$value["idSolicitud"].'"><i class="fa fa-times"></i></button>

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
