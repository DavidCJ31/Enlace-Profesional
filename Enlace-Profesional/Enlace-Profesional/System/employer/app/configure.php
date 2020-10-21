<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$id = $_POST['id'];

if(isset($_POST['deshabilitar'])){
    $estado = 'D';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("UPDATE tbl_companies SET estado=:enabled WHERE id = :id");
        $stmt->bindParam(':enabled', $estado);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //seleccionar los empleos de esta empresa
        $stmt1 = $conn->prepare("SELECT job_id from tbl_jobs WHERE company = :id");
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();
        $result = $stmt1->fetchAll();
        foreach($result as $row){
            $idd=$row['job_id'];
            $stmt2 = $conn->prepare("UPDATE tbl_jobs set status=:estado WHERE job_id = :id");
            $stmt2->bindParam(':estado', $estado);
            $stmt2->bindParam(':id', $idd);
            $stmt2->execute();
        }
        session_start();
        $_SESSION['logged'] = false;
        session_unset();
        session_destroy();
        header("location:../../login.php?r=2222");					  
    }catch(PDOException $e){
        echo $e;
    } 
}
if(isset($_POST['eliminar'])){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT job_id from tbl_jobs WHERE company = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            $idd=$row['job_id'];
            $stmt1 = $conn->prepare("SELECT id from tbl_job_applications WHERE job_id = :id");
            $stmt1->bindParam(':id', $idd);
            $stmt1->execute();
            $result1 = $stmt1->fetchAll();
            foreach($result1 as $row){
                $stmt2 = $conn->prepare("DELETE from tbl_job_applications WHERE id = :id");
                $stmt2->bindParam(':id', $row['id']);
                $stmt2->execute();
            }
            $stmt2 = $conn->prepare("DELETE from tbl_jobs WHERE job_id = :id");
            $stmt2->bindParam(':id', $idd);
            $stmt2->execute();
        }

        $stmt3 = $conn->prepare("DELETE from tbl_companies WHERE id = :id");
        $stmt3->bindParam(':id', $id);
        $stmt3->execute();

        //cerrar la sesion
        session_start();
        $_SESSION['logged'] = false;
        session_unset();
        session_destroy();
        header("location:../../login.php?r=2223");					  
    }catch(PDOException $e){
        echo $e;
    } 
}


	
?>