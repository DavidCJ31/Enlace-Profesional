<?php 
require '../constants/db_config.php';

    $id = $_POST['id'];
    $nombre = $_POST['nameVideo'];
    $enlace = $_POST['linkVideo'];
    $descripcion = $_POST['textDescrip'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("UPDATE tbl_tutorials SET video_name = :vname, video_link = :vlink, 
        video_description = :vdescription WHERE id = :id");
        $stmt->bindParam(':vname',$nombre);
        $stmt->bindParam(':vlink',$enlace);
        $stmt->bindParam(':vdescription',$descripcion);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
            header("location:../videosRegistrados.php?r=1234");
    }catch(PDOException $e){
        echo $e;
    }

?> 