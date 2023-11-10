<div id="back"></div>

<div class="login-box">
    <div class="login-logo">
        <img src="" class="img-responsive" style="padding: 0px 90px 0px 100px">
    </div>

    <div class="login-box-body">
        <div class="text-center" style="margin-bottom: 0px;">
         <div id="reloj" style="font-size: 22px; color: #007BFF;"></div>
        <p class="login-box-msg">INGRESE AL SISTEMA NOMINASUMG</p>

        <form method="post">
             <div class="form-group">

                <!-- ENTRADA PARA LA EMPRESA -->

                  
                  <div class="input-group ">
                    
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    
                    <select id="idEmpresa" name="idEmpresa" class="form-control" required>

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

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                  <input type="text" class="form-control input-lg" name="nombreUsuario" placeholder="Ingresar usuario" id="nombreUsuario"required>

              </div>

          </div>

          
             <!-- ENTRADA PARA EL CONTRASEÑA -->
          
           <div class="form-group"> 

              <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="contrasena" id="contrasena" placeholder="Ingresar password" required>

              </div>

          </div>

     
<!-- Elementos anteriores -->

<div class="row">
    <div class="col-xs-4">
        <button type="submit" class="btn btn-success btn-flat">Ingresar</button>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
    <div class="col-xs-4">
        <a href="vistas/modulos/pdf/manualdeusuario.pdf" class="btn btn-pdf">Manual de Usuario</a>
    </div>
</div>

<script>
    function actualizarHoraYFecha() {
        var reloj = document.getElementById('reloj');
        var fecha = new Date();
        var horaActual = fecha.getHours();
        var minutoActual = fecha.getMinutes();
        var segundoActual = fecha.getSeconds();
        reloj.textContent = horaActual + ':' + minutoActual + ':' + segundoActual;
    }

    setInterval(actualizarHoraYFecha, 1000);
    actualizarHoraYFecha();
</script>


             <?php 

                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();

               ?>

        </form>

    </div>
</div>
