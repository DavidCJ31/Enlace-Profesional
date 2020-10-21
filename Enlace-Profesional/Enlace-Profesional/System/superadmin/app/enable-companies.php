<?php 
require '../constants/db_config.php';
require "../../send_emails.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $correo = $_POST['email'];
    $mensaje = "<strong>Acceso aprobado</strong><br />
    <br /> La Universidad Nacional le da la más cordial bienvenida al 
    Servicio de Intermediación Laboral, a través de este podrá obtener los 
    siguientes beneficios:<br /><br /> 
    &emsp;&emsp;<strong>·</strong>  &emsp; Acceso gratuito a bases de datos de personas oferentes.<br />
    &emsp;&emsp;<strong>·</strong>  &emsp; Exposición gratuita de la imagen de la organización en el sitio web.<br />
    &emsp;&emsp;<strong>·</strong>  &emsp; Asesoramiento sobre la contratación de personas con discapacidad.<br />
    &emsp;&emsp;<strong>·</strong>  &emsp; Asesoramiento sobre los perfiles ocupacionales de las carreras ofertas.<br />
    &emsp;&emsp;<strong>·</strong>  &emsp; Divulgación mensual sobre cursos de actualización profesional ofertados por la universidad (con posibles descuentos para las organizaciones inscritas al servicio). <br/>
    &emsp;&emsp;<strong>·</strong>  &emsp; Oportunidad de realimentar nuestra oferta académica.<br/>
    <br/> <br/>
    Si requiere mayor información del servicio, puede contactarnos en los siguientes teléfonos: 2277-3018/2277-3776 o bien a este correo electrónico.";
    $asunto = "Acceso Aprobado";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("UPDATE tbl_companies set estado='S' WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $stmt2 = $conn->prepare("SELECT * FROM tbl_denied_acces_companies WHERE company_id = :id AND access_denied = 'Si'");
        $stmt2->bindParam(':id',$id);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
            foreach($result2 as $row){
                $stmt3 = $conn->prepare("UPDATE tbl_denied_acces_companies set access_denied = 'No' WHERE id = :dId");
                $idbc = $row['id'];
                $stmt3->bindParam(':dId',$idbc);
                $stmt3->execute();
            }
        $enviarEmail = enviarCorreo($correo,$mensaje,$asunto);
        $enviarEmail;
        header("location:../users.php?r=3698");
    }catch(PDOException $e){
echo $e;
    }
}
?> 