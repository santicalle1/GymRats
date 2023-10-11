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

<style>
    /* Estilos generales */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Estilos generales para el header */
    header {
      background-color: #1abc9c;
      color: #fff;
      padding: 10px 0;
      justify-content: center;
      align-items: center;
    }

    /* Estilos para la clase container-user */
    .container-user {
      display: flex;
      /* Hace que los elementos sean flexibles */
      align-items: center;
      /* Centra verticalmente los elementos */
      gap: 20px;
      /* Agrega espacio entre los elementos */
    }

    /* Estilos para los íconos de usuario y carrito */
    .container-user i {
      font-size: 24px;
      color: #fff;
    }

    .logo {
      max-width: 700px;
      /* Establece el ancho máximo del logo */
      max-height: 130px;
      /* Establece la altura máxima del logo */
      margin: 0;
    }


    /* Estilos para el botón de iniciar sesión */
    .login-button {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }

    /* Estilos para el contenedor principal del header */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    /* Estilos para el logo y elementos a la izquierda */
    .left-section {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .container-logo1 {
      text-decoration: none;
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      max-width: 100px;
      width: 100%;
      justify-content: center;
    } 
    .container-logo a {
      text-decoration: none;
      display: flex;
      align-items: center;  /* alinea verticalmente al centro */
      justify-content: center;  /* alinea horizontalmente al centro */
      color: #fff;
      font-size: 24px;
      font-weight: bold;
      max-width: 100px;
      width: 100%;
      justify-content: center;     
    }


    /* Estilos para la barra de navegación */
    .container-navbar {
      background-color: #1abc9c;
      /* Color de fondo verde agua para la barra de navegación */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 18px 0;
    }

    /* Estilos para la lista de navegación */
    .menu {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 20px;
  justify-content: center; /* Centra horizontalmente los elementos */
  align-items: center; /* Centra verticalmente los elementos */
}

.menu li {
  display: inline;
}

.menu li a {
  text-decoration: none;
  color: #fff;
  font-weight: bold;
}

    /* Estilos para la sección de enlaces secundarios */
    .right-section {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .login-button {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      margin-left: 100px;
    }
    .iniciar-button {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      margin-left: 600px;
    }
    .panel-button {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }

    /* Estilos para dispositivos móviles */
    @media screen and (max-width: 768px) {
      .container {
        padding: 0 10px;
      }

      .menu {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .menu li {
        margin-bottom: 10px;
      }

      .right-section {
        justify-content: flex-end;
        flex-grow: 1;
      }

      .container-logo {
        justify-content: center;
      }
    }

    /* Estilo personalizado para el botón de búsqueda */
    .btn-search {
      background-color: transparent;
      border: 2px solid #1abc9c;
      border-radius: 3px;
      padding: 12px 20px;
      /* Aumentamos el tamaño del recuadro de búsqueda */
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Estilo para el ícono de lupa dentro del botón */
    .btn-search i {
      color: #000;
      /* Color negro para el ícono de lupa */
      font-size: 24px;
      /* Tamaño del ícono */
      margin-right: 10px;
      /* Espacio entre el ícono y el texto */
    }

    .btn-search span {
      color: #1abc9c;
      /* Color verde agua para el texto del botón */
      font-weight: bold;
    }

    .btn-search:hover {
      background-color: #1abc9c;
      color: #fff;
    }

    .dj-banner {
    margin-top: -20px;  /* Disminuye el margen superior */
    margin-right: 0px;
    position: relative;
}

    .dj-banner .dj-bg {
      background-image: url(/images/bg-img-banner.png);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      width: 100%;
      background-color:#000;
    }

    .dj-banner .dj-bg img {
      display: block;
      margin: 20px auto;
      padding: 20px 0;
    }

    .dj-banner .dj-text {
      text-align: center;
      padding-bottom: 20px;
    }

    @media screen and (min-width:768px) {
      .dj-banner .dj-bg img {
        margin-right: 100px;
      }

      .dj-banner .dj-text {
        position: absolute;
        top: 50%;
        left: 10%;
        transform: translate(-10%, -50%);
        width: 50%;
        text-align: left;
        color: #FFFFFF;
      }

      .dj-banner .dj-text h1 {
        font-size: calc(2*1.5vw);
      }

      .dj-banner .dj-text p {
        font-size: calc(1.2*1.5vw);
      }
    }

    .btn-comprar {
      display: inline-block;
      padding: 10px 0;
      /* Añade espacio adicional arriba y abajo */
      background-color: #ce2032;
      border: 2px solid #ce2032;
      border-radius: 5px;
      color: white;
      width: 152px;
      text-align: center;
      font-size: 16px;
      line-height: 24px;
      /* Ajusta la altura del botón */
      text-decoration: none;
    }


    /* Estilos para la sección de características */
    .container-features {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 40px;
    }

    .card-feature {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-feature i {
      font-size: 48px;
      color: #1abc9c;
    }

    .card-feature span {
      font-size: 20px;
      font-weight: bold;
      margin-top: 10px;
    }

    .card-feature p {
      font-size: 16px;
      color: #777;
    }

    /* Estilos para la sección de mejores categorías */
    .top-categories {
      margin-top: 40px;
    }

    .container-categories {
      display: flex;
      gap: 20px;
      justify-content: center;
      margin-top: 20px;
    }

    .card-category {
      background-color: #fff;
      text-align: center;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .card-category:hover {
      transform: translateY(-5px);
    }

    .card-category p {
      font-size: 24px;
      font-weight: bold;
      margin: 10px 0;
    }

    .card-category span {
      font-size: 18px;
      color: #1abc9c;
    }

    /* Estilos para la sección de mejores productos */
    .top-products {
      margin-top: 40px;
    }

    .container-options {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .container-options span {
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s;
    }

    .container-options span.active {
      color: #1abc9c;
    }

    .container-products {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .card-product {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container-img img {
      max-width: 100%;
      height: auto;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .discount {
      background-color: #e74c3c;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 5px 10px;
      border-radius: 3px;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      padding: 0 10px;
    }

    .button-group span {
      cursor: pointer;
      font-size: 20px;
      color: #333;
      transition: color 0.3s;
    }

    .button-group span:hover {
      color: #1abc9c;
    }

    .content-card-product {
      padding: 20px;
      text-align: center;
    }

    .stars i {
      font-size: 24px;
      color: #f1c40f;
      margin: 5px;
    }

    h3 {
      font-size: 24px;
      font-weight: bold;
      margin: 10px 0;
    }

    .add-cart i {
      font-size: 24px;
      color: #1abc9c;
      cursor: pointer;
      margin-top: 10px;
      transition: color 0.3s;
    }

    .add-cart i:hover {
      color: #149a7e;
    }

    /* Estilos para la sección de mejores productos (continuación) */
    .price {
      font-size: 24px;
      font-weight: bold;
      margin-top: 10px;
    }

    .price span {
      font-size: 18px;
      color: #777;
      text-decoration: line-through;
      margin-left: 10px;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Open Sans', sans-serif;
    }

    /*:::::Pie de Pagina*/
    .pie-pagina {
      width: 100%;
      background-color: #0a141d;
    }

    .pie-pagina .grupo-1 {
      width: 100%;
      max-width: 1200px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 50px;
      padding: 45px 0px;
    }

    .pie-pagina .grupo-1 .box figure {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pie-pagina .grupo-1 .box figure img {
      width: 250px;
    }

    .pie-pagina .grupo-1 .box h2 {
      color: #fff;
      margin-bottom: 25px;
      font-size: 20px;
    }

    .pie-pagina .grupo-1 .box p {
      color: #efefef;
      margin-bottom: 10px;
    }

    .pie-pagina .grupo-1 .red-social a {
      display: inline-block;
      text-decoration: none;
      width: 45px;
      height: 45px;
      line-height: 45px;
      color: #fff;
      margin-right: 10px;
      background-color: #0d2033;
      text-align: center;
      transition: all 300ms ease;
    }

    .pie-pagina .grupo-1 .red-social a:hover {
      color: aqua;
    }

    .pie-pagina .grupo-2 {
      background-color: #0a1a2a;
      padding: 15px 10px;
      text-align: center;
      color: #fff;
    }

    .pie-pagina .grupo-2 small {
      font-size: 15px;
    }

    @media screen and (max-width:800px) {
      .pie-pagina .grupo-1 {
        width: 90%;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 30px;
        padding: 35px 0px;
      }
    }

    /* Estilos para el formulario de contacto */
    .contacto {
      margin-top: 20px;
      padding: 20px;
      background-color: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .contacto h2 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .contacto form {
      display: flex;
      flex-direction: column;
    }

    .contacto input[type="text"],
    .contacto input[type="email"],
    .contacto textarea {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .contacto button[type="submit"] {
      background-color: #1abc9c;
      color: #fff;
      font-size: 16px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .contacto button[type="submit"]:hover {
      background-color: #149a7e;
    }
.container1 {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    justify-content: center; /* Centra verticalmente */
  align-items: center; /* Centra horizontalmente */
}

.link {
  color: #000;
  text-decoration: none;
  font-size: 1rem;
  padding: 0.5rem;
  margin-top: 1rem;
}
.saludo, .bienvenida {
  border: 0;
  font-size: 1.2rem;
  color: #333;
  padding: 1rem;
  text-align: center;
  border: 0;
  justify-content: center;
  margin: 0; /* Quitar el margin-top para no desplazar el saludo hacia abajo */
}





.link:hover {
    text-decoration: underline;
}
/* Estilo general */
.login-button {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #1abc9c; /* Color de fondo verde para el botón */
    color: #fff;
    cursor: pointer;
    position: relative;
}

/* Estilo del contenedor */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Estilo del contenido desplegable */
.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color:#1abc9c; /* Fondo claro verde para el menú desplegable */
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: 90px;
}

.dropdown-content a {
    color: #C8E6C9; /* Color de texto verde oscuro para los enlaces */
    padding: 14px 20px;
    text-decoration: none;
    display: block;
    
}

/* Muestra el menú desplegable al pasar el ratón por encima */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Cambia el color de fondo del enlace al pasar el ratón por encima */
.dropdown-content a:hover {
    background-color: #000080; /* Color de fondo más claro al pasar el ratón por encima */
}
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




</style>
</head>

<body>

  <header>
    <div class="container-hero">
      <div class="container hero">

        <header>
          <div class="container-hero">
            <div class="container hero">
              <!-- Logo -->
              <div class="container-logo1">
                <a href="<?= base_url(); ?>">
                  <img src="img/logo.png" alt="GymRats Logo" class="logo">
                </a>
              </div>
            </div>
          </div>
        </header>

        <!-- Logo -->
        <div class="container-logo">
          <h1 class=""><a href="<?= base_url(); ?>">GymRats</a></h1>
        </div>

        <a class="panel-button" href="<?= base_url("/Redireccion/panel"); ?>">Mi Cuenta</a>

      </div>
    </div>
    </div>

    <div class="container-navbar">
      <nav class="navbar container">
        <!-- <i class="fa-solid fa-bars"></i> -->

        <ul class="menu">
    <a class="login-button" href="<?= base_url("/inicio"); ?>">Inicio</a>
    <div class="dropdown">
        <a class="login-button" href="<?= base_url("/Redireccion/tienda"); ?>">Tienda</a>
        <div class="dropdown-content">
            <!-- Puedes añadir los enlaces que desees aquí -->
            <a href="<?= base_url("/Redireccion/producto1"); ?>">Suplementos</a>
            <a href="<?= base_url("/Redireccion/producto2"); ?>">Objetos de Gimnasio</a>
            <a href="<?= base_url("/Redireccion/producto3"); ?>">Merchandising</a>
        </div>
    </div>
    <a class="login-button" href="<?= base_url("/terminos"); ?>">Terminos Y Condiciones</a>
    <a class="login-button" href="<?= base_url("/carrito"); ?>">Carrito</a>
  </ul>
      </nav>
    </div>
  <script src="script.js"></script>

  </div>
  </div>
  </div>
  </div>
<!-- Tarjeta de producto -->
<!-- Tarjeta de producto -->
<CENTER><H1>PRODUCTOS EN OFERTA</H1></CENTER>
<div class="contenedor-productos">
    <?php foreach ($productos as $producto): ?>
        <div class="card01">
            <img src="<?= base_url($producto['imagen']) ?>" alt="Imagen del Producto">
            <div class="content02">
                <h2 class="title03"><?= esc($producto['nombre']) ?></h2>
                <p class="description04"><?= esc($producto['descripcion']) ?></p>
                <div class="price-container">
                    <!-- Puedes agregar lógica aquí si tienes un precio original tachado, de lo contrario, solo muestra el precio. -->
                    <p class="new-price">$<?= esc($producto['precio']) ?></p> 
                </div>
                <button class="btn05">Agregar al carrito</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    <footer class="pie-pagina">
      <div class="grupo-1">
        <div class="box">
          <figure>
            <a href="#">
              <img src="img/logo.png" alt="Logo de GymRats">
            </a>
          </figure>
        </div>
        <div class="box">
          <h2>SOBRE NOSOTROS</h2>
          <p>GymRats es una web apta para cualquier Fitness</p>
          <p>En esta pagina encontraras los mejores productos relacionado con el gimnasio</p>
        </div>
        <div class="box">
          <h2>SIGUENOS</h2>
          <div class="red-social">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
          </div>
        </div>
      </div>
    </div>
</div>


        <small>&copy; 2023 <b>GymRats</b> - Todos los Derechos Reservados.</small>
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
