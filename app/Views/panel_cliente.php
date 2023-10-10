<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .client-panel {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        strong {
            color: #333;
        }
        .back-button {
            background-color: red; /* Cambiado a color rojo */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white; /* Cambiado el color del texto a blanco para mejor contraste con el rojo */
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred; /* Oscurecido el rojo para el hover */
        }


    </style>
</head>
<body>
    <div class="client-panel">
    <a href="inicio" class="back-button">&larr; Volver</a>
        <h2>Datos del Cliente</h2>

        <p><strong>Nombre:</strong> <?= esc($userData['nombre']) ?></p>
        <p><strong>Email:</strong> <?= esc($userData['email']) ?></p>
        <p><strong>Usuario:</strong> <?= esc($userData['usuario']) ?></p>
        <p><strong>Direccion:</strong> <?= esc($userData['direccion']) ?></p>
        <p><strong>Codigo Postal:</strong> <?= esc($userData['codigo_postal']) ?></p>
    </div>
</body>
</html>


<!-- Otras cosas que podrías tener en un panel de cliente:

Historial de pedidos: Una lista de todos los pedidos realizados por el cliente.
Cambio de contraseña: Una opción para cambiar la contraseña.
Preferencias de contacto: Las opciones para cómo y cuándo el cliente desea ser contactado.
Métodos de pago: Información sobre las tarjetas de crédito y otros métodos de pago.
Direcciones de envío: Una lista de direcciones de envío y una opción para agregar/editar/eliminar direcciones.
Listas de deseos: Productos que el cliente ha marcado para comprar en el futuro.
Productos vistos recientemente: Una lista de los productos que el cliente ha visto recientemente en la tienda.
Configuraciones de la cuenta: Opciones como idioma, moneda y configuraciones regionales. -->

