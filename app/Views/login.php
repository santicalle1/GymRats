<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('<?= base_url('img/1.jpg') ?>');
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

        form {
            max-width: 600px;
            /* Aumenta el ancho del contenedor */
            padding: 45px;
            /* Aumenta el espacio interior */
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo blanco semi-transparente */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: blue;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            /* Agregar sombra al texto de error */
        }

        p.error-message {
            background-color: red;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }

        .register-link {
            margin-top: 10px;
            text-align: center;
        }

        .register-link a {
            text-decoration: none;
            color: blue;
            padding: 4px 10px;
            border: 2px solid blue;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .register-link a:hover {
            background-color: blue;
            color: #fff;
        }
        .terms-link {
    background-color: #fff; /* Cambia el color de fondo a tu elección */
    color: blue; /* Cambia el color del texto a tu elección */
    text-decoration: none;
    padding: 4px 10px;
    border: 2px solid #blue; /* Puedes ajustar el color del borde si lo deseas */
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}
    </style>
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
            <p>¿No tienes cuenta? <a href="<?= base_url("/register"); ?>">Regístrate</a></p>
            <a class="terms-link" href="<?= base_url("/terminos"); ?>">Términos y Condiciones</a>
        </div>
    </form>
</body>

</html>