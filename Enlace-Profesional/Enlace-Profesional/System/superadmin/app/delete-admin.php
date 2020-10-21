<?php 
require '../constants/db_config.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("DELETE from tbl_admin WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
            header("location:../users.php?r=7070");
    }catch(PDOException $e){
echo $e;
    }
}
?> 