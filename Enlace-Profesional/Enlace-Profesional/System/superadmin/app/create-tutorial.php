<?php 
require '../constants/db_config.php';

    $nombre = $_POST['nameVideo'];
    $enlace = $_POST['linkVideo'];
    $descripcion = $_POST['textDescrip'];
    $categoria = $_POST['categoria'];
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
        $stmt = $conn->prepare("INSERT INTO tbl_tutorials(video_name,video_link,video_description,categoria) 
        VALUES(:vname,:vlink,:vdescription,:categoria)");
        $stmt->bindParam(':vname',$nombre);
        $stmt->bindParam(':vlink',$enlace);
        $stmt->bindParam(':vdescription',$descripcion);
        $stmt->bindParam(':categoria',$categoria);
        $stmt->execute();
            header("location:../videosRegistrados.php?r=1405");
    }catch(PDOException $e){
        echo $e;
    }

?> 