<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panelcliente.css'); ?>">
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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Panel usurario</title>
    </head>

    <body>


        <!-----Casilla de verificacion-->
        <input type="checkbox" id="checkbox">
        <!----Inicio del Encabezado-->
        <header class="header">
            <h2 class="u-name">GymRats<b>Panel</b>
                <label for="checkbox">
                    <!---Iconos de Aplicaciones Font-Awesome-->


                </label>
            </h2>
        </header>
        <!----Fin del Encabezado----->

        <!----Agregue una tabla a un documento---->
        <div class="body">
            <!--- Barra lateral Izquierda---------->
            <nav class="side-bar-left">


                <ul>
                    <!------Dashboard-->

                    
                    </li>



                    <!----------table---->

                    <!-- <li>
    <a href="table.php">
    <i class="fa fa-table"></i>
    <span>Tabla</span>
    
    </a>
        </li> -->

                    <!----------Salir---->
                    <li>
                    <h2>Mis Profesores</h2>

<?php if (session()->has('success')): ?>
    <p><?= session('success') ?></p>
<?php endif; ?>

<!-- Aquí puedes mostrar la lista de profesores comprados -->
<?php if (isset($profesor) && is_array($profesor)): ?>
    <div class="profesor">
        <h3><?= esc($profesor['nombre']) ?></h3>
        <img src="<?= base_url() . '/' . esc($profesor['imagen']) ?>" alt="" width="100">
        <p><strong>Dificultad:</strong> <?= esc($profesor['dificultad']) ?></p>
        <p><strong>Horario:</strong> <?= esc($profesor['horarios']) ?></p>
    </div>
<?php else: ?>
    <p>No se encontraron profesores.</p>
<?php endif; ?>

                    </li>
                    <li>
                        <a href="inicio">
                            <i class="fa fa-power-off"></i>
                            <span>Salir</span>
                        </a>
                    </li>


                </ul>

            </nav>
            <div class="body">
            <div class="client-panel">
        <h2>Datos del Cliente</h2>

        <p><strong>Nombre:</strong> <?= esc($userData['nombre']) ?></p>
        <p><strong>Email:</strong> <?= esc($userData['email']) ?></p>
        <p><strong>Usuario:</strong> <?= esc($userData['usuario']) ?></p>
        <p><strong>Direccion:</strong> <?= esc($userData['direccion']) ?></p>
        <p><strong>Codigo Postal:</strong> <?= esc($userData['codigo_postal']) ?></p>
    </div>
            </div>

        </div>
        </div>

    </body>

    </html>


</body>

</html>


