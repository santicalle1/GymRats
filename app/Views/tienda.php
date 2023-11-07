<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GymRats</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/tienda.css'); ?>">
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


</head>
<?php 
include(APPPATH . 'view/header.php') 
?>

<body>
<CENTER><H1>PRODUCTOS EN OFERTA</H1></CENTER>
<div class="contenedor-productos">
<?php foreach ($productos as $producto): ?>
    <div class="card01">
        <img src="<?= base_url($producto['imagen']) ?>" alt="Imagen del Producto">
        <div class="content02">
            <h2 class="title03"><?= esc($producto['nombre']) ?></h2>
            <p class="description04"><?= esc($producto['descripcion']) ?></p>
            <p class="title03">Stock: <?= esc($producto['stock']) ?></p>
            <div class="price-container">
            <?php if($producto['descuento']): ?>
                <p class="red-text">Descuento: <?= $producto['descuento'] ?>%</p>
                <p class="red-text">Precio Original: $<?= $producto['precio'] ?></p>
                <p class="green-text">Precio Final: $<?= $producto['precio'] * (1 - ($producto['descuento'] / 100)) ?></p>
            <?php else: ?>
                <p>Precio: $<?= $producto['precio'] ?></p>
            <?php endif; ?>
            </div>
            <?php if (isset($producto['id_producto'])): ?>
    <form action="<?= base_url('/agregarAlCarrito') ?>" method="post" class="form-agregar">
        <input type="hidden" name="id_producto" value="<?= esc($producto['id_producto']) ?>">

        <div class="input-group">
            <label for="cantidad-<?= esc($producto['id_producto']) ?>">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad-<?= esc($producto['id_producto']) ?>" value="1" min="1" max="<?= esc($producto['stock']) ?>">
        </div>

        <button type="submit">
            Agregar al Carrito
        </button>
    </form>
<?php endif; ?>

        </div>
    </div>
<?php endforeach; ?>
</div>

<?php 
include(APPPATH . 'view/footer.php') 
?>
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous">
      // Agrega un evento de clic al botón Comprar Ahora
      document.getElementById('btn-comprar').addEventListener('click', function(event) {
        // Evita que el enlace se abra por defecto
        event.preventDefault();

        // Verifica si la variable de sesión user_id está definida en PHP
        // Si está definida, significa que el usuario está autenticado
        // Si no está definida, el usuario no está autenticado
        <?php if (isset($_SESSION['user_id'])) : ?>
          // El usuario está autenticado, redirige a la vista de tienda
          window.location.href = '<?= base_url("/tienda"); ?>';
        <?php else : ?>
          // El usuario no está autenticado, redirige a la página de inicio de sesión
          window.location.href = '<?= base_url("/login"); ?>';
        <?php endif; ?>
      });
    </script>


</body>
</html>
