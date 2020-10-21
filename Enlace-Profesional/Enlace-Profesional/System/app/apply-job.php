<?php
require '../constants/settings.php';
$apply_date = date('m/d/Y');

session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];	
$myrole = $_SESSION['role'];
$opt = $_POST['opt'];

if ($myrole == "employee"){
include '../constants/db_config.php';

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_job_applications WHERE user_id = '$myid' AND job_id = :jobid");
	$stmt->bindParam(':jobid', $opt);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	if ($rec == 0) {
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("INSERT INTO tbl_job_applications (user_id, job_id, application_date)
    VALUES (:id, :jobid, :appdate)");
    $stmt->bindParam(':id', $myid);
    $stmt->bindParam(':jobid', $opt);
    $stmt->bindParam(':appdate', $apply_date);
    $stmt->execute();
	header("location:../employee/applied-jobs.php?r=2224");
					  
	}catch(PDOException $e)
    {
        echo $e;
    }
	
		
	}else{
        header("location:../employee/applied-jobs.php?r=2221");
		
	}


					  
	}catch(PDOException $e)
    {

    }
	
}}

?>