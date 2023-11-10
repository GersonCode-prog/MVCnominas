<div class="content-wrapper">

  <section class="content-header">
    
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Extras Aprobadas/Rechazadas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Horas Extras Aprobadas/Rechazadas</h1>
        <p>Mira aquí están las horas extras aprobadas o rechazadas:</p>
        <ul id="horasExtras">
            <!-- Aquí se mostrarán las horas extras -->
        </ul>
    </div>

    <script>
        // Simulación de datos de horas extras (puedes reemplazar esto con datos reales desde tu sistema).
        var horasExtras = [
            { nombre: 'Empleado 1', estado: 'Aprobado' },
            { nombre: 'Empleado 2', estado: 'Rechazado' },
            { nombre: 'Empleado 3', estado: 'Aprobado' },
        ];

        var listaHorasExtras = document.getElementById('horasExtras');
        horasExtras.forEach(function(horaExtra) {
            var listItem = document.createElement('li');
            listItem.textContent = horaExtra.nombre + ' - ' + horaExtra.estado;
            listaHorasExtras.appendChild(listItem);
        });
    </script>
</body>
</html>


  </section>
 
</div>