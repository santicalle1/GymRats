<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/modificarprofesores.css'); ?>">

    <title>Modificar Profesores</title>
</head>

<body>
    <div class="container">
        <a href="panel_admin" class="back-button">&larr; Volver</a>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Fecha de Contrato</th>
                    <th>Titulos</th>
                    <th>Horarios</th>
                    <th>Telefono</th>
                    <th>Mail</th>
                    <th>Salario</th>
                    <th>Coste</th>
                    <th>Dificultad</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($profesores)): ?>
    <?php foreach ($profesores as $profesor): ?>
                    <tr>
                        <td><?= $profesor['nombre'] ?></td>
                        <td><?= $profesor['especialidad'] ?></td>
                        <td><?= $profesor['fecha_de_contrato'] ?></td>
                        <td><?= $profesor['titulos'] ?></td>
                        <td><?= $profesor['horarios'] ?></td>
                        <td><?= $profesor['telefono'] ?></td>
                        <td><?= $profesor['mail'] ?></td>
                        <td><?= $profesor['salario'] ?></td>
                        <td><?= $profesor['coste'] ?></td>
                        <td><?= $profesor['dificultad'] ?></td>
                        <td><?= $profesor['imagen'] ?></td>
                        <td>
                        <a href="<?= base_url('/editar_profesor/'.$profesor['id_profesor']) ?>" class="edit">Editar</a>

                            <a href="<?= base_url('delete_profesor/'.$profesor['id_profesor']) ?>" class="delete" onclick="return confirm('¿Seguro que deseas eliminar?');">Eliminar</a>
                            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7">No hay profesores disponibles.</td>
    </tr>
<?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
