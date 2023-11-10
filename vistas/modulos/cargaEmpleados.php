<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      REGISTRAR EMPLEADO
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registrar Empleado</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

<!-- =========================================
            FORMULARIO
  ===========================================-->


     <div class="col-lg-6 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border">
              <h3>Datos Personales</h3> 
          </div>

          <form role="form" method="post" class="formularioEmpleados">

            <div class="box-body">

              <div class="box">

                  
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
                                  <label for="fecha">Selecciona una fecha:</label>
                                  <input type="date" class="form-control input-lg" name="nuevaFecha" id="nuevaFecha" placeholder="Ingresar fecha de Nacimiento" required>

                              </div>

                          </div>

                            <!-- ENTRADA PARA EL GENERO -->
                          
                           <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                  <select class="form-control input-lg" name="nuevoGenero">
                                    
                                      <option value="">Genero</option>

                                      <option value="Hombre">Hombre</option>

                                      <option value="Mujer">Mujer</option>

                                  </select>

                              </div>

                          </div>

                          <!-- ENTRADA ESTADO CIVIL -->
                          
                           <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                  <select class="form-control input-lg" name="nuevoEstado">
                                    
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
                        </form>
            </div>
        </div>
    </div>
</div>
<!-- =========================================
           DATOS HISTORIL LABORAL
  ===========================================-->
      <div class="col-lg-6 col-xs-12">
        
         <div class="box box-warning">
          
            <div class="box-header with-border">
                <h3>Datos Laborales</h3> 
            </div>

            <div class="box-body">

              
               <!-- ENTRADA PARA  FECHA DE INGRESO -->

                          <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <label for="fecha">Fecha de Ingreso:</label>
                                  <input type="date" class="form-control input-lg" name="nuevaFechaI" id="nuevaFechaI" placeholder="Ingresar fecha de Nacimiento" required>

                              </div>

                    </div>

                
                        <!-- ENTRADA PARA EL DEPARTAMENTO -->
                          
                           <div class="form-group"> 

                              <div class="input-group"> 

                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                  <select class="form-control input-lg" name="nuevoDepartamentoT" id="nuevoDepartamentoT">
                                    
                                      <option value="">Departamento</option>

                                     <option value="Recursos Humanos">Recursos Humanos</option>
                                    <option value="Finanzas y Contabilidad">Finanzas y Contabilidad</option>
                                    <option value="Ventas y Marketing">Ventas y Marketing</option>
                                    <option value="Operaciones">Operaciones</option>
                                    <option value="Tecnología de la Información">Tecnología de la Información</option>
                                    <option value="Servicio al Cliente">Servicio al Cliente</option>
                                    <option value="Calidad">Calidad</option>
                                    <option value="Desarrollo de Productos">Desarrollo de Productos</option>
                                    <option value="Legal y Cumplimiento">Legal y Cumplimiento</option>
                                    <option value="Compras y Adquisiciones">Compras y Adquisiciones</option>
                                    <option value="Comunicaciones Corporativas">Comunicaciones Corporativas</option>
                                    <option value="Planificación Estratégica">Planificación Estratégica</option>

                                  </select>

                              </div>

                          </div>

                   <!-- ENTRADA PARA EL CARGO -->
                  
                   <div class="form-group"> 

                      <div class="input-group"> 

                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                          <select class="form-control input-lg" name="nuevoCargo" id="nuevoCargo">
                            
                              <option value="">Cargo</option>

                              <option value="Gerente General">Gerente General</option>
                              <option value="Director de Recursos Humanos">Director de Recursos Humanos</option>
                              <option value="Director Financiero">Director Financiero</option>
                              <option value="Director de Marketing">Director de Marketing</option>
                              <option value="Director de Ventas">Director de Ventas</option>
                              <option value="Director de Tecnología de la Información">Director de Tecnología de la Información</option>
                              <option value="Director de Operaciones">Director de Operaciones</option>
                              <option value="Director de Servicio al Cliente">Director de Servicio al Cliente</option>
                              <option value="Abogado General">Abogado General</option>
                              <option value="Director de Calidad">Director de Calidad</option>
                              <option value="Gerente de Recursos Humanos">Gerente de Recursos Humanos</option>
                              <option value="Gerente de Finanzas">Gerente de Finanzas</option>
                              <option value="Gerente de Marketing">Gerente de Marketing</option>
                              <option value="Gerente de Ventas">Gerente de Ventas</option>
                              <option value="Gerente de Tecnología de la Información">Gerente de Tecnología de la Información</option>
                              <option value="Gerente de Operaciones">Gerente de Operaciones</option>
                              <option value="Gerente de Servicio al Cliente">Gerente de Servicio al Cliente</option>
                              <option value="Gerente de Proyectos">Gerente de Proyectos</option>
                              <option value="Analista de Datos">Analista de Datos</option>
                              <option value="Especialista en Marketing Digital">Especialista en Marketing Digital</option>
                              <option value="Especialista en Recursos Humanos">Especialista en Recursos Humanos</option>
                              <option value="Especialista en Finanzas">Especialista en Finanzas</option>
                              <option value="Técnico de Soporte Técnico">Técnico de Soporte Técnico</option>
                              <option value="Asistente Administrativo">Asistente Administrativo</option>
                        
                        </select>

                     </div>

                </div>

                 <!-- ENTRADA PARA SALARIO -->

                             <div class="form-group row">

                                <div class="col-xs-6">
                                
                                  <div class="input-group">
                                  
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                                    <input type="number" class="form-control input-lg" id="nuevoSalario" name="nuevoSalario" step="any" min="0" placeholder="Salario" required>

                                  </div>

                                </div>

                          </div>
                     </div>
            
        </div>

      </div>

      <div class="col-lg-6 col-xs-12">

        <div class="box box-warning">
        
            <div class="box-header with-border">
                <h3>Datos Laborales</h3> 
            </div>

             <div class="box-body">

             

      
    </div> 

  </section>

</div>
