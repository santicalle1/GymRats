<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/itemsview.css'); ?>">
    <title>Listado De Clientes</title>
</head>

<body>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Usuario</th>
        <th>Direccion</th>
        <th>Codigo Postal</th>
        <th>Telefono</th>
        <th>Tipo de Usuario</th>
        <th>Acciones</th>
    </tr>
</div>
    <?php if (isset($items) && is_array($items) && count($items) > 0): ?>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= esc($item['id']); ?></td>
                <td><?= esc($item['nombre']); ?></td>
                <td><?= esc($item['email']); ?></td>
                <td  style="visibility:collapse; display:none;"><?= esc($item['contrasena']); ?></td>
                <td><?= esc($item['usuario']); ?></td>
                <td><?= esc($item['direccion']); ?></td>
                <td><?= esc($item['codigo_postal']); ?></td>
                <td><?= esc($item['telefono']); ?></td>
                <td><?= esc($item['tipo']); ?></td>
                <td>

    <a href="<?= base_url("items_edit" . esc($item['id'])); ?>" class="edit">Editar</a>
    <form method="post" action="<?= base_url('items/delete/' . esc($item['id'])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
    <button type="submit" class="delete">Eliminar</button>
</form>

<script>
    function confirmDelete(deleteUrl) {
        if(confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
</td>

            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="10">No hay mas Usuarios.</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>



