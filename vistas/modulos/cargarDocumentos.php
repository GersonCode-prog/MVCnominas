<?php $idEmpleado = $_COOKIE['idEmpleado'] ?? ''; ?>
  <div class="content-wrapper">
    
    <section class="content-header">

      <h1>
      Documentos

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="empleados"><i class="fa fa-dashboard"></i> Empleados</a></li>

        <li class="active">Cargar Documentos</li>

      </ol>

    </section>

  <section class="content">

    <div class="row">


<!-- =========================================
            FORMULARIO
  ===========================================-->


      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border">

            <h3 class="box-title">Cargar Documento</h3>

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="box-body">

                <div class="box">
                  
                <!-- =========================================
                               ENTRADA DEL EMPLEADO
                 ===========================================-->
                       

                     <div class="form-group"> 

                        <div class="input-group"> 
                                    
                                    <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?php echo $idEmpleado; ?>">
                            </div>

                        </div>

                  

                  <!-- =========================================
                       ENTRADA PARA EL NOMBRE DEL DOCUMENTO
                 ===========================================-->

                   <div class="form-group"> 

                      <div class="input-group"> 

                          <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                          <input type="text" class="form-control input-lg" name="nuevoNombreD" placeholder="Ingresar nombre del documento" id="nuevoNombreD" required>

                      </div>

                  </div>

                <!-- =========================================
                               ENTRADA EL TIPO DE DOCUMENTO
                 ===========================================-->

                  <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-archive"></i></span>

                  <select class="form-control input-lg" name="nuevoTipo" id="nuevoTipo">
                    
                      <option value="">Tipo de documento</option>

                      <option value="DPI">DPI</option>

                      <option value="Certificados">Certificados y DipLomas</option>

                      <option value="Antecedentes">Antecedentes penales y policiacos</option>

                  </select>

              </div>

          </div>  
                 
                <!-- =========================================
                         ENTRADA PARA AGREGAR EL DOCUMENTO
                 ===========================================-->


              <div class="form-group">
                  <label for="nuevoDocumento">Seleccionar Documento:</label>
                  <input type="file" class="form-control-file" name="nuevoDocumento" id="nuevoDocumento" required>
              </div>

                      
            </div>

          </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary pull-right">Guardar Documento</button>
                <button type="button" class="btn btn-danger" id="cancelarCarga">Cancelar</button>
            </div>

             </form>


          
               <?php   

                      $cargarDocumento = new ControladorDocumentos();
                      $cargarDocumento -> ctrCrearDocumento();

              ?>




          </div>

    </div>

</div>

<!-- =========================================
            LA TABLA DE PRODUCTOS
  ===========================================-->
      <div class="col-lg-7 ">
        
         <div class="box box-warning">
          
            <div class="box-header with-border"></div>


            <div class="box-body">
              
              <table class="table table-bordered table-striped dt-responsive tablas">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px;">No.</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th style="width: 10px;">Acciones</th>
                   
                  </tr>

                </thead>

                <tbody>
                 <?php

                  //var_dump($idEmpleado);


                  // Comprueba si idEmpleado es un número válido antes de usarlo en la consulta
                 if (is_numeric($idEmpleado)) {
                      $item = "idEmpleado";
                      $valor = $idEmpleado;

                      $documento = ControladorDocumentos::ctrMostrarDocumentosPorEmpleado($item, $valor);

                      // Verifica si se encontraron documentos
                      if (!empty($documento)) {
                          foreach ($documento as $key => $value) {
                              echo '<tr>  
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $value["tipoDocumento"] . '</td>
                                  <td>' . $value["nombreArchivo"] . '</td>
                                  
                                  <td><a href="#" class="btn btn-success btnVerDocumentos" idDocumento="'.$value["idDocumento"].'"><i></i>VER PDF</a></td>

                                  <td>
                                  <div class="btn-group"> 
                                      <button class="btn btn-danger btnEliminarDocuemento" idDocumento="'.$value["idDocumento"].'"><i class="fa fa-times"></i></button>
                                  </div>
                                  </td>

                              </tr>';
                          }
                      } else {
                          echo '<tr><td colspan="4">No se encontraron documentos para este empleado.</td></tr>';
                      }
                  } else {
                      echo "El idEmpleado no es válido.";
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

          $ctrBorrarDocumento = new ControladorDocumentos();
          $ctrBorrarDocumento -> ctrBorrarDocumento();

  ?>
