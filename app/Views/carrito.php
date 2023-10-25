<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script>
    var inactivityTimeout; // Variable para almacenar el temporizador de inactividad

    // Función para reiniciar el temporizador de inactividad
    function resetInactivityTimeout() {
      clearTimeout(inactivityTimeout); // Limpiamos el temporizador anterior
      inactivityTimeout = setTimeout(logout, 180000); // 60000 ms = 1 minuto
    }

    // Función para redirigir a la página de cierre de sesión
    function logout() {
      window.location.href = '<?= base_url("inicio/logout"); ?>';
    }

    // Inicializa el temporizador de inactividad
    resetInactivityTimeout();

    // Agrega eventos de detección de actividad del usuario
    document.addEventListener('mousemove', resetInactivityTimeout);
    document.addEventListener('keydown', resetInactivityTimeout);
  </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .header-mobile {
            display: none; 
            padding: 10px 20px;
            background-color: #222;
            align-items: center;
            justify-content: space-between;
        }

        .header-mobile .logo {
            color: #1abc9c;
            font-size: 24px;
            text-decoration: none;
        }

        .header-mobile .open-menu {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        aside {
            width: 260px;
            background-color: #333;
            color: #eee;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        aside header {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        aside .logo {
            color: #1abc9c;
            font-size: 24px;
            text-decoration: none;
            margin-left: 15px;
        }

        aside nav ul {
            list-style-type: none;
        }

        aside nav ul li {
            margin: 10px 0;
        }

        .boton-menu {
            text-decoration: none;
            color: #1abc9c;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .boton-menu:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .boton-menu i {
            margin-right: 8px;
        }

        aside footer {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
        }

        .texto-footer {
            font-size: 12px;
            text-align: center;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .titulo-principal {
            text-align: center;
            font-size: 28px;
            color: #222;
            margin-bottom: 20px;
        }

        .contenedor-carrito {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carrito-vacio {
            text-align: center;
            font-size: 18px;
            color: #888;
        }

        .carrito-acciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .carrito-acciones-vaciar {
            background-color: #ccc;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .carrito-acciones-vaciar:hover {
            background-color: #aaa;
        }

        .carrito-acciones-comprar {
            background-color: #1abc9c;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .carrito-acciones-comprar:hover {
            background-color: #149a7e;
        }

        .carrito-comprado {
            text-align: center;
            font-size: 18px;
            color: #1abc9c;
        }

        /* Responsive Mobile */
        @media screen and (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .header-mobile {
                display: flex;
            }

            aside {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 999;
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            body.show-menu aside {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">GymRatsTienda</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <!-- <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button> -->
            <header>
                <h1 class="logo">GymRats</h1>
            </header>
            <nav>
                <ul>
                    <li>
                        <a class="boton-menu boton-volver" href="<?= base_url("/tienda"); ?>">
                            <i class="bi bi-arrow-return-left"></i> Seguir comprando
                        </a>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito active" href="<?= base_url("/carrito"); ?>">
                            <i class="bi bi-cart-fill"></i> Carrito
                        </a>
                    </li>
                </ul>
            </nav>
<!-- paypal -->
<body>
<div id="paypal-button-container">

</div>
<script src="https://www.paypal.com/sdk/js?client-id=AUAdq8u-Z7OXMdzHDYgxOG6GxBpQGD8vJxHOn_GgRiTbLNZdQImfjM-TDg_iwRCLdwvRkb63dH77Cxd-&currency=USD"></script>
<script>
    paypal.Buttons({
    style:{
        color:'blue',
        shape: 'pill'
    },
    createOrder: function(data, actions){
        return actions.order.create({
        purchase_units: [{
            amount: {
            value: 100
        }
        }]
    })
    }
}).render('#paypal-button-container');
</script>
</body>
<!-- paypal -->
            <footer>
                <p class="texto-footer">© 2023 GymRats</p>
            </footer>
        </aside>
        <main>
            <h2 class="titulo-principal">Carrito</h2>
            <div class="contenedor-carrito">
                <p id="carrito-vacio" class="carrito-vacio">Tu carrito está vacío. <i class="bi bi-emoji-frown"></i></p>

                <div id="carrito-productos" class="carrito-productos disabled">
                    <!-- Esto se va a completar con el JS -->
                </div>

                <div id="carrito-acciones" class="carrito-acciones disabled">
                    <div class="carrito-acciones-izquierda">
                        <button id="carrito-acciones-vaciar" class="carrito-acciones-vaciar">Vaciar carrito</button>
                    </div>
                    <div class="carrito-acciones-derecha">
                        <div class="carrito-acciones-total">
                            <p>Total:</p>
                            <p id="total">$3000</p>
                        </div>
                        <button id="carrito-acciones-comprar" class="carrito-acciones-comprar">Comprar ahora</button>
                    </div>
                </div>

                <p id="carrito-comprado" class="carrito-comprado disabled">Muchas gracias por tu compra. <i class="bi bi-emoji-laughing"></i></p>

            </div>
            <table>
    <thead>
        <tr>
            <th>Producto ID</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['id_producto'] ?></td>
                <td><?= $producto['cantidad'] ?></td>
                <td><?= $producto['subtotal'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        </main>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/carrito.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>