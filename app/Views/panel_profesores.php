<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Panel profesores</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panel_profesor.css'); ?>">
</head>

<body>


    <!-----Casilla de verificacion-->
    <input type="checkbox" id="checkbox">
    <!----Inicio del Encabezado-->
    <header class="header">
        <h2 class="u-name">GymRats<b>Panel</b>
            <label for="checkbox">
                <!---Iconos de Aplicaciones Font-Awesome-->


            </label>
        </h2>
    </header>
    <!----Fin del Encabezado----->

    <!----Agregue una tabla a un documento---->
    <div class="body">
        <!--- Barra lateral Izquierda---------->
        <nav class="side-bar-left">
            <li>
                <h2>Mis Profesores</h2>

                <?php if (session()->has('success')): ?>
                    <p>
                        <?= session('success') ?>
                    </p>
                <?php endif; ?>

                <!-- Aquí puedes mostrar la lista de profesores comprados -->
                <?php if (isset($profesor) && is_array($profesor)): ?>
                    <div class="profesor">
                        <h3>
                            <?= esc($profesor['id']) ?>
                        </h3>

                    </div>
                <?php else: ?>
                    <p>No se encontraron alumnos.</p>
                <?php endif; ?>

            </li>


            <!------Dashboard-->

            <!----------Salir---->
            <li>
                <a href="inicio">
                    <i class="fa fa-power-off"></i>
                    <span>Salir</span>
                </a>
            </li>


            </ul>

        </nav>
        <form action="<?= base_url("usuarioProfesorController/agregarRutina/" . session()->get('id_profesor')); ?>"
            method="post">
            <label for="id_usuario">ID del Usuario:</label>
            <input type="text" name="id_usuario" required><br>
            <!-- Puedes ajustar el tipo según tu lógica de asignación -->

            <label for="nombre_rutina">Nombre de la Rutina:</label>
            <input type="text" name="nombre_rutina" required><br>

            <label for="duracion">Duración:</label>
            <input type="text" name="duracion" required><br>

            <!-- ... Otros campos de la rutina ... -->

            <label for="descripcion">Descripción:</label>
            <table>
                <thead>
                    <tr>
                        <th>Ejercicio</th>
                        <th>Peso</th>
                        <th>Series</th>
                        <th>Repeticiones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Puedes agregar más filas según sea necesario -->
                    <tr>
                        <td><input type="text" name="ejercicio[]" required></td>
                        <td><input type="text" name="peso[]" required></td>
                        <td><input type="text" name="series[]" required></td>
                        <td><input type="text" name="repeticiones[]" required></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" onclick="agregarFila()">Agregar Fila</button>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <script>
                function agregarFila() {
                    var nuevaFila = "<tr>" +
                        "<td><input type='text' name='ejercicio[]' required></td>" +
                        "<td><input type='text' name='peso[]' required></td>" +
                        "<td><input type='text' name='series[]' required></td>" +
                        "<td><input type='text' name='repeticiones[]' required></td>" +
                        "</tr>";

                    $("table tbody").append(nuevaFila);
                }
            </script>

            <label for="dificultad">Dificultad:</label>
            <select name="dificultad" required>
                <option value="facil">Fácil</option>
                <option value="intermedio">Intermedio</option>
                <option value="dificil">Difícil</option>
            </select><br>

            <input type="hidden" name="id_profesor" value="<?= session()->get('id'); ?>">

            <button type="submit">Agregar Rutina</button>
        </form>
</body>

</html>