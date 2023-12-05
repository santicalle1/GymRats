<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Cliente</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.body {
    display: flex;
}

.client-panel {
    width: 400px;
    height: 600px;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto; /* Centra el panel horizontalmente */
}

h2 {
    color: #333;
}

p {
    margin: 10px 0;
}

strong {
    color: #555;
}

.client-panel p {
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.client-panel p:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.header {
    padding: 15px 30px;
    background-color: darkcyan;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h2 {
    font-size: 20px;
    color: white;
}

.side-bar-left {
    width: 250px;
    min-height: 100vh;
    transition: 500ms width;
    background-color: darkslategrey;
}

.side-bar-left ul {
    margin-left: 15px;
    list-style: none;
}

.side-bar-left ul li {
    padding: 15px;
    text-overflow: ellipsis;
    transition: 500ms background;
    white-space: nowrap;
    overflow: hidden;
    border-bottom: 1px solid #333; /* Agregamos un borde inferior */
}

.side-bar-left ul li:last-child {
    border-bottom: none; /* Quitamos el borde inferior al último elemento */
}

.side-bar-left ul li a {
    color: white;
    text-decoration: none;
}

.side-bar-left ul li:hover {
    background-color: orangered;
}

.side-bar-left ul li a i {
    display: inline-block;
    padding: 15px;
    cursor: pointer;
    color: orange;
}

.u-name {
    padding: 15px;
    color: white;
}

.u-name b {
    color: greenyellow;
    padding: 10px;
}

#checkbox {
    display: none;
}

#checkbox:checked ~ .body .side-bar-left {
    width: 100px;
}

#checkbox:checked ~ .body .side-bar-left .user-p {
    visibility: hidden;
}

#checkbox:checked ~ .body .side-bar-left a span {
    display: none;
}

.section-1 {
    flex: 1; /* Usa todo el espacio restante */
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.paginacion {
    border: 1px solid darkred;
    background-color: black;
    padding: 10px;
    color: white;
    display: inline-block;
    text-decoration: none;
    opacity: 0.8;
}

.paginacion:hover {
    opacity: 1;
}

.profesor {
    text-align: center;
    margin-top: 10px; /* Agregamos un espacio superior entre profesores */
}
.button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }

    .button-primary {
        background-color: #3498db;
        color: #fff;
        border: none;
    }

    .button-danger {
        background-color: #e74c3c;
        color: #fff;
        border: none;
    }

    /* Estilos para la tabla de detalles de rutina */
    .rutina-details table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .rutina-details th, .rutina-details td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .rutina-details th {
        background-color: #3498db;
        color: #fff;
    }

    .rutina-details tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    </style>
</head>
<style>
    
</style>
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
        <!-- Barra lateral Izquierda -->
        <nav class="side-bar-left">
            <li>
                <h2>Mis Profesores</h2>

                <?php if (isset($profesor['nombre'])): ?>
                    <div class="profesor">
                        <h3>
                            <?= esc($profesor['nombre']) ?>
                        </h3>
                        <?php if (isset($profesor['imagen'])): ?>
                            <img src="<?= base_url() . '/' . esc($profesor['imagen']) ?>" alt="" width="100">
                        <?php endif; ?>
                        <?php if (isset($profesor['dificultad'])): ?>
                            <p><strong>Dificultad:</strong>
                                <?= esc($profesor['dificultad']) ?>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($profesor['horarios'])): ?>
                            <p><strong>Horario:</strong>
                                <?= esc($profesor['horarios']) ?>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($profesor['id_profesor'])): ?>
                            <button onclick="eliminarProfesor(<?= esc($profesor['id_profesor']) ?>)">Eliminar</button>
                            <a href="<?= base_url('profesores/solicitar-rutina/') . esc($profesor['id_profesor']) ?>">Solicitar
                                Rutina</a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p>No se encontraron profesores.</p>
                <?php endif; ?>



            </li>

            <li>
                <a href="<?= base_url('ProfesoresController/salirDelPanel') ?>" onclick="return confirmarSalir();">
                    <i class="fa fa-power-off"></i>
                    <span>Salir</span>
                </a>
            </li>

            </ul>

        </nav>

        <div class="body">
            <div class="client-panel">
                <h2>Datos del Cliente</h2>

                <p><strong>Nombre:</strong>
                    <?= session('nombre'); ?>
                </p>
                <p><strong>Email:</strong>
                    <?= session('email'); ?>
                </p>
                <p><strong>Usuario:</strong>
                    <?= session('usuario'); ?>
                </p>
            </div>
            <div class="rutina-details">
            <h2>Detalles de la Rutina</h2>

    <?php if (!empty($detalleRutina)): ?>
        <table>
            <thead>
                <tr>
                    <th>Ejercicios</th>
                    <th>Repeticiones</th>
                    <th>Series</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalleRutina as $detalle): ?>
                    <tr>
                        <td><?= esc($detalle->ejercicios) ?></td>
                        <td><?= esc($detalle->repeticiones) ?></td>
                        <td><?= esc($detalle->series) ?></td>
                        <td><?= esc($detalle->peso) ?></td>
                        <td>
                        
                            <form method="post" action="<?= base_url('Panel/eliminar') ?>">
                                <input type="hidden" name="id_detalle_rutina" value="<?= esc($detalle->id_detalle_rutina) ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron detalles de la rutina.</p>
    <?php endif; ?>
        </div>
        </div>



<!-- ... Código posterior ... -->


<!-- ... Código posterior ... -->

    </div>
    <script>
        function eliminarProfesor(idProfesor) {
            // Aquí puedes realizar una llamada AJAX para eliminar el profesor
            fetch('<?= base_url("ProfesoresController/eliminarProfesor/") ?>' + idProfesor, {
                method: 'GET',
            })
                .then(response => response.json())
                .then(data => {
                    // Redirige a la vista de mis profesores después de eliminar
                    window.location.href = "<?= base_url('ProfesoresController/salirDelPanel') ?>";
                })
                .catch(error => {
                    console.error('Error al eliminar el profesor:', error);
                    // Maneja el error según sea necesario
                });
        }

        function confirmarSalir() {
            // Preguntar al usuario si realmente desea salir
            return confirm('¿Está seguro de que desea salir del panel?');
        }

    </script>
</body>

</html>