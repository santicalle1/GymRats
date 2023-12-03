<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Panel Cliente</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/panelcliente.css'); ?>">

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
        <!-- Barra lateral Izquierda -->
        <nav class="side-bar-left">
            <li>
<?= $profesor ? '<div>
    <h1>Información del Profesor</h1>
    <p>ID del Profesor: ' . $profesor['id_profesor'] . '</p>
    <p>Nombre: ' . $profesor['nombre'] . '</p>
    <!-- Agrega más campos según la estructura de tu tabla "profesores" -->
</div>' : '<p>No se encontraron datos del profesor para la rutina seleccionada.</p>' ?>

<!-- Agrega un var_dump() para imprimir los datos del profesor -->
<div>
    <h2>Var Dump de $profesor:</h2>
    <pre><?php var_dump($profesor); ?></pre>
</div>

            </li>

            <!-- Salir -->
            <li>
                <a href="<?= base_url('ProfesoresController/salirDelPanel') ?>" onclick="return confirmarSalir();">
                    <i class="fa fa-power-off"></i>
                    <span>Salir</span>
                </a>
            </li>

            </ul>

        </nav>
        <?php
        $session = session();
        $datosUsuario = $session->get('datosUsuario');
        ?>

        <div class="body">
            <div class="client-panel">
                <h2>Datos del Cliente</h2>

                <p><strong>Nombre:</strong>
                    <?= esc($userData['nombre']) ?>
                </p>
                <p><strong>Email:</strong>
                    <?= esc($userData['email']) ?>
                </p>
                <p><strong>Usuario:</strong>
                    <?= esc($userData['usuario']) ?>
                </p>
                <p><strong>Codigo Postal:</strong>
                    <?= esc($userData['codigo_postal']) ?>
                </p>
            </div>
        </div>


    </div>
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