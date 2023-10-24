<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <script src="openpgp.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="form-container">
        <form id="contact" method="post" action="send_form.php">
            <label for="email">Email</label>
            <input type="text" name="email" class="input-field">
            
            <label for="subject">Motivo</label>
            <input type="text" name="subject" class="input-field">
            
            <label for="message">Mensaje</label>
            <textarea id="message" name="message" class="input-field"></textarea>
            
            <input type="submit" class="submit-button">
        </form>
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

    <script>
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
    </script>
</body>

</html>
