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
        </div>
    </header>
    <div class="container-navbar">
        <ul class="menu">
            <a class="login-button" href="<?= base_url("./inicio"); ?>">Inicio</a>
            <a class="login-button" href="<?= base_url("./Redireccion/tienda"); ?>" id="tiendabutton">Tienda</a>
            <div class="dropdown">
                <a class="login-button dropdown-button" href="javascript:void(0)" id="productosButton">Tienda</a>
                <div class="dropdown-content" id="dropdown1">
                    <a href="<?= base_url("/suplementos"); ?>">Suplementos</a>
                    <a href="<?= base_url("/objetosgym"); ?>">Objetos de Gimnasio</a>
                    <a href="<?= base_url("/ropa"); ?>">Merchandising</a>
                </div>
            </div>
            <a class="login-button" href="<?= base_url("./Redireccion/carrito"); ?>">Carrito</a>
            <a class="login-button" href="<?= base_url("./Redireccion/rutinas"); ?>">Rutinas</a>
            <a class="login-button" href="<?= base_url("./Redireccion/profesores"); ?>">Profesores</a>
            <a class="login-button" href="#contact-form">Contacto</a>

            <?php
            $session = session();
            $usuario = $session->get('usuario');
            ?>
            <?php if (!$usuario): ?>
                <a class="iniciar-button" id="login-banner" href="<?= base_url("/login"); ?>">Iniciar Sesión</a>
            <?php else: ?>
                <a class="panel-button" href="<?= base_url("Redireccion/panel"); ?>">Mi Cuenta</a>
                <a class="panel-button" id="logout-banner" href="<?= base_url("./inicio/logout"); ?>">Cerrar Sesión</a>
            <?php endif; ?>

        </ul>
    </div>
</body>

</html>