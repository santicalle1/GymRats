<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GymRats</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/body.css'); ?>">
  </head>
  
    <?php
      require('header.php');
    ?>


<body>
<?php
        $session = session();
        $usuario = $session->get('usuario');
        ?>
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
  </div>
    <div class="profesores-info">
        <h1><b>Nuestros Profesores</b></h1>
        <p>Conoce a nuestros entrenadores profesionales.</p>
        <a href="<?= base_url("/Redireccion/profesores"); ?>" class="btn-comprar" id="btn-conoce">Conócelos</a>
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
      include('footer.php');
    ?>
    </footer>
</body>

</html>