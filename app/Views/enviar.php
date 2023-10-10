<?php

// Este archivo es enviar.php

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoge los datos enviados desde el formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje_usuario = $_POST['mensaje'];

    // Definir tu correo electrónico y otros detalles para el envío
    $destinatario = "tucorreo@ejemplo.com";  // Cambia esto por tu dirección de correo
    $asunto = "Consulta de $nombre";

    // Construir el cuerpo del mensaje
    $cuerpo = "Recibiste un nuevo mensaje desde el formulario de contacto.\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Correo: $correo\n\n";
    $cuerpo .= "Mensaje:\n$mensaje_usuario";

    // Enviar el correo
    $headers = "From: $correo";  // Esto hará que el correo parezca enviado desde el correo del remitente
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}

?>
