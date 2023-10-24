<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <script src="openpgp.min.js" type="text/javascript"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.crypto && window.crypto.getRandomValues) {
                // form ready
                var message = document.getElementById("message");
                // encrypt on submit
                console.log(document.forms);
                document.forms[0].addEventListener("submit", function (evt) {
                    evt.preventDefault();
                    if (form.elements['message'].value == '') {
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
                // not ready
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
    <div class="form-container">
    <form id="form" method="post" action="send_form.php">
        <table width="800px">
            <tr>
                <td valign="top">
                    <label for="email">Your Email</label>
                </td>
                <td valign="top">
                    <input type="text" name="email" style="height:20px;widht: 800px;">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="subject">Subject</label>
                </td>
                <td valign="top">
                    <input type="text" name="subject" style="height:20px;widht: 800px;">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="message">Message</label>
                </td>
                <td valign="top">
                    <textarea id="message" name="message" style="height:150px;width: 800px;;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit">
                </td>
            </tr>
        </table>
    </form>

    <!-- your pgp public key -->

    <div id="pubkey" hidden="true">
        -----BEGIN PGP PUBLIC KEY BLOCK-----

        -----END PGP PUBLIC KEY BLOCK-----
    </div>

</body>

</html>