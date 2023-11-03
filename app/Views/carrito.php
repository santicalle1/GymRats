<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">

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

    // Función para quitar un producto del carrito
function removeProductFromCart(id) {
    // Aquí debes realizar la lógica para quitar el producto con el ID específico
    console.log('Eliminar producto con ID: ' + id);
    // Suponiendo que tienes una API o método para eliminar el producto
    // fetch(`/api/removeFromCart/${id}`, { method: 'DELETE' })
    // .then(response => response.json())
    // .then(data => {
    //     if(data.success) {
    //         // Refrescar la página o actualizar la vista del carrito
    //         location.reload();
    //     }
    // });
}

// Función para vaciar todo el carrito
function clearCart() {
    // Aquí debes realizar la lógica para vaciar todo el carrito
    console.log('Vaciar carrito');
    // Suponiendo que tienes una API o método para vaciar el carrito
    // fetch(`/api/clearCart`, { method: 'DELETE' })
    // .then(response => response.json())
    // .then(data => {
    //     if(data.success) {
    //         // Refrescar la página o actualizar la vista del carrito
    //         location.reload();
    //     }
    // });
}

document.addEventListener('DOMContentLoaded', function() {
    const btnsRemove = document.querySelectorAll('.btn-remove');
    for(let btn of btnsRemove) {
        btn.addEventListener('click', function() {
            let id = this.dataset.id;
            removeProductFromCart(id);
        });
    }

    // Botón para vaciar el carrito
    document.getElementById('carrito-acciones-vaciar').addEventListener('click', function() {
        clearCart();
    });

    // Aquí puedes agregar la lógica para el botón "Comprar ahora" y PayPal
    // Por ejemplo, podrías utilizar la API de PayPal aquí para procesar la compra.
});


  </script>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .wrapper {
        display: flex;
        height: 100vh;
    }

    /* Header Mobile */
    .header-mobile {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #333;
        color: #f2f2f2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        z-index: 1000;
    }

    .logo {
        color: #1abc9c;
        text-decoration: none;
    }

    .open-menu i {
        font-size: 24px;
        color: #f2f2f2;
        cursor: pointer;
    }

    /* Sidebar */
    aside {
        width: 280px;
        background-color: #1abc9c;
        padding: 20px;
        color: white;
        position: fixed;
        top: 60px;
        bottom: 0;
        overflow-y: auto;
    }

    /* Main Content */
    main {
        flex: 1;
        margin-left: 280px;
        padding: 40px;
        margin-top: 60px;
    }

    nav ul {
        list-style-type: none;
    }

    .boton-menu {
        color: white;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .boton-menu i {
        font-size: 24px;
        margin-right: 10px;
    }

    .titulo-principal {
        text-align: center;
        font-size: 32px;
        margin-bottom: 30px;
        color: #333;
    }

    .contenedor-carrito {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    #carrito-productos {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .content02 {
        margin-top: 20px;
    }

    .title03 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .red-text {
        color: #e74c3c;
    }

    .green-text {
        color: #2ecc71;
    }

    button[type="submit"], a {
        display: block;
        background-color: #1abc9c;
        color: white;
        padding: 15px;
        border: none;
        border-radius: 5px;
        text-align: center;
        margin-top: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover, a:hover {
        background-color: #149a7e;
    }

    .card01 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: calc(33.33% - 20px);
        position: relative;
    }

    /* Botón "Quitar Producto" */
    button[type="submit"] {
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 8px 12px;
        cursor: pointer;
        transition: background-color 0.3s;
        position: absolute;
        bottom: 10px;
        left: 10px;
    }

    button[type="submit"]:hover {
        background-color: #d32f2f;
    }

    .total-carrito {
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-weight: bold;
    }

    /* Responsive Styling */
    @media screen and (max-width: 768px) {
        .card01 {
            width: 100%;
        }

        .carrito-acciones {
    display: flex;
    justify-content: space-between; /* Esto separará los dos botones */
}

.carrito-acciones form {
    display: flex;
    align-items: center; /* Alinea verticalmente los elementos en el centro */
}

.carrito-acciones button, .carrito-acciones a {
    flex: 1; /* Esto hará que cada botón ocupe la misma cantidad de espacio */
    margin: 0 5px; /* Espacio entre los botones */
}



        .card01 img {
            max-width: 100%;
            height: auto;
        }
    }

    /* Additional styles as suggested */
    .texto-footer {
        margin-top: 20px;
        text-align: center;
    }

    aside {
        padding-bottom: 20px;
    }

    p {
        margin-bottom: 20px;
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 5px;
    }

    .mensaje-exito {
        background-color: #2ecc71;
        color: white;
    }

    .mensaje-error {
        background-color: #e74c3c;
        color: white;
    }

    .boton-menu:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    /* ... (Tus otros estilos) ... */

/* Para el botón de "Comprar Ahora" */
a[href^="https://www.sandbox.paypal.com/checkoutnow?"] {
    display: inline-block;
    background-color: #1abc9c;
    color: white;
    padding: 8px 15px; /* Diámetro más pequeño */
    border-radius: 4px;
    text-decoration: none; /* Remover subrayado */
    margin-left: 10px; /* Espaciado entre este botón y el botón "Vaciar carrito" */
    transition: background-color 0.3s;
}

a[href^="https://www.sandbox.paypal.com/checkoutnow?"]:hover {
    background-color: #149a7e;
}

/* Para quitar el subrayado de "Carrito" y "Seguir comprando" */
a {
    text-decoration: none;
}

/* Para el color del texto del footer */
footer .texto-footer {
    color: #1abc9c;
}

</style>



</head>
<body>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">GymRatsTienda</h1>
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

            <footer>
                <p class="texto-footer">© 2023 GymRats</p>
            </footer>
        </aside>

        <main>
            <?php if (session()->has('mensaje')): ?>
                <p><?= session('mensaje') ?></p>
            <?php endif; ?>

            <h2 class="titulo-principal">Carrito</h2>
            <div class="contenedor-carrito">
    <?php if (isset($productos) && count($productos) > 0): ?>

        <!-- Muestra los productos en el carrito -->
        <div id="carrito-productos">
            <?php 
                $total = 0;  // Variable para calcular el total de la compra

                foreach ($productos as $producto): 
                    $cantidad = $producto['cantidad']; // Suponiendo que tienes una clave 'cantidad_elegida'
                    $precioFinal = ($producto['descuento']) ? $producto['precio'] * (1 - ($producto['descuento'] / 100)) : $producto['precio'];
                    $totalProducto = $cantidad * $precioFinal;
                    $total += $totalProducto;
            ?>

<div class="card01">
                <img src="<?= base_url($producto['imagen']) ?>" alt="Imagen del Producto" width="100">
                <div class="content02">
                        <h2 class="title03"><?= esc($producto['nombre']) ?></h2>
                        <p>Cantidad: <?= esc($cantidad) ?></p>
                        <div class="price-container">
                            <?php if($producto['descuento']): ?>
                                <p class="red-text">Descuento: <?= $producto['descuento'] ?>%</p>
                                <p class="red-text">Precio Original: $<?= $producto['precio'] ?></p>
                                <p class="green-text">Precio Final: $<?= $precioFinal ?></p>
                            <?php else: ?>
                                <p>Precio: $<?= $producto['precio'] ?></p>
                            <?php endif; ?>
                            <p>Total Producto: $<?= $totalProducto ?></p>
                        </div>
                    </div>

                    <!-- Botón para eliminar producto individualmente -->
                    <form method="POST" action="<?= base_url('/eliminarProducto') ?>" style="margin-top: 10px;">
                        <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>">
                        <button type="submit">Quitar Producto</button>
                    </form>
                </div>

            <?php endforeach; ?>

            <!-- Mostrar el precio total del carrito -->
            <div class="total-carrito">
                <strong>Total Carrito: $<?= $total ?></strong>
                <div class="carrito-acciones">
    <form method="POST" action="<?= base_url('/vaciarCarrito') ?>">
        <a href="compras">Comprar ahora</a>
    </form>
</div>
    </div>
    <button type="submit">Vaciar carrito</button>
        </div>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>
</div>
    
</main>

    </div>
    
 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/carrito.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>