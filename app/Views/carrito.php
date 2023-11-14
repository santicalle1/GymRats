<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/carrito.css'); ?>">
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

        document.addEventListener('DOMContentLoaded', function () {
            const btnsRemove = document.querySelectorAll('.btn-remove');
            for (let btn of btnsRemove) {
                btn.addEventListener('click', function () {
                    let id = this.dataset.id;
                    removeProductFromCart(id);
                });
            }

            // Botón para vaciar el carrito
            document.getElementById('carrito-acciones-vaciar').addEventListener('click', function () {
                clearCart();
            });

            // Aquí puedes agregar la lógica para el botón "Comprar ahora" y PayPal
            // Por ejemplo, podrías utilizar la API de PayPal aquí para procesar la compra.
        });


    </script>



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
                <p>
                    <?= session('mensaje') ?>
                </p>
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
                                    <h2 class="title03">
                                        <?= esc($producto['nombre']) ?>
                                    </h2>
                                    <p>Cantidad:
                                        <?= esc($cantidad) ?>
                                    </p>
                                    <div class="price-container">
                                        <?php if ($producto['descuento']): ?>
                                            <p class="red-text">Descuento:
                                                <?= $producto['descuento'] ?>%
                                            </p>
                                            <p class="red-text">Precio Original: $
                                                <?= $producto['precio'] ?>
                                            </p>
                                            <p class="green-text">Precio Final: $
                                                <?= $precioFinal ?>
                                            </p>
                                        <?php else: ?>
                                            <p>Precio: $
                                                <?= $producto['precio'] ?>
                                            </p>
                                        <?php endif; ?>
                                        <p>Total Producto: $
                                            <?= $totalProducto ?>
                                        </p>
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
                            <strong>Total Carrito: $
                                <?= $total ?>
                            </strong>
                            <div class="carrito-acciones">
                                <form method="POST" action="<?= base_url('/vaciarCarrito') ?>">
                                    <button type="submit">Vaciar carrito</button>
                                </form>
                                <div>
                                    <a href="compras">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
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