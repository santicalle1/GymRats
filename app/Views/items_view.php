<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado De Clientes</title>
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
        /* Estilo general */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 60%;
    margin: 2em auto;
    background-color: #fff;
    padding: 2em;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

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

    </style>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Usuario</th>
        <th>Direccion</th>
        <th>Codigo Postal</th>
        <th>Telefono</th>
        <th>Tipo de Usuario</th>
        <th>Acciones</th>
    </tr>
</div>
    <?php if (isset($items) && is_array($items) && count($items) > 0): ?>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= esc($item['id']); ?></td>
                <td><?= esc($item['nombre']); ?></td>
                <td><?= esc($item['email']); ?></td>
                <td  style="visibility:collapse; display:none;"><?= esc($item['contrasena']); ?></td>
                <td><?= esc($item['usuario']); ?></td>
                <td><?= esc($item['direccion']); ?></td>
                <td><?= esc($item['codigo_postal']); ?></td>
                <td><?= esc($item['telefono']); ?></td>
                <td><?= esc($item['tipo']); ?></td>
                <td>

    <a href="<?= base_url("items_edit" . esc($item['id'])); ?>" class="edit">Editar</a>
    <form method="post" action="<?= base_url('items/delete/' . esc($item['id'])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
    <button type="submit" class="delete">Eliminar</button>
</form>

<script>
    function confirmDelete(deleteUrl) {
        if(confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
</td>

            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="10">No hay mas Usuarios.</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>



