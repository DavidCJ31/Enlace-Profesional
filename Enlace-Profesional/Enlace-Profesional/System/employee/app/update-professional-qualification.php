<?php
include '../../constants/db_config.php';
include '../constants/check-login.php';

if(isset($_POST['editar'])){

    $country = $_POST['country'];
    $institution = ucwords($_POST['institution']);
    $course = ucwords($_POST['course']);
    $timeframe = $_POST['timeframe'];
    $id = $_POST['courseid'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(file_exists($_FILES['certificate']['tmp_name']) || is_uploaded_file($_FILES['certificate']['tmp_name'])){

        if ($_FILES["certificate"]["size"] > 1000000) {
            header("location:../academic-certifications.php?r=2290");
        }else{
            try{
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
      
            if(move_uploaded_file($fileTmpName,$arch)){
                $stmt = $conn->prepare("UPDATE tbl_professional_qualification SET country= :country, institution = :institution, title = :course, timeframe = :timeframe, certificate = :cer  WHERE id='$id' AND member_no = '$myid'");
                $stmt->bindParam(':country', $country);
                $stmt->bindParam(':institution', $institution);
                $stmt->bindParam(':course', $course);
                $stmt->bindParam(':timeframe', $timeframe);
                $stmt->bindParam(':cer', $archivofisico);

                $stmt->execute();
               
                // echo "entre1";
                
                    header("location:../academic-certifications.php?r=6734");
                
            }      
                    
                	
            }catch(Exception $e){
                echo $e->getMessage();
                header("location:../academic-certifications.php?r=0011");
            }
        }
    }else{
        try {
            $sql = "UPDATE tbl_professional_qualification SET country = '$country', institution = '$institution', title = '$course', timeframe = '$timeframe' WHERE id='$id' AND member_no = '$myid'";
            if ($conn->query($sql) === TRUE) {
                // echo "entre2";
                header("location:../academic-certifications.php?r=6734");
            } else {
                // echo "no entre2";
                header("location:../academic-certifications.php?r=0011");
            }	
        }catch(Exception $e){
            echo $e;
        }
    }
}

?>