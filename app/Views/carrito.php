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
</head>

<body>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">GymRatsTienda</h1>
        </header>
        <aside>
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
                <?php if (!empty($productos)): ?>
                    <div id="carrito-productos">
                        <?php
                        $total = 0;

                        foreach ($productos as $producto):
                            $cantidad = $producto['cantidad'];
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
    <?php if ($producto['descuento']): ?>
        <p class="red-text">Descuento: <?= $producto['descuento'] ?>%</p>
        <p class="red-text">Precio Original: $<?= $producto['precio'] ?></p>
        <p class="green-text">Precio Final: $<?= $precioFinal ?></p>
    <?php else: ?>
        <p>Precio: $<?= $producto['precio'] ?></p>
    <?php endif; ?>
    <p class="total-producto-<?= esc($producto['id_carrito']) ?>">Total Producto: $<?= $totalProducto ?></p>
</div>

                            </div>

                            <form method="POST" action="<?= base_url('/eliminarProducto') ?>" style="margin-top: 10px;">
                                <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>">
                                <button type="submit">Quitar Producto</button>
                            </form>

                            <form class="update-form" method="post" action="<?= base_url('/updateCantidad/' . esc($producto['id_carrito'])) ?>">
    <?= csrf_field() ?>
    <input type="hidden" name="id_carrito" value="<?= esc($producto['id_carrito']) ?>">
    <div class="input-group">
        <label for="cantidad-<?= esc($producto['id_carrito']) ?>">Cantidad:</label>
        <!-- Ajusta el atributo max para reflejar el stock del producto -->
        <input type="number" name="cantidad" class="cantidad-input" value="<?= esc($producto['cantidad']) ?>" min="1" max="<?= esc($producto['stock']) ?>">
    </div>
    <button type="submit" class="update-button">Actualizar Cantidad</button>
</form>

<div class="message-container"></div>


                            <?php if (session()->has('success') && session('success') == 'Cantidad actualizada exitosamente.'): ?>
                                <p class="success-message">
                                    Cantidad actualizada exitosamente. Nueva cantidad: <?= esc($producto['cantidad']) ?>, Nuevo total: $<?= esc($totalProducto) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php endforeach; ?>

                        <div class="total-carrito">
                            <strong>Total Carrito: $
                                <?= $total ?>
                            </strong>
                            <div class="carrito-acciones">
                                <form method="POST" action="<?= base_url('/vaciarCarrito') ?>">
                                    <button type="submit">Vaciar carrito</button>
                                </form>
                                <form method="POST" action="<?= base_url('/compras') ?>">
                                <input name="TOTAL" id="TOTAL" value="<?= $total ?>" hidden />
                                <button type="submit" style="background-color: #28a745; color: #fff; padding: 15px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;" class="comprar-ahora-button">Comprar ahora</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Tu carrito está vacío.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
    <!-- Asegúrate de que jQuery esté incluido antes de tu script -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
    $(document).ready(function () {
        $('.update-button').on('click', function (event) {
            event.preventDefault();

            const form = $(this).closest('.update-form');
            const formData = form.serialize();
            const newCantidad = parseInt(form.find('.cantidad-input').val());
            const stockDisponible = parseInt(form.find('.cantidad-input').attr('max'));

            // Verifica que la nueva cantidad sea un número positivo y no mayor que el stock disponible
            if (isNaN(newCantidad) || newCantidad <= 0 || newCantidad > stockDisponible) {
                alert('Por favor, ingrese una cantidad válida dentro del rango del stock disponible.');
                return;
            }

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        const cantidadInput = form.find('.cantidad-input');
                        const totalProductoContainer = form.find('.total-producto');
                        const totalCarritoElement = $('#total-carrito');

                        cantidadInput.val(data.data.cantidad);
                        totalProductoContainer.text(`Total Producto: $${data.data.totalProducto}`);
                        totalCarritoElement.text(`Total Carrito: $${data.data.totalCarrito}`);

                        const messageContainer = form.siblings('.message-container');
                        messageContainer.html(`<p class="success-message">Cantidad actualizada exitosamente. Nueva cantidad: ${data.data.cantidad}, Nuevo total: $${data.data.totalProducto}</p>`);
                    } else {
                        const messageContainer = form.siblings('.message-container');
                        messageContainer.html(`<p class="error-message">${data.message}</p>`);
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/carrito.js"></script>
    <script src="./js/menu.js"></script>
</body>

</html>
