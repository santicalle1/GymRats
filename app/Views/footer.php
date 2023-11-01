<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/footer.css'); ?>">
    <!-- <script src="openpgp.min.js" type="text/javascript"></script> -->

</head>
<body>
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
            <p>En esta pagina encontraras los mejores productos relacionado al fitness</p>
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



    <!-- conteiner contact form -->
    <div class="form-container">
    <form id="contact-form" method="post" action="<?= site_url('mensajes/guardarMensaje'); ?>">
        <label for="email">Email</label>
        <input type="text" required name="email" class="input-field">

        <label for="subject">Motivo</label>
        <input type="text" required name="subject" class="input-field">

        <label for="message">Mensaje</label>
        <textarea id="message" required name="message" class="input-field"></textarea>

        <input type="submit" class="submit-button" value="Enviar">
    </form>
    <?php if (session()->has('success')): ?>
    <div class="success-message">
        <?= session('success') ?>
    </div>
<?php endif; ?>


        <button id="scrollToTopButton" onclick="scrollToTop()">Ir Arriba</button>
        <link rel="stylesheet" href="public/css/contact.css">
        <script>
// Espera a que el contenido del DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Obtiene una referencia al botón "Ir Arriba"
    var btnSubir = document.getElementById("scrollToTopButton");

    // Agrega un controlador de eventos al botón
    if (btnSubir) {
        btnSubir.addEventListener("click", function () {
            scrollToTop();
        });
    }

    // Función para desplazamiento suave
    function scrollToTop() {
        var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        var scrollSpeed = 10;

        function smoothScroll() {
            if (currentScroll > 0) {
                window.scrollBy(0, -scrollSpeed);
                currentScroll -= scrollSpeed;
                setTimeout(smoothScroll, 10);
            }
        }

        smoothScroll();
    }
});
</script>


        
        <!-- your PGP public key -->
        <div id="pubkey" style="display: none;">
            -----BEGIN PGP PUBLIC KEY BLOCK-----
            
            -----END PGP PUBLIC KEY BLOCK-----
        </div>
    </div>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.crypto && window.crypto.getRandomValues) {
                var message = document.getElementById("message");
                document.forms[0].addEventListener("submit", function (evt) {
                    evt.preventDefault();
                    if (form.elements['message'].value === '') {
                        alert('Please enter a message!');
                    } else {
                        encrypt(message.value).then(function (encrypted_msg) {
                            form.elements['message'].value = encrypted_msg;
                            form.submit();
                        });
                        return true;
                    }
                });
            } else {
                document.getElementById("button").disabled = true;
                window.alert("Error: Browser not supported\nReason: We need a cryptographically secure PRNG to be implemented (i.e. the window.crypto method)\nSolution: Use Chrome >= 11, Safari >= 3.1, Firefox >= 21, Opera >= 15 or IE >= 11.");
                return false;
            }
        });

        function encrypt(msg) {
            if (msg.indexOf("-----BEGIN PGP MESSAGE-----") !== -1 && msg.indexOf("-----END PGP MESSAGE-----") !== -1) {
                return msg;
            } else {
                var key = document.getElementById("pubkey").innerHTML;
                var publicKey = openpgp.key.readArmored(key).keys[0];
                return openpgp.encryptMessage(publicKey, msg).then(function (pgpMessage) {
                    return pgpMessage;
                });
            }
        }
    </script> -->
    <a class="login-buton1" href="<?= base_url("/terminos"); ?>">Terminos Y Condiciones</a>
    <small>&copy; 2023 <b>GymRats</b> - Todos los Derechos Reservados.</small>
    </div>
    </footer>
</body>
</html>
