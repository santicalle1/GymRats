<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/tienda.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
include('header.php')
    ?>

<body>
    <CENTER>
        <H1>PRODUCTOS EN OFERTA</H1>
    </CENTER>
    <div class="contenedor-productos">
        <?php foreach ($productos as $producto): ?>
            <div class="card01">
                <img src="<?= base_url($producto['imagen']) ?>" alt="Imagen del Producto">
                <div class="content02">
                    <h2 class="title03">
                        <?= esc($producto['nombre']) ?>
                    </h2>
                    <p class="description04">
                        <?= esc($producto['descripcion']) ?>
                    </p>
                    <p class="title03">Stock:
                        <?= esc($producto['stock']) ?>
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
                                <?= $producto['precio'] * (1 - ($producto['descuento'] / 100)) ?>
                            </p>
                        <?php else: ?>
                            <p>Precio: $
                                <?= $producto['precio'] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($producto['id_producto'])): ?>
                        <form action="<?= base_url('/agregarAlCarrito') ?>" method="post" class="form-agregar"
                            onsubmit="return verificarAgregarAlCarrito(<?= esc($producto['id_producto']) ?>)">
                            <input type="hidden" name="id_producto" value="<?= esc($producto['id_producto']) ?>">

                            <div class="input-group">
                                <label for="cantidad-<?= esc($producto['id_producto']) ?>">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad-<?= esc($producto['id_producto']) ?>"
                                    value="1" min="1" max="<?= esc($producto['stock']) ?>">
                            </div>

                            <button type="submit">
                                Agregar al Carrito
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        function verificarAgregarAlCarrito(idProducto) {
            // Aquí puedes agregar lógica adicional para verificar si el producto ya está en el carrito
            // Por ejemplo, podrías hacer una solicitud AJAX al servidor para verificar esto

            // Supongamos que ya realizaste la verificación y obtuviste el resultado en la variable 'productoEnCarrito'
            var productoEnCarrito = false; // Deberías obtener este valor de tu lógica de verificación

            if (productoEnCarrito) {
                // El producto ya está en el carrito, muestra un mensaje de alerta
                Swal.fire({
                    icon: 'warning',
                    title: 'Producto duplicado',
                    text: 'Este producto ya está en tu carrito.',
                });
                return false; // Evita que el formulario se envíe
            } else {
                // El producto no está en el carrito, permite que el formulario se envíe
                return true;
            }
        }
    </script>
    <?php
    include('footer.php')
        ?>

</body>

</html>