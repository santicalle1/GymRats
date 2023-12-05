<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Panel profesores</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panel_profesor.css'); ?>">
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
                <h2>Mis alumnos</h2>

                <?php if (session()->has('success')): ?>
                    <p>
                        <?= session('success') ?>
                    </p>
                <?php endif; ?>


                <?php if ($usuarios): ?>
                    <h2>Usuarios Asociados:</h2>
                    <ul>
                        <?php foreach ($usuarios as $usuario): ?>
                            <li>
                                Usuario:
                                <?= $usuario->usuario ?>
                                <a href="<?= base_url('armar_rutinas/') . esc($usuario->id) ?>">Armar rutina</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No hay usuarios asociados a este profesor.</p>
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
</body>

</html>