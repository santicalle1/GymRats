<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
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

        <title>Panel de profesores</title>
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

                </ul>

            </nav>
            <div class="body">

            </div>

        </div>
        </div>

    </body>

    </html>


</body>

</html>