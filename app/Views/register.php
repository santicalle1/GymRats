<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <style>
    body {
        background-image: url('<?= base_url('img/1.jpeg') ?>');
        font-family: Arial, sans-serif;
        min-height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-position: center center;
        }
    </style>
    <link rel="stylesheet" href="css\register.css">
</head>
<body>
    <div class="card">
        <h1>Registrarse</h1>
        <div class="card-body">
                
            <form method="post" action="<?= base_url("/register/do_register"); ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input name="nombre" required type="text" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input name="usuario" required type="text" class="form-control" id="usuario" placeholder="Usuario">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" required type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input name="contrasena" required type="password" class="form-control" id="contrasena" placeholder="Contraseña">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input name="direccion" required type="text" class="form-control" id="direccion" placeholder="Direccion">
                </div>
                <div class="mb-3">
                    <label for="codigo_postal" class="form-label">Codigo Postal:</label>
                    <input name="codigo_postal" required type="text" class="form-control" id="codigo_postal" placeholder="Codigo Postal">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input name="telefono" required type="text" class="form-control" id="telefono" placeholder="Telefono">
                </div>
                <button class="btn btn-primary">Registrarse</button>

                <div class="register-link">
                    <p>¿Tienes cuenta? </p>
                    <a href="<?= base_url("/login"); ?>">Inicia Sesion</a>
                    <a class="terms-link" href="<?= base_url("/terminos"); ?>">Términos y Condiciones</a>
                </div>
                <!-- Mostrar el mensaje de error dentro del recuadro blanco -->
                <?php if (session()->getFlashdata('mensaje')) : ?>
                    <p class="error-message"><?= session()->getFlashdata('mensaje') ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>