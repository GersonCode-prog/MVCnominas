<div class="content-wrapper">

  <section class="content-header">
    
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sistema de Gestión de Nóminas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0px auto;
            text-align: center;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #333;
            font-size: 30px;
        }
        p {
            font-size: 14px;
            color: #666;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 18px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        #hora-fecha {
            font-size: 18px;
            color: #888;
        }
        #reloj {
            font-size: 28px;
            color: #007BFF;
        }
        #vision-empresa {
            font-size: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a Mi Sistema de Gestión de Nóminas</h1>
        <p>Nóminas UMG 2023</p>
        <a href="empleados" class="btn">Ver Empleados</a>
        <p id="hora-fecha">Cargando...</p>
        
        <div id="vision-empresa">
            <h2>Visión de la Empresa</h2>
            <p>"En NominasUMG aspiramos a simplificar la gestión de nóminas para empresas de todos los tamaños. Nuestra visión es ser el socio confiable que libera a las organizaciones de la carga de la administración de nóminas, permitiéndoles centrarse en su éxito y crecimiento. Buscamos transformar la gestión de recursos humanos en una experiencia sin complicaciones y eficiente, respaldada por tecnología de vanguardia y un compromiso inquebrantable con la satisfacción del cliente."</p>
        </div>
    </div>

    <script>
        function actualizarHoraYFecha() {
            var horaFecha = document.getElementById('hora-fecha');
            var reloj = document.getElementById('reloj');
            var fecha = new Date();
            var opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false };
            var horaYFecha = fecha.toLocaleString('es-ES', opciones);
            horaFecha.textContent = horaYFecha;
            var horaActual = fecha.getHours();
            var minutoActual = fecha.getMinutes();
            var segundoActual = fecha.getSeconds();
            reloj.textContent = horaActual + ':' + minutoActual + ':' + segundoActual;
        }

        setInterval(actualizarHoraYFecha, 1000);
        actualizarHoraYFecha();
    </script>
</body>
</html>

  </section>
 
</div>

