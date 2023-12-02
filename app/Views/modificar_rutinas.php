<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Rutinas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 2em auto;
            background-color: #fff;
            padding: 2em;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .back-button {
            background-color: red;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a.edit, button.edit {
            background-color: #45a049;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-right: 10px;
            display: inline-block;
            margin-bottom: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        a.edit:hover, button.edit:hover {
            background-color: #4CAF50;
        }

        a.delete, button.delete {
            background-color: #f21c0d;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        a.delete:hover, button.delete:hover {
            background-color: #f44336;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="panel_admin" class="back-button">&larr; Volver</a>
        <h1>Modificar Rutinas</h1>
        <?php if (!empty($rutinas)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Duración</th>
                        <th>Dificultad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rutinas as $rutina): ?>
                        <tr>
                            <td><?= $rutina['id_rutina'] ?></td>
                            <td><?= esc($rutina['nombre_rutina']) ?></td>
                            <td><?= esc($rutina['descripcion']) ?></td>
                            <td><?= esc($rutina['duracion']) ?></td>
                            <td><?= esc($rutina['dificultad']) ?></td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="<?= base_url('rutinas/editar/' . $rutina['id_rutina']) ?>" class="edit">Editar</a>
                                <!-- Botón para eliminar -->
                                <a href="<?= base_url('rutinas/eliminar/' . $rutina['id_rutina']) ?>" class="delete" onclick="return confirm('¿Seguro que deseas eliminar?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay rutinas disponibles.</p>
        <?php endif; ?>
    </div>

</body>

</html>
