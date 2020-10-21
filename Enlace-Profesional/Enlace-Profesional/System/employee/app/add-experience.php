<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$institution = ucwords($_POST['institution']);

if (isset($_POST['supervisor'])) {
$supervisor = ucwords($_POST['supervisor']);	
}else{
$supervisor = "";	
}

if (isset($_POST['telphone'])) {
$telphone = $_POST['telphone'];	
}else{
$telphone = "";	
}

$jobtitle = ucwords($_POST['jobtitle']);
$startdate = $_POST['startdate'];

if (isset($_POST['actual'])) {
    $enddate = null;
    $act = $_POST['actual'];
    
    }else{
        $enddate = $_POST['enddate'];
        $act = 'N';	
    }


if (isset($_POST['duties'])) {
$duties = $_POST['duties'];	
}else{
$duties = "";	
}

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_experience (user_id, title, institution, supervisor, supervisor_phone, start_date, end_date, actualidad,duties) 
 VALUES ('$myid', :title, :institution, :supervisor, :supervisorphone, :startdate, :enddate, :act, :duties)");
$stmt->bindParam(':title', $jobtitle);
$stmt->bindParam(':institution', $institution);
$stmt->bindParam(':supervisor', $supervisor);
$stmt->bindParam(':supervisorphone', $telphone);
$stmt->bindParam(':startdate', $startdate);
$stmt->bindParam(':enddate', $enddate);
$stmt->bindParam(':act', $act);
$stmt->bindParam(':duties', $duties);
$stmt->execute();
header("location:../experience.php?r=9210");					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
	

?>