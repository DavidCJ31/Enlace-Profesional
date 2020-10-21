<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

if(strcmp($_POST['tipo'],'N')==0){
    $uni = $_POST['universidad'];
    $grado = $_POST['gradoAcademico'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $id = $_POST['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            
        $stmt = $conn->prepare("UPDATE tbl_titles SET education = :education, title = :title, university = :university, date = :date WHERE id= :id AND user_id = '$myid'");
        $stmt->bindParam(':education', $grado);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':university', $uni);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
                            
        header("location:../titles.php?r=2490");
                            
    }catch(PDOException $e)
    {
        echo $e;
    
    }




}
	
?>