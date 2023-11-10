<div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Administrar Empresas

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Empresas</li>

      </ol>

    </section>


  <section class="content">

      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarEmpresa">
            
            Agregar Empresa

          </button>
        
        </div>


          <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
             <tr>
                
                <th style="width: 10px">No.</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Ingreso al sistema</th>
                <th >Acciones</th>             

              </tr>

            </thead>

            <tbody>


              <?php 

              $item = null;
              $valor = null;

              $empresa = ControladorEmpresas::ctrMostrarEmpresa($item, $valor);

              foreach ($empresa as $key => $value) {
                
                echo '<tr>  
                      <td>'.($key+1).'</td>
                      <td>'.$value["nombreEmpresa"].'</td>
                      <td>'.$value["direccion"].'</td>
                      <td>'.$value["telefono"].'</td>
                      <td>'.$value["fechaCreacion"].'</td>
                      <td>
                        
                        <div class="btn-group">
                          
                        
                          <button class="btn btn-warning btnEditarEmpresa" idEmpresa="'.$value["idEmpresa"].'" data-toggle="modal" data-target="#modalEditarEmpresa"><i class="fa fa-pencil"></i></button>

                           <button class="btn btn-danger btnEliminarEmpresa" idEmpresa="'.$value["idEmpresa"].'"><i class="fa fa-times"></i></button>

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
             MODAL AGREGAR EMPRESAS
  ===========================================-->

 
<!-- Modal -->
<div id="modalAgregarEmpresa" class="modal fade" role="dialog">

  <div class="modal-dialog">

    
    <div class="modal-content">

        <form role="form" method="post">  
  <!-- =========================================
             CABEZA DEL MODAL
  ===========================================-->

      <div class="modal-header" style="background: #762e2e; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Empresa</h4>

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

                  <input type="text" class="form-control input-lg" name="nuevaEmpresa" placeholder="Ingresar nombre" id="nuevaEmpresa" required>

              </div>

          </div>

            <!-- ENTRADA PARA EL DIRECCIÓN -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" id="nuevaDireccion"  name="nuevaDireccion" placeholder="Ingresar dirección"  required>

              </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                  <input type="text" class="form-control input-lg" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

          </div>

      </div>  

</div>
<!-- =========================================
             PIE DEL MODAL
  ===========================================-->
      <div class="modal-footer">

        <a href="empresas" class="btn btn-default pull-left">Cancelar</a>

        <button type="submit" class="btn btn-success">Guardar Empresa</button>

      </div>

      </form>


      <?php 

      $crearEmpresa = new ControladorEmpresas();
      $crearEmpresa -> ctrCrearEmpresa();

       ?>

    </div>

  </div>

</div>  


<!-- =========================================
               MODAL EDITAR EMPRESA
    ===========================================-->

   
  <!-- Modal -->
  <div id="modalEditarEmpresa" class="modal fade" role="dialog">

    <div class="modal-dialog">

      
      <div class="modal-content">

          <form role="form" method="post">  
    <!-- =========================================
               CABEZA DEL MODAL
    ===========================================-->

        <div class="modal-header" style="background: #762e2e; color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Empresa</h4>

        </div>

<!-- =========================================
             CUERPO DEL MODAL
  ===========================================-->
      <div class="modal-body">
      
      <div class=" box-body">

        <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa" required>

                  <input type="hidden" name="idEmpresa" id="idEmpresa" required>

              </div>

          </div>

           <!-- ENTRADA PARA EL DIRECCIÓN -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                  <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

              </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->

          <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                  <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

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
      $editarEmpresa = new ControladorEmpresas();
      $editarEmpresa -> ctrEditarEmpresa();
 
      ?>

      </form>

    </div>

  </div>

</div>

 
<?php   

        $borrarEmpresa = new ControladorEmpresas();
        $borrarEmpresa -> ctrBorrarEmpresa();

?>