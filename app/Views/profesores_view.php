<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/profesores_view.css'); ?>">
    <title>Profesores</title>
</head>

<body>

    <form class="profesor-form" action="<?= base_url('/profesores/create') ?>" method="POST"
        enctype="multipart/form-data">
        <a href="panel_admin" class="back-button">&larr; Volver</a>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" required>
        </div>

        <div class="form-group">
            <label for="fecha_de_contrato">Fecha de Contrato:</label>
            <input type="date" id="fecha_de_contrato" name="fecha_de_contrato" required>
        </div>

        <div class="form-group">
            <label for="titulos">Títulos:</label>
            <textarea id="titulos" name="titulos" required></textarea>
        </div>

        <div class="form-group">
            <label for="horarios">Horarios:</label>
            <textarea id="horarios" name="horarios" placeholder="Ejemplo: Lunes 10:00 - 12:00, Martes 15:00 - 17:00"
                required></textarea>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>
        </div>

        <div class="form-group">
            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" required>
        </div>

        <div class="form-group">
            <label for="salario">Salario:</label>
            <input type="number" id="salario" name="salario" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="coste">Coste:</label>
            <input type="number" id="coste" name="coste" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="dificultad">Dificultad:</label>
            <input type="text" id="dificultad" name="dificultad" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
        </div>

        <div class="form-group">
            <input type="submit" value="Agregar Profesor">
        </div>
    </form>
</body>

</html>