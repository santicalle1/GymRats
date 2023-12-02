<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rutina</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    width: 50%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #45a049;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #4CAF50;
}

    </style>
</head>

<body>

    <h1>Editar Rutina</h1>
    
    <?php if (!empty($rutina)): ?>
        <!-- Formulario para editar rutina -->
        <form action="<?= base_url('rutinas/procesarEdicion') ?>" method="post">
        
            <input type="hidden" name="id_rutina" value="<?= $rutina['id_rutina'] ?>">

            <label for="nombre_rutina">Nombre:</label>
            <input type="text" name="nombre_rutina" value="<?= esc($rutina['nombre_rutina']) ?>" required>

            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" value="<?= esc($rutina['descripcion']) ?>" required>

            <label for="duracion">Duración:</label>
            <input type="text" name="duracion" value="<?= esc($rutina['duracion']) ?>" required>

            <label for="dificultad">Dificultad:</label>
            <input type="text" name="dificultad" value="<?= esc($rutina['dificultad']) ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    <?php else: ?>
        <p>No se encontró la rutina seleccionada.</p>
    <?php endif; ?>

</body>

</html>
