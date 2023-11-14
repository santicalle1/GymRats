<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/editar_p.css'); ?>">

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

<form action="<?= base_url('actualizar_profesor/' . $profesor['id_profesor']) ?>" method="POST">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= $profesor['nombre'] ?>" required>

    <label for="especialidad">Especialidad:</label>
    <input type="text" id="especialidad" name="especialidad" value="<?= $profesor['especialidad'] ?>" required>

    <label for="fecha_de_contrato">Fecha de Contrato:</label>
    <input type="date" id="fecha_de_contrato" name="fecha_de_contrato" value="<?= $profesor['fecha_de_contrato'] ?>" required>

    <label for="titulos">Títulos:</label>
    <textarea id="titulos" name="titulos" required><?= $profesor['titulos'] ?></textarea>

    <label for="horarios">Horarios:</label>
    <textarea id="horarios" name="horarios" required><?= $profesor['horarios'] ?></textarea>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" value="<?= $profesor['telefono'] ?>" required>

    <label for="mail">Email:</label>
    <input type="email" id="mail" name="mail" value="<?= $profesor['mail'] ?>" required>

    <label for="salario">Salario:</label>
    <input type="number" id="salario" name="salario" step="0.01" value="<?= $profesor['salario'] ?>" required>

    <label for="coste">Coste:</label>
    <input type="number" id="coste" name="coste" step="0.01" value="<?= $profesor['coste'] ?>" required>

    <label for="dificultad">Dificultad:</label>
    <input type="text" id="dificultad" name="dificultad" value="<?= $profesor['dificultad'] ?>" required>

    <label for="imagen">Imagen Actual:</label>
    <img src="<?= base_url('uploads/' . $profesor['imagen']) ?>" width="100" alt="Imagen Profesor">

    <label for="imagen">Cambiar Imagen:</label>
    <input type="file" name="imagen" id="imagen">


    <input type="submit" value="Actualizar">
</form>

</body>
</html>
