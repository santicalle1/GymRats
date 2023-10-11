<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Validación de correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("Dirección de correo electrónico no válida");
    }

    // Limpiar y preparar los datos para el correo
    $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

    // Aquí puedes agregar la lógica para enviar el correo electrónico
    $destinatario = 'correo_destino@example.com';
    $asunto = 'Nuevo mensaje de contacto';

    $cabeceras = 'From: ' . $correo . "\r\n";
    $cabeceras .= 'Reply-To: ' . $correo . "\r\n";
    $cabeceras .= 'X-Mailer: PHP/' . phpversion();

    $mensajeCorreo = "Nombre: $nombre\n";
    $mensajeCorreo .= "Correo: $correo\n";
    $mensajeCorreo .= "Mensaje:\n$mensaje";

    // Envía el correo
    if (mail($destinatario, $asunto, $mensajeCorreo, $cabeceras)) {
        // Redirige a una página de agradecimiento o muestra un mensaje de éxito.
        header('Location: gracias.php');
    } else {
        // Maneja errores, redirige a una página de error o muestra un mensaje de error.
        echo "Hubo un error al enviar el correo.";
    }
}
?>
