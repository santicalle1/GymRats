<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Panel Cliente</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panelcliente.css'); ?>">
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
            <li>
                <h2>Mis Profesores</h2>

                <?php if (session()->has('success')): ?>
                    <p>
                        <?= session('success') ?>
                    </p>
                <?php endif; ?>

                <!-- Aquí puedes mostrar la lista de profesores comprados -->
                <?php if (isset($profesor) && is_array($profesor)): ?>
                    <div class="profesor">
                        <h3>
                            <?= esc($profesor['nombre']) ?>
                        </h3>
                        <img src="<?= base_url() . '/' . esc($profesor['imagen']) ?>" alt="" width="100">
                        <p><strong>Dificultad:</strong>
                            <?= esc($profesor['dificultad']) ?>
                        </p>
                        <p><strong>Horario:</strong>
                            <?= esc($profesor['horarios']) ?>
                        </p>
                    </div>
                <?php else: ?>
                    <p>No se encontraron profesores.</p>
                <?php endif; ?>

            </li>


            <!------Dashboard-->

            <!----------Salir---->
            <li>
                <a href="inicio">
                    <i class="fa fa-power-off"></i>
                    <span>Salir</span>
                </a>
            </li>


            </ul>

        </nav>
        <?php
        $session = session();
        $datosUsuario = $session->get('datosUsuario');
        ?>

        <div class="body">
            <div class="client-panel">
                <h2>Datos del Cliente</h2>

                <p><strong>Nombre:</strong>
                    <?= esc($datosUsuario['nombre']) ?>
                </p>
                <p><strong>Email:</strong>
                    <?= esc($datosUsuario['email']) ?>
                </p>
                <p><strong>Usuario:</strong>
                    <?= esc($datosUsuario['usuario']) ?>
                </p>
                <p><strong>Direccion:</strong>
                    <?= esc($datosUsuario['direccion']) ?>
                </p>
                <p><strong>Codigo Postal:</strong>
                    <?= esc($datosUsuario['codigo_postal']) ?>
                </p>
            </div>
        </div>


    </div>
    </div>

</body>

</html>