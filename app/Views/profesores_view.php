<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            padding-top: 50px;
            color: #333;
        }

        .profesor-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        input[type="email"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #6b46c1;
            outline: none;
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #6b46c1;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #553c9a;
        }
        .back-button {
            background-color: red; /* Cambiado a color rojo */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white; /* Cambiado el color del texto a blanco para mejor contraste con el rojo */
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred; /* Oscurecido el rojo para el hover */
        }
    </style>
</head>
<body>

<form class="profesor-form" action="<?= base_url('/profesores/create') ?>" method="POST" enctype="multipart/form-data">
<a href="panel_admin" class="back-button">&larr; Volver</a>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required>
    </div>

    <div class="form-group">
        <label for="fecha_de_contrato">Fecha de Contrato:</label>
        <input type="date" id="fecha_de_contrato" name="fecha_de_contrato" required>
    </div>

    <div class="form-group">
        <label for="titulos">Títulos:</label>
        <textarea id="titulos" name="titulos" required></textarea>
    </div>

    <div class="form-group">
            <label for="horarios">Horarios:</label>
            <textarea id="horarios" name="horarios" placeholder="Ejemplo: Lunes 10:00 - 12:00, Martes 15:00 - 17:00" required></textarea>
        </div>

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>
    </div>

    <div class="form-group">
        <label for="mail">Email:</label>
        <input type="email" id="mail" name="mail" required>
    </div>

    <div class="form-group">
        <label for="salario">Salario:</label>
        <input type="number" id="salario" name="salario" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="coste">Coste:</label>
        <input type="number" id="coste" name="coste" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="dificultad">Dificultad:</label>
        <input type="text" id="dificultad" name="dificultad" required>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen">
    </div>

    <div class="form-group">
        <input type="submit" value="Agregar Profesor">
    </div>
</form>
</body>
</html>
