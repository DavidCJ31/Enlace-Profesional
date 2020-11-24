<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once '../../../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions

function enviarCorreo($correo,$mensaje,$asunto){  
    if($correo!='' && $mensaje!='' && $asunto!=''){
        $mail = new PHPMailer(true);
            $correo_destino = $correo;
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'enlaceprofesional@una.cr';                     // SMTP username
                $mail->Password   = 'enlaceprofesional2020';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom('enlaceprofesional@una.cr', 'Enlace Profesional');
                // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                // Attachments
                $mail->addAddress($correo_destino);
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            echo "No se envio ninguna direccion de correo a la cual enviar un mensaje";
        }
    
    }

?>