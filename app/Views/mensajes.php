<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/mensajes.css'); ?>">
    <title>Mensajes de Clientes</title>
</head>
<body>
    <div class="container">
        <h1>Mensajes de Contacto</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Motivo</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensajes as $mensaje): ?>
                    <tr>
                        <td><?= $mensaje['id_contacto'] ?></td>
                        <td><?= $mensaje['email'] ?></td>
                        <td><?= $mensaje['motivo'] ?></td>
                        <td class="centered-text"><?= $mensaje['mensaje'] ?></td>
                        <td>
                            <!-- Botones de Editar y Eliminar -->
                            <a class="delete" href="<?= base_url('mensajes/eliminar/' . $mensaje['id_contacto']) ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<a class="volver" href="<?= base_url('panel_admin') ?>">&#8592; Volver</a>

    </div>
</body>
</html>

