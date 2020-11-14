<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

/*
$country  = $_POST['country'];
$course = ucwords($_POST['course']);
$institution = ucwords($_POST['institution']);
$timeframe = ucwords($_POST['timeframe']);

$certificate = addslashes(file_get_contents($_FILES['certificate']['tmp_name']));

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "<script> alert('llego') </script>";
if(!isset($_FILES['certificate']['tmp_name']) || !is_uploaded_file($_FILES['certificate']['tmp_name'])){
    echo "entro1";
    try {
        $stmt = $conn->prepare("INSERT INTO tbl_professional_qualification (member_no, country, institution, title, timeframe, certificate) VALUES (:memberno, :country, :institution, :title, :timeframe,'$certificate')");
        $stmt->bindParam(':memberno', $myid);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':institution', $institution);
        $stmt->bindParam(':title', $course);
        $stmt->bindParam(':timeframe', $timeframe);
        $stmt->execute();
        echo "entro2";
        header("location:../academic-certifications.php?r=2305");
                          
        }catch(PDOException $e)
        {
            header("location:../academic-certifications.php?r=4568");
            echo "fallo1";
        }
    
}
else{
    $certificate = addslashes(file_get_contents($_FILES['certificate']['tmp_name']));
    if ($_FILES["certificate"]["size"] > 1000000) {
        header("location:../academic-certifications.php?r=2290");
        echo "entro3";
    }
    else {
        try {
        $ruta =$_SERVER['DOCUMENT_ROOT']."/Enlace-Profesional/System/".'certificates/';
        $fileName=$_FILES["certificate"]["name"];
        $fileSize=$_FILES["certificate"]["size"]/1024;
        $fileType=$_FILES["certificate"]["type"];
        $fileTmpName=$_FILES["certificate"]["tmp_name"];
        date_default_timezone_set('America/Costa_Rica');
        $today_date = date('d-m-Y-h-i');
        $newFileName=$today_date.$fileName;
        $arch = $ruta.$newFileName;
        $archivofisico = 'certificates/'.$newFileName;
        echo "entro4";
        if(move_uploaded_file($fileTmpName,$arch)){
            $stmt = $conn->prepare("INSERT INTO tbl_professional_qualification (member_no, country, institution, title, timeframe, certificate) VALUES (:memberno, :country, :institution, :title, :timeframe, :certificate)");
            $stmt->bindParam(':memberno', $myid);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':institution', $institution);
            $stmt->bindParam(':title', $course);
            $stmt->bindParam(':timeframe', $timeframe);
            $stmt->bindParam(':certificat', $certificate);
            $stmt->execute();
            echo "entro5";
            header("location:../academic-certifications.php?r=2305");
        }else{
            header("location:../academic-certifications.php?r=4568");
            echo "entro6";
        }                 
        } catch(PDOException $e){
            $e->getMessage();
            echo "fallo2";
        }
    }
    
    
}
*/


require '../../constants/db_config.php';
require '../constants/check-login.php';
$title = ucwords($_POST['title']);
//$issuer = ucwords($_POST['issuer']);
$certificate = addslashes(file_get_contents($_FILES['certificate']['tmp_name']));
$country  = $_POST['country'];
$course = ucwords($_POST['course']);
$institution = ucwords($_POST['institution']);
$timeframe = ucwords($_POST['timeframe']);

if ($_FILES["certificate"]["size"] > 1000000) {
header("location:../academic-certifications.php?r=2290");
}else{
	
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO tbl_professional_qualification (member_no, country, institution, title, timeframe, certificat) VALUES ('$myid', '$country','$institution',:title,'$timeframe','$certificate')");
$stmt->bindParam(':title', $title);
//$stmt->bindParam(':issuer', $issuer);
$stmt->execute();
header("location:../academic-certifications.php?r=6789");				  
}catch(PDOException $e)
{

}

	
}

?>