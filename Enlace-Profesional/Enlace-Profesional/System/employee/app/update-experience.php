<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$institution = ucwords($_POST['institucion']);

if (isset($_POST['supervisor'])) {
$supervisor = ucwords($_POST['supervisor']);	
}else{
$supervisor = null;	
}

if (isset($_POST['telefono'])) {
$telphone = $_POST['telefono'];	
}else{
$telphone = null;	
}

$jobtitle = ucwords($_POST['titulo']);
$startdate = ucwords($_POST['fechaInicio']);

if (isset($_POST['actualidad'])) {
    $enddate= NULL;	
    $act = 'S';
    }else{
    $enddate = ucwords($_POST['fechaFin']);
    $act = 'N';
    }
if (isset($_POST['cargos'])) {
$duties = $_POST['cargos'];	
}else{
$duties = "";	
}

$expid = $_POST['idExperiencia'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_experience SET title=:title, institution=:institution, supervisor = :supervisor, supervisor_phone = :telphone, start_date =  :startdate, end_date = :enddate, actualidad = :act WHERE id=:expid AND user_id = '$myid'");
$stmt->bindParam(':title', $jobtitle);
$stmt->bindParam(':institution', $institution);
$stmt->bindParam(':supervisor', $supervisor);
$stmt->bindParam(':telphone', $telphone);
$stmt->bindParam(':startdate', $startdate);
$stmt->bindParam(':enddate', $enddate);
$stmt->bindParam(':act', $act);
$stmt->bindParam(':expid', $expid);

$stmt->execute();
header("location:../experience.php?r=9215");					  
}catch(PDOException $e)
{
echo $e;
}


?>