<?php
require "../send_emails.php";

$correo = $_POST['mail'];
$mensaje = "<strong>Acceso denegado</strong><br/><br/>
La Universidad Nacional agradece su interés en el Servicio de Intermediación Laboral, sin embargo 
su acceso fue denegada. Le invitamos a revisar los términos de uso del servicio en el sitio web:
 <a class='fa fa-link' href='https://www.intermediacionlaboral.una.ac.cr'>www.intermediacionlaboral.una.ac.cr</a>. 
Si requiere mayor información puede contactar a las personas a cargo del servicio en los siguientes 
teléfonos: 2277-3018/2277-3776 o bien a este correo electrónico.";
$asunto = "Acceso Denegado";
$enviar = enviarCorreo($correo,$mensaje,$asunto);

$enviar;

?>