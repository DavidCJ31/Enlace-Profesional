<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$language = ucwords($_POST['language']);
$nativo=$_POST['nativo'];
$lev = ucwords($_POST['levelN']);

// if(isset($_POST['level'])){
//     $level = $_POST['level'];
//     try {
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            
//         $stmt = $conn->prepare("INSERT INTO tbl_language (member_no, language, speak, reading, writing,level) VALUES (:member, :language, :speak, :reading, :writing,:lev)");
//         $stmt->bindParam(':member', $myid);
//         $stmt->bindParam(':language', $language);
//         $stmt->bindParam(':speak', $speak);
//         $stmt->bindParam(':reading', $read);
//         $stmt->bindParam(':writing', $write);
//         $stmt->bindParam(':lev', $level);
//         $stmt->execute();
//          header("location:../language.php?r=9367");					  
//         }catch(PDOException $e)
//         {
//             echo $e;
        
//         }
//}else{
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    $stmt = $conn->prepare("INSERT INTO tbl_language (member_no, language, level, nativo) VALUES (:member, :language, :lev, :nativo)");
    $stmt->bindParam(':member', $myid);
    $stmt->bindParam(':language', $language);
    $stmt->bindParam(':lev', $lev);
    $stmt->bindParam(':nativo', $nativo);
    $stmt->execute();
    header("location:../language.php?r=9367");					  
    }catch(PDOException $e)
    {
        echo $e;
    }
	
//}
?>