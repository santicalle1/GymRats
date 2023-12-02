<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Rutina</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    width: 50%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
    text-align: center; /* Centra el contenido del formulario */
}

a.back-button {
    background-color: red;
    padding: 10px 20px; /* Ajusta el ancho del botón */
    border-radius: 5px;
    text-decoration: none;
    color: white;
    display: inline-block;
    margin-bottom: 20px;
    transition: background-color 0.3s;
    text-align: left; /* Alinea el texto a la izquierda */
}

a.back-button:hover {
    background-color: darkred;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #45a049;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #4CAF50;
}



    </style>
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
</head>

<body>
    <center><h1>Agregar Rutinas</h1></center>
    <!-- Contenido del formulario para agregar rutina -->
    <form method="post" action="<?= site_url('RutinasController/agregarRutina') ?>">
    <a href="panel_admin" class="back-button">&larr; Volver</a>
        <!-- Campos del formulario -->
        <input type="text" name="nombre_rutina" placeholder="Nombre de la rutina" required>
        <input type="text" name="descripcion" placeholder="Descripcion" required>
        <input type="text" name="duracion" placeholder="Duración" required>
        <input type="text" name="dificultad" placeholder="Dificultad" required>
        <input type="hidden" name="tipo_rutina" value="0">
        <!-- Botón de enviar formulario -->
        <button type="submit">Agregar Rutina</button>
    </form>
</body>

</html>
