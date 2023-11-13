<!-- views/update_items.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cliente</title>
    <!-- Aquí puedes poner tus estilos o enlazar a un archivo CSS externo -->
</head>
<body>
<div class="container">
    <h2>Actualizar Cliente</h2>

    <form action="<?= base_url('items_update' . esc($item['id'])) ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= esc($item['nombre']) ?>"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= esc($item['email']) ?>"><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" value="<?= esc($item['contrasena']) ?>"><br>

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?= esc($item['usuario']) ?>"><br>

        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" value="<?= esc($item['direccion']) ?>"><br>

        <label for="codigo_postal">Codigo Postal:</label>
        <input type="text" name="codigo_postal" value="<?= esc($item['codigo_postal']) ?>"><br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" value="<?= esc($item['telefono']) ?>"><br>

        <label for="tipo">Tipo de Usuario:</label>
        <input type="text" name="tipo" value="<?= esc($item['tipo']) ?>"><br>

        <!-- Puedes agregar más campos aquí si lo requieres -->

        <input type="submit" value="Guardar Cambios">
    </form>

    <a href="<?= base_url('items_view') ?>">Regresar al Listado</a>
</div>
</body>
</html>
