
<?php 
require '../constants/check-login.php';
require '../constants/db_config.php';
require "../../send_emails.php";

if(isset($_GET['idEm'])){
    $id = $_GET['idEm'];
    $motivoD = $_POST['motivoD'];
    $descripcion = $_POST['Ddenegacion'];
    //$correo = $_POST['email'];
    $correo = "davidcj31@gmail.com";
    $asunto = "Acceso Denegado";
    $mensaje = "<strong>Acceso denegado</strong><br/><br/>
    La Universidad Nacional agradece su interés en el Servicio de Intermediación Laboral, sin embargo 
    su acceso fue denegada. Le invitamos a revisar los términos de uso del servicio en el sitio web:
    <a class='fa fa-link' href='https://www.intermediacionlaboral.una.ac.cr'>www.intermediacionlaboral.una.ac.cr</a>. 
    Si requiere mayor información puede contactar a las personas a cargo del servicio en los siguientes 
    teléfonos: 2277-3018/2277-3776 o bien a este correo electrónico.";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmM = $conn->prepare("INSERT INTO tbl_denied_acces_companies(denied_by,motivo,motivo_explicacion,
        company_id,access_denied) VALUES (:user,:mot,:descr,:emId,'Si')");
        $stmM->bindParam(':mot',$motivoD);
        $stmM->bindParam(':descr',$descripcion);
        $stmM->bindParam(':emId', $id);
        $stmM->bindParam(':user',$myid);
        $stmt = $conn->prepare("UPDATE tbl_companies set estado='E' WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmM->execute();
        $stmt->execute();
        $enviarEmail = enviarCorreo($correo,$mensaje,$asunto);
        $enviarEmail;
        echo "Se envia el correo";
            header("location:../users.php?r=3700");
    }catch(PDOException $e){
echo $e;
    }
}
?> 