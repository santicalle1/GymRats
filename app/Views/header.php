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
    <div class="container-navbar">
    <ul class="menu">
    <a class="login-button" href="<?= base_url("/inicio"); ?>">Inicio</a>
    <div class="dropdown">
        <a class="login-button" href="<?= base_url("/Redireccion/tienda"); ?>">Tienda</a>
        <div class="dropdown-content">
            <!-- Puedes añadir los enlaces que desees aquí -->
            <a href="<?= base_url("/suplementos"); ?>">Suplementos</a>
            <a href="<?= base_url("/objetosgym"); ?>">Objetos de Gimnasio</a>
            <a href="<?= base_url("/ropa"); ?>">Merchandising</a>
        </div>
    </div>
    <a class="login-button" href="<?= base_url("/terminos"); ?>">Terminos Y Condiciones</a>
    <a class="login-button" href="<?= base_url("/carrito"); ?>">Carrito</a>
        <?php
        $session = session();
        $usuario = $session->get('usuario');?>

        <?php if (!$usuario) : ?>
                <a class="iniciar-button" href="<?= base_url("/login"); ?>">Iniciar Sesión</a>
            <?php endif; ?>

            <a class="panel-button" href="<?= base_url("/Redireccion/panel"); ?>">Mi Cuenta</a>
            <script>
                const dropdown = document.querySelector(".dropdown-content");

                // Verifica si la página actual es "tienda.php"
                const isTiendaPage = window.location.href.indexOf("/tienda.php") > -1;

                // Habilitar o deshabilitar el dropdown según la condición
                dropdown.disabled = !isTiendaPage;

            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </ul>
</div>
            </ul>
        </div>
    </header>
</body>
</html>