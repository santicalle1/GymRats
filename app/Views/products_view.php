<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/body.css'); ?>">
</head>

<div class="container"> <!-- Agregado para aplicar estilos del container -->
<table>
    <tr>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Descuento</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    <a href="panel_admin" class="back-button">&larr; Volver</a>
    <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= esc($product['id_producto']); ?></td>
                <td><?= esc($product['nombre']); ?></td>
                <td><?= esc($product['descripcion']); ?></td>
                <td><?= esc($product['precio']); ?></td>
                <td><?= esc($product['stock']); ?></td>
                <td><?= esc($product['descuento']); ?>%</td>
                <td><img src="<?= esc($product['imagen']); ?>" alt="<?= esc($product['nombre']); ?>" width="50"></td> <!-- Asegúrate de tener una columna imagen_url o similar en tu BD -->
                <td>
                <a href="<?= base_url("products/edit/" . esc($product['id_producto'])); ?>" class="edit">Editar</a>
                    <form method="post" action="<?= base_url('products/delete/' . esc($product['id_producto'])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                        <button type="submit" class="delete">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No hay productos disponibles.</td>
        </tr>
    <?php endif; ?>
</table>
</div> <!-- Cierre del div con clase container -->
<script>
    function confirmDelete(deleteUrl) {
        if(confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
</body>
</html>

