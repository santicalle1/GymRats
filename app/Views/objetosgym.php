<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GymRats</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/tienda.css'); ?>">

    <?php
    include('header.php');
    ?>
    <!-- Tarjeta de producto -->
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
                        <!-- Puedes agregar lógica aquí si tienes un precio original tachado, de lo contrario, solo muestra el precio. -->
                        <p class="new-price">$
                            <?= esc($producto['precio']) ?>
                        </p>
                    </div>
                    <?php if (isset($producto['id_producto'])): ?>
                        <form action="<?= base_url('/agregarAlCarrito') ?>" method="post" class="form-agregar">
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

    <?php
    include('footer.php');
    ?>

    </body>

</html>