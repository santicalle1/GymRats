<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/itemsedit.css'); ?>">
    <title>Editar Cliente</title>
</head>
<body>
    <form action="<?= base_url("items_edit" . $item['id']) ?>" method="post">
        Nombre: <input type="text" name="nombre" value="<?= $item['nombre'] ?>"><br>
        Email: <input type="text" name="email" value="<?= $item['email'] ?>"><br>
        <input type="hidden" name="contrasena"  value="<?= $item['contrasena'] ?>"><br>
        Usuario: <input type="text" name="usuario" value="<?= $item['usuario'] ?>"><br>
        Direccion: <input type="text" name="direccion" value="<?= $item['direccion'] ?>"><br>
        Codigo Postal: <input type="text" name="codigo_postal" value="<?= $item['codigo_postal'] ?>"><br>
        Telefono: <input type="text" name="telefono" value="<?= $item['telefono'] ?>"><br>
        Tipo de Usuario: <input type="text" name="tipo" value="<?= $item['tipo'] ?>"><br>
        <!-- Agrega más campos aquí si es necesario -->
        <input type="submit" value="Actualizar">
        <a href="<?= base_url("items_view"); ?>">Atras</a> 
    </form>
</body>
</html>


