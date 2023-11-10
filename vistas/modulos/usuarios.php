
  <div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Administrar usuarios

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar usuarios</li>

      </ol>

    </section>


  <section class="content">

      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
            
            Agregar Usuario

          </button>
        
        </div>


          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th style="width: 20px">Empleado</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>
              
        <?php   
        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        if ($usuarios) { // Verificar si se encontraron usuarios

            foreach ($usuarios as $key => $value) {
                echo '<tr>  
                    <td>'.($key+1).'</td>';


        $itemEmpleado = "idEmpleado";
        $valorEmpleado = $value["idEmpleado"];

        $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

        echo '<td><img src="data:image/jpeg;base64,'.base64_encode($respuestaEmpleado["foto"]).'" alt="Empleado Image" width="40"></td>';

        echo '<td>'.$value["nombreUsuario"].'</td>
              <td>'.$value["perfil"].'</td>';


        $itemEmpresa = "idEmpresa";
        $valorEmpresa = $value["idEmpresa"];

        $respuestaEmpresa = ControladorEmpresas::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);

        echo '<td>' .$respuestaEmpresa["nombreEmpresa"]. '</td>';
 
        if ($value["estado"] != 0){
            echo ' <td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["idUsuario"].'" estadoUsuario="0">Activado</button></td>';
        } else { 
            echo ' <td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["idUsuario"].'" estadoUsuario="1">Desactivado</button></td>';
        }

        echo '<td>'.$value["ultimo_login"].'</td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["idUsuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["idUsuario"].'"><i class="fa fa-times"></i></button>
                </div>
            </td>
        </tr>';
    }

} else {
    echo '<tr><td colspan="6">No se encontraron usuarios.</td></tr>';
}
?>

            </tbody>

          </table>

        </div>
    
    </div>
  
  </section>

</div>


<!-- =========================================
             MODAL AGREGAR USUARIOS
  ===========================================-->

 
<!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #762e2e; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar usuario</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

         <!-- ENTRADA PARA EL ID USUARIO -->

           <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    
                    <select id="nombreEmpresa" name="nombreEmpresa" class="form-control" required>

                    <option value="" disabled selected>Seleccionar Empresa</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $empresa = ControladorEmpresas::ctrMostrarEmpresa($item, $valor);

                       foreach ($empresa as $key => $value) {
                       
                         echo '<option value="'.$value["idEmpresa"].'">'.$value["nombreEmpresa"].'</option>';

                       }

                    ?>

                    </select>
                    
                  </div>
                
                </div>



        <!-- ENTRADA PARA EL EMMPLEADO -->

           <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                    
                    <select id="nombreEmpleado" name="nombreEmpleado" class="form-control" required>

                    <option value="" disabled selected>Seleccionar Empleado</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                       foreach ($empleados as $key => $value) {
                        $nombreCompleto = $value["nombre"] . ' ' . $value["apellido"];

                         echo '<option value="'.$value["idEmpleado"].'">'.$nombreCompleto.'</option>';

                       }

                    ?>

                    </select>
                    
                  </div>
                
                </div>



           <!-- ENTRADA PARA EL PERFIL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <select class="form-control input-lg" name="nuevoPerfil" id="nuevoPerfil">
                    
                      <option value="">Seleccionar perfil</option>

                      <option value="Administrador">Administrador</option>

                      <option value="Especial">Especial</option>

                      <option value="Empleado">Empleado</option>

                  </select>

              </div>

          </div>

           <!-- ENTRADA PARA EL USUARIO -->

           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario"required>

              </div>

          </div>

          <!-- ENTRADA PARA EL CONTRASEÑA -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="nuevaContrasena" id="nuevaContrasena" placeholder="Ingresar Contraseña" idrequired>

              </div>

          </div>

      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar cambios</button>

      </div>

          <?php   

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

       ?>
     

      </form>

    </div>

  </div>

</div>



<!-- =========================================
             MODAL EDITAR USUARIOS
  ===========================================-->

 
<!-- Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #762e2e; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar usuario</h4>

      </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

          <!-- ENTRADA PARA EL ID EMPRESA -->

           <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select id="editarEmpresa" name="editarEmpresa" class="form-control" required>

                    <option value="" disabled selected>Seleccionar Empresa</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $empresa = ControladorEmpresas::ctrMostrarEmpresa($item, $valor);

                       foreach ($empresa as $key => $value) {
                       
                         echo '<option value="'.$value["idEmpresa"].'">'.$value["nombreEmpresa"].'</option>';

                       }

                    ?>

                    </select>
                    
                  </div>
                
                </div>



        <!-- ENTRADA PARA EL ID USUARIO -->

    

           <!-- ENTRADA PARA EL PERFIL -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <select class="form-control input-lg" name="editarPerfil">
                    
                      <option value="" id="editarPerfil"></option>

                      <option value="">Seleccionar perfil</option>

                      <option value="Administrador">Administrador</option>

                      <option value="Especial">Especial</option>

                      <option value="Vendedor">Empleado</option>

                  </select>

              </div>

          </div>

           <!-- ENTRADA PARA EL USUARIO -->

           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario" placeholder="Ingresar usuario" readonly>

              </div>

          </div>

          <!-- ENTRADA PARA EL CONTRASEÑA -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="nuevaContrasena" placeholder="Ingresar Contraseña" id="nuevaContrasena" value="" >

                  <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

          </div>

      </div>  


</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Modificar usuario</button>

      </div>


        <?php   

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario -> ctrEditarUsuario();

       ?>  
  
      </form>

    </div>

  </div>
 </div>

<?php   

        $borrarUsuario = new ControladorUsuarios();
        $borrarUsuario -> ctrBorrarUsuario();

?>