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

</head>

<body>
<link rel="stylesheet" href="css/body.css">
<?php
        $session = session();
        $usuario = $session->get('usuario');
        ?>
      </div>
    </div>
    </div>
  <div class="dj-banner">
    <div class="dj-bg">
      <img src="img/creatina.png" alt="" height="400px">
      <div class="dj-text">
        <h1><b>Creatina</b></h1>
        <p>Creatina 100% Pura y Nutritiva</p>
        <a href="<?= base_url("/Redireccion/tienda"); ?>" class="btn-comprar" id="btn-comprar">Compra Ahora</a>
      </div>
    </div>
  </div>
  </a></p>
  <div class="profesores-container">
    <div class="profesores-list">
        <div class="profesor">
            <img src="img/p1.jpg" alt="Profesor 1">
            <p>Rodrigo Mendoza</p>
        </div>
        <div class="profesor">
            <img src="img/p2.jpg" alt="Profesor 2">
            <p>Valeria González</p>
        </div>
        <div class="profesor">
            <img src="img/p3.jpg" alt="Profesor 3">
            <p>Martín Vidal</p>
        </div>
        <div class="profesor">
            <img src="img/p4.avif" alt="Profesor 4">
            <p>Alejandro Sánchez</p>
        </div>
    </div>
    <div class="profesores-info">
        <h1><b>Nuestros Profesores</b></h1>
        <p>Conoce a nuestros entrenadores profesionales.</p>
        <a href="<?= base_url("/Redireccion/profesores"); ?>" class="btn-comprar" id="btn-conoce">Conócelos</a>
    </div>
</div>



  </div>
  </div>
  </div>


  <main class="main-content">
    <section class="container container-features">
      <div class="card-feature">
        <i class="fa-solid fa-plane-up"></i>
        <div class="feature-content">
          <span>Envío gratuito a todo el pais</span>
          <p>En pedido superior a $1000</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-wallet"></i>
        <div class="feature-content">
          <span>Contrareembolso</span>
          <p>100% garantía de devolución de dinero</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-gift"></i>
        <div class="feature-content">
          <span>Tarjeta regalo especial</span>
          <p>Ofrece bonos especiales con regalo</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-headset"></i>
        <div class="feature-content">
          <span>Servicio al cliente 24/7</span>
          <p>LLámenos 24/7 al 123-456-7890</p>
        </div>
      </div>
    </section>
    <footer>
    <?php
      include(APPPATH . 'views/footer.php');
    ?>
    <?php
      include(APPPATH . 'views/contact.php');
    ?>
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