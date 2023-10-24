<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/header.css'); ?>">


</head>
<body>
    <header>
            <!-- Logo -->
            <div class="container-logo1">
                <img src="img/logo.png" alt="GymRats Logo" class="logo">
                </a>
            </div>
        </div>
    </div>
    </header>
        <!-- navbar -->
        <div class="container-navbar">
            <ul class="menu">
                <a class="login-button" href="<?= base_url("/inicio"); ?>">Inicio</a>
                <a class="login-button" href="<?= base_url("/Redireccion/tienda"); ?>">Tienda</a>
                <a class="login-button" href="<?= base_url("/Redireccion/rutinas"); ?>">Rutina</a>
                <a class="login-button" href="<?= base_url("/Redireccion/profesores"); ?>">Profesores</a>
                <a class="login-button" href="#contact" >Contactanos</a>
                <a class="login-button" href="<?= base_url("/terminos"); ?>">Terminos Y Condiciones</a>
            </ul>
            <div class="container-login">
        <?php
        $session = session();
        $usuario = $session->get('usuario');?>

        <?php if (!$usuario) : ?>
                <a class="iniciar-button" href="<?= base_url("/login"); ?>">Iniciar Sesión</a>
            <?php endif; ?>

            <a class="panel-button" href="<?= base_url("/Redireccion/panel"); ?>">Mi Cuenta</a>
        </div>
        </div>
    </header>
</body>
</html>