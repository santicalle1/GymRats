<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('<?= base_url('img/2.jpg') ?>');
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

        .card {
            max-width: 600px;
            padding: 55px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
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
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn-primary {
    background-color: blue; /* Cambia el color de fondo a tu elección */
    color: #fff; /* Cambia el color del texto a tu elección */
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-weight: bold;
    font-size: 18px;
    transition: background-color 0.3s ease;
}


        .btn-primary:hover {
            background-color: blue;
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
                    <p>¿Tienes cuenta? <a href="<?= base_url("/login"); ?>">Inicia Sesion</a></p>
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