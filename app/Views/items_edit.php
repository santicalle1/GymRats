<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <script>
    var inactivityTimeout; // Variable para almacenar el temporizador de inactividad

    // Función para reiniciar el temporizador de inactividad
    function resetInactivityTimeout() {
      clearTimeout(inactivityTimeout); // Limpiamos el temporizador anterior
      inactivityTimeout = setTimeout(logout, 180000); // 60000 ms = 1 minuto
    }

    // Función para redirigir a la página de cierre de sesión
    function logout() {
      window.location.href = '<?= base_url("inicio/logout"); ?>';
    }

    // Inicializa el temporizador de inactividad
    resetInactivityTimeout();

    // Agrega eventos de detección de actividad del usuario
    document.addEventListener('mousemove', resetInactivityTimeout);
    document.addEventListener('keydown', resetInactivityTimeout);
  </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            width: 80%;
            margin: 2em auto;
            background-color: #fff;
            padding: 2em;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            background-color: #f21c0d;
        }
    </style>
</head>
<body>
    <form action="<?= base_url("items_edit" . $item['id']) ?>" method="post">
        Nombre: <input type="text" name="nombre" value="<?= $item['nombre'] ?>"><br>
        Email: <input type="text" name="email" value="<?= $item['email'] ?>"><br>
        <input type="hidden" name="contrasena"  value="<?= $item['contrasena'] ?>"><br>
        Usuario: <input type="text" name="usuario" value="<?= $item['usuario'] ?>"><br>
        Direccion: <input type="text" name="direccion" value="<?= $item['direccion'] ?>"><br>
        Codigo Postal: <input type="text" name="codigo_postal" value="<?= $item['codigo_postal'] ?>"><br>
        Telefono: <input type="text" name="telefono" value="<?= $item['telefono'] ?>"><br>
        Tipo de Usuario: <input type="text" name="tipo" value="<?= $item['tipo'] ?>"><br>
        <!-- Agrega más campos aquí si es necesario -->
        <input type="submit" value="Actualizar">
        <a href="<?= base_url("items_view"); ?>">Atras</a> 
    </form>
</body>
</html>


