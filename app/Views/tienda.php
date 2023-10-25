<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GymRats</title>
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
  <?php
  include(APPPATH . 'views/header.php');
  ?>
  <style>
/* Estilos de la tarjeta de producto */
.card01 {
    width: 250px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background-color: #FFF; /* Cambio de color a celeste */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card01 img {
    width: 100%;
    height: auto;
}

.content02 {
    padding: 15px;
}

.title03 {
    font-size: 18px;
    margin-bottom: 10px;
    color: black; /* Cambiar el color del título a negro */
}

.description04 {
    color: #777;
    margin-bottom: 15px;
}
.original-price {
    color: red; /* Mantiene el color rojo */
    text-decoration: line-through; /* Tacha el texto */
}

.new-price {
    color: red; /* Cambiar el color de los precios a rojo */
}

.btn05 {
    display: block;
    width: 100%;
    padding: 10px 15px;
    text-align: center;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn05:hover {
    background-color: #0056b3;
}
.contenedor-productos {
    display: flex;
    flex-wrap: wrap;  /* Permite que las tarjetas pasen a la siguiente fila si no hay espacio */
    gap: 20px;  /* Espacio entre tarjetas */
    justify-content: space-between;  /* Distribuye las tarjetas uniformemente */
}

.card01 {
    max-width: calc(50% - 10px);  /* Asume que quieres 2 tarjetas por fila. El cálculo considera el gap. */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Esto es opcional, solo para darle un toque visual */
    box-sizing: border-box;  /* Asegura que el padding y el borde no aumenten el tamaño total de la tarjeta */
}


.red-text {
    color: red;
    text-decoration: line-through; /* Tacha el texto */
}

.green-text {
    color: green;
}


</style>
</head>

<body>
  <section>
<!-- Tarjeta de producto -->
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
            <a href="<?= base_url('/agregarAlCarrito/' . $producto['id_producto']) ?>" class="btn05">Agregar al carrito</a>

        </div>
    </div>
<?php endforeach; ?>
</section>
<?php
include(APPPATH . 'views/footer.php');
?>
      </div>
    </footer>
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
