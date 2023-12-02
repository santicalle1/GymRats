<!DOCTYPE html>
<html lang="es">

<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('<?= base_url('img/1.jpeg') ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Estilo para el icono de mostrar/ocultar contraseña */
        #show-password-icon {
            cursor: pointer;
            position: relative;
            left: 145px;
            top: -52px;
            color: #888;
        }
    </style>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="uploads/logo.png">
</head>

<body>
    <form action="<?= base_url('/inicio') ?>" method="post">
        <h1>Iniciar Sesión</h1>
        <?php if (session()->getFlashdata('mensaje')) : ?>
            <div class="error"><?= session()->getFlashdata('mensaje') ?></div>
        <?php endif; ?>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Usuario"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required placeholder="Contraseña">
        <span id="show-password-icon" onclick="togglePasswordVisibility()">👁️‍🗨️</span><br>

        <button type="submit">Iniciar Sesión</button>
        <div class="register-link">
            <p>¿No tienes cuenta? </p>
            <a href="<?= base_url("/register"); ?>">Regístrate</a>
            <a class="terms-link" href="<?= base_url("/terminos"); ?>">Términos y Condiciones</a>
        </div>

        <script>
            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('contrasena');
                const icon = document.getElementById('show-password-icon');

                // Cambia el tipo de input entre 'password' y 'text' para alternar la visibilidad
                passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

                // Cambia el icono en consecuencia
                icon.textContent = passwordInput.type === 'password' ? '👁️' : '👁️‍🗨️';
            }
        </script>
    </form>
</body>

</html>
