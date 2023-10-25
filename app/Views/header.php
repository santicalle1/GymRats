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
                <a class="login-button dropdown-button" href="javascript:void(0)" id="productosButton">Categorias</a>
                <div class="dropdown-content" id="dropdown1">
                    <a href="<?= base_url("/suplementos"); ?>">Suplementos</a>
                    <a href="<?= base_url("/objetosgym"); ?>">Objetos de Gimnasio</a>
                    <a href="<?= base_url("/ropa"); ?>">Merchandising</a>
                </div>
            </div>
            <a class="login-button" href="<?= base_url("./Redireccion/carrito"); ?>">Carrito</a>
            <a class="login-button" href="<?= base_url("./Redireccion/rutinas"); ?>">Rutinas</a>
            <a class="login-button" href="#contact-form">Contacto</a>
            
            

            <?php
            $session = session();
            $usuario = $session->get('usuario');
            ?>
            <?php if (!$usuario) : ?>
                <a class="iniciar-button" href="<?= base_url("/login"); ?>">Iniciar Sesión</a>
            <?php else: ?>
                <a class="panel-button" href="<?= base_url("Redireccion/panel"); ?>">Mi Cuenta</a>
            <?php endif; ?>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
    // Obtiene el botón "Productos"
    const productosButton = document.getElementById("productosButton");
    // Obtiene el botón "Tienda"
    const tiendaButton = document.getElementById("tiendabutton");

    // Obtiene la URL actual
    const currentURL = window.location.href;

    // Comprueba si la URL es exactamente igual a "/tienda" (para la página "tienda")
    if (currentURL.endsWith("/tienda")) {
        // Muestra el botón "Productos" si estás en la página "tienda"
        productosButton.style.display = "block";
        // Oculta el botón "Tienda" en la página "tienda"
        tiendaButton.style.display = "none";
    } else {
        // Oculta el botón "Productos" en otras páginas
        productosButton.style.display = "none";
        // Muestra el botón "Tienda" en otras páginas
        tiendaButton.style.display = "block";
    }
</script>
        </ul>
    </div>
</body>
</html>
