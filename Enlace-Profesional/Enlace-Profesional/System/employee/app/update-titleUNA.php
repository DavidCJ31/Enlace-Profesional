<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
if(isset($_POST['UNA-edit'])){
    $grado = $_POST['gradoA'];
    $title = $_POST['title'];
    $date = $_POST['dateU'];
    $id = $_POST['id'];
    $areaAcad = $_POST['areaAcad'];
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    $stmt = $conn->prepare("UPDATE tbl_titles SET education = :education, title = :title, education_area = :area, date = :dateU WHERE id= :id AND user_id = '$myid'");
    $stmt->bindParam(':education', $grado);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':area', $areaAcad);
    $stmt->bindParam(':dateU', $date);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
                        
    header("location:../titles.php?r=2490");
                        
    }catch(PDOException $e)
    {
        echo $e;
    }
}
?>