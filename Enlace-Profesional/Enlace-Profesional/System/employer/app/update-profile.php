<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

$companame = $_POST['company'];
$enc =$_POST['encargado'];
$esta = $_POST['year'];
$type = ucwords($_POST['type']);
$people = $_POST['people'];
$web = $_POST['web'];
$city = $_POST['canton'];
$phone = $_POST['phone'];
$province = $_POST['province'];
$about = $_POST['background'];
$service = $_POST['services'];
$expertise = $_POST['expertise'];
$myemail = $_POST['email'];


    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE email = '$myemail' and id !='".$myid."'");
	$stmt->bindParam(':email', $myemail);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
    //echo $rec;
	
	if ($rec == "0") {
    $stmt = $conn->prepare("UPDATE tbl_companies SET first_name = :compname, in_charge = :encar, byear = :esta, title = :type, city = :city, province = :province, phone = :phone, about = :about, services = :service, expertise = :expertise, people = :people, website = :website WHERE id='$myid'");
    $stmt->bindParam(':compname', $companame);
    $stmt->bindParam(':encar', $enc);
    $stmt->bindParam(':esta', $esta);
	$stmt->bindParam(':type', $type);
    $stmt->bindParam(':city', $city);
	 $stmt->bindParam(':province', $province);
    // $stmt->bindParam(':zip', $zip);
	//$stmt->bindParam(':country', $country);
    $stmt->bindParam(':phone', $phone);
	$stmt->bindParam(':about', $about);
    $stmt->bindParam(':service', $service);
	$stmt->bindParam(':expertise', $expertise);
    $stmt->bindParam(':people', $people);
	$stmt->bindParam(':website', $web);
    $stmt->execute();
	
	$_SESSION['compname'] = $companame;
	$_SESSION['encargado'] = $enc;
	$_SESSION['established'] = $esta;
    $_SESSION['myemail'] = $myemail;
    $_SESSION['myphone'] = $phone;
	$_SESSION['comptype'] = $type;
	$_SESSION['mycity'] = $city;
	// $_SESSION['mystreet'] = $street;
	// $_SESSION['myzip'] = $zip;
    $_SESSION['myprovince'] = $province;
    $_SESSION['mydesc'] = $about;
	$_SESSION['myserv'] = $service;
	$_SESSION['myexp'] = $expertise;
	$_SESSION['website'] = $web;
	$_SESSION['people'] = $people;
	header("location:../?r=9837");	
	}else{
	header("location:../?r=0927");
	}

					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>


