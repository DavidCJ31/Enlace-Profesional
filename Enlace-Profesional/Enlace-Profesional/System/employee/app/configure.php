<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$id = $_POST['id'];

if(isset($_POST['deshabilitar'])){
    $estado = 'D';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("UPDATE tbl_users SET estado=:estado WHERE id = :id");
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        session_start();
        $_SESSION['logged'] = false;
        session_unset();
        session_destroy();
        header("location:../../login-employee.php?r=2222");					  
    }catch(PDOException $e){
        echo $e;
    } 
}
if(isset($_POST['eliminar'])){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("DELETE from tbl_users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt1 = $conn->prepare("DELETE from tbl_experience WHERE user_id = :id");
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();

        $stmt2 = $conn->prepare("DELETE from tbl_job_applications WHERE user_id = :id");
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();

        $stmt3 = $conn->prepare("DELETE from tbl_language WHERE member_no = :id");
        $stmt3->bindParam(':id', $id);
        $stmt3->execute();

        $stmt4 = $conn->prepare("DELETE from tbl_other_attachments WHERE member_no = :id");
        $stmt4->bindParam(':id', $id);
        $stmt4->execute();

        $stmt5 = $conn->prepare("DELETE from tbl_professional_qualification WHERE member_no = :id");
        $stmt5->bindParam(':id', $id);
        $stmt5->execute();

        $stmt6 = $conn->prepare("DELETE from tbl_referees WHERE member_no = :id");
        $stmt6->bindParam(':id', $id);
        $stmt6->execute();

        $stmt7 = $conn->prepare("DELETE from tbl_titles WHERE user_id = :id");
        $stmt7->bindParam(':id', $id);
        $stmt7->execute();


        //cerrar la sesion
        session_start();
        $_SESSION['logged'] = false;
        session_unset();
        session_destroy();
        header("location:../../login-employee.php?r=2223");					  
    }catch(PDOException $e){
        echo $e;
    } 
}


	
?>