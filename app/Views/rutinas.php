<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/rutinas.css'); ?>">
    <style>
      /* Estilos para el contenedor de rutinas */
.contenedor-rutinas {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

/* Estilos para la tarjeta de rutina */
.card {
    position: relative;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 16px;
    margin: 16px;
    width: 300px;
}

/* Estilos para el número de descargas */
.descargas {
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 12px;
    color: #888;
}

/* Estilos adicionales para el botón de descargar rutina */
.boton-descargar {
    margin-top: 10px;
}



/* Estilos para el mensaje cuando no hay rutinas disponibles */
p.no-rutinas {
    font-size: 18px;
    text-align: center;
    margin-top: 20px;
    color: #888;
}

/* Estilos para el botón de descargar rutina */
.boton-descargar {
    background-color: #4CAF50; /* Color de fondo verde */
    color: white; /* Color del texto blanco */
    padding: 10px 15px; /* Relleno interno del botón */
    border: none; /* Sin borde */
    border-radius: 4px; /* Esquinas redondeadas */
    text-align: center; /* Alineación del texto al centro */
    text-decoration: none; /* Sin decoración de texto */
    display: inline-block; /* Mostrar como un elemento en línea */
    font-size: 16px; /* Tamaño del texto */
    margin: 4px 2px; /* Margen exterior del botón */
    cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
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
    <?php
    include(APPPATH . 'views/header.php');
    ?>
</head>

<body>
<?php if (!empty($rutinas)): ?>
    <!-- Contenido de la página de rutinas -->
    <center><h1>Rutinas Gratuitas</h1></center>

<div class="contenedor-rutinas">
<?php foreach ($rutinas as $rutina): ?>
    <div class="card">
    <h2><?= esc($rutina['nombre_rutina']) ?></h2>
    <p><strong>Descripcion:</strong> <?= esc($rutina['descripcion']) ?></p>
    <p><strong>Duración:</strong> <?= esc($rutina['duracion']) ?></p>
    <p><strong>Dificultad:</strong> <?= esc($rutina['dificultad']) ?></p>
    <!-- Número de descargas entre paréntesis -->
    <span class="descargas"><strong>Descargas:</strong> (<?= esc($rutina['descargas']) ?>)</span>
    <!-- Cambiado de enlace a botón -->
    <form action="<?= base_url('rutinasController/descargarRutina/' . $rutina['id_rutina']) ?>" method="post">
        <button type="submit" class="boton-descargar">Descargar Rutina</button>
    </form>
</div>

<?php endforeach; ?>
</div>
<?php else: ?>
    <p class="no-rutinas">No hay rutinas disponibles.</p>
<?php endif; ?>


  <footer>
    <?php include(APPPATH . "/views/footer.php"); ?>
  </footer>
</body>
</body>
</html>