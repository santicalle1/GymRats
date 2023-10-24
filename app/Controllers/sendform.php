<?php
$email_to = "your@mail.com";

if (isset($_POST['email'])) {

    function died($error)
    {
        echo "Sorry but there are error(s):<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and try again.<br /><br />";
        die();
    }

    if (!isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $email_from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    if (strlen($subject) < 1) {
        $error_message .= 'The Subject you entered does not appear to be valid.<br />';
    }
    if (strlen($message) < 1) {
        $error_message .= 'The Message you entered does not appear to be valid.<br />';
    }
    if (strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $header = 'Content-Type: text/plain; charset=UTF-8' . "\n" . 'From: ' . $email_from . "\n" . 'X-Mailer: PHP/' . phpversion();

    $message = str_replace("\r", "", $message);

    @mail($email_to, $subject, $message, $header);

    ?>
    Thank you for contacting us.
    <?php
}
?>