<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/profesores_view.css'); ?>">
    <title>Profesores</title>
</head>

<body>

    <form class="profesor-form" action="<?= base_url('/profesorescontroller/create') ?>" method="POST"
        enctype="multipart/form-data">
        <a href="panel_admin" class="back-button">&larr; Volver</a>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de usuario:</label>
            <select name="tipo" id="tipo">
                <option value="1">Administrador</option>
                <option value="2">Profesor</option>

            </select>
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
            <input name="email" required type="email" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="coste">Coste:</label>
            <input type="number" id="coste" name="coste" step="0.01" required>
        </div>

        <div class="form-group">
            <label type="text" id="dificultad" name="dificultad" required>Dificultad</label>
            <select name="dificultad" id="dificultad">
                <option value="Facil">Facil</option>
                <option value="Intermedio">Intermedio</option>
                <option value="Dificil">Dificil</option>
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
        </div>
        <div class="form-group">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Agregar Profesor">
        </div>
    </form>
</body>

</html>
