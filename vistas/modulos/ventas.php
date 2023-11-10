<div class="content-wrapper">

  <section class="content-header">
    
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Ventas</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Visualización de Ventas</h1>
        <p id="mensaje">Aquí se visualizan tus ventas</p>
    </div>

    <script>
        // JavaScript para cambiar el mensaje después de un retraso.
        setTimeout(function() {
            var mensaje = document.getElementById('mensaje');
            mensaje.textContent = '¡Tus ventas aparecerán aquí!';
        }, 3000); // Cambiar el mensaje después de 3 segundos (3000 ms).
    </script>
</body>
</html>


  </section>
 
</div>