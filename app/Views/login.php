<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('<?= base_url('img/1.jpeg') ?>');
            /* Ruta de tu imagen de fondo */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0;
            padding: 0;
            /* Eliminar el espacio de relleno predeterminado */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form action="<?= base_url('/inicio') ?>" method="post">
        <h1>Iniciar Sesión</h1>
        <?php if (session()->getFlashdata('mensaje')) : ?>
            <div class="error"><?= session()->getFlashdata('mensaje') ?></div>
        <?php endif; ?>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required><br>

        <button type="submit">Iniciar Sesión</button>
        <div class="register-link">
            <p>¿No tienes cuenta? </p>
            <a href="<?= base_url("/register"); ?>">Regístrate</a>
            <a class="terms-link" href="<?= base_url("/terminos"); ?>">Términos y Condiciones</a>
        </div>
    </form>
</body>

</html>