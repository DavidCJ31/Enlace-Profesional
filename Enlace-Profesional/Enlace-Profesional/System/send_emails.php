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
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                //$mail->Username   = 'enlaceprofesional@una.cr';                     // SMTP username
                $mail->Username   = 'davidcj31@gmail.com';                     // SMTP username
                $mail->Password   = 'davidcj96';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to
                $mail->SMTPOptions = array(

                    'ssl' => array(
                    
                        'verify_peer' => false,
                    
                        'verify_peer_name' => false,
                    
                        'allow_self_signed' => true
                    
                    ));
                //Recipients
                $mail->setFrom('davidcj31@gmail.com', 'Enlace Profesional UNA Grande');
                $mail->addAddress('davidcj31@gmail.com', 'David Cordero');     // Add a recipient
                //$mail->addAddress($correo); // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                // $mail->AltBody = 'Esta vivo jajajaja';

                $mail->send();
                echo "<script> alert('ALHOS') </script>";
                echo "TODO BIEN TODO CORRECTO";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            echo "No se envio ninguna direccion de correo a la cual enviar un mensaje";
        }
    
    }

?>