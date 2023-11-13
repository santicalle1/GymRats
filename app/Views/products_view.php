<!DOCTYPE html>
<html lang="en">
<body>
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
/* Estilo general */
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
</head>

<div class="container"> <!-- Agregado para aplicar estilos del container -->
<table>
    <tr>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Descuento</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    <a href="panel_admin" class="back-button">&larr; Volver</a>
    <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= esc($product['id_producto']); ?></td>
                <td><?= esc($product['nombre']); ?></td>
                <td><?= esc($product['descripcion']); ?></td>
                <td><?= esc($product['precio']); ?></td>
                <td><?= esc($product['stock']); ?></td>
                <td><?= esc($product['descuento']); ?>%</td>
                <td><img src="<?= esc($product['imagen']); ?>" alt="<?= esc($product['nombre']); ?>" width="50"></td> <!-- Asegúrate de tener una columna imagen_url o similar en tu BD -->
                <td>
                <a href="<?= base_url("products/edit/" . esc($product['id_producto'])); ?>" class="edit">Editar</a>
                    <form method="post" action="<?= base_url('products/delete/' . esc($product['id_producto'])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                        <button type="submit" class="delete">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No hay productos disponibles.</td>
        </tr>
    <?php endif; ?>
</table>
</div> <!-- Cierre del div con clase container -->
<script>
    function confirmDelete(deleteUrl) {
        if(confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            window.location.href = deleteUrl;
        }
    }
</script>
</body>
</html>

