<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';


$mydate = $_POST['date'];
$mymonth = $_POST['month'];
$myyear = $_POST['year'];
$myemail = $_POST['email'];
// $edu = $_POST['education'];
// $title = $_POST['titulo'];
$city = $_POST['canton'];
$about = $_POST['about'];
$phone = $_POST['phone'];
// $area = $_POST['area'];
if(isset($_POST['disc'])){
	$discapacidad = $_POST['disc'];
	$tipoDiscapacidad = $_POST['tipoDiscapacidad'];
}else{
	$discapacidad = 'N';
	$tipoDiscapacidad = null;
}


$province = $_POST['province'];

//echo $mydate."<br>".$mymonth."<br>".$myyear."<br>".$myemail."<br>".$edu."<br>".$title."<br>".$city."<br>".$about."<br>".$phone;
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email AND id != '$myid'");
	$stmt->bindParam(':email', $myemail);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
    if ($rec == 0) {
    $stmt = $conn->prepare("UPDATE tbl_users SET discapacidad = :discapacidad, tipo_discapacidad = :tipoDisc, bdate = :bdate , bmonth = :bmonth , byear = :byear, email = :email,province = :province, city = :city, phone = :phone, about = :about WHERE id='$myid'");
    // $stmt->bindParam(':fname', $fname);
    // $stmt->bindParam(':lname', $lname);
	// $stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':discapacidad', $discapacidad);
	$stmt->bindParam(':tipoDisc', $tipoDiscapacidad);
	$stmt->bindParam(':bdate', $mydate);
	$stmt->bindParam(':bmonth', $mymonth);
	$stmt->bindParam(':byear', $myyear);
	$stmt->bindParam(':email', $myemail);
	// $stmt->bindParam(':area', $area);
	// $stmt->bindParam(':education', $edu);
	// $stmt->bindParam(':title', $title);
	$stmt->bindParam(':province', $province);
	$stmt->bindParam(':city', $city);
	// $stmt->bindParam(':street', $street);
	// $stmt->bindParam(':zip', $zip);
	//$stmt->bindParam(':country', $country);
	$stmt->bindParam(':phone', $phone);
	$stmt->bindParam(':about', $about);

    $stmt->execute();
	
	// $_SESSION['myfname'] = $fname;
	// $_SESSION['mylname'] = $lname;
    $_SESSION['myemail'] = $myemail;
	$_SESSION['mydate'] = $mydate;
	$_SESSION['mymonth'] = $mymonth;
	$_SESSION['myyear'] = $myyear;
    $_SESSION['myphone'] = $phone;
	// $_SESSION['myedu'] = $edu;
	// $_SESSION['mytitle'] = $title;
	$_SESSION['mycity'] = $city;
	// $_SESSION['myarea'] = $area;
	$_SESSION['mydisc'] = $discapacidad;
	$_SESSION['mytipoDisc']= $tipoDiscapacidad;

	// $_SESSION['mystreet'] = $street;
	// $_SESSION['myzip'] = $zip;
    $_SESSION['myprovince'] = $province;
    $_SESSION['mydesc'] = $about;
	// $_SESSION['gender'] = $gender;
	header("location:../?r=9837");
    } else{
        echo "no sirvo";
        header("location:../?r=0927");
                  
    }
}catch(PDOException $e){
    echo $e;
}



?>