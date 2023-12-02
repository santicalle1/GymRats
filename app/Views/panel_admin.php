<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panel_admin.css'); ?>">
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

        <title>Pagina de panel de Admistrador</title>
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


                    <li>
                        <a href="items_view">
                            <i class="fa fa-dashboard"></i>
                            <span>Ver Perfiles</span>

                        </a>
                    </li>

                    <!----------Configuracion---->

                    <li>
                        <a href="<?= base_url('agregar_productos') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Agregar Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('products_view') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Modificar Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('agregar_profesor') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Agregar Profesores</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('modificar_profesor') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Modificar Profesores</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('agregar_rutinas') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Agregar Rutinas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('modificar_rutinas') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Modificar Rutinas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('mensajes') ?>">
                            <i class="fa fa-cog"></i>
                            <span>Mensajes</span>
                        </a>
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
                        <a href="inicio">
                            <i class="fa fa-power-off"></i>
                            <span>Salir</span>

                        </a>
                    </li>


                </ul>

            </nav>
            <div class="body">
            <!-- Contenido centrado -->
            </div>

        </div>
        </div>

    </body>

    </html>


</body>

</html>