<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Empleados</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Empleados</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEmpleado">
                    Agregar Empleado
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha Nacimiento</th>
                            <th>Género</th>
                            <th>Estado Civil</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Datos</th>
                            <th style="width: 10px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $item = null;
                        $valor = null;
                        $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);
                        foreach ($empleados as $key => $value) {
                            echo '<tr>  
                                    <td>'.($key+1).'</td>
                                    <td><a href="#" class="imagen-empleado" data-toggle="modal" data-target="#modalVerImagen" data-imagen="'.base64_encode($value["foto"]).'"><img src="data:image/jpeg;base64,'.base64_encode($value["foto"]).'" alt="Empleado Image" width="50"></a>
                                    </td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["fechaNacimiento"].'</td>
                                    <td>'.$value["genero"].'</td>
                                    <td>'.$value["estadoCivil"].'</td>
                                    <td>'.$value["departamento"].'</td>
                                    <td>'.$value["correoElectronico"].'</td>
                                    <td> 
                                                
                                    <a href="#" class="btn btn-success btnDocumentos" idEmpleado="'.$value["idEmpleado"].'"><i class="fa fa-file-pdf-o"></i></a>



                                      <a href="#" class="btn btn-info btnHistorialSalarial" idEmpleado="'.$value["idEmpleado"].'"><i class="fa fa-clipboard"></i></a>
                                        
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                           <button class="btn btn-warning btnEditarEmpleado" idEmpleado="'.$value["idEmpleado"].'" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>
                          
                                         <button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["idEmpleado"].'"><i class="fa fa-times"></i></button>


                                        </div>
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


<!-- =========================================
             MODAL AGREGAR EMPLEADO
  ===========================================-->

 
<!-- Modal -->
<div id="modalAgregarEmpleado" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #762e2e; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Empleado</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->\
      <div class="modal-body">
      
      <div class=" box-body">


        <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" id="nuevoNombre" required>

              </div>

          </div>


        <!-- ENTRADA PARA EL APELLIDO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar apellido" id="nuevoApellido" required>

              </div>

          </div>


          <!-- ENTRADA PARA EL FECHA NACIMIENTO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <label for="fecha">Selecciona fecha de nacimiento:</label>
                  <input type="date" class="form-control input-lg" name="nuevaFecha" id="nuevaFecha" placeholder="Ingresar fecha de Nacimiento" required>

              </div>

          </div>

            <!-- ENTRADA PARA EL GENERO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="nuevoGenero" id="nuevoGenero">
                    
                      <option value="">Genero</option>

                      <option value="Hombre">Hombre</option>

                      <option value="Mujer">Mujer</option>

                  </select>

              </div>

          </div>

          <!-- ENTRADA PARA EL ESTADO CIVIL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="nuevoEstado" id="nuevoEstado">
                    
                      <option value=""> Estado Civil</option>

                      <option value="Soltero">Soltero</option>

                      <option value="Casado">Casado</option>

                      <option value="Divorciado">Divorciado</option>

                      <option value="Viudo">Viudo</option>

                  </select>

              </div>

          </div>


           <!-- ENTRADA PARA EL DIRECCION -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección"  required>

              </div>

          </div>


          <!-- ENTRADA PARA EL EMAIL -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

          </div>


            <!-- ENTRADA PARA LA FOTO -->
            <div class="form-group">
                <label for="nuevaFoto">Seleccionar Foto:</label>
                <input type="file" class="form-control-file" name="nuevaFoto" id="nuevaFoto">
            </div>

    </div>
</div>  

<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="empleado" class="btn btn-default pull-left">Cancelar</a>

        <button type="submit" class="btn btn-success">Guardar Empleado</button>

      </div>

      </form>

      <?php

          $crearProducto = new ControladorEmpleados();
          $crearProducto -> ctrAgregarEmpleado();

        ?>  

    </div>

  </div>

</div>  


<!-- =========================================
             MODAL EDITAR CLIENTE
  ===========================================-->

 
<!-- Modal -->
<div id="modalEditarEmpleado" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #762e2e; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Empleado</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->\
      <div class="modal-body">
      
      <div class=" box-body">

          <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarNombre" placeholder="Ingresar nombre" id="editarNombre" required>

              </div>

          </div>


        <!-- ENTRADA PARA EL APELLIDO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarApellido" placeholder="Ingresar apellido" id="editarApellido" required>

              </div>

          </div>


          <!-- ENTRADA PARA EL FECHA NACIMIENTO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <label for="fecha">Selecciona una fecha:</label>
                  <input type="date" class="form-control input-lg" name="editarFecha" id="editarFecha" placeholder="Ingresar fecha de Nacimiento" required>

              </div>

          </div>

            <!-- ENTRADA PARA EL GENERO -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="editarGenero" id="editarGenero">

                    
                      <option value="">Genero</option>

                      <option value="Hombre">Hombre</option>

                      <option value="Mujer">Mujer</option>

                  </select>

              </div>

          </div>

          <!-- ENTRADA PARA EL ESTADO CIVIL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="editarCivil" id="editarCivil">

                      <option value="">Estado Civil</option>

                      <option value="Soltero">Soltero</option>

                      <option value="Casado">Casado</option>

                      <option value="Divorciado">Divorciado</option>

                      <option value="Viudo">Viudo</option>

                  </select>

              </div>

          </div>


           <!-- ENTRADA PARA EL DIRECCION -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" placeholder="Ingresar dirección"  required>

              </div>

          </div>


          <!-- ENTRADA PARA EL EMAIL -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                  <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Ingresar email" required>

              </div>

          </div>


            <!-- ENTRADA PARA LA FOTO -->
            <div class="form-group">
                <label for="nuevaFoto">Seleccionar Foto:</label>
                <input type="file" class="form-control-file" name="editarFoto" id="editarFoto">
            </div>

    </div>
</div>  

<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="empleados" class="btn btn-default pull-left">Cancelar</a>

        <button type="submit" class="btn btn-success">Guardar cambios</button>

      </div>

      </form>

       

    </div>

  </div>

</div>


<!-- =========================================
             MODAL VER IMAGEN
  ===========================================-->

  <div id="modalVerImagen" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">IMG-EMPLEADO</h3>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img src="" alt="Imagen del Empleado" class="imagen-ampliada" style="width: 70%; display: inline-block;">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-success btnDescargarImagen" download>Descargar</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


 <?php   

        $borrarEmpleado = new ControladorEmpleados();
        $borrarEmpleado -> ctrBorrarEmpleado();

?>


