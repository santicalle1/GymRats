<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/productsedit.css'); ?>">
    <title>Editar Productos</title>
</head>

<body>
<div class="form-container">
    <form method="post" action="<?= base_url('productos/update/' . esc($product['id_producto'])); ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($product['nombre']); ?>">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?= esc($product['descripcion']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= esc($product['precio']); ?>">
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= esc($product['stock']); ?>">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen (URL):</label>
            <input type="text" class="form-control" id="imagen" name="imagen" value="<?= esc($product['imagen']); ?>">
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="<?= esc($product['categoria']); ?>">
        </div>

        <div class="form-group">
            <label for="descuento">Descuento (%):</label>
            <input type="number" class="form-control" id="descuento" name="descuento" value="<?= esc($product['descuento']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
</body>
</html>