<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesores</title>
    <script>
    var inactivityTimeout; // Variable para almacenar el temporizador de inactividad

    // Función para reiniciar el temporizador de inactividad
    function resetInactivityTimeout() {
      clearTimeout(inactivityTimeout); // Limpiamos el temporizador anterior
      inactivityTimeout = setTimeout(logout, 180000); // 60000 ms = 1 minuto
    }

    // Función para redirigir a la página de cierre de sesión
    function logout() {
      window.location.href = '<?= base_url("inicio/logout"); ?>';
    }

    // Inicializa el temporizador de inactividad
    resetInactivityTimeout();

    // Agrega eventos de detección de actividad del usuario
    document.addEventListener('mousemove', resetInactivityTimeout);
    document.addEventListener('keydown', resetInactivityTimeout);
  </script>
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;  /* Aumentar el ancho un poco */
    max-width: 1200px;  /* Establecer un ancho máximo */
    margin: 2em auto;
    background-color: #fff;
    padding: 2em;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    overflow-x: auto;  /* Permite desplazarse horizontalmente si es necesario */
}

/*... restante del CSS ...*/


table {
    width: 100%;
    border-collapse: collapse;
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
}

tr:hover {
    background-color: #f5f5f5;
}

/* Estilo para el botón Editar (Verde) */
a.edit, button.edit {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none; /* Eliminar bordes por defecto para el botón */
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-right: 10px;  /* Margen a la derecha para separar de "Eliminar" */
    display: block;  /* Hace que el botón ocupe toda la línea */
    margin-bottom: 5px;  /* Separación vertical entre botones */
    cursor: pointer; /* Cambiar el cursor a mano al pasar por encima */
    text-decoration: none;
}

a.edit:hover, button.edit:hover {
    background-color: #45a049;  /* Un verde más oscuro cuando pasas el cursor */
}

/* Estilo para el botón Eliminar (Rojo) */
a.delete, button.delete {
    background-color: #f44336;
    color: white;
    padding: 8px 12px;
    border: none; /* Eliminar bordes por defecto para el botón */
    border-radius: 5px;
    transition: background-color 0.3s;
    display: block;  /* Hace que el botón ocupe toda la línea */
    margin-top: 5px;  /* Separación vertical entre botones */
    cursor: pointer; /* Cambiar el cursor a mano al pasar por encima */
}

a.delete:hover, button.delete:hover {
    background-color: #f21c0d;  /* Un rojo más oscuro cuando pasas el cursor */
}
.back-button {
            background-color: red; /* Cambiado a color rojo */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white; /* Cambiado el color del texto a blanco para mejor contraste con el rojo */
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: darkred; /* Oscurecido el rojo para el hover */
        }
    </style>
    </style>
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
